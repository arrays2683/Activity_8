<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            width: 80%;
            margin: 0 auto;
        }
        .card {
            width: 100%;
        }
        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Purchases</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<body>
    <div id="productsDisplay" class="card-grid"></div>
    
    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Product Added to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modalProductTitle"></p>
                    <p id="modalProductPrice"></p>
                    <label for="quantityInput">Quantity:</label>
                    <input type="number" id="quantityInput" value="1" min="1">
                    <p id="modalTotalPrice"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="#" id="buyNowButton" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const productsContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="${product.img}" alt="${product.title}">
                            <div class="card-body">
                                <h5 class="card-title">${product.title}</h5><br>Price: ₱${product.rrp}<br>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text">Quantity: ${product.quantity}</p>
                                <button class="btn btn-success" onclick="addToCart(${product.id}, '${product.title}', ${product.rrp})">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    `;
                    productsContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        let cart = {};

        function addToCart(productId, productTitle, productPrice) {
            if (cart[productId]) {
                cart[productId]++;
            } else {
                cart[productId] = 1;
            }
            showModal(productId, productTitle, productPrice);
        }

        function showModal(productId, productTitle, productPrice) {
            document.getElementById('modalProductTitle').innerText = `Product: ${productTitle}`;
            document.getElementById('modalProductPrice').innerText = `Price: ₱${productPrice}`;
            document.getElementById('quantityInput').value = 1;
            updateTotalPrice(productPrice);

            const buyNowButton = document.getElementById('buyNowButton');
            const quantity = document.getElementById('quantityInput').value;
            const totalPrice = productPrice * quantity;
            const href = `it28-admin/address/payment.php?product=${encodeURIComponent(productTitle)}&total=${totalPrice}`;
            buyNowButton.setAttribute('href', href);

            $('#cartModal').modal('show');
        }

        function updateTotalPrice(productPrice) {
            const quantity = parseInt(document.getElementById('quantityInput').value);
            const totalPrice = productPrice * quantity;
            document.getElementById('modalTotalPrice').innerText = `Total Price: ₱${totalPrice}`;
        }

        // Listen for changes in quantity input
        document.getElementById('quantityInput').addEventListener('input', function() {
            const productPrice = parseFloat(document.getElementById('modalProductPrice').innerText.replace('Price: ₱', ''));
            updateTotalPrice(productPrice);
        });
    </script>
</body>
</html>
