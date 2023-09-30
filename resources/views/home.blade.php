 @extends ('layouts.main')
 @section ('title', 'Home')
 @section ('content')

     @if($search)
     <label class="titulos">Pesquisando por {{$search}}</h2>
     @endif
     
     <form action="/">
        <fieldset>
        <input type="text" id="search" name="search" class="pesquisa" placeholder="Procurar:"><br>
        <label>Filtrar por:</label>
         <input type="submit" id="search" name="nome" class="filtro" value="Nome">
         <input type="submit" id="search" name="email" class="filtro" value="E-mail"><br>
         
         
         </fieldset>
     </form>

    
 <div id="tabela" class="lista-de-contatos">
     <table>
         <thead>
             <th>Nome</th>
             <th>E-mail</th>
             <th>Telefone</th>
             <th>Cidade</th>
             <th>Editar</th>
             <th>Excluir</th>
         </thead>
         <tbody>
             @foreach($contatos as $contato )
             <tr>
                 <td>{{$contato->nome}}</td>
                 <td>{{$contato->email}}</td>
                 <td>{{$contato->telefone}}</td>
                 <td >{{$contato->cidade}}</td>
                 <td>
                    <a href="contatos/edit/{{$contato->id}}"><ion-icon name="brush-outline"></ion-icon></a>
                </td>
                 <td>
                    <a href="/contatos/excluir/{{$contato->id}}"><ion-icon name="trash-outline"></ion-icon></a>
                 </td>

             </tr>
             @endforeach
         </tbody>
     </table>
     @if(count($contatos)== 0 && $search)
     <p>Não possível encontrar contato com {{$search}}</p>
     <a href="/">Voltar</a>
     @elseif(count($contatos)== 0)
     <p>Não há contatos disponiveis</p>
     @endif
 </div>
 @endsection