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
                <div class="text-center text-success">
                     <h3>Stock Details</h3>
                 </div>
                    <button type="button" id="add" class="btn btn-success" data-toggle="modal" data-target="#addstock">Add Product</button>
                    <button type="button" class="btn btn-primary" id="edit" >Update Product</button>
                    <button type="button" class="btn btn-danger" id="delete" >Delete</button>

               </div>
     <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI.No</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Last Updated Date</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($purdata)) {  $i=0;?>
                <?php foreach($purdata as $purchase) { ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $purchase['product_name']; ?></td>
                        <td><?php echo $purchase['product_quantity']; ?></td>
                        <td><?php echo $purchase['product_price']; ?></td>
                        <td><?php echo $purchase['last_updated_time']; ?></td>
                        <td><input type="checkbox" class="form-checkbox-control" id="checkbox" style="height:30px; width:30px" value="<?php echo $purchase['ID']  ?>"></td>
                    </tr>
                <?php $i++; } ?>
            <?php } ?>
        </tbody>
    </table>
<div class="modal fade" id="addstock">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
             <h4 class="modal-title"><h1 class="text-center">STUDENT STATIONERY SHOP</h1></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
             <div class="modal-body">
            <div class="container-fluid">
            <form  name="regform" id="insert_form" method="post" class="needs-validation row p-5" novalidate>
            <div class="col-md-4">
                    <label class="form-label ">Enter Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="" ng-model="stuname" autocomplete="off" required>
                    <span class="invalid-feedback">Please Enter Product Name</span>
            </div>
            <div class="col-md-4">
                    <label class="form-label">Enter Product Quantity</label>
                    <input type="number" name="product_quantity" id="product_quantity" class="form-control" ng-model="registerno"  autocomplete="off" required>
                    <span class="invalid-feedback">Please Product Quantity</span>
            </div>
            <div class="col-md-4">
                    <label class="form-label">Enter Product Price</label>
                    <input type="number" name="product_price" id="product_price" class="form-control" ng-model="dob"  autocomplete="off" required>
                    <span class="invalid-feedback">Please Product Price</span>
            </div>
            <div class="col-md-12 p-4 text-center">
                <input type="hidden" name="product_id" id="product_id" />  
                <input  type="submit" class="btn btn-success"   id="submit" value="Submit">  <input  type="reset" class="btn btn-secondary"  value="Reset">  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
           </div>
           </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
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
    $('#add').click(function(){  
           $('#submit').val("Addstock");  
           $('#insert_form')[0].reset();  
      }); 
    $('#edit').click(function(){
         //alert("Edit Button Clicked");
         var edit_users_arr = [];
         $("#checkbox:checked").each(function(){
           var userid = $(this).val();
           edit_users_arr.push(userid);
        });
        var length=edit_users_arr.length;
        if(length == '1' ){
            var path="Model/Ajaxinsert.php?functionname=getdata_for_purchasedit&id="+edit_users_arr;
            alert(path);
           $.ajax({  
                url:"Model/Ajaxinsert.php?functionname=getdata_for_purchasedit&id="+edit_users_arr,  
                method:"POST",  
               // data:{edit_users_arr:edit_users_arr},  
                dataType:"json",  
                success:function(data){  
                     console.log(data);
                     $('#product_name').val(data.product_name);  
                     $('#product_quantity').val(data.product_quantity);  
                     $('#product_price').val(data.product_price);   
                     $('#product_id').val(data.ID);
                     $('#submit').val("Update");
                     $('#addstock').modal('show');  
                }  
           });
        }else if(length > 1) {
            setTimeout(function() {
               swal({
              title: "ERROR!",
              text: "You Selected More Then One Student ! Please Select One Student To Edit",
              type: "error"
              });
            }, 100);
        }else {
            setTimeout(function() {
               swal({
              title: "ERROR!",
              text: "Please Select Atlease One Student",
              type: "error"
              });
            }, 100);
        }
        });
        $('#insert_form').on("submit", function(event){  
           event.preventDefault(); 
           $.ajax({  
                     url:"Model/Ajaxinsert.php?functionname=insert_stock&id=0",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#submit').val("Inserting");  
                     },  
                     success:function(data){ 
                       //  alert(data);
                        if(data == "Inserted Successsfully" || data== "Updated Successfully" ){
                        setTimeout(function() {
                        swal('Success',data,"success");
                         }, 1000);
                        $('#insert_form')[0].reset();
                        $('#addstock').modal('hide'); 
                       // window.location = "index.php?temp=aba064f896dc3eb1653c3b68b9548ef1";
                       }else{
                        setTimeout(function() {
                        swal("Error",data,'error');
                         }, 1000);
                       }
                     }  
                });  
           }); 
           $('#delete').click(function(){
              var users_arr = [];
              $("#checkbox:checked").each(function(){
                  var userid = $(this).val();
				  console.log("Userids :"+userid);
                  users_arr.push(userid);
            });
              var length = users_arr.length;
		      console.log("Length Of Userid :"+length +"Userid In Array :"+users_arr);
              if(length <= 0){
                setTimeout(function() {
                swal({
                title: "ERROR!",
                text: "Please Select Atlease One Student",
                type: "error"
                });
                }, 100);
                }else {
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then(function () {
                              $.ajax({  
                                url:"Model/Ajaxinsert.php?functionname=deleteproduct&id=",  
                                method:"POST",  
                                data:{users_arr :users_arr},  
                                success:function(data){  
                              //  window.location = "index.php?temp=908880209a64ea539ae8dc5fdb7e0a91"; 
                                }  
                            });  
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        })            
                }
          });
    });
    </script>
    