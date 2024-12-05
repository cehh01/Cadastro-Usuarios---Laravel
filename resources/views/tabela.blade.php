<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tabela de cadastrados</title>
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="botao-cadastrar m-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCadastro">
                    Cadastrar
                </button>
            </div>
            <div>
                @if(session()->has('succes'))
                    <div class="alert alert-info alert-dismissible fade show m-2" style="width: auto;" role="alert"
                        style="width: 500px;">
                        {{session('succes')}}
                        <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
            </div>

        </div>



        <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCadastroLabel">Cadastro de Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" novalidate action="{{ route('salvarCadastro') }}">
                            @csrf
                            <div class="row">
                                <p>Informações pessoais</p>
                                <div class="mb-3 col">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control"
                                        value="{{ old('nome') }}" required>
                                    @error('nome')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
                                        value="{{ old('data_nascimento') }}" required>
                                    @error('data_nascimento')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}"
                                        required>
                                    @error('cpf')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <p>Informações de contato</p>
                                <div class="mb-3 col">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control"
                                        value="{{ old('telefone') }}" required>
                                    @error('telefone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <p>Endereço</p>
                                <div class="mb-3 col">
                                    <label for="rua" class="form-label">Rua</label>
                                    <input type="text" name="rua" id="rua" class="form-control" value="{{ old('rua') }}"
                                        required>
                                    @error('rua')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" name="num_endereco" id="num_endereco" class="form-control"
                                        value="{{ old('num_endereco') }}" required>
                                    @error('num_endereco')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control"
                                        value="{{ old('bairro') }}" required>
                                    @error('bairro')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control"
                                        value="{{ old('cidade') }}" required>
                                    @error('cidade')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep') }}"
                                        required>
                                    @error('cep')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabela-container">
            <div class="tabela">
                <table class="table table-striped table-bordered table-sm text-center">
                    <thead class="table-ligth">
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Data de nascimento</th>
                            <th>CPF</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    @if ($usuarios->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Nenhum usuário cadastrado no momento.</td>
                        </tr>
                    @else

                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->nome}}</td>
                                <td>{{$usuario->data_nascimento}}</td>
                                <td>{{$usuario->cpf}}</td>
                                <td class="d-flex justify-content-center gap-2">
                                    <div>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalUsuario{{ $usuario->id }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                                class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg></button>
                                    </div>

                                    <div>
                                        <form method="post" novalidate action="{{route('excluirCadastro', $usuario->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></button>
                                        </form>
                                    </div>

                                    <div>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editarUsuarioModal{{ $usuario->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                                class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                            </svg>
                                        </button>

                                    </div>


                                </td>
                            </tr>
                            <div class="modal fade" id="modalUsuario{{ $usuario->id }}" tabindex="-1"
                                aria-labelledby="modalLabel{{ $usuario->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $usuario->id }}">Detalhes do Usuário</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Informações pessoais</p>
                                            <div class="row">
                                                <div class="mb-3 col">
                                                    <label for="nome" class="form-label">Nome</label>
                                                    <input type="text" name="nome" id="nome" class="form-control"
                                                        placeholder="{{ $usuario->nome }}" disabled>
                                                </div>
                                                <div class="mb-3 col">
                                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                                    <input type="date" name="data_nascimento" id="data_nascimento"
                                                        class="form-control" placeholder="{{ $usuario->data_nascimento }}"
                                                        disabled>
                                                </div>
                                                <div class="mb-3 col">
                                                    <label for="cpf" class="form-label">CPF</label>
                                                    <input type="text" name="cpf" id="cpf" class="form-control"
                                                        placeholder="{{ $usuario->cpf }}" disabled>
                                                </div>
                                            </div>
                                            <p>Informações de contato</p>
                                            <div class="row">
                                                <div class="mb-3 col">
                                                    <label for="telefone" class="form-label">Telefone</label>
                                                    <input type="text" name="telefone" id="telefone" class="form-control"
                                                        placeholder="{{ $usuario->telefone }}" disabled>
                                                </div>
                                                <div class="mb-3 col">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="{{ $usuario->email }}" disabled>
                                                </div>
                                            </div>

                                            <p>Endereço</p>
                                            <div class="row">
                                                <div class="mb-3 col">
                                                    <label for="rua" class="form-label">Rua</label>
                                                    <input type="text" name="rua" id="rua" class="form-control"
                                                        placeholder="{{ $usuario->rua }}" disabled>
                                                </div>
                                                <div class="mb-3 col">
                                                    <label for="numero" class="form-label">Número</label>
                                                    <input type="text" name="num_endereco" id="num_endereco"
                                                        class="form-control" placeholder="{{ $usuario->num_endereco }}"
                                                        disabled>
                                                </div>
                                                <div class="mb-3 col">
                                                    <label for="bairro" class="form-label">Bairro</label>
                                                    <input type="text" name="bairro" id="bairro" class="form-control"
                                                        placeholder="{{ $usuario->bairro }}" disabled>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 col">
                                                    <label for="cidade" class="form-label">Cidade</label>
                                                    <input type="text" name="cidade" id="cidade" class="form-control"
                                                        placeholder="{{ $usuario->cidade }}" disabled>
                                                </div>
                                                <div class="mb-3 col">
                                                    <label for="cep" class="form-label">CEP</label>
                                                    <input type="text" name="cep" id="cep" class="form-control"
                                                        placeholder="{{ $usuario->cep }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editarUsuarioModal{{ $usuario->id }}" tabindex="-1"
                                aria-labelledby="editarUsuarioModalLabel{{ $usuario->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarUsuarioModalLabel{{ $usuario->id }}"
                                                style="text-transform:capitalize">Editar
                                                Usuário - {{$usuario->nome}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" novalidate
                                                action="{{ route('atualizarCadastro', $usuario->id) }}">
                                                @csrf
                                                @method('PUT') 
                                                <div class="row">
                                                    <p>Informações pessoais</p>
                                                    <div class="mb-3 col">
                                                        <label for="nome" class="form-label">Nome</label>
                                                        <input type="text" name="nome" id="nome" class="form-control"
                                                            value="{{$usuario->nome}}" required>
                                                    </div>
                                                    <div class="mb-3 col">
                                                        <label for="data_nascimento" class="form-label">Data de
                                                            Nascimento</label>
                                                        <input type="date" name="data_nascimento" id="data_nascimento"
                                                            class="form-control" value="{{$usuario->data_nascimento}}" required>
                                                    </div>
                                                    <div class="mb-3 col">
                                                        <label for="cpf" class="form-label">CPF</label>
                                                        <input type="text" name="cpf" id="cpf" class="form-control"
                                                            value="{{$usuario->cpf}}" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <p>Informações de contato</p>
                                                    <div class="mb-3 col">
                                                        <label for="telefone" class="form-label">Telefone</label>
                                                        <input type="text" name="telefone" id="telefone" class="form-control"
                                                            value="{{$usuario->telefone}}" required>
                                                    </div>
                                                    <div class="mb-3 col">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            value="{{$usuario->email}}" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p>Endereço</p>
                                                    <div class="mb-3 col">
                                                        <label for="rua" class="form-label">Rua</label>
                                                        <input type="text" name="rua" id="rua" class="form-control"
                                                            value="{{$usuario->rua}}" required>
                                                    </div>
                                                    <div class="mb-3 col">
                                                        <label for="numero" class="form-label">Número</label>
                                                        <input type="text" name="num_endereco" id="num_endereco"
                                                            class="form-control" value="{{$usuario->num_endereco}}" required>
                                                    </div>
                                                    <div class="mb-3 col">
                                                        <label for="bairro" class="form-label">Bairro</label>
                                                        <input type="text" name="bairro" id="bairro" class="form-control"
                                                            value="{{$usuario->bairro}}" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3 col">
                                                        <label for="cidade" class="form-label">Cidade</label>
                                                        <input type="text" name="cidade" id="cidade" class="form-control"
                                                            value="{{$usuario->cidade}}" required>
                                                    </div>
                                                    <div class="mb-3 col">
                                                        <label for="cep" class="form-label">CEP</label>
                                                        <input type="text" name="cep" id="cep" class="form-control"
                                                            value="{{$usuario->cep}}" required>
                                                    </div>

                                                </div>

                                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>