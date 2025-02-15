<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Controller;

use Vinexel\Modules\View\ViewRenderer;
use Vinexel\Modules\Debug\DebugHandler;
use Vision\Modules\Restrictions;
use Vision\Modules\Container;

class Controller extends BaseController
{
    protected $viewRenderer;
    protected $debugHandler;
    protected $restrictions;
    protected $sections = [];

    public function __construct($debugHandler = null, $restrictions = null)
    {
        parent::__construct();
        $this->viewRenderer = new ViewRenderer();
        $this->debugHandler = $debugHandler ?? new DebugHandler();
        $this->restrictions = $restrictions ?? new Restrictions();
    }

    public function render($view, $layout, $data = [], $subfolder = null)
    {
        $project = PROJECT_NAME;

        try {
            $layoutFile = $this->viewRenderer->getLayoutPath($project, $layout);
            $viewFile = $this->viewRenderer->getViewPath($project, $view);
            $content = $this->viewRenderer->renderFile($viewFile, $data);

            $metrix = Container::get('metrix');
            if ($metrix) {
                $data['metrix'] = $metrix;
            }

            $layoutData = array_merge($data, ['content' => $content]);
            $output = $this->viewRenderer->renderFile($layoutFile, $layoutData);

            echo $output;

            if (!$this->debugHandler->isEnabled()) {
                echo RESTRICTION . '<script>
document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
}, false);

document.addEventListener("keydown", function(e) {
    if (e.ctrlKey && (e.key === "u" || e.key === "s" || e.key === "p")) {
        e.preventDefault();
    }
});
</script>';
            }

            $this->debugHandler->render();
        } catch (\Exception $e) {
            $this->handleRenderError($e);
        }
    }

    private function handleRenderError(\Exception $e)
    {
        echo "<h1>Error Rendering Page</h1>";
        echo "<p>" . $e->getMessage() . "</p>";

        if ($this->debugHandler->isEnabled()) {
            $this->debugHandler->render();
        }
    }
}
