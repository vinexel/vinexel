<?php

namespace Dashkit\Controllers;

/**
 * HomeController
 *
 * Handles all public-facing routes for the Dashkit frontend, such as:
 * - Homepage
 * - About Us
 * - Contact Us
 * - Pricing
 *
 * Each page inherits base metadata and layout through BaseController.
 */

class HomeController extends BaseController
{
    public function index()
    {
        try {
            $data = $this->getData('Homepage | Dashkit', [
                'description' => 'Think different. Build the Vinexel way',
                'author' => 'Vinexel Pioneers',
            ]);
            $this->render('pages.frontend.index', 'layouts.frontend', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function aboutUs()
    {
        try {
            $data = $this->getData('About Us | Dashkit', [
                'description' => 'Think different. Build the Vinexel way',
                'author' => 'Vinexel Pioneers',
            ]);
            $this->render('pages.frontend.about', 'layouts.frontend', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function contactUs()
    {
        try {
            $data = $this->getData('Contact Us | Dashkit', [
                'description' => 'Think different. Build the Vinexel way',
                'author' => 'Vinexel Pioneers',
            ]);
            $this->render('pages.frontend.contact', 'layouts.frontend', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function pricing()
    {
        try {
            $data = $this->getData('Pricing | Dashkit', [
                'description' => 'Think different. Build the Vinexel way',
                'author' => 'Vinexel Pioneers',
            ]);
            $this->render('pages.frontend.pricing', 'layouts.frontend', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
