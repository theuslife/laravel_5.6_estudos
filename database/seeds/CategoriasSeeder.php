<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    //Adicionando registros
    public function run()
    {

        DB::table('categorias')->insert([
            'nome'=>'eletronicos'
        ]);
        
        DB::table('categorias')->insert([
            'nome'=>'roupas'
        ]);
        
        DB::table('categorias')->insert([
            'nome'=>'moveis'
        ]);

        DB::table('categorias')->insert([
            'nome'=>'alimentos'
        ]);
        
    }
}
