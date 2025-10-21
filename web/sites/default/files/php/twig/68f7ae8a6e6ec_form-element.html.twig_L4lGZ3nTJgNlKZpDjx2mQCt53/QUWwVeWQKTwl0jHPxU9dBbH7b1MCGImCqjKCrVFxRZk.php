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

/* themes/contrib/ui_suite_bootstrap/templates/input/form-element.html.twig */
class __TwigTemplate_d0d57196337a7ecd6c54fdce1ea53a67 extends Template
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
        // line 51
        $context["classes"] = ["form-item", "js-form-item", ("form-type-" . \Drupal\Component\Utility\Html::getClass(        // line 54
($context["type"] ?? null))), ("js-form-type-" . \Drupal\Component\Utility\Html::getClass(        // line 55
($context["type"] ?? null))), ("form-item-" . \Drupal\Component\Utility\Html::getClass(        // line 56
($context["name"] ?? null))), ("js-form-item-" . \Drupal\Component\Utility\Html::getClass(        // line 57
($context["name"] ?? null))), ((!CoreExtension::inFilter(        // line 58
($context["title_display"] ?? null), ["after", "before", "inline"])) ? ("form-no-label") : ("")), (((        // line 59
($context["disabled"] ?? null) == "disabled")) ? ("form-disabled") : ("")), (((($tmp =         // line 60
($context["errors"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("form-item--error") : (""))];
        // line 64
        $context["description_classes"] = ["description", "form-text", (((        // line 67
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 70
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 70), "html", null, true);
        yield ">
  ";
        // line 71
        if (CoreExtension::inFilter(($context["label_display"] ?? null), ["before", "invisible", "inline"])) {
            // line 72
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "
  ";
        }
        // line 74
        yield "
  ";
        // line 75
        if ((($tmp = ($context["inner_wrapper"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 76
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["inner_wrapper_attributes"] ?? null), "html", null, true);
            yield ">
  ";
        }
        // line 78
        yield "
  ";
        // line 79
        if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 79))) {
            // line 80
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 80), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 80), "html", null, true);
            yield ">
      ";
            // line 81
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 81), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 84
        yield "
  ";
        // line 85
        if ((($tmp = ($context["prefix"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 86
            yield "    <span class=\"field-prefix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["prefix"] ?? null), "html", null, true);
            yield "</span>
  ";
        }
        // line 88
        yield "
  ";
        // line 89
        if ((($tmp = ($context["input_group"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 90
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["input_group_attributes"] ?? null), "html", null, true);
            yield ">
  ";
        }
        // line 92
        yield "
  ";
        // line 93
        if ((($tmp = ($context["input_group_before"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 94
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["input_group_before"] ?? null), "html", null, true);
            yield "
  ";
        }
        // line 96
        yield "
  ";
        // line 97
        if ((($context["label_display"] ?? null) == "floating")) {
            // line 98
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["floating_label_attributes"] ?? null), "html", null, true);
            yield ">
  ";
        }
        // line 100
        yield "
  ";
        // line 101
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true);
        yield "

  ";
        // line 103
        if ((($context["label_display"] ?? null) == "floating")) {
            // line 104
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 107
        yield "
  ";
        // line 108
        if ((($tmp = ($context["input_group_after"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 109
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["input_group_after"] ?? null), "html", null, true);
            yield "
  ";
        }
        // line 111
        yield "
  ";
        // line 112
        if ((($tmp = ($context["input_group"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 113
            yield "    ";
            if ((($tmp = ($context["errors"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 114
                yield "      <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors_attributes"] ?? null), "html", null, true);
                yield ">
        ";
                // line 115
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors"] ?? null), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 118
            yield "    </div>
  ";
        }
        // line 120
        yield "
  ";
        // line 121
        if ((($tmp = ($context["suffix"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 122
            yield "    <span class=\"field-suffix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["suffix"] ?? null), "html", null, true);
            yield "</span>
  ";
        }
        // line 124
        yield "
  ";
        // line 125
        if ((($context["label_display"] ?? null) == "after")) {
            // line 126
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "
  ";
        }
        // line 128
        yield "
  ";
        // line 129
        if (( !($context["input_group"] ?? null) && ($context["errors"] ?? null))) {
            // line 130
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors_attributes"] ?? null), "html", null, true);
            yield ">
      ";
            // line 131
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors"] ?? null), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 134
        yield "
  ";
        // line 135
        if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 135))) {
            // line 136
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 136), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 136), "html", null, true);
            yield ">
      ";
            // line 137
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 137), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 140
        yield "
  ";
        // line 141
        if ((($tmp = ($context["inner_wrapper"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 142
            yield "    </div>
  ";
        }
        // line 144
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["type", "name", "title_display", "disabled", "errors", "description_display", "attributes", "label_display", "label", "inner_wrapper", "inner_wrapper_attributes", "description", "prefix", "input_group", "input_group_attributes", "input_group_before", "floating_label_attributes", "children", "input_group_after", "errors_attributes", "suffix"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/ui_suite_bootstrap/templates/input/form-element.html.twig";
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
        return array (  254 => 144,  250 => 142,  248 => 141,  245 => 140,  239 => 137,  234 => 136,  232 => 135,  229 => 134,  223 => 131,  218 => 130,  216 => 129,  213 => 128,  207 => 126,  205 => 125,  202 => 124,  196 => 122,  194 => 121,  191 => 120,  187 => 118,  181 => 115,  176 => 114,  173 => 113,  171 => 112,  168 => 111,  162 => 109,  160 => 108,  157 => 107,  150 => 104,  148 => 103,  143 => 101,  140 => 100,  134 => 98,  132 => 97,  129 => 96,  123 => 94,  121 => 93,  118 => 92,  112 => 90,  110 => 89,  107 => 88,  101 => 86,  99 => 85,  96 => 84,  90 => 81,  85 => 80,  83 => 79,  80 => 78,  74 => 76,  72 => 75,  69 => 74,  63 => 72,  61 => 71,  56 => 70,  54 => 67,  53 => 64,  51 => 60,  50 => 59,  49 => 58,  48 => 57,  47 => 56,  46 => 55,  45 => 54,  44 => 51,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/ui_suite_bootstrap/templates/input/form-element.html.twig", "/var/www/html/web/themes/contrib/ui_suite_bootstrap/templates/input/form-element.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 51, "if" => 71];
        static $filters = ["clean_class" => 54, "escape" => 70];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
