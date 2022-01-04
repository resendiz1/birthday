<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Cache\Store;

class imagenesController extends Controller
{
    public function index(){

       $imagenes = DB::select('SELECT*FROM imagenes');     
        return view('imagenes.agregar', compact('imagenes'));

   
    }

    public function create(){

        
        Imagen::create([
            'imagen' => request('imagen')
        ]);
        return redirect()->route('imagen.index')->with('agregado', '¡La imagen se agrego correctamente!');
    }

    
}
