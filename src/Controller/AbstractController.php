<?php

namespace App\Controller;

use App\Core\Render;

abstract class AbstractController
{
    /**
     * @var Render
     */
    protected Render $render;

    public function __construct()
    {
        $this->render = new Render();
    }

    /**
     * @param string $path
     * @param array $params
     * @param string|null $layout
     *
     * @return void
     */
    protected function render(string $path, array $params = [], string $layout = null): void
    {
        $this->render->render($path, $params, $layout);
    }
}
