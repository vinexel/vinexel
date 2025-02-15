<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\View;

class RapidParser
{
    public static function parse($template)
    {
        // Change with {{ $variable }}
        $template = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?php echo $1; ?>', $template);

        // Handle Rapid like @if, @foreach, etc.
        $template = preg_replace('/@if\((.*?)\)/', '<?php if($1): ?>', $template);
        $template = preg_replace('/@elseif\((.*?)\)/', '<?php elseif($1): ?>', $template);
        $template = preg_replace('/@else/', '<?php else: ?>', $template);
        $template = preg_replace('/@foreach\((.*?)\)/', '<?php foreach($1): ?>', $template);
        $template = preg_replace('/@endforeach/', '<?php endforeach; ?>', $template);
        $template = preg_replace('/@yield\((.*?)\)/', '<?php echo $1; ?>', $template);
        $template = preg_replace('/@include\((.*?)\)/', '<?php include $1; ?>', $template);

        return $template;
    }
}
