<?php   
 include './db.php';  
 
 ?> 

<?php   
 include './db.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM tbl_info WHERE id = '$id'";  
      $run = mysqli_query($dbconnection,$query);  
      if ($run) {  
           header('location:listrecords.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
        include("./topmenu.php")
    ?>
    <div class="container">



        <div class="row">
            <h2>Student List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>CniC</th>
                        <th>Education</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                


             
                        <?php   
                         $get_record = "SELECT * FROM tbl_info ";
                         $record = mysqli_query($dbconnection,$get_record);

      $i=1;  
           if ($num = mysqli_num_rows($record)>0) {  
                while ($result = mysqli_fetch_assoc($record)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>
                               <td>".$result['name']."</td>  
                               <td>".$result['email']."</td>  
                               <td>".$result['phone']."</td>  
                               <td>".$result['cnic']."</td>  
                               <td>".$result['education']."</td>  
                               <td> <a href='listrecords.php?id=".$result["id"]."'   <b class='material-icons btn btn-danger btn-simple'
                               >Delete</a>
                                
                               <a class='btn btn-primary' href='edit.php?id=".$result["id"]."' class='opt'>Edit/Update</a> </td>  
                          </tr>  
                     ";  
                }  
           }  
      ?>  
                </tbody>
            </table>
        </div>
       

    </div>
</body>

</html>