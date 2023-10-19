@extends('layout')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container">
    <form action="{{route('login.entrar')}}" method="POST">
        <div class="row justify-content-center p-5">

            @csrf @method('POST')
            <div class="col-4 bg-white shadow-sm mt-5 py-4">
                <h4 class="m-3 text-center text-secondary">
                    Ingresar
                </h4>
                
                <div class="row justify-content-center">
                    <div class="col-5 text-center">
                            <i class="fa fa-birthday-cake fa-2x text-info "></i>
                    </div>
                </div>

                <div class="form-group mx-5">
                    <label for="">Email:</label>
                    <input type="text" name="email" class="form-control ">
                </div>

                <div class="form-group mx-5">
                    <label for="">Password:</label>
                    <input type="password" name="password" class="form-control ">
                </div>

                <div class="form-group text-center mt-4 mb-4">
                    <button class="btn btn-success">
                        Entrar
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
    
@endsection