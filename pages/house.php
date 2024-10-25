<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliária - Lista de Casas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header>
       
    <?php include '../components/header.php'; ?>
    </header>

    <!-- Filtro de Casas -->
    <div id="filters">
        <div class="filter">
            <form class="row">
                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" placeholder="Cidade">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" placeholder="Bairro">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" placeholder="Tipo">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" placeholder="Aluguel/Venda">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="number" class="form-control" placeholder="Valor mínimo">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="number" class="form-control" placeholder="Valor máximo">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" placeholder="ID da casa">
                </div>
                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary filter-btn">
                        <i class="bi bi-search"></i> Buscar Casa
                    </button>
                </div>
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-inline-danger filter-btn" style="font-weight: 600;">
                        <i class="bi bi-x-circle"></i> Limpar Filtro
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <?php include '../components/card-house.php'; ?>

<div class="container mt-5">
    <h2 class="mb-5">Imóveis em Destaque</h2>
    <div class="row">
        <?php
        // Dados de imóveis
        $imoveis = [
            [
                'imagem' => 'https://www.tuacasa.com.br/wp-content/uploads/2015/12/inspiracao-casa-moderna-48.jpg',
                'titulo' => 'Imóvel 1',
                'localizacao' => 'Centro, Cidade X',
                'suites' => 1,
                'quartos' => 3,
                'banheiros' => 2,
                'garagens' => 2,
                'preco' => '500.000,00',
                'status' => 'À Venda'
            ],
            [
                'imagem' => 'https://www.decorfacil.com/wp-content/uploads/2016/03/imagem46-8.jpg',
                'titulo' => 'Imóvel 2',
                'localizacao' => 'Bairro Y, Cidade Z',
                'suites' => 2,
                'quartos' => 4,
                'banheiros' => 3,
                'garagens' => 3,
                'preco' => '750.000,00',
                'status' => 'À Venda'
            ]
        ];

        // Função pura para renderizar os imóveis
        function renderImoveis($imoveis) {
            return array_map(function ($imovel) {
                return renderCardImovel($imovel); // Chama o componente do card
            }, $imoveis);
        }

        // Imprimindo os imóveis
        echo implode('', renderImoveis($imoveis));
        ?>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-5 pastel-footer">
        <div class="container p-4">
            <p>© 2024 Abelardo Lopes Imobiliaria - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
