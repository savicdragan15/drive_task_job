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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');

Route::post('/home', 'HomeController@postIndex');

Route::get('/subscriber/{id}', 'AdminController@getSubscriber');

/*
 * Books routes
 */

Route::get('/', 'BookController@index');
Route::get('book/{slug}', 'BookController@book');
Route::get('category/{slug}', 'BookController@category');
Route::get('author/{slug}', 'BookController@author');
Route::get('search', 'BookController@search');

/*
 * Books routes END
 */


/*
 * Api routes
 */
Route::get('csrf', function() {
    return Session::token();
});

Route::post('api/getCategories', 'ApiController@getCategories');
Route::post('api/getAuthors', 'ApiController@getAllAuthors');
Route::post('api/getBooks', 'ApiController@getAllBooks');
Route::post('api/getBooksAuthor', 'ApiController@getBooksAuthor');

/*
 * Api routes END
 */
