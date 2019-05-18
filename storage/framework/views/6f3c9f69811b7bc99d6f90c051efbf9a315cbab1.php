<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Name</th>
                        <th>Type</th>
                        <th>Number of Column</th>
                        <th>Fat Date</th>
                        <th>Delivery Date</th>
                        <th>Adjust Fat</th>
                        <th>Adjust Delivery</th>
                        <th>Actual Delivery</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($panel->name); ?></td>
                        <td><?php echo e($panel->panel_type->name); ?></td>
	                        <?php $count = 0; ?>
	                        <?php $__currentLoopData = $panel->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <?php $count ++ ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($count); ?></td>
                        <td><?php echo e($panel->expectFat); ?></td>
                        <td><?php echo e($panel->expectDelivery); ?></td>
                        <td><?php echo e($panel->adjustFat); ?></td>
                        <td><?php echo e($panel->adjustDelivery); ?></td>
                        <td><?php echo e($panel->Delivery); ?></td>
                    </tr>
                </tbody>
</table>
