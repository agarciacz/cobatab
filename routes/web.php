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

Route::get('/', 'CobatabController@index')->name('view_index_cobatab');
Route::get('/imagesnotices/{filename}', 'NoticeController@getImages')->name('imagesnotices');
Route::get('/noticia/{notice}', 'CobatabController@view_notice')->name('view_notice_cobatab');

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin/noticia/crear', 'NoticeController@create')->name('view_create_notice');
    Route::get('/admin/noticia/lista', 'NoticeController@listnotice')->name('view_list_notice');
    Route::post('/admin/noticia/created', 'NoticeController@save_notice')->name('form_created_notice');
    Route::get('/admin/noticia/autorizar/{notice}', 'NoticeController@authorized_notice')->name('view_authorized_notice');
    Route::post('/admin/noticia/autorizar/created', 'NoticeController@save_authorized_notice')->name('form_authorized_notice');
    Route::get('/admin/noticia/actualizar/{notice}', 'NoticeController@update_notice')->name('view_update_notice');
    Route::get('/delete/image/gallery/{id}', 'NoticeController@delete_image_gallery')->name('delete-image-gallery');
    Route::post('/admin/noticia/updated/{id}', 'NoticeController@save_updated')->name('form_updated_notice');
});