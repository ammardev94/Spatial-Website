<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ValidImageOrName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_null($value)) {
            return;
        }

        if (is_string($value)) {
            if (! Storage::disk('public')->exists($value)) {
                $fail('The provided image name does not exist.');
            }

            return;
        }

        if ($value instanceof UploadedFile) {
            if (! $value->isValid() || ! in_array($value->getClientOriginalExtension(), ['jpeg', 'png', 'jpg'])) {
                $fail('The uploaded file must be a valid image (jpeg, png, jpg).');
            }
            if ($value->getSize() > 10240 * 1024) {
                $fail('The uploaded image must be less than 10MB.');
            }

            return;
        }

        $fail('The provided image name or file is invalid.');
    }
}
