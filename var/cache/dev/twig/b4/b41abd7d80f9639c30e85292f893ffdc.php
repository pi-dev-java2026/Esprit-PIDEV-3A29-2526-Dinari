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

/* admin/quiz/form.html.twig */
class __TwigTemplate_850760e7e9a64a505da399f0cd5a93a4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/quiz/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/quiz/form.html.twig"));

        // line 2
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), ["admin/_form_theme.html.twig"], true);
        // line 1
        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 4, $this->source); })()) == "new")) ? ("Nouveau quiz") : ("Modifier le quiz"));
        yield " — Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 5, $this->source); })()) == "new")) ? ("Nouveau quiz") : ("Modifier"));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 6, $this->source); })()) == "new")) ? ("Créer un quiz") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 6, $this->source); })()), "titre", [], "any", false, false, false, 6), "html", null, true)));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
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

        // line 9
        yield "<style>
.field-error {
    display: flex; align-items: center; gap: 5px;
    margin-top: 6px; font-size: 12px; font-weight: 600; color: #e74c3c;
}
.field-error i { font-size: 13px; flex-shrink: 0; }
.field-invalid {
    border-color: #e74c3c !important;
    box-shadow: 0 0 0 3px rgba(231,76,60,.1) !important;
}
.form-group-d:has(.field-error) > label { color: #e74c3c !important; }
.label-error { color: #e74c3c !important; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 24
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

        // line 25
        yield "<div class=\"page-header\">
    <div>
        <h1>";
        // line 27
        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 27, $this->source); })()) == "new")) ? ("Nouveau quiz") : ("Modifier le quiz"));
        yield "</h1>
        <div class=\"breadcrumb-d\">
            <a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Dashboard</a> ›
            <a href=\"";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
        yield "\">Quiz</a> ›
            ";
        // line 31
        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 31, $this->source); })()) == "new")) ? ("Nouveau") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 31, $this->source); })()), "titre", [], "any", false, false, false, 31), "html", null, true)));
        yield "
        </div>
    </div>
    <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
        yield "\" class=\"btn-dinari btn-secondary-d\">
        <i class=\"ri-arrow-left-line\"></i> Retour
    </a>
</div>

<div class=\"card-dinari\" style=\"max-width:700px;\">

    ";
        // line 41
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate", "id" => "quiz-form"]]);
        yield "

    ";
        // line 44
        yield "    ";
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "vars", [], "any", false, false, false, 44), "valid", [], "any", false, false, false, 44) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "vars", [], "any", false, false, false, 44), "submitted", [], "any", false, false, false, 44))) {
            // line 45
            yield "    <div style=\"background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.3);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:flex-start;gap:10px;\">
        <i class=\"ri-error-warning-line\" style=\"color:#e74c3c;font-size:18px;flex-shrink:0;margin-top:1px;\"></i>
        <div style=\"font-size:13px;color:#e74c3c;\">
            <strong>Veuillez corriger les erreurs suivantes :</strong>
            <ul style=\"margin:6px 0 0;padding-left:16px;\">
                ";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(["titre", "listeReponse", "reponseCorrect", "scoreQuiz", "timeLimit"]);
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 51
                yield "                    ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), $context["field"], [], "array", false, false, false, 51), "vars", [], "any", false, false, false, 51), "errors", [], "any", false, false, false, 51)) > 0)) {
                    // line 52
                    yield "                        <li>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), $context["field"], [], "array", false, false, false, 52), "vars", [], "any", false, false, false, 52), "label", [], "any", false, false, false, 52), "html", null, true);
                    yield " : ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), $context["field"], [], "array", false, false, false, 52), "vars", [], "any", false, false, false, 52), "errors", [], "any", false, false, false, 52), 0, [], "array", false, false, false, 52), "message", [], "any", false, false, false, 52), "html", null, true);
                    yield "</li>
                    ";
                }
                // line 54
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            yield "            </ul>
        </div>
    </div>
    ";
        }
        // line 59
        yield "
    <div class=\"form-group-d\">
        ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "titre", [], "any", false, false, false, 61), 'label');
        yield "
        ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "titre", [], "any", false, false, false, 62), 'widget');
        yield "
        ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "titre", [], "any", false, false, false, 63), 'errors');
        yield "
    </div>

    <div class=\"form-group-d\">
        ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "cours", [], "any", false, false, false, 67), 'label');
        yield "
        ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "cours", [], "any", false, false, false, 68), 'widget');
        yield "
    </div>

    <div class=\"form-group-d\">
        ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "listeReponse", [], "any", false, false, false, 72), 'label');
        yield "
        ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "listeReponse", [], "any", false, false, false, 73), 'widget');
        yield "
        ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "listeReponse", [], "any", false, false, false, 74), 'errors');
        yield "
        <small style=\"color:var(--muted);font-size:12px;\">Saisissez une réponse par ligne.</small>
    </div>

    <div class=\"form-group-d\">
        ";
        // line 79
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "reponseCorrect", [], "any", false, false, false, 79), 'label');
        yield "
        ";
        // line 80
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "reponseCorrect", [], "any", false, false, false, 80), 'widget');
        yield "
        ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "reponseCorrect", [], "any", false, false, false, 81), 'errors');
        yield "
        <small style=\"color:var(--muted);font-size:12px;\">Doit correspondre exactement à l'une des réponses ci-dessus.</small>
    </div>

    <div style=\"display:grid;grid-template-columns:1fr 1fr;gap:16px;\">
        <div class=\"form-group-d\">
            ";
        // line 87
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 87), 'label');
        yield "
            ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 88, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 88), 'widget');
        yield "
            ";
        // line 89
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 89), 'errors');
        yield "
        </div>
        <div class=\"form-group-d\">
            ";
        // line 92
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "timeLimit", [], "any", false, false, false, 92), 'label');
        yield "
            ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "timeLimit", [], "any", false, false, false, 93), 'widget');
        yield "
            ";
        // line 94
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 94, $this->source); })()), "timeLimit", [], "any", false, false, false, 94), 'errors');
        yield "
            <small style=\"color:var(--muted);font-size:12px;\">En secondes. Laisser vide si pas de limite.</small>
        </div>
    </div>

    <div class=\"form-group-d\" style=\"display:flex;align-items:center;gap:10px;\">
        ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "isExamMode", [], "any", false, false, false, 100), 'widget');
        yield "
        ";
        // line 101
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 101, $this->source); })()), "isExamMode", [], "any", false, false, false, 101), 'label');
        yield "
    </div>

    <div style=\"display:flex;gap:10px;margin-top:16px;\">
        <button type=\"submit\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-save-line\"></i> ";
        // line 106
        yield ((((isset($context["mode"]) || array_key_exists("mode", $context) ? $context["mode"] : (function () { throw new RuntimeError('Variable "mode" does not exist.', 106, $this->source); })()) == "new")) ? ("Créer le quiz") : ("Enregistrer"));
        yield "
        </button>
        <a href=\"";
        // line 108
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
        yield "\" class=\"btn-dinari btn-secondary-d\">Annuler</a>
    </div>

    ";
        // line 111
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), 'form_end');
        yield "
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 115
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

        // line 116
        yield "<script>
// ── Required field definitions ──
const REQUIRED = [
    { id: '";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "titre", [], "any", false, false, false, 119), "vars", [], "any", false, false, false, 119), "id", [], "any", false, false, false, 119), "html", null, true);
        yield "',          label: 'Titre du quiz' },
    { id: '";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 120, $this->source); })()), "listeReponse", [], "any", false, false, false, 120), "vars", [], "any", false, false, false, 120), "id", [], "any", false, false, false, 120), "html", null, true);
        yield "',   label: 'Choix de réponses' },
    { id: '";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 121, $this->source); })()), "reponseCorrect", [], "any", false, false, false, 121), "vars", [], "any", false, false, false, 121), "id", [], "any", false, false, false, 121), "html", null, true);
        yield "', label: 'Réponse correcte' },
];

const POSITIVE_INT = [
    { id: '";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 125, $this->source); })()), "scoreQuiz", [], "any", false, false, false, 125), "vars", [], "any", false, false, false, 125), "id", [], "any", false, false, false, 125), "html", null, true);
        yield "',  label: 'Score' },
    { id: '";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 126, $this->source); })()), "timeLimit", [], "any", false, false, false, 126), "vars", [], "any", false, false, false, 126), "id", [], "any", false, false, false, 126), "html", null, true);
        yield "',  label: 'Limite de temps' },
];

function setError(input, message) {
    clearError(input);
    input.classList.add('field-invalid');
    input.closest('.form-group-d')?.querySelector('label')?.classList.add('label-error');
    const err = document.createElement('div');
    err.className = 'field-error field-error-js';
    err.innerHTML = '<i class=\"ri-error-warning-line\"></i> ' + message;
    input.insertAdjacentElement('afterend', err);
}

function clearError(input) {
    input.classList.remove('field-invalid');
    input.closest('.form-group-d')?.querySelector('label')?.classList.remove('label-error');
    input.parentElement?.querySelector('.field-error-js')?.remove();
}

function validateForm() {
    let valid = true;
    let firstInvalid = null;

    // Required text/textarea fields
    REQUIRED.forEach(({ id, label }) => {
        const el = document.getElementById(id);
        if (!el) return;
        if (el.value.trim() === '') {
            setError(el, label + ' est obligatoire.');
            valid = false;
            firstInvalid = firstInvalid || el;
        }
    });

    // Positive integer fields (only if filled)
    POSITIVE_INT.forEach(({ id, label }) => {
        const el = document.getElementById(id);
        if (!el || el.value.trim() === '') return;
        const val = parseInt(el.value, 10);
        if (isNaN(val) || val < 1) {
            setError(el, label + ' doit être un nombre positif.');
            valid = false;
            firstInvalid = firstInvalid || el;
        }
    });

    // Réponse correcte must match one of the choices
    const choicesEl = document.getElementById('";
        // line 173
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 173, $this->source); })()), "listeReponse", [], "any", false, false, false, 173), "vars", [], "any", false, false, false, 173), "id", [], "any", false, false, false, 173), "html", null, true);
        yield "');
    const correctEl = document.getElementById('";
        // line 174
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 174, $this->source); })()), "reponseCorrect", [], "any", false, false, false, 174), "vars", [], "any", false, false, false, 174), "id", [], "any", false, false, false, 174), "html", null, true);
        yield "');
    if (choicesEl && correctEl && choicesEl.value.trim() && correctEl.value.trim()) {
        const choices = choicesEl.value.split('\\n').map(l => l.trim()).filter(Boolean);
        const correct = correctEl.value.trim();
        if (!choices.includes(correct)) {
            setError(correctEl, 'La réponse correcte doit correspondre exactement à l\\'un des choix.');
            valid = false;
            firstInvalid = firstInvalid || correctEl;
        }
    }

    return { valid, firstInvalid };
}

document.getElementById('quiz-form').addEventListener('submit', function(e) {
    // Clear previous JS errors
    document.querySelectorAll('.field-error-js').forEach(el => el.remove());
    document.querySelectorAll('.field-invalid').forEach(el => el.classList.remove('field-invalid'));
    document.querySelectorAll('.label-error').forEach(el => el.classList.remove('label-error'));
    document.getElementById('quiz-validation-banner')?.remove();

    const { valid, firstInvalid } = validateForm();

    if (!valid) {
        e.preventDefault();

        const banner = document.createElement('div');
        banner.id = 'quiz-validation-banner';
        banner.style.cssText = 'background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.3);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:#e74c3c;';
        banner.innerHTML = '<i class=\"ri-error-warning-line\" style=\"font-size:18px;flex-shrink:0;\"></i> Veuillez remplir les champs obligatoires avant de continuer.';
        this.insertAdjacentElement('afterbegin', banner);

        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalid.focus();
        }
    }
});

// Clear error live as user types
document.addEventListener('input', function(e) {
    if (e.target.matches('input, textarea, select')) {
        clearError(e.target);
        if (!document.querySelector('.field-invalid')) {
            document.getElementById('quiz-validation-banner')?.remove();
        }
    }
});

// Highlight server-side errors on load
document.querySelectorAll('.field-error:not(.field-error-js)').forEach(err => {
    const input = err.closest('.form-group-d')?.querySelector('input, textarea, select');
    if (input) input.classList.add('field-invalid');
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
        return "admin/quiz/form.html.twig";
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
        return array (  488 => 174,  484 => 173,  434 => 126,  430 => 125,  423 => 121,  419 => 120,  415 => 119,  410 => 116,  397 => 115,  383 => 111,  377 => 108,  372 => 106,  364 => 101,  360 => 100,  351 => 94,  347 => 93,  343 => 92,  337 => 89,  333 => 88,  329 => 87,  320 => 81,  316 => 80,  312 => 79,  304 => 74,  300 => 73,  296 => 72,  289 => 68,  285 => 67,  278 => 63,  274 => 62,  270 => 61,  266 => 59,  260 => 55,  254 => 54,  246 => 52,  243 => 51,  239 => 50,  232 => 45,  229 => 44,  224 => 41,  214 => 34,  208 => 31,  204 => 30,  200 => 29,  195 => 27,  191 => 25,  178 => 24,  154 => 9,  141 => 8,  118 => 6,  95 => 5,  71 => 4,  60 => 1,  58 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% form_theme form 'admin/_form_theme.html.twig' %}

{% block title %}{{ mode == 'new' ? 'Nouveau quiz' : 'Modifier le quiz' }} — Admin{% endblock %}
{% block page_title %}{{ mode == 'new' ? 'Nouveau quiz' : 'Modifier' }}{% endblock %}
{% block section_title %}{{ mode == 'new' ? 'Créer un quiz' : quiz.titre }}{% endblock %}

{% block stylesheets %}
<style>
.field-error {
    display: flex; align-items: center; gap: 5px;
    margin-top: 6px; font-size: 12px; font-weight: 600; color: #e74c3c;
}
.field-error i { font-size: 13px; flex-shrink: 0; }
.field-invalid {
    border-color: #e74c3c !important;
    box-shadow: 0 0 0 3px rgba(231,76,60,.1) !important;
}
.form-group-d:has(.field-error) > label { color: #e74c3c !important; }
.label-error { color: #e74c3c !important; }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>{{ mode == 'new' ? 'Nouveau quiz' : 'Modifier le quiz' }}</h1>
        <div class=\"breadcrumb-d\">
            <a href=\"{{ path('admin_dashboard') }}\">Dashboard</a> ›
            <a href=\"{{ path('admin_quiz_index') }}\">Quiz</a> ›
            {{ mode == 'new' ? 'Nouveau' : quiz.titre }}
        </div>
    </div>
    <a href=\"{{ path('admin_quiz_index') }}\" class=\"btn-dinari btn-secondary-d\">
        <i class=\"ri-arrow-left-line\"></i> Retour
    </a>
</div>

<div class=\"card-dinari\" style=\"max-width:700px;\">

    {{ form_start(form, {attr: {novalidate: 'novalidate', id: 'quiz-form'}}) }}

    {# ── Server-side error summary ── #}
    {% if not form.vars.valid and form.vars.submitted %}
    <div style=\"background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.3);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:flex-start;gap:10px;\">
        <i class=\"ri-error-warning-line\" style=\"color:#e74c3c;font-size:18px;flex-shrink:0;margin-top:1px;\"></i>
        <div style=\"font-size:13px;color:#e74c3c;\">
            <strong>Veuillez corriger les erreurs suivantes :</strong>
            <ul style=\"margin:6px 0 0;padding-left:16px;\">
                {% for field in ['titre','listeReponse','reponseCorrect','scoreQuiz','timeLimit'] %}
                    {% if form[field].vars.errors|length > 0 %}
                        <li>{{ form[field].vars.label }} : {{ form[field].vars.errors[0].message }}</li>
                    {% endif %}
                {% endfor %}
            </ul>
        </div>
    </div>
    {% endif %}

    <div class=\"form-group-d\">
        {{ form_label(form.titre) }}
        {{ form_widget(form.titre) }}
        {{ form_errors(form.titre) }}
    </div>

    <div class=\"form-group-d\">
        {{ form_label(form.cours) }}
        {{ form_widget(form.cours) }}
    </div>

    <div class=\"form-group-d\">
        {{ form_label(form.listeReponse) }}
        {{ form_widget(form.listeReponse) }}
        {{ form_errors(form.listeReponse) }}
        <small style=\"color:var(--muted);font-size:12px;\">Saisissez une réponse par ligne.</small>
    </div>

    <div class=\"form-group-d\">
        {{ form_label(form.reponseCorrect) }}
        {{ form_widget(form.reponseCorrect) }}
        {{ form_errors(form.reponseCorrect) }}
        <small style=\"color:var(--muted);font-size:12px;\">Doit correspondre exactement à l'une des réponses ci-dessus.</small>
    </div>

    <div style=\"display:grid;grid-template-columns:1fr 1fr;gap:16px;\">
        <div class=\"form-group-d\">
            {{ form_label(form.scoreQuiz) }}
            {{ form_widget(form.scoreQuiz) }}
            {{ form_errors(form.scoreQuiz) }}
        </div>
        <div class=\"form-group-d\">
            {{ form_label(form.timeLimit) }}
            {{ form_widget(form.timeLimit) }}
            {{ form_errors(form.timeLimit) }}
            <small style=\"color:var(--muted);font-size:12px;\">En secondes. Laisser vide si pas de limite.</small>
        </div>
    </div>

    <div class=\"form-group-d\" style=\"display:flex;align-items:center;gap:10px;\">
        {{ form_widget(form.isExamMode) }}
        {{ form_label(form.isExamMode) }}
    </div>

    <div style=\"display:flex;gap:10px;margin-top:16px;\">
        <button type=\"submit\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-save-line\"></i> {{ mode == 'new' ? 'Créer le quiz' : 'Enregistrer' }}
        </button>
        <a href=\"{{ path('admin_quiz_index') }}\" class=\"btn-dinari btn-secondary-d\">Annuler</a>
    </div>

    {{ form_end(form) }}
</div>
{% endblock %}

{% block javascripts %}
<script>
// ── Required field definitions ──
const REQUIRED = [
    { id: '{{ form.titre.vars.id }}',          label: 'Titre du quiz' },
    { id: '{{ form.listeReponse.vars.id }}',   label: 'Choix de réponses' },
    { id: '{{ form.reponseCorrect.vars.id }}', label: 'Réponse correcte' },
];

const POSITIVE_INT = [
    { id: '{{ form.scoreQuiz.vars.id }}',  label: 'Score' },
    { id: '{{ form.timeLimit.vars.id }}',  label: 'Limite de temps' },
];

function setError(input, message) {
    clearError(input);
    input.classList.add('field-invalid');
    input.closest('.form-group-d')?.querySelector('label')?.classList.add('label-error');
    const err = document.createElement('div');
    err.className = 'field-error field-error-js';
    err.innerHTML = '<i class=\"ri-error-warning-line\"></i> ' + message;
    input.insertAdjacentElement('afterend', err);
}

function clearError(input) {
    input.classList.remove('field-invalid');
    input.closest('.form-group-d')?.querySelector('label')?.classList.remove('label-error');
    input.parentElement?.querySelector('.field-error-js')?.remove();
}

function validateForm() {
    let valid = true;
    let firstInvalid = null;

    // Required text/textarea fields
    REQUIRED.forEach(({ id, label }) => {
        const el = document.getElementById(id);
        if (!el) return;
        if (el.value.trim() === '') {
            setError(el, label + ' est obligatoire.');
            valid = false;
            firstInvalid = firstInvalid || el;
        }
    });

    // Positive integer fields (only if filled)
    POSITIVE_INT.forEach(({ id, label }) => {
        const el = document.getElementById(id);
        if (!el || el.value.trim() === '') return;
        const val = parseInt(el.value, 10);
        if (isNaN(val) || val < 1) {
            setError(el, label + ' doit être un nombre positif.');
            valid = false;
            firstInvalid = firstInvalid || el;
        }
    });

    // Réponse correcte must match one of the choices
    const choicesEl = document.getElementById('{{ form.listeReponse.vars.id }}');
    const correctEl = document.getElementById('{{ form.reponseCorrect.vars.id }}');
    if (choicesEl && correctEl && choicesEl.value.trim() && correctEl.value.trim()) {
        const choices = choicesEl.value.split('\\n').map(l => l.trim()).filter(Boolean);
        const correct = correctEl.value.trim();
        if (!choices.includes(correct)) {
            setError(correctEl, 'La réponse correcte doit correspondre exactement à l\\'un des choix.');
            valid = false;
            firstInvalid = firstInvalid || correctEl;
        }
    }

    return { valid, firstInvalid };
}

document.getElementById('quiz-form').addEventListener('submit', function(e) {
    // Clear previous JS errors
    document.querySelectorAll('.field-error-js').forEach(el => el.remove());
    document.querySelectorAll('.field-invalid').forEach(el => el.classList.remove('field-invalid'));
    document.querySelectorAll('.label-error').forEach(el => el.classList.remove('label-error'));
    document.getElementById('quiz-validation-banner')?.remove();

    const { valid, firstInvalid } = validateForm();

    if (!valid) {
        e.preventDefault();

        const banner = document.createElement('div');
        banner.id = 'quiz-validation-banner';
        banner.style.cssText = 'background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.3);border-radius:10px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:#e74c3c;';
        banner.innerHTML = '<i class=\"ri-error-warning-line\" style=\"font-size:18px;flex-shrink:0;\"></i> Veuillez remplir les champs obligatoires avant de continuer.';
        this.insertAdjacentElement('afterbegin', banner);

        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalid.focus();
        }
    }
});

// Clear error live as user types
document.addEventListener('input', function(e) {
    if (e.target.matches('input, textarea, select')) {
        clearError(e.target);
        if (!document.querySelector('.field-invalid')) {
            document.getElementById('quiz-validation-banner')?.remove();
        }
    }
});

// Highlight server-side errors on load
document.querySelectorAll('.field-error:not(.field-error-js)').forEach(err => {
    const input = err.closest('.form-group-d')?.querySelector('input, textarea, select');
    if (input) input.classList.add('field-invalid');
});
</script>
{% endblock %}
", "admin/quiz/form.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\quiz\\form.html.twig");
    }
}
