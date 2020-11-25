@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Actividad</div>

                <div class="card-body">


                    <form action="">



                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Descripcion</label>
                            <div class="col-10">
                                <textarea name="textarea" rows="10" class="form-control" name "description" id="description" cols="50"></textarea>
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
        let description = $('#description').val();
        console.log(description)
        let data={
            description,
        }
        let token= '{{ csrf_token() }}';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
          },
            type: "POST",
            url: "/registro-actividad",
            data:data,
            success: function (data) {
                swal("Registro exitoso","El registro realizo exitosamente" , "success");
                document.getElementById("description").value = "";
            },
            error: function (data) {
                swal("Error",""+ data.responseJSON.errors + " \n", "error");
                document.getElementById("description").value = "";
            }
        });

    });
</script>
@endsection
