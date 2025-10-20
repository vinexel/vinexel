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

class Localles
{
    public function getAvailableLocales(): array
    {
        $langPath = VISION_DIR
            . DIRECTORY_SEPARATOR
            . 'app'
            . DIRECTORY_SEPARATOR
            . PROJECT_NAME
            . '/Libraries/Language/';
        $locales = [];

        if (!is_dir($langPath)) {
            return [];
        }

        foreach (scandir($langPath) as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $locale = pathinfo($file, PATHINFO_FILENAME);
                $data = include $langPath . $file;

                $label = $data['__meta']['label'] ?? strtoupper($locale);
                $flag = $data['__meta']['flag'] ?? '/static/flymetrade/images/default-flag.svg';

                $locales[] = [
                    'code' => $locale,
                    'label' => $label,
                    'flag' => $flag,
                ];
            }
        }
        return $locales;
    }
}
