<?php

namespace Iconic\Core\Modules\Config;

class Requirements
{
    const EXT_P = F_P;
    const EXT_R = F_R;

    public static function MinVersion()
    {
        $minPhpVersion = '8.2.12';
        if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
            $message = sprintf(
                'Your PHP version must be %s or higher to run this Vision. Current version: %s',
                $minPhpVersion,
                PHP_VERSION
            );
            exit($message);
        }
    }

    public static function Php()
    {
        return self::EXT_P;
    }

    public static function Rapid()
    {
        return self::EXT_R;
    }
}
