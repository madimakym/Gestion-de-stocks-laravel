<?php

Route::get('/', 'PizzaController@index');
Route::resource('salades', 'SaladesController');
Route::resource('pizza', 'PizzaController');

// Category pizza
Route::get('/categorie/pizza', ['uses'=> 'CategoryPizzaController@index','as' => 'pizza.categorie.index']);
Route::post('/categorie/pizza', ['uses' => 'CategoryPizzaController@store','as' => 'pizza.categorie.store']);
Route::delete('/categorie/pizza/{id}', ['uses' => 'CategoryPizzaController@destroy','as' => 'pizza.categorie.destroy']);