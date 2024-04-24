<?php

    include 'config/config.php';

    $config = new Config();

    $config->conection = $config->connect();

    if($config->conection) {
        $result = $config->fetchAllStudentData();


        if(isset($_REQUEST['update_id'])) {
            $updateId = $_REQUEST['update_id'];

           $data = $config->fetchSingleStudentData($updateId);

           $singleRecord = mysqli_fetch_array($data);
        
        } 
        if(isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $course = $_POST['course'];

            $config->updateStudentData($name,$age,$course,$id);
        }

        if(isset($_REQUEST['dlt_id'])) {
            $dlt_id = $_REQUEST['dlt_id'];

            $config->deleteStudentRecord($dlt_id);
        }
    } 
    else {
        echo "Connection failed!!!";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">

        <?php 
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $course = $_POST['course'];

            $res = $config->addStudentData($name,$age,$course);

         if($name!=null && $age !=null && $course!=null) {
            if($res) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success!</strong> Student record inserted successfully!!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Failed!</strong> Student record insertion failed!!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
         } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Failed!</strong> Some field are!!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
         } 
        ?>

       <div class="col col-6">  
            <form action="index.php" method="POST">
                <input class="form-control" type="hidden" name="id" value="<?php echo @$singleRecord['id']?>"> <br>
                Name <input class="form-control" type="text" name="name" value="<?php echo @$singleRecord['name']?>"> <br>
                Age <input class="form-control" type="number" name="age" value="<?php echo @$singleRecord['age']?>"> <br>
                Course  <input class="form-control" type="text" name="course" value="<?php echo @$singleRecord['course']?>"> <br>
                <button 
                    class="<?php if(isset($_REQUEST['update_id'])) {echo "btn btn-warning";} else {echo "btn btn-primary";}?>" 
                    name="<?php if(isset($_REQUEST['update_id'])) { echo "update";} else { echo "submit";}?>">
                    <?php if(isset($_REQUEST['update_id'])) {echo "Update";} else {echo "Submit";}?>
                </button>
            </form>
            <br> <br> <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Course</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                        <?php
                        
                        while($record = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <th scope="row"><?php echo $record['id']?></th>
                            <td><?php echo $record['name']?></td>
                            <td><?php echo $record['age']?></td>
                            <td><?php echo $record['course']?></td>
                            <td>
                                <a href="index.php?update_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-primary" name="submit">Edit</button>
                                </a>
                                <a href="index.php?dlt_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-danger" name="submit">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>