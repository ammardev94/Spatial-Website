<?php

namespace App\Traits;

trait FileHelper
{
    /**
     * Decode a file field that may contain a JSON array or single path.
     */
    public function decodeFileField($value): array
    {
        if (empty($value)) return [];

        if (is_array($value)) return $value;

        if (is_string($value) && $this->isJsonString($value)) {
            return json_decode($value, true);
        }

        return [$value];
    }

    /**
     * Check if a string is valid JSON.
     */
    private function isJsonString($string): bool
    {
        if (!is_string($string)) return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
