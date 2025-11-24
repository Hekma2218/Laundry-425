<?php
$query = mysqli_query($config, "SELECT * FROM levels");
$levels = mysqli_fetch_all($query, MYSQLI_ASSOC);
// var_dump($categories);
// mysqli_fetch_assoc($q_categories); 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q_delete = mysqli_query($config, "DELETE FROM levels WHERE id = '$id'");
    header("location:?page=levels");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">
                        Data levels
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end m-2">
                        <a href="?page=tambah-levels" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add levels</a>
                    </div>
                    <table class="table table-bordered"">
                        <tr>
                            <th>No</th>
                            <th>Level Name</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($levels as $key => $level) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $key + 1 ?>
                                </td>
                                <td><?php echo $level['name'] ?></td>
                                <td><a href=" ?page=tambah-levels&edit=<?php echo $level['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form class="d-inline" action="?page=levels&delete=<?php echo $level['id'] ?>" method="post"
                            onclick="return confirm('Are u sure wanna delete it?')">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>
                        </tr>
                    <?php
                        }
                    ?>

                    </table>

                </div>
            </div>
        </div>
    </div>




    <body>

</html>