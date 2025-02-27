<?php
include("config.php");
$hasil = mysqli_query($koneksi, "SELECT * FROM todo WHERE id= '$_GET[id]'");
$row = mysqli_fetch_array($hasil);
?>

<div class="d-flex justify-content-center">
    <div class="card col-md-6">
        <div class="card-header">
            Edit Tugas
        </div>

        <?php if(isset($_GET['pesan_edit']) && $_GET['pesan_edit'] == 'gagal_deadline') : ?>
            <div class="alert alert-danger text-center">
                Gagal mengedit! jangka waktu tidak boleh melebihi deadline sebelumnya.
            </div>
            <?php endif; ?>

            <form method="POST" action="todo/aksi_edit_todo.php">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama tugas</label>
                        <input type="text" class="form-control" placeholder="Tugas" name="tugas" value= "<?= $row['tugas'] ?>">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jangka Waktu</label>
                        <input type="date" class="form-control" name="jangka_waktu" value="<?= $row['jangka_waktu'] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option>Pilih</option>
                            <option <?= $row['status'] == 'Belumselesai' ? 'selected' : '' ?>> Belum selesai </option>
                            <option <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>> Selesai </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prioritas</label>
                        <select class="form-control" name="prioritas">
                            <option value="Low" <?= $row['prioritas'] == 'Low' ? 'selected' : '' ?>>Low</option>
                            <option value="Medium" <?= $row['prioritas'] == 'Medium' ? 'selected' : '' ?>>Medium</option>
                            <option value="High" <?= $row['prioritas'] == 'High' ? 'selected' : '' ?>>High</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer text-body-secondary">
                    <a href="index.php?halaman=todo">
                        <button type="button" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i>Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
    </div>
</div>