<?php $__env->startSection('content'); ?>

		<div class="fakeimg1 text-center">
		   <h1> HAI NAM AUTOMATION </h1>
		   <div class="p1">MANUFACTURING MONITORING SYSTEM</div>
		</div>


		<div class="w3-bar w3-black" style="" >
		      <div class="w3-dropdown-hover">
			      <button class="w3-button" style="padding: 14px;">Login</button>
			      <div class="w3-dropdown-content w3-bar-block">
	                    <a class="w3-bar-item w3-button" id="lib-thanh" href="login">Administrator</a>
	                    <a class="w3-bar-item w3-button" id="lib-thanh" href="login">Project Manager</a>
	                    <a class="w3-bar-item w3-button" id="lib-thanh" href="login">Production Manager</a>
			      </div>
		      </div>

		       <a href="monitoring/project/theodoiduan.php" class="w3-bar-item w3-button" id="lib-thanh"> Project Status</a>
		       <a href="monitoring/qtsx/qtsx.php" class="w3-bar-item w3-button" id="lib-thanh">Task Monitoring</a>
		       <a href="monitoring/qtsx/theodoicongviec.php" class="w3-bar-item w3-button" id="lib-thanh">Task History</a>
		       <a href="monitoring/employee_list.php" class="w3-bar-item w3-button" id="lib-thanh">Employee List</a>

	    	   <div class="w3-dropdown-hover">
			      <button class="w3-button" style="padding: 14px;">Contact</button>
			      <div class="w3-dropdown-content w3-bar-block">
			                    <a class="w3-bar-item w3-button" id="lib-thanh" ">Mr.Huynh Thai Hoang</a>
			                    <a class="w3-bar-item w3-button" id="lib-thanh" >Mr. Dang Phuoc Duc</a>
			                    <a class="w3-bar-item w3-button" id="lib-thanh" >Mr.Thanh: 0933 992 598</a>
			                    <a class="w3-bar-item w3-button" id="lib-thanh" >Mr.Bao: 0961 132 595</a>
			      </div>
		    	</div>
  		</div>

		<div id="demo" class="carousel slide" data-ride="carousel">
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		  </ul>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="image/Banner4.jpg" alt="Los Angeles" >
		
		    </div>
		    <div class="carousel-item">
		      <img src="image/Banner3.jpg" alt="Chicago" >
		      
		    </div>
		    <div class="carousel-item">
		      <img src="image/Banner5.jpg" alt="New York" >
		      
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>