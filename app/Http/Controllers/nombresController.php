<?php

namespace App\Http\Controllers;

use App\Models\Nombre;
use Barryvdh\DomPDF\PDF;
use App\Mail\correoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;


class nombresController extends Controller
{


    public function store(){

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




    public function index(){
       $hoy = date('m-d');
       
        //$nombre = Nombre::get();
         $nombre = DB::select("SELECT*FROM nombres WHERE fecha_nacimiento LIKE '$hoy' AND felicitado LIKE 'no'");
       
         return view('inicio', compact('nombre'));

    }




    public function mail(Nombre $nombre){

        $pdf = App::make('dompdf.wrapper');
        $data["email"] = $nombre->email;
        $data["title"] = 'Feliz Cumpleaños <br>'.$nombre->nombre;



        //Termina algoritmo de las frases
        //Dentro de aqui van todas las frases que se anexaran al azar en cada correo
        $frase = [
            'Hace unos años, una persona muy especial vino al mundo para hacerlo un lugar mejor. ¡Feliz cumpleaños! Que disfrutes de este día con ilusión y mucha alegría. Y que cumplas muchos más años de vida.',

            '¡Feliz cumpleaños! Que en este día tan especial, Dios te bendiga con mucha felicidad. Que en la vida siempre encuentres razones para sonreír y dar gracias.',

            '¡Feliz cumpleaños! Que disfrutes de este día con ilusión y en compañía de las personas que más
            amas en el mundo. Que la alegría sea constante y
            recibas muchos regalos.',

            '¡Felicitaciones por tu cumpleaños! Que lo pases en grande y que cada instante vivido sea de alegría. Que en tu vida la felicidad sea constante y nunca te falten la salud y el amor.',

            'Cuando un nuevo año empieza, nuevas oportunidades y puertas se abren. Hoy estás viviendo ese momento, y yo te deseo que aproveches cada experiencia que este nuevo año te traerá. ¡Feliz cumpleaños!',

            '¡Feliz cumpleaños! Este es un día grandioso, pues el milagro de la vida se renueva para ti en otro ciclo que hoy comienza.
            Recibe esta bendición de Dios con alegría y gratitud, y todos los días aprovecha el maravilloso don que es la vida. Haz más amigos, esparce el bien y sé feliz.',

            'Hoy cumples un año más en tu vida y me alegro un montón por ti. Te deseo felicidad y que todos tus sueños se hagan realidad. ¡Feliz cumpleaños!',

            'Este día es muy especial, no solo para ti, sino para todos los que, como yo, te queremos de verdad. ¡Feliz cumpleaños! Poder celebrar un año más de tu vida es una bendición y por eso pido a Dios que te regale muchos más.',

            'Llegó el momento de celebrar; es tu cumpleaños. ¡Felicitaciones! Me alegra mucho que estés cumpliendo un año más de vida y deseo que sea el mejor que hayas vivido.'

        ];


        
        //9
        $fraseElejida = rand(0, 8);
        $data["body"] = $frase[$fraseElejida];
        //Termina algoritmo de las frases





        //Aqui empieza el algoritmo de las imagenes, esto no deberia ser asi pero ya no hay tiempo, en un rato lo ////mando en la base de datos para que se puedan agregar mas frases y se puedan borrar
        $imagen = [
            'https://felizcumpleanos.date/wp-content/uploads/2019/06/happy-birthday-3416524_1280-1024x521.png',

            'https://img.imagenescool.com/ic/feliz-cumpleanos/feliz-cumpleanos_072.png',

            'https://ecumple.com/wp-content/uploads/2020/06/cumpleanos-paises.jpg',

            'https://1.bp.blogspot.com/--nX_xmqn62I/X37sR4LDXlI/AAAAAAAF3w4/vDckC-jTf8oh6Ei7mMUE2lne91eb23N_QCLcBGAsYHQ/s16000/feliz-cumplea%25C3%25B1os-dios-te-bendiga-00.jpg',

            'https://i.ytimg.com/vi/nbyLP6jvlP0/maxresdefault.jpg',

        ];


        $data["imagen"] = $imagen[rand(0, 4)];







        $pdf ->loadView('emails.message-received', $data);



        Mail::send('emails.message-received', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "emails.message-received.pdf");
        });

        DB::update("UPDATE nombres SET felicitado = 'si'");



        return dd('Email has been sent successfully');

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
