<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use System\Projects;

class DeleteProjectCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? null;

        if (!$projectName) {
            echo "Project name is required.\n";
            return;
        }

        // Konfirmasi penghapusan
        if (!$this->confirmDeletion($projectName)) {
            echo "Project deletion canceled.\n";
            return;
        }

        // Hapus entri domain dari Projects.php
        $this->removeDomainFromProjects($projectName);

        // Hapus folder project setelah domain dihapus
        $this->deleteProject($projectName);

        // Hapus folder cache untuk project
        $this->deleteCache($projectName);
    }

    protected function confirmDeletion($projectName)
    {
        echo "Are you sure you want to delete the project '{$projectName}'? (yes/no): ";
        $response = trim(fgets(STDIN)); // Membaca input dari pengguna

        return strtolower($response) === 'yes'; // Kembalikan true jika input adalah 'yes'
    }

    protected function deleteProject($projectName)
    {
        $projectDir = __DIR__ . "/../../../../../_app/{$projectName}/"; // Path ke folder project

        // Hapus folder project
        if (is_dir($projectDir)) {
            $this->deleteDirectory($projectDir);
            echo "Deleted project directory: {$projectDir}\n";
        } else {
            echo "Project directory does not exist: {$projectDir}\n";
        }
    }

    protected function deleteCache($projectName)
    {
        $cacheDir = __DIR__ . "/../../../../../_system/cache/{$projectName}/"; // Path ke folder cache

        // Hapus folder cache
        if (is_dir($cacheDir)) {
            $this->deleteDirectory($cacheDir);
            echo "Deleted cache directory: {$cacheDir}\n";
        } else {
            echo "Cache directory does not exist: {$cacheDir}\n";
        }
    }

    protected function deleteDirectory($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->deleteDirectory("$dir/$file") : unlink("$dir/$file");
        }
        rmdir($dir);
    }

    protected function removeDomainFromProjects($projectName)
    {
        $projectsFilePath = __DIR__ . '/../../../../../_system/helpers/Projects.php';
        $content = file_get_contents($projectsFilePath);
        $domainToRemove = ''; // Domain yang akan dihapus akan ditentukan di sini

        // Dapatkan domain yang sesuai dengan project
        $pattern = '/(\s*\'(127\.0\.0\.1:\d+)\'\s*=>\s*\'' . preg_quote($projectName, '/') . '\'\s*,?\s*)/';

        // Hapus entri domain yang sesuai
        $newContent = preg_replace($pattern, '', $content);

        // Hanya menulis kembali file jika ada perubahan
        if ($content !== $newContent) {
            file_put_contents($projectsFilePath, $newContent);
            echo "Removed domain entry for project: {$projectName} from Projects.php\n";
        } else {
            echo "No domain entry found for project: {$projectName}\n";
        }
    }
}
