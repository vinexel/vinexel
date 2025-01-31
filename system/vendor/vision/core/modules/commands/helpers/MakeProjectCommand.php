<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Make;

class MakeProjectCommand
{
    public function handle($arguments)
    {
        // Ambil nama project dari argumen, jika tidak ada gunakan 'default_project'
        $projectName = $arguments[0] ?? 'default_project';

        // Buat instance dari class Make
        $make = new Make();

        // Panggil method createProject dari class Make untuk membuat project
        $make->createProject($projectName);
    }
}
