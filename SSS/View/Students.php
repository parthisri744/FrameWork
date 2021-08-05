<script src="vendors/datatable/angular-datatables.min.js"></script>
<script src="vendors/datatable/jquery.dataTables.min.js"></script>
<table class="table table-striped table-bordered" datatable="ng" dt-options="vm.dtOptions">
    <thead>
      <tr><th>SI.NO</th><th>Name</th><th>Age</th></tr>
    </thead>
    <tbody>
      <tr ng-repeat="student in studentList track by $index">
        <td>{{$index + 1}}</td>
        <td>
          {{student.regno}}
        </td>
        <td>{{student.sname}}</td>

      </tr>
    </tbody>
  </table>
  <!--
   <div class="btn-group">
                <button type="button" class="btn btn-default btn" ng-click="edit($index);"><i class="glyphicon glyphicon-pencil"></i></button>  
                <button type="button" class="btn btn-default btn" ng-click="delete();"><i class="glyphicon glyphicon-trash"></i></button> 
                </div></td>
-->