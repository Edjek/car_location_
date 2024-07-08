<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Car;
use App\Core\Session;

class AdminCarController extends AbstractController
{
    /**
     * @return void
     */
    public function showAllCars(): void
    {
        $car = new Car();
        $cars = $car->getAllCars();
        $this->render('admin/cars-list', [
            'cars' => $cars
        ], 'admin_layout');
    }

    /**
     * @return void
     */
    public function showCarCreateForm(): void
    {
        $this->render('admin/car-create-form', [], 'admin_layout');
    }

    /**
     * @return void
     */
    public function processCarCreate(): void
    {
        $session = new Session();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $model = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = str_replace(',', '.', trim($_POST['price']));
            $price = floatval($price);
            $fileName = '';

            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                $fileName = $this->handleImageUpload($_FILES['img']);
                if (!$fileName) {
                    $session->setFlashMessage('Une erreur c\'est produite lors du téléchargement du fichier.', 'warning');
                }
            }

            if (empty($model)) {
                $session->setFlashMessage('Veuillez remplir le champs model :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/ajouter-vehicule');
                exit();
            }

            $car = new Car();
            $car->createCar($model, $description, $fileName, $price);
            $session->setFlashMessage('Un véhicule viens d\'être créé !', 'success');
            header('Location: /car-location/tableau-de-bord-admin/vehicules');
            exit();
        } else {
            header('Location: /car-location/tableau-de-bord-admin/vehicules');
            exit();
        }
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function showCarUpdateForm(array $params): void
    {
        $car = new Car();
        $carDetails = $car->getCarById($params['id']);
        $this->render('admin/car-update-form', [
            'car' => $carDetails
        ], 'admin_layout');
    }

    /**
     * @return void
     */
    public function processCarUpdate(): void
    {
        $session = new Session();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $model = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = str_replace(',', '.', trim($_POST['price']));
            $price = floatval($price);
            $id = $_POST['id'];
            $fileName = $_POST['imagePath'];

            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                $fileName = $this->handleImageUpload($_FILES['img']);
                if (!$fileName) {
                    $session->setFlashMessage('Une erreur c\'est produite lors du téléchargement du fichier.', 'warning');
                }
            }

            // Valider les données du formulaire
            if (empty($model)) {
                $session->setFlashMessage('Veuillez remplir le champs model :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/modifier-vehicule/' . $id);
                exit();
            }
            // creer un method updateCar()
            $car = new Car();
            $car->updateCar($id, $model, $description, $price, $fileName);
            $session->setFlashMessage('Une voiture viens d\' être modifié !', 'success');
            header('Location: /car-location/tableau-de-bord-admin/vehicules');
            exit();
        } else {
            header('Location: /car-location/tableau-de-bord-admin/vehicules');
            exit();
        }
    }


    /**
     * @param mixed $file
     *
     * @return string
     */
    private function handleImageUpload($file): string|bool
    {
        $session = new Session();

        // Gérer le téléchargement du fichier image
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];

        // Valider l'extension du fichier
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array($extension, $allowedExtensions)) {
            $session->setFlashMessage('Le format du fichier n\'est pas correct ! (jpg, jpeg, gif, png)', 'warning');
            return false;
        }

        // Valider la taille du fichier
        $maxSize = 5 * 1024 * 1024; // 5 Mo
        if ($fileSize > $maxSize) {
            $session->setFlashMessage('Le fichier est trop volumineux (taille maximale : 5 Mo).', 'warning');
            return false;
        }

        // Déplacer le fichier téléchargé vers le répertoire d'upload
        $uploadDir = './img/upload/';
        $filePath = $uploadDir . $fileName;
        if (file_exists($filePath)) {
            $session->setFlashMessage('Le fichier a déjà été téléchargé.', 'warning');
            return false;
        }

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            $session->setFlashMessage('Une erreur s\'est produite lors du téléchargement du fichier image.', 'warning');
            return false;
        }

        return $fileName;
    }

    /**
     * @param mixed $params
     *
     * @return void
     */
    public function processCarDelete($params): void
    {
        $session = new Session();
        $car = new Car();
        $car->deleteCar($params['id']);
        $session->setFlashMessage('Un véhicule viens d\'être supprimé !', 'success');
        header('Location: /car-location/tableau-de-bord-admin/vehicules');
        exit();
    }
}
