<?php

use Illuminate\Support\Facades\Route;
use App\Models\Person;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/softdelete', function () {
    Person::find(1)->delete();
});

Route::get('softdelete/get', function() {
  $person = Person::onlyTrashed()->get();
  dd($person);
});

Route::get('softdelete/store', function() {
  $result = Person::onlyTrashed()->restore();
  echo $result;
});

Route::get('softdelete/absolute', function() {
  $result = Person::onlyTrashed()->forceDelete();
  echo $result;
});