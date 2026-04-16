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
class __TwigTemplate_99d0ec72fbdd9572b267a75a52537d62 extends Template
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
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 76, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 77
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["groups"]) || array_key_exists("groups", $context) ? $context["groups"] : (function () { throw new RuntimeError('Variable "groups" does not exist.', 77, $this->source); })()));
            foreach ($context['_seq'] as $context["key"] => $context["group"]) {
                // line 78
                yield "                <div class=\"g-node\" data-group=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["group"], "cours", [], "any", false, false, false, 78), "nomCours", [], "any", false, false, false, 78)), "html", null, true);
                yield "\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line g-icon\" style=\"color:var(--blue);\"></i>
                        <span class=\"g-name\">";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["group"], "cours", [], "any", false, false, false, 82), "nomCours", [], "any", false, false, false, 82), "html", null, true);
                yield "</span>
                        <span class=\"g-badge\">";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["group"], "quizzes", [], "any", false, false, false, 83)), "html", null, true);
                yield " quiz</span>
                    </div>
                    <div class=\"q-list\">
                        ";
                // line 86
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["group"], "quizzes", [], "any", false, false, false, 86));
                foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                    // line 87
                    yield "                            <div class=\"q-row\" data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 87)), "html", null, true);
                    yield "\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">";
                    // line 89
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 89), "html", null, true);
                    yield "</span>
                                <span class=\"q-meta\">
                                    ";
                    // line 91
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 91)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>";
                    } else {
                        yield "<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>";
                    }
                    // line 92
                    yield "                                    ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 92)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "&nbsp;· Score ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 92), "html", null, true);
                    }
                    // line 93
                    yield "                                </span>
                                <div class=\"q-actions\">
                                    <a href=\"";
                    // line 95
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 95)]), "html", null, true);
                    yield "\" class=\"tb tb-edit\"><i class=\"ri-edit-line\"></i> Modifier</a>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 99
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['group'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            yield "            ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["ungrouped"]) || array_key_exists("ungrouped", $context) ? $context["ungrouped"] : (function () { throw new RuntimeError('Variable "ungrouped" does not exist.', 102, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 103
                yield "                <div class=\"g-node\" data-group=\"sans cours\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-question-mark g-icon\" style=\"color:var(--muted);\"></i>
                        <span class=\"g-name\" style=\"color:var(--muted);\">Sans cours associé</span>
                        <span class=\"g-badge\">";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["ungrouped"]) || array_key_exists("ungrouped", $context) ? $context["ungrouped"] : (function () { throw new RuntimeError('Variable "ungrouped" does not exist.', 108, $this->source); })())), "html", null, true);
                yield " quiz</span>
                    </div>
                    <div class=\"q-list\">
                        ";
                // line 111
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["ungrouped"]) || array_key_exists("ungrouped", $context) ? $context["ungrouped"] : (function () { throw new RuntimeError('Variable "ungrouped" does not exist.', 111, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                    // line 112
                    yield "                            <div class=\"q-row\" data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 112)), "html", null, true);
                    yield "\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">";
                    // line 114
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 114), "html", null, true);
                    yield "</span>
                                <span class=\"q-meta\">
                                    ";
                    // line 116
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>";
                    } else {
                        yield "<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>";
                    }
                    // line 117
                    yield "                                </span>
                                <div class=\"q-actions\">
                                    <a href=\"";
                    // line 119
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 119)]), "html", null, true);
                    yield "\" class=\"tb tb-edit\"><i class=\"ri-edit-line\"></i> Modifier</a>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 123
                yield "                    </div>
                </div>
            ";
            }
            // line 126
            yield "        ";
        } elseif ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["static_quizzes"]) || array_key_exists("static_quizzes", $context) ? $context["static_quizzes"] : (function () { throw new RuntimeError('Variable "static_quizzes" does not exist.', 126, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 127
            yield "            ";
            // line 128
            yield "            ";
            $context["static_groups"] = [];
            // line 129
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["static_quizzes"]) || array_key_exists("static_quizzes", $context) ? $context["static_quizzes"] : (function () { throw new RuntimeError('Variable "static_quizzes" does not exist.', 129, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["q"]) {
                // line 130
                yield "                ";
                $context["key"] = CoreExtension::getAttribute($this->env, $this->source, $context["q"], "cours", [], "any", false, false, false, 130);
                // line 131
                yield "                ";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["static_groups"] ?? null), (isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new RuntimeError('Variable "key" does not exist.', 131, $this->source); })()), [], "array", true, true, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 132
                    yield "                    ";
                    $context["static_groups"] = Twig\Extension\CoreExtension::merge((isset($context["static_groups"]) || array_key_exists("static_groups", $context) ? $context["static_groups"] : (function () { throw new RuntimeError('Variable "static_groups" does not exist.', 132, $this->source); })()), [ (string)(isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new RuntimeError('Variable "key" does not exist.', 132, $this->source); })()) => []]);
                    // line 133
                    yield "                ";
                }
                // line 134
                yield "                ";
                $context["static_groups"] = Twig\Extension\CoreExtension::merge((isset($context["static_groups"]) || array_key_exists("static_groups", $context) ? $context["static_groups"] : (function () { throw new RuntimeError('Variable "static_groups" does not exist.', 134, $this->source); })()), [ (string)(isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new RuntimeError('Variable "key" does not exist.', 134, $this->source); })()) => Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, (isset($context["static_groups"]) || array_key_exists("static_groups", $context) ? $context["static_groups"] : (function () { throw new RuntimeError('Variable "static_groups" does not exist.', 134, $this->source); })()), (isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new RuntimeError('Variable "key" does not exist.', 134, $this->source); })()), [], "array", false, false, false, 134), [$context["q"]])]);
                // line 135
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['q'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["static_groups"]) || array_key_exists("static_groups", $context) ? $context["static_groups"] : (function () { throw new RuntimeError('Variable "static_groups" does not exist.', 136, $this->source); })()));
            foreach ($context['_seq'] as $context["coursName"] => $context["qlist"]) {
                // line 137
                yield "                <div class=\"g-node open\" data-group=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), $context["coursName"]), "html", null, true);
                yield "\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line g-icon\" style=\"color:var(--blue);\"></i>
                        <span class=\"g-name\">";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["coursName"], "html", null, true);
                yield "</span>
                        <span class=\"g-badge\">";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["qlist"]), "html", null, true);
                yield " quiz</span>
                    </div>
                    <div class=\"q-list\">
                        ";
                // line 145
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["qlist"]);
                foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                    // line 146
                    yield "                            <div class=\"q-row\" data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 146)), "html", null, true);
                    yield "\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">";
                    // line 148
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 148), "html", null, true);
                    yield "</span>
                                <span class=\"q-meta\">
                                    ";
                    // line 150
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 150)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>";
                    } else {
                        yield "<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>";
                    }
                    // line 151
                    yield "                                    ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 151)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "&nbsp;· Score ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 151), "html", null, true);
                    }
                    // line 152
                    yield "                                </span>
                                <div class=\"q-actions\">
                                    <span class=\"tb\" style=\"opacity:.45;cursor:default;font-size:11px;\">Aperçu statique</span>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 158
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['coursName'], $context['qlist'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            yield "        ";
        } else {
            // line 162
            yield "            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun quiz.</div>
        ";
        }
        // line 164
        yield "    </div>
</div>

";
        // line 168
        yield "<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">";
        // line 170
        yield (((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 170, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 170, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["static_quizzes"]) || array_key_exists("static_quizzes", $context) ? $context["static_quizzes"] : (function () { throw new RuntimeError('Variable "static_quizzes" does not exist.', 170, $this->source); })())), "html", null, true)));
        yield " quiz au total";
        if (( !Twig\Extension\CoreExtension::testEmpty((isset($context["static_quizzes"]) || array_key_exists("static_quizzes", $context) ? $context["static_quizzes"] : (function () { throw new RuntimeError('Variable "static_quizzes" does not exist.', 170, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 170, $this->source); })())))) {
            yield " <span style=\"font-size:11px;font-weight:500;color:var(--muted);\">(aperçu statique)</span>";
        }
        yield "</span>
    </div>
    ";
        // line 172
        if ((Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 172, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["static_quizzes"]) || array_key_exists("static_quizzes", $context) ? $context["static_quizzes"] : (function () { throw new RuntimeError('Variable "static_quizzes" does not exist.', 172, $this->source); })())))) {
            // line 173
            yield "        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun quiz pour l'instant.</p>
    ";
        } else {
            // line 175
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
            // line 188
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 188, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 189
                yield "                ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 189, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                    // line 190
                    yield "                <tr data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 190)), "html", null, true);
                    yield "\">
                    <td>";
                    // line 191
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 191), "html", null, true);
                    yield "</td>
                    <td><strong>";
                    // line 192
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 192), "html", null, true);
                    yield "</strong></td>
                    <td>
                        ";
                    // line 194
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "cours", [], "any", false, false, false, 194)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-info\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "cours", [], "any", false, false, false, 194), "nomCours", [], "any", false, false, false, 194), "html", null, true);
                        yield "</span>
                        ";
                    } else {
                        // line 195
                        yield "<span style=\"color:var(--muted);\">—</span>";
                    }
                    // line 196
                    yield "                    </td>
                    <td style=\"font-size:13px;color:var(--muted);\">";
                    // line 197
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", true, true, false, 197)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", false, false, false, 197), "—")) : ("—")), "html", null, true);
                    yield "</td>
                    <td>";
                    // line 198
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", true, true, false, 198) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 198)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 198), "html", null, true)) : ("—"));
                    yield "</td>
                    <td>
                        ";
                    // line 200
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 200)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\">Examen</span>
                        ";
                    } else {
                        // line 201
                        yield "<span class=\"badge-dinari badge-success\">Normal</span>";
                    }
                    // line 202
                    yield "                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"";
                    // line 205
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 205)]), "html", null, true);
                    yield "\" class=\"btn-dinari btn-warning-d btn-sm-d\"><i class=\"ri-edit-line\"></i></a>
                            <form method=\"POST\" action=\"";
                    // line 206
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 206)]), "html", null, true);
                    yield "\" onsubmit=\"return confirm('Supprimer ce quiz ?')\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 207
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_quiz_" . CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 207))), "html", null, true);
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
                // line 214
                yield "            ";
            } else {
                // line 215
                yield "                ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["static_quizzes"]) || array_key_exists("static_quizzes", $context) ? $context["static_quizzes"] : (function () { throw new RuntimeError('Variable "static_quizzes" does not exist.', 215, $this->source); })()));
                foreach ($context['_seq'] as $context["i"] => $context["quiz"]) {
                    // line 216
                    yield "                <tr data-name=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 216)), "html", null, true);
                    yield "\">
                    <td style=\"color:var(--muted);\">—</td>
                    <td><strong>";
                    // line 218
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 218), "html", null, true);
                    yield "</strong></td>
                    <td><span class=\"badge-dinari badge-info\">";
                    // line 219
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "cours", [], "any", false, false, false, 219), "html", null, true);
                    yield "</span></td>
                    <td style=\"font-size:13px;color:var(--muted);\">";
                    // line 220
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", true, true, false, 220) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", false, false, false, 220)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "reponseCorrect", [], "any", false, false, false, 220), "html", null, true)) : ("—"));
                    yield "</td>
                    <td>";
                    // line 221
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", true, true, false, 221) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 221)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 221), "html", null, true)) : ("—"));
                    yield "</td>
                    <td>
                        ";
                    // line 223
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 223)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"badge-dinari badge-warning\">Examen</span>
                        ";
                    } else {
                        // line 224
                        yield "<span class=\"badge-dinari badge-success\">Normal</span>";
                    }
                    // line 225
                    yield "                    </td>
                    <td><span style=\"font-size:12px;color:var(--muted);font-style:italic;\">Aperçu statique</span></td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['i'], $context['quiz'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 229
                yield "            ";
            }
            // line 230
            yield "            </tbody>
        </table>
    ";
        }
        // line 233
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 236
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

        // line 237
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
        return array (  685 => 237,  672 => 236,  660 => 233,  655 => 230,  652 => 229,  643 => 225,  640 => 224,  635 => 223,  630 => 221,  626 => 220,  622 => 219,  618 => 218,  612 => 216,  607 => 215,  604 => 214,  591 => 207,  587 => 206,  583 => 205,  578 => 202,  575 => 201,  570 => 200,  565 => 198,  561 => 197,  558 => 196,  555 => 195,  548 => 194,  543 => 192,  539 => 191,  534 => 190,  529 => 189,  527 => 188,  512 => 175,  508 => 173,  506 => 172,  497 => 170,  493 => 168,  488 => 164,  484 => 162,  481 => 161,  473 => 158,  462 => 152,  456 => 151,  450 => 150,  445 => 148,  439 => 146,  435 => 145,  429 => 142,  425 => 141,  417 => 137,  412 => 136,  406 => 135,  403 => 134,  400 => 133,  397 => 132,  394 => 131,  391 => 130,  386 => 129,  383 => 128,  381 => 127,  378 => 126,  373 => 123,  363 => 119,  359 => 117,  353 => 116,  348 => 114,  342 => 112,  338 => 111,  332 => 108,  325 => 103,  322 => 102,  314 => 99,  304 => 95,  300 => 93,  294 => 92,  288 => 91,  283 => 89,  277 => 87,  273 => 86,  267 => 83,  263 => 82,  255 => 78,  250 => 77,  248 => 76,  237 => 67,  229 => 61,  224 => 59,  219 => 56,  206 => 55,  150 => 8,  137 => 7,  114 => 5,  91 => 4,  68 => 3,  45 => 1,);
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
        {% if quizzes is not empty %}
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
        {% elseif static_quizzes is not empty %}
            {# Group static quizzes by cours name #}
            {% set static_groups = {} %}
            {% for q in static_quizzes %}
                {% set key = q.cours %}
                {% if static_groups[key] is not defined %}
                    {% set static_groups = static_groups|merge({(key): []}) %}
                {% endif %}
                {% set static_groups = static_groups|merge({(key): static_groups[key]|merge([q])}) %}
            {% endfor %}
            {% for coursName, qlist in static_groups %}
                <div class=\"g-node open\" data-group=\"{{ coursName|lower }}\">
                    <div class=\"g-row\" onclick=\"toggle(this.parentElement)\">
                        <span class=\"g-arrow\"><i class=\"ri-arrow-right-s-line\"></i></span>
                        <i class=\"ri-book-open-line g-icon\" style=\"color:var(--blue);\"></i>
                        <span class=\"g-name\">{{ coursName }}</span>
                        <span class=\"g-badge\">{{ qlist|length }} quiz</span>
                    </div>
                    <div class=\"q-list\">
                        {% for quiz in qlist %}
                            <div class=\"q-row\" data-name=\"{{ quiz.titre|lower }}\">
                                <i class=\"ri-question-answer-line q-icon\"></i>
                                <span class=\"q-name\">{{ quiz.titre }}</span>
                                <span class=\"q-meta\">
                                    {% if quiz.isExamMode %}<span class=\"badge-dinari badge-warning\" style=\"font-size:10px;\">Examen</span>{% else %}<span class=\"badge-dinari badge-success\" style=\"font-size:10px;\">Normal</span>{% endif %}
                                    {% if quiz.scoreQuiz %}&nbsp;· Score {{ quiz.scoreQuiz }}{% endif %}
                                </span>
                                <div class=\"q-actions\">
                                    <span class=\"tb\" style=\"opacity:.45;cursor:default;font-size:11px;\">Aperçu statique</span>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            {% endfor %}
        {% else %}
            <div class=\"tree-empty\"><i class=\"ri-inbox-line\" style=\"font-size:28px;display:block;margin-bottom:8px;\"></i>Aucun quiz.</div>
        {% endif %}
    </div>
</div>

{# ── TABLE ── #}
<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">{{ quizzes is not empty ? quizzes|length : static_quizzes|length }} quiz au total{% if static_quizzes is not empty and quizzes is empty %} <span style=\"font-size:11px;font-weight:500;color:var(--muted);\">(aperçu statique)</span>{% endif %}</span>
    </div>
    {% if quizzes is empty and static_quizzes is empty %}
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
            {% if quizzes is not empty %}
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
            {% else %}
                {% for i, quiz in static_quizzes %}
                <tr data-name=\"{{ quiz.titre|lower }}\">
                    <td style=\"color:var(--muted);\">—</td>
                    <td><strong>{{ quiz.titre }}</strong></td>
                    <td><span class=\"badge-dinari badge-info\">{{ quiz.cours }}</span></td>
                    <td style=\"font-size:13px;color:var(--muted);\">{{ quiz.reponseCorrect ?? '—' }}</td>
                    <td>{{ quiz.scoreQuiz ?? '—' }}</td>
                    <td>
                        {% if quiz.isExamMode %}<span class=\"badge-dinari badge-warning\">Examen</span>
                        {% else %}<span class=\"badge-dinari badge-success\">Normal</span>{% endif %}
                    </td>
                    <td><span style=\"font-size:12px;color:var(--muted);font-style:italic;\">Aperçu statique</span></td>
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
