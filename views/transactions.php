<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expence Tracking</title>
  <style>
    table, th, td {
      border: 1px solid #ced4da;
      border-collapse: collapse;
    }
    th, td {
      padding: 2px 20px;
      text-align: center;
    }
    tfoot {
      font-size: 18px;
    }
    tfoot tr th {
      text-align: right;
    }
  </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Check #</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $data[0]['Date'] ?></td>
            <td><?= $data[0]['Check #'] ?></td>
            <td><?= $data[0]['Description'] ?></td>
            <td><?= $data[0]['Amount'] ?></td>
        </tr>
        <tr>
            <td><?= $data[1]['Date'] ?></td>
            <td><?= $data[1]['Check #'] ?></td>
            <td><?= $data[1]['Description'] ?></td>
            <td><?= $data[1]['Amount'] ?></td>
        </tr>
        <tr>
            <td><?= $data[2]['Date'] ?></td>
            <td><?= $data[2]['Check #'] ?></td>
            <td><?= $data[2]['Description'] ?></td>
            <td><?= $data[2]['Amount'] ?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Income:</th>
            <td><?=$total_income ?></td>
        </tr>
        <tr>
            <th colspan="3">Total Expense:</th>
            <td><?=$total_expense ?></td>
        </tr>
        <tr>
            <th colspan="3">Net Total:</th>
            <td><?=$net_total ?></td>
        </tr>
    </tfoot>
</table>
</body>
</html>