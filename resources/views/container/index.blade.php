@extends('layouts.master')

@section('content')

    <div class="container">
        <h1 class="text-center">
            Containers
        </h1>
        <div class="row">
            <div class="container mt-4">
                <a name="" id="" class="btn btn-primary mb-5" href="{{ Route('containers.create') }}" role="button">
                    Cadastrar
                </a>

                <table class="table" id='table_container'>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Numero</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($containers as $container)
                            <tr>
                                <td>{{ $container->client }}</td>
                                <td>{{ $container->number }}</td>
                                <td>{{ $container->type }}</td>
                                <td>{{ $container->status }}</td>
                                <td>{{ $container->category }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#table_container').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'A4'
                }],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
            });
        });
    </script>
@endsection
