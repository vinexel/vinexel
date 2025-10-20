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

use Vinexel\Modules\Services\EnvironmentValidator;

class Environment
{
    public static function isDevMode(): bool
    {
        return EnvironmentValidator::isDevMode();
    }

    public static function isProductionIP(): bool
    {
        return EnvironmentValidator::isProductionIP();
    }

    public static function shouldValidateTransmitter(): bool
    {
        return EnvironmentValidator::shouldValidateFramework();
    }
}
