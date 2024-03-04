@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Formulario crear cliente</h5>
            <a href="{{ route('clientes.index') }}" class="btn btn-info ml-auto">
                <img src="https://cdn-icons-png.freepik.com/512/5397/5397386.png" alt="" height="20" width="20">
                Regresar
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data" id="create"
                name="create">
                @include('clientes.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" form="create">
                <img src="https://cdn-icons-png.flaticon.com/512/117/117885.png" alt="" height="20"
                    width="20">
                Crear
            </button>
        </div>
    </div>
@endsection
