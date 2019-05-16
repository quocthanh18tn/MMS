@extends('layout.index')

@section('css')
<style type="text/css">
.login-container{
    position: relative;
    width: 300px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(25, 204, 25);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}


.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}

.avatar{
    width: 100px;height: 100px;
    margin: 10px auto 30px;
    border-radius: 100%;
    border: 2px solid #aaa;
    background-size: cover;
}

.form-box input{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}

.form-box input[type="text"]{
    border-radius: 5px 5px 0 0;
    text-transform: lowercase;
}

.form-box input[type="password"]{
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}
 .fakeimg1 {
      height: 85px;
      background: lightblue;
      color:black;
      padding: 30px;
      font-weight: bold;
      margin-top:1px;
 }


</style>

@endsection

@section('content')
	<div class="fakeimg1 text-center">
		   <h1> HAI NAM AUTOMATION </h1>
		   <div class="p1">MANUFACTURING MONITORING SYSTEM</div>
	</div>
    <div class="w3-bar w3-black" style="" >
    		<a href="index.html" class="w3-bar-item w3-button" id="lib-thanh">Home</a>
	</div>
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
				   window.location='changePass';
				})
				});
				</script>
        @endforeach
	@endif
	 @if (session('error'))
	           	<script type="text/javascript">
				    $(document).ready(function(){
				   swal({
				  title: "Sorry!",
				  text: "{{session('error')}}",
				  icon: "error",
				  dangerMode: true,
				})
				   .then((willDelete) => {
				   window.location='changePass';
				})
				});
				</script>
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
				   window.location='changePass';
				})
				});
				</script>
	          @endif

    <form  method="post" action="changePass">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="container">
  			<div class="login-container">
		        <div id="output"></div>
			    <div class="avatar"></div>
	            <div class="form-box">
	                <input name="id" type="text" placeholder="id" required="" autocomplete="off">
	                <input type="password" name="oldpassword" placeholder="old password" required="">
	                <input type="password" name="newpassword1" id="pass1" placeholder="new password" required="">
	                <input type="password" name="newpassword2" id="pass2" placeholder="new password" required="" onkeyup="checkPass(); return false;">
	                <span id="confirmMessage" class="confirmMessage"></span>
	                <button class="btn btn-info btn-block login" name="Submit" type="submit">SUBMIT</button>
	            </div>
	        </div>
        </div>
    </form>

@endsection


@section('script')
<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}
</script>  

@endsection


