<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Debug;

class DebugHandler
{
    protected $debugBar;

    public function __construct($debugBar = null)
    {
        $this->debugBar = $debugBar ?? new DebugBar();
        $this->debugBar->init();
    }

    public function render()
    {
        $this->debugBar->render();
    }

    public function isEnabled()
    {
        return $this->debugBar->isEnabled();
    }
}
