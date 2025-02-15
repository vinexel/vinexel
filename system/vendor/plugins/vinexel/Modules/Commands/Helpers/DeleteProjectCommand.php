<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Commands\Helpers;

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

        if (!$this->confirmDeletion($projectName)) {
            echo "Project deletion canceled.\n";
            return;
        }

        $this->removeDomainFromProjects($projectName);

        $this->deleteProject($projectName);

        $this->deleteCache($projectName);
    }

    protected function confirmDeletion($projectName)
    {
        echo "Are you sure you want to delete the project '{$projectName}'? (yes/no): ";
        $response = trim(fgets(STDIN));

        return strtolower($response) === 'yes';
    }

    protected function deleteProject($projectName)
    {
        $projectDir = dirname(__DIR__, 7) . "/app/{$projectName}/";

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
        $cacheDir = dirname(__DIR__, 7) . "/system/storage/cache/{$projectName}/";

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
        $projectsFilePath = dirname(__DIR__, 7) . '/app/RegisterProjects.php';
        $content = file_get_contents($projectsFilePath);
        $domainToRemove = '';

        $pattern = '/(\s*\'(127\.0\.0\.1:\d+)\'\s*=>\s*\'' . preg_quote($projectName, '/') . '\'\s*,?\s*)/';

        $newContent = preg_replace($pattern, '', $content);

        if ($content !== $newContent) {
            file_put_contents($projectsFilePath, $newContent);
            echo "Removed domain entry for project: {$projectName} from RegisterProjects.php\n";
        } else {
            echo "No domain entry found for project: {$projectName}\n";
        }
    }
}
