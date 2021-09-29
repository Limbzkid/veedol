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

/* themes/veedol/templates/page--search.html.twig */
class __TwigTemplate_dcb64d61fb294a7f0952a63279fe1e22d639ebb85bd08e5629f8f7c422bb75d4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 20];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
        echo "<section class=\"search-page-wrapper bg-light\">
  <div class=\"container container-narrow\">
    <div class=\"row\">
      <div class=\"col-12 mt-5\">
        <div class=\"heading-wrapper\">
          <ul class=\"breadcrumb justify-content-end\">
            <li>
              <div class=\"title\">
                  <a href=\"#\">Home</a>
              </div>
            </li>
            <li><span class=\"current\">Search</span></li>
          </ul>

            <h1 class=\"page-heading\">Search Results</h1>
        </div>
      </div>
      <div class=\"col-12\">
        <div class=\"search-results-wrapper\">
            ";
        // line 20
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
        </div>
      </div>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/page--search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 20,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"search-page-wrapper bg-light\">
  <div class=\"container container-narrow\">
    <div class=\"row\">
      <div class=\"col-12 mt-5\">
        <div class=\"heading-wrapper\">
          <ul class=\"breadcrumb justify-content-end\">
            <li>
              <div class=\"title\">
                  <a href=\"#\">Home</a>
              </div>
            </li>
            <li><span class=\"current\">Search</span></li>
          </ul>

            <h1 class=\"page-heading\">Search Results</h1>
        </div>
      </div>
      <div class=\"col-12\">
        <div class=\"search-results-wrapper\">
            {{ page.content }}
        </div>
      </div>
    </div>
  </div>
</section>
", "themes/veedol/templates/page--search.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\page--search.html.twig");
    }
}
