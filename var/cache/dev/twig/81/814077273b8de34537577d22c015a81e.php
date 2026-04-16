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

/* client/quiz/index.html.twig */
class __TwigTemplate_fabd8b31c898ef9f9e8d4fa8805a674d extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/quiz/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/quiz/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield "Quiz Fintech — Dinari";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
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

        // line 4
        yield "<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root{--d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;--d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:#fff;color:var(--d-text);}
.quiz-page{max-width:1100px;margin:0 auto;padding:48px 32px 80px;}
.page-hero{background:var(--d-blue);border-radius:12px;padding:40px;margin-bottom:36px;position:relative;overflow:hidden;}
.page-hero::after{content:'';position:absolute;right:-40px;top:-40px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.06);}
.page-hero-tag{font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:10px;}
.page-hero h1{font-family:'Syne',sans-serif;font-size:28px;font-weight:700;color:#fff;margin-bottom:8px;}
.page-hero p{font-size:14px;color:rgba(255,255,255,.7);max-width:500px;line-height:1.75;}
.quiz-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px;}
.quiz-card{background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:28px;transition:all .25s;display:flex;flex-direction:column;gap:14px;}
.quiz-card:hover{box-shadow:0 8px 28px rgba(26,111,196,.12);transform:translateY(-3px);border-color:rgba(26,111,196,.25);}
.quiz-badge{display:inline-flex;align-items:center;gap:5px;font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:4px 10px;border-radius:20px;}
.badge-exam{background:rgba(231,76,60,.1);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.badge-practice{background:rgba(39,174,96,.1);color:#27ae60;border:1px solid rgba(39,174,96,.2);}
.quiz-card h3{font-family:'Syne',sans-serif;font-size:16px;font-weight:700;color:var(--d-text);line-height:1.35;}
.quiz-meta{display:flex;gap:14px;flex-wrap:wrap;}
.quiz-meta-item{display:flex;align-items:center;gap:5px;font-size:12px;color:var(--d-muted);}
.quiz-meta-item i{font-size:13px;color:var(--d-blue);}
.quiz-actions{display:flex;gap:8px;margin-top:auto;padding-top:4px;}
.btn-start{display:inline-flex;align-items:center;gap:6px;padding:10px 20px;background:var(--d-blue);color:#fff;border-radius:6px;font-family:'Syne',sans-serif;font-weight:700;font-size:13px;text-decoration:none;transition:all .2s;border:none;cursor:pointer;}
.btn-start:hover{background:var(--d-blue2);transform:translateY(-1px);color:#fff;text-decoration:none;}
.btn-details{display:inline-flex;align-items:center;gap:6px;padding:10px 16px;background:#fff;color:var(--d-muted);border:1.5px solid var(--d-border);border-radius:6px;font-size:13px;font-weight:600;text-decoration:none;transition:all .2s;}
.btn-details:hover{border-color:var(--d-blue);color:var(--d-blue);text-decoration:none;}
.empty-state{text-align:center;padding:60px 20px;color:var(--d-muted);}
.empty-state i{font-size:48px;display:block;margin-bottom:16px;color:var(--d-border);}
@media(max-width:600px){.quiz-page{padding:24px 16px 60px;}.page-hero{padding:24px;}}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 35
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

        // line 36
        yield "<div class=\"quiz-page\">
  <div class=\"page-hero\">
    <div class=\"page-hero-tag\" data-i18n=\"quiz_page_tag\">Évaluation · Fintech</div>
    <h1 data-i18n=\"quiz_page_title\">Quiz &amp; Évaluations</h1>
    <p data-i18n=\"quiz_page_desc\">Testez vos connaissances en finance personnelle avec nos quiz interactifs.</p>
  </div>
  ";
        // line 42
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 42, $this->source); })()))) {
            // line 43
            yield "    <div class=\"empty-state\">
      <i class=\"fa fa-question-circle\"></i>
      <p data-i18n=\"quiz_empty\">Aucun quiz disponible pour le moment.</p>
    </div>
  ";
        } else {
            // line 48
            yield "    <div class=\"quiz-grid\">
      ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 49, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                // line 50
                yield "        <div class=\"quiz-card\">
          <div>
            ";
                // line 52
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "isExamMode", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 53
                    yield "              <span class=\"quiz-badge badge-exam\" data-i18n=\"quiz_mode_exam\">Mode examen</span>
            ";
                } else {
                    // line 55
                    yield "              <span class=\"quiz-badge badge-practice\" data-i18n=\"quiz_mode_practice\">Entraînement</span>
            ";
                }
                // line 57
                yield "          </div>
          <h3>";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 58), "html", null, true);
                yield "</h3>
          <div class=\"quiz-meta\">
            ";
                // line 60
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<div class=\"quiz-meta-item\"><i class=\"fa fa-star\"></i><span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreQuiz", [], "any", false, false, false, 60), "html", null, true);
                    yield " pts</span></div>";
                }
                // line 61
                yield "            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "timeLimit", [], "any", false, false, false, 61)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<div class=\"quiz-meta-item\"><i class=\"fa fa-clock-o\"></i><span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "timeLimit", [], "any", false, false, false, 61), "html", null, true);
                    yield " min</span></div>";
                }
                // line 62
                yield "            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "dateCreation", [], "any", false, false, false, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<div class=\"quiz-meta-item\"><i class=\"fa fa-calendar\"></i><span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "dateCreation", [], "any", false, false, false, 62), "d/m/Y"), "html", null, true);
                    yield "</span></div>";
                }
                // line 63
                yield "          </div>
          <div class=\"quiz-actions\">
            <a href=\"";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 65)]), "html", null, true);
                yield "\" class=\"btn-start\" data-i18n=\"quiz_btn_start\"><i class=\"fa fa-play\"></i> Commencer</a>
            <a href=\"";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 66)]), "html", null, true);
                yield "\" class=\"btn-details\" data-i18n=\"quiz_btn_details\">Détails</a>
          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "    </div>
  ";
        }
        // line 72
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 74
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

        // line 75
        yield "<script>
const QUIZ_T = {
  fr:{quiz_page_tag:'Évaluation · Fintech',quiz_page_title:'Quiz & Évaluations',quiz_page_desc:'Testez vos connaissances en finance personnelle avec nos quiz interactifs.',quiz_empty:'Aucun quiz disponible pour le moment.',quiz_mode_exam:'Mode examen',quiz_mode_practice:'Entraînement',quiz_btn_start:'Commencer',quiz_btn_details:'Détails'},
  en:{quiz_page_tag:'Assessment · Fintech',quiz_page_title:'Quizzes & Assessments',quiz_page_desc:'Test your personal finance knowledge with our interactive quizzes.',quiz_empty:'No quizzes available at the moment.',quiz_mode_exam:'Exam mode',quiz_mode_practice:'Practice',quiz_btn_start:'Start',quiz_btn_details:'Details'},
  ar:{quiz_page_tag:'تقييم · فينتك',quiz_page_title:'الاختبارات والتقييمات',quiz_page_desc:'اختبر معلوماتك في الإدارة المالية الشخصية مع اختباراتنا التفاعلية.',quiz_empty:'لا توجد اختبارات متاحة في الوقت الحالي.',quiz_mode_exam:'وضع الامتحان',quiz_mode_practice:'تدريب',quiz_btn_start:'ابدأ',quiz_btn_details:'التفاصيل'}
};
function applyPageTranslations(lang) {
  const base = (typeof DINARI_TRANSLATIONS !== 'undefined' && DINARI_TRANSLATIONS[lang]) || {};
  const page = QUIZ_T[lang] || QUIZ_T['fr'];
  const t = Object.assign({}, base, page);
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (t[key] !== undefined) el.textContent = t[key];
  });
}
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
        return "client/quiz/index.html.twig";
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
        return array (  269 => 75,  256 => 74,  244 => 72,  240 => 70,  230 => 66,  226 => 65,  222 => 63,  215 => 62,  208 => 61,  202 => 60,  197 => 58,  194 => 57,  190 => 55,  186 => 53,  184 => 52,  180 => 50,  176 => 49,  173 => 48,  166 => 43,  164 => 42,  156 => 36,  143 => 35,  102 => 4,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'base.html.twig' %}
{% block title %}Quiz Fintech — Dinari{% endblock %}
{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root{--d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;--d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:#fff;color:var(--d-text);}
.quiz-page{max-width:1100px;margin:0 auto;padding:48px 32px 80px;}
.page-hero{background:var(--d-blue);border-radius:12px;padding:40px;margin-bottom:36px;position:relative;overflow:hidden;}
.page-hero::after{content:'';position:absolute;right:-40px;top:-40px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.06);}
.page-hero-tag{font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:10px;}
.page-hero h1{font-family:'Syne',sans-serif;font-size:28px;font-weight:700;color:#fff;margin-bottom:8px;}
.page-hero p{font-size:14px;color:rgba(255,255,255,.7);max-width:500px;line-height:1.75;}
.quiz-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px;}
.quiz-card{background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:28px;transition:all .25s;display:flex;flex-direction:column;gap:14px;}
.quiz-card:hover{box-shadow:0 8px 28px rgba(26,111,196,.12);transform:translateY(-3px);border-color:rgba(26,111,196,.25);}
.quiz-badge{display:inline-flex;align-items:center;gap:5px;font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:4px 10px;border-radius:20px;}
.badge-exam{background:rgba(231,76,60,.1);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.badge-practice{background:rgba(39,174,96,.1);color:#27ae60;border:1px solid rgba(39,174,96,.2);}
.quiz-card h3{font-family:'Syne',sans-serif;font-size:16px;font-weight:700;color:var(--d-text);line-height:1.35;}
.quiz-meta{display:flex;gap:14px;flex-wrap:wrap;}
.quiz-meta-item{display:flex;align-items:center;gap:5px;font-size:12px;color:var(--d-muted);}
.quiz-meta-item i{font-size:13px;color:var(--d-blue);}
.quiz-actions{display:flex;gap:8px;margin-top:auto;padding-top:4px;}
.btn-start{display:inline-flex;align-items:center;gap:6px;padding:10px 20px;background:var(--d-blue);color:#fff;border-radius:6px;font-family:'Syne',sans-serif;font-weight:700;font-size:13px;text-decoration:none;transition:all .2s;border:none;cursor:pointer;}
.btn-start:hover{background:var(--d-blue2);transform:translateY(-1px);color:#fff;text-decoration:none;}
.btn-details{display:inline-flex;align-items:center;gap:6px;padding:10px 16px;background:#fff;color:var(--d-muted);border:1.5px solid var(--d-border);border-radius:6px;font-size:13px;font-weight:600;text-decoration:none;transition:all .2s;}
.btn-details:hover{border-color:var(--d-blue);color:var(--d-blue);text-decoration:none;}
.empty-state{text-align:center;padding:60px 20px;color:var(--d-muted);}
.empty-state i{font-size:48px;display:block;margin-bottom:16px;color:var(--d-border);}
@media(max-width:600px){.quiz-page{padding:24px 16px 60px;}.page-hero{padding:24px;}}
</style>
{% endblock %}
{% block body %}
<div class=\"quiz-page\">
  <div class=\"page-hero\">
    <div class=\"page-hero-tag\" data-i18n=\"quiz_page_tag\">Évaluation · Fintech</div>
    <h1 data-i18n=\"quiz_page_title\">Quiz &amp; Évaluations</h1>
    <p data-i18n=\"quiz_page_desc\">Testez vos connaissances en finance personnelle avec nos quiz interactifs.</p>
  </div>
  {% if quizzes is empty %}
    <div class=\"empty-state\">
      <i class=\"fa fa-question-circle\"></i>
      <p data-i18n=\"quiz_empty\">Aucun quiz disponible pour le moment.</p>
    </div>
  {% else %}
    <div class=\"quiz-grid\">
      {% for quiz in quizzes %}
        <div class=\"quiz-card\">
          <div>
            {% if quiz.isExamMode %}
              <span class=\"quiz-badge badge-exam\" data-i18n=\"quiz_mode_exam\">Mode examen</span>
            {% else %}
              <span class=\"quiz-badge badge-practice\" data-i18n=\"quiz_mode_practice\">Entraînement</span>
            {% endif %}
          </div>
          <h3>{{ quiz.titre }}</h3>
          <div class=\"quiz-meta\">
            {% if quiz.scoreQuiz %}<div class=\"quiz-meta-item\"><i class=\"fa fa-star\"></i><span>{{ quiz.scoreQuiz }} pts</span></div>{% endif %}
            {% if quiz.timeLimit %}<div class=\"quiz-meta-item\"><i class=\"fa fa-clock-o\"></i><span>{{ quiz.timeLimit }} min</span></div>{% endif %}
            {% if quiz.dateCreation %}<div class=\"quiz-meta-item\"><i class=\"fa fa-calendar\"></i><span>{{ quiz.dateCreation|date('d/m/Y') }}</span></div>{% endif %}
          </div>
          <div class=\"quiz-actions\">
            <a href=\"{{ path('app_quiz_show', {'id': quiz.id}) }}\" class=\"btn-start\" data-i18n=\"quiz_btn_start\"><i class=\"fa fa-play\"></i> Commencer</a>
            <a href=\"{{ path('app_quiz_show', {'id': quiz.id}) }}\" class=\"btn-details\" data-i18n=\"quiz_btn_details\">Détails</a>
          </div>
        </div>
      {% endfor %}
    </div>
  {% endif %}
</div>
{% endblock %}
{% block javascripts %}
<script>
const QUIZ_T = {
  fr:{quiz_page_tag:'Évaluation · Fintech',quiz_page_title:'Quiz & Évaluations',quiz_page_desc:'Testez vos connaissances en finance personnelle avec nos quiz interactifs.',quiz_empty:'Aucun quiz disponible pour le moment.',quiz_mode_exam:'Mode examen',quiz_mode_practice:'Entraînement',quiz_btn_start:'Commencer',quiz_btn_details:'Détails'},
  en:{quiz_page_tag:'Assessment · Fintech',quiz_page_title:'Quizzes & Assessments',quiz_page_desc:'Test your personal finance knowledge with our interactive quizzes.',quiz_empty:'No quizzes available at the moment.',quiz_mode_exam:'Exam mode',quiz_mode_practice:'Practice',quiz_btn_start:'Start',quiz_btn_details:'Details'},
  ar:{quiz_page_tag:'تقييم · فينتك',quiz_page_title:'الاختبارات والتقييمات',quiz_page_desc:'اختبر معلوماتك في الإدارة المالية الشخصية مع اختباراتنا التفاعلية.',quiz_empty:'لا توجد اختبارات متاحة في الوقت الحالي.',quiz_mode_exam:'وضع الامتحان',quiz_mode_practice:'تدريب',quiz_btn_start:'ابدأ',quiz_btn_details:'التفاصيل'}
};
function applyPageTranslations(lang) {
  const base = (typeof DINARI_TRANSLATIONS !== 'undefined' && DINARI_TRANSLATIONS[lang]) || {};
  const page = QUIZ_T[lang] || QUIZ_T['fr'];
  const t = Object.assign({}, base, page);
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (t[key] !== undefined) el.textContent = t[key];
  });
}
</script>
{% endblock %}
", "client/quiz/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\quiz\\index.html.twig");
    }
}
