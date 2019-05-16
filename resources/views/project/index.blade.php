@extends('layout.index')

@section('content')
@include('layout.headerproject')
@endsection

@section('script')
	          @if (session('success'))
	           	<script type="text/javascript">
				    $(document).ready(function(){
				   swal({
				  title: "Welcom!",
				  text: "{{session('success')}}",
				  icon: "success",
				})
				   .then((willDelete) => {
				   window.location='project/index.html';
				})
				});
				</script>
	          @endif
@endsection