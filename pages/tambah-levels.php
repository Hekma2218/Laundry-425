<?php

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectLevel =  mysqli_query($config, "SELECT name FROM levels WHERE id = '$id'");
$level = mysqli_fetch_assoc($selectLevel);
// var_dump($level);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $insert = mysqli_query($config, "INSERT INTO levels (name) VALUES ('$name')");

    header("location:?page=levels");
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $update = mysqli_query($config, "UPDATE levels SET name = '$name' WHERE id = $id");
    header('location:?page=level');
};
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
                    <h1 class="card-tittle"><?php echo isset($_GET['edit']) ? 'Update' : 'Add' ?> Levels</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="" class="form-label m-1">Name</label><br>
                        <input type="text" class="form-control w-50" name="name" value="<?php echo $levels['name'] ?? '' ?>"><br>
                        <button type="submit" class="btn btn-primary"
                            name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>