<section class="container py-3">
    <h1>Liste des réservations</h1>

    <table class="table table-striped caption-top">
        <caption>nos réservations</caption>

        <thead>
            <tr>
                <th>Id</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Id</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            foreach ($reservationss as $reservation) {
            ?>
                <tr>
                    <td><?= $reservation['id']; ?></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>