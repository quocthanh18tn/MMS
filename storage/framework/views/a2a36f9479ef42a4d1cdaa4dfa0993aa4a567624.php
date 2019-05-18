<?php $__env->startSection('css'); ?>
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
			text-align: left;
		}
		.word{
			font-size: 18px;
			font-weight: bold;
			color: black;
			text-align: left;
		}
		#idPanel,#idProject,#idColumn{
		  width: 50%;
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
		  grid-template-columns: 302px 800px ;
		  padding: 10px;
		}
		.grid-item {
		  text-align: left;
		  margin-left: 2%;
		}

		@media  only screen and (max-width: 500px) {
		  /* For mobile phones: */
		 .grid-container {
		  grid-template-columns: 100px 300px;
		  padding: 10px;
		}
		#idPanel,#idProject,#idColumn{
			  width: 100%;
			}
		}
		
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layout.headerproduction', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<br>
		
  		<p id="p1">Task Assigment</p>
			
	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Project ID:</div>
	  			<div class="grid-item">
	                <select  id="idProject" name="idProject">
	                   	  <option value="0" >SELECT ...</option>
	                 	   <?php $__currentLoopData = $projectObj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                       <option  value="<?php echo e($project->id); ?>" ><?php echo e($project->idProject." :".$project->name); ?></option>
	                 	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
                </div>
	  		</div>
	  		<hr>

	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Panel ID:</div>
	  			<div class="grid-item">
  					<select  id="idPanel" name="idPanel">
           		    	  <option value="" >SELECT ...</option>
             		</select>
             	</div>
	  		</div>
	  		<hr>

	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Column ID:</div>
	  			<div class="grid-item">
	  				<select  id="idColumn" name="idColumn">
           		    	  <option value="" >SELECT ...</option>
             		</select>
             	</div>
	  		</div>
	  		<hr>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script >
        $(document).ready(function(){
        	$("#idProject").change(function(){
  	  			var idProject = $("#idProject").val();
  	  			document.getElementById("idPanel").innerHTML = "";
  	  			document.getElementById("idColumn").innerHTML = "";
	 			$.get("ajax/production_list_panel/"+idProject, function(data){
   		 			$("#idPanel").html(data)
	 			;}); //end get ajax
	 		}); //end idproject change

        	 $("#idPanel").change(function(){
  	  			var idPanel = $("#idPanel").val();
  	  			document.getElementById("idColumn").innerHTML = "";
	 			$.get("ajax/production_list_column/"+idPanel, function(data){
   		 			$("#idColumn").html(data)
	 			;}); //end get ajax
	 		}); //end idproject change
        }); // end document ready function
</script>



<?php if($errors->any()): ?>
    	 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	           	<script type="text/javascript">
				    $(document).ready(function(){
				   swal({
				  title: "Error!",
				  text: "<?php echo e($err); ?>",
				  icon: "error",
				})
				   .then((willDelete) => {
				   window.location='production/taskAssigment.html';
				})
				});
				</script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
   <?php if(session('success')): ?>
	   	<script type="text/javascript">
		    $(document).ready(function(){
		   swal({
		  title: "Congratulation!",
		  text: "<?php echo e(session('success')); ?>",
		  icon: "success",
		})
		   .then((willDelete) => {
		   window.location='production/taskAssigment.html';
		})
		});
		</script>
	<?php endif; ?>
      <?php if(session('error')): ?>
           	<script type="text/javascript">
			    $(document).ready(function(){
			   swal({
			  title: "Error!",
			  text: "<?php echo e(session('error')); ?>",
			  icon: "error",
			})
			   .then((willDelete) => {
			   window.location='production/taskAssigment.html';
			})
			});
			</script>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>