<?php
include("./db.php");
if(isset($_REQUEST['btn_save']))
{
 
   $query = "INSERT INTO tbl_info(name,email, phone, cnic, education)VALUES(
       '".$_REQUEST['txt_name']."', '".$_REQUEST['txt_email']."', '".$_REQUEST['txt_phone']."', 
       '".$_REQUEST['txt_cnic']."', '".$_REQUEST['cbo_education']."'
       )";



   mysqli_query($dbconnection,$query);

   // empty header
   header("location:index.php?msg");
   // Confirmation saved data 
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
                    <h1>Student information Form</h1>
                    <div class="form-group">
                        <label for="username">Enter your Name</label>
                        <input type="text" name="txt_name" maxlength="50" required id="txt_name1" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="email" class="form-control" name="txt_email" id="txt_email2" />
                    </div>
                    <div class="form-group">
                        <label for="">Enter Phone</label>
                        <input type="text" class="form-control" name="txt_phone" id="txt_phone2" />
                    </div>
                    <div class="form-group">
                        <label for="">Enter CNIC</label>
                        <input type="text" class="form-control" name="txt_cnic" required id="txt_cnic2" />
                    </div>
                    <div class="form-group">
                        <label for="">Enter Education</label>
                        <select name="cbo_education" required class="form-control">
                            <option value="">---Select Education---</option>
                            <option value="BS">BS</option>
                            <option value="MS">MS</option>
                            <option value="PHD">PHD</option>
                        </select>
                    </div>

                    <button type="submit" name="btn_save" class="btn btn-primary mt-3"> Save Now </button>
                </form>
            </div>
            <div class="col-sm-4">
                <?php
                if(isset($_REQUEST['msg']))
                {
            ?>
                <h2 class="alert alert-success" id="message" style="display: ;">Data Posted Successfully</h2>
                <script>
                function hide_it() {
                    document.getElementById("message").style.display = "none";
                }
                setTimeout(hide_it, 3000);
                </script>
                <?php
                }
                ?>
            </div>
        </div>



    </div>
</body>

</html>