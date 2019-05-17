
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
		#idcolupdate,#idcolupdatenew,#namecolupdate,#idcoldelete,#idcoladd,#namecoladd,#mode,#col,#fat,#delivery,#adjfat,#adjdelivery,#act,#type,#idPanel,#name,#order,#idProject,#customer{
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
		#idcolupdate,#idcolupdatenew,#namecolupdate,#idcoldelete,#idcoladd,#namecoladd,#mode,#col,#fat,#delivery,#adjfat,#adjdelivery,#act,#type,#idPanel,#name{
		  width: 300px;
		    
		}


		.grid-container {
		  display: grid;
		  grid-template-columns: 302px 300px 250px 300px ;
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
		#idcolupdate,#idcolupdatenew,#namecolupdate,#idcoldelete,#idcoladd,#namecoladd,#mode,#col,#fat,#delivery,#adjfat,#adjdelivery,#act,#type,#idPanel,#name,#order,#idProject,#customer{
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

	<p id="p1">Edit Column </p>
    <hr>
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
  			</div>
            <div id="displayinfor"></div>

  			<br>
  			<br>
  			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-8">
						<div class="row">
	                      	<div class="col-sm-4">
	                          <lable for = "id" class="word" > Panel ID:
	                      	</div>
	                      	
	                      	<div class="col-sm-4">
	                      	 <select  id="idPanel" name="idPanel">
                   		    	  <option value="" >SELECT ...</option>
                     		</select>
	                          <br>
	                          <br>
	                      	</div>
	                    </div>
                    </div>
                </div>
            </div>
	      	<p id="displaycolumninfo" ></p>
@endsection

@section('script')
    <script >
        $(document).ready(function(){
     
        	 $("#idProject").change(function(){
  	  			var idProject = $("#idProject").val();
  	  			document.getElementById("order").innerHTML = "";
  	  			document.getElementById("displayinfor").innerHTML = "";
  	  			document.getElementById("idPanel").innerHTML = "";
  	  			document.getElementById("displaycolumninfo").innerHTML = "";
  	  			// alert(idProject);
	 			$.get("ajax/edit_panel_list_order/"+idProject, function(data){
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
  	  			document.getElementById("idPanel").innerHTML = "";
  	  			document.getElementById("displaycolumninfo").innerHTML = "";
  	  			$.get("ajax/edit_display_panel_info/"+idProject+"/"+idOrder, function(data){
   		 			$("#idPanel").html(data)
	 			;})
			});
        	  $("#idPanel").change(function(){
  	  			var idPanel = $("#idPanel").val();
  	  			document.getElementById("displaycolumninfo").innerHTML = "";
  	  			//display full info panel
  	  			$.get("ajax/edit_display_column_info_full/"+idPanel, function(data){
   		 			$("#displaycolumninfo").html(data)
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
				   window.location='project/editcolumn.html';
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
		   window.location='project/editcolumn.html';
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
			   window.location='project/editcolumn.html';
			})
			});
			</script>
	@endif
@endsection



