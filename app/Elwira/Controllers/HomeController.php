<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Elwira\Controllers;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    // Example Indonesia default method view with method index exception
    public function index()
    {
        try {
            $data = [
                'title' => 'Vinexel™ | Indonesia',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'description' => 'Technology and Corporate',
                'vinexel_version' => 'Versi ' . VINEXEL_VERSION,
            ];
            $this->render('indonesia.index', 'layouts.indonesia', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function tentang()
    {
        $data = [
            'title' => 'Tentang - Visioniconic',
            'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
            'description' => 'Technology and Corporate',
        ];
        $this->render('indonesia.tentang', 'layouts.indonesia', $data);
    }

    // Example English method view with method about exception
    public function english()
    {
        $data = [
            'title' => 'Vinexel™ | English',
            'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
            'description' => 'Technology and Corporate',
            'vinexel_version' => 'Version ' . VINEXEL_VERSION,
        ];
        $this->render('english.index', 'layouts.english', $data);
    }

    public function about()
    {
        try {
            $data = [
                'title' => 'About - Visioniconic',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'description' => 'Technology and Corporate',
            ];
            $this->render('english.about', 'layouts.english', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
