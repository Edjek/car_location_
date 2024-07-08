<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function showAdminDashboard(): void
    {
        $this->render('admin/admin-dashboard', [], 'admin_layout');
    }
}
