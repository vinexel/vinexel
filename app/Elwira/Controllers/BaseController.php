<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Elwira\Controllers;

use \Vision\Modules\Controller;
use \Vinexel\Modules\Debug\Debugger;

class BaseController extends Controller
{
    protected $debugger;

    public function __construct()
    {
        parent::__construct();
        $this->debugger = Debugger::class;
    }
}
