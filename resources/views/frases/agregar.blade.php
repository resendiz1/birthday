@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-12">
        <a href="{{route('inicio')}}">
          <i class="fa fa-home mx-2"></i>
              Regresar
        </a>
      </div>
      @if (session('agregado'))
        <div class="col-3 text-center">
          <div class="alert alert-success alert-sm p-1 shadow font-weight-bold">
            {{session('agregado')}}
          </div>
        </div>
      @endif

      @if (session('borrada'))
      <div class="col-3 text-center">
        <div class="alert alert-primary alert-sm p-1 shadow font-weight-bold">
          {{session('borrada')}}
        </div>
      </div>
      @else
          
      @endif

        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
              Agregar Frases
              </button>
            </form>
        </div>
    </div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agregando Frases</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('frases.create')}}" method="POST">
              @csrf @method('POST')
                <textarea name="frase" class="form-control"   rows="5" required></textarea>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-primary btn-sm">Guardar Frase</button>
            </form>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- Termina el modal --}}




<div class="row justify-content-center p-3">
    <h3 class="text-center mt-3">Frases Disponibles</h3>

   @forelse ($frases as $item)
    <div class="col-9 bg-white shadow rounded p-4 mt-3">
     <p> {{$item->frase}} </p>
     
     <form action="{{route('frases.delete', $item->id)}}" method="POST">
      
       @csrf @method('DELETE')
       <button class="btn btn-danger btn-sm">
         <i class="fa fa-eraser"></i>
       </button>
     </form>
    </div>
   @empty
       <li> No hay frases para mostrar</li>
   @endforelse
    
</div>





















</div>

  
 






@endsection