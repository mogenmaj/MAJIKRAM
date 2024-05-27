<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2>Title: {{ $title }}</h2>
        <h2>Date: {{ $date }}</h2>
        <hr>

        <h3>Invoices</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Payment Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->payment_type }}</td>
                        <td>{{ $item->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <h3>Clients</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $clientData)
                    <tr>
                        <td>{{ $clientData->id }}</td>
                        <td>{{ $clientData->first_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
