<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Reservation;

class AdminReservationController extends AbstractController
{
    /**
     * @return void
     */
    public function showAllReservations(): void
    {
        $reservation = new Reservation();
        $reservations = $reservation->getAllReservations();
        $this->render('admin/reservations-list', [
            'reservations' => $reservations
        ], 'admin_layout');
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function showReservationForm(array $params): void
    {
        $reservation = new Reservation();
        $reservationDetails = $reservation->getReservationById($params['id']);
        $this->render('admin/car-form', [
            'car' => $reservationDetails
        ], 'admin_layout');
    }
}
