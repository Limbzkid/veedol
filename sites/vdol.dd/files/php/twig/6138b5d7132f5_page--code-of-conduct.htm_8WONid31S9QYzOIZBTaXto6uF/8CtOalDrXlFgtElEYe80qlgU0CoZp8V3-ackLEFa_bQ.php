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

/* themes/veedol/templates/page--code-of-conduct.html.twig */
class __TwigTemplate_7b63b68ca39716144f3eb31821ae2c996fac44747824ca7a188164305d304e2c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 13, "for" => 14];
        $filters = ["escape" => 5, "raw" => 11];
        $functions = ["file_url" => 15];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 'raw'],
                ['file_url']
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
        echo "<section class=\"bg-light\">
  <div class=\"content-wrapper px-0\">
    <div class=\"container container-narrow\">
      <div class=\"heading-wrapper\">
        ";
        // line 5
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "highlighted", [])), "html", null, true);
        echo "
        <h1 class=\"page-heading\">";
        // line 6
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "title", []), "value", [])), "html", null, true);
        echo "</h1>
      </div>

      <div class=\"row\">
        <div class=\"col-12\">
          ";
        // line 11
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "body", []), "value", [])));
        echo "
          <div>
          ";
        // line 13
        if ($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_multiple_file_upload", []), "target_id", [])) {
            // line 14
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["node"] ?? null), "field_multiple_file_upload", []));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 15
                echo "              <a href=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "uri", []), "value", []))]), "html", null, true);
                echo "\" target=\"_blank\" class=\"btn btn-link\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "description", [])), "html", null, true);
                echo "<i class=\"iconx-arrow-thin\"></i></a>
              <br>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "          ";
        }
        // line 19
        echo "          </div>
        </div>

        ";
        // line 22
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_block", []), 0, []), "entity", []), "field_title", []), "value", [])) {
            // line 23
            echo "          <div class=\"col-12\">
            <div class=\"accordion-container\">
              ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["node"] ?? null), "field_block", []));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 26
                echo "                <div class=\"accordion\">
                  <div class=\"accordion-head\">
                    <button>";
                // line 28
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_title", []), "value", [])), "html", null, true);
                echo "</button>
                  </div>
                  <div class=\"accordion-body\">
                    <p>";
                // line 31
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_description", []), "value", [])));
                echo "</p>
                  </div>
                </div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "            </div>
          </div>
        ";
        }
        // line 38
        echo "      </div>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/page--code-of-conduct.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 38,  135 => 35,  125 => 31,  119 => 28,  115 => 26,  111 => 25,  107 => 23,  105 => 22,  100 => 19,  97 => 18,  85 => 15,  80 => 14,  78 => 13,  73 => 11,  65 => 6,  61 => 5,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"bg-light\">
  <div class=\"content-wrapper px-0\">
    <div class=\"container container-narrow\">
      <div class=\"heading-wrapper\">
        {{ page.highlighted }}
        <h1 class=\"page-heading\">{{ node.title.value }}</h1>
      </div>

      <div class=\"row\">
        <div class=\"col-12\">
          {{ node.body.value | raw }}
          <div>
          {% if node.field_multiple_file_upload.target_id %}
            {% for item in  node.field_multiple_file_upload %}
              <a href=\"{{ file_url(item.entity.uri.value) }}\" target=\"_blank\" class=\"btn btn-link\">{{ item.description }}<i class=\"iconx-arrow-thin\"></i></a>
              <br>
            {% endfor %}
          {% endif %}
          </div>
        </div>

        {% if node.field_block.0.entity.field_title.value %}
          <div class=\"col-12\">
            <div class=\"accordion-container\">
              {% for item in node.field_block %}
                <div class=\"accordion\">
                  <div class=\"accordion-head\">
                    <button>{{ item.entity.field_title.value }}</button>
                  </div>
                  <div class=\"accordion-body\">
                    <p>{{ item.entity.field_description.value | raw }}</p>
                  </div>
                </div>
              {% endfor %}
            </div>
          </div>
        {% endif %}
      </div>
    </div>
  </div>
</section>
", "themes/veedol/templates/page--code-of-conduct.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\page--code-of-conduct.html.twig");
    }
}
