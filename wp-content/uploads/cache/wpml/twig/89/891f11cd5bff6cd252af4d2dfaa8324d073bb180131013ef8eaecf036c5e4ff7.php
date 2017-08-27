<?php

/* translation-statuses.twig */
class __TwigTemplate_1848c10ea4496bf895bab2f8e2299579ba354628b46e7770de686c170d7ff842 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["active_languages"]) ? $context["active_languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 2
            echo "    ";
            if (($this->getAttribute($context["language"], "code", array()) == (isset($context["source_language"]) ? $context["source_language"] : null))) {
                // line 3
                echo "        <span title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "english_name", array()));
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["strings"]) ? $context["strings"] : null), "orig_lang", array()));
                echo "\">
                    <i class=\"otgs-ico-original\"></i>
        </span>
    ";
            } else {
                // line 7
                echo "        ";
                echo call_user_func_array($this->env->getFunction('wcml_base_edit_dialog')->getCallable(), array((isset($context["base"]) ? $context["base"] : null), $this->getAttribute($context["language"], "code", array())));
                echo "

        <a class=\"js-wcml-dialog-trigger ";
                // line 9
                if ( !(isset($context["value"]) ? $context["value"] : null)) {
                    echo "dis_base";
                }
                echo "\" id=\"wcml-edit-base-slug-";
                echo twig_escape_filter($this->env, (isset($context["base"]) ? $context["base"] : null));
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "code", array()));
                echo "-link\"
           data-dialog=\"wcml-edit-base-slug-";
                // line 10
                echo twig_escape_filter($this->env, (isset($context["base"]) ? $context["base"] : null));
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "code", array()));
                echo "\"
           data-content=\"wcml-edit-base-slug-";
                // line 11
                echo twig_escape_filter($this->env, (isset($context["base"]) ? $context["base"] : null));
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "code", array()));
                echo "\"  data-width=\"700\" data-height=\"150\"

            ";
                // line 13
                if (($this->getAttribute($context["language"], "status", array()) == "upd")) {
                    // line 14
                    echo "                title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "english_name", array()));
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["strings"]) ? $context["strings"] : null), "update", array()));
                    echo "\">
                    <i class=\"otgs-ico-refresh\"></i>
            ";
                } elseif (($this->getAttribute(                // line 16
$context["language"], "status", array()) == "add")) {
                    // line 17
                    echo "                title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "english_name", array()));
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["strings"]) ? $context["strings"] : null), "add", array()));
                    echo "\">
                    <i class=\"otgs-ico-add\"></i>
            ";
                } elseif (($this->getAttribute(                // line 19
$context["language"], "status", array()) == "edit")) {
                    // line 20
                    echo "                title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "english_name", array()));
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["strings"]) ? $context["strings"] : null), "edit", array()));
                    echo ">\">
                <i class=\"otgs-ico-edit\"></i>
            ";
                }
                // line 23
                echo "        </a>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "translation-statuses.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 23,  87 => 20,  85 => 19,  77 => 17,  75 => 16,  67 => 14,  65 => 13,  58 => 11,  52 => 10,  42 => 9,  36 => 7,  26 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "translation-statuses.twig", "D:\\Xampp\\htdocs\\wordpress\\acp663\\wp-content\\plugins\\woocommerce-multilingual\\templates\\store-urls\\translation-statuses.twig");
    }
}
