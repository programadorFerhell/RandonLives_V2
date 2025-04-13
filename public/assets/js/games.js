function cadastrarGame() {
    const data = {
        nome: $('#nome').val(),
        genero_id: $('#genero_id').val()
    };

    $.ajax({
        url: '/api/games/cadastrarGame',
        method: 'POST',
        data: data,
        success: function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Game cadastrado com sucesso!',
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                window.location.href = '/list_games'; // 🔁 ajuste a rota se necessário
            }, 2000);
        },
        error: function (xhr) {
            console.error(xhr);
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Erro ao cadastrar game.'
            });
        }
    });
}

function editarGame() {

}


function carregarGeneros() {
    $.ajax({
        url: '/api/games/generos', // API que lista os gêneros existentes
        method: 'GET',
        success: function (generos) {
            const select = $('#genero_id');
            select.empty();
            select.append('<option value="">Selecione um gênero</option>');

            generos.forEach(function (genero) {
                select.append(`<option value="${genero.id}">${genero.nome}</option>`);
            });
        },
        error: function () {
            alert('Erro ao carregar gêneros.');
        }
    });
}

function listarGame() {
    $.ajax({
        url: '/api/games/listarGames', // Certifique-se que essa rota existe
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            const tbody = $('#tabelaGames tbody');
            tbody.empty();

            if (response.length === 0) {
                tbody.append('<tr><td colspan="3">Nenhum game encontrado.</td></tr>');
            } else {
                response.forEach(function (game, index) {
                    const nome = game.nome;
                    const genero = game.genero ? game.genero.nome : 'Sem gênero';
                    const linha = `
                        <tr>
                            <td>${game.id}</td>
                            <td>${nome}</td>
                            <td>${genero}</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1" onclick="editarGame(${game.id})">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="excluirGame(${game.id})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>`;
                    tbody.append(linha);
                });
            }
        },
        error: function (xhr) {
            console.error(xhr);
            const tbody = $('#tabelaGames tbody');
            tbody.html('<tr><td colspan="3">Erro ao buscar games.</td></tr>');
        }
    });
}

function listGamesSort() {
    $.ajax({
        url: '/api/games/listarGames',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            let tabela = '';
            let contador = 0;

            response.forEach((game, index) => {
                if (contador % 5 === 0) {
                    tabela += '<tr>';
                }

                tabela += `<td>${game.nome}</td>`;
                contador++;

                if (contador % 5 === 0) {
                    tabela += '</tr>';
                }
            });

            if (contador % 5 !== 0) {
                tabela += '</tr>'; // Fecha a última linha se necessário
            }

            $('#listGames').html(tabela);
        },
        error: function () {
            alert('Erro ao carregar os jogos.');
        }
    });

}

function sortear() {
    $.ajax({
        url: 'api/games/randomnome', // 🔹 Rota diferente para o sorteio
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $('#jogoSorteado').text(`Jogo Escolhido: ${response["Jogo escolhido para a Live"]}`);
        },
        error: function () {
            alert('Erro ao sortear o jogo.');
        }
    });
}

$(document).ready(function () {

    console.log(window.location.href);

    listarGame();
    listGamesSort();

    carregarGeneros();

    $(document).on('click', '#btnSortear', function() {
        sortear();
    });

    $('#formGame').on('submit', function (e) {
        e.preventDefault();
        cadastrarGame();
    });
});
