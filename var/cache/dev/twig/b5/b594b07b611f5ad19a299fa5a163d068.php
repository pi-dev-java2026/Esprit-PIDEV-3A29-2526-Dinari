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

/* client/statistiques/index.html.twig */
class __TwigTemplate_194f71416c48a698cc2a86045a4c4964 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/statistiques/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/statistiques/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Mes Statistiques — Dinari";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
.stats-page { max-width: 1100px; margin: 40px auto; padding: 0 20px 80px; }
.stats-page h1 { font-size: 28px; font-weight: 800; color: #2c3e50; margin-bottom: 6px; }
.stats-page .sub { color: #7f8c8d; font-size: 14px; margin-bottom: 32px; }

.kpi-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 36px; }
@media(max-width:768px){ .kpi-grid { grid-template-columns: repeat(2,1fr); } }
.kpi-card {
    background: #fff; border: 1px solid #e9ecef; border-radius: 14px;
    padding: 22px 20px; text-align: center;
    transition: box-shadow 0.2s, transform 0.2s;
}
.kpi-card:hover { box-shadow: 0 6px 24px rgba(26,111,196,0.1); transform: translateY(-3px); }
.kpi-icon  { font-size: 32px; margin-bottom: 10px; }
.kpi-value { font-size: 30px; font-weight: 800; color: #1a6fc4; line-height: 1; }
.kpi-label { font-size: 12px; color: #7f8c8d; margin-top: 6px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }

.charts-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 36px; }
@media(max-width:768px){ .charts-grid { grid-template-columns: 1fr; } }
.chart-card { background: #fff; border: 1px solid #e9ecef; border-radius: 14px; padding: 24px; }
.chart-card h3 { font-size: 15px; font-weight: 700; color: #2c3e50; margin-bottom: 18px; }

.level-badge { display: inline-block; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 700; text-transform: capitalize; }
.level-debutant      { background: rgba(46,204,113,0.12); color: #27ae60; }
.level-intermediaire { background: rgba(243,156,18,0.12); color: #e67e22; }
.level-avance        { background: rgba(26,111,196,0.12); color: #1a6fc4; }

.weak-list { list-style: none; padding: 0; margin: 0; }
.weak-list li { display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #f0f4f8; font-size: 14px; color: #2c3e50; }
.weak-list li:last-child { border-bottom: none; }
.weak-dot { width: 10px; height: 10px; border-radius: 50%; background: #e74c3c; flex-shrink: 0; }
.empty-state { text-align: center; padding: 40px; color: #95a5a6; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 41
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

        // line 42
        yield "
<div class=\"stats-page\">
    <h1>📊 Mes Statistiques</h1>
    <p class=\"sub\">Votre progression personnalisée basée sur votre session</p>

    <div class=\"kpi-grid\">
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">🎯</div>
            <div class=\"kpi-value\">";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avg_score"]) || array_key_exists("avg_score", $context) ? $context["avg_score"] : (function () { throw new RuntimeError('Variable "avg_score" does not exist.', 50, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"kpi-label\">Score moyen</div>
        </div>
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">📝</div>
            <div class=\"kpi-value\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_quizzes"]) || array_key_exists("nb_quizzes", $context) ? $context["nb_quizzes"] : (function () { throw new RuntimeError('Variable "nb_quizzes" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Quiz effectués</div>
        </div>
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">🏆</div>
            <div class=\"kpi-value\">
                <span class=\"level-badge level-";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 61, $this->source); })()), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 61, $this->source); })()), "html", null, true);
        yield "</span>
            </div>
            <div class=\"kpi-label\">Niveau inféré</div>
        </div>
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">💡</div>
            <div class=\"kpi-value\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_recs"]) || array_key_exists("nb_recs", $context) ? $context["nb_recs"] : (function () { throw new RuntimeError('Variable "nb_recs" does not exist.', 67, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Cours recommandés</div>
        </div>
    </div>

    ";
        // line 72
        if (((isset($context["nb_quizzes"]) || array_key_exists("nb_quizzes", $context) ? $context["nb_quizzes"] : (function () { throw new RuntimeError('Variable "nb_quizzes" does not exist.', 72, $this->source); })()) > 0)) {
            // line 73
            yield "    <div class=\"charts-grid\">
        <div class=\"chart-card\">
            <h3>📈 Historique des scores</h3>
            ";
            // line 76
            yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["score_chart"]) || array_key_exists("score_chart", $context) ? $context["score_chart"] : (function () { throw new RuntimeError('Variable "score_chart" does not exist.', 76, $this->source); })()));
            yield "
        </div>
        <div class=\"chart-card\">
            <h3>🔴 Sujets faibles</h3>
            ";
            // line 80
            if ((($tmp = (isset($context["topic_chart"]) || array_key_exists("topic_chart", $context) ? $context["topic_chart"] : (function () { throw new RuntimeError('Variable "topic_chart" does not exist.', 80, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 81
                yield "                ";
                yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["topic_chart"]) || array_key_exists("topic_chart", $context) ? $context["topic_chart"] : (function () { throw new RuntimeError('Variable "topic_chart" does not exist.', 81, $this->source); })()));
                yield "
            ";
            } else {
                // line 83
                yield "                <div class=\"empty-state\">Aucun sujet faible détecté 🎉</div>
            ";
            }
            // line 85
            yield "        </div>
    </div>
    ";
        } else {
            // line 88
            yield "        <div class=\"chart-card\" style=\"text-align:center;padding:50px;\">
            <div style=\"font-size:48px;margin-bottom:12px;\">📝</div>
            <p style=\"color:#7f8c8d;\">Complétez des quiz pour voir vos statistiques ici.</p>
            <a href=\"";
            // line 91
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_index");
            yield "\" style=\"color:#1a6fc4;font-weight:600;\">Commencer un quiz →</a>
        </div>
    ";
        }
        // line 94
        yield "
    ";
        // line 95
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 95, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 96
            yield "    <div class=\"chart-card\">
        <h3>⚠️ Points à améliorer</h3>
        <ul class=\"weak-list\">
            ";
            // line 99
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 99, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                // line 100
                yield "                <li><span class=\"weak-dot\"></span> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["topic"]), "html", null, true);
                yield "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['topic'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            yield "        </ul>
    </div>
    ";
        }
        // line 105
        yield "</div>
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
        return "client/statistiques/index.html.twig";
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
        return array (  274 => 105,  269 => 102,  260 => 100,  256 => 99,  251 => 96,  249 => 95,  246 => 94,  240 => 91,  235 => 88,  230 => 85,  226 => 83,  220 => 81,  218 => 80,  211 => 76,  206 => 73,  204 => 72,  196 => 67,  185 => 61,  176 => 55,  168 => 50,  158 => 42,  145 => 41,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes Statistiques — Dinari{% endblock %}

{% block stylesheets %}
<style>
.stats-page { max-width: 1100px; margin: 40px auto; padding: 0 20px 80px; }
.stats-page h1 { font-size: 28px; font-weight: 800; color: #2c3e50; margin-bottom: 6px; }
.stats-page .sub { color: #7f8c8d; font-size: 14px; margin-bottom: 32px; }

.kpi-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 36px; }
@media(max-width:768px){ .kpi-grid { grid-template-columns: repeat(2,1fr); } }
.kpi-card {
    background: #fff; border: 1px solid #e9ecef; border-radius: 14px;
    padding: 22px 20px; text-align: center;
    transition: box-shadow 0.2s, transform 0.2s;
}
.kpi-card:hover { box-shadow: 0 6px 24px rgba(26,111,196,0.1); transform: translateY(-3px); }
.kpi-icon  { font-size: 32px; margin-bottom: 10px; }
.kpi-value { font-size: 30px; font-weight: 800; color: #1a6fc4; line-height: 1; }
.kpi-label { font-size: 12px; color: #7f8c8d; margin-top: 6px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }

.charts-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 36px; }
@media(max-width:768px){ .charts-grid { grid-template-columns: 1fr; } }
.chart-card { background: #fff; border: 1px solid #e9ecef; border-radius: 14px; padding: 24px; }
.chart-card h3 { font-size: 15px; font-weight: 700; color: #2c3e50; margin-bottom: 18px; }

.level-badge { display: inline-block; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 700; text-transform: capitalize; }
.level-debutant      { background: rgba(46,204,113,0.12); color: #27ae60; }
.level-intermediaire { background: rgba(243,156,18,0.12); color: #e67e22; }
.level-avance        { background: rgba(26,111,196,0.12); color: #1a6fc4; }

.weak-list { list-style: none; padding: 0; margin: 0; }
.weak-list li { display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #f0f4f8; font-size: 14px; color: #2c3e50; }
.weak-list li:last-child { border-bottom: none; }
.weak-dot { width: 10px; height: 10px; border-radius: 50%; background: #e74c3c; flex-shrink: 0; }
.empty-state { text-align: center; padding: 40px; color: #95a5a6; }
</style>
{% endblock %}

{% block body %}

<div class=\"stats-page\">
    <h1>📊 Mes Statistiques</h1>
    <p class=\"sub\">Votre progression personnalisée basée sur votre session</p>

    <div class=\"kpi-grid\">
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">🎯</div>
            <div class=\"kpi-value\">{{ avg_score }}%</div>
            <div class=\"kpi-label\">Score moyen</div>
        </div>
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">📝</div>
            <div class=\"kpi-value\">{{ nb_quizzes }}</div>
            <div class=\"kpi-label\">Quiz effectués</div>
        </div>
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">🏆</div>
            <div class=\"kpi-value\">
                <span class=\"level-badge level-{{ level }}\">{{ level }}</span>
            </div>
            <div class=\"kpi-label\">Niveau inféré</div>
        </div>
        <div class=\"kpi-card\">
            <div class=\"kpi-icon\">💡</div>
            <div class=\"kpi-value\">{{ nb_recs }}</div>
            <div class=\"kpi-label\">Cours recommandés</div>
        </div>
    </div>

    {% if nb_quizzes > 0 %}
    <div class=\"charts-grid\">
        <div class=\"chart-card\">
            <h3>📈 Historique des scores</h3>
            {{ render_chart(score_chart) }}
        </div>
        <div class=\"chart-card\">
            <h3>🔴 Sujets faibles</h3>
            {% if topic_chart %}
                {{ render_chart(topic_chart) }}
            {% else %}
                <div class=\"empty-state\">Aucun sujet faible détecté 🎉</div>
            {% endif %}
        </div>
    </div>
    {% else %}
        <div class=\"chart-card\" style=\"text-align:center;padding:50px;\">
            <div style=\"font-size:48px;margin-bottom:12px;\">📝</div>
            <p style=\"color:#7f8c8d;\">Complétez des quiz pour voir vos statistiques ici.</p>
            <a href=\"{{ path('app_quiz_index') }}\" style=\"color:#1a6fc4;font-weight:600;\">Commencer un quiz →</a>
        </div>
    {% endif %}

    {% if weak_topics is not empty %}
    <div class=\"chart-card\">
        <h3>⚠️ Points à améliorer</h3>
        <ul class=\"weak-list\">
            {% for topic in weak_topics %}
                <li><span class=\"weak-dot\"></span> {{ topic|capitalize }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
</div>
{% endblock %}
", "client/statistiques/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\statistiques\\index.html.twig");
    }
}
