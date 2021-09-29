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

/* themes/veedol/templates/page--front.html.twig */
class __TwigTemplate_e8ec5a8a7beec7b37d66282a52ee1a2816e6576565793b2983ecea60d8942594 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 4, "set" => 39];
        $filters = ["escape" => 6, "raw" => 25, "striptags" => 89, "trim" => 89, "replace" => 90, "lower" => 99];
        $functions = ["file_url" => 6, "drupal_block" => 63];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set'],
                ['escape', 'raw', 'striptags', 'trim', 'replace', 'lower'],
                ['file_url', 'drupal_block']
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
        echo "<section class=\"banner-slider\">
  <div class=\"swiper-container\">
    <div class=\"swiper-wrapper\">
      ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["node"] ?? null), "field_banner_image", []));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 5
            echo "        <div class=\"swiper-slide\">
            <img class=\"w-100 d-none d-md-block\" src=\"";
            // line 6
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "entity", []), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "entity", []), "field_image", []), "title", [])), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "entity", []), "field_image", []), "alt", [])), "html", null, true);
            echo "\"/>
            <img class=\"w-100 d-md-none\" src=\"";
            // line 7
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "entity", []), "field_mobile_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "entity", []), "field_image", []), "title", [])), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "entity", []), "field_image", []), "alt", [])), "html", null, true);
            echo "\"/>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </div>
    <div class=\"banner-pagination swiper-pagination\"></div>
  </div>
</section>
<!-- /Banner slider -->

<!-- Explore section -->
<section class=\"explore-section\">
  <div class=\"explore-image-wrapper\"></div>
  <img class=\"w-100 d-none d-md-block\" src=\"";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\" alt=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_iamge", []), "alt", [])), "html", null, true);
        echo "\" title=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_iamge", []), "alt", [])), "html", null, true);
        echo "\"/>
  <img class=\"w-100 d-md-none\" src=\"";
        // line 20
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_mobile_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\" alt=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_iamge", []), "alt", [])), "html", null, true);
        echo "\" title=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_iamge", []), "alt", [])), "html", null, true);
        echo "\" />
  <div class=\"details\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-lg-6 offset-lg-6 col-xl-4 offset-xl-8\">
          <p>";
        // line 25
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "body", []), "value", [])));
        echo "</p>
          <a href=\"";
        // line 26
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_link", []), "value", [])), "html", null, true);
        echo "\" class=\"btn btn-primary btn-lg\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_button_text", []), "value", [])), "html", null, true);
        echo "</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Explore section -->

<section class=\"product-categories-slider\">
  ";
        // line 35
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "featured_top", [])), "html", null, true);
        echo "
</section>

<!-- Tab section -->
";
        // line 39
        $context["count"] = 1;
        // line 40
        echo "<section class=\"tabs-container\">
    <ul class=\"nav nav-tabs home-tabs\">
      ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 43
            echo "        <li>
          <a href=\"#tab";
            // line 44
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null)), "html", null, true);
            echo "\" class=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar((((($context["count"] ?? null) == 1)) ? ("active") : ("")));
            echo "\" data-toggle=\"tab\">
            <img src=\"";
            // line 45
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_image", []), "alt", [])), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_image", []), "title", [])), "html", null, true);
            echo "\">
            <span>";
            // line 46
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_title", []), "value", [])));
            echo "</span>
          </a>
        </li>
        ";
            // line 49
            $context["count"] = (($context["count"] ?? null) + 1);
            // line 50
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "    </ul>


  <div class=\"container-wide\">
    <div class=\"tab-content\">
      <div class=\"tab-pane active\" id=\"tab1\">
        <h4 class=\"tab-title\">
          <a data-toggle=\"collapse\" data-parent=\".tab-pane\" href=\"#collapse-1\" >
            <img src=\"";
        // line 59
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []), 0, []), "entity", []), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\" alt=\"\">
            <span>";
        // line 60
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []), 0, []), "entity", []), "field_title", []), "value", [])), "html", null, true);
        echo "</span>
          </a>
        </h4>
        ";
        // line 63
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("home_snippets"), "html", null, true);
        echo "
      </div>
      <div class=\"tab-pane\" id=\"tab2\">
        <h4 class=\"tab-title\">
          <a data-toggle=\"collapse\" data-parent=\".tab-pane\" href=\"#collapse-2\" >
            <img src=\"";
        // line 68
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []), 1, []), "entity", []), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\" alt=\"\">
            <span>";
        // line 69
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []), 1, []), "entity", []), "field_title", []), "value", [])), "html", null, true);
        echo "</span>
          </a>
        </h4>
        <div id=\"collapse-2\" class=\"tab-body show\">
          <div class=\"block-slider swiper-container\">
            ";
        // line 74
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("home_videos"), "html", null, true);
        echo "
          </div>
        </div>
      </div>
      <div class=\"tab-pane\" id=\"tab3\">
        <h4 class=\"tab-title\">
          <a data-toggle=\"collapse\" data-parent=\".tab-pane\" href=\"#collapse-3\" >
            <img src=\"";
        // line 81
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []), 2, []), "entity", []), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\" alt=\"\">
            <span>";
        // line 82
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_home_tabs", []), 2, []), "entity", []), "field_title", []), "value", [])), "html", null, true);
        echo "</span>
          </a>
          </h4>
          <div id=\"collapse-3\" class=\"tab-body show\">
            <div class=\"block-slider swiper-container\">
              <div class=\"swiper-wrapper\">
                ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["node"] ?? null), "field_csr", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 89
            echo "                  ";
            $context["text"] = strip_tags(twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_description", []), "value", []))));
            // line 90
            echo "                  ";
            $context["text"] = twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["text"] ?? null)), ["& " => "", "/" => " ", "&" => ""]);
            // line 91
            echo "
                  <div class=\"swiper-slide\">
                    <a href=\"javascript:;\">
                      <div class=\"img-wrapper\" >
                        <img class=\"w-100\" src=\"";
            // line 95
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_image", []), "alt", [])), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_image", []), "title", [])), "html", null, true);
            echo "\" />
                      </div>
                      <span class=\"title\">";
            // line 97
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "entity", []), "field_description", []), "value", [])));
            echo "</span></span>
                    </a>
                    <a href=\"/about-us/corporate-social-responsibility\" class=\"btn btn-link read-more scroll-page\" id=\"";
            // line 99
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["text"] ?? null)), " ", "-")), "html", null, true);
            echo "\">Read More</a>
                  </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "              </div>
              <div class=\"banner-pagination swiper-pagination\"></div>
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
        return "themes/veedol/templates/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  287 => 102,  278 => 99,  273 => 97,  264 => 95,  258 => 91,  255 => 90,  252 => 89,  248 => 88,  239 => 82,  235 => 81,  225 => 74,  217 => 69,  213 => 68,  205 => 63,  199 => 60,  195 => 59,  185 => 51,  179 => 50,  177 => 49,  171 => 46,  163 => 45,  157 => 44,  154 => 43,  150 => 42,  146 => 40,  144 => 39,  137 => 35,  123 => 26,  119 => 25,  107 => 20,  99 => 19,  88 => 10,  75 => 7,  67 => 6,  64 => 5,  60 => 4,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"banner-slider\">
  <div class=\"swiper-container\">
    <div class=\"swiper-wrapper\">
      {% for image in node.field_banner_image %}
        <div class=\"swiper-slide\">
            <img class=\"w-100 d-none d-md-block\" src=\"{{ file_url(image.entity.field_image.entity.uri.value) }}\" title=\"{{ image.entity.field_image.title }}\" alt=\"{{ image.entity.field_image.alt }}\"/>
            <img class=\"w-100 d-md-none\" src=\"{{ file_url(image.entity.field_mobile_image.entity.uri.value) }}\" title=\"{{ image.entity.field_image.title }}\" alt=\"{{ image.entity.field_image.alt }}\"/>
        </div>
      {% endfor %}
    </div>
    <div class=\"banner-pagination swiper-pagination\"></div>
  </div>
</section>
<!-- /Banner slider -->

<!-- Explore section -->
<section class=\"explore-section\">
  <div class=\"explore-image-wrapper\"></div>
  <img class=\"w-100 d-none d-md-block\" src=\"{{ file_url(node.field_image.entity.uri.value) }}\" alt=\"{{ node.field_iamge.alt }}\" title=\"{{ node.field_iamge.alt }}\"/>
  <img class=\"w-100 d-md-none\" src=\"{{ file_url(node.field_mobile_image.entity.uri.value) }}\" alt=\"{{ node.field_iamge.alt }}\" title=\"{{ node.field_iamge.alt }}\" />
  <div class=\"details\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-lg-6 offset-lg-6 col-xl-4 offset-xl-8\">
          <p>{{ node.body.value | raw }}</p>
          <a href=\"{{ node.field_link.value }}\" class=\"btn btn-primary btn-lg\">{{ node.field_button_text.value }}</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Explore section -->

<section class=\"product-categories-slider\">
  {{ page.featured_top }}
</section>

<!-- Tab section -->
{% set count = 1 %}
<section class=\"tabs-container\">
    <ul class=\"nav nav-tabs home-tabs\">
      {% for item in node.field_home_tabs %}
        <li>
          <a href=\"#tab{{ count }}\" class=\"{{ (count == 1) ? 'active' : '' }}\" data-toggle=\"tab\">
            <img src=\"{{ file_url(item.entity.field_image.entity.uri.value) }}\" alt=\"{{ item.entity.field_image.alt }}\" title=\"{{ item.entity.field_image.title }}\">
            <span>{{ item.entity.field_title.value | raw }}</span>
          </a>
        </li>
        {% set count = count +1 %}
      {% endfor %}
    </ul>


  <div class=\"container-wide\">
    <div class=\"tab-content\">
      <div class=\"tab-pane active\" id=\"tab1\">
        <h4 class=\"tab-title\">
          <a data-toggle=\"collapse\" data-parent=\".tab-pane\" href=\"#collapse-1\" >
            <img src=\"{{ file_url(node.field_home_tabs.0.entity.field_image.entity.uri.value) }}\" alt=\"\">
            <span>{{ node.field_home_tabs.0.entity.field_title.value }}</span>
          </a>
        </h4>
        {{ drupal_block('home_snippets') }}
      </div>
      <div class=\"tab-pane\" id=\"tab2\">
        <h4 class=\"tab-title\">
          <a data-toggle=\"collapse\" data-parent=\".tab-pane\" href=\"#collapse-2\" >
            <img src=\"{{ file_url(node.field_home_tabs.1.entity.field_image.entity.uri.value) }}\" alt=\"\">
            <span>{{ node.field_home_tabs.1.entity.field_title.value }}</span>
          </a>
        </h4>
        <div id=\"collapse-2\" class=\"tab-body show\">
          <div class=\"block-slider swiper-container\">
            {{ drupal_block('home_videos') }}
          </div>
        </div>
      </div>
      <div class=\"tab-pane\" id=\"tab3\">
        <h4 class=\"tab-title\">
          <a data-toggle=\"collapse\" data-parent=\".tab-pane\" href=\"#collapse-3\" >
            <img src=\"{{ file_url(node.field_home_tabs.2.entity.field_image.entity.uri.value) }}\" alt=\"\">
            <span>{{ node.field_home_tabs.2.entity.field_title.value }}</span>
          </a>
          </h4>
          <div id=\"collapse-3\" class=\"tab-body show\">
            <div class=\"block-slider swiper-container\">
              <div class=\"swiper-wrapper\">
                {% for item in node.field_csr %}
                  {% set text = item.entity.field_description.value|trim|striptags  %}
                  {% set text = text|replace({'& ': '', '/': ' ', '&': ''}) %}

                  <div class=\"swiper-slide\">
                    <a href=\"javascript:;\">
                      <div class=\"img-wrapper\" >
                        <img class=\"w-100\" src=\"{{ file_url(item.entity.field_image.entity.uri.value) }}\" alt=\"{{ item.entity.field_image.alt }}\" title=\"{{ item.entity.field_image.title }}\" />
                      </div>
                      <span class=\"title\">{{ item.entity.field_description.value | raw }}</span></span>
                    </a>
                    <a href=\"/about-us/corporate-social-responsibility\" class=\"btn btn-link read-more scroll-page\" id=\"{{ text|replace(' ', '-')|lower }}\">Read More</a>
                  </div>
                {% endfor %}
              </div>
              <div class=\"banner-pagination swiper-pagination\"></div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
", "themes/veedol/templates/page--front.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\page--front.html.twig");
    }
}
