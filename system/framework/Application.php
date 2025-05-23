<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license Envato License
 */

namespace Vision;

use \Vinexel\Modules\RegisterModule;

class Application extends RegisterModule
{
    /**
     * {@inheritdoc}
     */
    protected function onCreate(): void {}

    /**
     * {@inheritdoc}
     */
    protected function onFinish(array $info): void {}

    /**
     * {@inheritdoc}
     */
    protected function onDestroy(): void
    {
        gc_collect_cycles();
    }
}
