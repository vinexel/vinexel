<?php

namespace Dashkit\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        try {
            $data = $this->getData('Homepage | Dashkit', [
                'description' => 'This site builth with powerfull Vinexel Framework.',
                'author' => 'Artisans Developer',
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
                'description' => 'This site builth with powerfull Vinexel Framework.',
                'author' => 'Artisans Developer',
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
                'description' => 'This site builth with powerfull Vinexel Framework.',
                'author' => 'Artisans Developer',
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
                'description' => 'This site builth with powerfull Vinexel Framework.',
                'author' => 'Artisans Developer',
            ]);
            $this->render('pages.frontend.pricing', 'layouts.frontend', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
