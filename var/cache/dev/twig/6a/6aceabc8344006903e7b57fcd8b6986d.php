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
class __TwigTemplate_8a0c54bef18cdf14398931fecfc5a9ac extends Template
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
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 108, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 109
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 109, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                // line 110
                yield "                <div class=\"c-node\" data-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 110)), "html", null, true);
                yield "\">
                    <div class=\"c-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"c-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line c-icon\"></i>
                        <span class=\"c-name\">";
                // line 114
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 114), "html", null, true);
                yield "</span>
                        <span class=\"c-badge\">";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 115)), "html", null, true);
                yield " chapitre";
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 115)) != 1)) ? ("s") : (""));
                yield "</span>
                        <div class=\"c-actions\">
                            <a href=\"";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 117)]), "html", null, true);
                yield "\" class=\"tb tb-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i> Modifier</a>
                            <a href=\"";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 118)]), "html", null, true);
                yield "\" class=\"tb tb-ch\" onclick=\"event.stopPropagation()\"><i class=\"ri-list-ordered\"></i> Chapitres</a>
                        </div>
                    </div>
                    <div class=\"ch-list\">
                        ";
                // line 122
                if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 122))) {
                    // line 123
                    yield "                            <div style=\"padding:9px 44px;font-size:12px;color:var(--muted);font-style:italic;\">
                                Aucun chapitre — <a href=\"";
                    // line 124
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_new", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 124)]), "html", null, true);
                    yield "\" style=\"color:var(--blue);\">Ajouter</a>
                            </div>
                        ";
                } else {
                    // line 127
                    yield "                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 127));
                    foreach ($context['_seq'] as $context["_key"] => $context["ch"]) {
                        // line 128
                        yield "                                <div class=\"ch-node\">
                                    <div class=\"ch-row\" onclick=\"toggle(this.parentElement)\">
                                        <span class=\"ch-arrow\">
                                            ";
                        // line 131
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 131)) > 0)) {
                            yield "<i class=\"ri-arrow-right-s-line\"></i>";
                        } else {
                            yield "<i class=\"ri-subtract-line\" style=\"opacity:.25;\"></i>";
                        }
                        // line 132
                        yield "                                        </span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">";
                        // line 134
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "titre", [], "any", false, false, false, 134), "html", null, true);
                        yield "</span>
                                        ";
                        // line 135
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            yield "<span class=\"ch-sub\">— ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 135), "html", null, true);
                            yield "</span>";
                        }
                        // line 136
                        yield "                                        <span class=\"ch-pos\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "position", [], "any", false, false, false, 136), "html", null, true);
                        yield "</span>
                                        <span class=\"c-badge\">";
                        // line 137
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 137)), "html", null, true);
                        yield " tâche";
                        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 137)) != 1)) ? ("s") : (""));
                        yield "</span>
                                        <div class=\"ch-actions\">
                                            <a href=\"";
                        // line 139
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_edit", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 139), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "id", [], "any", false, false, false, 139)]), "html", null, true);
                        yield "\" class=\"tb tb-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i></a>
                                        </div>
                                    </div>
                                    ";
                        // line 142
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 142)) > 0)) {
                            // line 143
                            yield "                                        <div class=\"t-list\">
                                            ";
                            // line 144
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 144));
                            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                                // line 145
                                yield "                                                <div class=\"t-row\">
                                                    <i class=\"ri-checkbox-blank-circle-line\"></i>
                                                    <span>";
                                // line 147
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "libelle", [], "any", false, false, false, 147), "html", null, true);
                                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 147)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                    yield " <span style=\"color:#b0bec5;\">— ";
                                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 147), "html", null, true);
                                    yield "</span>";
                                }
                                yield "</span>
                                                </div>
                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 150
                            yield "                                        </div>
                                    ";
                        }
                        // line 152
                        yield "                                </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['ch'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 154
                    yield "                        ";
                }
                // line 155
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cours'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 158
            yield "        ";
        } elseif ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["static_cours"]) || array_key_exists("static_cours", $context) ? $context["static_cours"] : (function () { throw new RuntimeError('Variable "static_cours" does not exist.', 158, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 159
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["static_cours"]) || array_key_exists("static_cours", $context) ? $context["static_cours"] : (function () { throw new RuntimeError('Variable "static_cours" does not exist.', 159, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                // line 160
                yield "                <div class=\"c-node\" data-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 160)), "html", null, true);
                yield "\">
                    <div class=\"c-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"c-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line c-icon\"></i>
                        <span class=\"c-name\">";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 164), "html", null, true);
                yield "</span>
                        <span class=\"c-badge\">";
                // line 165
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 165)), "html", null, true);
                yield " chapitre";
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 165)) != 1)) ? ("s") : (""));
                yield "</span>
                        <div class=\"c-actions\">
                            <span class=\"tb\" style=\"opacity:.45;cursor:default;\"><i class=\"ri-edit-line\"></i> Modifier</span>
                        </div>
                    </div>
                    <div class=\"ch-list\">
                        ";
                // line 171
                if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 171))) {
                    // line 172
                    yield "                            <div style=\"padding:9px 44px;font-size:12px;color:var(--muted);font-style:italic;\">Aucun chapitre enregistré.</div>
                        ";
                } else {
                    // line 174
                    yield "                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 174));
                    foreach ($context['_seq'] as $context["_key"] => $context["ch"]) {
                        // line 175
                        yield "                                <div class=\"ch-node\">
                                    <div class=\"ch-row\">
                                        <span class=\"ch-arrow\"><i class=\"ri-subtract-line\" style=\"opacity:.25;\"></i></span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">";
                        // line 179
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "titre", [], "any", false, false, false, 179), "html", null, true);
                        yield "</span>
                                        ";
                        // line 180
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 180)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            yield "<span class=\"ch-sub\">— ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 180), "html", null, true);
                            yield "</span>";
                        }
                        // line 181
                        yield "                                        <span class=\"ch-pos\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "position", [], "any", false, false, false, 181), "html", null, true);
                        yield "</span>
                                    </div>
                                </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['ch'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 185
                    yield "                        ";
                }
                // line 186
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cours'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 189
            yield "        ";
        } else {
            // line 190
            yield "            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun cours.</div>
        ";
        }
        // line 192
        yield "    </div>
</div>

";
        // line 196
        yield "<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">";
        // line 198
        yield (((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 198, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 198, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["static_cours"]) || array_key_exists("static_cours", $context) ? $context["static_cours"] : (function () { throw new RuntimeError('Variable "static_cours" does not exist.', 198, $this->source); })())), "html", null, true)));
        yield " cours au total";
        if (( !Twig\Extension\CoreExtension::testEmpty((isset($context["static_cours"]) || array_key_exists("static_cours", $context) ? $context["static_cours"] : (function () { throw new RuntimeError('Variable "static_cours" does not exist.', 198, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 198, $this->source); })())))) {
            yield " <span style=\"font-size:11px;font-weight:500;color:var(--muted);\">(aperçu statique)</span>";
        }
        yield "</span>
    </div>
    ";
        // line 200
        $context["display_list"] = (((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 200, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 200, $this->source); })())) : ((isset($context["static_cours"]) || array_key_exists("static_cours", $context) ? $context["static_cours"] : (function () { throw new RuntimeError('Variable "static_cours" does not exist.', 200, $this->source); })())));
        // line 201
        yield "    ";
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["display_list"]) || array_key_exists("display_list", $context) ? $context["display_list"] : (function () { throw new RuntimeError('Variable "display_list" does not exist.', 201, $this->source); })()))) {
            // line 202
            yield "        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun cours pour l'instant.</p>
    ";
        } else {
            // line 204
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
            // line 216
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 216, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 217
                yield "                ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 217, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                    // line 218
                    yield "                <tr data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 218)), "html", null, true);
                    yield "\">
                    <td>";
                    // line 219
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 219), "html", null, true);
                    yield "</td>
                    <td><strong>";
                    // line 220
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 220), "html", null, true);
                    yield "</strong></td>
                    <td style=\"max-width:260px;color:var(--muted);font-size:13px;\">
                        ";
                    // line 222
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", true, true, false, 222)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 222), "—")) : ("—")), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 222)) > 80)) {
                        yield "…";
                    }
                    // line 223
                    yield "                    </td>
                    <td>";
                    // line 224
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 224)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 224), "d/m/Y"), "html", null, true)) : ("—"));
                    yield "</td>
                    <td>
                        <a href=\"";
                    // line 226
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 226)]), "html", null, true);
                    yield "\"
                           class=\"badge-dinari badge-info\" style=\"text-decoration:none;\">
                            <i class=\"ri-list-ordered\"></i>
                            ";
                    // line 229
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 229)), "html", null, true);
                    yield " chapitre";
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 229)) != 1)) ? ("s") : (""));
                    yield "
                        </a>
                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"";
                    // line 234
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 234)]), "html", null, true);
                    yield "\" class=\"btn-dinari btn-secondary-d btn-sm-d\" title=\"Chapitres\"><i class=\"ri-list-ordered\"></i></a>
                            <a href=\"";
                    // line 235
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 235)]), "html", null, true);
                    yield "\" class=\"btn-dinari btn-warning-d btn-sm-d\" title=\"Modifier\"><i class=\"ri-edit-line\"></i></a>
                            <form method=\"POST\" action=\"";
                    // line 236
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 236)]), "html", null, true);
                    yield "\"
                                  onsubmit=\"return confirm(
                                    ";
                    // line 238
                    $context["nbCh"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 238));
                    // line 239
                    yield "                                    ";
                    $context["nbQz"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "quizzes", [], "any", false, false, false, 239));
                    // line 240
                    yield "                                    ";
                    if ((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 240, $this->source); })()) > 0) || ((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 240, $this->source); })()) > 0))) {
                        // line 241
                        yield "                                        'Supprimer « ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 241), "html", null, true);
                        yield " » ?\\n\\n";
                        if (((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 241, $this->source); })()) > 0)) {
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 241, $this->source); })()), "html", null, true);
                            yield " chapitre";
                            yield ((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 241, $this->source); })()) > 1)) ? ("s") : (""));
                        }
                        if ((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 241, $this->source); })()) > 0) && ((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 241, $this->source); })()) > 0))) {
                            yield " et ";
                        }
                        if (((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 241, $this->source); })()) > 0)) {
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 241, $this->source); })()), "html", null, true);
                            yield " quiz";
                        }
                        yield " associé";
                        yield (((((isset($context["nbCh"]) || array_key_exists("nbCh", $context) ? $context["nbCh"] : (function () { throw new RuntimeError('Variable "nbCh" does not exist.', 241, $this->source); })()) + (isset($context["nbQz"]) || array_key_exists("nbQz", $context) ? $context["nbQz"] : (function () { throw new RuntimeError('Variable "nbQz" does not exist.', 241, $this->source); })())) > 1)) ? ("s") : (""));
                        yield " seront également supprimés.'
                                    ";
                    } else {
                        // line 243
                        yield "                                        'Supprimer le cours « ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 243), "html", null, true);
                        yield " » ?'
                                    ";
                    }
                    // line 245
                    yield "                                  )\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 246
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_cours_" . CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 246))), "html", null, true);
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
                // line 253
                yield "            ";
            } else {
                // line 254
                yield "                ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["static_cours"]) || array_key_exists("static_cours", $context) ? $context["static_cours"] : (function () { throw new RuntimeError('Variable "static_cours" does not exist.', 254, $this->source); })()));
                foreach ($context['_seq'] as $context["i"] => $context["cours"]) {
                    // line 255
                    yield "                <tr data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 255)), "html", null, true);
                    yield "\">
                    <td style=\"color:var(--muted);\">—</td>
                    <td><strong>";
                    // line 257
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 257), "html", null, true);
                    yield "</strong></td>
                    <td style=\"max-width:260px;color:var(--muted);font-size:13px;\">
                        ";
                    // line 259
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 259), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 259)) > 80)) {
                        yield "…";
                    }
                    // line 260
                    yield "                    </td>
                    <td>";
                    // line 261
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 261), "d/m/Y"), "html", null, true);
                    yield "</td>
                    <td>
                        <span class=\"badge-dinari badge-info\">
                            <i class=\"ri-list-ordered\"></i>
                            ";
                    // line 265
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 265)), "html", null, true);
                    yield " chapitre";
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 265)) != 1)) ? ("s") : (""));
                    yield "
                        </span>
                    </td>
                    <td>
                        <span style=\"font-size:12px;color:var(--muted);font-style:italic;\">Aperçu statique</span>
                    </td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['i'], $context['cours'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 273
                yield "            ";
            }
            // line 274
            yield "            </tbody>
        </table>
    ";
        }
        // line 277
        yield "</div>
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
        return array (  750 => 281,  737 => 280,  725 => 277,  720 => 274,  717 => 273,  701 => 265,  694 => 261,  691 => 260,  686 => 259,  681 => 257,  675 => 255,  670 => 254,  667 => 253,  654 => 246,  651 => 245,  645 => 243,  624 => 241,  621 => 240,  618 => 239,  616 => 238,  611 => 236,  607 => 235,  603 => 234,  593 => 229,  587 => 226,  582 => 224,  579 => 223,  574 => 222,  569 => 220,  565 => 219,  560 => 218,  555 => 217,  553 => 216,  539 => 204,  535 => 202,  532 => 201,  530 => 200,  521 => 198,  517 => 196,  512 => 192,  508 => 190,  505 => 189,  497 => 186,  494 => 185,  483 => 181,  477 => 180,  473 => 179,  467 => 175,  462 => 174,  458 => 172,  456 => 171,  445 => 165,  441 => 164,  433 => 160,  428 => 159,  425 => 158,  417 => 155,  414 => 154,  407 => 152,  403 => 150,  389 => 147,  385 => 145,  381 => 144,  378 => 143,  376 => 142,  370 => 139,  363 => 137,  358 => 136,  352 => 135,  348 => 134,  344 => 132,  338 => 131,  333 => 128,  328 => 127,  322 => 124,  319 => 123,  317 => 122,  310 => 118,  306 => 117,  299 => 115,  295 => 114,  287 => 110,  282 => 109,  280 => 108,  269 => 99,  261 => 93,  256 => 91,  251 => 88,  238 => 87,  150 => 8,  137 => 7,  114 => 5,  91 => 4,  68 => 3,  45 => 1,);
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
        {% if cours_list is not empty %}
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
        {% elseif static_cours is not empty %}
            {% for cours in static_cours %}
                <div class=\"c-node\" data-name=\"{{ cours.nomCours|lower }}\">
                    <div class=\"c-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"c-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line c-icon\"></i>
                        <span class=\"c-name\">{{ cours.nomCours }}</span>
                        <span class=\"c-badge\">{{ cours.chapitres|length }} chapitre{{ cours.chapitres|length != 1 ? 's' : '' }}</span>
                        <div class=\"c-actions\">
                            <span class=\"tb\" style=\"opacity:.45;cursor:default;\"><i class=\"ri-edit-line\"></i> Modifier</span>
                        </div>
                    </div>
                    <div class=\"ch-list\">
                        {% if cours.chapitres is empty %}
                            <div style=\"padding:9px 44px;font-size:12px;color:var(--muted);font-style:italic;\">Aucun chapitre enregistré.</div>
                        {% else %}
                            {% for ch in cours.chapitres %}
                                <div class=\"ch-node\">
                                    <div class=\"ch-row\">
                                        <span class=\"ch-arrow\"><i class=\"ri-subtract-line\" style=\"opacity:.25;\"></i></span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">{{ ch.titre }}</span>
                                        {% if ch.sousTitre %}<span class=\"ch-sub\">— {{ ch.sousTitre }}</span>{% endif %}
                                        <span class=\"ch-pos\">{{ ch.position }}</span>
                                    </div>
                                </div>
                            {% endfor %}
                        {% endif %}
                    </div>
                </div>
            {% endfor %}
        {% else %}
            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun cours.</div>
        {% endif %}
    </div>
</div>

{# ── TABLE ── #}
<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">{{ cours_list is not empty ? cours_list|length : static_cours|length }} cours au total{% if static_cours is not empty and cours_list is empty %} <span style=\"font-size:11px;font-weight:500;color:var(--muted);\">(aperçu statique)</span>{% endif %}</span>
    </div>
    {% set display_list = cours_list is not empty ? cours_list : static_cours %}
    {% if display_list is empty %}
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
            {% if cours_list is not empty %}
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
            {% else %}
                {% for i, cours in static_cours %}
                <tr data-name=\"{{ cours.nomCours|lower }}\">
                    <td style=\"color:var(--muted);\">—</td>
                    <td><strong>{{ cours.nomCours }}</strong></td>
                    <td style=\"max-width:260px;color:var(--muted);font-size:13px;\">
                        {{ cours.description|slice(0,80) }}{% if cours.description|length > 80 %}…{% endif %}
                    </td>
                    <td>{{ cours.dateCreation|date('d/m/Y') }}</td>
                    <td>
                        <span class=\"badge-dinari badge-info\">
                            <i class=\"ri-list-ordered\"></i>
                            {{ cours.chapitres|length }} chapitre{{ cours.chapitres|length != 1 ? 's' : '' }}
                        </span>
                    </td>
                    <td>
                        <span style=\"font-size:12px;color:var(--muted);font-style:italic;\">Aperçu statique</span>
                    </td>
                </tr>
                {% endfor %}
            {% endif %}
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
