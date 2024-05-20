<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  body {
    background: #f0f0f0;
    font-family: sans-serif;
    padding-top: 30px;
}
ul.timeline {
    position: relative;
    list-style-type: none;
    padding-left: 180px;
}
ul.timeline:before {
    position: absolute;
    display: block;
    left: 136px;
    width: 8px;
    height: 100%;
    border-radius: 4px;
    background-color: #07b;
    content: ' ';
}
ul.timeline .event {
    position: relative;
    padding: 16px;
    background: white;
    border-radius: 2px;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .2), 0 1px 1px 0 rgba(0, 0, 0, .14), 0 2px 1px -1px rgba(0, 0, 0, .12);
    padding: 16px;
    margin-bottom: 30px;
}
ul.timeline .event:before {
    display: block;
    position: absolute;
    top: 30px;
    left: -55px;
    width: 30px;
    height: 30px;
    border: 6px solid #07b;
    border-radius: 50%;
    background-color: white;
    box-shadow: 0 0 4px -1px rgba(0, 0, 0, 0.6);
    content: ' ';
}
ul.timeline h3 {
    font-size: 1.5em;
    margin-top: 0;
    margin-bottom: 10px;
}
ul.timeline .time {
    position: absolute;
    display: block;
    width: 120px;
    top: 35px;
    left: -179px;
    font-size: 0.9em;
    text-align: right;
    font-weight: 600;
    text-transform: uppercase;
}
ul.timeline .time > .glyphicon-time {
    top: 2px;
}
ul.timeline .left-arrow:before {
    position: absolute;
    top: 30px;
    left: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-right: 15px solid #ddd;
    border-left: 0 solid #ddd;
    border-bottom: 15px solid transparent;
    content: ' ';
}
ul.timeline .left-arrow:after {
    position: absolute;
    top: 30px;
    left: -14px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-right: 15px solid #fff;
    border-left: 0 solid #fff;
    border-bottom: 15px solid transparent;
    content: ' ';
}
</style>
<body>
<div class="container mt-5">
        <h2>Thank You!</h2>
        <p>Your purchase was successful, and your address has been recorded.</p>
        <a href="../../index.php" class="btn btn-primary">Back to Products</a>
    </div>

<div class="container">
  <ul class="timeline">
    <li class="event">
      <div class="left-arrow"></div>
      <div class="time">9 April, 2020<br> 11:34 AM <span class="glyphicon glyphicon-time"></span></div>
      <h3>Payment Successful</h3>
      <div class="description"><p>Thank you for shopping with us. Your Payment using KBZ Pay was successful</p></div>
    </li>
    <li class="event">
      <div class="left-arrow"></div>
      <div class="time">9 April, 2020 <br> 11:37 AM <span class="glyphicon glyphicon-time"></span></div>
      <h3>Order Verified</h3>
      <div class="description"><p>Your order has been successfully verified.
</p></div>
    </li>
     <li class="event">
      <div class="left-arrow"></div>
      <div class="time">10 April, 2020 <br> 09:11 AM <span class="glyphicon glyphicon-time"></span></div>
      <h3>Order Handed over to Logistics Partner</h3>
      <div class="description"><p>Your order has been packed and handed over to a Logistics Partner.
</p></div>
    </li>
     <li class="event">
      <div class="left-arrow"></div>
      <div class="time">10 April, 2020 <br> 02:22 PM <span class="glyphicon glyphicon-time"></span></div>
      <h3>Order Shipped</h3>
      <div class="description"><p>Your order has been shipped using Myanmar Post. You can track this package using the OrderID at <a href="https://myanmarpost.com/"> https://myanmarpost.com</a>
</p></div>
    </li>
  </ul>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>