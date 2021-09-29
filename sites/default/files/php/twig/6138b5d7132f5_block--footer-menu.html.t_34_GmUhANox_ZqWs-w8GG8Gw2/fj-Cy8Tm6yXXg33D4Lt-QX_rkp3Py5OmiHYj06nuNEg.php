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

/* themes/veedol/templates/block/block--footer-menu.html.twig */
class __TwigTemplate_171ee8a55134167f5dff4160a48f9c0ab4f1451aee8cec69bc1cef32d100dded extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 4];
        $filters = ["escape" => 5];
        $functions = ["drupal_block" => 11];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
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
        echo "<div class=\"row\">
  <div class=\"col-md-12\">
    <ul class=\"footer-menu justify-content-center\">
      ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 5
            echo "        <li><a href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "link", [])), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "target", [])), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
            echo "</a></li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "    </ul>
  </div>
  <div class=\"col-md-12\">
    <ul class=\"social-menu justify-content-md-center\">
      ";
        // line 11
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("social_media"), "html", null, true);
        echo "
    </ul>
  </div>
</div>
<div class=\"row footer-notes\">
  <div class=\"col-md-6\">
    <div>
      &#169; Tide Water Oil Co. (India) Ltd. All rights reserved.
    </div>
  </div>
  <div class=\"col-md-6\">
    <ul class=\"justify-content-md-end\">
      <li><a href=\"/privacy-policy\">Privacy Policy</a></li>
      <li><a href=\"/disclaimer\">Disclaimer</a></li>
    </ul>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/block/block--footer-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 11,  77 => 7,  64 => 5,  60 => 4,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"row\">
  <div class=\"col-md-12\">
    <ul class=\"footer-menu justify-content-center\">
      {% for item in content['#data_obj'] %}
        <li><a href=\"{{ item.link }}\" {{ item.target }}>{{ item.title }}</a></li>
      {% endfor %}
    </ul>
  </div>
  <div class=\"col-md-12\">
    <ul class=\"social-menu justify-content-md-center\">
      {{ drupal_block('social_media') }}
    </ul>
  </div>
</div>
<div class=\"row footer-notes\">
  <div class=\"col-md-6\">
    <div>
      &#169; Tide Water Oil Co. (India) Ltd. All rights reserved.
    </div>
  </div>
  <div class=\"col-md-6\">
    <ul class=\"justify-content-md-end\">
      <li><a href=\"/privacy-policy\">Privacy Policy</a></li>
      <li><a href=\"/disclaimer\">Disclaimer</a></li>
    </ul>
  </div>
</div>
", "themes/veedol/templates/block/block--footer-menu.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\block\\block--footer-menu.html.twig");
    }
}
