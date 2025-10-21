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

/* themes/contrib/ui_suite_bootstrap/templates/system/field.html.twig */
class __TwigTemplate_ffb0a5c73a661020cfb4eb1d742baf80 extends Template
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
        // line 41
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("ui_suite_bootstrap/field"), "html", null, true);
        // line 43
        if ((($tmp = ($context["display_field_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "
  <";
            // line 44
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("field_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_tag"] ?? null), "div")) : ("div")), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 44), "html", null, true);
            yield ">";
        }
        // line 46
        if ((($tmp =  !($context["label_hidden"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 47
            yield "    ";
            if ((($tmp = ($context["display_label_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 48
                $context["title_classes"] = ["field--label", ("field--label--" . \Drupal\Component\Utility\Html::getClass(                // line 50
($context["label_display"] ?? null))), (((                // line 51
($context["label_display"] ?? null) == "visually_hidden")) ? ("visually-hidden") : (""))];
                // line 53
                yield "      <";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("label_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["label_tag"] ?? null), "div")) : ("div")), "html", null, true);
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [($context["title_classes"] ?? null)], "method", false, false, true, 53), "html", null, true);
                yield ">";
            }
            // line 55
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            // line 56
            if ((($tmp = ($context["display_label_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 57
                yield "</";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("label_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["label_tag"] ?? null), "div")) : ("div")), "html", null, true);
                yield ">";
            }
        }
        // line 60
        if ((($tmp = ($context["display_items_wrapper_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "
  ";
            // line 61
            $context["field_items_wrapper_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(((array_key_exists("field_items_wrapper_attributes", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_items_wrapper_attributes"] ?? null), [])) : ([])));
            // line 62
            yield "  ";
            $context["field_items_wrapper_classes"] = ["field--items"];
            // line 65
            yield "  <";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("field_items_wrapper_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_items_wrapper_tag"] ?? null), "div")) : ("div")), "html", null, true);
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["field_items_wrapper_attributes"] ?? null), "addClass", [($context["field_items_wrapper_classes"] ?? null)], "method", false, false, true, 65), "html", null, true);
            yield ">";
        }
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 68
            if ((($tmp = ($context["display_item_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "
    <";
                // line 69
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("field_item_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_item_tag"] ?? null), "div")) : ("div")), "html", null, true);
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 69), "addClass", ["field--item"], "method", false, false, true, 69), "html", null, true);
                yield ">";
            }
            // line 71
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 71), "html", null, true);
            // line 72
            if ((($tmp = ($context["display_item_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 73
                yield "</";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("field_item_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_item_tag"] ?? null), "div")) : ("div")), "html", null, true);
                yield ">";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        if ((($tmp = ($context["display_items_wrapper_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "
  </";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("field_items_wrapper_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_items_wrapper_tag"] ?? null), "div")) : ("div")), "html", null, true);
            yield ">";
        }
        // line 79
        if ((($tmp = ($context["display_field_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "
  </";
            // line 80
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("field_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["field_tag"] ?? null), "div")) : ("div")), "html", null, true);
            yield ">";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["display_field_tag", "field_tag", "attributes", "classes", "label_hidden", "display_label_tag", "label_display", "label_tag", "title_attributes", "label", "display_items_wrapper_tag", "field_items_wrapper_tag", "items", "display_item_tag", "field_item_tag"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/ui_suite_bootstrap/templates/system/field.html.twig";
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
        return array (  133 => 80,  129 => 79,  125 => 77,  121 => 76,  112 => 73,  110 => 72,  108 => 71,  103 => 69,  99 => 68,  95 => 67,  89 => 65,  86 => 62,  84 => 61,  80 => 60,  74 => 57,  72 => 56,  70 => 55,  64 => 53,  62 => 51,  61 => 50,  60 => 48,  57 => 47,  55 => 46,  50 => 44,  46 => 43,  44 => 41,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/ui_suite_bootstrap/templates/system/field.html.twig", "/var/www/html/web/themes/contrib/ui_suite_bootstrap/templates/system/field.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 43, "set" => 48, "for" => 67];
        static $filters = ["escape" => 41, "default" => 44, "clean_class" => 50];
        static $functions = ["attach_library" => 41, "create_attribute" => 61];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'default', 'clean_class'],
                ['attach_library', 'create_attribute'],
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
