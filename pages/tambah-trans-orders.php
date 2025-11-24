<?php

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectTransOrders =  mysqli_query($config, "SELECT name FROM trans_orders WHERE id = '$id'");
$trans_orders = mysqli_fetch_assoc($selectTransOrders);
// var_dump($level);

if (isset($_POST['simpan'])) {
    $customer_id = $_POST['customer_id'];
    $order_code = $_POST['order_code'];
    $order_end_date = $_POST['order_end_date'];
    $order_status = $_POST['order_status'];
    $order_pay = $_POST['order_pay'];
    $order_changes = $_POST['order_changes'];
    $order_tax = $_POST['order_tax'];
    $order_total = $_POST['order_total'];
    $insert = mysqli_query($config, "INSERT INTO trans_orders (name) VALUES ('$name')");

    header("location:?page=trans_orders");
}
if (isset($_POST['update'])) {
    $customer_id = $_POST['customer_id'];
    $order_code = $_POST['order_code'];
    $order_end_date = $_POST['order_end_date'];
    $order_status = $_POST['order_status'];
    $order_pay = $_POST['order_pay'];
    $order_changes = $_POST['order_changes'];
    $order_tax = $_POST['order_tax'];
    $order_total = $_POST['order_total'];
    $update = mysqli_query($config, "UPDATE trans_orders SET name = '$name' WHERE id = $id");
    header('location:?page=trans_orders');
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
                    <h1 class="card-tittle"><?php echo isset($_GET['edit']) ? 'Update' : 'Add' ?> Trans Orders</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="" class="form-label m-1">Name</label><br>
                        <input type="text" class="form-control w-50" name="name" value="<?php echo $trans_orders['name'] ?? '' ?>"><br>
                        <button type="submit" class="btn btn-primary"
                            name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>