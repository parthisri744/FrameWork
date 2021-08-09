<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<div class="text-right p-3">
   <div class="text-center text-success">
            <h3>Student Details</h3>
    </div>
    <button type="button" id="add" class="btn btn-success" data-toggle="modal" data-target="#addstudent">New</button>
    <button type="button" class="btn btn-primary" id="edit" >Edit</button>
    <button type="button" class="btn btn-danger" id="delete" >Delete</button>

    </div>
     <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI.No</th>
                <th>Register Number</th>
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>Course</th>
                <th>Branch</th>
                <th>Year</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data)) {  $i=0;?>
                <?php foreach($data as $student) { ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $student['regno']; ?></td>
                        <td><?php echo $student['sname']; ?></td>
                        <td><?php echo $student['dob']; ?></td>
                        <td><?php echo decrypt(base64_decode( $student['course']),"UcEnSsS"); ?></td>
                        <td><?php echo $student['branch']; ?></td>
                        <td><?php echo $student['syear']; ?></td>
                        <td><input type="checkbox" class="form-checkbox-control" id="checkbox" style="height:30px; width:30px" value="<?php echo $student['ID']  ?>"></td>
                    </tr>
                <?php $i++; } ?>
            <?php } ?>
        </tbody>
    </table>
<div class="modal fade" id="addstudent">
    <div class="modal-dialog modal-xl">
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
            <label class="form-label ">Enter Student</label>
            <input type="text" name="sname" id="sname" class="form-control" value="" ng-model="stuname" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter UserName</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Register Number</label>
            <input type="text" name="regno" id="regno" class="form-control" ng-model="registerno"  autocomplete="off" required>
            <span class="invalid-feedback">Please Register Number</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" ng-model="dob"  autocomplete="off" required>
            <span class="invalid-feedback">Please Date of Birth</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Select Course</label>
            <select class="form-control" id="course" name="course" ng-model="course"  required>
            <option  value="">Please Select</option>
            <option  value="Bachelor of Engineering">Bachelor of Engineering</option>
            <option  value="Bachelor of Technology">Bachelor of Technology</option>
             </select>
            <span class="invalid-feedback">Please Select Course</span>
    </div>
    <div class="col-md-4" >
            <label class="form-label">Select Branch</label>
            <select class="form-control" id="branch" name="branch" ng-model="branch"  required>  
            <option value="">Please Select</option>  
            <option value="Computer Science Engineering">Computer Science Engineering</option>
            <option value="Informational Technology">Informational Technology</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
            <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
             </select>
   </div>
    <div class="col-md-4">
            <label class="form-label">Select Acadamic Year</label>
            <select class="form-control" id="syear" name="syear" ng-model="syear"  required>
            <option value="">Please Select</option>
            <option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
            <option value="Final Year">Final Year</option>
             </select>
            <span class="invalid-feedback">Please Acadamic Year</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Email ID</label>
            <input type="email" id="email" name="email" ng-model="email"  class="form-control" autocomplete="off" required>
            <span class="invalid-feedback">Please Email ID</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Phone Number</label>
            <input type="number" id="phoneno" name="phoneno" class="form-control" ng-model="phoneno" name="phoneno" ng-maxlength="10" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter Phone Number</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Account Balance</label>
            <input type="number" id="balance" name="balance" class="form-control" ng-model="balance" name="balance" ng-maxlength="10" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter Account Balance</span>
    </div>
    <div class="col-md-12">
            <label class="form-label">Enter Address</label>
            <textarea name="stu_address" id="stu_address" ng-model="stu_address" cols="10" class="form-control" rows="3" required></textarea>
            <span class="invalid-feedback">Please Enter Student Address</span>
    </div>
    <div class="col-md-12 p-4 text-center">
          <input type="hidden" name="student_id" id="student_id" />  
         <input  type="submit" class="btn btn-success"   id="submit" value="Submit">  <input  type="reset" class="btn btn-secondary"  value="Reset">  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     </div>
    </form>
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
           $('#submit').val("Addstudent");  
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
            var path="Model/Ajaxinsert.php?functionname=getdata_for_edit&id="+edit_users_arr;
          //  alert(path);
           $.ajax({  
                url:"Model/Ajaxinsert.php?functionname=getdata_for_edit&id="+edit_users_arr,  
                method:"POST",  
               // data:{edit_users_arr:edit_users_arr},  
                dataType:"json",  
                success:function(data){  
                     console.log(data);
                     $('#regno').val(data.regno);  
                     $('#sname').val(data.sname);  
                     $('#dob').val(data.dob);  
                     $('#course').val(data.course);  
                     $('#branch').val(data.branch);  
                     $('#syear').val(data.syear);  
                     $('#email').val(data.email);  
                     $('#phoneno').val(data.phoneno);  
                     $('#balance').val(data.balance);  
                     $('#stu_address').val(data.stu_address);  
                     $('#student_id').val(data.ID);
                     $('#submit').val("Update");
                     $('#addstudent').modal('show');  
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
           // alert("Submit Clicked");
           event.preventDefault(); 
           $.ajax({  
                     url:"Model/Ajaxinsert.php?functionname=insertstudents&id=0",  
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
                        $('#addstudent').modal('hide');
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
                                url:"Model/Ajaxinsert.php?functionname=deletedata&id=",  
                                method:"POST",  
                                data:{users_arr :users_arr},  
                                success:function(data){  
                                window.location = "index.php?temp=aba064f896dc3eb1653c3b68b9548ef1"; 
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
