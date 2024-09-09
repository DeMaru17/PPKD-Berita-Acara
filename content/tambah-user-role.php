<?php
if (isset($_POST['simpan'])) {
    $level_id = $_POST['level_id'];
    $user_id = $_GET['id-user'];
    $insert = mysqli_query($koneksi, "INSERT INTO user_level (level_id, user_id) VALUES ('$level_id', '$user_id')");
    $_SESSION['flash_message_success'] = 'Data Berhasil Ditambah';
    header("location: ?pg=user-role&id-user=".urlencode($user_id)."&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
    $_SESSION['flash_message_delete'] = 'Data Berhasil Dihapus';
    header("location: ?pg=user&hapus=berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $edit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $update = mysqli_query($koneksi, "UPDATE users SET fullname = '$name', email = '$email', password = '$password' WHERE id = '$id'");
    $_SESSION['flash_message_update'] = 'Data Berhasil Diupdate';
    header("location: ?pg=user&update=berhasil");
}

$queryLevels = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");

?>



<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-1">
            <label for="name">Nama Level</label>
        </div>
        <div class="col-sm-6">
            <select name="level_id" id="" class="form-control">
                <option value="">Pilih Level</option>
                <?php while ($rowLevel = mysqli_fetch_assoc($queryLevels)): ?>
                    <option value="<?= $rowLevel['id'] ?>"><?= $rowLevel['level_name'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
    </div>
    
    <div class="mb-3 offset-md-1">
        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Simpan' ?></button>
        <a href="?pg=level" class="btn btn-danger">Kembali</a>
    </div>

</form>