<?php
$user_id = $_GET['id-user'] ?? '';
$user = mysqli_query($koneksi, "SELECT * FROM user_level 
LEFT JOIN users ON users.id = user_level.user_id
LEFT JOIN levels ON levels.id = user_level.level_id 
WHERE user_id = '$user_id' ORDER BY user_level.id DESC");
?>
<div class="mb-3">
    <a href="?pg=tambah-user-role&id-user=<?= urlencode($user_id) ?>" class="btn btn-primary">Tambah User level</a>
</div>



<table class="table table-bordered">
    <?php if (isset($_SESSION['flash_message_success'])) { ?>
        <div class="alert alert-success" id="alert-tambah"><?php echo $_SESSION['flash_message_success']; ?></div>
        <script>
            setTimeout(function() {
                document.getElementById("alert-tambah").style.display = "none";
            }, 3000); // 3000 miliseconds = 3 detik
        </script>
        <?php unset($_SESSION['flash_message_success']); ?>
    <?php } ?>

    <?php if (isset($_SESSION['flash_message_delete'])) { ?>
        <div class="alert alert-danger" id="alert-tambah"><?php echo $_SESSION['flash_message_delete']; ?></div>
        <script>
            setTimeout(function() {
                document.getElementById("alert-tambah").style.display = "none";
            }, 3000); // 3000 miliseconds = 3 detik
        </script>
        <?php unset($_SESSION['flash_message_delete']); ?>
    <?php } ?>

    <?php if (isset($_SESSION['flash_message_update'])) { ?>
        <div class="alert alert-primary" id="alert-tambah"><?php echo $_SESSION['flash_message_update']; ?></div>
        <script>
            setTimeout(function() {
                document.getElementById("alert-tambah").style.display = "none";
            }, 3000); // 3000 miliseconds = 3 detik
        </script>
        <?php unset($_SESSION['flash_message_update']); ?>
    <?php } ?>

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($rowUsers = mysqli_fetch_assoc($user)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rowUsers['fullname'] ?></td>
                <td><?= $rowUsers['level_name'] ?></td>
                <td>
                    <a href="?pg=user-role&id-user=<?= $rowUsers['id'] ?>" class="btn btn-success">User Level</a> |
                    <a href="?pg=tambah-user&edit=<?= $rowUsers['id'] ?>" class="btn btn-primary">Edit</a> |
                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" href="?pg=tambah-user&delete=<?= $rowUsers['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>

</table>