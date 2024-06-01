<?php
include 'config.php';

// Initialize variables for product details and total price
$product_name = '';
$price = '';
$quantity = 1; // Default quantity
$total_price = '';
$error_message = '';
$success_message = '';

// Check if product_id is provided via GET and fetch product details
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    try {
        $stmt = $pdo->prepare("SELECT product_name, price FROM products WHERE product_id = :product_id");
        $stmt->execute([':product_id' => $product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $product_name = $product['product_name'];
            $price = $product['price'];
            $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
            $total_price = $price * $quantity;
        } else {
            $error_message = 'Product not found.';
        }
    } catch (PDOException $e) {
        $error_message = 'Error: ' . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ... [Your existing form handling code]

    // After successful payment, redirect to address.php or another appropriate page
    header("Location: address.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Payment Form</h2>

        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form id="paymentForm" action="" method="P">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="form-group">
                <label for="product">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" min="1">
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="text" class="form-control" id="total_price" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method">
                    <option value="PayPal">PayPal</option>
                    <option value="GCash">GCash</option>
                    <option value="PayMaya">PayMaya</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
</body>
</html>