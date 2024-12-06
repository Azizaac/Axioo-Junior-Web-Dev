<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
        <h1>List Berita</h1>
        <a href="/film/create" class="btn btn-primary mb-2 mt-2">+ Tambah Film</a>
        <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-secondary" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Film</th>
                        <th scope="col">Read More..</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($film as $k): ?>
                        <tr>
                            <td><?= $k['judul']; ?></td>
                            <td><a href="/film/<?= $k['slug']; ?>" class="btn btn-info">Read More...</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>