@extends ('layouts.main')
@section ('title', 'Criar Contato')
@section ('content')

<div class="contatos">
    <form action="/contato" method="POST">
        <fieldset>
        @csrf
        <label>Digite seu nome:</label><br>
        <input type="text" name="nome"><br>

        <label>Digite seu e-mail:</label><br>
        <input type="text" name="email" id="email"  placeholder="joao@gmail.com"><br>
        @foreach($errors->get('email') as $mensagem)
        <p class="text-danger">{{ $mensagem }}</p>
        @endforeach

        <label>Digite seu telefone:</label><br>
        <input type="text" id="telefone" name="telefone" data-inputmask="'mask': '(99) 99999-9999'"><br>
        @foreach($errors->get('telefone') as $mensagem)
        <p class="text-danger">{{ $mensagem }}</p>
        @endforeach
        <label>Selecione seu genero</label><br>
        <select name="genero" id="genero" require>
            @foreach($generos as $genero)
            <option value="{{$genero->id}}">{{$genero->tipo}}</option>
            @endforeach
        </select><br>

        <button type="submit">Criar contato</button>
        </fieldset>
    </form>
</div>



@endsection

<!-- Inclua a biblioteca jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inclua o Inputmask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function() {
        // Selecione o campo de input pelo seu ID e aplique a máscara
        $('#telefone').inputmask();
    });
</script>