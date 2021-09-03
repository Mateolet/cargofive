@extends('layouts.plantilla')

    @section('contenido')

        <h1>Eliminar de un contrato</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <span class="lead">Nombre del contrato {{$contract->nombre}}</span>

            <form action="/eliminarContrato" method="post">
                @csrf
                @method("DELETE")

                <input type="hidden" name="id" value="{{$contract->id}}">
                <input type="hidden" name="nombre" value="{{$contract->nombre}}">
                <button class="btn btn-danger mr-3">Eliminar Contrato</button>
                <a href="/adminTablas" class="btn btn-outline-secondary">
                    Volver a Menu
                </a>
            </form>
        </div>


        @if($errors->any())
        <div class="alert alert-danger col-8 mx-auto">

            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
            </ul>

        </div>


        @endif

    @endsection

