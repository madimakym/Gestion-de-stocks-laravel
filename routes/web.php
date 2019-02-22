<?php

Route::get('/', 'SaladesController@index');
Route::resource('salades', 'SaladesController');
Route::resource('pizza', 'PizzaController');

// Category pizza
Route::get('/categorie/pizza', ['uses'=> 'CategoryPizzaController@index','as' => 'pizza.categorie.index']);
Route::post('/categorie/pizza', ['uses' => 'CategoryPizzaController@store','as' => 'pizza.categorie.store']);
Route::delete('/categorie/pizza/{id}', ['uses' => 'CategoryPizzaController@destroy','as' => 'pizza.categorie.destroy']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Route::group(['prefix' => 'salades', 'middleware'=>'auth'], function () {
//     Route::get('/', function () {
//         return view('salades.index');
//     })->name('salades.index');

//     Route::resource('salades', 'SaladesController');
// });