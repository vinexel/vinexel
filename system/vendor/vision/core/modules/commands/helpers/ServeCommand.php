<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Serve;

class ServeCommand
{
    public function handle($arguments)
    {
        $port = $arguments[0] ?? 8000;
        $server = new Serve();
        $server->start($port);
    }
}
