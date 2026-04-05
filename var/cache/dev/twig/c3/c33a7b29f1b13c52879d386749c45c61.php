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

/* admin/dashboard/index.html.twig */
class __TwigTemplate_38333d742b114cab5fbd580b9d7984c9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard/index.html.twig"));

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

        yield "Tableau de bord — Admin Dinari";
        
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

        yield "Tableau de bord";
        
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

        yield "Vue d'ensemble";
        
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
/* ── Tree ── */
.tree-card { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; }
.tree-toolbar {
    display:flex; align-items:center; justify-content:space-between;
    padding:16px 20px; border-bottom:1px solid var(--border); gap:12px; flex-wrap:wrap;
}
.tree-toolbar .card-title { font-size:15px; font-weight:700; color:var(--text); }
.search-wrap { position:relative; flex:1; max-width:320px; }
.search-wrap i {
    position:absolute; left:12px; top:50%; transform:translateY(-50%);
    color:var(--muted); font-size:15px; pointer-events:none;
}
.search-input {
    width:100%; padding:9px 12px 9px 36px;
    border:1.5px solid var(--border); border-radius:8px;
    font-size:13px; font-family:'Raleway',sans-serif; color:var(--text);
    transition:border-color .2s; background:#fff;
}
.search-input:focus { outline:none; border-color:var(--blue); box-shadow:0 0 0 3px rgba(26,111,196,.08); }
.search-input::placeholder { color:#b0bec5; }

/* Tree nodes */
.tree-body { padding:12px 0; }
.tree-empty { text-align:center; padding:40px; color:var(--muted); font-size:14px; }

.cours-node { border-bottom:1px solid #f0f4f8; }
.cours-node:last-child { border-bottom:none; }

.cours-row {
    display:flex; align-items:center; gap:10px;
    padding:11px 20px; cursor:pointer;
    transition:background .15s; user-select:none;
}
.cours-row:hover { background:#f8f9fa; }
.cours-toggle {
    width:20px; height:20px; border-radius:4px;
    display:flex; align-items:center; justify-content:center;
    font-size:11px; color:var(--muted); flex-shrink:0;
    transition:transform .2s;
}
.cours-node.open > .cours-row .cours-toggle { transform:rotate(90deg); }
.cours-icon { color:var(--blue); font-size:16px; flex-shrink:0; }
.cours-name { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.cours-meta { font-size:11px; color:var(--muted); }
.cours-actions { display:flex; gap:6px; opacity:0; transition:opacity .15s; }
.cours-row:hover .cours-actions { opacity:1; }

/* Chapter level */
.chapitres-list { display:none; background:#fafbfc; border-top:1px solid #f0f4f8; }
.cours-node.open > .chapitres-list { display:block; }

.ch-row {
    display:flex; align-items:center; gap:10px;
    padding:9px 20px 9px 48px; cursor:pointer;
    transition:background .15s; border-bottom:1px solid #f5f7fa;
}
.ch-row:last-child { border-bottom:none; }
.ch-row:hover { background:#f0f4f8; }
.ch-toggle {
    width:18px; height:18px; border-radius:3px;
    display:flex; align-items:center; justify-content:center;
    font-size:10px; color:var(--muted); flex-shrink:0;
    transition:transform .2s;
}
.ch-node.open > .ch-row .ch-toggle { transform:rotate(90deg); }
.ch-icon { color:#27ae60; font-size:14px; flex-shrink:0; }
.ch-name { font-size:13px; font-weight:600; color:var(--text); flex:1; }
.ch-pos { font-size:11px; color:var(--muted); background:#eef4fd; padding:1px 7px; border-radius:10px; }
.ch-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; }
.ch-row:hover .ch-actions { opacity:1; }

/* Task level */
.taches-list { display:none; background:#f5f7fa; }
.ch-node.open > .taches-list { display:block; }

.task-row {
    display:flex; align-items:center; gap:8px;
    padding:7px 20px 7px 76px;
    border-bottom:1px solid #eef0f3; font-size:12px; color:var(--muted);
}
.task-row:last-child { border-bottom:none; }
.task-row i { color:#f39c12; font-size:13px; flex-shrink:0; }

/* Action buttons in tree */
.tree-btn {
    display:inline-flex; align-items:center; gap:4px;
    padding:4px 9px; border-radius:6px; font-size:11px; font-weight:600;
    text-decoration:none; border:none; cursor:pointer; transition:all .15s;
    font-family:'Raleway',sans-serif;
}
.tree-btn-edit  { background:#fff7e6; color:#f39c12; border:1px solid #fde8b0; }
.tree-btn-edit:hover  { background:#fde8b0; color:#e67e22; }
.tree-btn-chap  { background:#eef4fd; color:var(--blue); border:1px solid #c8ddf5; }
.tree-btn-chap:hover  { background:#c8ddf5; }

/* Search highlight */
.hl { background:#fff3cd; border-radius:2px; padding:0 2px; }

/* No results */
.no-results { text-align:center; padding:32px; color:var(--muted); font-size:14px; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 112
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

        // line 113
        yield "<div class=\"page-header\">
    <div>
        <h1>Tableau de bord</h1>
        <div class=\"breadcrumb-d\"><a href=\"";
        // line 116
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a> › Administration</div>
    </div>
</div>

";
        // line 121
        yield "<div class=\"stats-grid\">
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(26,111,196,0.1);color:#1a6fc4;\">
            <i class=\"ri-book-open-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbCours"]) || array_key_exists("nbCours", $context) ? $context["nbCours"] : (function () { throw new RuntimeError('Variable "nbCours" does not exist.', 127, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Cours publiés</div>
        </div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(39,174,96,0.1);color:#27ae60;\">
            <i class=\"ri-question-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">";
        // line 136
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbQuiz"]) || array_key_exists("nbQuiz", $context) ? $context["nbQuiz"] : (function () { throw new RuntimeError('Variable "nbQuiz" does not exist.', 136, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Quiz actifs</div>
        </div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(243,156,18,0.1);color:#f39c12;\">
            <i class=\"ri-chat-3-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbCommentaires"]) || array_key_exists("nbCommentaires", $context) ? $context["nbCommentaires"] : (function () { throw new RuntimeError('Variable "nbCommentaires" does not exist.', 145, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Commentaires</div>
        </div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(231,76,60,0.1);color:#e74c3c;\">
            <i class=\"ri-team-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">—</div>
            <div class=\"stat-label\">Utilisateurs</div>
        </div>
    </div>
</div>

";
        // line 161
        yield "<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">Accès rapides</span>
    </div>
    <div style=\"display:flex;gap:12px;flex-wrap:wrap;\">
        <a href=\"";
        // line 166
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_index");
        yield "\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-book-open-line\"></i> Gérer les cours
        </a>
        <a href=\"";
        // line 169
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
        yield "\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-question-line\"></i> Gérer les quiz
        </a>
        <a href=\"";
        // line 172
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_commentaire_index");
        yield "\" class=\"btn-dinari btn-warning-d\">
            <i class=\"ri-chat-3-line\"></i> Modérer les commentaires
        </a>
        <a href=\"";
        // line 175
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn-dinari btn-secondary-d\">
            <i class=\"ri-global-line\"></i> Voir le site client
        </a>
    </div>
</div>

";
        // line 182
        yield "<div class=\"tree-card\">
    <div class=\"tree-toolbar\">
        <span class=\"card-title\"><i class=\"ri-node-tree\" style=\"color:var(--blue);margin-right:6px;\"></i> Structure des cours</span>
        <div class=\"search-wrap\">
            <i class=\"ri-search-line\"></i>
            <input type=\"text\"
                   id=\"tree-search\"
                   class=\"search-input\"
                   placeholder=\"Rechercher un cours...\"
                   value=\"";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["searchQuery"]) || array_key_exists("searchQuery", $context) ? $context["searchQuery"] : (function () { throw new RuntimeError('Variable "searchQuery" does not exist.', 191, $this->source); })()), "html", null, true);
        yield "\"
                   autocomplete=\"off\">
        </div>
        <a href=\"";
        // line 194
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_new");
        yield "\" class=\"btn-dinari btn-primary-d\" style=\"padding:8px 14px;font-size:12px;\">
            <i class=\"ri-add-line\"></i> Nouveau cours
        </a>
    </div>

    <div class=\"tree-body\" id=\"tree-body\">
        ";
        // line 200
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["tree"]) || array_key_exists("tree", $context) ? $context["tree"] : (function () { throw new RuntimeError('Variable "tree" does not exist.', 200, $this->source); })()))) {
            // line 201
            yield "            <div class=\"tree-empty\">
                <i class=\"ri-inbox-line\" style=\"font-size:32px;display:block;margin-bottom:8px;\"></i>
                Aucun cours trouvé.
            </div>
        ";
        } else {
            // line 206
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tree"]) || array_key_exists("tree", $context) ? $context["tree"] : (function () { throw new RuntimeError('Variable "tree" does not exist.', 206, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                // line 207
                yield "                <div class=\"cours-node\" data-cours-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 207)), "html", null, true);
                yield "\">
                    <div class=\"cours-row\" onclick=\"toggleNode(this.parentElement)\">
                        <span class=\"cours-toggle\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line cours-icon\"></i>
                        <span class=\"cours-name\">";
                // line 211
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 211), "html", null, true);
                yield "</span>
                        <span class=\"cours-meta\">
                            ";
                // line 213
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 213)), "html", null, true);
                yield " chapitre";
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 213)) != 1)) ? ("s") : (""));
                yield "
                        </span>
                        <div class=\"cours-actions\">
                            <a href=\"";
                // line 216
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 216)]), "html", null, true);
                yield "\"
                               class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\">
                                <i class=\"ri-edit-line\"></i> Modifier
                            </a>
                            <a href=\"";
                // line 220
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_index", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 220)]), "html", null, true);
                yield "\"
                               class=\"tree-btn tree-btn-chap\" onclick=\"event.stopPropagation()\">
                                <i class=\"ri-list-ordered\"></i> Chapitres
                            </a>
                        </div>
                    </div>
                    <div class=\"chapitres-list\">
                        ";
                // line 227
                if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 227))) {
                    // line 228
                    yield "                            <div style=\"padding:10px 48px;font-size:12px;color:var(--muted);font-style:italic;\">
                                Aucun chapitre — <a href=\"";
                    // line 229
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_new", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 229)]), "html", null, true);
                    yield "\" style=\"color:var(--blue);\">Ajouter</a>
                            </div>
                        ";
                } else {
                    // line 232
                    yield "                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "chapitres", [], "any", false, false, false, 232));
                    foreach ($context['_seq'] as $context["_key"] => $context["ch"]) {
                        // line 233
                        yield "                                <div class=\"ch-node\">
                                    <div class=\"ch-row\" onclick=\"toggleNode(this.parentElement)\">
                                        <span class=\"ch-toggle\">
                                            ";
                        // line 236
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 236)) > 0)) {
                            // line 237
                            yield "                                                <i class=\"ri-arrow-right-s-line\"></i>
                                            ";
                        } else {
                            // line 239
                            yield "                                                <i class=\"ri-subtract-line\" style=\"opacity:.3;\"></i>
                                            ";
                        }
                        // line 241
                        yield "                                        </span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">";
                        // line 243
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "titre", [], "any", false, false, false, 243), "html", null, true);
                        yield "</span>
                                        ";
                        // line 244
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 244)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 245
                            yield "                                            <span style=\"font-size:11px;color:var(--muted);\">— ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "sousTitre", [], "any", false, false, false, 245), "html", null, true);
                            yield "</span>
                                        ";
                        }
                        // line 247
                        yield "                                        <span class=\"ch-pos\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "position", [], "any", false, false, false, 247), "html", null, true);
                        yield "</span>
                                        <span class=\"cours-meta\" style=\"margin-left:4px;\">
                                            ";
                        // line 249
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 249)), "html", null, true);
                        yield " tâche";
                        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 249)) != 1)) ? ("s") : (""));
                        yield "
                                        </span>
                                        <div class=\"ch-actions\">
                                            <a href=\"";
                        // line 252
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_edit", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "id", [], "any", false, false, false, 252), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "id", [], "any", false, false, false, 252)]), "html", null, true);
                        yield "\"
                                               class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\">
                                                <i class=\"ri-edit-line\"></i>
                                            </a>
                                        </div>
                                    </div>
                                    ";
                        // line 258
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 258)) > 0)) {
                            // line 259
                            yield "                                        <div class=\"taches-list\">
                                            ";
                            // line 260
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "taches", [], "any", false, false, false, 260));
                            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                                // line 261
                                yield "                                                <div class=\"task-row\">
                                                    <i class=\"ri-checkbox-blank-circle-line\"></i>
                                                    ";
                                // line 263
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "libelle", [], "any", false, false, false, 263), "html", null, true);
                                yield "
                                                    ";
                                // line 264
                                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 264)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                    // line 265
                                    yield "                                                        <span style=\"color:#b0bec5;font-size:11px;\">— ";
                                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 265), "html", null, true);
                                    yield "</span>
                                                    ";
                                }
                                // line 267
                                yield "                                                </div>
                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 269
                            yield "                                        </div>
                                    ";
                        }
                        // line 271
                        yield "                                </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['ch'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 273
                    yield "                        ";
                }
                // line 274
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cours'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 277
            yield "        ";
        }
        // line 278
        yield "    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 282
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

        // line 283
        yield "<script>
// ── Toggle tree nodes ──
function toggleNode(node) {
    node.classList.toggle('open');
}

// ── Live search ──
const searchInput  = document.getElementById('tree-search');
const searchUrl    = '";
        // line 291
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_search_cours");
        yield "';
const treeBody     = document.getElementById('tree-body');
let   searchTimer  = null;

searchInput.addEventListener('input', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => runSearch(this.value.trim()), 250);
});

function runSearch(q) {
    fetch(searchUrl + '?q=' + encodeURIComponent(q))
        .then(r => r.json())
        .then(data => renderTree(data, q));
}

function renderTree(data, q) {
    if (data.length === 0) {
        treeBody.innerHTML = `<div class=\"no-results\"><i class=\"ri-search-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun cours trouvé pour \"<strong>\${esc(q)}</strong>\".</div>`;
        return;
    }

    treeBody.innerHTML = data.map(c => {
        const name = q ? highlight(esc(c.nom), q) : esc(c.nom);
        const nbCh = c.chapitres.length;
        const chapHtml = nbCh === 0
            ? `<div style=\"padding:10px 48px;font-size:12px;color:var(--muted);font-style:italic;\">Aucun chapitre</div>`
            : c.chapitres.map(ch => {
                const nbT = ch.taches.length;
                const tachesHtml = nbT === 0 ? '' : `<div class=\"taches-list\">\${
                    ch.taches.map(t => `<div class=\"task-row\"><i class=\"ri-checkbox-blank-circle-line\"></i>\${esc(t.libelle)}</div>`).join('')
                }</div>`;
                return `<div class=\"ch-node\">
                    <div class=\"ch-row\" onclick=\"toggleNode(this.parentElement)\">
                        <span class=\"ch-toggle\">\${nbT > 0 ? '<i class=\"ri-arrow-right-s-line\"></i>' : '<i class=\"ri-subtract-line\" style=\"opacity:.3;\"></i>'}</span>
                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                        <span class=\"ch-name\">\${esc(ch.titre)}</span>
                        <span class=\"ch-pos\">\${ch.taches.length} tâche\${ch.taches.length !== 1 ? 's' : ''}</span>
                        <div class=\"ch-actions\">
                            <a href=\"\${ch.editUrl}\" class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i></a>
                        </div>
                    </div>
                    \${tachesHtml}
                </div>`;
            }).join('');

        return `<div class=\"cours-node open\" data-cours-name=\"\${esc(c.nom.toLowerCase())}\">
            <div class=\"cours-row\" onclick=\"toggleNode(this.parentElement)\">
                <span class=\"cours-toggle\"><i class=\"ri-arrow-right-s-line\"></i></span>
                <i class=\"ri-book-open-line cours-icon\"></i>
                <span class=\"cours-name\">\${name}</span>
                <span class=\"cours-meta\">\${nbCh} chapitre\${nbCh !== 1 ? 's' : ''}</span>
                <div class=\"cours-actions\">
                    <a href=\"\${c.editUrl}\" class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i> Modifier</a>
                    <a href=\"\${c.chapUrl}\" class=\"tree-btn tree-btn-chap\" onclick=\"event.stopPropagation()\"><i class=\"ri-list-ordered\"></i> Chapitres</a>
                </div>
            </div>
            <div class=\"chapitres-list\">\${chapHtml}</div>
        </div>`;
    }).join('');
}

function esc(str) {
    return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\"/g,'&quot;');
}

function highlight(str, q) {
    const re = new RegExp('(' + q.replace(/[.*+?^\${}()|[\\]\\\\]/g,'\\\\\$&') + ')', 'gi');
    return str.replace(re, '<span class=\"hl\">\$1</span>');
}

// Auto-expand if search was pre-filled (server-side render)
";
        // line 362
        if ((($tmp = (isset($context["searchQuery"]) || array_key_exists("searchQuery", $context) ? $context["searchQuery"] : (function () { throw new RuntimeError('Variable "searchQuery" does not exist.', 362, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 363
            yield "document.querySelectorAll('.cours-node').forEach(n => n.classList.add('open'));
";
        }
        // line 365
        yield "</script>
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
        return "admin/dashboard/index.html.twig";
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
        return array (  693 => 365,  689 => 363,  687 => 362,  613 => 291,  603 => 283,  590 => 282,  577 => 278,  574 => 277,  566 => 274,  563 => 273,  556 => 271,  552 => 269,  545 => 267,  539 => 265,  537 => 264,  533 => 263,  529 => 261,  525 => 260,  522 => 259,  520 => 258,  511 => 252,  503 => 249,  497 => 247,  491 => 245,  489 => 244,  485 => 243,  481 => 241,  477 => 239,  473 => 237,  471 => 236,  466 => 233,  461 => 232,  455 => 229,  452 => 228,  450 => 227,  440 => 220,  433 => 216,  425 => 213,  420 => 211,  412 => 207,  407 => 206,  400 => 201,  398 => 200,  389 => 194,  383 => 191,  372 => 182,  363 => 175,  357 => 172,  351 => 169,  345 => 166,  338 => 161,  320 => 145,  308 => 136,  296 => 127,  288 => 121,  281 => 116,  276 => 113,  263 => 112,  150 => 8,  137 => 7,  114 => 5,  91 => 4,  68 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Tableau de bord — Admin Dinari{% endblock %}
{% block page_title %}Tableau de bord{% endblock %}
{% block section_title %}Vue d'ensemble{% endblock %}

{% block stylesheets %}
<style>
/* ── Tree ── */
.tree-card { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; }
.tree-toolbar {
    display:flex; align-items:center; justify-content:space-between;
    padding:16px 20px; border-bottom:1px solid var(--border); gap:12px; flex-wrap:wrap;
}
.tree-toolbar .card-title { font-size:15px; font-weight:700; color:var(--text); }
.search-wrap { position:relative; flex:1; max-width:320px; }
.search-wrap i {
    position:absolute; left:12px; top:50%; transform:translateY(-50%);
    color:var(--muted); font-size:15px; pointer-events:none;
}
.search-input {
    width:100%; padding:9px 12px 9px 36px;
    border:1.5px solid var(--border); border-radius:8px;
    font-size:13px; font-family:'Raleway',sans-serif; color:var(--text);
    transition:border-color .2s; background:#fff;
}
.search-input:focus { outline:none; border-color:var(--blue); box-shadow:0 0 0 3px rgba(26,111,196,.08); }
.search-input::placeholder { color:#b0bec5; }

/* Tree nodes */
.tree-body { padding:12px 0; }
.tree-empty { text-align:center; padding:40px; color:var(--muted); font-size:14px; }

.cours-node { border-bottom:1px solid #f0f4f8; }
.cours-node:last-child { border-bottom:none; }

.cours-row {
    display:flex; align-items:center; gap:10px;
    padding:11px 20px; cursor:pointer;
    transition:background .15s; user-select:none;
}
.cours-row:hover { background:#f8f9fa; }
.cours-toggle {
    width:20px; height:20px; border-radius:4px;
    display:flex; align-items:center; justify-content:center;
    font-size:11px; color:var(--muted); flex-shrink:0;
    transition:transform .2s;
}
.cours-node.open > .cours-row .cours-toggle { transform:rotate(90deg); }
.cours-icon { color:var(--blue); font-size:16px; flex-shrink:0; }
.cours-name { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.cours-meta { font-size:11px; color:var(--muted); }
.cours-actions { display:flex; gap:6px; opacity:0; transition:opacity .15s; }
.cours-row:hover .cours-actions { opacity:1; }

/* Chapter level */
.chapitres-list { display:none; background:#fafbfc; border-top:1px solid #f0f4f8; }
.cours-node.open > .chapitres-list { display:block; }

.ch-row {
    display:flex; align-items:center; gap:10px;
    padding:9px 20px 9px 48px; cursor:pointer;
    transition:background .15s; border-bottom:1px solid #f5f7fa;
}
.ch-row:last-child { border-bottom:none; }
.ch-row:hover { background:#f0f4f8; }
.ch-toggle {
    width:18px; height:18px; border-radius:3px;
    display:flex; align-items:center; justify-content:center;
    font-size:10px; color:var(--muted); flex-shrink:0;
    transition:transform .2s;
}
.ch-node.open > .ch-row .ch-toggle { transform:rotate(90deg); }
.ch-icon { color:#27ae60; font-size:14px; flex-shrink:0; }
.ch-name { font-size:13px; font-weight:600; color:var(--text); flex:1; }
.ch-pos { font-size:11px; color:var(--muted); background:#eef4fd; padding:1px 7px; border-radius:10px; }
.ch-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; }
.ch-row:hover .ch-actions { opacity:1; }

/* Task level */
.taches-list { display:none; background:#f5f7fa; }
.ch-node.open > .taches-list { display:block; }

.task-row {
    display:flex; align-items:center; gap:8px;
    padding:7px 20px 7px 76px;
    border-bottom:1px solid #eef0f3; font-size:12px; color:var(--muted);
}
.task-row:last-child { border-bottom:none; }
.task-row i { color:#f39c12; font-size:13px; flex-shrink:0; }

/* Action buttons in tree */
.tree-btn {
    display:inline-flex; align-items:center; gap:4px;
    padding:4px 9px; border-radius:6px; font-size:11px; font-weight:600;
    text-decoration:none; border:none; cursor:pointer; transition:all .15s;
    font-family:'Raleway',sans-serif;
}
.tree-btn-edit  { background:#fff7e6; color:#f39c12; border:1px solid #fde8b0; }
.tree-btn-edit:hover  { background:#fde8b0; color:#e67e22; }
.tree-btn-chap  { background:#eef4fd; color:var(--blue); border:1px solid #c8ddf5; }
.tree-btn-chap:hover  { background:#c8ddf5; }

/* Search highlight */
.hl { background:#fff3cd; border-radius:2px; padding:0 2px; }

/* No results */
.no-results { text-align:center; padding:32px; color:var(--muted); font-size:14px; }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>Tableau de bord</h1>
        <div class=\"breadcrumb-d\"><a href=\"{{ path('app_home') }}\">Accueil</a> › Administration</div>
    </div>
</div>

{# ── Stats ── #}
<div class=\"stats-grid\">
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(26,111,196,0.1);color:#1a6fc4;\">
            <i class=\"ri-book-open-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">{{ nbCours }}</div>
            <div class=\"stat-label\">Cours publiés</div>
        </div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(39,174,96,0.1);color:#27ae60;\">
            <i class=\"ri-question-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">{{ nbQuiz }}</div>
            <div class=\"stat-label\">Quiz actifs</div>
        </div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(243,156,18,0.1);color:#f39c12;\">
            <i class=\"ri-chat-3-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">{{ nbCommentaires }}</div>
            <div class=\"stat-label\">Commentaires</div>
        </div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(231,76,60,0.1);color:#e74c3c;\">
            <i class=\"ri-team-line\"></i>
        </div>
        <div>
            <div class=\"stat-value\">—</div>
            <div class=\"stat-label\">Utilisateurs</div>
        </div>
    </div>
</div>

{# ── Quick access ── #}
<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">Accès rapides</span>
    </div>
    <div style=\"display:flex;gap:12px;flex-wrap:wrap;\">
        <a href=\"{{ path('admin_cours_index') }}\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-book-open-line\"></i> Gérer les cours
        </a>
        <a href=\"{{ path('admin_quiz_index') }}\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-question-line\"></i> Gérer les quiz
        </a>
        <a href=\"{{ path('admin_commentaire_index') }}\" class=\"btn-dinari btn-warning-d\">
            <i class=\"ri-chat-3-line\"></i> Modérer les commentaires
        </a>
        <a href=\"{{ path('app_home') }}\" class=\"btn-dinari btn-secondary-d\">
            <i class=\"ri-global-line\"></i> Voir le site client
        </a>
    </div>
</div>

{# ── Tree + Search ── #}
<div class=\"tree-card\">
    <div class=\"tree-toolbar\">
        <span class=\"card-title\"><i class=\"ri-node-tree\" style=\"color:var(--blue);margin-right:6px;\"></i> Structure des cours</span>
        <div class=\"search-wrap\">
            <i class=\"ri-search-line\"></i>
            <input type=\"text\"
                   id=\"tree-search\"
                   class=\"search-input\"
                   placeholder=\"Rechercher un cours...\"
                   value=\"{{ searchQuery }}\"
                   autocomplete=\"off\">
        </div>
        <a href=\"{{ path('admin_cours_new') }}\" class=\"btn-dinari btn-primary-d\" style=\"padding:8px 14px;font-size:12px;\">
            <i class=\"ri-add-line\"></i> Nouveau cours
        </a>
    </div>

    <div class=\"tree-body\" id=\"tree-body\">
        {% if tree is empty %}
            <div class=\"tree-empty\">
                <i class=\"ri-inbox-line\" style=\"font-size:32px;display:block;margin-bottom:8px;\"></i>
                Aucun cours trouvé.
            </div>
        {% else %}
            {% for cours in tree %}
                <div class=\"cours-node\" data-cours-name=\"{{ cours.nomCours|lower }}\">
                    <div class=\"cours-row\" onclick=\"toggleNode(this.parentElement)\">
                        <span class=\"cours-toggle\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line cours-icon\"></i>
                        <span class=\"cours-name\">{{ cours.nomCours }}</span>
                        <span class=\"cours-meta\">
                            {{ cours.chapitres|length }} chapitre{{ cours.chapitres|length != 1 ? 's' : '' }}
                        </span>
                        <div class=\"cours-actions\">
                            <a href=\"{{ path('admin_cours_edit', {id: cours.id}) }}\"
                               class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\">
                                <i class=\"ri-edit-line\"></i> Modifier
                            </a>
                            <a href=\"{{ path('admin_chapitre_index', {coursId: cours.id}) }}\"
                               class=\"tree-btn tree-btn-chap\" onclick=\"event.stopPropagation()\">
                                <i class=\"ri-list-ordered\"></i> Chapitres
                            </a>
                        </div>
                    </div>
                    <div class=\"chapitres-list\">
                        {% if cours.chapitres is empty %}
                            <div style=\"padding:10px 48px;font-size:12px;color:var(--muted);font-style:italic;\">
                                Aucun chapitre — <a href=\"{{ path('admin_chapitre_new', {coursId: cours.id}) }}\" style=\"color:var(--blue);\">Ajouter</a>
                            </div>
                        {% else %}
                            {% for ch in cours.chapitres %}
                                <div class=\"ch-node\">
                                    <div class=\"ch-row\" onclick=\"toggleNode(this.parentElement)\">
                                        <span class=\"ch-toggle\">
                                            {% if ch.taches|length > 0 %}
                                                <i class=\"ri-arrow-right-s-line\"></i>
                                            {% else %}
                                                <i class=\"ri-subtract-line\" style=\"opacity:.3;\"></i>
                                            {% endif %}
                                        </span>
                                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                                        <span class=\"ch-name\">{{ ch.titre }}</span>
                                        {% if ch.sousTitre %}
                                            <span style=\"font-size:11px;color:var(--muted);\">— {{ ch.sousTitre }}</span>
                                        {% endif %}
                                        <span class=\"ch-pos\">{{ ch.position }}</span>
                                        <span class=\"cours-meta\" style=\"margin-left:4px;\">
                                            {{ ch.taches|length }} tâche{{ ch.taches|length != 1 ? 's' : '' }}
                                        </span>
                                        <div class=\"ch-actions\">
                                            <a href=\"{{ path('admin_chapitre_edit', {coursId: cours.id, id: ch.id}) }}\"
                                               class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\">
                                                <i class=\"ri-edit-line\"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {% if ch.taches|length > 0 %}
                                        <div class=\"taches-list\">
                                            {% for t in ch.taches %}
                                                <div class=\"task-row\">
                                                    <i class=\"ri-checkbox-blank-circle-line\"></i>
                                                    {{ t.libelle }}
                                                    {% if t.description %}
                                                        <span style=\"color:#b0bec5;font-size:11px;\">— {{ t.description }}</span>
                                                    {% endif %}
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
{% endblock %}

{% block javascripts %}
<script>
// ── Toggle tree nodes ──
function toggleNode(node) {
    node.classList.toggle('open');
}

// ── Live search ──
const searchInput  = document.getElementById('tree-search');
const searchUrl    = '{{ path('admin_search_cours') }}';
const treeBody     = document.getElementById('tree-body');
let   searchTimer  = null;

searchInput.addEventListener('input', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => runSearch(this.value.trim()), 250);
});

function runSearch(q) {
    fetch(searchUrl + '?q=' + encodeURIComponent(q))
        .then(r => r.json())
        .then(data => renderTree(data, q));
}

function renderTree(data, q) {
    if (data.length === 0) {
        treeBody.innerHTML = `<div class=\"no-results\"><i class=\"ri-search-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun cours trouvé pour \"<strong>\${esc(q)}</strong>\".</div>`;
        return;
    }

    treeBody.innerHTML = data.map(c => {
        const name = q ? highlight(esc(c.nom), q) : esc(c.nom);
        const nbCh = c.chapitres.length;
        const chapHtml = nbCh === 0
            ? `<div style=\"padding:10px 48px;font-size:12px;color:var(--muted);font-style:italic;\">Aucun chapitre</div>`
            : c.chapitres.map(ch => {
                const nbT = ch.taches.length;
                const tachesHtml = nbT === 0 ? '' : `<div class=\"taches-list\">\${
                    ch.taches.map(t => `<div class=\"task-row\"><i class=\"ri-checkbox-blank-circle-line\"></i>\${esc(t.libelle)}</div>`).join('')
                }</div>`;
                return `<div class=\"ch-node\">
                    <div class=\"ch-row\" onclick=\"toggleNode(this.parentElement)\">
                        <span class=\"ch-toggle\">\${nbT > 0 ? '<i class=\"ri-arrow-right-s-line\"></i>' : '<i class=\"ri-subtract-line\" style=\"opacity:.3;\"></i>'}</span>
                        <i class=\"ri-file-list-3-line ch-icon\"></i>
                        <span class=\"ch-name\">\${esc(ch.titre)}</span>
                        <span class=\"ch-pos\">\${ch.taches.length} tâche\${ch.taches.length !== 1 ? 's' : ''}</span>
                        <div class=\"ch-actions\">
                            <a href=\"\${ch.editUrl}\" class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i></a>
                        </div>
                    </div>
                    \${tachesHtml}
                </div>`;
            }).join('');

        return `<div class=\"cours-node open\" data-cours-name=\"\${esc(c.nom.toLowerCase())}\">
            <div class=\"cours-row\" onclick=\"toggleNode(this.parentElement)\">
                <span class=\"cours-toggle\"><i class=\"ri-arrow-right-s-line\"></i></span>
                <i class=\"ri-book-open-line cours-icon\"></i>
                <span class=\"cours-name\">\${name}</span>
                <span class=\"cours-meta\">\${nbCh} chapitre\${nbCh !== 1 ? 's' : ''}</span>
                <div class=\"cours-actions\">
                    <a href=\"\${c.editUrl}\" class=\"tree-btn tree-btn-edit\" onclick=\"event.stopPropagation()\"><i class=\"ri-edit-line\"></i> Modifier</a>
                    <a href=\"\${c.chapUrl}\" class=\"tree-btn tree-btn-chap\" onclick=\"event.stopPropagation()\"><i class=\"ri-list-ordered\"></i> Chapitres</a>
                </div>
            </div>
            <div class=\"chapitres-list\">\${chapHtml}</div>
        </div>`;
    }).join('');
}

function esc(str) {
    return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\"/g,'&quot;');
}

function highlight(str, q) {
    const re = new RegExp('(' + q.replace(/[.*+?^\${}()|[\\]\\\\]/g,'\\\\\$&') + ')', 'gi');
    return str.replace(re, '<span class=\"hl\">\$1</span>');
}

// Auto-expand if search was pre-filled (server-side render)
{% if searchQuery %}
document.querySelectorAll('.cours-node').forEach(n => n.classList.add('open'));
{% endif %}
</script>
{% endblock %}
", "admin/dashboard/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\dashboard\\index.html.twig");
    }
}
