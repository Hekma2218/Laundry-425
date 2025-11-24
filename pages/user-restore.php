<?php
//include include_once required_once


$query = mysqli_query($koneksi, "SELECT r.name AS role_name, u.* FROM users u LEFT JOIN roles AS r ON r.id = u.role_id WHERE u.deleted_at IS NOT NULL ORDER BY u.id DESC");
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

//parameter delete
// $_GET, isset, empty

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
    //redirect
    header("location:?page=user&apus=berhasil");
}

if (isset($_GET['restore'])) {
    $id = $_GET['restore'];
    $restore = mysqli_query($koneksi, "UPDATE users SET deleted_at=NULL WHERE id=$id");
    header("location:?page=user");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User Restore</title>
</head>

<body>
    <h1>Data User Restore</h1>
    <div align="left">
        <a href="?page=user">Back</a>
    </div>
    <br>
    <table class="table" border="1" width="60%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $value) { ?>
                <tr>
                    <td> <?php echo $key += 1  ?> </td>
                    <td> <?php echo $value['name'] ?></td>
                    <td> <?php echo $value['email'] ?></td>
                    <td> <?php echo $value['role_name'] ?></td>
                    <td> <a href="?page=user-restore&restore=<?php echo $value['id'] ?>" onclick="return confirm('Apakah anda yakin akan restore data ini?')"
                            href="?page=user&delete=<?php echo $value['id'] ?>">RESTORE DATA |</a>

                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                            href="?page=user-restore&delete=<?php echo $value['id'] ?>"> DELETE </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>