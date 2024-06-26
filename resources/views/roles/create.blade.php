@extends('layouts.app')
@section('content')

<h1>Nuevo Rol</h1>

    <form action="{{ route('roles.store') }}"  method="POST" id="frmCreate">
        @csrf

        <input type="hidden" id="permissions" name="permissions" />

        <div class="col-md-12">
            <div class="form-label">       
                <input name="name" class="form-control" placeholder="Nombre..." />
            </div>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h3 class="card-title">Permisos</h3>

            <div class="row">
                @foreach ($modules as $key=>$module)

                    <div class="col-md-3 mt-3">
                        <h5>{{ $key }}</h5>

                        @foreach ($module as $permission )
                            <div class="col-md-3 mt-3">
                                <input class="form-check-input permission"
                                   type="checkbox"
                                   data-permission-id="{{$permission->id}}"
                                   id="permission_{{$permission->id}}">
                                <label class="form-check-label" for="permission_{{$permission->id}}">{{$permission->description}}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" form="frmCreate" id="btnSave" >Guardar</button>
        <a class="btn btn-danger" href="{{route('roles.index')}}">Cancelar</a>
    </div>


@endsection

<script type="module">
    $(document).ready(function(){
        $("#btnSave").click(function(event){
            const permissions = $('.permission:checked');

            let permissionIds = [];

            permissions.each( function(){

                const permissionId = $(this).data('permission-id');
                permissionIds.push(permissionId);
            });
            $('#permissions').val(JSON.stringify(permissionIds));

        });
    });
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
