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

/* client/cours/index.html.twig */
class __TwigTemplate_9396b2f5c4a2d833dc5604a29ede78b8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/cours/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/cours/index.html.twig"));

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

        yield "Cours Fintech — Dinari";
        
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
  --d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;
  --d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;
}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:#fff;color:var(--d-text);}
/* Full-width layout override */
.cours-page{display:flex;min-height:100vh;padding-top:70px;width:100%;}
/* SIDEBAR */
.sidebar{width:272px;flex-shrink:0;background:#fff;border-right:1px solid var(--d-border);
  position:sticky;top:70px;height:calc(100vh - 70px);overflow-y:auto;padding:24px 0;}
.sidebar-header{padding:0 20px 18px;border-bottom:1px solid var(--d-border);}
.sidebar-header .ctitle{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:10px;}
.prog-label{display:flex;justify-content:space-between;font-size:11px;color:var(--d-muted);margin-bottom:5px;}
.prog-bg{height:5px;background:var(--d-border);border-radius:3px;overflow:hidden;}
.prog-fill{height:100%;background:var(--d-blue);border-radius:3px;transition:width .4s;}
.sb-section{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;
  color:var(--d-muted);padding:0 20px;margin:14px 0 6px;}
.ch-item{display:flex;align-items:center;gap:10px;padding:9px 20px;cursor:pointer;
  border-left:3px solid transparent;text-decoration:none;transition:background .2s;}
.ch-item:hover{background:var(--d-light);}
.ch-item.active{background:#eef4fd;border-left-color:var(--d-blue);}
.ch-item.done .ch-ico{background:var(--d-green);color:#fff;}
.ch-ico{width:26px;height:26px;border-radius:50%;background:var(--d-border);
  display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;
  color:var(--d-muted);flex-shrink:0;transition:background .3s;}
.ch-item.active .ch-ico{background:var(--d-blue);color:#fff;}
.ch-lbl{font-size:13px;font-weight:500;color:var(--d-text);line-height:1.3;}
.ch-sub{font-size:11px;color:var(--d-muted);margin-top:1px;}
/* MAIN */
.main-content{flex:1;min-width:0;overflow-y:auto;background:var(--d-light);}
.content-inner{padding:36px 40px 80px;}
.chapter-panel{display:none;}
.chapter-panel.active{display:block;}
/* HERO */
.ch-hero{background:var(--d-blue);border-radius:12px;padding:32px;margin-bottom:28px;position:relative;overflow:hidden;}
.ch-hero::after{content:'';position:absolute;right:-30px;top:-30px;width:160px;height:160px;
  border-radius:50%;background:rgba(255,255,255,.06);}
.ch-tag{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;
  color:rgba(255,255,255,.6);margin-bottom:8px;}
.ch-hero h1{font-family:'Syne',sans-serif;font-size:24px;font-weight:700;color:#fff;margin-bottom:8px;}
.ch-hero p{font-size:14px;color:rgba(255,255,255,.7);line-height:1.75;max-width:480px;}
/* BLOCKS */
.cblock{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:18px;}
.btitle{font-family:'Syne',sans-serif;font-size:16px;font-weight:700;color:var(--d-text);
  margin-bottom:12px;display:flex;align-items:center;gap:8px;}
.btitle .ico{width:30px;height:30px;background:#eef4fd;border-radius:7px;
  display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
.cblock p{font-size:14px;color:var(--d-muted);line-height:1.85;margin-bottom:10px;}
.cblock p:last-child{margin-bottom:0;}
.hbox{background:#eef4fd;border-left:4px solid var(--d-blue);border-radius:0 8px 8px 0;
  padding:14px 18px;margin:14px 0;font-size:14px;color:var(--d-text);line-height:1.75;}
.img-block{border-radius:10px;overflow:hidden;margin:14px 0;}
.img-block img{width:100%;height:200px;object-fit:cover;display:block;}
.img-cap{font-size:11px;color:var(--d-muted);text-align:center;padding:6px 0 0;font-style:italic;}
.video-block{border-radius:10px;overflow:hidden;margin:14px 0;position:relative;padding-bottom:56.25%;height:0;}
.video-block iframe{position:absolute;top:0;left:0;width:100%;height:100%;border:none;}
.ex-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-top:12px;}
.ex-card{background:var(--d-light);border:1px solid var(--d-border);border-radius:8px;padding:14px;}
.ex-card .en{font-family:'Syne',sans-serif;font-size:20px;font-weight:800;color:rgba(26,111,196,.18);margin-bottom:4px;}
.ex-card h5{font-size:13px;font-weight:700;color:var(--d-text);margin-bottom:3px;}
.ex-card p{font-size:12px;color:var(--d-muted);line-height:1.6;margin:0;}
/* QUIZ */
.quiz-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:18px;}
.quiz-ttl{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);
  margin-bottom:18px;display:flex;align-items:center;gap:8px;}
.quiz-ttl .badge{background:rgba(26,111,196,.1);color:var(--d-blue);font-size:10px;font-weight:700;
  letter-spacing:1.5px;text-transform:uppercase;padding:3px 9px;border-radius:20px;}
.quiz-q{margin-bottom:18px;}
.quiz-q p{font-size:14px;font-weight:600;color:var(--d-text);margin-bottom:10px;}
.qopt{display:flex;align-items:center;gap:9px;padding:9px 12px;border:1.5px solid var(--d-border);
  border-radius:7px;margin-bottom:7px;cursor:pointer;transition:all .2s;font-size:13px;color:var(--d-text);}
.qopt:hover{border-color:var(--d-blue);background:#eef4fd;}
.qopt input{accent-color:var(--d-blue);}
.qopt.correct{border-color:var(--d-green);background:rgba(39,174,96,.07);color:var(--d-green);}
.qopt.wrong{border-color:#e74c3c;background:rgba(231,76,60,.07);color:#e74c3c;}
.btn-quiz{display:inline-flex;align-items:center;gap:7px;padding:10px 24px;background:var(--d-blue);
  color:#fff;border:none;border-radius:6px;font-family:'Syne',sans-serif;font-weight:700;
  font-size:13px;cursor:pointer;transition:background .25s;margin-top:6px;}
.btn-quiz:hover{background:var(--d-blue2);}
.qfeedback{margin-top:12px;padding:11px 14px;border-radius:7px;font-size:13px;font-weight:600;display:none;}
.qfeedback.ok{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.25);}
.qfeedback.ko{background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
/* TASKS */
.tasks-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:18px;}
.tasks-ttl{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:14px;}
.task-item{display:flex;align-items:flex-start;gap:10px;padding:10px 0;
  border-bottom:1px solid var(--d-border);cursor:pointer;}
.task-item:last-child{border-bottom:none;}
.tcheck{width:19px;height:19px;border:2px solid var(--d-border);border-radius:4px;flex-shrink:0;
  margin-top:1px;display:flex;align-items:center;justify-content:center;
  transition:all .2s;font-size:10px;color:transparent;}
.task-item.done .tcheck{background:var(--d-green);border-color:var(--d-green);color:#fff;}
.task-item.done .tlbl{text-decoration:line-through;color:var(--d-muted);}
.tlbl{font-size:13px;color:var(--d-text);line-height:1.5;}
.tsub{font-size:11px;color:var(--d-muted);margin-top:1px;}
/* NAV */
.ch-nav{display:flex;justify-content:space-between;align-items:center;
  margin-top:28px;padding-top:20px;border-top:1px solid var(--d-border);}
.btn-nav{display:inline-flex;align-items:center;gap:7px;padding:11px 22px;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:all .25s;
  text-decoration:none;border:none;}
.btn-prev{background:#fff;color:var(--d-text);border:1.5px solid var(--d-border);}
.btn-prev:hover{border-color:var(--d-blue);color:var(--d-blue);}
.btn-next{background:var(--d-blue);color:#fff;}
.btn-next:hover{background:var(--d-blue2);}
.btn-nav.hidden{visibility:hidden;}
@media(max-width:768px){
  .sidebar{position:fixed;left:-272px;top:70px;z-index:998;transition:left .3s;}
  .sidebar.open{left:0;}
  .content-inner{padding:20px 16px 60px;}
  .ex-grid{grid-template-columns:1fr;}
}
/* CHAPTER COMMENTS */
.chapter-comments-block{margin-top:32px;padding-top:28px;border-top:2px solid var(--d-border);}
.cc-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
.cc-title{font-family:'Syne',sans-serif;font-size:16px;font-weight:700;color:var(--d-text);}
.cc-count{font-size:11px;font-weight:700;color:var(--d-blue);background:rgba(26,111,196,.1);
  padding:3px 10px;border-radius:20px;}
.comments-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
.comments-title{font-family:'Syne',sans-serif;font-size:18px;font-weight:700;color:var(--d-text);}
.comments-count{font-size:12px;font-weight:700;color:var(--d-blue);background:rgba(26,111,196,.1);
  padding:4px 12px;border-radius:20px;}
/* Form */
.comment-form-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:24px;}
.cf-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:16px;}
.cf-error{background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.2);color:#e74c3c;
  border-radius:7px;padding:10px 14px;font-size:13px;margin-bottom:14px;}
.cf-row{display:grid;grid-template-columns:1fr;gap:12px;margin-bottom:12px;}
.cf-field{display:flex;flex-direction:column;gap:5px;margin-bottom:12px;}
.cf-field label{font-size:12px;font-weight:600;color:var(--d-text);}
.cf-field input,.cf-field textarea{
  padding:10px 14px;border:1.5px solid var(--d-border);border-radius:7px;
  font-size:13px;font-family:'DM Sans',sans-serif;color:var(--d-text);
  outline:none;transition:border-color .2s;resize:vertical;background:#fff;}
.cf-field input:focus,.cf-field textarea:focus{border-color:var(--d-blue);}
.cf-field input::placeholder,.cf-field textarea::placeholder{color:#b0bec5;}
.btn-comment{display:inline-flex;align-items:center;gap:7px;padding:11px 26px;
  background:var(--d-blue);color:#fff;border:none;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:background .25s;}
.btn-comment:hover{background:var(--d-blue2);}
/* List */
.no-comments{text-align:center;padding:32px;color:var(--d-muted);font-size:14px;
  background:#fff;border:1px dashed var(--d-border);border-radius:10px;}
.comments-list{display:flex;flex-direction:column;gap:14px;}
.comment-card{display:flex;gap:14px;background:#fff;border:1px solid var(--d-border);
  border-radius:10px;padding:18px;transition:box-shadow .2s;}
.comment-card:hover{box-shadow:0 4px 16px rgba(26,111,196,.08);}
.comment-avatar{width:38px;height:38px;border-radius:50%;background:var(--d-blue);
  display:flex;align-items:center;justify-content:center;font-family:'Syne',sans-serif;
  font-weight:700;font-size:15px;color:#fff;flex-shrink:0;}
.comment-body{flex:1;min-width:0;}
.comment-meta{display:flex;align-items:center;gap:10px;margin-bottom:8px;flex-wrap:wrap;}
.comment-author{font-family:'Syne',sans-serif;font-size:13px;font-weight:700;color:var(--d-text);}
.comment-date{font-size:11px;color:var(--d-muted);}
.comment-text{font-size:13px;color:var(--d-muted);line-height:1.75;margin:0;word-break:break-word;}
.comment-mine{font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;
  color:var(--d-blue);background:rgba(26,111,196,.1);padding:2px 8px;border-radius:20px;}
/* inline actions */
.comment-card{position:relative;}
.comment-owner-actions{position:absolute;top:14px;right:14px;display:flex;gap:6px;}
.btn-icon{width:28px;height:28px;border-radius:6px;border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;font-size:13px;
  transition:all .2s;background:var(--d-light);}
.btn-icon:hover{transform:scale(1.1);}
.btn-icon-edit:hover{background:#eef4fd;}
.btn-icon-del:hover{background:rgba(231,76,60,.1);}
/* inline edit mode */
.comment-view{display:block;}
.comment-edit{display:none;}
.comment-card.editing .comment-view{display:none;}
.comment-card.editing .comment-edit{display:block;}
.inline-textarea{width:100%;padding:10px 12px;border:1.5px solid var(--d-blue);border-radius:7px;
  font-size:13px;font-family:'DM Sans',sans-serif;color:var(--d-text);
  resize:vertical;outline:none;min-height:80px;background:#fff;margin-bottom:10px;}
.inline-edit-actions{display:flex;gap:8px;}
.btn-inline-save{padding:7px 18px;background:var(--d-blue);color:#fff;border:none;
  border-radius:5px;font-family:'Syne',sans-serif;font-weight:700;font-size:12px;cursor:pointer;transition:background .2s;}
.btn-inline-save:hover{background:var(--d-blue2);}
.btn-inline-cancel{padding:7px 14px;background:#fff;color:var(--d-muted);
  border:1.5px solid var(--d-border);border-radius:5px;font-size:12px;cursor:pointer;transition:all .2s;}
.btn-inline-cancel:hover{border-color:var(--d-muted);}
.delete-form{display:inline;margin:0;padding:0;}
/* REACTIONS */
.reactions-bar{display:flex;align-items:center;gap:6px;margin-top:10px;flex-wrap:wrap;}
.reaction-chip{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;
  border-radius:20px;border:1.5px solid var(--d-border);background:#fff;
  font-size:12px;cursor:pointer;transition:all .2s;user-select:none;}
.reaction-chip:hover{border-color:var(--d-blue);background:#eef4fd;}
.reaction-chip.active{border-color:var(--d-blue);background:#eef4fd;color:var(--d-blue);}
.reaction-chip .rc{font-size:14px;}
.reaction-chip .rn{font-weight:700;color:var(--d-text);font-size:11px;}
.reaction-chip.active .rn{color:var(--d-blue);}
.btn-add-reaction{display:inline-flex;align-items:center;justify-content:center;
  width:28px;height:28px;border-radius:20px;border:1.5px dashed var(--d-border);
  background:#fff;cursor:pointer;font-size:14px;transition:all .2s;position:relative;}
.btn-add-reaction:hover{border-color:var(--d-blue);background:#eef4fd;}
.emoji-picker{position:absolute;bottom:34px;left:0;background:#fff;
  border:1px solid var(--d-border);border-radius:10px;
  box-shadow:0 8px 24px rgba(0,0,0,0.12);padding:8px;
  display:none;z-index:100;white-space:nowrap;}
.emoji-picker.open{display:flex;gap:4px;}
.ep-btn{background:none;border:none;font-size:18px;cursor:pointer;padding:4px 6px;
  border-radius:6px;transition:background .15s;}
.ep-btn:hover{background:var(--d-light);}
.reaction-wrap{position:relative;display:inline-flex;}
/* QUIZ FINAL */
.fq-intro{text-align:center;}
.fq-intro{background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:32px;text-align:center;}
.fq-intro-icon{font-size:40px;margin-bottom:12px;}
.fq-intro-title{font-family:'Syne',sans-serif;font-size:20px;font-weight:700;color:var(--d-text);margin-bottom:8px;}
.fq-intro-sub{font-size:14px;color:var(--d-muted);margin-bottom:24px;line-height:1.7;}
.fq-meta{display:flex;justify-content:center;gap:24px;margin-bottom:24px;flex-wrap:wrap;}
.fq-meta-item{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--d-muted);}
.fq-meta-item span:first-child{font-size:16px;}
.btn-start-fq{display:inline-flex;align-items:center;gap:8px;padding:13px 32px;
  background:var(--d-blue);color:#fff;border:none;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:15px;cursor:pointer;transition:all .25s;}
.btn-start-fq:hover{background:var(--d-blue2);transform:translateY(-2px);}
.fq-body{display:none;}
.fq-body.active{display:block;}
.fq-progress-wrap{margin-bottom:24px;}
.fq-progress-top{display:flex;justify-content:space-between;font-size:12px;color:var(--d-muted);margin-bottom:6px;}
.fq-progress-bg{height:6px;background:var(--d-border);border-radius:3px;overflow:hidden;}
.fq-progress-fill{height:100%;background:var(--d-blue);border-radius:3px;transition:width .4s;}
.fq-question-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:14px;display:none;}
.fq-question-block.active{display:block;animation:fqIn .3s ease;}
@keyframes fqIn{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
.fq-q-num{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--d-blue);margin-bottom:8px;}
.fq-q-text{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:16px;line-height:1.5;}
.fq-option{display:flex;align-items:center;gap:10px;padding:11px 14px;
  border:1.5px solid var(--d-border);border-radius:8px;margin-bottom:8px;
  cursor:pointer;transition:all .2s;font-size:13px;color:var(--d-text);}
.fq-option:hover{border-color:var(--d-blue);background:#eef4fd;}
.fq-option input{accent-color:var(--d-blue);flex-shrink:0;}
.fq-option.correct{border-color:var(--d-green);background:rgba(39,174,96,.08);color:var(--d-green);font-weight:600;}
.fq-option.wrong{border-color:#e74c3c;background:rgba(231,76,60,.07);color:#e74c3c;}
.fq-option.disabled{pointer-events:none;}
.fq-nav{display:flex;justify-content:space-between;align-items:center;margin-top:20px;}
.btn-fq-nav{display:inline-flex;align-items:center;gap:7px;padding:10px 22px;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:all .25s;border:none;}
.btn-fq-prev{background:#fff;color:var(--d-text);border:1.5px solid var(--d-border);}
.btn-fq-prev:hover{border-color:var(--d-blue);color:var(--d-blue);}
.btn-fq-next{background:var(--d-blue);color:#fff;}
.btn-fq-next:hover{background:var(--d-blue2);}
.btn-fq-submit{background:var(--d-green);color:#fff;}
.btn-fq-submit:hover{background:#219a52;}
.fq-result{display:none;background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:36px;text-align:center;}
.fq-result.active{display:block;animation:fqIn .4s ease;}
.fq-score-circle{width:110px;height:110px;border-radius:50%;margin:0 auto 20px;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  font-family:'Syne',sans-serif;border:4px solid var(--d-blue);}
.fq-score-circle.great{border-color:var(--d-green);}
.fq-score-circle.ok{border-color:#f39c12;}
.fq-score-circle.low{border-color:#e74c3c;}
.fq-score-num{font-size:28px;font-weight:800;color:var(--d-text);line-height:1;}
.fq-score-total{font-size:12px;color:var(--d-muted);}
.fq-result-title{font-family:'Syne',sans-serif;font-size:20px;font-weight:700;color:var(--d-text);margin-bottom:8px;}
.fq-result-msg{font-size:14px;color:var(--d-muted);line-height:1.75;margin-bottom:24px;max-width:400px;margin-left:auto;margin-right:auto;}
.fq-result-badges{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-bottom:24px;}
.fq-badge{padding:5px 14px;border-radius:20px;font-size:12px;font-weight:700;}
.fq-badge-green{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.25);}
.fq-badge-blue{background:rgba(26,111,196,.1);color:var(--d-blue);border:1px solid rgba(26,111,196,.2);}
.fq-badge-red{background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.btn-retry{display:inline-flex;align-items:center;gap:7px;padding:11px 26px;
  background:#fff;color:var(--d-blue);border:1.5px solid var(--d-blue);border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:all .25s;}
.btn-retry:hover{background:#eef4fd;}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 279
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

        // line 280
        yield "
";
        // line 373
        $macros["self"] = $this;
        // line 374
        yield "<div class=\"cours-page\">

  ";
        // line 377
        yield "  <aside class=\"sidebar\" id=\"sidebar\">
    <div class=\"sidebar-header\">
      ";
        // line 379
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 379, $this->source); })())) > 1)) {
            // line 380
            yield "      <div style=\"margin-bottom:12px;\">
        <select onchange=\"window.location.href='";
            // line 381
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
            yield "?id='+this.value\"
                style=\"width:100%;padding:7px 10px;border:1.5px solid var(--d-border);border-radius:6px;font-size:13px;font-family:'DM Sans',sans-serif;color:var(--d-text);background:#fff;\">
          ";
            // line 383
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cours_list"]) || array_key_exists("cours_list", $context) ? $context["cours_list"] : (function () { throw new RuntimeError('Variable "cours_list" does not exist.', 383, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 384
                yield "            <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 384), "html", null, true);
                yield "\" ";
                if (((isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 384, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 384, $this->source); })()), "id", [], "any", false, false, false, 384) == CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 384)))) {
                    yield "selected";
                }
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "nomCours", [], "any", false, false, false, 384), "html", null, true);
                yield "</option>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 386
            yield "        </select>
      </div>
      ";
        }
        // line 389
        yield "      <div class=\"ctitle\">";
        yield (((($tmp = (isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 389, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 389, $this->source); })()), "nomCours", [], "any", false, false, false, 389), "html", null, true)) : ("Finance Personnelle"));
        yield "</div>
      <div class=\"prog-label\"><span>Progression</span><span id=\"prog-pct\">0%</span></div>
      <div class=\"prog-bg\"><div class=\"prog-fill\" id=\"prog-fill\" style=\"width:0%\"></div></div>
    </div>
    <nav>
      <div class=\"sb-section\">Chapitres</div>
      <a class=\"ch-item active\" href=\"#\" onclick=\"goTo(0);return false;\" data-ch=\"0\">
        <div class=\"ch-ico\">1</div>
        <div><div class=\"ch-lbl\">Introduction</div><div class=\"ch-sub\">Pourquoi gérer ses finances ?</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(1);return false;\" data-ch=\"1\">
        <div class=\"ch-ico\">2</div>
        <div><div class=\"ch-lbl\">Budget Personnel</div><div class=\"ch-sub\">Créer et suivre son budget</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(2);return false;\" data-ch=\"2\">
        <div class=\"ch-ico\">3</div>
        <div><div class=\"ch-lbl\">Épargne</div><div class=\"ch-sub\">Stratégies d'épargne efficaces</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(3);return false;\" data-ch=\"3\">
        <div class=\"ch-ico\">4</div>
        <div><div class=\"ch-lbl\">Gestion Financière</div><div class=\"ch-sub\">Contrôler ses dépenses</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(4);return false;\" data-ch=\"4\">
        <div class=\"ch-ico\">5</div>
        <div><div class=\"ch-lbl\">Investissement</div><div class=\"ch-sub\">Faire fructifier son argent</div></div>
      </a>
      <div class=\"sb-section\">Évaluation</div>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo('quiz');return false;\" data-ch=\"quiz\">
        <div class=\"ch-ico\" style=\"background:var(--d-green);color:#fff;font-size:12px;\">🏆</div>
        <div><div class=\"ch-lbl\">Quiz Final</div><div class=\"ch-sub\">Testez vos connaissances</div></div>
      </a>
    </nav>
  </aside>

  ";
        // line 424
        yield "  <main class=\"main-content\">
    <div class=\"content-inner\">

      ";
        // line 428
        yield "      <div style=\"display:flex;align-items:center;gap:8px;margin-bottom:24px;flex-wrap:wrap;\">
        <a href=\"";
        // line 429
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recommandations");
        yield "\"
           style=\"display:inline-flex;align-items:center;gap:6px;padding:7px 14px;
                  background:#eef4fd;color:#1a6fc4;border:1.5px solid #c3d9f5;
                  border-radius:20px;font-size:13px;font-weight:600;text-decoration:none;
                  transition:background .2s,border-color .2s;\">
          🎯 Recommandations
        </a>
        <a href=\"";
        // line 436
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_statistiques");
        yield "\"
           style=\"display:inline-flex;align-items:center;gap:6px;padding:7px 14px;
                  background:#eef4fd;color:#1a6fc4;border:1.5px solid #c3d9f5;
                  border-radius:20px;font-size:13px;font-weight:600;text-decoration:none;
                  transition:background .2s,border-color .2s;\">
          📊 Statistiques
        </a>
        <a href=\"";
        // line 443
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notifications");
        yield "\"
           style=\"display:inline-flex;align-items:center;gap:6px;padding:7px 14px;
                  background:#eef4fd;color:#1a6fc4;border:1.5px solid #c3d9f5;
                  border-radius:20px;font-size:13px;font-weight:600;text-decoration:none;
                  transition:background .2s,border-color .2s;position:relative;\">
          🔔 Notifications
          <span id=\"notif-badge\"
                style=\"background:#e74c3c;color:#fff;font-size:10px;font-weight:700;
                       min-width:16px;height:16px;border-radius:8px;
                       display:none;align-items:center;justify-content:center;padding:0 3px;\">
          </span>
        </a>
      </div>

      ";
        // line 458
        yield "      <div class=\"chapter-panel active\" id=\"chapter-0\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 1 · Introduction</div>
          <h1>Pourquoi gérer ses finances ?</h1>
          <p>Comprendre les bases de la finance personnelle est la première étape vers la liberté financière.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📖</div>Qu'est-ce que la finance personnelle ?</div>
          <p>La finance personnelle désigne l'ensemble des décisions qu'un individu prend pour gérer ses revenus, dépenses, épargne et investissements.</p>
          <p>Contrairement aux idées reçues, gérer ses finances ne nécessite pas d'être expert en économie. Quelques principes fondamentaux suffisent.</p>
          <div class=\"hbox\">💡 <strong>À retenir :</strong> 78% des personnes qui planifient leur budget atteignent leurs objectifs financiers en moins de 2 ans.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎯</div>Les 3 piliers de la santé financière</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Contrôle des dépenses</h5><p>Savoir où va chaque dinar dépensé chaque mois.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Épargne régulière</h5><p>Mettre de côté au moins 10% de ses revenus mensuels.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Investissement intelligent</h5><p>Faire travailler son argent pour générer des revenus passifs.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Fonds d'urgence</h5><p>Avoir 3 à 6 mois de dépenses en réserve pour les imprévus.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Introduction à la finance personnelle</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/HQzoZfc3GwQ\" allowfullscreen title=\"Introduction finance personnelle\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>Le cycle financier</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=800&q=80\" alt=\"Gestion financière\"></div>
          <p class=\"img-cap\">Revenus → Dépenses → Épargne → Investissement</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Regarder la vidéo d'introduction</div><div class=\"tsub\">Durée estimée : 8 min</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Lister vos 3 principales sources de dépenses</div><div class=\"tsub\">Exercice pratique</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Répondre au quiz ci-dessous</div><div class=\"tsub\">Valider vos connaissances</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">3 questions</span></div>
          <div class=\"quiz-q\"><p>1. Quel pourcentage minimum est recommandé d'épargner chaque mois ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_1\" value=\"a\"> 2%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_1\" value=\"b\"> 10%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_1\" value=\"c\"> 50%</label>
          </div>
          <div class=\"quiz-q\"><p>2. Combien de mois de dépenses doit contenir un fonds d'urgence ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_2\" value=\"a\"> 1 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_2\" value=\"b\"> 3 à 6 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_2\" value=\"c\"> 12 mois</label>
          </div>
          <div class=\"quiz-q\"><p>3. La finance personnelle nécessite d'être expert en économie.</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_3\" value=\"a\"> Vrai</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_3\" value=\"b\"> Faux</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(0,{'q0_1':'b','q0_2':'b','q0_3':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-0\"></div>
        </div>
        ";
        // line 515
        yield $macros["self"]->getTemplateForMacro("macro_chapter_comments", $context, 515, $this->getSourceContext())->macro_chapter_comments(...["introduction", "Introduction", (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 515, $this->source); })()), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 515, $this->source); })()), (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 515, $this->source); })()), (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 515, $this->source); })())]);
        yield "
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev hidden\">← Précédent</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(1)\">Budget Personnel →</button>
        </div>
      </div>


      ";
        // line 524
        yield "      <div class=\"chapter-panel\" id=\"chapter-1\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 2 · Budget Personnel</div>
          <h1>Créer et suivre son budget</h1>
          <p>Un budget bien construit est la fondation de toute bonne santé financière.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📊</div>La règle 50/30/20</div>
          <p>La méthode la plus populaire pour budgéter ses revenus est la règle 50/30/20 :</p>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">50%</div><h5>Besoins essentiels</h5><p>Loyer, nourriture, transport, factures.</p></div>
            <div class=\"ex-card\"><div class=\"en\">30%</div><h5>Envies personnelles</h5><p>Loisirs, restaurants, shopping non essentiel.</p></div>
            <div class=\"ex-card\"><div class=\"en\">20%</div><h5>Épargne & remboursements</h5><p>Épargne, investissements, remboursement de dettes.</p></div>
            <div class=\"ex-card\"><div class=\"en\">✓</div><h5>Exemple concret</h5><p>Revenu 2000 DT → 1000 besoins, 600 envies, 400 épargne.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>Visualiser son budget</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=800&q=80\" alt=\"Budget personnel\"></div>
          <p class=\"img-cap\">Répartition visuelle d'un budget mensuel équilibré</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Comment créer son budget</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/sVKQn2I4HDM\" allowfullscreen title=\"Créer son budget\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">💡</div>Conseils pratiques</div>
          <p>Notez chaque dépense pendant 30 jours avant de créer votre budget. Vous serez surpris de voir où part votre argent.</p>
          <div class=\"hbox\">🔑 <strong>Astuce Dinari :</strong> Utilisez la règle des enveloppes — allouez du cash physique par catégorie pour mieux contrôler vos dépenses.</div>
          <p>Révisez votre budget chaque mois. Un budget n'est pas figé, il évolue avec votre situation.</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Calculer vos revenus nets mensuels</div><div class=\"tsub\">Base de tout budget</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Appliquer la règle 50/30/20 à votre situation</div><div class=\"tsub\">Exercice de répartition</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Identifier 3 dépenses à réduire ce mois</div><div class=\"tsub\">Action concrète</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">2 questions</span></div>
          <div class=\"quiz-q\"><p>1. Dans la règle 50/30/20, quel pourcentage est alloué à l'épargne ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_1\" value=\"a\"> 50%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_1\" value=\"b\"> 30%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_1\" value=\"c\"> 20%</label>
          </div>
          <div class=\"quiz-q\"><p>2. Quelle est la première étape avant de créer un budget ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_2\" value=\"a\"> Investir en bourse</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_2\" value=\"b\"> Noter toutes ses dépenses pendant 30 jours</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_2\" value=\"c\"> Ouvrir un compte épargne</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(1,{'q1_1':'c','q1_2':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-1\"></div>
        </div>
        ";
        // line 578
        yield $macros["self"]->getTemplateForMacro("macro_chapter_comments", $context, 578, $this->getSourceContext())->macro_chapter_comments(...["budget", "Budget Personnel", (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 578, $this->source); })()), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 578, $this->source); })()), (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 578, $this->source); })()), (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 578, $this->source); })())]);
        yield "
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(0)\">← Introduction</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(2)\">Épargne →</button>
        </div>
      </div>


      ";
        // line 587
        yield "      <div class=\"chapter-panel\" id=\"chapter-2\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 3 · Épargne</div>
          <h1>Stratégies d'épargne efficaces</h1>
          <p>Épargner régulièrement, même de petites sommes, crée une sécurité financière durable.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🏦</div>Pourquoi épargner ?</div>
          <p>L'épargne vous protège contre les imprévus, vous permet de réaliser vos projets et constitue la base de tout investissement futur.</p>
          <div class=\"hbox\">📌 <strong>Principe clé :</strong> Payez-vous en premier. Dès que vous recevez votre salaire, transférez automatiquement votre épargne avant de dépenser.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📈</div>Les types d'épargne</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Épargne de précaution</h5><p>3 à 6 mois de dépenses pour les urgences.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Épargne projet</h5><p>Vacances, voiture, mariage — objectif défini.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Épargne retraite</h5><p>Préparer l'avenir dès aujourd'hui.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Épargne investissement</h5><p>Capital pour générer des revenus passifs.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Stratégies d'épargne</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/Rm6UdfRs3gw\" allowfullscreen title=\"Stratégies épargne\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>L'effet des intérêts composés</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=800&q=80\" alt=\"Épargne et investissement\"></div>
          <p class=\"img-cap\">Les intérêts composés : votre argent qui travaille pour vous</p>
          <p>100 DT épargnés par mois pendant 20 ans à 5% d'intérêt = plus de 41 000 DT.</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Définir votre objectif d'épargne mensuel</div><div class=\"tsub\">Minimum 10% de vos revenus</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Ouvrir un compte épargne dédié</div><div class=\"tsub\">Séparer épargne et dépenses courantes</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Configurer un virement automatique</div><div class=\"tsub\">Le jour de réception du salaire</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">2 questions</span></div>
          <div class=\"quiz-q\"><p>1. Quel est le principe \"payez-vous en premier\" ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_1\" value=\"a\"> Payer ses factures avant tout</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_1\" value=\"b\"> Épargner dès réception du salaire avant de dépenser</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_1\" value=\"c\"> Investir en bourse en priorité</label>
          </div>
          <div class=\"quiz-q\"><p>2. Combien de mois de dépenses doit contenir une épargne de précaution ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_2\" value=\"a\"> 1 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_2\" value=\"b\"> 3 à 6 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_2\" value=\"c\"> 2 ans</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(2,{'q2_1':'b','q2_2':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-2\"></div>
        </div>
        ";
        // line 640
        yield $macros["self"]->getTemplateForMacro("macro_chapter_comments", $context, 640, $this->getSourceContext())->macro_chapter_comments(...["epargne", "Épargne", (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 640, $this->source); })()), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 640, $this->source); })()), (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 640, $this->source); })()), (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 640, $this->source); })())]);
        yield "
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(1)\">← Budget</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(3)\">Gestion Financière →</button>
        </div>
      </div>


      ";
        // line 649
        yield "      <div class=\"chapter-panel\" id=\"chapter-3\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 4 · Gestion Financière</div>
          <h1>Contrôler ses dépenses au quotidien</h1>
          <p>Maîtriser ses dépenses est la clé pour atteindre ses objectifs financiers sans stress.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🔍</div>Identifier les dépenses cachées</div>
          <p>Les abonnements oubliés, les achats impulsifs et les petites dépenses quotidiennes peuvent représenter jusqu'à 30% de votre budget sans que vous le réalisiez.</p>
          <div class=\"hbox\">⚠️ <strong>Attention :</strong> Un café à 3 DT par jour = 90 DT/mois = 1 080 DT/an. Les petites dépenses s'accumulent.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🛠️</div>Outils de gestion</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Tableau de bord mensuel</h5><p>Suivre revenus vs dépenses chaque mois.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Catégorisation</h5><p>Classer chaque dépense par catégorie.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Alertes de dépassement</h5><p>Être notifié quand on dépasse un budget.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Bilan trimestriel</h5><p>Analyser ses tendances tous les 3 mois.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Gérer ses dépenses efficacement</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/9yfIBBdFBRQ\" allowfullscreen title=\"Gestion des dépenses\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>Tableau de bord financier</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80\" alt=\"Tableau de bord financier\"></div>
          <p class=\"img-cap\">Visualiser ses finances en un coup d'œil</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Lister tous vos abonnements actifs</div><div class=\"tsub\">Annuler ceux inutilisés</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Catégoriser vos dépenses du mois dernier</div><div class=\"tsub\">Identifier les postes à réduire</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Fixer un plafond pour chaque catégorie</div><div class=\"tsub\">Budget par enveloppe</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">2 questions</span></div>
          <div class=\"quiz-q\"><p>1. Un café à 3 DT/jour représente combien par an ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_1\" value=\"a\"> 360 DT</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_1\" value=\"b\"> 1 080 DT</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_1\" value=\"c\"> 540 DT</label>
          </div>
          <div class=\"quiz-q\"><p>2. À quelle fréquence est recommandé un bilan financier ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_2\" value=\"a\"> Une fois par an</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_2\" value=\"b\"> Tous les 3 mois (trimestriel)</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_2\" value=\"c\"> Tous les 5 ans</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(3,{'q3_1':'b','q3_2':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-3\"></div>
        </div>
        ";
        // line 701
        yield $macros["self"]->getTemplateForMacro("macro_chapter_comments", $context, 701, $this->getSourceContext())->macro_chapter_comments(...["gestion", "Gestion Financière", (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 701, $this->source); })()), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 701, $this->source); })()), (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 701, $this->source); })()), (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 701, $this->source); })())]);
        yield "
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(2)\">← Épargne</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(4)\">Investissement →</button>
        </div>
      </div>


      ";
        // line 710
        yield "      <div class=\"chapter-panel\" id=\"chapter-4\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 5 · Investissement</div>
          <h1>Faire fructifier son argent</h1>
          <p>L'investissement transforme votre épargne en source de revenus passifs et de croissance à long terme.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📈</div>Les bases de l'investissement</div>
          <p>Investir, c'est mettre son argent au travail pour générer des rendements. Mais tout investissement comporte un risque — plus le rendement potentiel est élevé, plus le risque l'est aussi.</p>
          <div class=\"hbox\">⚖️ <strong>Règle d'or :</strong> Ne jamais investir de l'argent dont vous avez besoin à court terme. L'investissement est une stratégie long terme.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🗂️</div>Types d'investissements</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Bons du Trésor</h5><p>Faible risque, rendement modéré. Idéal pour débuter.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Actions en bourse</h5><p>Risque moyen à élevé, potentiel de croissance important.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Immobilier</h5><p>Investissement tangible, revenus locatifs stables.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Fonds d'investissement</h5><p>Diversification automatique, gestion professionnelle.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Investir intelligemment</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/gFQNPmLKj1k\" allowfullscreen title=\"Investir intelligemment\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>La diversification du portefeuille</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=800&q=80\" alt=\"Investissement et portefeuille\"></div>
          <p class=\"img-cap\">Ne pas mettre tous ses œufs dans le même panier</p>
          <p>La diversification réduit le risque global de votre portefeuille en répartissant les investissements sur plusieurs actifs.</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Définir votre profil de risque</div><div class=\"tsub\">Conservateur, modéré ou dynamique ?</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Rechercher les options d'investissement disponibles en Tunisie</div><div class=\"tsub\">SICAV, bons du trésor, bourse de Tunis</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Simuler un investissement de 100 DT/mois sur 10 ans</div><div class=\"tsub\">Calculer les intérêts composés</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz final <span class=\"badge\">3 questions</span></div>
          <div class=\"quiz-q\"><p>1. Quel type d'investissement est le moins risqué pour un débutant ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_1\" value=\"a\"> Actions spéculatives</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_1\" value=\"b\"> Bons du Trésor</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_1\" value=\"c\"> Cryptomonnaies</label>
          </div>
          <div class=\"quiz-q\"><p>2. Qu'est-ce que la diversification ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_2\" value=\"a\"> Mettre tout son argent dans un seul actif</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_2\" value=\"b\"> Répartir ses investissements sur plusieurs actifs pour réduire le risque</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_2\" value=\"c\"> Investir uniquement en immobilier</label>
          </div>
          <div class=\"quiz-q\"><p>3. L'investissement est une stratégie :</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_3\" value=\"a\"> Court terme uniquement</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_3\" value=\"b\"> Long terme principalement</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_3\" value=\"c\"> Sans aucun risque</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(4,{'q4_1':'b','q4_2':'b','q4_3':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-4\"></div>
        </div>
        ";
        // line 768
        yield $macros["self"]->getTemplateForMacro("macro_chapter_comments", $context, 768, $this->getSourceContext())->macro_chapter_comments(...["investissement", "Investissement", (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 768, $this->source); })()), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 768, $this->source); })()), (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 768, $this->source); })()), (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 768, $this->source); })())]);
        yield "
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(3)\">← Gestion Financière</button>
          <button class=\"btn-nav btn-next\" onclick=\"finishCourse()\" style=\"background:var(--d-green);\">🎉 Terminer le cours</button>
        </div>
      </div>

      ";
        // line 776
        yield "      <div class=\"chapter-panel\" id=\"chapter-quiz\">

        <div class=\"ch-hero\" style=\"background:linear-gradient(135deg,#1a6fc4 0%,#0d4fa0 100%);\">
          <div class=\"ch-tag\">Évaluation finale · 10 questions</div>
          <h1>Quiz Final du Cours</h1>
          <p>Testez l'ensemble de vos connaissances sur la finance personnelle.</p>
        </div>

        <div class=\"fq-intro cblock\" id=\"fq-intro\" style=\"text-align:center;\">
          <div class=\"fq-intro-icon\">🏆</div>
          <div class=\"fq-intro-title\">Quiz Final du Cours</div>
          <p class=\"fq-intro-sub\">Testez l'ensemble de vos connaissances sur la finance personnelle.<br>10 questions couvrant tous les chapitres du cours.</p>
          <div class=\"fq-meta\">
            <div class=\"fq-meta-item\"><span>📝</span><span>10 questions</span></div>
            <div class=\"fq-meta-item\"><span>⏱️</span><span>~5 minutes</span></div>
            <div class=\"fq-meta-item\"><span>🎯</span><span>QCM</span></div>
          </div>
          <button class=\"btn-start-fq\" onclick=\"startFinalQuiz()\">🚀 Commencer le quiz final</button>
        </div>

        ";
        // line 797
        yield "        <div class=\"fq-body\" id=\"fq-body\">

          <div class=\"fq-progress-wrap\">
            <div class=\"fq-progress-top\">
              <span id=\"fq-prog-label\">Question 1 / 10</span>
              <span id=\"fq-prog-pct\">0%</span>
            </div>
            <div class=\"fq-progress-bg\"><div class=\"fq-progress-fill\" id=\"fq-prog-fill\" style=\"width:0%\"></div></div>
          </div>

          ";
        // line 808
        yield "          <div class=\"fq-question-block active\" id=\"fq-q-0\">
            <div class=\"fq-q-num\">Question 1 / 10 · Budget</div>
            <div class=\"fq-q-text\">Dans la règle 50/30/20, quel pourcentage est alloué aux besoins essentiels ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"a\"> 20%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"b\"> 30%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"c\"> 50%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"d\"> 70%</label>
          </div>

          ";
        // line 818
        yield "          <div class=\"fq-question-block\" id=\"fq-q-1\">
            <div class=\"fq-q-num\">Question 2 / 10 · Épargne</div>
            <div class=\"fq-q-text\">Quel est le principe \"payez-vous en premier\" ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"a\"> Payer ses factures avant tout</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"b\"> Épargner dès réception du salaire avant de dépenser</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"c\"> Investir en bourse en priorité</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"d\"> Rembourser ses dettes d'abord</label>
          </div>

          ";
        // line 828
        yield "          <div class=\"fq-question-block\" id=\"fq-q-2\">
            <div class=\"fq-q-num\">Question 3 / 10 · Investissement</div>
            <div class=\"fq-q-text\">Qu'est-ce que la diversification d'un portefeuille ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"a\"> Mettre tout son argent dans un seul actif performant</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"b\"> Répartir ses investissements sur plusieurs actifs pour réduire le risque</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"c\"> Investir uniquement en immobilier</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"d\"> Changer d'investissement chaque semaine</label>
          </div>

          ";
        // line 838
        yield "          <div class=\"fq-question-block\" id=\"fq-q-3\">
            <div class=\"fq-q-num\">Question 4 / 10 · Gestion</div>
            <div class=\"fq-q-text\">Un café à 3 DT par jour représente combien par an ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"a\"> 360 DT</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"b\"> 540 DT</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"c\"> 1 080 DT</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"d\"> 720 DT</label>
          </div>

          ";
        // line 848
        yield "          <div class=\"fq-question-block\" id=\"fq-q-4\">
            <div class=\"fq-q-num\">Question 5 / 10 · Épargne</div>
            <div class=\"fq-q-text\">Combien de mois de dépenses doit contenir une épargne de précaution ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"a\"> 1 mois</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"b\"> 3 à 6 mois</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"c\"> 12 mois</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"d\"> 2 ans</label>
          </div>

          ";
        // line 858
        yield "          <div class=\"fq-question-block\" id=\"fq-q-5\">
            <div class=\"fq-q-num\">Question 6 / 10 · Investissement</div>
            <div class=\"fq-q-text\">Quel type d'investissement est généralement le moins risqué pour un débutant ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"a\"> Actions spéculatives</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"b\"> Cryptomonnaies</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"c\"> Bons du Trésor</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"d\"> Produits dérivés</label>
          </div>

          ";
        // line 868
        yield "          <div class=\"fq-question-block\" id=\"fq-q-6\">
            <div class=\"fq-q-num\">Question 7 / 10 · Budget</div>
            <div class=\"fq-q-text\">Quelle est la première étape recommandée avant de créer un budget ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"a\"> Ouvrir un compte épargne</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"b\"> Investir en bourse</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"c\"> Noter toutes ses dépenses pendant 30 jours</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"d\"> Demander un crédit bancaire</label>
          </div>

          ";
        // line 878
        yield "          <div class=\"fq-question-block\" id=\"fq-q-7\">
            <div class=\"fq-q-num\">Question 8 / 10 · Gestion</div>
            <div class=\"fq-q-text\">À quelle fréquence est recommandé un bilan financier personnel ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"a\"> Une fois par an</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"b\"> Tous les 3 mois (trimestriel)</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"c\"> Tous les 5 ans</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"d\"> Jamais, c'est inutile</label>
          </div>

          ";
        // line 888
        yield "          <div class=\"fq-question-block\" id=\"fq-q-8\">
            <div class=\"fq-q-num\">Question 9 / 10 · Finance générale</div>
            <div class=\"fq-q-text\">Quel pourcentage minimum de ses revenus est recommandé d'épargner chaque mois ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"a\"> 2%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"b\"> 5%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"c\"> 10%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"d\"> 25%</label>
          </div>

          ";
        // line 898
        yield "          <div class=\"fq-question-block\" id=\"fq-q-9\">
            <div class=\"fq-q-num\">Question 10 / 10 · Investissement</div>
            <div class=\"fq-q-text\">L'investissement est principalement une stratégie :</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"a\"> Court terme uniquement</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"b\"> Long terme principalement</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"c\"> Sans aucun risque</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"d\"> Réservée aux experts</label>
          </div>

          <div class=\"fq-nav\">
            <button class=\"btn-fq-nav btn-fq-prev\" id=\"fq-btn-prev\" onclick=\"fqPrev()\" style=\"visibility:hidden\">← Précédent</button>
            <button class=\"btn-fq-nav btn-fq-next\" id=\"fq-btn-next\" onclick=\"fqNext()\">Suivant →</button>
            <button class=\"btn-fq-nav btn-fq-submit\" id=\"fq-btn-submit\" onclick=\"fqSubmit()\" style=\"display:none\">🎯 Voir mon score</button>
          </div>
        </div>

        ";
        // line 915
        yield "        <div class=\"fq-result\" id=\"fq-result\">
          ";
        // line 917
        yield "          ";
        if (((isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 917, $this->source); })()) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 917, $this->source); })()), "quizzes", [], "any", false, false, false, 917)))) {
            // line 918
            yield "            <input type=\"hidden\" id=\"fq-quiz-id\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["selected"]) || array_key_exists("selected", $context) ? $context["selected"] : (function () { throw new RuntimeError('Variable "selected" does not exist.', 918, $this->source); })()), "quizzes", [], "any", false, false, false, 918), "first", [], "any", false, false, false, 918), "id", [], "any", false, false, false, 918), "html", null, true);
            yield "\">
          ";
        }
        // line 920
        yield "          <div class=\"fq-score-circle\" id=\"fq-circle\">
            <div class=\"fq-score-num\" id=\"fq-score-num\">0</div>
            <div class=\"fq-score-total\">/ 10</div>
          </div>
          <div class=\"fq-result-title\" id=\"fq-result-title\"></div>
          <p class=\"fq-result-msg\" id=\"fq-result-msg\"></p>
          <div class=\"fq-result-badges\" id=\"fq-result-badges\"></div>
          <div style=\"display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-top:8px;\">
            <button class=\"btn-retry\" onclick=\"retryFinalQuiz()\">🔄 Repasser le quiz</button>
            <a id=\"fq-reco-link\" href=\"";
        // line 929
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recommandations");
        yield "\"
               style=\"display:none;align-items:center;gap:7px;padding:11px 26px;
                      background:var(--d-blue);color:#fff;border-radius:6px;
                      font-family:'Syne',sans-serif;font-weight:700;font-size:13px;
                      text-decoration:none;transition:background .2s;\">
              🎯 Voir mes recommandations
            </a>
          </div>
        </div>

      </div>";
        // line 940
        yield "
      ";
        // line 942
        yield "
    </div>";
        // line 944
        yield "  </main>
</div>
<button class=\"sidebar-toggle\" id=\"sb-toggle\" onclick=\"document.getElementById('sidebar').classList.toggle('open')\">☰</button>
<script>
const TOTAL = 5;
const done = new Array(TOTAL).fill(false);
let current = 0;

const CHAPTER_LABELS = {
  'introduction':  'Introduction',
  'budget':        'Budget Personnel',
  'epargne':       'Épargne',
  'gestion':       'Gestion Financière',
  'investissement':'Investissement'
};

function goTo(idx) {
  document.querySelectorAll('.chapter-panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.ch-item').forEach(i => i.classList.remove('active'));

  if (idx === 'quiz') {
    document.getElementById('chapter-quiz').classList.add('active');
    document.querySelector('[data-ch=\"quiz\"]').classList.add('active');
  } else {
    document.getElementById('chapter-' + idx).classList.add('active');
    document.querySelector('[data-ch=\"' + idx + '\"]').classList.add('active');
    current = idx;
  }
  window.scrollTo({top: 0, behavior: 'smooth'});
  document.getElementById('sidebar').classList.remove('open');
}

function toggleTask(el) {
  el.classList.toggle('done');
  updateProgress();
}

function updateProgress() {
  const allTasks = document.querySelectorAll('.task-item');
  const doneTasks = document.querySelectorAll('.task-item.done');
  const pct = allTasks.length ? Math.round((doneTasks.length / allTasks.length) * 100) : 0;
  document.getElementById('prog-fill').style.width = pct + '%';
  document.getElementById('prog-pct').textContent = pct + '%';
}

function checkQuiz(chIdx, answers) {
  let correct = 0, total = Object.keys(answers).length;
  Object.entries(answers).forEach(([name, correctVal]) => {
    const selected = document.querySelector('input[name=\"' + name + '\"]:checked');
    const opts = document.querySelectorAll('input[name=\"' + name + '\"]');
    opts.forEach(opt => {
      const label = opt.closest('.qopt');
      label.classList.remove('correct', 'wrong');
      if (opt.value === correctVal) label.classList.add('correct');
      else if (selected && opt === selected && opt.value !== correctVal) label.classList.add('wrong');
    });
    if (selected && selected.value === correctVal) correct++;
  });
  const fb = document.getElementById('qf-' + chIdx);
  fb.style.display = 'block';
  const _t = (window.PAGE_T && window.PAGE_T[localStorage.getItem('dinari_lang')||'fr']) || {};
  if (correct === total) {
    fb.className = 'qfeedback ok';
    fb.textContent = (_t.quiz_ok||'✅ Parfait !') + ' ' + correct + '/' + total + ' ' + (_t.quiz_correct||'bonnes réponses. Chapitre maîtrisé !');
    markChapterDone(chIdx);
  } else {
    fb.className = 'qfeedback ko';
    fb.textContent = '❌ ' + correct + '/' + total + ' ' + (_t.quiz_wrong||'correctes. Relisez le chapitre et réessayez.');
  }
}

function markChapterDone(idx) {
  done[idx] = true;
  const item = document.querySelector('[data-ch=\"' + idx + '\"]');
  item.classList.add('done');
  item.querySelector('.ch-ico').textContent = '✓';
  updateProgress();
}

function finishCourse() {
  markChapterDone(4);
  const _t = (window.PAGE_T && window.PAGE_T[localStorage.getItem('dinari_lang')||'fr']) || {};
  alert(_t.finish_alert || '🎉 Félicitations ! Vous avez terminé le cours Finance Personnelle avec Dinari !');
}

function startEdit(id) {
  document.getElementById('comment-' + id).classList.add('editing');
  const ta = document.querySelector('#edit-' + id + ' textarea');
  ta.focus();
  ta.setSelectionRange(ta.value.length, ta.value.length);
}

function cancelEdit(id) {
  document.getElementById('comment-' + id).classList.remove('editing');
}

/* ── FINAL QUIZ ── */
const FQ_ANSWERS = ['c','b','b','c','b','c','c','b','c','b'];
const FQ_TOTAL   = 10;
let fqCurrent    = 0;

function startFinalQuiz() {
  document.getElementById('fq-intro').style.display = 'none';
  document.getElementById('fq-body').classList.add('active');
  fqUpdateProgress();
  window.scrollTo({top: 0, behavior: 'smooth'});
}

function fqUpdateProgress() {
  const pct = Math.round((fqCurrent / FQ_TOTAL) * 100);
  document.getElementById('fq-prog-fill').style.width = pct + '%';
  document.getElementById('fq-prog-label').textContent = 'Question ' + (fqCurrent + 1) + ' / ' + FQ_TOTAL;
  document.getElementById('fq-prog-pct').textContent = pct + '%';
  document.getElementById('fq-btn-prev').style.visibility = fqCurrent === 0 ? 'hidden' : 'visible';
  const isLast = fqCurrent === FQ_TOTAL - 1;
  document.getElementById('fq-btn-next').style.display   = isLast ? 'none'  : 'inline-flex';
  document.getElementById('fq-btn-submit').style.display = isLast ? 'inline-flex' : 'none';
}

function fqShowQuestion(idx) {
  document.querySelectorAll('.fq-question-block').forEach(b => b.classList.remove('active'));
  document.getElementById('fq-q-' + idx).classList.add('active');
  fqCurrent = idx;
  fqUpdateProgress();
}

function fqNext() {
  if (fqCurrent < FQ_TOTAL - 1) fqShowQuestion(fqCurrent + 1);
}

function fqPrev() {
  if (fqCurrent > 0) fqShowQuestion(fqCurrent - 1);
}

function fqSubmit() {
  let score = 0;
  const details = [];

  FQ_ANSWERS.forEach((correct, i) => {
    const sel = document.querySelector('input[name=\"fq' + i + '\"]:checked');
    const opts = document.querySelectorAll('input[name=\"fq' + i + '\"]');
    const answered = sel ? sel.value : null;
    const isOk = answered === correct;
    if (isOk) score++;
    details.push({correct, answered, isOk});

    // Colorier les options
    opts.forEach(opt => {
      const lbl = opt.closest('.fq-option');
      lbl.classList.add('disabled');
      if (opt.value === correct) lbl.classList.add('correct');
      else if (opt === sel && !isOk) lbl.classList.add('wrong');
    });
  });

  // Afficher résultat
  document.getElementById('fq-body').classList.remove('active');
  const result = document.getElementById('fq-result');
  result.classList.add('active');

  const circle = document.getElementById('fq-circle');
  document.getElementById('fq-score-num').textContent = score;

  let title, msg, badgeHtml, circleClass;
  const _t = (window.PAGE_T && window.PAGE_T[localStorage.getItem('dinari_lang')||'fr']) || {};
  if (score >= 8) {
    title = _t.fq_result_great_title || '🏆 Excellent !';
    msg   = _t.fq_result_great_msg   || 'Vous maîtrisez parfaitement les bases de la finance personnelle.';
    badgeHtml = '<span class=\"fq-badge fq-badge-green\">' + (_t.fq_badge_expert||'Expert Dinari') + '</span><span class=\"fq-badge fq-badge-blue\">' + score + '/10 ' + (_t.fq_badge_correct||'correct') + '</span>';
    circleClass = 'great';
  } else if (score >= 5) {
    title = _t.fq_result_ok_title || '👍 Bon niveau !';
    msg   = _t.fq_result_ok_msg   || 'Vous avez de bonnes bases. Relisez les chapitres.';
    badgeHtml = '<span class=\"fq-badge fq-badge-blue\">' + (_t.fq_badge_progress||'En progression') + '</span><span class=\"fq-badge fq-badge-blue\">' + score + '/10 ' + (_t.fq_badge_correct||'correct') + '</span>';
    circleClass = 'ok';
  } else {
    title = _t.fq_result_low_title || '📚 À revoir !';
    msg   = _t.fq_result_low_msg   || \"Pas de panique ! Relisez les chapitres et repassez le quiz.\";
    badgeHtml = '<span class=\"fq-badge fq-badge-red\">' + (_t.fq_badge_retry||'À retravailler') + '</span><span class=\"fq-badge fq-badge-blue\">' + score + '/10 ' + (_t.fq_badge_correct||'correct') + '</span>';
    circleClass = 'low';
  }

  circle.className = 'fq-score-circle ' + circleClass;
  document.getElementById('fq-result-title').textContent = title;
  document.getElementById('fq-result-msg').textContent   = msg;
  document.getElementById('fq-result-badges').innerHTML  = badgeHtml;

  // ── Save result for recommendation engine ──────────────────────────
  const quizId = document.getElementById('fq-quiz-id') ? document.getElementById('fq-quiz-id').value : null;
  if (quizId) {
    fetch('";
        // line 1134
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_save_result");
        yield "', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'quiz_id=' + encodeURIComponent(quizId)
           + '&score_obtenu=' + encodeURIComponent(score)
           + '&score_max=10'
    }).catch(() => {}); // fire-and-forget
  }
  // ── Show recommendation link ────────────────────────────────────────
  const recoLink = document.getElementById('fq-reco-link');
  if (recoLink) recoLink.style.display = 'inline-flex';

  result.scrollIntoView({behavior:'smooth', block:'center'});
}

function retryFinalQuiz() {
  document.querySelectorAll('.fq-option').forEach(o => {
    o.classList.remove('correct','wrong','disabled');
    const inp = o.querySelector('input');
    if (inp) inp.checked = false;
  });
  document.getElementById('fq-result').classList.remove('active');
  document.getElementById('fq-body').classList.add('active');
  fqShowQuestion(0);
  window.scrollTo({top: 0, behavior: 'smooth'});
}

/* ── REACTIONS ── */
const EMOJIS = ['👍','👎','😄','🎉','😮','❤️','🚀','👀'];

function toggleReaction(commentId, emoji, chipEl) {
  const fd = new FormData();
  fd.append('emoji', emoji);

  fetch('/cours/commentaire/' + commentId + '/react', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(data => renderReactions(commentId, data.counts, data.mine))
    .catch(console.error);
}

function renderReactions(commentId, counts, mine) {
  const bar = document.getElementById('reactions-' + commentId);
  // Garder le bouton + picker
  const wrap = bar.querySelector('.reaction-wrap');
  // Supprimer les chips existants
  bar.querySelectorAll('.reaction-chip').forEach(el => el.remove());

  // Recréer les chips avant le wrap
  Object.entries(counts).forEach(([emoji, count]) => {
    const btn = document.createElement('button');
    btn.className = 'reaction-chip' + (mine.includes(emoji) ? ' active' : '');
    btn.dataset.emoji = emoji;
    btn.innerHTML = '<span class=\"rc\">' + emoji + '</span><span class=\"rn\">' + count + '</span>';
    btn.onclick = () => toggleReaction(commentId, emoji, btn);
    bar.insertBefore(btn, wrap);
  });
}

function togglePicker(id, e) {
  e.stopPropagation();
  const picker = document.getElementById('picker-' + id);
  const isOpen = picker.classList.contains('open');
  document.querySelectorAll('.emoji-picker.open').forEach(p => p.classList.remove('open'));
  if (!isOpen) picker.classList.add('open');
}

function closePicker(id) {
  document.getElementById('picker-' + id).classList.remove('open');
}

document.addEventListener('click', () => {
  document.querySelectorAll('.emoji-picker.open').forEach(p => p.classList.remove('open'));
});

/* ── Course page translations ── */
window.PAGE_T = {
  fr: {
    sidebar_progress:'Progression', sidebar_chapters:'Chapitres', sidebar_eval:'Évaluation',
    ch0_title:'Introduction',       ch0_sub:'Pourquoi gérer ses finances ?',
    ch1_title:'Budget Personnel',   ch1_sub:'Créer et suivre son budget',
    ch2_title:'Épargne',            ch2_sub:\"Stratégies d'épargne efficaces\",
    ch3_title:'Gestion Financière', ch3_sub:'Contrôler ses dépenses',
    ch4_title:'Investissement',     ch4_sub:'Faire fructifier son argent',
    quiz_final_title:'Quiz Final',  quiz_final_sub:'Testez vos connaissances',
    tasks_title:'✅ Tâches du chapitre',
    quiz_label:'Quiz', quiz_final_label:'Quiz final', quiz_validate:'Valider mes réponses',
    true_label:'Vrai', false_label:'Faux',
    ch0_tag:'Chapitre 1 · Introduction', ch0_h1:'Pourquoi gérer ses finances ?',
    ch0_hero_p:\"Comprendre les bases de la finance personnelle est la première étape vers la liberté financière.\",
    ch0_next:'Budget Personnel →',
    ch1_tag:'Chapitre 2 · Budget Personnel', ch1_h1:'Créer et suivre son budget',
    ch1_hero_p:\"Un budget bien construit est la fondation de toute bonne santé financière.\",
    ch1_prev:'← Introduction', ch1_next:'Épargne →',
    ch2_tag:'Chapitre 3 · Épargne', ch2_h1:\"Stratégies d'épargne efficaces\",
    ch2_hero_p:\"Épargner régulièrement, même de petites sommes, crée une sécurité financière durable.\",
    ch2_prev:'← Budget', ch2_next:'Gestion Financière →',
    ch3_tag:'Chapitre 4 · Gestion Financière', ch3_h1:'Contrôler ses dépenses au quotidien',
    ch3_hero_p:\"Maîtriser ses dépenses est la clé pour atteindre ses objectifs financiers sans stress.\",
    ch3_prev:'← Épargne', ch3_next:'Investissement →',
    ch4_tag:'Chapitre 5 · Investissement', ch4_h1:'Faire fructifier son argent',
    ch4_hero_p:\"L'investissement transforme votre épargne en source de revenus passifs et de croissance à long terme.\",
    ch4_prev:'← Gestion Financière', ch4_finish:'🎉 Terminer le cours',
    comment_leave:'Laisser un commentaire', comment_name:'Votre nom',
    comment_name_ph:'Ex : Mohamed T.', comment_text:'Votre commentaire',
    comment_text_ph:'Partagez votre avis sur ce chapitre...',
    comment_publish:'Publier', comment_save:'💾 Enregistrer', comment_cancel:'Annuler',
    comment_none:'Aucun commentaire pour ce chapitre. Soyez le premier !',
    fq_tag:'Évaluation finale · 10 questions', fq_h1:'Quiz Final du Cours',
    fq_hero_p:\"Testez l'ensemble de vos connaissances sur la finance personnelle.\",
    fq_intro_sub:\"Testez l'ensemble de vos connaissances sur la finance personnelle. 10 questions couvrant tous les chapitres du cours.\",
    fq_meta_q:'10 questions', fq_meta_t:'~5 minutes',
    fq_start:'🚀 Commencer le quiz final',
    fq_prev:'← Précédent', fq_next:'Suivant →', fq_submit:'🎯 Voir mon score',
    fq_retry:'🔄 Repasser le quiz',
    quiz_ok:'✅ Parfait !', quiz_correct:'bonnes réponses. Chapitre maîtrisé !',
    quiz_wrong:'correctes. Relisez le chapitre et réessayez.',
    finish_alert:'🎉 Félicitations ! Vous avez terminé le cours Finance Personnelle avec Dinari !',
    fq_result_great_title:'🏆 Excellent !',
    fq_result_great_msg:\"Vous maîtrisez parfaitement les bases de la finance personnelle. Vous êtes prêt à gérer vos finances comme un pro !\",
    fq_result_ok_title:'👍 Bon niveau !',
    fq_result_ok_msg:\"Vous avez de bonnes bases. Relisez les chapitres sur lesquels vous avez hésité pour consolider vos connaissances.\",
    fq_result_low_title:'📚 À revoir !',
    fq_result_low_msg:\"Pas de panique ! Relisez les chapitres du cours et repassez le quiz. La finance personnelle s'apprend avec la pratique.\",
    fq_badge_expert:'Expert Dinari', fq_badge_progress:'En progression',
    fq_badge_retry:'À retravailler', fq_badge_correct:'correct',
    /* content blocks */
    c0_b1_title:\"Qu'est-ce que la finance personnelle ?\", c0_b2_title:'Les 3 piliers de la santé financière', c0_b3_title:'Vidéo — Introduction à la finance personnelle', c0_b4_title:'Le cycle financier',
    c0_p1:\"La finance personnelle désigne l'ensemble des décisions qu'un individu prend pour gérer ses revenus, dépenses, épargne et investissements.\",
    c0_p2:\"Contrairement aux idées reçues, gérer ses finances ne nécessite pas d'être expert en économie. Quelques principes fondamentaux suffisent.\",
    c0_hbox_label:'À retenir :', c0_hbox_text:\"78% des personnes qui planifient leur budget atteignent leurs objectifs financiers en moins de 2 ans.\",
    c0_card1_h:'Contrôle des dépenses', c0_card1_p:'Savoir où va chaque dinar dépensé chaque mois.',
    c0_card2_h:'Épargne régulière',     c0_card2_p:\"Mettre de côté au moins 10% de ses revenus mensuels.\",
    c0_card3_h:'Investissement intelligent', c0_card3_p:\"Faire travailler son argent pour générer des revenus passifs.\",
    c0_card4_h:\"Fonds d'urgence\",       c0_card4_p:\"Avoir 3 à 6 mois de dépenses en réserve pour les imprévus.\",
    c0_img_cap:'Revenus → Dépenses → Épargne → Investissement',
    c0_task1:\"Regarder la vidéo d'introduction\", c0_task1s:'Durée estimée : 8 min',
    c0_task2:'Lister vos 3 principales sources de dépenses', c0_task2s:'Exercice pratique',
    c0_task3:'Répondre au quiz ci-dessous', c0_task3s:'Valider vos connaissances',
    c0_q1:'1. Quel pourcentage minimum est recommandé d\\'épargner chaque mois ?',
    c0_q2:'2. Combien de mois de dépenses doit contenir un fonds d\\'urgence ?',
    c0_q3:'3. La finance personnelle nécessite d\\'être expert en économie.',
    c1_b1_title:'La règle 50/30/20', c1_b2_title:'Visualiser son budget', c1_b3_title:'Vidéo — Comment créer son budget', c1_b4_title:'Conseils pratiques',
    c1_p1:'La méthode la plus populaire pour budgéter ses revenus est la règle 50/30/20 :',
    c1_card1_h:'Besoins essentiels', c1_card1_p:'Loyer, nourriture, transport, factures.',
    c1_card2_h:'Envies personnelles', c1_card2_p:'Loisirs, restaurants, shopping non essentiel.',
    c1_card3_h:'Épargne & remboursements', c1_card3_p:'Épargne, investissements, remboursement de dettes.',
    c1_card4_h:'Exemple concret', c1_card4_p:'Revenu 2000 DT → 1000 besoins, 600 envies, 400 épargne.',
    c1_img_cap:\"Répartition visuelle d'un budget mensuel équilibré\",
    c1_hbox_label:'Astuce Dinari :', c1_hbox_text:\"Utilisez la règle des enveloppes — allouez du cash physique par catégorie pour mieux contrôler vos dépenses.\",
    c1_tip1:'Notez chaque dépense pendant 30 jours avant de créer votre budget. Vous serez surpris de voir où part votre argent.',
    c1_tip2:\"Révisez votre budget chaque mois. Un budget n'est pas figé, il évolue avec votre situation.\",
    c1_task1:'Calculer vos revenus nets mensuels', c1_task1s:'Base de tout budget',
    c1_task2:'Appliquer la règle 50/30/20 à votre situation', c1_task2s:'Exercice de répartition',
    c1_task3:'Identifier 3 dépenses à réduire ce mois', c1_task3s:'Action concrète',
    c1_q1:\"1. Dans la règle 50/30/20, quel pourcentage est alloué à l'épargne ?\",
    c1_q2:'2. Quelle est la première étape avant de créer un budget ?',
    c2_b1_title:'Pourquoi épargner ?', c2_b2_title:\"Les types d'épargne\", c2_b3_title:\"Vidéo — Stratégies d'épargne\", c2_b4_title:\"L'effet des intérêts composés\",
    c2_p1:\"L'épargne vous protège contre les imprévus, vous permet de réaliser vos projets et constitue la base de tout investissement futur.\",
    c2_hbox_label:'Principe clé :', c2_hbox_text:\"Payez-vous en premier. Dès que vous recevez votre salaire, transférez automatiquement votre épargne avant de dépenser.\",
    c2_card1_h:'Épargne de précaution', c2_card1_p:'3 à 6 mois de dépenses pour les urgences.',
    c2_card2_h:'Épargne projet',        c2_card2_p:'Vacances, voiture, mariage — objectif défini.',
    c2_card3_h:'Épargne retraite',      c2_card3_p:\"Préparer l'avenir dès aujourd'hui.\",
    c2_card4_h:'Épargne investissement',c2_card4_p:'Capital pour générer des revenus passifs.',
    c2_img_cap:\"Les intérêts composés : votre argent qui travaille pour vous\",
    c2_compound:\"100 DT épargnés par mois pendant 20 ans à 5% d'intérêt = plus de 41 000 DT.\",
    c2_task1:\"Définir votre objectif d'épargne mensuel\", c2_task1s:'Minimum 10% de vos revenus',
    c2_task2:'Ouvrir un compte épargne dédié', c2_task2s:'Séparer épargne et dépenses courantes',
    c2_task3:'Configurer un virement automatique', c2_task3s:'Le jour de réception du salaire',
    c2_q1:'1. Quel est le principe \"payez-vous en premier\" ?',
    c2_q2:\"2. Combien de mois de dépenses doit contenir une épargne de précaution ?\",
    c3_b1_title:'Identifier les dépenses cachées', c3_b2_title:'Outils de gestion', c3_b3_title:'Vidéo — Gérer ses dépenses efficacement', c3_b4_title:'Tableau de bord financier',
    c3_p1:\"Les abonnements oubliés, les achats impulsifs et les petites dépenses quotidiennes peuvent représenter jusqu'à 30% de votre budget sans que vous le réalisiez.\",
    c3_hbox_label:'Attention :', c3_hbox_text:\"Un café à 3 DT par jour = 90 DT/mois = 1 080 DT/an. Les petites dépenses s'accumulent.\",
    c3_card1_h:'Tableau de bord mensuel', c3_card1_p:'Suivre revenus vs dépenses chaque mois.',
    c3_card2_h:'Catégorisation',          c3_card2_p:'Classer chaque dépense par catégorie.',
    c3_card3_h:'Alertes de dépassement',  c3_card3_p:'Être notifié quand on dépasse un budget.',
    c3_card4_h:'Bilan trimestriel',       c3_card4_p:'Analyser ses tendances tous les 3 mois.',
    c3_img_cap:\"Visualiser ses finances en un coup d'œil\",
    c3_task1:'Lister tous vos abonnements actifs', c3_task1s:'Annuler ceux inutilisés',
    c3_task2:'Catégoriser vos dépenses du mois dernier', c3_task2s:'Identifier les postes à réduire',
    c3_task3:'Fixer un plafond pour chaque catégorie', c3_task3s:'Budget par enveloppe',
    c3_q1:'1. Un café à 3 DT/jour représente combien par an ?',
    c3_q2:'2. À quelle fréquence est recommandé un bilan financier ?',
    c4_b1_title:\"Les bases de l'investissement\", c4_b2_title:\"Types d'investissements\", c4_b3_title:'Vidéo — Investir intelligemment', c4_b4_title:'La diversification du portefeuille',
    c4_p1:\"Investir, c'est mettre son argent au travail pour générer des rendements. Mais tout investissement comporte un risque — plus le rendement potentiel est élevé, plus le risque l'est aussi.\",
    c4_hbox_label:\"Règle d'or :\", c4_hbox_text:\"Ne jamais investir de l'argent dont vous avez besoin à court terme. L'investissement est une stratégie long terme.\",
    c4_card1_h:'Bons du Trésor',         c4_card1_p:'Faible risque, rendement modéré. Idéal pour débuter.',
    c4_card2_h:'Actions en bourse',      c4_card2_p:'Risque moyen à élevé, potentiel de croissance important.',
    c4_card3_h:'Immobilier',             c4_card3_p:'Investissement tangible, revenus locatifs stables.',
    c4_card4_h:\"Fonds d'investissement\", c4_card4_p:'Diversification automatique, gestion professionnelle.',
    c4_img_cap:'Ne pas mettre tous ses œufs dans le même panier',
    c4_diversif:'La diversification réduit le risque global de votre portefeuille en répartissant les investissements sur plusieurs actifs.',
    c4_task1:'Définir votre profil de risque', c4_task1s:'Conservateur, modéré ou dynamique ?',
    c4_task2:\"Rechercher les options d'investissement disponibles en Tunisie\", c4_task2s:'SICAV, bons du trésor, bourse de Tunis',
    c4_task3:'Simuler un investissement de 100 DT/mois sur 10 ans', c4_task3s:'Calculer les intérêts composés',
    c4_q1:'1. Quel type d\\'investissement est le moins risqué pour un débutant ?',
    c4_q2:'2. Qu\\'est-ce que la diversification ?',
    c4_q3:'3. L\\'investissement est une stratégie :',
    fq_q1_num:'Question 1 / 10 · Budget',       fq_q1_text:'Dans la règle 50/30/20, quel pourcentage est alloué aux besoins essentiels ?',
    fq_q2_num:'Question 2 / 10 · Épargne',       fq_q2_text:'Quel est le principe \"payez-vous en premier\" ?',
    fq_q3_num:'Question 3 / 10 · Investissement',fq_q3_text:\"Qu'est-ce que la diversification d'un portefeuille ?\",
    fq_q4_num:'Question 4 / 10 · Gestion',       fq_q4_text:'Un café à 3 DT par jour représente combien par an ?',
    fq_q5_num:'Question 5 / 10 · Épargne',       fq_q5_text:\"Combien de mois de dépenses doit contenir une épargne de précaution ?\",
    fq_q6_num:'Question 6 / 10 · Investissement',fq_q6_text:\"Quel type d'investissement est généralement le moins risqué pour un débutant ?\",
    fq_q7_num:'Question 7 / 10 · Budget',        fq_q7_text:\"Quelle est la première étape recommandée avant de créer un budget ?\",
    fq_q8_num:'Question 8 / 10 · Gestion',       fq_q8_text:\"À quelle fréquence est recommandé un bilan financier personnel ?\",
    fq_q9_num:'Question 9 / 10 · Finance générale', fq_q9_text:\"Quel pourcentage minimum de ses revenus est recommandé d'épargner chaque mois ?\",
    fq_q10_num:'Question 10 / 10 · Investissement', fq_q10_text:\"L'investissement est principalement une stratégie :\",
  },
  en: {
    sidebar_progress:'Progress', sidebar_chapters:'Chapters', sidebar_eval:'Assessment',
    ch0_title:'Introduction',       ch0_sub:'Why manage your finances?',
    ch1_title:'Personal Budget',    ch1_sub:'Create and track your budget',
    ch2_title:'Savings',            ch2_sub:'Effective savings strategies',
    ch3_title:'Financial Management', ch3_sub:'Control your expenses',
    ch4_title:'Investment',         ch4_sub:'Grow your money',
    quiz_final_title:'Final Quiz',  quiz_final_sub:'Test your knowledge',
    tasks_title:'✅ Chapter tasks',
    quiz_label:'Quiz', quiz_final_label:'Final quiz', quiz_validate:'Submit answers',
    true_label:'True', false_label:'False',
    ch0_tag:'Chapter 1 · Introduction', ch0_h1:'Why manage your finances?',
    ch0_hero_p:'Understanding the basics of personal finance is the first step toward financial freedom.',
    ch0_next:'Personal Budget →',
    ch1_tag:'Chapter 2 · Personal Budget', ch1_h1:'Create and track your budget',
    ch1_hero_p:'A well-built budget is the foundation of good financial health.',
    ch1_prev:'← Introduction', ch1_next:'Savings →',
    ch2_tag:'Chapter 3 · Savings', ch2_h1:'Effective savings strategies',
    ch2_hero_p:'Saving regularly, even small amounts, creates lasting financial security.',
    ch2_prev:'← Budget', ch2_next:'Financial Management →',
    ch3_tag:'Chapter 4 · Financial Management', ch3_h1:'Control your daily expenses',
    ch3_hero_p:'Mastering your expenses is the key to reaching your financial goals without stress.',
    ch3_prev:'← Savings', ch3_next:'Investment →',
    ch4_tag:'Chapter 5 · Investment', ch4_h1:'Grow your money',
    ch4_hero_p:'Investment transforms your savings into a source of passive income and long-term growth.',
    ch4_prev:'← Financial Management', ch4_finish:'🎉 Finish the course',
    comment_leave:'Leave a comment', comment_name:'Your name',
    comment_name_ph:'E.g.: John D.', comment_text:'Your comment',
    comment_text_ph:'Share your thoughts on this chapter...',
    comment_publish:'Publish', comment_save:'💾 Save', comment_cancel:'Cancel',
    comment_none:'No comments for this chapter yet. Be the first!',
    fq_tag:'Final assessment · 10 questions', fq_h1:'Final Course Quiz',
    fq_hero_p:'Test all your knowledge on personal finance.',
    fq_intro_sub:'Test all your knowledge on personal finance. 10 questions covering all course chapters.',
    fq_meta_q:'10 questions', fq_meta_t:'~5 minutes',
    fq_start:'🚀 Start the final quiz',
    fq_prev:'← Previous', fq_next:'Next →', fq_submit:'🎯 See my score',
    fq_retry:'🔄 Retake the quiz',
    quiz_ok:'✅ Perfect!', quiz_correct:'correct answers. Chapter mastered!',
    quiz_wrong:'correct. Re-read the chapter and try again.',
    finish_alert:'🎉 Congratulations! You have completed the Personal Finance course with Dinari!',
    fq_result_great_title:'🏆 Excellent!',
    fq_result_great_msg:'You have perfectly mastered the basics of personal finance. You are ready to manage your finances like a pro!',
    fq_result_ok_title:'👍 Good level!',
    fq_result_ok_msg:'You have a good foundation. Re-read the chapters you hesitated on to consolidate your knowledge.',
    fq_result_low_title:'📚 Needs review!',
    fq_result_low_msg:\"Don't panic! Re-read the course chapters and retake the quiz. Personal finance is learned through practice.\",
    fq_badge_expert:'Dinari Expert', fq_badge_progress:'In progress',
    fq_badge_retry:'Needs work', fq_badge_correct:'correct',
    c0_b1_title:'What is personal finance?', c0_b2_title:'The 3 pillars of financial health', c0_b3_title:'Video — Introduction to personal finance', c0_b4_title:'The financial cycle',
    c0_p1:'Personal finance refers to all the decisions an individual makes to manage their income, expenses, savings and investments.',
    c0_p2:'Contrary to popular belief, managing your finances does not require being an economics expert. A few fundamental principles are enough.',
    c0_hbox_label:'Key takeaway:', c0_hbox_text:'78% of people who plan their budget reach their financial goals in less than 2 years.',
    c0_card1_h:'Expense control',    c0_card1_p:'Know where every dinar goes each month.',
    c0_card2_h:'Regular savings',    c0_card2_p:'Set aside at least 10% of your monthly income.',
    c0_card3_h:'Smart investment',   c0_card3_p:'Put your money to work to generate passive income.',
    c0_card4_h:'Emergency fund',     c0_card4_p:'Keep 3 to 6 months of expenses in reserve for unexpected events.',
    c0_img_cap:'Income → Expenses → Savings → Investment',
    c0_task1:'Watch the introduction video', c0_task1s:'Estimated time: 8 min',
    c0_task2:'List your 3 main expense sources', c0_task2s:'Practical exercise',
    c0_task3:'Answer the quiz below', c0_task3s:'Validate your knowledge',
    c0_q1:'1. What minimum percentage of income is recommended to save each month?',
    c0_q2:'2. How many months of expenses should an emergency fund contain?',
    c0_q3:'3. Personal finance requires being an economics expert.',
    c1_b1_title:'The 50/30/20 rule', c1_b2_title:'Visualize your budget', c1_b3_title:'Video — How to create your budget', c1_b4_title:'Practical tips',
    c1_p1:'The most popular method for budgeting income is the 50/30/20 rule:',
    c1_card1_h:'Essential needs',    c1_card1_p:'Rent, food, transport, bills.',
    c1_card2_h:'Personal wants',     c1_card2_p:'Leisure, restaurants, non-essential shopping.',
    c1_card3_h:'Savings & repayments',c1_card3_p:'Savings, investments, debt repayment.',
    c1_card4_h:'Concrete example',   c1_card4_p:'Income 2000 DT → 1000 needs, 600 wants, 400 savings.',
    c1_img_cap:'Visual breakdown of a balanced monthly budget',
    c1_hbox_label:'Dinari tip:', c1_hbox_text:'Use the envelope rule — allocate physical cash per category to better control your spending.',
    c1_tip1:'Track every expense for 30 days before creating your budget. You will be surprised where your money goes.',
    c1_tip2:'Review your budget every month. A budget is not fixed, it evolves with your situation.',
    c1_task1:'Calculate your net monthly income', c1_task1s:'The basis of any budget',
    c1_task2:'Apply the 50/30/20 rule to your situation', c1_task2s:'Allocation exercise',
    c1_task3:'Identify 3 expenses to reduce this month', c1_task3s:'Concrete action',
    c1_q1:'1. In the 50/30/20 rule, what percentage is allocated to savings?',
    c1_q2:'2. What is the first step before creating a budget?',
    c2_b1_title:'Why save?', c2_b2_title:'Types of savings', c2_b3_title:'Video — Savings strategies', c2_b4_title:'The power of compound interest',
    c2_p1:'Savings protect you against unexpected events, allow you to achieve your projects and form the basis of any future investment.',
    c2_hbox_label:'Key principle:', c2_hbox_text:'Pay yourself first. As soon as you receive your salary, automatically transfer your savings before spending.',
    c2_card1_h:'Emergency savings',  c2_card1_p:'3 to 6 months of expenses for emergencies.',
    c2_card2_h:'Project savings',    c2_card2_p:'Holidays, car, wedding — defined goal.',
    c2_card3_h:'Retirement savings', c2_card3_p:'Prepare for the future starting today.',
    c2_card4_h:'Investment savings', c2_card4_p:'Capital to generate passive income.',
    c2_img_cap:'Compound interest: your money working for you',
    c2_compound:'100 DT saved per month for 20 years at 5% interest = more than 41,000 DT.',
    c2_task1:'Define your monthly savings goal', c2_task1s:'Minimum 10% of your income',
    c2_task2:'Open a dedicated savings account', c2_task2s:'Separate savings from current expenses',
    c2_task3:'Set up an automatic transfer', c2_task3s:'On the day you receive your salary',
    c2_q1:'1. What is the \"pay yourself first\" principle?',
    c2_q2:'2. How many months of expenses should a precautionary savings contain?',
    c3_b1_title:'Identify hidden expenses', c3_b2_title:'Management tools', c3_b3_title:'Video — Manage your expenses effectively', c3_b4_title:'Financial dashboard',
    c3_p1:'Forgotten subscriptions, impulse purchases and small daily expenses can represent up to 30% of your budget without you realizing it.',
    c3_hbox_label:'Warning:', c3_hbox_text:'A coffee at 3 DT per day = 90 DT/month = 1,080 DT/year. Small expenses add up.',
    c3_card1_h:'Monthly dashboard',  c3_card1_p:'Track income vs expenses each month.',
    c3_card2_h:'Categorization',     c3_card2_p:'Classify each expense by category.',
    c3_card3_h:'Overspend alerts',   c3_card3_p:'Be notified when you exceed a budget.',
    c3_card4_h:'Quarterly review',   c3_card4_p:'Analyze your trends every 3 months.',
    c3_img_cap:'Visualize your finances at a glance',
    c3_task1:'List all your active subscriptions', c3_task1s:'Cancel unused ones',
    c3_task2:'Categorize last month\\'s expenses', c3_task2s:'Identify areas to reduce',
    c3_task3:'Set a ceiling for each category', c3_task3s:'Envelope budget',
    c3_q1:'1. How much does a 3 DT/day coffee cost per year?',
    c3_q2:'2. How often is a personal financial review recommended?',
    c4_b1_title:'Investment basics', c4_b2_title:'Types of investments', c4_b3_title:'Video — Invest intelligently', c4_b4_title:'Portfolio diversification',
    c4_p1:'Investing means putting your money to work to generate returns. But every investment carries risk — the higher the potential return, the higher the risk.',
    c4_hbox_label:'Golden rule:', c4_hbox_text:'Never invest money you need in the short term. Investment is a long-term strategy.',
    c4_card1_h:'Treasury bonds',     c4_card1_p:'Low risk, moderate return. Ideal for beginners.',
    c4_card2_h:'Stock market',       c4_card2_p:'Medium to high risk, significant growth potential.',
    c4_card3_h:'Real estate',        c4_card3_p:'Tangible investment, stable rental income.',
    c4_card4_h:'Investment funds',   c4_card4_p:'Automatic diversification, professional management.',
    c4_img_cap:\"Don't put all your eggs in one basket\",
    c4_diversif:'Diversification reduces the overall risk of your portfolio by spreading investments across multiple assets.',
    c4_task1:'Define your risk profile', c4_task1s:'Conservative, moderate or dynamic?',
    c4_task2:'Research investment options available in Tunisia', c4_task2s:'SICAV, treasury bonds, Tunis stock exchange',
    c4_task3:'Simulate a 100 DT/month investment over 10 years', c4_task3s:'Calculate compound interest',
    c4_q1:'1. Which type of investment is least risky for a beginner?',
    c4_q2:'2. What is diversification?',
    c4_q3:'3. Investment is primarily a strategy:',
    fq_q1_num:'Question 1 / 10 · Budget',       fq_q1_text:'In the 50/30/20 rule, what percentage is allocated to essential needs?',
    fq_q2_num:'Question 2 / 10 · Savings',       fq_q2_text:'What is the \"pay yourself first\" principle?',
    fq_q3_num:'Question 3 / 10 · Investment',    fq_q3_text:'What is portfolio diversification?',
    fq_q4_num:'Question 4 / 10 · Management',    fq_q4_text:'How much does a 3 DT/day coffee cost per year?',
    fq_q5_num:'Question 5 / 10 · Savings',       fq_q5_text:'How many months of expenses should a precautionary savings contain?',
    fq_q6_num:'Question 6 / 10 · Investment',    fq_q6_text:'Which type of investment is generally least risky for a beginner?',
    fq_q7_num:'Question 7 / 10 · Budget',        fq_q7_text:'What is the recommended first step before creating a budget?',
    fq_q8_num:'Question 8 / 10 · Management',    fq_q8_text:'How often is a personal financial review recommended?',
    fq_q9_num:'Question 9 / 10 · General finance',fq_q9_text:'What minimum percentage of income is recommended to save each month?',
    fq_q10_num:'Question 10 / 10 · Investment',  fq_q10_text:'Investment is primarily a:',
  },
  ar: {
    sidebar_progress:'التقدم', sidebar_chapters:'الفصول', sidebar_eval:'التقييم',
    ch0_title:'مقدمة',              ch0_sub:'لماذا تدير أموالك؟',
    ch1_title:'الميزانية الشخصية', ch1_sub:'إنشاء وتتبع ميزانيتك',
    ch2_title:'الادخار',            ch2_sub:'استراتيجيات ادخار فعّالة',
    ch3_title:'الإدارة المالية',    ch3_sub:'التحكم في مصاريفك',
    ch4_title:'الاستثمار',          ch4_sub:'تنمية أموالك',
    quiz_final_title:'الاختبار النهائي', quiz_final_sub:'اختبر معلوماتك',
    tasks_title:'✅ مهام الفصل',
    quiz_label:'اختبار', quiz_final_label:'الاختبار النهائي', quiz_validate:'تأكيد الإجابات',
    true_label:'صحيح', false_label:'خطأ',
    ch0_tag:'الفصل 1 · مقدمة', ch0_h1:'لماذا تدير أموالك؟',
    ch0_hero_p:'فهم أساسيات الإدارة المالية الشخصية هو الخطوة الأولى نحو الحرية المالية.',
    ch0_next:'الميزانية الشخصية ←',
    ch1_tag:'الفصل 2 · الميزانية الشخصية', ch1_h1:'إنشاء وتتبع ميزانيتك',
    ch1_hero_p:'الميزانية المبنية جيداً هي أساس الصحة المالية الجيدة.',
    ch1_prev:'← مقدمة', ch1_next:'الادخار ←',
    ch2_tag:'الفصل 3 · الادخار', ch2_h1:'استراتيجيات ادخار فعّالة',
    ch2_hero_p:'الادخار المنتظم، حتى بمبالغ صغيرة، يخلق أمناً مالياً دائماً.',
    ch2_prev:'← الميزانية', ch2_next:'الإدارة المالية ←',
    ch3_tag:'الفصل 4 · الإدارة المالية', ch3_h1:'التحكم في مصاريفك اليومية',
    ch3_hero_p:'إتقان مصاريفك هو مفتاح تحقيق أهدافك المالية بدون توتر.',
    ch3_prev:'← الادخار', ch3_next:'الاستثمار ←',
    ch4_tag:'الفصل 5 · الاستثمار', ch4_h1:'تنمية أموالك',
    ch4_hero_p:'الاستثمار يحوّل مدخراتك إلى مصدر للدخل السلبي والنمو على المدى البعيد.',
    ch4_prev:'← الإدارة المالية', ch4_finish:'🎉 إنهاء الدورة',
    comment_leave:'اترك تعليقاً', comment_name:'اسمك',
    comment_name_ph:'مثال: محمد ت.', comment_text:'تعليقك',
    comment_text_ph:'شارك رأيك حول هذا الفصل...',
    comment_publish:'نشر', comment_save:'💾 حفظ', comment_cancel:'إلغاء',
    comment_none:'لا توجد تعليقات لهذا الفصل. كن أول من يعلّق!',
    fq_tag:'التقييم النهائي · 10 أسئلة', fq_h1:'الاختبار النهائي للدورة',
    fq_hero_p:'اختبر جميع معلوماتك حول الإدارة المالية الشخصية.',
    fq_intro_sub:'اختبر جميع معلوماتك حول الإدارة المالية الشخصية. 10 أسئلة تغطي جميع فصول الدورة.',
    fq_meta_q:'10 أسئلة', fq_meta_t:'~5 دقائق',
    fq_start:'🚀 ابدأ الاختبار النهائي',
    fq_prev:'← السابق', fq_next:'التالي →', fq_submit:'🎯 عرض نتيجتي',
    fq_retry:'🔄 إعادة الاختبار',
    quiz_ok:'✅ ممتاز!', quiz_correct:'إجابات صحيحة. أتقنت الفصل!',
    quiz_wrong:'صحيحة. أعد قراءة الفصل وحاول مجدداً.',
    finish_alert:'🎉 تهانينا! لقد أتممت دورة الإدارة المالية الشخصية مع دينار!',
    fq_result_great_title:'🏆 ممتاز!',
    fq_result_great_msg:'أتقنت تماماً أساسيات الإدارة المالية الشخصية. أنت مستعد لإدارة أموالك كالمحترفين!',
    fq_result_ok_title:'👍 مستوى جيد!',
    fq_result_ok_msg:'لديك أسس جيدة. أعد قراءة الفصول التي ترددت فيها لتعزيز معلوماتك.',
    fq_result_low_title:'📚 يحتاج مراجعة!',
    fq_result_low_msg:'لا تقلق! أعد قراءة فصول الدورة وأعد الاختبار. الإدارة المالية تُتعلم بالتطبيق.',
    fq_badge_expert:'خبير دينار', fq_badge_progress:'في تقدم',
    fq_badge_retry:'يحتاج عمل', fq_badge_correct:'صحيح',
    c0_b1_title:'ما هي الإدارة المالية الشخصية؟', c0_b2_title:'الركائز الثلاث للصحة المالية', c0_b3_title:'فيديو — مقدمة في الإدارة المالية الشخصية', c0_b4_title:'الدورة المالية',
    c0_p1:'الإدارة المالية الشخصية هي مجموع القرارات التي يتخذها الفرد لإدارة دخله ومصاريفه ومدخراته واستثماراته.',
    c0_p2:'خلافاً للاعتقاد الشائع، لا تتطلب إدارة أموالك أن تكون خبيراً في الاقتصاد. بعض المبادئ الأساسية كافية.',
    c0_hbox_label:'للتذكر:', c0_hbox_text:'78% من الأشخاص الذين يخططون لميزانيتهم يحققون أهدافهم المالية في أقل من سنتين.',
    c0_card1_h:'التحكم في المصاريف', c0_card1_p:'معرفة أين يذهب كل دينار كل شهر.',
    c0_card2_h:'الادخار المنتظم',    c0_card2_p:'توفير ما لا يقل عن 10% من دخلك الشهري.',
    c0_card3_h:'الاستثمار الذكي',    c0_card3_p:'تشغيل أموالك لتوليد دخل سلبي.',
    c0_card4_h:'صندوق الطوارئ',      c0_card4_p:'الاحتفاظ بمصاريف 3 إلى 6 أشهر احتياطاً للطوارئ.',
    c0_img_cap:'الدخل ← المصاريف ← الادخار ← الاستثمار',
    c0_task1:'مشاهدة فيديو المقدمة', c0_task1s:'المدة المقدرة: 8 دقائق',
    c0_task2:'إدراج مصادر مصاريفك الثلاثة الرئيسية', c0_task2s:'تمرين عملي',
    c0_task3:'الإجابة على الاختبار أدناه', c0_task3s:'التحقق من معلوماتك',
    c0_q1:'1. ما هي النسبة الدنيا الموصى بادخارها كل شهر؟',
    c0_q2:'2. كم شهراً من المصاريف يجب أن يحتوي صندوق الطوارئ؟',
    c0_q3:'3. تتطلب الإدارة المالية الشخصية أن تكون خبيراً في الاقتصاد.',
    c1_b1_title:'قاعدة 50/30/20', c1_b2_title:'تصور ميزانيتك', c1_b3_title:'فيديو — كيفية إنشاء ميزانيتك', c1_b4_title:'نصائح عملية',
    c1_p1:'الطريقة الأكثر شيوعاً لوضع ميزانية الدخل هي قاعدة 50/30/20:',
    c1_card1_h:'الاحتياجات الأساسية', c1_card1_p:'الإيجار، الطعام، المواصلات، الفواتير.',
    c1_card2_h:'الرغبات الشخصية',     c1_card2_p:'الترفيه، المطاعم، التسوق غير الضروري.',
    c1_card3_h:'الادخار والسداد',      c1_card3_p:'الادخار، الاستثمارات، سداد الديون.',
    c1_card4_h:'مثال ملموس',           c1_card4_p:'دخل 2000 دت ← 1000 احتياجات، 600 رغبات، 400 ادخار.',
    c1_img_cap:'توزيع بصري لميزانية شهرية متوازنة',
    c1_hbox_label:'نصيحة دينار:', c1_hbox_text:'استخدم قاعدة الأظرف — خصص نقداً مادياً لكل فئة للتحكم بشكل أفضل في مصاريفك.',
    c1_tip1:'سجّل كل مصروف لمدة 30 يوماً قبل إنشاء ميزانيتك. ستندهش من أين تذهب أموالك.',
    c1_tip2:'راجع ميزانيتك كل شهر. الميزانية ليست ثابتة، بل تتطور مع وضعك.',
    c1_task1:'احسب دخلك الصافي الشهري', c1_task1s:'أساس أي ميزانية',
    c1_task2:'طبّق قاعدة 50/30/20 على وضعك', c1_task2s:'تمرين التوزيع',
    c1_task3:'حدد 3 مصاريف لتخفيضها هذا الشهر', c1_task3s:'إجراء ملموس',
    c1_q1:'1. في قاعدة 50/30/20، ما النسبة المخصصة للادخار؟',
    c1_q2:'2. ما هي الخطوة الأولى قبل إنشاء ميزانية؟',
    c2_b1_title:'لماذا الادخار؟', c2_b2_title:'أنواع الادخار', c2_b3_title:'فيديو — استراتيجيات الادخار', c2_b4_title:'قوة الفائدة المركبة',
    c2_p1:'يحميك الادخار من المفاجآت، ويتيح لك تحقيق مشاريعك، ويشكّل أساس أي استثمار مستقبلي.',
    c2_hbox_label:'مبدأ أساسي:', c2_hbox_text:'ادفع لنفسك أولاً. بمجرد استلام راتبك، حوّل مدخراتك تلقائياً قبل الإنفاق.',
    c2_card1_h:'ادخار الطوارئ',    c2_card1_p:'مصاريف 3 إلى 6 أشهر للطوارئ.',
    c2_card2_h:'ادخار المشاريع',   c2_card2_p:'عطلة، سيارة، زواج — هدف محدد.',
    c2_card3_h:'ادخار التقاعد',    c2_card3_p:'الاستعداد للمستقبل منذ اليوم.',
    c2_card4_h:'ادخار الاستثمار',  c2_card4_p:'رأس مال لتوليد دخل سلبي.',
    c2_img_cap:'الفائدة المركبة: أموالك تعمل من أجلك',
    c2_compound:'100 دت مدخرة شهرياً لمدة 20 سنة بفائدة 5% = أكثر من 41,000 دت.',
    c2_task1:'حدد هدف ادخارك الشهري', c2_task1s:'10% من دخلك كحد أدنى',
    c2_task2:'افتح حساب ادخار مخصصاً', c2_task2s:'فصل الادخار عن المصاريف الجارية',
    c2_task3:'اضبط تحويلاً تلقائياً', c2_task3s:'يوم استلام الراتب',
    c2_q1:'1. ما هو مبدأ \"ادفع لنفسك أولاً\"؟',
    c2_q2:'2. كم شهراً من المصاريف يجب أن يحتوي ادخار الطوارئ؟',
    c3_b1_title:'تحديد المصاريف الخفية', c3_b2_title:'أدوات الإدارة', c3_b3_title:'فيديو — إدارة مصاريفك بفعالية', c3_b4_title:'لوحة القيادة المالية',
    c3_p1:'الاشتراكات المنسية والمشتريات الاندفاعية والمصاريف اليومية الصغيرة قد تمثل ما يصل إلى 30% من ميزانيتك دون أن تدرك ذلك.',
    c3_hbox_label:'تحذير:', c3_hbox_text:'قهوة بـ3 دت يومياً = 90 دت/شهر = 1,080 دت/سنة. المصاريف الصغيرة تتراكم.',
    c3_card1_h:'لوحة القيادة الشهرية', c3_card1_p:'تتبع الدخل مقابل المصاريف كل شهر.',
    c3_card2_h:'التصنيف',              c3_card2_p:'تصنيف كل مصروف حسب الفئة.',
    c3_card3_h:'تنبيهات التجاوز',      c3_card3_p:'الإشعار عند تجاوز الميزانية.',
    c3_card4_h:'المراجعة الفصلية',     c3_card4_p:'تحليل اتجاهاتك كل 3 أشهر.',
    c3_img_cap:'تصور شؤونك المالية دفعة واحدة',
    c3_task1:'أدرج جميع اشتراكاتك النشطة', c3_task1s:'إلغاء غير المستخدمة',
    c3_task2:'صنّف مصاريف الشهر الماضي', c3_task2s:'تحديد البنود القابلة للتخفيض',
    c3_task3:'حدد سقفاً لكل فئة', c3_task3s:'ميزانية الأظرف',
    c3_q1:'1. كم تكلف قهوة بـ3 دت/يوم في السنة؟',
    c3_q2:'2. ما هي الفترة الموصى بها لمراجعة الوضع المالي؟',
    c4_b1_title:'أساسيات الاستثمار', c4_b2_title:'أنواع الاستثمارات', c4_b3_title:'فيديو — الاستثمار بذكاء', c4_b4_title:'تنويع المحفظة',
    c4_p1:'الاستثمار يعني تشغيل أموالك لتوليد عوائد. لكن كل استثمار ينطوي على مخاطرة — كلما ارتفع العائد المحتمل، ارتفعت المخاطرة.',
    c4_hbox_label:'القاعدة الذهبية:', c4_hbox_text:'لا تستثمر أبداً أموالاً تحتاجها على المدى القصير. الاستثمار استراتيجية طويلة الأمد.',
    c4_card1_h:'سندات الخزينة',       c4_card1_p:'مخاطرة منخفضة، عائد معتدل. مثالي للمبتدئين.',
    c4_card2_h:'الأسهم في البورصة',   c4_card2_p:'مخاطرة متوسطة إلى عالية، إمكانية نمو كبيرة.',
    c4_card3_h:'العقارات',             c4_card3_p:'استثمار ملموس، دخل إيجاري مستقر.',
    c4_card4_h:'صناديق الاستثمار',    c4_card4_p:'تنويع تلقائي، إدارة احترافية.',
    c4_img_cap:'لا تضع كل بيضك في سلة واحدة',
    c4_diversif:'يقلل التنويع من المخاطر الإجمالية لمحفظتك بتوزيع الاستثمارات على أصول متعددة.',
    c4_task1:'حدد ملف مخاطرتك', c4_task1s:'محافظ، معتدل أم ديناميكي؟',
    c4_task2:'ابحث عن خيارات الاستثمار المتاحة في تونس', c4_task2s:'SICAV، سندات الخزينة، بورصة تونس',
    c4_task3:'محاكاة استثمار 100 دت/شهر على 10 سنوات', c4_task3s:'احسب الفائدة المركبة',
    c4_q1:'1. أي نوع من الاستثمارات هو الأقل خطورة للمبتدئين؟',
    c4_q2:'2. ما هو التنويع؟',
    c4_q3:'3. الاستثمار هو استراتيجية:',
    fq_q1_num:'السؤال 1 / 10 · الميزانية',       fq_q1_text:'في قاعدة 50/30/20، ما النسبة المخصصة للاحتياجات الأساسية؟',
    fq_q2_num:'السؤال 2 / 10 · الادخار',          fq_q2_text:'ما هو مبدأ \"ادفع لنفسك أولاً\"؟',
    fq_q3_num:'السؤال 3 / 10 · الاستثمار',        fq_q3_text:'ما هو تنويع المحفظة الاستثمارية؟',
    fq_q4_num:'السؤال 4 / 10 · الإدارة',          fq_q4_text:'كم تكلف قهوة بـ3 دت/يوم في السنة؟',
    fq_q5_num:'السؤال 5 / 10 · الادخار',          fq_q5_text:'كم شهراً من المصاريف يجب أن يحتوي ادخار الطوارئ؟',
    fq_q6_num:'السؤال 6 / 10 · الاستثمار',        fq_q6_text:'أي نوع من الاستثمارات هو الأقل خطورة عموماً للمبتدئين؟',
    fq_q7_num:'السؤال 7 / 10 · الميزانية',        fq_q7_text:'ما هي الخطوة الأولى الموصى بها قبل إنشاء ميزانية؟',
    fq_q8_num:'السؤال 8 / 10 · الإدارة',          fq_q8_text:'ما هي الفترة الموصى بها لمراجعة الوضع المالي الشخصي؟',
    fq_q9_num:'السؤال 9 / 10 · المالية العامة',   fq_q9_text:'ما هي النسبة الدنيا من الدخل الموصى بادخارها كل شهر؟',
    fq_q10_num:'السؤال 10 / 10 · الاستثمار',      fq_q10_text:'الاستثمار هو بشكل رئيسي:',
  }
};

function applyPageTranslations(lang) {
  const base = (typeof DINARI_TRANSLATIONS !== 'undefined' && DINARI_TRANSLATIONS[lang]) || {};
  const page = (window.PAGE_T && window.PAGE_T[lang]) || {};
  const t = Object.assign({}, base, page);

  // helper: set text of first matching element, preserving child nodes not targeted
  function tx(sel, text) {
    const el = document.querySelector(sel);
    if (el && text) el.textContent = text;
  }
  // helper: set text of nth matching element (0-indexed)
  function txn(sel, n, text) {
    const els = document.querySelectorAll(sel);
    if (els[n] && text) els[n].textContent = text;
  }

  /* ── SIDEBAR ── */
  tx('.prog-label span:first-child',                    t.sidebar_progress);
  tx('.sb-section:first-of-type',                       t.sidebar_chapters);
  tx('.sb-section:last-of-type',                        t.sidebar_eval);
  tx('[data-ch=\"0\"] .ch-lbl',                           t.ch0_title);
  tx('[data-ch=\"0\"] .ch-sub',                           t.ch0_sub);
  tx('[data-ch=\"1\"] .ch-lbl',                           t.ch1_title);
  tx('[data-ch=\"1\"] .ch-sub',                           t.ch1_sub);
  tx('[data-ch=\"2\"] .ch-lbl',                           t.ch2_title);
  tx('[data-ch=\"2\"] .ch-sub',                           t.ch2_sub);
  tx('[data-ch=\"3\"] .ch-lbl',                           t.ch3_title);
  tx('[data-ch=\"3\"] .ch-sub',                           t.ch3_sub);
  tx('[data-ch=\"4\"] .ch-lbl',                           t.ch4_title);
  tx('[data-ch=\"4\"] .ch-sub',                           t.ch4_sub);
  tx('[data-ch=\"quiz\"] .ch-lbl',                        t.quiz_final_title);
  tx('[data-ch=\"quiz\"] .ch-sub',                        t.quiz_final_sub);

  /* ── CHAPTER 0 ── */
  tx('#chapter-0 .ch-tag',   t.ch0_tag);
  tx('#chapter-0 h1',        t.ch0_h1);
  tx('#chapter-0 .ch-hero p',t.ch0_hero_p);
  tx('#chapter-0 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-0 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-0 .ch-nav .btn-next', t.ch0_next);

  /* ── CHAPTER 1 ── */
  tx('#chapter-1 .ch-tag',   t.ch1_tag);
  tx('#chapter-1 h1',        t.ch1_h1);
  tx('#chapter-1 .ch-hero p',t.ch1_hero_p);
  tx('#chapter-1 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-1 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-1 .ch-nav .btn-prev', t.ch1_prev);
  tx('#chapter-1 .ch-nav .btn-next', t.ch1_next);

  /* ── CHAPTER 2 ── */
  tx('#chapter-2 .ch-tag',   t.ch2_tag);
  tx('#chapter-2 h1',        t.ch2_h1);
  tx('#chapter-2 .ch-hero p',t.ch2_hero_p);
  tx('#chapter-2 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-2 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-2 .ch-nav .btn-prev', t.ch2_prev);
  tx('#chapter-2 .ch-nav .btn-next', t.ch2_next);

  /* ── CHAPTER 3 ── */
  tx('#chapter-3 .ch-tag',   t.ch3_tag);
  tx('#chapter-3 h1',        t.ch3_h1);
  tx('#chapter-3 .ch-hero p',t.ch3_hero_p);
  tx('#chapter-3 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-3 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-3 .ch-nav .btn-prev', t.ch3_prev);
  tx('#chapter-3 .ch-nav .btn-next', t.ch3_next);

  /* ── CHAPTER 4 ── */
  tx('#chapter-4 .ch-tag',   t.ch4_tag);
  tx('#chapter-4 h1',        t.ch4_h1);
  tx('#chapter-4 .ch-hero p',t.ch4_hero_p);
  tx('#chapter-4 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-4 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-4 .ch-nav .btn-prev', t.ch4_prev);
  tx('#chapter-4 .ch-nav .btn-next', t.ch4_finish);

  /* ── FINAL QUIZ ── */
  tx('#chapter-quiz .ch-tag',       t.fq_tag);
  tx('#chapter-quiz h1',            t.fq_h1);
  tx('#chapter-quiz .ch-hero p',    t.fq_hero_p);
  tx('.fq-intro-title',             t.fq_h1);
  tx('.fq-intro-sub',               t.fq_intro_sub);
  tx('.btn-start-fq',               t.fq_start);
  tx('#fq-btn-prev',                t.fq_prev);
  tx('#fq-btn-next',                t.fq_next);
  tx('#fq-btn-submit',              t.fq_submit);
  tx('.btn-retry',                  t.fq_retry);

  /* ── COMMENT FORMS (all chapters) ── */
  document.querySelectorAll('.cf-title').forEach(el => el.textContent = t.comment_leave);
  document.querySelectorAll('.cf-field label:first-of-type').forEach((el, i) => {
    el.textContent = i % 2 === 0 ? t.comment_name : t.comment_text;
  });
  document.querySelectorAll('input[name=\"auteur\"]').forEach(el => el.placeholder = t.comment_name_ph);
  document.querySelectorAll('textarea[name=\"contenu\"]').forEach(el => el.placeholder = t.comment_text_ph);
  document.querySelectorAll('.btn-comment').forEach(el => el.textContent = t.comment_publish);
  document.querySelectorAll('.no-comments').forEach(el => el.textContent = t.comment_none);
  document.querySelectorAll('.btn-inline-save').forEach(el => el.textContent = t.comment_save);
  document.querySelectorAll('.btn-inline-cancel').forEach(el => el.textContent = t.comment_cancel);

  /* ── helper: set last text node of element (skips child elements like .ico) ── */
  function txNode(el, text) {
    if (!el || !text) return;
    const nodes = el.childNodes;
    for (let i = nodes.length - 1; i >= 0; i--) {
      if (nodes[i].nodeType === 3) { nodes[i].textContent = text; return; }
    }
    el.textContent = text; // fallback
  }
  function txNodeSel(sel, text) { txNode(document.querySelector(sel), text); }
  function txNodeAll(sel, texts) {
    document.querySelectorAll(sel).forEach((el, i) => { if (texts[i]) txNode(el, texts[i]); });
  }
  function txAll(sel, texts) {
    document.querySelectorAll(sel).forEach((el, i) => { if (texts[i]) el.textContent = texts[i]; });
  }
  function txAllSame(sel, text) {
    document.querySelectorAll(sel).forEach(el => { if (text) el.textContent = text; });
  }

  /* ══ CHAPTER 0 — INTRODUCTION ══ */
  txNodeAll('#chapter-0 .btitle', [
    t.c0_b1_title, t.c0_b2_title, t.c0_b3_title, t.c0_b4_title
  ]);
  txAll('#chapter-0 .cblock:nth-child(2) p', [t.c0_p1, t.c0_p2]);
  tx('#chapter-0 .hbox strong', t.c0_hbox_label);
  txNode(document.querySelector('#chapter-0 .hbox'), t.c0_hbox_text);
  txAll('#chapter-0 .ex-card h5', [t.c0_card1_h, t.c0_card2_h, t.c0_card3_h, t.c0_card4_h]);
  txAll('#chapter-0 .ex-card p',  [t.c0_card1_p, t.c0_card2_p, t.c0_card3_p, t.c0_card4_p]);
  tx('#chapter-0 .img-cap', t.c0_img_cap);
  txAll('#chapter-0 .tlbl', [t.c0_task1, t.c0_task2, t.c0_task3]);
  txAll('#chapter-0 .tsub', [t.c0_task1s, t.c0_task2s, t.c0_task3s]);
  txAll('#chapter-0 .quiz-q p', [t.c0_q1, t.c0_q2, t.c0_q3]);

  /* ══ CHAPTER 1 — BUDGET ══ */
  txNodeAll('#chapter-1 .btitle', [
    t.c1_b1_title, t.c1_b2_title, t.c1_b3_title, t.c1_b4_title
  ]);
  tx('#chapter-1 .cblock:nth-child(2) p', t.c1_p1);
  txAll('#chapter-1 .ex-card h5', [t.c1_card1_h, t.c1_card2_h, t.c1_card3_h, t.c1_card4_h]);
  txAll('#chapter-1 .ex-card p',  [t.c1_card1_p, t.c1_card2_p, t.c1_card3_p, t.c1_card4_p]);
  tx('#chapter-1 .img-cap', t.c1_img_cap);
  tx('#chapter-1 .hbox strong', t.c1_hbox_label);
  txNode(document.querySelector('#chapter-1 .hbox'), t.c1_hbox_text);
  const c1ps = document.querySelectorAll('#chapter-1 .cblock:nth-child(5) p');
  if (c1ps[0]) c1ps[0].textContent = t.c1_tip1;
  if (c1ps[1]) c1ps[1].textContent = t.c1_tip2;
  txAll('#chapter-1 .tlbl', [t.c1_task1, t.c1_task2, t.c1_task3]);
  txAll('#chapter-1 .tsub', [t.c1_task1s, t.c1_task2s, t.c1_task3s]);
  txAll('#chapter-1 .quiz-q p', [t.c1_q1, t.c1_q2]);

  /* ══ CHAPTER 2 — ÉPARGNE ══ */
  txNodeAll('#chapter-2 .btitle', [
    t.c2_b1_title, t.c2_b2_title, t.c2_b3_title, t.c2_b4_title
  ]);
  tx('#chapter-2 .cblock:nth-child(2) p', t.c2_p1);
  tx('#chapter-2 .hbox strong', t.c2_hbox_label);
  txNode(document.querySelector('#chapter-2 .hbox'), t.c2_hbox_text);
  txAll('#chapter-2 .ex-card h5', [t.c2_card1_h, t.c2_card2_h, t.c2_card3_h, t.c2_card4_h]);
  txAll('#chapter-2 .ex-card p',  [t.c2_card1_p, t.c2_card2_p, t.c2_card3_p, t.c2_card4_p]);
  tx('#chapter-2 .img-cap', t.c2_img_cap);
  const c2ps = document.querySelectorAll('#chapter-2 .cblock:nth-child(5) p:not(.img-cap)');
  if (c2ps[0]) c2ps[0].textContent = t.c2_compound;
  txAll('#chapter-2 .tlbl', [t.c2_task1, t.c2_task2, t.c2_task3]);
  txAll('#chapter-2 .tsub', [t.c2_task1s, t.c2_task2s, t.c2_task3s]);
  txAll('#chapter-2 .quiz-q p', [t.c2_q1, t.c2_q2]);

  /* ══ CHAPTER 3 — GESTION ══ */
  txNodeAll('#chapter-3 .btitle', [
    t.c3_b1_title, t.c3_b2_title, t.c3_b3_title, t.c3_b4_title
  ]);
  tx('#chapter-3 .cblock:nth-child(2) p', t.c3_p1);
  tx('#chapter-3 .hbox strong', t.c3_hbox_label);
  txNode(document.querySelector('#chapter-3 .hbox'), t.c3_hbox_text);
  txAll('#chapter-3 .ex-card h5', [t.c3_card1_h, t.c3_card2_h, t.c3_card3_h, t.c3_card4_h]);
  txAll('#chapter-3 .ex-card p',  [t.c3_card1_p, t.c3_card2_p, t.c3_card3_p, t.c3_card4_p]);
  tx('#chapter-3 .img-cap', t.c3_img_cap);
  txAll('#chapter-3 .tlbl', [t.c3_task1, t.c3_task2, t.c3_task3]);
  txAll('#chapter-3 .tsub', [t.c3_task1s, t.c3_task2s, t.c3_task3s]);
  txAll('#chapter-3 .quiz-q p', [t.c3_q1, t.c3_q2]);

  /* ══ CHAPTER 4 — INVESTISSEMENT ══ */
  txNodeAll('#chapter-4 .btitle', [
    t.c4_b1_title, t.c4_b2_title, t.c4_b3_title, t.c4_b4_title
  ]);
  tx('#chapter-4 .cblock:nth-child(2) p', t.c4_p1);
  tx('#chapter-4 .hbox strong', t.c4_hbox_label);
  txNode(document.querySelector('#chapter-4 .hbox'), t.c4_hbox_text);
  txAll('#chapter-4 .ex-card h5', [t.c4_card1_h, t.c4_card2_h, t.c4_card3_h, t.c4_card4_h]);
  txAll('#chapter-4 .ex-card p',  [t.c4_card1_p, t.c4_card2_p, t.c4_card3_p, t.c4_card4_p]);
  tx('#chapter-4 .img-cap', t.c4_img_cap);
  const c4ps = document.querySelectorAll('#chapter-4 .cblock:nth-child(5) p:not(.img-cap)');
  if (c4ps[0]) c4ps[0].textContent = t.c4_diversif;
  txAll('#chapter-4 .tlbl', [t.c4_task1, t.c4_task2, t.c4_task3]);
  txAll('#chapter-4 .tsub', [t.c4_task1s, t.c4_task2s, t.c4_task3s]);
  txAll('#chapter-4 .quiz-q p', [t.c4_q1, t.c4_q2, t.c4_q3]);

  /* ══ FINAL QUIZ questions ══ */
  txAll('.fq-q-num',  [t.fq_q1_num,t.fq_q2_num,t.fq_q3_num,t.fq_q4_num,t.fq_q5_num,t.fq_q6_num,t.fq_q7_num,t.fq_q8_num,t.fq_q9_num,t.fq_q10_num]);
  txAll('.fq-q-text', [t.fq_q1_text,t.fq_q2_text,t.fq_q3_text,t.fq_q4_text,t.fq_q5_text,t.fq_q6_text,t.fq_q7_text,t.fq_q8_text,t.fq_q9_text,t.fq_q10_text]);
}
</script>
<script>
// Load notification unread count into the badge inside the cours sub-nav
fetch('/notifications/unread-count')
    .then(r => r.json())
    .then(data => {
        const badge = document.getElementById('notif-badge');
        if (badge && data.count > 0) {
            badge.textContent = data.count;
            badge.style.display = 'inline-flex';
        }
    })
    .catch(() => {});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 282
    public function macro_chapter_comments($slug = null, $label = null, $commentaires = null, $my_ids = null, $my_reactions = null, $error = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "slug" => $slug,
            "label" => $label,
            "commentaires" => $commentaires,
            "my_ids" => $my_ids,
            "my_reactions" => $my_reactions,
            "error" => $error,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "chapter_comments"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "chapter_comments"));

            // line 283
            yield "<div class=\"chapter-comments-block\">
  <div class=\"cc-header\">
    <span class=\"cc-title\">💬 Commentaires — ";
            // line 285
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 285, $this->source); })()), "html", null, true);
            yield "</span>
    <span class=\"cc-count\">
      ";
            // line 287
            $context["ch_comments"] = Twig\Extension\CoreExtension::filter($this->env, (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 287, $this->source); })()), function ($__c__) use ($context, $macros) { $context["c"] = $__c__; return ((((CoreExtension::getAttribute($this->env, $this->source, ($context["c"] ?? null), "chapitre", [], "any", true, true, false, 287) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 287, $this->source); })()), "chapitre", [], "any", false, false, false, 287)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 287, $this->source); })()), "chapitre", [], "any", false, false, false, 287)) : ("introduction")) == (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 287, $this->source); })())); });
            // line 288
            yield "      ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["ch_comments"]) || array_key_exists("ch_comments", $context) ? $context["ch_comments"] : (function () { throw new RuntimeError('Variable "ch_comments" does not exist.', 288, $this->source); })())), "html", null, true);
            yield " commentaire";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["ch_comments"]) || array_key_exists("ch_comments", $context) ? $context["ch_comments"] : (function () { throw new RuntimeError('Variable "ch_comments" does not exist.', 288, $this->source); })())) != 1)) ? ("s") : (""));
            yield "
    </span>
  </div>

  ";
            // line 293
            yield "  <div class=\"comment-form-block\">
    <div class=\"cf-title\">Laisser un commentaire</div>
    ";
            // line 295
            if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 295, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 296
                yield "      <div class=\"cf-error\">⚠️ ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 296, $this->source); })()), "html", null, true);
                yield "</div>
    ";
            }
            // line 298
            yield "    <form method=\"POST\" action=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cours_index");
            yield "\" class=\"cf-form\">
      <input type=\"hidden\" name=\"_action\" value=\"comment\">
      <input type=\"hidden\" name=\"chapitre\" value=\"";
            // line 300
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 300, $this->source); })()), "html", null, true);
            yield "\">
      <div class=\"cf-field\">
        <label>Votre nom</label>
        <input type=\"text\" name=\"auteur\" placeholder=\"Ex : Mohamed T.\" maxlength=\"100\" required>
      </div>
      <div class=\"cf-field\">
        <label>Votre commentaire</label>
        <textarea name=\"contenu\" rows=\"3\" placeholder=\"Partagez votre avis sur ce chapitre...\" maxlength=\"1000\" required></textarea>
      </div>
      <button type=\"submit\" class=\"btn-comment\">Publier</button>
    </form>
  </div>

  ";
            // line 314
            yield "  ";
            $context["ch_list"] = Twig\Extension\CoreExtension::filter($this->env, (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 314, $this->source); })()), function ($__c__) use ($context, $macros) { $context["c"] = $__c__; return ((((CoreExtension::getAttribute($this->env, $this->source, ($context["c"] ?? null), "chapitre", [], "any", true, true, false, 314) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 314, $this->source); })()), "chapitre", [], "any", false, false, false, 314)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 314, $this->source); })()), "chapitre", [], "any", false, false, false, 314)) : ("introduction")) == (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 314, $this->source); })())); });
            // line 315
            yield "  ";
            if (Twig\Extension\CoreExtension::testEmpty((isset($context["ch_list"]) || array_key_exists("ch_list", $context) ? $context["ch_list"] : (function () { throw new RuntimeError('Variable "ch_list" does not exist.', 315, $this->source); })()))) {
                // line 316
                yield "    <div class=\"no-comments\">Aucun commentaire pour ce chapitre. Soyez le premier !</div>
  ";
            } else {
                // line 318
                yield "    <div class=\"comments-list\">
      ";
                // line 319
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["ch_list"]) || array_key_exists("ch_list", $context) ? $context["ch_list"] : (function () { throw new RuntimeError('Variable "ch_list" does not exist.', 319, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 320
                    yield "        <div class=\"comment-card\" id=\"comment-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 320), "html", null, true);
                    yield "\">
          ";
                    // line 321
                    if (CoreExtension::inFilter((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 321) . ""), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 321, $this->source); })()))) {
                        // line 322
                        yield "            <div class=\"comment-owner-actions\">
              <button class=\"btn-icon btn-icon-edit\" title=\"Modifier\" onclick=\"startEdit(";
                        // line 323
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 323), "html", null, true);
                        yield ")\">✏️</button>
              <form method=\"POST\" action=\"/cours/commentaire/";
                        // line 324
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 324), "html", null, true);
                        yield "/delete\" class=\"delete-form\"
                    onsubmit=\"return confirm('Supprimer ce commentaire ?')\">
                <input type=\"hidden\" name=\"_token\" value=\"";
                        // line 326
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_comment_" . CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 326))), "html", null, true);
                        yield "\">
                <button type=\"submit\" class=\"btn-icon btn-icon-del\" title=\"Supprimer\">🗑️</button>
              </form>
            </div>
          ";
                    }
                    // line 331
                    yield "          <div class=\"comment-avatar\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "auteur", [], "any", false, false, false, 331), 0, 1)), "html", null, true);
                    yield "</div>
          <div class=\"comment-body\">
            <div class=\"comment-meta\">
              <span class=\"comment-author\">";
                    // line 334
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "auteur", [], "any", false, false, false, 334), "html", null, true);
                    yield "</span>
              <span class=\"comment-date\">";
                    // line 335
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 335), "d/m/Y à H:i"), "html", null, true);
                    yield "</span>
              ";
                    // line 336
                    if (CoreExtension::inFilter((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 336) . ""), (isset($context["my_ids"]) || array_key_exists("my_ids", $context) ? $context["my_ids"] : (function () { throw new RuntimeError('Variable "my_ids" does not exist.', 336, $this->source); })()))) {
                        yield "<span class=\"comment-mine\">Moi</span>";
                    }
                    // line 337
                    yield "            </div>
            <p class=\"comment-text comment-view\" id=\"text-";
                    // line 338
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 338), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "contenu", [], "any", false, false, false, 338), "html", null, true);
                    yield "</p>
            <div class=\"comment-edit\" id=\"edit-";
                    // line 339
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 339), "html", null, true);
                    yield "\">
              <form method=\"POST\" action=\"/cours/commentaire/";
                    // line 340
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 340), "html", null, true);
                    yield "/edit\">
                <textarea class=\"inline-textarea\" name=\"contenu\" maxlength=\"1000\" required>";
                    // line 341
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "contenu", [], "any", false, false, false, 341), "html", null, true);
                    yield "</textarea>
                <div class=\"inline-edit-actions\">
                  <button type=\"submit\" class=\"btn-inline-save\">💾 Enregistrer</button>
                  <button type=\"button\" class=\"btn-inline-cancel\" onclick=\"cancelEdit(";
                    // line 344
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 344), "html", null, true);
                    yield ")\">Annuler</button>
                </div>
              </form>
            </div>
            <div class=\"reactions-bar\" id=\"reactions-";
                    // line 348
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 348), "html", null, true);
                    yield "\">
              ";
                    // line 349
                    $context["counts"] = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "reactionCounts", [], "any", false, false, false, 349);
                    // line 350
                    yield "              ";
                    $context["mine"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["my_reactions"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 350), [], "array", true, true, false, 350) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 350, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 350), [], "array", false, false, false, 350)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["my_reactions"]) || array_key_exists("my_reactions", $context) ? $context["my_reactions"] : (function () { throw new RuntimeError('Variable "my_reactions" does not exist.', 350, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 350), [], "array", false, false, false, 350)) : ([]));
                    // line 351
                    yield "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable((isset($context["counts"]) || array_key_exists("counts", $context) ? $context["counts"] : (function () { throw new RuntimeError('Variable "counts" does not exist.', 351, $this->source); })()));
                    foreach ($context['_seq'] as $context["emoji"] => $context["count"]) {
                        // line 352
                        yield "                <button class=\"reaction-chip ";
                        if (CoreExtension::inFilter($context["emoji"], (isset($context["mine"]) || array_key_exists("mine", $context) ? $context["mine"] : (function () { throw new RuntimeError('Variable "mine" does not exist.', 352, $this->source); })()))) {
                            yield "active";
                        }
                        yield "\"
                        onclick=\"toggleReaction(";
                        // line 353
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 353), "html", null, true);
                        yield ", '";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["emoji"], "html", null, true);
                        yield "', this)\" data-emoji=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["emoji"], "html", null, true);
                        yield "\">
                  <span class=\"rc\">";
                        // line 354
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["emoji"], "html", null, true);
                        yield "</span><span class=\"rn\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["count"], "html", null, true);
                        yield "</span>
                </button>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['emoji'], $context['count'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 357
                    yield "              <div class=\"reaction-wrap\">
                <button class=\"btn-add-reaction\" title=\"Réagir\" onclick=\"togglePicker(";
                    // line 358
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 358), "html", null, true);
                    yield ", event)\">😊</button>
                <div class=\"emoji-picker\" id=\"picker-";
                    // line 359
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 359), "html", null, true);
                    yield "\">
                  ";
                    // line 360
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(["👍", "👎", "😄", "🎉", "😮", "❤️", "🚀", "👀"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["emoji"]) {
                        // line 361
                        yield "                    <button class=\"ep-btn\" onclick=\"toggleReaction(";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 361), "html", null, true);
                        yield ", '";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["emoji"], "html", null, true);
                        yield "', null);closePicker(";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 361), "html", null, true);
                        yield ")\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["emoji"], "html", null, true);
                        yield "</button>
                  ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['emoji'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 363
                    yield "                </div>
              </div>
            </div>
          </div>
        </div>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 369
                yield "    </div>
  ";
            }
            // line 371
            yield "</div>
";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/cours/index.html.twig";
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
        return array (  2208 => 371,  2204 => 369,  2193 => 363,  2178 => 361,  2174 => 360,  2170 => 359,  2166 => 358,  2163 => 357,  2152 => 354,  2144 => 353,  2137 => 352,  2132 => 351,  2129 => 350,  2127 => 349,  2123 => 348,  2116 => 344,  2110 => 341,  2106 => 340,  2102 => 339,  2096 => 338,  2093 => 337,  2089 => 336,  2085 => 335,  2081 => 334,  2074 => 331,  2066 => 326,  2061 => 324,  2057 => 323,  2054 => 322,  2052 => 321,  2047 => 320,  2043 => 319,  2040 => 318,  2036 => 316,  2033 => 315,  2030 => 314,  2014 => 300,  2008 => 298,  2002 => 296,  2000 => 295,  1996 => 293,  1986 => 288,  1984 => 287,  1979 => 285,  1975 => 283,  1952 => 282,  1249 => 1134,  1057 => 944,  1054 => 942,  1051 => 940,  1038 => 929,  1027 => 920,  1021 => 918,  1018 => 917,  1015 => 915,  997 => 898,  986 => 888,  975 => 878,  964 => 868,  953 => 858,  942 => 848,  931 => 838,  920 => 828,  909 => 818,  898 => 808,  886 => 797,  864 => 776,  854 => 768,  794 => 710,  783 => 701,  729 => 649,  718 => 640,  663 => 587,  652 => 578,  596 => 524,  585 => 515,  526 => 458,  509 => 443,  499 => 436,  489 => 429,  486 => 428,  481 => 424,  443 => 389,  438 => 386,  423 => 384,  419 => 383,  414 => 381,  411 => 380,  409 => 379,  405 => 377,  401 => 374,  399 => 373,  396 => 280,  383 => 279,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Cours Fintech — Dinari{% endblock %}

{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
<style>
:root {
  --d-blue:#1a6fc4;--d-blue2:#0d4fa0;--d-green:#27ae60;
  --d-text:#1e2d40;--d-muted:#5a6e84;--d-border:#dde4ee;--d-light:#f5f7fa;
}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:#fff;color:var(--d-text);}
/* Full-width layout override */
.cours-page{display:flex;min-height:100vh;padding-top:70px;width:100%;}
/* SIDEBAR */
.sidebar{width:272px;flex-shrink:0;background:#fff;border-right:1px solid var(--d-border);
  position:sticky;top:70px;height:calc(100vh - 70px);overflow-y:auto;padding:24px 0;}
.sidebar-header{padding:0 20px 18px;border-bottom:1px solid var(--d-border);}
.sidebar-header .ctitle{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:10px;}
.prog-label{display:flex;justify-content:space-between;font-size:11px;color:var(--d-muted);margin-bottom:5px;}
.prog-bg{height:5px;background:var(--d-border);border-radius:3px;overflow:hidden;}
.prog-fill{height:100%;background:var(--d-blue);border-radius:3px;transition:width .4s;}
.sb-section{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;
  color:var(--d-muted);padding:0 20px;margin:14px 0 6px;}
.ch-item{display:flex;align-items:center;gap:10px;padding:9px 20px;cursor:pointer;
  border-left:3px solid transparent;text-decoration:none;transition:background .2s;}
.ch-item:hover{background:var(--d-light);}
.ch-item.active{background:#eef4fd;border-left-color:var(--d-blue);}
.ch-item.done .ch-ico{background:var(--d-green);color:#fff;}
.ch-ico{width:26px;height:26px;border-radius:50%;background:var(--d-border);
  display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;
  color:var(--d-muted);flex-shrink:0;transition:background .3s;}
.ch-item.active .ch-ico{background:var(--d-blue);color:#fff;}
.ch-lbl{font-size:13px;font-weight:500;color:var(--d-text);line-height:1.3;}
.ch-sub{font-size:11px;color:var(--d-muted);margin-top:1px;}
/* MAIN */
.main-content{flex:1;min-width:0;overflow-y:auto;background:var(--d-light);}
.content-inner{padding:36px 40px 80px;}
.chapter-panel{display:none;}
.chapter-panel.active{display:block;}
/* HERO */
.ch-hero{background:var(--d-blue);border-radius:12px;padding:32px;margin-bottom:28px;position:relative;overflow:hidden;}
.ch-hero::after{content:'';position:absolute;right:-30px;top:-30px;width:160px;height:160px;
  border-radius:50%;background:rgba(255,255,255,.06);}
.ch-tag{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;
  color:rgba(255,255,255,.6);margin-bottom:8px;}
.ch-hero h1{font-family:'Syne',sans-serif;font-size:24px;font-weight:700;color:#fff;margin-bottom:8px;}
.ch-hero p{font-size:14px;color:rgba(255,255,255,.7);line-height:1.75;max-width:480px;}
/* BLOCKS */
.cblock{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:18px;}
.btitle{font-family:'Syne',sans-serif;font-size:16px;font-weight:700;color:var(--d-text);
  margin-bottom:12px;display:flex;align-items:center;gap:8px;}
.btitle .ico{width:30px;height:30px;background:#eef4fd;border-radius:7px;
  display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
.cblock p{font-size:14px;color:var(--d-muted);line-height:1.85;margin-bottom:10px;}
.cblock p:last-child{margin-bottom:0;}
.hbox{background:#eef4fd;border-left:4px solid var(--d-blue);border-radius:0 8px 8px 0;
  padding:14px 18px;margin:14px 0;font-size:14px;color:var(--d-text);line-height:1.75;}
.img-block{border-radius:10px;overflow:hidden;margin:14px 0;}
.img-block img{width:100%;height:200px;object-fit:cover;display:block;}
.img-cap{font-size:11px;color:var(--d-muted);text-align:center;padding:6px 0 0;font-style:italic;}
.video-block{border-radius:10px;overflow:hidden;margin:14px 0;position:relative;padding-bottom:56.25%;height:0;}
.video-block iframe{position:absolute;top:0;left:0;width:100%;height:100%;border:none;}
.ex-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-top:12px;}
.ex-card{background:var(--d-light);border:1px solid var(--d-border);border-radius:8px;padding:14px;}
.ex-card .en{font-family:'Syne',sans-serif;font-size:20px;font-weight:800;color:rgba(26,111,196,.18);margin-bottom:4px;}
.ex-card h5{font-size:13px;font-weight:700;color:var(--d-text);margin-bottom:3px;}
.ex-card p{font-size:12px;color:var(--d-muted);line-height:1.6;margin:0;}
/* QUIZ */
.quiz-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:18px;}
.quiz-ttl{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);
  margin-bottom:18px;display:flex;align-items:center;gap:8px;}
.quiz-ttl .badge{background:rgba(26,111,196,.1);color:var(--d-blue);font-size:10px;font-weight:700;
  letter-spacing:1.5px;text-transform:uppercase;padding:3px 9px;border-radius:20px;}
.quiz-q{margin-bottom:18px;}
.quiz-q p{font-size:14px;font-weight:600;color:var(--d-text);margin-bottom:10px;}
.qopt{display:flex;align-items:center;gap:9px;padding:9px 12px;border:1.5px solid var(--d-border);
  border-radius:7px;margin-bottom:7px;cursor:pointer;transition:all .2s;font-size:13px;color:var(--d-text);}
.qopt:hover{border-color:var(--d-blue);background:#eef4fd;}
.qopt input{accent-color:var(--d-blue);}
.qopt.correct{border-color:var(--d-green);background:rgba(39,174,96,.07);color:var(--d-green);}
.qopt.wrong{border-color:#e74c3c;background:rgba(231,76,60,.07);color:#e74c3c;}
.btn-quiz{display:inline-flex;align-items:center;gap:7px;padding:10px 24px;background:var(--d-blue);
  color:#fff;border:none;border-radius:6px;font-family:'Syne',sans-serif;font-weight:700;
  font-size:13px;cursor:pointer;transition:background .25s;margin-top:6px;}
.btn-quiz:hover{background:var(--d-blue2);}
.qfeedback{margin-top:12px;padding:11px 14px;border-radius:7px;font-size:13px;font-weight:600;display:none;}
.qfeedback.ok{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.25);}
.qfeedback.ko{background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
/* TASKS */
.tasks-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:18px;}
.tasks-ttl{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:14px;}
.task-item{display:flex;align-items:flex-start;gap:10px;padding:10px 0;
  border-bottom:1px solid var(--d-border);cursor:pointer;}
.task-item:last-child{border-bottom:none;}
.tcheck{width:19px;height:19px;border:2px solid var(--d-border);border-radius:4px;flex-shrink:0;
  margin-top:1px;display:flex;align-items:center;justify-content:center;
  transition:all .2s;font-size:10px;color:transparent;}
.task-item.done .tcheck{background:var(--d-green);border-color:var(--d-green);color:#fff;}
.task-item.done .tlbl{text-decoration:line-through;color:var(--d-muted);}
.tlbl{font-size:13px;color:var(--d-text);line-height:1.5;}
.tsub{font-size:11px;color:var(--d-muted);margin-top:1px;}
/* NAV */
.ch-nav{display:flex;justify-content:space-between;align-items:center;
  margin-top:28px;padding-top:20px;border-top:1px solid var(--d-border);}
.btn-nav{display:inline-flex;align-items:center;gap:7px;padding:11px 22px;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:all .25s;
  text-decoration:none;border:none;}
.btn-prev{background:#fff;color:var(--d-text);border:1.5px solid var(--d-border);}
.btn-prev:hover{border-color:var(--d-blue);color:var(--d-blue);}
.btn-next{background:var(--d-blue);color:#fff;}
.btn-next:hover{background:var(--d-blue2);}
.btn-nav.hidden{visibility:hidden;}
@media(max-width:768px){
  .sidebar{position:fixed;left:-272px;top:70px;z-index:998;transition:left .3s;}
  .sidebar.open{left:0;}
  .content-inner{padding:20px 16px 60px;}
  .ex-grid{grid-template-columns:1fr;}
}
/* CHAPTER COMMENTS */
.chapter-comments-block{margin-top:32px;padding-top:28px;border-top:2px solid var(--d-border);}
.cc-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
.cc-title{font-family:'Syne',sans-serif;font-size:16px;font-weight:700;color:var(--d-text);}
.cc-count{font-size:11px;font-weight:700;color:var(--d-blue);background:rgba(26,111,196,.1);
  padding:3px 10px;border-radius:20px;}
.comments-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
.comments-title{font-family:'Syne',sans-serif;font-size:18px;font-weight:700;color:var(--d-text);}
.comments-count{font-size:12px;font-weight:700;color:var(--d-blue);background:rgba(26,111,196,.1);
  padding:4px 12px;border-radius:20px;}
/* Form */
.comment-form-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:24px;}
.cf-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--d-text);margin-bottom:16px;}
.cf-error{background:rgba(231,76,60,.08);border:1px solid rgba(231,76,60,.2);color:#e74c3c;
  border-radius:7px;padding:10px 14px;font-size:13px;margin-bottom:14px;}
.cf-row{display:grid;grid-template-columns:1fr;gap:12px;margin-bottom:12px;}
.cf-field{display:flex;flex-direction:column;gap:5px;margin-bottom:12px;}
.cf-field label{font-size:12px;font-weight:600;color:var(--d-text);}
.cf-field input,.cf-field textarea{
  padding:10px 14px;border:1.5px solid var(--d-border);border-radius:7px;
  font-size:13px;font-family:'DM Sans',sans-serif;color:var(--d-text);
  outline:none;transition:border-color .2s;resize:vertical;background:#fff;}
.cf-field input:focus,.cf-field textarea:focus{border-color:var(--d-blue);}
.cf-field input::placeholder,.cf-field textarea::placeholder{color:#b0bec5;}
.btn-comment{display:inline-flex;align-items:center;gap:7px;padding:11px 26px;
  background:var(--d-blue);color:#fff;border:none;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:background .25s;}
.btn-comment:hover{background:var(--d-blue2);}
/* List */
.no-comments{text-align:center;padding:32px;color:var(--d-muted);font-size:14px;
  background:#fff;border:1px dashed var(--d-border);border-radius:10px;}
.comments-list{display:flex;flex-direction:column;gap:14px;}
.comment-card{display:flex;gap:14px;background:#fff;border:1px solid var(--d-border);
  border-radius:10px;padding:18px;transition:box-shadow .2s;}
.comment-card:hover{box-shadow:0 4px 16px rgba(26,111,196,.08);}
.comment-avatar{width:38px;height:38px;border-radius:50%;background:var(--d-blue);
  display:flex;align-items:center;justify-content:center;font-family:'Syne',sans-serif;
  font-weight:700;font-size:15px;color:#fff;flex-shrink:0;}
.comment-body{flex:1;min-width:0;}
.comment-meta{display:flex;align-items:center;gap:10px;margin-bottom:8px;flex-wrap:wrap;}
.comment-author{font-family:'Syne',sans-serif;font-size:13px;font-weight:700;color:var(--d-text);}
.comment-date{font-size:11px;color:var(--d-muted);}
.comment-text{font-size:13px;color:var(--d-muted);line-height:1.75;margin:0;word-break:break-word;}
.comment-mine{font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;
  color:var(--d-blue);background:rgba(26,111,196,.1);padding:2px 8px;border-radius:20px;}
/* inline actions */
.comment-card{position:relative;}
.comment-owner-actions{position:absolute;top:14px;right:14px;display:flex;gap:6px;}
.btn-icon{width:28px;height:28px;border-radius:6px;border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;font-size:13px;
  transition:all .2s;background:var(--d-light);}
.btn-icon:hover{transform:scale(1.1);}
.btn-icon-edit:hover{background:#eef4fd;}
.btn-icon-del:hover{background:rgba(231,76,60,.1);}
/* inline edit mode */
.comment-view{display:block;}
.comment-edit{display:none;}
.comment-card.editing .comment-view{display:none;}
.comment-card.editing .comment-edit{display:block;}
.inline-textarea{width:100%;padding:10px 12px;border:1.5px solid var(--d-blue);border-radius:7px;
  font-size:13px;font-family:'DM Sans',sans-serif;color:var(--d-text);
  resize:vertical;outline:none;min-height:80px;background:#fff;margin-bottom:10px;}
.inline-edit-actions{display:flex;gap:8px;}
.btn-inline-save{padding:7px 18px;background:var(--d-blue);color:#fff;border:none;
  border-radius:5px;font-family:'Syne',sans-serif;font-weight:700;font-size:12px;cursor:pointer;transition:background .2s;}
.btn-inline-save:hover{background:var(--d-blue2);}
.btn-inline-cancel{padding:7px 14px;background:#fff;color:var(--d-muted);
  border:1.5px solid var(--d-border);border-radius:5px;font-size:12px;cursor:pointer;transition:all .2s;}
.btn-inline-cancel:hover{border-color:var(--d-muted);}
.delete-form{display:inline;margin:0;padding:0;}
/* REACTIONS */
.reactions-bar{display:flex;align-items:center;gap:6px;margin-top:10px;flex-wrap:wrap;}
.reaction-chip{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;
  border-radius:20px;border:1.5px solid var(--d-border);background:#fff;
  font-size:12px;cursor:pointer;transition:all .2s;user-select:none;}
.reaction-chip:hover{border-color:var(--d-blue);background:#eef4fd;}
.reaction-chip.active{border-color:var(--d-blue);background:#eef4fd;color:var(--d-blue);}
.reaction-chip .rc{font-size:14px;}
.reaction-chip .rn{font-weight:700;color:var(--d-text);font-size:11px;}
.reaction-chip.active .rn{color:var(--d-blue);}
.btn-add-reaction{display:inline-flex;align-items:center;justify-content:center;
  width:28px;height:28px;border-radius:20px;border:1.5px dashed var(--d-border);
  background:#fff;cursor:pointer;font-size:14px;transition:all .2s;position:relative;}
.btn-add-reaction:hover{border-color:var(--d-blue);background:#eef4fd;}
.emoji-picker{position:absolute;bottom:34px;left:0;background:#fff;
  border:1px solid var(--d-border);border-radius:10px;
  box-shadow:0 8px 24px rgba(0,0,0,0.12);padding:8px;
  display:none;z-index:100;white-space:nowrap;}
.emoji-picker.open{display:flex;gap:4px;}
.ep-btn{background:none;border:none;font-size:18px;cursor:pointer;padding:4px 6px;
  border-radius:6px;transition:background .15s;}
.ep-btn:hover{background:var(--d-light);}
.reaction-wrap{position:relative;display:inline-flex;}
/* QUIZ FINAL */
.fq-intro{text-align:center;}
.fq-intro{background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:32px;text-align:center;}
.fq-intro-icon{font-size:40px;margin-bottom:12px;}
.fq-intro-title{font-family:'Syne',sans-serif;font-size:20px;font-weight:700;color:var(--d-text);margin-bottom:8px;}
.fq-intro-sub{font-size:14px;color:var(--d-muted);margin-bottom:24px;line-height:1.7;}
.fq-meta{display:flex;justify-content:center;gap:24px;margin-bottom:24px;flex-wrap:wrap;}
.fq-meta-item{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--d-muted);}
.fq-meta-item span:first-child{font-size:16px;}
.btn-start-fq{display:inline-flex;align-items:center;gap:8px;padding:13px 32px;
  background:var(--d-blue);color:#fff;border:none;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:15px;cursor:pointer;transition:all .25s;}
.btn-start-fq:hover{background:var(--d-blue2);transform:translateY(-2px);}
.fq-body{display:none;}
.fq-body.active{display:block;}
.fq-progress-wrap{margin-bottom:24px;}
.fq-progress-top{display:flex;justify-content:space-between;font-size:12px;color:var(--d-muted);margin-bottom:6px;}
.fq-progress-bg{height:6px;background:var(--d-border);border-radius:3px;overflow:hidden;}
.fq-progress-fill{height:100%;background:var(--d-blue);border-radius:3px;transition:width .4s;}
.fq-question-block{background:#fff;border:1px solid var(--d-border);border-radius:10px;padding:24px;margin-bottom:14px;display:none;}
.fq-question-block.active{display:block;animation:fqIn .3s ease;}
@keyframes fqIn{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
.fq-q-num{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--d-blue);margin-bottom:8px;}
.fq-q-text{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:var(--d-text);margin-bottom:16px;line-height:1.5;}
.fq-option{display:flex;align-items:center;gap:10px;padding:11px 14px;
  border:1.5px solid var(--d-border);border-radius:8px;margin-bottom:8px;
  cursor:pointer;transition:all .2s;font-size:13px;color:var(--d-text);}
.fq-option:hover{border-color:var(--d-blue);background:#eef4fd;}
.fq-option input{accent-color:var(--d-blue);flex-shrink:0;}
.fq-option.correct{border-color:var(--d-green);background:rgba(39,174,96,.08);color:var(--d-green);font-weight:600;}
.fq-option.wrong{border-color:#e74c3c;background:rgba(231,76,60,.07);color:#e74c3c;}
.fq-option.disabled{pointer-events:none;}
.fq-nav{display:flex;justify-content:space-between;align-items:center;margin-top:20px;}
.btn-fq-nav{display:inline-flex;align-items:center;gap:7px;padding:10px 22px;border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:all .25s;border:none;}
.btn-fq-prev{background:#fff;color:var(--d-text);border:1.5px solid var(--d-border);}
.btn-fq-prev:hover{border-color:var(--d-blue);color:var(--d-blue);}
.btn-fq-next{background:var(--d-blue);color:#fff;}
.btn-fq-next:hover{background:var(--d-blue2);}
.btn-fq-submit{background:var(--d-green);color:#fff;}
.btn-fq-submit:hover{background:#219a52;}
.fq-result{display:none;background:#fff;border:1px solid var(--d-border);border-radius:12px;padding:36px;text-align:center;}
.fq-result.active{display:block;animation:fqIn .4s ease;}
.fq-score-circle{width:110px;height:110px;border-radius:50%;margin:0 auto 20px;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  font-family:'Syne',sans-serif;border:4px solid var(--d-blue);}
.fq-score-circle.great{border-color:var(--d-green);}
.fq-score-circle.ok{border-color:#f39c12;}
.fq-score-circle.low{border-color:#e74c3c;}
.fq-score-num{font-size:28px;font-weight:800;color:var(--d-text);line-height:1;}
.fq-score-total{font-size:12px;color:var(--d-muted);}
.fq-result-title{font-family:'Syne',sans-serif;font-size:20px;font-weight:700;color:var(--d-text);margin-bottom:8px;}
.fq-result-msg{font-size:14px;color:var(--d-muted);line-height:1.75;margin-bottom:24px;max-width:400px;margin-left:auto;margin-right:auto;}
.fq-result-badges{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-bottom:24px;}
.fq-badge{padding:5px 14px;border-radius:20px;font-size:12px;font-weight:700;}
.fq-badge-green{background:rgba(39,174,96,.1);color:var(--d-green);border:1px solid rgba(39,174,96,.25);}
.fq-badge-blue{background:rgba(26,111,196,.1);color:var(--d-blue);border:1px solid rgba(26,111,196,.2);}
.fq-badge-red{background:rgba(231,76,60,.08);color:#e74c3c;border:1px solid rgba(231,76,60,.2);}
.btn-retry{display:inline-flex;align-items:center;gap:7px;padding:11px 26px;
  background:#fff;color:var(--d-blue);border:1.5px solid var(--d-blue);border-radius:6px;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;cursor:pointer;transition:all .25s;}
.btn-retry:hover{background:#eef4fd;}
</style>
{% endblock %}

{% block body %}

{# ── Macro : bloc commentaires par chapitre ── #}
{% macro chapter_comments(slug, label, commentaires, my_ids, my_reactions, error) %}
<div class=\"chapter-comments-block\">
  <div class=\"cc-header\">
    <span class=\"cc-title\">💬 Commentaires — {{ label }}</span>
    <span class=\"cc-count\">
      {% set ch_comments = commentaires|filter(c => (c.chapitre ?? 'introduction') == slug) %}
      {{ ch_comments|length }} commentaire{{ ch_comments|length != 1 ? 's' : '' }}
    </span>
  </div>

  {# Form #}
  <div class=\"comment-form-block\">
    <div class=\"cf-title\">Laisser un commentaire</div>
    {% if error %}
      <div class=\"cf-error\">⚠️ {{ error }}</div>
    {% endif %}
    <form method=\"POST\" action=\"{{ path('app_cours_index') }}\" class=\"cf-form\">
      <input type=\"hidden\" name=\"_action\" value=\"comment\">
      <input type=\"hidden\" name=\"chapitre\" value=\"{{ slug }}\">
      <div class=\"cf-field\">
        <label>Votre nom</label>
        <input type=\"text\" name=\"auteur\" placeholder=\"Ex : Mohamed T.\" maxlength=\"100\" required>
      </div>
      <div class=\"cf-field\">
        <label>Votre commentaire</label>
        <textarea name=\"contenu\" rows=\"3\" placeholder=\"Partagez votre avis sur ce chapitre...\" maxlength=\"1000\" required></textarea>
      </div>
      <button type=\"submit\" class=\"btn-comment\">Publier</button>
    </form>
  </div>

  {# List #}
  {% set ch_list = commentaires|filter(c => (c.chapitre ?? 'introduction') == slug) %}
  {% if ch_list is empty %}
    <div class=\"no-comments\">Aucun commentaire pour ce chapitre. Soyez le premier !</div>
  {% else %}
    <div class=\"comments-list\">
      {% for c in ch_list %}
        <div class=\"comment-card\" id=\"comment-{{ c.id }}\">
          {% if (c.id ~ '') in my_ids %}
            <div class=\"comment-owner-actions\">
              <button class=\"btn-icon btn-icon-edit\" title=\"Modifier\" onclick=\"startEdit({{ c.id }})\">✏️</button>
              <form method=\"POST\" action=\"/cours/commentaire/{{ c.id }}/delete\" class=\"delete-form\"
                    onsubmit=\"return confirm('Supprimer ce commentaire ?')\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_comment_' ~ c.id) }}\">
                <button type=\"submit\" class=\"btn-icon btn-icon-del\" title=\"Supprimer\">🗑️</button>
              </form>
            </div>
          {% endif %}
          <div class=\"comment-avatar\">{{ c.auteur|slice(0,1)|upper }}</div>
          <div class=\"comment-body\">
            <div class=\"comment-meta\">
              <span class=\"comment-author\">{{ c.auteur }}</span>
              <span class=\"comment-date\">{{ c.dateCreation|date('d/m/Y à H:i') }}</span>
              {% if (c.id ~ '') in my_ids %}<span class=\"comment-mine\">Moi</span>{% endif %}
            </div>
            <p class=\"comment-text comment-view\" id=\"text-{{ c.id }}\">{{ c.contenu }}</p>
            <div class=\"comment-edit\" id=\"edit-{{ c.id }}\">
              <form method=\"POST\" action=\"/cours/commentaire/{{ c.id }}/edit\">
                <textarea class=\"inline-textarea\" name=\"contenu\" maxlength=\"1000\" required>{{ c.contenu }}</textarea>
                <div class=\"inline-edit-actions\">
                  <button type=\"submit\" class=\"btn-inline-save\">💾 Enregistrer</button>
                  <button type=\"button\" class=\"btn-inline-cancel\" onclick=\"cancelEdit({{ c.id }})\">Annuler</button>
                </div>
              </form>
            </div>
            <div class=\"reactions-bar\" id=\"reactions-{{ c.id }}\">
              {% set counts = c.reactionCounts %}
              {% set mine   = my_reactions[c.id] ?? [] %}
              {% for emoji, count in counts %}
                <button class=\"reaction-chip {% if emoji in mine %}active{% endif %}\"
                        onclick=\"toggleReaction({{ c.id }}, '{{ emoji }}', this)\" data-emoji=\"{{ emoji }}\">
                  <span class=\"rc\">{{ emoji }}</span><span class=\"rn\">{{ count }}</span>
                </button>
              {% endfor %}
              <div class=\"reaction-wrap\">
                <button class=\"btn-add-reaction\" title=\"Réagir\" onclick=\"togglePicker({{ c.id }}, event)\">😊</button>
                <div class=\"emoji-picker\" id=\"picker-{{ c.id }}\">
                  {% for emoji in ['👍','👎','😄','🎉','😮','❤️','🚀','👀'] %}
                    <button class=\"ep-btn\" onclick=\"toggleReaction({{ c.id }}, '{{ emoji }}', null);closePicker({{ c.id }})\">{{ emoji }}</button>
                  {% endfor %}
                </div>
              </div>
            </div>
          </div>
        </div>
      {% endfor %}
    </div>
  {% endif %}
</div>
{% endmacro %}
{% import _self as self %}
<div class=\"cours-page\">

  {# ── SIDEBAR ── #}
  <aside class=\"sidebar\" id=\"sidebar\">
    <div class=\"sidebar-header\">
      {% if cours_list|length > 1 %}
      <div style=\"margin-bottom:12px;\">
        <select onchange=\"window.location.href='{{ path('app_cours_index') }}?id='+this.value\"
                style=\"width:100%;padding:7px 10px;border:1.5px solid var(--d-border);border-radius:6px;font-size:13px;font-family:'DM Sans',sans-serif;color:var(--d-text);background:#fff;\">
          {% for c in cours_list %}
            <option value=\"{{ c.id }}\" {% if selected and selected.id == c.id %}selected{% endif %}>{{ c.nomCours }}</option>
          {% endfor %}
        </select>
      </div>
      {% endif %}
      <div class=\"ctitle\">{{ selected ? selected.nomCours : 'Finance Personnelle' }}</div>
      <div class=\"prog-label\"><span>Progression</span><span id=\"prog-pct\">0%</span></div>
      <div class=\"prog-bg\"><div class=\"prog-fill\" id=\"prog-fill\" style=\"width:0%\"></div></div>
    </div>
    <nav>
      <div class=\"sb-section\">Chapitres</div>
      <a class=\"ch-item active\" href=\"#\" onclick=\"goTo(0);return false;\" data-ch=\"0\">
        <div class=\"ch-ico\">1</div>
        <div><div class=\"ch-lbl\">Introduction</div><div class=\"ch-sub\">Pourquoi gérer ses finances ?</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(1);return false;\" data-ch=\"1\">
        <div class=\"ch-ico\">2</div>
        <div><div class=\"ch-lbl\">Budget Personnel</div><div class=\"ch-sub\">Créer et suivre son budget</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(2);return false;\" data-ch=\"2\">
        <div class=\"ch-ico\">3</div>
        <div><div class=\"ch-lbl\">Épargne</div><div class=\"ch-sub\">Stratégies d'épargne efficaces</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(3);return false;\" data-ch=\"3\">
        <div class=\"ch-ico\">4</div>
        <div><div class=\"ch-lbl\">Gestion Financière</div><div class=\"ch-sub\">Contrôler ses dépenses</div></div>
      </a>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo(4);return false;\" data-ch=\"4\">
        <div class=\"ch-ico\">5</div>
        <div><div class=\"ch-lbl\">Investissement</div><div class=\"ch-sub\">Faire fructifier son argent</div></div>
      </a>
      <div class=\"sb-section\">Évaluation</div>
      <a class=\"ch-item\" href=\"#\" onclick=\"goTo('quiz');return false;\" data-ch=\"quiz\">
        <div class=\"ch-ico\" style=\"background:var(--d-green);color:#fff;font-size:12px;\">🏆</div>
        <div><div class=\"ch-lbl\">Quiz Final</div><div class=\"ch-sub\">Testez vos connaissances</div></div>
      </a>
    </nav>
  </aside>

  {# ── MAIN ── #}
  <main class=\"main-content\">
    <div class=\"content-inner\">

      {# ── Cours section sub-nav ── #}
      <div style=\"display:flex;align-items:center;gap:8px;margin-bottom:24px;flex-wrap:wrap;\">
        <a href=\"{{ path('app_recommandations') }}\"
           style=\"display:inline-flex;align-items:center;gap:6px;padding:7px 14px;
                  background:#eef4fd;color:#1a6fc4;border:1.5px solid #c3d9f5;
                  border-radius:20px;font-size:13px;font-weight:600;text-decoration:none;
                  transition:background .2s,border-color .2s;\">
          🎯 Recommandations
        </a>
        <a href=\"{{ path('app_statistiques') }}\"
           style=\"display:inline-flex;align-items:center;gap:6px;padding:7px 14px;
                  background:#eef4fd;color:#1a6fc4;border:1.5px solid #c3d9f5;
                  border-radius:20px;font-size:13px;font-weight:600;text-decoration:none;
                  transition:background .2s,border-color .2s;\">
          📊 Statistiques
        </a>
        <a href=\"{{ path('app_notifications') }}\"
           style=\"display:inline-flex;align-items:center;gap:6px;padding:7px 14px;
                  background:#eef4fd;color:#1a6fc4;border:1.5px solid #c3d9f5;
                  border-radius:20px;font-size:13px;font-weight:600;text-decoration:none;
                  transition:background .2s,border-color .2s;position:relative;\">
          🔔 Notifications
          <span id=\"notif-badge\"
                style=\"background:#e74c3c;color:#fff;font-size:10px;font-weight:700;
                       min-width:16px;height:16px;border-radius:8px;
                       display:none;align-items:center;justify-content:center;padding:0 3px;\">
          </span>
        </a>
      </div>

      {# ══ CHAPITRE 0 — INTRODUCTION ══ #}
      <div class=\"chapter-panel active\" id=\"chapter-0\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 1 · Introduction</div>
          <h1>Pourquoi gérer ses finances ?</h1>
          <p>Comprendre les bases de la finance personnelle est la première étape vers la liberté financière.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📖</div>Qu'est-ce que la finance personnelle ?</div>
          <p>La finance personnelle désigne l'ensemble des décisions qu'un individu prend pour gérer ses revenus, dépenses, épargne et investissements.</p>
          <p>Contrairement aux idées reçues, gérer ses finances ne nécessite pas d'être expert en économie. Quelques principes fondamentaux suffisent.</p>
          <div class=\"hbox\">💡 <strong>À retenir :</strong> 78% des personnes qui planifient leur budget atteignent leurs objectifs financiers en moins de 2 ans.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎯</div>Les 3 piliers de la santé financière</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Contrôle des dépenses</h5><p>Savoir où va chaque dinar dépensé chaque mois.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Épargne régulière</h5><p>Mettre de côté au moins 10% de ses revenus mensuels.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Investissement intelligent</h5><p>Faire travailler son argent pour générer des revenus passifs.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Fonds d'urgence</h5><p>Avoir 3 à 6 mois de dépenses en réserve pour les imprévus.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Introduction à la finance personnelle</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/HQzoZfc3GwQ\" allowfullscreen title=\"Introduction finance personnelle\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>Le cycle financier</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=800&q=80\" alt=\"Gestion financière\"></div>
          <p class=\"img-cap\">Revenus → Dépenses → Épargne → Investissement</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Regarder la vidéo d'introduction</div><div class=\"tsub\">Durée estimée : 8 min</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Lister vos 3 principales sources de dépenses</div><div class=\"tsub\">Exercice pratique</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Répondre au quiz ci-dessous</div><div class=\"tsub\">Valider vos connaissances</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">3 questions</span></div>
          <div class=\"quiz-q\"><p>1. Quel pourcentage minimum est recommandé d'épargner chaque mois ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_1\" value=\"a\"> 2%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_1\" value=\"b\"> 10%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_1\" value=\"c\"> 50%</label>
          </div>
          <div class=\"quiz-q\"><p>2. Combien de mois de dépenses doit contenir un fonds d'urgence ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_2\" value=\"a\"> 1 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_2\" value=\"b\"> 3 à 6 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_2\" value=\"c\"> 12 mois</label>
          </div>
          <div class=\"quiz-q\"><p>3. La finance personnelle nécessite d'être expert en économie.</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_3\" value=\"a\"> Vrai</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q0_3\" value=\"b\"> Faux</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(0,{'q0_1':'b','q0_2':'b','q0_3':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-0\"></div>
        </div>
        {{ self.chapter_comments('introduction', 'Introduction', commentaires, my_ids, my_reactions, error) }}
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev hidden\">← Précédent</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(1)\">Budget Personnel →</button>
        </div>
      </div>


      {# ══ CHAPITRE 1 — BUDGET ══ #}
      <div class=\"chapter-panel\" id=\"chapter-1\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 2 · Budget Personnel</div>
          <h1>Créer et suivre son budget</h1>
          <p>Un budget bien construit est la fondation de toute bonne santé financière.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📊</div>La règle 50/30/20</div>
          <p>La méthode la plus populaire pour budgéter ses revenus est la règle 50/30/20 :</p>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">50%</div><h5>Besoins essentiels</h5><p>Loyer, nourriture, transport, factures.</p></div>
            <div class=\"ex-card\"><div class=\"en\">30%</div><h5>Envies personnelles</h5><p>Loisirs, restaurants, shopping non essentiel.</p></div>
            <div class=\"ex-card\"><div class=\"en\">20%</div><h5>Épargne & remboursements</h5><p>Épargne, investissements, remboursement de dettes.</p></div>
            <div class=\"ex-card\"><div class=\"en\">✓</div><h5>Exemple concret</h5><p>Revenu 2000 DT → 1000 besoins, 600 envies, 400 épargne.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>Visualiser son budget</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=800&q=80\" alt=\"Budget personnel\"></div>
          <p class=\"img-cap\">Répartition visuelle d'un budget mensuel équilibré</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Comment créer son budget</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/sVKQn2I4HDM\" allowfullscreen title=\"Créer son budget\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">💡</div>Conseils pratiques</div>
          <p>Notez chaque dépense pendant 30 jours avant de créer votre budget. Vous serez surpris de voir où part votre argent.</p>
          <div class=\"hbox\">🔑 <strong>Astuce Dinari :</strong> Utilisez la règle des enveloppes — allouez du cash physique par catégorie pour mieux contrôler vos dépenses.</div>
          <p>Révisez votre budget chaque mois. Un budget n'est pas figé, il évolue avec votre situation.</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Calculer vos revenus nets mensuels</div><div class=\"tsub\">Base de tout budget</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Appliquer la règle 50/30/20 à votre situation</div><div class=\"tsub\">Exercice de répartition</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Identifier 3 dépenses à réduire ce mois</div><div class=\"tsub\">Action concrète</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">2 questions</span></div>
          <div class=\"quiz-q\"><p>1. Dans la règle 50/30/20, quel pourcentage est alloué à l'épargne ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_1\" value=\"a\"> 50%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_1\" value=\"b\"> 30%</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_1\" value=\"c\"> 20%</label>
          </div>
          <div class=\"quiz-q\"><p>2. Quelle est la première étape avant de créer un budget ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_2\" value=\"a\"> Investir en bourse</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_2\" value=\"b\"> Noter toutes ses dépenses pendant 30 jours</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q1_2\" value=\"c\"> Ouvrir un compte épargne</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(1,{'q1_1':'c','q1_2':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-1\"></div>
        </div>
        {{ self.chapter_comments('budget', 'Budget Personnel', commentaires, my_ids, my_reactions, error) }}
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(0)\">← Introduction</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(2)\">Épargne →</button>
        </div>
      </div>


      {# ══ CHAPITRE 2 — ÉPARGNE ══ #}
      <div class=\"chapter-panel\" id=\"chapter-2\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 3 · Épargne</div>
          <h1>Stratégies d'épargne efficaces</h1>
          <p>Épargner régulièrement, même de petites sommes, crée une sécurité financière durable.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🏦</div>Pourquoi épargner ?</div>
          <p>L'épargne vous protège contre les imprévus, vous permet de réaliser vos projets et constitue la base de tout investissement futur.</p>
          <div class=\"hbox\">📌 <strong>Principe clé :</strong> Payez-vous en premier. Dès que vous recevez votre salaire, transférez automatiquement votre épargne avant de dépenser.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📈</div>Les types d'épargne</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Épargne de précaution</h5><p>3 à 6 mois de dépenses pour les urgences.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Épargne projet</h5><p>Vacances, voiture, mariage — objectif défini.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Épargne retraite</h5><p>Préparer l'avenir dès aujourd'hui.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Épargne investissement</h5><p>Capital pour générer des revenus passifs.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Stratégies d'épargne</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/Rm6UdfRs3gw\" allowfullscreen title=\"Stratégies épargne\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>L'effet des intérêts composés</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=800&q=80\" alt=\"Épargne et investissement\"></div>
          <p class=\"img-cap\">Les intérêts composés : votre argent qui travaille pour vous</p>
          <p>100 DT épargnés par mois pendant 20 ans à 5% d'intérêt = plus de 41 000 DT.</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Définir votre objectif d'épargne mensuel</div><div class=\"tsub\">Minimum 10% de vos revenus</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Ouvrir un compte épargne dédié</div><div class=\"tsub\">Séparer épargne et dépenses courantes</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Configurer un virement automatique</div><div class=\"tsub\">Le jour de réception du salaire</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">2 questions</span></div>
          <div class=\"quiz-q\"><p>1. Quel est le principe \"payez-vous en premier\" ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_1\" value=\"a\"> Payer ses factures avant tout</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_1\" value=\"b\"> Épargner dès réception du salaire avant de dépenser</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_1\" value=\"c\"> Investir en bourse en priorité</label>
          </div>
          <div class=\"quiz-q\"><p>2. Combien de mois de dépenses doit contenir une épargne de précaution ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_2\" value=\"a\"> 1 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_2\" value=\"b\"> 3 à 6 mois</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q2_2\" value=\"c\"> 2 ans</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(2,{'q2_1':'b','q2_2':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-2\"></div>
        </div>
        {{ self.chapter_comments('epargne', 'Épargne', commentaires, my_ids, my_reactions, error) }}
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(1)\">← Budget</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(3)\">Gestion Financière →</button>
        </div>
      </div>


      {# ══ CHAPITRE 3 — GESTION FINANCIÈRE ══ #}
      <div class=\"chapter-panel\" id=\"chapter-3\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 4 · Gestion Financière</div>
          <h1>Contrôler ses dépenses au quotidien</h1>
          <p>Maîtriser ses dépenses est la clé pour atteindre ses objectifs financiers sans stress.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🔍</div>Identifier les dépenses cachées</div>
          <p>Les abonnements oubliés, les achats impulsifs et les petites dépenses quotidiennes peuvent représenter jusqu'à 30% de votre budget sans que vous le réalisiez.</p>
          <div class=\"hbox\">⚠️ <strong>Attention :</strong> Un café à 3 DT par jour = 90 DT/mois = 1 080 DT/an. Les petites dépenses s'accumulent.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🛠️</div>Outils de gestion</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Tableau de bord mensuel</h5><p>Suivre revenus vs dépenses chaque mois.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Catégorisation</h5><p>Classer chaque dépense par catégorie.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Alertes de dépassement</h5><p>Être notifié quand on dépasse un budget.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Bilan trimestriel</h5><p>Analyser ses tendances tous les 3 mois.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Gérer ses dépenses efficacement</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/9yfIBBdFBRQ\" allowfullscreen title=\"Gestion des dépenses\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>Tableau de bord financier</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80\" alt=\"Tableau de bord financier\"></div>
          <p class=\"img-cap\">Visualiser ses finances en un coup d'œil</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Lister tous vos abonnements actifs</div><div class=\"tsub\">Annuler ceux inutilisés</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Catégoriser vos dépenses du mois dernier</div><div class=\"tsub\">Identifier les postes à réduire</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Fixer un plafond pour chaque catégorie</div><div class=\"tsub\">Budget par enveloppe</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz <span class=\"badge\">2 questions</span></div>
          <div class=\"quiz-q\"><p>1. Un café à 3 DT/jour représente combien par an ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_1\" value=\"a\"> 360 DT</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_1\" value=\"b\"> 1 080 DT</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_1\" value=\"c\"> 540 DT</label>
          </div>
          <div class=\"quiz-q\"><p>2. À quelle fréquence est recommandé un bilan financier ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_2\" value=\"a\"> Une fois par an</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_2\" value=\"b\"> Tous les 3 mois (trimestriel)</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q3_2\" value=\"c\"> Tous les 5 ans</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(3,{'q3_1':'b','q3_2':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-3\"></div>
        </div>
        {{ self.chapter_comments('gestion', 'Gestion Financière', commentaires, my_ids, my_reactions, error) }}
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(2)\">← Épargne</button>
          <button class=\"btn-nav btn-next\" onclick=\"goTo(4)\">Investissement →</button>
        </div>
      </div>


      {# ══ CHAPITRE 4 — INVESTISSEMENT ══ #}
      <div class=\"chapter-panel\" id=\"chapter-4\">
        <div class=\"ch-hero\">
          <div class=\"ch-tag\">Chapitre 5 · Investissement</div>
          <h1>Faire fructifier son argent</h1>
          <p>L'investissement transforme votre épargne en source de revenus passifs et de croissance à long terme.</p>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">📈</div>Les bases de l'investissement</div>
          <p>Investir, c'est mettre son argent au travail pour générer des rendements. Mais tout investissement comporte un risque — plus le rendement potentiel est élevé, plus le risque l'est aussi.</p>
          <div class=\"hbox\">⚖️ <strong>Règle d'or :</strong> Ne jamais investir de l'argent dont vous avez besoin à court terme. L'investissement est une stratégie long terme.</div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🗂️</div>Types d'investissements</div>
          <div class=\"ex-grid\">
            <div class=\"ex-card\"><div class=\"en\">01</div><h5>Bons du Trésor</h5><p>Faible risque, rendement modéré. Idéal pour débuter.</p></div>
            <div class=\"ex-card\"><div class=\"en\">02</div><h5>Actions en bourse</h5><p>Risque moyen à élevé, potentiel de croissance important.</p></div>
            <div class=\"ex-card\"><div class=\"en\">03</div><h5>Immobilier</h5><p>Investissement tangible, revenus locatifs stables.</p></div>
            <div class=\"ex-card\"><div class=\"en\">04</div><h5>Fonds d'investissement</h5><p>Diversification automatique, gestion professionnelle.</p></div>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🎬</div>Vidéo — Investir intelligemment</div>
          <div class=\"video-block\">
            <iframe src=\"https://www.youtube.com/embed/gFQNPmLKj1k\" allowfullscreen title=\"Investir intelligemment\"></iframe>
          </div>
        </div>
        <div class=\"cblock\">
          <div class=\"btitle\"><div class=\"ico\">🖼️</div>La diversification du portefeuille</div>
          <div class=\"img-block\"><img src=\"https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=800&q=80\" alt=\"Investissement et portefeuille\"></div>
          <p class=\"img-cap\">Ne pas mettre tous ses œufs dans le même panier</p>
          <p>La diversification réduit le risque global de votre portefeuille en répartissant les investissements sur plusieurs actifs.</p>
        </div>
        <div class=\"tasks-block\">
          <div class=\"tasks-ttl\">✅ Tâches du chapitre</div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Définir votre profil de risque</div><div class=\"tsub\">Conservateur, modéré ou dynamique ?</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Rechercher les options d'investissement disponibles en Tunisie</div><div class=\"tsub\">SICAV, bons du trésor, bourse de Tunis</div></div></div>
          <div class=\"task-item\" onclick=\"toggleTask(this)\"><div class=\"tcheck\">✓</div><div><div class=\"tlbl\">Simuler un investissement de 100 DT/mois sur 10 ans</div><div class=\"tsub\">Calculer les intérêts composés</div></div></div>
        </div>
        <div class=\"quiz-block\">
          <div class=\"quiz-ttl\">🧠 Quiz final <span class=\"badge\">3 questions</span></div>
          <div class=\"quiz-q\"><p>1. Quel type d'investissement est le moins risqué pour un débutant ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_1\" value=\"a\"> Actions spéculatives</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_1\" value=\"b\"> Bons du Trésor</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_1\" value=\"c\"> Cryptomonnaies</label>
          </div>
          <div class=\"quiz-q\"><p>2. Qu'est-ce que la diversification ?</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_2\" value=\"a\"> Mettre tout son argent dans un seul actif</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_2\" value=\"b\"> Répartir ses investissements sur plusieurs actifs pour réduire le risque</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_2\" value=\"c\"> Investir uniquement en immobilier</label>
          </div>
          <div class=\"quiz-q\"><p>3. L'investissement est une stratégie :</p>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_3\" value=\"a\"> Court terme uniquement</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_3\" value=\"b\"> Long terme principalement</label>
            <label class=\"qopt\"><input type=\"radio\" name=\"q4_3\" value=\"c\"> Sans aucun risque</label>
          </div>
          <button class=\"btn-quiz\" onclick=\"checkQuiz(4,{'q4_1':'b','q4_2':'b','q4_3':'b'})\">Valider mes réponses</button>
          <div class=\"qfeedback\" id=\"qf-4\"></div>
        </div>
        {{ self.chapter_comments('investissement', 'Investissement', commentaires, my_ids, my_reactions, error) }}
        <div class=\"ch-nav\">
          <button class=\"btn-nav btn-prev\" onclick=\"goTo(3)\">← Gestion Financière</button>
          <button class=\"btn-nav btn-next\" onclick=\"finishCourse()\" style=\"background:var(--d-green);\">🎉 Terminer le cours</button>
        </div>
      </div>

      {# ══ QUIZ FINAL — panel indépendant ══ #}
      <div class=\"chapter-panel\" id=\"chapter-quiz\">

        <div class=\"ch-hero\" style=\"background:linear-gradient(135deg,#1a6fc4 0%,#0d4fa0 100%);\">
          <div class=\"ch-tag\">Évaluation finale · 10 questions</div>
          <h1>Quiz Final du Cours</h1>
          <p>Testez l'ensemble de vos connaissances sur la finance personnelle.</p>
        </div>

        <div class=\"fq-intro cblock\" id=\"fq-intro\" style=\"text-align:center;\">
          <div class=\"fq-intro-icon\">🏆</div>
          <div class=\"fq-intro-title\">Quiz Final du Cours</div>
          <p class=\"fq-intro-sub\">Testez l'ensemble de vos connaissances sur la finance personnelle.<br>10 questions couvrant tous les chapitres du cours.</p>
          <div class=\"fq-meta\">
            <div class=\"fq-meta-item\"><span>📝</span><span>10 questions</span></div>
            <div class=\"fq-meta-item\"><span>⏱️</span><span>~5 minutes</span></div>
            <div class=\"fq-meta-item\"><span>🎯</span><span>QCM</span></div>
          </div>
          <button class=\"btn-start-fq\" onclick=\"startFinalQuiz()\">🚀 Commencer le quiz final</button>
        </div>

        {# Corps du quiz #}
        <div class=\"fq-body\" id=\"fq-body\">

          <div class=\"fq-progress-wrap\">
            <div class=\"fq-progress-top\">
              <span id=\"fq-prog-label\">Question 1 / 10</span>
              <span id=\"fq-prog-pct\">0%</span>
            </div>
            <div class=\"fq-progress-bg\"><div class=\"fq-progress-fill\" id=\"fq-prog-fill\" style=\"width:0%\"></div></div>
          </div>

          {# Q1 #}
          <div class=\"fq-question-block active\" id=\"fq-q-0\">
            <div class=\"fq-q-num\">Question 1 / 10 · Budget</div>
            <div class=\"fq-q-text\">Dans la règle 50/30/20, quel pourcentage est alloué aux besoins essentiels ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"a\"> 20%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"b\"> 30%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"c\"> 50%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq0\" value=\"d\"> 70%</label>
          </div>

          {# Q2 #}
          <div class=\"fq-question-block\" id=\"fq-q-1\">
            <div class=\"fq-q-num\">Question 2 / 10 · Épargne</div>
            <div class=\"fq-q-text\">Quel est le principe \"payez-vous en premier\" ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"a\"> Payer ses factures avant tout</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"b\"> Épargner dès réception du salaire avant de dépenser</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"c\"> Investir en bourse en priorité</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq1\" value=\"d\"> Rembourser ses dettes d'abord</label>
          </div>

          {# Q3 #}
          <div class=\"fq-question-block\" id=\"fq-q-2\">
            <div class=\"fq-q-num\">Question 3 / 10 · Investissement</div>
            <div class=\"fq-q-text\">Qu'est-ce que la diversification d'un portefeuille ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"a\"> Mettre tout son argent dans un seul actif performant</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"b\"> Répartir ses investissements sur plusieurs actifs pour réduire le risque</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"c\"> Investir uniquement en immobilier</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq2\" value=\"d\"> Changer d'investissement chaque semaine</label>
          </div>

          {# Q4 #}
          <div class=\"fq-question-block\" id=\"fq-q-3\">
            <div class=\"fq-q-num\">Question 4 / 10 · Gestion</div>
            <div class=\"fq-q-text\">Un café à 3 DT par jour représente combien par an ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"a\"> 360 DT</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"b\"> 540 DT</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"c\"> 1 080 DT</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq3\" value=\"d\"> 720 DT</label>
          </div>

          {# Q5 #}
          <div class=\"fq-question-block\" id=\"fq-q-4\">
            <div class=\"fq-q-num\">Question 5 / 10 · Épargne</div>
            <div class=\"fq-q-text\">Combien de mois de dépenses doit contenir une épargne de précaution ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"a\"> 1 mois</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"b\"> 3 à 6 mois</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"c\"> 12 mois</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq4\" value=\"d\"> 2 ans</label>
          </div>

          {# Q6 #}
          <div class=\"fq-question-block\" id=\"fq-q-5\">
            <div class=\"fq-q-num\">Question 6 / 10 · Investissement</div>
            <div class=\"fq-q-text\">Quel type d'investissement est généralement le moins risqué pour un débutant ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"a\"> Actions spéculatives</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"b\"> Cryptomonnaies</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"c\"> Bons du Trésor</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq5\" value=\"d\"> Produits dérivés</label>
          </div>

          {# Q7 #}
          <div class=\"fq-question-block\" id=\"fq-q-6\">
            <div class=\"fq-q-num\">Question 7 / 10 · Budget</div>
            <div class=\"fq-q-text\">Quelle est la première étape recommandée avant de créer un budget ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"a\"> Ouvrir un compte épargne</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"b\"> Investir en bourse</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"c\"> Noter toutes ses dépenses pendant 30 jours</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq6\" value=\"d\"> Demander un crédit bancaire</label>
          </div>

          {# Q8 #}
          <div class=\"fq-question-block\" id=\"fq-q-7\">
            <div class=\"fq-q-num\">Question 8 / 10 · Gestion</div>
            <div class=\"fq-q-text\">À quelle fréquence est recommandé un bilan financier personnel ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"a\"> Une fois par an</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"b\"> Tous les 3 mois (trimestriel)</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"c\"> Tous les 5 ans</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq7\" value=\"d\"> Jamais, c'est inutile</label>
          </div>

          {# Q9 #}
          <div class=\"fq-question-block\" id=\"fq-q-8\">
            <div class=\"fq-q-num\">Question 9 / 10 · Finance générale</div>
            <div class=\"fq-q-text\">Quel pourcentage minimum de ses revenus est recommandé d'épargner chaque mois ?</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"a\"> 2%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"b\"> 5%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"c\"> 10%</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq8\" value=\"d\"> 25%</label>
          </div>

          {# Q10 #}
          <div class=\"fq-question-block\" id=\"fq-q-9\">
            <div class=\"fq-q-num\">Question 10 / 10 · Investissement</div>
            <div class=\"fq-q-text\">L'investissement est principalement une stratégie :</div>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"a\"> Court terme uniquement</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"b\"> Long terme principalement</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"c\"> Sans aucun risque</label>
            <label class=\"fq-option\"><input type=\"radio\" name=\"fq9\" value=\"d\"> Réservée aux experts</label>
          </div>

          <div class=\"fq-nav\">
            <button class=\"btn-fq-nav btn-fq-prev\" id=\"fq-btn-prev\" onclick=\"fqPrev()\" style=\"visibility:hidden\">← Précédent</button>
            <button class=\"btn-fq-nav btn-fq-next\" id=\"fq-btn-next\" onclick=\"fqNext()\">Suivant →</button>
            <button class=\"btn-fq-nav btn-fq-submit\" id=\"fq-btn-submit\" onclick=\"fqSubmit()\" style=\"display:none\">🎯 Voir mon score</button>
          </div>
        </div>

        {# Résultat #}
        <div class=\"fq-result\" id=\"fq-result\">
          {# Hidden quiz ID for result tracking — populated by the first quiz linked to the selected course #}
          {% if selected and selected.quizzes is not empty %}
            <input type=\"hidden\" id=\"fq-quiz-id\" value=\"{{ selected.quizzes.first.id }}\">
          {% endif %}
          <div class=\"fq-score-circle\" id=\"fq-circle\">
            <div class=\"fq-score-num\" id=\"fq-score-num\">0</div>
            <div class=\"fq-score-total\">/ 10</div>
          </div>
          <div class=\"fq-result-title\" id=\"fq-result-title\"></div>
          <p class=\"fq-result-msg\" id=\"fq-result-msg\"></p>
          <div class=\"fq-result-badges\" id=\"fq-result-badges\"></div>
          <div style=\"display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-top:8px;\">
            <button class=\"btn-retry\" onclick=\"retryFinalQuiz()\">🔄 Repasser le quiz</button>
            <a id=\"fq-reco-link\" href=\"{{ path('app_recommandations') }}\"
               style=\"display:none;align-items:center;gap:7px;padding:11px 26px;
                      background:var(--d-blue);color:#fff;border-radius:6px;
                      font-family:'Syne',sans-serif;font-weight:700;font-size:13px;
                      text-decoration:none;transition:background .2s;\">
              🎯 Voir mes recommandations
            </a>
          </div>
        </div>

      </div>{# /chapter-quiz #}

      {# /chapter-quiz #}

    </div>{# /content-inner #}
  </main>
</div>
<button class=\"sidebar-toggle\" id=\"sb-toggle\" onclick=\"document.getElementById('sidebar').classList.toggle('open')\">☰</button>
<script>
const TOTAL = 5;
const done = new Array(TOTAL).fill(false);
let current = 0;

const CHAPTER_LABELS = {
  'introduction':  'Introduction',
  'budget':        'Budget Personnel',
  'epargne':       'Épargne',
  'gestion':       'Gestion Financière',
  'investissement':'Investissement'
};

function goTo(idx) {
  document.querySelectorAll('.chapter-panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.ch-item').forEach(i => i.classList.remove('active'));

  if (idx === 'quiz') {
    document.getElementById('chapter-quiz').classList.add('active');
    document.querySelector('[data-ch=\"quiz\"]').classList.add('active');
  } else {
    document.getElementById('chapter-' + idx).classList.add('active');
    document.querySelector('[data-ch=\"' + idx + '\"]').classList.add('active');
    current = idx;
  }
  window.scrollTo({top: 0, behavior: 'smooth'});
  document.getElementById('sidebar').classList.remove('open');
}

function toggleTask(el) {
  el.classList.toggle('done');
  updateProgress();
}

function updateProgress() {
  const allTasks = document.querySelectorAll('.task-item');
  const doneTasks = document.querySelectorAll('.task-item.done');
  const pct = allTasks.length ? Math.round((doneTasks.length / allTasks.length) * 100) : 0;
  document.getElementById('prog-fill').style.width = pct + '%';
  document.getElementById('prog-pct').textContent = pct + '%';
}

function checkQuiz(chIdx, answers) {
  let correct = 0, total = Object.keys(answers).length;
  Object.entries(answers).forEach(([name, correctVal]) => {
    const selected = document.querySelector('input[name=\"' + name + '\"]:checked');
    const opts = document.querySelectorAll('input[name=\"' + name + '\"]');
    opts.forEach(opt => {
      const label = opt.closest('.qopt');
      label.classList.remove('correct', 'wrong');
      if (opt.value === correctVal) label.classList.add('correct');
      else if (selected && opt === selected && opt.value !== correctVal) label.classList.add('wrong');
    });
    if (selected && selected.value === correctVal) correct++;
  });
  const fb = document.getElementById('qf-' + chIdx);
  fb.style.display = 'block';
  const _t = (window.PAGE_T && window.PAGE_T[localStorage.getItem('dinari_lang')||'fr']) || {};
  if (correct === total) {
    fb.className = 'qfeedback ok';
    fb.textContent = (_t.quiz_ok||'✅ Parfait !') + ' ' + correct + '/' + total + ' ' + (_t.quiz_correct||'bonnes réponses. Chapitre maîtrisé !');
    markChapterDone(chIdx);
  } else {
    fb.className = 'qfeedback ko';
    fb.textContent = '❌ ' + correct + '/' + total + ' ' + (_t.quiz_wrong||'correctes. Relisez le chapitre et réessayez.');
  }
}

function markChapterDone(idx) {
  done[idx] = true;
  const item = document.querySelector('[data-ch=\"' + idx + '\"]');
  item.classList.add('done');
  item.querySelector('.ch-ico').textContent = '✓';
  updateProgress();
}

function finishCourse() {
  markChapterDone(4);
  const _t = (window.PAGE_T && window.PAGE_T[localStorage.getItem('dinari_lang')||'fr']) || {};
  alert(_t.finish_alert || '🎉 Félicitations ! Vous avez terminé le cours Finance Personnelle avec Dinari !');
}

function startEdit(id) {
  document.getElementById('comment-' + id).classList.add('editing');
  const ta = document.querySelector('#edit-' + id + ' textarea');
  ta.focus();
  ta.setSelectionRange(ta.value.length, ta.value.length);
}

function cancelEdit(id) {
  document.getElementById('comment-' + id).classList.remove('editing');
}

/* ── FINAL QUIZ ── */
const FQ_ANSWERS = ['c','b','b','c','b','c','c','b','c','b'];
const FQ_TOTAL   = 10;
let fqCurrent    = 0;

function startFinalQuiz() {
  document.getElementById('fq-intro').style.display = 'none';
  document.getElementById('fq-body').classList.add('active');
  fqUpdateProgress();
  window.scrollTo({top: 0, behavior: 'smooth'});
}

function fqUpdateProgress() {
  const pct = Math.round((fqCurrent / FQ_TOTAL) * 100);
  document.getElementById('fq-prog-fill').style.width = pct + '%';
  document.getElementById('fq-prog-label').textContent = 'Question ' + (fqCurrent + 1) + ' / ' + FQ_TOTAL;
  document.getElementById('fq-prog-pct').textContent = pct + '%';
  document.getElementById('fq-btn-prev').style.visibility = fqCurrent === 0 ? 'hidden' : 'visible';
  const isLast = fqCurrent === FQ_TOTAL - 1;
  document.getElementById('fq-btn-next').style.display   = isLast ? 'none'  : 'inline-flex';
  document.getElementById('fq-btn-submit').style.display = isLast ? 'inline-flex' : 'none';
}

function fqShowQuestion(idx) {
  document.querySelectorAll('.fq-question-block').forEach(b => b.classList.remove('active'));
  document.getElementById('fq-q-' + idx).classList.add('active');
  fqCurrent = idx;
  fqUpdateProgress();
}

function fqNext() {
  if (fqCurrent < FQ_TOTAL - 1) fqShowQuestion(fqCurrent + 1);
}

function fqPrev() {
  if (fqCurrent > 0) fqShowQuestion(fqCurrent - 1);
}

function fqSubmit() {
  let score = 0;
  const details = [];

  FQ_ANSWERS.forEach((correct, i) => {
    const sel = document.querySelector('input[name=\"fq' + i + '\"]:checked');
    const opts = document.querySelectorAll('input[name=\"fq' + i + '\"]');
    const answered = sel ? sel.value : null;
    const isOk = answered === correct;
    if (isOk) score++;
    details.push({correct, answered, isOk});

    // Colorier les options
    opts.forEach(opt => {
      const lbl = opt.closest('.fq-option');
      lbl.classList.add('disabled');
      if (opt.value === correct) lbl.classList.add('correct');
      else if (opt === sel && !isOk) lbl.classList.add('wrong');
    });
  });

  // Afficher résultat
  document.getElementById('fq-body').classList.remove('active');
  const result = document.getElementById('fq-result');
  result.classList.add('active');

  const circle = document.getElementById('fq-circle');
  document.getElementById('fq-score-num').textContent = score;

  let title, msg, badgeHtml, circleClass;
  const _t = (window.PAGE_T && window.PAGE_T[localStorage.getItem('dinari_lang')||'fr']) || {};
  if (score >= 8) {
    title = _t.fq_result_great_title || '🏆 Excellent !';
    msg   = _t.fq_result_great_msg   || 'Vous maîtrisez parfaitement les bases de la finance personnelle.';
    badgeHtml = '<span class=\"fq-badge fq-badge-green\">' + (_t.fq_badge_expert||'Expert Dinari') + '</span><span class=\"fq-badge fq-badge-blue\">' + score + '/10 ' + (_t.fq_badge_correct||'correct') + '</span>';
    circleClass = 'great';
  } else if (score >= 5) {
    title = _t.fq_result_ok_title || '👍 Bon niveau !';
    msg   = _t.fq_result_ok_msg   || 'Vous avez de bonnes bases. Relisez les chapitres.';
    badgeHtml = '<span class=\"fq-badge fq-badge-blue\">' + (_t.fq_badge_progress||'En progression') + '</span><span class=\"fq-badge fq-badge-blue\">' + score + '/10 ' + (_t.fq_badge_correct||'correct') + '</span>';
    circleClass = 'ok';
  } else {
    title = _t.fq_result_low_title || '📚 À revoir !';
    msg   = _t.fq_result_low_msg   || \"Pas de panique ! Relisez les chapitres et repassez le quiz.\";
    badgeHtml = '<span class=\"fq-badge fq-badge-red\">' + (_t.fq_badge_retry||'À retravailler') + '</span><span class=\"fq-badge fq-badge-blue\">' + score + '/10 ' + (_t.fq_badge_correct||'correct') + '</span>';
    circleClass = 'low';
  }

  circle.className = 'fq-score-circle ' + circleClass;
  document.getElementById('fq-result-title').textContent = title;
  document.getElementById('fq-result-msg').textContent   = msg;
  document.getElementById('fq-result-badges').innerHTML  = badgeHtml;

  // ── Save result for recommendation engine ──────────────────────────
  const quizId = document.getElementById('fq-quiz-id') ? document.getElementById('fq-quiz-id').value : null;
  if (quizId) {
    fetch('{{ path('app_quiz_save_result') }}', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'quiz_id=' + encodeURIComponent(quizId)
           + '&score_obtenu=' + encodeURIComponent(score)
           + '&score_max=10'
    }).catch(() => {}); // fire-and-forget
  }
  // ── Show recommendation link ────────────────────────────────────────
  const recoLink = document.getElementById('fq-reco-link');
  if (recoLink) recoLink.style.display = 'inline-flex';

  result.scrollIntoView({behavior:'smooth', block:'center'});
}

function retryFinalQuiz() {
  document.querySelectorAll('.fq-option').forEach(o => {
    o.classList.remove('correct','wrong','disabled');
    const inp = o.querySelector('input');
    if (inp) inp.checked = false;
  });
  document.getElementById('fq-result').classList.remove('active');
  document.getElementById('fq-body').classList.add('active');
  fqShowQuestion(0);
  window.scrollTo({top: 0, behavior: 'smooth'});
}

/* ── REACTIONS ── */
const EMOJIS = ['👍','👎','😄','🎉','😮','❤️','🚀','👀'];

function toggleReaction(commentId, emoji, chipEl) {
  const fd = new FormData();
  fd.append('emoji', emoji);

  fetch('/cours/commentaire/' + commentId + '/react', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(data => renderReactions(commentId, data.counts, data.mine))
    .catch(console.error);
}

function renderReactions(commentId, counts, mine) {
  const bar = document.getElementById('reactions-' + commentId);
  // Garder le bouton + picker
  const wrap = bar.querySelector('.reaction-wrap');
  // Supprimer les chips existants
  bar.querySelectorAll('.reaction-chip').forEach(el => el.remove());

  // Recréer les chips avant le wrap
  Object.entries(counts).forEach(([emoji, count]) => {
    const btn = document.createElement('button');
    btn.className = 'reaction-chip' + (mine.includes(emoji) ? ' active' : '');
    btn.dataset.emoji = emoji;
    btn.innerHTML = '<span class=\"rc\">' + emoji + '</span><span class=\"rn\">' + count + '</span>';
    btn.onclick = () => toggleReaction(commentId, emoji, btn);
    bar.insertBefore(btn, wrap);
  });
}

function togglePicker(id, e) {
  e.stopPropagation();
  const picker = document.getElementById('picker-' + id);
  const isOpen = picker.classList.contains('open');
  document.querySelectorAll('.emoji-picker.open').forEach(p => p.classList.remove('open'));
  if (!isOpen) picker.classList.add('open');
}

function closePicker(id) {
  document.getElementById('picker-' + id).classList.remove('open');
}

document.addEventListener('click', () => {
  document.querySelectorAll('.emoji-picker.open').forEach(p => p.classList.remove('open'));
});

/* ── Course page translations ── */
window.PAGE_T = {
  fr: {
    sidebar_progress:'Progression', sidebar_chapters:'Chapitres', sidebar_eval:'Évaluation',
    ch0_title:'Introduction',       ch0_sub:'Pourquoi gérer ses finances ?',
    ch1_title:'Budget Personnel',   ch1_sub:'Créer et suivre son budget',
    ch2_title:'Épargne',            ch2_sub:\"Stratégies d'épargne efficaces\",
    ch3_title:'Gestion Financière', ch3_sub:'Contrôler ses dépenses',
    ch4_title:'Investissement',     ch4_sub:'Faire fructifier son argent',
    quiz_final_title:'Quiz Final',  quiz_final_sub:'Testez vos connaissances',
    tasks_title:'✅ Tâches du chapitre',
    quiz_label:'Quiz', quiz_final_label:'Quiz final', quiz_validate:'Valider mes réponses',
    true_label:'Vrai', false_label:'Faux',
    ch0_tag:'Chapitre 1 · Introduction', ch0_h1:'Pourquoi gérer ses finances ?',
    ch0_hero_p:\"Comprendre les bases de la finance personnelle est la première étape vers la liberté financière.\",
    ch0_next:'Budget Personnel →',
    ch1_tag:'Chapitre 2 · Budget Personnel', ch1_h1:'Créer et suivre son budget',
    ch1_hero_p:\"Un budget bien construit est la fondation de toute bonne santé financière.\",
    ch1_prev:'← Introduction', ch1_next:'Épargne →',
    ch2_tag:'Chapitre 3 · Épargne', ch2_h1:\"Stratégies d'épargne efficaces\",
    ch2_hero_p:\"Épargner régulièrement, même de petites sommes, crée une sécurité financière durable.\",
    ch2_prev:'← Budget', ch2_next:'Gestion Financière →',
    ch3_tag:'Chapitre 4 · Gestion Financière', ch3_h1:'Contrôler ses dépenses au quotidien',
    ch3_hero_p:\"Maîtriser ses dépenses est la clé pour atteindre ses objectifs financiers sans stress.\",
    ch3_prev:'← Épargne', ch3_next:'Investissement →',
    ch4_tag:'Chapitre 5 · Investissement', ch4_h1:'Faire fructifier son argent',
    ch4_hero_p:\"L'investissement transforme votre épargne en source de revenus passifs et de croissance à long terme.\",
    ch4_prev:'← Gestion Financière', ch4_finish:'🎉 Terminer le cours',
    comment_leave:'Laisser un commentaire', comment_name:'Votre nom',
    comment_name_ph:'Ex : Mohamed T.', comment_text:'Votre commentaire',
    comment_text_ph:'Partagez votre avis sur ce chapitre...',
    comment_publish:'Publier', comment_save:'💾 Enregistrer', comment_cancel:'Annuler',
    comment_none:'Aucun commentaire pour ce chapitre. Soyez le premier !',
    fq_tag:'Évaluation finale · 10 questions', fq_h1:'Quiz Final du Cours',
    fq_hero_p:\"Testez l'ensemble de vos connaissances sur la finance personnelle.\",
    fq_intro_sub:\"Testez l'ensemble de vos connaissances sur la finance personnelle. 10 questions couvrant tous les chapitres du cours.\",
    fq_meta_q:'10 questions', fq_meta_t:'~5 minutes',
    fq_start:'🚀 Commencer le quiz final',
    fq_prev:'← Précédent', fq_next:'Suivant →', fq_submit:'🎯 Voir mon score',
    fq_retry:'🔄 Repasser le quiz',
    quiz_ok:'✅ Parfait !', quiz_correct:'bonnes réponses. Chapitre maîtrisé !',
    quiz_wrong:'correctes. Relisez le chapitre et réessayez.',
    finish_alert:'🎉 Félicitations ! Vous avez terminé le cours Finance Personnelle avec Dinari !',
    fq_result_great_title:'🏆 Excellent !',
    fq_result_great_msg:\"Vous maîtrisez parfaitement les bases de la finance personnelle. Vous êtes prêt à gérer vos finances comme un pro !\",
    fq_result_ok_title:'👍 Bon niveau !',
    fq_result_ok_msg:\"Vous avez de bonnes bases. Relisez les chapitres sur lesquels vous avez hésité pour consolider vos connaissances.\",
    fq_result_low_title:'📚 À revoir !',
    fq_result_low_msg:\"Pas de panique ! Relisez les chapitres du cours et repassez le quiz. La finance personnelle s'apprend avec la pratique.\",
    fq_badge_expert:'Expert Dinari', fq_badge_progress:'En progression',
    fq_badge_retry:'À retravailler', fq_badge_correct:'correct',
    /* content blocks */
    c0_b1_title:\"Qu'est-ce que la finance personnelle ?\", c0_b2_title:'Les 3 piliers de la santé financière', c0_b3_title:'Vidéo — Introduction à la finance personnelle', c0_b4_title:'Le cycle financier',
    c0_p1:\"La finance personnelle désigne l'ensemble des décisions qu'un individu prend pour gérer ses revenus, dépenses, épargne et investissements.\",
    c0_p2:\"Contrairement aux idées reçues, gérer ses finances ne nécessite pas d'être expert en économie. Quelques principes fondamentaux suffisent.\",
    c0_hbox_label:'À retenir :', c0_hbox_text:\"78% des personnes qui planifient leur budget atteignent leurs objectifs financiers en moins de 2 ans.\",
    c0_card1_h:'Contrôle des dépenses', c0_card1_p:'Savoir où va chaque dinar dépensé chaque mois.',
    c0_card2_h:'Épargne régulière',     c0_card2_p:\"Mettre de côté au moins 10% de ses revenus mensuels.\",
    c0_card3_h:'Investissement intelligent', c0_card3_p:\"Faire travailler son argent pour générer des revenus passifs.\",
    c0_card4_h:\"Fonds d'urgence\",       c0_card4_p:\"Avoir 3 à 6 mois de dépenses en réserve pour les imprévus.\",
    c0_img_cap:'Revenus → Dépenses → Épargne → Investissement',
    c0_task1:\"Regarder la vidéo d'introduction\", c0_task1s:'Durée estimée : 8 min',
    c0_task2:'Lister vos 3 principales sources de dépenses', c0_task2s:'Exercice pratique',
    c0_task3:'Répondre au quiz ci-dessous', c0_task3s:'Valider vos connaissances',
    c0_q1:'1. Quel pourcentage minimum est recommandé d\\'épargner chaque mois ?',
    c0_q2:'2. Combien de mois de dépenses doit contenir un fonds d\\'urgence ?',
    c0_q3:'3. La finance personnelle nécessite d\\'être expert en économie.',
    c1_b1_title:'La règle 50/30/20', c1_b2_title:'Visualiser son budget', c1_b3_title:'Vidéo — Comment créer son budget', c1_b4_title:'Conseils pratiques',
    c1_p1:'La méthode la plus populaire pour budgéter ses revenus est la règle 50/30/20 :',
    c1_card1_h:'Besoins essentiels', c1_card1_p:'Loyer, nourriture, transport, factures.',
    c1_card2_h:'Envies personnelles', c1_card2_p:'Loisirs, restaurants, shopping non essentiel.',
    c1_card3_h:'Épargne & remboursements', c1_card3_p:'Épargne, investissements, remboursement de dettes.',
    c1_card4_h:'Exemple concret', c1_card4_p:'Revenu 2000 DT → 1000 besoins, 600 envies, 400 épargne.',
    c1_img_cap:\"Répartition visuelle d'un budget mensuel équilibré\",
    c1_hbox_label:'Astuce Dinari :', c1_hbox_text:\"Utilisez la règle des enveloppes — allouez du cash physique par catégorie pour mieux contrôler vos dépenses.\",
    c1_tip1:'Notez chaque dépense pendant 30 jours avant de créer votre budget. Vous serez surpris de voir où part votre argent.',
    c1_tip2:\"Révisez votre budget chaque mois. Un budget n'est pas figé, il évolue avec votre situation.\",
    c1_task1:'Calculer vos revenus nets mensuels', c1_task1s:'Base de tout budget',
    c1_task2:'Appliquer la règle 50/30/20 à votre situation', c1_task2s:'Exercice de répartition',
    c1_task3:'Identifier 3 dépenses à réduire ce mois', c1_task3s:'Action concrète',
    c1_q1:\"1. Dans la règle 50/30/20, quel pourcentage est alloué à l'épargne ?\",
    c1_q2:'2. Quelle est la première étape avant de créer un budget ?',
    c2_b1_title:'Pourquoi épargner ?', c2_b2_title:\"Les types d'épargne\", c2_b3_title:\"Vidéo — Stratégies d'épargne\", c2_b4_title:\"L'effet des intérêts composés\",
    c2_p1:\"L'épargne vous protège contre les imprévus, vous permet de réaliser vos projets et constitue la base de tout investissement futur.\",
    c2_hbox_label:'Principe clé :', c2_hbox_text:\"Payez-vous en premier. Dès que vous recevez votre salaire, transférez automatiquement votre épargne avant de dépenser.\",
    c2_card1_h:'Épargne de précaution', c2_card1_p:'3 à 6 mois de dépenses pour les urgences.',
    c2_card2_h:'Épargne projet',        c2_card2_p:'Vacances, voiture, mariage — objectif défini.',
    c2_card3_h:'Épargne retraite',      c2_card3_p:\"Préparer l'avenir dès aujourd'hui.\",
    c2_card4_h:'Épargne investissement',c2_card4_p:'Capital pour générer des revenus passifs.',
    c2_img_cap:\"Les intérêts composés : votre argent qui travaille pour vous\",
    c2_compound:\"100 DT épargnés par mois pendant 20 ans à 5% d'intérêt = plus de 41 000 DT.\",
    c2_task1:\"Définir votre objectif d'épargne mensuel\", c2_task1s:'Minimum 10% de vos revenus',
    c2_task2:'Ouvrir un compte épargne dédié', c2_task2s:'Séparer épargne et dépenses courantes',
    c2_task3:'Configurer un virement automatique', c2_task3s:'Le jour de réception du salaire',
    c2_q1:'1. Quel est le principe \"payez-vous en premier\" ?',
    c2_q2:\"2. Combien de mois de dépenses doit contenir une épargne de précaution ?\",
    c3_b1_title:'Identifier les dépenses cachées', c3_b2_title:'Outils de gestion', c3_b3_title:'Vidéo — Gérer ses dépenses efficacement', c3_b4_title:'Tableau de bord financier',
    c3_p1:\"Les abonnements oubliés, les achats impulsifs et les petites dépenses quotidiennes peuvent représenter jusqu'à 30% de votre budget sans que vous le réalisiez.\",
    c3_hbox_label:'Attention :', c3_hbox_text:\"Un café à 3 DT par jour = 90 DT/mois = 1 080 DT/an. Les petites dépenses s'accumulent.\",
    c3_card1_h:'Tableau de bord mensuel', c3_card1_p:'Suivre revenus vs dépenses chaque mois.',
    c3_card2_h:'Catégorisation',          c3_card2_p:'Classer chaque dépense par catégorie.',
    c3_card3_h:'Alertes de dépassement',  c3_card3_p:'Être notifié quand on dépasse un budget.',
    c3_card4_h:'Bilan trimestriel',       c3_card4_p:'Analyser ses tendances tous les 3 mois.',
    c3_img_cap:\"Visualiser ses finances en un coup d'œil\",
    c3_task1:'Lister tous vos abonnements actifs', c3_task1s:'Annuler ceux inutilisés',
    c3_task2:'Catégoriser vos dépenses du mois dernier', c3_task2s:'Identifier les postes à réduire',
    c3_task3:'Fixer un plafond pour chaque catégorie', c3_task3s:'Budget par enveloppe',
    c3_q1:'1. Un café à 3 DT/jour représente combien par an ?',
    c3_q2:'2. À quelle fréquence est recommandé un bilan financier ?',
    c4_b1_title:\"Les bases de l'investissement\", c4_b2_title:\"Types d'investissements\", c4_b3_title:'Vidéo — Investir intelligemment', c4_b4_title:'La diversification du portefeuille',
    c4_p1:\"Investir, c'est mettre son argent au travail pour générer des rendements. Mais tout investissement comporte un risque — plus le rendement potentiel est élevé, plus le risque l'est aussi.\",
    c4_hbox_label:\"Règle d'or :\", c4_hbox_text:\"Ne jamais investir de l'argent dont vous avez besoin à court terme. L'investissement est une stratégie long terme.\",
    c4_card1_h:'Bons du Trésor',         c4_card1_p:'Faible risque, rendement modéré. Idéal pour débuter.',
    c4_card2_h:'Actions en bourse',      c4_card2_p:'Risque moyen à élevé, potentiel de croissance important.',
    c4_card3_h:'Immobilier',             c4_card3_p:'Investissement tangible, revenus locatifs stables.',
    c4_card4_h:\"Fonds d'investissement\", c4_card4_p:'Diversification automatique, gestion professionnelle.',
    c4_img_cap:'Ne pas mettre tous ses œufs dans le même panier',
    c4_diversif:'La diversification réduit le risque global de votre portefeuille en répartissant les investissements sur plusieurs actifs.',
    c4_task1:'Définir votre profil de risque', c4_task1s:'Conservateur, modéré ou dynamique ?',
    c4_task2:\"Rechercher les options d'investissement disponibles en Tunisie\", c4_task2s:'SICAV, bons du trésor, bourse de Tunis',
    c4_task3:'Simuler un investissement de 100 DT/mois sur 10 ans', c4_task3s:'Calculer les intérêts composés',
    c4_q1:'1. Quel type d\\'investissement est le moins risqué pour un débutant ?',
    c4_q2:'2. Qu\\'est-ce que la diversification ?',
    c4_q3:'3. L\\'investissement est une stratégie :',
    fq_q1_num:'Question 1 / 10 · Budget',       fq_q1_text:'Dans la règle 50/30/20, quel pourcentage est alloué aux besoins essentiels ?',
    fq_q2_num:'Question 2 / 10 · Épargne',       fq_q2_text:'Quel est le principe \"payez-vous en premier\" ?',
    fq_q3_num:'Question 3 / 10 · Investissement',fq_q3_text:\"Qu'est-ce que la diversification d'un portefeuille ?\",
    fq_q4_num:'Question 4 / 10 · Gestion',       fq_q4_text:'Un café à 3 DT par jour représente combien par an ?',
    fq_q5_num:'Question 5 / 10 · Épargne',       fq_q5_text:\"Combien de mois de dépenses doit contenir une épargne de précaution ?\",
    fq_q6_num:'Question 6 / 10 · Investissement',fq_q6_text:\"Quel type d'investissement est généralement le moins risqué pour un débutant ?\",
    fq_q7_num:'Question 7 / 10 · Budget',        fq_q7_text:\"Quelle est la première étape recommandée avant de créer un budget ?\",
    fq_q8_num:'Question 8 / 10 · Gestion',       fq_q8_text:\"À quelle fréquence est recommandé un bilan financier personnel ?\",
    fq_q9_num:'Question 9 / 10 · Finance générale', fq_q9_text:\"Quel pourcentage minimum de ses revenus est recommandé d'épargner chaque mois ?\",
    fq_q10_num:'Question 10 / 10 · Investissement', fq_q10_text:\"L'investissement est principalement une stratégie :\",
  },
  en: {
    sidebar_progress:'Progress', sidebar_chapters:'Chapters', sidebar_eval:'Assessment',
    ch0_title:'Introduction',       ch0_sub:'Why manage your finances?',
    ch1_title:'Personal Budget',    ch1_sub:'Create and track your budget',
    ch2_title:'Savings',            ch2_sub:'Effective savings strategies',
    ch3_title:'Financial Management', ch3_sub:'Control your expenses',
    ch4_title:'Investment',         ch4_sub:'Grow your money',
    quiz_final_title:'Final Quiz',  quiz_final_sub:'Test your knowledge',
    tasks_title:'✅ Chapter tasks',
    quiz_label:'Quiz', quiz_final_label:'Final quiz', quiz_validate:'Submit answers',
    true_label:'True', false_label:'False',
    ch0_tag:'Chapter 1 · Introduction', ch0_h1:'Why manage your finances?',
    ch0_hero_p:'Understanding the basics of personal finance is the first step toward financial freedom.',
    ch0_next:'Personal Budget →',
    ch1_tag:'Chapter 2 · Personal Budget', ch1_h1:'Create and track your budget',
    ch1_hero_p:'A well-built budget is the foundation of good financial health.',
    ch1_prev:'← Introduction', ch1_next:'Savings →',
    ch2_tag:'Chapter 3 · Savings', ch2_h1:'Effective savings strategies',
    ch2_hero_p:'Saving regularly, even small amounts, creates lasting financial security.',
    ch2_prev:'← Budget', ch2_next:'Financial Management →',
    ch3_tag:'Chapter 4 · Financial Management', ch3_h1:'Control your daily expenses',
    ch3_hero_p:'Mastering your expenses is the key to reaching your financial goals without stress.',
    ch3_prev:'← Savings', ch3_next:'Investment →',
    ch4_tag:'Chapter 5 · Investment', ch4_h1:'Grow your money',
    ch4_hero_p:'Investment transforms your savings into a source of passive income and long-term growth.',
    ch4_prev:'← Financial Management', ch4_finish:'🎉 Finish the course',
    comment_leave:'Leave a comment', comment_name:'Your name',
    comment_name_ph:'E.g.: John D.', comment_text:'Your comment',
    comment_text_ph:'Share your thoughts on this chapter...',
    comment_publish:'Publish', comment_save:'💾 Save', comment_cancel:'Cancel',
    comment_none:'No comments for this chapter yet. Be the first!',
    fq_tag:'Final assessment · 10 questions', fq_h1:'Final Course Quiz',
    fq_hero_p:'Test all your knowledge on personal finance.',
    fq_intro_sub:'Test all your knowledge on personal finance. 10 questions covering all course chapters.',
    fq_meta_q:'10 questions', fq_meta_t:'~5 minutes',
    fq_start:'🚀 Start the final quiz',
    fq_prev:'← Previous', fq_next:'Next →', fq_submit:'🎯 See my score',
    fq_retry:'🔄 Retake the quiz',
    quiz_ok:'✅ Perfect!', quiz_correct:'correct answers. Chapter mastered!',
    quiz_wrong:'correct. Re-read the chapter and try again.',
    finish_alert:'🎉 Congratulations! You have completed the Personal Finance course with Dinari!',
    fq_result_great_title:'🏆 Excellent!',
    fq_result_great_msg:'You have perfectly mastered the basics of personal finance. You are ready to manage your finances like a pro!',
    fq_result_ok_title:'👍 Good level!',
    fq_result_ok_msg:'You have a good foundation. Re-read the chapters you hesitated on to consolidate your knowledge.',
    fq_result_low_title:'📚 Needs review!',
    fq_result_low_msg:\"Don't panic! Re-read the course chapters and retake the quiz. Personal finance is learned through practice.\",
    fq_badge_expert:'Dinari Expert', fq_badge_progress:'In progress',
    fq_badge_retry:'Needs work', fq_badge_correct:'correct',
    c0_b1_title:'What is personal finance?', c0_b2_title:'The 3 pillars of financial health', c0_b3_title:'Video — Introduction to personal finance', c0_b4_title:'The financial cycle',
    c0_p1:'Personal finance refers to all the decisions an individual makes to manage their income, expenses, savings and investments.',
    c0_p2:'Contrary to popular belief, managing your finances does not require being an economics expert. A few fundamental principles are enough.',
    c0_hbox_label:'Key takeaway:', c0_hbox_text:'78% of people who plan their budget reach their financial goals in less than 2 years.',
    c0_card1_h:'Expense control',    c0_card1_p:'Know where every dinar goes each month.',
    c0_card2_h:'Regular savings',    c0_card2_p:'Set aside at least 10% of your monthly income.',
    c0_card3_h:'Smart investment',   c0_card3_p:'Put your money to work to generate passive income.',
    c0_card4_h:'Emergency fund',     c0_card4_p:'Keep 3 to 6 months of expenses in reserve for unexpected events.',
    c0_img_cap:'Income → Expenses → Savings → Investment',
    c0_task1:'Watch the introduction video', c0_task1s:'Estimated time: 8 min',
    c0_task2:'List your 3 main expense sources', c0_task2s:'Practical exercise',
    c0_task3:'Answer the quiz below', c0_task3s:'Validate your knowledge',
    c0_q1:'1. What minimum percentage of income is recommended to save each month?',
    c0_q2:'2. How many months of expenses should an emergency fund contain?',
    c0_q3:'3. Personal finance requires being an economics expert.',
    c1_b1_title:'The 50/30/20 rule', c1_b2_title:'Visualize your budget', c1_b3_title:'Video — How to create your budget', c1_b4_title:'Practical tips',
    c1_p1:'The most popular method for budgeting income is the 50/30/20 rule:',
    c1_card1_h:'Essential needs',    c1_card1_p:'Rent, food, transport, bills.',
    c1_card2_h:'Personal wants',     c1_card2_p:'Leisure, restaurants, non-essential shopping.',
    c1_card3_h:'Savings & repayments',c1_card3_p:'Savings, investments, debt repayment.',
    c1_card4_h:'Concrete example',   c1_card4_p:'Income 2000 DT → 1000 needs, 600 wants, 400 savings.',
    c1_img_cap:'Visual breakdown of a balanced monthly budget',
    c1_hbox_label:'Dinari tip:', c1_hbox_text:'Use the envelope rule — allocate physical cash per category to better control your spending.',
    c1_tip1:'Track every expense for 30 days before creating your budget. You will be surprised where your money goes.',
    c1_tip2:'Review your budget every month. A budget is not fixed, it evolves with your situation.',
    c1_task1:'Calculate your net monthly income', c1_task1s:'The basis of any budget',
    c1_task2:'Apply the 50/30/20 rule to your situation', c1_task2s:'Allocation exercise',
    c1_task3:'Identify 3 expenses to reduce this month', c1_task3s:'Concrete action',
    c1_q1:'1. In the 50/30/20 rule, what percentage is allocated to savings?',
    c1_q2:'2. What is the first step before creating a budget?',
    c2_b1_title:'Why save?', c2_b2_title:'Types of savings', c2_b3_title:'Video — Savings strategies', c2_b4_title:'The power of compound interest',
    c2_p1:'Savings protect you against unexpected events, allow you to achieve your projects and form the basis of any future investment.',
    c2_hbox_label:'Key principle:', c2_hbox_text:'Pay yourself first. As soon as you receive your salary, automatically transfer your savings before spending.',
    c2_card1_h:'Emergency savings',  c2_card1_p:'3 to 6 months of expenses for emergencies.',
    c2_card2_h:'Project savings',    c2_card2_p:'Holidays, car, wedding — defined goal.',
    c2_card3_h:'Retirement savings', c2_card3_p:'Prepare for the future starting today.',
    c2_card4_h:'Investment savings', c2_card4_p:'Capital to generate passive income.',
    c2_img_cap:'Compound interest: your money working for you',
    c2_compound:'100 DT saved per month for 20 years at 5% interest = more than 41,000 DT.',
    c2_task1:'Define your monthly savings goal', c2_task1s:'Minimum 10% of your income',
    c2_task2:'Open a dedicated savings account', c2_task2s:'Separate savings from current expenses',
    c2_task3:'Set up an automatic transfer', c2_task3s:'On the day you receive your salary',
    c2_q1:'1. What is the \"pay yourself first\" principle?',
    c2_q2:'2. How many months of expenses should a precautionary savings contain?',
    c3_b1_title:'Identify hidden expenses', c3_b2_title:'Management tools', c3_b3_title:'Video — Manage your expenses effectively', c3_b4_title:'Financial dashboard',
    c3_p1:'Forgotten subscriptions, impulse purchases and small daily expenses can represent up to 30% of your budget without you realizing it.',
    c3_hbox_label:'Warning:', c3_hbox_text:'A coffee at 3 DT per day = 90 DT/month = 1,080 DT/year. Small expenses add up.',
    c3_card1_h:'Monthly dashboard',  c3_card1_p:'Track income vs expenses each month.',
    c3_card2_h:'Categorization',     c3_card2_p:'Classify each expense by category.',
    c3_card3_h:'Overspend alerts',   c3_card3_p:'Be notified when you exceed a budget.',
    c3_card4_h:'Quarterly review',   c3_card4_p:'Analyze your trends every 3 months.',
    c3_img_cap:'Visualize your finances at a glance',
    c3_task1:'List all your active subscriptions', c3_task1s:'Cancel unused ones',
    c3_task2:'Categorize last month\\'s expenses', c3_task2s:'Identify areas to reduce',
    c3_task3:'Set a ceiling for each category', c3_task3s:'Envelope budget',
    c3_q1:'1. How much does a 3 DT/day coffee cost per year?',
    c3_q2:'2. How often is a personal financial review recommended?',
    c4_b1_title:'Investment basics', c4_b2_title:'Types of investments', c4_b3_title:'Video — Invest intelligently', c4_b4_title:'Portfolio diversification',
    c4_p1:'Investing means putting your money to work to generate returns. But every investment carries risk — the higher the potential return, the higher the risk.',
    c4_hbox_label:'Golden rule:', c4_hbox_text:'Never invest money you need in the short term. Investment is a long-term strategy.',
    c4_card1_h:'Treasury bonds',     c4_card1_p:'Low risk, moderate return. Ideal for beginners.',
    c4_card2_h:'Stock market',       c4_card2_p:'Medium to high risk, significant growth potential.',
    c4_card3_h:'Real estate',        c4_card3_p:'Tangible investment, stable rental income.',
    c4_card4_h:'Investment funds',   c4_card4_p:'Automatic diversification, professional management.',
    c4_img_cap:\"Don't put all your eggs in one basket\",
    c4_diversif:'Diversification reduces the overall risk of your portfolio by spreading investments across multiple assets.',
    c4_task1:'Define your risk profile', c4_task1s:'Conservative, moderate or dynamic?',
    c4_task2:'Research investment options available in Tunisia', c4_task2s:'SICAV, treasury bonds, Tunis stock exchange',
    c4_task3:'Simulate a 100 DT/month investment over 10 years', c4_task3s:'Calculate compound interest',
    c4_q1:'1. Which type of investment is least risky for a beginner?',
    c4_q2:'2. What is diversification?',
    c4_q3:'3. Investment is primarily a strategy:',
    fq_q1_num:'Question 1 / 10 · Budget',       fq_q1_text:'In the 50/30/20 rule, what percentage is allocated to essential needs?',
    fq_q2_num:'Question 2 / 10 · Savings',       fq_q2_text:'What is the \"pay yourself first\" principle?',
    fq_q3_num:'Question 3 / 10 · Investment',    fq_q3_text:'What is portfolio diversification?',
    fq_q4_num:'Question 4 / 10 · Management',    fq_q4_text:'How much does a 3 DT/day coffee cost per year?',
    fq_q5_num:'Question 5 / 10 · Savings',       fq_q5_text:'How many months of expenses should a precautionary savings contain?',
    fq_q6_num:'Question 6 / 10 · Investment',    fq_q6_text:'Which type of investment is generally least risky for a beginner?',
    fq_q7_num:'Question 7 / 10 · Budget',        fq_q7_text:'What is the recommended first step before creating a budget?',
    fq_q8_num:'Question 8 / 10 · Management',    fq_q8_text:'How often is a personal financial review recommended?',
    fq_q9_num:'Question 9 / 10 · General finance',fq_q9_text:'What minimum percentage of income is recommended to save each month?',
    fq_q10_num:'Question 10 / 10 · Investment',  fq_q10_text:'Investment is primarily a:',
  },
  ar: {
    sidebar_progress:'التقدم', sidebar_chapters:'الفصول', sidebar_eval:'التقييم',
    ch0_title:'مقدمة',              ch0_sub:'لماذا تدير أموالك؟',
    ch1_title:'الميزانية الشخصية', ch1_sub:'إنشاء وتتبع ميزانيتك',
    ch2_title:'الادخار',            ch2_sub:'استراتيجيات ادخار فعّالة',
    ch3_title:'الإدارة المالية',    ch3_sub:'التحكم في مصاريفك',
    ch4_title:'الاستثمار',          ch4_sub:'تنمية أموالك',
    quiz_final_title:'الاختبار النهائي', quiz_final_sub:'اختبر معلوماتك',
    tasks_title:'✅ مهام الفصل',
    quiz_label:'اختبار', quiz_final_label:'الاختبار النهائي', quiz_validate:'تأكيد الإجابات',
    true_label:'صحيح', false_label:'خطأ',
    ch0_tag:'الفصل 1 · مقدمة', ch0_h1:'لماذا تدير أموالك؟',
    ch0_hero_p:'فهم أساسيات الإدارة المالية الشخصية هو الخطوة الأولى نحو الحرية المالية.',
    ch0_next:'الميزانية الشخصية ←',
    ch1_tag:'الفصل 2 · الميزانية الشخصية', ch1_h1:'إنشاء وتتبع ميزانيتك',
    ch1_hero_p:'الميزانية المبنية جيداً هي أساس الصحة المالية الجيدة.',
    ch1_prev:'← مقدمة', ch1_next:'الادخار ←',
    ch2_tag:'الفصل 3 · الادخار', ch2_h1:'استراتيجيات ادخار فعّالة',
    ch2_hero_p:'الادخار المنتظم، حتى بمبالغ صغيرة، يخلق أمناً مالياً دائماً.',
    ch2_prev:'← الميزانية', ch2_next:'الإدارة المالية ←',
    ch3_tag:'الفصل 4 · الإدارة المالية', ch3_h1:'التحكم في مصاريفك اليومية',
    ch3_hero_p:'إتقان مصاريفك هو مفتاح تحقيق أهدافك المالية بدون توتر.',
    ch3_prev:'← الادخار', ch3_next:'الاستثمار ←',
    ch4_tag:'الفصل 5 · الاستثمار', ch4_h1:'تنمية أموالك',
    ch4_hero_p:'الاستثمار يحوّل مدخراتك إلى مصدر للدخل السلبي والنمو على المدى البعيد.',
    ch4_prev:'← الإدارة المالية', ch4_finish:'🎉 إنهاء الدورة',
    comment_leave:'اترك تعليقاً', comment_name:'اسمك',
    comment_name_ph:'مثال: محمد ت.', comment_text:'تعليقك',
    comment_text_ph:'شارك رأيك حول هذا الفصل...',
    comment_publish:'نشر', comment_save:'💾 حفظ', comment_cancel:'إلغاء',
    comment_none:'لا توجد تعليقات لهذا الفصل. كن أول من يعلّق!',
    fq_tag:'التقييم النهائي · 10 أسئلة', fq_h1:'الاختبار النهائي للدورة',
    fq_hero_p:'اختبر جميع معلوماتك حول الإدارة المالية الشخصية.',
    fq_intro_sub:'اختبر جميع معلوماتك حول الإدارة المالية الشخصية. 10 أسئلة تغطي جميع فصول الدورة.',
    fq_meta_q:'10 أسئلة', fq_meta_t:'~5 دقائق',
    fq_start:'🚀 ابدأ الاختبار النهائي',
    fq_prev:'← السابق', fq_next:'التالي →', fq_submit:'🎯 عرض نتيجتي',
    fq_retry:'🔄 إعادة الاختبار',
    quiz_ok:'✅ ممتاز!', quiz_correct:'إجابات صحيحة. أتقنت الفصل!',
    quiz_wrong:'صحيحة. أعد قراءة الفصل وحاول مجدداً.',
    finish_alert:'🎉 تهانينا! لقد أتممت دورة الإدارة المالية الشخصية مع دينار!',
    fq_result_great_title:'🏆 ممتاز!',
    fq_result_great_msg:'أتقنت تماماً أساسيات الإدارة المالية الشخصية. أنت مستعد لإدارة أموالك كالمحترفين!',
    fq_result_ok_title:'👍 مستوى جيد!',
    fq_result_ok_msg:'لديك أسس جيدة. أعد قراءة الفصول التي ترددت فيها لتعزيز معلوماتك.',
    fq_result_low_title:'📚 يحتاج مراجعة!',
    fq_result_low_msg:'لا تقلق! أعد قراءة فصول الدورة وأعد الاختبار. الإدارة المالية تُتعلم بالتطبيق.',
    fq_badge_expert:'خبير دينار', fq_badge_progress:'في تقدم',
    fq_badge_retry:'يحتاج عمل', fq_badge_correct:'صحيح',
    c0_b1_title:'ما هي الإدارة المالية الشخصية؟', c0_b2_title:'الركائز الثلاث للصحة المالية', c0_b3_title:'فيديو — مقدمة في الإدارة المالية الشخصية', c0_b4_title:'الدورة المالية',
    c0_p1:'الإدارة المالية الشخصية هي مجموع القرارات التي يتخذها الفرد لإدارة دخله ومصاريفه ومدخراته واستثماراته.',
    c0_p2:'خلافاً للاعتقاد الشائع، لا تتطلب إدارة أموالك أن تكون خبيراً في الاقتصاد. بعض المبادئ الأساسية كافية.',
    c0_hbox_label:'للتذكر:', c0_hbox_text:'78% من الأشخاص الذين يخططون لميزانيتهم يحققون أهدافهم المالية في أقل من سنتين.',
    c0_card1_h:'التحكم في المصاريف', c0_card1_p:'معرفة أين يذهب كل دينار كل شهر.',
    c0_card2_h:'الادخار المنتظم',    c0_card2_p:'توفير ما لا يقل عن 10% من دخلك الشهري.',
    c0_card3_h:'الاستثمار الذكي',    c0_card3_p:'تشغيل أموالك لتوليد دخل سلبي.',
    c0_card4_h:'صندوق الطوارئ',      c0_card4_p:'الاحتفاظ بمصاريف 3 إلى 6 أشهر احتياطاً للطوارئ.',
    c0_img_cap:'الدخل ← المصاريف ← الادخار ← الاستثمار',
    c0_task1:'مشاهدة فيديو المقدمة', c0_task1s:'المدة المقدرة: 8 دقائق',
    c0_task2:'إدراج مصادر مصاريفك الثلاثة الرئيسية', c0_task2s:'تمرين عملي',
    c0_task3:'الإجابة على الاختبار أدناه', c0_task3s:'التحقق من معلوماتك',
    c0_q1:'1. ما هي النسبة الدنيا الموصى بادخارها كل شهر؟',
    c0_q2:'2. كم شهراً من المصاريف يجب أن يحتوي صندوق الطوارئ؟',
    c0_q3:'3. تتطلب الإدارة المالية الشخصية أن تكون خبيراً في الاقتصاد.',
    c1_b1_title:'قاعدة 50/30/20', c1_b2_title:'تصور ميزانيتك', c1_b3_title:'فيديو — كيفية إنشاء ميزانيتك', c1_b4_title:'نصائح عملية',
    c1_p1:'الطريقة الأكثر شيوعاً لوضع ميزانية الدخل هي قاعدة 50/30/20:',
    c1_card1_h:'الاحتياجات الأساسية', c1_card1_p:'الإيجار، الطعام، المواصلات، الفواتير.',
    c1_card2_h:'الرغبات الشخصية',     c1_card2_p:'الترفيه، المطاعم، التسوق غير الضروري.',
    c1_card3_h:'الادخار والسداد',      c1_card3_p:'الادخار، الاستثمارات، سداد الديون.',
    c1_card4_h:'مثال ملموس',           c1_card4_p:'دخل 2000 دت ← 1000 احتياجات، 600 رغبات، 400 ادخار.',
    c1_img_cap:'توزيع بصري لميزانية شهرية متوازنة',
    c1_hbox_label:'نصيحة دينار:', c1_hbox_text:'استخدم قاعدة الأظرف — خصص نقداً مادياً لكل فئة للتحكم بشكل أفضل في مصاريفك.',
    c1_tip1:'سجّل كل مصروف لمدة 30 يوماً قبل إنشاء ميزانيتك. ستندهش من أين تذهب أموالك.',
    c1_tip2:'راجع ميزانيتك كل شهر. الميزانية ليست ثابتة، بل تتطور مع وضعك.',
    c1_task1:'احسب دخلك الصافي الشهري', c1_task1s:'أساس أي ميزانية',
    c1_task2:'طبّق قاعدة 50/30/20 على وضعك', c1_task2s:'تمرين التوزيع',
    c1_task3:'حدد 3 مصاريف لتخفيضها هذا الشهر', c1_task3s:'إجراء ملموس',
    c1_q1:'1. في قاعدة 50/30/20، ما النسبة المخصصة للادخار؟',
    c1_q2:'2. ما هي الخطوة الأولى قبل إنشاء ميزانية؟',
    c2_b1_title:'لماذا الادخار؟', c2_b2_title:'أنواع الادخار', c2_b3_title:'فيديو — استراتيجيات الادخار', c2_b4_title:'قوة الفائدة المركبة',
    c2_p1:'يحميك الادخار من المفاجآت، ويتيح لك تحقيق مشاريعك، ويشكّل أساس أي استثمار مستقبلي.',
    c2_hbox_label:'مبدأ أساسي:', c2_hbox_text:'ادفع لنفسك أولاً. بمجرد استلام راتبك، حوّل مدخراتك تلقائياً قبل الإنفاق.',
    c2_card1_h:'ادخار الطوارئ',    c2_card1_p:'مصاريف 3 إلى 6 أشهر للطوارئ.',
    c2_card2_h:'ادخار المشاريع',   c2_card2_p:'عطلة، سيارة، زواج — هدف محدد.',
    c2_card3_h:'ادخار التقاعد',    c2_card3_p:'الاستعداد للمستقبل منذ اليوم.',
    c2_card4_h:'ادخار الاستثمار',  c2_card4_p:'رأس مال لتوليد دخل سلبي.',
    c2_img_cap:'الفائدة المركبة: أموالك تعمل من أجلك',
    c2_compound:'100 دت مدخرة شهرياً لمدة 20 سنة بفائدة 5% = أكثر من 41,000 دت.',
    c2_task1:'حدد هدف ادخارك الشهري', c2_task1s:'10% من دخلك كحد أدنى',
    c2_task2:'افتح حساب ادخار مخصصاً', c2_task2s:'فصل الادخار عن المصاريف الجارية',
    c2_task3:'اضبط تحويلاً تلقائياً', c2_task3s:'يوم استلام الراتب',
    c2_q1:'1. ما هو مبدأ \"ادفع لنفسك أولاً\"؟',
    c2_q2:'2. كم شهراً من المصاريف يجب أن يحتوي ادخار الطوارئ؟',
    c3_b1_title:'تحديد المصاريف الخفية', c3_b2_title:'أدوات الإدارة', c3_b3_title:'فيديو — إدارة مصاريفك بفعالية', c3_b4_title:'لوحة القيادة المالية',
    c3_p1:'الاشتراكات المنسية والمشتريات الاندفاعية والمصاريف اليومية الصغيرة قد تمثل ما يصل إلى 30% من ميزانيتك دون أن تدرك ذلك.',
    c3_hbox_label:'تحذير:', c3_hbox_text:'قهوة بـ3 دت يومياً = 90 دت/شهر = 1,080 دت/سنة. المصاريف الصغيرة تتراكم.',
    c3_card1_h:'لوحة القيادة الشهرية', c3_card1_p:'تتبع الدخل مقابل المصاريف كل شهر.',
    c3_card2_h:'التصنيف',              c3_card2_p:'تصنيف كل مصروف حسب الفئة.',
    c3_card3_h:'تنبيهات التجاوز',      c3_card3_p:'الإشعار عند تجاوز الميزانية.',
    c3_card4_h:'المراجعة الفصلية',     c3_card4_p:'تحليل اتجاهاتك كل 3 أشهر.',
    c3_img_cap:'تصور شؤونك المالية دفعة واحدة',
    c3_task1:'أدرج جميع اشتراكاتك النشطة', c3_task1s:'إلغاء غير المستخدمة',
    c3_task2:'صنّف مصاريف الشهر الماضي', c3_task2s:'تحديد البنود القابلة للتخفيض',
    c3_task3:'حدد سقفاً لكل فئة', c3_task3s:'ميزانية الأظرف',
    c3_q1:'1. كم تكلف قهوة بـ3 دت/يوم في السنة؟',
    c3_q2:'2. ما هي الفترة الموصى بها لمراجعة الوضع المالي؟',
    c4_b1_title:'أساسيات الاستثمار', c4_b2_title:'أنواع الاستثمارات', c4_b3_title:'فيديو — الاستثمار بذكاء', c4_b4_title:'تنويع المحفظة',
    c4_p1:'الاستثمار يعني تشغيل أموالك لتوليد عوائد. لكن كل استثمار ينطوي على مخاطرة — كلما ارتفع العائد المحتمل، ارتفعت المخاطرة.',
    c4_hbox_label:'القاعدة الذهبية:', c4_hbox_text:'لا تستثمر أبداً أموالاً تحتاجها على المدى القصير. الاستثمار استراتيجية طويلة الأمد.',
    c4_card1_h:'سندات الخزينة',       c4_card1_p:'مخاطرة منخفضة، عائد معتدل. مثالي للمبتدئين.',
    c4_card2_h:'الأسهم في البورصة',   c4_card2_p:'مخاطرة متوسطة إلى عالية، إمكانية نمو كبيرة.',
    c4_card3_h:'العقارات',             c4_card3_p:'استثمار ملموس، دخل إيجاري مستقر.',
    c4_card4_h:'صناديق الاستثمار',    c4_card4_p:'تنويع تلقائي، إدارة احترافية.',
    c4_img_cap:'لا تضع كل بيضك في سلة واحدة',
    c4_diversif:'يقلل التنويع من المخاطر الإجمالية لمحفظتك بتوزيع الاستثمارات على أصول متعددة.',
    c4_task1:'حدد ملف مخاطرتك', c4_task1s:'محافظ، معتدل أم ديناميكي؟',
    c4_task2:'ابحث عن خيارات الاستثمار المتاحة في تونس', c4_task2s:'SICAV، سندات الخزينة، بورصة تونس',
    c4_task3:'محاكاة استثمار 100 دت/شهر على 10 سنوات', c4_task3s:'احسب الفائدة المركبة',
    c4_q1:'1. أي نوع من الاستثمارات هو الأقل خطورة للمبتدئين؟',
    c4_q2:'2. ما هو التنويع؟',
    c4_q3:'3. الاستثمار هو استراتيجية:',
    fq_q1_num:'السؤال 1 / 10 · الميزانية',       fq_q1_text:'في قاعدة 50/30/20، ما النسبة المخصصة للاحتياجات الأساسية؟',
    fq_q2_num:'السؤال 2 / 10 · الادخار',          fq_q2_text:'ما هو مبدأ \"ادفع لنفسك أولاً\"؟',
    fq_q3_num:'السؤال 3 / 10 · الاستثمار',        fq_q3_text:'ما هو تنويع المحفظة الاستثمارية؟',
    fq_q4_num:'السؤال 4 / 10 · الإدارة',          fq_q4_text:'كم تكلف قهوة بـ3 دت/يوم في السنة؟',
    fq_q5_num:'السؤال 5 / 10 · الادخار',          fq_q5_text:'كم شهراً من المصاريف يجب أن يحتوي ادخار الطوارئ؟',
    fq_q6_num:'السؤال 6 / 10 · الاستثمار',        fq_q6_text:'أي نوع من الاستثمارات هو الأقل خطورة عموماً للمبتدئين؟',
    fq_q7_num:'السؤال 7 / 10 · الميزانية',        fq_q7_text:'ما هي الخطوة الأولى الموصى بها قبل إنشاء ميزانية؟',
    fq_q8_num:'السؤال 8 / 10 · الإدارة',          fq_q8_text:'ما هي الفترة الموصى بها لمراجعة الوضع المالي الشخصي؟',
    fq_q9_num:'السؤال 9 / 10 · المالية العامة',   fq_q9_text:'ما هي النسبة الدنيا من الدخل الموصى بادخارها كل شهر؟',
    fq_q10_num:'السؤال 10 / 10 · الاستثمار',      fq_q10_text:'الاستثمار هو بشكل رئيسي:',
  }
};

function applyPageTranslations(lang) {
  const base = (typeof DINARI_TRANSLATIONS !== 'undefined' && DINARI_TRANSLATIONS[lang]) || {};
  const page = (window.PAGE_T && window.PAGE_T[lang]) || {};
  const t = Object.assign({}, base, page);

  // helper: set text of first matching element, preserving child nodes not targeted
  function tx(sel, text) {
    const el = document.querySelector(sel);
    if (el && text) el.textContent = text;
  }
  // helper: set text of nth matching element (0-indexed)
  function txn(sel, n, text) {
    const els = document.querySelectorAll(sel);
    if (els[n] && text) els[n].textContent = text;
  }

  /* ── SIDEBAR ── */
  tx('.prog-label span:first-child',                    t.sidebar_progress);
  tx('.sb-section:first-of-type',                       t.sidebar_chapters);
  tx('.sb-section:last-of-type',                        t.sidebar_eval);
  tx('[data-ch=\"0\"] .ch-lbl',                           t.ch0_title);
  tx('[data-ch=\"0\"] .ch-sub',                           t.ch0_sub);
  tx('[data-ch=\"1\"] .ch-lbl',                           t.ch1_title);
  tx('[data-ch=\"1\"] .ch-sub',                           t.ch1_sub);
  tx('[data-ch=\"2\"] .ch-lbl',                           t.ch2_title);
  tx('[data-ch=\"2\"] .ch-sub',                           t.ch2_sub);
  tx('[data-ch=\"3\"] .ch-lbl',                           t.ch3_title);
  tx('[data-ch=\"3\"] .ch-sub',                           t.ch3_sub);
  tx('[data-ch=\"4\"] .ch-lbl',                           t.ch4_title);
  tx('[data-ch=\"4\"] .ch-sub',                           t.ch4_sub);
  tx('[data-ch=\"quiz\"] .ch-lbl',                        t.quiz_final_title);
  tx('[data-ch=\"quiz\"] .ch-sub',                        t.quiz_final_sub);

  /* ── CHAPTER 0 ── */
  tx('#chapter-0 .ch-tag',   t.ch0_tag);
  tx('#chapter-0 h1',        t.ch0_h1);
  tx('#chapter-0 .ch-hero p',t.ch0_hero_p);
  tx('#chapter-0 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-0 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-0 .ch-nav .btn-next', t.ch0_next);

  /* ── CHAPTER 1 ── */
  tx('#chapter-1 .ch-tag',   t.ch1_tag);
  tx('#chapter-1 h1',        t.ch1_h1);
  tx('#chapter-1 .ch-hero p',t.ch1_hero_p);
  tx('#chapter-1 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-1 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-1 .ch-nav .btn-prev', t.ch1_prev);
  tx('#chapter-1 .ch-nav .btn-next', t.ch1_next);

  /* ── CHAPTER 2 ── */
  tx('#chapter-2 .ch-tag',   t.ch2_tag);
  tx('#chapter-2 h1',        t.ch2_h1);
  tx('#chapter-2 .ch-hero p',t.ch2_hero_p);
  tx('#chapter-2 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-2 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-2 .ch-nav .btn-prev', t.ch2_prev);
  tx('#chapter-2 .ch-nav .btn-next', t.ch2_next);

  /* ── CHAPTER 3 ── */
  tx('#chapter-3 .ch-tag',   t.ch3_tag);
  tx('#chapter-3 h1',        t.ch3_h1);
  tx('#chapter-3 .ch-hero p',t.ch3_hero_p);
  tx('#chapter-3 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-3 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-3 .ch-nav .btn-prev', t.ch3_prev);
  tx('#chapter-3 .ch-nav .btn-next', t.ch3_next);

  /* ── CHAPTER 4 ── */
  tx('#chapter-4 .ch-tag',   t.ch4_tag);
  tx('#chapter-4 h1',        t.ch4_h1);
  tx('#chapter-4 .ch-hero p',t.ch4_hero_p);
  tx('#chapter-4 .tasks-ttl',t.tasks_title);
  document.querySelectorAll('#chapter-4 .btn-quiz').forEach(b => b.textContent = t.quiz_validate);
  tx('#chapter-4 .ch-nav .btn-prev', t.ch4_prev);
  tx('#chapter-4 .ch-nav .btn-next', t.ch4_finish);

  /* ── FINAL QUIZ ── */
  tx('#chapter-quiz .ch-tag',       t.fq_tag);
  tx('#chapter-quiz h1',            t.fq_h1);
  tx('#chapter-quiz .ch-hero p',    t.fq_hero_p);
  tx('.fq-intro-title',             t.fq_h1);
  tx('.fq-intro-sub',               t.fq_intro_sub);
  tx('.btn-start-fq',               t.fq_start);
  tx('#fq-btn-prev',                t.fq_prev);
  tx('#fq-btn-next',                t.fq_next);
  tx('#fq-btn-submit',              t.fq_submit);
  tx('.btn-retry',                  t.fq_retry);

  /* ── COMMENT FORMS (all chapters) ── */
  document.querySelectorAll('.cf-title').forEach(el => el.textContent = t.comment_leave);
  document.querySelectorAll('.cf-field label:first-of-type').forEach((el, i) => {
    el.textContent = i % 2 === 0 ? t.comment_name : t.comment_text;
  });
  document.querySelectorAll('input[name=\"auteur\"]').forEach(el => el.placeholder = t.comment_name_ph);
  document.querySelectorAll('textarea[name=\"contenu\"]').forEach(el => el.placeholder = t.comment_text_ph);
  document.querySelectorAll('.btn-comment').forEach(el => el.textContent = t.comment_publish);
  document.querySelectorAll('.no-comments').forEach(el => el.textContent = t.comment_none);
  document.querySelectorAll('.btn-inline-save').forEach(el => el.textContent = t.comment_save);
  document.querySelectorAll('.btn-inline-cancel').forEach(el => el.textContent = t.comment_cancel);

  /* ── helper: set last text node of element (skips child elements like .ico) ── */
  function txNode(el, text) {
    if (!el || !text) return;
    const nodes = el.childNodes;
    for (let i = nodes.length - 1; i >= 0; i--) {
      if (nodes[i].nodeType === 3) { nodes[i].textContent = text; return; }
    }
    el.textContent = text; // fallback
  }
  function txNodeSel(sel, text) { txNode(document.querySelector(sel), text); }
  function txNodeAll(sel, texts) {
    document.querySelectorAll(sel).forEach((el, i) => { if (texts[i]) txNode(el, texts[i]); });
  }
  function txAll(sel, texts) {
    document.querySelectorAll(sel).forEach((el, i) => { if (texts[i]) el.textContent = texts[i]; });
  }
  function txAllSame(sel, text) {
    document.querySelectorAll(sel).forEach(el => { if (text) el.textContent = text; });
  }

  /* ══ CHAPTER 0 — INTRODUCTION ══ */
  txNodeAll('#chapter-0 .btitle', [
    t.c0_b1_title, t.c0_b2_title, t.c0_b3_title, t.c0_b4_title
  ]);
  txAll('#chapter-0 .cblock:nth-child(2) p', [t.c0_p1, t.c0_p2]);
  tx('#chapter-0 .hbox strong', t.c0_hbox_label);
  txNode(document.querySelector('#chapter-0 .hbox'), t.c0_hbox_text);
  txAll('#chapter-0 .ex-card h5', [t.c0_card1_h, t.c0_card2_h, t.c0_card3_h, t.c0_card4_h]);
  txAll('#chapter-0 .ex-card p',  [t.c0_card1_p, t.c0_card2_p, t.c0_card3_p, t.c0_card4_p]);
  tx('#chapter-0 .img-cap', t.c0_img_cap);
  txAll('#chapter-0 .tlbl', [t.c0_task1, t.c0_task2, t.c0_task3]);
  txAll('#chapter-0 .tsub', [t.c0_task1s, t.c0_task2s, t.c0_task3s]);
  txAll('#chapter-0 .quiz-q p', [t.c0_q1, t.c0_q2, t.c0_q3]);

  /* ══ CHAPTER 1 — BUDGET ══ */
  txNodeAll('#chapter-1 .btitle', [
    t.c1_b1_title, t.c1_b2_title, t.c1_b3_title, t.c1_b4_title
  ]);
  tx('#chapter-1 .cblock:nth-child(2) p', t.c1_p1);
  txAll('#chapter-1 .ex-card h5', [t.c1_card1_h, t.c1_card2_h, t.c1_card3_h, t.c1_card4_h]);
  txAll('#chapter-1 .ex-card p',  [t.c1_card1_p, t.c1_card2_p, t.c1_card3_p, t.c1_card4_p]);
  tx('#chapter-1 .img-cap', t.c1_img_cap);
  tx('#chapter-1 .hbox strong', t.c1_hbox_label);
  txNode(document.querySelector('#chapter-1 .hbox'), t.c1_hbox_text);
  const c1ps = document.querySelectorAll('#chapter-1 .cblock:nth-child(5) p');
  if (c1ps[0]) c1ps[0].textContent = t.c1_tip1;
  if (c1ps[1]) c1ps[1].textContent = t.c1_tip2;
  txAll('#chapter-1 .tlbl', [t.c1_task1, t.c1_task2, t.c1_task3]);
  txAll('#chapter-1 .tsub', [t.c1_task1s, t.c1_task2s, t.c1_task3s]);
  txAll('#chapter-1 .quiz-q p', [t.c1_q1, t.c1_q2]);

  /* ══ CHAPTER 2 — ÉPARGNE ══ */
  txNodeAll('#chapter-2 .btitle', [
    t.c2_b1_title, t.c2_b2_title, t.c2_b3_title, t.c2_b4_title
  ]);
  tx('#chapter-2 .cblock:nth-child(2) p', t.c2_p1);
  tx('#chapter-2 .hbox strong', t.c2_hbox_label);
  txNode(document.querySelector('#chapter-2 .hbox'), t.c2_hbox_text);
  txAll('#chapter-2 .ex-card h5', [t.c2_card1_h, t.c2_card2_h, t.c2_card3_h, t.c2_card4_h]);
  txAll('#chapter-2 .ex-card p',  [t.c2_card1_p, t.c2_card2_p, t.c2_card3_p, t.c2_card4_p]);
  tx('#chapter-2 .img-cap', t.c2_img_cap);
  const c2ps = document.querySelectorAll('#chapter-2 .cblock:nth-child(5) p:not(.img-cap)');
  if (c2ps[0]) c2ps[0].textContent = t.c2_compound;
  txAll('#chapter-2 .tlbl', [t.c2_task1, t.c2_task2, t.c2_task3]);
  txAll('#chapter-2 .tsub', [t.c2_task1s, t.c2_task2s, t.c2_task3s]);
  txAll('#chapter-2 .quiz-q p', [t.c2_q1, t.c2_q2]);

  /* ══ CHAPTER 3 — GESTION ══ */
  txNodeAll('#chapter-3 .btitle', [
    t.c3_b1_title, t.c3_b2_title, t.c3_b3_title, t.c3_b4_title
  ]);
  tx('#chapter-3 .cblock:nth-child(2) p', t.c3_p1);
  tx('#chapter-3 .hbox strong', t.c3_hbox_label);
  txNode(document.querySelector('#chapter-3 .hbox'), t.c3_hbox_text);
  txAll('#chapter-3 .ex-card h5', [t.c3_card1_h, t.c3_card2_h, t.c3_card3_h, t.c3_card4_h]);
  txAll('#chapter-3 .ex-card p',  [t.c3_card1_p, t.c3_card2_p, t.c3_card3_p, t.c3_card4_p]);
  tx('#chapter-3 .img-cap', t.c3_img_cap);
  txAll('#chapter-3 .tlbl', [t.c3_task1, t.c3_task2, t.c3_task3]);
  txAll('#chapter-3 .tsub', [t.c3_task1s, t.c3_task2s, t.c3_task3s]);
  txAll('#chapter-3 .quiz-q p', [t.c3_q1, t.c3_q2]);

  /* ══ CHAPTER 4 — INVESTISSEMENT ══ */
  txNodeAll('#chapter-4 .btitle', [
    t.c4_b1_title, t.c4_b2_title, t.c4_b3_title, t.c4_b4_title
  ]);
  tx('#chapter-4 .cblock:nth-child(2) p', t.c4_p1);
  tx('#chapter-4 .hbox strong', t.c4_hbox_label);
  txNode(document.querySelector('#chapter-4 .hbox'), t.c4_hbox_text);
  txAll('#chapter-4 .ex-card h5', [t.c4_card1_h, t.c4_card2_h, t.c4_card3_h, t.c4_card4_h]);
  txAll('#chapter-4 .ex-card p',  [t.c4_card1_p, t.c4_card2_p, t.c4_card3_p, t.c4_card4_p]);
  tx('#chapter-4 .img-cap', t.c4_img_cap);
  const c4ps = document.querySelectorAll('#chapter-4 .cblock:nth-child(5) p:not(.img-cap)');
  if (c4ps[0]) c4ps[0].textContent = t.c4_diversif;
  txAll('#chapter-4 .tlbl', [t.c4_task1, t.c4_task2, t.c4_task3]);
  txAll('#chapter-4 .tsub', [t.c4_task1s, t.c4_task2s, t.c4_task3s]);
  txAll('#chapter-4 .quiz-q p', [t.c4_q1, t.c4_q2, t.c4_q3]);

  /* ══ FINAL QUIZ questions ══ */
  txAll('.fq-q-num',  [t.fq_q1_num,t.fq_q2_num,t.fq_q3_num,t.fq_q4_num,t.fq_q5_num,t.fq_q6_num,t.fq_q7_num,t.fq_q8_num,t.fq_q9_num,t.fq_q10_num]);
  txAll('.fq-q-text', [t.fq_q1_text,t.fq_q2_text,t.fq_q3_text,t.fq_q4_text,t.fq_q5_text,t.fq_q6_text,t.fq_q7_text,t.fq_q8_text,t.fq_q9_text,t.fq_q10_text]);
}
</script>
<script>
// Load notification unread count into the badge inside the cours sub-nav
fetch('/notifications/unread-count')
    .then(r => r.json())
    .then(data => {
        const badge = document.getElementById('notif-badge');
        if (badge && data.count > 0) {
            badge.textContent = data.count;
            badge.style.display = 'inline-flex';
        }
    })
    .catch(() => {});
</script>
{% endblock %}
", "client/cours/index.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\client\\cours\\index.html.twig");
    }
}
