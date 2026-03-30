<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EconomicGenerateCodes extends Command
{
    protected $signature = 'economic:generate-codes';
    protected $description = 'Fetch all economic codes from Finnhub and organize them by country and indicator';

    protected $indicators = [
        'GDP' => ['gdp'],
        'GDP Growth' => ['gdp growth', 'real gdp growth'],
        'Interest Rate' => ['interest rate', 'repo rate', 'cash rate'],
        'Inflation Rate' => ['inflation rate', 'cpi inflation'],
        'Jobless Rate' => ['jobless rate', 'unemployment rate'],
        'Gov. Budget' => ['gov. budget', 'government budget'],
        'Debt/GDP' => ['debt/gdp', 'government debt to gdp'],
        'Current Account' => ['current account'],
        'Population' => ['population']
    ];

    public function handle()
    {
        $token = config('services.finnhub.token');
        
        $this->info("Fetching economic codes from Finnhub...");
        $response = Http::get("https://finnhub.io/api/v1/economic/code", [
            'token' => $token
        ]);

        if (!$response->successful()) {
            $this->error("Failed to fetch codes from Finnhub.");
            return 1;
        }

        $allCodes = $response->json();
        $this->info("Found " . count($allCodes) . " codes. Processing...");

        $organized = [];
        foreach ($allCodes as $item) {
            $country = $item['country'];
            $name = strtolower($item['name']);

            foreach ($this->indicators as $key => $variants) {
                foreach ($variants as $variant) {
                    if (strpos($name, $variant) !== false) {
                        if (!isset($organized[$country])) {
                            $organized[$country] = [];
                        }
                        // Avoid duplicates, prefer shorter names for better matching
                        if (!isset($organized[$country][$key]) || strlen($name) < strlen(strtolower($organized[$country][$key]['name']))) {
                            $organized[$country][$key] = [
                                'code' => $item['code'],
                                'name' => $item['name'],
                                'unit' => $item['unit']
                            ];
                        }
                    }
                }
            }
        }

        Storage::put('economic/all_codes.json', json_encode($organized, JSON_PRETTY_PRINT));
        $this->info("Successfully saved organized codes to storage/app/economic/all_codes.json");
        return 0;
    }
}