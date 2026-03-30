<?php

if (! function_exists('dashboard_url')) {
    function dashboard_url()
    {
        if (auth()->guard('admin')->check()) {
            return route('admin.dashboard');
        }

        return url('/');
    }
}

if (!function_exists('storage_asset')) {
    /**
     * Get asset URL with R2 CDN fallback to local storage
     * Checks if file exists on R2, falls back to local storage if not found
     * Results are cached for 24 hours to improve performance
     * 
     * @param string|null $path
     * @return string
     */
    function storage_asset($path)
    {
        // Return empty if path is null or empty
        if (empty($path) || !is_string($path)) {
            return '';
        }
        
        // Remove 'storage/' prefix if present and clean path
        $path = ltrim($path, '/');
        $path = str_replace('storage/', '', $path);
        
        // Sanitize path - remove path traversal attempts
        $path = str_replace(['../', '..\\'], '', $path);
        
        // TEMPORARILY USING LOCAL SERVER INSTEAD OF CDN FOR TESTING
        return asset('storage/' . $path);
    }
}

if (!function_exists('storage_asset_with_fallback')) {
    /**
     * Get image tag with automatic fallback from R2 to local storage
     * 
     * @param string|null $path
     * @param string $alt
     * @param string $class
     * @param array $attributes
     * @return string
     */
    function storage_asset_with_fallback($path, $alt = '', $class = '', $attributes = [])
    {
        if (empty($path)) {
            return '';
        }
        
        $r2Url = storage_asset($path);
        $localUrl = asset('storage/' . ltrim($path, 'storage/'));
        
        $attrString = '';
        foreach ($attributes as $key => $value) {
            $attrString .= " {$key}=\"{$value}\"";
        }
        
        $classAttr = $class ? " class=\"{$class}\"" : '';
        $altAttr = $alt ? " alt=\"{$alt}\"" : ' alt=""';
        
        // JavaScript fallback: if R2 fails, load from local storage
        return "<img src=\"{$r2Url}\" 
                     onerror=\"this.onerror=null; this.src='{$localUrl}';\" 
                     {$altAttr}{$classAttr}{$attrString}>";
    }
}

if (!function_exists('validateMobileNumber')) {
    /**
     * Validate and format mobile phone numbers using Google libphonenumber
     * 
     * @param string $rawNumber The phone number to validate
     * @param string $countryISO The country code (e.g., AE, IN, UK, US)
     * @return array Returns ['valid' => bool, 'number' => string, 'reason' => string]
     */
    function validateMobileNumber($rawNumber, $countryISO)
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        try {
            // Parse number using selected country
            $phoneNumber = $phoneUtil->parse($rawNumber, strtoupper($countryISO));

            // 1. Check if valid number for country
            if (!$phoneUtil->isValidNumber($phoneNumber)) {
                return ['valid' => false, 'reason' => 'Invalid number format'];
            }

            // 2. Allow MOBILE or FIXED_LINE_OR_MOBILE only
            $type = $phoneUtil->getNumberType($phoneNumber);
            if (!in_array($type, [
                \libphonenumber\PhoneNumberType::MOBILE,
                \libphonenumber\PhoneNumberType::FIXED_LINE_OR_MOBILE
            ])) {
                return ['valid' => false, 'reason' => 'Landline numbers not allowed'];
            }

            // 3. Format to E.164
            $formatted = $phoneUtil->format($phoneNumber, \libphonenumber\PhoneNumberFormat::E164);

            // 4. Block fake / repeated patterns
            if (isFakeNumber($formatted)) {
                return ['valid' => false, 'reason' => 'Invalid or fake number'];
            }

            return [
                'valid' => true,
                'number' => $formatted
            ];

        } catch (\libphonenumber\NumberParseException $e) {
            return ['valid' => false, 'reason' => 'Unable to parse number'];
        }
    }
}

if (!function_exists('isFakeNumber')) {
    /**
     * Detect fake or low-quality phone numbers
     * 
     * @param string $number The phone number in E.164 format
     * @return bool Returns true if number appears to be fake
     */
    function isFakeNumber($number)
    {
        // Remove country code
        $digits = preg_replace('/^\+\d{1,3}/', '', $number);

        // Repeated digits (e.g. 0000000, 9999999)
        if (preg_match('/(\d)\1{6,}/', $digits)) {
            return true;
        }

        // Sequential patterns
        $sequences = [
            '0123456789',
            '1234567890',
            '9876543210'
        ];

        foreach ($sequences as $seq) {
            if (strpos($seq, substr($digits, 0, 7)) !== false) {
                return true;
            }
        }

        // Ending with common fake patterns
        if (preg_match('/(0000|1111|2222|9999)$/', $digits)) {
            return true;
        }

        return false;
    }
}
