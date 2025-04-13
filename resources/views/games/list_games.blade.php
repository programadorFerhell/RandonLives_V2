<!DOCTYPE html>
<html lang="en">
<head>
 @include('home.head')
</head>
<body>
 @include('home.nav')
 <div class="container mt-3 col-md-6">
    <div class="mb-2">
        <a href="{{ route('cad_games') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Novo Game
        </a>
    </div>
    <table class="table table-hover" id="tabelaGames">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Genêro</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        </tbody>

     </table>
 </div>

 @include('home.footerjs')
 <script src="{{asset('assets/js/games.js')}}"></script>
</body>
</html>
