<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h1 class="mb-4">Přidat nového jezdce</h1>

<form method="post" action="<?= base_url('pridat') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="first_name" class="form-label">Jméno</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Příjmení</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Země (např. fr)</label>
        <input type="text" class="form-control" id="country" name="country" required>
    </div>

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Datum narození</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Váha (kg)</label>
        <input type="number" class="form-control" id="weight" name="weight">
    </div>

    <div class="mb-3">
        <label for="height" class="form-label">Výška (cm)</label>
        <input type="number" class="form-control" id="height" name="height">
    </div>

    <div class="mb-3">
    <label for="photo" class="form-label">Logo závodu</label>
    <input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .png, .jpeg, .webp">
    </div>

    <button type="submit" class="btn btn-success">Uložit</button>
</form>

<?= $this->endSection() ?>
