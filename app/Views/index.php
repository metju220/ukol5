<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1 class="mb-4">Seznam osob</h1>

<div class="row">
    <?php foreach ($rider as $row): ?>
        <div class='col-md-2 mt-4'>
            <div class='card shadow-lg border-0 rounded-3 p-3'>
                <?php if (!empty($row['photo'])): ?>
                    <img src="<?= base_url('obrazky/' . $row['photo']) ?>" class="card-img-top" alt="Foto">
                <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                        <span class="fw-bold text-danger display-4">???</span>
                    </div>
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center fw-bold text-primary">
                        <?= esc($row['first_name'] ?? '???') . ' ' . esc($row['last_name'] ?? '???') ?>
                    </h5>
                    <p><strong>Datum narození:</strong> <?= !empty($row['date_of_birth']) ? date('d.m.Y', strtotime($row['date_of_birth'])) : '???' ?></p>
                    <p><strong>Země:</strong> <?= ($row['country'] == 'fr') ? 'Francie' : esc($row['country'] ?? '???') ?></p>
                    <p><strong>Město narození:</strong>
                        <?php if (!empty($row['city'])): ?>
                            <a href="<?= base_url('main/city/' . urlencode($row['city'])) ?>">
                                <?= esc($row['city']) ?>
                            </a>
                        <?php else: ?>
                            ???
                        <?php endif; ?>
                    </p>
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