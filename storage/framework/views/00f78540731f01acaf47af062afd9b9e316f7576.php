<style>
.modal1 {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: black; /* Fallback color */
    background-color: white; /* Black w/ opacity */
    /*padding-top: 60px;*/
    /*margin: 5% 15% 15% 10%;*/
}
.animate {
    -webkit-animation: animatezoom 1s;
    animation: animatezoom 1s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes  animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

.sticky
            {
              position: -webkit-sticky;
              position: sticky;
              top: 0px;

            }
.close1 {
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
    float: right;
    margin-right: 10px;
}

.close1:hover,
.close1:focus {
    color: red;
    cursor: pointer;
}
.hover:hover {
    color: red;
    cursor: pointer;
}
.hover
{
  font-weight: bold;
  font-size: 20px;
  color: green;
  clear: right;
}
</style>
<div class="modal1 animate" id="id01" style="background-color: #ffffcc">
    <div class="sticky">
      <span onclick="document.getElementById('id01').style.display='none'" class="close1" title="Close Modal">&times;</span>
    </div>

    <h2 style="font-size: 30px;font-weight: bold;color: red;text-align: center;"> REVIEW PANELS INFORMATION </h2>
    <br>
    <div>
      <label class="word">Project ID:</label>
      <input type="text" value="<?php echo e($panel->first()->projects->idProject); ?>" style="font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 50px;
                        width: 80%;text-align: center;
                        " readonly>
      <br>
      <label class="word">Customer:</label>
      <input type="text" value='<?php echo e($customer->name."-".$customer->phone."-".$customer->idCustomer); ?>' readonly style="font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 50px;
                        width: 80%;text-align: center;
                        margin-left: 0.7%;
                        ">
      <br>
      <label class="word">Order:</label>
      <input type="text" value="<?php echo e($order); ?>" readonly style="font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 50px;
                        width: 80%;text-align: center;
                        margin-left: 3.8%;
                        ">
      <br>
    </div>
  
        <!-- code html -->
        <table class="table table-bordered">
          <tr>
          <th style="width: 30%;">
           <input type="text"  class="  form-control" value="Pannel" readonly  style="font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: 50px;
                        width: 100%;
                        text-align: center;">
                        </input></th>
          <th style="width: 20%" >
           <input type="text"  class=" form-control" value=" FAT Date" readonly style="font-weight: bold;
                              font-size: 17px;
                              background-color: #A0A0A0;
                              border-radius: 12px;
                              height: 50px;
                              width: 100%;
                              text-align: center;">
          </th>
          <th style="width: 20%">
            <input type="text"  class=" form-control" value=" Delivery Date" readonly  style="font-weight: bold;
                              font-size: 17px;
                              background-color: #A0A0A0;
                              border-radius: 12px;
                              height: 50px;
                              width: 100%;
                              text-align: center;">
          </th>
          <th style="width: 30%">
            <input type="text"  class=" form-control" value=" Column" readonly  style="font-weight: bold;
                              font-size: 17px;
                              background-color: #A0A0A0;
                              border-radius: 12px;
                              height: 50px;
                              width: 100%;
                              text-align: center;">
          </th>
          </tr>
        <!-- code html -->
      <?php
      //query tu
      $numrowtu=count($panel);
      for ($indexnumber=1;$indexnumber<=$numrowtu;$indexnumber++)
      // while ($arraytu=mysql_fetch_array($querytu))
      {
        $indexstring=(string)$indexnumber;
        $mstustring="mstu$indexstring";
        $tentu="tentu$indexstring";
        $type="type$indexstring";
        $fatstring="fat$indexstring";
        $deliverystring="delivery$indexstring";

        $mstu=$_GET["$mstustring"];
        $tentu=$_GET["$tentu"];


        $fat=$_GET["$fatstring"];
        $delivery=$_GET["$deliverystring"];
        $type=$_GET["$type"];

        if ($paneltype[0]->idPaneltype==$type)
            $tenloaitu = $paneltype[0]->name;
        else if($paneltype[1]->idPaneltype==$type)
            $tenloaitu =  $paneltype[1]->name;
        else if ($paneltype[2]->idPaneltype==$type)
            $tenloaitu =  $paneltype[2]->name;
        else if ($paneltype[3]->idPaneltype==$type)
            $tenloaitu =  $paneltype[3]->name;
        else
          $tenloaitu = $paneltype[4]->name;
        
        // bien show thong tin tu
        $panel="ID:$mstu <br> Name:$tentu <br> Type:$tenloaitu";

        //show column
        $column="";
        $numbercolumnstring="numbercolumn$indexstring";
        $numbercolumn=$_GET["$numbercolumnstring"];
            for ( $indextemp=1;$indextemp<= $numbercolumn;$indextemp++)
             {
                if ($indextemp <10)
                {
                    $mskhungtu=$mstu.'-'.'00'.$indextemp;
                    $name="$mskhungtu$indextemp";
                    $name=$_GET["$name"];
                    $column="$column $mskhungtu :$name <br>";
                }
                else if ($indextemp <100)
                {
                    $mskhungtu=$mstu.'-'.'0'.$indextemp;
                    $name="$mskhungtu$indextemp";
                    $name=$_GET["$name"];
                    $column="$column $mskhungtu :$name <br>";
                }
                else
                {
                      $mskhungtu=$mstu.'-'.$indextemp;
                      $name="$mskhungtu$indextemp";
                      $name=$_GET["$name"];
                    $column="$column $mskhungtu :$name <br>";

                }
            }
            ?>
          <!-- code html -->
          <tr>
            <td style="font-size: 18px;" title="Panel_ID: Name : Type" ><?php echo $panel ?></td>
            <td style="font-size: 18px;"><?php echo $fat ?></td>
            <td style="font-size: 18px;"><?php echo $delivery ?></td>
            <td style="font-size: 18px;" title="Column_ID : Name "><?php echo $column ?></td>
          </tr>
          <!-- code html -->
        <?php
      }
      ?>
        </table>
</div>
      