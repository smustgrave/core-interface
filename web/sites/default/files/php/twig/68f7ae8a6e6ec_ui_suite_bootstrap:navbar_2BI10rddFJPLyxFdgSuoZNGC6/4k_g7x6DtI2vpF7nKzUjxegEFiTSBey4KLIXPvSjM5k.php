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

/* ui_suite_bootstrap:navbar */
class __TwigTemplate_729d0b80b7dfc2e93d3bedf0fae27cd0 extends Template
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
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\ui_patterns\Template\TwigExtension']->normalizeProps($context, "ui_suite_bootstrap:navbar"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.ui_suite_bootstrap--navbar"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "ui_suite_bootstrap:navbar"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "ui_suite_bootstrap:navbar"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\ui_patterns\Template\TwigExtension']->preprocessProps($context, "ui_suite_bootstrap:navbar"));
        if ((($context["variant"] ?? null) && (($context["variant"] ?? null) != "default"))) {
            // line 2
            yield "  ";
            $context["variants"] = Twig\Extension\CoreExtension::map($this->env, Twig\Extension\CoreExtension::split($this->env->getCharset(), ($context["variant"] ?? null), "__"), function ($__v__) use ($context, $macros) { $context["v"] = $__v__; return Twig\Extension\CoreExtension::replace(Twig\Extension\CoreExtension::replace(($context["v"] ?? null), [($context["v"] ?? null) => ("navbar-" . ($context["v"] ?? null))]), ["_" => "-"]); });
            // line 3
            yield "  ";
            $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["variants"] ?? null)], "method", false, false, true, 3);
        }
        // line 5
        yield "
";
        // line 6
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["navbar"], "method", false, false, true, 6);
        // line 7
        $context["attributes"] = ((CoreExtension::inFilter("dark", ($context["variant"] ?? null))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", ["data-bs-theme", "dark"], "method", false, false, true, 7)) : (($context["attributes"] ?? null)));
        // line 8
        yield "
";
        // line 9
        $context["navbar_id"] = ((array_key_exists("navbar_id", $context)) ? (Twig\Extension\CoreExtension::default(($context["navbar_id"] ?? null), ("navbar-" . Twig\Extension\CoreExtension::random($this->env->getCharset())))) : (("navbar-" . Twig\Extension\CoreExtension::random($this->env->getCharset()))));
        // line 10
        $context["placement"] = ((array_key_exists("placement", $context)) ? (Twig\Extension\CoreExtension::default(($context["placement"] ?? null), "default")) : ("default"));
        // line 11
        $context["toggler_position"] = ((array_key_exists("toggler_position", $context)) ? (Twig\Extension\CoreExtension::default(($context["toggler_position"] ?? null), "start")) : ("start"));
        // line 12
        $context["toggle_action"] = ((array_key_exists("toggle_action", $context)) ? (Twig\Extension\CoreExtension::default(($context["toggle_action"] ?? null), "collapse")) : ("collapse"));
        // line 13
        $context["offcanvas_position"] = ((array_key_exists("offcanvas_position", $context)) ? (Twig\Extension\CoreExtension::default(($context["offcanvas_position"] ?? null), "end")) : ("end"));
        // line 14
        $context["attributes"] = (((($context["placement"] ?? null) != "default")) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["placement"] ?? null)], "method", false, false, true, 14)) : (($context["attributes"] ?? null)));
        // line 15
        yield "
";
        // line 16
        $context["toggler"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 17
            yield "  <button class=\"navbar-toggler\"
          type=\"button\"
          data-bs-toggle=\"";
            // line 19
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["toggle_action"] ?? null), "html", null, true);
            yield "\"
          data-bs-target=\"#";
            // line 20
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navbar_id"] ?? null), "html", null, true);
            yield "\"
          aria-controls=\"";
            // line 21
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navbar_id"] ?? null), "html", null, true);
            yield "\"
          aria-expanded=\"false\"
          aria-label=\"";
            // line 23
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle navigation"));
            yield "\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 27
        yield "
<nav";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
        yield ">
  <div class=\"container-fluid\">
    ";
        // line 30
        if ((($context["toggler_position"] ?? null) == "start")) {
            // line 31
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["toggler"] ?? null), "html", null, true);
            yield "
    ";
        }
        // line 33
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\ui_patterns\Template\TwigExtension']->addClass(($context["brand"] ?? null), "navbar-brand"), "html", null, true);
        yield "
    ";
        // line 34
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navigation"] ?? null), "html", null, true);
        yield "
    ";
        // line 35
        if ((($context["toggler_position"] ?? null) == "end")) {
            // line 36
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["toggler"] ?? null), "html", null, true);
            yield "
    ";
        }
        // line 38
        yield "
    ";
        // line 39
        if ((($tmp = ($context["navigation_collapsible"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "      ";
            if ((($context["toggle_action"] ?? null) == "offcanvas")) {
                // line 41
                yield "        ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:offcanvas", ["title" => ((                // line 42
array_key_exists("offcanvas_label", $context)) ? (Twig\Extension\CoreExtension::default(($context["offcanvas_label"] ?? null), t("Navigation"))) : (t("Navigation"))), "body" =>                 // line 43
($context["navigation_collapsible"] ?? null), "variant" =>                 // line 44
($context["offcanvas_position"] ?? null), "offcanvas_id" =>                 // line 45
($context["navbar_id"] ?? null)], false));
                // line 46
                yield "
      ";
            } else {
                // line 48
                yield "        <div class=\"collapse navbar-collapse\" id=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navbar_id"] ?? null), "html", null, true);
                yield "\">
          ";
                // line 49
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navigation_collapsible"] ?? null), "html", null, true);
                yield "
        </div>
      ";
            }
            // line 52
            yield "    ";
        }
        // line 53
        yield "  </div>
</nav>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["variant", "v", "brand", "navigation", "navigation_collapsible", "offcanvas_label"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "ui_suite_bootstrap:navbar";
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
        return array (  176 => 53,  173 => 52,  167 => 49,  162 => 48,  158 => 46,  156 => 45,  155 => 44,  154 => 43,  153 => 42,  151 => 41,  148 => 40,  146 => 39,  143 => 38,  137 => 36,  135 => 35,  131 => 34,  126 => 33,  120 => 31,  118 => 30,  113 => 28,  110 => 27,  102 => 23,  97 => 21,  93 => 20,  89 => 19,  85 => 17,  83 => 16,  80 => 15,  78 => 14,  76 => 13,  74 => 12,  72 => 11,  70 => 10,  68 => 9,  65 => 8,  63 => 7,  61 => 6,  58 => 5,  54 => 3,  51 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "ui_suite_bootstrap:navbar", "themes/contrib/ui_suite_bootstrap/components/navbar/navbar.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1, "set" => 2];
        static $filters = ["map" => 2, "split" => 2, "replace" => 2, "default" => 9, "escape" => 19, "t" => 23, "add_class" => 33];
        static $functions = ["random" => 9, "include" => 41];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['map', 'split', 'replace', 'default', 'escape', 't', 'add_class'],
                ['random', 'include'],
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
