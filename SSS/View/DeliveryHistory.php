<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
    <div class="card shadow">
       <div class="card-body">  
          <img class="card-img-top" src="vendors/img/writing.gif" alt="Ucen image" style="width:100%; height: 500px">
       </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card shadow">
        <div class="card-body">
            <div class="text-right p-3">
                <div class="text-center text-danger">
                     <h3>Deliveried History</h3>
                 </div>
               </div>
     <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI.No</th>
                <th>Student Name</th>
                <th>Register Number</th>
                <th>Submitted Time/th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($deliveryhis)) {  $i=0;?>
                <?php foreach($deliveryhis as $delivery) { ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $delivery['Stu_name']; ?></td>
                        <td><?php echo $delivery['stu_regno']; ?></td>
                        <td><?php echo $delivery['sbmitted_time']; ?></td>
                        <td><?php echo $delivery['status']; ?></td>
                    </tr>
                <?php $i++; } ?>
            <?php } ?>
        </tbody>
    </table>
   </div>
 </div>
</div>
<script>
$(document).ready(function() {
        // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search(this.value )
                    .draw();
            }
        } );
    } ); 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        searching: true,
        "scrollX": true
    } );
    
    });
    </script>
    