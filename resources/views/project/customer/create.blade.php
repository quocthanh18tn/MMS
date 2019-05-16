
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
		input[type=text]{
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
		  input[type=text]{
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
  		<p id="p1">Add Customer </p>
		

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
	                <form method="post" action="project/createcustomer.html" >
				      <input type="hidden" name="_token" value="{{csrf_token()}}">
	                      <p id="p2"> Customer Information </p>
		                        <hr>
		                        <div class="row">
			                      	<div class="col-sm-4">
			                          <lable for = "id" class="word" > ID:
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type ="text" name="id"   required="" > 
			                          
			                      	</div>
			                    </div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-4">
			                          <lable for = "name" class="word" > Name: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="text"  name="name" required="" > 
			                      	</div>
		                      	</div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-4">
			                          <lable for = "company" class="word" > Company: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="text"  name="company" required="" > 
			                      	</div>
		                      	</div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-4">
			                          <lable for = "address" class="word" > Address: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="text"  name="address" required="" > 
			                      	</div>
		                      	</div>
		                        <hr>

		                        <div class="row">
			                      	<div class="col-sm-4">
			                          <lable for = "phone" class="word" > Phone: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
		    	                       <input type ="text" id="phone"  name="phone" required="" > 
		    	                       <br>
			                          <br>
			                      	<p id="idphone" ></p>
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
            $("#phone").keyup(function(){
  	  			var phone = $("#phone").val();
  	  			if(phone=="")
  	  			{
  	  			document.getElementById("idphone").innerHTML = "";
  	  			}
  	  			else
  	  			{
   		 		$.get("ajax/phoneid/"+phone, function(data){
   		 			$("#idphone").html(data)
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
				   window.location='project/createcustomer.html';
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
		   window.location='project/createcustomer.html';
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
			   window.location='project/createcustomer.html';
			})
			});
			</script>
	@endif
@endsection

