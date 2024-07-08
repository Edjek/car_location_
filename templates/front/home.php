<section class="container py-3">
    <h1>Nos voitures</h1>
    <div class="row flex-wrap justify-content-center">
        <?php
        foreach ($cars as $car) {
        ?>
            <div class="card m-2 py-3" style="width:18rem;">
                <img src="/car-location/public/img/upload/<?= $car['image']; ?>" alt="Une image de " class="card-img-top">
                <div class="card-body">
                    <h2 card-title><?= $car['name']; ?></h2>
                    <p class="card-text">
                        <?= $car['description']; ?> euros
                    </p>
                    <p>
                        <?= $car['price']; ?> euros
                    </p>
                    <a href="/car-location/reservation/<?= $car['id']; ?>" class="btn btn-outline-primary">reserver</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>