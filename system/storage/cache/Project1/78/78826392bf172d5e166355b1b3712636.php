<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* layouts\indonesia.rapid.php */
class __TwigTemplate_a3ddadc28e30f01d3b517247caaa1061 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en-US\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["viewport"] ?? null), "html", null, true);
        yield "\">
    <title>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</title>
    <link rel=\"preload\" as=\"font\" href=\"https://fonts.gstatic.com/s/chakrapetch/v11/cIf6MapbsEk7TDLdtEz1BwkWn6pg.woff2\">
    <link rel=\"preload\" as=\"font\" href=\"https://fonts.gstatic.com/s/chakrapetch/v11/cIflMapbsEk7TDLdtEz1BwkeQI51R5_F.woff2\">
    <link rel=\"preload\" as=\"font\" href=\"https://fonts.gstatic.com/s/outfit/v11/QGYvz_MVcBeNP4NJtEtq.woff2\">
    <meta name=\"description\" content=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["description"] ?? null), "html", null, true);
        yield "\">
    <link rel=\"canonical\" href=\"https://exacoat.com/\">

    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com/\">
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com/\">

    <link rel=\"stylesheet\" href=\"/static/vinexel/css/bootstrap.min.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/static/vinexel/css/frontend.min_1.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/static/vinexel/css/pix-essentials-style-2.css\" type=\"text/css\">

    <link rel=\"icon\" href=\"/static/vinexel/images/favicon.png\" sizes=\"32x32\">
    <link rel=\"icon\" href=\"/static/vinexel/images/favicon.png\" sizes=\"192x192\">
    <link rel=\"apple-touch-icon\" href=\"/static/vinexel/images/favicon.png\">

</head>

<body class=\"home vin__frontend-default vin__frontend-kit-440982 vin__frontend-page\">

    <div class=\"pix-page-loading-bg\"></div>
    <div id=\"page\" class=\"site\">
        <div class=\"pix-header-boxed pix-is-sticky-header position-relative\">
            <div class=\"position-absolute w-100 \">
                <div class=\"pix-topbar position-relative pix-header-desktop pix-topbar-normal  bg-black  text-white sticky-top2 p-sticky\" style=\"z-index:999998;\">
                    <div class=\"container-xl\">
                        <div class=\"row d-flex align-items-center align-items-stretch\">
                            <div class=\"col-12 col-lg-12 column pix-header-min-height  py-md-0 d-flex align-items-center\">
                                <div class=\"d-inline-flex align-items-center line-height-1 pix-py-5 pix-hover-item mb-0\">
                                    <a class=\"text-gray-2 secondary-font animate-in btn btn-link p-0 line-height-1 pix-header-text text-sm  d-inline-flex align-items-center\" href=\"\">Enjoy coding with no hassle your skills ✈️. Vinexe come with hybrid fullstack web application framework.
                                    </a>
                                </div>
                            </div>
                            <div class=\"col-12 col-lg-6 column text-left justify-content-start  py-md-0 d-flex align-items-center justify-content-end\"></div>
                        </div>
                    </div>
                </div>
                <div class=\"pix-header-placeholder position-relative d-block w-100\">
                    <header class=\"pix-header  is-smart-sticky pix-header-desktop d-block2 pix-header-normal2 pix-scroll-shadow sticky-top2 position-relative pix-header-box \" data-text=\"body-default\" data-text-scroll=\"light-opacity-7\">
                        <div class=\"container-xl\">
                            <div class=\"pix-header-box-part  pix-main-part pix-header-container-area bg-transparent  rounded-xl rounded-xl\" data-bg-class=\"bg-transparent\" data-scroll-class=\"bg-dark-blur\">
                                <nav class=\"navbar pix-main-menu navbar-hover-drop navbar-expand-lg navbar-light d-flex justify-content-between\">
                                    <div class=\" d-flex align-items-center\">
                                        <div class=\"d-inline-block\">
                                            <a class=\"navbar-brand\" href=\"/\" target=\"\" rel=\"home\">
                                                <img class=\"pix-logo\" height=\"30\" width=\"250\" src=\"/static/vinexel/images/iconic-group-logo.png\" alt=\"iconic group logo\" style=\"height:30px;width:auto;\">
                                                <img class=\"pix-logo-scroll\" src=\"/static/vinexel/images/iconic-group-logo.png\" alt=\"exacoat™\" style=\"height:30px;width:auto;\">
                                            </a>
                                        </div>
                                    </div>
                                    <div class=\"collapse navbar-collapse align-self-stretch   justify-content-end pix-is-dark \">
                                        <ul class=\"navbar-nav nav-style-megamenu align-self-stretch align-items-center \">
                                            <div class=\"d-inline-flex pix-px-5 align-self-stretch position-relative mx-2\">
                                                <div class=\"bg-light-opacity-1 pix-header-divider   pix-sm\"></div>
                                            </div>
                                            <li class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-479673 nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center\">
                                                <a title=\"Co-Lab\" class=\" font-weight-bold secondary-font pix-nav-link text-body-default dropdown-toggle nav-link animate-in\" target=\"_self\" href=\"https://exacoat.com/co-lab\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" data-anim-type=\"fade-in-up\">
                                                    <span class=\"pix-dropdown-title text-sm  pix-header-text\">
                                                        Documentation

                                                    </span>
                                                </a>
                                                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"menu-item-dropdown-479673\" role=\"navigation\">
                                                    <div class=\"submenu-box pix-default-menu bg-gray-9\">
                                                        <div class=\"container\">
                                                            <div class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-479674 nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center w-100\">
                                                                <a class=\" font-weight-bold secondary-font pix-nav-link  dropdown-item\" target=\"_self\" href=\"https://exacoat.com/co-lab/afmtz-x-exacoat\">
                                                                    <span class=\"pix-dropdown-title  text-body-default  font-weight-bold pix-dark\">For Developer</span>
                                                                </a>
                                                            </div>
                                                            <div class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-479675 nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center w-100\">
                                                                <a class=\" font-weight-bold secondary-font pix-nav-link  dropdown-item\" target=\"_self\" href=\"https://exacoat.com/co-lab/galaxy-s23-series-5g-x-exacoat\">
                                                                    <span class=\"pix-dropdown-title  text-body-default  font-weight-bold pix-dark\">For Contributor</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-441646 nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center\">
                                                <a class=\" font-weight-bold secondary-font pix-nav-link text-body-default nav-link animate-in\" target=\"_self\" href=\"tentang\" data-anim-type=\"fade-in-up\">
                                                    <span class=\"pix-dropdown-title text-sm  pix-header-text\">About</span>
                                                </a>
                                            </li>

                                            <li class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-441646 nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center\">
                                                <a class=\" font-weight-bold secondary-font pix-nav-link text-body-default nav-link animate-in\" target=\"_self\" href=\"en\" data-anim-type=\"fade-in-up\">
                                                    <span class=\"pix-dropdown-title text-sm  pix-header-text\">English</span>
                                                </a>
                                            </li>

                                            <li class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-441648 nav-item dropdown d-lg-flex nav-item-display align-self-stretch overflow-visible align-items-center\">
                                                <a class=\" font-weight-bold secondary-font pix-nav-link text-body-default nav-link animate-in\" target=\"_self\" href=\"malscan\" data-anim-type=\"fade-in-up\">
                                                    <span class=\"pix-dropdown-title text-sm  pix-header-text\">Log in</span>
                                                </a>
                                            </li>
                                            <div class=\"d-inline-flex pix-px-5 align-self-stretch position-relative mx-2\">
                                                <div class=\"bg-light-opacity-1 pix-header-divider   pix-sm\"></div>
                                            </div>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>
        <div class=\"pix-mobile-header-sticky w-100\"></div>
        <div id=\"content\" class=\"site-content bg-transparent pt-5\">
            <div id=\"primary\" class=\"content-area\">
                <main id=\"main\" class=\"site-main\">
                    ";
        // line 122
        yield ($context["content"] ?? null);
        yield "
                </main>
            </div>
        </div>
    </div>

    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Chakra+Petch:400,600|Outfit:400,600\" type=\"text/css\">
    <script type=\"text/javascript\" src=\"/static/vinexel/js/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"/static/vinexel/js/essentials-5.min.js\"></script>

</body>

</html>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts\\indonesia.rapid.php";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  174 => 122,  60 => 11,  53 => 7,  49 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "layouts\\indonesia.rapid.php", "C:\\xampp\\htdocs\\visioniconic-development\\vinexel-api\\app\\Project1\\Views\\layouts\\indonesia.rapid.php");
    }
}
