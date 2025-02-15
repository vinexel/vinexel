<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Deeper\Libraries;

class Flasher
{
    public static function setFlash($message, $action, $type)
    {
        Session::set('flash', [
            'message' => $message,
            'action'  => $action,
            'type'    => $type,
            'time'    => time()
        ]);
    }

    public static function flash()
    {
        $flash = Session::get('flash');
        if ($flash) {
            echo '<div id="flasher" class="alert alert-' . $flash['type'] . ' alert-dismissible fade show" role="alert">
                    <strong>' . $flash['message'] . '</strong> ' . $flash['action'] . '
                </div>';
            Session::remove('flash');
        }
    }

    public static function isEmpty()
    {
        return empty(Session::get('flash'));
    }
}
