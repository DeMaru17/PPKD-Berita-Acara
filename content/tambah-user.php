<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['fullname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $insert = mysqli_query($koneksi, "INSERT INTO users (fullname, email, password) VALUES ('$nama', '$email', '$password')");
    $_SESSION['flash_message_success'] = 'Data Berhasil Ditambah';
    header("location: ?pg=user&tambah=berhasil");
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

?>



<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-1">
            <label for="name">Nama</label>
        </div>
        <div class="col-sm-6">
            <input type="text" name="fullname" placeholder="Nama Pengguna" class="form-control" id="" value="<?= $rowEdit['fullname'] ?? '' ?>" required>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-1">
            <label for="name">Email</label>
        </div>
        <div class="col-sm-6">
            <input type="email" name="email" placeholder="Email Pengguna" class="form-control" id="" value="<?= $rowEdit['email'] ?? '' ?>" required>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-1">
            <label for="name">Password</label>
        </div>
        <div class="col-sm-6">
            <input type="password" name="password" placeholder="password" class="form-control" id="" value="">
        </div>
    </div>
    <div class="mb-3 offset-md-1">
        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Simpan' ?></button>
        <a href="?pg=level" class="btn btn-danger">Kembali</a>
    </div>

</form>