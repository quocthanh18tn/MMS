<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layout.headeradministration', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	          <?php if(session('success')): ?>
	           	<script type="text/javascript">
				    $(document).ready(function(){
				   swal({
				  title: "Welcom!",
				  text: "<?php echo e(session('success')); ?>",
				  icon: "success",
				})
				   .then((willDelete) => {
				   window.location='administration/index.html';
				})
				});
				</script>
	          <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>