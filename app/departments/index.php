<?php
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
include_once '../../vendor/config.php';

$msg = null;

$selectDepartments = "SELECT * FROM `department`";
$departments = mysqli_query($connection, $selectDepartments);
 if (isset($_GET['id'])) {
     $id = $_GET['id'] ; 
      $deleteDepartment = "DELETE FROM `department` WHERE `id` = '$id'";
   if (mysqli_query($connection, $deleteDepartment)) {
         $msg = "Department Deleted Successfully!";
       
        exit(); 
    }else{
        $msg = "Error Occure";
     }
 }
?>


<section id="list-departments">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">List Deapartments
            <a class="btn btn-dark float-end" href="./create.php">Add Department</a>
        </h1>
        <div class="card shadow p-4">
            <?php if ($msg != null): ?>
            <div class="alert alert-success text-center fw-bold">
                <p><?= $msg ?></p>
            </div>
                    <?php endif ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($departments as $department): ?>
                    <tr>
                        <td>
                        <?= $department['id'] ?>
                        </td>
                        <td>
                        <?= $department['title'] ?>
                        </td>
                        <td>
                            <a href="./show.php?id=<?= $department['id'] ?>"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="./edit.php?id=<?= $department['id'] ?>"><i class="fa-solid fa-pen text-warning"></i></a>
                        </td>
                         <td>
                            <a href="./index.php?id=<?= $department['id'] ?>">
                            <i class="fa-solid fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>