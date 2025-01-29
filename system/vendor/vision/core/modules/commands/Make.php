<?php

/**
 * Vision Framework Custom Autoload.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Commands;

class Make
{
    // Method untuk membuat struktur proyek beserta file dasar
    public function createProject($projectName)
    {
        $projectDir = dirname(__DIR__, 6) . "/app/{$projectName}/";

        // Cek apakah direktori project ada, jika tidak buat direktori baru
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true); // true untuk membuat direktori secara rekursif
            echo "Project folder {$projectName} created successfully.\n";
        } else {
            echo "Project {$projectName} already exists.\n";
            return;
        }

        // Buat file dan folder dasar
        $this->createBaseFiles($projectName, $projectDir);
    }

    // Method untuk membuat file dasar seperti .env dan menambahkan domain ke RegisterProjects.php
    protected function createBaseFiles($projectName, $projectDir)
    {
        // Ubah huruf pertama projectName menjadi kapital
        $projectName = ucfirst($projectName);

        // Buat file .env
        $envFile = "{$projectDir}.env";
        $envContent = "DB_HOST=localhost\nDB_NAME={$projectName}\nDB_USER=root\nDB_PASS=\n";
        file_put_contents($envFile, $envContent);
        echo "Created .env file at {$envFile}.\n";

        // Buat file routes.php
        $routesFile = "{$projectDir}routes.php";
        $routesContent = "<?php\n\nuse App\\{$projectName}\\Controllers;\n\n// Example route\n\$router->get('/', [Controllers\\HomeController::class, 'index']);\n";
        file_put_contents($routesFile, $routesContent);
        echo "Created routes.php file at {$routesFile}.\n";

        // Buat folder untuk models, views, controllers
        $folders = ['models', 'views', 'controllers', 'views/layout'];
        foreach ($folders as $folder) {
            mkdir($projectDir . $folder, 0777, true);
            echo "Created folder {$folder} in {$projectDir}.\n";
        }

        // Buat file contoh untuk model, controller, dan view
        $this->createController($projectName, 'Home');
        $this->createModel($projectName, 'ExampleModel');
        $this->createView($projectName, 'index');

        // Buat BaseController dan BaseModel
        $this->createBaseController($projectName, $projectDir);
        $this->createBaseModel($projectName, $projectDir);

        // Buat layout dasar
        $this->createBaseLayout($projectName, $projectDir);

        // Cari port yang tersedia
        $availablePort = $this->findAvailablePort();

        // Tambahkan domain ke RegisterProjects.php dengan port yang tersedia
        $this->addDomainToProjects('127.0.0.1', $availablePort, $projectName);
    }

    // Method untuk menemukan port yang tersedia
    protected function findAvailablePort()
    {
        $usedPorts = [];

        // Baca file RegisterProjects.php untuk mendapatkan port yang digunakan
        $projectsFile = dirname(__DIR__, 6) . '/system/RegisterProjects.php';
        $projectsContent = file_get_contents($projectsFile);

        // Ambil semua port dari array $domainsToProjects
        preg_match_all("/'127\.0\.0\.1:(\d+)'/", $projectsContent, $matches);
        foreach ($matches[1] as $port) {
            $usedPorts[] = (int)$port; // Simpan port yang digunakan
        }

        // Cari port yang tersedia (misalnya dari 8000 hingga 8999)
        for ($port = 8000; $port <= 8999; $port++) {
            if (!in_array($port, $usedPorts)) {
                return $port; // Kembalikan port yang pertama kali ditemukan
            }
        }

        // Jika tidak ada port yang tersedia, kembalikan null atau berikan pesan error
        die("No available ports found.\n");
    }

    // Method untuk menambahkan domain dan port ke RegisterProjects.php
    protected function addDomainToProjects($domain, $port, $projectName)
    {
        $projectsFile = dirname(__DIR__, 6) . '/system/RegisterProjects.php';

        // Baca konten file RegisterProjects.php
        $projectsContent = file_get_contents($projectsFile);

        // Format domain lengkap (domain:port)
        $fullDomain = "{$domain}:{$port}";

        // Periksa apakah domain sudah ada dalam file
        if (strpos($projectsContent, $fullDomain) === false) {
            // Temukan posisi akhir dari array $domainsToProjects
            $insertPosition = strpos($projectsContent, '];');

            // Buat entry baru untuk domain
            $newEntry = "        '{$fullDomain}' => '" . strtolower($projectName) . "',\n";


            // Sisipkan entry baru sebelum penutup array
            $newContent = substr($projectsContent, 0, $insertPosition) . $newEntry . substr($projectsContent, $insertPosition);

            // Tulis kembali konten file RegisterProjects.php
            file_put_contents($projectsFile, $newContent);
            echo "Added domain {$fullDomain} => {$projectName} to RegisterProjects.php.\n";
        } else {
            echo "Domain {$fullDomain} already exists in RegisterProjects.php.\n";
        }
    }

    // Method untuk membuat BaseController.php
    protected function createBaseController($projectName, $projectDir)
    {
        $projectName = ucfirst($projectName); // Pastikan huruf kapital pada nama project
        $baseControllerFile = "{$projectDir}controllers/BaseController.php";
        $baseControllerContent = "<?php\n\nnamespace App\\{$projectName}\\Controllers;\n\nclass BaseController\n{\n    public function __construct()\n    {\n        // Initialization code\n    }\n\n    // Base methods for controllers\n}\n";
        file_put_contents($baseControllerFile, $baseControllerContent);
        echo "Created BaseController.php at {$baseControllerFile}.\n";
    }

    // Method untuk membuat BaseModel.php
    protected function createBaseModel($projectName, $projectDir)
    {
        $projectName = ucfirst($projectName); // Pastikan huruf kapital pada nama project
        $baseModelFile = "{$projectDir}models/BaseModel.php";
        $baseModelContent = "<?php\n\nnamespace App\\{$projectName}\\Models;\n\nclass BaseModel\n{\n    protected \$db;\n\n    public function __construct(\$db)\n    {\n        \$this->db = \$db;\n    }\n\n    // Base methods for models\n}\n";
        file_put_contents($baseModelFile, $baseModelContent);
        echo "Created BaseModel.php at {$baseModelFile}.\n";
    }

    // Method untuk membuat layout dasar dan folder layout
    protected function createBaseLayout($projectName, $projectDir)
    {
        $layoutDir = "{$projectDir}views/layout/";

        // Buat folder layout di dalam views
        if (!file_exists($layoutDir)) {
            mkdir($layoutDir, 0777, true);
            echo "Created layout folder at {$layoutDir}.\n";
        }

        // Buat file layout dasar
        $layoutFile = "{$layoutDir}base_layout.php";
        $layoutContent = <<<'LAYOUT'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base Layout</title>
    <link rel="stylesheet" href="/path/to/your/css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to the Base Layout</h1>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Your Project Name</p>
    </footer>
</body>
</html>
LAYOUT;

        file_put_contents($layoutFile, $layoutContent);
        echo "Created base layout file at {$layoutFile}.\n";
    }

    // Method untuk membuat controller di dalam folder project yang sesuai
    public function createController($projectName, $controllerName)
    {
        $projectDir = dirname(__DIR__, 6) . "/app/{$projectName}/Controllers";
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
        }

        $filePath = "{$projectDir}/{$controllerName}Controller.php";
        if (file_exists($filePath)) {
            echo "Controller {$controllerName}Controller.php already exists in project {$projectName}.\n";
            return;
        }

        $controllerTemplate = "<?php\n\nnamespace App\\{$projectName}\\Controllers;\n\nclass {$controllerName}Controller\n{\n    public function index()\n    {\n        echo 'This is the {$controllerName} controller in project {$projectName}.';\n    }\n}";
        file_put_contents($filePath, $controllerTemplate);
        echo "Controller {$controllerName}Controller.php created successfully in project {$projectName}.\n";
    }

    // Method untuk membuat model di dalam folder project yang sesuai
    public function createModel($projectName, $modelName)
    {
        $projectDir = dirname(__DIR__, 6) . "/app/{$projectName}/Models";
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
        }

        $filePath = "{$projectDir}/{$modelName}.php";
        if (file_exists($filePath)) {
            echo "Model {$modelName}.php already exists in project {$projectName}.\n";
            return;
        }

        $modelTemplate = "<?php\n\nnamespace App\\{$projectName}\\Models;\n\nclass {$modelName}\n{\n    protected \$table = '" . strtolower($modelName) . "s';\n    public function getAll()\n    {\n        // Kode untuk mendapatkan semua data\n    }\n    public function find(\$id)\n    {\n        // Kode untuk menemukan data berdasarkan ID\n    }\n}";
        file_put_contents($filePath, $modelTemplate);
        echo "Model {$modelName}.php created successfully in project {$projectName}.\n";
    }

    // Method untuk membuat view di dalam folder project yang sesuai
    public function createView($projectName, $viewName)
    {
        $projectDir = dirname(__DIR__, 6) . "/app/{$projectName}/Views";
        if (!is_dir($projectDir)) {
            mkdir($projectDir, 0777, true);
        }

        $filePath = "{$projectDir}/{$viewName}.rapid";
        if (file_exists($filePath)) {
            echo "View {$viewName}.rapid already exists in project {$projectName}.\n";
            return;
        }

        $viewTemplate = "<h1>Welcome to {$projectName}</h1>";
        file_put_contents($filePath, $viewTemplate);
        echo "View {$viewName}.rapid created successfully in project {$projectName}.\n";
    }

    public function createMigrate($projectName, $migrateName) {}
    public function createSeed($projectName, $seedName) {}
}
