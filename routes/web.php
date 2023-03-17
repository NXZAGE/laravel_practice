<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/password/{password}', function($password) {
    $len_flag = strlen($password) >= 8;
    $A_flag = false;
    $a_flag = false;
    $digit_flag = false;
    foreach (str_split($password) as $symbol)
    {
        if (ctype_lower($symbol)) $a_flag = true;
        if (ctype_upper($symbol)) $A_flag = true;
        if (ctype_digit($symbol)) $digit_flag = true;
    }

    if ($len_flag)
    {
        $score = 0;
        if ($A_flag) $score++;
        if ($a_flag) $score++;
        if ($digit_flag) $score++;

        if ($score == 1) echo "Easy";
        if ($score == 2) echo "Middle";
        if ($score == 3) echo "GOOOOOOOD";
    }
    else 
    {
        echo "Password is too short";
    }
});

Route::get('password/', function(){
    echo 'Hmmmmm... I NEED TO SEE YOUR PASSWORD!!!!!!!!!!';
});