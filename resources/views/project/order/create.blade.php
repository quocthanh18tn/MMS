
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
			text-align: center;
		}
		.word{
			font-size: 18px;
			font-weight: bold;
			color: black;
			text-align: left;
		}
		#idProject,#customer,input[type=text]{
		  width: 200px;
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
		@media only screen and (max-width: 500px) {
		  /* For mobile phones: */
		  input[type=text]{
		    width: 100%;
		  }
		  #customer,#idProject{
		    width: 100%;

		  }
		}

		.grid-container {
		  display: grid;
		  grid-template-columns: 250px 300px  200px 200px;
		  padding: 10px;
		}
		.grid-item {
		  text-align: left;
		  margin-left: 2%;
		}
		@media only screen and (max-width: 500px) {
		  /* For mobile phones: */
		 .grid-container {
		  grid-template-columns: 150px 150px  100px 100px;
		  padding: 10px;
		}
		
		 }
		
	</style>
@endsection

@section('content')
{{-- page content --}}
@include('layout.headerproject')
{{-- page content --}}
  


<br>
  		<p id="p1">Add Order </p>
        <form method="post" action="project/createorder.html" enctype="multipart/form-data">
	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
            <hr>
        	<div class="grid-container">
	  			<div class="grid-item word" >Customer:</div>
              	<div class="grid-item ">
                      <select  id="customer" name="customer">
                       	  <option value="" >SELECT ...</option>
                     	   @foreach ($customer as $cus)
                           <option  value="{{$cus->id}}" >{{$cus->name}}</option>
                     	   @endforeach
                     </select>
              	</div>
	  			<hr>
  			</div>

            <div id="displayinforcustomer"></div>

            <hr>
            <div class="grid-container">
	  			<div class="grid-item word" >Project ID:</div>
              	<div class="grid-item ">
                     <select  id="idProject" name="idProject">
                       	  <option value="" >SELECT ...</option>
                     	   @foreach ($project as $project)
                           <option  value="{{$project->id}}" >{{$project->idProject}}</option>
                     	   @endforeach
                     </select>
              	</div>
	  			<hr>
  			</div>

            <div id="displayinforproject"></div>

            <hr>
            <div class="grid-container">
	  			<div class="grid-item word" >Import Panels:</div>
              	<div class="grid-item "><input type="file" name = "file" >
              	</div>
	  			<hr>
  			</div>
            <hr>
            <div class="grid-container">
	  			<div class="grid-item" ></div>
              	<div class="grid-item ">
			          <input type = "submit" name="submit" value= "Submit"  class="btn btn-lg btn-primary" >
              	</div>
	  			<hr>
  			</div>
       </form>
@endsection

@section('script')
    <script >
        $(document).ready(function(){
          
            $("#customer").change(function(){
  	  			var idCustomer = $("#customer").val();
  	  			if (idCustomer=="")
  	  			document.getElementById("displayinforcustomer").innerHTML = "";
   		 		$.get("ajax/ordercustomer/"+idCustomer, function(data){
   		 			$("#displayinforcustomer").html(data)
	 			;})
  	  			// }
			});
        	 $("#idProject").change(function(){
  	  			var idProject = $("#idProject").val();
  	  			if (idProject=="")
  	  			document.getElementById("displayinforproject").innerHTML = "";
   		 		$.get("ajax/orderproject/"+idProject, function(data){
   		 			$("#displayinforproject").html(data)
	 			;})
  	  			// }
			});

        });

    </script>
    {{-- script thong bao error or success --}}
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
				   window.location='project/createorder.html';
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
		   window.location='project/createorder.html';
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
			   window.location='project/createorder.html';
			})
			});
			</script>
	@endif
@endsection

