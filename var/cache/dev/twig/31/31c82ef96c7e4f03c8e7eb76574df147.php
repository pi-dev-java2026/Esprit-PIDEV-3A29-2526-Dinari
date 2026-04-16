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

/* admin/easyadmin/dashboard.html.twig */
class __TwigTemplate_95b0fbce3c2ae549f4a91e4814dd9df3 extends Template
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
            'content_title' => [$this, 'block_content_title'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@EasyAdmin/page/content.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/easyadmin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/easyadmin/dashboard.html.twig"));

        $this->parent = $this->load("@EasyAdmin/page/content.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_title"));

        yield "Tableau de bord — Dinari";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        // line 6
        yield "<style>
.ea-kpi-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:18px; margin-bottom:32px; }
@media(max-width:900px){ .ea-kpi-grid { grid-template-columns:repeat(2,1fr); } }
.ea-kpi {
    background:#fff; border:1px solid #e2e8f0; border-radius:12px;
    padding:22px 20px; display:flex; align-items:center; gap:16px;
    transition:box-shadow .2s, transform .2s;
}
.ea-kpi:hover { box-shadow:0 6px 24px rgba(37,99,235,.1); transform:translateY(-2px); }
.ea-kpi-icon {
    width:52px; height:52px; border-radius:12px;
    display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0;
}
.ea-kpi-value { font-size:28px; font-weight:800; color:#0f172a; line-height:1; }
.ea-kpi-label { font-size:12px; color:#64748b; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:.5px; }
.ea-section { font-size:13px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:1.5px; margin:28px 0 14px; }
.ea-card { background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:22px; margin-bottom:20px; }
.ea-card h3 { font-size:15px; font-weight:700; color:#0f172a; margin:0 0 16px; }
.ea-topic-row { display:flex; align-items:center; gap:12px; padding:8px 0; border-bottom:1px solid #f1f5f9; font-size:13px; }
.ea-topic-row:last-child { border-bottom:none; }
.ea-topic-name { flex:1; font-weight:600; color:#0f172a; }
.ea-topic-count { background:#eff6ff; color:#2563eb; font-size:11px; font-weight:700; padding:2px 8px; border-radius:20px; }
.ea-bar { flex:2; background:#f1f5f9; border-radius:20px; height:7px; overflow:hidden; }
.ea-bar-fill { height:100%; border-radius:20px; background:linear-gradient(90deg,#2563eb,#4f46e5); }
.ea-link-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
.ea-link-btn {
    display:flex; align-items:center; gap:10px; padding:14px 16px;
    background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;
    text-decoration:none; color:#0f172a; font-size:13px; font-weight:600;
    transition:all .18s;
}
.ea-link-btn:hover { background:#eff6ff; border-color:#2563eb; color:#2563eb; }
.ea-link-btn i { font-size:18px; }
</style>

";
        // line 42
        yield "<div class=\"ea-kpi-grid\">
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(37,99,235,.1);\">📚</div>
        <div>
            <div class=\"ea-kpi-value\">";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_cours"]) || array_key_exists("nb_cours", $context) ? $context["nb_cours"] : (function () { throw new RuntimeError('Variable "nb_cours" does not exist.', 46, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"ea-kpi-label\">Cours</div>
        </div>
    </div>
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(79,70,229,.1);\">❓</div>
        <div>
            <div class=\"ea-kpi-value\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_quizzes"]) || array_key_exists("nb_quizzes", $context) ? $context["nb_quizzes"] : (function () { throw new RuntimeError('Variable "nb_quizzes" does not exist.', 53, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"ea-kpi-label\">Quiz</div>
        </div>
    </div>
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(16,185,129,.1);\">📝</div>
        <div>
            <div class=\"ea-kpi-value\">";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_attempts"]) || array_key_exists("nb_attempts", $context) ? $context["nb_attempts"] : (function () { throw new RuntimeError('Variable "nb_attempts" does not exist.', 60, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"ea-kpi-label\">Tentatives</div>
        </div>
    </div>
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(245,158,11,.1);\">🎯</div>
        <div>
            <div class=\"ea-kpi-value\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avg_score"]) || array_key_exists("avg_score", $context) ? $context["avg_score"] : (function () { throw new RuntimeError('Variable "avg_score" does not exist.', 67, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"ea-kpi-label\">Score moyen</div>
        </div>
    </div>
</div>

<div style=\"display:grid;grid-template-columns:1fr 1fr;gap:20px;\">
    ";
        // line 75
        yield "    <div class=\"ea-card\">
        <h3>⚠️ Top sujets faibles</h3>
        ";
        // line 77
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 77, $this->source); })()))) {
            // line 78
            yield "            <p style=\"color:#94a3b8;font-size:13px;\">Aucune donnée disponible.</p>
        ";
        } else {
            // line 80
            yield "            ";
            $context["max"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 80, $this->source); })()), 0, [], "array", false, false, false, 80), "count", [], "any", false, false, false, 80);
            // line 81
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 81, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 82
                yield "            <div class=\"ea-topic-row\">
                <span class=\"ea-topic-name\">";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "topic", [], "any", false, false, false, 83)), "html", null, true);
                yield "</span>
                <div class=\"ea-bar\"><div class=\"ea-bar-fill\" style=\"width:";
                // line 84
                yield ((((isset($context["max"]) || array_key_exists("max", $context) ? $context["max"] : (function () { throw new RuntimeError('Variable "max" does not exist.', 84, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round(((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "count", [], "any", false, false, false, 84) / (isset($context["max"]) || array_key_exists("max", $context) ? $context["max"] : (function () { throw new RuntimeError('Variable "max" does not exist.', 84, $this->source); })())) * 100)), "html", null, true)) : (0));
                yield "%\"></div></div>
                <span class=\"ea-topic-count\">";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "count", [], "any", false, false, false, 85), "html", null, true);
                yield "</span>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            yield "        ";
        }
        // line 89
        yield "    </div>

    ";
        // line 92
        yield "    <div class=\"ea-card\">
        <h3>🔗 Accès rapide</h3>
        <div class=\"ea-link-grid\">
            <a href=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\EasyAdmin\\CoursCrudController"], "method", false, false, false, 95), "html", null, true);
        yield "\" class=\"ea-link-btn\">
                <i>📚</i> Cours
            </a>
            <a href=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\EasyAdmin\\QuizCrudController"], "method", false, false, false, 98), "html", null, true);
        yield "\" class=\"ea-link-btn\">
                <i>❓</i> Quiz
            </a>
            <a href=\"";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController"], "method", false, false, false, 101), "html", null, true);
        yield "\" class=\"ea-link-btn\">
                <i>📊</i> Résultats
            </a>
            <a href=\"";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController"], "method", false, false, false, 104), "html", null, true);
        yield "\" class=\"ea-link-btn\">
                <i>💬</i> Commentaires
            </a>
            <a href=\"";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController"], "method", false, false, false, 107), "html", null, true);
        yield "\" class=\"ea-link-btn\">
                <i>🔔</i> Notifications
            </a>
            <a href=\"";
        // line 110
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_statistiques");
        yield "\" class=\"ea-link-btn\">
                <i>📈</i> Statistiques
            </a>
        </div>
    </div>
</div>
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
        return "admin/easyadmin/dashboard.html.twig";
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
        return array (  263 => 110,  257 => 107,  251 => 104,  245 => 101,  239 => 98,  233 => 95,  228 => 92,  224 => 89,  221 => 88,  212 => 85,  208 => 84,  204 => 83,  201 => 82,  196 => 81,  193 => 80,  189 => 78,  187 => 77,  183 => 75,  173 => 67,  163 => 60,  153 => 53,  143 => 46,  137 => 42,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@EasyAdmin/page/content.html.twig' %}

{% block content_title %}Tableau de bord — Dinari{% endblock %}

{% block main %}
<style>
.ea-kpi-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:18px; margin-bottom:32px; }
@media(max-width:900px){ .ea-kpi-grid { grid-template-columns:repeat(2,1fr); } }
.ea-kpi {
    background:#fff; border:1px solid #e2e8f0; border-radius:12px;
    padding:22px 20px; display:flex; align-items:center; gap:16px;
    transition:box-shadow .2s, transform .2s;
}
.ea-kpi:hover { box-shadow:0 6px 24px rgba(37,99,235,.1); transform:translateY(-2px); }
.ea-kpi-icon {
    width:52px; height:52px; border-radius:12px;
    display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0;
}
.ea-kpi-value { font-size:28px; font-weight:800; color:#0f172a; line-height:1; }
.ea-kpi-label { font-size:12px; color:#64748b; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:.5px; }
.ea-section { font-size:13px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:1.5px; margin:28px 0 14px; }
.ea-card { background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:22px; margin-bottom:20px; }
.ea-card h3 { font-size:15px; font-weight:700; color:#0f172a; margin:0 0 16px; }
.ea-topic-row { display:flex; align-items:center; gap:12px; padding:8px 0; border-bottom:1px solid #f1f5f9; font-size:13px; }
.ea-topic-row:last-child { border-bottom:none; }
.ea-topic-name { flex:1; font-weight:600; color:#0f172a; }
.ea-topic-count { background:#eff6ff; color:#2563eb; font-size:11px; font-weight:700; padding:2px 8px; border-radius:20px; }
.ea-bar { flex:2; background:#f1f5f9; border-radius:20px; height:7px; overflow:hidden; }
.ea-bar-fill { height:100%; border-radius:20px; background:linear-gradient(90deg,#2563eb,#4f46e5); }
.ea-link-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
.ea-link-btn {
    display:flex; align-items:center; gap:10px; padding:14px 16px;
    background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;
    text-decoration:none; color:#0f172a; font-size:13px; font-weight:600;
    transition:all .18s;
}
.ea-link-btn:hover { background:#eff6ff; border-color:#2563eb; color:#2563eb; }
.ea-link-btn i { font-size:18px; }
</style>

{# KPI Cards #}
<div class=\"ea-kpi-grid\">
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(37,99,235,.1);\">📚</div>
        <div>
            <div class=\"ea-kpi-value\">{{ nb_cours }}</div>
            <div class=\"ea-kpi-label\">Cours</div>
        </div>
    </div>
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(79,70,229,.1);\">❓</div>
        <div>
            <div class=\"ea-kpi-value\">{{ nb_quizzes }}</div>
            <div class=\"ea-kpi-label\">Quiz</div>
        </div>
    </div>
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(16,185,129,.1);\">📝</div>
        <div>
            <div class=\"ea-kpi-value\">{{ nb_attempts }}</div>
            <div class=\"ea-kpi-label\">Tentatives</div>
        </div>
    </div>
    <div class=\"ea-kpi\">
        <div class=\"ea-kpi-icon\" style=\"background:rgba(245,158,11,.1);\">🎯</div>
        <div>
            <div class=\"ea-kpi-value\">{{ avg_score }}%</div>
            <div class=\"ea-kpi-label\">Score moyen</div>
        </div>
    </div>
</div>

<div style=\"display:grid;grid-template-columns:1fr 1fr;gap:20px;\">
    {# Weak topics #}
    <div class=\"ea-card\">
        <h3>⚠️ Top sujets faibles</h3>
        {% if weak_topics is empty %}
            <p style=\"color:#94a3b8;font-size:13px;\">Aucune donnée disponible.</p>
        {% else %}
            {% set max = weak_topics[0].count %}
            {% for item in weak_topics %}
            <div class=\"ea-topic-row\">
                <span class=\"ea-topic-name\">{{ item.topic|capitalize }}</span>
                <div class=\"ea-bar\"><div class=\"ea-bar-fill\" style=\"width:{{ max > 0 ? (item.count/max*100)|round : 0 }}%\"></div></div>
                <span class=\"ea-topic-count\">{{ item.count }}</span>
            </div>
            {% endfor %}
        {% endif %}
    </div>

    {# Quick links #}
    <div class=\"ea-card\">
        <h3>🔗 Accès rapide</h3>
        <div class=\"ea-link-grid\">
            <a href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\EasyAdmin\\\\CoursCrudController') }}\" class=\"ea-link-btn\">
                <i>📚</i> Cours
            </a>
            <a href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\EasyAdmin\\\\QuizCrudController') }}\" class=\"ea-link-btn\">
                <i>❓</i> Quiz
            </a>
            <a href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\EasyAdmin\\\\QuizResultatCrudController') }}\" class=\"ea-link-btn\">
                <i>📊</i> Résultats
            </a>
            <a href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\EasyAdmin\\\\CommentaireCrudController') }}\" class=\"ea-link-btn\">
                <i>💬</i> Commentaires
            </a>
            <a href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\EasyAdmin\\\\NotificationCrudController') }}\" class=\"ea-link-btn\">
                <i>🔔</i> Notifications
            </a>
            <a href=\"{{ path('admin_statistiques') }}\" class=\"ea-link-btn\">
                <i>📈</i> Statistiques
            </a>
        </div>
    </div>
</div>
{% endblock %}
", "admin/easyadmin/dashboard.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\easyadmin\\dashboard.html.twig");
    }
}
