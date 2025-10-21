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

/* themes/custom/core_innovations/templates/system/page.html.twig */
class __TwigTemplate_c1bac5e3a85519255b1116654f3f3945 extends Template
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
        // line 48
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 48) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 48))) {
            // line 49
            yield "  ";
            if ((($context["container"] ?? null) == "container")) {
                // line 50
                yield "    ";
                $context["header_gutter"] = "gx-sm-4";
                // line 51
                yield "  ";
            } elseif ((($context["container"] ?? null) == "container-sm")) {
                // line 52
                yield "    ";
                $context["header_gutter"] = "gx-sm-4";
                // line 53
                yield "  ";
            } elseif ((($context["container"] ?? null) == "container-md")) {
                // line 54
                yield "    ";
                $context["header_gutter"] = "gx-md-4";
                // line 55
                yield "  ";
            } elseif ((($context["container"] ?? null) == "container-lg")) {
                // line 56
                yield "    ";
                $context["header_gutter"] = "gx-lg-4";
                // line 57
                yield "  ";
            } elseif ((($context["container"] ?? null) == "container-xl")) {
                // line 58
                yield "    ";
                $context["header_gutter"] = "gx-xl-4";
                // line 59
                yield "  ";
            } elseif ((($context["container"] ?? null) == "container-xxl")) {
                // line 60
                yield "    ";
                $context["header_gutter"] = "gx-xxl-4";
                // line 61
                yield "  ";
            }
            // line 62
            yield "  <div class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true);
            yield " gx-0 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header_gutter"] ?? null), "html", null, true);
            yield "\">
    ";
            // line 63
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:navbar", ["navigation" => CoreExtension::getAttribute($this->env, $this->source,             // line 64
($context["page"] ?? null), "navigation", [], "any", false, false, true, 64), "navigation_collapsible" => CoreExtension::getAttribute($this->env, $this->source,             // line 65
($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 65), "variant" => "expand_lg", "placement" => "default", "toggle_action" => "collapse", "toggler_position" => "end"], false));
            // line 70
            yield "
  </div>
";
        }
        // line 73
        yield "
";
        // line 74
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 75
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:grid_row_1", ["container" => "container-fluid", "attributes" => ["class" => ["hero-banner"]], "col_xs" => 12, "col_attributes" => ["class" => ["mb-4", "pb-1"]], "col_1_content" => CoreExtension::getAttribute($this->env, $this->source,             // line 89
($context["page"] ?? null), "header", [], "any", false, false, true, 89)], false));
            // line 90
            yield "
";
        }
        // line 92
        yield "
";
        // line 93
        $context["main_content"] = [CoreExtension::getAttribute($this->env, $this->source,         // line 94
($context["page"] ?? null), "highlighted", [], "any", false, false, true, 94), CoreExtension::getAttribute($this->env, $this->source,         // line 95
($context["page"] ?? null), "help", [], "any", false, false, true, 95), ["#type" => "html_tag", "#tag" => "div", "#attributes" => ["id" => "main-content"]], CoreExtension::getAttribute($this->env, $this->source,         // line 103
($context["page"] ?? null), "content", [], "any", false, false, true, 103)];
        // line 105
        yield "
";
        // line 106
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 106) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 106))) {
            // line 107
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:grid_row_3", ["container" =>             // line 108
($context["container"] ?? null), "col_xs" => [12, 12, 12], "col_sm" => [3, 6, 3], "col_1_content" => CoreExtension::getAttribute($this->env, $this->source,             // line 111
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 111), "col_1_attributes" => ["role" => "complementary"], "col_2_content" =>             // line 115
($context["main_content"] ?? null), "col_2_attributes" => ["role" => "main"], "col_3_content" => CoreExtension::getAttribute($this->env, $this->source,             // line 119
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 119), "col_3_attributes" => ["role" => "complementary"]], false));
            // line 123
            yield "
";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 124
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 124) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 124))) {
            // line 125
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:grid_row_2", ["container" =>             // line 126
($context["container"] ?? null), "col_xs" => [12, 12], "col_sm" => [3, 9], "col_1_content" => CoreExtension::getAttribute($this->env, $this->source,             // line 129
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 129), "col_1_attributes" => ["role" => "complementary"], "col_2_content" =>             // line 133
($context["main_content"] ?? null), "col_2_attributes" => ["role" => "main"]], false));
            // line 137
            yield "
";
        } elseif (( !CoreExtension::getAttribute($this->env, $this->source,         // line 138
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 138) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 138))) {
            // line 139
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:grid_row_2", ["container" =>             // line 140
($context["container"] ?? null), "col_xs" => [12, 12], "col_sm" => [9, 3], "col_1_content" =>             // line 143
($context["main_content"] ?? null), "col_1_attributes" => ["role" => "main"], "col_2_content" => CoreExtension::getAttribute($this->env, $this->source,             // line 147
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 147), "col_2_attributes" => ["role" => "complementary"]], false));
            // line 151
            yield "
";
        } else {
            // line 153
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:grid_row_1", ["container" =>             // line 154
($context["container"] ?? null), "col_xs" => 12, "col_1_content" =>             // line 156
($context["main_content"] ?? null), "col_attributes" => ["role" => "main"]], false));
            // line 160
            yield "
";
        }
        // line 162
        yield "
";
        // line 163
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 163)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 164
            yield "  <footer class=\"border-top mt-3 pt-3 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true);
            yield "\" role=\"contentinfo\">
    ";
            // line 165
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 165), "html", null, true);
            yield "
  </footer>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "container"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/core_innovations/templates/system/page.html.twig";
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
        return array (  179 => 165,  174 => 164,  172 => 163,  169 => 162,  165 => 160,  163 => 156,  162 => 154,  160 => 153,  156 => 151,  154 => 147,  153 => 143,  152 => 140,  150 => 139,  148 => 138,  145 => 137,  143 => 133,  142 => 129,  141 => 126,  139 => 125,  137 => 124,  134 => 123,  132 => 119,  131 => 115,  130 => 111,  129 => 108,  127 => 107,  125 => 106,  122 => 105,  120 => 103,  119 => 95,  118 => 94,  117 => 93,  114 => 92,  110 => 90,  108 => 89,  106 => 75,  104 => 74,  101 => 73,  96 => 70,  94 => 65,  93 => 64,  92 => 63,  85 => 62,  82 => 61,  79 => 60,  76 => 59,  73 => 58,  70 => 57,  67 => 56,  64 => 55,  61 => 54,  58 => 53,  55 => 52,  52 => 51,  49 => 50,  46 => 49,  44 => 48,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/core_innovations/templates/system/page.html.twig", "/var/www/html/web/themes/custom/core_innovations/templates/system/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 48, "set" => 50];
        static $filters = ["escape" => 62];
        static $functions = ["include" => 63];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape'],
                ['include'],
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
