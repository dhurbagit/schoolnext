<?php

use App\Models\NewsEvent;
use App\Models\PopModal;
use App\Models\ThemeOption;
use App\Models\User;
use App\Models\Vacancy;

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

function Vacancy()
{
    return Vacancy::where('type', '0')->count();
}

function vacancy_layout()
{
    return Vacancy::where('type', '10')->first();
}
