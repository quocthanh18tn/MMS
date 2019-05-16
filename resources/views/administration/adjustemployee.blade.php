
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
  		<p id="p1">Edit Employee </p>
		

		<div class="container-fluid">
			<div class="row">
				

            	<div class = "col-sm-6">
               		<form method="post" action="administration/adjustemployee.html/{{$employee->id}}" class="container">
				      <input type="hidden" name="_token" value="{{csrf_token()}}">
		                      <p id="p2"> Employee </p>
		                      	<hr>
		                      	<div class="row">
			                      	<div class="col-sm-3">
			                          <lable for = "idemp" class="word" > ID: </label>
			                      	</div>
			                      	
			                      	<div class="col-sm-8">
			                          <input type ="text" name="idemp"  id="idemp" value="{{$employee->idEmployee}}" > 
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
			                          <input type ="text" name="nameemp"  id="nameemp" value="{{$employee->name}}" > 
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
			                         	@foreach ($employeefull->unique('dep') as $em)
				                           <option  
				                           @if ($em->dep == $employee->dep)
				                           {{"selected"}}
				                           value="{{$em->dep}}"
				                           @endif
				                           >{{$em->dep}}</option>
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
			                           @foreach ($employeefull->unique('subdep') as $em)
				                           <option 
				                           @if ($em->subdep == $employee->subdep)
				                           {{"selected"}}
				                           value="{{$em->subdep}}"
				                           @endif 
				                            >{{$em->subdep}}</option>
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
	               </form>
	               <hr>
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
                });
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
				   window.location='administration/listemployee.html';
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
		   window.location='administration/listemployee.html';
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
			   window.location='administration/listemployee.html';
			})
			});
			</script>
	@endif
@endsection

