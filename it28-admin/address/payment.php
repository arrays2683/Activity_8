<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product'];
    $price = $_POST['price'];
    $payment_method = $_POST['payment_method'];

    try {
        $stmt = $pdo->prepare("INSERT INTO payments (product_name, price, payment_method) VALUES (:product_name, :price, :payment_method)");
        $stmt->execute([
            ':product_name' => $product_name,
            ':price' => $price,
            ':payment_method' => $payment_method
        ]);

        $success_message = "Payment successful!";
    } catch (PDOException $e) {
        $error_message = 'Error: ' . $e->getMessage();
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

        <form action="" method="POST">
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
            <a href="address.php" onclick="document.getElementById('paymentForm').submit();" class="btn btn-primary">Submit Payment</a>
            <input type="submit" style="display:none"> <!-- Hide the original submit button -->
        </form>
    </div>

    <script>
        // Trigger change event to set initial values
        document.getElementById('product').dispatchEvent(new Event('change'));
    </script>
</body>
</html>
