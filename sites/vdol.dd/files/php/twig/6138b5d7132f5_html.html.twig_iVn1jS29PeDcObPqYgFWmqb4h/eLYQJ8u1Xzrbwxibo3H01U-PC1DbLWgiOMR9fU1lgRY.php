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

/* themes/veedol/templates/html.html.twig */
class __TwigTemplate_a852e0aae198945038453f036cc82aa90b9b06aee634e16369f9136b07d938ca extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 27];
        $filters = ["escape" => 29, "raw" => 31, "safe_join" => 32];
        $functions = ["url" => 27, "drupal_block" => 122];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape', 'raw', 'safe_join'],
                ['url', 'drupal_block']
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
        // line 26
        echo "
";
        // line 27
        $context["base_url"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("<front>");
        // line 28
        echo "<!DOCTYPE html>
<html";
        // line 29
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null)), "html", null, true);
        echo ">
  <head>
    <head-placeholder token=\"";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
    <title>";
        // line 32
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null)), " | "));
        echo "</title>
    <css-placeholder token=\"";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
    <js-placeholder token=\"";
        // line 34
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-M7ZJHW3ZT1\"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-M7ZJHW3ZT1');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-205243054-1\"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-205243054-1');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-205243054-1\"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-97573028-1');
    </script>

    <script type=\"application/ld+json\">
      {
        \"@context\": \"https://schema.org\",
        \"@type\": \"Organization\",
        \"name\": \"Veedol India\",
        \"alternateName\": \"Veedol  India Official Website\",
        \"url\": \"https://www.veedolindia.com\",
        \"logo\": \"https://www.veedolindia.com/themes/veedol/images/logo.png\",
        \"contactPoint\": {
          \"@type\": \"ContactPoint\",
          \"telephone\": \"033-7125 7700\",
          \"contactType\": \"customer service\",
          \"contactOption\": \"HearingImpairedSupported\",
          \"areaServed\": \"IN\",
          \"availableLanguage\": [\"en\",\"Hindi\"]
        },
        \"sameAs\": [
          \"https://www.facebook.com/VeedolEngineOils/\",
          \"https://www.instagram.com/veedolengineoils/\",
          \"https://www.linkedin.com/company/veedol-engine-oils/\"
        ]
      }
    </script>


  </head>
  <body";
        // line 91
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
        echo ">
    ";
        // line 92
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null)), "html", null, true);
        echo "
    <header id=\"site-header\" role=\"navigation\">
      <div class=\"container\">
        <div class=\"header-inner\">
          <div class=\"center-menu-wrapper\">
            <a href=\"/\" class=\"logo-wrapper\">
              <img class=\"w-100 d-none d-md-block\" src=\"/";
        // line 98
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/logo.png\" />
              <img class=\"w-100 d-md-none\" src=\"/";
        // line 99
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/logo-mobile.png\" />
            </a>

            <form action=\"/search\" method=\"POST\">

                <input type=\"text\" name=\"search\" placeholder=\"Search\">

              <input type=\"submit\">

            </form>

            <div class=\"actions-wrapper\">
              ";
        // line 112
        echo "

              <button class=\"hamburger-trigger\">
                <span class=\"line\"></span>
                <span class=\"line\"></span>
                <span class=\"line\"></span>
                <span class=\"visually-hidden\">Open Menu</span>
              </button>
            </div>
          </div>
          ";
        // line 122
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("main_menu"), "html", null, true);
        echo "
        </div>
      </div>
    </header>

    <main id=\"site-content\" role=\"main\">
      ";
        // line 128
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null)), "html", null, true);
        echo "
      <ul class=\"floating-menu\">
        <li>
          <div class=\"menu-item\">
            <i class=\"iconx-drop\"></i>
            <a href=\"/find-lubricant\" class=\"title\">Find Lubricant</a>
          </div>
        </li>
        <li>
          <div class=\"menu-item\">
            <i class=\"iconx-marker\"></i>
            <a href=\"/find-nearest-workshop\" class=\"title\">Find Nearest Workshop</a>
          </div>
        </li>
        <li>
          <div class=\"menu-item\">
            <i class=\"iconx-email\"></i>
            <div class=\"title\">
              <span class=\"has-sub-menu\">Trade Enquiries</span>
              <ul class=\"sub-menu\">
                ";
        // line 149
        echo "                <li><a href=\"/contact-company\">Contact Company</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </main>

    <footer id=\"site-footer\" role=\"contentinfo\">
      <div class=\"footer-inner\">
        <div class=\"container\">
          ";
        // line 160
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("footer_menu"), "html", null, true);
        echo "
        </div>
      </div>
    </footer>
    ";
        // line 164
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null)), "html", null, true);
        echo "
    <js-bottom-placeholder token=\"";
        // line 165
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/veedol/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 165,  236 => 164,  229 => 160,  216 => 149,  193 => 128,  184 => 122,  172 => 112,  157 => 99,  153 => 98,  144 => 92,  140 => 91,  80 => 34,  76 => 33,  72 => 32,  68 => 31,  63 => 29,  60 => 28,  58 => 27,  55 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for the basic structure of a single Drupal page.
 *
 * Variables:
 * - logged_in: A flag indicating if user is logged in.
 * - root_path: The root path of the current page (e.g., node, admin, user).
 * - node_type: The content type for the current node, if the page is a node.
 * - head_title: List of text elements that make up the head_title variable.
 *   May contain one or more of the following:
 *   - title: The title of the page.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site.
 * - page_top: Initial rendered markup. This should be printed before 'page'.
 * - page: The rendered page markup.
 * - page_bottom: Closing rendered markup. This variable should be printed after
 *   'page'.
 * - db_offline: A flag indicating if the database is offline.
 * - placeholder_token: The token for generating head, css, js and js-bottom
 *   placeholders.
 *
 * @see template_preprocess_html()
 */
#}

{% set base_url = url('<front>') %}
<!DOCTYPE html>
<html{{ html_attributes }}>
  <head>
    <head-placeholder token=\"{{ placeholder_token|raw }}\">
    <title>{{ head_title|safe_join(' | ') }}</title>
    <css-placeholder token=\"{{ placeholder_token|raw }}\">
    <js-placeholder token=\"{{ placeholder_token|raw }}\">
      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-M7ZJHW3ZT1\"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-M7ZJHW3ZT1');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-205243054-1\"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-205243054-1');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-205243054-1\"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-97573028-1');
    </script>

    <script type=\"application/ld+json\">
      {
        \"@context\": \"https://schema.org\",
        \"@type\": \"Organization\",
        \"name\": \"Veedol India\",
        \"alternateName\": \"Veedol  India Official Website\",
        \"url\": \"https://www.veedolindia.com\",
        \"logo\": \"https://www.veedolindia.com/themes/veedol/images/logo.png\",
        \"contactPoint\": {
          \"@type\": \"ContactPoint\",
          \"telephone\": \"033-7125 7700\",
          \"contactType\": \"customer service\",
          \"contactOption\": \"HearingImpairedSupported\",
          \"areaServed\": \"IN\",
          \"availableLanguage\": [\"en\",\"Hindi\"]
        },
        \"sameAs\": [
          \"https://www.facebook.com/VeedolEngineOils/\",
          \"https://www.instagram.com/veedolengineoils/\",
          \"https://www.linkedin.com/company/veedol-engine-oils/\"
        ]
      }
    </script>


  </head>
  <body{{ attributes }}>
    {{ page_top }}
    <header id=\"site-header\" role=\"navigation\">
      <div class=\"container\">
        <div class=\"header-inner\">
          <div class=\"center-menu-wrapper\">
            <a href=\"/\" class=\"logo-wrapper\">
              <img class=\"w-100 d-none d-md-block\" src=\"/{{ directory}}/images/logo.png\" />
              <img class=\"w-100 d-md-none\" src=\"/{{ directory }}/images/logo-mobile.png\" />
            </a>

            <form action=\"/search\" method=\"POST\">

                <input type=\"text\" name=\"search\" placeholder=\"Search\">

              <input type=\"submit\">

            </form>

            <div class=\"actions-wrapper\">
              {# {{ drupal_region('sidebar_second') }} #}


              <button class=\"hamburger-trigger\">
                <span class=\"line\"></span>
                <span class=\"line\"></span>
                <span class=\"line\"></span>
                <span class=\"visually-hidden\">Open Menu</span>
              </button>
            </div>
          </div>
          {{ drupal_block('main_menu') }}
        </div>
      </div>
    </header>

    <main id=\"site-content\" role=\"main\">
      {{ page }}
      <ul class=\"floating-menu\">
        <li>
          <div class=\"menu-item\">
            <i class=\"iconx-drop\"></i>
            <a href=\"/find-lubricant\" class=\"title\">Find Lubricant</a>
          </div>
        </li>
        <li>
          <div class=\"menu-item\">
            <i class=\"iconx-marker\"></i>
            <a href=\"/find-nearest-workshop\" class=\"title\">Find Nearest Workshop</a>
          </div>
        </li>
        <li>
          <div class=\"menu-item\">
            <i class=\"iconx-email\"></i>
            <div class=\"title\">
              <span class=\"has-sub-menu\">Trade Enquiries</span>
              <ul class=\"sub-menu\">
                {#<li><a href=\"/find-a-distributor\">Find Distributor</a></li>#}
                <li><a href=\"/contact-company\">Contact Company</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </main>

    <footer id=\"site-footer\" role=\"contentinfo\">
      <div class=\"footer-inner\">
        <div class=\"container\">
          {{ drupal_block('footer_menu') }}
        </div>
      </div>
    </footer>
    {{ page_bottom }}
    <js-bottom-placeholder token=\"{{ placeholder_token|raw }}\">
  </body>
</html>
", "themes/veedol/templates/html.html.twig", "D:\\projects\\vdol\\themes\\veedol\\templates\\html.html.twig");
    }
}
