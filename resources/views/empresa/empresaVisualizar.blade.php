<!-- resources/views/painel.blade.php -->
@extends('layoutPainelAdministrativo')

@section('title', 'Painel - Empresas')

<style>
    .linkCadastrar:hover {
        background-color: #02c730;
        transition: 1s;
    }

    .linkCadastrar {
        cursor: pointer;
        color: black;
        border-radius: 100%;
        padding: 10px;
        background-color: #009e25;
        position: absolute;
        bottom: 30px;
        right: 30px;
    }

    .linkCadastrar i {
        font-size: 2rem;
    }

    section {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100dvh - 66px);
    }

    div {
        width: 100%;
    }

    div h1 {
        text-align: center;
    }

    table {
        width: 100%;
    }

    th {
        font-size: 1.5rem;
    }

    td {
        font-size: 1.2rem;
    }
</style>

@section('content')
    <section>
        <div>
            <h1 class="my-4">Empresas Cadastradas</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th>Ações</th>
                        <!-- Adicione outras colunas conforme necessário -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->NOME_FANTASIA }}</td>
                            <td>{{ $empresa->DOCUMENTO }}</td>
                            <td>{{ $empresa->ATIVO === 1 ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <a href="{{ route('painel.editar.empresa', $empresa->id) }}">
                                    <i style="cursor: pointer" class="bi bi-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a class="linkCadastrar" href={{ url('/painel/cadastrar/empresa') }}><i class="bi bi-plus-lg"></i></a>
    </section>
@endsection
