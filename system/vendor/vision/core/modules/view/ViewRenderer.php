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

        $loader = new FilesystemLoader($basePath);
        $this->twig = new Environment($loader, [
            // 'cache' => VISION_DIR . DIRECTORY_SEPARATOR . ('system/framework/writeable/cache') . DIRECTORY_SEPARATOR . PROJECT_NAME . DIRECTORY_SEPARATOR,
            'cache' => false,
            'debug' => false,
        ]);
    }

    public function renderFile($file, $data)
    {
        if (!$this->isRapidFile($file)) {
            $file .= strtolower(Requirements::getRapid());
        }

        $template = $this->twig->load($file);
        return $template->render($data);
    }

    public function getViewPath($project, $view)
    {
        $viewParts = explode(SC::get('T_D'), $view);
        $viewFile = array_pop($viewParts);
        $subfolderPath = implode(DIRECTORY_SEPARATOR, $viewParts);

        return $subfolderPath . DIRECTORY_SEPARATOR . $viewFile . strtolower(Requirements::getRapid());
    }

    public function getLayoutPath($project, $layout)
    {
        $layoutParts = explode(SC::get('T_D'), $layout);
        $layoutFile = array_pop($layoutParts);
        $subfolderPath = implode(DIRECTORY_SEPARATOR, $layoutParts);

        return $subfolderPath . DIRECTORY_SEPARATOR . $layoutFile . strtolower(Requirements::getRapid());
    }

    private function isRapidFile($file)
    {
        return substr($file, -10) === strtolower(Requirements::getRapid());
    }
}
