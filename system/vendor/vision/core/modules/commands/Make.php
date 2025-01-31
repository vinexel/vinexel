<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Commands;

class Make
{
    public function createProject($projectName)
    {
        $projectDir = dirname(__DIR__, 6) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "{$projectName}" . DIRECTORY_SEPARATOR;

        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
            echo "Project folder {$projectName} created successfully.\n";
        } else {
            echo "Project {$projectName} already exists.\n";
            return;
        }

        $this->createBaseFiles($projectName, $projectDir);
    }

    protected function createBaseFiles($projectName, $projectDir)
    {
        $projectName = ucfirst($projectName);

        $envFile = "{$projectDir}.env";
        $envContent = "DB_HOST=localhost\nDB_NAME={$projectName}\nDB_USER=root\nDB_PASS=\n";
        file_put_contents($envFile, $envContent);
        echo "Created .env file at {$envFile}.\n";

        $routesFile = "{$projectDir}routes.php";
        $routesContent = "<?php\n\nuse use Vision\Modules\Router;\n\n// Example route\n\Router::add('GET', '/', 'HomeController@index');\n
Router::add('GET', '/about', 'HomeController@about');\n";
        file_put_contents($routesFile, $routesContent);
        echo "Created routes.php file at {$routesFile}.\n";

        $folders = ['models', 'views', 'controllers', 'views/layout'];
        foreach ($folders as $folder) {
            mkdir($projectDir . $folder, 0777, true);
            echo "Created folder {$folder} in {$projectDir}.\n";
        }

        $this->createController($projectName, 'Home');
        $this->createModel($projectName, 'ExampleModel');
        $this->createView($projectName, 'index');
        $this->createBaseController($projectName, $projectDir);
        $this->createBaseModel($projectName, $projectDir);
        $this->createBaseLayout($projectName, $projectDir);

        $availablePort = $this->findAvailablePort();

        $this->addDomainToProjects('127.0.0.1', $availablePort, $projectName);
    }

    protected function findAvailablePort()
    {
        $usedPorts = [];
        $projectsFile = dirname(__DIR__, 6) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'RegisterProjects.php';
        $projectsContent = file_get_contents($projectsFile);

        preg_match_all("/'127\.0\.0\.1:(\d+)'/", $projectsContent, $matches);
        foreach ($matches[1] as $port) {
            $usedPorts[] = (int)$port;
        }

        for ($port = 8000; $port <= 8999; $port++) {
            if (!in_array($port, $usedPorts)) {
                return $port;
            }
        }

        die("No available ports found.\n");
    }

    protected function addDomainToProjects($domain, $port, $projectName)
    {
        $projectsFile = dirname(__DIR__, 6) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'RegisterProjects.php';
        $projectsContent = file_get_contents($projectsFile);
        $fullDomain = "{$domain}:{$port}";

        if (strpos($projectsContent, $fullDomain) === false) {
            $insertPosition = strpos($projectsContent, '];');
            $newEntry = "        '{$fullDomain}' => '" . strtolower($projectName) . "',\n";
            $newContent = substr($projectsContent, 0, $insertPosition) . $newEntry . substr($projectsContent, $insertPosition);

            file_put_contents($projectsFile, $newContent);
            echo "Added domain {$fullDomain} => {$projectName} to RegisterProjects.php.\n";
        } else {
            echo "Domain {$fullDomain} already exists in RegisterProjects.php.\n";
        }
    }

    protected function createBaseController($projectName, $projectDir)
    {
        $projectName = ucfirst($projectName);
        $baseControllerFile = "{$projectDir}controllers" . DIRECTORY_SEPARATOR . "BaseController.php";
        $baseControllerContent = "
        <?php
        \n\n
        /**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */
        \n\n
    namespace {$projectName}\\Controllers;
        \n
        use Vision\Modules\Controller;
use Iconic\Core\Modules\Debug\Debugger;
use Deeper\Traits\Malscan\ViewsTrait;
        \n
    class BaseController extends Controller
        \n
    {
        \n
    use ViewsTrait;
    protected \$debugger;

    public function __construct()
    {
        parent::__construct();
        \$this->initialize();
        \$this->debugger = Debugger::class;
    }

    /**
     * MalScan Integrated
     * Please don't edit MalScan code in BaseController because some security function may affected!
     */
    public function ms1()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(
                \$data,
                MS1
            );
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms2()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(
                \$data,
                MS2
            );
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms3()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(\$data, 'logout');
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms4()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(\$data, 'account');
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms5()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(\$data, 'malware-scanner');
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms6()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(\$data, 'security-check');
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms7()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(\$data, 'install/index');
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    public function ms8()
    {
        try {
            \$data = [
                MS0 => VI,
            ];
            \$this->scanner(\$data, 'install/done');
        } catch (\Throwable \$e) {
            \$this->handleException(\$e);
        }
    }

    /**
     * Menangani pengecualian yang terjadi di controller.
     *
     * @param \Exception \$exception
     */
    public function handleException(\$exception)
    {
        if (!\$exception instanceof \Throwable) {
            throw new \Exception('Invalid exception type.');
        }

        // Log error dan tampilkan error yang diformat dengan baik
        Debugger::logError(\$exception);
        Debugger::renderError(\$exception);
    }

    /**
     * Logika lain yang dijalankan di setiap controller.
     */
    public function initialize()
    {
        if (Debugger::isDebugMode()) {
            Debugger::log('Controller initialized', 'DEBUG');
        }
    }
        \n}\n";
        file_put_contents($baseControllerFile, $baseControllerContent);
        echo "Created BaseController.php\n";
    }

    protected function createBaseModel($projectName, $projectDir)
    {
        $projectName = ucfirst($projectName);
        $baseModelFile = "{$projectDir}models" . DIRECTORY_SEPARATOR . "BaseModel.php";
        $baseModelContent = "<?php\n\nnamespace {$projectName}\\Models;\n\nclass BaseModel\n{\n    protected \$db;\n\n    public function __construct(\$db)\n    {\n        \$this->db = \$db;\n    }\n\n    // Base methods for models\n}\n";
        file_put_contents($baseModelFile, $baseModelContent);
        echo "Created BaseModel.php\n";
    }

    protected function createBaseLayout($projectName, $projectDir)
    {
        $layoutDir = "{$projectDir}views" . DIRECTORY_SEPARATOR . "layouts" . DIRECTORY_SEPARATOR;

        if (!file_exists($layoutDir)) {
            mkdir($layoutDir, 0777, true);
            echo "Created layout folder\n";
        }

        $layoutFile = "{$layoutDir}base_layout.rapid.php";
        $layoutContent = <<<'LAYOUT'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="{{ viewport }}">
    <title>{{ title }}</title>
    <meta name="description" content="{{ description }}">
    <meta name="author" content="{{ author }}">
    <link rel="stylesheet" href="/path/to/your/css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to the Base Layout</h1>
    </header>

    <main>
         {{ content | raw }} // or {{ $content }} or <?= $content ?> if view is .php extension
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> - Your Project Name</p>
    </footer>
</body>
</html>
LAYOUT;

        file_put_contents($layoutFile, $layoutContent);
        echo "Created base layout file\n";
    }

    public function createController($projectName, $controllerName)
    {
        $projectDir = dirname(__DIR__, 6) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "{$projectName}" . DIRECTORY_SEPARATOR . "Controllers";
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
        }

        $filePath = "{$projectDir}" . DIRECTORY_SEPARATOR . "{$controllerName}Controller.php";
        if (file_exists($filePath)) {
            echo "Controller {$controllerName}Controller.php already exists in project {$projectName}.\n";
            return;
        }

        $controllerTemplate = "<?php\n\nnamespace {$projectName}\\Controllers;\n\nclass {$controllerName}Controller\n{\n    public function index()\n    {\n        echo 'This is the {$controllerName} controller in project {$projectName}.';\n    }\n}";
        file_put_contents($filePath, $controllerTemplate);
        echo "Controller {$controllerName}Controller.php created successfully in project {$projectName}.\n";
    }

    public function createModel($projectName, $modelName)
    {
        $projectDir = dirname(__DIR__, 6) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "{$projectName}" . DIRECTORY_SEPARATOR . "Models";
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
        }

        $filePath = "{$projectDir}" . DIRECTORY_SEPARATOR . "{$modelName}.php";
        if (file_exists($filePath)) {
            echo "Model {$modelName}.php already exists in project {$projectName}.\n";
            return;
        }

        $modelTemplate = "<?php\n\nnamespace {$projectName}\\Models;\n\nclass {$modelName}\n{\n    protected \$table = '" . strtolower($modelName) . "s';\n    public function getAll()\n    {\n        // Kode untuk mendapatkan semua data\n    }\n    public function find(\$id)\n    {\n        // Kode untuk menemukan data berdasarkan ID\n    }\n}";
        file_put_contents($filePath, $modelTemplate);
        echo "Model {$modelName}.php created successfully in project {$projectName}.\n";
    }

    public function createView($projectName, $viewName)
    {
        $projectDir = dirname(__DIR__, 6) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "{$projectName}" . DIRECTORY_SEPARATOR . "Views";
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
        }

        $filePath = "{$projectDir}" . DIRECTORY_SEPARATOR . "{$viewName}.rapid.php";
        if (file_exists($filePath)) {
            echo "View {$viewName}.rapid.php already exists in project {$projectName}.\n";
            return;
        }

        $viewTemplate = "<h1>Welcome to {$projectName}</h1>";
        file_put_contents($filePath, $viewTemplate);
        echo "View {$viewName}.rapid created successfully in project {$projectName}.\n";
    }

    public function createMigrate($projectName, $migrateName) {}
    public function createSeed($projectName, $seedName) {}
}
