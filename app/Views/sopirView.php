<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sopir</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Sopir</h1>
        
        <!-- Tombol Tambah Sopir -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahSopir">Tambah Sopir</button>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id sopir</th>
                    <th>Nik sopir</th>
                    <th>Nama Sopir</th>
                    <th>Nomor telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Status sopir</th>
                    <th>Tarif per hari</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sopir as $c): ?>
                <tr>
                    <td><?= esc($c['id_sopir']) ?></td>
                    <td><?= esc($c['nik_sopir']) ?></td>
                    <td><?= esc($c['nama_sopir']) ?></td>
                    <td><?= esc($c['nomor_telepon']) ?></td>
                    <td><?= esc($c['email']) ?></td>
                    <td><?= esc($c['alamat']) ?></td>
                    <td><?= esc($c['status_sopir']) ?></td>
                    <td><?= esc($c['tarif_per_hari']) ?></td>
                    <td><?= esc($c['created_at']) ?></td>

                    <!-- Kolom Aksi -->
                    <td>
                        <a href="<?= base_url('sopir/view/'.$c['id_sopir']) ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="<?= base_url('sopir/hapus/'.$c['id_sopir']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus sopir ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Sopir -->
    <div class="modal fade" id="modalTambahSopir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Sopir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form Tambah Sopir -->
            <form action="<?= base_url('sopir/tambah') ?>" method="post">
              <div class="form-group">
              <div class="form-group">
                <label for="nik">Nik</label>
                <input type="text" class="form-control" name="nik" required>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" class="form-control" name="no_hp" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="status_sopir">Status_sopir</label>
                <input type="text" class="form-control" name="status_sopir" required>
              </div>
              <div class="form-group">
                <label for="tari-per-sopir">Tarif_per_sopir</label>
                <input type="text" class="form-control" name="tarif_per_sopir" required>
              </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('sopir') ?>" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>