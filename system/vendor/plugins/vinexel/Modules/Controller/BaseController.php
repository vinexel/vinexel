<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Controller;

use Vision\Modules\Container;
use Deeper\Traits\Malscan\ViewsTrait;
use Vinexel\Modules\Debug\Debugger;

abstract class BaseController
{
    use ViewsTrait;
    protected $debugger;
    public function __construct()
    {
        $this->initialize();
        $this->debugger = Debugger::class;
    }

    /**
     * Menangani pengecualian yang terjadi di controller.
     *
     * @param \Exception $exception
     */
    public function handleException($exception)
    {
        if (!$exception instanceof \Throwable) {
            throw new \Exception("Invalid exception type.");
        }

        // Log error dan tampilkan error yang diformat dengan baik
        Debugger::logError($exception);
        Debugger::renderError($exception);
    }

    /**
     * Logika lain yang dijalankan di setiap controller.
     */
    public function initialize()
    {
        if (Debugger::isDebugMode()) {
            Debugger::log("Controller initialized", "DEBUG");
        }
    }


    /**
     * MalScan Integrated
     * Please don't edit MalScan code in BaseController because some security function may affected!
     */
    public function ms1()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner(
                $data,
                MS1
            );
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms2()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner(
                $data,
                MS2
            );
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms3()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner($data, 'logout');
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms4()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner($data, 'account');
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms5()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner($data, 'malware-scanner');
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms6()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner($data, 'security-check');
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms7()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner($data, 'install/index');
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ms8()
    {
        try {
            $data = [
                MS0 => VI,
            ];
            $this->scanner($data, 'install/done');
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
