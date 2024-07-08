<?php

namespace App\Core;

class Render
{
    /**
     * @param string $path
     * @param array $params
     * @param string|null $layout
     *
     * @return void
     */
    public function render(string $path, array $params = [], string $layout = null): void
    {
        extract($params);

        ob_start();
        require_once '../templates/' . $path . '.php';
        $content = ob_get_clean();

        if ($layout === 'admin_layout') {
            require_once '../templates/admin/admin-layout.php';
        } else {
            require_once '../templates/front/front-layout.php';
        }
    }
}
