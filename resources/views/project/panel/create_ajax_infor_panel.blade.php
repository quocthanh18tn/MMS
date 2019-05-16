
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th style=" font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 10px;
                        width: 15%;
                        text-align: center;">Panel ID       </th>
            <th style=" font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 10px;
                        width: 23%;
                        text-align: center;">Name           </th>
            <th style=" font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 10px;
                        width: 10%;
                        text-align: center;" >Type           </th>
            <th style=" font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        width: 15%;
                        height: 10px;
                        text-align: center;">Fat Date       </th>
            <th style=" font-weight: bold;
                        font-size: 17px;
                        background-color :#A0A0A0;
                        border-radius: 12px;
                        width: 15%;
                        height: 10px;
                        text-align: center;">Delivery Date  </th>
            <th  style="font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        width: 15%;
                        height: 10px;
                        text-align: center;">Number  of Columns</th>
        </tr>
    </thead>
                    <?php 
                        $numrow_tu=count($panel);
                        if ($numrow_tu==0)
                        {
                            echo '<script> var numrow=0;</script>';
                        }
                        else
                            echo '<script> var numrow=1;</script>';
                        $indexnumber=1;
                    ?>
    <tbody>
        @foreach($panel as $pan)
        <?php
                $indexstring=(string)$indexnumber;
                $mstustring="mstu$indexstring";
                $tentu="tentu$indexstring";
                $type="type$indexstring";
                $numbercolumnstring="numbercolumn$indexstring";
                $fatstring="fat$indexstring";
                $deliverystring="delivery$indexstring";

                $display="display$indexstring";
                $length=strlen($pan->idPanel);
                $item=substr($pan->idPanel,14,$length-14);
                $indexnumber++;
        ?>

            <tr >
                <td><textarea class="column" name="{{$mstustring}}" id="{{$mstustring}}" readonly title='{{"ProjectID: ".$pan->projects->idProject."
                \nCustomer Code: ".$customer."
                \nOrder: ".$order."
                \nPanel : ".$item}}'
                style="width:100%;height:auto;">{{$pan->idPanel}}</textarea></td>
                <td><textarea class="column" name="{{$tentu}}" readonly="" style=" width: 100%;height: auto;">{{$pan->name}}</textarea></td>
                <td>
                    <select class="column" name="{{$type}}" readonly="" style="width:100%;height:50px;">
                        <option value="">Select...</option>
                        @foreach ($paneltype as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach

                    </select>
                </td>
                <td>
                    <input type="date" class="column" ondblclick="copyfat('{{$fatstring}}')" id="{{$fatstring}}"  name="{{$fatstring}}" style="width:100%;height:50px;" >
                </td>
                <td>
                    <input type="date" class="column"  ondblclick="copydelivery('{{$deliverystring}}')" id="{{$deliverystring}}" name= "{{$deliverystring}}" style="width:100%;height:50px;" >
                </td>
                <td><input type="text"  class="column" style="  width:100%;height:50px;"   name="{{$numbercolumnstring}}" id="{{$numbercolumnstring}}" placeholder="enter number" onkeyup="createnamecolumn('{{$numbercolumnstring}}','{{$mstustring}}','{{$display}}')">
                </td>
            </tr>
                <td colspan="3"  id="{{$display}}"> </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="grid-container2">
    <div class="grid-item2-left" >
          <input type = "button" name="review" id="review" value= "Review"  class="btn btn-lg btn-primary" >
    </div>
    <div class="grid-item2-right">
          <input type = "button" value= "Add Database" onclick="confirm1()" class="btn btn-lg btn-primary" >
    </div>
    <hr>
</div>

<script type="text/javascript">

    function copyfat(variable)
    {
        var id = variable.slice(3);
        id = id -1;
        id = '#fat'+id;
        $('#'+variable).val($(id).val());

    }
    function copydelivery(variable)
    {
        var id = variable.slice(8);
        id = id -1;
        id = '#delivery'+id;
        $('#'+variable).val($(id).val());

    }
    function createnamecolumn(variable1,variable2,variable3)
    {
        var id_number_col='#'+variable1;
        var id_mstu='#'+variable2;
        var id_display='#'+variable3;
        var number_of_column=$(id_number_col).val();
        
        if (number_of_column<1000 && number_of_column>=1)
        {
        var mstu=$(id_mstu).val();
        $(document).ready(function(){
            $.get("ajax/Create_Panel_ajax_createname_column/"+mstu+"/"+number_of_column, function(data){
                    $(id_display).html(data)
                ;})
        });
        }
        else
        {
            $(id_number_col).val("");
            $(id_display).html("");

        }
    }

    function confirm1()
    {
        $(document).ready(function(){
              swal({
                  title: "Are you sure?",
                  text: "Click OK to create it!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
            .then((willDelete) => {
              if (willDelete)
                  {
                    document.form.submit();// window.submit();
                  }
               else
                    {
                        swal("You have cancelled!");
                    }
                });
            });
    }
    $(document).ready(function(){
       $("#review").click(function(){
        var data = $('form#form').serialize();
        $.ajax({
        type : 'GET', //kiểu post
        url  : 'ajax/Create_Pannel_ajax_review', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {
                      $("#reviewall").html(data);
               }
        });

        })
    })
</script>


