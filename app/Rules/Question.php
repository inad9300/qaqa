<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Question implements Rule {

    public function __construct() {}

    public function passes($attribute, $value) {
        return is_string($value) && substr($value, -1) === '?';
    }

    public function message() {
        return 'Questions must end with a question mark ("?").';
    }
}
