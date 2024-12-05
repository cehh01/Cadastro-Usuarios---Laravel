<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

use App\Models;

class UsuarioController extends Controller
{
    public function tabela()
    {
        $usuarios = Usuario::all();
        return view("tabela", compact("usuarios"));
    }

    public function cadastro()
    {
        return view("cadastro");
    }

    public function salvarCadastro(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|cpf|unique:usuarios,cpf',
            'telefone' => 'required|celular_com_ddd',
            'email' => 'required|email|unique:usuarios,email',
            'rua' => 'required',
            'num_endereco' => 'required|numeric',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'required|formato_cep',
        ], [
            'nome.required' => 'O campo nome é obrigatório!',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório!',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida!',
            'cpf.required' => 'O campo CPF é obrigatório!',
            'cpf.cpf' => 'O CPF informado não é válido!',
            'cpf.unique' => 'O CPF informado já está cadastrado!',
            'telefone.required' => 'O telefone é obrigatório!',
            'email.required' => 'O e-mail é obrigatório!',
            'email.email' => 'O e-mail informado não é válido!',
            'email.unique' => 'O e-mail informado já está cadastrado!',
            'rua.required' => 'O campo rua é obrigatório!',
            'num_endereco.required' => 'O número do endereço é obrigatório!',
            'num_endereco.numeric' => 'O número do endereço deve conter apenas números!',
            'bairro.required' => 'O campo bairro é obrigatório!',
            'cidade.required' => 'O campo cidade é obrigatório!',
            'cep.required' => 'O campo CEP é obrigatório!',
            'cep.formato_cep' => 'O CEP informado não é válido!',
        ]);


        Usuario::create($request->all());

        return redirect()->route('TabelaRoute')->with('succes', 'Cadastrado com sucesso!');
    }

    public function excluirCadastro(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('TabelaRoute')->with('succes', 'Cadastro excluido com sucesso!');
    }

    public function editarCadastro(Usuario $usuario)
    {
        return view('editar', compact('usuario'));
    }

    public function atualizarCadastro(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|cpf|unique:usuarios,cpf',
            'telefone' => 'required|celular_com_ddd',
            'email' => 'required|email|unique:usuarios,email',
            'rua' => 'required',
            'num_endereco' => 'required|numeric',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'required|formato_cep',
        ], [
            'nome.required' => 'O campo nome é obrigatório!',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório!',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida!',
            'cpf.required' => 'O campo CPF é obrigatório!',
            'cpf.cpf' => 'O CPF informado não é válido!',
            'cpf.unique' => 'O CPF informado já está cadastrado!',
            'telefone.required' => 'O telefone é obrigatório!',
            'email.required' => 'O e-mail é obrigatório!',
            'email.email' => 'O e-mail informado não é válido!',
            'email.unique' => 'O e-mail informado já está cadastrado!',
            'rua.required' => 'O campo rua é obrigatório!',
            'num_endereco.required' => 'O número do endereço é obrigatório!',
            'num_endereco.numeric' => 'O número do endereço deve conter apenas números!',
            'bairro.required' => 'O campo bairro é obrigatório!',
            'cidade.required' => 'O campo cidade é obrigatório!',
            'cep.required' => 'O campo CEP é obrigatório!',
            'cep.formato_cep' => 'O CEP informado não é válido!',
        ]);

        $usuario->update($request->all());

        return redirect()->route('TabelaRoute')->with('succes', 'Usuário atualizado com sucesso!');
    }


}
