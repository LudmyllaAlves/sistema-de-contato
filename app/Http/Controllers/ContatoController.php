<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Genero;
use Illuminate\Validation\Rule;

class ContatoController extends Controller
{
    public function  index()
    {
        $search = request('search');
        $nome = request('nome');
        $email = request('email');
        $contatos = Contato::with('genero')->get();

        if ($search) {
            $contatos = Contato::where([['nome', 'LIKE', '%' . $search . '%']])->get();
        } elseif ($nome) {
            $contatos = Contato::orderBy('nome', 'asc')->get();
        } elseif ($email) {
            $contatos = Contato::orderBy('email', 'asc')->get();
        } else {
            $contatos = Contato::all();
        }


        return view('home', ['contatos' => $contatos, 'search' => $search] , compact('contatos'));
    }

    public function create()
    {

        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $mensagens = [
            'email.required' => 'O campo de email é obrigatório.',
            'email.regex' => 'O email informado não é válido.',
            'telefone.required' => 'O campo de email é obrigatório.',
            'telefone.regex' => 'O telefone informado não é válido.'

        ];
        $request->validate([
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            ]
        ], $mensagens);

        $contato = new Contato();

        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->genero = $request->genero;

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
        $generos = Genero::all();

        return view('contatos.edit', ['contato' => $contato, 'generos' => $generos]);
    }

    public function update(Request $request)
    {
        $mensages = [
            'email.required' => 'O campo de email é obrigatório.',
            'email.regex' => 'O email informado não é válido.',
            'telefone.required' => 'O campo de email é obrigatório.',
            'telefone.regex' => 'O telefone informado não é válido.'

        ];
        $request->validate([
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            ]
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
        $generos = Genero::all();

        return view('contatos.excluir', ['contato' => $contato, 'generos' => $generos]);
    }
}
