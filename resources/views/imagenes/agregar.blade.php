@extends('layout')
@section('content')
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <a href="{{route('inicio')}}">
                <i class="fa fa-home mx-2"></i>
                Regresar
            </a>
        </div>
        @if (session('agregado'))
          <div class="col-4">
              <div class="alert alert-success alert-sm shadow p-2 text-center">
                  {{session('agregado')}}
              </div>
          </div>
        @endif
        @if (session('borrada'))
        <div class="col-4">
          <div class="alert alert-warning alert-sm shadow p-2 text-center">
              {{session('borrada')}}
          </div>
      </div>
        @else
            
        @endif
        <div class="col-12 text-center mt-3">
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus-circle"></i>
                Agregar Imagen
            </button>
        </div>
    </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Insertando imagen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('imagen.create')}}"  method="POST">
              @csrf @method('POST')
              <div class="form-group">
                    <input type="text" placeholder="Inserta aqui la url de la imagen" class="form-control form-control-sm" name="imagen">
              </div>

            </div>
            <div class="modal-footer">
                <button  class="btn btn-primary btn-sm">Guardar Imagen</button>
            </form>
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  {{-- termina el modal --}}



  <div class="row justify-content-around mt-5">

      @forelse ($imagenes as $item)
    <div class="col-5 bg-white shadow text-center p-3 m-2 ">
      <div class="row justify-content-center">
        <div class="col-12">
          <img src="{{$item->imagen}}" class="img-fluid" alt="">
        </div>
        <div class="col-1 text-center">
          <form action="{{route('imagen.delete', $item->id)}}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-danger rounded pill btn-sm py-0">
              Borrar
            </button>
          </form>
        </div>

      </div>
    </div>
      @empty
          <li>No hay imagenes para mostrar</li>
      @endforelse

  </div>





</div>
@endsection