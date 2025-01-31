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

/* layouts/indonesia.rapid.php */
class __TwigTemplate_a7f6a7aca35266ecd45f8fcab24f8425 extends Template
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
<html lang=\"id\">

<head>

    <title>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</title>

    <!-- Meta Tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["viewport"] ?? null), "html", null, true);
        yield "\">
    <meta name=\"author\" content=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["author"] ?? null), "html", null, true);
        yield "\">
    <meta name=\"description\" content=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["description"] ?? null), "html", null, true);
        yield "\">

    <!-- Favicon -->
    <link rel=\"shortcut icon\" href=\"/favicon.png\">
</head>

<body>

    <header>
        <ul>
            <li><a href=\"/\">Home</a></li>
            <li><a href=\"kontak\">Contact</a></li>
            <li><a href=\"malscan\">Malscan</a></li>
        </ul>
    </header>

    <main>
        ";
        // line 29
        yield ($context["content"] ?? null);
        yield " <!-- Konten dari view akan ditampilkan di sini -->
    </main>

    <footer>

    </footer>

</body>

</html>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/indonesia.rapid.php";
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
        return array (  84 => 29,  64 => 12,  60 => 11,  56 => 10,  49 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "layouts/indonesia.rapid.php", "C:\\xampp\\htdocs\\visionframework-3\\visioniconic-v5\\app\\visioniconic\\views\\layouts\\indonesia.rapid.php");
    }
}
