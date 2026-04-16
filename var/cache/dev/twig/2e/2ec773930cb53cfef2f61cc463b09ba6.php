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

/* client/notifications/index.html.twig */
class __TwigTemplate_189d553b75b37aa0aaef96d070cec70a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/notifications/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/notifications/index.html.twig"));

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

        yield "Notifications — Dinari";
        
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
.notif-page { max-width: 760px; margin: 40px auto; padding: 0 20px 60px; }
.notif-page h1 { font-size: 26px; font-weight: 800; color: #2c3e50; margin-bottom: 6px; }
.notif-page .sub { color: #7f8c8d; font-size: 14px; margin-bottom: 28px; }
.notif-card {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 12px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    transition: box-shadow 0.2s;
    cursor: pointer;
}
.notif-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
.notif-card.unread { border-left: 4px solid #1a6fc4; background: #f0f6ff; }
.notif-icon {
    width: 42px; height: 42px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.notif-icon.success { background: rgba(46,204,113,0.12); }
.notif-icon.warning { background: rgba(243,156,18,0.12); }
.notif-icon.info    { background: rgba(26,111,196,0.12); }
.notif-body { flex: 1; }
.notif-msg  { font-size: 14px; color: #2c3e50; line-height: 1.55; }
.notif-time { font-size: 12px; color: #95a5a6; margin-top: 4px; }
.notif-empty { text-align: center; padding: 60px 20px; color: #95a5a6; }
.notif-empty .icon { font-size: 48px; margin-bottom: 12px; }
.mark-all-btn {
    background: #1a6fc4; color: #fff; border: none;
    padding: 9px 20px; border-radius: 8px; font-size: 13px;
    font-weight: 600; cursor: pointer; margin-bottom: 20px;
    font-family: 'Raleway', sans-serif;
}
.mark-all-btn:hover { background: #1558a0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 47
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

        // line 48
        yield "<div class=\"notif-page\">
    <h1>🔔 Notifications</h1>
    <p class=\"sub\">Vos alertes et messages personnalisés</p>

    ";
        // line 52
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 52, $this->source); })())) > 0)) {
            // line 53
            yield "        <button class=\"mark-all-btn\" id=\"markAllBtn\">Tout marquer comme lu</button>
    ";
        }
        // line 55
        yield "
    ";
        // line 56
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 56, $this->source); })()))) {
            // line 57
            yield "        <div class=\"notif-empty\">
            <div class=\"icon\">🔕</div>
            <p>Aucune notification pour le moment.</p>
        </div>
    ";
        } else {
            // line 62
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 62, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["notif"]) {
                // line 63
                yield "            <div class=\"notif-card ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "isRead", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("") : ("unread"));
                yield "\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "id", [], "any", false, false, false, 63), "html", null, true);
                yield "\">
                <div class=\"notif-icon ";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "type", [], "any", false, false, false, 64), "html", null, true);
                yield "\">
                    ";
                // line 65
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "type", [], "any", false, false, false, 65) == "success")) {
                    yield "🎉
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 66
$context["notif"], "type", [], "any", false, false, false, 66) == "warning")) {
                    yield "⚠️
                    ";
                } else {
                    // line 67
                    yield "ℹ️";
                }
                // line 68
                yield "                </div>
                <div class=\"notif-body\">
                    <div class=\"notif-msg\">";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "message", [], "any", false, false, false, 70), "html", null, true);
                yield "</div>
                    <div class=\"notif-time\">";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "createdAt", [], "any", false, false, false, 71), "d/m/Y à H:i"), "html", null, true);
                yield "</div>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['notif'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            yield "    ";
        }
        // line 76
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 79
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

        // line 80
        yield "<script>
document.querySelectorAll('.notif-card.unread').forEach(card => {
    card.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/notifications/\${id}/read`, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(() => { this.classList.remove('unread'); updateBellCount(); });
    });
});

document.getElementById('markAllBtn')?.addEventListener('click', function() {
    fetch('/notifications/mark-all-read', { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(() => {
            document.querySelectorAll('.notif-card.unread').forEach(c => c.classList.remove('unread'));
            updateBellCount();
        });
});

function updateBellCount() {
    fetch('/notifications/unread-count')
        .then(r => r.json())
        .then(data => {
            const badge = document.getElementById('notif-badge');
            if (badge) badge.textContent = data.count > 0 ? data.count : '';
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
        return "client/notifications/index.html.twig";
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
        return array (  263 => 80,  250 => 79,  238 => 76,  235 => 75,  225 => 71,  221 => 70,  217 => 68,  214 => 67,  209 => 66,  205 => 65,  201 => 64,  194 => 63,  189 => 62,  182 => 57,  180 => 56,  177 => 55,  173 => 53,  171 => 52,  165 => 48,  152 => 47,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Notifications — Dinari{% endblock %}

{% block stylesheets %}
<style>
.notif-page { max-width: 760px; margin: 40px auto; padding: 0 20px 60px; }
.notif-page h1 { font-size: 26px; font-weight: 800; color: #2c3e50; margin-bottom: 6px; }
.notif-page .sub { color: #7f8c8d; font-size: 14px; margin-bottom: 28px; }
.notif-card {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 12px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    transition: box-shadow 0.2s;
    cursor: pointer;
}
.notif-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
.notif-card.unread { border-left: 4px solid #1a6fc4; background: #f0f6ff; }
.notif-icon {
    width: 42px; height: 42px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.notif-icon.success { background: rgba(46,204,113,0.12); }
.notif-icon.warning { background: rgba(243,156,18,0.12); }
.notif-icon.info    { background: rgba(26,111,196,0.12); }
.notif-body { flex: 1; }
.notif-msg  { font-size: 14px; color: #2c3e50; line-height: 1.55; }
.notif-time { font-size: 12px; color: #95a5a6; margin-top: 4px; }
.notif-empty { text-align: center; padding: 60px 20px; color: #95a5a6; }
.notif-empty .icon { font-size: 48px; margin-bottom: 12px; }
.mark-all-btn {
    background: #1a6fc4; color: #fff; border: none;
    padding: 9px 20px; border-radius: 8px; font-size: 13px;
    font-weight: 600; cursor: pointer; margin-bottom: 20px;
    font-family: 'Raleway', sans-serif;
}
.mark-all-btn:hover { background: #1558a0; }
</style>
{% endblock %}

{% block body %}
<div class=\"notif-page\">
    <h1>🔔 Notifications</h1>
    <p class=\"sub\">Vos alertes et messages personnalisés</p>

    {% if notifications|length > 0 %}
        <button class=\"mark-all-btn\" id=\"markAllBtn\">Tout marquer comme lu</button>
    {% endif %}

    {% if notifications is empty %}
        <div class=\"notif-empty\">
            <div class=\"icon\">🔕</div>
            <p>Aucune notification pour le moment.</p>
        </div>
    {% else %}
        {% for notif in notifications %}
            <div class=\"notif-card {{ notif.isRead ? '' : 'unread' }}\" data-id=\"{{ notif.id }}\">
                <div class=\"notif-icon {{ notif.type }}\">
                    {% if notif.type == 'success' %}🎉
                    {% elseif notif.type == 'warning' %}⚠️
                    {% else %}ℹ️{% endif %}
                </div>
                <div class=\"notif-body\">
                    <div class=\"notif-msg\">{{ notif.message }}</div>
                    <div class=\"notif-time\">{{ notif.createdAt|date('d/m/Y à H:i') }}</div>
                </div>
            </div>
        {% endfor %}
    {% endif %}
</div>
{% endblock %}

{% block javascripts %}
<script>
document.querySelectorAll('.notif-card.unread').forEach(card => {
    card.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/notifications/\${id}/read`, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(() => { this.classList.remove('unread'); updateBellCount(); });
    });
});

document.getElementById('markAllBtn')?.addEventListener('click', function() {
    fetch('/notifications/mark-all-read', { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(() => {
            document.querySelectorAll('.notif-card.unread').forEach(c => c.classList.remove('unread'));
            updateBellCount();
        });
});

function updateBellCount() {
    fetch('/notifications/unread-count')
        .then(r => r.json())
        .then(data => {
            const badge = document.getElementById('notif-badge');
            if (badge) badge.textContent = data.count > 0 ? data.count : '';
        });
}
</script>
{% endblock %}
", "client/notifications/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\notifications\\index.html.twig");
    }
}
