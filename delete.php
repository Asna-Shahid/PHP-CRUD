<?php   
 include './db.php';  
 $query = "select * from tbl_info";  
 $run = mysqli_query($dbconnection,$query);  
 ?>  
  <?php   
 include './db.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `tbl_info` WHERE id = '$id'";  
      $run = mysqli_query($dbconnection,$query);  
      if ($run) {  
           header('location:delete.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?> 
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>Delete Data From Database in PHP</title>  
      <link rel="stylesheet" type="text/css" href="style.css">  
 </head>  
 <body>  
 <header></header>  
 <table border="1" cellspacing="0" cellpadding="0">  
      <tr class="heading">  
           <th>Sl No</th>  
           <th>ID</th>  
           <th>Student Name</th>  
           <th>Class</th>  
           <th>Father's Name</th>  
           <th>Mother's Name</th>  
           <th>Address</th>  
           <th>Operation</th>  
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>  
                               <td>".$result['id']."</td>  
                               <td>".$result['name']."</td>  
                               <td>".$result['email']."</td>  
                               <td>".$result['phone']."</td>  
                               <td>".$result['cnic']."</td>  
                               <td>".$result['education']."</td>  
                               <td><a href='delete.php?id=".$result['id']."' id='btn'>Delete</a></td>  
                          </tr>  
                     ";  
                }  
           }  
      ?>  
 </table>  
 </body>  
 </html>  