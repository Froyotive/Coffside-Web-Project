<!-- resources/views/cart/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Shopping Cart</h1>

        @if(count($cartItems) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price, 2, '.', ',') }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->price * $item->qty, 2, '.', ',') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <p>Your shopping cart is empty.</p>
        @endif
    </div>

</body>

</html>