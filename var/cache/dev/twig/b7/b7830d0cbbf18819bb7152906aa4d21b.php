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

/* client/quiz/show.html.twig */
class __TwigTemplate_df6be302d204fcd4d659531d29bbb1b8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/quiz/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/quiz/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 2, $this->source); })()), "titre", [], "any", false, false, false, 2), "html", null, true);
        yield " — Quiz Dinari";
        
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
body{font-family:'DM Sans',sans-serif;background:var(--d-light);color:var(--d-text);}
.quiz-show-page{max-width:760px;margin:0 auto;padding:48px 24px 80px;}
.back-link{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:var(--d-muted);text-decoration:none;margin-bottom:24px;transition:color .2s;}
.back-link:hover{color:var(--d-blue);text-decoration:none;}
.quiz-header{background:var(--d-blue);border-radius:12px;padding:32px;margin-bottom:24px;position:relative;overflow:hidden;}
.quiz-header::after{content:'';position:absolute;right:-30px;top:-30px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.06);}
.quiz-header-tag{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:8px;}
.quiz-header h1{font-family:'Syne',sans-serif;font-size:22px;font-weight:700;color:#fff;margin-bottom:0;}
.quiz-meta-bar{display:flex;gap:20px;flex-wrap:wrap;margin-top:16px;}
.qmeta{display:flex;align-items:center;gap:6px;font-size:12px;color:rgba(255,255,255,.7);}
.qmeta i{font-size:14px;}
.quiz-body{background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:28px;margin-bottom:20px;}
.quiz-section-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:16px;display:flex;align-items:center;gap:8px;}
.answers-list{display:flex;flex-direction:column;gap:10px;}
.answer-opt{display:flex;align-items:center;gap:10px;padding:12px 16px;border:1.5px solid var(--d-border);border-radius:8px;font-size:14px;color:var(--d-text);cursor:pointer;transition:all .2s;user-select:none;}
.answer-opt:hover{border-color:var(--d-blue);background:#eef4fd;}
.answer-opt.selected{border-color:var(--d-blue);background:#eef4fd;font-weight:600;}
.answer-opt.correct{border-color:var(--d-green);background:rgba(39,174,96,.08);color:var(--d-green);font-weight:600;}
.answer-opt.wrong{border-color:#e74c3c;background:rgba(231,76,60,.07);color:#e74c3c;}
.answer-dot{width:18px;height:18px;border-radius:50%;border:2px solid var(--d-border);flex-shrink:0;transition:all .2s;}
.answer-opt.selected .answer-dot{background:var(--d-blue);border-color:var(--d-blue);}
.answer-opt.correct .answer-dot{background:var(--d-green);border-color:var(--d-green);}
.answer-opt.wrong .answer-dot{background:#e74c3c;border-color:#e74c3c;}
.quiz-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:20px;}
.btn-submit{display:inline-flex;align-items:center;gap:7px;padding:12px 28px;background:var(--d-blue);color:#fff;border:none;border-radius:6px;font-family:'Syne',sans-serif;font-weight:700;font-size:14px;cursor:pointer;transition:all .25s;}
.btn-submit:hover{background:var(--d-blue2);transform:translateY(-1px);}
.btn-back-list{display:inline-flex;align-items:center;gap:7px;padding:12px 20px;background:#fff;color:var(--d-muted);border:1.5px solid var(--d-border);border-radius:6px;font-size:13px;font-weight:600;text-decoration:none;transition:all .2s;}
.btn-back-list:hover{border-color:var(--d-blue);color:var(--d-blue);text-decoration:none;}
.result-box{padding:16px 20px;border-radius:8px;font-size:14px;font-weight:600;display:none;margin-top:16px;}
.result-box.correct{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.25);}
.result-box.wrong{background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.info-row{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--d-border);font-size:13px;}
.info-row:last-child{border-bottom:none;}
.info-label{color:var(--d-muted);font-weight:500;}
.info-value{color:var(--d-text);font-weight:600;}
@media(max-width:600px){.quiz-show-page{padding:24px 16px 60px;}}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 46
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

        // line 47
        yield "<div class=\"quiz-show-page\">

  <a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_index");
        yield "\" class=\"back-link\">
    <i class=\"fa fa-arrow-left\"></i> <span data-i18n=\"quiz_back\">Retour aux quiz</span>
  </a>

  <div class=\"quiz-header\">
    <div class=\"quiz-header-tag\" data-i18n=\"quiz_show_tag\">Quiz · Fintech</div>
    <h1>";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 55, $this->source); })()), "titre", [], "any", false, false, false, 55), "html", null, true);
        yield "</h1>
    <div class=\"quiz-meta-bar\">
      ";
        // line 57
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 57, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"qmeta\"><i class=\"fa fa-star\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 57, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 57), "html", null, true);
            yield " pts</div>";
        }
        // line 58
        yield "      ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 58, $this->source); })()), "timeLimit", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"qmeta\"><i class=\"fa fa-clock-o\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 58, $this->source); })()), "timeLimit", [], "any", false, false, false, 58), "html", null, true);
            yield " min</div>";
        }
        // line 59
        yield "      ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 59, $this->source); })()), "isExamMode", [], "any", false, false, false, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 60
            yield "        <div class=\"qmeta\"><i class=\"fa fa-graduation-cap\"></i> <span data-i18n=\"quiz_mode_exam\">Mode examen</span></div>
      ";
        } else {
            // line 62
            yield "        <div class=\"qmeta\"><i class=\"fa fa-pencil\"></i> <span data-i18n=\"quiz_mode_practice\">Entraînement</span></div>
      ";
        }
        // line 64
        yield "    </div>
  </div>

  ";
        // line 68
        yield "  <div class=\"quiz-body\">
    <div class=\"quiz-section-title\">❓ <span data-i18n=\"quiz_question_label\">Question</span></div>
    <p style=\"font-size:15px;font-weight:600;color:var(--d-text);margin-bottom:20px;line-height:1.6;\">
      ";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 71, $this->source); })()), "titre", [], "any", false, false, false, 71), "html", null, true);
        yield "
    </p>

    ";
        // line 74
        $context["answers"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 74, $this->source); })()), "listeReponse", [], "any", false, false, false, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 74, $this->source); })()), "listeReponse", [], "any", false, false, false, 74), ",")) : ([]));
        // line 75
        yield "    <div class=\"answers-list\" id=\"answers-list\">
      ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["answers"]) || array_key_exists("answers", $context) ? $context["answers"] : (function () { throw new RuntimeError('Variable "answers" does not exist.', 76, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 77
            yield "        <div class=\"answer-opt\" onclick=\"selectAnswer(this, '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["answer"]), "html", null, true);
            yield "')\" data-value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["answer"]), "html", null, true);
            yield "\">
          <div class=\"answer-dot\"></div>
          <span>";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["answer"]), "html", null, true);
            yield "</span>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        yield "    </div>

    <div class=\"result-box\" id=\"result-box\"></div>

    <div class=\"quiz-actions\">
      <button class=\"btn-submit\" onclick=\"checkAnswer('";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 87, $this->source); })()), "reponseCorrect", [], "any", false, false, false, 87), "html", null, true);
        yield "')\" data-i18n=\"quiz_btn_check\">
        <i class=\"fa fa-check\"></i> Vérifier ma réponse
      </button>
      <a href=\"";
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_index");
        yield "\" class=\"btn-back-list\" data-i18n=\"quiz_back\">
        <i class=\"fa fa-arrow-left\"></i> Retour aux quiz
      </a>
    </div>
  </div>

  ";
        // line 97
        yield "  <div class=\"quiz-body\">
    <div class=\"quiz-section-title\">ℹ️ <span data-i18n=\"quiz_info_title\">Informations</span></div>
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_score\">Score</span>
      <span class=\"info-value\">";
        // line 101
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "scoreQuiz", [], "any", true, true, false, 101) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 101, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 101)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 101, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 101), "html", null, true)) : ("—"));
        yield " pts</span>
    </div>
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_time\">Limite de temps</span>
      <span class=\"info-value\">";
        // line 105
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 105, $this->source); })()), "timeLimit", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 105, $this->source); })()), "timeLimit", [], "any", false, false, false, 105) . " min"), "html", null, true)) : ("—"));
        yield "</span>
    </div>
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_mode\">Mode</span>
      <span class=\"info-value\">
        ";
        // line 110
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 110, $this->source); })()), "isExamMode", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span data-i18n=\"quiz_mode_exam\">Mode examen</span>
        ";
        } else {
            // line 111
            yield "<span data-i18n=\"quiz_mode_practice\">Entraînement</span>";
        }
        // line 112
        yield "      </span>
    </div>
    ";
        // line 114
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 114, $this->source); })()), "dateCreation", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 115
            yield "    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_date\">Date de création</span>
      <span class=\"info-value\">";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 117, $this->source); })()), "dateCreation", [], "any", false, false, false, 117), "d/m/Y"), "html", null, true);
            yield "</span>
    </div>
    ";
        }
        // line 120
        yield "  </div>

</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 124
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

        // line 125
        yield "<script>
let selectedVal = null;

function selectAnswer(el, val) {
  document.querySelectorAll('.answer-opt').forEach(o => o.classList.remove('selected'));
  el.classList.add('selected');
  selectedVal = val;
  document.getElementById('result-box').style.display = 'none';
}

function checkAnswer(correct) {
  const rb = document.getElementById('result-box');
  const lang = localStorage.getItem('dinari_lang') || 'fr';
  const t = QUIZ_SHOW_T[lang] || QUIZ_SHOW_T['fr'];

  if (!selectedVal) {
    rb.className = 'result-box wrong';
    rb.textContent = t.quiz_no_selection;
    rb.style.display = 'block';
    return;
  }

  document.querySelectorAll('.answer-opt').forEach(o => {
    o.classList.remove('correct','wrong');
    if (o.dataset.value === correct) o.classList.add('correct');
    else if (o.dataset.value === selectedVal && selectedVal !== correct) o.classList.add('wrong');
  });

  rb.style.display = 'block';
  if (selectedVal === correct) {
    rb.className = 'result-box correct';
    rb.textContent = t.quiz_correct_msg;
  } else {
    rb.className = 'result-box wrong';
    rb.textContent = t.quiz_wrong_msg + ' ' + correct;
  }
}

const QUIZ_SHOW_T = {
  fr:{
    quiz_back:'Retour aux quiz', quiz_show_tag:'Quiz · Fintech',
    quiz_question_label:'Question', quiz_btn_check:'Vérifier ma réponse',
    quiz_info_title:'Informations', quiz_info_score:'Score',
    quiz_info_time:'Limite de temps', quiz_info_mode:'Mode', quiz_info_date:'Date de création',
    quiz_mode_exam:'Mode examen', quiz_mode_practice:'Entraînement',
    quiz_no_selection:'Veuillez sélectionner une réponse.',
    quiz_correct_msg:'✅ Bonne réponse ! Félicitations.',
    quiz_wrong_msg:'❌ Mauvaise réponse. La bonne réponse est :',
  },
  en:{
    quiz_back:'Back to quizzes', quiz_show_tag:'Quiz · Fintech',
    quiz_question_label:'Question', quiz_btn_check:'Check my answer',
    quiz_info_title:'Information', quiz_info_score:'Score',
    quiz_info_time:'Time limit', quiz_info_mode:'Mode', quiz_info_date:'Creation date',
    quiz_mode_exam:'Exam mode', quiz_mode_practice:'Practice',
    quiz_no_selection:'Please select an answer.',
    quiz_correct_msg:'✅ Correct answer! Congratulations.',
    quiz_wrong_msg:'❌ Wrong answer. The correct answer is:',
  },
  ar:{
    quiz_back:'العودة إلى الاختبارات', quiz_show_tag:'اختبار · فينتك',
    quiz_question_label:'السؤال', quiz_btn_check:'تحقق من إجابتي',
    quiz_info_title:'معلومات', quiz_info_score:'النقاط',
    quiz_info_time:'الوقت المحدد', quiz_info_mode:'الوضع', quiz_info_date:'تاريخ الإنشاء',
    quiz_mode_exam:'وضع الامتحان', quiz_mode_practice:'تدريب',
    quiz_no_selection:'الرجاء اختيار إجابة.',
    quiz_correct_msg:'✅ إجابة صحيحة! تهانينا.',
    quiz_wrong_msg:'❌ إجابة خاطئة. الإجابة الصحيحة هي:',
  }
};

function applyPageTranslations(lang) {
  const base = (typeof DINARI_TRANSLATIONS !== 'undefined' && DINARI_TRANSLATIONS[lang]) || {};
  const page = QUIZ_SHOW_T[lang] || QUIZ_SHOW_T['fr'];
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
        return "client/quiz/show.html.twig";
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
        return array (  346 => 125,  333 => 124,  319 => 120,  313 => 117,  309 => 115,  307 => 114,  303 => 112,  300 => 111,  295 => 110,  287 => 105,  280 => 101,  274 => 97,  265 => 90,  259 => 87,  252 => 82,  243 => 79,  235 => 77,  231 => 76,  228 => 75,  226 => 74,  220 => 71,  215 => 68,  210 => 64,  206 => 62,  202 => 60,  199 => 59,  192 => 58,  186 => 57,  181 => 55,  172 => 49,  168 => 47,  155 => 46,  103 => 4,  90 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}{{ quiz.titre }} — Quiz Dinari{% endblock %}
{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root{--d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;--d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--d-light);color:var(--d-text);}
.quiz-show-page{max-width:760px;margin:0 auto;padding:48px 24px 80px;}
.back-link{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:var(--d-muted);text-decoration:none;margin-bottom:24px;transition:color .2s;}
.back-link:hover{color:var(--d-blue);text-decoration:none;}
.quiz-header{background:var(--d-blue);border-radius:12px;padding:32px;margin-bottom:24px;position:relative;overflow:hidden;}
.quiz-header::after{content:'';position:absolute;right:-30px;top:-30px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.06);}
.quiz-header-tag{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:8px;}
.quiz-header h1{font-family:'Syne',sans-serif;font-size:22px;font-weight:700;color:#fff;margin-bottom:0;}
.quiz-meta-bar{display:flex;gap:20px;flex-wrap:wrap;margin-top:16px;}
.qmeta{display:flex;align-items:center;gap:6px;font-size:12px;color:rgba(255,255,255,.7);}
.qmeta i{font-size:14px;}
.quiz-body{background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:28px;margin-bottom:20px;}
.quiz-section-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:16px;display:flex;align-items:center;gap:8px;}
.answers-list{display:flex;flex-direction:column;gap:10px;}
.answer-opt{display:flex;align-items:center;gap:10px;padding:12px 16px;border:1.5px solid var(--d-border);border-radius:8px;font-size:14px;color:var(--d-text);cursor:pointer;transition:all .2s;user-select:none;}
.answer-opt:hover{border-color:var(--d-blue);background:#eef4fd;}
.answer-opt.selected{border-color:var(--d-blue);background:#eef4fd;font-weight:600;}
.answer-opt.correct{border-color:var(--d-green);background:rgba(39,174,96,.08);color:var(--d-green);font-weight:600;}
.answer-opt.wrong{border-color:#e74c3c;background:rgba(231,76,60,.07);color:#e74c3c;}
.answer-dot{width:18px;height:18px;border-radius:50%;border:2px solid var(--d-border);flex-shrink:0;transition:all .2s;}
.answer-opt.selected .answer-dot{background:var(--d-blue);border-color:var(--d-blue);}
.answer-opt.correct .answer-dot{background:var(--d-green);border-color:var(--d-green);}
.answer-opt.wrong .answer-dot{background:#e74c3c;border-color:#e74c3c;}
.quiz-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:20px;}
.btn-submit{display:inline-flex;align-items:center;gap:7px;padding:12px 28px;background:var(--d-blue);color:#fff;border:none;border-radius:6px;font-family:'Syne',sans-serif;font-weight:700;font-size:14px;cursor:pointer;transition:all .25s;}
.btn-submit:hover{background:var(--d-blue2);transform:translateY(-1px);}
.btn-back-list{display:inline-flex;align-items:center;gap:7px;padding:12px 20px;background:#fff;color:var(--d-muted);border:1.5px solid var(--d-border);border-radius:6px;font-size:13px;font-weight:600;text-decoration:none;transition:all .2s;}
.btn-back-list:hover{border-color:var(--d-blue);color:var(--d-blue);text-decoration:none;}
.result-box{padding:16px 20px;border-radius:8px;font-size:14px;font-weight:600;display:none;margin-top:16px;}
.result-box.correct{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.25);}
.result-box.wrong{background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.info-row{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--d-border);font-size:13px;}
.info-row:last-child{border-bottom:none;}
.info-label{color:var(--d-muted);font-weight:500;}
.info-value{color:var(--d-text);font-weight:600;}
@media(max-width:600px){.quiz-show-page{padding:24px 16px 60px;}}
</style>
{% endblock %}
{% block body %}
<div class=\"quiz-show-page\">

  <a href=\"{{ path('app_quiz_index') }}\" class=\"back-link\">
    <i class=\"fa fa-arrow-left\"></i> <span data-i18n=\"quiz_back\">Retour aux quiz</span>
  </a>

  <div class=\"quiz-header\">
    <div class=\"quiz-header-tag\" data-i18n=\"quiz_show_tag\">Quiz · Fintech</div>
    <h1>{{ quiz.titre }}</h1>
    <div class=\"quiz-meta-bar\">
      {% if quiz.scoreQuiz %}<div class=\"qmeta\"><i class=\"fa fa-star\"></i> {{ quiz.scoreQuiz }} pts</div>{% endif %}
      {% if quiz.timeLimit %}<div class=\"qmeta\"><i class=\"fa fa-clock-o\"></i> {{ quiz.timeLimit }} min</div>{% endif %}
      {% if quiz.isExamMode %}
        <div class=\"qmeta\"><i class=\"fa fa-graduation-cap\"></i> <span data-i18n=\"quiz_mode_exam\">Mode examen</span></div>
      {% else %}
        <div class=\"qmeta\"><i class=\"fa fa-pencil\"></i> <span data-i18n=\"quiz_mode_practice\">Entraînement</span></div>
      {% endif %}
    </div>
  </div>

  {# Question block #}
  <div class=\"quiz-body\">
    <div class=\"quiz-section-title\">❓ <span data-i18n=\"quiz_question_label\">Question</span></div>
    <p style=\"font-size:15px;font-weight:600;color:var(--d-text);margin-bottom:20px;line-height:1.6;\">
      {{ quiz.titre }}
    </p>

    {% set answers = quiz.listeReponse ? quiz.listeReponse|split(',') : [] %}
    <div class=\"answers-list\" id=\"answers-list\">
      {% for answer in answers %}
        <div class=\"answer-opt\" onclick=\"selectAnswer(this, '{{ answer|trim }}')\" data-value=\"{{ answer|trim }}\">
          <div class=\"answer-dot\"></div>
          <span>{{ answer|trim }}</span>
        </div>
      {% endfor %}
    </div>

    <div class=\"result-box\" id=\"result-box\"></div>

    <div class=\"quiz-actions\">
      <button class=\"btn-submit\" onclick=\"checkAnswer('{{ quiz.reponseCorrect }}')\" data-i18n=\"quiz_btn_check\">
        <i class=\"fa fa-check\"></i> Vérifier ma réponse
      </button>
      <a href=\"{{ path('app_quiz_index') }}\" class=\"btn-back-list\" data-i18n=\"quiz_back\">
        <i class=\"fa fa-arrow-left\"></i> Retour aux quiz
      </a>
    </div>
  </div>

  {# Info block #}
  <div class=\"quiz-body\">
    <div class=\"quiz-section-title\">ℹ️ <span data-i18n=\"quiz_info_title\">Informations</span></div>
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_score\">Score</span>
      <span class=\"info-value\">{{ quiz.scoreQuiz ?? '—' }} pts</span>
    </div>
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_time\">Limite de temps</span>
      <span class=\"info-value\">{{ quiz.timeLimit ? quiz.timeLimit ~ ' min' : '—' }}</span>
    </div>
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_mode\">Mode</span>
      <span class=\"info-value\">
        {% if quiz.isExamMode %}<span data-i18n=\"quiz_mode_exam\">Mode examen</span>
        {% else %}<span data-i18n=\"quiz_mode_practice\">Entraînement</span>{% endif %}
      </span>
    </div>
    {% if quiz.dateCreation %}
    <div class=\"info-row\">
      <span class=\"info-label\" data-i18n=\"quiz_info_date\">Date de création</span>
      <span class=\"info-value\">{{ quiz.dateCreation|date('d/m/Y') }}</span>
    </div>
    {% endif %}
  </div>

</div>
{% endblock %}
{% block javascripts %}
<script>
let selectedVal = null;

function selectAnswer(el, val) {
  document.querySelectorAll('.answer-opt').forEach(o => o.classList.remove('selected'));
  el.classList.add('selected');
  selectedVal = val;
  document.getElementById('result-box').style.display = 'none';
}

function checkAnswer(correct) {
  const rb = document.getElementById('result-box');
  const lang = localStorage.getItem('dinari_lang') || 'fr';
  const t = QUIZ_SHOW_T[lang] || QUIZ_SHOW_T['fr'];

  if (!selectedVal) {
    rb.className = 'result-box wrong';
    rb.textContent = t.quiz_no_selection;
    rb.style.display = 'block';
    return;
  }

  document.querySelectorAll('.answer-opt').forEach(o => {
    o.classList.remove('correct','wrong');
    if (o.dataset.value === correct) o.classList.add('correct');
    else if (o.dataset.value === selectedVal && selectedVal !== correct) o.classList.add('wrong');
  });

  rb.style.display = 'block';
  if (selectedVal === correct) {
    rb.className = 'result-box correct';
    rb.textContent = t.quiz_correct_msg;
  } else {
    rb.className = 'result-box wrong';
    rb.textContent = t.quiz_wrong_msg + ' ' + correct;
  }
}

const QUIZ_SHOW_T = {
  fr:{
    quiz_back:'Retour aux quiz', quiz_show_tag:'Quiz · Fintech',
    quiz_question_label:'Question', quiz_btn_check:'Vérifier ma réponse',
    quiz_info_title:'Informations', quiz_info_score:'Score',
    quiz_info_time:'Limite de temps', quiz_info_mode:'Mode', quiz_info_date:'Date de création',
    quiz_mode_exam:'Mode examen', quiz_mode_practice:'Entraînement',
    quiz_no_selection:'Veuillez sélectionner une réponse.',
    quiz_correct_msg:'✅ Bonne réponse ! Félicitations.',
    quiz_wrong_msg:'❌ Mauvaise réponse. La bonne réponse est :',
  },
  en:{
    quiz_back:'Back to quizzes', quiz_show_tag:'Quiz · Fintech',
    quiz_question_label:'Question', quiz_btn_check:'Check my answer',
    quiz_info_title:'Information', quiz_info_score:'Score',
    quiz_info_time:'Time limit', quiz_info_mode:'Mode', quiz_info_date:'Creation date',
    quiz_mode_exam:'Exam mode', quiz_mode_practice:'Practice',
    quiz_no_selection:'Please select an answer.',
    quiz_correct_msg:'✅ Correct answer! Congratulations.',
    quiz_wrong_msg:'❌ Wrong answer. The correct answer is:',
  },
  ar:{
    quiz_back:'العودة إلى الاختبارات', quiz_show_tag:'اختبار · فينتك',
    quiz_question_label:'السؤال', quiz_btn_check:'تحقق من إجابتي',
    quiz_info_title:'معلومات', quiz_info_score:'النقاط',
    quiz_info_time:'الوقت المحدد', quiz_info_mode:'الوضع', quiz_info_date:'تاريخ الإنشاء',
    quiz_mode_exam:'وضع الامتحان', quiz_mode_practice:'تدريب',
    quiz_no_selection:'الرجاء اختيار إجابة.',
    quiz_correct_msg:'✅ إجابة صحيحة! تهانينا.',
    quiz_wrong_msg:'❌ إجابة خاطئة. الإجابة الصحيحة هي:',
  }
};

function applyPageTranslations(lang) {
  const base = (typeof DINARI_TRANSLATIONS !== 'undefined' && DINARI_TRANSLATIONS[lang]) || {};
  const page = QUIZ_SHOW_T[lang] || QUIZ_SHOW_T['fr'];
  const t = Object.assign({}, base, page);
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (t[key] !== undefined) el.textContent = t[key];
  });
}
</script>
{% endblock %}
", "client/quiz/show.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\quiz\\show.html.twig");
    }
}
