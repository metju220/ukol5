<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1 class="mb-4">Jezdci z města: <?= esc($city) ?></h1>

<?php if (!empty($riders)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Jméno</th>
                <th>Datum narození</th>
                <th>Země</th>
                <th>Váha</th>
                <th>Výška</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riders as $row): ?>
                <tr>
                    <td><?= esc($row['first_name'] . ' ' . $row['last_name']) ?></td>
                    <td><?= !empty($row['date_of_birth']) ? date('d.m.Y', strtotime($row['date_of_birth'])) : '???' ?></td>
                    <td><?= ($row['country'] == 'fr') ? 'Francie' : esc($row['country'] ?? '???') ?></td>
                    <td><?= (!empty($row['weight']) && $row['weight'] != 0) ? esc($row['weight']) . ' kg' : '???' ?></td>
                    <td><?= (!empty($row['height']) && $row['height'] != 0) ? esc($row['height']) . ' cm' : '???' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>V tomto městě nejsou žádní jezdci.</p>
<?php endif; ?>

<?php
echo $pager->links();
?>

<?= $this->endSection(); ?>