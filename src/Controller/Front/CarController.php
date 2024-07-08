<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class CarController extends AbstractController
{
    public function showCarDetails($params): void
    {
        $car = new Car();
        $carDetails = $car->getCarById($params['id']);
        $this->render('front/car', [
            'car' => $carDetails
        ]);
    }
}
