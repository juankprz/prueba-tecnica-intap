@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actividad # {{$activity->id}}</div>

                <div class="card-body">

                <label for=""><h1>Descripcion: {{$activity->description}}</h1></label>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">N° Horas</th>
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($activity->times as $time)

                                <tr>
                                    <th scope="row">{{$time->id}}</th>
                                    <td>{{$time->date}}</td>
                                    <td>{{$time->time}}</td>
                                 </tr>


                             @endforeach


                            </tbody>

                          </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
