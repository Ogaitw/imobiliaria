<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Abelardo Lopes Imoveis - Início</title>
    <meta name="description" content="Descubra imóveis em destaque na Imobiliária Sukita. Encontre a casa dos seus sonhos hoje mesmo.">
    <meta name="keywords" content="imóveis, casas, apartamentos, venda, aluguel">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <header>
    <?php include 'components/header.php'; ?>
    </header>

    <!-- Filtro de Imóveis -->
    <div  id="filters" >
        <div class="filter">
            <form class="row">
                <div class="col-md-1 mb-2">
                    <input type="text" class="form-control" placeholder="Cidade">
                </div>
                <div class="col-md-1 mb-2">
                    <input type="text" class="form-control" placeholder="Bairro">
                </div>
                <div class="col-md-1 mb-2">
                    <input type="text" class="form-control" placeholder="Tipo">
                </div>
                <div class="col-md-1 mb-2">
                    <input type="text" class="form-control" placeholder="Aluguel/Venda">
                </div>
                <div class="col-md-1 mb-2">
                    <input type="number" class="form-control" placeholder="Valor mínimo">
                </div>
                <div class="col-md-1 mb-2">
                    <input type="number" class="form-control" placeholder="Valor máximo">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" placeholder="ID do imóvel">
                </div>
                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary filter-btn">
                        <i class="bi bi-search"></i> Buscar Imóvel
                    </button>
                </div>
                <div class="col-md-2 mb-2">
                <button type="button" class="btn btn-inline-danger filter-btn" style="font-weight: 600 ;">
                    <i class="bi bi-x-circle"></i> Limpar Filtro
                </button>

            </div>
         </div>
        
   </div>
    </div>

    <!-- Carrossel -->
    <div id="imoveisCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://th.bing.com/th/id/OIP.676WsDd6oLeYiLfkmGAirgHaE8?rs=1&pid=ImgDetMain"
                    class="d-block w-100" alt="Imóvel 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Imóvel 1</h5>
                    <p>R$ 500.000,00</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.decorfacil.com/wp-content/uploads/2016/03/imagem46-8.jpg"
                    class="d-block w-100" alt="Imóvel 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Imóvel 2</h5>
                    <p>R$ 350.000,00</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://th.bing.com/th/id/R.62cc219bc9c1e1e52625c764e1897513?rik=toY7yfjXnMafCg&riu=http%3a%2f%2fimages.arquidicas.com.br%2fwp-content%2fuploads%2f2015%2f02%2f11174503%2fcasa-com-telhado.jpg&ehk=ZvseuysY50aYZmZyoV2xUYL6mEpmBh1Li518Zcrxbc0%3d&risl=&pid=ImgRaw&r=0"
                    class="d-block w-100" alt="Imóvel 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Imóvel 3</h5>
                    <p>R$ 750.000,00</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imoveisCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imoveisCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>




    <?php include 'components/card-house.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Imóveis em Destaque</h2>
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

    </div>
    <footer class="bg-light text-center text-lg-start pastel-footer mt-5">
    <?php include 'components/footer.php'; ?>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-OYyqXtOYwCl22bIj0HtpA4ocbI7R+B0XjTb/U8Cw9AaNq+THm6Da2xubRlZ8HtH5" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-J6qa4849blE+I7W2j6D0h5EY+c9ZfExBd2D8U6QfrQj/URD0kAZtRzO0yUuW5JzK" crossorigin="anonymous">
    </script>
</body>

</html>
