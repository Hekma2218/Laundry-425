<?php
$query = mysqli_query($config, "SELECT * FROM trans_orders");
$trans_orders = mysqli_fetch_all($query, MYSQLI_ASSOC);
// var_dump($categories);
// mysqli_fetch_assoc($q_categories); 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q_delete = mysqli_query($config, "DELETE FROM trans_orders WHERE id = '$id'");
    header("location:?page=trans_orders");
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
                        Data Trans_Orders
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end m-2">
                        <a href="?page=tambah-service" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add Trans_Orders</a>
                    </div>
                    <table class="table table-bordered"">
                        <tr>
                            <th>Customer Id</th>
                            <th>Order Code</th>
                            <th>Order End_Date</th>
                            <th>Order Status</th>
                            <th>Order Changes</th>
                            <th>Order Tax</th>
                            <th>Order Total</th>
                        </tr>
                        <?php
                        foreach ($trans_orders as $key => $trans_order) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $key + 1 ?>
                                </td>
                                <td><?php echo $trans_order['name'] ?></td>
                                <td><a href=" ?page=tambah-trans_orders&edit=<?php echo $trans_order['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form class="d-inline" action="?page=trans_orders&delete=<?php echo $trans_order['id'] ?>" method="post"
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