<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/cms', 'CmsController@index');


// Route::get('/dashboard', function () {
//     return view('test');
// });

Route::livewire('/livetrack', 'tracker')->layout('layouts.dashboard2', [
    'title' => 'live track'
]);

Route::livewire('/projects', 'projects')->layout('layouts.dashboard2', [
    'title' => 'projects'
]);

Route::livewire('/phases', 'phases')->layout('layouts.dashboard2', [
    'title' => 'phases'
]);

Route::livewire('/tracked', 'tracked')->layout('layouts.dashboard2', [
    'title' => 'Tracked'
]);

Route::livewire('project', 'create-project')->layout('layouts.dashboard2', [
    'title' => 'new project'
]);
