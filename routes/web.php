<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    $user = \App\User::find(1);

    $address = new \App\Address(['name' => 'bashun block d road 5']);

    return $user->address()->save($address);
});

Route::get('/update', function () {
    $address = \App\Address::whereUserId(1)->first();
    $address->name = 'update ed add';
    $address->save();
});

Route::get('/read', function () {
    $user = \App\User::findorfail(1);
    $add = $user->address()->first();

    echo $add->name;
});

Route::get('/delete', function () {
    $user = \App\User::findorfail(1);
    $user->address()->first()->delete();
    return 'done';
});
