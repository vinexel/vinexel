<?php

namespace Deeper\Libraries;

class Flasher
{
    public static function setFlash($message, $action, $type)
    {
        // Gunakan kelas Session untuk menyimpan data flash message
        Session::set('flash', [
            'message' => $message,
            'action'  => $action,
            'type'    => $type,
            'time'    => time() // Menyimpan waktu flasher ditampilkan
        ]);
    }

    public static function flash()
    {
        // Gunakan kelas Session untuk mengakses data flash message
        $flash = Session::get('flash');
        if ($flash) {
            echo '<div id="flasher" class="alert alert-' . $flash['type'] . ' alert-dismissible fade show" role="alert">
                    <strong>' . $flash['message'] . '</strong> ' . $flash['action'] . '
                </div>';
            // Hapus data flash message setelah ditampilkan
            Session::remove('flash');
        }
    }

    public static function isEmpty()
    {
        // Gunakan kelas Session untuk memeriksa apakah data flash message kosong
        return empty(Session::get('flash'));
    }
}
