<?php

use App\Models\PopModal;
use App\Models\ThemeOption;

function shareme(){
    $themeOption = ThemeOption::first();
    return $themeOption ;
}


// sharing popup modal data
function popUpmodal(){
    $popUp = PopModal::orderBy('id', 'DESC')->get();
    return $popUp;

}
