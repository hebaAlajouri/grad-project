<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Success</title>
<style>
body {
    font-family: 'Jost', sans-serif;
    background: #f7f4ef;
    color: #1c1b19;
    margin: 0;
}
.success-page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
}
.card {
    background: #fdfcf9;
    border: 1px solid #e2ded8;
    padding: 48px;
    text-align: center;
    max-width: 520px;
}
h1 {
    font-family: serif;
    font-size: 46px;
    font-weight: 300;
}
.btn {
    display: inline-block;
    margin-top: 24px;
    padding: 14px 34px;
    background: #1c1b19;
    color: #f7f4ef;
    text-decoration: none;
    letter-spacing: 2px;
    text-transform: uppercase;
}
</style>
</head>
<body>

<div class="success-page">
    <div class="card">
        <h1>Order placed successfully</h1>

        <p>Your order number is:</p>
        <h2>#{{ $order->id }}</h2>

        <p>Total: {{ number_format($order->total, 0) }} JOD</p>
        <p>Status: {{ ucfirst($order->status) }}</p>

        <a href="{{ route('shop.index') }}" class="btn">Back to shop</a>
    </div>
</div>

</body>
</html>