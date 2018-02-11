<?php

if (!function_exists('label_count')) {
    function label_count($label, $count, $zeroLabel = '') {
        if ($count < 1) {
            return $zeroLabel;
        }
        return $count . ' '. str_plural($label, $count);
    }
}

if (!function_exists('username_error')) {
    function username_error($errors) {
        if (!$errors) {
            return false;
        }
        if ($errors->has('email')) {
            return $errors->first('email');
        }
        if ($errors->has('username')) {
            return $errors->first('username');
        }
    }
}