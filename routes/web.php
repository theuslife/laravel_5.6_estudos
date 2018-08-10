<?php

//Rota padrão
Route::get('/',['uses'=>'MyController@teste']);

//Expressões regulares para o parâmetro get. Restringindo a rota
Route::get('/user/{name}/{number}', function($name, $number){

    for ($i=1; $i <= $number; $i++) { 
        echo "<h1>Olá, $name ($i)</h1>";
    }

})->where('number', '[1-9]+')->where('name', '[A-Z a-z]+' );

//Parâmetro opcional. No qual possa se entrar na rota sem necessitar passar obrigatoriamente o parâmetro
//Precisamos passar um valor default como parâmetro caso não seja passado nada na rota
Route::get('/user/{name?}', function($name=null){
    
    if(isset($name))
    {
        echo "Olá, $name";
    }
    else 
    {
        echo 'Olá, visitante';
    }

})->where('name', '[A-Z a-z]+');

//Grupo de rotas na qual forma uma hierarquia que ajuda na organização de nossas routes
Route::prefix('app')->group(function(){
    Route::get('/', function(){
        echo 'App';
    });
    
    Route::get('profile', function(){
        echo 'Profile';
    });
    
    Route::get('products', function(){
        echo 'Produtos';
    });
});

//Testando
Route::prefix('teste')->group(function(){

        Route::get('{nome}/{sobrenome}', function($nome, $sobrenome){
            echo "$nome $sobrenome";
        })->where('nome', '[A-Z a-z]+')->where('sobrenome', '[A-Z a-z]+');
        
});

//Agrupando rotas
Route::prefix('matheusrodrigues')->group(function(){
   
    //Expressão regular restrigindo parâmetros
    Route::get('{nome}/{sobrenome}', function($nome, $sobrenome){
        return view('welcome', ['nome'=>$nome, 'sobrenome'=>$sobrenome]);
    })->where('nome', '[A-Z a-z]+')->where('sobrenome', '[A-Z a-z]+');

});

//Utilizando Controller
Route::prefix('array')->group(function(){
    
    Route::get('{id}', ['uses'=>'myController@getID'])->where('id', '[0-9]+');

});

Route::resource('/client','ClientController');




