<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Container;

use Vision\Modules\Database;

class Container
{
    protected static $instances = [];
    protected static $factories = [];
    protected static $configurations = [];

    /**
     * Menyimpan instance dari layanan.
     *
     * @param string $abstract
     * @param mixed $factory
     */
    public static function singleton($abstract, $factory)
    {
        self::$factories[$abstract] = $factory;
    }

    /**
     * Menyimpan konfigurasi untuk layanan.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function configure($key, $value)
    {
        self::$configurations[$key] = $value;
    }

    /**
     * Mengambil konfigurasi untuk layanan.
     *
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public static function getConfiguration($key)
    {
        if (!isset(self::$configurations[$key])) {
            throw new \Exception("Configuration {$key} not found.");
        }

        return self::$configurations[$key];
    }

    /**
     * Mengambil instance dari layanan.
     *
     * @param string $abstract
     * @return mixed
     * @throws \Exception
     */
    public static function get($abstract)
    {
        // Jika layanan sudah diinisialisasi sebelumnya, kembalikan instance
        if (isset(self::$instances[$abstract])) {
            return self::$instances[$abstract];
        }

        // Cek apakah kelas yang diminta adalah sebuah class yang valid (ada di namespace)
        if (class_exists($abstract)) {
            $reflection = new \ReflectionClass($abstract);

            // Cek apakah class extend dari BaseModel
            if ($reflection->isSubclassOf(ucfirst(PROJECT_NAME) . '\BaseModel')) {
                $instance = new $abstract(self::get(Database::class)); // Inject Database ke dalam model
                self::$instances[$abstract] = $instance;
                return $instance;
            }
        }

        // Jika masih tidak ditemukan, maka service tidak ada
        if (!isset(self::$factories[$abstract])) {
            throw new \Exception("Service {$abstract} not found.");
        }

        // Inisialisasi instance menggunakan factory
        self::$instances[$abstract] = call_user_func(self::$factories[$abstract]);
        return self::$instances[$abstract];
    }

    /**
     * Mengambil BaseModel yang sesuai berdasarkan namespace kelas yang diminta.
     *
     * @param string $abstract
     * @return string
     */
    protected static function getBaseModelClass($abstract)
    {
        // Ambil namespace dari kelas yang diminta
        $namespaceParts = explode('\\', $abstract);

        // Asumsikan namespace project berada di bagian pertama
        $projectNamespace = $namespaceParts[0];

        // Buat nama lengkap dari BaseModel untuk project tersebut
        $baseModelClass = $projectNamespace . '\\Models\\BaseModel';

        // Pastikan BaseModel dari namespace ini ada
        if (!class_exists($baseModelClass)) {
            throw new \Exception("BaseModel for project {$projectNamespace} not found.");
        }

        return $baseModelClass;
    }

    /**
     * Menghapus instance layanan.
     *
     * @param string $abstract
     */
    public static function forget($abstract)
    {
        unset(self::$instances[$abstract]);
    }

    /**
     * Resolve layanan dari container.
     *
     * @param string $abstract
     * @return mixed
     * @throws \Exception
     */
    public static function resolve($abstract)
    {
        return self::get($abstract);
    }

    /**
     * Menyimpan dan mengatur factory untuk layanan yang memerlukan dependensi.
     *
     * @param string $abstract
     * @param callable $factory
     */
    public static function factory($abstract, callable $factory)
    {
        self::$factories[$abstract] = $factory;
    }
}
