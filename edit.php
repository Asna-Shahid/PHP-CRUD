<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
<?php
include("./db.php");
if(isset($_REQUEST['btn_save'])){
    $id=$_GET['id'];
    $query = "UPDATE tbl_info SET 
    name = '".$_REQUEST['txt_name']."',
    email = '".$_REQUEST['txt_email']."',
    phone = '".$_REQUEST['txt_phone']."',
    cnic = '".$_REQUEST['txt_cnic']."',
    education = '".$_REQUEST['cbo_education']."'  WHERE id='$id'";
    mysqli_query($dbconnection,$query);





    header("location:listrecords.php");
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
            <div class="col-sm-8">
                <form method="post" enctype="multipart/form-data">
                    <h1>Edit Student information Form</h1>
                    <a href="./listrecords.php" class="btn btn-secondary">Back to List</a>
                    <?php
                      $id = $_GET['id'];  
                      $querys="SELECT * FROM tbl_info WHERE id = '$id'";
                      $record=mysqli_query($dbconnection,$querys);

                    $get_record = mysqli_fetch_array($record);
                   
                    ?>
                    <div class="form-group">
                        <label for="username">Enter your Name</label>
                        <input type="text" value="<?=$get_record['name'];?>" name="txt_name" maxlength="50" required
                            id="txt_name1" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="email" value="<?=$get_record['email'];?>" class="form-control" name="txt_email"
                            id="txt_email2" />
                    </div>
                    <div class="form-group">
                        <label for="">Enter Phone</label>
                        <input type="text" value="<?=$get_record['phone'];?>" class="form-control" name="txt_phone"
                            id="txt_phone2" />
                    </div>
                    <div class="form-group">
                        <label for="">Enter CNIC</label>
                        <input type="text" value="<?=$get_record['cnic'];?>" class="form-control" name="txt_cnic"
                            required id="txt_cnic2" />
                    </div>
                    <div class="form-group">
                        <label for="">Enter Education</label>
                        <select name="cbo_education" required class="form-control">
                            <option value="">---Select Education---</option>
                            <option value="BS" <?php if($get_record['education'] == 'BS')echo("SELECTED");?>>BS</option>
                            <option value="MS" <?php if($get_record['education'] == 'MS')echo("SELECTED");?>>MS</option>
                            <option value="PHD" <?php if($get_record['education'] == 'PHD')echo("SELECTED");?>>PHD
                            </option>
                        </select>
                    </div>

                    <button type="submit" name="btn_save" class="btn btn-primary mt-3"> Update Now </button>
                </form>
            </div>
           
        </div>
       


    </div>
    
</body>

</html>