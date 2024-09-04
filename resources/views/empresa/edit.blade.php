@extends('layouts.Empresa.painel')

@section('title', 'Editar Empresa')

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
            <h1 class="login-title">Editar Empresa</h1>
            <form method="POST" action="{{ route('painel.atualizar.empresa', $empresa->id) }}">
                @csrf
                @method('POST') <!-- Laravel utiliza o método POST para atualizar por padrão -->

                <div class="mb-3">
                    <label for="RAZAO_SOCIAL" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" id="RAZAO_SOCIAL" name="RAZAO_SOCIAL"
                        value="{{ old('RAZAO_SOCIAL', $empresa->RAZAO_SOCIAL) }}" placeholder="Digite a razão social"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label for="NOME_FANTASIA" class="form-label">Nome Fantasia</label>
                    <input type="text" class="form-control" id="NOME_FANTASIA" name="NOME_FANTASIA"
                        value="{{ old('NOME_FANTASIA', $empresa->NOME_FANTASIA) }}" placeholder="Digite o nome fantasia"
                        required>
                </div>

                <div class="mb-3">
                    <label for="TP_PESSOA" class="form-label">Tipo Pessoa</label>
                    <select name="TP_PESSOA" id="TP_PESSOA" class="form-control">
                        <option value="J" {{ $empresa->TP_PESSOA == 'J' ? 'selected' : '' }}>Jurídica</option>
                        <option value="F" {{ $empresa->TP_PESSOA == 'F' ? 'selected' : '' }}>Física</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="DOCUMENTO" class="form-label">Documento</label>
                    <input type="text" class="form-control" id="DOCUMENTO" name="DOCUMENTO"
                        value="{{ old('DOCUMENTO', $empresa->DOCUMENTO) }}" placeholder="Digite o documento" required>
                </div>

                <div class="mb-3">
                    <label for="ATIVO" class="form-label">Ativo</label>
                    <select name="ATIVO" id="ATIVO" class="form-control">
                        <option value="1" {{ $empresa->ATIVO ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ !$empresa->ATIVO ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
