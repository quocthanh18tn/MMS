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
                        <td>{{$customer->idCustomer}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->company}}</td>
                        <td>{{$customer->address}}</td>
                    </tr>
                </tbody>
        	</table>
