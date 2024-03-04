@extends('layouts.app')

@section('content')
    <div>
        <div class="card-header d-inline-flex">
            <h5>Clientes</h5>
            <a href="{{route('clientes.create')}}" class="btn btn-primary ml-auto">
                Agregar
            </a>
        </div>

        <div class="card-body">

            <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <a class="navbar-brand">Listar</a>
                    <select class="custom-select" id="limit" name="limit">
                        @foreach([10,20,50,100] as $limit)
                        <option value="{{$limit}}" @if(isset($_GET['limit'])) {{($_GET['limit']==$limit)?'selected': ''}} @endif>{{$limit}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <a class="navbar-brand">Buscar</a>
                    <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search" value="{{ (isset($_GET['search']))?$_GET['search']:''}}">
                </div>
            </div>
            </div>

            @if($clientes->total()>5)
            {{$clientes->links() }}
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">nombre</th>
                            <th scope="col">apellidoPaterno</th>
                            <th scope="col">apellidoMaterno</th>
                            <th scope="col">rfc</th>
                            <th scope="col">telefono</th>
                            <th scope="col">correo</th>
                            <th scope="col">direccion</th>
                            <th scope="col">idProducto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <th>{{$cliente->nombre}}</th>
                            <td>{{$cliente->apellidoPaterno}}</td>
                            <td>{{$cliente->apellidoMaterno}}</td>
                            <td>{{$cliente->rfc}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->correo}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>{{$cliente->idProducto}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('clientes.show',$cliente->idCliente)}}" class="btn btn-info"><img src="https://cdn.icon-icons.com/icons2/2065/PNG/512/view_show_icon_124811.png" alt="" height="20" width="20"></a>
                                <a href="{{route('clientes.edit',$cliente->idCliente)}}" class="btn btn-warning"><img src="https://www.freeiconspng.com/thumbs/edit-icon-png/edit-new-icon-22.png" alt="" height="20" width="20"></a>
                                <button type="submit" class="btn btn-danger" form="delete_{{$cliente->idCliente}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                <img src="https://cdn-icons-png.freepik.com/512/1345/1345874.png" alt="" height="20" width="20">
                                </button>

                                <form action="{{route('clientes.destroy',$cliente->idCliente)}}" id="delete_{{$cliente->idCliente}}" method="POST" enctype="multipart/form-date" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class ="card-footer">
            @if($clientes->total()>5)
            {{$clientes->links() }}
            @endif
        </div>
    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
<Script type="text/javascript">
    $('#limit').on('change', function(){
        window.location.href="{{ route('proveedores.index')}}?limit=" + $(this).val()+ '&search=' + $('#search').val()
    })
    
    $('#search').on('keyup', function(e){
        if(e.keyCode == 13){
            window.location.href="{{ route('proveedores.index')}}?limit=" +$('#limit').val()+'&search='+$(this).val()
        }
    })
    </Script>
@endsection
