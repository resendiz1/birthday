@extends('layout')



@section('content')
<div class="container">

    
    @if (session('agregado'))
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="alert alert-success alert-sm text-center fw-bold shadow">
                <i class="fa fa-check-circle"></i>
                {{session('agregado')}}
            </div>
        </div>
    </div>
    @endif
    



    <div class="row justify-content-center mt-2">
        <div class="col-4 text-center">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar cumpleaños
            </button>
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
                  <input type="text" name="email" class="form-control">
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





    <div class="row bg-white shadow p-4 mt-5 justify-content-center">
        <div class="col-12 text-center my-4">
            <h3>
                Felicitaciones del dia: <strong>20/Junio/2022</strong>
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
            <div class="row">
                <div class="col-12">
                    <i class="fas fa-birthday-cake fa-2x"></i>
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
            </div>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-primary">
                <i class="fas fa-paper-plane"></i>
                Enviar Felicitaciones 
        </button>
        </div> 
    </form>
        </div>
    </div>
@empty
<li> No hay Datos que mostrar</li>
    
@endforelse
        
        

    </div>

</div>
@endsection