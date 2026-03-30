<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EconomicDataService
{
    protected $token;
    protected $indicators = ['GDP', 'GDP Growth', 'Interest Rate', 'Inflation Rate', 'Jobless Rate', 'Gov. Budget', 'Debt/GDP', 'Current Account', 'Population'];
    protected $priority = ['United States', 'China', 'Euro area', 'Germany', 'Japan', 'United Kingdom', 'France', 'India', 'Canada', 'Australia'];

    public function __construct()
    {
        $this->token = config('services.finnhub.token');
    }

    /**
     * Get processed economic data for display.
     * Uses persistent JSON cache if available.
     */
    public function getEconomicData()
    {
        if (Storage::exists('economic/economic_data.json')) {
            return json_decode(Storage::get('economic/economic_data.json'), true);
        }

        return $this->fetchInitialData();
    }

    /**
     * Fallback to fetch some initial data if cache doesn't exist.
     */
    protected function fetchInitialData()
    {
        if (!Storage::exists('economic/all_codes.json')) {
            return [];
        }

        $allCodes = json_decode(Storage::get('economic/all_codes.json'), true);
        $countries = array_keys($allCodes);

        // Sort by priority
        usort($countries, function ($a, $b) {
            $posA = array_search($a, $this->priority);
            $posB = array_search($b, $this->priority);
            if ($posA === false && $posB === false)
                return strcmp($a, $b);
            if ($posA === false)
                return 1;
            if ($posB === false)
                return -1;
            return $posA - $posB;
        });

        $results = [];
        $startTime = time();
        $callLimit = 60;
        $callCount = 0;
        $isRateLimited = false;

        foreach ($countries as $country) {
            $results[$country] = [];
            $shouldFetch = ($callCount < $callLimit && (time() - $startTime < 40) && !$isRateLimited);

            foreach ($this->indicators as $indicator) {
                if ($shouldFetch && isset($allCodes[$country][$indicator])) {
                    $code = $allCodes[$country][$indicator]['code'];
                    try {
                        $response = Http::timeout(2)->get("https://finnhub.io/api/v1/economic", [
                            'code' => $code,
                            'token' => $this->token
                        ]);
                        $callCount++;

                        if ($response->successful()) {
                            $data = $response->json()['data'] ?? [];
                            if (!empty($data)) {
                                usort($data, function ($a, $b) {
                                    return strcmp($b['date'], $a['date']);
                                });
                                $recent = $data[0]['value'];
                                $previous = isset($data[1]) ? $data[1]['value'] : $recent;
                                $results[$country][$indicator] = [
                                    'value' => $recent,
                                    'trend' => ($recent > $previous) ? 'green' : (($recent < $previous) ? 'red' : 'neutral')
                                ];
                            }
                            else {
                                $results[$country][$indicator] = ['value' => '-', 'trend' => 'neutral'];
                            }
                        }
                        else {
                            $results[$country][$indicator] = ['value' => '-', 'trend' => 'neutral'];
                            if ($response->status() == 429) {
                                $isRateLimited = true;
                                $shouldFetch = false;
                            }
                        }
                    }
                    catch (\Exception $e) {
                        $results[$country][$indicator] = ['value' => '-', 'trend' => 'neutral'];
                    }
                }
                else {
                    $results[$country][$indicator] = ['value' => '-', 'trend' => 'neutral'];
                }
            }
        }

        return $results;
    }
}