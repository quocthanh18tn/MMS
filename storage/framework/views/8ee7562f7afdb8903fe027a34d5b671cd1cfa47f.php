
<?php if($number_of_column!=''): ?>
  <table >
    <tr>
      <th> <input type="text"   value="Column ID" readonly style=" font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: auto;
                        width: 100%;
                        text-align: center;" ></th>
      <th><input type="text"   value=" Name" readonly style=" font-weight: bold;
                        font-size: 17px;
                        background-color: #A0A0A0;
                        border-radius: 12px;
                        height: auto;
                        width: 100%;
                        text-align: center;" ></th>
    </tr>
<!-- html -->
<?php
  for ($i=1 ; $i <= $number_of_column ; $i++)
  {
      if ($i <10)
      {
        $mskhungtu=$mstu.'-'.'00'.$i;
        $namekhungtu="$mskhungtu$i";
        ?>
          <!--
           code html -->
          <tr>
            <td><input type="text" name="<?php echo $mskhungtu?>" readonly value="<?php echo $mskhungtu?>"  style=" width: 100%;height: auto;"></td>
            <td><input type="text" name="<?php echo $namekhungtu ?>" style=" width: 100%;height: auto;" ></td>
          </tr>
          <!-- code html -->
        <?php
      }
      elseif ($i <100)
      {
        $mskhungtu=$mstu.'-'.'0'.$i;
        $namekhungtu="name$i";
        ?>
          <!-- code html -->
          <tr>
            <td><input type="text" name="<?php echo $mskhungtu?>" readonly value="<?php echo $mskhungtu?>" style=" width: 100%;height: auto;"  ></td>
            <td><input type="text" name="<?php echo $namekhungtu ?>" style=" width: 100%;height: auto;" ></td>
            </tr>
          <!-- code html -->
        <?php
      }
      else
      {
        $mskhungtu=$mstu.'-'.$i;
        $namekhungtu="name$i";
        ?>
          <!-- code html -->
          <tr>
            <td><input type="text" name="<?php echo $mskhungtu?>" value="<?php echo $mskhungtu?>" style=" width: 100%;height: auto;"></td>
            <td><input type="text" name="<?php echo $namekhungtu ?>" style=" width: 100%;height: auto;"></td>
            </tr>
          <!-- code html -->
        <?php
      }
  }
?>
  </table>

<?php endif; ?>
