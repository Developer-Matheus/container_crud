@extends('layouts.master')


@section('content')

    <div class="container">
        <div class="row">
            <div class="container mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6>Cadastro de Containers</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('containers.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="client" class="form-label">Cliente</label>
                                <input type="text" name="client" id=""
                                    class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" placeholder=""
                                    aria-describedby="helpId" value="{{ old('client') }}">

                                @if ($errors->has('client'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->first('client') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3 form-group">
                                <label for="number" class="form-label">Número</label>
                                <input type="text" name="number" id=""
                                    class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}"
                                    placeholder="TEST1234567" aria-describedby="helpId">

                                @if ($errors->has('number'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->first('number') }}
                                    </div>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo</label>
                                <select class="form-control" name="type" id="">
                                    <option value="40">40</option>
                                    <option value="20">20</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" name="status" id="">
                                    <option value="Vazio">Vazio</option>
                                    <option value="Cheio">Cheio</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Categoria</label>
                                <select class="form-control" name="category" id="">
                                    <option value="Importação">Importação</option>
                                    <option value="Exportação">Exportação</option>
                                </select>
                            </div>

                            <button type="submit" name="" id="" class="btn btn-primary">Cadastrar</button>

                            <a name="" id="" class="btn btn-danger" href="{{ Route('containers.index') }}"
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
