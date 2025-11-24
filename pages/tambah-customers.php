<?php

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectCustomer =  mysqli_query($config, "SELECT name FROM customers WHERE id = '$id'");
$customer = mysqli_fetch_assoc($selectCustomer);
// var_dump($level);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $insert = mysqli_query($config, "INSERT INTO customers (name) VALUES ('$name')");

    header("location:?page=customers");
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $update = mysqli_query($config, "UPDATE customers SET name = '$name' WHERE id = $id");
    header('location:?page=customers');
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
                    <h1 class="card-tittle"><?php echo isset($_GET['edit']) ? 'Update' : 'Add' ?> Customers</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="" class="form-label m-1">Name</label><br>
                        <input type="text" class="form-control w-50" name="name" value="<?php echo $customers['name'] ?? '' ?>"><br>
                        <button type="submit" class="btn btn-primary"
                            name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>