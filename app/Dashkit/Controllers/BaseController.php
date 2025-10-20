<?php

namespace Dashkit\Controllers;

use Dashkit\Models\AuthModel;
use Dashkit\Models\UserModel;
use \Deeper\Libraries\Session;
use \Vision\Modules\Controller;
use \Vinexel\Modules\Debug\Debugger;

/**
 * BaseController
 *
 * This serves as the foundation for all Dashkit controllers.
 * It provides automatic initialization for shared dependencies such as:
 * - Authentication handling via `AuthModel`
 * - User management via `UserModel`
 * - Debugging support via `Debugger`
 *
 * Every controller that extends this class will automatically inherit
 * these core utilities and helper functions.
 */

class BaseController extends Controller
{
    /**
     * @var AuthModel
     */
    protected $authModel;

    /**
     * @var UserModel
     */
    protected $userModel;

    /**
     * @var Debugger
     */
    protected $debugger;

    /**
     * Initialize shared dependencies for all child controllers.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->authModel = new AuthModel();
        $this->userModel = new UserModel();
        $this->debugger = Debugger::class;
    }

    /**
     * Prepare the base data array to be passed to views.
     * Includes default metadata, session info, and page title.
     *
     * @param string $title        Page title
     * @param array  $additional   Additional custom data to merge
     * @return array
     */
    protected function getData(string $title, array $additional = []): array
    {
        $default = [
            'title' => $title,
            'author' => 'Vinexel Pioneers',
            'keywords' => 'default, keywords, vinexel,...',
            'description' => 'Build your ecosystem. Be a Vinexel Architect.',
            'session' => Session::get('user_session_email'),
            'favicon' => '/static/assets_do_not_delete/favicon',
        ];

        return array_merge($default, $additional);
    }
}
