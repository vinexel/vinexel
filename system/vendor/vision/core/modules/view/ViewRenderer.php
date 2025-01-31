<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Vision\Modules\Requirements;
use Deeper\Globals\Config\Src\SysCon as SC;
use Vision\Modules\Config;
use Exception;

class ViewRenderer extends Rapid
{
    private $twig;

    public function __construct()
    {
        $basePath =
            strtolower(VISION_DIR .
                DIRECTORY_SEPARATOR .
                SC::get('M_Z') .
                SC::get('K_M') .
                SC::get('K_M') .
                DIRECTORY_SEPARATOR .
                PROJECT_NAME .
                DIRECTORY_SEPARATOR .
                SC::get('E_M') .
                SC::get('M_R') .
                SC::get('M_V') .
                SC::get('M_D') .
                SC::get('M_H'));

        // Ambil nilai cache dari config/env dan pastikan hasilnya boolean
        $enableCache = filter_var(Config::get('IS_CACHED', getenv('IS_CACHED') ?: false), FILTER_VALIDATE_BOOLEAN);

        // Tentukan direktori cache hanya jika cache diaktifkan
        $cachePath = $enableCache ?
            VISION_DIR . DIRECTORY_SEPARATOR . 'system/framework/writeable/cache' . DIRECTORY_SEPARATOR . PROJECT_NAME . DIRECTORY_SEPARATOR
            : false;

        $loader = new FilesystemLoader($basePath);
        $this->twig = new Environment($loader, [
            'cache' => $cachePath,
            'debug' => false,
        ]);
    }

    public function renderFile($file, $data)
    {
        $isRapid = $this->isRapidFile($file);
        $isPhp = $this->isPhpFile($file);

        if ($isRapid || !$isPhp) {
            // Coba render file dengan ekstensi Rapid
            $rapidFile = strtolower($file) . strtolower(Requirements::getRapid());

            try {
                $template = $this->twig->load($rapidFile);
                return $template->render($data);
            } catch (\Twig\Error\LoaderError $e) {
                // Jika file Rapid tidak ditemukan, lanjut ke pengecekan PHP
            }
        }

        if ($isPhp || !$isRapid) {
            // Render sebagai file PHP
            $fullPath = VISION_DIR
                . DIRECTORY_SEPARATOR
                . 'app'
                . DIRECTORY_SEPARATOR
                . PROJECT_NAME
                . DIRECTORY_SEPARATOR
                . 'views'
                . DIRECTORY_SEPARATOR
                . ltrim($file, DIRECTORY_SEPARATOR);

            if (!str_ends_with($fullPath, '.php')) {
                $fullPath .= '.php';
            }

            if (!file_exists($fullPath)) {
                throw new \Exception("File tidak ditemukan: " . $fullPath);
            }

            $content = file_get_contents($fullPath);
            $parsedContent = RapidParser::parse($content);

            extract($data, EXTR_OVERWRITE);
            ob_start();

            try {
                eval('?>' . $parsedContent);
            } catch (\Throwable $e) {
                ob_end_clean();
                throw new \Exception("Kesalahan saat memproses template: " . $e->getMessage());
            }

            return ob_get_clean();
        }

        throw new \Exception("Format file tidak dikenali: " . $file);
    }



    public function getViewPath($project, $view)
    {
        $viewParts = explode(SC::get('T_D'), $view);
        $viewFile = array_pop($viewParts);
        $subfolderPath = implode(DIRECTORY_SEPARATOR, $viewParts);

        return $subfolderPath . DIRECTORY_SEPARATOR . $viewFile;
    }

    public function getLayoutPath($project, $layout)
    {
        $layoutParts = explode(SC::get('T_D'), $layout);
        $layoutFile = array_pop($layoutParts);
        $subfolderPath = implode(DIRECTORY_SEPARATOR, $layoutParts);

        return $subfolderPath . DIRECTORY_SEPARATOR . $layoutFile;
    }

    private function isRapidFile($file)
    {
        return substr($file, -10) === strtolower(Requirements::getRapid());
    }

    private function isPhpFile($file)
    {
        return substr($file, -4) === strtolower(Requirements::getPhp());
    }
}
