<?php

/* save-notification.twig */
class __TwigTemplate_4c4e272c55d6ae8a3e05c128be3d5dc22658d2d81ce8da996db829442131911a extends Twig_Template
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
        echo "<span class=\"js-wpml-ls-messages wpml-ls-messages\"></span><span class=\"spinner\"></span>
";
    }

    public function getTemplateName()
    {
        return "save-notification.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "save-notification.twig", "D:\\Xampp\\htdocs\\wordpress\\acp663\\wp-content\\plugins\\sitepress-multilingual-cms\\templates\\language-switcher-admin-ui\\save-notification.twig");
    }
}
