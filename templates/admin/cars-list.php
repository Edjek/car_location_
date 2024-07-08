<section class="container py-3">
    <h1>Liste des véhicules</h1>

    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin" class="btn btn-outline-success mt-3 mb-5">
        Retour à l'accueil du backoffice
    </a>
    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin/ajouter-vehicule" class="btn btn-warning mt-3 mb-5">
        Nouveau véhicule
    </a>

    <table class="table table-striped">
        <caption>Liste de nos véhicules</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            foreach ($cars as $car) {
            ?>
                <tr>
                    <td><?= $car['id']; ?></td>
                    <td><?= $car['name']; ?></td>
                    <td><?= $car['description']; ?></td>
                    <td><?= $car['price']; ?> euros</td>
                    <td>
                        <img src="/car-location/public/img/upload/<?= $car['image']; ?>" alt="" class="img-thumb">
                    </td>
                    <td class="text-center">
                        <!-- Creer la route en question -->
                        <!-- le controlleur AdminCarController -->
                        <!-- carForm() -->
                        <!-- Affiche templates/admin/car-form.php -->
                        <!--  -->
                        <a href="/car-location/tableau-de-bord-admin/modifier-vehicule/<?= $car['id']; ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/car-location/tableau-de-bord-admin/supprimer-vehicule/<?= $car['id']; ?>">
                            <i class="bi bi-trash3 text-danger"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <!--  -->
    </table>
</section>