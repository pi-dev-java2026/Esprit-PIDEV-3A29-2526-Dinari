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

/* admin/chapitre/index.html.twig */
class __TwigTemplate_a7b7c184990f6661ec6ac1dba55c72d3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/chapitre/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/chapitre/index.html.twig"));

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

        yield "Chapitres — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 3, $this->source); })()), "nomCours", [], "any", false, false, false, 3), "html", null, true);
        yield " — Admin";
        
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

        yield "Chapitres";
        
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 5, $this->source); })()), "nomCours", [], "any", false, false, false, 5), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
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

        // line 8
        yield "<div class=\"page-header\">
    <div>
        <h1>Chapitres — ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 10, $this->source); })()), "nomCours", [], "any", false, false, false, 10), "html", null, true);
        yield "</h1>
        <div class=\"breadcrumb-d\">
            <a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Dashboard</a> ›
            <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_index");
        yield "\">Cours</a> ›
            Chapitres
        </div>
    </div>
    <div style=\"display:flex;gap:10px;\">
        <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_index");
        yield "\" class=\"btn-dinari btn-secondary-d\">
            <i class=\"ri-arrow-left-line\"></i> Retour aux cours
        </a>
        <a href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_new", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 21, $this->source); })()), "id", [], "any", false, false, false, 21)]), "html", null, true);
        yield "\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-add-line\"></i> Nouveau chapitre
        </a>
    </div>
</div>

<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["chapitres"]) || array_key_exists("chapitres", $context) ? $context["chapitres"] : (function () { throw new RuntimeError('Variable "chapitres" does not exist.', 29, $this->source); })())), "html", null, true);
        yield " chapitre";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["chapitres"]) || array_key_exists("chapitres", $context) ? $context["chapitres"] : (function () { throw new RuntimeError('Variable "chapitres" does not exist.', 29, $this->source); })())) != 1)) ? ("s") : (""));
        yield "</span>
    </div>
    ";
        // line 31
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["chapitres"]) || array_key_exists("chapitres", $context) ? $context["chapitres"] : (function () { throw new RuntimeError('Variable "chapitres" does not exist.', 31, $this->source); })()))) {
            // line 32
            yield "        <p style=\"color:var(--muted);text-align:center;padding:32px;\">
            Aucun chapitre. <a href=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_new", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 33, $this->source); })()), "id", [], "any", false, false, false, 33)]), "html", null, true);
            yield "\" style=\"color:var(--blue);\">Ajouter le premier</a>
        </p>
    ";
        } else {
            // line 36
            yield "        <table class=\"table-dinari\">
            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Titre</th>
                    <th>Contenu (aperçu)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["chapitres"]) || array_key_exists("chapitres", $context) ? $context["chapitres"] : (function () { throw new RuntimeError('Variable "chapitres" does not exist.', 46, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["ch"]) {
                // line 47
                yield "                <tr>
                    <td>
                        <span class=\"badge-dinari badge-info\">";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "position", [], "any", false, false, false, 49), "html", null, true);
                yield "</span>
                    </td>
                    <td><strong>";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "titre", [], "any", false, false, false, 51), "html", null, true);
                yield "</strong></td>
                    <td style=\"max-width:300px;color:var(--muted);font-size:13px;\">
                        ";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "contenu", [], "any", true, true, false, 53)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "contenu", [], "any", false, false, false, 53), "—")) : ("—")), 0, 80), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "contenu", [], "any", false, false, false, 53)) > 80)) {
                    yield "…";
                }
                // line 54
                yield "                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_edit", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 57, $this->source); })()), "id", [], "any", false, false, false, 57), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "id", [], "any", false, false, false, 57)]), "html", null, true);
                yield "\"
                               class=\"btn-dinari btn-warning-d btn-sm-d\">
                                <i class=\"ri-edit-line\"></i>
                            </a>
                            <form method=\"POST\"
                                  action=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_chapitre_delete", ["coursId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 62, $this->source); })()), "id", [], "any", false, false, false, 62), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "id", [], "any", false, false, false, 62)]), "html", null, true);
                yield "\"
                                  onsubmit=\"return confirm('Supprimer ce chapitre ?')\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_ch_" . CoreExtension::getAttribute($this->env, $this->source, $context["ch"], "id", [], "any", false, false, false, 64))), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\">
                                    <i class=\"ri-delete-bin-line\"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['ch'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            yield "            </tbody>
        </table>
    ";
        }
        // line 76
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
        return "admin/chapitre/index.html.twig";
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
        return array (  279 => 76,  274 => 73,  259 => 64,  254 => 62,  246 => 57,  241 => 54,  236 => 53,  231 => 51,  226 => 49,  222 => 47,  218 => 46,  206 => 36,  200 => 33,  197 => 32,  195 => 31,  188 => 29,  177 => 21,  171 => 18,  163 => 13,  159 => 12,  154 => 10,  150 => 8,  137 => 7,  114 => 5,  91 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Chapitres — {{ cours.nomCours }} — Admin{% endblock %}
{% block page_title %}Chapitres{% endblock %}
{% block section_title %}{{ cours.nomCours }}{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>Chapitres — {{ cours.nomCours }}</h1>
        <div class=\"breadcrumb-d\">
            <a href=\"{{ path('admin_dashboard') }}\">Dashboard</a> ›
            <a href=\"{{ path('admin_cours_index') }}\">Cours</a> ›
            Chapitres
        </div>
    </div>
    <div style=\"display:flex;gap:10px;\">
        <a href=\"{{ path('admin_cours_index') }}\" class=\"btn-dinari btn-secondary-d\">
            <i class=\"ri-arrow-left-line\"></i> Retour aux cours
        </a>
        <a href=\"{{ path('admin_chapitre_new', {coursId: cours.id}) }}\" class=\"btn-dinari btn-primary-d\">
            <i class=\"ri-add-line\"></i> Nouveau chapitre
        </a>
    </div>
</div>

<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">{{ chapitres|length }} chapitre{{ chapitres|length != 1 ? 's' : '' }}</span>
    </div>
    {% if chapitres is empty %}
        <p style=\"color:var(--muted);text-align:center;padding:32px;\">
            Aucun chapitre. <a href=\"{{ path('admin_chapitre_new', {coursId: cours.id}) }}\" style=\"color:var(--blue);\">Ajouter le premier</a>
        </p>
    {% else %}
        <table class=\"table-dinari\">
            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Titre</th>
                    <th>Contenu (aperçu)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for ch in chapitres %}
                <tr>
                    <td>
                        <span class=\"badge-dinari badge-info\">{{ ch.position }}</span>
                    </td>
                    <td><strong>{{ ch.titre }}</strong></td>
                    <td style=\"max-width:300px;color:var(--muted);font-size:13px;\">
                        {{ ch.contenu|default('—')|slice(0,80) }}{% if ch.contenu|length > 80 %}…{% endif %}
                    </td>
                    <td>
                        <div style=\"display:flex;gap:6px;\">
                            <a href=\"{{ path('admin_chapitre_edit', {coursId: cours.id, id: ch.id}) }}\"
                               class=\"btn-dinari btn-warning-d btn-sm-d\">
                                <i class=\"ri-edit-line\"></i>
                            </a>
                            <form method=\"POST\"
                                  action=\"{{ path('admin_chapitre_delete', {coursId: cours.id, id: ch.id}) }}\"
                                  onsubmit=\"return confirm('Supprimer ce chapitre ?')\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_ch_' ~ ch.id) }}\">
                                <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\">
                                    <i class=\"ri-delete-bin-line\"></i>
                                </button>
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
", "admin/chapitre/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\chapitre\\index.html.twig");
    }
}
