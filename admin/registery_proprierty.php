<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $property_name = $_POST['property_name'];
    $property_street = $_POST['property_street'];
    $property_city = $_POST['property_city'];
    $property_state = $_POST['property_state'];
    $property_zip = $_POST['property_zip'];
    $property_type_id = $_POST['property_type'];
    $property_status_id = $_POST['property_status'];
    $construction_year = $_POST['construction_year'];
    $built_area = $_POST['built_area'];
    $bedrooms = $_POST['bedrooms'];
    $garages = $_POST['garages'];
    $suites = $_POST['suites'];
    $bathrooms = $_POST['bathrooms'];
    $total_area = $_POST['total_area'];
    $property_price = $_POST['property_price'];
    $property_description = $_POST['property_description'];

    // Novos campos adicionados
    $apartment_floor = $_POST['apartment_floor'] ?? null;  // opcional
    $has_elevator = isset($_POST['has_elevator']) ? 1 : 0;  // boolean
    $has_pool = isset($_POST['has_pool']) ? 1 : 0;          // boolean
    $is_furnished = isset($_POST['is_furnished']) ? 1 : 0;  // boolean
    $has_security = isset($_POST['has_security']) ? 1 : 0;  // boolean
    $allows_pets = isset($_POST['allows_pets']) ? 1 : 0;    // boolean

    // Insere o endereço na tabela addresses
    $query_address = "INSERT INTO addresses (street, city, state, zip_code) VALUES (?, ?, ?, ?)";
    $stmt_address = $conn->prepare($query_address);
    $stmt_address->execute([$property_street, $property_city, $property_state, $property_zip]);

    // Obtém o ID do endereço recém-inserido
    $address_id = $conn->lastInsertId();

    // Insere a propriedade na tabela properties
    $query_property = "INSERT INTO properties (property_name, address_id, property_type_id, construction_year, apartment_floor, has_elevator, has_pool, is_furnished, has_security, allows_pets, built_area, bedrooms, garages, suites, bathrooms, total_area, property_price, property_description, property_status_id) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_property = $conn->prepare($query_property);
    $stmt_property->execute([
        $property_name, 
        $address_id, 
        $property_type_id, 
        $construction_year, 
        $apartment_floor, 
        $has_elevator, 
        $has_pool, 
        $is_furnished, 
        $has_security, 
        $allows_pets, 
        $built_area, 
        $bedrooms, 
        $garages, 
        $suites, 
        $bathrooms, 
        $total_area, 
        $property_price, 
        $property_description, 
        $property_status_id
    ]);

    // Obtém o ID da propriedade recém-inserida
    $property_id = $conn->lastInsertId();

    // Processa o upload das mídias (fotos e vídeos)
    $allowed_types = ['image/jpeg', 'image/png', 'video/mp4', 'image/gif'];
    $media_files = $_FILES['property_media'];

    for ($i = 0; $i < count($media_files['name']); $i++) {
        $file_name = $media_files['name'][$i];
        $file_tmp_name = $media_files['tmp_name'][$i];
        $file_type = $media_files['type'][$i];

        // Verifica se o arquivo é do tipo permitido
        if (in_array($file_type, $allowed_types)) {
            // Define o tipo de mídia (imagem ou vídeo)
            $media_type = strpos($file_type, 'video') !== false ? 'video' : 'image';

            // Define o caminho onde o arquivo será salvo
            $media_path = 'uploads/' . uniqid() . '-' . basename($file_name);

            // Move o arquivo para o diretório de uploads
            if (move_uploaded_file($file_tmp_name, $media_path)) {
                // Insere a mídia no banco de dados
                $query_media = "INSERT INTO property_media (property_id, media_type, media_path) VALUES (?, ?, ?)";
                $stmt_media = $conn->prepare($query_media);
                $stmt_media->execute([$property_id, $media_type, $media_path]);
            }
        }
    }

    // Redireciona de volta para o dashboard com uma mensagem de sucesso
    header('Location: dashboard.php?status=success');
    exit;
}
?>
