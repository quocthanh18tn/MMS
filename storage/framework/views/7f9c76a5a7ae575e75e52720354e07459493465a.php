        	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID Project</th>
                        <th>Name</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($order->projects->idProject); ?></td>
                        <td><?php echo e($order->projects->name); ?></td>
                        <td><?php echo e("Order ".$order->idOrder.": ".$order->customers->name); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
        	</table>
