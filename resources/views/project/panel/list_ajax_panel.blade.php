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
                    @foreach($panel as $panel)
                    <tr class="odd gradeX" align="center">
                        <td>{{$panel->idPanel}}</td>
                        <td>{{$panel->name}}</td>
	                        <?php $count = 0; ?>
	                        @foreach ($panel->columns as $col)
	                        <?php $count ++ ?>
	                        @endforeach
                        <td>{{$count}}</td>
                        <td>{{$panel->expectFat}}</td>
                        <td>{{$panel->expectDelivery}}</td>
                        <td>{{$panel->Delivery}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a   onclick="return confirm('Are you sure you want to Delete?');" href="project/deletepanel.html/{{$panel->id}}"> Delete</a></td>

                    </tr>
                    @endforeach
                </tbody>
        	</table>
