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

/* ui_suite_bootstrap:navbar_nav */
class __TwigTemplate_a0dfce82819bea34ea2ef5da2339e175 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\ui_patterns\Template\TwigExtension']->normalizeProps($context, "ui_suite_bootstrap:navbar_nav"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.ui_suite_bootstrap--navbar_nav"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "ui_suite_bootstrap:navbar_nav"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "ui_suite_bootstrap:navbar_nav"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\ui_patterns\Template\TwigExtension']->preprocessProps($context, "ui_suite_bootstrap:navbar_nav"));
        if ((($context["variant"] ?? null) && (($context["variant"] ?? null) != "default"))) {
            // line 2
            yield "  ";
            $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [("navbar-nav-" . ($context["variant"] ?? null))], "method", false, false, true, 2);
        }
        // line 4
        yield "
";
        // line 5
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["navbar-nav"], "method", false, false, true, 5);
        // line 6
        $context["list_opened"] = false;
        // line 7
        yield "
";
        // line 8
        if ((($tmp = ($context["items"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 10
                yield "    ";
                // line 14
                yield "    ";
                $context["item_is_link"] = false;
                // line 15
                yield "    ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 15) || CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 15))) {
                    // line 16
                    yield "      ";
                    $context["item_is_link"] = true;
                    // line 17
                    yield "    ";
                }
                // line 18
                yield "
    ";
                // line 19
                if ((($context["item_is_link"] ?? null) &&  !($context["list_opened"] ?? null))) {
                    // line 20
                    yield "      ";
                    $context["list_opened"] = true;
                    // line 21
                    yield "      <ul";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
                    yield ">
    ";
                } elseif (( !                // line 22
($context["item_is_link"] ?? null) && ($context["list_opened"] ?? null))) {
                    // line 23
                    yield "      ";
                    $context["list_opened"] = false;
                    // line 24
                    yield "      </ul>
    ";
                }
                // line 26
                yield "
    ";
                // line 27
                $context["item_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", true, true, true, 27)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 27), [])) : ([])));
                // line 28
                yield "    ";
                $context["link_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link_attributes", [], "any", true, true, true, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link_attributes", [], "any", false, false, true, 28), [])) : ([])));
                // line 29
                yield "    ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 30
                    yield "      ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::include($this->env, $context, "ui_suite_bootstrap:dropdown", ["title" => CoreExtension::getAttribute($this->env, $this->source,                     // line 31
$context["item"], "title", [], "any", false, false, true, 31), "attributes" => ["class" => ["nav-item"]], "variant" => "dropdown", "auto_close" => "true", "button_attributes" =>                     // line 37
($context["link_attributes"] ?? null), "content" => CoreExtension::getAttribute($this->env, $this->source,                     // line 38
$context["item"], "below", [], "any", false, false, true, 38), "dropdown_id" => ((((                    // line 39
array_key_exists("dropdown_id", $context)) ? (Twig\Extension\CoreExtension::default(($context["dropdown_id"] ?? null), ("dropdown-" . Twig\Extension\CoreExtension::random($this->env->getCharset())))) : (("dropdown-" . Twig\Extension\CoreExtension::random($this->env->getCharset())))) . "-") . CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 39)), "dropdown_navbar" => true], false));
                    // line 41
                    yield "
    ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 42
$context["item"], "url", [], "any", false, false, true, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 43
                    yield "      <li";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["item_attributes"] ?? null), "addClass", ["nav-item"], "method", false, false, true, 43), "html", null, true);
                    yield ">
        <a";
                    // line 44
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["link_attributes"] ?? null), "setAttribute", ["href", CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 44)], "method", false, false, true, 44), "addClass", ["nav-link"], "method", false, false, true, 44), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 44), "html", null, true);
                    yield "</a>
      </li>
    ";
                } else {
                    // line 47
                    yield "      <span";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["link_attributes"] ?? null), "addClass", ["navbar-text"], "method", false, false, true, 47), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 47), "html", null, true);
                    yield "</span>
    ";
                }
                // line 49
                yield "
    ";
                // line 50
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, true, 50) && ($context["list_opened"] ?? null))) {
                    // line 51
                    yield "      </ul>
    ";
                }
                // line 53
                yield "  ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["variant", "items", "dropdown_id", "loop"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "ui_suite_bootstrap:navbar_nav";
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
        return array (  174 => 53,  170 => 51,  168 => 50,  165 => 49,  157 => 47,  149 => 44,  144 => 43,  142 => 42,  139 => 41,  137 => 39,  136 => 38,  135 => 37,  134 => 31,  132 => 30,  129 => 29,  126 => 28,  124 => 27,  121 => 26,  117 => 24,  114 => 23,  112 => 22,  107 => 21,  104 => 20,  102 => 19,  99 => 18,  96 => 17,  93 => 16,  90 => 15,  87 => 14,  85 => 10,  67 => 9,  65 => 8,  62 => 7,  60 => 6,  58 => 5,  55 => 4,  51 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "ui_suite_bootstrap:navbar_nav", "themes/contrib/ui_suite_bootstrap/components/navbar_nav/navbar_nav.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1, "set" => 2, "for" => 9];
        static $filters = ["escape" => 21, "default" => 27];
        static $functions = ["create_attribute" => 27, "include" => 30, "random" => 39];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'default'],
                ['create_attribute', 'include', 'random'],
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
