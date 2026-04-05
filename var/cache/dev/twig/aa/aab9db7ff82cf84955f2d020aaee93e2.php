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

/* admin/cours/index.html.twig */
class __TwigTemplate_ebec71b693dd5ffd8c3771bfdd792ed6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/cours/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/cours/index.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        yield "Cours — Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        yield "Cours";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        yield "Gestion des cours";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
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

        // line 8
        yield "<style>
/* ── shared tree styles ── */
.tree-wrap { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:24px; }
.tree-toolbar {
    display:flex; align-items:center; gap:12px; flex-wrap:wrap;
    padding:14px 20px; border-bottom:1px solid var(--border);
}
.tree-toolbar .tt-title { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.search-wrap { position:relative; width:280px; }
.search-wrap i { position:absolute; left:11px; top:50%; transform:translateY(-50%); color:var(--muted); font-size:14px; pointer-events:none; }
.search-input {
    width:100%; padding:8px 12px 8px 34px;
    border:1.5px solid var(--border); border-radius:8px;
    font-size:13px; font-family:'Raleway',sans-serif; color:var(--text);
    transition:border-color .2s; background:#fff;
}
.search-input:focus { outline:none; border-color:var(--blue); box-shadow:0 0 0 3px rgba(26,111,196,.08); }
.search-input::placeholder { color:#b0bec5; }

.tree-body { padding:6px 0; }
.tree-empty { text-align:center; padding:36px; color:var(--muted); font-size:14px; }

/* cours row */
.c-node { border-bottom:1px solid #f0f4f8; }
.c-node:last-child { border-bottom:none; }
.c-row {
    display:flex; align-items:center; gap:10px; padding:11px 18px;
    cursor:pointer; transition:background .15s; user-select:none;
}
.c-row:hover { background:#f8f9fa; }
.c-arrow { width:18px; height:18px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:12px; flex-shrink:0; transition:transform .2s; }
.c-node.open > .c-row .c-arrow { transform:rotate(90deg); }
.c-icon { color:var(--blue); font-size:16px; flex-shrink:0; }
.c-name { font-size:14px; font-weight:700; color:var(--text); flex:1; min-width:0; }
.c-badge { font-size:11px; color:var(--muted); white-space:nowrap; }
.c-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; flex-shrink:0; }
.c-row:hover .c-actions { opacity:1; }

/* chapter row */
.ch-list { display:none; background:#fafbfc; }
.c-node.open > .ch-list { display:block; }
.ch-node { border-bottom:1px solid #f5f7fa; }
.ch-node:last-child { border-bottom:none; }
.ch-row {
    display:flex; align-items:center; gap:9px; padding:9px 18px 9px 44px;
    cursor:pointer; transition:background .15s; user-select:none;
}
.ch-row:hover { background:#f0f4f8; }
.ch-arrow { width:16px; height:16px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:11px; flex-shrink:0; transition:transform .2s; }
.ch-node.open > .ch-row .ch-arrow { transform:rotate(90deg); }
.ch-icon { color:#27ae60; font-size:14px; flex-shrink:0; }
.ch-name { font-size:13px; font-weight:600; color:var(--text); flex:1; min-width:0; }
.ch-sub { font-size:11px; color:var(--muted); }
.ch-pos { font-size:10px; font-weight:700; background:#eef4fd; color:var(--blue); padding:1px 7px; border-radius:10px; }
.ch-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; flex-shrink:0; }
.ch-row:hover .ch-actions { opacity:1; }

/* task row */
.t-list { display:none; background:#f5f7fa; }
.ch-node.open > .t-list { display:block; }
.t-row { display:flex; align-items:flex-start; gap:8px; padding:7px 18px 7px 72px; border-bottom:1px solid #eef0f3; font-size:12px; color:var(--muted); }
.t-row:last-child { border-bottom:none; }
.t-row i { color:#f39c12; font-size:13px; flex-shrink:0; margin-top:1px; }

/* action buttons */
.tb { display:inline-flex; align-items:center; gap:4px; padding:4px 9px; border-radius:6px; font-size:11px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .15s; font-family:'Raleway',sans-serif; white-space:nowrap; }
.tb-edit  { background:#fff7e6; color:#f39c12; border:1px solid #fde8b0; }
.tb-edit:hover  { background:#fde8b0; color:#e67e22; }
.tb-ch    { background:#eef4fd; color:var(--blue); border:1px solid #c8ddf5; }
.tb-ch:hover    { background:#c8ddf5; }
.tb-del   { background:rgba(231,76,60,.08); color:#e74c3c; border:1px solid rgba(231,76,60,.2); }
.tb-del:hover   { background:rgba(231,76,60,.15); }

/* search highlight */
.hl { background:#fff3cd; border-radius:2px; padding:0 2px; }
.c-node.hidden { display:none; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 87
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

        // line 88
        yield "<div class=\"page-header\">
    <div>
        <h1>Cours</h1>
        <div class=\"breadcrumb-d\"><a href=\"";
        // line 91
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Dashboard</a> › Cours</div>
    </div>
    <a href=\"";
        // line 93
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_new");
        yield "\" class=\"btn-dinari btn-primary-d\">
        <i class=\"ri-add-line\"></i> Nouveau cours
    </a>
</div>

";
        // line 99
        yield "<div class=\"tree-wrap\">
    <div class=\"tree-toolbar\">
        <span class=\"tt-title\"><i class=\"ri-node-tree\" style=\"color:var(--blue);margin-right:6px;\"></i> Arborescence</span>
        <div class=\"search-wrap\">
            <i class=\"ri-search-line\"></i>
            <input type=\"text\" id=\"cours-search\" class=\"search-input\" placeholder=\"Rechercher un cours...\" autocomplete=\"off\">
        </div>
    </div>
    <div class=\"tree-body\" id=\"cours-tree\">
        ";
        // line 108
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 108, $this->source); })()))) {
            // line 109
            yield "            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun cours.</div>
        ";
        } else {
            // line 111
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 111, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                // line 112
                yield "                <div class=\"c-node\" data-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 112)), "html", null, true);
                yield "\">
                    <div class=\"c-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"c-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line c-icon\"></i>
                        <span class=\"c-name\">";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 116), "html", null, true);
                yield "</span>
                        <span class=\"c-badge\">";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 117)), "html", null, true);
                yield " chapitre";
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 117)) != 1)) ? ("s") : (""));
                yield "</span>
                        <div class=\"c-actions\">
                            <a href=\"";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 119)]), "html", null, true);
                yield "\" class=\"tb tb-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i> Modifier</a>
                            <a href=\"";
                // line 120
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 120)]), "html", null, true);
                yield "\" class=\"tb tb-ch\" onclick=\"event.stopPropagation()\"><i class=\"ri-list-ordered\"></i> Chapitres</a>
                        </div>
                    </div>
                    <div class=\"ch-list\">
                        ";
                // line 124
                if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 124))) {
                    // line 125
                    yield "                            <div style=\"padding:9px 44px;font-size:12px;color:var(--muted);font-style:italic;\">
                                Aucun chapitre — <a href=\"";
                    // line 126
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_new", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 126)]), "html", null, true);
                    yield "\" style=\"color:var(--blue);\">Ajouter</a>
                            </div>
                        ";
                } else {
                    // line 129
                    yield "                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 129));
                    foreach ($context['_seq'] as $context["_key"] => $context["ch"]) {
                        // line 130
                        yield "                                <div class=\"ch-node\">
                                    <div class=\"ch-row\" onclick=\"toggle(this.parentElement)\">
                                        <span class=\"ch-arrow\">
                                            ";
                        // line 133
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 133)) > 0)) {
                            yield "<i class=\"ri-arrow-right-s-line\"></i>";
                        } else {
                            yield "<i class=\"ri-subtract-line\" style=\"opacity:.25;\"></i>";
                        }
                        // line 134
                        yield "                                        </span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">";
                        // line 136
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "titre", [], "any", false, false, false, 136), "html", null, true);
                        yield "</span>
                                        ";
                        // line 137
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 137)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            yield "<span class=\"ch-sub\">— ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 137), "html", null, true);
                            yield "</span>";
                        }
                        // line 138
                        yield "                                        <span class=\"ch-pos\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "position", [], "any", false, false, false, 138), "html", null, true);
                        yield "</span>
                                        <span class=\"c-badge\">";
                        // line 139
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 139)), "html", null, true);
                        yield " tâche";
                        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 139)) != 1)) ? ("s") : (""));
                        yield "</span>
                                        <div class=\"ch-actions\">
                                            <a href=\"";
                        // line 141
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_edit", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 141), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "id", [], "any", false, false, false, 141)]), "html", null, true);
                        yield "\" class=\"tb tb-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i></a>
                                        </div>
                                    </div>
                                    ";
                        // line 144
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 144)) > 0)) {
                            // line 145
                            yield "                                        <div class=\"t-list\">
                                            ";
                            // line 146
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 146));
                            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                                // line 147
                                yield "                                                <div class=\"t-row\">
                                                    <i class=\"ri-checkbox-blank-circle-line\"></i>
                                                    <span>";
                                // line 149
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "libelle", [], "any", false, false, false, 149), "html", null, true);
                                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 149)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                    yield " <span style=\"color:#b0bec5;\">— ";
                                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 149), "html", null, true);
                                    yield "</span>";
                                }
                                yield "</span>
                                                </div>
                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 152
                            yield "                                        </div>
                                    ";
                        }
                        // line 154
                        yield "                                </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['ch'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 156
                    yield "                        ";
                }
                // line 157
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cours'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            yield "        ";
        }
        // line 161
        yield "    </div>
</div>

";
        // line 165
        yield "<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 167, $this->source); })())), "html", null, true);
        yield " cours au total</span>
    </div>
    ";
        // line 169
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 169, $this->source); })()))) {
            // line 170
            yield "        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun cours pour l'instant.</p>
    ";
        } else {
            // line 172
            yield "        <table class=\"table-dinari\" id=\"cours-table\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date création</th>
                    <th>Chapitres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 184
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 184, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                // line 185
                yield "                <tr data-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 185)), "html", null, true);
                yield "\">
                    <td>";
                // line 186
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 186), "html", null, true);
                yield "</td>
                    <td><strong>";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 187), "html", null, true);
                yield "</strong></td>
                    <td style=\"max-width:260px;color:var(--muted);font-size:13px;\">
                        ";
                // line 189
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", true, true, false, 189)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 189), "—")) : ("—")), 0, 80), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 189)) > 80)) {
                    yield "…";
                }
                // line 190
                yield "                    </td>
                    <td>";
                // line 191
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 191)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 191), "d/m/Y"), "html", null, true)) : ("—"));
                yield "</td>
                    <td>
                        <a href=\"";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 193)]), "html", null, true);
                yield "\"
                           class=\"badge-dinari badge-info\" style=\"text-decoration:none;\">
                            <i class=\"ri-list-ordered\"></i>
                            ";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 196)), "html", null, true);
                yield " chapitre";
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 196)) != 1)) ? ("s") : (""));
                yield "
                        </a>
                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"";
                // line 201
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 201)]), "html", null, true);
                yield "\" class=\"btn-dinari btn-secondary-d btn-sm-d\" title=\"Chapitres\"><i class=\"ri-list-ordered\"></i></a>
                            <a href=\"";
                // line 202
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 202)]), "html", null, true);
                yield "\" class=\"btn-dinari btn-warning-d btn-sm-d\" title=\"Modifier\"><i class=\"ri-edit-line\"></i></a>
                            <form method=\"POST\" action=\"";
                // line 203
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 203)]), "html", null, true);
                yield "\"
                                  onsubmit=\"return confirm(
                                    ";
                // line 205
                $context["nbCh"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 205));
                // line 206
                yield "                                    ";
                $context["nbQz"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "quizzes", [], "any", false, false, false, 206));
                // line 207
                yield "                                    ";
                if ((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 207, $this->source); })()) > 0) || ((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 207, $this->source); })()) > 0))) {
                    // line 208
                    yield "                                        'Supprimer « ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 208), "html", null, true);
                    yield " » ?\\n\\n";
                    if (((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 208, $this->source); })()) > 0)) {
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 208, $this->source); })()), "html", null, true);
                        yield " chapitre";
                        yield ((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 208, $this->source); })()) > 1)) ? ("s") : (""));
                    }
                    if ((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 208, $this->source); })()) > 0) && ((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 208, $this->source); })()) > 0))) {
                        yield " et ";
                    }
                    if (((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 208, $this->source); })()) > 0)) {
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 208, $this->source); })()), "html", null, true);
                        yield " quiz";
                    }
                    yield " associé";
                    yield (((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 208, $this->source); })()) + (isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 208, $this->source); })())) > 1)) ? ("s") : (""));
                    yield " seront également supprimés.'
                                    ";
                } else {
                    // line 210
                    yield "                                        'Supprimer le cours « ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 210), "html", null, true);
                    yield " » ?'
                                    ";
                }
                // line 212
                yield "                                  )\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 213
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_cours_" . CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 213))), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\" title=\"Supprimer\"><i class=\"ri-delete-bin-line\"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cours'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 220
            yield "            </tbody>
        </table>
    ";
        }
        // line 223
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 226
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

        // line 227
        yield "<script>
function toggle(node) { node.classList.toggle('open'); }

// Live search — filters both tree nodes and table rows simultaneously
document.getElementById('cours-search').addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();

    // Tree
    document.querySelectorAll('#cours-tree .c-node').forEach(node => {
        const name = node.dataset.name || '';
        const match = !q || name.includes(q);
        node.classList.toggle('hidden', !match);
        if (match && q) node.classList.add('open');
    });

    // Table
    document.querySelectorAll('#cours-table tbody tr').forEach(row => {
        const name = row.dataset.name || '';
        row.style.display = (!q || name.includes(q)) ? '' : 'none';
    });
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
        return "admin/cours/index.html.twig";
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
        return array (  607 => 227,  594 => 226,  582 => 223,  577 => 220,  564 => 213,  561 => 212,  555 => 210,  534 => 208,  531 => 207,  528 => 206,  526 => 205,  521 => 203,  517 => 202,  513 => 201,  503 => 196,  497 => 193,  492 => 191,  489 => 190,  484 => 189,  479 => 187,  475 => 186,  470 => 185,  466 => 184,  452 => 172,  448 => 170,  446 => 169,  441 => 167,  437 => 165,  432 => 161,  429 => 160,  421 => 157,  418 => 156,  411 => 154,  407 => 152,  393 => 149,  389 => 147,  385 => 146,  382 => 145,  380 => 144,  374 => 141,  367 => 139,  362 => 138,  356 => 137,  352 => 136,  348 => 134,  342 => 133,  337 => 130,  332 => 129,  326 => 126,  323 => 125,  321 => 124,  314 => 120,  310 => 119,  303 => 117,  299 => 116,  291 => 112,  286 => 111,  282 => 109,  280 => 108,  269 => 99,  261 => 93,  256 => 91,  251 => 88,  238 => 87,  150 => 8,  137 => 7,  114 => 5,  91 => 4,  68 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Cours — Admin{% endblock %}
{% block page_title %}Cours{% endblock %}
{% block section_title %}Gestion des cours{% endblock %}

{% block stylesheets %}
<style>
/* ── shared tree styles ── */
.tree-wrap { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:24px; }
.tree-toolbar {
    display:flex; align-items:center; gap:12px; flex-wrap:wrap;
    padding:14px 20px; border-bottom:1px solid var(--border);
}
.tree-toolbar .tt-title { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.search-wrap { position:relative; width:280px; }
.search-wrap i { position:absolute; left:11px; top:50%; transform:translateY(-50%); color:var(--muted); font-size:14px; pointer-events:none; }
.search-input {
    width:100%; padding:8px 12px 8px 34px;
    border:1.5px solid var(--border); border-radius:8px;
    font-size:13px; font-family:'Raleway',sans-serif; color:var(--text);
    transition:border-color .2s; background:#fff;
}
.search-input:focus { outline:none; border-color:var(--blue); box-shadow:0 0 0 3px rgba(26,111,196,.08); }
.search-input::placeholder { color:#b0bec5; }

.tree-body { padding:6px 0; }
.tree-empty { text-align:center; padding:36px; color:var(--muted); font-size:14px; }

/* cours row */
.c-node { border-bottom:1px solid #f0f4f8; }
.c-node:last-child { border-bottom:none; }
.c-row {
    display:flex; align-items:center; gap:10px; padding:11px 18px;
    cursor:pointer; transition:background .15s; user-select:none;
}
.c-row:hover { background:#f8f9fa; }
.c-arrow { width:18px; height:18px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:12px; flex-shrink:0; transition:transform .2s; }
.c-node.open > .c-row .c-arrow { transform:rotate(90deg); }
.c-icon { color:var(--blue); font-size:16px; flex-shrink:0; }
.c-name { font-size:14px; font-weight:700; color:var(--text); flex:1; min-width:0; }
.c-badge { font-size:11px; color:var(--muted); white-space:nowrap; }
.c-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; flex-shrink:0; }
.c-row:hover .c-actions { opacity:1; }

/* chapter row */
.ch-list { display:none; background:#fafbfc; }
.c-node.open > .ch-list { display:block; }
.ch-node { border-bottom:1px solid #f5f7fa; }
.ch-node:last-child { border-bottom:none; }
.ch-row {
    display:flex; align-items:center; gap:9px; padding:9px 18px 9px 44px;
    cursor:pointer; transition:background .15s; user-select:none;
}
.ch-row:hover { background:#f0f4f8; }
.ch-arrow { width:16px; height:16px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:11px; flex-shrink:0; transition:transform .2s; }
.ch-node.open > .ch-row .ch-arrow { transform:rotate(90deg); }
.ch-icon { color:#27ae60; font-size:14px; flex-shrink:0; }
.ch-name { font-size:13px; font-weight:600; color:var(--text); flex:1; min-width:0; }
.ch-sub { font-size:11px; color:var(--muted); }
.ch-pos { font-size:10px; font-weight:700; background:#eef4fd; color:var(--blue); padding:1px 7px; border-radius:10px; }
.ch-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; flex-shrink:0; }
.ch-row:hover .ch-actions { opacity:1; }

/* task row */
.t-list { display:none; background:#f5f7fa; }
.ch-node.open > .t-list { display:block; }
.t-row { display:flex; align-items:flex-start; gap:8px; padding:7px 18px 7px 72px; border-bottom:1px solid #eef0f3; font-size:12px; color:var(--muted); }
.t-row:last-child { border-bottom:none; }
.t-row i { color:#f39c12; font-size:13px; flex-shrink:0; margin-top:1px; }

/* action buttons */
.tb { display:inline-flex; align-items:center; gap:4px; padding:4px 9px; border-radius:6px; font-size:11px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .15s; font-family:'Raleway',sans-serif; white-space:nowrap; }
.tb-edit  { background:#fff7e6; color:#f39c12; border:1px solid #fde8b0; }
.tb-edit:hover  { background:#fde8b0; color:#e67e22; }
.tb-ch    { background:#eef4fd; color:var(--blue); border:1px solid #c8ddf5; }
.tb-ch:hover    { background:#c8ddf5; }
.tb-del   { background:rgba(231,76,60,.08); color:#e74c3c; border:1px solid rgba(231,76,60,.2); }
.tb-del:hover   { background:rgba(231,76,60,.15); }

/* search highlight */
.hl { background:#fff3cd; border-radius:2px; padding:0 2px; }
.c-node.hidden { display:none; }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>Cours</h1>
        <div class=\"breadcrumb-d\"><a href=\"{{ path('admin_dashboard') }}\">Dashboard</a> › Cours</div>
    </div>
    <a href=\"{{ path('admin_cours_new') }}\" class=\"btn-dinari btn-primary-d\">
        <i class=\"ri-add-line\"></i> Nouveau cours
    </a>
</div>

{# ── TREE ── #}
<div class=\"tree-wrap\">
    <div class=\"tree-toolbar\">
        <span class=\"tt-title\"><i class=\"ri-node-tree\" style=\"color:var(--blue);margin-right:6px;\"></i> Arborescence</span>
        <div class=\"search-wrap\">
            <i class=\"ri-search-line\"></i>
            <input type=\"text\" id=\"cours-search\" class=\"search-input\" placeholder=\"Rechercher un cours...\" autocomplete=\"off\">
        </div>
    </div>
    <div class=\"tree-body\" id=\"cours-tree\">
        {% if cours_list is empty %}
            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun cours.</div>
        {% else %}
            {% for cours in cours_list %}
                <div class=\"c-node\" data-name=\"{{ cours.nomCours|lower }}\">
                    <div class=\"c-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"c-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line c-icon\"></i>
                        <span class=\"c-name\">{{ cours.nomCours }}</span>
                        <span class=\"c-badge\">{{ cours.chapitres|length }} chapitre{{ cours.chapitres|length != 1 ? 's' : '' }}</span>
                        <div class=\"c-actions\">
                            <a href=\"{{ path('admin_cours_edit', {id: cours.id}) }}\" class=\"tb tb-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i> Modifier</a>
                            <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\" class=\"tb tb-ch\" onclick=\"event.stopPropagation()\"><i class=\"ri-list-ordered\"></i> Chapitres</a>
                        </div>
                    </div>
                    <div class=\"ch-list\">
                        {% if cours.chapitres is empty %}
                            <div style=\"padding:9px 44px;font-size:12px;color:var(--muted);font-style:italic;\">
                                Aucun chapitre — <a href=\"{{ path('admin_chapitre_new', {coursId: cours.id}) }}\" style=\"color:var(--blue);\">Ajouter</a>
                            </div>
                        {% else %}
                            {% for ch in cours.chapitres %}
                                <div class=\"ch-node\">
                                    <div class=\"ch-row\" onclick=\"toggle(this.parentElement)\">
                                        <span class=\"ch-arrow\">
                                            {% if ch.taches|length > 0 %}<i class=\"ri-arrow-right-s-line\"></i>{% else %}<i class=\"ri-subtract-line\" style=\"opacity:.25;\"></i>{% endif %}
                                        </span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">{{ ch.titre }}</span>
                                        {% if ch.sousTitre %}<span class=\"ch-sub\">— {{ ch.sousTitre }}</span>{% endif %}
                                        <span class=\"ch-pos\">{{ ch.position }}</span>
                                        <span class=\"c-badge\">{{ ch.taches|length }} tâche{{ ch.taches|length != 1 ? 's' : '' }}</span>
                                        <div class=\"ch-actions\">
                                            <a href=\"{{ path('admin_chapitre_edit', {coursId: cours.id, id: ch.id}) }}\" class=\"tb tb-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i></a>
                                        </div>
                                    </div>
                                    {% if ch.taches|length > 0 %}
                                        <div class=\"t-list\">
                                            {% for t in ch.taches %}
                                                <div class=\"t-row\">
                                                    <i class=\"ri-checkbox-blank-circle-line\"></i>
                                                    <span>{{ t.libelle }}{% if t.description %} <span style=\"color:#b0bec5;\">— {{ t.description }}</span>{% endif %}</span>
                                                </div>
                                            {% endfor %}
                                        </div>
                                    {% endif %}
                                </div>
                            {% endfor %}
                        {% endif %}
                    </div>
                </div>
            {% endfor %}
        {% endif %}
    </div>
</div>

{# ── TABLE ── #}
<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">{{ cours_list|length }} cours au total</span>
    </div>
    {% if cours_list is empty %}
        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun cours pour l'instant.</p>
    {% else %}
        <table class=\"table-dinari\" id=\"cours-table\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date création</th>
                    <th>Chapitres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for cours in cours_list %}
                <tr data-name=\"{{ cours.nomCours|lower }}\">
                    <td>{{ cours.id }}</td>
                    <td><strong>{{ cours.nomCours }}</strong></td>
                    <td style=\"max-width:260px;color:var(--muted);font-size:13px;\">
                        {{ cours.description|default('—')|slice(0,80) }}{% if cours.description|length > 80 %}…{% endif %}
                    </td>
                    <td>{{ cours.dateCreation ? cours.dateCreation|date('d/m/Y') : '—' }}</td>
                    <td>
                        <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\"
                           class=\"badge-dinari badge-info\" style=\"text-decoration:none;\">
                            <i class=\"ri-list-ordered\"></i>
                            {{ cours.chapitres|length }} chapitre{{ cours.chapitres|length != 1 ? 's' : '' }}
                        </a>
                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\" class=\"btn-dinari btn-secondary-d btn-sm-d\" title=\"Chapitres\"><i class=\"ri-list-ordered\"></i></a>
                            <a href=\"{{ path('admin_cours_edit', {id: cours.id}) }}\" class=\"btn-dinari btn-warning-d btn-sm-d\" title=\"Modifier\"><i class=\"ri-edit-line\"></i></a>
                            <form method=\"POST\" action=\"{{ path('admin_cours_delete', {id: cours.id}) }}\"
                                  onsubmit=\"return confirm(
                                    {% set nbCh = cours.chapitres|length %}
                                    {% set nbQz = cours.quizzes|length %}
                                    {% if nbCh > 0 or nbQz > 0 %}
                                        'Supprimer « {{ cours.nomCours }} » ?\\n\\n{% if nbCh > 0 %}{{ nbCh }} chapitre{{ nbCh > 1 ? 's' : '' }}{% endif %}{% if nbCh > 0 and nbQz > 0 %} et {% endif %}{% if nbQz > 0 %}{{ nbQz }} quiz{% endif %} associé{{ (nbCh + nbQz) > 1 ? 's' : '' }} seront également supprimés.'
                                    {% else %}
                                        'Supprimer le cours « {{ cours.nomCours }} » ?'
                                    {% endif %}
                                  )\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_cours_' ~ cours.id) }}\">
                                <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\" title=\"Supprimer\"><i class=\"ri-delete-bin-line\"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    {% endif %}
</div>
{% endblock %}

{% block javascripts %}
<script>
function toggle(node) { node.classList.toggle('open'); }

// Live search — filters both tree nodes and table rows simultaneously
document.getElementById('cours-search').addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();

    // Tree
    document.querySelectorAll('#cours-tree .c-node').forEach(node => {
        const name = node.dataset.name || '';
        const match = !q || name.includes(q);
        node.classList.toggle('hidden', !match);
        if (match && q) node.classList.add('open');
    });

    // Table
    document.querySelectorAll('#cours-table tbody tr').forEach(row => {
        const name = row.dataset.name || '';
        row.style.display = (!q || name.includes(q)) ? '' : 'none';
    });
});
</script>
{% endblock %}
", "admin/cours/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\cours\\index.html.twig");
    }
}
