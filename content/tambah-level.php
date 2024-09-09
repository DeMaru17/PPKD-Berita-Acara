<?php 
if (isset($_POST['simpan'])){
    $nama = $_POST['level_name'];
    $insert = mysqli_query($koneksi, "INSERT INTO levels (level_name) VALUES ('$nama')");
    $_SESSION['flash_message_success'] = 'Data Berhasil Ditambah';
    header("location: ?pg=level&tambah=berhasil");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id = '$id'");
    $_SESSION['flash_message_delete'] = 'Data Berhasil Dihapus';
    header("location: ?pg=level&hapus=berhasil");

}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];

    $edit = mysqli_query($koneksi, "SELECT * FROM levels WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);

}

if (isset($_POST['edit'])){
    $id = $_GET['edit'];
    $level_name = $_POST['level_name'];
    $update = mysqli_query($koneksi, "UPDATE levels SET level_name = '$level_name' WHERE id = '$id'");
    $_SESSION['flash_message_update'] = 'Data Berhasil Diupdate';
    header("location: ?pg=level&update=berhasil");
}

?>



<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-1">
            <label for="name">Nama Level</label>
        </div>
        <div class="col-sm-6">
            <input type="text" name="level_name" placeholder="Nama Level" class="form-control" id="" value="<?= $rowEdit['level_name'] ?? '' ?>">
        </div>
    </div>
    <div class="mb-3 offset-md-1">
        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Simpan' ?></button>
        <a href="?pg=level" class="btn btn-danger">Kembali</a>
    </div>

</form> 