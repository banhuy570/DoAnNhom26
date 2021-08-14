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
Route::get('/', 'HomeController@index')->name('index');

Route::get('/home', 'HomeController@index');

Route::get('/dangky', 'HomeController@dangky')->name('dangky');
Route::post('/save-dk', 'HomeController@save_dk')->name('tkb.savedk');
Route::get('/suco', 'HomeController@suco')->name('suco');
Route::post('/save-sc', 'HomeController@save_sc')->name('mt.savesc');
Route::get('/admin','AdminController@index');

//tkb
Route::get('/all-dsdk','TkbController@all_dsdk')->name('tkb.dsdk');
Route::get('/add-tkb','TkbController@add_tkb')->name('tkb.add');
Route::post('/save-tkb','TkbController@save_tkb')->name('tkb.save');
Route::get('/all-tkb','TkbController@all_tkb')->name('tkb.all');

Route::get('/edit-tkb/{MaTKB}','tkbController@edit_tkb')->name('tkb.edit');
Route::get('/edit1-tkb/{MaTKB}','tkbController@edit1_tkb')->name('tkb.edit1');
Route::post('/update-tkb/{MaTKB}','tkbController@update_tkb')->name('tkb.update');
Route::post('/update1-tkb/{MaTKB}','tkbController@update1_tkb')->name('tkb.update1');
Route::get('/delete-tkb/{MaTKB}','tkbController@delete_tkb')->name('tkb.delete');
Route::get('/delete1-tkb/{MaTKB}','tkbController@delete1_tkb')->name('tkb.delete1');

//pmt
Route::get('/add-pmt','PMTController@add_pmt')->name('pmt.add');
Route::post('/save-pmt','PMTController@save_pmt')->name('pmt.save');
Route::get('/all-pmt','PMTController@all_pmt')->name('pmt.all');

Route::get('/edit-pmt/{MaPMT}','PMTController@edit_pmt')->name('pmt.edit');
Route::post('/update-pmt/{MaPMT}','PMTController@update_pmt')->name('pmt.update');
Route::get('/delete-pmt/{MaPMT}','PMTController@delete_pmt')->name('pmt.delete');
//mt
Route::get('/all-mh','MTController@all_mh')->name('mt.mh');
Route::get('/all-tkmth','MTController@all_tkmth')->name('mt.tkmth');
Route::get('/add-mt','MTController@add_mt')->name('mt.add');
Route::post('/save-mt','MTController@save_mt')->name('mt.save');
Route::get('/all-mt','MTController@all_mt')->name('mt.all');

Route::get('/edit-mt/{MaMT}','MTController@edit_mt')->name('mt.edit');
Route::get('/edit1-mt/{MaMT}','MTController@edit1_mt')->name('mt.edit1');
Route::post('/update-mt/{MaMT}','MTController@update_mt')->name('mt.update');

Route::post('/update1-mt/{MaMT}','MTController@update1_mt')->name('mt.update1');
Route::get('/delete-mt/{MaMT}','MTController@delete_mt')->name('mt.delete');

//search
Route::get('tim-kiem','HomeController@search')->name('search');