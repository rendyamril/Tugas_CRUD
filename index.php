<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Meminjam desain Bootstrap dari internet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4 text-primary fw-bold">Manajemen Mata Kuliah</h2>
                
                <!-- Notifikasi Sukses/Gagal -->
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <a href="/matakuliah/tambah" class="btn btn-primary mb-3">
                    + Tambah
                </a>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Kode MK</th>
                                <th>Nama MK</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($matakuliah as $m) : ?>
                                <tr>
                                    <td><span class="badge bg-secondary"><?= $m['kode_mk']; ?></span></td>
                                    <td class="text-start"><?= $m['nama_mk']; ?></td>
                                    <td><?= $m['sks']; ?></td>
                                    <td><?= $m['semester']; ?></td>
                                    <td>
                                        <a href="/matakuliah/edit/<?= $m['kode_mk']; ?>" class="btn btn-warning btn-sm text-dark fw-bold">Edit</a>
                                        <a href="/matakuliah/hapus/<?= $m['kode_mk']; ?>" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>