<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Details</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-center">Komik <?= strtoupper($komik['judul']) ?></h5>
                            <p class="card-text"><b>Keterangan</b> : <?= $komik['keterangan'] ?></p>
                            <p class="card-text"><b>Penulis : </b> <?= $komik['penulis'] ?></p>
                            <p class="card-text"><b>Penerbit : </b> <?= $komik['penerbit'] ?></p>
                            <p class="card-text"><small class="text-muted">Upload at <?= $komik['created_at'] ?></small></p>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>
                            <br></br>
                            <a href="/komik" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection() ?>