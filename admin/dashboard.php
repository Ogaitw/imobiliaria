<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// Mensagem de sucesso após o cadastro do imóvel
$success_message = '';
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $success_message = 'Property registered successfully!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Property Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Adicione seu arquivo CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-section {
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="login_index.php" class="btn btn-danger mb-3">Logout</a>

        <!-- Mensagem de sucesso -->
        <?php if ($success_message): ?>
            <div class="alert alert-success text-center">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <!-- Formulário de cadastro de imóvel -->
        <div class="form-section">
            <h3>Register a Property</h3>
            <form action="register_property.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="property_name" class="form-label">Property Name</label>
                        <input type="text" name="property_name" class="form-control" id="property_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="property_zip" class="form-label">ZIP Code</label>
                        <input type="text" name="property_zip" class="form-control" id="property_zip" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="property_street" class="form-label">Street</label>
                        <input type="text" name="property_street" class="form-control" id="property_street" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="property_city" class="form-label">City</label>
                        <input type="text" name="property_city" class="form-control" id="property_city" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="property_state" class="form-label">State</label>
                        <input type="text" name="property_state" class="form-control" id="property_state" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="property_type" class="form-label">Property Type</label>
                        <select name="property_type" class="form-control" id="property_type" required>
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Land">Land</option>
                            <option value="Commercial">Commercial</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="construction_year" class="form-label">Year of Construction</label>
                        <input type="number" name="construction_year" class="form-control" id="construction_year" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="built_area" class="form-label">Built Area (sqm)</label>
                        <input type="number" name="built_area" class="form-control" id="built_area" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="bedrooms" class="form-label">Number of Bedrooms</label>
                        <input type="number" name="bedrooms" class="form-control" id="bedrooms" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="garages" class="form-label">Number of Garages</label>
                        <input type="number" name="garages" class="form-control" id="garages" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="suites" class="form-label">Number of Suites</label>
                        <input type="number" name="suites" class="form-control" id="suites" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bathrooms" class="form-label">Number of Bathrooms</label>
                        <input type="number" name="bathrooms" class="form-control" id="bathrooms" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="total_area" class="form-label">Total Area of the Land (sqm)</label>
                        <input type="number" name="total_area" class="form-control" id="total_area" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="property_price" class="form-label">Price (USD)</label>
                        <input type="number" name="property_price" class="form-control" id="property_price" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="property_description" class="form-label">Description</label>
                    <textarea name="property_description" class="form-control" id="property_description" rows="3" required></textarea>
                </div>

                <!-- Campos adicionais -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="apartment_floor" class="form-label">Apartment Floor (if applicable)</label>
                        <input type="number" name="apartment_floor" class="form-control" id="apartment_floor">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="has_elevator" class="form-label">Has Elevator</label>
                        <select name="has_elevator" class="form-control" id="has_elevator">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="has_pool" class="form-label">Has Pool</label>
                        <select name="has_pool" class="form-control" id="has_pool">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="is_furnished" class="form-label">Is Furnished</label>
                        <select name="is_furnished" class="form-control" id="is_furnished">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="has_security" class="form-label">Security 24/7</label>
                        <select name="has_security" class="form-control" id="has_security">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="allows_pets" class="form-label">Allows Pets</label>
                        <select name="allows_pets" class="form-control" id="allows_pets">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="property_status" class="form-label">Property Status</label>
                    <select name="property_status" class="form-control" id="property_status" required>
                        <option value="For Sale">For Sale</option>
                        <option value="For Rent">For Rent</option>
                        <option value="Sold">Sold</option>
                        <option value="Rented">Rented</option>
                    </select>
                </div>

                <!-- Campo de upload de mídia -->
                <div class="mb-3">
                    <label for="media_upload" class="form-label">Upload Media (Images/Videos)</label>
                    <input type="file" name="media_upload[]" class="form-control" id="media_upload" multiple>
                    <small class="text-muted">You can upload multiple images or videos.</small>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register Property</button>
            </form>
        </div>
    </div>
</body>
</html>
