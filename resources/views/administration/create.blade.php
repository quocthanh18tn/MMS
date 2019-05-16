
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
		input[type=text],input[type=password],input[type=email] {
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
		@media only screen and (max-width: 500px) {
		  /* For mobile phones: */
		  input[type=text],input[type=password],input[type=email] {
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
  		<p id="p1">Add Manager and Employee </p>
		

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
	                <form method="post" action="administration/create.html" >
				      <input type="hidden" name="_token" value="{{csrf_token()}}">
	                  <fieldset class="fieldset">
	                      <p id="p2"> Manager Information </p>
		                        <hr>
		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "id" class="word" > ID:
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type ="text" name="id"  id="id" required="" > 
			                          <br>
			                          <br>
			                      	<p id="idmanager" ></p>
			                      	</div>
			                    </div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "password" class="word" > Password: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="password"  name="password" required="" > 
			                      	</div>
		                      	</div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "name" class="word" > Name: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="text"  name="name" required="" > 
			                      	</div>
		                      	</div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "email" class="word" > Email: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="email"  name="email" required="" > 
			                      	</div>
		                      	</div>
		                        <hr>
   		                       
   		                        <div class="row">
			                      	<div class="col-sm-3" >
			                          <lable for = "idtype" class="word">Type ID: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                           <input type = "text" name="idtype"  required="">   
			                      	</div>
		                      	</div>
		                        <hr>
		
		                        <div class="row">
			                      	<div class="col-sm-3">
			                           <lable for = "nametype" class="word">Type Name: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type = "text" name="nametype"  required="">   
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
	                  </fieldset>
	               </form>
	            </div>

            	<div class = "col-sm-6">
               		<form method="post" action="administration/create.html" class="container">
				      <input type="hidden" name="_token" value="{{csrf_token()}}">
		                  <fieldset class="fieldset">
		                      <p id="p2"> Employee </p>
		                      	<hr>
		                      	<div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "idemp" class="word" > ID: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type ="text" name="idemp"  id="idemp" required="" > 
			                          <br>
			                          <br>
				                      <p id="idemployee" ></p>
			                      	</div>

			                     
			                    </div>

		                        <hr>
		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "nameemp" class="word" > Name: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type ="text" name="nameemp"  id="nameemp" required="" > 
			                      	</div>
			                    </div>

		                        <hr>
		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "dep" class="word" > Dep: </label>
			                      	</div>
			                      	<div class="col-sm-8">
			                         <select class="text7" id="dep" name="dep">
			                           <option value="" >SELECT ...</option>
			                         	@foreach ($employee->unique('dep') as $em)
				                           <option  value="{{$em->dep}}" >{{$em->dep}}</option>
			                         	@endforeach
			                         </select>
			                      	</div>
			                    </div>

		                        <hr>
		                        <div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "dep" class="word" > Sub_Dep: </label>
			                      	</div>
			                      	<div class="col-sm-8">
			                         <select  id="subdep" name="subdep">
			                           <option value="" >SELECT ...</option>
			                           @foreach ($employee->unique('subdep') as $em)
				                           <option  value="{{$em->subdep}}" >{{$em->subdep}}</option>
			                           @endforeach
			                         </select>
			                      	</div>
			                    </div>
		                        <hr>
		                        <div class="row">
		                        	<div class="col-sm-4">
			                      	</div>
			                      	<div class="col-sm-4">
				                          <input type = "submit" name="submit2" value= "Submit"  class="btn btn-lg btn-primary" >
			                      	</div>
		                        </div>
		                  </fieldset>
	               </form>
	               <hr>
	               <form method="post" action="administration/create.html" class="container" enctype="multipart/form-data">
				      <input type="hidden" name="_token" value="{{csrf_token()}}">
	                  	<fieldset class="fieldset">
	                    	<p id="p2"> Import </p>
	                     	<input type="file" name = "file" id = "submit" style="margin-left: 20px">
	                        <hr>
	                        <div class="row">
	                        	<div class="col-sm-4">
		                      	</div>
		                      	<div class="col-sm-4">
			                    	<input  name="submit3"  type="submit" class="btn btn-lg btn-primary" > </input >
		                      	</div>
	                        </div>
	             	 	</fieldset>
	           		</form>
              </div>
          </div>
@endsection

@section('script')
    <script >
        $(document).ready(function(){
            $('#dep').change(function(){
                var dep= $(this).val();
                $.get("ajax/dep/"+dep,function(data){
                    $("#subdep").html(data);
                    // alert(data);
                });
            });
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

			 $("#idemp").keyup(function(){
  	  			var idemp = $("#idemp").val();
  	  			if(idemp=="")
  	  			{
  	  			document.getElementById("idemployee").innerHTML = "";
  	  			}
  	  			else
  	  			{
   		 		$.get("ajax/employeeid/"+idemp, function(data){
   		 			$("#idemployee").html(data)
	 			;})
  	  				
  	  			}
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
				   window.location='administration/create.html';
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
		   window.location='administration/create.html';
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
			   window.location='administration/create.html';
			})
			});
			</script>
	@endif
@endsection

