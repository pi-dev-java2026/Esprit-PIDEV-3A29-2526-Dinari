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

/* admin/base.html.twig */
class __TwigTemplate_a76162c43a7060c8ec4d2e36e0d9939e extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'page_title' => [$this, 'block_page_title'],
            'section_title' => [$this, 'block_section_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/fontAwesome.css"), "html", null, true);
        yield "\">
    <link href=\"https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        :root {
            --blue:   #1a6fc4;
            --blue2:  #1558a0;
            --text:   #2c3e50;
            --muted:  #7f8c8d;
            --border: #e9ecef;
            --light:  #f8f9fa;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Raleway', sans-serif; background: #f5f7fa; color: var(--text); }

        /* ===== NAVBAR ===== */
        .admin-navbar {
            position: fixed;
            top: 0; width: 100%;
            z-index: 1000;
            background: #fff;
            border-bottom: 1px solid var(--border);
            box-shadow: 0 1px 12px rgba(0,0,0,0.07);
        }
        .admin-navbar .nav-inner {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 32px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo */
        .nav-logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            gap: 0;
        }
        .nav-logo-icon {
            width: 46px; height: 46px;
            background: var(--blue);
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; font-weight: 900;
            color: #fff; font-style: italic;
            font-family: 'Raleway', sans-serif;
        }
        .nav-logo-text {
            font-size: 20px; font-weight: 400;
            color: var(--text); padding-left: 12px;
            font-family: 'Raleway', sans-serif;
        }
        .nav-logo-badge {
            font-size: 10px; font-weight: 700;
            background: var(--blue);
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Nav links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 2px;
            list-style: none;
        }
        .nav-links li a {
            color: var(--muted);
            font-size: 13px; font-weight: 600;
            padding: 8px 13px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
            position: relative;
            display: flex; align-items: center; gap: 7px;
        }
        .nav-links li a:hover {
            color: var(--blue);
            background: rgba(26,111,196,0.07);
        }
        .nav-links li a.active {
            color: var(--blue);
            font-weight: 700;
            background: rgba(26,111,196,0.07);
        }
        .nav-links li a.active::after {
            content: '';
            position: absolute; bottom: -1px; left: 13px;
            width: calc(100% - 26px); height: 2px;
            background: var(--blue);
            border-radius: 2px;
        }
        .nav-links li a i { font-size: 16px; }

        .nav-divider {
            width: 1px; height: 24px;
            background: var(--border);
            margin: 0 6px;
            flex-shrink: 0;
        }

        .nav-btn {
            background: var(--blue) !important;
            color: #fff !important;
            border-radius: 8px !important;
            padding: 9px 18px !important;
            font-weight: 700 !important;
            transition: all 0.2s !important;
            gap: 7px !important;
        }
        .nav-btn:hover {
            background: var(--blue2) !important;
            color: #fff !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 14px rgba(26,111,196,0.3) !important;
        }

        /* ===== BREADCRUMB BAR ===== */
        .breadcrumb-bar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 10px 0;
            margin-top: 68px;
        }
        .breadcrumb-bar .bc-inner {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .breadcrumb-bar .bc-title {
            font-size: 13px; color: var(--muted);
            display: flex; align-items: center; gap: 6px;
        }
        .breadcrumb-bar .bc-title a {
            color: var(--blue); text-decoration: none;
            transition: color 0.2s;
        }
        .breadcrumb-bar .bc-title a:hover { color: var(--blue2); }
        .breadcrumb-bar .bc-title .sep { color: #ccc; }
        .breadcrumb-bar .bc-title span { color: var(--text); font-weight: 600; }
        .bc-section-title {
            font-size: 18px; font-weight: 800; color: var(--text);
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 32px 60px;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .page-header h1 {
            font-size: 24px; font-weight: 800; color: var(--text);
            margin-bottom: 4px;
        }
        .page-header .breadcrumb-d {
            font-size: 13px; color: var(--muted);
        }
        .page-header .breadcrumb-d a { color: var(--blue); text-decoration: none; }

        /* ===== CARDS ===== */
        .card-dinari {
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            transition: box-shadow 0.2s;
        }
        .card-dinari:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
        .card-dinari .card-header-dinari {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .card-dinari .card-title {
            font-size: 16px; font-weight: 700; color: var(--text);
        }

        /* ===== STATS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }
        @media (max-width: 900px) { .stats-grid { grid-template-columns: repeat(2,1fr); } }
        .stat-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 20px 22px;
            display: flex; align-items: center; gap: 16px;
            transition: all 0.25s;
        }
        .stat-card:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            transform: translateY(-3px);
        }
        .stat-icon {
            width: 52px; height: 52px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }
        .stat-value { font-size: 26px; font-weight: 800; color: var(--text); line-height: 1; }
        .stat-label { font-size: 12px; color: var(--muted); margin-top: 5px; font-weight: 500; }

        /* ===== TABLE ===== */
        .table-dinari {
            width: 100%; border-collapse: collapse; font-size: 14px;
        }
        .table-dinari thead th {
            background: #f8f9fa;
            padding: 13px 16px;
            font-size: 11px; font-weight: 700;
            letter-spacing: 1px; text-transform: uppercase;
            color: var(--muted);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }
        .table-dinari tbody td {
            padding: 15px 16px;
            border-bottom: 1px solid #f0f4f8;
            color: var(--text); vertical-align: middle;
        }
        .table-dinari tbody tr:hover { background: #fafbfc; }
        .table-dinari tbody tr:last-child td { border-bottom: none; }

        /* ===== BADGES ===== */
        .badge-dinari {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 4px 10px;
            border-radius: 20px; font-size: 11px;
            font-weight: 700; letter-spacing: 0.5px;
        }
        .badge-success { background: rgba(39,174,96,0.12);  color: #27ae60; }
        .badge-danger  { background: rgba(231,76,60,0.12);  color: #e74c3c; }
        .badge-info    { background: rgba(26,111,196,0.12); color: var(--blue); }
        .badge-warning { background: rgba(243,156,18,0.12); color: #f39c12; }

        /* ===== BUTTONS ===== */
        .btn-dinari {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px; border-radius: 8px;
            font-size: 13px; font-weight: 600;
            text-decoration: none; cursor: pointer;
            transition: all 0.2s; border: none;
            font-family: 'Raleway', sans-serif;
        }
        .btn-dinari i { font-size: 16px; }
        .btn-primary-d   { background: var(--blue); color: #fff; }
        .btn-primary-d:hover   { background: var(--blue2); color: #fff; transform: translateY(-1px); box-shadow: 0 4px 14px rgba(26,111,196,0.3); }
        .btn-danger-d    { background: #e74c3c; color: #fff; }
        .btn-danger-d:hover    { background: #c0392b; color: #fff; }
        .btn-warning-d   { background: #f39c12; color: #fff; }
        .btn-warning-d:hover   { background: #e67e22; color: #fff; }
        .btn-secondary-d { background: #f0f4f8; color: #5a6e84; border: 1px solid var(--border); }
        .btn-secondary-d:hover { background: #e2e8f0; color: var(--text); }
        .btn-sm-d { padding: 6px 12px; font-size: 12px; }
        .btn-sm-d i { font-size: 14px; }

        /* ===== FORM ===== */
        .form-group-d { margin-bottom: 18px; }
        .form-group-d label {
            display: block; font-size: 13px; font-weight: 600;
            color: var(--text); margin-bottom: 6px;
        }
        .form-group-d .form-control {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: 8px;
            font-size: 14px; font-family: 'Raleway', sans-serif;
            color: var(--text); transition: border-color 0.2s; background: #fff;
        }
        .form-group-d .form-control:focus {
            outline: none; border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(26,111,196,0.1);
        }

        /* ===== ALERTS ===== */
        .alert-dinari {
            padding: 13px 18px; border-radius: 10px;
            margin-bottom: 20px; font-size: 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .alert-dinari i { font-size: 18px; }
        .alert-success-d { background: rgba(39,174,96,0.1);  color: #27ae60; border: 1px solid rgba(39,174,96,0.2); }
        .alert-danger-d  { background: rgba(231,76,60,0.1);  color: #e74c3c; border: 1px solid rgba(231,76,60,0.2); }

        /* ===== FOOTER ===== */
        .admin-footer {
            background: #fff;
            border-top: 1px solid var(--border);
            padding: 18px 32px;
            text-align: center;
            font-size: 12px;
            color: var(--muted);
        }
        .admin-footer a { color: var(--blue); text-decoration: none; }
    </style>
    ";
        // line 325
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 326
        yield "</head>
<body>

    ";
        // line 330
        yield "    <nav class=\"admin-navbar\">
        <div class=\"nav-inner\">

            <a href=\"";
        // line 333
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"nav-logo\">
                <div class=\"nav-logo-icon\">D</div>
                <span class=\"nav-logo-text\">inari</span>
                <span class=\"nav-logo-badge\">Admin</span>
            </a>

            <ul class=\"nav-links\">
                <li>
                    <a href=\"";
        // line 341
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\"
                       class=\"";
        // line 342
        yield (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 342, $this->source); })()), "request", [], "any", false, false, false, 342), "get", ["_route"], "method", false, false, false, 342)) && is_string($_v1 = "admin_dashboard") && str_starts_with($_v0, $_v1))) ? ("active") : (""));
        yield "\">
                        <i class=\"ri-dashboard-line\"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href=\"";
        // line 347
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_index");
        yield "\"
                       class=\"";
        // line 348
        yield ((((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 348, $this->source); })()), "request", [], "any", false, false, false, 348), "get", ["_route"], "method", false, false, false, 348)) && is_string($_v3 = "admin_cours") && str_starts_with($_v2, $_v3)) || (is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 348, $this->source); })()), "request", [], "any", false, false, false, 348), "get", ["_route"], "method", false, false, false, 348)) && is_string($_v5 = "admin_chapitre") && str_starts_with($_v4, $_v5)))) ? ("active") : (""));
        yield "\">
                        <i class=\"ri-book-open-line\"></i> Cours
                    </a>
                </li>
                <li>
                    <a href=\"";
        // line 353
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
        yield "\"
                       class=\"";
        // line 354
        yield (((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 354, $this->source); })()), "request", [], "any", false, false, false, 354), "get", ["_route"], "method", false, false, false, 354)) && is_string($_v7 = "admin_quiz") && str_starts_with($_v6, $_v7))) ? ("active") : (""));
        yield "\">
                        <i class=\"ri-question-line\"></i> Quiz
                    </a>
                </li>

                <div class=\"nav-divider\"></div>

                <li><a href=\"#\"><i class=\"ri-pie-chart-2-line\"></i> Budgets</a></li>
                <li><a href=\"#\"><i class=\"ri-bar-chart-box-line\"></i> Dépenses</a></li>
                <li><a href=\"#\"><i class=\"ri-vip-crown-line\"></i> Abonnements</a></li>
                <li><a href=\"#\"><i class=\"ri-team-line\"></i> Utilisateurs</a></li>

                <div class=\"nav-divider\"></div>

                <li>
                    <a href=\"";
        // line 369
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"nav-btn\">
                        <i class=\"ri-global-line\"></i> Voir le site
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    ";
        // line 378
        yield "    <div class=\"breadcrumb-bar\">
        <div class=\"bc-inner\">
            <div class=\"bc-title\">
                <i class=\"ri-home-4-line\" style=\"color:var(--blue);font-size:15px;\"></i>
                <a href=\"";
        // line 382
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a>
                <span class=\"sep\">›</span>
                <a href=\"";
        // line 384
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">Admin</a>
                <span class=\"sep\">›</span>
                <span>";
        // line 386
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</span>
            </div>
            <div class=\"bc-section-title\">
                ";
        // line 389
        yield from $this->unwrap()->yieldBlock('section_title', $context, $blocks);
        // line 390
        yield "            </div>
        </div>
    </div>

    ";
        // line 395
        yield "    <div class=\"main-content\">

        ";
        // line 397
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 397, $this->source); })()), "flashes", [], "any", false, false, false, 397));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 398
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 399
                yield "                <div class=\"alert-dinari ";
                yield ((($context["type"] == "success")) ? ("alert-success-d") : ("alert-danger-d"));
                yield "\">
                    <i class=\"ri-";
                // line 400
                yield ((($context["type"] == "success")) ? ("checkbox-circle-line") : ("error-warning-line"));
                yield "\"></i>
                    ";
                // line 401
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 404
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['type'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 405
        yield "
        ";
        // line 406
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 407
        yield "    </div>

    <footer class=\"admin-footer\">
        &copy; ";
        // line 410
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " <strong style=\"color:var(--blue);\">Dinari</strong> Admin
        &nbsp;·&nbsp;
        <a href=\"";
        // line 412
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">← Retour au site public</a>
    </footer>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
    <script src=\"";
        // line 416
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/vendor/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
    ";
        // line 417
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 418
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "Admin — Dinari";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 325
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 386
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

        yield "Dashboard";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 389
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 406
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 417
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/base.html.twig";
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
        return array (  689 => 417,  667 => 406,  645 => 389,  622 => 386,  600 => 325,  577 => 6,  564 => 418,  562 => 417,  558 => 416,  551 => 412,  546 => 410,  541 => 407,  539 => 406,  536 => 405,  530 => 404,  521 => 401,  517 => 400,  512 => 399,  507 => 398,  503 => 397,  499 => 395,  493 => 390,  491 => 389,  485 => 386,  480 => 384,  475 => 382,  469 => 378,  458 => 369,  440 => 354,  436 => 353,  428 => 348,  424 => 347,  416 => 342,  412 => 341,  401 => 333,  396 => 330,  391 => 326,  389 => 325,  69 => 8,  65 => 7,  61 => 6,  54 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>{% block title %}Admin — Dinari{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/fontAwesome.css') }}\">
    <link href=\"https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        :root {
            --blue:   #1a6fc4;
            --blue2:  #1558a0;
            --text:   #2c3e50;
            --muted:  #7f8c8d;
            --border: #e9ecef;
            --light:  #f8f9fa;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Raleway', sans-serif; background: #f5f7fa; color: var(--text); }

        /* ===== NAVBAR ===== */
        .admin-navbar {
            position: fixed;
            top: 0; width: 100%;
            z-index: 1000;
            background: #fff;
            border-bottom: 1px solid var(--border);
            box-shadow: 0 1px 12px rgba(0,0,0,0.07);
        }
        .admin-navbar .nav-inner {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 32px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo */
        .nav-logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            gap: 0;
        }
        .nav-logo-icon {
            width: 46px; height: 46px;
            background: var(--blue);
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; font-weight: 900;
            color: #fff; font-style: italic;
            font-family: 'Raleway', sans-serif;
        }
        .nav-logo-text {
            font-size: 20px; font-weight: 400;
            color: var(--text); padding-left: 12px;
            font-family: 'Raleway', sans-serif;
        }
        .nav-logo-badge {
            font-size: 10px; font-weight: 700;
            background: var(--blue);
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Nav links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 2px;
            list-style: none;
        }
        .nav-links li a {
            color: var(--muted);
            font-size: 13px; font-weight: 600;
            padding: 8px 13px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
            position: relative;
            display: flex; align-items: center; gap: 7px;
        }
        .nav-links li a:hover {
            color: var(--blue);
            background: rgba(26,111,196,0.07);
        }
        .nav-links li a.active {
            color: var(--blue);
            font-weight: 700;
            background: rgba(26,111,196,0.07);
        }
        .nav-links li a.active::after {
            content: '';
            position: absolute; bottom: -1px; left: 13px;
            width: calc(100% - 26px); height: 2px;
            background: var(--blue);
            border-radius: 2px;
        }
        .nav-links li a i { font-size: 16px; }

        .nav-divider {
            width: 1px; height: 24px;
            background: var(--border);
            margin: 0 6px;
            flex-shrink: 0;
        }

        .nav-btn {
            background: var(--blue) !important;
            color: #fff !important;
            border-radius: 8px !important;
            padding: 9px 18px !important;
            font-weight: 700 !important;
            transition: all 0.2s !important;
            gap: 7px !important;
        }
        .nav-btn:hover {
            background: var(--blue2) !important;
            color: #fff !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 14px rgba(26,111,196,0.3) !important;
        }

        /* ===== BREADCRUMB BAR ===== */
        .breadcrumb-bar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 10px 0;
            margin-top: 68px;
        }
        .breadcrumb-bar .bc-inner {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .breadcrumb-bar .bc-title {
            font-size: 13px; color: var(--muted);
            display: flex; align-items: center; gap: 6px;
        }
        .breadcrumb-bar .bc-title a {
            color: var(--blue); text-decoration: none;
            transition: color 0.2s;
        }
        .breadcrumb-bar .bc-title a:hover { color: var(--blue2); }
        .breadcrumb-bar .bc-title .sep { color: #ccc; }
        .breadcrumb-bar .bc-title span { color: var(--text); font-weight: 600; }
        .bc-section-title {
            font-size: 18px; font-weight: 800; color: var(--text);
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 32px 60px;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .page-header h1 {
            font-size: 24px; font-weight: 800; color: var(--text);
            margin-bottom: 4px;
        }
        .page-header .breadcrumb-d {
            font-size: 13px; color: var(--muted);
        }
        .page-header .breadcrumb-d a { color: var(--blue); text-decoration: none; }

        /* ===== CARDS ===== */
        .card-dinari {
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            transition: box-shadow 0.2s;
        }
        .card-dinari:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
        .card-dinari .card-header-dinari {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .card-dinari .card-title {
            font-size: 16px; font-weight: 700; color: var(--text);
        }

        /* ===== STATS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }
        @media (max-width: 900px) { .stats-grid { grid-template-columns: repeat(2,1fr); } }
        .stat-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 20px 22px;
            display: flex; align-items: center; gap: 16px;
            transition: all 0.25s;
        }
        .stat-card:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            transform: translateY(-3px);
        }
        .stat-icon {
            width: 52px; height: 52px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }
        .stat-value { font-size: 26px; font-weight: 800; color: var(--text); line-height: 1; }
        .stat-label { font-size: 12px; color: var(--muted); margin-top: 5px; font-weight: 500; }

        /* ===== TABLE ===== */
        .table-dinari {
            width: 100%; border-collapse: collapse; font-size: 14px;
        }
        .table-dinari thead th {
            background: #f8f9fa;
            padding: 13px 16px;
            font-size: 11px; font-weight: 700;
            letter-spacing: 1px; text-transform: uppercase;
            color: var(--muted);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }
        .table-dinari tbody td {
            padding: 15px 16px;
            border-bottom: 1px solid #f0f4f8;
            color: var(--text); vertical-align: middle;
        }
        .table-dinari tbody tr:hover { background: #fafbfc; }
        .table-dinari tbody tr:last-child td { border-bottom: none; }

        /* ===== BADGES ===== */
        .badge-dinari {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 4px 10px;
            border-radius: 20px; font-size: 11px;
            font-weight: 700; letter-spacing: 0.5px;
        }
        .badge-success { background: rgba(39,174,96,0.12);  color: #27ae60; }
        .badge-danger  { background: rgba(231,76,60,0.12);  color: #e74c3c; }
        .badge-info    { background: rgba(26,111,196,0.12); color: var(--blue); }
        .badge-warning { background: rgba(243,156,18,0.12); color: #f39c12; }

        /* ===== BUTTONS ===== */
        .btn-dinari {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px; border-radius: 8px;
            font-size: 13px; font-weight: 600;
            text-decoration: none; cursor: pointer;
            transition: all 0.2s; border: none;
            font-family: 'Raleway', sans-serif;
        }
        .btn-dinari i { font-size: 16px; }
        .btn-primary-d   { background: var(--blue); color: #fff; }
        .btn-primary-d:hover   { background: var(--blue2); color: #fff; transform: translateY(-1px); box-shadow: 0 4px 14px rgba(26,111,196,0.3); }
        .btn-danger-d    { background: #e74c3c; color: #fff; }
        .btn-danger-d:hover    { background: #c0392b; color: #fff; }
        .btn-warning-d   { background: #f39c12; color: #fff; }
        .btn-warning-d:hover   { background: #e67e22; color: #fff; }
        .btn-secondary-d { background: #f0f4f8; color: #5a6e84; border: 1px solid var(--border); }
        .btn-secondary-d:hover { background: #e2e8f0; color: var(--text); }
        .btn-sm-d { padding: 6px 12px; font-size: 12px; }
        .btn-sm-d i { font-size: 14px; }

        /* ===== FORM ===== */
        .form-group-d { margin-bottom: 18px; }
        .form-group-d label {
            display: block; font-size: 13px; font-weight: 600;
            color: var(--text); margin-bottom: 6px;
        }
        .form-group-d .form-control {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: 8px;
            font-size: 14px; font-family: 'Raleway', sans-serif;
            color: var(--text); transition: border-color 0.2s; background: #fff;
        }
        .form-group-d .form-control:focus {
            outline: none; border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(26,111,196,0.1);
        }

        /* ===== ALERTS ===== */
        .alert-dinari {
            padding: 13px 18px; border-radius: 10px;
            margin-bottom: 20px; font-size: 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .alert-dinari i { font-size: 18px; }
        .alert-success-d { background: rgba(39,174,96,0.1);  color: #27ae60; border: 1px solid rgba(39,174,96,0.2); }
        .alert-danger-d  { background: rgba(231,76,60,0.1);  color: #e74c3c; border: 1px solid rgba(231,76,60,0.2); }

        /* ===== FOOTER ===== */
        .admin-footer {
            background: #fff;
            border-top: 1px solid var(--border);
            padding: 18px 32px;
            text-align: center;
            font-size: 12px;
            color: var(--muted);
        }
        .admin-footer a { color: var(--blue); text-decoration: none; }
    </style>
    {% block stylesheets %}{% endblock %}
</head>
<body>

    {# ===== NAVBAR ===== #}
    <nav class=\"admin-navbar\">
        <div class=\"nav-inner\">

            <a href=\"{{ path('app_home') }}\" class=\"nav-logo\">
                <div class=\"nav-logo-icon\">D</div>
                <span class=\"nav-logo-text\">inari</span>
                <span class=\"nav-logo-badge\">Admin</span>
            </a>

            <ul class=\"nav-links\">
                <li>
                    <a href=\"{{ path('admin_dashboard') }}\"
                       class=\"{{ app.request.get('_route') starts with 'admin_dashboard' ? 'active' : '' }}\">
                        <i class=\"ri-dashboard-line\"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href=\"{{ path('admin_cours_index') }}\"
                       class=\"{{ app.request.get('_route') starts with 'admin_cours' or app.request.get('_route') starts with 'admin_chapitre' ? 'active' : '' }}\">
                        <i class=\"ri-book-open-line\"></i> Cours
                    </a>
                </li>
                <li>
                    <a href=\"{{ path('admin_quiz_index') }}\"
                       class=\"{{ app.request.get('_route') starts with 'admin_quiz' ? 'active' : '' }}\">
                        <i class=\"ri-question-line\"></i> Quiz
                    </a>
                </li>

                <div class=\"nav-divider\"></div>

                <li><a href=\"#\"><i class=\"ri-pie-chart-2-line\"></i> Budgets</a></li>
                <li><a href=\"#\"><i class=\"ri-bar-chart-box-line\"></i> Dépenses</a></li>
                <li><a href=\"#\"><i class=\"ri-vip-crown-line\"></i> Abonnements</a></li>
                <li><a href=\"#\"><i class=\"ri-team-line\"></i> Utilisateurs</a></li>

                <div class=\"nav-divider\"></div>

                <li>
                    <a href=\"{{ path('app_home') }}\" class=\"nav-btn\">
                        <i class=\"ri-global-line\"></i> Voir le site
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {# ===== BREADCRUMB BAR ===== #}
    <div class=\"breadcrumb-bar\">
        <div class=\"bc-inner\">
            <div class=\"bc-title\">
                <i class=\"ri-home-4-line\" style=\"color:var(--blue);font-size:15px;\"></i>
                <a href=\"{{ path('app_home') }}\">Accueil</a>
                <span class=\"sep\">›</span>
                <a href=\"{{ path('admin_dashboard') }}\">Admin</a>
                <span class=\"sep\">›</span>
                <span>{% block page_title %}Dashboard{% endblock %}</span>
            </div>
            <div class=\"bc-section-title\">
                {% block section_title %}{% endblock %}
            </div>
        </div>
    </div>

    {# ===== CONTENU ===== #}
    <div class=\"main-content\">

        {% for type, messages in app.flashes %}
            {% for message in messages %}
                <div class=\"alert-dinari {{ type == 'success' ? 'alert-success-d' : 'alert-danger-d' }}\">
                    <i class=\"ri-{{ type == 'success' ? 'checkbox-circle-line' : 'error-warning-line' }}\"></i>
                    {{ message }}
                </div>
            {% endfor %}
        {% endfor %}

        {% block body %}{% endblock %}
    </div>

    <footer class=\"admin-footer\">
        &copy; {{ \"now\"|date(\"Y\") }} <strong style=\"color:var(--blue);\">Dinari</strong> Admin
        &nbsp;·&nbsp;
        <a href=\"{{ path('app_home') }}\">← Retour au site public</a>
    </footer>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
    <script src=\"{{ asset('js/vendor/bootstrap.min.js') }}\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>
", "admin/base.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\base.html.twig");
    }
}
