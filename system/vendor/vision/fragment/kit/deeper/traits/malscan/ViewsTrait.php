<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Deeper\Traits\Malscan;

use Vision\Modules\Requirements;
use Iconic\Core\Modules\Debug\Debugbar;

trait ViewsTrait
{
    private function scanner($data, $ContentView)
    {
        $this->view($ContentView, $data);
    }

    public function view($view, $data = [])
    {
        extract($data, EXTR_OVERWRITE);

        require_once
            VISION_DIR .
            DIRECTORY_SEPARATOR .
            "system" .
            DIRECTORY_SEPARATOR .
            "vendor" .
            DIRECTORY_SEPARATOR .
            "vision" .
            DIRECTORY_SEPARATOR .
            "core" .
            DIRECTORY_SEPARATOR .
            "modules" .
            DIRECTORY_SEPARATOR .
            "globals" .
            DIRECTORY_SEPARATOR .
            "malscan" .
            DIRECTORY_SEPARATOR .
            $view .
            Requirements::getRapid();
        DebugBar::render();
    }
}
