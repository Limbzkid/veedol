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

/* themes/veedol/templates/block/block--main-menu.html.twig */
class __TwigTemplate_29ce73f7c9b13111e97ac77a609ff18d9d25a99821648785bd8e925e840b6431 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 9, "if" => 12];
        $filters = ["escape" => 11];
        $functions = ["drupal_block" => 94];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
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
        echo "
<div class=\"hamburger-menu-wrapper\">
  <button class=\"hamburger-close\">
    <span class=\"visually-hidden\">Close Menu</span>
  </button>

  <div class=\"main-menu-wrapper\">
    <ul>
      ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            echo "        <li>
          <a href=\"";
            // line 11
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "link", [])), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "target", [])), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
            echo "</a>
          ";
            // line 12
            if ( !twig_test_empty($this->getAttribute($context["item"], "child", []))) {
                // line 13
                echo "            <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
            ";
                // line 14
                if (($this->getAttribute($context["item"], "title", []) == "Products")) {
                    // line 15
                    echo "              <div class=\"mega-menu sub-menu\">
                <div class=\"container\">
                  <ul class=\"level-wrapper\">
                    ";
                    // line 18
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "child", []));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["oldest"]) {
                        // line 19
                        echo "                      ";
                        if (($this->getAttribute($context["loop"], "index", []) % 2 == 1)) {
                            // line 20
                            echo "                        <li class=\"level\">
                      ";
                        } else {
                            // line 22
                            echo "                        <li class=\"level multi-column\">
                      ";
                        }
                        // line 24
                        echo "                        <a href=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["oldest"], "alias", [])), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["oldest"], "name", [])), "html", null, true);
                        echo "</a>
                        ";
                        // line 25
                        if ( !twig_test_empty($this->getAttribute($context["oldest"], "child", []))) {
                            // line 26
                            echo "                          <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                          <ul class=\"level-1 sub-menu\">
                            ";
                            // line 28
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["oldest"], "child", []));
                            foreach ($context['_seq'] as $context["_key"] => $context["middle"]) {
                                // line 29
                                echo "                              <li>
                                <a href=\"";
                                // line 30
                                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["middle"], "alias", [])), "html", null, true);
                                echo "\">";
                                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["middle"], "name", [])), "html", null, true);
                                echo "</a>
                                ";
                                // line 31
                                if ( !twig_test_empty($this->getAttribute($context["middle"], "child", []))) {
                                    // line 32
                                    echo "                                  <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                                  <ul class=\"level-2 sub-menu\">
                                    ";
                                    // line 34
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["middle"], "child", []));
                                    foreach ($context['_seq'] as $context["_key"] => $context["youngest"]) {
                                        // line 35
                                        echo "                                      <li><a href=\"";
                                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["youngest"], "alias", [])), "html", null, true);
                                        echo "\">";
                                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["youngest"], "name", [])), "html", null, true);
                                        echo "</a></li>
                                    ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['youngest'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 37
                                    echo "                                  </ul>
                                ";
                                }
                                // line 39
                                echo "                              </li>
                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['middle'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 41
                            echo "                          </ul>
                        ";
                        }
                        // line 43
                        echo "                      </li>
                    ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['oldest'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 45
                    echo "                  </ul>
                </div>
              </div>
            ";
                } else {
                    // line 49
                    echo "              ";
                    if (($this->getAttribute($context["item"], "title", []) == "Investor Corner")) {
                        // line 50
                        echo "                <div class=\"mega-menu sub-menu investor-menu\">
                  <div class=\"container\">
                    <ul class=\"level-wrapper\">
                      ";
                        // line 53
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "child", []));
                        foreach ($context['_seq'] as $context["_key"] => $context["oldest"]) {
                            // line 54
                            echo "                          <li class=\"level\">
                          <a href=\"";
                            // line 55
                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["oldest"], "link", [])), "html", null, true);
                            echo "\" ";
                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($this->getAttribute($context["oldest"], "target", []) == 1)) ? ("target=\"_blank\"") : ("")));
                            echo ">";
                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["oldest"], "title", [])), "html", null, true);
                            echo "</a>
                          ";
                            // line 56
                            if ( !twig_test_empty($this->getAttribute($context["oldest"], "child", []))) {
                                // line 57
                                echo "                            <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                            <ul class=\"level-1 sub-menu\">
                              ";
                                // line 59
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["oldest"], "child", []));
                                foreach ($context['_seq'] as $context["_key"] => $context["middle"]) {
                                    // line 60
                                    echo "                                <li>
                                  <a href=\"";
                                    // line 61
                                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["middle"], "link", [])), "html", null, true);
                                    echo "\" ";
                                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($this->getAttribute($context["middle"], "target", []) == 1)) ? ("target=\"_blank\"") : ("")));
                                    echo ">";
                                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["middle"], "title", [])), "html", null, true);
                                    echo "</a>
                                  ";
                                    // line 62
                                    if ( !twig_test_empty($this->getAttribute($context["middle"], "child", []))) {
                                        // line 63
                                        echo "                                    <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                                    <ul class=\"level-2 sub-menu\">
                                      ";
                                        // line 65
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["middle"], "child", []));
                                        foreach ($context['_seq'] as $context["_key"] => $context["youngest"]) {
                                            // line 66
                                            echo "                                        <li><a href=\"";
                                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["youngest"], "link", [])), "html", null, true);
                                            echo "\" ";
                                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($this->getAttribute($context["youngest"], "target", []) == 1)) ? ("target=\"_blank\"") : ("")));
                                            echo ">";
                                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["youngest"], "title", [])), "html", null, true);
                                            echo "</a></li>
                                      ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['youngest'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 68
                                        echo "                                    </ul>
                                  ";
                                    }
                                    // line 70
                                    echo "                                </li>
                              ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['middle'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 72
                                echo "                            </ul>
                          ";
                            }
                            // line 74
                            echo "                        </li>
                      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['oldest'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 76
                        echo "                    </ul>
                  </div>
                </div>
              ";
                    } else {
                        // line 80
                        echo "                <ul class=\"sub-menu sub-menu\">
                  ";
                        // line 81
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "child", []));
                        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                            // line 82
                            echo "                    <li><a href=\"";
                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["menu"], "link", [])), "html", null, true);
                            echo "\">";
                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["menu"], "title", [])), "html", null, true);
                            echo " </a></li>
                  ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 84
                        echo "                </ul>
              ";
                    }
                    // line 86
                    echo "            ";
                }
                // line 87
                echo "          ";
            }
            // line 88
            echo "        </li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "    </ul>
  </div>
  <div class=\"top-menu-wrapper\">
    <ul class=\"social-menu\">
      ";
        // line 94
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("social_media"), "html", null, true);
        echo "
    </ul>
    <ul class=\"quick-menu\">
      ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#top_menu", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 98
            echo "        <li><a href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "link", [])), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
            echo "</a></li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "    </ul>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/block/block--main-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  360 => 100,  349 => 98,  345 => 97,  339 => 94,  333 => 90,  326 => 88,  323 => 87,  320 => 86,  316 => 84,  305 => 82,  301 => 81,  298 => 80,  292 => 76,  285 => 74,  281 => 72,  274 => 70,  270 => 68,  257 => 66,  253 => 65,  249 => 63,  247 => 62,  239 => 61,  236 => 60,  232 => 59,  228 => 57,  226 => 56,  218 => 55,  215 => 54,  211 => 53,  206 => 50,  203 => 49,  197 => 45,  182 => 43,  178 => 41,  171 => 39,  167 => 37,  156 => 35,  152 => 34,  148 => 32,  146 => 31,  140 => 30,  137 => 29,  133 => 28,  129 => 26,  127 => 25,  120 => 24,  116 => 22,  112 => 20,  109 => 19,  92 => 18,  87 => 15,  85 => 14,  82 => 13,  80 => 12,  72 => 11,  69 => 10,  65 => 9,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("
<div class=\"hamburger-menu-wrapper\">
  <button class=\"hamburger-close\">
    <span class=\"visually-hidden\">Close Menu</span>
  </button>

  <div class=\"main-menu-wrapper\">
    <ul>
      {% for item in content['#data_obj'] %}
        <li>
          <a href=\"{{ item.link }}\" {{ item.target }}>{{ item.title }}</a>
          {% if item.child is not empty %}
            <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
            {% if item.title == 'Products' %}
              <div class=\"mega-menu sub-menu\">
                <div class=\"container\">
                  <ul class=\"level-wrapper\">
                    {% for oldest in item.child %}
                      {% if loop.index is odd %}
                        <li class=\"level\">
                      {% else %}
                        <li class=\"level multi-column\">
                      {% endif %}
                        <a href=\"{{ oldest.alias }}\">{{ oldest.name }}</a>
                        {% if oldest.child is not empty %}
                          <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                          <ul class=\"level-1 sub-menu\">
                            {% for middle in oldest.child %}
                              <li>
                                <a href=\"{{ middle.alias }}\">{{ middle.name }}</a>
                                {% if middle.child is not empty %}
                                  <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                                  <ul class=\"level-2 sub-menu\">
                                    {% for youngest in middle.child %}
                                      <li><a href=\"{{ youngest.alias }}\">{{ youngest.name }}</a></li>
                                    {% endfor %}
                                  </ul>
                                {% endif %}
                              </li>
                            {% endfor %}
                          </ul>
                        {% endif %}
                      </li>
                    {% endfor %}
                  </ul>
                </div>
              </div>
            {% else %}
              {% if item.title == 'Investor Corner' %}
                <div class=\"mega-menu sub-menu investor-menu\">
                  <div class=\"container\">
                    <ul class=\"level-wrapper\">
                      {% for oldest in item.child %}
                          <li class=\"level\">
                          <a href=\"{{ oldest.link }}\" {{ (oldest.target == 1) ? 'target=\"_blank\"': '' }}>{{ oldest.title }}</a>
                          {% if oldest.child is not empty %}
                            <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                            <ul class=\"level-1 sub-menu\">
                              {% for middle in oldest.child %}
                                <li>
                                  <a href=\"{{ middle.link }}\" {{ (middle.target == 1) ? 'target=\"_blank\"': '' }}>{{ middle.title }}</a>
                                  {% if middle.child is not empty %}
                                    <button class=\"btn btn-icon\"><i class=\"iconx-arrow-thin\"></i></button>
                                    <ul class=\"level-2 sub-menu\">
                                      {% for youngest in middle.child %}
                                        <li><a href=\"{{ youngest.link }}\" {{ (youngest.target == 1) ? 'target=\"_blank\"': '' }}>{{ youngest.title }}</a></li>
                                      {% endfor %}
                                    </ul>
                                  {% endif %}
                                </li>
                              {% endfor %}
                            </ul>
                          {% endif %}
                        </li>
                      {% endfor %}
                    </ul>
                  </div>
                </div>
              {% else %}
                <ul class=\"sub-menu sub-menu\">
                  {% for menu in item.child %}
                    <li><a href=\"{{ menu.link }}\">{{ menu.title }} </a></li>
                  {% endfor %}
                </ul>
              {% endif %}
            {% endif %}
          {% endif %}
        </li>
      {% endfor %}
    </ul>
  </div>
  <div class=\"top-menu-wrapper\">
    <ul class=\"social-menu\">
      {{ drupal_block('social_media') }}
    </ul>
    <ul class=\"quick-menu\">
      {% for item in content['#top_menu'] %}
        <li><a href=\"{{ item.link }}\">{{ item.title }}</a></li>
      {% endfor %}
    </ul>
  </div>
</div>
", "themes/veedol/templates/block/block--main-menu.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\block\\block--main-menu.html.twig");
    }
}
