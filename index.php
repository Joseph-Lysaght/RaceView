<?php 
	include ('header.php'); 
?>
<script> <!-- Set the Active link in the header -->
document.getElementById('TaskList').setAttribute("class", "nav-link active"); 
</script>
<div class="row">
	<div class="col-sm-12">
		<div> <!-- Left Hand Div -->
			<button type="button" name="toggle3" id="toggle3" class="btn btn-success btn-xs">Show/Hide 3</button>
			<button type="button" name="toggle33" id="toggle33" class="btn btn-success btn-xs">Show/Hide 33</button>
			<button type="button" name="add_for_both" id="Both" onclick="add_data(this.id)" class="btn btn-success btn-xs">Add For Both</button>
		</div>
		<!---------------------Car 3 Request Element----------------------->
		<br/>
		<br/>
		<div id="car3all" class="row">
			<div id="car3" class="panel panel-default col-lg-8">
			   <div class="row">
				   <div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3 class="panel-title">Requests for Car 3</h3>
							</div>
							<div id="car3"class="col-md-6" align="right">
								<button type="button" name="add_data" id="Car03" onclick="add_data(this.id)" class="btn btn-success btn-xs">Add</button>
							</div>
						</div>
					</div>
					<div id="showButtons" align="right">
						<button type="button" name="showdone" id="showdone03" class="btn btn-primary">Show Done</button>
						<button type="button" name="hidesys" id="hidesys03" class="btn btn-primary">Hide Systems</button>
						<button type="button" name="hideperf" id="hideperf03" class="btn btn-primary">Hide Perf</button>
						<button type="button" name="hidemech" id="hidemech03" class="btn btn-primary">Hide Mechanics</button>
						<br>
					</div>
					<p/>
				</div>
				<div class="table-responsive border border-dark rounded p-2" style="background-color:#474747; text-color:white;">
					<table id="user_data03" class="table table-dark table-bordered table-striped">
						<thead>
							<tr>
								<td>Task</td>
								<td>Owner</td>
								<td>Status</td>
								<td>Ack</td>									
								<td>Edit</td>
								<td>Done</td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="col-lg-4">
				<img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);" src="http://172.16.10.211/mjpg/video.mjpg?timestamp=1721411247205">
				<!-- <img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);" src="images/Car03.JPG"> -->
			</div>
		</div>
		</br>
		</br>
		<!---------------------Car 33 Request Element----------------------->
		<div id="car33all" class="row">
			<div id="car33" class="panel panel-default col-lg-8">
			   <div class="row">
				   <div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3 class="panel-title">Requests for Car 33</h3>
							</div>
							<div id="car33"class="col-md-6" align="right">
								<button type="button" name="add_data" id="Car33" onclick="add_data(this.id)" class="btn btn-success btn-xs">Add</button>
							</div>
						</div>
					</div>
					<div id="showButtons" align="right">
						<button type="button" name="showdone" id="showdone33" class="btn btn-primary">Show Done</button>
						<button type="button" name="hidesys" id="hidesys33" class="btn btn-primary">Hide Systems</button>
						<button type="button" name="hideperf" id="hideperf33" class="btn btn-primary">Hide Perf</button>
						<button type="button" name="hidemech" id="hidemech33" class="btn btn-primary">Hide Mechanics</button>
						<br><br>
					</div>
				</div>
				<div class="table-responsive border border-dark rounded p-2" style="background-color:#474747; text-color:white;">
					<table id="user_data33" class="table table-dark table-bordered table-striped">
						<thead>
							<tr>
								<td>Task</td>
								<td>Owner</td>
								<td>Status</td>
								<td>Ack</td>									
								<td>Edit</td>
								<td>Done</td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="col-lg-4">
				<img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);" src="http://172.16.10.213/mjpg/video.mjpg?timestamp=1739373548869"> 
				<!-- <img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);" src="images/Car33.JPG"> -->
			</div>
		</div>
	</div>
</div>

<?php 
include ('footer.php'); 
?>
	
<script type="text/javascript" language="javascript">

var Array03 = [false, true, true, true]; //done, sys, mech, perf (false to hide)
var Array33 = [false, true, true, true]; //done, sys, mech, perf (false to hide)

//--------Toggle Car 03 View on or off---------------//
$( "#toggle3" ).click(function() {
	$( "#car3all" ).toggle( "fast", function() {
		// Animation complete.
	});
});

//---------Toggle Car 33 View on or off-----------------//
$( "#toggle33" ).click(function() {
	$( "#car33all" ).toggle( "fast", function() {
		// Animation complete.
	});
});

//-------------------Add Data Function--------------------//
function add_data(id){
	var options = {
		ajaxPrefix:''
	};
	new Dialogify('add_data_form.php', options)
	.title('Add New Task for ' + id)
	.buttons([
	{
		text:'Cancel',
		click:function(e){
			this.close();
		}
	},
	{
		text:'Add',
		type:Dialogify.BUTTON_PRIMARY,
		click:function(e)
		{
			var form_data = new FormData();
			form_data.append('car', id);
			form_data.append('description', $('#description').val());
			form_data.append('category', $('#category').val());
			$.ajax({
				method:"POST",
				url:'source/addData.php',
				data:form_data,
				dataType:'json',
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					if(data.error != '')
					{
						alert(data.error);
					}
					else
					{
						$('#user_data03').DataTable().ajax.reload();
						$('#user_data33').DataTable().ajax.reload();
					}
				}
			});
		}
	}
	]).showModal();
};


// --------- DataTable 03------//
$(document).ready( function () {
    $('#user_data03').DataTable({
		scrollX: false,
		pageLength : 10,
		searching: false,
		info: true,
		processing: false,
		serverSide: true,
		columns: [{ width: '65%' }, { width: '10%' }, { width: '12%' }, null, null, null],
		order:[],
		ajax: {
			url: 'source/fetch_tasks.php',
			type:"POST",
			data: {
				'car': "car03",
				'category_Array': Array03
			}
		}
	})
});

// --------- DataTable 33------//
$(document).ready( function () {
    $('#user_data33').DataTable({
		scrollX: false,
		pageLength : 10,
		searching: false,
		info: true,
		processing: false,
		serverSide: true,
		columns: [{ width: '65%' }, { width: '10%'}, { width: '12%' }, null, null, null],
		order:[],
		ajax: {
			url: 'source/fetch_tasks.php',
			type:"POST",
			data: {
				'car': "car33",
				'category_Array': Array33
			}
		}
	})
});

// -------- Toggle Options Car 03 ------//
$(document).on('click', '#showdone03', function(){ // Status
	if(Array03[0] == true){
		Array03[0] = false;
		document.getElementById("showdone03").innerHTML = "Show Done";
	}
	else{
		Array03[0] = true;
		document.getElementById("showdone03").innerHTML = "Hide Done";
	}
	$('#user_data03').DataTable().settings()[0].ajax.data = {'category_Array': Array03, 'car': "car03"};
	$('#user_data03').DataTable().ajax.reload();
});

$(document).on('click', '#hidesys03', function(){ //Systems
	if (Array03[1] == true){
		Array03[1] = false;
		document.getElementById("hidesys03").innerHTML = "Show Systems";
	}else{
		Array03[1] = true;
		document.getElementById("hidesys03").innerHTML = "Hide Systems";
	}
	$('#user_data03').DataTable().settings()[0].ajax.data = {'category_Array': Array03, 'car': "car03"};
	$('#user_data03').DataTable().ajax.reload();
});

$(document).on('click', '#hidemech03', function(){ //Mechanics
	if (Array03[2] == true){
		Array03[2] = false;
		document.getElementById("hidemech03").innerHTML = "Show Mechanics";
	}else{
		Array03[2] = true;
		document.getElementById("hidemech03").innerHTML = "Hide Mechanics";
	}
	$('#user_data03').DataTable().settings()[0].ajax.data = {'category_Array': Array03, 'car': "car03"};
	$('#user_data03').DataTable().ajax.reload();
});

$(document).on('click', '#hideperf03', function(){ // Performance
	if(Array03[3] == true){
		Array03[3] = false;
		document.getElementById("hideperf03").innerHTML = "Show Perf";
	}
	else{
		Array03[3] = true;
		document.getElementById("hideperf03").innerHTML = "Hide Perf";
	}
	$('#user_data03').DataTable().settings()[0].ajax.data = {'category_Array': Array03, 'car': "car03"};
	$('#user_data03').DataTable().ajax.reload();
});

// -------- Toggle Options Car 33 ------//
$(document).on('click', '#showdone33', function(){ // Status
	if(Array33[0] == true){
		Array33[0] = false;
		document.getElementById("showdone33").innerHTML = "Show Done";
	}
	else{
		Array33[0] = true;
		document.getElementById("showdone33").innerHTML = "Hide Done";
	}
	$('#user_data33').DataTable().settings()[0].ajax.data = {'category_Array': Array33, 'car': "car33"};
	$('#user_data33').DataTable().ajax.reload();
});

$(document).on('click', '#hidesys33', function(){ //Systems
	if (Array33[1] == true){
		Array33[1] = false;
		document.getElementById("hidesys33").innerHTML = "Show Systems";
	}else{
		Array33[1] = true;
		document.getElementById("hidesys33").innerHTML = "Hide Systems";
	}
	$('#user_data33').DataTable().settings()[0].ajax.data = {'category_Array': Array33, 'car': "car33"};
	$('#user_data33').DataTable().ajax.reload();
});

$(document).on('click', '#hidemech33', function(){ //Mechanics
	if (Array33[2] == true){
		Array33[2] = false;
		document.getElementById("hidemech33").innerHTML = "Show Mechanics";
	}else{
		Array33[2] = true;
		document.getElementById("hidemech33").innerHTML = "Hide Mechanics";
	}
	$('#user_data33').DataTable().settings()[0].ajax.data = {'category_Array': Array33, 'car': "car33"};
	$('#user_data33').DataTable().ajax.reload();
});

$(document).on('click', '#hideperf33', function(){ // Performance
	if(Array33[3] == true){
		Array33[3] = false;
		document.getElementById("hideperf33").innerHTML = "Show Perf";
	}
	else{
		Array33[3] = true;
		document.getElementById("hideperf33").innerHTML = "Hide Perf";
	}
	$('#user_data33').DataTable().settings()[0].ajax.data = {'category_Array': Array33, 'car': "car33"};
	$('#user_data33').DataTable().ajax.reload();
});


//----- Ack Buttons in Tasks ------//
$(document).on('click', '.ack', function(){
     var id = $(this).attr('id');
	 var request = "Ack";
		$.ajax({
			url:"source/UpdateTaskStatus.php",
			method:"POST",
			data:{
				id:id,
				request:request
			},
			success:function(data)
			{
				$('#user_data03').DataTable().ajax.reload(null, false);
				$('#user_data33').DataTable().ajax.reload(null, false);
			}
       })
    });
	
//----- Done Buttons in Tasks ------//
$(document).on('click', '.done', function(){
     var id = $(this).attr('id');
	 var request = "Done";
		$.ajax({
			url:"source/UpdateTaskStatus.php",
			method:"POST",
			data:{
				id:id,
				request:request
			},
			success:function(data)
			{
				$('#user_data03').DataTable().ajax.reload(null, false);
				$('#user_data33').DataTable().ajax.reload(null, false);
			}
       })
    });
	
//----- Edit Buttons in Tasks ------//
$(document).on('click', '.update', function(){
     var id = $(this).attr('id');
       alert('Not working yet');
    });

//---- Update Tables every 5s -----//
window.setInterval(function(){
	$('#user_data03').DataTable().ajax.reload(null, false);
	$('#user_data33').DataTable().ajax.reload(null, false);
}, 5000);

</script>