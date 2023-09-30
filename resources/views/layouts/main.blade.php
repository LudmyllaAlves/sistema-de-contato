<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <header>
    <nav class="container">
                <a id="cabecalho"><b>Sistema de contatos</b></a>
                <a href="/"class="button-header">Lista de contatos</a>
                <a href="/contatos/create"class="button-header">Criar contatos</a>
            </nav>
    </header>
    <main>
         <div>
            @if(session('msg'))
            <p class="msg">{{session('msg')}}</p>
            @endif
            @yield  ('content')
         </div>
    </main>
    <footer>Ludmylla Alves &copy; 2023</footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>
</body>

</html>