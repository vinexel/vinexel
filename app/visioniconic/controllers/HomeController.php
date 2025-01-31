<?php

namespace Visioniconic\Controllers;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try {
            $data = [
                'title' => 'Vinexe™',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://visioniconic.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('indonesia.index', 'layouts.indonesia', $data);
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
            $this->render('indonesia.about', 'layouts.indonesia', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
