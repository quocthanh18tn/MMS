
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
			font-size: 18px;
			font-weight: bold;
			color: black;
			text-align: left;
			margin-left: 2%;
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

		.grid-container {
		  display: grid;
		  grid-template-columns: 250px 300px  200px 200px;
		  padding: 10px;
		}
		.grid-item {
		  text-align: center;
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
@include('layout.headeradministration')
{{-- page content --}}
		<br>
  		<p id="p1">Manager Information </p>
  		<form method="get" action="administration/page_listmanager.html" >
	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Search Information:</div>
				<input type ="text" name="search" class="grid-item "  placeholder="Id, Type Name, Type ID, Name"> </input>
	            <input type = "submit" name="button1"  class="grid-item btn btn-lg btn-primary" value= "Search"  >
	            <input type = "submit" name="button2"  class="grid-item btn btn-lg btn-primary" value= "Show all"  >
	  		<hr>
	  		</div>
  		</form>	

  		@if (isset($manager))
  			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type Name</th>
                        <th>Type ID</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manager as $man)
                    <tr class="odd gradeX" align="center">
                        <td>{{$man->idManager}}</td>
                        <td>{{$man->name}}</td>
                        <td>{{$man->email}}</td>
                        <td>{{$man->nameType}}</td>
                        <td>{{$man->idType}}</td>
                       <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a   onclick="return confirm('Are you sure you want to Delete?');" href="administration/deletemanager.html/{{$man->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="administration/adjustmanager.html/{{$man->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
        	</table>
          <div style="text-align: center;">
                    {{$manager->appends(request()->input())->links()}}
                </div>
  		@endif
@endsection

@section('script')

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
  