<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container mt-5">
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Payment Method</th>

            </tr>
        </thead>
        <tbody id="order-list">
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('Admin.order.table') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user_id', name: 'user_id'},
                {data: 'total_price', name: 'total_price'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},

            ]
        });
    });
</script>
</body>
</html>
