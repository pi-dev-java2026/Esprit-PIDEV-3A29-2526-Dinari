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

/* admin/statistiques/index.html.twig */
class __TwigTemplate_bc75dd8f3fee08e8e81a5d6def2879a3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/statistiques/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/statistiques/index.html.twig"));

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

        yield "Statistiques — Admin Dinari";
        
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

        yield "Statistiques globales";
        
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

        yield "Vue d'ensemble de la plateforme";
        
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
/* ── KPI cards ── */
.kpi-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 28px;
}
@media(max-width:900px){ .kpi-row { grid-template-columns: repeat(2,1fr); } }

.kpi-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 22px 20px;
    display: flex; align-items: center; gap: 16px;
    transition: box-shadow .2s, transform .2s;
}
.kpi-card:hover { box-shadow: 0 6px 24px rgba(37,99,235,.1); transform: translateY(-2px); }
.kpi-icon {
    width: 52px; height: 52px; border-radius: 13px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px; flex-shrink: 0;
}
.kpi-value { font-size: 28px; font-weight: 800; color: var(--text); line-height: 1; }
.kpi-label { font-size: 11px; color: var(--muted); margin-top: 5px; font-weight: 600;
             text-transform: uppercase; letter-spacing: .5px; }

/* ── Chart cards ── */
.charts-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    margin-bottom: 22px;
}
@media(max-width:900px){ .charts-row { grid-template-columns: 1fr; } }

.chart-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 24px;
}
.chart-card h3 {
    font-size: 14px; font-weight: 700; color: var(--text);
    margin: 0 0 20px; display: flex; align-items: center; gap: 8px;
}

/* Score gauge wrapper */
.gauge-wrap {
    position: relative;
    max-width: 260px;
    margin: 0 auto;
}
.gauge-label {
    position: absolute;
    bottom: 10px; left: 50%;
    transform: translateX(-50%);
    text-align: center;
    pointer-events: none;
}
.gauge-label .val  { font-size: 32px; font-weight: 800; color: var(--text); line-height: 1; }
.gauge-label .unit { font-size: 13px; color: var(--muted); font-weight: 500; }

/* Weak topics table */
.topic-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.topic-table th {
    background: #F8FAFC; padding: 10px 14px;
    font-size: 10px; font-weight: 700; text-transform: uppercase;
    letter-spacing: 1px; color: var(--muted); border-bottom: 1px solid var(--border);
}
.topic-table td { padding: 11px 14px; border-bottom: 1px solid #F1F5F9; color: var(--text); }
.topic-table tr:last-child td { border-bottom: none; }
.bar-wrap { background: #F1F5F9; border-radius: 20px; height: 7px; overflow: hidden; }
.bar-fill  { height: 100%; border-radius: 20px;
             background: linear-gradient(90deg, #2563EB, #4F46E5); }

/* Empty state */
.empty-state {
    text-align: center; padding: 48px 20px; color: var(--muted);
}
.empty-state .icon { font-size: 40px; margin-bottom: 10px; }
.empty-state p { font-size: 13px; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 94
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

        // line 95
        yield "
";
        // line 97
        yield "<div class=\"kpi-row\">
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(37,99,235,.1);\">📚</div>
        <div>
            <div class=\"kpi-value\">";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_cours"]) || array_key_exists("nb_cours", $context) ? $context["nb_cours"] : (function () { throw new RuntimeError('Variable "nb_cours" does not exist.', 101, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Cours publiés</div>
        </div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(79,70,229,.1);\">❓</div>
        <div>
            <div class=\"kpi-value\">";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_quizzes"]) || array_key_exists("nb_quizzes", $context) ? $context["nb_quizzes"] : (function () { throw new RuntimeError('Variable "nb_quizzes" does not exist.', 108, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Quiz disponibles</div>
        </div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(16,185,129,.1);\">📝</div>
        <div>
            <div class=\"kpi-value\">";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_attempts"]) || array_key_exists("nb_attempts", $context) ? $context["nb_attempts"] : (function () { throw new RuntimeError('Variable "nb_attempts" does not exist.', 115, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Tentatives de quiz</div>
        </div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(245,158,11,.1);\">🎯</div>
        <div>
            <div class=\"kpi-value\">";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avg_score"]) || array_key_exists("avg_score", $context) ? $context["avg_score"] : (function () { throw new RuntimeError('Variable "avg_score" does not exist.', 122, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"kpi-label\">Score moyen global</div>
        </div>
    </div>
</div>

";
        // line 129
        yield "<div class=\"charts-row\">
    <div class=\"chart-card\">
        <h3>📊 Vue d'ensemble de la plateforme</h3>
        ";
        // line 132
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["overview_chart"]) || array_key_exists("overview_chart", $context) ? $context["overview_chart"] : (function () { throw new RuntimeError('Variable "overview_chart" does not exist.', 132, $this->source); })()), ["style" => "max-height:260px"]);
        yield "
    </div>
    <div class=\"chart-card\">
        <h3>🎯 Score moyen global</h3>
        <div class=\"gauge-wrap\">
            ";
        // line 137
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["score_chart"]) || array_key_exists("score_chart", $context) ? $context["score_chart"] : (function () { throw new RuntimeError('Variable "score_chart" does not exist.', 137, $this->source); })()), ["style" => "max-height:200px"]);
        yield "
            <div class=\"gauge-label\">
                <div class=\"val\">";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avg_score"]) || array_key_exists("avg_score", $context) ? $context["avg_score"] : (function () { throw new RuntimeError('Variable "avg_score" does not exist.', 139, $this->source); })()), "html", null, true);
        yield "%</div>
                <div class=\"unit\">";
        // line 140
        yield ((((isset($context["nb_attempts"]) || array_key_exists("nb_attempts", $context) ? $context["nb_attempts"] : (function () { throw new RuntimeError('Variable "nb_attempts" does not exist.', 140, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["nb_attempts"]) || array_key_exists("nb_attempts", $context) ? $context["nb_attempts"] : (function () { throw new RuntimeError('Variable "nb_attempts" does not exist.', 140, $this->source); })()) . " tentative(s)"), "html", null, true)) : ("Aucune tentative"));
        yield "</div>
            </div>
        </div>
    </div>
</div>

";
        // line 147
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 147, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 148
            yield "<div class=\"charts-row\">
    <div class=\"chart-card\">
        <h3>⚠️ Sujets faibles — fréquence</h3>
        ";
            // line 151
            yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["bar_chart"]) || array_key_exists("bar_chart", $context) ? $context["bar_chart"] : (function () { throw new RuntimeError('Variable "bar_chart" does not exist.', 151, $this->source); })()), ["style" => "max-height:260px"]);
            yield "
    </div>
    <div class=\"chart-card\">
        <h3>🍩 Répartition des sujets faibles</h3>
        ";
            // line 155
            yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["doughnut_chart"]) || array_key_exists("doughnut_chart", $context) ? $context["doughnut_chart"] : (function () { throw new RuntimeError('Variable "doughnut_chart" does not exist.', 155, $this->source); })()), ["style" => "max-height:260px"]);
            yield "
    </div>
</div>

";
            // line 160
            yield "<div class=\"chart-card\" style=\"margin-bottom:0;\">
    <h3>📋 Détail des sujets faibles</h3>
    <table class=\"topic-table\">
        <thead>
            <tr>
                <th>#</th>
                <th>Sujet</th>
                <th>Occurrences</th>
                <th style=\"width:220px;\">Fréquence relative</th>
            </tr>
        </thead>
        <tbody>
            ";
            // line 172
            $context["max_count"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 172, $this->source); })()), 0, [], "array", false, false, false, 172), "count", [], "any", false, false, false, 172);
            // line 173
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 173, $this->source); })()));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 174
                yield "            <tr>
                <td style=\"color:var(--muted2);font-weight:600;\">";
                // line 175
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 175), "html", null, true);
                yield "</td>
                <td style=\"font-weight:600;\">";
                // line 176
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "topic", [], "any", false, false, false, 176)), "html", null, true);
                yield "</td>
                <td>
                    <span style=\"background:#eff6ff;color:#2563eb;font-size:11px;
                                 font-weight:700;padding:2px 8px;border-radius:20px;\">
                        ";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "count", [], "any", false, false, false, 180), "html", null, true);
                yield "
                    </span>
                </td>
                <td>
                    <div class=\"bar-wrap\">
                        <div class=\"bar-fill\"
                             style=\"width:";
                // line 186
                yield ((((isset($context["max_count"]) || array_key_exists("max_count", $context) ? $context["max_count"] : (function () { throw new RuntimeError('Variable "max_count" does not exist.', 186, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round(((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "count", [], "any", false, false, false, 186) / (isset($context["max_count"]) || array_key_exists("max_count", $context) ? $context["max_count"] : (function () { throw new RuntimeError('Variable "max_count" does not exist.', 186, $this->source); })())) * 100)), "html", null, true)) : (0));
                yield "%\">
                        </div>
                    </div>
                </td>
            </tr>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 192
            yield "        </tbody>
    </table>
</div>

";
        } else {
            // line 197
            yield "<div class=\"chart-card\">
    <div class=\"empty-state\">
        <div class=\"icon\">📭</div>
        <p>Aucune tentative de quiz enregistrée pour le moment.<br>
           Les graphiques de sujets faibles apparaîtront dès que des quiz seront complétés.</p>
        <a href=\"";
            // line 202
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
            yield "\"
           style=\"display:inline-block;margin-top:14px;padding:9px 20px;
                  background:#2563eb;color:#fff;border-radius:8px;
                  font-size:13px;font-weight:600;text-decoration:none;\">
            Gérer les quiz →
        </a>
    </div>
</div>
";
        }
        // line 211
        yield "
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
        return "admin/statistiques/index.html.twig";
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
        return array (  460 => 211,  448 => 202,  441 => 197,  434 => 192,  414 => 186,  405 => 180,  398 => 176,  394 => 175,  391 => 174,  373 => 173,  371 => 172,  357 => 160,  350 => 155,  343 => 151,  338 => 148,  336 => 147,  327 => 140,  323 => 139,  318 => 137,  310 => 132,  305 => 129,  296 => 122,  286 => 115,  276 => 108,  266 => 101,  260 => 97,  257 => 95,  244 => 94,  149 => 8,  136 => 7,  113 => 5,  90 => 4,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Statistiques — Admin Dinari{% endblock %}
{% block page_title %}Statistiques globales{% endblock %}
{% block section_title %}Vue d'ensemble de la plateforme{% endblock %}

{% block stylesheets %}
<style>
/* ── KPI cards ── */
.kpi-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 28px;
}
@media(max-width:900px){ .kpi-row { grid-template-columns: repeat(2,1fr); } }

.kpi-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 22px 20px;
    display: flex; align-items: center; gap: 16px;
    transition: box-shadow .2s, transform .2s;
}
.kpi-card:hover { box-shadow: 0 6px 24px rgba(37,99,235,.1); transform: translateY(-2px); }
.kpi-icon {
    width: 52px; height: 52px; border-radius: 13px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px; flex-shrink: 0;
}
.kpi-value { font-size: 28px; font-weight: 800; color: var(--text); line-height: 1; }
.kpi-label { font-size: 11px; color: var(--muted); margin-top: 5px; font-weight: 600;
             text-transform: uppercase; letter-spacing: .5px; }

/* ── Chart cards ── */
.charts-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    margin-bottom: 22px;
}
@media(max-width:900px){ .charts-row { grid-template-columns: 1fr; } }

.chart-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 24px;
}
.chart-card h3 {
    font-size: 14px; font-weight: 700; color: var(--text);
    margin: 0 0 20px; display: flex; align-items: center; gap: 8px;
}

/* Score gauge wrapper */
.gauge-wrap {
    position: relative;
    max-width: 260px;
    margin: 0 auto;
}
.gauge-label {
    position: absolute;
    bottom: 10px; left: 50%;
    transform: translateX(-50%);
    text-align: center;
    pointer-events: none;
}
.gauge-label .val  { font-size: 32px; font-weight: 800; color: var(--text); line-height: 1; }
.gauge-label .unit { font-size: 13px; color: var(--muted); font-weight: 500; }

/* Weak topics table */
.topic-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.topic-table th {
    background: #F8FAFC; padding: 10px 14px;
    font-size: 10px; font-weight: 700; text-transform: uppercase;
    letter-spacing: 1px; color: var(--muted); border-bottom: 1px solid var(--border);
}
.topic-table td { padding: 11px 14px; border-bottom: 1px solid #F1F5F9; color: var(--text); }
.topic-table tr:last-child td { border-bottom: none; }
.bar-wrap { background: #F1F5F9; border-radius: 20px; height: 7px; overflow: hidden; }
.bar-fill  { height: 100%; border-radius: 20px;
             background: linear-gradient(90deg, #2563EB, #4F46E5); }

/* Empty state */
.empty-state {
    text-align: center; padding: 48px 20px; color: var(--muted);
}
.empty-state .icon { font-size: 40px; margin-bottom: 10px; }
.empty-state p { font-size: 13px; }
</style>
{% endblock %}

{% block body %}

{# ── KPI Cards ── #}
<div class=\"kpi-row\">
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(37,99,235,.1);\">📚</div>
        <div>
            <div class=\"kpi-value\">{{ nb_cours }}</div>
            <div class=\"kpi-label\">Cours publiés</div>
        </div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(79,70,229,.1);\">❓</div>
        <div>
            <div class=\"kpi-value\">{{ nb_quizzes }}</div>
            <div class=\"kpi-label\">Quiz disponibles</div>
        </div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(16,185,129,.1);\">📝</div>
        <div>
            <div class=\"kpi-value\">{{ nb_attempts }}</div>
            <div class=\"kpi-label\">Tentatives de quiz</div>
        </div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-icon\" style=\"background:rgba(245,158,11,.1);\">🎯</div>
        <div>
            <div class=\"kpi-value\">{{ avg_score }}%</div>
            <div class=\"kpi-label\">Score moyen global</div>
        </div>
    </div>
</div>

{# ── Always-visible charts: overview + score gauge ── #}
<div class=\"charts-row\">
    <div class=\"chart-card\">
        <h3>📊 Vue d'ensemble de la plateforme</h3>
        {{ render_chart(overview_chart, {'style': 'max-height:260px'}) }}
    </div>
    <div class=\"chart-card\">
        <h3>🎯 Score moyen global</h3>
        <div class=\"gauge-wrap\">
            {{ render_chart(score_chart, {'style': 'max-height:200px'}) }}
            <div class=\"gauge-label\">
                <div class=\"val\">{{ avg_score }}%</div>
                <div class=\"unit\">{{ nb_attempts > 0 ? nb_attempts ~ ' tentative(s)' : 'Aucune tentative' }}</div>
            </div>
        </div>
    </div>
</div>

{# ── Weak topics charts (only when quiz data exists) ── #}
{% if weak_topics is not empty %}
<div class=\"charts-row\">
    <div class=\"chart-card\">
        <h3>⚠️ Sujets faibles — fréquence</h3>
        {{ render_chart(bar_chart, {'style': 'max-height:260px'}) }}
    </div>
    <div class=\"chart-card\">
        <h3>🍩 Répartition des sujets faibles</h3>
        {{ render_chart(doughnut_chart, {'style': 'max-height:260px'}) }}
    </div>
</div>

{# ── Weak topics detail table ── #}
<div class=\"chart-card\" style=\"margin-bottom:0;\">
    <h3>📋 Détail des sujets faibles</h3>
    <table class=\"topic-table\">
        <thead>
            <tr>
                <th>#</th>
                <th>Sujet</th>
                <th>Occurrences</th>
                <th style=\"width:220px;\">Fréquence relative</th>
            </tr>
        </thead>
        <tbody>
            {% set max_count = weak_topics[0].count %}
            {% for item in weak_topics %}
            <tr>
                <td style=\"color:var(--muted2);font-weight:600;\">{{ loop.index }}</td>
                <td style=\"font-weight:600;\">{{ item.topic|capitalize }}</td>
                <td>
                    <span style=\"background:#eff6ff;color:#2563eb;font-size:11px;
                                 font-weight:700;padding:2px 8px;border-radius:20px;\">
                        {{ item.count }}
                    </span>
                </td>
                <td>
                    <div class=\"bar-wrap\">
                        <div class=\"bar-fill\"
                             style=\"width:{{ max_count > 0 ? (item.count / max_count * 100)|round : 0 }}%\">
                        </div>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% else %}
<div class=\"chart-card\">
    <div class=\"empty-state\">
        <div class=\"icon\">📭</div>
        <p>Aucune tentative de quiz enregistrée pour le moment.<br>
           Les graphiques de sujets faibles apparaîtront dès que des quiz seront complétés.</p>
        <a href=\"{{ path('admin_quiz_index') }}\"
           style=\"display:inline-block;margin-top:14px;padding:9px 20px;
                  background:#2563eb;color:#fff;border-radius:8px;
                  font-size:13px;font-weight:600;text-decoration:none;\">
            Gérer les quiz →
        </a>
    </div>
</div>
{% endif %}

{% endblock %}
", "admin/statistiques/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\statistiques\\index.html.twig");
    }
}
