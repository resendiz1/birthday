<?php

namespace App\Http\Controllers;

use App\Mail\correoMailable;
use App\Models\Nombre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class nombresController extends Controller
{
    public function store(){

        
         $fecha = substr(request('fecha'),-5);

        Nombre::create([
            'nombre' => request('nombre'),
            'Area_trabajo' => request('area'),
            'email' => request('email'),
            'fecha_nacimiento' => $fecha
        ]);


       return redirect()->route('inicio')->with('agregado', 'El cumpleaños se agrego correctamente');
    }



    public function index(){
       $hoy = date('m-d');
       
        //$nombre = Nombre::get();
         $nombre = DB::select("SELECT*FROM nombres WHERE fecha_nacimiento LIKE '$hoy'");
        return view('inicio', compact('nombre'));

    }

    public function mail(Nombre $nombre){




        Mail::to('arturo.resendiz@grupopabsa.com')->queue(new correoMailable($nombre));
        return new correoMailable($nombre);

    }
}
