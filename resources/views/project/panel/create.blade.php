<div id="reviewall"></div>

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
		.column{
			text-align: center;
			padding: 5px 5px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
		}


		#order,#idProject,#customer,input[type=text]{
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
		.grid-container2 {
		  display: grid;
		  grid-template-columns: auto auto;
		  padding: 10px;
		}
		.grid-item2-left{
		  text-align: left;
		  margin-left: 2%;
		}
		.grid-item2-right {
		  text-align: right;
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
	{{-- id reivew all project --}}

	<p id="p1">Add Panel </p>
    <hr>
        <form id="form" name="form" method="post" action="project/createpanel.html" >
	      <input type="hidden" name="_token" value="{{csrf_token()}}">    
            <div class="grid-container">
	  			<div class="grid-item word" >Project ID:</div>
              	<div class="grid-item ">
                     <select  id="idProject" name="idProject">
                       	  <option value="0" >SELECT ...</option>
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
	  			<div class="grid-item word" >Customer:</div>
              	<div class="grid-item ">
                      <select  id="customer" name="customer">
                       	  <option value="0" >SELECT ...</option>
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
	  			<div class="grid-item word" >Order:</div>
              	<div class="grid-item ">
                      <select  id="order" name="order">
                       	  <option value="0" >SELECT ...</option>
                       	  @foreach ($order as $ord)
                           <option  value="{{$ord->id}}" >{{$ord->idOrder}}</option>
                     	   @endforeach
                     </select>
              	</div>
	  			<hr>
  			</div>
  			<br>
  			<br>
            <div id="display_column"></div>
    </form>
@endsection

@section('script')
    <script >
        $(document).ready(function(){
          // khi select sdt cua cus thi thong tin display cus va order cung se bi doi theo
            $("#customer").change(function(){
  	  			var idCustomer = $("#customer").val();
  	  			var idProject = $("#idProject").val();
  	  			document.getElementById("displayinforcustomer").innerHTML = "";
  	  			document.getElementById("order").innerHTML = "";
  	  			document.getElementById("display_column").innerHTML = "";
   		 		$.get("ajax/ordercustomer/"+idCustomer, function(data){
   		 			$("#displayinforcustomer").html(data)
	 			;})
	 			//khi sdt customer thay doi, thi don hang se hien ra thay doi
	 			$.get("ajax/ordercustomerorder/"+idCustomer+"/"+idProject, function(data){
   		 			$("#order").html(data)
	 			;})
  	  			// }
			});
			//script nay dung de thay doi idproject thi thong tin projcet va thong tin cus se bi thay doi theo
        	 $("#idProject").change(function(){
  	  			var idProject = $("#idProject").val();
  	  			var idCustomer = $("#customer").val();
  	  			document.getElementById("displayinforproject").innerHTML = "";
  	  			document.getElementById("display_column").innerHTML = "";
  	  			document.getElementById("displayinforcustomer").innerHTML = "";
  	  			// alert(idProject);
   		 			
   		 		$.get("ajax/orderproject/"+idProject, function(data){
   		 			$("#displayinforproject").html(data)
	 			;});
	 			$.get("ajax/orderproject_customerphone/"+idProject, function(data){
   		 			$("#customer").html(data)
	 			;})
			});
        	 //khi order thay doi thi se display thong tin panel thay doi
        	 $("#order").change(function(){
  	  			document.getElementById("display_column").innerHTML = "";
  	  			var idOrder = $("#order").val();
  	  			var idProject = $("#idProject").val();
  	  			var idCustomer = $("#customer").val();
   		 		$.get("ajax/orderproject_column/"+idOrder+"/"+idCustomer+"/"+idProject, function(data){
   		 			$("#display_column").html(data)
	 			;})
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
				   window.location='project/createpanel.html';
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
		   window.location='project/createpanel.html';
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
			   window.location='project/createpanel.html';
			})
			});
			</script>
	@endif
@endsection



