<?php
include "config.php";
$hasil = mysqli_query($koneksi, "SELECT * FROM todo;");
?>

<div class="container bg-light p-4 rounded shadow">
    <?php if (isset($_GET['pesan_tambah'])) { ?>
        <div class="alert alert-<?php echo $_GET['pesan_tambah'] == 'berhasil' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['pesan_tambah'] == 'berhasil' ? 'Berhasil' : 'Gagal'; ?> Ditambah!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    <?php } ?>

    <?php if (isset($_GET['pesan_edit'])) { ?>
        <div class="alert alert-<?php echo $_GET['pesan_edit'] == 'berhasil' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['pesan_edit'] == 'berhasil' ? 'Berhasil' : 'Gagal'; ?> Diedit!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    <?php } ?>

    <?php if (isset($_GET['pesan_hapus'])) { ?>
        <div class="alert alert-<?php echo $_GET['pesan_hapus'] == 'berhasil' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['pesan_hapus'] == 'berhasil' ? 'Berhasil' : 'Gagal'; ?> Dihapus!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    <?php } ?>
    
    <h2 class="text-center text-dark">Plan Your Event!</h2>

    <!-- Button trigger modal -->
     <button style="float: right;" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus"></i> Tambah 
     </button>

     <div class="clearfix"></div>

     <!-- modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModallabel">Tambah tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <form method="POST" action="todo/aksi_tambah_todo.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama tugas</label>
                            <input type="text" class="form-control" placeholder="Tugas" name="tugas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jangka Waktu</label>
                            <input type="date" class="form-control" name="jangka_waktu" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option>Belum selesai</option>
                                <option>Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prioritas</label>
                            <select class="form-control" name="prioritas">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <table class="table table-bordered table-light text-dark">
        <tr class="table-warning">
            <th>No</th>
            <th>Tugas</th>
            <th>Jangka waktu</th>
            <th>Status</th>
            <th>Prioritas</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while($row = mysqli_fetch_array($hasil)) {
            echo "<tr>
            <td>$no</td>
            <td>{$row['tugas']}</td>
            <td>{$row['jangka_waktu']}</td>
            <td>{$row['status']}</td>
            <td>{$row['prioritas']}</td>
            <td>
            <a href='index.php?halaman=edit_todo&id={$row['id']}' class='btn btn-warning btn-sm'>
            <i class='fas fa-edit'></i> Edit
            </a>
            <a href='todo/aksi_hapus_todo.php?id={$row['id']}' onclick=\"return confirm('Apakah anda yakin ingin menghapus?')\" class='btn btn-danger btn-sm'>
            <i class='fas fa-trash'></i> Hapus
            </a>
            </td>
            </tr>";
            $no++;
        }
            ?>
      </table>
      </div>