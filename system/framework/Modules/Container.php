<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vision\Modules;

use \Vinexel\Modules\Container\Container as VisionContainer;
use \Vision\Modules\Database;

class Container
{
    /**
     * Retrieve an instance of a service while handling its dependencies.
     *
     * @param string $abstract
     * @return mixed
     * @throws \Exception
     */
    public static function get($abstract)
    {
        // Add additional logic here if needed
        return VisionContainer::get($abstract);
    }

    /**
     * Retrieve an instance of the Database service.
     *
     * @return Database
     * @throws \Exception
     */
    public static function getDatabase()
    {
        return VisionContainer::get(Database::class);
    }

    /**
     * Register a singleton service instance in the container.
     *
     * @param string $abstract
     * @param mixed $factory
     */
    public static function singleton($abstract, $factory)
    {
        VisionContainer::singleton($abstract, $factory);
    }

    /**
     * Configure a service with a specific key-value pair.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function configure($key, $value)
    {
        VisionContainer::configure($key, $value);
    }

    /**
     * Register a factory for creating services with dependencies.
     *
     * @param string $abstract
     * @param callable $factory
     */
    public static function factory($abstract, callable $factory)
    {
        VisionContainer::factory($abstract, $factory);
    }

    /**
     * Remove a registered service instance from the container.
     *
     * @param string $abstract
     */
    public static function forget($abstract)
    {
        VisionContainer::forget($abstract);
    }

    /**
     * Resolve a service instance from the container.
     *
     * @param string $abstract
     * @return mixed
     * @throws \Exception
     */
    public static function resolve($abstract)
    {
        return VisionContainer::resolve($abstract);
    }
}
