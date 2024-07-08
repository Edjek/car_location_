<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class HomeController extends AbstractController
{
    public function showHomePage(): void
    {
        $car = new Car();
        $cars = $car->getAllCars();
        $this->render('front/home', [
            'cars' => $cars
        ]);
    }
}
