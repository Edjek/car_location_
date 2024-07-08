<section class="container py-3">
    <h1>Modifier un utilisateur</h1>

    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin/utilisateurs" class="btn btn-outline-success mt-3 mb-4">Retour à la liste</a>

    <form action="/car-location/tableau-de-bord-admin/form-user" method="post" enctype="multipart/form-data">
        <input type="text" value="<?= $user['id']; ?>" name="id" hidden>

        <div class="mb-3">
            <label for="name" class="form-label">Pseudo</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $user['username']; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="text" id="password" name="password" class="form-control">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="statut" id="statut1" value="1" <?= ($user['admin']) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="statut1">
                Administrateur
            </label>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="statut" id="statut2" value="0" <?= (!$user['admin']) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="statut2">
                Utilisateur
            </label>
        </div>

        <input type="submit" value="Modifier" class="btn btn-primary">
    </form>
</section>