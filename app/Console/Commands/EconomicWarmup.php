<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EconomicWarmup extends Command
{
    protected $signature = 'economic:warmup {--force : Force refetch all data}';
    protected $description = 'Warmup economic data cache by fetching all country indicators from Finnhub';

    protected $indicators = ['GDP', 'GDP Growth', 'Interest Rate', 'Inflation Rate', 'Jobless Rate', 'Gov. Budget', 'Debt/GDP', 'Current Account', 'Population'];
    protected $priority = ['United States', 'China', 'Euro area', 'Germany', 'Japan', 'United Kingdom', 'France', 'India', 'Canada', 'Australia'];

    public function handle()
    {
        $token = config('services.finnhub.token');

        if (!Storage::exists('economic/all_codes.json')) {
            $this->error("all_codes.json not found. Run artisan economic:generate-codes first.");
            return 1;
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
        if (!$this->option('force') && Storage::exists('economic/economic_data.json')) {
            $results = json_decode(Storage::get('economic/economic_data.json'), true);
        }

        $this->info("Starting warmup for " . count($countries) . " countries...");

        $bar = $this->output->createProgressBar(count($countries));
        $bar->start();

        foreach ($countries as $country) {
            if (!isset($results[$country])) {
                $results[$country] = [];
            }

            $allFilled = true;
            foreach ($this->indicators as $indicator) {
                if (!isset($results[$country][$indicator]) || $results[$country][$indicator]['value'] == '-') {
                    $allFilled = false;
                    break;
                }
            }

            if ($allFilled && !$this->option('force')) {
                $bar->advance();
                continue;
            }

            foreach ($this->indicators as $indicator) {
                if (isset($allCodes[$country][$indicator])) {
                    $code = $allCodes[$country][$indicator]['code'];

                    try {
                        $response = Http::timeout(5)->get("https://finnhub.io/api/v1/economic", [
                            'code' => $code,
                            'token' => $token
                        ]);

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
                                $this->warn("\nRate limit hit. Saving progress and waiting 10 seconds...");
                                Storage::put('economic/economic_data.json', json_encode($results, JSON_PRETTY_PRINT));
                                sleep(10);
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

            Storage::put('economic/economic_data.json', json_encode($results, JSON_PRETTY_PRINT));
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nWarmup complete!");
        return 0;
    }
}