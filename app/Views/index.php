<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1 class="mb-4">Seznam osob</h1>

<div class="row">
    <?php foreach ($rider as $row): ?>
        <div class='col-md-4 mt-4'>
            <div class='card shadow-lg border-0 rounded-3 p-3'>
                <img src="<?= base_url('obrazky/' . ($row['photo'] ?? 'default.jpg')) ?>" class="card-img-top" alt="Foto">
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold text-primary">
                        <?= esc($row['first_name'] ?? '???') . ' ' . esc($row['last_name'] ?? '???') ?>
                    </h5>
                    <p><strong>Datum narození:</strong> <?= esc($row['date_of_birth'] ?? '???') ?></p>
                    <p><strong>Země:</strong> <?= esc($row['country'] ?? '???') ?></p>
                    <p><strong>Váha:</strong> <?= (!empty($row['weight']) && $row['weight'] != 0) ? esc($row['weight']) . ' kg' : '???' ?></p>
                    <p><strong>Výška:</strong> <?= (!empty($row['height']) && $row['height'] != 0) ? esc($row['height']) . ' cm' : '???' ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




<?php
    echo $pager->links();
?>

<?= $this->endSection(); ?>