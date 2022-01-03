@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-3 text-center">
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
            <form action="#" method="POST">
                <textarea name="" class="form-control" id=""  rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm">Guardar Frase</button>
            </form>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- Termina el modal --}}




<div class="row justify-content-center p-3">
    <h3 class="text-center mt-3">Frases Disponibles</h3>
    <div class="col-9 bg-white shadow rounded p-4 mt-3">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id ratione vero rerum reprehenderit. Itaque, impedit illum quas iusto, doloremque hic doloribus ipsa aspernatur incidunt modi ab unde vitae ex excepturi.
    </div>
</div>





















</div>

  
 






@endsection