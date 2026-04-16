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

/* home/base.html.twig */
class __TwigTemplate_0abff1883b37ad6109a7e8e1e909918a extends Template
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
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
        <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <meta name=\"description\" content=\"Dinari - Votre plateforme de gestion financière personnelle\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        yield "\">
        <link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap-theme.min.css"), "html", null, true);
        yield "\">
        <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/fontAwesome.css"), "html", null, true);
        yield "\">
        <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/templatemo-style.css"), "html", null, true);
        yield "\">
        <link href=\"https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap\" rel=\"stylesheet\">

        <style>
            :root {
                --dinari-blue:   #1a6fc4;
                --dinari-accent: #2ecc71;
                --dinari-text:   #2c3e50;
                --dinari-muted:  #7f8c8d;
                --dinari-light:  #f8f9fa;
                --dinari-border: #e9ecef;
            }
            * { box-sizing: border-box; }
            body {
                font-family: 'Raleway', sans-serif;
                color: var(--dinari-text);
                background: #fff;
                margin: 0; padding: 0;
                overflow-x: hidden;
            }

            /* ===== NAVBAR ===== */
            #header {
                position: fixed;
                top: 0; width: 100%;
                z-index: 1000;
                background: #ffffff;
                border-bottom: 1px solid var(--dinari-border);
                box-shadow: 0 2px 10px rgba(0,0,0,0.06);
                padding: 0;
            }
            #header .container { max-width: 1200px; margin: 0 auto; padding: 0 30px; }
            #header .row { margin: 0; }
            #header .col-md-12 {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 0 !important;
                height: 70px;
            }

            /* Logo */
            .logo-wrapper {
                display: inline-flex;
                align-items: center;
                text-decoration: none;
                gap: 0;
                flex-shrink: 0;
            }
            .logo-icon-block {
                width: 50px; height: 50px;
                background: var(--dinari-blue);
                display: flex; align-items: center; justify-content: center;
                flex-shrink: 0;
            }
            .logo-icon-block span {
                color: #fff; font-size: 24px; font-weight: 900;
                font-style: italic; font-family: 'Raleway', sans-serif; line-height: 1;
            }
            .logo-text-part {
                color: var(--dinari-text); font-size: 22px; font-weight: 400;
                font-family: 'Raleway', sans-serif; padding-left: 14px; letter-spacing: 0.5px;
            }

            /* ===== NAV ===== */
            .dinari-nav {
                display: flex !important;
                align-items: center !important;
                list-style: none !important;
                margin: 0 !important; padding: 0 !important;
                gap: 2px !important;
            }
            .dinari-nav > li { position: static !important; }
            .dinari-nav > li > a {
                display: block !important;
                color: var(--dinari-text) !important;
                font-weight: 500 !important;
                font-size: 15px !important;
                padding: 8px 14px !important;
                text-decoration: none !important;
                transition: color 0.2s !important;
                white-space: nowrap !important;
                background: transparent !important;
                border: none !important;
            }
            .dinari-nav > li > a:hover { color: var(--dinari-blue) !important; background: transparent !important; }

            .nav-btn-dinari {
                background: var(--dinari-blue) !important;
                color: #fff !important;
                border-radius: 4px !important;
                padding: 10px 20px !important;
                font-weight: 600 !important;
                font-size: 14px !important;
                margin-left: 8px !important;
                transition: all 0.25s !important;
            }
            .nav-btn-dinari:hover {
                background: #1558a0 !important;
                color: #fff !important;
                transform: translateY(-1px) !important;
            }

            /* ===== DROPDOWN GESTIONS HOVER ===== */
            .gestions-wrapper {
                position: relative !important;
                display: inline-block !important;
            }
            .gestions-btn {
                display: flex !important;
                align-items: center !important;
                gap: 6px !important;
                cursor: pointer !important;
                color: var(--dinari-text) !important;
                font-weight: 500 !important;
                font-size: 15px !important;
                padding: 8px 14px !important;
                text-decoration: none !important;
                background: transparent !important;
                border: none !important;
                white-space: nowrap !important;
                font-family: 'Raleway', sans-serif !important;
                transition: color 0.2s !important;
                line-height: 1.5 !important;
            }
            .gestions-btn:hover { color: var(--dinari-blue) !important; }
            .gestions-arrow {
                font-size: 9px !important;
                transition: transform 0.25s !important;
                display: inline-block !important;
            }
            .gestions-wrapper:hover .gestions-arrow { transform: rotate(180deg) !important; }

            .gestions-menu {
                display: none !important;
                position: absolute !important;
                top: 100% !important;
                left: 0 !important;
                background: #fff !important;
                border: 1px solid var(--dinari-border) !important;
                border-radius: 8px !important;
                box-shadow: 0 8px 30px rgba(0,0,0,0.12) !important;
                min-width: 190px !important;
                z-index: 99999 !important;
                padding: 6px 0 !important;
                list-style: none !important;
                margin: 0 !important;
            }
            .gestions-wrapper:hover .gestions-menu { display: block !important; }
            .gestions-menu li {
                display: block !important;
                float: none !important;
                border-bottom: 1px solid #f0f4f8 !important;
            }
            .gestions-menu li:last-child { border-bottom: none !important; }
            .gestions-menu li a {
                display: block !important;
                float: none !important;
                padding: 11px 18px !important;
                color: var(--dinari-text) !important;
                font-size: 14px !important;
                font-weight: 500 !important;
                text-decoration: none !important;
                transition: all 0.2s !important;
                background: transparent !important;
                white-space: nowrap !important;
            }
            .gestions-menu li a:hover {
                background: #f0f6ff !important;
                color: var(--dinari-blue) !important;
                padding-left: 22px !important;
            }

            /* ===== ANIMATIONS ===== */
            @keyframes rippleAnim { to { transform: scale(40); opacity: 0; } }

            /* ===== FOOTER ===== */
            footer {
                background: #2c3e50 !important;
                color: rgba(255,255,255,0.55);
                padding: 64px 0 0;
            }
            footer .container { max-width: 1200px; margin: 0 auto; padding: 0 30px; }
            footer h4 {
                color: #fff; font-weight: 700; font-size: 13px;
                letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;
            }
            footer ul { list-style: none; padding: 0; margin: 0; }
            footer ul li { margin-bottom: 10px; }
            footer ul li a { color: rgba(255,255,255,0.45); text-decoration: none; font-size: 14px; transition: all 0.2s; }
            footer ul li a:hover { color: #fff; padding-left: 4px; }
            footer ul li i { color: var(--dinari-accent); margin-right: 8px; font-size: 13px; }

            .footer-logo-block { display: inline-flex; align-items: center; margin-bottom: 14px; }
            .footer-logo-icon { width: 36px; height: 36px; background: var(--dinari-blue); display: flex; align-items: center; justify-content: center; }
            .footer-logo-icon span { color: #fff; font-size: 18px; font-weight: 900; font-style: italic; }
            .footer-logo-text { color: #fff; font-size: 18px; font-weight: 400; padding-left: 10px; }

            .social-icons { margin-top: 18px; display: flex; gap: 8px; }
            .social-icons a {
                display: inline-flex; width: 34px; height: 34px;
                background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1);
                border-radius: 50%; align-items: center; justify-content: center;
                color: rgba(255,255,255,0.45); font-size: 13px; transition: all 0.25s; text-decoration: none;
            }
            .social-icons a:hover { background: var(--dinari-blue); border-color: var(--dinari-blue); color: #fff; }

            .sub-footer-wrap { background: #222e3c; border-top: 1px solid rgba(255,255,255,0.05); }
            .sub-footer-wrap .container { max-width: 1200px; padding: 18px 30px; display: flex; justify-content: space-between; align-items: center; }
            .sub-footer-wrap p { font-size: 13px; color: rgba(255,255,255,0.22); margin: 0; }
            .sub-footer-wrap strong { color: var(--dinari-blue); }

            .reveal { opacity: 0; transform: translateY(22px); transition: opacity 0.6s ease, transform 0.6s ease; }
            .reveal.visible { opacity: 1; transform: translateY(0); }
            .ripple-btn { position: relative; overflow: hidden; }
        </style>

        ";
        // line 230
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 231
        yield "        <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"), "html", null, true);
        yield "\"></script>
    </head>

<body>
    <div class=\"wrap\">
        <header id=\"header\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-12\">

                        <a href=\"";
        // line 241
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"logo-wrapper\">
                            <div class=\"logo-icon-block\"><span>D</span></div>
                            <span class=\"logo-text-part\">inari</span>
                        </a>

                        <ul class=\"dinari-nav\">
                            <li><a href=\"";
        // line 247
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a></li>
                            <li><a href=\"#fonctionnalites\">Fonctionnalités</a></li>
                            <li><a href=\"#cours\">Cours Fintech</a></li>

                            ";
        // line 252
        yield "                            <li>
                                <div class=\"gestions-wrapper\">
                                    <a href=\"#\" class=\"gestions-btn\">
                                        Gestions <span class=\"gestions-arrow\">▼</span>
                                    </a>
                                    <ul class=\"gestions-menu\">
                                        <li><a href=\"";
        // line 258
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_abonnement_index");
        yield "\">Abonnements</a></li>
                                        <li><a href=\"#\">Budget</a></li>
                                        <li><a href=\"#\">Dépenses</a></li>
                                        <li><a href=\"#\">Cours et Quiz</a></li>
                                        <li><a href=\"#\">reclamations</a></li>
                                    </ul>
                                </div>
                            </li>

                            ";
        // line 268
        yield "                            <li>
                                <a href=\"#\"
                                   onclick=\"if(typeof openAuth==='function'){openAuth('login');}return false;\"
                                   class=\"nav-btn-dinari ripple-btn\">
                                    Se connecter
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </header>
    </div>

    ";
        // line 283
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 284
        yield "
    <footer>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"footer-logo-block\">
                        <div class=\"footer-logo-icon\"><span>D</span></div>
                        <span class=\"footer-logo-text\">inari</span>
                    </div>
                    <p style=\"color:rgba(255,255,255,0.38);font-size:13px;line-height:1.85;max-width:250px;margin:0;\">
                        Votre plateforme de gestion financière personnelle.
                    </p>
                    <div class=\"social-icons\">
                        <a href=\"#\"><i class=\"fa fa-facebook\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-twitter\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-linkedin\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-instagram\"></i></a>
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <h4>Produit</h4>
                    <ul>
                        <li><a href=\"";
        // line 306
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a></li>
                        <li><a href=\"#fonctionnalites\">Fonctionnalités</a></li>
                        <li><a href=\"#cours\">Cours Fintech</a></li>
                        <li><a href=\"#\" onclick=\"if(typeof openAuth==='function'){openAuth('register');}return false;\">S'inscrire</a></li>
                    </ul>
                </div>
                <div class=\"col-md-3\">
                    <h4>Ressources</h4>
                    <ul>
                        <li><a href=\"#\">Documentation</a></li>
                        <li><a href=\"#\">Centre d'aide</a></li>
                        <li><a href=\"#\">Blog</a></li>
                    </ul>
                </div>
                <div class=\"col-md-3\">
                    <h4>Contact</h4>
                    <ul>
                        <li><i class=\"fa fa-envelope\"></i>contact@dinari.tn</li>
                        <li><i class=\"fa fa-phone\"></i>+216 XX XXX XXX</li>
                        <li><i class=\"fa fa-map-marker\"></i>Tunis, Tunisie</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class=\"sub-footer-wrap\">
        <div class=\"container\">
            <p>&copy; ";
        // line 334
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " <strong>Dinari</strong> — Tous droits réservés.</p>
            <p style=\"font-size:12px;color:rgba(255,255,255,0.18);\">Plateforme fintech tunisienne</p>
        </div>
    </div>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
    <script src=\"";
        // line 340
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/vendor/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 341
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/plugins.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 342
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/main.js"), "html", null, true);
        yield "\"></script>

    <script>
        const revealEls = document.querySelectorAll('.reveal');
        const obs = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting)
                    setTimeout(() => entry.target.classList.add('visible'), i * 80);
            });
        }, { threshold: 0.08 });
        revealEls.forEach(el => obs.observe(el));

        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                ripple.style.cssText = `position:absolute;border-radius:50%;pointer-events:none;background:rgba(255,255,255,0.3);width:10px;height:10px;left:\${e.clientX-rect.left-5}px;top:\${e.clientY-rect.top-5}px;animation:rippleAnim 0.6s linear;`;
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>

    ";
        // line 365
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 366
        yield "</body>
</html>";
        
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

        yield "Dinari — Gérez vos finances intelligemment";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 230
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

    // line 283
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

    // line 365
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
        return "home/base.html.twig";
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
        return array (  548 => 365,  526 => 283,  504 => 230,  481 => 6,  469 => 366,  467 => 365,  441 => 342,  437 => 341,  433 => 340,  424 => 334,  393 => 306,  369 => 284,  367 => 283,  350 => 268,  338 => 258,  330 => 252,  323 => 247,  314 => 241,  300 => 231,  298 => 230,  78 => 13,  74 => 12,  70 => 11,  66 => 10,  59 => 6,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
        <title>{% block title %}Dinari — Gérez vos finances intelligemment{% endblock %}</title>
        <meta name=\"description\" content=\"Dinari - Votre plateforme de gestion financière personnelle\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.min.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap-theme.min.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('css/fontAwesome.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('css/templatemo-style.css') }}\">
        <link href=\"https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap\" rel=\"stylesheet\">

        <style>
            :root {
                --dinari-blue:   #1a6fc4;
                --dinari-accent: #2ecc71;
                --dinari-text:   #2c3e50;
                --dinari-muted:  #7f8c8d;
                --dinari-light:  #f8f9fa;
                --dinari-border: #e9ecef;
            }
            * { box-sizing: border-box; }
            body {
                font-family: 'Raleway', sans-serif;
                color: var(--dinari-text);
                background: #fff;
                margin: 0; padding: 0;
                overflow-x: hidden;
            }

            /* ===== NAVBAR ===== */
            #header {
                position: fixed;
                top: 0; width: 100%;
                z-index: 1000;
                background: #ffffff;
                border-bottom: 1px solid var(--dinari-border);
                box-shadow: 0 2px 10px rgba(0,0,0,0.06);
                padding: 0;
            }
            #header .container { max-width: 1200px; margin: 0 auto; padding: 0 30px; }
            #header .row { margin: 0; }
            #header .col-md-12 {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 0 !important;
                height: 70px;
            }

            /* Logo */
            .logo-wrapper {
                display: inline-flex;
                align-items: center;
                text-decoration: none;
                gap: 0;
                flex-shrink: 0;
            }
            .logo-icon-block {
                width: 50px; height: 50px;
                background: var(--dinari-blue);
                display: flex; align-items: center; justify-content: center;
                flex-shrink: 0;
            }
            .logo-icon-block span {
                color: #fff; font-size: 24px; font-weight: 900;
                font-style: italic; font-family: 'Raleway', sans-serif; line-height: 1;
            }
            .logo-text-part {
                color: var(--dinari-text); font-size: 22px; font-weight: 400;
                font-family: 'Raleway', sans-serif; padding-left: 14px; letter-spacing: 0.5px;
            }

            /* ===== NAV ===== */
            .dinari-nav {
                display: flex !important;
                align-items: center !important;
                list-style: none !important;
                margin: 0 !important; padding: 0 !important;
                gap: 2px !important;
            }
            .dinari-nav > li { position: static !important; }
            .dinari-nav > li > a {
                display: block !important;
                color: var(--dinari-text) !important;
                font-weight: 500 !important;
                font-size: 15px !important;
                padding: 8px 14px !important;
                text-decoration: none !important;
                transition: color 0.2s !important;
                white-space: nowrap !important;
                background: transparent !important;
                border: none !important;
            }
            .dinari-nav > li > a:hover { color: var(--dinari-blue) !important; background: transparent !important; }

            .nav-btn-dinari {
                background: var(--dinari-blue) !important;
                color: #fff !important;
                border-radius: 4px !important;
                padding: 10px 20px !important;
                font-weight: 600 !important;
                font-size: 14px !important;
                margin-left: 8px !important;
                transition: all 0.25s !important;
            }
            .nav-btn-dinari:hover {
                background: #1558a0 !important;
                color: #fff !important;
                transform: translateY(-1px) !important;
            }

            /* ===== DROPDOWN GESTIONS HOVER ===== */
            .gestions-wrapper {
                position: relative !important;
                display: inline-block !important;
            }
            .gestions-btn {
                display: flex !important;
                align-items: center !important;
                gap: 6px !important;
                cursor: pointer !important;
                color: var(--dinari-text) !important;
                font-weight: 500 !important;
                font-size: 15px !important;
                padding: 8px 14px !important;
                text-decoration: none !important;
                background: transparent !important;
                border: none !important;
                white-space: nowrap !important;
                font-family: 'Raleway', sans-serif !important;
                transition: color 0.2s !important;
                line-height: 1.5 !important;
            }
            .gestions-btn:hover { color: var(--dinari-blue) !important; }
            .gestions-arrow {
                font-size: 9px !important;
                transition: transform 0.25s !important;
                display: inline-block !important;
            }
            .gestions-wrapper:hover .gestions-arrow { transform: rotate(180deg) !important; }

            .gestions-menu {
                display: none !important;
                position: absolute !important;
                top: 100% !important;
                left: 0 !important;
                background: #fff !important;
                border: 1px solid var(--dinari-border) !important;
                border-radius: 8px !important;
                box-shadow: 0 8px 30px rgba(0,0,0,0.12) !important;
                min-width: 190px !important;
                z-index: 99999 !important;
                padding: 6px 0 !important;
                list-style: none !important;
                margin: 0 !important;
            }
            .gestions-wrapper:hover .gestions-menu { display: block !important; }
            .gestions-menu li {
                display: block !important;
                float: none !important;
                border-bottom: 1px solid #f0f4f8 !important;
            }
            .gestions-menu li:last-child { border-bottom: none !important; }
            .gestions-menu li a {
                display: block !important;
                float: none !important;
                padding: 11px 18px !important;
                color: var(--dinari-text) !important;
                font-size: 14px !important;
                font-weight: 500 !important;
                text-decoration: none !important;
                transition: all 0.2s !important;
                background: transparent !important;
                white-space: nowrap !important;
            }
            .gestions-menu li a:hover {
                background: #f0f6ff !important;
                color: var(--dinari-blue) !important;
                padding-left: 22px !important;
            }

            /* ===== ANIMATIONS ===== */
            @keyframes rippleAnim { to { transform: scale(40); opacity: 0; } }

            /* ===== FOOTER ===== */
            footer {
                background: #2c3e50 !important;
                color: rgba(255,255,255,0.55);
                padding: 64px 0 0;
            }
            footer .container { max-width: 1200px; margin: 0 auto; padding: 0 30px; }
            footer h4 {
                color: #fff; font-weight: 700; font-size: 13px;
                letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;
            }
            footer ul { list-style: none; padding: 0; margin: 0; }
            footer ul li { margin-bottom: 10px; }
            footer ul li a { color: rgba(255,255,255,0.45); text-decoration: none; font-size: 14px; transition: all 0.2s; }
            footer ul li a:hover { color: #fff; padding-left: 4px; }
            footer ul li i { color: var(--dinari-accent); margin-right: 8px; font-size: 13px; }

            .footer-logo-block { display: inline-flex; align-items: center; margin-bottom: 14px; }
            .footer-logo-icon { width: 36px; height: 36px; background: var(--dinari-blue); display: flex; align-items: center; justify-content: center; }
            .footer-logo-icon span { color: #fff; font-size: 18px; font-weight: 900; font-style: italic; }
            .footer-logo-text { color: #fff; font-size: 18px; font-weight: 400; padding-left: 10px; }

            .social-icons { margin-top: 18px; display: flex; gap: 8px; }
            .social-icons a {
                display: inline-flex; width: 34px; height: 34px;
                background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1);
                border-radius: 50%; align-items: center; justify-content: center;
                color: rgba(255,255,255,0.45); font-size: 13px; transition: all 0.25s; text-decoration: none;
            }
            .social-icons a:hover { background: var(--dinari-blue); border-color: var(--dinari-blue); color: #fff; }

            .sub-footer-wrap { background: #222e3c; border-top: 1px solid rgba(255,255,255,0.05); }
            .sub-footer-wrap .container { max-width: 1200px; padding: 18px 30px; display: flex; justify-content: space-between; align-items: center; }
            .sub-footer-wrap p { font-size: 13px; color: rgba(255,255,255,0.22); margin: 0; }
            .sub-footer-wrap strong { color: var(--dinari-blue); }

            .reveal { opacity: 0; transform: translateY(22px); transition: opacity 0.6s ease, transform 0.6s ease; }
            .reveal.visible { opacity: 1; transform: translateY(0); }
            .ripple-btn { position: relative; overflow: hidden; }
        </style>

        {% block stylesheets %}{% endblock %}
        <script src=\"{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}\"></script>
    </head>

<body>
    <div class=\"wrap\">
        <header id=\"header\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-12\">

                        <a href=\"{{ path('app_home') }}\" class=\"logo-wrapper\">
                            <div class=\"logo-icon-block\"><span>D</span></div>
                            <span class=\"logo-text-part\">inari</span>
                        </a>

                        <ul class=\"dinari-nav\">
                            <li><a href=\"{{ path('app_home') }}\">Accueil</a></li>
                            <li><a href=\"#fonctionnalites\">Fonctionnalités</a></li>
                            <li><a href=\"#cours\">Cours Fintech</a></li>

                            {# Dropdown Gestions au hover #}
                            <li>
                                <div class=\"gestions-wrapper\">
                                    <a href=\"#\" class=\"gestions-btn\">
                                        Gestions <span class=\"gestions-arrow\">▼</span>
                                    </a>
                                    <ul class=\"gestions-menu\">
                                        <li><a href=\"{{ path('admin_abonnement_index') }}\">Abonnements</a></li>
                                        <li><a href=\"#\">Budget</a></li>
                                        <li><a href=\"#\">Dépenses</a></li>
                                        <li><a href=\"#\">Cours et Quiz</a></li>
                                        <li><a href=\"#\">reclamations</a></li>
                                    </ul>
                                </div>
                            </li>

                            {# Bouton Se connecter — ouvre le modal login #}
                            <li>
                                <a href=\"#\"
                                   onclick=\"if(typeof openAuth==='function'){openAuth('login');}return false;\"
                                   class=\"nav-btn-dinari ripple-btn\">
                                    Se connecter
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </header>
    </div>

    {% block body %}{% endblock %}

    <footer>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"footer-logo-block\">
                        <div class=\"footer-logo-icon\"><span>D</span></div>
                        <span class=\"footer-logo-text\">inari</span>
                    </div>
                    <p style=\"color:rgba(255,255,255,0.38);font-size:13px;line-height:1.85;max-width:250px;margin:0;\">
                        Votre plateforme de gestion financière personnelle.
                    </p>
                    <div class=\"social-icons\">
                        <a href=\"#\"><i class=\"fa fa-facebook\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-twitter\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-linkedin\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-instagram\"></i></a>
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <h4>Produit</h4>
                    <ul>
                        <li><a href=\"{{ path('app_home') }}\">Accueil</a></li>
                        <li><a href=\"#fonctionnalites\">Fonctionnalités</a></li>
                        <li><a href=\"#cours\">Cours Fintech</a></li>
                        <li><a href=\"#\" onclick=\"if(typeof openAuth==='function'){openAuth('register');}return false;\">S'inscrire</a></li>
                    </ul>
                </div>
                <div class=\"col-md-3\">
                    <h4>Ressources</h4>
                    <ul>
                        <li><a href=\"#\">Documentation</a></li>
                        <li><a href=\"#\">Centre d'aide</a></li>
                        <li><a href=\"#\">Blog</a></li>
                    </ul>
                </div>
                <div class=\"col-md-3\">
                    <h4>Contact</h4>
                    <ul>
                        <li><i class=\"fa fa-envelope\"></i>contact@dinari.tn</li>
                        <li><i class=\"fa fa-phone\"></i>+216 XX XXX XXX</li>
                        <li><i class=\"fa fa-map-marker\"></i>Tunis, Tunisie</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class=\"sub-footer-wrap\">
        <div class=\"container\">
            <p>&copy; {{ \"now\"|date(\"Y\") }} <strong>Dinari</strong> — Tous droits réservés.</p>
            <p style=\"font-size:12px;color:rgba(255,255,255,0.18);\">Plateforme fintech tunisienne</p>
        </div>
    </div>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
    <script src=\"{{ asset('js/vendor/bootstrap.min.js') }}\"></script>
    <script src=\"{{ asset('js/plugins.js') }}\"></script>
    <script src=\"{{ asset('js/main.js') }}\"></script>

    <script>
        const revealEls = document.querySelectorAll('.reveal');
        const obs = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting)
                    setTimeout(() => entry.target.classList.add('visible'), i * 80);
            });
        }, { threshold: 0.08 });
        revealEls.forEach(el => obs.observe(el));

        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                ripple.style.cssText = `position:absolute;border-radius:50%;pointer-events:none;background:rgba(255,255,255,0.3);width:10px;height:10px;left:\${e.clientX-rect.left-5}px;top:\${e.clientY-rect.top-5}px;animation:rippleAnim 0.6s linear;`;
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>

    {% block javascripts %}{% endblock %}
</body>
</html>", "home/base.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\home\\base.html.twig");
    }
}
