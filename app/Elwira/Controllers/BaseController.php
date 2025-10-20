<?php

namespace Elwira\Controllers;

use \Vision\Modules\Controller;
use \Vinexel\Modules\Debug\Debugger;
use \Deeper\Libraries\Email;
use \Deeper\Libraries\Session;
use Elwira\Models\BaseModel;
use Elwira\Models\PlatformModel;
use Elwira\Models\Auth\UserModel;
use Elwira\Models\Tenant\TenantModel;
use Elwira\Libraries\Helper\EmailTemplate;
use Elwira\Libraries\Trait\Protection;

class BaseController extends Controller
{
    use Protection;
    protected $debugger;
    protected $emailService;
    protected $emailTemplate;
    protected $baseModel;
    protected $userModel;
    protected $tenantModel;
    protected $platformModel;

    protected function initialize(): void
    {
        parent::initialize();

        $this->debugger = Debugger::class;
        $this->emailService = new Email();
        $this->emailTemplate = new EmailTemplate();

        $this->baseModel = new BaseModel();
        $this->platformModel = new PlatformModel();
        $this->userModel = new UserModel();
        $this->tenantModel = new TenantModel();
    }

    protected function getData(string $title, array $additional = [], $id = null): array
    {
        $sessionParams = [
            'user_role' => Session::get("user_role"),
            'created_at' => Session::get("created_at"),
        ];

        $sessionEmail = Session::get('user_session_email');
        switch (Session::get('user_role') ?? null) {
            case 'admin':
                $this->isAdmin();
                $default = [
                    $sessionParams,
                    'title' => $title,
                    // 'Visioniconic_version' => Visioniconic_VERSION,
                    'available_languages' => (new \Vision\Modules\Localles())->getAvailableLocales(),
                    'settings' => $this->platformModel->getPlatformData(),
                    'csrf_token' => $this->generateCsrfToken(),
                    'users' => $this->userModel->getUserByEmail($sessionEmail),

                    'tenants' => $this->tenantModel->getTenant(),
                    'managed_tenants' => $this->tenantModel->getManagedTenant()
                ];
                return array_merge($default, $additional);
                break;
            case 'user':
                $this->isUser();
                $default = [
                    $sessionParams,
                    'title' => $title,
                    // 'Visioniconic_version' => Visioniconic_VERSION,
                    'available_languages' => (new \Vision\Modules\Localles())->getAvailableLocales(),
                    'settings' => $this->platformModel->getPlatformData(),
                    'csrf_token' => $this->generateCsrfToken(),
                    'users' => $this->userModel->getUserDataByEmail($sessionEmail),
                ];
                return array_merge($default, $additional);
                break;
            default:
                $default = [
                    'title' => $title,
                    'author' => 'Lalu Wira Perdana Kharisma D',
                    'keywords' => 'Visioniconic, Visioniconic, Vinexel',
                    'favicon' => '/static/assets_do_not_delete/favicon',
                    'available_languages' => (new \Vision\Modules\Localles())->getAvailableLocales(),
                    'csrf_token' => $this->generateCsrfToken(),
                    'settings' => $this->platformModel->getPlatformData(),
                    'countries' => $this->platformModel->getAllCountriesData(),
                ];
                return array_merge($default, $additional);
        }
        exit();
    }

    protected function renderPartial($view, $data = [])
    {
        extract($data);

        list($viewFolder, $viewFile) = explode('.', $view);

        // arahkan ke folder App/PROJECT_NAME/Views/
        $viewPath = dirname(__DIR__, 3) . "/App/" . PROJECT_NAME . "/Views/{$viewFolder}/{$viewFile}.rapid.php";

        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View file not found: " . htmlspecialchars($viewPath);
        }
    }
}
