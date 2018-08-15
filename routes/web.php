<?php

use Illuminate\Support\Facades\DB;

//Rota padrão.
Route::get('/',['uses'=>'MyController@teste']);

//Expressões regulares para o parâmetro get. Restringindo a rota.
Route::get('/user/{name}/{number}', function($name, $number){

    for ($i=1; $i <= $number; $i++) { 
        echo "<h1>Olá, $name ($i)</h1>";
    }

})->where('number', '[1-9]+')->where('name', '[A-Z a-z]+' );

//Parâmetro opcional. No qual possa se entrar na rota sem necessitar passar obrigatoriamente o parâmetro
//Precisamos passar um valor default como parâmetro caso não seja passado nada na rota.
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

//Grupo de rotas na qual forma uma hierarquia que ajuda na organização de nossas routes.
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

//Resource irá utilizar um controller criado com o atributo resource pelo php artisan
Route::resource('/client','ClientController');

//Exemplo prático de Switch Case
Route::get('mostrar_opcoes', ['as'=>'mostrar_opcoes', 'uses'=>'Loops\OpcoesController@mostrarOpcoes']);
Route::get('opcao/{id}', ['as'=>'opcoes', 'uses'=>'Loops\OpcoesController@opcoes']);

//Exemplo de For e Foreach
Route::get('loop/foreach', ['as'=>'foreach', 'uses'=>'Loops\ForeachController@foreach']);

//Mostrando registros do banco de forma simples e sem utilizar a Model.
//Ótima maneira de fazer consultas (Queries) no database.
Route::get('/categorias', function(){

    $arrayDeObjetos = DB::table('categorias')->get();
    foreach($arrayDeObjetos as $objeto){
        echo "ID: " . $objeto->id . " Nome: " . $objeto->nome . "<br>";
    }    

    echo "<hr>";

    //O pluck trás a coluna desejada em formato de array
    $arrayNome = DB::table('categorias')->pluck('nome');
    foreach ($arrayNome as $nome) {
        echo "Nome: $nome <br>";
    }

    echo "<hr>";

    //Usando a cláusula WHERE
    //Pegaremos onde o ID for igual a um. First irá retornar um único objeto
    $objeto = DB::table('categorias')->where('id', 1)->first();
    echo "Nome: " . $objeto->nome;

    //Usando a cláusula like
    echo "<hr>";
    echo "Usando o Like para pegar nomes específicos <br>";

    $like = DB::table('categorias')->where('nome', 'like', '%m%')->get();
    foreach($like as $l){
        echo $l->nome . "<br>";
    }

    echo "<hr>";
    echo "Sentenças lógicas<br>";

    //Usando a cláusula OR
    $or = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();
    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
    }

    
    echo "<hr>";
    echo "Intervalos<br>";

    //Intervalo usando Between.
    $or = DB::table('categorias')->whereBetween('id', [1,2])->get();
    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
    }

    echo "<hr>";

    //Podemos também usar o whereNotBetween
    $or = DB::table('categorias')->whereNotBetween('id', [1,2])->get();
    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
    }

    echo "<hr>";
    echo "Conjuntos<br>";

    //Cláusula IN
    $or = DB::table('categorias')->whereIN('id', [1,2])->get();
    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
    }

    //NotIN
    echo "<hr>";
    $or = DB::table('categorias')->whereNotIN('id', [1,2])->get();
    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
    }

    echo "<hr>";
    echo "Um ou mais parâmetros na cláusula where<br>";
    $or = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'eletronicos']
    ])->get();

    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
        echo "Nome: " . $o->nome . "<br>";
    }

    echo "<hr>";
    echo "Order by<br>";
    
    //Order By
    $or = DB::table('categorias')->orderBy('nome')->get();

    foreach($or as $o){
        echo "ID: " . $o->id . "<br>";
        echo "Nome: " . $o->nome . "<br>";
    }

    //Order Decrecente
    echo "<hr>";
    $or = DB::table('categorias')->orderBy('nome', 'desc')->get();
    foreach($or as $o)
    {
        echo "ID: " . $o->id . "<br>";
        echo "Nome: " . $o->nome . "<br>";
    }

});

Route::get('/novascategorias', function(){

    //Inserindo registros em uma tabela
    /* DB::table('categorias')->insert([
        ['nome' => 'camas'],
        ['nome' => 'Informatica'],
        ['nome' => 'cozinha']
    ]); */

    //Pegando o ID de um novo registro criado
    $id = DB::table('categorias')->insertGetId(
        ['nome' => 'carros']
    );

    echo "Novo ID gerado: " . $id;

});




