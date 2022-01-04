@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{route('inicio')}}">
                    <i class="fa fa-home mx-2"></i>
                    Regresar
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
                <div class="col-3 text-center p-3 rounded">
                    <div class="card">
                        <div class="card-header">
                            {{$item->nombre}}
                        </div>
                        <div class="card-body">
                            <strong>
                                {{$item->fecha_nacimiento}}
                            </strong> 
                            <br>
                            <small>
                                {{$item->Area_trabajo}}
                            </small>
                        </div>
                        <div class="card-footer">
                            {{$item->email}}
                        </div>
                    </div>
                </div>
            @empty
                <li>No hay datos para mostrar</li>
            @endforelse
        </div>
                
            @endif


    </div>
@endsection