<?php

use App\Models\ThemeOption;

function shareme(){
    $themeOption = ThemeOption::first();
    return $themeOption ;
}
