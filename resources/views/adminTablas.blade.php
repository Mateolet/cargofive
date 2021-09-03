@extends('layouts.plantilla')

    @section('contenido')

        <h1>Vista de plantillas excel</h1>

        @if ( session('mensaje') )
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th><a href="/" class="btn btn-outline-secondary">Volver a menu</a></th>
                
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Ver</th>
                </tr>
                    
             
            </thead>
            <tbody>
              @foreach ($contracts as $contract) 
           
                <tr>
                    <td>{{$contract->nombre}}</td>
                    <td>{{$contract->date}}</td>
                    <td>
                        <a href="/verExcel/{{$contract->id}}" class="btn btn-outline-dark">
                            Ver
                        </a>
                    </td>
                    <td>
                        <td>
                            <a href="/eliminarContrato/{{$contract->id}}" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                    </td>
                </tr>

 @endforeach 
            </tbody>
        </table>

      

    @endsection