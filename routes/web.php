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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Get Routes */

Route::group(['middleware'=>['roles']],function(){
    Route::get('yetkisiz',array('as'=>'yetkisiz','uses'=>'AdminGetController@get_yetkisiz','roles'=>['Admin','Kullanici','Misafir']));
    Route::get('/',array('as'=>'/','uses'=>'AdminGetController@get_anasayfa','roles'=>['Admin','Kullanici','Misafir']));
    Route::get('anasayfa',array('as'=>'anasayfa','uses'=>'AdminGetController@get_anasayfa','roles'=>['Admin','Kullanici','Misafir']));
    Route::get('profil',array('as'=>'profil','uses'=>'AdminGetController@get_profil','roles'=>['Admin','Kullanici','Misafir']));
    Route::get('kullanici',array('as'=>'kullanici','uses'=>'AdminGetController@get_kullanici','roles'=>['Admin','Kullanici']));
    Route::get('kimlik',array('as'=>'kimlik','uses'=>'AdminGetController@get_kimlik','roles'=>['Admin','Kullanici',]));
    Route::get('kimliktab',array('as'=>'kimliktab','uses'=>'AdminGetController@get_kimliktab','roles'=>['Admin','Kullanici',]));
    Route::get('kimliktab-duzenle/{id}',array('as'=>'kimliktab-duzenle/{id}','uses'=>'AdminGetController@get_kimliktabduzenle','roles'=>['Admin','Kullanici',]));
    Route::get('kullanicitab',array('as'=>'kullanicitab','uses'=>'AdminGetController@get_kullanicitab','roles'=>['Admin','Kullanici',]));
    Route::get('kullanicitab-duzenle/{id}',array('as'=>'kullanicitab-duzenle/{id}','uses'=>'AdminGetController@get_kullanicitabduzenle','roles'=>['Admin','Kullanici',]));
    Route::get('haberekle',array('as'=>'haberekle','uses'=>'AdminGetController@get_haberekle','roles'=>['Admin']));
    Route::get('habertab',array('as'=>'habertab','uses'=>'AdminGetController@get_habertab','roles'=>['Admin']));
    Route::get('habertab-duzenle/{id}',array('as'=>'habertab-duzenle/{id}','uses'=>'AdminGetController@get_habertabduzenle','roles'=>['Admin',]));
});

Route::get('cikis','AdminGetController@get_cikis');


/* Post Routes */

Route::post('login','AdminPostController@authenticate');
Route::post('kimlik','AdminPostController@post_kimlik');
Route::post('kullanici','AdminPostController@post_kullanici');
Route::post('kimliktab','AdminPostController@post_kimliktab');
Route::post('kullanicitab','AdminPostController@post_kullanicitab');
Route::post('kimliktab-duzenle/{id}','AdminPostController@post_kimliktabduzenle');
Route::post('kullanicitab-duzenle/{id}','AdminPostController@post_kullanicitabduzenle');
Route::post('haberekle','AdminPostController@post_haberekle');
Route::post('habertab','AdminPostController@post_habertab');
Route::post('habertab-duzenle/{id}','AdminPostController@post_habertabduzenle');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
