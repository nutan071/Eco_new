<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                <th>Id</th>

                <th>Name</th>

                <th>Description</th>

                <th>Price</th>

                <th>Quantity</th>

                <th>Image</th>

                </tr>
            </thead>
            <tbody id="product-list">

            </tbody>
        </table>
</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('#myTable').DataTable({
              processing: true,
              serverSide:false,
            //   paging: true,
              ajax: "{{ route('Admin.products.table') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'description', name: 'description'},
                  {data: 'price', name: 'price'},
                  {data: 'quantity', name: 'quantity'},
                  { data: 'image_url', name: 'image_url', render: function(data, type, full, meta) {
                return '<img src="' + data + '" alt="Image" style="height: 50px;">';}},
                { data: 'action', name: 'action' }

              ]                                                                                                                                                                                                                                                                                                                                                                                 
          });
        });
</script>
</html>
