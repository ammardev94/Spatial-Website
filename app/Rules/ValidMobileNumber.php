<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidMobileNumber implements ValidationRule
{
    protected $countryISO;

    /**
     * Create a new rule instance.
     *
     * @param string $countryISO Country code (e.g., AE). Empty string means auto-detect from E.164 format
     */
    public function __construct($countryISO = '')
    {
        $this->countryISO = $countryISO;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // If no country specified and phone starts with +, try to parse it as-is (E.164)
        if (empty($this->countryISO) && strpos($value, '+') === 0) {
            // Extract country code from E.164 format
            // Try to parse without specifying region
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            
            try {
                $phoneNumber = $phoneUtil->parse($value, null);
                $regionCode = $phoneUtil->getRegionCodeForNumber($phoneNumber);
                
                if ($regionCode) {
                    $result = validateMobileNumber($value, $regionCode);
                } else {
                    $fail('Please enter a valid phone number');
                    return;
                }
            } catch (\libphonenumber\NumberParseException $e) {
                $fail('Please enter a valid phone number');
                return;
            }
        } else {
            // Use specified country code or default
            $country = !empty($this->countryISO) ? $this->countryISO : 'AE';
            $result = validateMobileNumber($value, $country);
        }

        if (!$result['valid']) {
            $fail('Please enter a valid phone number');
        }
    }
}
