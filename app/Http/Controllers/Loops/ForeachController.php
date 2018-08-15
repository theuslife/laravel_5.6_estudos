<?php

namespace App\Http\Controllers\Loops;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForeachController extends Controller
{
    public function foreach()
    {
        
        $produtos = [
            ['id'=>1, 'nome'=>'computador'],
            ['id'=>2, 'nome'=>'smartphone'],
            ['id'=>3, 'nome'=>'televisor led'],
            ['id'=>4, 'nome'=>'gabinete vga']
        ];

        return view('loops.foreach', compact('produtos'));

    }
}
