@extends ('layouts.main')
 @section ('title', 'Criar Contato')
 @section ('content')

    <form action="/contato" method="POST">
        @csrf
        <label>Digite seu nome:</label><br>
        <input type="text" name="nome"><br>

        <label>Digite seu e-mail:</label><br>
        <input type="text" name="email"><br>

        <label>Digite seu telefone:</label><br>
        <input type="text" name="telefone"><br>

        <label>Selecione seu genero</label><br>
        <select name="genero" id="genero" require>
            @foreach($generos as $genero)
            <option value="{{$genero->id}}">{{$genero->tipo}}</option>
            @endforeach
        </select><br>

        <button type="submit">Criar contato</button>
    </form>

@endsection