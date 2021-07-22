<html>
<head>
</head>
<body align="center">
<h1 align="center">Welcome To Github Repository </h1>
<link rel="stylesheet" href="vendor/bootstrap.min.css">
<div id="alert" class="alert alert-danger" role="danger">
<p>
<label>Enter Github User Name</label>
<input type="text" id="gituname" placeholder="Enter Github UserName" id="gituname" value="parthisri744" class="form-control">
</p>
<input type="submit" value="Get Repository" id="btn_get_repos" class="btn btn-primary" />
<input type="submit" value="View Details" class="btn btn-dark" id="view_details" data-toggle="modal" data-target="#exampleModal">
<input type="submit" value="Add" class="btn btn-info">
<input type="submit" value="commit" class="btn btn-secondary">
<input type="submit" value="Create" class="btn btn-success">
<input type="submit" value="push" class="btn btn-dark">
<input type="submit" value="pull" class="btn btn-warning">
</div>
<div id="repo_count"></div>
<div id="repo_list"></div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="examplemodellabel">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">

	<div class="modal-body">
	   <div id="modelc"></div>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>	
	</div>
	</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){
$("#btn_get_repos").click(function() {
    var username= $('#gituname').val();
	var usename_len = username.length;	
	if(usename_len>0){
    $.ajax({
        type: "GET",
        url: "https://api.github.com/users/"+username+"/repos",
	//  url: ""https://api.github.com/repos/USER/;	
        dataType: "json",
        success: function(result) {
		    $("#repo_list").empty();
			$("#repo_count").empty();
            for(var i in result ) {
				
				var ilength=result.length;
				console.log("responce length"+ilength);
				$("#repo_list").append(
				    
                    "<li><input type='checkbox' id='repo' value='"+result[i].name+"' class='checkbox'><a href='#' >" +
                    result[i].name +"</a></li>"
                );
            //    $("#repo_list").append(
            //        "<li><a href='" + result[i].html_url + "' target='_blank' id='reposit''>" +
            //        result[i].name + "</a></li>"
            //    );
                console.log("i: " + i);
            }
            console.log(result);
            $("#repo_count").append("Total Repos: " + result.length);
        }
    });
	}else{
	$('#alert').append("Please Enter User Name");
	}
});
$('#view_details').click(function(){
	var new_arr;
	 var username= $('#gituname').val();
	$('.checkbox:checked').each(function(){
		var repo_name=$(this).val();
		//alert("RepoName : "+repo_name);
		//new_arr.push(repo_name);
		$.ajax({
			type : "GET",
			url: "https://api.github.com/repos/"+username+"/"+repo_name,
			dataType: "json",
			success: function(responce) {
			  $("#modelc").empty();
			  $("#modelc").append(
			    "Name :"+responce.name+"<br/>"+
				"URL  :"+responce.url+"<br/>"+
				"Description  :"+responce.description+"<br/>"+
				"Created Time  :"+responce.created_at+"<br/>"+
				"Updated Time  :"+responce.updated_at+"<br/>"+
				"pushed Time  :"+responce.pushed_at+"<br/>"+
				"Clone   : "+responce.clone_ur+"<br/>"+
				"Size  :"+responce.size+"<br/>"+
				"Private :"+responce.private+"<br/>"
 			  );
			}
		});
		//console.log("https://api.github.com/repos/"+username+"/"+repo_name);
	});
	//alert("https://api.github.com/repos/"+new_arr);	
});
});

</script>
    <script src="vendor/popper.min.js" ></script>
    <script src="vendor/bootstrap.min.js" ></script>
</body>
</head>