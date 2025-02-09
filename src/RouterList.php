<?php

namespace Invoice;

use Invoice\controllers\AdminController;
use Invoice\controllers\InvoiceController;
use Invoice\controllers\SettingsController;

class RouterList
{
    public function configure(Router $router)
    {
        $router->get('/', [AdminController::class, 'index']);
        $router->get('/invoices', [InvoiceController::class, 'index']);
        $router->get('/settings', [SettingsController::class, 'index']);
    }
}