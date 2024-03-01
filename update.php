<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="text-center mt-5">Update Student Data</h1>
<div class="container mt-4">
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM `student_information` WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <form action="process.php?id=<?php echo $row['id']; ?>" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="student_id" class="form-label">Student I.D</label>
                        <input type="text" class="form-control" name="student_id" value="<?php echo $row['student_id'] ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'] ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="mname" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="mname" value="<?php echo $row['mname'] ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'] ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="birthday" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="birthday" value="<?php echo $row['birthday'] ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                          <button name="updateButton" type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
        });
    </script>
    <?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>
</body>
</html>
