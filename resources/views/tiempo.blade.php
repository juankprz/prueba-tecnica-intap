@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar tiempo</div>

                <div class="card-body">


                    <form action="">
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Actividad</label>
                            <div class="col-10">
                                <select name="activity_id" id="activity_id" class="custom-select my-1 mr-sm-2">
                                    <option value="">Selecione una actividad</option>
                                @foreach ($activities as $activity)
                                 <option value="{{$activity->id}}">{{  $activity->description}}</option>
                                 @endforeach

                                </select>
                              </div>


                          </div>


                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Fecha</label>
                            <div class="col-10">
                              <input class="form-control" type="date" value="2020-01-01"  id="date">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Hora</label>
                            <div class="col-10">
                              <input class="form-control" type="number" id="time">
                            </div>
                          </div>
                          <button type="submit"  class="btn btn-primary" id="Enviar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $("#Enviar").click(function (e) {
        e.preventDefault();
        let activity_id = $('#activity_id').val();
        let date = $('#date').val();
        let time = $('#time').val();
        let data={
            date,
            time,
            activity_id,
        }
        let token= '{{ csrf_token() }}';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
          },
            type: "POST",
            url: "/registro-tiempo",
            data:data,
            success: function (data) {
                swal("Registro exitoso","El registro del tiempo se realizo exitosamente" , "success");
                document.getElementById("activity_id").value = "";
                document.getElementById("date").value = "";
                document.getElementById("time").value = "";
            },
            error: function (data) {
                swal("Error",""+ data.responseJSON.errors + " \n", "error");
                document.getElementById("activity_id").value = "";
                document.getElementById("date").value = "";
                document.getElementById("time").value = "";
            }
        });

    });
</script>
@endsection
