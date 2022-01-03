@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{route('inicio')}}">
                    <i class="fa fa-home mx-3"></i>
                    Regresar al inicio
                </a>
            </div>
            <div class="col-3 text-center">
                <form action="{{route('buscado')}}" method="POST">
                    @method('POST') @csrf
                    <div class="form-group">
                        <label for="">Buscar</label>
                        <input type="text" name="query" class="form-control form-control-sm rounded-pill" required>
                        <button class="btn btn-success btn-sm mt-2">
                            <i class="fa fa-plus-circle"></i>
                            Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if (isset($resultado))
        <div class="row justify-content-around mt-5 bg-white p-5">
            @forelse ($resultado as $item)
                <div class="col-3 bg-white shadow text-center p-3 rounded">
                    <h5>{{$item->nombre}}</h5>
                    <h6>{{$item->fecha_nacimiento}}</h6>
                    <h4>{{$item->Area_trabajo}}</h4>
                </div>
            @empty
                <li>No hay datos para mostrar</li>
            @endforelse
        </div>
                
            @endif


    </div>
@endsection