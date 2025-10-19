<?php

namespace App\Rules;

use App\Models\Guide;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Nette\Schema\ValidationException;

class CheckIfGuideExist implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Guide::query()->find($value)) {
            return;
        }

        throw new ValidationException("Guide $value not found.");
    }
}
