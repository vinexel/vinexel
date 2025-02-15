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

use Vinexel\Modules\Container\Container as VisionContainer;
use Vision\Modules\Database;

class Container
{
    /**
     * Mengambil instance dari layanan dengan memperhatikan dependensi
     *
     * @param string $abstract
     * @return mixed
     * @throws \Exception
     */
    public static function get($abstract)
    {
        // Menambahkan logika tambahan jika diperlukan
        return VisionContainer::get($abstract);
    }

    /**
     * Mengambil instance dari layanan Database
     *
     * @return Database
     * @throws \Exception
     */
    public static function getDatabase()
    {
        return VisionContainer::get(Database::class);
    }

    /**
     * Menyimpan instance layanan ke dalam container
     *
     * @param string $abstract
     * @param mixed $factory
     */
    public static function singleton($abstract, $factory)
    {
        VisionContainer::singleton($abstract, $factory);
    }

    /**
     * Mengonfigurasi layanan
     *
     * @param string $key
     * @param mixed $value
     */
    public static function configure($key, $value)
    {
        VisionContainer::configure($key, $value);
    }

    /**
     * Menyimpan dan mengatur factory untuk layanan dengan dependensi
     *
     * @param string $abstract
     * @param callable $factory
     */
    public static function factory($abstract, callable $factory)
    {
        VisionContainer::factory($abstract, $factory);
    }

    /**
     * Menghapus instance dari layanan
     *
     * @param string $abstract
     */
    public static function forget($abstract)
    {
        VisionContainer::forget($abstract);
    }

    /**
     * Resolve layanan dari container
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
