
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
		

		.grid-container {
		  display: grid;
		  grid-template-columns: auto auto auto auto auto;
		  padding: 10px;
		}
		.grid-item {
		  text-align: left;
		  margin-left: 2%;
		}
	
		@media only screen and (max-width: 500px) {
		  /* For mobile phones: */
		 .grid-container {
		  grid-template-columns: 100px 100px 100px 100px 50px;
		  padding: 10px;
		}
			#order,#idProject,#customer,input[type=text]{
			  width: 100%;
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

	<p id="p1">List Panel </p>
    <hr>
    <form method="post" action="project/export.html" >
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
	  			<div class="grid-item word" >Customer Order:</div>
              	<div class="grid-item ">
                      <select  id="order" name="order">
                       	  <option value="" >SELECT ...</option>
                     </select>
              	</div>
				<div class="grid-item ">
	              	<input type = "submit" name="button1" id="button1" disabled="" class="grid-item btn btn-lg btn-primary" value= "Export"  >
              	</div>
  			</div>
            <div id="displayinfor"></div>
            <hr>
            <br>
            <div id="displayinfor_panel"></div>
    </form>

           
@endsection

@section('script')
    <script >
        $(document).ready(function(){
     
        	 $("#idProject").change(function(){
  	  			var idProject = $("#idProject").val();
  	  			document.getElementById("order").innerHTML = "";
  	  			document.getElementById("displayinfor").innerHTML = "";
  	  			// alert(idProject);
	 			$.get("ajax/panel_list_order/"+idProject, function(data){
   		 			$("#order").html(data)
	 			;})
	 			$.get("ajax/panel_list_info/"+idProject, function(data){
   		 			$("#displayinfor").html(data)
	 			;})

			});
        	 //khi order thay doi thi se display thong tin panel thay doi
        	 $("#order").change(function(){
  	  			var idOrder = $("#order").val();
  	  			var idProject = $("#idProject").val();
  	  			if(idOrder != 0 )
  	  				$('#button1').removeAttr('disabled');
  	  			else
  	  				$('#button1').attr('disabled','disabled');
  	  				
  	  			// alert(idProject);
	 			$.get("ajax/panel_list_order_panel/"+idOrder+"/"+idProject, function(data){
   		 			$("#displayinfor_panel").html(data)
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
				   window.location='project/listpanel.html';
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
		   window.location='project/listpanel.html';
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
			   window.location='project/listpanel.html';
			})
			});
			</script>
	@endif
@endsection



