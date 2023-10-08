<?php

namespace App\Rules;

use App\Models\CompanyJobTitleMapping;
use App\Models\Contact;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Predis\Command\Traits\DB;

class UniqueJobFormEmailRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {



    }
}
