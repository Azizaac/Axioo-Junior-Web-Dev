<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="/film/save" method="POST">
                <?= csrf_field(); ?>

                <?php if (session()->getFlashdata('validate')): ?>
                    <div class="alert alert-primary" role="alert">
                        <?= session()->getFlashdata('validate'); ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="InputFilm" class="form-label">Judul Film:</label>
                    <input type="text" class="form-control" id="InputFilm" placeholder="Tuliskan Judul Film.."
                        name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="InputSutradara" class="form-label">Sutradara Film:</label>
                    <input type="text" class="form-control" id="InputSutradara" placeholder="Tuliskan Sutradara Film.."
                        name="sutradara" required>
                </div>
                <div class="mb-3">
                    <label for="InputSynopsis" class="form-label">Synopsis:</label>
                    <input type="text" class="form-control" id="InputSynopsis" placeholder="Tuliskan Synopsis Film.."
                        name="synopsis" required>
                </div>
                <div class="mb-3">
                    <label for="InputCover" class="form-label">Cover Film:</label>
                    <input type="text" class="form-control" id="InputCover" placeholder="Tuliskan Cover Film.."
                        name="cover" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>