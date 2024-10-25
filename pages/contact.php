<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos - Imobiliária Sukita</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!-- Navbar -->
    <header>
        <?php include '../components/header.php'; ?>
    </header>

    <!-- Informações de Contato e Mapa -->
    <section class="contact-map-section py-3">
        <div class="container">
            <div class="row">
                <!-- Coluna de Contato -->
                <div class="col-md-6">
                    <h2 class="h3 mb-4">Entre em Contato Conosco</h2>
                    <ul class="list-unstyled">
                        <li><strong>Endereço:</strong> Rua José Alves Pereira, 757, Souza, Rio Manso - MG, 35485000</li>
                        <li><strong>Telefone:</strong> (31) 99999-9999</li>
                        <li><strong>Email:</strong> contato@imobiliariasukita.com.br</li>
                        <li><strong>Horário de Atendimento:</strong> Segunda a Sexta - 08h às 18h</li>
                    </ul>
                </div>

                <!-- Coluna do Mapa -->
                <div class="col-md-6">
                    <h2 class="h3 mb-4">Nosso Endereço no Mapa</h2>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3779.4639026242156!2d-44.30501918461719!3d-20.317725886396773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6d8af8bfba5ecf32!2sRua%20Jos%C3%A9%20Alves%20Pereira%2C%20757%20-%20Souza%2C%20Rio%20Manso%20-%20MG%2C%2035485-000!5e0!3m2!1spt-BR!2sbr!4v1698078252206!5m2!1spt-BR!2sbr"
                            width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
<?php include '../components/footer.php'; ?>
</footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
