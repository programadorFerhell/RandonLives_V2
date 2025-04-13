<!DOCTYPE html>
<html lang="en">
<head>
 @include('home.head')
</head>
<body>
 @include('home.nav')
 <div class="container mt-3 col-md-6">
    <table class="table table-hover" id="tabelaSortGames">
        <tbody id="listGames">

        </tbody>

     </table>

     <div class="row">
        <div class="col-md-12 text-center">
            <button id="btnSortear" class="btn btn-success mt-3">Sortear Jogo</button>
            <h4 class="mt-3" id="jogoSorteado"></h4>
        </div>
    </div>


 </div>

 @include('home.footerjs')
 <script src="{{asset('assets/js/games.js')}}"></script>
</body>
</html>
