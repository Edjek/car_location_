<section class="container py-3">
    <h1>Inscrivez-vous</h1>
    <form action="/car-location/save-user" method="post" class="w-75 m-auto">

        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="pswd" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="pswd" name="pswd">
        </div>

        <button type="submit" class="btn btn-outline-primary">Envoyer</button>
    </form>
</section>