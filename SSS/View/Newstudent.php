
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container-fluid">
    <div class="text-center"><h3>Add Student </h3 ></div>
    <form  name="regform" method="post" class="needs-validation row p-5" novalidate>
    <div class="col-md-4">
            <label class="form-label ">Enter Student</label>
            <input type="text" name="username" class="form-control" value=""  ng-model="username" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter UserName</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Register Number</label>
            <input type="text" name="username" class="form-control" ng-model="registerno"  autocomplete="off" required>
            <span class="invalid-feedback">Please Register Number</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Enter Date of Birth</label>
            <input type="date" name="username" class="form-control" ng-model="dob"  autocomplete="off" required>
            <span class="invalid-feedback">Please Date of Birth</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Select Course</label>
            <select class="form-control" ng-model="course"  ng-options="course for course in courseDetails" required>
                  <option  value="">Please Select</option>
             </select>
            <span class="invalid-feedback">Please Select Course</span>
    </div>
    <div class="col-md-4">
            <label class="form-label" >Select Branch</label>
            <select class="form-control" ng-model="branch" ng-if="course=='Bachelor of Engineering'" ng-options="branch for branch in BecourseDetails"  required>
                  <option   value="">Please Select</option>
             </select>
             <select class="form-control" ng-model="branch" ng-if="course=='Bachelor of Technology'" ng-options="branch for branch in BtechcourseDetails"  required>
                  <option   value="">Please Select</option>
             </select>
            <span class="invalid-feedback">Please Select Branch</span>
    </div>
    <div class="col-md-4">
            <label class="form-label">Select Acadamic Year</label>
            <select class="form-control" ng-model="year" ng-options="year for year in ayear"  required>
                  <option value="">Please Select</option>
             </select>
            <span class="invalid-feedback">Please Acadamic Year</span>
    </div>
    <div class="col-md-6">
            <label class="form-label">Enter Email ID</label>
            <input type="email" name="username" ng-model="emailid"  class="form-control" autocomplete="off" required>
            <span class="invalid-feedback">Please Email ID</span>
    </div>
    <div class="col-md-6">
            <label class="form-label">Enter Phone Number</label>
            <input type="number" name="username" class="form-control" ng-model="phoneno" name="phoneno" ng-maxlength="10" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter Phone Number</span>
            <span  ng-show=!"regform.phoneno.$valid">Please Enter Valid Phone Number</span>

    </div>
    <div class="col-md-12 p-4 text-center">
         <input  type="submit" class="btn btn-success" name="submit" value="Submit">
     </div>
    </form>
</div>
     </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>  
</div>
