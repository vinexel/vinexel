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

use \Vinexel\Modules\Controller\Controller as BaseController;

class Controller extends BaseController
{
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
            parent::render($layout, $view, $data, $subfolder);
        } catch (\Exception $e) {
            $this->handleError($e);
        }
    }

    /**
     * Handling error specific for secondary namespace.
     *
     * @param \Exception $e
     */
    private function handleError(\Exception $e)
    {
        die("An error occurred while processing your request. Please try again later. Error: " . $e->getMessage());
    }

    /**
     * Example additional feature: Validate data before render.
     *
     * @param array $data
     * @return bool
     */
    public function validateData(array $data): bool
    {
        if (empty($data)) {
            throw new \InvalidArgumentException("Data for render can't be empty.");
        }

        return true;
    }
}
