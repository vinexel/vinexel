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

use Vinexel\Modules\Controller\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Render view.
     *
     * @param string $layout
     * @param string $view
     * @param array $data
     * @param string|null $subfolder
     */
    public function render($layout, $view, $data = [], $subfolder = null)
    {
        try {
            // Panggil metode render dari kelas induk
            parent::render($layout, $view, $data, $subfolder);
        } catch (\Exception $e) {
            // Tangani error dengan cara yang sesuai
            $this->handleError($e);
        }
    }

    /**
     * Penanganan error khusus untuk namespace sekunder.
     *
     * @param \Exception $e
     */
    private function handleError(\Exception $e)
    {
        // Menampilkan pesan error lengkap untuk debugging
        die("An error occurred while processing your request. Please try again later. Error: " . $e->getMessage());
    }

    /**
     * Contoh fitur tambahan: Validasi data sebelum render.
     *
     * @param array $data
     * @return bool
     */
    public function validateData(array $data): bool
    {
        // Tambahkan logika validasi sesuai kebutuhan
        if (empty($data)) {
            throw new \InvalidArgumentException("Data untuk render tidak boleh kosong.");
        }

        return true;
    }
}
