<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold">
                        <h4 class="mb-0">Edit Mata Kuliah</h4>
                    </div>
                    <div class="card-body">
                        
                        <?php if($validation->getErrors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <form action="/matakuliah/update/<?= $mk['kode_mk']; ?>" method="post">
                            <?= csrf_field(); ?>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kode Mata Kuliah</label>
                                <input type="text" class="form-control bg-light" name="kode_mk" value="<?= (old('kode_mk')) ? old('kode_mk') : $mk['kode_mk']; ?>" readonly>
                                <div class="form-text text-danger">*Kode MK tidak dapat diubah (Primary Key).</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Mata Kuliah</label>
                                <input type="text" class="form-control" name="nama_mk" value="<?= (old('nama_mk')) ? old('nama_mk') : $mk['nama_mk']; ?>">
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label fw-bold">SKS</label>
                                    <input type="number" class="form-control" name="sks" value="<?= (old('sks')) ? old('sks') : $mk['sks']; ?>">
                                </div>
                                <div class="col">
                                    <label class="form-label fw-bold">Semester</label>
                                    <input type="number" class="form-control" name="semester" value="<?= (old('semester')) ? old('semester') : $mk['semester']; ?>">
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="/matakuliah" class="btn btn-outline-secondary">Batal</a>
                                <button type="submit" class="btn btn-warning fw-bold">Update Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>