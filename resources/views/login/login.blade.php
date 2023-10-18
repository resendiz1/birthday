@extends('layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 bg-white shadow-sm mt-5">
            <h4 class="m-3 text-center text-primary">
                Entrar
            </h4>
            
            <div class="row justify-content-center">
                <div class="col-3 text-center">
                    <i class="fa fa-birthday-cake fa-2x text-danger"></i>
                </div>
            </div>

            <div class="form-group mx-5">
                <label for="">Usuario:</label>
                <input type="text" class="form-control ">
            </div>

            <div class="form-group mx-5">
                <label for="">Password:</label>
                <input type="password" class="form-control ">
            </div>

            <div class="form-group text-center mt-4 mb-4">
                <button class="btn btn-success">
                    Entrar
                </button>
            </div>

        </div>
    </div>
</div>
    
@endsection