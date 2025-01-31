<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Visioniconic\Controllers;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    // Example Indonesia default method view
    public function index()
    {
        try {
            $data = [
                'title' => 'Vinexel™',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://visioniconic.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('indonesia.index', 'layouts.indonesia', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function tentang()
    {
        try {
            $data = [
                'title' => 'Tentang - Visioniconic',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://visioniconic.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('indonesia.about', 'layouts.indonesia', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    // Example English method view
    public function english()
    {
        try {
            $data = [
                'title' => 'Vinexe™',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://visioniconic.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('english.index', 'layouts.english', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function about()
    {
        try {
            $data = [
                'title' => 'About - Visioniconic',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://visioniconic.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('english.about', 'layouts.english', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
