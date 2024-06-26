
@extends('layouts.app')

@section('content')
    <h1>Articulos</h1>

    @if (Auth::check() && \App\Helpers\RoleHelper::isAuthorized('Contenidos.showContent'))
        <a href="{{ route('article.create') }}" class="btn btn-primary">Nuevo articulo</a>
    @endif


    <form class="navbar-search" method="GET" action ="{{ route('article.index') }}">
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
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Blog</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>{{ $article->date }}</td>
                    <td>{{ $article->blog->titulo }}</td>
                    <td>
                        @if (Auth::check() && \App\Helpers\RoleHelper::isAuthorized('Contenidos.updateContent'))
                            <a href="{{ route('article.edit', $article->id )}}" class="btn btn-warning">Editar</a>
                        @endif

                        @if (Auth::check() && \App\Helpers\RoleHelper::isAuthorized('Contenidos.deleContent'))
                            <form action="{{ route('article.delete', $article->id )}}" style = "display.contents" method = "POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btnDelete"> Eliminar</button>
                            </form>
                        @endif


                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{ $articles->appends($data->except('page'))->links('vendor.pagination.bootstrap-4') }}


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
