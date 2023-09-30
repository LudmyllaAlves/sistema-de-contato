<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function  index()
    {
        $search = request('search');
        $nome = request('nome');
        $email = request('email');
       
            
        if ($search) {
            $contatos = Contato::where([['nome', 'LIKE', '%' . $search . '%']])->get();
        } elseif ($nome) {
            $contatos = Contato::orderBy('nome', 'asc')->get();
        } elseif ($email) {
            $contatos = Contato::orderBy('email', 'asc')->get();
        } else {
            $contatos = Contato::all();
        }


        return view('home', ['contatos' => $contatos, 'search' => $search]);
        

    }

    public function create()
    {

        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $mensagens = [
            'nome.required' => 'Você precisa escolher um nome',
            'email.required' => 'O campo de email é obrigatório.',
            'email.regex' => 'O email informado não é válido.',
            'telefone.required' => 'O campo de telefone é obrigatório.',
            'telefone.regex' => 'O telefone informado não é válido.',
            'cidade.required' =>'Você precisa adiconar uma cidade'

        ];
        $request->validate([
            'nome' => [
                'required'],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            ],
            'cidade' => [
                'required'],
        ], $mensagens);

        $contato = new Contato();

        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->cidade = $request->cidade;

        $contato->save();


        return redirect('/')->with('msg', 'Novo contato inserido!!');
    }

    public function destroy($id)
    {
        Contato::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Contato excluido!!!');
    }

    public function edit($id)
    {
        $contato = Contato::findOrFail($id);


        return view('contatos.edit', ['contato' => $contato]);
    }

    public function update(Request $request)
    {
        $mensages = [
            'nome.required' => 'Você precisa escolher um nome',
            'email.required' => 'O campo de email é obrigatório.',
            'email.regex' => 'O email informado não é válido.',
            'telefone.required' => 'O campo de telefone é obrigatório.',
            'telefone.regex' => 'O telefone informado não é válido.',
            'cidade.required' =>'Você precisa adiconar uma cidade'

        ];
        $request->validate([
            'nome' => [
                'required'],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            ],
            'cidade' => [
                'required'],
        ], $mensages);

        $contato = Contato::find($request->id);

        if (!$contato) {
            return redirect('/')->with('msg', 'Contato não encontrado.');
        }

        $contato->update($request->all());

        return redirect('/')->with('msg', 'Contato editado com sucesso.');
    }
    public function excluir($id)
    {
        $contato = Contato::findOrFail($id);

        return view('contatos.excluir', ['contato' => $contato]);
    }
}
