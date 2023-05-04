<?= $this->extend('layout/template') ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-10">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success my-5" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table my-3">
                <thead>
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Total Harga</th>
                        <th>Status Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php if (empty($transaksi)) : ?>
                    <tbody>

                    </tbody>
                <?php else : ?>
                    <?php foreach ($transaksi as $p) : ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $p['nama_lengkap'] ?>
                                </td>
                                <td>
                                    <?= $p['alamat'] ?>
                                </td>
                                <td>
                                    <?php
                                    $harga = $p['total'];
                                    echo number_format($harga, 0, '.', '.');
                                    ?>
                                </td>
                                <td>
                                    <?= $p['status_pemesanan']; ?>
                                </td>
                                <td>
                                    <?php if ($p['status_pemesanan'] == 'selesai') : ?>
                                        <p class="text-success fw-bold">Pesanan Selesai</p>
                                    <?php elseif ($p['status_pemesanan'] == 'ditolak') : ?>
                                        <p class="text-danger fw-bold">Pesanan Dibatalkan</p>
                                    <?php else : ?>
                                        <form action="/admin/list-transaksi/ChangeStatus/<?= $p['id']; ?>" method="post">
                                            <input type="hidden" name="oldStatus" value="<?php echo $p['status_pemesanan']; ?>">
                                            <select name="status_pemesanan" id="status_pemesanan" class="form-select">
                                                <option value="diproses">Diproses</option>
                                                <option value="dalam_perjalanan">Dalam Perjalanan</option>
                                                <option value="selesai">Selesai</option>
                                            </select>
                                            <button type="submit" class="btn">Ubah Status</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>