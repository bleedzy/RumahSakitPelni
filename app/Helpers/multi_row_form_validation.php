<?php

use Illuminate\Support\Facades\Validator;

if (!function_exists('multiRowFormValidation')) {
    function multiRowFormValidationHelper($array, $rule, $RowName = 'Row') {
        $i = 1;
        $errorMsg = '';
        foreach ($array as $value) {
            $validator = Validator::make($value, $rule);
            if($validator->fails()){
                $errorMsg .= $RowName . ' #' . $i . ' : ' . implode(' | ', $validator->errors()->all()) . '<br>';
            }
            $i++;
        }
        return $errorMsg;
    }
}