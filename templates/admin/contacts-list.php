<section class="container py-3">
    <h1>Liste des messages reçus</h1>
    <a href="<?= BASE_URL; ?>/tableau-de-bord-admin" class="btn btn-outline-success mt-3 mb-5">
        Retour à l'accueil du backoffice
    </a>

    <table class="table text-center">
        <caption>Liste des messages reçus</caption>
        <thead>
            <tr>
                <th scope="col">ref</th>
                <th scope="col">email</th>
                <th scope="col">contenu</th>
                <th scope="col">date d'envoi</th>
                <th scope="col">modifier</th>
                <th scope="col">supprimer</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?php echo $contact->id_contact; ?></td>
                    <td><a href="contactUpdateView.php?id=<?php echo $contact->id_contact ?>"><?php echo $contact->email ?></a></td>
                    <td><?php echo $contact->content ?></td>
                    <td><?php echo $contact->date_send ?></td>
                    <td><a href="contactUpdateView.php?id=<?php echo $contact->id_contact ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td><a href="../../src/controller/contactController.php?delete-contact=true&id=<?php echo $contact->id_contact ?>"><i class="bi bi-trash-fill text-danger"></a></i></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>