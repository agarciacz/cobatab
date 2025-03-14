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
Route::get('/image/carousel/{filename}', 'CarrouselController@getImages')->name('image_carousel');
Route::get('/noticia/{notice}', 'CobatabController@view_notice')->name('view_notice_cobatab');
Route::get('/buzon', 'MailboxController@create_mailbox')->name('view_create_mailbox_cobatab');
Route::post('/buzon/send', 'MailboxController@save_create_mailbox')->name('form_create_mailbox_cobatab');

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');
//Rutas de noticias | administrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/noticia/lista', 'NoticeController@listnotice')->name('view_list_notice');
    Route::get('/admin/noticia/crear', 'NoticeController@create')->name('view_create_notice');
    Route::post('/admin/noticia/created', 'NoticeController@save_notice')->name('form_created_notice');
    Route::get('/admin/noticia/autorizar/{notice}', 'NoticeController@authorized_notice')->name('view_authorized_notice');
    Route::post('/admin/noticia/autorizar/created', 'NoticeController@save_authorized_notice')->name('form_authorized_notice');
    Route::get('/admin/noticia/actualizar/{notice}', 'NoticeController@update_notice')->name('view_update_notice');
    Route::get('/delete/image/gallery/{id}', 'NoticeController@delete_image_gallery')->name('delete-image-gallery');
    Route::post('/admin/noticia/updated/{id}', 'NoticeController@save_updated')->name('form_updated_notice');
});
//Rutas del carousel | administrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/carousel/lista', 'CarrouselController@list_carousel')->name('view_list_carousel');
    Route::get('/admin/carousel/crear', 'CarrouselController@create_carousel')->name('view_create_carousel');
    Route::post('/admin/carousel/save/create', 'CarrouselController@save_create_carousel')->name('form_create_carousel');
    Route::get('/admin/carousel/actualizar/{id}', 'CarrouselController@update_carousel')->name('view_update_carousel');
    Route::post('/admin/carousel/update/{id}', 'CarrouselController@save_update_carousel')->name('form_update_carousel');
});
//Rutas de alumnos | administrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/alumno/lista', 'AlumnoController@list_student')->name('view_list_student');
    Route::get('/admin/alumno/crear', 'AlumnoController@create_student')->name('view_create_student');
    Route::post('/admin/alumno/save/create', 'AlumnoController@save_create_student')->name('form_create_student');
    Route::get('/admin/alumno/actualizar/{matricula}', 'AlumnoController@update_student')->name('view_update_student');
    Route::post('/admin/alumno/save/update/{matricula}', 'AlumnoController@save_update_student')->name('form_update_student');
    Route::post('/admin/alumno/vincular/save/{matricula}', 'AlumnoController@save_link_students_witch_parents')->name('form_link_student_with_parents');
    Route::get('/admin/alumno/drop/link/{id}', 'AlumnoController@delete_link_students_witch_parents')->name('drop_link_student_with_parents');
    Route::get('/admin/alumno/visializar/informacion/{matricula}', 'AlumnoController@information_student')->name('information_student');
    Route::get('/admin/alumno/activar/tutor/{id}', 'AlumnoController@active_is_tutor')->name('active_is_tutor');
    Route::get('/admin/alumno/desactivar/tutor/{id}', 'AlumnoController@disable_is_tutor')->name('disable_is_tutor');
});
//Rutas de padres | administrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/padres/lista', 'PadreController@list_father')->name('view_list_father');
    Route::get('/admin/padres/crear', 'PadreController@create_father')->name('view_create_father');
    Route::post('/admin/padres/save/create', 'PadreController@save_create_father')->name('form_create_father');
    Route::get('/admin/padres/actualizar/{curp}', 'PadreController@update_father')->name('view_update_father');
    Route::post('/admin/padres/save/update/{curp}', 'PadreController@save_update_father')->name('form_update_father');
});
//Rutas de Mailbox | administrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/buzon/lista', 'MailboxController@list_mailbox')->name('view_list_mailbox');
    Route::get('/admin/buzon/mensaje/{id}', 'MailboxController@detail_mailbox')->name('view_detail_mailbox');
});

//Rutas de Usuarios | administrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/usuario/lista', 'UsuarioController@list_user')->name('view_list_user');
    Route::get('/admin/usuario/crear', 'UsuarioController@create_user')->name('view_create_user');
    Route::post('/admin/usuario/save/create', 'UsuarioController@save_create_user')->name('form_create_user');
});