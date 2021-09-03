@extends('layouts.plantilla')

    @section('contenido')

 

     

            <h1>Agregar Excel</h1>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">
    
                <form action="/agregarExcel" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre"
                         value="{{old("nombre")}}"
                         class="form-control" id="nombre" >

                     <label for="date">Fecha</label>
                     <input type="date" name="date"
                         value="{{old("date")}}"
                        class="form-control" id="date" >

                        <label for="archivo">Archivo</label>
                        <input type="file" name="archivo"
                            value="{{old("archivo")}}"
                             class="form-control" id="archivo" >


                    </div>
                    <button class="btn btn-success mr-3 btn-block">Agregar </button>
                </form>

                <a href="/" class="btn btn-outline-secondary mt-3 btn-block">Volver a menu</a>
            </div>
            


        </div>


        @if( $errors->any() )
        <div class="alert alert-danger col-8 mx-auto p-2">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @endsection

