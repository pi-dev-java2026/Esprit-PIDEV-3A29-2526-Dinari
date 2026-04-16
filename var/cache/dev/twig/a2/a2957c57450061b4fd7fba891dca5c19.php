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
class __TwigTemplate_87a1355abeed9685fee4d75bb6b2f8b2 extends Template
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
            'search' => [$this, 'block_search'],
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
    <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        :root {
            --sidebar-w: 248px;
            --topbar-h:  62px;
            --navy:    #0B1D35;
            --navy2:   #0F2544;
            --blue:    #2563EB;
            --blue2:   #1D4ED8;
            --accent:  #3B82F6;
            --indigo:  #4F46E5;
            --surface: #F8FAFC;
            --white:   #FFFFFF;
            --border:  #E2E8F0;
            --text:    #0F172A;
            --muted:   #64748B;
            --muted2:  #94A3B8;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--surface);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        /* ════ SIDEBAR ════ */
        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: var(--sidebar-w);
            background: var(--navy);
            display: flex;
            flex-direction: column;
            z-index: 200;
            overflow: hidden;
        }
        .sidebar::before {
            content: '';
            position: absolute;
            top: -60px; left: -60px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Logo */
        .sidebar-logo {
            padding: 22px 20px 18px;
            display: flex; align-items: center; gap: 11px;
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .logo-mark {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 17px; font-weight: 800; color: #fff;
            font-style: italic; letter-spacing: -1px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(37,99,235,0.4);
        }
        .logo-text .name { color: #fff; font-size: 16px; font-weight: 700; letter-spacing: -0.3px; }
        .logo-text .sub  {
            color: rgba(148,163,184,0.8);
            font-size: 9px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1.5px;
            margin-top: 2px; display: block;
        }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 14px 12px;
            overflow-y: auto;
            scrollbar-width: none;
        }
        .sidebar-nav::-webkit-scrollbar { display: none; }
        .nav-section-label {
            font-size: 9px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1.8px;
            color: rgba(100,116,139,0.7);
            padding: 10px 10px 6px;
            margin-top: 4px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 12px;
            color: rgba(148,163,184,0.85);
            font-size: 13px; font-weight: 500;
            text-decoration: none;
            border-radius: 9px;
            transition: all 0.18s ease;
            margin-bottom: 1px;
            position: relative;
            white-space: nowrap;
        }
        .nav-item i { font-size: 17px; width: 20px; text-align: center; flex-shrink: 0; }
        .nav-item:hover { color: #fff; background: rgba(255,255,255,0.06); }
        .nav-item.active { color: #fff; background: rgba(37,99,235,0.2); font-weight: 600; }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 6px; bottom: 6px;
            width: 3px;
            background: var(--accent);
            border-radius: 0 3px 3px 0;
        }
        .nav-item.active i { color: var(--accent); }
        .nav-badge {
            margin-left: auto;
            background: rgba(37,99,235,0.25); color: #93C5FD;
            font-size: 10px; font-weight: 700;
            padding: 1px 7px; border-radius: 20px;
        }
        .nav-divider { height: 1px; background: rgba(255,255,255,0.05); margin: 8px 10px; }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .status-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 10px;
            padding: 10px 13px;
        }
        .status-label {
            font-size: 8.5px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1.4px;
            color: rgba(100,116,139,0.7); margin-bottom: 7px;
        }
        .status-row { display: flex; align-items: center; justify-content: space-between; }
        .status-dot-row { display: flex; align-items: center; gap: 7px; }
        .status-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: #34D399;
            box-shadow: 0 0 0 3px rgba(52,211,153,0.2);
            animation: dotpulse 2s ease-in-out infinite;
        }
        @keyframes dotpulse {
            0%,100%{ box-shadow: 0 0 0 3px rgba(52,211,153,0.2); }
            50%    { box-shadow: 0 0 0 5px rgba(52,211,153,0.1); }
        }
        .status-text    { font-size: 11px; color: #94A3B8; font-weight: 500; }
        .status-version { font-size: 9px; color: rgba(100,116,139,0.6); font-weight: 600; letter-spacing: 0.5px; }

        /* ════ TOPBAR ════ */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--topbar-h);
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 28px;
            gap: 16px;
            z-index: 100;
        }
        .topbar-right { display: flex; align-items: center; gap: 6px; margin-left: auto; }
        .topbar-icon-btn {
            width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 9px;
            border: 1px solid var(--border);
            background: #fff; color: var(--muted);
            cursor: pointer; font-size: 17px;
            transition: all 0.15s;
            position: relative; text-decoration: none;
        }
        .topbar-icon-btn:hover { background: #F8FAFC; color: var(--text); border-color: #CBD5E1; }
        .notif-pip {
            position: absolute; top: 6px; right: 6px;
            width: 7px; height: 7px; border-radius: 50%;
            background: #EF4444; border: 1.5px solid #fff;
        }
        .topbar-sep { width: 1px; height: 28px; background: var(--border); margin: 0 6px; }
        .topbar-user {
            display: flex; align-items: center; gap: 9px;
            padding: 5px 10px 5px 6px;
            border-radius: 10px; cursor: pointer;
            transition: background 0.15s;
        }
        .topbar-user:hover { background: #F1F5F9; }
        .user-avatar {
            width: 32px; height: 32px; border-radius: 9px;
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 12px; font-weight: 700; flex-shrink: 0;
        }
        .user-info .user-name { font-size: 13px; font-weight: 700; color: var(--text); line-height: 1.2; }
        .user-info .user-role { font-size: 10px; color: var(--muted2); font-weight: 500; }
        .topbar-caret { color: var(--muted2); font-size: 16px; }

        /* ════ MAIN WRAPPER ════ */
        .admin-wrapper {
            margin-left: var(--sidebar-w);
            padding-top: var(--topbar-h);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-w));
        }
        .admin-content { flex: 1; padding: 28px 32px 60px; }

        /* ════ ALERTS ════ */
        .alert-dinari {
            padding: 12px 16px; border-radius: 10px; margin-bottom: 16px;
            font-size: 13px; display: flex; align-items: center; gap: 9px; font-weight: 500;
        }
        .alert-dinari i { font-size: 17px; }
        .alert-success-d { background: rgba(16,185,129,0.08); color: #065F46; border: 1px solid rgba(16,185,129,0.2); }
        .alert-danger-d  { background: rgba(239,68,68,0.08);  color: #991B1B; border: 1px solid rgba(239,68,68,0.2); }

        /* ════ SHARED COMPONENTS ════ */
        .btn-d {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px; border-radius: 9px;
            font-size: 13px; font-weight: 600;
            text-decoration: none; cursor: pointer;
            transition: all 0.18s; border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            white-space: nowrap;
        }
        .btn-d i { font-size: 16px; }
        .btn-primary   { background: linear-gradient(135deg, var(--blue) 0%, var(--indigo) 100%); color: #fff; box-shadow: 0 4px 14px rgba(37,99,235,0.3); }
        .btn-primary:hover   { transform: translateY(-1px); color: #fff; box-shadow: 0 6px 18px rgba(37,99,235,0.38); }
        .btn-secondary { background: #fff; color: var(--muted); border: 1px solid var(--border); }
        .btn-secondary:hover { background: #F8FAFC; color: var(--text); }
        .btn-outline   { background: #fff; color: var(--blue); border: 1.5px solid var(--blue); }
        .btn-outline:hover   { background: var(--blue); color: #fff; }
        .btn-ghost     { background: rgba(79,70,229,0.08); color: var(--indigo); border: 1.5px solid rgba(79,70,229,0.2); }
        .btn-ghost:hover     { background: var(--indigo); color: #fff; border-color: var(--indigo); }
        .btn-warning-d { background: #F59E0B; color: #fff; }
        .btn-warning-d:hover { background: #D97706; color: #fff; }

        /* Keep legacy aliases used in dashboard */
        .btn-dinari       { display: inline-flex; align-items: center; gap: 7px; padding: 9px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.18s; border: none; font-family: 'Plus Jakarta Sans', sans-serif; white-space: nowrap; }
        .btn-dinari i     { font-size: 16px; }
        .btn-primary-d    { background: linear-gradient(135deg, var(--blue) 0%, var(--indigo) 100%); color: #fff; box-shadow: 0 4px 14px rgba(37,99,235,0.3); }
        .btn-primary-d:hover    { transform: translateY(-1px); color: #fff; }
        .btn-secondary-d  { background: #fff; color: var(--muted); border: 1px solid var(--border); }
        .btn-secondary-d:hover  { background: #F8FAFC; color: var(--text); }
        .btn-sm-d         { padding: 6px 12px; font-size: 12px; }
        .btn-sm-d i       { font-size: 14px; }

        .badge-d { display: inline-flex; align-items: center; gap: 4px; padding: 3px 9px; border-radius: 20px; font-size: 10px; font-weight: 700; letter-spacing: 0.3px; }
        .b-success { background: rgba(16,185,129,0.1); color: #065F46; }
        .b-danger  { background: rgba(239,68,68,0.1);  color: #991B1B; }
        .b-info    { background: rgba(37,99,235,0.1);  color: #1E40AF; }
        .b-warning { background: rgba(245,158,11,0.1); color: #92400E; }
        .b-gray    { background: #F1F5F9; color: #475569; }

        /* Legacy badge aliases */
        .badge-dinari  { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; letter-spacing: 0.5px; }
        .badge-success { background: rgba(16,185,129,0.1); color: #065F46; }
        .badge-danger  { background: rgba(239,68,68,0.1);  color: #991B1B; }
        .badge-info    { background: rgba(37,99,235,0.1);  color: #1E40AF; }
        .badge-warning { background: rgba(245,158,11,0.1); color: #92400E; }

        /* Stats grid (used in dashboard) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }
        @media (max-width: 900px) { .stats-grid { grid-template-columns: repeat(2,1fr); } }
        .stat-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 20px 22px;
            display: flex; align-items: center; gap: 16px;
            transition: all 0.25s;
        }
        .stat-card:hover { box-shadow: 0 6px 24px rgba(37,99,235,0.1); transform: translateY(-3px); }
        .stat-icon {
            width: 52px; height: 52px; border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }
        .stat-value { font-size: 26px; font-weight: 800; color: var(--text); line-height: 1; }
        .stat-label { font-size: 12px; color: var(--muted); margin-top: 5px; font-weight: 500; }

        /* Card */
        .card-dinari {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            transition: box-shadow 0.2s;
        }
        .card-dinari:hover { box-shadow: 0 4px 20px rgba(37,99,235,0.07); }
        .card-dinari .card-header-dinari {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 20px; padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .card-dinari .card-title { font-size: 16px; font-weight: 700; color: var(--text); }

        /* Table */
        .table-dinari { width: 100%; border-collapse: collapse; font-size: 14px; }
        .table-dinari thead th {
            background: #F8FAFC; padding: 13px 16px;
            font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
            color: var(--muted); border-bottom: 1px solid var(--border); white-space: nowrap;
        }
        .table-dinari tbody td { padding: 15px 16px; border-bottom: 1px solid #F1F5F9; color: var(--text); vertical-align: middle; }
        .table-dinari tbody tr:hover { background: #FAFBFF; }
        .table-dinari tbody tr:last-child td { border-bottom: none; }

        /* Form */
        .form-group-d { margin-bottom: 18px; }
        .form-group-d label { display: block; font-size: 13px; font-weight: 600; color: var(--text); margin-bottom: 6px; }
        .form-group-d .form-control {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: 9px;
            font-size: 14px; font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text); transition: border-color 0.2s; background: #fff;
        }
        .form-group-d .form-control:focus { outline: none; border-color: var(--blue); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }

        /* Page header */
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; }
        .page-header h1 { font-size: 22px; font-weight: 800; color: var(--text); margin-bottom: 4px; }
        .page-header .breadcrumb-d { font-size: 13px; color: var(--muted); }
        .page-header .breadcrumb-d a { color: var(--blue); text-decoration: none; }

        /* Footer */
        .admin-footer {
            background: #fff;
            border-top: 1px solid var(--border);
            padding: 14px 32px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .footer-copy { font-size: 12px; color: var(--muted2); }
        .footer-copy strong { color: var(--blue); }
        .footer-link { font-size: 12px; color: var(--blue); text-decoration: none; display: flex; align-items: center; gap: 5px; }
        .footer-link:hover { text-decoration: underline; }
    </style>
    ";
        // line 361
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 362
        yield "    ";
        yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\ImportMapRuntime')->importmap("app");
        yield "
</head>
<body>

";
        // line 367
        yield "<aside class=\"sidebar\">
    <a href=\"";
        // line 368
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"sidebar-logo\">
        <div class=\"logo-mark\">D</div>
        <div class=\"logo-text\">
            <span class=\"name\">Dinari</span>
            <span class=\"sub\">Panneau Admin</span>
        </div>
    </a>

    <nav class=\"sidebar-nav\">
        <div class=\"nav-section-label\">Tableau de bord</div>

        <a href=\"";
        // line 379
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\"
           class=\"nav-item ";
        // line 380
        yield (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 380, $this->source); })()), "request", [], "any", false, false, false, 380), "get", ["_route"], "method", false, false, false, 380)) && is_string($_v1 = "admin_dashboard") && str_starts_with($_v0, $_v1))) ? ("active") : (""));
        yield "\">
            <i class=\"ri-dashboard-line\"></i> Dashboard
        </a>

        <div class=\"nav-divider\"></div>
        <div class=\"nav-section-label\">Gestion</div>

        <a href=\"";
        // line 387
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cours_index");
        yield "\"
           class=\"nav-item ";
        // line 388
        yield ((((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 388, $this->source); })()), "request", [], "any", false, false, false, 388), "get", ["_route"], "method", false, false, false, 388)) && is_string($_v3 = "admin_cours") && str_starts_with($_v2, $_v3)) || (is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 388, $this->source); })()), "request", [], "any", false, false, false, 388), "get", ["_route"], "method", false, false, false, 388)) && is_string($_v5 = "admin_chapitre") && str_starts_with($_v4, $_v5)))) ? ("active") : (""));
        yield "\">
            <i class=\"ri-book-open-line\"></i> Cours &amp; Chapitres
        </a>

        <a href=\"";
        // line 392
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_quiz_index");
        yield "\"
           class=\"nav-item ";
        // line 393
        yield (((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 393, $this->source); })()), "request", [], "any", false, false, false, 393), "get", ["_route"], "method", false, false, false, 393)) && is_string($_v7 = "admin_quiz") && str_starts_with($_v6, $_v7))) ? ("active") : (""));
        yield "\">
            <i class=\"ri-question-answer-line\"></i> Quiz
        </a>

        <a href=\"";
        // line 397
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_commentaire_index");
        yield "\"
           class=\"nav-item ";
        // line 398
        yield (((is_string($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 398, $this->source); })()), "request", [], "any", false, false, false, 398), "get", ["_route"], "method", false, false, false, 398)) && is_string($_v9 = "admin_commentaire") && str_starts_with($_v8, $_v9))) ? ("active") : (""));
        yield "\">
            <i class=\"ri-chat-3-line\"></i> Commentaires
        </a>

        <a href=\"";
        // line 402
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_statistiques");
        yield "\"
           class=\"nav-item ";
        // line 403
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 403, $this->source); })()), "request", [], "any", false, false, false, 403), "get", ["_route"], "method", false, false, false, 403) == "admin_statistiques")) ? ("active") : (""));
        yield "\">
            <i class=\"ri-bar-chart-2-line\"></i> Statistiques
        </a>

        <a href=\"";
        // line 407
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("easyadmin");
        yield "\"
           class=\"nav-item ";
        // line 408
        yield (((is_string($_v10 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 408, $this->source); })()), "request", [], "any", false, false, false, 408), "get", ["_route"], "method", false, false, false, 408)) && is_string($_v11 = "easyadmin") && str_starts_with($_v10, $_v11))) ? ("active") : (""));
        yield "\">
            <i class=\"ri-layout-grid-line\"></i> EasyAdmin
        </a>

        <div class=\"nav-divider\"></div>
        <div class=\"nav-section-label\">Autres modules</div>

        <a href=\"#\" class=\"nav-item\"><i class=\"ri-vip-crown-2-line\"></i> Abonnements</a>
        <a href=\"#\" class=\"nav-item\"><i class=\"ri-money-dollar-circle-line\"></i> Dépenses</a>
        <a href=\"#\" class=\"nav-item\"><i class=\"ri-team-line\"></i> Utilisateurs</a>

        <div class=\"nav-divider\"></div>

        <a href=\"";
        // line 421
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"nav-item\">
            <i class=\"ri-global-line\"></i> Voir le site
        </a>
    </nav>

    <div class=\"sidebar-footer\">
        <div class=\"status-card\">
            <div class=\"status-label\">État du système</div>
            <div class=\"status-row\">
                <div class=\"status-dot-row\">
                    <div class=\"status-dot\"></div>
                    <span class=\"status-text\">Opérationnel</span>
                </div>
                <span class=\"status-version\">v2.4</span>
            </div>
        </div>
    </div>
</aside>

";
        // line 441
        yield "<header class=\"topbar\">
    <div style=\"display:flex;flex-direction:column;gap:1px;\">
        <div style=\"font-size:15px;font-weight:700;color:#0F172A;\">";
        // line 443
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</div>
        <div style=\"font-size:11px;color:var(--muted2);font-weight:500;\">";
        // line 444
        yield from $this->unwrap()->yieldBlock('section_title', $context, $blocks);
        yield "</div>
    </div>
    <div class=\"topbar-right\">
        <div class=\"topbar-icon-btn\" title=\"Notifications\">
            <i class=\"ri-notification-3-line\"></i>
            <span class=\"notif-pip\"></span>
        </div>
        <div class=\"topbar-sep\"></div>
        <div class=\"topbar-user\">
            <div class=\"user-avatar\">AD</div>
            <div class=\"user-info\">
                <div class=\"user-name\">Admin</div>
                <div class=\"user-role\">Administrateur</div>
            </div>
            <i class=\"ri-arrow-down-s-line topbar-caret\"></i>
        </div>
    </div>
</header>

";
        // line 463
        yield from $this->unwrap()->yieldBlock('search', $context, $blocks);
        // line 464
        yield "
";
        // line 466
        yield "<div class=\"admin-wrapper\">
    <div class=\"admin-content\">

        ";
        // line 469
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 469, $this->source); })()), "flashes", [], "any", false, false, false, 469));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 470
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 471
                yield "                <div class=\"alert-dinari ";
                yield ((($context["type"] == "success")) ? ("alert-success-d") : ("alert-danger-d"));
                yield "\">
                    <i class=\"ri-";
                // line 472
                yield ((($context["type"] == "success")) ? ("checkbox-circle-line") : ("error-warning-line"));
                yield "\"></i>
                    ";
                // line 473
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 476
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['type'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 477
        yield "
        ";
        // line 478
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 479
        yield "
    </div>

    <footer class=\"admin-footer\">
        <span class=\"footer-copy\">
            &copy; ";
        // line 484
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " <strong>Dinari</strong> — Panneau d'administration
        </span>
        <a href=\"";
        // line 486
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"footer-link\">
            <i class=\"ri-arrow-left-line\"></i> Retour au site public
        </a>
    </footer>
</div>

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
<script src=\"";
        // line 493
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/vendor/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
";
        // line 494
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 495
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

    // line 361
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

    // line 443
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 444
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

    // line 463
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_search(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "search"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "search"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 478
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

    // line 494
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
        return array (  802 => 494,  780 => 478,  758 => 463,  736 => 444,  714 => 443,  692 => 361,  669 => 6,  656 => 495,  654 => 494,  650 => 493,  640 => 486,  635 => 484,  628 => 479,  626 => 478,  623 => 477,  617 => 476,  608 => 473,  604 => 472,  599 => 471,  594 => 470,  590 => 469,  585 => 466,  582 => 464,  580 => 463,  558 => 444,  554 => 443,  550 => 441,  528 => 421,  512 => 408,  508 => 407,  501 => 403,  497 => 402,  490 => 398,  486 => 397,  479 => 393,  475 => 392,  468 => 388,  464 => 387,  454 => 380,  450 => 379,  436 => 368,  433 => 367,  425 => 362,  423 => 361,  66 => 7,  62 => 6,  55 => 1,);
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
    <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        :root {
            --sidebar-w: 248px;
            --topbar-h:  62px;
            --navy:    #0B1D35;
            --navy2:   #0F2544;
            --blue:    #2563EB;
            --blue2:   #1D4ED8;
            --accent:  #3B82F6;
            --indigo:  #4F46E5;
            --surface: #F8FAFC;
            --white:   #FFFFFF;
            --border:  #E2E8F0;
            --text:    #0F172A;
            --muted:   #64748B;
            --muted2:  #94A3B8;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--surface);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        /* ════ SIDEBAR ════ */
        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: var(--sidebar-w);
            background: var(--navy);
            display: flex;
            flex-direction: column;
            z-index: 200;
            overflow: hidden;
        }
        .sidebar::before {
            content: '';
            position: absolute;
            top: -60px; left: -60px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Logo */
        .sidebar-logo {
            padding: 22px 20px 18px;
            display: flex; align-items: center; gap: 11px;
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .logo-mark {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 17px; font-weight: 800; color: #fff;
            font-style: italic; letter-spacing: -1px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(37,99,235,0.4);
        }
        .logo-text .name { color: #fff; font-size: 16px; font-weight: 700; letter-spacing: -0.3px; }
        .logo-text .sub  {
            color: rgba(148,163,184,0.8);
            font-size: 9px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1.5px;
            margin-top: 2px; display: block;
        }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 14px 12px;
            overflow-y: auto;
            scrollbar-width: none;
        }
        .sidebar-nav::-webkit-scrollbar { display: none; }
        .nav-section-label {
            font-size: 9px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1.8px;
            color: rgba(100,116,139,0.7);
            padding: 10px 10px 6px;
            margin-top: 4px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 12px;
            color: rgba(148,163,184,0.85);
            font-size: 13px; font-weight: 500;
            text-decoration: none;
            border-radius: 9px;
            transition: all 0.18s ease;
            margin-bottom: 1px;
            position: relative;
            white-space: nowrap;
        }
        .nav-item i { font-size: 17px; width: 20px; text-align: center; flex-shrink: 0; }
        .nav-item:hover { color: #fff; background: rgba(255,255,255,0.06); }
        .nav-item.active { color: #fff; background: rgba(37,99,235,0.2); font-weight: 600; }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 6px; bottom: 6px;
            width: 3px;
            background: var(--accent);
            border-radius: 0 3px 3px 0;
        }
        .nav-item.active i { color: var(--accent); }
        .nav-badge {
            margin-left: auto;
            background: rgba(37,99,235,0.25); color: #93C5FD;
            font-size: 10px; font-weight: 700;
            padding: 1px 7px; border-radius: 20px;
        }
        .nav-divider { height: 1px; background: rgba(255,255,255,0.05); margin: 8px 10px; }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .status-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 10px;
            padding: 10px 13px;
        }
        .status-label {
            font-size: 8.5px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1.4px;
            color: rgba(100,116,139,0.7); margin-bottom: 7px;
        }
        .status-row { display: flex; align-items: center; justify-content: space-between; }
        .status-dot-row { display: flex; align-items: center; gap: 7px; }
        .status-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: #34D399;
            box-shadow: 0 0 0 3px rgba(52,211,153,0.2);
            animation: dotpulse 2s ease-in-out infinite;
        }
        @keyframes dotpulse {
            0%,100%{ box-shadow: 0 0 0 3px rgba(52,211,153,0.2); }
            50%    { box-shadow: 0 0 0 5px rgba(52,211,153,0.1); }
        }
        .status-text    { font-size: 11px; color: #94A3B8; font-weight: 500; }
        .status-version { font-size: 9px; color: rgba(100,116,139,0.6); font-weight: 600; letter-spacing: 0.5px; }

        /* ════ TOPBAR ════ */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--topbar-h);
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 28px;
            gap: 16px;
            z-index: 100;
        }
        .topbar-right { display: flex; align-items: center; gap: 6px; margin-left: auto; }
        .topbar-icon-btn {
            width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 9px;
            border: 1px solid var(--border);
            background: #fff; color: var(--muted);
            cursor: pointer; font-size: 17px;
            transition: all 0.15s;
            position: relative; text-decoration: none;
        }
        .topbar-icon-btn:hover { background: #F8FAFC; color: var(--text); border-color: #CBD5E1; }
        .notif-pip {
            position: absolute; top: 6px; right: 6px;
            width: 7px; height: 7px; border-radius: 50%;
            background: #EF4444; border: 1.5px solid #fff;
        }
        .topbar-sep { width: 1px; height: 28px; background: var(--border); margin: 0 6px; }
        .topbar-user {
            display: flex; align-items: center; gap: 9px;
            padding: 5px 10px 5px 6px;
            border-radius: 10px; cursor: pointer;
            transition: background 0.15s;
        }
        .topbar-user:hover { background: #F1F5F9; }
        .user-avatar {
            width: 32px; height: 32px; border-radius: 9px;
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 12px; font-weight: 700; flex-shrink: 0;
        }
        .user-info .user-name { font-size: 13px; font-weight: 700; color: var(--text); line-height: 1.2; }
        .user-info .user-role { font-size: 10px; color: var(--muted2); font-weight: 500; }
        .topbar-caret { color: var(--muted2); font-size: 16px; }

        /* ════ MAIN WRAPPER ════ */
        .admin-wrapper {
            margin-left: var(--sidebar-w);
            padding-top: var(--topbar-h);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-w));
        }
        .admin-content { flex: 1; padding: 28px 32px 60px; }

        /* ════ ALERTS ════ */
        .alert-dinari {
            padding: 12px 16px; border-radius: 10px; margin-bottom: 16px;
            font-size: 13px; display: flex; align-items: center; gap: 9px; font-weight: 500;
        }
        .alert-dinari i { font-size: 17px; }
        .alert-success-d { background: rgba(16,185,129,0.08); color: #065F46; border: 1px solid rgba(16,185,129,0.2); }
        .alert-danger-d  { background: rgba(239,68,68,0.08);  color: #991B1B; border: 1px solid rgba(239,68,68,0.2); }

        /* ════ SHARED COMPONENTS ════ */
        .btn-d {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px; border-radius: 9px;
            font-size: 13px; font-weight: 600;
            text-decoration: none; cursor: pointer;
            transition: all 0.18s; border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            white-space: nowrap;
        }
        .btn-d i { font-size: 16px; }
        .btn-primary   { background: linear-gradient(135deg, var(--blue) 0%, var(--indigo) 100%); color: #fff; box-shadow: 0 4px 14px rgba(37,99,235,0.3); }
        .btn-primary:hover   { transform: translateY(-1px); color: #fff; box-shadow: 0 6px 18px rgba(37,99,235,0.38); }
        .btn-secondary { background: #fff; color: var(--muted); border: 1px solid var(--border); }
        .btn-secondary:hover { background: #F8FAFC; color: var(--text); }
        .btn-outline   { background: #fff; color: var(--blue); border: 1.5px solid var(--blue); }
        .btn-outline:hover   { background: var(--blue); color: #fff; }
        .btn-ghost     { background: rgba(79,70,229,0.08); color: var(--indigo); border: 1.5px solid rgba(79,70,229,0.2); }
        .btn-ghost:hover     { background: var(--indigo); color: #fff; border-color: var(--indigo); }
        .btn-warning-d { background: #F59E0B; color: #fff; }
        .btn-warning-d:hover { background: #D97706; color: #fff; }

        /* Keep legacy aliases used in dashboard */
        .btn-dinari       { display: inline-flex; align-items: center; gap: 7px; padding: 9px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.18s; border: none; font-family: 'Plus Jakarta Sans', sans-serif; white-space: nowrap; }
        .btn-dinari i     { font-size: 16px; }
        .btn-primary-d    { background: linear-gradient(135deg, var(--blue) 0%, var(--indigo) 100%); color: #fff; box-shadow: 0 4px 14px rgba(37,99,235,0.3); }
        .btn-primary-d:hover    { transform: translateY(-1px); color: #fff; }
        .btn-secondary-d  { background: #fff; color: var(--muted); border: 1px solid var(--border); }
        .btn-secondary-d:hover  { background: #F8FAFC; color: var(--text); }
        .btn-sm-d         { padding: 6px 12px; font-size: 12px; }
        .btn-sm-d i       { font-size: 14px; }

        .badge-d { display: inline-flex; align-items: center; gap: 4px; padding: 3px 9px; border-radius: 20px; font-size: 10px; font-weight: 700; letter-spacing: 0.3px; }
        .b-success { background: rgba(16,185,129,0.1); color: #065F46; }
        .b-danger  { background: rgba(239,68,68,0.1);  color: #991B1B; }
        .b-info    { background: rgba(37,99,235,0.1);  color: #1E40AF; }
        .b-warning { background: rgba(245,158,11,0.1); color: #92400E; }
        .b-gray    { background: #F1F5F9; color: #475569; }

        /* Legacy badge aliases */
        .badge-dinari  { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; letter-spacing: 0.5px; }
        .badge-success { background: rgba(16,185,129,0.1); color: #065F46; }
        .badge-danger  { background: rgba(239,68,68,0.1);  color: #991B1B; }
        .badge-info    { background: rgba(37,99,235,0.1);  color: #1E40AF; }
        .badge-warning { background: rgba(245,158,11,0.1); color: #92400E; }

        /* Stats grid (used in dashboard) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }
        @media (max-width: 900px) { .stats-grid { grid-template-columns: repeat(2,1fr); } }
        .stat-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 20px 22px;
            display: flex; align-items: center; gap: 16px;
            transition: all 0.25s;
        }
        .stat-card:hover { box-shadow: 0 6px 24px rgba(37,99,235,0.1); transform: translateY(-3px); }
        .stat-icon {
            width: 52px; height: 52px; border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }
        .stat-value { font-size: 26px; font-weight: 800; color: var(--text); line-height: 1; }
        .stat-label { font-size: 12px; color: var(--muted); margin-top: 5px; font-weight: 500; }

        /* Card */
        .card-dinari {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            transition: box-shadow 0.2s;
        }
        .card-dinari:hover { box-shadow: 0 4px 20px rgba(37,99,235,0.07); }
        .card-dinari .card-header-dinari {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 20px; padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .card-dinari .card-title { font-size: 16px; font-weight: 700; color: var(--text); }

        /* Table */
        .table-dinari { width: 100%; border-collapse: collapse; font-size: 14px; }
        .table-dinari thead th {
            background: #F8FAFC; padding: 13px 16px;
            font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
            color: var(--muted); border-bottom: 1px solid var(--border); white-space: nowrap;
        }
        .table-dinari tbody td { padding: 15px 16px; border-bottom: 1px solid #F1F5F9; color: var(--text); vertical-align: middle; }
        .table-dinari tbody tr:hover { background: #FAFBFF; }
        .table-dinari tbody tr:last-child td { border-bottom: none; }

        /* Form */
        .form-group-d { margin-bottom: 18px; }
        .form-group-d label { display: block; font-size: 13px; font-weight: 600; color: var(--text); margin-bottom: 6px; }
        .form-group-d .form-control {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: 9px;
            font-size: 14px; font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text); transition: border-color 0.2s; background: #fff;
        }
        .form-group-d .form-control:focus { outline: none; border-color: var(--blue); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }

        /* Page header */
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; }
        .page-header h1 { font-size: 22px; font-weight: 800; color: var(--text); margin-bottom: 4px; }
        .page-header .breadcrumb-d { font-size: 13px; color: var(--muted); }
        .page-header .breadcrumb-d a { color: var(--blue); text-decoration: none; }

        /* Footer */
        .admin-footer {
            background: #fff;
            border-top: 1px solid var(--border);
            padding: 14px 32px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .footer-copy { font-size: 12px; color: var(--muted2); }
        .footer-copy strong { color: var(--blue); }
        .footer-link { font-size: 12px; color: var(--blue); text-decoration: none; display: flex; align-items: center; gap: 5px; }
        .footer-link:hover { text-decoration: underline; }
    </style>
    {% block stylesheets %}{% endblock %}
    {{ importmap('app') }}
</head>
<body>

{# ═══ SIDEBAR ═══ #}
<aside class=\"sidebar\">
    <a href=\"{{ path('app_home') }}\" class=\"sidebar-logo\">
        <div class=\"logo-mark\">D</div>
        <div class=\"logo-text\">
            <span class=\"name\">Dinari</span>
            <span class=\"sub\">Panneau Admin</span>
        </div>
    </a>

    <nav class=\"sidebar-nav\">
        <div class=\"nav-section-label\">Tableau de bord</div>

        <a href=\"{{ path('admin_dashboard') }}\"
           class=\"nav-item {{ app.request.get('_route') starts with 'admin_dashboard' ? 'active' : '' }}\">
            <i class=\"ri-dashboard-line\"></i> Dashboard
        </a>

        <div class=\"nav-divider\"></div>
        <div class=\"nav-section-label\">Gestion</div>

        <a href=\"{{ path('admin_cours_index') }}\"
           class=\"nav-item {{ app.request.get('_route') starts with 'admin_cours' or app.request.get('_route') starts with 'admin_chapitre' ? 'active' : '' }}\">
            <i class=\"ri-book-open-line\"></i> Cours &amp; Chapitres
        </a>

        <a href=\"{{ path('admin_quiz_index') }}\"
           class=\"nav-item {{ app.request.get('_route') starts with 'admin_quiz' ? 'active' : '' }}\">
            <i class=\"ri-question-answer-line\"></i> Quiz
        </a>

        <a href=\"{{ path('admin_commentaire_index') }}\"
           class=\"nav-item {{ app.request.get('_route') starts with 'admin_commentaire' ? 'active' : '' }}\">
            <i class=\"ri-chat-3-line\"></i> Commentaires
        </a>

        <a href=\"{{ path('admin_statistiques') }}\"
           class=\"nav-item {{ app.request.get('_route') == 'admin_statistiques' ? 'active' : '' }}\">
            <i class=\"ri-bar-chart-2-line\"></i> Statistiques
        </a>

        <a href=\"{{ path('easyadmin') }}\"
           class=\"nav-item {{ app.request.get('_route') starts with 'easyadmin' ? 'active' : '' }}\">
            <i class=\"ri-layout-grid-line\"></i> EasyAdmin
        </a>

        <div class=\"nav-divider\"></div>
        <div class=\"nav-section-label\">Autres modules</div>

        <a href=\"#\" class=\"nav-item\"><i class=\"ri-vip-crown-2-line\"></i> Abonnements</a>
        <a href=\"#\" class=\"nav-item\"><i class=\"ri-money-dollar-circle-line\"></i> Dépenses</a>
        <a href=\"#\" class=\"nav-item\"><i class=\"ri-team-line\"></i> Utilisateurs</a>

        <div class=\"nav-divider\"></div>

        <a href=\"{{ path('app_home') }}\" class=\"nav-item\">
            <i class=\"ri-global-line\"></i> Voir le site
        </a>
    </nav>

    <div class=\"sidebar-footer\">
        <div class=\"status-card\">
            <div class=\"status-label\">État du système</div>
            <div class=\"status-row\">
                <div class=\"status-dot-row\">
                    <div class=\"status-dot\"></div>
                    <span class=\"status-text\">Opérationnel</span>
                </div>
                <span class=\"status-version\">v2.4</span>
            </div>
        </div>
    </div>
</aside>

{# ═══ TOPBAR ═══ #}
<header class=\"topbar\">
    <div style=\"display:flex;flex-direction:column;gap:1px;\">
        <div style=\"font-size:15px;font-weight:700;color:#0F172A;\">{% block page_title %}{% endblock %}</div>
        <div style=\"font-size:11px;color:var(--muted2);font-weight:500;\">{% block section_title %}{% endblock %}</div>
    </div>
    <div class=\"topbar-right\">
        <div class=\"topbar-icon-btn\" title=\"Notifications\">
            <i class=\"ri-notification-3-line\"></i>
            <span class=\"notif-pip\"></span>
        </div>
        <div class=\"topbar-sep\"></div>
        <div class=\"topbar-user\">
            <div class=\"user-avatar\">AD</div>
            <div class=\"user-info\">
                <div class=\"user-name\">Admin</div>
                <div class=\"user-role\">Administrateur</div>
            </div>
            <i class=\"ri-arrow-down-s-line topbar-caret\"></i>
        </div>
    </div>
</header>

{% block search %}{% endblock %}

{# ═══ MAIN ═══ #}
<div class=\"admin-wrapper\">
    <div class=\"admin-content\">

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
        <span class=\"footer-copy\">
            &copy; {{ \"now\"|date(\"Y\") }} <strong>Dinari</strong> — Panneau d'administration
        </span>
        <a href=\"{{ path('app_home') }}\" class=\"footer-link\">
            <i class=\"ri-arrow-left-line\"></i> Retour au site public
        </a>
    </footer>
</div>

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
<script src=\"{{ asset('js/vendor/bootstrap.min.js') }}\"></script>
{% block javascripts %}{% endblock %}
</body>
</html>
", "admin/base.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\admin\\base.html.twig");
    }
}
