        	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID Panel</th>
                        <th>Name</th>
                        <th>Number of Column</th>
                        <th>Fat Date</th>
                        <th>Delivery Date</th>
                        <th>Actual Delivery</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $panel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($panel->idPanel); ?></td>
                        <td><?php echo e($panel->name); ?></td>
	                        <?php $count = 0; ?>
	                        <?php $__currentLoopData = $panel->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <?php $count ++ ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($count); ?></td>
                        <td><?php echo e($panel->expectFat); ?></td>
                        <td><?php echo e($panel->expectDelivery); ?></td>
                        <td><?php echo e($panel->Delivery); ?></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a   onclick="return confirm('Are you sure you want to Delete?');" href="project/deletepanel.html/<?php echo e($panel->id); ?>"> Delete</a></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
        	</table>
