<?php

namespace Vision;

use Vinexel\Modules\RegisterModule;

class Application extends RegisterModule
{
    protected function onCreate(): void
    {
        // Call the parent onCreate() first from parent (RegisterModule)
        parent::onCreate();

        // Add custom logic if needed
        // For example: additional logging or middleware
    }

    protected function onFinish(array $info): void
    {
        parent::onFinish($info);

        // Add custom post-processing logic if needed
        // error_log("Finished processing {$info['controller']}::{$info['method']}");
    }

    protected function onDestroy(): void
    {
        // Call parent cleanup routine
        parent::onDestroy();

        // Add additional cleanup logic if needed
    }
}
