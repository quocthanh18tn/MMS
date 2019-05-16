	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($customer->idCustomer); ?></td>
                        <td><?php echo e($customer->name); ?></td>
                        <td><?php echo e($customer->phone); ?></td>
                        <td><?php echo e($customer->company); ?></td>
                        <td><?php echo e($customer->address); ?></td>
                    </tr>
                </tbody>
        	</table>
