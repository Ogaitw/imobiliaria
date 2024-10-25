<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['u643210332_ogaitw'])) {
    header('Location: index.php');
    exit;
}

// Conexão com o banco de dados
try {
    $conn = new PDO("mysql:host=localhost;dbname=seu_banco_de_dados", "seu_usuario", "sua_senha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Verifica se o ID do imóvel foi passado
if (!isset($_GET['id'])) {
    header('Location: dashboard.php'); // Redireciona se não tiver ID
    exit;
}

$property_id = $_GET['id'];

// Busca os dados do imóvel
$query = "SELECT p.*, a.street, a.city, a.state, a.zip_code 
          FROM properties p 
          JOIN addresses a ON p.address_id = a.id 
          WHERE p.id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$property_id]);
$property = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o imóvel foi encontrado
if (!$property) {
    header('Location: dashboard.php'); // Redireciona se o imóvel não for encontrado
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($property['property_name']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'components/header.php'; ?>
    </header>

    <div class="container mt-5">
        <h2><?php echo htmlspecialchars($property['property_name']); ?></h2>
        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($property['street'] . ', ' . $property['city'] . ', ' . $property['state'] . ' - ' . $property['zip_code']); ?></p>
        <p><strong>Preço:</strong> R$ <?php echo htmlspecialchars(number_format($property['property_price'], 2, ',', '.')); ?></p>
        <p><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($property['property_description'])); ?></p>
        
        <h4>Detalhes Adicionais:</h4>
        <ul>
            <li><strong>Tipo:</strong> <?php echo htmlspecialchars($property['property_type_id']); ?></li>
            <li><strong>Ano de Construção:</strong> <?php echo htmlspecialchars($property['construction_year']); ?></li>
            <li><strong>Área Construída:</strong> <?php echo htmlspecialchars($property['built_area']) . ' m²'; ?></li>
            <li><strong>Quartos:</strong> <?php echo htmlspecialchars($property['bedrooms']); ?></li>
            <li><strong>Suítes:</strong> <?php echo htmlspecialchars($property['suites']); ?></li>
            <li><strong>Banheiros:</strong> <?php echo htmlspecialchars($property['bathrooms']); ?></li>
            <li><strong>Garagens:</strong> <?php echo htmlspecialchars($property['garages']); ?></li>
            <li><strong>Área Total:</strong> <?php echo htmlspecialchars($property['total_area']) . ' m²'; ?></li>
            <li><strong>Piso do Apartamento:</strong> <?php echo htmlspecialchars($property['apartment_floor'] ?? 'N/A'); ?></li>
            <li><strong>Possui Elevador:</strong> <?php echo $property['has_elevator'] ? 'Sim' : 'Não'; ?></li>
            <li><strong>Possui Piscina:</strong> <?php echo $property['has_pool'] ? 'Sim' : 'Não'; ?></li>
            <li><strong>Mobiliado:</strong> <?php echo $property['is_furnished'] ? 'Sim' : 'Não'; ?></li>
            <li><strong>Segurança:</strong> <?php echo $property['has_security'] ? 'Sim' : 'Não'; ?></li>
            <li><strong>Permite Animais de Estimação:</strong> <?php echo $property['allows_pets'] ? 'Sim' : 'Não'; ?></li>
        </ul>

        <h4>Imagens e Vídeos:</h4>
        <div class="row">
            <?php
            // Busca as mídias do imóvel
            $query_media = "SELECT media_type, media_path FROM property_media WHERE property_id = ?";
            $stmt_media = $conn->prepare($query_media);
            $stmt_media->execute([$property_id]);
            $media_files = $stmt_media->fetchAll(PDO::FETCH_ASSOC);

            foreach ($media_files as $media) {
                if ($media['media_type'] === 'image') {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<img src="' . htmlspecialchars($media['media_path']) . '" class="img-fluid" alt="Imóvel">';
                    echo '</div>';
                } elseif ($media['media_type'] === 'video') {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<video controls class="img-fluid">';
                    echo '<source src="' . htmlspecialchars($media['media_path']) . '" type="video/mp4">';
                    echo 'Seu navegador não suporta a tag de vídeo.';
                    echo '</video>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        
        <a href="dashboard.php" class="btn btn-secondary mt-4">Voltar</a>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
