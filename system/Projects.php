<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace System;

use App\RegisterProjects;
use Iconic\Core\Modules\Config\Projects as URL;

class Projects
{
    private $projectsConfig;

    public function __construct()
    {
        $registerProjects = new RegisterProjects();
        $this->projectsConfig = new URL($registerProjects);
    }

    /**
     * Mengambil nama proyek berdasarkan domain saat ini
     *
     * @param string $currentDomain
     * @return string
     * @throws \Exception
     */
    public function getProjectName(string $currentDomain): string
    {
        return $this->projectsConfig->getProjectName($currentDomain);
    }
}
