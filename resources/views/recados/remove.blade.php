{{--  Página de segurança antes da exclusão das informações gerais --}}

@extends('templates.base')
@section('title', 'Remover Recado')
@section('h1', 'Remover Recado')

@section('content')
<div class="row">
    <div class="col">

        <div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <strong>Cuidado!</strong> Você está prestes a remover esse Recado!
        </div>

        <p> Nome: {{$reca->nome}}</p>
        <p>Você tem certeza que deseja apagar este recado para sempre?</p>

        <form method="post" action="{{ route('recados.delete', $reca) }}">
            @csrf
            @method('delete')
            
            <input type="submit" class="btn btn-danger" value="Pode apagar sem medo">
            <a href="{{ route('recados') }}" class="btn btn-secondary">Desculpa, eu cliquei errado!</a>
        </form>

        

    </div>
</div>
@endsection