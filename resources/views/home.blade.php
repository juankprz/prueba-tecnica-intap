@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de actividades </div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($activities as $activity)
                         <tr>
                            <th scope="row">{{$activity->id}}</th>
                            <td>{{$activity->description}}</td>
                             <td class="active" >
                                <a class="btn btn-info btn-flat bg-blanco btn-tabla" href="{{  route('activity.show', ['id'=>$activity->id]) }}" ">
                                  <i class="fa fa-eye icon-tabla" aria-hidden="true"></i>Ver mas
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg>
                                </a>
                              </td>
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
