<!DOCTYPE html>
<html lang="en">
<head>
 @include('home.head')
</head>
<body>
 @include('home.nav')
 <div class="container mt-3 col-md-6">
    <h4 class="mb-3">Cadastrar Novo Game</h4>

    <form id="formGame">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Jogo</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="genero_id" class="form-label">Gênero</label>
            <select class="form-select" id="genero_id" name="genero_id" required>
                <option value="">Selecione um gênero</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Cadastrar
        </button>
        <a href="{{ route('list_games') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Voltar
        </a>
    </form>
 </div>
 @include('home.footerjs')
 <script src="{{asset('assets/js/games.js')}}"></script>
</body>
</html>
