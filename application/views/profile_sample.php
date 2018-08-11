
<!DOCTYPE html>
<html>
	<head>
  <h1> Current Information: </h1>
  </head>
  <body>
  <table  style="width:100%">

    <style> table, th, td {
    border: 1px solid black;
    </style>


      <tr>
    <th>Customer Address</th>
    <th>Cell Number</th>
  </tr>
     <?php foreach ($profile_data as $data) {?>
     <tr>
         <td><?php echo $data->custaddress; ?></td>
         <td><?php echo $data->cellno; ?></td>
      </tr>
     <?php }?>
   </table>

    <h1> Update Information: </h1>

    <form action="<?php echo base_url() . "index.php/userprofilecontrol"; ?>">
  Customer Address:<br>
  <input type="text" name="custaddress" value="address">
  <br>
  Cell Number:<br>
  <input type= "number" name="cellnumber" value="cell">
  <br><br>
  <input type="submit" value="Submit">
</form>

  </body>
</html>
