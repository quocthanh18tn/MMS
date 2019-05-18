
@extends('layout.index')
@section('css')
	<style type="text/css" media="screen">
		#p1{
			font-size: 25px;
			font-weight: bold;
			color: black;
			text-align: center;
		}
		#p2{
			font-size: 20px;
			font-weight: bold;
			color: black;
			text-align: left;
		}
		.word{
			font-size: 18px;
			font-weight: bold;
			color: black;
			text-align: left;
		}
		#idPanel,#idProject,#idColumn{
		  width: 50%;
		  padding: 10px 10px;
		  box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 12px;
          background-color: white;
          background-position: 10px 10px;
          background-repeat: no-repeat;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
            
		}

		.grid-container {
		  display: grid;
		  grid-template-columns: 302px 800px ;
		  padding: 10px;
		}
		.grid-item {
		  text-align: left;
		  margin-left: 2%;
		}

		@media only screen and (max-width: 500px) {
		  /* For mobile phones: */
		 .grid-container {
		  grid-template-columns: 100px 300px;
		  padding: 10px;
		}
		#idPanel,#idProject,#idColumn{
			  width: 100%;
			}
		}
		
	</style>
@endsection

@section('content')
{{-- page content --}}
@include('layout.headerproduction')
{{-- page content --}}
		<br>
		
  		<p id="p1">Task Assigment</p>
			
	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Project ID:</div>
	  			<div class="grid-item">
	                <select  id="idProject" name="idProject">
	                   	  <option value="0" >SELECT ...</option>
	                 	   @foreach ($projectObj as $project)
	                       <option  value="{{$project->id}}" >{{$project->idProject." :".$project->name}}</option>
	                 	   @endforeach
	                </select>
                </div>
	  		</div>
	  		<hr>

	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Panel ID:</div>
	  			<div class="grid-item">
  					<select  id="idPanel" name="idPanel">
           		    	  <option value="" >SELECT ...</option>
             		</select>
             	</div>
	  		</div>
	  		<hr>

	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Column ID:</div>
	  			<div class="grid-item">
	  				<select  id="idColumn" name="idColumn">
           		    	  <option value="" >SELECT ...</option>
             		</select>
             	</div>
	  		</div>
	  		<hr>

@endsection

@section('script')

<script >
        $(document).ready(function(){
        	$("#idProject").change(function(){
  	  			var idProject = $("#idProject").val();
  	  			document.getElementById("idPanel").innerHTML = "";
  	  			document.getElementById("idColumn").innerHTML = "";
	 			$.get("ajax/production_list_panel/"+idProject, function(data){
   		 			$("#idPanel").html(data)
	 			;}); //end get ajax
	 		}); //end idproject change

        	 $("#idPanel").change(function(){
  	  			var idPanel = $("#idPanel").val();
  	  			document.getElementById("idColumn").innerHTML = "";
	 			$.get("ajax/production_list_column/"+idPanel, function(data){
   		 			$("#idColumn").html(data)
	 			;}); //end get ajax
	 		}); //end idproject change
        }); // end document ready function
</script>



@if ($errors->any())
    	 @foreach($errors->all() as $err)
	           	<script type="text/javascript">
				    $(document).ready(function(){
				   swal({
				  title: "Error!",
				  text: "{{$err}}",
				  icon: "error",
				})
				   .then((willDelete) => {
				   window.location='production/taskAssigment.html';
				})
				});
				</script>
        @endforeach
	@endif
   @if (session('success'))
	   	<script type="text/javascript">
		    $(document).ready(function(){
		   swal({
		  title: "Congratulation!",
		  text: "{{session('success')}}",
		  icon: "success",
		})
		   .then((willDelete) => {
		   window.location='production/taskAssigment.html';
		})
		});
		</script>
	@endif
      @if (session('error'))
           	<script type="text/javascript">
			    $(document).ready(function(){
			   swal({
			  title: "Error!",
			  text: "{{session('error')}}",
			  icon: "error",
			})
			   .then((willDelete) => {
			   window.location='production/taskAssigment.html';
			})
			});
			</script>
	@endif
@endsection