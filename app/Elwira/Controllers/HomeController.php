<?php

namespace Elwira\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        try {
            $data = $this->getData('Home', [
                'title' => 'Vinexel Framework',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
                'versioning' => 'Version ' . VINEXEL_VERSION . ' is now release ✈️',
            ]);
            $this->render('pages.landing.index', 'layouts.landing', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function career()
    {
        try {
            $data = $this->getData('Career', [
                'title' => 'Career',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
                'versioning' => 'Version ' . VINEXEL_VERSION . ' is now release ✈️',
            ]);
            $this->render('pages.landing.career', 'layouts.landing', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function envatoVersionFeature()
    {
        try {
            $data = $this->getData('Envato Version', [
                'title' => 'Envato Version Features',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
                'versioning' => 'Version ' . VINEXEL_VERSION . ' is now release ✈️',
            ]);
            $this->render('pages.landing.features.envato.index', 'layouts.landing', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function mitVersionFeature()
    {
        try {
            $data = $this->getdata('MIT Version', [
                'title' => 'MIT Version Features',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
                'versioning' => 'Version ' . VINEXEL_VERSION . ' is now release ✈️',
            ]);
            $this->render('pages.landing.features.mit.index', 'layouts.landing', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function documentation()
    {
        try {
            $data = $this->getData('Documentation', [
                'title' => 'Documentation - Get Started',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ]);
            $this->render('pages.landing.documentation.mit.getting-started', 'layouts.mit', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function documentationInstallation()
    {
        try {
            $data = $this->getData('Installation', [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ]);
            $this->render('pages.landing.documentation.mit.installation', 'layouts.mit', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function envato()
    {
        try {
            $data = $this->getData('Envato', [
                'title' => 'Envato Documentation - Get Started',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ]);
            $this->render('pages.landing.documentation.envato.getting-started', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function envatoDocumentationInstallation()
    {
        try {
            $data = $this->getData('Envato Installation', [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ]);
            $this->render('pages.landing.documentation.envato.installation', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function envatoDocumentationIntegrateFreshProject()
    {
        try {
            $data = $this->getData('Envato Fresh Project', [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ]);
            $this->render('pages.landing.documentation.envato.integrate-fresh-project', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function envatoDocumentationMigrateExistingProject()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.migrate-existing-project', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function envatoDocumentationVendorFolderInProject()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.vendor-folder-in-project', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
    public function envatoDocumentationInternalRouting()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.internal-routing', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
    public function envatoDocumentationExternalRouting()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.external-routing', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
    public function envatoDocumentationEdge()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.edge', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
    public function envatoDocumentationElevate()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.elevate', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
    public function envatoDocumentationExclusive()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.exclusive', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
    public function envatoDocumentationEnterprise()
    {
        try {
            $data = [
                'title' => 'Documentation - Installation &amp; Setup',
                'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
                'author' => 'https://vinexel.com',
                'description' => 'Technology and Corporate',
            ];
            $this->render('pages.landing.documentation.envato.enterprise', 'layouts.envato', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}
