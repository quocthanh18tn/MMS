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
                        <td>{{$panel->name}}</td>
                        <td>{{$panel->panel_type->name}}</td>
	                        <?php $count = 0; ?>
	                        @foreach ($panel->columns as $col)
	                        <?php $count ++ ?>
	                        @endforeach
                        <td>{{$count}}</td>
                        <td>{{$panel->expectFat}}</td>
                        <td>{{$panel->expectDelivery}}</td>
                        <td>{{$panel->adjustFat}}</td>
                        <td>{{$panel->adjustDelivery}}</td>
                        <td>{{$panel->Delivery}}</td>
                    </tr>
                </tbody>
</table>
