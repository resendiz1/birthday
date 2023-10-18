<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Nombre;
use Barryvdh\DomPDF\PDF;
use App\Mail\correoMailable;
use Illuminate\Http\Request;
use App\Imports\nombresImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class nombresController extends Controller
{


    public function create(){

        $fecha = substr(request('fecha'),-5);

        Nombre::create([
            'nombre' => request('nombre'),
            'Area_trabajo' => request('area'),
            'email' => request('email'),
            'fecha_nacimiento' => $fecha,
            'felicitado' => 'no'
        ]);

       return redirect()->route('inicio')->with('agregado', 'El cumpleaños se agrego correctamente');
    }




    public function index(){  //Este metodo recupera de la base de datos los registros de los cumpleañeros de el dia en transcurso
        
        $hoy = date('m-d');
       
        //$nombre = Nombre::get();
        $nombre = DB::select("SELECT*FROM nombres WHERE fecha_nacimiento LIKE '$hoy'");
        return view('inicio', compact('nombre'));

    }




    public function mail(Nombre $nombre){ //

        $pdf = App::make('dompdf.wrapper');
        $data["email"] = $nombre->email;
        $data["title"] = 'Feliz Cumpleaños';
        $data["nombre"] = $nombre->nombre;
        $data["area"] = $nombre->Area_trabajo;
        $data["id"] = $nombre->id;


        //Obtiene las frases de la base de datos y las agrega aqui
        $frase = DB::select("SELECT frase FROM frases");//Selecciono todas la frases de la BD
        $data["body"] = $frase[rand(0,sizeof($frase)-1)]; //Al array resultante le paso el contador para obtener un numero random y asi poder elejir la frase al azar :p
     


        //Obtiene las imagenes de las base de datos
        $imagen = DB::select("SELECT imagen FROM imagenes");
        $data['imagen'] = $imagen[rand(0,sizeof($imagen)-1)];
        $pdf ->loadView('emails.message-received', $data);


        try{

        Mail::send('emails.message-received', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], 
            $data["email"])

            ->subject($data["title"])
            ->attachData($pdf->output(), "emails.message-received.pdf");
        });

        DB::update("UPDATE nombres SET felicitado = 'si' WHERE id LIKE $nombre->id ");
        }

        catch(Exception $e){
            return dd('Ocurrio un error inesperado :(, error: '.$e.'  ');
        }

        //Finaliza la ejecucion 
        return redirect()->route('inicio')->with('enviado', 'La felicitaciones fueron enviadas a: <br>'.$nombre->nombre.'');

    }





    public function importExcel(Request $request){

         $archivo = $request->file('excel');

         try{

            Excel::import(new nombresImport, $archivo);
            return back()->with('excel', 'La carga del archivo fue completada');

         }

         catch (Exception $e){
            return back()->with('error', 'Asegurate que el archivo cargado es el correcto e intenta de nuevo', compact('e'));
         }

        }

    





    public function buscar(){
        return view('busqueda.buscando');
    }


    public function buscado(){

         $nombre = request('query');
         $resultado = DB::select("SELECT*FROM nombres WHERE nombre LIKE '%$nombre%' ");
         return view('busqueda.buscando', compact('resultado'));
         

    }
}
