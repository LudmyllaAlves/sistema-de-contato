@extends ('layouts.main')
@section ('title', 'Home')
@section ('content')

<div class="contatos">
    
    <form action="/contatos/{{$contato->id}}" method="POST">
        @csrf
        @method('DELETE')
        <label >Tem certeza que deseja excluir?</label><br>
        <button type="submit" value="excluir"><ion-icon name="trash-outline"></ion-icon>Sim</button>
        <button type="button" value="cancelar"><ion-icon name="close-outline"></ion-icon><a href="/" class="button-cancelar">Não</a></button>
    </form>
</div>


@endsection