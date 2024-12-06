<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <?php if (isset($film)): ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <a href="/film" class="btn btn-primary">Kembali Ke List Film</a>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <a href="/film/edit/<?= $film['slug']; ?>" class="btn btn-warning">Edit</a>
                <form action="/film/<?= $film['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card" style="height: 100%; width:100%; text-align:center;">
                    <img src="/img/<?= $film['cover']; ?>" class="card-img-top" alt="Card Image Card">
                    <p class="card-text"> Sutradara : <?= $film['sutradara']; ?></p>
                    <div class="card-body">
                        <h1 class="card-text"><?= $film['judul']; ?></h1>
                        <p class="card-text"><?= $film['synopsis']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            Film tidak ditemukan.
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
