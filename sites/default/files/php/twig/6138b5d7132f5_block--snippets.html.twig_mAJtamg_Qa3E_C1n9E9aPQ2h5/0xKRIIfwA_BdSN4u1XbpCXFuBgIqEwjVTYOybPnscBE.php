<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/veedol/templates/block/block--snippets.html.twig */
class __TwigTemplate_cd84ad24f03cf3f51dbf386a8c218cfa01d778c012a9d90af60f6bf67d792605 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 1, "if" => 12];
        $filters = ["escape" => 2, "raw" => 10];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'raw'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

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

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["snippet"]) {
            // line 2
            echo "  <div class=\"info-box has-image\" id=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "id", [])), "html", null, true);
            echo "\">
    <div class=\"has-padding info-box-image\">
        <img src=\"";
            // line 4
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "image", [])), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "img_alt", [])), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "img_title", [])), "html", null, true);
            echo "\">
    </div>
    <div class=\"info-box-content\">
        <div class=\"sub-section-heading\">
            <h2 class=\"heading\">";
            // line 8
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "title", [])), "html", null, true);
            echo "</h2>
        </div>
        ";
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "desc", [])));
            echo "

        ";
            // line 12
            if ( !twig_test_empty($this->getAttribute($context["snippet"], "info", []))) {
                // line 13
                echo "          <p  class=\"mb-4\">Includes:</p>
          <ul>
            ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["snippet"], "info", []));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 16
                    echo "              <li>";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["item"]), "html", null, true);
                    echo "</li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 18
                echo "          </ul>
        ";
            }
            // line 20
            echo "        ";
            if ($this->getAttribute($context["snippet"], "link", [])) {
                // line 21
                echo "          <p class=\"d-inline-block mt-3\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "link_text", [])), "html", null, true);
                echo "<a href=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["snippet"], "link", [])), "html", null, true);
                echo "\"> click here</a></p>
        ";
            }
            // line 23
            echo "    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['snippet'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/block/block--snippets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 23,  112 => 21,  109 => 20,  105 => 18,  96 => 16,  92 => 15,  88 => 13,  86 => 12,  81 => 10,  76 => 8,  65 => 4,  59 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% for snippet in content['#data_obj'] %}
  <div class=\"info-box has-image\" id=\"{{ snippet.id }}\">
    <div class=\"has-padding info-box-image\">
        <img src=\"{{ snippet.image }}\" alt=\"{{ snippet.img_alt }}\" title=\"{{ snippet.img_title }}\">
    </div>
    <div class=\"info-box-content\">
        <div class=\"sub-section-heading\">
            <h2 class=\"heading\">{{ snippet.title }}</h2>
        </div>
        {{ snippet.desc | raw }}

        {% if snippet.info is not empty %}
          <p  class=\"mb-4\">Includes:</p>
          <ul>
            {% for item in snippet.info %}
              <li>{{ item }}</li>
            {% endfor %}
          </ul>
        {% endif %}
        {% if snippet.link %}
          <p class=\"d-inline-block mt-3\">{{ snippet.link_text }}<a href=\"{{ snippet.link }}\"> click here</a></p>
        {% endif %}
    </div>
  </div>
{% endfor %}
", "themes/veedol/templates/block/block--snippets.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\block\\block--snippets.html.twig");
    }
}
