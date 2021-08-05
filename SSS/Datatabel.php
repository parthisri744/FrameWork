<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatable</title>
    <script src="vendors/ajtable/jquery-3.5.1.js"></script>
    <script src="vendors/ajtable/jszip.min.js"></script>
    <script src="vendors/ajtable/pdfmake.min.js"></script>

    <script src="vendors/ajtable/jquery.dataTables.min.js"></script>
    <script src="vendors/ajtable/vfs_fonts.js"></script>
    <link rel="stylesheet" href="vendors/ajtable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="vendors/ajtable/jquery.dataTables.min.css">
    <!-- 

        <script src="vendors/ajtable/buttons.html5.min.js">
        <script src="vendors/ajtable/dataTables.buttons.min.js"></script></script>
      -->
</head>
<body>
<h1>Hello Parthibans</h1>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td><input type="checkbox"></td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
                <td><input type="checkbox"></td>

            </tr>    
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
        </script>
</body>
</html>