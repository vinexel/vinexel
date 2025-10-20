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

use Vinexel\Modules\Request\VerifyManager;

class Vendor
{
    /**
     * @return bool
     */
    public static function check(): bool
    {
        $verifier = new VerifyManager();
        return $verifier->verifyRequest();
    }
}
