<?php

namespace App\Rules;

use Closure;
use App\Models\Promotion;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPromotionCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $promotion = Promotion::where('promocode', $value)
            ->where('expire_date', '>', now())
            ->first();

        if (!$promotion) {
            $fail("Mã khuyến mãi không hợp lệ hoặc đã hết hạn.");
        }
    }

    public function message()
    {
        return 'Mã khuyến mãi không hợp lệ hoặc đã hết hạn.';
    }
}
