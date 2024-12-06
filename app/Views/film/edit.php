<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="/film/update/<?= $film['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $film['slug']; ?>">
                <h1 class="mt-2 mb-2">Form Update Data</h1>
                <div class="mb-3">
                    <label for="InputFilm" class="form-label">Judul Film:</label>
                    <input type="text" class="form-control" id="InputFilm" placeholder="Tuliskan Judul Film.."
                        name="judul" value="<?= $film['judul']; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputSutradara" class="form-label">Sutradara Film:</label>
                    <input type="text" class="form-control" id="InputSutradara" placeholder="Tuliskan Sutradara Film.."
                        name="sutradara" value="<?= $film['sutradara']; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputSynopsis" class="form-label">Synopsis:</label>
                    <input type="text" class="form-control" id="InputSynopsis" placeholder="Tuliskan Synopsis Film.."
                        name="synopsis" value="<?= $film['synopsis']; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputCover" class="form-label">Cover Film:</label>
                    <input type="text" class="form-control" id="InputCover" placeholder="Tuliskan Cover Film.."
                        name="cover" value="<?= $film['cover']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>