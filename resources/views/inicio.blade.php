@extends('layout')



@section('content')
    <div class="container">
        @if (session('agregado'))
            <div class="row justify-content-center mt-5">
                <div class="col-4">
                    <div class="alert alert-success alert-sm text-center fw-bold shadow">
                        <i class="fa fa-check-circle"></i>
                        {{session('agregado')}}
                    </div>
                </div>
            </div>
    @endif

    @if (session('excel'))
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <div class="alert alert-success alert-sm text-center fw-bold shadow">
                    <i class="fa fa-check-circle"></i>
                    {{session('excel')}}
                </div>
            </div>
        </div>
    @endif
    
    @if (session('enviado'))
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <div class="alert alert-primary alert-sm text-center fw-bold shadow">
                <i class="far fa-thumbs-up"></i>
                    {!!session('enviado')!!}
                </div>
            </div>
        </div>
    @endif
    
    @if (session('error'))
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <div class="alert alert-danger alert-sm text-center fw-bold shadow">
                <i class="fa fa-error"></i>
                    {{session('error')}}
                </div>
            </div>
        </div>
    @else
    
    @endif   

  
  <!-- Modal -->
  <div class="modal fade" id="excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cargando desde Excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{route('excel.import')}}" method="POST" enctype="multipart/form-data">
              @csrf @method('POST')
              <input type="file" name="excel" accept=".xlsx, .xls" class="form-control form-control-sm ">
            </div>
            <div class="modal-footer">
                <button  class="btn btn-primary">Guardar Cambios</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>





    <div class="row justify-content-center  bg-primary p-2 rounded sticky fixed-top mb-5">

        <div class="col-2 flotante">
            <button class="btn btn-success btn-sm"data-bs-toggle="modal" data-bs-target="#excel">
                <i class="fa fa-table mx-2"></i>
                Excel
            </button>
        </div>

        <div class="col-3 text-center">
            <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i>
                Agregar cumpleaños
            </button>
        </div>

        <div class="col-3 text-center">
            <a href="{{route('cumple.buscar')}}" class="btn btn-primary text-white btn-sm ">
                <i class="fa fa-eye"></i>
                Ver todos los cumpleañeros
            </a>
        </div>

        <div class="col-3 text-center">
            <a href="{{route('frases.index')}}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-square mx-1"></i>
                Agregar Frases
            </a>
        </div>

        <div class="col-3 text-center">
            <a href="{{route('imagen.create')}}" class="btn btn-primary text-white btn-sm">
                <i class="fa fa-plus-circle"></i>
                Agregar Imagenes
            </a>
        </div>

    </div>






  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar cumpleaños del trabajador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('nombres.store')}}" method="POST">
            @csrf
              <div class="form-group">
                  <label for="">Nombre completo</label>
                  <input type="text" name="nombre" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Área en la que trabaja</label>
                  <input type="text" name="area" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Correo eléctronico la gerencia</label>
                  <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Fecha de cumpleaños</label>
                <input type="date" name="fecha" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Guardar cumpleaños</button>
            </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>





    <div class="row bg-white shadow p-4 justify-content-center">
        <div class="col-12 text-center my-4">
            <br>
            <h3>
                Felicitaciones del dia: <strong>
                <?php 

                    date_default_timezone_set ('America/Mexico_City');
                    echo date('m-d-Y')
                 ?>
                 </strong>
            </h3>
    </div>


    

@forelse ($nombre as $nombreItem)
    <div class="col-lg-4 col-md-4 col-sm-6 mt-5">
    <form action="{{route('correo', $nombreItem->id)}}" method="POST">
        @csrf
        <div class="card  shadow">
        <div class="card-header bg-primary text-white text-center">
            {{$nombreItem->Area_trabajo}}
        </div>
        <div class="card-body text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <?php 
                    $colores = ['text-success', 'text-primary', 'text-secondary', 'text-danger', 'text-info', 'text-warning']
               
                    ?>
                    <i class="fas fa-birthday-cake fa-2x {!!$colores[rand(0, 5)]!!}  "></i>

                </div>
                <div class="col-12">
                    <span>{{$nombreItem->nombre}}</span> 
                </div>
                <div class="col-12">
                    <strong>{{$nombreItem->fecha_nacimiento}}</strong>
                </div>
                <div class="col-12">
                    <strong>{{$nombreItem->email}}</strong>
                </div>
                @if ($nombreItem->felicitado == 'si')
                    <div class="col-8 my-3" style="color:rgb(2, 187, 2)">
                        <i class="fa fa-check-circle mx-2"></i>
                        <strong>Felicitaciones enviadas</strong>
                    </div>
                @endif
            </div>
        </div>

    {{-- Aqui decidiendo si ya fue felicitado o no, dependiendo de cada respuesta es lo que se mostrara --}}
        <div class="card-footer text-center">
            @if ($nombreItem->felicitado == 'si')
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-paper-plane"></i>
                    Volver a enviar felicitaciones 
                </button>     
            @else
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-paper-plane"></i>
                    Enviar Felicitaciones 
                </button>
            @endif
        </div> 
    {{-- Aqui termina el codigo que evalua si ya fue felicitado eso --}}

        
    </form>
        </div>
    </div>
@empty
<li> No hay Datos que mostrar</li>
    
@endforelse
        
        

    </div>
</div>
@endsection