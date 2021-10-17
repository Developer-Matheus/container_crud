@extends('layouts.master')


@section('content')

    <div class="container">
        <div class="row">
            <div class="container mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6>Cadastro de Movimentações</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('movements.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="container" class="form-label">Container</label>
                                <select class="form-control" name="container" id="">
                                    @foreach ($containers as $container)
                                        <option value="{{ $container->id }}">{{ $container->number }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo de Movimentação</label>
                                <select class="form-control" name="type" id="">
                                    @foreach ($movementTypes as $movementType)
                                        <option value="{{ $movementType->id }}">{{ $movementType->type }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3 form-group">
                                <label for="start_at" class="form-label">Inicio</label>
                                <input type="datetime-local" name="start_at" id=""
                                    class="form-control {{ $errors->has('start_at') ? 'is-invalid' : '' }}" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <div class="mb-3 form-group">
                                <label for="end_at" class="form-label">Fim</label>
                                <input type="datetime-local" name="end_at" id=""
                                    class="form-control {{ $errors->has('end_at') ? 'is-invalid' : '' }}" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <button type="submit" name="" id="" class="btn btn-primary">Cadastrar</button>

                            <a name="" id="" class="btn btn-danger" href="{{ Route('movements.index') }}"
                                role="button">Cancelar</a>
                        </form>

                    </div>
                    <div class="card-footer text-muted">
                        <small>
                            Gestão de containers
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
