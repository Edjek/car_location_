<section class="container py-3">
    <h1>Liste des utilisateurs</h1>

    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin" class="btn btn-outline-success mt-3 mb-5">
        Retour à l'accueil du backoffice
    </a>
    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin/ajouter-utilisateur" class="btn btn-warning mt-3 mb-5">
        Nouvel utilisateur
    </a>


    <table class="table table-striped">
        <caption>Liste des utilisateurs</caption>

        <thead>
            <tr>
                <th>Id</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Id</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= ($user['admin'] ? 'admin' : 'user'); ?></td>
                    <td class="text-center">
                        <a href="/car-location/tableau-de-bord-admin/modifier-utilisateur/<?= $user['id']; ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/car-location/tableau-de-bord-admin/supprimer-utilisateur/<?= $user['id']; ?>">
                            <i class="bi bi-trash3 text-danger"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>