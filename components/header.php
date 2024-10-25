<?php
$base_url = '/imobiliaria/';
?>

<header>
    <nav class="navbar navbar-expand-lg pastel-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $base_url; ?>">
                <img src="<?php echo $base_url; ?>img/logo.svg" alt="Logo Imobiliária Sukita" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $base_url; ?>">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>pages/house.php">Imóveis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>pages/about.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>pages/contact.php">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
