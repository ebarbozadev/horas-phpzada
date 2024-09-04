@extends('layouts.Empresa.painel')

@section('title', 'Cadastrar Empresa')

<style>
    .login-title {
        text-align: center;
    }

    form {
        width: 300px;
        margin: 0 auto;
    }

    section {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100dvh - 66px);
    }
</style>

@section('content')
    <section>
        <div>
            <h1 class="login-title">Cadastrar Empresa</h1>
            <form method="POST" action="{{ route('painel.cadastrar.empresa') }}">
                @csrf
                <div class="mb-3">
                    <label for="RAZAO_SOCIAL" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" id="RAZAO_SOCIAL" name="RAZAO_SOCIAL"
                        placeholder="Digite a razão social" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="NOME_FANTASIA" class="form-label">Nome Fantasia</label>
                    <input type="text" class="form-control" id="NOME_FANTASIA" name="NOME_FANTASIA"
                        placeholder="Digite o nome fantasia" required>
                </div>

                <div class="mb-3">
                    <label for="NOME_FANTASIA" class="form-label">Tipo Pessoa</label>
                    <select name="TP_PESSOA" id="TP_PESSOA">
                        <option value="J" selected>Jurídica</option>
                        <option value="F">Física</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="DOCUMENTO" class="form-label">Documento</label>
                    <input type="text" class="form-control" id="DOCUMENTO" name="DOCUMENTO"
                        placeholder="Digite o documento" required>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
