<?php

namespace App\Http\Controllers;

use App\Models\Frase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frasesController extends Controller
{

    
    public function index(){

        $frases = DB::select('SELECT*FROM frases');
        return view('frases.agregar', compact('frases'));
    }





    public function create(){


        Frase::create([
            'frase' => request('frase')
        ]);
        return redirect()->route('frases.index')->with('agregado', '¡La frase fue agregada!');

    }





    public function delete(Frase $frase){
        
        $frase->delete();
        
        return back()->with('borrada', 'La frase fue eliminada');
    }
}
