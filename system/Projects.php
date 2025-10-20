<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace System;

use \App\RegisterProjects;
use \Vinexel\Modules\Config\Projects as URL;

/**
 * Class Projects
 *
 * Handles project registration and resolves the project name
 * based on the currently accessed domain. This class acts as a
 * bridge between the application's domain mapping configuration
 * and the runtime environment.
 */
class Projects
{
    /**
     * The project configuration handler instance.
     *
     * @var URL
     */
    private $projectsConfig;

    /**
     * Create a new Projects instance.
     *
     * Initializes the project configuration by registering available
     * projects and loading their associated domain configurations.
     */
    public function __construct()
    {
        $registerProjects = new RegisterProjects();
        $this->projectsConfig = new URL($registerProjects);
    }

    /**
     * Retrieve the project name associated with the given domain.
     *
     * This method determines which project should be loaded based on
     * the domain being accessed. If the domain is not registered, an
     * exception will be thrown.
     *
     * @param string $currentDomain The currently accessed domain name.
     * @return string The corresponding project name.
     * @throws \Exception If the domain is not found in the configuration.
     */
    public function getProjectName(string $currentDomain): string
    {
        return $this->projectsConfig->getProjectName($currentDomain);
    }
}
