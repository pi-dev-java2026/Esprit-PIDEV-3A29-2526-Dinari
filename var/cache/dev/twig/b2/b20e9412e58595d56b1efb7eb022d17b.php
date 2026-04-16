<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/chapitre/form.html.twig */
class __TwigTemplate_637dbb2abcaa1156a8bde737a3c8786c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'page_title' => [$this, 'block_page_title'],
            'section_title' => [$this, 'block_section_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/chapitre/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/chapitre/form.html.twig"));

        // line 3
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), ["admin/_form_theme.html.twig"], true);
        // line 1
        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 5, $this->source); })()) == "new")) ? ("Nouveau chapitre") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Modifier — " . CoreExtension::getAttribute($this->env, $this->source, (isset($context["chapitre"]) || array_key_exists("chapitre", $context) ? $context["chapitre"] : (function () { throw new RuntimeError('Variable "chapitre" does not exist.', 5, $this->source); })()), "titre", [], "any", false, false, false, 5)), "html", null, true)));
        yield " — Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 6, $this->source); })()) == "new")) ? ("Nouveau chapitre") : ("Modifier le chapitre"));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_section_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "section_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "section_title"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 7, $this->source); })()), "nomCours", [], "any", false, false, false, 7), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 10
        yield "<style>
/* ── shared tree styles ── */
.sb { background:#fff; border:1px solid var(--border); border-radius:12px; padding:24px; margin-bottom:20px; }

/* ── Validation errors ── */
.field-error {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #e74c3c;
}
.field-error i { font-size: 13px; flex-shrink: 0; }
.field-invalid {
    border-color: #e74c3c !important;
    box-shadow: 0 0 0 3px rgba(231,76,60,.1) !important;
}
.form-group-d:has(.field-error) > label,
.label-error { color: #e74c3c !important; }
.sb-head {
    font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase;
    color:var(--blue); margin-bottom:20px; padding-bottom:12px;
    border-bottom:1px solid var(--border); display:flex; align-items:center; gap:8px;
}
.sb-head i { font-size:16px; }
.grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
@media(max-width:700px){ .grid-2,.grid-3 { grid-template-columns:1fr; } }

/* Collection */
.coll-item {
    background:#f8f9fa; border:1px solid var(--border); border-radius:8px;
    padding:16px 16px 10px; margin-bottom:10px; position:relative;
}
.coll-item .btn-rm {
    position:absolute; top:10px; right:10px; background:none; border:none;
    color:#e74c3c; cursor:pointer; font-size:16px; line-height:1; padding:2px 6px;
    border-radius:4px; transition:background .15s;
}
.coll-item .btn-rm:hover { background:rgba(231,76,60,.1); }
.btn-add {
    display:inline-flex; align-items:center; gap:6px; margin-top:6px;
    padding:8px 16px; border-radius:8px; border:1.5px dashed var(--border);
    background:#fff; color:var(--blue); font-size:13px; font-weight:600;
    cursor:pointer; transition:all .2s;
}
.btn-add:hover { border-color:var(--blue); background:rgba(26,111,196,.05); }

/* Preview strip */
.media-preview { margin-top:8px; border-radius:8px; overflow:hidden; max-height:160px; display:none; }
.media-preview img { width:100%; height:160px; object-fit:cover; display:block; }
.media-preview iframe { width:100%; height:160px; border:none; display:block; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 67
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 68
        yield "<div class=\"page-header\">
    <div>
        <h1>";
        // line 70
        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 70, $this->source); })()) == "new")) ? ("Nouveau chapitre") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("Modifier — " . CoreExtension::getAttribute($this->env, $this->source, (isset($context["chapitre"]) || array_key_exists("chapitre", $context) ? $context["chapitre"] : (function () { throw new RuntimeError('Variable "chapitre" does not exist.', 70, $this->source); })()), "titre", [], "any", false, false, false, 70)), "html", null, true)));
        yield "</h1>
        <div class=\"breadcrumb-d\">
            <a href=\"";
        // line 72
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Dashboard</a> ›
            <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_index");
        yield "\">Cours</a> ›
            <a href=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 74, $this->source); })()), "id", [], "any", false, false, false, 74)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 74, $this->source); })()), "nomCours", [], "any", false, false, false, 74), "html", null, true);
        yield "</a> ›
            ";
        // line 75
        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 75, $this->source); })()) == "new")) ? ("Nouveau chapitre") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["chapitre"]) || array_key_exists("chapitre", $context) ? $context["chapitre"] : (function () { throw new RuntimeError('Variable "chapitre" does not exist.', 75, $this->source); })()), "titre", [], "any", false, false, false, 75), "html", null, true)));
        yield "
        </div>
    </div>
    <a href=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 78, $this->source); })()), "id", [], "any", false, false, false, 78)]), "html", null, true);
        yield "\" class=\"btn-dinari btn-secondary-d\">
        <i class=\"ri-arrow-left-line\"></i> Retour
    </a>
</div>

";
        // line 83
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate", "id" => "chapitre-form"]]);
        yield "

";
        // line 86
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "vars", [], "any", false, false, false, 86), "valid", [], "any", false, false, false, 86) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "vars", [], "any", false, false, false, 86), "submitted", [], "any", false, false, false, 86))) {
            // line 87
            yield "<div style=\"background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.25);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:flex-start;gap:10px;\">
    <i class=\"ri-error-warning-line\" style=\"color:#e74c3c;font-size:18px;flex-shrink:0;margin-top:1px;\"></i>
    <div style=\"font-size:13px;color:#e74c3c;\">
        <strong>Veuillez corriger les erreurs suivantes :</strong>
        <ul style=\"margin:6px 0 0;padding-left:16px;\">
            ";
            // line 92
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "titre", [], "any", false, false, false, 92), "vars", [], "any", false, false, false, 92), "errors", [], "any", false, false, false, 92)) > 0)) {
                // line 93
                yield "                <li>Titre : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "titre", [], "any", false, false, false, 93), "vars", [], "any", false, false, false, 93), "errors", [], "any", false, false, false, 93), 0, [], "array", false, false, false, 93), "message", [], "any", false, false, false, 93), "html", null, true);
                yield "</li>
            ";
            }
            // line 95
            yield "            ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "position", [], "any", false, false, false, 95), "vars", [], "any", false, false, false, 95), "errors", [], "any", false, false, false, 95)) > 0)) {
                // line 96
                yield "                <li>Ordre : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "position", [], "any", false, false, false, 96), "vars", [], "any", false, false, false, 96), "errors", [], "any", false, false, false, 96), 0, [], "array", false, false, false, 96), "message", [], "any", false, false, false, 96), "html", null, true);
                yield "</li>
            ";
            }
            // line 98
            yield "        </ul>
    </div>
</div>
";
        }
        // line 102
        yield "
";
        // line 104
        yield "<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-bookmark-line\"></i> Identité du chapitre</div>
    <div class=\"grid-2\" style=\"margin-bottom:16px;\">
        <div class=\"form-group-d\">
            ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "position", [], "any", false, false, false, 108), 'label');
        yield "
            ";
        // line 109
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 109, $this->source); })()), "position", [], "any", false, false, false, 109), 'widget');
        yield "
        </div>
        <div></div>
    </div>
    <div class=\"form-group-d\">
        ";
        // line 114
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 114, $this->source); })()), "titre", [], "any", false, false, false, 114), 'label');
        yield "
        ";
        // line 115
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 115, $this->source); })()), "titre", [], "any", false, false, false, 115), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
    </div>
    </div>
    <div class=\"form-group-d\">
        ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "sousTitre", [], "any", false, false, false, 119), 'label');
        yield "
        ";
        // line 120
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 120, $this->source); })()), "sousTitre", [], "any", false, false, false, 120), 'widget');
        yield "
    </div>
</div>

";
        // line 125
        yield "<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-file-text-line\"></i> Contenu éducatif</div>
    <div class=\"form-group-d\">
        ";
        // line 128
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 128, $this->source); })()), "intro", [], "any", false, false, false, 128), 'label');
        yield "
        ";
        // line 129
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 129, $this->source); })()), "intro", [], "any", false, false, false, 129), 'widget');
        yield "
        <small style=\"color:var(--muted);font-size:12px;\">Affiché dans le bandeau bleu en haut du chapitre.</small>
    </div>
    <div class=\"form-group-d\">
        ";
        // line 133
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 133, $this->source); })()), "contenuPrincipal", [], "any", false, false, false, 133), 'label');
        yield "
        ";
        // line 134
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 134, $this->source); })()), "contenuPrincipal", [], "any", false, false, false, 134), 'widget');
        yield "
        <small style=\"color:var(--muted);font-size:12px;\">Bloc d'explication principal visible dans la section \"Qu'est-ce que...\".</small>
    </div>
    <div class=\"form-group-d\">
        ";
        // line 138
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 138, $this->source); })()), "aRetenir", [], "any", false, false, false, 138), 'label');
        yield "
        ";
        // line 139
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 139, $this->source); })()), "aRetenir", [], "any", false, false, false, 139), 'widget');
        yield "
        <small style=\"color:var(--muted);font-size:12px;\">Affiché dans l'encadré bleu \"💡 À retenir\".</small>
    </div>
</div>

";
        // line 145
        yield "<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-video-line\"></i> Vidéo</div>
    <div class=\"form-group-d\">
        ";
        // line 148
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 148, $this->source); })()), "videoUrl", [], "any", false, false, false, 148), 'label');
        yield "
        ";
        // line 149
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 149, $this->source); })()), "videoUrl", [], "any", false, false, false, 149), 'widget', ["attr" => ["id" => "video_url_input", "oninput" => "previewVideo(this.value)"]]);
        yield "
        <small style=\"color:var(--muted);font-size:12px;\">Utiliser l'URL embed YouTube : https://www.youtube.com/embed/ID</small>
    </div>
    <div class=\"media-preview\" id=\"video-preview\">
        <iframe id=\"video-frame\" src=\"\" allowfullscreen></iframe>
    </div>
</div>

";
        // line 158
        yield "<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-image-line\"></i> Image / Illustration</div>
    <div class=\"form-group-d\">
        ";
        // line 161
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 161, $this->source); })()), "imageUrl", [], "any", false, false, false, 161), 'label');
        yield "
        ";
        // line 162
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 162, $this->source); })()), "imageUrl", [], "any", false, false, false, 162), 'widget', ["attr" => ["id" => "image_url_input", "oninput" => "previewImage(this.value)"]]);
        yield "
    </div>
    <div class=\"media-preview\" id=\"image-preview\">
        <img id=\"image-thumb\" src=\"\" alt=\"Aperçu\">
    </div>
    <div class=\"grid-2\" style=\"margin-top:12px;\">
        <div class=\"form-group-d\">
            ";
        // line 169
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 169, $this->source); })()), "imageTitre", [], "any", false, false, false, 169), 'label');
        yield "
            ";
        // line 170
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 170, $this->source); })()), "imageTitre", [], "any", false, false, false, 170), 'widget');
        yield "
        </div>
        <div class=\"form-group-d\">
            ";
        // line 173
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 173, $this->source); })()), "imageDescription", [], "any", false, false, false, 173), 'label');
        yield "
            ";
        // line 174
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 174, $this->source); })()), "imageDescription", [], "any", false, false, false, 174), 'widget');
        yield "
        </div>
    </div>
</div>

";
        // line 180
        yield "<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-checkbox-line\"></i> Tâches du chapitre</div>
    <div id=\"taches-list\">
        ";
        // line 183
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 183, $this->source); })()), "taches", [], "any", false, false, false, 183));
        foreach ($context['_seq'] as $context["_key"] => $context["tache"]) {
            // line 184
            yield "            <div class=\"coll-item\">
                <button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
                <div class=\"grid-2\" style=\"margin-bottom:10px;\">
                    <div class=\"form-group-d\" style=\"margin-bottom:0;\">
                        ";
            // line 188
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "libelle", [], "any", false, false, false, 188), 'label');
            yield "
                        ";
            // line 189
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "libelle", [], "any", false, false, false, 189), 'widget');
            yield "
                        ";
            // line 190
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "libelle", [], "any", false, false, false, 190), 'errors');
            yield "
                    </div>
                    <div class=\"form-group-d\" style=\"margin-bottom:0;\">
                        ";
            // line 193
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "position", [], "any", false, false, false, 193), 'label');
            yield "
                        ";
            // line 194
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "position", [], "any", false, false, false, 194), 'widget');
            yield "
                    </div>
                </div>
                <div class=\"form-group-d\" style=\"margin-bottom:0;\">
                    ";
            // line 198
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "description", [], "any", false, false, false, 198), 'label');
            yield "
                    ";
            // line 199
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "description", [], "any", false, false, false, 199), 'widget');
            yield "
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tache'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 203
        yield "    </div>
    <button type=\"button\" class=\"btn-add\" onclick=\"addTache()\">
        <i class=\"ri-add-line\"></i> Ajouter une tâche
    </button>
</div>

";
        // line 210
        yield "<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-question-answer-line\"></i> Questions QCM</div>
    <div id=\"questions-list\">
        ";
        // line 213
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 213, $this->source); })()), "questions", [], "any", false, false, false, 213));
        foreach ($context['_seq'] as $context["_key"] => $context["q"]) {
            // line 214
            yield "            <div class=\"coll-item\">
                <button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
                <div class=\"form-group-d\">
                    ";
            // line 217
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "question", [], "any", false, false, false, 217), 'label');
            yield "
                    ";
            // line 218
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "question", [], "any", false, false, false, 218), 'widget');
            yield "
                    ";
            // line 219
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "question", [], "any", false, false, false, 219), 'errors');
            yield "
                </div>
                <div class=\"grid-2\">
                    <div class=\"form-group-d\">
                        ";
            // line 223
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixA", [], "any", false, false, false, 223), 'label');
            yield "
                        ";
            // line 224
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixA", [], "any", false, false, false, 224), 'widget');
            yield "
                        ";
            // line 225
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixA", [], "any", false, false, false, 225), 'errors');
            yield "
                    </div>
                    <div class=\"form-group-d\">
                        ";
            // line 228
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixB", [], "any", false, false, false, 228), 'label');
            yield "
                        ";
            // line 229
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixB", [], "any", false, false, false, 229), 'widget');
            yield "
                        ";
            // line 230
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixB", [], "any", false, false, false, 230), 'errors');
            yield "
                    </div>
                    <div class=\"form-group-d\">
                        ";
            // line 233
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixC", [], "any", false, false, false, 233), 'label');
            yield "
                        ";
            // line 234
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixC", [], "any", false, false, false, 234), 'widget');
            yield "
                    </div>
                    <div class=\"form-group-d\">
                        ";
            // line 237
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixD", [], "any", false, false, false, 237), 'label');
            yield "
                        ";
            // line 238
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "choixD", [], "any", false, false, false, 238), 'widget');
            yield "
                    </div>
                </div>
                <div class=\"grid-2\">
                    <div class=\"form-group-d\">
                        ";
            // line 243
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "bonneReponse", [], "any", false, false, false, 243), 'label');
            yield "
                        ";
            // line 244
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "bonneReponse", [], "any", false, false, false, 244), 'widget');
            yield "
                    </div>
                    <div class=\"form-group-d\">
                        ";
            // line 247
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "position", [], "any", false, false, false, 247), 'label');
            yield "
                        ";
            // line 248
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["q"], "position", [], "any", false, false, false, 248), 'widget');
            yield "
                    </div>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['q'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 253
        yield "    </div>
    <button type=\"button\" class=\"btn-add\" onclick=\"addQuestion()\">
        <i class=\"ri-add-line\"></i> Ajouter une question
    </button>
</div>

";
        // line 260
        yield "<div style=\"display:flex;gap:10px;padding-bottom:40px;\">
    <button type=\"submit\" class=\"btn-dinari btn-primary-d\">
        <i class=\"ri-save-line\"></i> ";
        // line 262
        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 262, $this->source); })()) == "new")) ? ("Créer le chapitre") : ("Enregistrer les modifications"));
        yield "
    </button>
    <a href=\"";
        // line 264
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 264, $this->source); })()), "id", [], "any", false, false, false, 264)]), "html", null, true);
        yield "\" class=\"btn-dinari btn-secondary-d\">
        Annuler
    </a>
</div>

";
        // line 270
        $context["tache_proto_html"] = $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 270, $this->source); })()), "taches", [], "any", false, false, false, 270), "vars", [], "any", false, false, false, 270), "prototype", [], "any", false, false, false, 270), 'widget'), "html_attr");
        // line 271
        $context["question_proto_html"] = $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 271, $this->source); })()), "questions", [], "any", false, false, false, 271), "vars", [], "any", false, false, false, 271), "prototype", [], "any", false, false, false, 271), 'widget'), "html_attr");
        // line 272
        yield "
";
        // line 273
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 273, $this->source); })()), 'form_end');
        yield "

";
        // line 276
        yield "<div id=\"tache-proto\"    data-proto=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tache_proto_html"]) || array_key_exists("tache_proto_html", $context) ? $context["tache_proto_html"] : (function () { throw new RuntimeError('Variable "tache_proto_html" does not exist.', 276, $this->source); })()), "html", null, true);
        yield "\"    style=\"display:none\"></div>
<div id=\"question-proto\" data-proto=\"";
        // line 277
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["question_proto_html"]) || array_key_exists("question_proto_html", $context) ? $context["question_proto_html"] : (function () { throw new RuntimeError('Variable "question_proto_html" does not exist.', 277, $this->source); })()), "html", null, true);
        yield "\" style=\"display:none\"></div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 280
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 281
        yield "<script>
let tIdx = ";
        // line 282
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 282, $this->source); })()), "taches", [], "any", false, false, false, 282)), "html", null, true);
        yield ";
let qIdx = ";
        // line 283
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 283, $this->source); })()), "questions", [], "any", false, false, false, 283)), "html", null, true);
        yield ";

function addTache() {
    const proto = document.getElementById('tache-proto').dataset.proto;
    const html  = proto.replace(/__name__/g, tIdx++);
    const div   = document.createElement('div');
    div.className = 'coll-item';
    div.innerHTML = `<button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
        <div class=\"grid-2\" style=\"margin-bottom:10px;\">
            <div class=\"form-group-d\" style=\"margin-bottom:0;\">\${extractField(html, 'libelle', 'Titre de la tâche')}</div>
            <div class=\"form-group-d\" style=\"margin-bottom:0;\">\${extractField(html, 'position', 'Ordre')}</div>
        </div>
        <div class=\"form-group-d\" style=\"margin-bottom:0;\">\${extractField(html, 'description', 'Description (optionnel)')}</div>`;
    document.getElementById('taches-list').appendChild(div);
}

function addQuestion() {
    const proto = document.getElementById('question-proto').dataset.proto;
    const html  = proto.replace(/__name__/g, qIdx++);
    const div   = document.createElement('div');
    div.className = 'coll-item';
    div.innerHTML = `<button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
        <div class=\"form-group-d\">\${extractField(html, 'question', 'Question')}</div>
        <div class=\"grid-2\">
            <div class=\"form-group-d\">\${extractField(html, 'choixA', 'Choix A')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'choixB', 'Choix B')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'choixC', 'Choix C')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'choixD', 'Choix D')}</div>
        </div>
        <div class=\"grid-2\">
            <div class=\"form-group-d\">\${extractField(html, 'bonneReponse', 'Bonne réponse')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'position', 'Ordre')}</div>
        </div>`;
    document.getElementById('questions-list').appendChild(div);
}

function extractField(html, name, label) {
    const tmp = document.createElement('div');
    tmp.innerHTML = html;
    const input = tmp.querySelector(`[id\$=\"_\${name}\"], [name\$=\"[\${name}]\"]`);
    if (!input) return html;
    return `<label style=\"display:block;font-size:13px;font-weight:600;color:var(--text);margin-bottom:6px;\">\${label}</label>\${input.outerHTML}`;
}

// ── Validation ──
const REQUIRED_FIELDS = [
    { selector: '[name\$=\"[titre]\"], #";
        // line 329
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 329, $this->source); })()), "titre", [], "any", false, false, false, 329), "vars", [], "any", false, false, false, 329), "id", [], "any", false, false, false, 329), "html", null, true);
        yield "', label: 'Titre du chapitre' },
];

function setError(input, message) {
    clearError(input);
    input.classList.add('field-invalid');
    const group = input.closest('.form-group-d');
    if (group) {
        group.querySelector('label')?.classList.add('label-error');
        const err = document.createElement('div');
        err.className = 'field-error field-error-js';
        err.innerHTML = '<i class=\"ri-error-warning-line\"></i> ' + message;
        input.insertAdjacentElement('afterend', err);
    }
}

function clearError(input) {
    input.classList.remove('field-invalid');
    input.closest('.form-group-d')?.querySelector('label')?.classList.remove('label-error');
    input.parentElement?.querySelector('.field-error-js')?.remove();
}

function validateForm() {
    // Find the titre input by id
    const titreInput = document.getElementById('";
        // line 353
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 353, $this->source); })()), "titre", [], "any", false, false, false, 353), "vars", [], "any", false, false, false, 353), "id", [], "any", false, false, false, 353), "html", null, true);
        yield "');
    let valid = true;

    if (titreInput && titreInput.value.trim() === '') {
        setError(titreInput, 'Le titre est obligatoire.');
        valid = false;
    }

    return valid;
}

document.getElementById('chapitre-form').addEventListener('submit', function(e) {
    // Clear previous JS errors
    document.querySelectorAll('.field-error-js').forEach(el => el.remove());
    document.querySelectorAll('.field-invalid').forEach(el => el.classList.remove('field-invalid'));
    document.querySelectorAll('.label-error').forEach(el => el.classList.remove('label-error'));

    const valid = validateForm();

    if (!valid) {
        e.preventDefault();

        // Show top banner
        let banner = document.getElementById('validation-banner');
        if (!banner) {
            banner = document.createElement('div');
            banner.id = 'validation-banner';
            banner.style.cssText = 'background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.3);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:#e74c3c;';
            banner.innerHTML = '<i class=\"ri-error-warning-line\" style=\"font-size:18px;flex-shrink:0;\"></i> Veuillez remplir les champs obligatoires avant de continuer.';
            this.insertAdjacentElement('afterbegin', banner);
        }

        // Scroll to first invalid field
        const first = document.querySelector('.field-invalid');
        if (first) {
            first.scrollIntoView({ behavior: 'smooth', block: 'center' });
            first.focus();
        }
    }
});

// Clear error as user types
document.addEventListener('input', function(e) {
    if (e.target.matches('input, textarea, select')) {
        clearError(e.target);
        // Hide banner if no more errors
        if (!document.querySelector('.field-invalid')) {
            document.getElementById('validation-banner')?.remove();
        }
    }
});

// Mark server-side errors on load
document.querySelectorAll('.field-error:not(.field-error-js)').forEach(err => {
    const input = err.closest('.form-group-d')?.querySelector('input, textarea, select');
    if (input) input.classList.add('field-invalid');
});

// Media previews
function previewVideo(url) {
    const preview = document.getElementById('video-preview');
    const frame   = document.getElementById('video-frame');
    if (url && url.includes('youtube.com/embed')) {
        frame.src = url;
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
        frame.src = '';
    }
}

function previewImage(url) {
    const preview = document.getElementById('image-preview');
    const img     = document.getElementById('image-thumb');
    if (url) { img.src = url; preview.style.display = 'block'; }
    else     { preview.style.display = 'none'; }
}

document.addEventListener('DOMContentLoaded', () => {
    const vUrl = document.getElementById('video_url_input');
    const iUrl = document.getElementById('image_url_input');
    if (vUrl?.value) previewVideo(vUrl.value);
    if (iUrl?.value) previewImage(iUrl.value);
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/chapitre/form.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  767 => 353,  740 => 329,  691 => 283,  687 => 282,  684 => 281,  671 => 280,  658 => 277,  653 => 276,  648 => 273,  645 => 272,  643 => 271,  641 => 270,  633 => 264,  628 => 262,  624 => 260,  616 => 253,  605 => 248,  601 => 247,  595 => 244,  591 => 243,  583 => 238,  579 => 237,  573 => 234,  569 => 233,  563 => 230,  559 => 229,  555 => 228,  549 => 225,  545 => 224,  541 => 223,  534 => 219,  530 => 218,  526 => 217,  521 => 214,  517 => 213,  512 => 210,  504 => 203,  494 => 199,  490 => 198,  483 => 194,  479 => 193,  473 => 190,  469 => 189,  465 => 188,  459 => 184,  455 => 183,  450 => 180,  442 => 174,  438 => 173,  432 => 170,  428 => 169,  418 => 162,  414 => 161,  409 => 158,  398 => 149,  394 => 148,  389 => 145,  381 => 139,  377 => 138,  370 => 134,  366 => 133,  359 => 129,  355 => 128,  350 => 125,  343 => 120,  339 => 119,  332 => 115,  328 => 114,  320 => 109,  316 => 108,  310 => 104,  307 => 102,  301 => 98,  295 => 96,  292 => 95,  286 => 93,  284 => 92,  277 => 87,  275 => 86,  270 => 83,  262 => 78,  256 => 75,  250 => 74,  246 => 73,  242 => 72,  237 => 70,  233 => 68,  220 => 67,  154 => 10,  141 => 9,  118 => 7,  95 => 6,  71 => 5,  60 => 1,  58 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% form_theme form 'admin/_form_theme.html.twig' %}

{% block title %}{{ mode == 'new' ? 'Nouveau chapitre' : 'Modifier — ' ~ chapitre.titre }} — Admin{% endblock %}
{% block page_title %}{{ mode == 'new' ? 'Nouveau chapitre' : 'Modifier le chapitre' }}{% endblock %}
{% block section_title %}{{ cours.nomCours }}{% endblock %}

{% block stylesheets %}
<style>
/* ── shared tree styles ── */
.sb { background:#fff; border:1px solid var(--border); border-radius:12px; padding:24px; margin-bottom:20px; }

/* ── Validation errors ── */
.field-error {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #e74c3c;
}
.field-error i { font-size: 13px; flex-shrink: 0; }
.field-invalid {
    border-color: #e74c3c !important;
    box-shadow: 0 0 0 3px rgba(231,76,60,.1) !important;
}
.form-group-d:has(.field-error) > label,
.label-error { color: #e74c3c !important; }
.sb-head {
    font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase;
    color:var(--blue); margin-bottom:20px; padding-bottom:12px;
    border-bottom:1px solid var(--border); display:flex; align-items:center; gap:8px;
}
.sb-head i { font-size:16px; }
.grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
@media(max-width:700px){ .grid-2,.grid-3 { grid-template-columns:1fr; } }

/* Collection */
.coll-item {
    background:#f8f9fa; border:1px solid var(--border); border-radius:8px;
    padding:16px 16px 10px; margin-bottom:10px; position:relative;
}
.coll-item .btn-rm {
    position:absolute; top:10px; right:10px; background:none; border:none;
    color:#e74c3c; cursor:pointer; font-size:16px; line-height:1; padding:2px 6px;
    border-radius:4px; transition:background .15s;
}
.coll-item .btn-rm:hover { background:rgba(231,76,60,.1); }
.btn-add {
    display:inline-flex; align-items:center; gap:6px; margin-top:6px;
    padding:8px 16px; border-radius:8px; border:1.5px dashed var(--border);
    background:#fff; color:var(--blue); font-size:13px; font-weight:600;
    cursor:pointer; transition:all .2s;
}
.btn-add:hover { border-color:var(--blue); background:rgba(26,111,196,.05); }

/* Preview strip */
.media-preview { margin-top:8px; border-radius:8px; overflow:hidden; max-height:160px; display:none; }
.media-preview img { width:100%; height:160px; object-fit:cover; display:block; }
.media-preview iframe { width:100%; height:160px; border:none; display:block; }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>{{ mode == 'new' ? 'Nouveau chapitre' : 'Modifier — ' ~ chapitre.titre }}</h1>
        <div class=\"breadcrumb-d\">
            <a href=\"{{ path('admin_dashboard') }}\">Dashboard</a> ›
            <a href=\"{{ path('admin_cours_index') }}\">Cours</a> ›
            <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\">{{ cours.nomCours }}</a> ›
            {{ mode == 'new' ? 'Nouveau chapitre' : chapitre.titre }}
        </div>
    </div>
    <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\" class=\"btn-dinari btn-secondary-d\">
        <i class=\"ri-arrow-left-line\"></i> Retour
    </a>
</div>

{{ form_start(form, {attr: {novalidate: 'novalidate', id: 'chapitre-form'}}) }}

{# ── Global error summary ── #}
{% if not form.vars.valid and form.vars.submitted %}
<div style=\"background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.25);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:flex-start;gap:10px;\">
    <i class=\"ri-error-warning-line\" style=\"color:#e74c3c;font-size:18px;flex-shrink:0;margin-top:1px;\"></i>
    <div style=\"font-size:13px;color:#e74c3c;\">
        <strong>Veuillez corriger les erreurs suivantes :</strong>
        <ul style=\"margin:6px 0 0;padding-left:16px;\">
            {% if form.titre.vars.errors|length > 0 %}
                <li>Titre : {{ form.titre.vars.errors[0].message }}</li>
            {% endif %}
            {% if form.position.vars.errors|length > 0 %}
                <li>Ordre : {{ form.position.vars.errors[0].message }}</li>
            {% endif %}
        </ul>
    </div>
</div>
{% endif %}

{# ══ 1. IDENTITÉ ══ #}
<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-bookmark-line\"></i> Identité du chapitre</div>
    <div class=\"grid-2\" style=\"margin-bottom:16px;\">
        <div class=\"form-group-d\">
            {{ form_label(form.position) }}
            {{ form_widget(form.position) }}
        </div>
        <div></div>
    </div>
    <div class=\"form-group-d\">
        {{ form_label(form.titre) }}
        {{ form_widget(form.titre, {attr: {class: 'form-control'}}) }}
    </div>
    </div>
    <div class=\"form-group-d\">
        {{ form_label(form.sousTitre) }}
        {{ form_widget(form.sousTitre) }}
    </div>
</div>

{# ══ 2. CONTENU ÉDUCATIF ══ #}
<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-file-text-line\"></i> Contenu éducatif</div>
    <div class=\"form-group-d\">
        {{ form_label(form.intro) }}
        {{ form_widget(form.intro) }}
        <small style=\"color:var(--muted);font-size:12px;\">Affiché dans le bandeau bleu en haut du chapitre.</small>
    </div>
    <div class=\"form-group-d\">
        {{ form_label(form.contenuPrincipal) }}
        {{ form_widget(form.contenuPrincipal) }}
        <small style=\"color:var(--muted);font-size:12px;\">Bloc d'explication principal visible dans la section \"Qu'est-ce que...\".</small>
    </div>
    <div class=\"form-group-d\">
        {{ form_label(form.aRetenir) }}
        {{ form_widget(form.aRetenir) }}
        <small style=\"color:var(--muted);font-size:12px;\">Affiché dans l'encadré bleu \"💡 À retenir\".</small>
    </div>
</div>

{# ══ 3. VIDÉO ══ #}
<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-video-line\"></i> Vidéo</div>
    <div class=\"form-group-d\">
        {{ form_label(form.videoUrl) }}
        {{ form_widget(form.videoUrl, {attr: {id: 'video_url_input', oninput: 'previewVideo(this.value)'}}) }}
        <small style=\"color:var(--muted);font-size:12px;\">Utiliser l'URL embed YouTube : https://www.youtube.com/embed/ID</small>
    </div>
    <div class=\"media-preview\" id=\"video-preview\">
        <iframe id=\"video-frame\" src=\"\" allowfullscreen></iframe>
    </div>
</div>

{# ══ 4. IMAGE ══ #}
<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-image-line\"></i> Image / Illustration</div>
    <div class=\"form-group-d\">
        {{ form_label(form.imageUrl) }}
        {{ form_widget(form.imageUrl, {attr: {id: 'image_url_input', oninput: 'previewImage(this.value)'}}) }}
    </div>
    <div class=\"media-preview\" id=\"image-preview\">
        <img id=\"image-thumb\" src=\"\" alt=\"Aperçu\">
    </div>
    <div class=\"grid-2\" style=\"margin-top:12px;\">
        <div class=\"form-group-d\">
            {{ form_label(form.imageTitre) }}
            {{ form_widget(form.imageTitre) }}
        </div>
        <div class=\"form-group-d\">
            {{ form_label(form.imageDescription) }}
            {{ form_widget(form.imageDescription) }}
        </div>
    </div>
</div>

{# ══ 5. TÂCHES ══ #}
<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-checkbox-line\"></i> Tâches du chapitre</div>
    <div id=\"taches-list\">
        {% for tache in form.taches %}
            <div class=\"coll-item\">
                <button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
                <div class=\"grid-2\" style=\"margin-bottom:10px;\">
                    <div class=\"form-group-d\" style=\"margin-bottom:0;\">
                        {{ form_label(tache.libelle) }}
                        {{ form_widget(tache.libelle) }}
                        {{ form_errors(tache.libelle) }}
                    </div>
                    <div class=\"form-group-d\" style=\"margin-bottom:0;\">
                        {{ form_label(tache.position) }}
                        {{ form_widget(tache.position) }}
                    </div>
                </div>
                <div class=\"form-group-d\" style=\"margin-bottom:0;\">
                    {{ form_label(tache.description) }}
                    {{ form_widget(tache.description) }}
                </div>
            </div>
        {% endfor %}
    </div>
    <button type=\"button\" class=\"btn-add\" onclick=\"addTache()\">
        <i class=\"ri-add-line\"></i> Ajouter une tâche
    </button>
</div>

{# ══ 6. QUESTIONS QCM ══ #}
<div class=\"sb\">
    <div class=\"sb-head\"><i class=\"ri-question-answer-line\"></i> Questions QCM</div>
    <div id=\"questions-list\">
        {% for q in form.questions %}
            <div class=\"coll-item\">
                <button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
                <div class=\"form-group-d\">
                    {{ form_label(q.question) }}
                    {{ form_widget(q.question) }}
                    {{ form_errors(q.question) }}
                </div>
                <div class=\"grid-2\">
                    <div class=\"form-group-d\">
                        {{ form_label(q.choixA) }}
                        {{ form_widget(q.choixA) }}
                        {{ form_errors(q.choixA) }}
                    </div>
                    <div class=\"form-group-d\">
                        {{ form_label(q.choixB) }}
                        {{ form_widget(q.choixB) }}
                        {{ form_errors(q.choixB) }}
                    </div>
                    <div class=\"form-group-d\">
                        {{ form_label(q.choixC) }}
                        {{ form_widget(q.choixC) }}
                    </div>
                    <div class=\"form-group-d\">
                        {{ form_label(q.choixD) }}
                        {{ form_widget(q.choixD) }}
                    </div>
                </div>
                <div class=\"grid-2\">
                    <div class=\"form-group-d\">
                        {{ form_label(q.bonneReponse) }}
                        {{ form_widget(q.bonneReponse) }}
                    </div>
                    <div class=\"form-group-d\">
                        {{ form_label(q.position) }}
                        {{ form_widget(q.position) }}
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
    <button type=\"button\" class=\"btn-add\" onclick=\"addQuestion()\">
        <i class=\"ri-add-line\"></i> Ajouter une question
    </button>
</div>

{# ══ SUBMIT ══ #}
<div style=\"display:flex;gap:10px;padding-bottom:40px;\">
    <button type=\"submit\" class=\"btn-dinari btn-primary-d\">
        <i class=\"ri-save-line\"></i> {{ mode == 'new' ? 'Créer le chapitre' : 'Enregistrer les modifications' }}
    </button>
    <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\" class=\"btn-dinari btn-secondary-d\">
        Annuler
    </a>
</div>

{# Capture prototypes BEFORE form_end so they are not considered already rendered #}
{% set tache_proto_html    = form_widget(form.taches.vars.prototype)|e('html_attr') %}
{% set question_proto_html = form_widget(form.questions.vars.prototype)|e('html_attr') %}

{{ form_end(form) }}

{# Prototype containers — use the captured variables #}
<div id=\"tache-proto\"    data-proto=\"{{ tache_proto_html }}\"    style=\"display:none\"></div>
<div id=\"question-proto\" data-proto=\"{{ question_proto_html }}\" style=\"display:none\"></div>
{% endblock %}

{% block javascripts %}
<script>
let tIdx = {{ form.taches|length }};
let qIdx = {{ form.questions|length }};

function addTache() {
    const proto = document.getElementById('tache-proto').dataset.proto;
    const html  = proto.replace(/__name__/g, tIdx++);
    const div   = document.createElement('div');
    div.className = 'coll-item';
    div.innerHTML = `<button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
        <div class=\"grid-2\" style=\"margin-bottom:10px;\">
            <div class=\"form-group-d\" style=\"margin-bottom:0;\">\${extractField(html, 'libelle', 'Titre de la tâche')}</div>
            <div class=\"form-group-d\" style=\"margin-bottom:0;\">\${extractField(html, 'position', 'Ordre')}</div>
        </div>
        <div class=\"form-group-d\" style=\"margin-bottom:0;\">\${extractField(html, 'description', 'Description (optionnel)')}</div>`;
    document.getElementById('taches-list').appendChild(div);
}

function addQuestion() {
    const proto = document.getElementById('question-proto').dataset.proto;
    const html  = proto.replace(/__name__/g, qIdx++);
    const div   = document.createElement('div');
    div.className = 'coll-item';
    div.innerHTML = `<button type=\"button\" class=\"btn-rm\" onclick=\"this.closest('.coll-item').remove()\" title=\"Supprimer\">×</button>
        <div class=\"form-group-d\">\${extractField(html, 'question', 'Question')}</div>
        <div class=\"grid-2\">
            <div class=\"form-group-d\">\${extractField(html, 'choixA', 'Choix A')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'choixB', 'Choix B')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'choixC', 'Choix C')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'choixD', 'Choix D')}</div>
        </div>
        <div class=\"grid-2\">
            <div class=\"form-group-d\">\${extractField(html, 'bonneReponse', 'Bonne réponse')}</div>
            <div class=\"form-group-d\">\${extractField(html, 'position', 'Ordre')}</div>
        </div>`;
    document.getElementById('questions-list').appendChild(div);
}

function extractField(html, name, label) {
    const tmp = document.createElement('div');
    tmp.innerHTML = html;
    const input = tmp.querySelector(`[id\$=\"_\${name}\"], [name\$=\"[\${name}]\"]`);
    if (!input) return html;
    return `<label style=\"display:block;font-size:13px;font-weight:600;color:var(--text);margin-bottom:6px;\">\${label}</label>\${input.outerHTML}`;
}

// ── Validation ──
const REQUIRED_FIELDS = [
    { selector: '[name\$=\"[titre]\"], #{{ form.titre.vars.id }}', label: 'Titre du chapitre' },
];

function setError(input, message) {
    clearError(input);
    input.classList.add('field-invalid');
    const group = input.closest('.form-group-d');
    if (group) {
        group.querySelector('label')?.classList.add('label-error');
        const err = document.createElement('div');
        err.className = 'field-error field-error-js';
        err.innerHTML = '<i class=\"ri-error-warning-line\"></i> ' + message;
        input.insertAdjacentElement('afterend', err);
    }
}

function clearError(input) {
    input.classList.remove('field-invalid');
    input.closest('.form-group-d')?.querySelector('label')?.classList.remove('label-error');
    input.parentElement?.querySelector('.field-error-js')?.remove();
}

function validateForm() {
    // Find the titre input by id
    const titreInput = document.getElementById('{{ form.titre.vars.id }}');
    let valid = true;

    if (titreInput && titreInput.value.trim() === '') {
        setError(titreInput, 'Le titre est obligatoire.');
        valid = false;
    }

    return valid;
}

document.getElementById('chapitre-form').addEventListener('submit', function(e) {
    // Clear previous JS errors
    document.querySelectorAll('.field-error-js').forEach(el => el.remove());
    document.querySelectorAll('.field-invalid').forEach(el => el.classList.remove('field-invalid'));
    document.querySelectorAll('.label-error').forEach(el => el.classList.remove('label-error'));

    const valid = validateForm();

    if (!valid) {
        e.preventDefault();

        // Show top banner
        let banner = document.getElementById('validation-banner');
        if (!banner) {
            banner = document.createElement('div');
            banner.id = 'validation-banner';
            banner.style.cssText = 'background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.3);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:#e74c3c;';
            banner.innerHTML = '<i class=\"ri-error-warning-line\" style=\"font-size:18px;flex-shrink:0;\"></i> Veuillez remplir les champs obligatoires avant de continuer.';
            this.insertAdjacentElement('afterbegin', banner);
        }

        // Scroll to first invalid field
        const first = document.querySelector('.field-invalid');
        if (first) {
            first.scrollIntoView({ behavior: 'smooth', block: 'center' });
            first.focus();
        }
    }
});

// Clear error as user types
document.addEventListener('input', function(e) {
    if (e.target.matches('input, textarea, select')) {
        clearError(e.target);
        // Hide banner if no more errors
        if (!document.querySelector('.field-invalid')) {
            document.getElementById('validation-banner')?.remove();
        }
    }
});

// Mark server-side errors on load
document.querySelectorAll('.field-error:not(.field-error-js)').forEach(err => {
    const input = err.closest('.form-group-d')?.querySelector('input, textarea, select');
    if (input) input.classList.add('field-invalid');
});

// Media previews
function previewVideo(url) {
    const preview = document.getElementById('video-preview');
    const frame   = document.getElementById('video-frame');
    if (url && url.includes('youtube.com/embed')) {
        frame.src = url;
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
        frame.src = '';
    }
}

function previewImage(url) {
    const preview = document.getElementById('image-preview');
    const img     = document.getElementById('image-thumb');
    if (url) { img.src = url; preview.style.display = 'block'; }
    else     { preview.style.display = 'none'; }
}

document.addEventListener('DOMContentLoaded', () => {
    const vUrl = document.getElementById('video_url_input');
    const iUrl = document.getElementById('image_url_input');
    if (vUrl?.value) previewVideo(vUrl.value);
    if (iUrl?.value) previewImage(iUrl.value);
});
</script>
{% endblock %}
", "admin/chapitre/form.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\chapitre\\form.html.twig");
    }
}
