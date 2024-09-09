<?php
$level = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
?>
<div class="mb-3">
    <a href="?pg=tambah-level" class="btn btn-primary">Tambah Level</a>
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
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($rowLevel = mysqli_fetch_assoc($level)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rowLevel['level_name'] ?></td>
                <td>
                    <a href="?pg=tambah-level&edit=<?= $rowLevel['id']?>" class="btn btn-primary">Edit</a> | <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" href="?pg=tambah-level&delete=<?= $rowLevel['id']?>">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>

</table>