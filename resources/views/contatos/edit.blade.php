@extends ('layouts.main')
 @section ('title', 'Editar contato')
 @section ('content')
 @if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
       <p>{{ session('error') }}</p> 
    </div>
@endif
<div class="contatos">
    <form action="/contatos/update/{{$contato->id}}" method="POST">
        @csrf
        @method('PUT')
        <label >Digite um novo nome:</label><br>
        <input type="text" name="nome" value="{{$contato->nome}}"><br>
        <label>Digite um novo e-mail:</label><br>
        <input type="text"name="email" value="{{ $contato->email }}"><br>
        @foreach($errors->get('email') as $mensagem)
        <p class="text-danger">{{ $mensagem }}</p>
        @endforeach
        <label>Digite um novo telefone:</label><br>
        <input type="text" id="telefone" name="telefone" value="{{$contato->telefone}}" data-inputmask="'mask': '(99) 99999-9999'" ><br>
        @foreach($errors->get('telefone') as $mensagem)
        <p role="alert" class="text-danger">{{ $mensagem }}</p>
        @endforeach
        <label>Selecione seu genero</label><br>
        <select name="genero" id="genero" require>
            @foreach($generos as $genero)
            <option value="{{$genero->id}}">{{$genero->tipo}}</option>
            @endforeach
        </select><br>
        <button>Salvar edições</button>
    </form>
</div>
    

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inclua o Inputmask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
$(document).ready(function() {
    // Selecione o campo de input pelo seu ID e aplique a máscara
    $('#telefone').inputmask();
});
</script>