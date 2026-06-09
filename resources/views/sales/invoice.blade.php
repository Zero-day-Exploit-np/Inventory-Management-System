<div style="max-width: 700px; margin: auto; font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">

    <h2 style="text-align: center; margin-bottom: 20px; letter-spacing: 2px;">
        INVOICE
    </h2>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <td style="padding: 8px 0;"><strong>Product</strong></td>
            <td style="padding: 8px 0;">{{ $sale->product->name }}</td>
        </tr>

        <tr>
            <td style="padding: 8px 0;"><strong>Quantity</strong></td>
            <td style="padding: 8px 0;">{{ $sale->quantity }}</td>
        </tr>

        <tr>
            <td style="padding: 8px 0;"><strong>Price (per unit)</strong></td>
            <td style="padding: 8px 0;">Rs. {{ $sale->selling_price }}</td>
        </tr>
    </table>

    <hr style="border: none; border-top: 1px solid #ddd;">

    <div style="text-align: right; margin-top: 15px; font-size: 18px;">
        <strong>Total: </strong>
        Rs. {{ $sale->quantity * $sale->selling_price }}
    </div>

    <p style="margin-top: 25px; color: #666; font-size: 14px;">
        Date: {{ $sale->created_at->format('d M Y, h:i A') }}
    </p>

</div>