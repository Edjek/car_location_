<section class="container py-3">
    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin/vehicules" class="btn btn-outline-success mt-3 mb-4">Retour à la liste</a>

    <h1>Ajouter un véhicule</h1>

    <form action="/car-location/tableau-de-bord-admin/form-creer-vehicule" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Modèle</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" id="price" step="0.01" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" id="img" name="img" class="form-control">
        </div>

        <input type="submit" value="Enregistrer" class="btn btn-primary">
    </form>
</section>