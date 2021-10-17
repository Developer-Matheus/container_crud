@extends('layouts.master')

@section('content')

    <div class="container">
        <h1 class="text-center">
            Movimentações
        </h1>
        <div class="row">
            <div class="container mt-4">
                <a name="" id="" class="btn btn-primary mb-5" href="{{ Route('movements.create') }}" role="button">
                    Cadastrar
                </a>

                <table class="table" id='table_container'>
                    <thead>
                        <tr>
                            <th>Container</th>
                            <th>Tipo</th>
                            <th>Inicio</th>
                            <th>Fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movements as $movement)
                            <tr>
                                <td>{{ $movement->getContainer()->number }}</td>
                                <td>{{ $movement->getType()->type }}</td>
                                <td>{{ $movement->start_at }}</td>
                                <td>{{ $movement->end_at }}</td>
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
