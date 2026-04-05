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

/* admin/quiz/index.html.twig */
class __TwigTemplate_77e9e5d679a77bbc56695a3bc73503d9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/quiz/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/quiz/index.html.twig"));

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

        yield "Quiz — Admin";
        
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

        yield "Quiz";
        
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

        yield "Gestion des quiz";
        
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
.tree-wrap { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:24px; }
.tree-toolbar { display:flex; align-items:center; gap:12px; flex-wrap:wrap; padding:14px 20px; border-bottom:1px solid var(--border); }
.tree-toolbar .tt-title { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.search-wrap { position:relative; width:280px; }
.search-wrap i { position:absolute; left:11px; top:50%; transform:translateY(-50%); color:var(--muted); font-size:14px; pointer-events:none; }
.search-input { width:100%; padding:8px 12px 8px 34px; border:1.5px solid var(--border); border-radius:8px; font-size:13px; font-family:'Raleway',sans-serif; color:var(--text); transition:border-color .2s; background:#fff; }
.search-input:focus { outline:none; border-color:var(--blue); box-shadow:0 0 0 3px rgba(26,111,196,.08); }
.search-input::placeholder { color:#b0bec5; }

.tree-body { padding:6px 0; }
.tree-empty { text-align:center; padding:36px; color:var(--muted); font-size:14px; }

/* group (cours) row */
.g-node { border-bottom:1px solid #f0f4f8; }
.g-node:last-child { border-bottom:none; }
.g-row { display:flex; align-items:center; gap:10px; padding:11px 18px; cursor:pointer; transition:background .15s; user-select:none; }
.g-row:hover { background:#f8f9fa; }
.g-arrow { width:18px; height:18px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:12px; flex-shrink:0; transition:transform .2s; }
.g-node.open > .g-row .g-arrow { transform:rotate(90deg); }
.g-icon { font-size:16px; flex-shrink:0; }
.g-name { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.g-badge { font-size:11px; color:var(--muted); }

/* quiz leaf row */
.q-list { display:none; background:#fafbfc; }
.g-node.open > .q-list { display:block; }
.q-row { display:flex; align-items:center; gap:9px; padding:9px 18px 9px 44px; border-bottom:1px solid #f5f7fa; transition:background .15s; }
.q-row:last-child { border-bottom:none; }
.q-row:hover { background:#f0f4f8; }
.q-icon { color:#9b59b6; font-size:14px; flex-shrink:0; }
.q-name { font-size:13px; font-weight:600; color:var(--text); flex:1; }
.q-meta { font-size:11px; color:var(--muted); }
.q-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; flex-shrink:0; }
.q-row:hover .q-actions { opacity:1; }

.tb { display:inline-flex; align-items:center; gap:4px; padding:4px 9px; border-radius:6px; font-size:11px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .15s; font-family:'Raleway',sans-serif; white-space:nowrap; }
.tb-edit { background:#fff7e6; color:#f39c12; border:1px solid #fde8b0; }
.tb-edit:hover { background:#fde8b0; color:#e67e22; }
.tb-del  { background:rgba(231,76,60,.08); color:#e74c3c; border:1px solid rgba(231,76,60,.2); }
.tb-del:hover  { background:rgba(231,76,60,.15); }

.g-node.hidden { display:none; }
.q-row.hidden  { display:none; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 55
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

        // line 56
        yield "<div class=\"page-header\">
    <div>
        <h1>Quiz</h1>
        <div class=\"breadcrumb-d\"><a href=\"";
        // line 59
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Dashboard</a> › Quiz</div>
    </div>
    <a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_new");
        yield "\" class=\"btn-dinari btn-primary-d\">
        <i class=\"ri-add-line\"></i> Nouveau quiz
    </a>
</div>

";
        // line 67
        yield "<div class=\"tree-wrap\">
    <div class=\"tree-toolbar\">
        <span class=\"tt-title\"><i class=\"ri-node-tree\" style=\"color:#9b59b6;margin-right:6px;\"></i> Arborescence par cours</span>
        <div class=\"search-wrap\">
            <i class=\"ri-search-line\"></i>
            <input type=\"text\" id=\"quiz-search\" class=\"search-input\" placeholder=\"Rechercher un quiz...\" autocomplete=\"off\">
        </div>
    </div>
    <div class=\"tree-body\" id=\"quiz-tree\">
        ";
        // line 76
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 76, $this->source); })()))) {
            // line 77
            yield "            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun quiz.</div>
        ";
        } else {
            // line 79
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["groups"]) || array_key_exists("groups", $context) ? $context["groups"] : (function () { throw new RuntimeError('Variable "groups" does not exist.', 79, $this->source); })()));
            foreach ($context['_seq'] as $context["key"] => $context["group"]) {
                // line 80
                yield "                <div class=\"g-node\" data-group=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["group"], "cours", [], "any", false, false, false, 80), "nomCours", [], "any", false, false, false, 80)), "html", null, true);
                yield "\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line g-icon\" style=\"color:var(--blue);\"></i>
                        <span class=\"g-name\">";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["group"], "cours", [], "any", false, false, false, 84), "nomCours", [], "any", false, false, false, 84), "html", null, true);
                yield "</span>
                        <span class=\"g-badge\">";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["group"], "quizzes", [], "any", false, false, false, 85)), "html", null, true);
                yield " quiz</span>
                    </div>
                    <div class=\"q-list\">
                        ";
                // line 88
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["group"], "quizzes", [], "any", false, false, false, 88));
                foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                    // line 89
                    yield "                            <div class=\"q-row\" data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 89)), "html", null, true);
                    yield "\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">";
                    // line 91
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 91), "html", null, true);
                    yield "</span>
                                <span class=\"q-meta\">
                                    ";
                    // line 93
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 93)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>";
                    } else {
                        yield "<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>";
                    }
                    // line 94
                    yield "                                    ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "&nbsp;· Score ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 94), "html", null, true);
                    }
                    // line 95
                    yield "                                </span>
                                <div class=\"q-actions\">
                                    <a href=\"";
                    // line 97
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 97)]), "html", null, true);
                    yield "\" class=\"tb tb-edit\"><i class=\"ri-edit-line\"></i> Modifier</a>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 101
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['group'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            yield "            ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["ungrouped"]) || array_key_exists("ungrouped", $context) ? $context["ungrouped"] : (function () { throw new RuntimeError('Variable "ungrouped" does not exist.', 104, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 105
                yield "                <div class=\"g-node\" data-group=\"sans cours\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-question-mark g-icon\" style=\"color:var(--muted);\"></i>
                        <span class=\"g-name\" style=\"color:var(--muted);\">Sans cours associé</span>
                        <span class=\"g-badge\">";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["ungrouped"]) || array_key_exists("ungrouped", $context) ? $context["ungrouped"] : (function () { throw new RuntimeError('Variable "ungrouped" does not exist.', 110, $this->source); })())), "html", null, true);
                yield " quiz</span>
                    </div>
                    <div class=\"q-list\">
                        ";
                // line 113
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["ungrouped"]) || array_key_exists("ungrouped", $context) ? $context["ungrouped"] : (function () { throw new RuntimeError('Variable "ungrouped" does not exist.', 113, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                    // line 114
                    yield "                            <div class=\"q-row\" data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 114)), "html", null, true);
                    yield "\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">";
                    // line 116
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 116), "html", null, true);
                    yield "</span>
                                <span class=\"q-meta\">
                                    ";
                    // line 118
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>";
                    } else {
                        yield "<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>";
                    }
                    // line 119
                    yield "                                </span>
                                <div class=\"q-actions\">
                                    <a href=\"";
                    // line 121
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 121)]), "html", null, true);
                    yield "\" class=\"tb tb-edit\"><i class=\"ri-edit-line\"></i> Modifier</a>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 125
                yield "                    </div>
                </div>
            ";
            }
            // line 128
            yield "        ";
        }
        // line 129
        yield "    </div>
</div>

";
        // line 133
        yield "<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 135, $this->source); })())), "html", null, true);
        yield " quiz au total</span>
    </div>
    ";
        // line 137
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 137, $this->source); })()))) {
            // line 138
            yield "        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun quiz pour l'instant.</p>
    ";
        } else {
            // line 140
            yield "        <table class=\"table-dinari\" id=\"quiz-table\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Cours associé</th>
                    <th>Réponse correcte</th>
                    <th>Score</th>
                    <th>Mode</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 153
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 153, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                // line 154
                yield "                <tr data-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 154)), "html", null, true);
                yield "\">
                    <td>";
                // line 155
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 155), "html", null, true);
                yield "</td>
                    <td><strong>";
                // line 156
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 156), "html", null, true);
                yield "</strong></td>
                    <td>
                        ";
                // line 158
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "cours", [], "any", false, false, false, 158)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"badge-dinari badge-info\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "cours", [], "any", false, false, false, 158), "nomCours", [], "any", false, false, false, 158), "html", null, true);
                    yield "</span>
                        ";
                } else {
                    // line 159
                    yield "<span style=\"color:var(--muted);\">—</span>";
                }
                // line 160
                yield "                    </td>
                    <td style=\"font-size:13px;color:var(--muted);\">";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", true, true, false, 161)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", false, false, false, 161), "—")) : ("—")), "html", null, true);
                yield "</td>
                    <td>";
                // line 162
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", true, true, false, 162) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 162)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 162), "html", null, true)) : ("—"));
                yield "</td>
                    <td>
                        ";
                // line 164
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 164)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"badge-dinari badge-warning\">Examen</span>
                        ";
                } else {
                    // line 165
                    yield "<span class=\"badge-dinari badge-success\">Normal</span>";
                }
                // line 166
                yield "                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"";
                // line 169
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 169)]), "html", null, true);
                yield "\" class=\"btn-dinari btn-warning-d btn-sm-d\"><i class=\"ri-edit-line\"></i></a>
                            <form method=\"POST\" action=\"";
                // line 170
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 170)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Supprimer ce quiz ?')\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 171
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_quiz_" . CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 171))), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\"><i class=\"ri-delete-bin-line\"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 178
            yield "            </tbody>
        </table>
    ";
        }
        // line 181
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 184
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

        // line 185
        yield "<script>
function toggle(node) { node.classList.toggle('open'); }

document.getElementById('quiz-search').addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();

    // Tree: filter quiz rows, show/hide groups accordingly
    document.querySelectorAll('#quiz-tree .g-node').forEach(group => {
        let anyVisible = false;
        group.querySelectorAll('.q-row').forEach(row => {
            const name = row.dataset.name || '';
            const match = !q || name.includes(q) || (group.dataset.group || '').includes(q);
            row.classList.toggle('hidden', !match);
            if (match) anyVisible = true;
        });
        group.classList.toggle('hidden', !anyVisible);
        if (anyVisible && q) group.classList.add('open');
    });

    // Table
    document.querySelectorAll('#quiz-table tbody tr').forEach(row => {
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
        return "admin/quiz/index.html.twig";
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
        return array (  524 => 185,  511 => 184,  499 => 181,  494 => 178,  481 => 171,  477 => 170,  473 => 169,  468 => 166,  465 => 165,  460 => 164,  455 => 162,  451 => 161,  448 => 160,  445 => 159,  438 => 158,  433 => 156,  429 => 155,  424 => 154,  420 => 153,  405 => 140,  401 => 138,  399 => 137,  394 => 135,  390 => 133,  385 => 129,  382 => 128,  377 => 125,  367 => 121,  363 => 119,  357 => 118,  352 => 116,  346 => 114,  342 => 113,  336 => 110,  329 => 105,  326 => 104,  318 => 101,  308 => 97,  304 => 95,  298 => 94,  292 => 93,  287 => 91,  281 => 89,  277 => 88,  271 => 85,  267 => 84,  259 => 80,  254 => 79,  250 => 77,  248 => 76,  237 => 67,  229 => 61,  224 => 59,  219 => 56,  206 => 55,  150 => 8,  137 => 7,  114 => 5,  91 => 4,  68 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Quiz — Admin{% endblock %}
{% block page_title %}Quiz{% endblock %}
{% block section_title %}Gestion des quiz{% endblock %}

{% block stylesheets %}
<style>
.tree-wrap { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:24px; }
.tree-toolbar { display:flex; align-items:center; gap:12px; flex-wrap:wrap; padding:14px 20px; border-bottom:1px solid var(--border); }
.tree-toolbar .tt-title { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.search-wrap { position:relative; width:280px; }
.search-wrap i { position:absolute; left:11px; top:50%; transform:translateY(-50%); color:var(--muted); font-size:14px; pointer-events:none; }
.search-input { width:100%; padding:8px 12px 8px 34px; border:1.5px solid var(--border); border-radius:8px; font-size:13px; font-family:'Raleway',sans-serif; color:var(--text); transition:border-color .2s; background:#fff; }
.search-input:focus { outline:none; border-color:var(--blue); box-shadow:0 0 0 3px rgba(26,111,196,.08); }
.search-input::placeholder { color:#b0bec5; }

.tree-body { padding:6px 0; }
.tree-empty { text-align:center; padding:36px; color:var(--muted); font-size:14px; }

/* group (cours) row */
.g-node { border-bottom:1px solid #f0f4f8; }
.g-node:last-child { border-bottom:none; }
.g-row { display:flex; align-items:center; gap:10px; padding:11px 18px; cursor:pointer; transition:background .15s; user-select:none; }
.g-row:hover { background:#f8f9fa; }
.g-arrow { width:18px; height:18px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:12px; flex-shrink:0; transition:transform .2s; }
.g-node.open > .g-row .g-arrow { transform:rotate(90deg); }
.g-icon { font-size:16px; flex-shrink:0; }
.g-name { font-size:14px; font-weight:700; color:var(--text); flex:1; }
.g-badge { font-size:11px; color:var(--muted); }

/* quiz leaf row */
.q-list { display:none; background:#fafbfc; }
.g-node.open > .q-list { display:block; }
.q-row { display:flex; align-items:center; gap:9px; padding:9px 18px 9px 44px; border-bottom:1px solid #f5f7fa; transition:background .15s; }
.q-row:last-child { border-bottom:none; }
.q-row:hover { background:#f0f4f8; }
.q-icon { color:#9b59b6; font-size:14px; flex-shrink:0; }
.q-name { font-size:13px; font-weight:600; color:var(--text); flex:1; }
.q-meta { font-size:11px; color:var(--muted); }
.q-actions { display:flex; gap:5px; opacity:0; transition:opacity .15s; flex-shrink:0; }
.q-row:hover .q-actions { opacity:1; }

.tb { display:inline-flex; align-items:center; gap:4px; padding:4px 9px; border-radius:6px; font-size:11px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .15s; font-family:'Raleway',sans-serif; white-space:nowrap; }
.tb-edit { background:#fff7e6; color:#f39c12; border:1px solid #fde8b0; }
.tb-edit:hover { background:#fde8b0; color:#e67e22; }
.tb-del  { background:rgba(231,76,60,.08); color:#e74c3c; border:1px solid rgba(231,76,60,.2); }
.tb-del:hover  { background:rgba(231,76,60,.15); }

.g-node.hidden { display:none; }
.q-row.hidden  { display:none; }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>Quiz</h1>
        <div class=\"breadcrumb-d\"><a href=\"{{ path('admin_dashboard') }}\">Dashboard</a> › Quiz</div>
    </div>
    <a href=\"{{ path('admin_quiz_new') }}\" class=\"btn-dinari btn-primary-d\">
        <i class=\"ri-add-line\"></i> Nouveau quiz
    </a>
</div>

{# ── TREE ── #}
<div class=\"tree-wrap\">
    <div class=\"tree-toolbar\">
        <span class=\"tt-title\"><i class=\"ri-node-tree\" style=\"color:#9b59b6;margin-right:6px;\"></i> Arborescence par cours</span>
        <div class=\"search-wrap\">
            <i class=\"ri-search-line\"></i>
            <input type=\"text\" id=\"quiz-search\" class=\"search-input\" placeholder=\"Rechercher un quiz...\" autocomplete=\"off\">
        </div>
    </div>
    <div class=\"tree-body\" id=\"quiz-tree\">
        {% if quizzes is empty %}
            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun quiz.</div>
        {% else %}
            {% for key, group in groups %}
                <div class=\"g-node\" data-group=\"{{ group.cours.nomCours|lower }}\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line g-icon\" style=\"color:var(--blue);\"></i>
                        <span class=\"g-name\">{{ group.cours.nomCours }}</span>
                        <span class=\"g-badge\">{{ group.quizzes|length }} quiz</span>
                    </div>
                    <div class=\"q-list\">
                        {% for quiz in group.quizzes %}
                            <div class=\"q-row\" data-name=\"{{ quiz.titre|lower }}\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">{{ quiz.titre }}</span>
                                <span class=\"q-meta\">
                                    {% if quiz.isExamMode %}<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>{% else %}<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>{% endif %}
                                    {% if quiz.scoreQuiz %}&nbsp;· Score {{ quiz.scoreQuiz }}{% endif %}
                                </span>
                                <div class=\"q-actions\">
                                    <a href=\"{{ path('admin_quiz_edit', {id: quiz.id}) }}\" class=\"tb tb-edit\"><i class=\"ri-edit-line\"></i> Modifier</a>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            {% endfor %}
            {% if ungrouped is not empty %}
                <div class=\"g-node\" data-group=\"sans cours\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-question-mark g-icon\" style=\"color:var(--muted);\"></i>
                        <span class=\"g-name\" style=\"color:var(--muted);\">Sans cours associé</span>
                        <span class=\"g-badge\">{{ ungrouped|length }} quiz</span>
                    </div>
                    <div class=\"q-list\">
                        {% for quiz in ungrouped %}
                            <div class=\"q-row\" data-name=\"{{ quiz.titre|lower }}\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">{{ quiz.titre }}</span>
                                <span class=\"q-meta\">
                                    {% if quiz.isExamMode %}<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>{% else %}<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>{% endif %}
                                </span>
                                <div class=\"q-actions\">
                                    <a href=\"{{ path('admin_quiz_edit', {id: quiz.id}) }}\" class=\"tb tb-edit\"><i class=\"ri-edit-line\"></i> Modifier</a>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            {% endif %}
        {% endif %}
    </div>
</div>

{# ── TABLE ── #}
<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">{{ quizzes|length }} quiz au total</span>
    </div>
    {% if quizzes is empty %}
        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun quiz pour l'instant.</p>
    {% else %}
        <table class=\"table-dinari\" id=\"quiz-table\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Cours associé</th>
                    <th>Réponse correcte</th>
                    <th>Score</th>
                    <th>Mode</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for quiz in quizzes %}
                <tr data-name=\"{{ quiz.titre|lower }}\">
                    <td>{{ quiz.id }}</td>
                    <td><strong>{{ quiz.titre }}</strong></td>
                    <td>
                        {% if quiz.cours %}<span class=\"badge-dinari badge-info\">{{ quiz.cours.nomCours }}</span>
                        {% else %}<span style=\"color:var(--muted);\">—</span>{% endif %}
                    </td>
                    <td style=\"font-size:13px;color:var(--muted);\">{{ quiz.reponseCorrect|default('—') }}</td>
                    <td>{{ quiz.scoreQuiz ?? '—' }}</td>
                    <td>
                        {% if quiz.isExamMode %}<span class=\"badge-dinari badge-warning\">Examen</span>
                        {% else %}<span class=\"badge-dinari badge-success\">Normal</span>{% endif %}
                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"{{ path('admin_quiz_edit', {id: quiz.id}) }}\" class=\"btn-dinari btn-warning-d btn-sm-d\"><i class=\"ri-edit-line\"></i></a>
                            <form method=\"POST\" action=\"{{ path('admin_quiz_delete', {id: quiz.id}) }}\" onsubmit=\"return confirm('Supprimer ce quiz ?')\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_quiz_' ~ quiz.id) }}\">
                                <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\"><i class=\"ri-delete-bin-line\"></i></button>
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

document.getElementById('quiz-search').addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();

    // Tree: filter quiz rows, show/hide groups accordingly
    document.querySelectorAll('#quiz-tree .g-node').forEach(group => {
        let anyVisible = false;
        group.querySelectorAll('.q-row').forEach(row => {
            const name = row.dataset.name || '';
            const match = !q || name.includes(q) || (group.dataset.group || '').includes(q);
            row.classList.toggle('hidden', !match);
            if (match) anyVisible = true;
        });
        group.classList.toggle('hidden', !anyVisible);
        if (anyVisible && q) group.classList.add('open');
    });

    // Table
    document.querySelectorAll('#quiz-table tbody tr').forEach(row => {
        const name = row.dataset.name || '';
        row.style.display = (!q || name.includes(q)) ? '' : 'none';
    });
});
</script>
{% endblock %}
", "admin/quiz/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\quiz\\index.html.twig");
    }
}
