<!-- resources/views/pembayaran.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Pembayaran</h1>

        @isset($total)
        <p>Total Amount to be Paid: ${{ number_format($total, 2, '.', ',') }}</p>
        @else
        <p>Error calculating total amount. Please try again.</p>
        @endisset
    </div>

</body>

</html>