@extends('layouts.app')
@section('content')

    <h1>Blogs</h1>

    <a href="{{ route('blog.create') }}" class="btn btn-primary">Nuevo blog</a>

    <form class="navbar-search" method="GET" action ="{{ route('blog.index') }}">
        <div class="row mt-3">
            <div class = "col-md-auto">
                <select class="form-select bg-ligth bolder-0 small" value="{{$data->records_per_page}}" name="records_per_page">
                    <option {{$data->records_per_page == 2 ? 'selected' : ''}} value = "2">2</option>
                    <option {{$data->records_per_page == 5 ? 'selected' : ''}} value = "5">5</option>
                    <option {{$data->records_per_page == 10 ? 'selected' : ''}} value = "10">10</option>
                    <option {{$data->records_per_page == 20 ? 'selected' : ''}} value = "20">20</option>
                    <option {{$data->records_per_page == 50 ? 'selected' : ''}} value = "50">50</option>
                </select>
            </div>

            <div class = "col-md-11">
                <div class ="input-group-mb-3">
                    <input type = "text"
                           class = "form-control bg-light bolder-0 small"
                           placeholder="Buscar..."
                           aria-label="Search"
                           name="filter"
                           value="{{$data->filter}}"/>

                    <div class ="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->titulo }}</td>
                    <td>{{ $blog->describcion }}</td>
                    <td>{{ $blog->category }}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blog->id )}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('blog.delete', $blog->id )}}" style = "display.contents" method = "POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btnDelete"> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $blogs->appends($data->except('page'))->links('vendor.pagination.bootstrap-4') }}

    <script type="module">

        $(document).ready(function () {

            $('.btnDelete').click(function (event) {

                event.preventDefault();

                const form = $(this).closest('form');

                Swal.fire({

                    title: "¿Desea eliminar el registro?",
                    text: "No podrá revertirlo",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si"

                    }).then((result) => {

                        if (result.isConfirmed) {

                            form.submit();
                        }
                    });
            });

        });

    </script>

@include('layouts.foot')
@endsection
