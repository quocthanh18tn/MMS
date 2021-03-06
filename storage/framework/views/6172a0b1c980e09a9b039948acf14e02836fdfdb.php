<?php $__env->startSection('css'); ?>
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
    
		@media    screen and (max-width: 500px) {
		  /* For mobile phones: */
		 .grid-container {
		  grid-template-columns: 150px 150px  100px 100px;
		  padding: 10px;
		}
		
		 }
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layout.headerproject', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<br>
  		<p id="p1">Customer Information </p>
  		<form method="get" action="project/page_listcustomer.html" >
	  		<div class="grid-container">
	  			<div class="grid-item" id="p2">Search Information:</div>
				<input type ="text" name="search" class="grid-item "  placeholder="Id, Name, Company, Phone, Address"> </input>
	            <input type = "submit" name="button1"  class="grid-item btn btn-lg btn-primary" value= "Search"  >
	            <input type = "submit" name="button2"  class="grid-item btn btn-lg btn-primary" value= "Show all"  >
	  		<hr>
	  		</div>
  		</form>	

  		<?php if(isset($customer)): ?>
  			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($cus->idCustomer); ?></td>
                        <td><?php echo e($cus->name); ?></td>
                        <td><?php echo e($cus->company); ?></td>
                        <td><?php echo e($cus->address); ?></td>
                        <td><?php echo e($cus->phone); ?></td>
                       <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a   onclick="return confirm('Are you sure you want to Delete?');" href="project/deletecustomer.html/<?php echo e($cus->id); ?>"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="project/adjustcustomer.html/<?php echo e($cus->id); ?>">Edit</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
        	</table>
          <div style="text-align: center;">
                    <?php echo e($customer->appends(request()->input())->links()); ?>

                </div>
  		<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

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
           window.location='project/listcustomer.html';
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
       window.location='project/listcustomer.html';
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
         window.location='project/listcustomer.html';
      })
      });
      </script>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>