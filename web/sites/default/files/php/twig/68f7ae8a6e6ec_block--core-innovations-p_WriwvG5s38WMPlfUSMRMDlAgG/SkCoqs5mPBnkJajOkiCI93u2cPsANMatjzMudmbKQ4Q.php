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

/* themes/custom/core_innovations/templates/block/block--core-innovations-page-title.html.twig */
class __TwigTemplate_13f49085f4d0a5651cc3492b79d2a02d extends Template
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
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 48
        yield "
<div";
        // line 49
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [["px-4 py-5 d-flex justify-content-center align-items-center text-bg-primary"]], "method", false, false, true, 49), "html", null, true);
        yield "

  ";
        // line 51
        if ((($tmp = ($context["background_image_url"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 52
            yield "    ";
            $context["background_image_url"] = Drupal\twig_tweak\TwigTweakExtension::imageStyleFilter(($context["background_image_url"] ?? null), "wide");
            // line 53
            yield "    style=\"background: linear-gradient(rgba(0, 77, 109, 0.8), rgba(0, 77, 109, 0.8)), url('";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["background_image_url"] ?? null), "html", null, true);
            yield "') top/cover no-repeat; min-height: 525px;\"
  ";
        }
        // line 55
        yield ">

  ";
        // line 57
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 60
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "background_image_url", "content"]);        yield from [];
    }

    // line 57
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 58
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/core_innovations/templates/block/block--core-innovations-page-title.html.twig";
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
        return array (  84 => 58,  77 => 57,  70 => 60,  68 => 57,  64 => 55,  58 => 53,  55 => 52,  53 => 51,  48 => 49,  45 => 48,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/core_innovations/templates/block/block--core-innovations-page-title.html.twig", "/var/www/html/web/themes/custom/core_innovations/templates/block/block--core-innovations-page-title.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 51, "set" => 52, "block" => 57];
        static $filters = ["escape" => 49, "image_style" => 52];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'block'],
                ['escape', 'image_style'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
