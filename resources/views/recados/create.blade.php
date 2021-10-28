{{--  Página para adicionar novos recados --}}

@extends('templates.base')
@section('title', 'Inserir Recados')
@section('h1', 'Inserir Recados')

@section('content')
<div class="row">
    <div class="col-4">

        {{-- Formulário para colocar as informações referentes aos recados --}}
        <form method="post" action="{{ route('recados.gravar') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection