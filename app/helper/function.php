<?php

use App\Models\NewsEvent;
use App\Models\PopModal;
use App\Models\ThemeOption;
use App\Models\User;

function shareme(){
    $themeOption = ThemeOption::first();
    return $themeOption;
}

// passing data of user model for table
function UserList()
{
    $UList = User::orderBy('id', 'DESC')->get();
    return $UList;
}


function Events()
{
    $events = NewsEvent::get();
    return $events;
}
