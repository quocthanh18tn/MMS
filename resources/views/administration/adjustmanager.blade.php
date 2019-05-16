
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
		}
		input[type=text],input[type=password] {
		  width: auto;
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
		@media only screen and (max-width: 768px) {
		  /* For mobile phones: */
		  input[type=text]{
		    width: 100%;
		  }
}
		#dep,#subdep  {
		  width: 225px;
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
 		.fieldset {
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
         }
	</style>
@endsection

@section('content')
{{-- page content --}}
@include('layout.headeradministration')
{{-- page content --}}
  

<br>
  		<p id="p1">Edit Manager </p>
		

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
	                <form method="post" action="administration/adjustmanager.html/{{$manager->id}}" >
				      <input type="hidden" name="_token" value="{{csrf_token()}}">
	                      <p id="p2"> Manager Information </p>
		                        <hr>
		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "id" class="word" > ID: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type ="text" name="id"  id="id" value="{{$manager->idManager}}"> 
			                          <br>
			                          <br>
			                      	<p id="idmanager" ></p>
			                      	</div>
			                    </div>
		                        <hr>

		                   
	                          	<div class="row">
			                      	<div class="col-sm-3">
			                           <lable for = "name" class="word">Name: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type = "text" name="name" value="{{$manager->name}}" >   
			                      	</div>
		                      	</div>
		                        <hr>
		                        
	                            <div class="row">
			                      	<div class="col-sm-3">
			                           <lable for = "email" class="word">Email: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type = "text" name="email" value="{{$manager->email}}" >   
			                      	</div>
		                      	</div>
		                        <hr>
   		                       
   		                        <div class="row">
			                      	<div class="col-sm-3" >
			                          <lable for = "idtype" class="word">Type ID: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                           <input type = "text" name="idtype"  value="{{$manager->idType}}">   
			                      	</div>
		                      	</div>
		                        <hr>
		
		                        <div class="row">
			                      	<div class="col-sm-3">
			                           <lable for = "nametype" class="word">Type Name: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type = "text" name="nametype" value="{{$manager->nameType}}" >   
			                      	</div>
		                      	</div>
		                        <hr>
		                        
		                        
		                       
		                        <div class="row">
		                        	<div class="col-sm-4">
			                      	</div>
			                      	<div class="col-sm-4">
			                          <input type = "submit" name="submit" value= "Submit"  class="btn btn-lg btn-primary" >
			                      	</div>
		                        </div>
	               </form>
	            </div>
          </div>
@endsection

@section('script')
    <script >
        $(document).ready(function(){
            
            //id manager check
            $("#id").keyup(function(){
  	  			var id = $("#id").val();
  	  			if(id=="")
  	  			{
  	  			document.getElementById("idmanager").innerHTML = "";
  	  			}
  	  			else
  	  			{
   		 		$.get("ajax/managerid/"+id, function(data){
   		 			$("#idmanager").html(data)
	 			;})
  	  				
  	  			}
			});
            //id employee check

			
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
				   window.location='administration/listmanager.html';
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
		   window.location='administration/listmanager.html';
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
			   window.location='administration/listmanager.html';
			})
			});
			</script>
	@endif
@endsection

