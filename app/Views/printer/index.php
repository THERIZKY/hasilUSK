<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center m-4" style="text-transform: uppercase; font-weight: 600;">List Barang Yang Kami Sediakan</h1>
            <div class="d-flex flex-wrap gap-5 mb-5 mt-2">
                <?php foreach ($produk as $p) : ?>
                    <div class="card pb-4" style="width: 18rem;">
                        <img src="/img/<?= $p['gambar']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['nama']; ?></h5>
                            <p class="card-text"><?= $p['deskripsi']; ?></p>
                        </div>
                        <div class="text-center">
                            <a href="/produk/<?= $p['slug']; ?>" class="btn btn-primary px-4">Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>