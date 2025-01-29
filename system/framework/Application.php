<?php

/**
 * Vision Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vision;

use \Iconic\Core\Modules\RegisterModule;

class Application extends RegisterModule
{
    /**
     * {@inheritdoc}
     */
    protected function onCreate(): void
    {
        /**
         *  Initialize session manager if you want to make use of sessions
         *  @example $this->session = new Session(new SessionManager());
         *  @example $this->session->setStorage("my_storage");
         *  @example $this->session->start();
         */

        /**
         * Register global classes to use across your application life cycle
         * Once exported you can access the method in application class by $this->Foo
         * The export method should be used if the property visibility is not protected or public,
         * Or when view isolation is enabled.
         *
         * @example $this->export($this->session); 
         * @example $this->export(MyClass::class); 
         * @example $this->export(new MyClass(arguments), 'MyClass');
         * @example $this->export(new MyClass(arguments));
         */

        /**
         * Set default the canonical url version for your application
         * Before settings, make sure to register Meta Class 
         * @example $this->export(Meta::class);
         *
         * @example $this->Meta->setCanonicalVersion("https://example.com/", $this->getView());
         * @example $this->Meta->setCanonicalVersion("https://www.example.com/", $this->getView());
         * @example $this->Meta->setCanonicalVersion(parent::baseUrl(), $this->getView());
         */
    }

    /**
     * {@inheritdoc}
     */
    protected function onFinish(array $info): void {}

    /**
     * {@inheritdoc}
     */
    protected function onContextInstalled(string $context): void {}

    /**
     * {@inheritdoc}
     */
    protected function onDestroy(): void
    {
        gc_collect_cycles();
    }
}
