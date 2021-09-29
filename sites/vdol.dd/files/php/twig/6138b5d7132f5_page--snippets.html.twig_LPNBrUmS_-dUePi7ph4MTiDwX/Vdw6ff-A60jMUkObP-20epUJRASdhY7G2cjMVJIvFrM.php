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

/* themes/veedol/templates/page--snippets.html.twig */
class __TwigTemplate_8f3a2ca2a5d59e559b6d9be9a55b6583f1a0cd65e471d3c6cd4854e762f0271d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 5];
        $functions = ["drupal_block" => 12];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['drupal_block']
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
        echo "<section class=\"bg-light tabs-container tab-style-2\">
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
          <div class=\"info-box-list-wrapper m-0\">
            ";
        // line 12
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("snippets"), "html", null, true);
        echo "
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/page--snippets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 12,  65 => 6,  61 => 5,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"bg-light tabs-container tab-style-2\">
  <div class=\"content-wrapper px-0\">
    <div class=\"container container-narrow\">
      <div class=\"heading-wrapper\">
        {{ page.highlighted }}
        <h1 class=\"page-heading\">{{ node.title.value }}</h1>
      </div>

      <div class=\"row\">
        <div class=\"col-12\">
          <div class=\"info-box-list-wrapper m-0\">
            {{ drupal_block('snippets') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
", "themes/veedol/templates/page--snippets.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\page--snippets.html.twig");
    }
}
