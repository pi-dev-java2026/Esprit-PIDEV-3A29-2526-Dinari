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

/* client/recommandations/index.html.twig */
class __TwigTemplate_e718664d8a3c8a1605a604dde563a8ee extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/recommandations/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/recommandations/index.html.twig"));

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

        yield "Recommandations — Dinari";
        
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
:root{--d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;--d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:#f5f7fa;color:var(--d-text);}
.reco-page{max-width:1100px;margin:0 auto;padding:40px 30px 80px;}
/* ── BREADCRUMB ── */
.breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--d-muted);margin-bottom:20px;flex-wrap:wrap;}
.breadcrumb a{color:var(--d-muted);text-decoration:none;transition:color .2s;}
.breadcrumb a:hover{color:var(--d-blue);}
.breadcrumb .sep{font-size:11px;color:var(--d-border);}
.breadcrumb .current{color:var(--d-text);font-weight:600;}
/* ── BACK BUTTON ── */
.btn-back{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;
  background:#fff;color:var(--d-text);border:1.5px solid var(--d-border);border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:600;font-size:13px;text-decoration:none;
  transition:all .2s;margin-bottom:24px;}
.btn-back:hover{border-color:var(--d-blue);color:var(--d-blue);text-decoration:none;}
.btn-back svg{flex-shrink:0;}
/* ── HEADER ── */
.reco-header{background:var(--d-blue);border-radius:12px;padding:36px 40px;margin-bottom:32px;position:relative;overflow:hidden;}
.reco-header::after{content:'';position:absolute;right:-40px;top:-40px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.06);}
.reco-tag{font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:8px;}
.reco-header h1{font-family:'Syne',sans-serif;font-size:26px;font-weight:700;color:#fff;margin-bottom:8px;}
.reco-header p{font-size:14px;color:rgba(255,255,255,.7);max-width:520px;line-height:1.75;}
/* ── STATS ROW ── */
.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:28px;}
.stat-card{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:20px 22px;}
.stat-card .sv{font-family:'Syne',sans-serif;font-size:28px;font-weight:800;color:var(--d-blue);line-height:1;}
.stat-card .sl{font-size:12px;color:var(--d-muted);margin-top:4px;text-transform:uppercase;letter-spacing:1px;}
/* ── LEVEL FILTER ── */
.level-bar{display:flex;align-items:center;gap:10px;margin-bottom:28px;flex-wrap:wrap;}
.level-bar span{font-size:13px;font-weight:600;color:var(--d-muted);}
.level-btn{padding:8px 18px;border-radius:20px;border:1.5px solid var(--d-border);background:#fff;
  font-size:13px;font-weight:600;cursor:pointer;color:var(--d-text);transition:all .2s;text-decoration:none;display:inline-block;}
.level-btn:hover{border-color:var(--d-blue);color:var(--d-blue);}
.level-btn.active{background:var(--d-blue);color:#fff;border-color:var(--d-blue);}
/* ── WEAK TOPICS ── */
.weak-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:20px 24px;margin-bottom:28px;}
.weak-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:12px;display:flex;align-items:center;gap:8px;}
.topic-chips{display:flex;flex-wrap:wrap;gap:8px;}
.topic-chip{padding:5px 14px;border-radius:20px;font-size:12px;font-weight:700;
  background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.no-weak{font-size:13px;color:var(--d-muted);}
/* ── GRID ── */
.reco-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}
@media(max-width:900px){.reco-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:600px){.reco-grid{grid-template-columns:1fr;}.stats-row{grid-template-columns:1fr;}}
/* ── CARD ── */
.reco-card{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;
  transition:box-shadow .25s,transform .25s;display:flex;flex-direction:column;}
.reco-card:hover{transform:translateY(-4px);box-shadow:0 12px 36px rgba(26,111,196,.1);border-color:rgba(26,111,196,.2);}
.card-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:12px;}
.niveau-badge{font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;
  padding:3px 10px;border-radius:3px;}
.niveau-debutant{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.2);}
.niveau-intermediaire{background:rgba(26,111,196,.1);color:var(--d-blue);border:1px solid rgba(26,111,196,.2);}
.niveau-avance{background:rgba(155,89,182,.1);color:#8e44ad;border:1px solid rgba(155,89,182,.2);}
.niveau-unknown{background:#f5f7fa;color:var(--d-muted);border:1px solid var(--d-border);}
.score-badge{font-family:'Syne',sans-serif;font-size:13px;font-weight:800;
  color:var(--d-blue);background:rgba(26,111,196,.08);padding:4px 10px;border-radius:20px;}
.reco-card h4{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:8px;line-height:1.35;}
.reco-card p{font-size:13px;color:var(--d-muted);line-height:1.7;margin-bottom:14px;flex:1;}
.reasons-list{margin-bottom:14px;}
.reason-item{display:flex;align-items:center;gap:6px;font-size:11px;color:var(--d-muted);margin-bottom:4px;}
.reason-item::before{content:'✓';color:var(--d-green);font-weight:700;flex-shrink:0;}
.btn-reco{display:inline-flex;align-items:center;gap:6px;padding:9px 18px;
  background:var(--d-blue);color:#fff;border-radius:6px;font-family:'Syne',sans-serif;
  font-weight:700;font-size:12px;text-decoration:none;transition:background .2s;align-self:flex-start;}
.btn-reco:hover{background:var(--d-blue2);color:#fff;text-decoration:none;}
/* ── EMPTY ── */
.empty-state{text-align:center;padding:60px 20px;background:#fff;border:1px dashed var(--d-border);border-radius:10px;}
.empty-state .ei{font-size:48px;margin-bottom:16px;}
.empty-state h3{font-family:'Syne',sans-serif;font-size:18px;font-weight:700;color:var(--d-text);margin-bottom:8px;}
.empty-state p{font-size:14px;color:var(--d-muted);max-width:360px;margin:0 auto 20px;line-height:1.7;}
/* ── HISTORY ── */
.history-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-top:32px;}
.history-title{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:16px;}
.history-table{width:100%;border-collapse:collapse;font-size:13px;}
.history-table th{text-align:left;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;
  color:var(--d-muted);padding:0 12px 10px;border-bottom:1px solid var(--d-border);}
.history-table td{padding:10px 12px;border-bottom:1px solid var(--d-border);color:var(--d-text);}
.history-table tr:last-child td{border-bottom:none;}
.score-pill{display:inline-block;padding:2px 10px;border-radius:20px;font-weight:700;font-size:11px;}
.score-high{background:rgba(39,174,96,.1);color:var(--d-green);}
.score-mid{background:rgba(243,156,18,.1);color:#e67e22;}
.score-low{background:rgba(231,76,60,.08);color:#e74c3c;}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 96
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

        // line 97
        yield "<div class=\"reco-page\">

  ";
        // line 100
        yield "  <nav class=\"breadcrumb\" aria-label=\"Fil d'Ariane\">
    <a href=\"";
        // line 101
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a>
    <span class=\"sep\">›</span>
    <a href=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
        yield "\">Cours Fintech</a>
    <span class=\"sep\">›</span>
    <span class=\"current\">Recommandations</span>
  </nav>

  ";
        // line 109
        yield "  <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
        yield "\" class=\"btn-back\">
    <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\"><path d=\"M9 2L4 7l5 5\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>
    Retour aux cours
  </a>

  ";
        // line 115
        yield "  <div class=\"reco-header\">
    <div class=\"reco-tag\">Personnalisé pour vous</div>
    <h1>Vos recommandations de cours</h1>
    <p>Basées sur vos résultats de quiz, votre niveau détecté et vos points à renforcer.</p>
  </div>

  ";
        // line 122
        yield "  <div class=\"stats-row\">
    <div class=\"stat-card\">
      <div class=\"sv\">";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["avg_score"]) || array_key_exists("avg_score", $context) ? $context["avg_score"] : (function () { throw new RuntimeError('Variable "avg_score" does not exist.', 124, $this->source); })()), 0), "html", null, true);
        yield "%</div>
      <div class=\"sl\">Score moyen</div>
    </div>
    <div class=\"stat-card\">
      <div class=\"sv\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 128, $this->source); })())), "html", null, true);
        yield "</div>
      <div class=\"sl\">Quiz passés</div>
    </div>
    <div class=\"stat-card\">
      <div class=\"sv\" style=\"text-transform:capitalize;\">";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["inferred_level"]) || array_key_exists("inferred_level", $context) ? $context["inferred_level"] : (function () { throw new RuntimeError('Variable "inferred_level" does not exist.', 132, $this->source); })()), "html", null, true);
        yield "</div>
      <div class=\"sl\">Niveau détecté</div>
    </div>
  </div>

  ";
        // line 138
        yield "  ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 138, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 139
            yield "  <div class=\"weak-block\">
    <div class=\"weak-title\">⚠️ Points à renforcer</div>
    <div class=\"topic-chips\">
      ";
            // line 142
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["weak_topics"]) || array_key_exists("weak_topics", $context) ? $context["weak_topics"] : (function () { throw new RuntimeError('Variable "weak_topics" does not exist.', 142, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                // line 143
                yield "        <span class=\"topic-chip\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["topic"], "html", null, true);
                yield "</span>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['topic'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 145
            yield "    </div>
  </div>
  ";
        }
        // line 148
        yield "
  ";
        // line 150
        yield "  <div class=\"level-bar\">
    <span>Filtrer par niveau :</span>
    <a href=\"";
        // line 152
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recommandations");
        yield "\"
       class=\"level-btn ";
        // line 153
        if ((((isset($context["selected_niveau"]) || array_key_exists("selected_niveau", $context) ? $context["selected_niveau"] : (function () { throw new RuntimeError('Variable "selected_niveau" does not exist.', 153, $this->source); })()) == (isset($context["inferred_level"]) || array_key_exists("inferred_level", $context) ? $context["inferred_level"] : (function () { throw new RuntimeError('Variable "inferred_level" does not exist.', 153, $this->source); })())) && (null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 153, $this->source); })()), "request", [], "any", false, false, false, 153), "query", [], "any", false, false, false, 153), "get", ["niveau"], "method", false, false, false, 153)))) {
            yield "active";
        }
        yield "\">
      Auto (";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["inferred_level"]) || array_key_exists("inferred_level", $context) ? $context["inferred_level"] : (function () { throw new RuntimeError('Variable "inferred_level" does not exist.', 154, $this->source); })()), "html", null, true);
        yield ")
    </a>
    ";
        // line 156
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(["debutant", "intermediaire", "avance"]);
        foreach ($context['_seq'] as $context["_key"] => $context["lvl"]) {
            // line 157
            yield "      <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recommandations", ["niveau" => $context["lvl"]]), "html", null, true);
            yield "\"
         class=\"level-btn ";
            // line 158
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 158, $this->source); })()), "request", [], "any", false, false, false, 158), "query", [], "any", false, false, false, 158), "get", ["niveau"], "method", false, false, false, 158) == $context["lvl"])) {
                yield "active";
            }
            yield "\">
        ";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["lvl"]), "html", null, true);
            yield "
      </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['lvl'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        yield "  </div>

  ";
        // line 165
        yield "  ";
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recommendations"]) || array_key_exists("recommendations", $context) ? $context["recommendations"] : (function () { throw new RuntimeError('Variable "recommendations" does not exist.', 165, $this->source); })()))) {
            // line 166
            yield "    <div class=\"empty-state\">
      <div class=\"ei\">🎓</div>
      <h3>Aucune recommandation disponible</h3>
      <p>Passez quelques quiz pour que nous puissions personnaliser vos recommandations.</p>
      <a href=\"";
            // line 170
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
            yield "\" class=\"btn-reco\">Parcourir les cours</a>
    </div>
  ";
        } else {
            // line 173
            yield "    <div class=\"reco-grid\">
      ";
            // line 174
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recommendations"]) || array_key_exists("recommendations", $context) ? $context["recommendations"] : (function () { throw new RuntimeError('Variable "recommendations" does not exist.', 174, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 175
                yield "        ";
                $context["cours"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "cours", [], "any", false, false, false, 175);
                // line 176
                yield "        ";
                $context["niveau"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["cours"] ?? null), "niveau", [], "any", true, true, false, 176) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 176, $this->source); })()), "niveau", [], "any", false, false, false, 176)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 176, $this->source); })()), "niveau", [], "any", false, false, false, 176)) : ("unknown"));
                // line 177
                yield "        <div class=\"reco-card\">
          <div class=\"card-top\">
            <span class=\"niveau-badge niveau-";
                // line 179
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["niveau"]) || array_key_exists("niveau", $context) ? $context["niveau"] : (function () { throw new RuntimeError('Variable "niveau" does not exist.', 179, $this->source); })()), "html", null, true);
                yield "\">
              ";
                // line 180
                yield ((((isset($context["niveau"]) || array_key_exists("niveau", $context) ? $context["niveau"] : (function () { throw new RuntimeError('Variable "niveau" does not exist.', 180, $this->source); })()) == "debutant")) ? ("Débutant") : (((((isset($context["niveau"]) || array_key_exists("niveau", $context) ? $context["niveau"] : (function () { throw new RuntimeError('Variable "niveau" does not exist.', 180, $this->source); })()) == "intermediaire")) ? ("Intermédiaire") : (((((isset($context["niveau"]) || array_key_exists("niveau", $context) ? $context["niveau"] : (function () { throw new RuntimeError('Variable "niveau" does not exist.', 180, $this->source); })()) == "avance")) ? ("Avancé") : ("Tous niveaux"))))));
                yield "
            </span>
            <span class=\"score-badge\">";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "score", [], "any", false, false, false, 182), "html", null, true);
                yield " pts</span>
          </div>
          <h4>";
                // line 184
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 184, $this->source); })()), "nomCours", [], "any", false, false, false, 184), "html", null, true);
                yield "</h4>
          <p>";
                // line 185
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["cours"] ?? null), "description", [], "any", true, true, false, 185)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 185, $this->source); })()), "description", [], "any", false, false, false, 185), "Aucune description disponible.")) : ("Aucune description disponible.")), 0, 110), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 185, $this->source); })()), "description", [], "any", false, false, false, 185)) > 110)) {
                    yield "…";
                }
                yield "</p>
          ";
                // line 186
                if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "reasons", [], "any", false, false, false, 186))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 187
                    yield "            <div class=\"reasons-list\">
              ";
                    // line 188
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "reasons", [], "any", false, false, false, 188));
                    foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
                        // line 189
                        yield "                <div class=\"reason-item\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["reason"], "html", null, true);
                        yield "</div>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['reason'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 191
                    yield "            </div>
          ";
                }
                // line 193
                yield "          <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index", (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 193, $this->source); })()), "id", [], "any", false, false, false, 193)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["cours"]) || array_key_exists("cours", $context) ? $context["cours"] : (function () { throw new RuntimeError('Variable "cours" does not exist.', 193, $this->source); })()), "id", [], "any", false, false, false, 193)]) : ([]))), "html", null, true);
                yield "\" class=\"btn-reco\">
            Commencer →
          </a>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 198
            yield "    </div>
  ";
        }
        // line 200
        yield "
  ";
        // line 202
        yield "  ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 202, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 203
            yield "    <div class=\"history-block\">
      <div class=\"history-title\">📋 Historique de vos quiz</div>
      <table class=\"history-table\">
        <thead>
          <tr>
            <th>Quiz</th>
            <th>Cours</th>
            <th>Score</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          ";
            // line 215
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 215, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 216
                yield "            ";
                $context["pct"] = CoreExtension::getAttribute($this->env, $this->source, $context["r"], "scorePourcentage", [], "any", false, false, false, 216);
                // line 217
                yield "            <tr>
              <td>";
                // line 218
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "quiz", [], "any", false, true, false, 218), "titre", [], "any", true, true, false, 218) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "quiz", [], "any", false, false, false, 218), "titre", [], "any", false, false, false, 218)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "quiz", [], "any", false, false, false, 218), "titre", [], "any", false, false, false, 218), "html", null, true)) : ("—"));
                yield "</td>
              <td>";
                // line 219
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "quiz", [], "any", false, false, false, 219), "cours", [], "any", false, false, false, 219)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "quiz", [], "any", false, false, false, 219), "cours", [], "any", false, false, false, 219), "nomCours", [], "any", false, false, false, 219), "html", null, true)) : ("—"));
                yield "</td>
              <td>
                <span class=\"score-pill ";
                // line 221
                if (((isset($context["pct"]) || array_key_exists("pct", $context) ? $context["pct"] : (function () { throw new RuntimeError('Variable "pct" does not exist.', 221, $this->source); })()) >= 70)) {
                    yield "score-high";
                } elseif (((isset($context["pct"]) || array_key_exists("pct", $context) ? $context["pct"] : (function () { throw new RuntimeError('Variable "pct" does not exist.', 221, $this->source); })()) >= 40)) {
                    yield "score-mid";
                } else {
                    yield "score-low";
                }
                yield "\">
                  ";
                // line 222
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["pct"]) || array_key_exists("pct", $context) ? $context["pct"] : (function () { throw new RuntimeError('Variable "pct" does not exist.', 222, $this->source); })()), 0), "html", null, true);
                yield "%
                </span>
              </td>
              <td>";
                // line 225
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "datePassage", [], "any", false, false, false, 225), "d/m/Y"), "html", null, true);
                yield "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 228
            yield "        </tbody>
      </table>
    </div>
  ";
        }
        // line 232
        yield "
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
        return "client/recommandations/index.html.twig";
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
        return array (  517 => 232,  511 => 228,  502 => 225,  496 => 222,  486 => 221,  481 => 219,  477 => 218,  474 => 217,  471 => 216,  467 => 215,  453 => 203,  450 => 202,  447 => 200,  443 => 198,  431 => 193,  427 => 191,  418 => 189,  414 => 188,  411 => 187,  409 => 186,  402 => 185,  398 => 184,  393 => 182,  388 => 180,  384 => 179,  380 => 177,  377 => 176,  374 => 175,  370 => 174,  367 => 173,  361 => 170,  355 => 166,  352 => 165,  348 => 162,  339 => 159,  333 => 158,  328 => 157,  324 => 156,  319 => 154,  313 => 153,  309 => 152,  305 => 150,  302 => 148,  297 => 145,  288 => 143,  284 => 142,  279 => 139,  276 => 138,  268 => 132,  261 => 128,  254 => 124,  250 => 122,  242 => 115,  233 => 109,  225 => 103,  220 => 101,  217 => 100,  213 => 97,  200 => 96,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Recommandations — Dinari{% endblock %}

{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root{--d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;--d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:#f5f7fa;color:var(--d-text);}
.reco-page{max-width:1100px;margin:0 auto;padding:40px 30px 80px;}
/* ── BREADCRUMB ── */
.breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--d-muted);margin-bottom:20px;flex-wrap:wrap;}
.breadcrumb a{color:var(--d-muted);text-decoration:none;transition:color .2s;}
.breadcrumb a:hover{color:var(--d-blue);}
.breadcrumb .sep{font-size:11px;color:var(--d-border);}
.breadcrumb .current{color:var(--d-text);font-weight:600;}
/* ── BACK BUTTON ── */
.btn-back{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;
  background:#fff;color:var(--d-text);border:1.5px solid var(--d-border);border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:600;font-size:13px;text-decoration:none;
  transition:all .2s;margin-bottom:24px;}
.btn-back:hover{border-color:var(--d-blue);color:var(--d-blue);text-decoration:none;}
.btn-back svg{flex-shrink:0;}
/* ── HEADER ── */
.reco-header{background:var(--d-blue);border-radius:12px;padding:36px 40px;margin-bottom:32px;position:relative;overflow:hidden;}
.reco-header::after{content:'';position:absolute;right:-40px;top:-40px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.06);}
.reco-tag{font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:8px;}
.reco-header h1{font-family:'Syne',sans-serif;font-size:26px;font-weight:700;color:#fff;margin-bottom:8px;}
.reco-header p{font-size:14px;color:rgba(255,255,255,.7);max-width:520px;line-height:1.75;}
/* ── STATS ROW ── */
.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:28px;}
.stat-card{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:20px 22px;}
.stat-card .sv{font-family:'Syne',sans-serif;font-size:28px;font-weight:800;color:var(--d-blue);line-height:1;}
.stat-card .sl{font-size:12px;color:var(--d-muted);margin-top:4px;text-transform:uppercase;letter-spacing:1px;}
/* ── LEVEL FILTER ── */
.level-bar{display:flex;align-items:center;gap:10px;margin-bottom:28px;flex-wrap:wrap;}
.level-bar span{font-size:13px;font-weight:600;color:var(--d-muted);}
.level-btn{padding:8px 18px;border-radius:20px;border:1.5px solid var(--d-border);background:#fff;
  font-size:13px;font-weight:600;cursor:pointer;color:var(--d-text);transition:all .2s;text-decoration:none;display:inline-block;}
.level-btn:hover{border-color:var(--d-blue);color:var(--d-blue);}
.level-btn.active{background:var(--d-blue);color:#fff;border-color:var(--d-blue);}
/* ── WEAK TOPICS ── */
.weak-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:20px 24px;margin-bottom:28px;}
.weak-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:12px;display:flex;align-items:center;gap:8px;}
.topic-chips{display:flex;flex-wrap:wrap;gap:8px;}
.topic-chip{padding:5px 14px;border-radius:20px;font-size:12px;font-weight:700;
  background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.no-weak{font-size:13px;color:var(--d-muted);}
/* ── GRID ── */
.reco-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}
@media(max-width:900px){.reco-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:600px){.reco-grid{grid-template-columns:1fr;}.stats-row{grid-template-columns:1fr;}}
/* ── CARD ── */
.reco-card{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;
  transition:box-shadow .25s,transform .25s;display:flex;flex-direction:column;}
.reco-card:hover{transform:translateY(-4px);box-shadow:0 12px 36px rgba(26,111,196,.1);border-color:rgba(26,111,196,.2);}
.card-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:12px;}
.niveau-badge{font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;
  padding:3px 10px;border-radius:3px;}
.niveau-debutant{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.2);}
.niveau-intermediaire{background:rgba(26,111,196,.1);color:var(--d-blue);border:1px solid rgba(26,111,196,.2);}
.niveau-avance{background:rgba(155,89,182,.1);color:#8e44ad;border:1px solid rgba(155,89,182,.2);}
.niveau-unknown{background:#f5f7fa;color:var(--d-muted);border:1px solid var(--d-border);}
.score-badge{font-family:'Syne',sans-serif;font-size:13px;font-weight:800;
  color:var(--d-blue);background:rgba(26,111,196,.08);padding:4px 10px;border-radius:20px;}
.reco-card h4{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:8px;line-height:1.35;}
.reco-card p{font-size:13px;color:var(--d-muted);line-height:1.7;margin-bottom:14px;flex:1;}
.reasons-list{margin-bottom:14px;}
.reason-item{display:flex;align-items:center;gap:6px;font-size:11px;color:var(--d-muted);margin-bottom:4px;}
.reason-item::before{content:'✓';color:var(--d-green);font-weight:700;flex-shrink:0;}
.btn-reco{display:inline-flex;align-items:center;gap:6px;padding:9px 18px;
  background:var(--d-blue);color:#fff;border-radius:6px;font-family:'Syne',sans-serif;
  font-weight:700;font-size:12px;text-decoration:none;transition:background .2s;align-self:flex-start;}
.btn-reco:hover{background:var(--d-blue2);color:#fff;text-decoration:none;}
/* ── EMPTY ── */
.empty-state{text-align:center;padding:60px 20px;background:#fff;border:1px dashed var(--d-border);border-radius:10px;}
.empty-state .ei{font-size:48px;margin-bottom:16px;}
.empty-state h3{font-family:'Syne',sans-serif;font-size:18px;font-weight:700;color:var(--d-text);margin-bottom:8px;}
.empty-state p{font-size:14px;color:var(--d-muted);max-width:360px;margin:0 auto 20px;line-height:1.7;}
/* ── HISTORY ── */
.history-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-top:32px;}
.history-title{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:16px;}
.history-table{width:100%;border-collapse:collapse;font-size:13px;}
.history-table th{text-align:left;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;
  color:var(--d-muted);padding:0 12px 10px;border-bottom:1px solid var(--d-border);}
.history-table td{padding:10px 12px;border-bottom:1px solid var(--d-border);color:var(--d-text);}
.history-table tr:last-child td{border-bottom:none;}
.score-pill{display:inline-block;padding:2px 10px;border-radius:20px;font-weight:700;font-size:11px;}
.score-high{background:rgba(39,174,96,.1);color:var(--d-green);}
.score-mid{background:rgba(243,156,18,.1);color:#e67e22;}
.score-low{background:rgba(231,76,60,.08);color:#e74c3c;}
</style>
{% endblock %}

{% block body %}
<div class=\"reco-page\">

  {# ── BREADCRUMB ── #}
  <nav class=\"breadcrumb\" aria-label=\"Fil d'Ariane\">
    <a href=\"{{ path('app_home') }}\">Accueil</a>
    <span class=\"sep\">›</span>
    <a href=\"{{ path('app_cours_index') }}\">Cours Fintech</a>
    <span class=\"sep\">›</span>
    <span class=\"current\">Recommandations</span>
  </nav>

  {# ── BACK BUTTON ── #}
  <a href=\"{{ path('app_cours_index') }}\" class=\"btn-back\">
    <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\"><path d=\"M9 2L4 7l5 5\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>
    Retour aux cours
  </a>

  {# ── HEADER ── #}
  <div class=\"reco-header\">
    <div class=\"reco-tag\">Personnalisé pour vous</div>
    <h1>Vos recommandations de cours</h1>
    <p>Basées sur vos résultats de quiz, votre niveau détecté et vos points à renforcer.</p>
  </div>

  {# ── STATS ── #}
  <div class=\"stats-row\">
    <div class=\"stat-card\">
      <div class=\"sv\">{{ avg_score|number_format(0) }}%</div>
      <div class=\"sl\">Score moyen</div>
    </div>
    <div class=\"stat-card\">
      <div class=\"sv\">{{ history|length }}</div>
      <div class=\"sl\">Quiz passés</div>
    </div>
    <div class=\"stat-card\">
      <div class=\"sv\" style=\"text-transform:capitalize;\">{{ inferred_level }}</div>
      <div class=\"sl\">Niveau détecté</div>
    </div>
  </div>

  {# ── WEAK TOPICS ── #}
  {% if weak_topics is not empty %}
  <div class=\"weak-block\">
    <div class=\"weak-title\">⚠️ Points à renforcer</div>
    <div class=\"topic-chips\">
      {% for topic in weak_topics %}
        <span class=\"topic-chip\">{{ topic }}</span>
      {% endfor %}
    </div>
  </div>
  {% endif %}

  {# ── LEVEL FILTER ── #}
  <div class=\"level-bar\">
    <span>Filtrer par niveau :</span>
    <a href=\"{{ path('app_recommandations') }}\"
       class=\"level-btn {% if selected_niveau == inferred_level and app.request.query.get('niveau') is null %}active{% endif %}\">
      Auto ({{ inferred_level }})
    </a>
    {% for lvl in ['debutant', 'intermediaire', 'avance'] %}
      <a href=\"{{ path('app_recommandations', {niveau: lvl}) }}\"
         class=\"level-btn {% if app.request.query.get('niveau') == lvl %}active{% endif %}\">
        {{ lvl|capitalize }}
      </a>
    {% endfor %}
  </div>

  {# ── RECOMMENDATIONS GRID ── #}
  {% if recommendations is empty %}
    <div class=\"empty-state\">
      <div class=\"ei\">🎓</div>
      <h3>Aucune recommandation disponible</h3>
      <p>Passez quelques quiz pour que nous puissions personnaliser vos recommandations.</p>
      <a href=\"{{ path('app_cours_index') }}\" class=\"btn-reco\">Parcourir les cours</a>
    </div>
  {% else %}
    <div class=\"reco-grid\">
      {% for item in recommendations %}
        {% set cours = item.cours %}
        {% set niveau = cours.niveau ?? 'unknown' %}
        <div class=\"reco-card\">
          <div class=\"card-top\">
            <span class=\"niveau-badge niveau-{{ niveau }}\">
              {{ niveau == 'debutant' ? 'Débutant' : (niveau == 'intermediaire' ? 'Intermédiaire' : (niveau == 'avance' ? 'Avancé' : 'Tous niveaux')) }}
            </span>
            <span class=\"score-badge\">{{ item.score }} pts</span>
          </div>
          <h4>{{ cours.nomCours }}</h4>
          <p>{{ cours.description|default('Aucune description disponible.')|slice(0, 110) }}{% if cours.description|length > 110 %}…{% endif %}</p>
          {% if item.reasons is not empty %}
            <div class=\"reasons-list\">
              {% for reason in item.reasons %}
                <div class=\"reason-item\">{{ reason }}</div>
              {% endfor %}
            </div>
          {% endif %}
          <a href=\"{{ path('app_cours_index', cours.id ? {id: cours.id} : {}) }}\" class=\"btn-reco\">
            Commencer →
          </a>
        </div>
      {% endfor %}
    </div>
  {% endif %}

  {# ── QUIZ HISTORY ── #}
  {% if history is not empty %}
    <div class=\"history-block\">
      <div class=\"history-title\">📋 Historique de vos quiz</div>
      <table class=\"history-table\">
        <thead>
          <tr>
            <th>Quiz</th>
            <th>Cours</th>
            <th>Score</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          {% for r in history %}
            {% set pct = r.scorePourcentage %}
            <tr>
              <td>{{ r.quiz.titre ?? '—' }}</td>
              <td>{{ r.quiz.cours ? r.quiz.cours.nomCours : '—' }}</td>
              <td>
                <span class=\"score-pill {% if pct >= 70 %}score-high{% elseif pct >= 40 %}score-mid{% else %}score-low{% endif %}\">
                  {{ pct|number_format(0) }}%
                </span>
              </td>
              <td>{{ r.datePassage|date('d/m/Y') }}</td>
            </tr>
          {% endfor %}
        </tbody>
      </table>
    </div>
  {% endif %}

</div>
{% endblock %}
", "client/recommandations/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\recommandations\\index.html.twig");
    }
}
