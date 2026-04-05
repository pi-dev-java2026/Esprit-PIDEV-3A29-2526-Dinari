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

/* client/home/index.html.twig */
class __TwigTemplate_26fd79b28e31d18c41e8ddf1e545072b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/home/index.html.twig"));

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

        yield "Dinari — Gérez vos finances intelligemment";
        
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
        yield "<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root {
--d-blue:   #1a6fc4;
--d-blue2:  #0d4fa0;
--d-green:  #27ae60;
--d-text:   #1e2d40;
--d-muted:  #5a6e84;
--d-border: #dde4ee;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'DM Sans', sans-serif; background: #fff; color: var(--d-text); overflow-x: hidden; }
/* ── HERO ── */
.hero {
position: relative;
min-height: 100vh;
display: flex;
align-items: center;
overflow: hidden;
}
.hero-bg {
position: absolute; inset: 0; z-index: 0;
background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80');
background-size: cover;
background-position: center;
}
.hero-overlay {
position: absolute; inset: 0; z-index: 1;
background: rgba(8, 18, 38, 0.62);
}
.hero-content {
position: relative; z-index: 2;
max-width: 1100px; margin: 0 auto;
padding: 0 60px;
width: 100%;
}
.hero-line {
width: 48px; height: 3px;
background: var(--d-blue);
margin-bottom: 28px;
}
.hero-title {
font-family: 'Syne', sans-serif;
font-size: clamp(36px, 5vw, 64px);
font-weight: 700;
color: #fff;
line-height: 1.15;
letter-spacing: -1px;
margin-bottom: 20px;
max-width: 600px;
}
.hero-desc {
font-size: 17px;
color: rgba(255,255,255,0.70);
line-height: 1.75;
max-width: 460px;
margin-bottom: 36px;
}
.hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-hero-primary {
display: inline-flex; align-items: center; gap: 8px;
padding: 14px 32px;
background: var(--d-blue); color: #fff !important;
border-radius: 4px; font-weight: 600; font-size: 15px;
text-decoration: none !important; transition: background 0.25s, transform 0.25s;
font-family: 'DM Sans', sans-serif;
border: none; cursor: pointer;
}
.btn-hero-primary:hover { background: var(--d-blue2); transform: translateY(-2px); color: #fff !important; }
.btn-hero-secondary {
display: inline-flex; align-items: center; gap: 8px;
padding: 14px 28px;
border: 1.5px solid rgba(255,255,255,0.4); color: #fff !important;
border-radius: 4px; font-weight: 500; font-size: 15px;
text-decoration: none !important; transition: all 0.25s;
font-family: 'DM Sans', sans-serif;
background: transparent;
}
.btn-hero-secondary:hover { border-color: #fff; background: rgba(255,255,255,0.08); color: #fff !important; }
/* ── SECTIONS ── */
.section { padding: 90px 0; }
.section-white { background: #fff; }
.section-gray  { background: #f5f7fa; }
.container-d   { max-width: 1100px; margin: 0 auto; padding: 0 60px; }
.section-tag   { display: inline-block; font-size: 11px; font-weight: 700; color: var(--d-blue); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 12px; }
.section-title { font-family: 'Syne', sans-serif; font-size: clamp(26px, 3vw, 38px); font-weight: 700; color: var(--d-text); margin-bottom: 12px; line-height: 1.2; }
.section-title .accent { color: var(--d-blue); }
.section-sub   { font-size: 15px; color: var(--d-muted); max-width: 460px; line-height: 1.75; }
.section-head  { margin-bottom: 50px; }
.section-head.center { text-align: center; }
.section-head.center .section-sub { margin: 0 auto; }
.reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: translateY(0); }
/* NAVBAR */
#header { background: #fff !important; border-bottom: 1px solid var(--d-border) !important; box-shadow: none !important; }
#primary-nav ul li a { color: var(--d-text) !important; }
#primary-nav ul li a:hover { color: var(--d-blue) !important; }
.nav-btn { background: var(--d-blue) !important; }
.nav-btn:hover { background: var(--d-blue2) !important; }
.logo-icon-block { background: var(--d-blue) !important; }
.logo-text-part { color: var(--d-text) !important; }
/* TRUST STRIP */
.trust-strip { background: #f5f7fa; border-top: 1px solid var(--d-border); border-bottom: 1px solid var(--d-border); padding: 22px 0; }
.trust-inner { max-width: 1100px; margin: 0 auto; padding: 0 60px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; }
.trust-label  { font-size: 11px; color: var(--d-muted); letter-spacing: 2px; text-transform: uppercase; }
.trust-logos  { display: flex; align-items: center; gap: 36px; flex-wrap: wrap; }
.trust-logo   { font-family: 'Syne', sans-serif; font-size: 14px; font-weight: 700; color: #c0cad8; transition: color 0.3s; cursor: default; }
.trust-logo:hover { color: #8a9ab0; }
/* FEATURES */
.features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
@media(max-width:900px){ .features-grid { grid-template-columns: 1fr; } }
.feat-card {
background: #fff; border: 1px solid var(--d-border);
border-radius: 8px; padding: 32px 24px;
transition: box-shadow 0.3s, transform 0.3s;
}
.feat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(26,111,196,0.10); border-color: rgba(26,111,196,0.2); }
.feat-num  { font-family: 'Syne', sans-serif; font-size: 40px; font-weight: 800; color: rgba(26,111,196,0.18); line-height: 1; margin-bottom: 14px; }
.feat-card h4 { font-family: 'Syne', sans-serif; font-size: 16px; font-weight: 700; color: var(--d-text); margin-bottom: 8px; }
.feat-card p  { font-size: 14px; color: var(--d-muted); line-height: 1.7; }
/* STATS */
.stats-bar { background: var(--d-blue); padding: 50px 0; }
.stats-bar-grid { max-width: 1100px; margin: 0 auto; padding: 0 60px; display: grid; grid-template-columns: repeat(3,1fr); }
.stat-item { text-align: center; padding: 10px 20px; border-right: 1px solid rgba(255,255,255,0.15); }
.stat-item:last-child { border-right: none; }
.stat-item h2 { font-family: 'Syne', sans-serif; font-size: 42px; font-weight: 800; color: #fff; margin-bottom: 6px; }
.stat-item p  { font-size: 11px; color: rgba(255,255,255,0.6); letter-spacing: 2px; text-transform: uppercase; }
@media(max-width:768px){ .stats-bar-grid { grid-template-columns: 1fr; } .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.15); padding: 16px; } }
/* COURS */
.cours-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
@media(max-width:900px){ .cours-grid { grid-template-columns: 1fr; } }
.cours-card {
background: #fff; border: 1px solid var(--d-border);
border-radius: 8px; padding: 28px 22px;
transition: box-shadow 0.3s, transform 0.3s;
}
.cours-card:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(26,111,196,0.10); border-color: rgba(26,111,196,0.2); }
.cours-level { display: inline-block; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: var(--d-green); background: rgba(39,174,96,0.08); border: 1px solid rgba(39,174,96,0.2); border-radius: 3px; padding: 3px 10px; margin-bottom: 14px; }
.cours-card h4 { font-family: 'Syne', sans-serif; font-size: 16px; font-weight: 700; color: var(--d-text); margin-bottom: 8px; }
.cours-card p  { font-size: 14px; color: var(--d-muted); line-height: 1.7; margin-bottom: 16px; }
.cours-link    { font-size: 13px; font-weight: 700; color: var(--d-blue); text-decoration: none; }
.cours-link:hover { text-decoration: underline; }
/* TESTIMONIALS */
.testi-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
@media(max-width:900px){ .testi-grid { grid-template-columns: 1fr; } }
.testi-card {
background: #fff; border: 1px solid var(--d-border);
border-radius: 8px; padding: 28px;
transition: box-shadow 0.3s, transform 0.3s;
}
.testi-card:hover { transform: translateY(-3px); box-shadow: 0 12px 36px rgba(26,111,196,0.08); }
.testi-stars  { color: #f39c12; font-size: 13px; letter-spacing: 2px; margin-bottom: 12px; }
.testi-text   { font-size: 14px; color: var(--d-muted); font-style: italic; line-height: 1.75; margin-bottom: 20px; }
.testi-author { display: flex; align-items: center; gap: 10px; }
.testi-avatar { width: 38px; height: 38px; border-radius: 50%; background: var(--d-blue); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #fff; font-size: 13px; flex-shrink: 0; font-family: 'Syne', sans-serif; }
.testi-name   { font-weight: 700; font-size: 13px; color: var(--d-text); }
.testi-role   { font-size: 11px; color: var(--d-muted); text-transform: uppercase; letter-spacing: 1px; margin-top: 2px; }
/* CTA */
.cta-section { background: var(--d-blue); padding: 90px 0; text-align: center; }
.cta-section .section-title { color: #fff; }
.cta-section .section-sub   { color: rgba(255,255,255,0.65); margin: 0 auto 36px; }
.cta-section .section-tag   { color: rgba(255,255,255,0.7); }
.cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.btn-white   { display: inline-flex; align-items: center; gap: 8px; padding: 14px 32px; background: #fff; color: var(--d-blue); border-radius: 4px; font-weight: 700; font-size: 15px; text-decoration: none; transition: all 0.25s; font-family: 'DM Sans', sans-serif; }
.btn-white:hover { background: #f0f6ff; color: var(--d-blue); transform: translateY(-2px); text-decoration: none; }
.btn-outline { display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; border: 1.5px solid rgba(255,255,255,0.4); color: #fff; border-radius: 4px; font-weight: 500; font-size: 15px; text-decoration: none; transition: all 0.25s; font-family: 'DM Sans', sans-serif; }
.btn-outline:hover { border-color: #fff; background: rgba(255,255,255,0.08); color: #fff; text-decoration: none; }
/* FOOTER */
footer { background: #1e2d40 !important; }
.footer-logo-icon { background: var(--d-blue) !important; }
/* AUTH MODAL */
.modal-overlay {
position: fixed; inset: 0; z-index: 9999;
background: rgba(10,20,40,0.6);
backdrop-filter: blur(4px);
display: flex; align-items: center; justify-content: center;
opacity: 0; pointer-events: none; transition: opacity 0.3s; padding: 20px;
}
.modal-overlay.open { opacity: 1; pointer-events: auto; }
.auth-modal {
background: #fff; border-radius: 12px;
width: 100%; max-width: 420px;
box-shadow: 0 20px 60px rgba(0,0,0,0.2);
overflow: hidden; position: relative;
transform: translateY(20px) scale(0.98);
transition: transform 0.3s ease;
}
.modal-overlay.open .auth-modal { transform: translateY(0) scale(1); }
.auth-tabs { display: flex; border-bottom: 1px solid var(--d-border); }
.auth-tab {
flex: 1; padding: 16px; text-align: center;
font-family: 'Syne', sans-serif; font-weight: 700; font-size: 14px;
color: var(--d-muted); cursor: pointer;
border-bottom: 2px solid transparent; margin-bottom: -1px;
transition: all 0.2s; background: none; border-top: none; border-left: none; border-right: none;
}
.auth-tab.active { color: var(--d-blue); border-bottom-color: var(--d-blue); }
.auth-tab:hover:not(.active) { color: var(--d-text); }
.auth-body  { padding: 32px 28px 28px; }
.auth-panel { display: none; }
.auth-panel.active { display: block; }
.auth-logo       { text-align: center; margin-bottom: 22px; }
.auth-logo-icon  { width: 46px; height: 46px; background: var(--d-blue); border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; }
.auth-logo-icon span { font-family: 'Syne', sans-serif; font-size: 22px; font-weight: 800; color: #fff; font-style: italic; }
.auth-logo-name  { font-family: 'Syne', sans-serif; font-size: 18px; font-weight: 700; color: var(--d-text); margin-top: 10px; }
.auth-logo-sub   { font-size: 13px; color: var(--d-muted); margin-top: 3px; }
.form-group      { margin-bottom: 16px; }
.form-group label { display: block; font-size: 13px; font-weight: 600; color: var(--d-text); margin-bottom: 5px; }
.form-group input {
width: 100%; padding: 11px 14px 11px 40px;
border: 1.5px solid var(--d-border); border-radius: 6px;
font-size: 14px; font-family: 'DM Sans', sans-serif; color: var(--d-text);
outline: none; transition: border-color 0.2s; background: #fff;
}
.form-group input:focus { border-color: var(--d-blue); }
.form-group input::placeholder { color: #b0bec5; }
.input-wrap   { position: relative; }
.input-wrap i { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #b0bec5; font-size: 13px; }
.btn-auth {
width: 100%; padding: 13px; background: var(--d-blue); color: #fff;
border: none; border-radius: 6px;
font-family: 'Syne', sans-serif; font-weight: 700; font-size: 15px;
cursor: pointer; transition: background 0.25s; margin-top: 6px;
}
.btn-auth:hover { background: var(--d-blue2); }
.auth-forgot  { text-align: right; margin-top: -10px; margin-bottom: 16px; }
.auth-forgot a { font-size: 12px; color: var(--d-blue); text-decoration: none; }
.auth-switch  { text-align: center; margin-top: 16px; font-size: 13px; color: var(--d-muted); }
.auth-switch a { color: var(--d-blue); font-weight: 700; text-decoration: none; cursor: pointer; }
.modal-close  { position: absolute; top: 12px; right: 14px; background: none; border: none; cursor: pointer; font-size: 17px; color: var(--d-muted); transition: color 0.2s; z-index: 10; }
.modal-close:hover { color: var(--d-text); }
.pwd-strength { display: flex; gap: 4px; margin-top: 5px; }
.pwd-bar      { flex: 1; height: 3px; border-radius: 2px; background: #e9ecef; transition: background 0.3s; }
@media(max-width:768px){
.hero-content { padding: 0 24px; }
.container-d  { padding: 0 24px; }
.trust-inner  { padding: 0 24px; }
.stats-bar-grid { padding: 0 24px; }
.auth-body    { padding: 24px 18px 20px; }
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 250
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

        // line 251
        yield "
";
        // line 253
        yield "<div class=\"modal-overlay\" id=\"auth-modal\">
<div class=\"auth-modal\">
<button class=\"modal-close\" onclick=\"closeAuth()\"><i class=\"fa fa-times\"></i></button>
<div class=\"auth-tabs\">
<button class=\"auth-tab active\" id=\"tab-login\"    onclick=\"switchTab('login')\">Connexion</button>
<button class=\"auth-tab\"        id=\"tab-register\" onclick=\"switchTab('register')\">Inscription</button>
</div>
<div class=\"auth-body\">
<div class=\"auth-panel active\" id=\"panel-login\">
<div class=\"auth-logo\">
<div class=\"auth-logo-icon\"><span>D</span></div>
<div class=\"auth-logo-name\">Bon retour !</div>
<div class=\"auth-logo-sub\">Connectez-vous à votre compte Dinari</div>
</div>
<form action=\"#\" method=\"post\" novalidate>
<div class=\"form-group\"><label>Adresse email</label><div class=\"input-wrap\"><i class=\"fa fa-envelope\"></i><input type=\"email\" name=\"email\" placeholder=\"votre@email.com\" required></div></div>
<div class=\"form-group\"><label>Mot de passe</label><div class=\"input-wrap\"><i class=\"fa fa-lock\"></i><input type=\"password\" name=\"password\" placeholder=\"••••••••\" required></div></div>
<div class=\"auth-forgot\"><a href=\"#\">Mot de passe oublié ?</a></div>
<button type=\"submit\" class=\"btn-auth\">Se connecter</button>
</form>
<div class=\"auth-switch\">Pas encore de compte ? <a onclick=\"switchTab('register')\">Créer un compte gratuit</a></div>
</div>
<div class=\"auth-panel\" id=\"panel-register\">
<div class=\"auth-logo\">
<div class=\"auth-logo-icon\"><span>D</span></div>
<div class=\"auth-logo-name\">Rejoindre Dinari</div>
<div class=\"auth-logo-sub\">Créez votre compte gratuitement</div>
</div>
<form action=\"#\" method=\"post\" novalidate>
<div class=\"form-group\"><label>Nom complet</label><div class=\"input-wrap\"><i class=\"fa fa-user\"></i><input type=\"text\" name=\"nom\" placeholder=\"Votre nom\" required></div></div>
<div class=\"form-group\"><label>Adresse email</label><div class=\"input-wrap\"><i class=\"fa fa-envelope\"></i><input type=\"email\" name=\"email\" placeholder=\"votre@email.com\" required></div></div>
<div class=\"form-group\"><label>Mot de passe</label><div class=\"input-wrap\"><i class=\"fa fa-lock\"></i><input type=\"password\" name=\"password\" id=\"reg-pwd\" placeholder=\"Min. 8 caractères\" required oninput=\"updatePwdStrength(this.value)\"></div><div class=\"pwd-strength\"><div class=\"pwd-bar\" id=\"bar1\"></div><div class=\"pwd-bar\" id=\"bar2\"></div><div class=\"pwd-bar\" id=\"bar3\"></div><div class=\"pwd-bar\" id=\"bar4\"></div></div></div>
<button type=\"submit\" class=\"btn-auth\">Créer mon compte</button>
</form>
<div class=\"auth-switch\">Déjà un compte ? <a onclick=\"switchTab('login')\">Se connecter</a></div>
</div>
</div>
</div>
</div>

";
        // line 294
        yield "<section class=\"hero\" id=\"accueil\">
<div class=\"hero-bg\"></div>
<div class=\"hero-overlay\"></div>
<div class=\"hero-content\">
<div class=\"hero-line\"></div>
<h1 class=\"hero-title\">Gérez vos finances intelligemment</h1>
<p class=\"hero-desc\">Dinari vous aide à maîtriser vos budgets, suivre vos dépenses et apprendre la finance personnelle.</p>
<div class=\"hero-btns\">
<a href=\"#\" class=\"btn-hero-primary\" onclick=\"openAuth('register');return false;\">Commencer gratuitement</a>
<a href=\"#fonctionnalites\" class=\"btn-hero-secondary\">Découvrir</a>
</div>
</div>
</section>

";
        // line 309
        yield "<div class=\"trust-strip\">
<div class=\"trust-inner\">
<span class=\"trust-label\">Ils nous font confiance</span>
<div class=\"trust-logos\">
<span class=\"trust-logo\">FINTECH.TN</span>
<span class=\"trust-logo\">STARTUP.TN</span>
<span class=\"trust-logo\">BIAT</span>
<span class=\"trust-logo\">ATTIJARI</span>
<span class=\"trust-logo\">STB BANK</span>
</div>
</div>
</div>

";
        // line 323
        yield "<section class=\"section section-white\" id=\"fonctionnalites\">
<div class=\"container-d\">
<div class=\"section-head reveal\">
<div class=\"section-tag\">Ce que nous offrons</div>
<h2 class=\"section-title\">Tout pour gérer votre <span class=\"accent\">argent</span></h2>
<p class=\"section-sub\">Des outils simples et puissants pour prendre le contrôle de vos finances.</p>
</div>
<div class=\"features-grid\">
<div class=\"feat-card reveal\"><div class=\"feat-num\">01</div><h4>Gestion des budgets</h4><p>Définissez des budgets par catégorie et gardez le contrôle sur vos dépenses mensuelles.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">02</div><h4>Suivi des dépenses</h4><p>Enregistrez chaque transaction et visualisez vos statistiques en temps réel.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">03</div><h4>Cours & Quiz Fintech</h4><p>Apprenez la finance personnelle avec des cours interactifs adaptés à votre niveau.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">04</div><h4>Abonnements flexibles</h4><p>Choisissez le plan qui vous convient : gratuit, standard ou premium.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">05</div><h4>Alertes intelligentes</h4><p>Recevez des notifications quand vous dépassez un budget fixé.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">06</div><h4>Sécurité garantie</h4><p>Vos données financières sont protégées avec les meilleurs standards SSL.</p></div>
</div>
</div>
</section>

";
        // line 342
        yield "<div class=\"stats-bar\">
<div class=\"stats-bar-grid\">
<div class=\"stat-item reveal\"><h2>5 000+</h2><p>reclamation actifs</p></div>
<div class=\"stat-item reveal\"><h2>98%</h2><p>Satisfaction client</p></div>
<div class=\"stat-item reveal\"><h2>50+</h2><p>Cours disponibles</p></div>
</div>
</div>

";
        // line 351
        yield "<section class=\"section section-gray\" id=\"cours\">
<div class=\"container-d\">
<div class=\"section-head center reveal\">
<div class=\"section-tag\">Apprenez la finance</div>
<h2 class=\"section-title\">Nos cours <span class=\"accent\">Fintech</span></h2>
<p class=\"section-sub\">Des formations conçues pour tous les niveaux.</p>
</div>
<div class=\"cours-grid\">
";
        // line 359
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 359, $this->source); })()))) {
            // line 360
            yield "    <p style=\"color:var(--d-muted);text-align:center;grid-column:1/-1;\">Aucun cours disponible pour l'instant.</p>
";
        } else {
            // line 362
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 362, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cours"]) {
                // line 363
                yield "    <div class=\"cours-card reveal\">
        <div class=\"cours-level\">";
                // line 364
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 364)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "dateCreation", [], "any", false, false, false, 364), "Y"), "html", null, true)) : ("Nouveau"));
                yield "</div>
        <h4>";
                // line 365
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "nomCours", [], "any", false, false, false, 365), "html", null, true);
                yield "</h4>
        <p>";
                // line 366
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", true, true, false, 366)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 366), "")) : ("")), 0, 120), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["cours"], "description", [], "any", false, false, false, 366)) > 120)) {
                    yield "…";
                }
                yield "</p>
        <a href=\"";
                // line 367
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
                yield "\" class=\"cours-link\">Voir le cours →</a>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cours'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 371
        yield "</div>
<div style=\"text-align:center;margin-top:40px;\" class=\"reveal\">
<a href=\"";
        // line 373
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
        yield "\" class=\"btn-hero-primary\">Accéder à tous les cours</a>
</div>
</div>
</section>

";
        // line 379
        yield "<section class=\"section section-white\" id=\"temoignages\">
<div class=\"container-d\">
<div class=\"section-head center reveal\">
<div class=\"section-tag\">Avis clients</div>
<h2 class=\"section-title\">Ils font confiance à <span class=\"accent\">Dinari</span></h2>
<p class=\"section-sub\">Rejoignez des milliers d'utilisateurs qui maîtrisent leurs finances.</p>
</div>
<div class=\"testi-grid\">
<div class=\"testi-card reveal\"><div class=\"testi-stars\">★★★★★</div><p class=\"testi-text\">Dinari a transformé ma façon de gérer mes finances. Les modules éducatifs valent à eux seuls l'abonnement.</p><div class=\"testi-author\"><div class=\"testi-avatar\">MT</div><div><div class=\"testi-name\">Mohamed Trabelsi</div><div class=\"testi-role\">Entrepreneur</div></div></div></div>
<div class=\"testi-card reveal\"><div class=\"testi-stars\">★★★★★</div><p class=\"testi-text\">Le suivi de mes dépenses m'a permis d'économiser plus de 200 DT dès le premier mois.</p><div class=\"testi-author\"><div class=\"testi-avatar\">SB</div><div><div class=\"testi-name\">Sarra Ben Ali</div><div class=\"testi-role\">Directrice créative</div></div></div></div>
<div class=\"testi-card reveal\"><div class=\"testi-stars\">★★★★★</div><p class=\"testi-text\">Simple, rapide et fiable. Dinari raconte l'histoire de votre santé financière de façon claire.</p><div class=\"testi-author\"><div class=\"testi-avatar\">AK</div><div><div class=\"testi-name\">Amine Khelifi</div><div class=\"testi-role\">Architecte logiciel</div></div></div></div>
</div>
</div>
</section>

";
        // line 395
        yield "<section class=\"cta-section\">
<div class=\"container-d\">
<div class=\"reveal\">
<div class=\"section-tag\">Rejoignez-nous</div>
<h2 class=\"section-title\" style=\"margin-top:10px;\">Prêt à maîtriser vos finances ?</h2>
<p class=\"section-sub\">Sans frais cachés, sans engagement.</p>
<div class=\"cta-btns\" style=\"margin-top:32px;\">
<a href=\"#\" class=\"btn-white\" onclick=\"openAuth('register');return false;\">Créer mon compte gratuitement</a>
<a href=\"#\" class=\"btn-outline\" onclick=\"openAuth('login');return false;\">Se connecter</a>
</div>
</div>
</div>
</section>

<script>
const revealEls = document.querySelectorAll('.reveal');
const obs = new IntersectionObserver((entries) => {
entries.forEach((entry, i) => {
if (entry.isIntersecting) setTimeout(() => entry.target.classList.add('visible'), i * 80);
});
}, { threshold: 0.08 });
revealEls.forEach(el => obs.observe(el));

function openAuth(tab) {
document.getElementById('auth-modal').classList.add('open');
document.body.style.overflow = 'hidden';
switchTab(tab || 'login');
}
function closeAuth() {
document.getElementById('auth-modal').classList.remove('open');
document.body.style.overflow = '';
}
function switchTab(tab) {
document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
document.querySelectorAll('.auth-panel').forEach(p => p.classList.remove('active'));
document.getElementById('tab-' + tab).classList.add('active');
document.getElementById('panel-' + tab).classList.add('active');
}
document.getElementById('auth-modal').addEventListener('click', function(e) { if (e.target === this) closeAuth(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAuth(); });
function updatePwdStrength(val) {
const colors = ['#e74c3c','#e67e22','#f1c40f','#27ae60'];
let score = 0;
if (val.length >= 8) score++;
if (/[A-Z]/.test(val)) score++;
if (/[0-9]/.test(val)) score++;
if (/[^A-Za-z0-9]/.test(val)) score++;
['bar1','bar2','bar3','bar4'].forEach((id, i) => {
document.getElementById(id).style.background = i < score ? colors[score-1] : '#e9ecef';
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
        return "client/home/index.html.twig";
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
        return array (  551 => 395,  534 => 379,  526 => 373,  522 => 371,  512 => 367,  505 => 366,  501 => 365,  497 => 364,  494 => 363,  489 => 362,  485 => 360,  483 => 359,  473 => 351,  463 => 342,  443 => 323,  428 => 309,  412 => 294,  370 => 253,  367 => 251,  354 => 250,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Dinari — Gérez vos finances intelligemment{% endblock %}

{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root {
--d-blue:   #1a6fc4;
--d-blue2:  #0d4fa0;
--d-green:  #27ae60;
--d-text:   #1e2d40;
--d-muted:  #5a6e84;
--d-border: #dde4ee;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'DM Sans', sans-serif; background: #fff; color: var(--d-text); overflow-x: hidden; }
/* ── HERO ── */
.hero {
position: relative;
min-height: 100vh;
display: flex;
align-items: center;
overflow: hidden;
}
.hero-bg {
position: absolute; inset: 0; z-index: 0;
background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80');
background-size: cover;
background-position: center;
}
.hero-overlay {
position: absolute; inset: 0; z-index: 1;
background: rgba(8, 18, 38, 0.62);
}
.hero-content {
position: relative; z-index: 2;
max-width: 1100px; margin: 0 auto;
padding: 0 60px;
width: 100%;
}
.hero-line {
width: 48px; height: 3px;
background: var(--d-blue);
margin-bottom: 28px;
}
.hero-title {
font-family: 'Syne', sans-serif;
font-size: clamp(36px, 5vw, 64px);
font-weight: 700;
color: #fff;
line-height: 1.15;
letter-spacing: -1px;
margin-bottom: 20px;
max-width: 600px;
}
.hero-desc {
font-size: 17px;
color: rgba(255,255,255,0.70);
line-height: 1.75;
max-width: 460px;
margin-bottom: 36px;
}
.hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-hero-primary {
display: inline-flex; align-items: center; gap: 8px;
padding: 14px 32px;
background: var(--d-blue); color: #fff !important;
border-radius: 4px; font-weight: 600; font-size: 15px;
text-decoration: none !important; transition: background 0.25s, transform 0.25s;
font-family: 'DM Sans', sans-serif;
border: none; cursor: pointer;
}
.btn-hero-primary:hover { background: var(--d-blue2); transform: translateY(-2px); color: #fff !important; }
.btn-hero-secondary {
display: inline-flex; align-items: center; gap: 8px;
padding: 14px 28px;
border: 1.5px solid rgba(255,255,255,0.4); color: #fff !important;
border-radius: 4px; font-weight: 500; font-size: 15px;
text-decoration: none !important; transition: all 0.25s;
font-family: 'DM Sans', sans-serif;
background: transparent;
}
.btn-hero-secondary:hover { border-color: #fff; background: rgba(255,255,255,0.08); color: #fff !important; }
/* ── SECTIONS ── */
.section { padding: 90px 0; }
.section-white { background: #fff; }
.section-gray  { background: #f5f7fa; }
.container-d   { max-width: 1100px; margin: 0 auto; padding: 0 60px; }
.section-tag   { display: inline-block; font-size: 11px; font-weight: 700; color: var(--d-blue); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 12px; }
.section-title { font-family: 'Syne', sans-serif; font-size: clamp(26px, 3vw, 38px); font-weight: 700; color: var(--d-text); margin-bottom: 12px; line-height: 1.2; }
.section-title .accent { color: var(--d-blue); }
.section-sub   { font-size: 15px; color: var(--d-muted); max-width: 460px; line-height: 1.75; }
.section-head  { margin-bottom: 50px; }
.section-head.center { text-align: center; }
.section-head.center .section-sub { margin: 0 auto; }
.reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: translateY(0); }
/* NAVBAR */
#header { background: #fff !important; border-bottom: 1px solid var(--d-border) !important; box-shadow: none !important; }
#primary-nav ul li a { color: var(--d-text) !important; }
#primary-nav ul li a:hover { color: var(--d-blue) !important; }
.nav-btn { background: var(--d-blue) !important; }
.nav-btn:hover { background: var(--d-blue2) !important; }
.logo-icon-block { background: var(--d-blue) !important; }
.logo-text-part { color: var(--d-text) !important; }
/* TRUST STRIP */
.trust-strip { background: #f5f7fa; border-top: 1px solid var(--d-border); border-bottom: 1px solid var(--d-border); padding: 22px 0; }
.trust-inner { max-width: 1100px; margin: 0 auto; padding: 0 60px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; }
.trust-label  { font-size: 11px; color: var(--d-muted); letter-spacing: 2px; text-transform: uppercase; }
.trust-logos  { display: flex; align-items: center; gap: 36px; flex-wrap: wrap; }
.trust-logo   { font-family: 'Syne', sans-serif; font-size: 14px; font-weight: 700; color: #c0cad8; transition: color 0.3s; cursor: default; }
.trust-logo:hover { color: #8a9ab0; }
/* FEATURES */
.features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
@media(max-width:900px){ .features-grid { grid-template-columns: 1fr; } }
.feat-card {
background: #fff; border: 1px solid var(--d-border);
border-radius: 8px; padding: 32px 24px;
transition: box-shadow 0.3s, transform 0.3s;
}
.feat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(26,111,196,0.10); border-color: rgba(26,111,196,0.2); }
.feat-num  { font-family: 'Syne', sans-serif; font-size: 40px; font-weight: 800; color: rgba(26,111,196,0.18); line-height: 1; margin-bottom: 14px; }
.feat-card h4 { font-family: 'Syne', sans-serif; font-size: 16px; font-weight: 700; color: var(--d-text); margin-bottom: 8px; }
.feat-card p  { font-size: 14px; color: var(--d-muted); line-height: 1.7; }
/* STATS */
.stats-bar { background: var(--d-blue); padding: 50px 0; }
.stats-bar-grid { max-width: 1100px; margin: 0 auto; padding: 0 60px; display: grid; grid-template-columns: repeat(3,1fr); }
.stat-item { text-align: center; padding: 10px 20px; border-right: 1px solid rgba(255,255,255,0.15); }
.stat-item:last-child { border-right: none; }
.stat-item h2 { font-family: 'Syne', sans-serif; font-size: 42px; font-weight: 800; color: #fff; margin-bottom: 6px; }
.stat-item p  { font-size: 11px; color: rgba(255,255,255,0.6); letter-spacing: 2px; text-transform: uppercase; }
@media(max-width:768px){ .stats-bar-grid { grid-template-columns: 1fr; } .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.15); padding: 16px; } }
/* COURS */
.cours-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
@media(max-width:900px){ .cours-grid { grid-template-columns: 1fr; } }
.cours-card {
background: #fff; border: 1px solid var(--d-border);
border-radius: 8px; padding: 28px 22px;
transition: box-shadow 0.3s, transform 0.3s;
}
.cours-card:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(26,111,196,0.10); border-color: rgba(26,111,196,0.2); }
.cours-level { display: inline-block; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: var(--d-green); background: rgba(39,174,96,0.08); border: 1px solid rgba(39,174,96,0.2); border-radius: 3px; padding: 3px 10px; margin-bottom: 14px; }
.cours-card h4 { font-family: 'Syne', sans-serif; font-size: 16px; font-weight: 700; color: var(--d-text); margin-bottom: 8px; }
.cours-card p  { font-size: 14px; color: var(--d-muted); line-height: 1.7; margin-bottom: 16px; }
.cours-link    { font-size: 13px; font-weight: 700; color: var(--d-blue); text-decoration: none; }
.cours-link:hover { text-decoration: underline; }
/* TESTIMONIALS */
.testi-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
@media(max-width:900px){ .testi-grid { grid-template-columns: 1fr; } }
.testi-card {
background: #fff; border: 1px solid var(--d-border);
border-radius: 8px; padding: 28px;
transition: box-shadow 0.3s, transform 0.3s;
}
.testi-card:hover { transform: translateY(-3px); box-shadow: 0 12px 36px rgba(26,111,196,0.08); }
.testi-stars  { color: #f39c12; font-size: 13px; letter-spacing: 2px; margin-bottom: 12px; }
.testi-text   { font-size: 14px; color: var(--d-muted); font-style: italic; line-height: 1.75; margin-bottom: 20px; }
.testi-author { display: flex; align-items: center; gap: 10px; }
.testi-avatar { width: 38px; height: 38px; border-radius: 50%; background: var(--d-blue); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #fff; font-size: 13px; flex-shrink: 0; font-family: 'Syne', sans-serif; }
.testi-name   { font-weight: 700; font-size: 13px; color: var(--d-text); }
.testi-role   { font-size: 11px; color: var(--d-muted); text-transform: uppercase; letter-spacing: 1px; margin-top: 2px; }
/* CTA */
.cta-section { background: var(--d-blue); padding: 90px 0; text-align: center; }
.cta-section .section-title { color: #fff; }
.cta-section .section-sub   { color: rgba(255,255,255,0.65); margin: 0 auto 36px; }
.cta-section .section-tag   { color: rgba(255,255,255,0.7); }
.cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.btn-white   { display: inline-flex; align-items: center; gap: 8px; padding: 14px 32px; background: #fff; color: var(--d-blue); border-radius: 4px; font-weight: 700; font-size: 15px; text-decoration: none; transition: all 0.25s; font-family: 'DM Sans', sans-serif; }
.btn-white:hover { background: #f0f6ff; color: var(--d-blue); transform: translateY(-2px); text-decoration: none; }
.btn-outline { display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; border: 1.5px solid rgba(255,255,255,0.4); color: #fff; border-radius: 4px; font-weight: 500; font-size: 15px; text-decoration: none; transition: all 0.25s; font-family: 'DM Sans', sans-serif; }
.btn-outline:hover { border-color: #fff; background: rgba(255,255,255,0.08); color: #fff; text-decoration: none; }
/* FOOTER */
footer { background: #1e2d40 !important; }
.footer-logo-icon { background: var(--d-blue) !important; }
/* AUTH MODAL */
.modal-overlay {
position: fixed; inset: 0; z-index: 9999;
background: rgba(10,20,40,0.6);
backdrop-filter: blur(4px);
display: flex; align-items: center; justify-content: center;
opacity: 0; pointer-events: none; transition: opacity 0.3s; padding: 20px;
}
.modal-overlay.open { opacity: 1; pointer-events: auto; }
.auth-modal {
background: #fff; border-radius: 12px;
width: 100%; max-width: 420px;
box-shadow: 0 20px 60px rgba(0,0,0,0.2);
overflow: hidden; position: relative;
transform: translateY(20px) scale(0.98);
transition: transform 0.3s ease;
}
.modal-overlay.open .auth-modal { transform: translateY(0) scale(1); }
.auth-tabs { display: flex; border-bottom: 1px solid var(--d-border); }
.auth-tab {
flex: 1; padding: 16px; text-align: center;
font-family: 'Syne', sans-serif; font-weight: 700; font-size: 14px;
color: var(--d-muted); cursor: pointer;
border-bottom: 2px solid transparent; margin-bottom: -1px;
transition: all 0.2s; background: none; border-top: none; border-left: none; border-right: none;
}
.auth-tab.active { color: var(--d-blue); border-bottom-color: var(--d-blue); }
.auth-tab:hover:not(.active) { color: var(--d-text); }
.auth-body  { padding: 32px 28px 28px; }
.auth-panel { display: none; }
.auth-panel.active { display: block; }
.auth-logo       { text-align: center; margin-bottom: 22px; }
.auth-logo-icon  { width: 46px; height: 46px; background: var(--d-blue); border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; }
.auth-logo-icon span { font-family: 'Syne', sans-serif; font-size: 22px; font-weight: 800; color: #fff; font-style: italic; }
.auth-logo-name  { font-family: 'Syne', sans-serif; font-size: 18px; font-weight: 700; color: var(--d-text); margin-top: 10px; }
.auth-logo-sub   { font-size: 13px; color: var(--d-muted); margin-top: 3px; }
.form-group      { margin-bottom: 16px; }
.form-group label { display: block; font-size: 13px; font-weight: 600; color: var(--d-text); margin-bottom: 5px; }
.form-group input {
width: 100%; padding: 11px 14px 11px 40px;
border: 1.5px solid var(--d-border); border-radius: 6px;
font-size: 14px; font-family: 'DM Sans', sans-serif; color: var(--d-text);
outline: none; transition: border-color 0.2s; background: #fff;
}
.form-group input:focus { border-color: var(--d-blue); }
.form-group input::placeholder { color: #b0bec5; }
.input-wrap   { position: relative; }
.input-wrap i { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #b0bec5; font-size: 13px; }
.btn-auth {
width: 100%; padding: 13px; background: var(--d-blue); color: #fff;
border: none; border-radius: 6px;
font-family: 'Syne', sans-serif; font-weight: 700; font-size: 15px;
cursor: pointer; transition: background 0.25s; margin-top: 6px;
}
.btn-auth:hover { background: var(--d-blue2); }
.auth-forgot  { text-align: right; margin-top: -10px; margin-bottom: 16px; }
.auth-forgot a { font-size: 12px; color: var(--d-blue); text-decoration: none; }
.auth-switch  { text-align: center; margin-top: 16px; font-size: 13px; color: var(--d-muted); }
.auth-switch a { color: var(--d-blue); font-weight: 700; text-decoration: none; cursor: pointer; }
.modal-close  { position: absolute; top: 12px; right: 14px; background: none; border: none; cursor: pointer; font-size: 17px; color: var(--d-muted); transition: color 0.2s; z-index: 10; }
.modal-close:hover { color: var(--d-text); }
.pwd-strength { display: flex; gap: 4px; margin-top: 5px; }
.pwd-bar      { flex: 1; height: 3px; border-radius: 2px; background: #e9ecef; transition: background 0.3s; }
@media(max-width:768px){
.hero-content { padding: 0 24px; }
.container-d  { padding: 0 24px; }
.trust-inner  { padding: 0 24px; }
.stats-bar-grid { padding: 0 24px; }
.auth-body    { padding: 24px 18px 20px; }
}
</style>
{% endblock %}

{% block body %}

{# AUTH MODAL #}
<div class=\"modal-overlay\" id=\"auth-modal\">
<div class=\"auth-modal\">
<button class=\"modal-close\" onclick=\"closeAuth()\"><i class=\"fa fa-times\"></i></button>
<div class=\"auth-tabs\">
<button class=\"auth-tab active\" id=\"tab-login\"    onclick=\"switchTab('login')\">Connexion</button>
<button class=\"auth-tab\"        id=\"tab-register\" onclick=\"switchTab('register')\">Inscription</button>
</div>
<div class=\"auth-body\">
<div class=\"auth-panel active\" id=\"panel-login\">
<div class=\"auth-logo\">
<div class=\"auth-logo-icon\"><span>D</span></div>
<div class=\"auth-logo-name\">Bon retour !</div>
<div class=\"auth-logo-sub\">Connectez-vous à votre compte Dinari</div>
</div>
<form action=\"#\" method=\"post\" novalidate>
<div class=\"form-group\"><label>Adresse email</label><div class=\"input-wrap\"><i class=\"fa fa-envelope\"></i><input type=\"email\" name=\"email\" placeholder=\"votre@email.com\" required></div></div>
<div class=\"form-group\"><label>Mot de passe</label><div class=\"input-wrap\"><i class=\"fa fa-lock\"></i><input type=\"password\" name=\"password\" placeholder=\"••••••••\" required></div></div>
<div class=\"auth-forgot\"><a href=\"#\">Mot de passe oublié ?</a></div>
<button type=\"submit\" class=\"btn-auth\">Se connecter</button>
</form>
<div class=\"auth-switch\">Pas encore de compte ? <a onclick=\"switchTab('register')\">Créer un compte gratuit</a></div>
</div>
<div class=\"auth-panel\" id=\"panel-register\">
<div class=\"auth-logo\">
<div class=\"auth-logo-icon\"><span>D</span></div>
<div class=\"auth-logo-name\">Rejoindre Dinari</div>
<div class=\"auth-logo-sub\">Créez votre compte gratuitement</div>
</div>
<form action=\"#\" method=\"post\" novalidate>
<div class=\"form-group\"><label>Nom complet</label><div class=\"input-wrap\"><i class=\"fa fa-user\"></i><input type=\"text\" name=\"nom\" placeholder=\"Votre nom\" required></div></div>
<div class=\"form-group\"><label>Adresse email</label><div class=\"input-wrap\"><i class=\"fa fa-envelope\"></i><input type=\"email\" name=\"email\" placeholder=\"votre@email.com\" required></div></div>
<div class=\"form-group\"><label>Mot de passe</label><div class=\"input-wrap\"><i class=\"fa fa-lock\"></i><input type=\"password\" name=\"password\" id=\"reg-pwd\" placeholder=\"Min. 8 caractères\" required oninput=\"updatePwdStrength(this.value)\"></div><div class=\"pwd-strength\"><div class=\"pwd-bar\" id=\"bar1\"></div><div class=\"pwd-bar\" id=\"bar2\"></div><div class=\"pwd-bar\" id=\"bar3\"></div><div class=\"pwd-bar\" id=\"bar4\"></div></div></div>
<button type=\"submit\" class=\"btn-auth\">Créer mon compte</button>
</form>
<div class=\"auth-switch\">Déjà un compte ? <a onclick=\"switchTab('login')\">Se connecter</a></div>
</div>
</div>
</div>
</div>

{# HERO #}
<section class=\"hero\" id=\"accueil\">
<div class=\"hero-bg\"></div>
<div class=\"hero-overlay\"></div>
<div class=\"hero-content\">
<div class=\"hero-line\"></div>
<h1 class=\"hero-title\">Gérez vos finances intelligemment</h1>
<p class=\"hero-desc\">Dinari vous aide à maîtriser vos budgets, suivre vos dépenses et apprendre la finance personnelle.</p>
<div class=\"hero-btns\">
<a href=\"#\" class=\"btn-hero-primary\" onclick=\"openAuth('register');return false;\">Commencer gratuitement</a>
<a href=\"#fonctionnalites\" class=\"btn-hero-secondary\">Découvrir</a>
</div>
</div>
</section>

{# TRUST STRIP #}
<div class=\"trust-strip\">
<div class=\"trust-inner\">
<span class=\"trust-label\">Ils nous font confiance</span>
<div class=\"trust-logos\">
<span class=\"trust-logo\">FINTECH.TN</span>
<span class=\"trust-logo\">STARTUP.TN</span>
<span class=\"trust-logo\">BIAT</span>
<span class=\"trust-logo\">ATTIJARI</span>
<span class=\"trust-logo\">STB BANK</span>
</div>
</div>
</div>

{# FONCTIONNALITÉS #}
<section class=\"section section-white\" id=\"fonctionnalites\">
<div class=\"container-d\">
<div class=\"section-head reveal\">
<div class=\"section-tag\">Ce que nous offrons</div>
<h2 class=\"section-title\">Tout pour gérer votre <span class=\"accent\">argent</span></h2>
<p class=\"section-sub\">Des outils simples et puissants pour prendre le contrôle de vos finances.</p>
</div>
<div class=\"features-grid\">
<div class=\"feat-card reveal\"><div class=\"feat-num\">01</div><h4>Gestion des budgets</h4><p>Définissez des budgets par catégorie et gardez le contrôle sur vos dépenses mensuelles.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">02</div><h4>Suivi des dépenses</h4><p>Enregistrez chaque transaction et visualisez vos statistiques en temps réel.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">03</div><h4>Cours & Quiz Fintech</h4><p>Apprenez la finance personnelle avec des cours interactifs adaptés à votre niveau.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">04</div><h4>Abonnements flexibles</h4><p>Choisissez le plan qui vous convient : gratuit, standard ou premium.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">05</div><h4>Alertes intelligentes</h4><p>Recevez des notifications quand vous dépassez un budget fixé.</p></div>
<div class=\"feat-card reveal\"><div class=\"feat-num\">06</div><h4>Sécurité garantie</h4><p>Vos données financières sont protégées avec les meilleurs standards SSL.</p></div>
</div>
</div>
</section>

{# STATS #}
<div class=\"stats-bar\">
<div class=\"stats-bar-grid\">
<div class=\"stat-item reveal\"><h2>5 000+</h2><p>reclamation actifs</p></div>
<div class=\"stat-item reveal\"><h2>98%</h2><p>Satisfaction client</p></div>
<div class=\"stat-item reveal\"><h2>50+</h2><p>Cours disponibles</p></div>
</div>
</div>

{# COURS #}
<section class=\"section section-gray\" id=\"cours\">
<div class=\"container-d\">
<div class=\"section-head center reveal\">
<div class=\"section-tag\">Apprenez la finance</div>
<h2 class=\"section-title\">Nos cours <span class=\"accent\">Fintech</span></h2>
<p class=\"section-sub\">Des formations conçues pour tous les niveaux.</p>
</div>
<div class=\"cours-grid\">
{% if cours_list is empty %}
    <p style=\"color:var(--d-muted);text-align:center;grid-column:1/-1;\">Aucun cours disponible pour l'instant.</p>
{% else %}
    {% for cours in cours_list %}
    <div class=\"cours-card reveal\">
        <div class=\"cours-level\">{{ cours.dateCreation ? cours.dateCreation|date('Y') : 'Nouveau' }}</div>
        <h4>{{ cours.nomCours }}</h4>
        <p>{{ cours.description|default('')|slice(0,120) }}{% if cours.description|length > 120 %}…{% endif %}</p>
        <a href=\"{{ path('app_cours_index') }}\" class=\"cours-link\">Voir le cours →</a>
    </div>
    {% endfor %}
{% endif %}
</div>
<div style=\"text-align:center;margin-top:40px;\" class=\"reveal\">
<a href=\"{{ path('app_cours_index') }}\" class=\"btn-hero-primary\">Accéder à tous les cours</a>
</div>
</div>
</section>

{# TESTIMONIALS #}
<section class=\"section section-white\" id=\"temoignages\">
<div class=\"container-d\">
<div class=\"section-head center reveal\">
<div class=\"section-tag\">Avis clients</div>
<h2 class=\"section-title\">Ils font confiance à <span class=\"accent\">Dinari</span></h2>
<p class=\"section-sub\">Rejoignez des milliers d'utilisateurs qui maîtrisent leurs finances.</p>
</div>
<div class=\"testi-grid\">
<div class=\"testi-card reveal\"><div class=\"testi-stars\">★★★★★</div><p class=\"testi-text\">Dinari a transformé ma façon de gérer mes finances. Les modules éducatifs valent à eux seuls l'abonnement.</p><div class=\"testi-author\"><div class=\"testi-avatar\">MT</div><div><div class=\"testi-name\">Mohamed Trabelsi</div><div class=\"testi-role\">Entrepreneur</div></div></div></div>
<div class=\"testi-card reveal\"><div class=\"testi-stars\">★★★★★</div><p class=\"testi-text\">Le suivi de mes dépenses m'a permis d'économiser plus de 200 DT dès le premier mois.</p><div class=\"testi-author\"><div class=\"testi-avatar\">SB</div><div><div class=\"testi-name\">Sarra Ben Ali</div><div class=\"testi-role\">Directrice créative</div></div></div></div>
<div class=\"testi-card reveal\"><div class=\"testi-stars\">★★★★★</div><p class=\"testi-text\">Simple, rapide et fiable. Dinari raconte l'histoire de votre santé financière de façon claire.</p><div class=\"testi-author\"><div class=\"testi-avatar\">AK</div><div><div class=\"testi-name\">Amine Khelifi</div><div class=\"testi-role\">Architecte logiciel</div></div></div></div>
</div>
</div>
</section>

{# CTA #}
<section class=\"cta-section\">
<div class=\"container-d\">
<div class=\"reveal\">
<div class=\"section-tag\">Rejoignez-nous</div>
<h2 class=\"section-title\" style=\"margin-top:10px;\">Prêt à maîtriser vos finances ?</h2>
<p class=\"section-sub\">Sans frais cachés, sans engagement.</p>
<div class=\"cta-btns\" style=\"margin-top:32px;\">
<a href=\"#\" class=\"btn-white\" onclick=\"openAuth('register');return false;\">Créer mon compte gratuitement</a>
<a href=\"#\" class=\"btn-outline\" onclick=\"openAuth('login');return false;\">Se connecter</a>
</div>
</div>
</div>
</section>

<script>
const revealEls = document.querySelectorAll('.reveal');
const obs = new IntersectionObserver((entries) => {
entries.forEach((entry, i) => {
if (entry.isIntersecting) setTimeout(() => entry.target.classList.add('visible'), i * 80);
});
}, { threshold: 0.08 });
revealEls.forEach(el => obs.observe(el));

function openAuth(tab) {
document.getElementById('auth-modal').classList.add('open');
document.body.style.overflow = 'hidden';
switchTab(tab || 'login');
}
function closeAuth() {
document.getElementById('auth-modal').classList.remove('open');
document.body.style.overflow = '';
}
function switchTab(tab) {
document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
document.querySelectorAll('.auth-panel').forEach(p => p.classList.remove('active'));
document.getElementById('tab-' + tab).classList.add('active');
document.getElementById('panel-' + tab).classList.add('active');
}
document.getElementById('auth-modal').addEventListener('click', function(e) { if (e.target === this) closeAuth(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAuth(); });
function updatePwdStrength(val) {
const colors = ['#e74c3c','#e67e22','#f1c40f','#27ae60'];
let score = 0;
if (val.length >= 8) score++;
if (/[A-Z]/.test(val)) score++;
if (/[0-9]/.test(val)) score++;
if (/[^A-Za-z0-9]/.test(val)) score++;
['bar1','bar2','bar3','bar4'].forEach((id, i) => {
document.getElementById(id).style.background = i < score ? colors[score-1] : '#e9ecef';
});
}
</script>
{% endblock %}
", "client/home/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\home\\index.html.twig");
    }
}
