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

/* ui_suite_bootstrap:grid_row_1 */
class __TwigTemplate_34d69102bdd1e1430f6a3c877b44b304 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\ui_patterns\Template\TwigExtension']->normalizeProps($context, "ui_suite_bootstrap:grid_row_1"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.ui_suite_bootstrap--grid_row_1"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "ui_suite_bootstrap:grid_row_1"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "ui_suite_bootstrap:grid_row_1"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\ui_patterns\Template\TwigExtension']->preprocessProps($context, "ui_suite_bootstrap:grid_row_1"));
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [["row",         // line 3
($context["gutters"] ?? null),         // line 4
($context["gutters_horizontal"] ?? null),         // line 5
($context["gutters_vertical"] ?? null)]], "method", false, false, true, 1);
        // line 7
        yield "
";
        // line 8
        $context["col_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(((array_key_exists("col_attributes", $context)) ? (Twig\Extension\CoreExtension::default(($context["col_attributes"] ?? null), [])) : ([])));
        // line 9
        $context["col_attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["col_attributes"] ?? null), "addClass", [["col", (((($tmp =         // line 11
($context["col_xs"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("col-" . ($context["col_xs"] ?? null))) : ("")), (((($tmp =         // line 12
($context["col_sm"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("col-sm-" . ($context["col_sm"] ?? null))) : ("")), (((($tmp =         // line 13
($context["col_md"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("col-md-" . ($context["col_md"] ?? null))) : ("")), (((($tmp =         // line 14
($context["col_lg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("col-lg-" . ($context["col_lg"] ?? null))) : ("")), (((($tmp =         // line 15
($context["col_xl"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("col-xl-" . ($context["col_xl"] ?? null))) : ("")), (((($tmp =         // line 16
($context["col_xxl"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("col-xxl-" . ($context["col_xxl"] ?? null))) : ("")), (((($tmp =         // line 17
($context["col_offset"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("offset-" . ($context["col_offset"] ?? null))) : (""))]], "method", false, false, true, 9);
        // line 19
        yield "
";
        // line 20
        $context["col_1_content"] = (((($context["col_1_content"] ?? null) &&  !Twig\Extension\CoreExtension::testSequence(($context["col_1_content"] ?? null)))) ? ([($context["col_1_content"] ?? null)]) : (($context["col_1_content"] ?? null)));
        // line 21
        yield "
";
        // line 22
        if ((($tmp = ($context["container"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "  ";
            $context["container_wrapper_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(((array_key_exists("container_wrapper_attributes", $context)) ? (Twig\Extension\CoreExtension::default(($context["container_wrapper_attributes"] ?? null), [])) : ([])));
            // line 24
            yield "  ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["container_wrapper_attributes"] ?? null), "storage", [], "method", false, false, true, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 25
                yield "  <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["container_wrapper_attributes"] ?? null), "html", null, true);
                yield ">
  ";
            }
            // line 27
            yield "  ";
            $context["container_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(((array_key_exists("container_attributes", $context)) ? (Twig\Extension\CoreExtension::default(($context["container_attributes"] ?? null), [])) : ([])));
            // line 28
            yield "  <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["container_attributes"] ?? null), "addClass", [($context["container"] ?? null)], "method", false, false, true, 28), "html", null, true);
            yield ">
";
        }
        // line 30
        yield "
<div";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
        yield ">
  <div";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["col_attributes"] ?? null), "html", null, true);
        yield ">
    ";
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["col_1_content"] ?? null), "html", null, true);
        yield "
  </div>
</div>

";
        // line 37
        if ((($tmp = ($context["container"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "  </div>
    ";
            // line 39
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["container_wrapper_attributes"] ?? null), "storage", [], "method", false, false, true, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 40
                yield "  </div>
  ";
            }
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["gutters", "gutters_horizontal", "gutters_vertical", "col_xs", "col_sm", "col_md", "col_lg", "col_xl", "col_xxl", "col_offset", "container"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "ui_suite_bootstrap:grid_row_1";
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
        return array (  124 => 40,  122 => 39,  119 => 38,  117 => 37,  110 => 33,  106 => 32,  102 => 31,  99 => 30,  93 => 28,  90 => 27,  84 => 25,  81 => 24,  78 => 23,  76 => 22,  73 => 21,  71 => 20,  68 => 19,  66 => 17,  65 => 16,  64 => 15,  63 => 14,  62 => 13,  61 => 12,  60 => 11,  59 => 9,  57 => 8,  54 => 7,  52 => 5,  51 => 4,  50 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "ui_suite_bootstrap:grid_row_1", "themes/contrib/ui_suite_bootstrap/components/grid_row_1/grid_row_1.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 1, "if" => 22];
        static $filters = ["default" => 8, "escape" => 25];
        static $functions = ["create_attribute" => 8];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['default', 'escape'],
                ['create_attribute'],
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
