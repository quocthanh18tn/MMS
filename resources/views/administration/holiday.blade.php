
@extends('layout.index')

@section('css')
  <style type="text/css" media="screen">
    #p2{
      font-size: 20px;
      font-weight: bold;
      color: black;
      text-align: center;
    }
    input[type=text],input[type=date]{
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
      grid-template-columns: 200px 200px  150px;
      padding: 10px;
    }
    .grid-item {
      text-align: center;
    }
    @media only screen and (max-width: 500px) {
      /* For mobile phones: */
     .grid-container {
      grid-template-columns: 150px 150px 200px;
    }
    
     }
  </style>
@endsection



@section('content')
{{-- page content --}}
@include('layout.headeradministration')
{{-- page content --}}
<br>
<p id="p2"> Holiday Information </p>
<hr>
      <form action="administration/addholiday.html" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="grid-container">
            <input type="date" name ="date" class="grid-item ">
            <input type="text"  name ="name" placeholder="Name Holiday..." class="grid-item " required="" >
            <input type="submit" name ="add"    class="btn btn-primary grid-item" value="ADD HOLIDAY">
        </div>
      </form>
      <hr>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($holiday as $ho)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ho->id}}</td>
                        <td>{{$ho->name}}</td>
                        <td>{{$ho->date}}</td>
                       <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a   onclick="return confirm('Are you sure you want to Delete?');" href="administration/deleteholiday.html/{{$ho->id}}"> Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
          </table>
@endsection



@section('script')

   @if (session('success'))
      <script type="text/javascript">
        $(document).ready(function(){
       swal({
      title: "Congratulation!",
      text: "{{session('success')}}",
      icon: "success",
    })
       .then((willDelete) => {
       window.location='administration/addholiday.html';
    })
    });
    </script>
  @endif

@endsection
  