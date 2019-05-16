@extends('layout.index')

@section('content')
@include('layout.headeradministration')
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
				   window.location='administration/index.html';
				})
				});
				</script>
	          @endif
@endsection