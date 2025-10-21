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

/* modules/contrib/captcha/templates/captcha.html.twig */
class __TwigTemplate_add7397c9e92a3702888743eecfffa73 extends Template
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
            'captcha' => [$this, 'block_captcha'],
            'captcha_display' => [$this, 'block_captcha_display'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "
";
        // line 21
        $context["classes"] = ["captcha", \Drupal\Component\Utility\Html::getClass(("captcha-type-challenge--" . (($_v0 =         // line 23
($context["element"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#captcha_type_challenge"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["element"] ?? null), "#captcha_type_challenge", [], "array", false, false, true, 23))))];
        // line 27
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 27), "setAttribute", ["data-nosnippet", true], "method", false, false, true, 27);
        // line 28
        yield "
";
        // line 29
        yield from $this->unwrap()->yieldBlock('captcha', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["element", "is_visible", "title", "description"]);        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_captcha(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 30
        yield "  ";
        if ((($tmp = ($context["is_visible"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 31
            yield "    ";
            yield from $this->unwrap()->yieldBlock('captcha_display', $context, $blocks);
            // line 52
            yield "  ";
        } else {
            // line 53
            yield "    ";
            // line 55
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["element"] ?? null), "html", null, true);
            yield "
  ";
        }
        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_captcha_display(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 32
        yield "      ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["title"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 33
            yield "        <fieldset ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
            yield ">
          <legend class=\"captcha__title js-form-required form-required\">
            ";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            yield "
          </legend>
        ";
        } else {
            // line 38
            yield "          <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
            yield ">
          ";
        }
        // line 40
        yield "          <div class=\"captcha__element\">
            ";
        // line 41
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["element"] ?? null), "html", null, true);
        yield "
          </div>
          ";
        // line 43
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["description"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 44
            yield "            <div class=\"captcha__description description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["description"] ?? null), "html", null, true);
            yield "</div>
          ";
        }
        // line 46
        yield "          ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["title"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 47
            yield "          </fieldset>
      ";
        } else {
            // line 49
            yield "        </div>
      ";
        }
        // line 51
        yield "    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/captcha/templates/captcha.html.twig";
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
        return array (  144 => 51,  140 => 49,  136 => 47,  133 => 46,  127 => 44,  125 => 43,  120 => 41,  117 => 40,  111 => 38,  105 => 35,  99 => 33,  96 => 32,  89 => 31,  80 => 55,  78 => 53,  75 => 52,  72 => 31,  69 => 30,  57 => 29,  54 => 28,  52 => 27,  50 => 23,  49 => 21,  46 => 19,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/captcha/templates/captcha.html.twig", "/var/www/html/web/modules/contrib/captcha/templates/captcha.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 21, "block" => 29, "if" => 30];
        static $filters = ["clean_class" => 23, "escape" => 55];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['clean_class', 'escape'],
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
