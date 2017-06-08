<?php

Route::get('admin', function () {
    return view('admin');
});

Route::get('/', 'FrontController@index');

Route::get('adicionar-ao-carinho/{id}', 'FrontController@adicionarAoCarinho');

Route::get('pagamento', 'FrontController@gerarQr');

Route::get('autor', 'AutorController@create');
Route::resource('autores', 'AutorController');

Route::get('area', 'AreaController@create');
Route::resource('areas', 'AreaController');

Route::get('livro', 'LivroController@create');
Route::resource('livros', 'LivroController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
