        	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID Project</th>
                        <th>Name</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $order)
                    <tr class="odd gradeX" align="center">
                        <td>{{$order->projects->idProject}}</td>
                        <td>{{$order->projects->name}}</td>
                        <td>{{"Order ".$order->idOrder.": ".$order->customers->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
        	</table>
