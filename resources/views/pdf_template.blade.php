<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
</head>
<body>
  <table border='1'>
    <thead>
        <tr>
            <th>id</th>
            <th>totalAmount</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$invoice['id']}}</td>
            <td>{{$invoice['amount']}}</td>
            <td>{{$invoice['payment_type']}}</td>
        </tr>
  </table>
</body>
</html>
