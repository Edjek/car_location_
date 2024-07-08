<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Contact;

class AdminContactController extends AbstractController
{
    /**
     * @return void
     */
    public function showAllContacts(): void
    {
        $contact = new Contact();
        $contacts = $contact->getAllContacts();
        $this->render('admin/contacts-list', [
            'contacts' => $contacts
        ], 'admin_layout');
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function showContactForm(array $params): void
    {
        $contact = new Contact();
        $contactDetails = $contact->getContactById($params['id']);
        $this->render('admin/car-form', [
            'car' => $contactDetails
        ], 'admin_layout');
    }
}
