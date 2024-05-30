<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product'];
    $price = $_POST['price'];
    $payment_method = $_POST['payment_method'];

    if (empty($product_name) || empty($price) || empty($payment_method)) {
        $error_message = 'All fields are required.';
    } else {
        try {
            // Fetch the product_id from the products table
            $stmt = $pdo->prepare("SELECT id FROM products WHERE product_name = :product_name");
            $stmt->execute([':product_name' => $product_name]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                $product_id = $product['id'];

                // Insert into payments table with product_id
                $stmt = $pdo->prepare("INSERT INTO payments (product_id, product_name, price, payment_method) VALUES (:product_id, :product_name, :price, :payment_method)");
                $stmt->execute([
                    ':product_id' => $product_id,
                    ':product_name' => $product_name,
                    ':price' => $price,
                    ':payment_method' => $payment_method
                ]);

                $success_message = "Payment successful!";
                // Redirect to address.php after successful submission
                header("Location: address.php");
                exit; // Stop further execution after redirection
            } else {
                $error_message = 'Product not found.';
            }
        } catch (PDOException $e) {
            $error_message = 'Error: ' . $e->getMessage();
        }
    }
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

        <form id="paymentForm" action="" method="POST">
            <div class="form-group">
                <label for="product">Product</label>
                <input type="text" class="form-control" id="product" name="product" value="<?php echo htmlspecialchars($_GET['product'] ?? ''); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($_GET['total'] ?? ''); ?>" readonly>
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
