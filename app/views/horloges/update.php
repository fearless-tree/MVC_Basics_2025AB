<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-<?= $data['color']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/HorlogesController/update" method="post">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" id="merk" value="<?= $_POST['merk'] ?? $data['horloge']->Merk ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" id="model" value="<?= $_POST['model'] ?? $data['horloge']->Model ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="9999999" step="0.01" class="form-control" id="prijs" value="<?= $_POST['prijs'] ?? $data['horloge']->Prijs ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" id="materiaal" value="<?= $_POST['materiaal'] ?? $data['horloge']->Materiaal ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="diameter" class="form-label">Diameter (mm)</label>
                    <input name="diameter" type="number" min="0" max="999" step="0.1" class="form-control" id="diameter" value="<?= $_POST['diameter'] ?? $data['horloge']->Diameter ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="beweging" class="form-label">Beweging</label>
                    <input name="beweging" type="text" class="form-control" id="beweging" value="<?= $_POST['beweging'] ?? $data['horloge']->Beweging ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" id="releasedatum" value="<?= $_POST['releasedatum'] ?? $data['horloge']->Releasedatum ?? ''; ?>" required>
                </div>
                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['horloge']->Id ?? ''; ?>">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>
<!-- end tabel -->
<?php require APPROOT . '/views/includes/footer.php'; ?>
