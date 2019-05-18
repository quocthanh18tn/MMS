<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Column ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $panel->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                    <td><?php echo e($col->idColumn); ?></td>
                    <td><?php echo e($col->name); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
</table>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-4">
                  <lable for = "id" class="word" > Select Mode:</lable>
                </div>
                
                <div class="col-sm-4">
                 <select  id="mode" name="mode">
                      <option value="" >SELECT ...</option>
                      <option value="1" >Add</option>
                      <option value="2" >Delete</option>
                      <option value="3" >Update</option>
                </select>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>


                
<div id="divadd" style="display: none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                      <lable for = "id" class="word" > Column ID:</lable>
                    </div>
                    
                    <div class="col-sm-4">
                        <input id="idcoladd" name="idcoladd">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                      <lable for = "id" class="word" > Name:</lable>
                    </div>
                    
                    <div class="col-sm-4">
                        <input id="namecoladd" name="namecoladd" >
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-item word" ></div>
        <div class="grid-item ">
            <input type = "button" name="add" id="add" class="grid-item btn btn-lg btn-primary" value= "Add" disabled="" >
        </div>
    </div>
</div>
<br>


        
<div id="divdelete" style="display: none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                      <lable for = "id" class="word" > Column ID:</lable>
                    </div>
                    
                    <div class="col-sm-4">
                        <select  id="idcoldelete" name="idcoldelete">
                          <option value="" >SELECT ...</option>
                          <?php $__currentLoopData = $panel->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($col->id); ?>" ><?php echo e($col->idColumn); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="grid-container">
        <div class="grid-item word" ></div>
        <div class="grid-item ">
            <input type = "button" name="delete" id="delete" class="grid-item btn btn-lg btn-primary" value= "Delete"  >
        </div>
    </div>
</div>
<br>


<div id="divupdate" style="display: none" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                      <lable for = "id" class="word" > Column ID Old:</lable>
                    </div>
                    
                    <div class="col-sm-4">
                        <select  id="idcolupdate" name="idcolupdate">
                          <option value="" >SELECT ...</option>
                          <?php $__currentLoopData = $panel->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($col->id); ?>" ><?php echo e($col->idColumn); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-4">
                      <lable for = "id" class="word" > Column ID New:</lable>
                    </div>
                    
                    <div class="col-sm-4">
                        <input id="idcolupdatenew" name="idcolupdatenew">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                      <lable for = "id" class="word" > Name:</lable>
                    </div>
                    
                    <div class="col-sm-4">
                        <input id="namecolupdate" name="namecolupdate">
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-item word" ></div>
        <div class="grid-item ">
            <input type = "button" name="update" id="update" class="grid-item btn btn-lg btn-primary" value= "Update"  disabled="" >
        </div>
    </div>
</div>
<br>


 <script >
        $(document).ready(function(){
            $("#mode").change(function(){
                var mode=$("#mode").val();

                if (mode ==1)
                    {
                      document.getElementById('divadd').style.display='block';
                      document.getElementById('divupdate').style.display='none';
                      document.getElementById('divdelete').style.display='none';
                    }
                    else if (mode ==2)
                    {
                    document.getElementById('divadd').style.display='none';
                      document.getElementById('divdelete').style.display='block';
                      document.getElementById('divupdate').style.display='none';

                    }
                    else if (mode ==3)
                    {
                    document.getElementById('divadd').style.display='none';
                      document.getElementById('divdelete').style.display='none';
                      document.getElementById('divupdate').style.display='block';

                    }
                    else
                    {
                    document.getElementById('divadd').style.display='none';
                      document.getElementById('divdelete').style.display='none';
                      document.getElementById('divupdate').style.display='none';

                    }
            }); //end mode chang
        $("#idcoladd").keyup(function(){
            var idColumn = $("#idcoladd").val();
             if(idColumn!="")
                    $('#add').removeAttr('disabled');
                    else
                    $('#add').attr('disabled','disabled');
                });
        $("#idcolupdate").change(function(){
            var idcolupdate = $("#idcolupdate").val();
             if(idcolupdate!="")
                    $('#update').removeAttr('disabled');
                    else
                    $('#update').attr('disabled','disabled');
                });
        });

        // xu ly button add delete update
        $(document).ready(function(){
            $("#add").click(function(){
                swal({
                  title: "Are you sure?",
                  text: "If you want to add new column, click OK!",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                  //swap end
                .then((willDelete) => {
                  if (willDelete)
                  {
                    var idColumn = $("#idcoladd").val();
                    var name = $("#namecoladd").val();
                    if (name =="")
                        name= "xxx"; // controler check xxx not insert, 
                    var idPanel = $("#idPanel").val();
                    var idColumnNew=1;
                    var mode = 1;
                    $.get("project/editcolumn_action.html/"+idColumn+"/"+idColumnNew+"/"+name+"/"+idPanel+"/"+mode, function(data){
                        if (data ==1)
                        {
                           swal({
                              title: "Congratulation",
                              text: "Add new column success!",
                              icon: "success",
                            })
                           .then((willDelete)=>{
                               window.location='project/editcolumn.html';
                           });
                        }
                    });//end get ajax
                   }
                   else
                    {
                    swal("You have cancelled!");
                    }
                });
                //end then
            });//end add click
            $("#delete").click(function(){
                swal({
                  title: "Are you sure?",
                  text: "If you want to delete column, click OK!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                  //swap end
                .then((willDelete) => {
                  if (willDelete)
                  {
                    var idColumn = $("#idcoldelete").val(); //id primary key
                    var idColumnNew=1;
                    var name = "1";
                    var idPanel = "2";
                    var mode = 2;
                    $.get("project/editcolumn_action.html/"+idColumn+"/"+idColumnNew+"/"+name+"/"+idPanel+"/"+mode, function(data){
                        if (data ==1)
                        {
                           swal({
                              title: "Congratulation",
                              text: "Delete column success!",
                              icon: "success",
                            })
                           .then((willDelete)=>{
                               window.location='project/editcolumn.html';
                           });
                        }
                    });//end get ajax
                   }
                   else
                    {
                    swal("You have cancelled!");
                    }
                });
                //end then
            });//end delete click
            $("#update").click(function(){
                swal({
                  title: "Are you sure?",
                  text: "If you want to update column, click OK!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                  //swap end
                .then((willDelete) => {
                  if (willDelete)
                  {
                    var idColumn = $("#idcolupdate").val(); //id primary key
                    var idColumnNew = $("#idcolupdatenew").val(); //id column update not primary key
                    if (idColumnNew =="")
                        idColumnNew = "xxx";
                    var name = $("#namecolupdate").val();
                    if (name =="")
                        name= "xxx"; // controler check xxx not insert,
                    var idPanel =$("#idPanel").val();
                    var mode = 3;
                    $.get("project/editcolumn_action.html/"+idColumn+"/"+idColumnNew+"/"+name+"/"+idPanel+"/"+mode, function(data){
                        if (data ==1)
                        {
                           swal({
                              title: "Congratulation",
                              text: "Update column success!",
                              icon: "success",
                            })
                           .then((willDelete)=>{
                               window.location='project/editcolumn.html';
                           });
                        }
                        else
                        {
                            swal("Fill new ID column or name!!!");
                        }
                    });//end get ajax
                   }
                   else
                    {
                    swal("You have cancelled!");
                    }
                });
                //end then
            });//end update click

            }); // document ready function
</script>


