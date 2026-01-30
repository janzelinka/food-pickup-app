<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f97316;
            padding-bottom: 10px;
        }

        .header h1 {
            color: #f97316;
            margin: 0;
        }

        .info-table {
            width: 100%;
            margin-bottom: 30px;
        }

        .info-table td {
            vertical-align: top;
            padding: 5px;
        }

        .info-label {
            font-weight: bold;
            color: #666;
            width: 150px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .items-table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .total-row td {
            font-weight: bold;
            font-size: 16px;
            padding-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>PB CHLEBÍČKY</h1>
        <p>Order Summary #{{ $order->id }}</p>
    </div>

    <table class="info-table">
        <tr>
            <td class="info-label">Customer Name:</td>
            <td>{{ $order->customer_name }}</td>
        </tr>
        <tr>
            <td class="info-label">Customer Email:</td>
            <td>{{ $order->customer_email }}</td>
        </tr>
        <tr>
            <td class="info-label">Pickup Time:</td>
            <td>{{ \Carbon\Carbon::parse($order->pickup_time)->format('d.m.Y H:i') }}</td>
        </tr>
        <tr>
            <td class="info-label">Order Date:</td>
            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
        </tr>
        <tr>
            <td class="info-label">Status:</td>
            <td style="text-transform: uppercase; font-weight: bold;">{{ $order->status }}</td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th style="text-align: right;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product ? $item->product->name : 'Deleted Product' }}</td>
                    <td>{{ number_format($item->price, 2) }}€</td>
                    <td>{{ $item->quantity }}</td>
                    <td style="text-align: right;">{{ number_format($item->price * $item->quantity, 2) }}€</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="3" style="text-align: right;">Final Total:</td>
                <td style="text-align: right; color: #f97316;">{{ number_format($order->total_price, 2) }}€</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Thank you for your order! PB CHLEBÍČKY - Fresh & Local.</p>
        <p>Hliny 1412, 017 07 Považská Bystrica | +421 915 930 008</p>
    </div>
</body>

</html>