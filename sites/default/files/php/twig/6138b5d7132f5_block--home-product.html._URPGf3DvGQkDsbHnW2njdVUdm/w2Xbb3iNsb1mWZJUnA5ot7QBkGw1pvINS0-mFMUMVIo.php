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

/* themes/veedol/templates/block/block--home-product.html.twig */
class __TwigTemplate_77eee834c222fb902d0a438c934b026e64c430cfc1c0d9cbf04d25704165f689 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 7];
        $filters = ["escape" => 10];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
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
        echo "<div class=\"swiper-container\">
  <div class=\"heading-wrapper no-underline\">
    <h2 class=\"heading\">Product Categories</h2>
    <div class=\"swiper-pagination\"></div>
  </div>
  <div class=\"swiper-wrapper\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["elements"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 8
            echo "      <div class=\"swiper-slide\">
        <div class=\"img-wrapper\">
          <img class=\"w-100\" src=\"";
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["category"], "image", [])), "html", null, true);
            echo "\" />
        </div>
        <div class=\"details\">
          <h3 class=\"title\">";
            // line 13
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["category"], "name", [])), "html", null, true);
            echo "</h3>
          <a href=\"";
            // line 14
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["category"], "link", [])), "html", null, true);
            echo "\" class=\"btn btn-outline btn-white\">Explore</a>
        </div>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "  </div>
  <div class=\"swiper-button-next\">
    <i class=\"iconx-arrow\"></i>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/block/block--home-product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 18,  81 => 14,  77 => 13,  71 => 10,  67 => 8,  63 => 7,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"swiper-container\">
  <div class=\"heading-wrapper no-underline\">
    <h2 class=\"heading\">Product Categories</h2>
    <div class=\"swiper-pagination\"></div>
  </div>
  <div class=\"swiper-wrapper\">
    {% for category in elements['#data_obj'] %}
      <div class=\"swiper-slide\">
        <div class=\"img-wrapper\">
          <img class=\"w-100\" src=\"{{ category.image }}\" />
        </div>
        <div class=\"details\">
          <h3 class=\"title\">{{ category.name }}</h3>
          <a href=\"{{ category.link }}\" class=\"btn btn-outline btn-white\">Explore</a>
        </div>
      </div>
    {% endfor %}
  </div>
  <div class=\"swiper-button-next\">
    <i class=\"iconx-arrow\"></i>
  </div>
</div>
", "themes/veedol/templates/block/block--home-product.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\block\\block--home-product.html.twig");
    }
}
