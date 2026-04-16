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

/* admin/commentaire/index.html.twig */
class __TwigTemplate_5a501939e68ef619428801ef1c700716 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/commentaire/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/commentaire/index.html.twig"));

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

        yield "Commentaires — Admin";
        
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

        yield "Commentaires";
        
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

        yield "Modération";
        
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
        <h1>Commentaires</h1>
        <div class=\"breadcrumb-d\"><a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Dashboard</a> › Commentaires</div>
    </div>
</div>

<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 17, $this->source); })())), "html", null, true);
        yield " commentaire";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 17, $this->source); })())) != 1)) ? ("s") : (""));
        yield "</span>
    </div>
    ";
        // line 19
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 19, $this->source); })()))) {
            // line 20
            yield "        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun commentaire.</p>
    ";
        } else {
            // line 22
            yield "        <table class=\"table-dinari\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Cours / Chapitre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 34, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 35
                yield "                <tr>
                    <td>";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 36), "html", null, true);
                yield "</td>
                    <td><strong>";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "auteur", [], "any", false, false, false, 37), "html", null, true);
                yield "</strong></td>
                    <td style=\"max-width:280px;font-size:13px;color:var(--muted);\">
                        ";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "contenu", [], "any", false, false, false, 39), 0, 100), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "contenu", [], "any", false, false, false, 39)) > 100)) {
                    yield "…";
                }
                // line 40
                yield "                    </td>
                    <td style=\"font-size:12px;\">
                        ";
                // line 42
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "coursSlug", [], "any", false, false, false, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 43
                    yield "                            ";
                    $context["slug"] = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "coursSlug", [], "any", false, false, false, 43);
                    // line 44
                    yield "                            ";
                    // line 45
                    yield "                            ";
                    if (CoreExtension::inFilter("://", (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 45, $this->source); })()))) {
                        // line 46
                        yield "                                ";
                        $context["slug"] = Twig\Extension\CoreExtension::last($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 46, $this->source); })()), "/"));
                        // line 47
                        yield "                                ";
                        if (((isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 47, $this->source); })()) == "")) {
                            // line 48
                            yield "                                    ";
                            $context["parts"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "coursSlug", [], "any", false, false, false, 48), "/");
                            // line 49
                            yield "                                    ";
                            $context["slug"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["parts"] ?? null), (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 49, $this->source); })())) - 2), [], "array", true, true, false, 49) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 49, $this->source); })()), (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 49, $this->source); })())) - 2), [], "array", false, false, false, 49)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 49, $this->source); })()), (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 49, $this->source); })())) - 2), [], "array", false, false, false, 49)) : ((isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 49, $this->source); })())));
                            // line 50
                            yield "                                ";
                        }
                        // line 51
                        yield "                            ";
                    }
                    // line 52
                    yield "                            <span class=\"badge-dinari badge-info\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "coursSlug", [], "any", false, false, false, 52), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 52, $this->source); })()), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 54
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "chapitre", [], "any", false, false, false, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 55
                    yield "                            <span class=\"badge-dinari badge-warning\" style=\"margin-top:3px;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "chapitre", [], "any", false, false, false, 55), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 57
                yield "                    </td>
                    <td style=\"font-size:12px;color:var(--muted);\">";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 58), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                    <td>
                        <form method=\"POST\" action=\"";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_commentaire_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 60)]), "html", null, true);
                yield "\"
                              onsubmit=\"return confirm('Supprimer ce commentaire ?')\">
                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_com_" . CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 62))), "html", null, true);
                yield "\">
                            <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\">
                                <i class=\"ri-delete-bin-line\"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "            </tbody>
        </table>
    ";
        }
        // line 73
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
        return "admin/commentaire/index.html.twig";
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
        return array (  291 => 73,  286 => 70,  272 => 62,  267 => 60,  262 => 58,  259 => 57,  253 => 55,  250 => 54,  242 => 52,  239 => 51,  236 => 50,  233 => 49,  230 => 48,  227 => 47,  224 => 46,  221 => 45,  219 => 44,  216 => 43,  214 => 42,  210 => 40,  205 => 39,  200 => 37,  196 => 36,  193 => 35,  189 => 34,  175 => 22,  171 => 20,  169 => 19,  162 => 17,  153 => 11,  148 => 8,  135 => 7,  112 => 5,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Commentaires — Admin{% endblock %}
{% block page_title %}Commentaires{% endblock %}
{% block section_title %}Modération{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>Commentaires</h1>
        <div class=\"breadcrumb-d\"><a href=\"{{ path('admin_dashboard') }}\">Dashboard</a> › Commentaires</div>
    </div>
</div>

<div class=\"card-dinari\">
    <div class=\"card-header-dinari\">
        <span class=\"card-title\">{{ commentaires|length }} commentaire{{ commentaires|length != 1 ? 's' : '' }}</span>
    </div>
    {% if commentaires is empty %}
        <p style=\"color:var(--muted);text-align:center;padding:32px;\">Aucun commentaire.</p>
    {% else %}
        <table class=\"table-dinari\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Cours / Chapitre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for c in commentaires %}
                <tr>
                    <td>{{ c.id }}</td>
                    <td><strong>{{ c.auteur }}</strong></td>
                    <td style=\"max-width:280px;font-size:13px;color:var(--muted);\">
                        {{ c.contenu|slice(0,100) }}{% if c.contenu|length > 100 %}…{% endif %}
                    </td>
                    <td style=\"font-size:12px;\">
                        {% if c.coursSlug %}
                            {% set slug = c.coursSlug %}
                            {# Strip full URLs — keep only the last meaningful path segment #}
                            {% if '://' in slug %}
                                {% set slug = slug|split('/')|last %}
                                {% if slug == '' %}
                                    {% set parts = c.coursSlug|split('/') %}
                                    {% set slug = parts[parts|length - 2] ?? slug %}
                                {% endif %}
                            {% endif %}
                            <span class=\"badge-dinari badge-info\" title=\"{{ c.coursSlug }}\">{{ slug }}</span>
                        {% endif %}
                        {% if c.chapitre %}
                            <span class=\"badge-dinari badge-warning\" style=\"margin-top:3px;\">{{ c.chapitre }}</span>
                        {% endif %}
                    </td>
                    <td style=\"font-size:12px;color:var(--muted);\">{{ c.dateCreation|date('d/m/Y H:i') }}</td>
                    <td>
                        <form method=\"POST\" action=\"{{ path('admin_commentaire_delete', {id: c.id}) }}\"
                              onsubmit=\"return confirm('Supprimer ce commentaire ?')\">
                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_com_' ~ c.id) }}\">
                            <button type=\"submit\" class=\"btn-dinari btn-danger-d btn-sm-d\">
                                <i class=\"ri-delete-bin-line\"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    {% endif %}
</div>
{% endblock %}
", "admin/commentaire/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\commentaire\\index.html.twig");
    }
}
