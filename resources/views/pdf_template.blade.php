<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/filament/filament/app.css">
</head>

<body>

    <div class="bg-white px-4">
        <h1 class="font-bold text-2xl my-4 text-center text-blue-600">MAJIKROOM</h1>
        <hr class="mb-2">
            <div class="flex justify-between mb-6">
                <h1 class="text-lg font-bold">Invoice</h1>
                <div class="text-gray-700">
                    <div>Date: {{ $invoice->created_at->format('d/m/Y') }}</div>
                    <div>Invoice #: {{ $invoice->id }}</div>
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-bold mb-4">Bill To:</h2>
                <div class="text-gray-700 mb-2">{{ $invoice->reservation->client->first_name }} {{ $invoice->reservation->client->last_name }}</div>
                <div class="text-gray-700 mb-2">{{ $invoice->reservation->client->address }}</div>
                <div class="text-gray-700 mb-2">{{ $invoice->reservation->client->city }}, {{ $invoice->reservation->client->country }} {{ $invoice->reservation->client->carte_number }}</div>
                <div class="text-gray-700">{{ $invoice->reservation->client->email }}</div>
            </div>
            <table class="w-full mb-8">
                <thead>
                    <tr>
                        <th class="text-left font-bold text-gray-700">Description</th>
                        <th class="text-right font-bold text-gray-700">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left text-gray-700">{{ $invoice->reservation->description }}</td>
                        <td class="text-right text-gray-700">${{ $invoice->amount }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-left font-bold text-gray-700">Total</td>
                        <td class="text-right font-bold text-gray-700">${{ $invoice->amount }}</td>
                    </tr>
                </tfoot>
            </table>
        <div class="text-gray-700 mb-2">Thank you for your business!</div>
        <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div>
    </div>
    
</body>

</html>
