<section class="container py-3">
    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin/vehicules" class="btn btn-outline-success mt-3 mb-4">Retour à la liste</a>

    <h1>Modifier un véhicule</h1>

    <form action="/car-location/tableau-de-bord-admin/form-car" method="post" enctype="multipart/form-data">
        <input type="text" value="<?= $car['id']; ?>" name="id" hidden>
        <input type="text" value="<?= $car['image']; ?>" name="imagePath" hidden>

        <div class="mb-3">
            <label for="name" class="form-label">Modèle</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $car['name']; ?>">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"><?= $car['description']; ?>
            </textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="text" id="price" name="price" class="form-control" value="<?= $car['price']; ?>">
        </div>

        <div>
            <img src="/car-location/public/img/upload/<?= $car['image']; ?>" class="img-thumb">
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" id="img" name="img" class="form-control">
        </div>

        <input type="submit" value="Modifier" class="btn btn-primary">
    </form>
</section>