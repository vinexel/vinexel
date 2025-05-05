<?php

namespace Dashkit\Controllers;

use \Vision\Modules\Controller;
use \Vinexel\Modules\Debug\Debugger;
use \Deeper\Libraries\Session;

class BaseController extends Controller
{
    protected $debugger;

    public function __construct()
    {
        parent::__construct();
        $this->initialize();
        $this->debugger = Debugger::class;
    }

    protected function getData(string $title, array $additional = []): array
    {
        $default = [
            'title' => $title,
            'description' => 'Default description here.',
            'author' => 'Default author',
            'keywords' => 'default,keywords,...',
            'session' => Session::get('user_session_email'),
        ];

        return array_merge($default, $additional);
    }
}
