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

/* themes/veedol/templates/block/block--home-snippets.html.twig */
class __TwigTemplate_169dbaecb0fad9e583bf90bb3ad267912c2ecc975bc3a531613b92bbb2385269 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 4];
        $filters = ["escape" => 8, "raw" => 10];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
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
        echo "<div id=\"collapse-1\" class=\"tab-body show\">
  <div class=\"block-slider swiper-container\">
    <div class=\"swiper-wrapper\">
      ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 5
            echo "        <div class=\"swiper-slide\">
          <a href=\"javascript:;\">
            <div class=\"img-wrapper \" >
              <img class=\"w-100\" src=\"";
            // line 8
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "image", [])), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "img_alt", [])), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "img_title", [])), "html", null, true);
            echo "\"/>
            </div>
            <span class=\"title\">";
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])));
            echo "</span></span>
          </a>
          <a href=\"/about-us/snippets\" class=\"btn btn-link read-more scroll-page\" id=\"";
            // line 12
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "id", [])), "html", null, true);
            echo "\">Read More</a>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </div>
    <div class=\"swiper-pagination\"></div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/block/block--home-snippets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 15,  83 => 12,  78 => 10,  69 => 8,  64 => 5,  60 => 4,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"collapse-1\" class=\"tab-body show\">
  <div class=\"block-slider swiper-container\">
    <div class=\"swiper-wrapper\">
      {% for item in content['#data_obj'] %}
        <div class=\"swiper-slide\">
          <a href=\"javascript:;\">
            <div class=\"img-wrapper \" >
              <img class=\"w-100\" src=\"{{ item.image }}\" alt=\"{{ item.img_alt }}\" title=\"{{ item.img_title }}\"/>
            </div>
            <span class=\"title\">{{ item.title | raw }}</span></span>
          </a>
          <a href=\"/about-us/snippets\" class=\"btn btn-link read-more scroll-page\" id=\"{{ item.id }}\">Read More</a>
        </div>
      {% endfor %}
    </div>
    <div class=\"swiper-pagination\"></div>
  </div>
</div>
", "themes/veedol/templates/block/block--home-snippets.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\block\\block--home-snippets.html.twig");
    }
}
