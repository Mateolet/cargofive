@extends('layouts.plantilla')

    @section('contenido')

        <h1>Vista Tabla</h1>


        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>

                </tr>
                <tr>
                    <th>
                        {{$contract->nombre}}
                    </th>
                    <th>
                        {{$contract->date}}
                    </th>
                <th>
                    <a href="/" class="btn btn-outline-secondary">Volver a Menu</a>
                    <th><a href="/adminTablas" class="btn btn-dark">Volver a plantillas</a></th>
                </th>
                </tr>


                <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Tarifa 20</th>
                    <th>Tarifa 40</th>
                    <th>Tarifa 40 HC</th>
                    <th>Moneda</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($contract->rates as $rate) 
           
                <tr>
                    <td>{{$rate->origin}}</td>
                    <td>{{$rate->destination}}</td>
                    <td>{{$rate->currency}}</td>
                    <td>{{$rate->twenty}} </td>
                    <td>{{$rate->forty}}</td>
                    <td>{{$rate->fortyhc}}</td>
                </tr>

 @endforeach 
            </tbody>
        </table>

      
        
    @endsection