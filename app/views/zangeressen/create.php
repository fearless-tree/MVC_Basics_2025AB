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
                <div class="alert alert-success" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <div class="col-6">
                <form action="<?= URLROOT; ?>/ZangeressenController/create" method="post">
                    <div class="mb-3">
                        <label for="naam" class="form-label">Naam</label>
                        <input name="naam" type="text" class="form-control" id="naam" value="<?= $_POST['naam'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nationaliteit" class="form-label">Nationaliteit</label>
                        <input name="nationaliteit" type="text" class="form-control" id="nationaliteit" value="<?= $_POST['nationaliteit'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nettowaarde" class="form-label">Nettowaarde</label>
                        <input name="nettowaarde" type="number" min="0" max="999999999" step="0.01" class="form-control" id="nettowaarde" value="<?= $_POST['nettowaarde'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="geboortedatum" class="form-label">Geboortedatum</label>
                        <input name="geboortedatum" type="date" class="form-control" id="geboortedatum" value="<?= $_POST['geboortedatum'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="bekendstehit" class="form-label">Bekendste Hit</label>
                        <input name="bekendstehit" type="text" class="form-control" id="bekendstehit" value="<?= $_POST['bekendstehit'] ?? ''; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                </form>
                <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
            </div>
        </div>
    </div>
    <!-- end tabel -->
<?php require APPROOT . '/views/includes/footer.php'; ?>