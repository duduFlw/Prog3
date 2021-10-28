{{--  Página inicial onde mostra as informações gerais --}}

@extends('templates.base')
@section('title', 'Recados')
@section('h1', 'Página de Recados')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de Recados</p>

        <a class="btn btn-primary" href="{{route('recados.inserir')}}" role="button">Cadastrar Recado</a>
    </div>
</div>

<div class="row">
    {{-- Tabela com as informaçõe dos recados já existentes --}}
    <table class="table">
        <tr>
            <th>ID</th>
            <th width="50%">Nome</th>
            <th>Comentario</th>
            <th>Gerenciar</th>
        </tr>

        {{-- Foreach que busca as informações no banco e mostra todos os cadastros como linhas --}}
        @foreach($recads as $reca)
        <tr>
            <td>{{$reca->id}}</td>
            <td>
                <a href="{{ route('recados', $reca) }}">{{$reca->nome}}</a>
            </td>
            <td>{{$reca->nome}}</td>
            <td>{{$reca->comentario}}</td>
            <td>
                {{-- Botão para fazer a aleração dos recados --}}
                <a href="{{ route('recados.edit', $reca) }}" class="btn btn-primary btn-sm" role="button"><i class="bi bi-pencil-square"></i> Editar</a>
                {{-- Botão com permissão de usuários autenticados para fazer a exclusão dos comentários --}}
                @if (session('usuario'))
                <a href="{{ route('recados.remove', $reca) }}" class="btn btn-danger btn-sm" role="button"><i class="bi bi-trash"></i> Apagar</a> 
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
