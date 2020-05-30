<?php require_once '../templates/header.php'; ?>
<h1>All Users</h1>
<a href="/users/tambah.php">Tambah user</a>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $users = mysqli_query($conn, "SELECT * FROM users");
            while($user = mysqli_fetch_object($users)) {
        ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->password; ?></td>
            <td>
                <a href="/users/edit.php?id=<?= $user->id; ?>">Edit</a>
                <a href="/users/show.php?id=<?= $user->id; ?>">Show</a>
                <a href="/users/?hapus&id=<?= $user->id; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php

if (isset($_GET['hapus'])) {
    if ($_GET['id']) {
        $query = "DELETE FROM users WHERE id = " . $_GET['id'];
        if (mysqli_query($conn, $query)) {
            header('Location:/users');
        }
    }
}

require_once '../templates/footer.php'; ?>