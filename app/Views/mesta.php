<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1 class="mb-4">Jezdci z města: <?= esc($city) ?></h1>

<table class="table table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Jméno</th>
            <th>Země</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($riders as $row): ?>
            <tr>
                <td class="fw-semibold"><?= esc($row['first_name'] . ' ' . $row['last_name']) ?></td>
                <td>
                    <?php if (!empty($row['country'])): ?>
                        <span class="fi fi-<?= esc(strtolower($row['country'])) ?> me-2" style="font-size: 1.5rem;"></span>
                        <?= esc(strtoupper($row['country'])) ?>
                    <?php else: ?>
                        <span class="text-muted">???</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links(); ?>

<?= $this->endSection(); ?>