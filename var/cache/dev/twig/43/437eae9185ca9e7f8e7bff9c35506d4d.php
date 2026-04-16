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

/* chatbot/_widget.html.twig */
class __TwigTemplate_ef05bf62d05a5c3e67e565eae7ce022b extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "chatbot/_widget.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "chatbot/_widget.html.twig"));

        // line 2
        yield "<style>
    /* ── Chatbot FAB ── */
    #dinari-chat-fab {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 9999;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 18px rgba(26,111,196,0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    #dinari-chat-fab:hover {
        transform: scale(1.08);
        box-shadow: 0 6px 24px rgba(26,111,196,0.55);
    }
    #dinari-chat-fab .chat-badge {
        position: absolute;
        top: -2px;
        right: -2px;
        width: 14px;
        height: 14px;
        background: #e74c3c;
        border-radius: 50%;
        border: 2px solid #fff;
        display: none;
    }
    #dinari-chat-fab.has-unread .chat-badge { display: block; }

    /* ── Chat Window ── */
    #dinari-chat-window {
        position: fixed;
        bottom: 96px;
        right: 28px;
        z-index: 9998;
        width: 360px;
        max-width: calc(100vw - 40px);
        height: 480px;
        max-height: calc(100vh - 120px);
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 48px rgba(0,0,0,0.18);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transform: scale(0.92) translateY(16px);
        opacity: 0;
        pointer-events: none;
        transition: transform 0.22s cubic-bezier(.34,1.56,.64,1), opacity 0.18s ease;
    }
    #dinari-chat-window.open {
        transform: scale(1) translateY(0);
        opacity: 1;
        pointer-events: all;
    }

    /* Header */
    .dchat-header {
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }
    .dchat-avatar {
        width: 36px;
        height: 36px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .dchat-header-info { flex: 1; }
    .dchat-header-info strong { display: block; font-size: 14px; font-weight: 700; }
    .dchat-header-info span { font-size: 11px; opacity: 0.8; }
    .dchat-close {
        background: none;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        opacity: 0.8;
        line-height: 1;
        padding: 0 2px;
        transition: opacity 0.15s;
    }
    .dchat-close:hover { opacity: 1; }

    /* Messages area */
    .dchat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 14px 14px 8px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        scroll-behavior: smooth;
    }
    .dchat-messages::-webkit-scrollbar { width: 4px; }
    .dchat-messages::-webkit-scrollbar-thumb { background: #dde3ea; border-radius: 4px; }

    /* Bubbles */
    .dchat-bubble {
        max-width: 85%;
        padding: 9px 13px;
        border-radius: 14px;
        font-size: 13px;
        line-height: 1.55;
        word-break: break-word;
        white-space: pre-wrap;
    }
    .dchat-bubble.bot {
        background: #f0f4f8;
        color: #2c3e50;
        align-self: flex-start;
        border-bottom-left-radius: 4px;
    }
    .dchat-bubble.user {
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        align-self: flex-end;
        border-bottom-right-radius: 4px;
    }
    .dchat-bubble.typing {
        background: #f0f4f8;
        align-self: flex-start;
        padding: 12px 16px;
    }
    .dchat-typing-dots { display: flex; gap: 4px; align-items: center; }
    .dchat-typing-dots span {
        width: 7px; height: 7px;
        background: #94a3b8;
        border-radius: 50%;
        animation: dchatDot 1.2s infinite;
    }
    .dchat-typing-dots span:nth-child(2) { animation-delay: 0.2s; }
    .dchat-typing-dots span:nth-child(3) { animation-delay: 0.4s; }
    @keyframes dchatDot {
        0%, 80%, 100% { transform: scale(0.7); opacity: 0.5; }
        40% { transform: scale(1); opacity: 1; }
    }

    /* Quick suggestions */
    .dchat-suggestions {
        padding: 6px 14px 4px;
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        flex-shrink: 0;
    }
    .dchat-suggestion-btn {
        background: #f0f4f8;
        border: 1px solid #dde3ea;
        border-radius: 20px;
        padding: 5px 11px;
        font-size: 11.5px;
        color: #2c3e50;
        cursor: pointer;
        transition: all 0.15s;
        font-family: inherit;
        white-space: nowrap;
    }
    .dchat-suggestion-btn:hover {
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        border-color: var(--dinari-blue, #1a6fc4);
    }

    /* Input area */
    .dchat-input-area {
        padding: 10px 12px 12px;
        border-top: 1px solid #eef1f5;
        display: flex;
        gap: 8px;
        align-items: flex-end;
        flex-shrink: 0;
    }
    #dchat-input {
        flex: 1;
        border: 1.5px solid #dde3ea;
        border-radius: 22px;
        padding: 9px 14px;
        font-size: 13px;
        font-family: inherit;
        resize: none;
        outline: none;
        max-height: 80px;
        line-height: 1.4;
        transition: border-color 0.15s;
        color: #2c3e50;
    }
    #dchat-input:focus { border-color: var(--dinari-blue, #1a6fc4); }
    #dchat-send {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        transition: background 0.15s, transform 0.15s;
    }
    #dchat-send:hover { background: #1558a0; transform: scale(1.05); }
    #dchat-send:disabled { background: #b0bec5; cursor: not-allowed; transform: none; }
</style>

";
        // line 228
        yield "<button id=\"dinari-chat-fab\" aria-label=\"Ouvrir l'assistant Dinari\" title=\"Assistant Dinari\">
    <span class=\"chat-icon\">💬</span>
    <span class=\"chat-badge\"></span>
</button>

";
        // line 234
        yield "<div id=\"dinari-chat-window\" role=\"dialog\" aria-label=\"Assistant Dinari\" aria-modal=\"true\">
    <div class=\"dchat-header\">
        <div class=\"dchat-avatar\">🤖</div>
        <div class=\"dchat-header-info\">
            <strong>Assistant Dinari</strong>
            <span>Spécialiste fintech &amp; cours</span>
        </div>
        <button class=\"dchat-close\" id=\"dchat-close-btn\" aria-label=\"Fermer\">✕</button>
    </div>

    <div class=\"dchat-messages\" id=\"dchat-messages\" aria-live=\"polite\"></div>

    <div class=\"dchat-suggestions\" id=\"dchat-suggestions\">
        <button class=\"dchat-suggestion-btn\" data-msg=\"Quels cours sont disponibles ?\">📚 Cours</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Comment fonctionne un quiz ?\">🧠 Quiz</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Explique-moi le budget\">💰 Budget</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Qu'est-ce que l'épargne ?\">🏦 Épargne</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Par où commencer ?\">🎯 Débuter</button>
    </div>

    <div class=\"dchat-input-area\">
        <textarea id=\"dchat-input\" placeholder=\"Posez votre question...\" rows=\"1\" maxlength=\"500\" aria-label=\"Message\"></textarea>
        <button id=\"dchat-send\" aria-label=\"Envoyer\">➤</button>
    </div>
</div>

<script>
(function () {
    const fab      = document.getElementById('dinari-chat-fab');
    const win      = document.getElementById('dinari-chat-window');
    const closeBtn = document.getElementById('dchat-close-btn');
    const messages = document.getElementById('dchat-messages');
    const input    = document.getElementById('dchat-input');
    const sendBtn  = document.getElementById('dchat-send');
    const suggs    = document.getElementById('dchat-suggestions');
    const API_URL  = '";
        // line 269
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_chatbot_message");
        yield "';

    let isOpen    = false;
    let isWaiting = false;
    let greeted   = false;

    function toggleChat() {
        isOpen = !isOpen;
        win.classList.toggle('open', isOpen);
        fab.querySelector('.chat-icon').textContent = isOpen ? '✕' : '💬';
        fab.classList.remove('has-unread');
        if (isOpen && !greeted) {
            greeted = true;
            addBotMessage(\"Bonjour ! 👋 Je suis l'assistant Dinari, spécialisé dans nos cours fintech et les concepts financiers. Comment puis-je vous aider ?\");
        }
        if (isOpen) {
            setTimeout(() => input.focus(), 200);
        }
    }

    function addBotMessage(html) {
        const bubble = document.createElement('div');
        bubble.className = 'dchat-bubble bot';
        bubble.innerHTML = html.replace(/\\n/g, '<br>');
        messages.appendChild(bubble);
        scrollBottom();
    }

    function addUserMessage(text) {
        const bubble = document.createElement('div');
        bubble.className = 'dchat-bubble user';
        bubble.textContent = text;
        messages.appendChild(bubble);
        scrollBottom();
    }

    function showTyping() {
        const el = document.createElement('div');
        el.className = 'dchat-bubble typing';
        el.id = 'dchat-typing';
        el.innerHTML = '<div class=\"dchat-typing-dots\"><span></span><span></span><span></span></div>';
        messages.appendChild(el);
        scrollBottom();
        return el;
    }

    function removeTyping() {
        const el = document.getElementById('dchat-typing');
        if (el) el.remove();
    }

    function scrollBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    async function sendMessage(text) {
        text = text.trim();
        if (!text || isWaiting) return;

        addUserMessage(text);
        input.value = '';
        input.style.height = 'auto';
        suggs.style.display = 'none';
        isWaiting = true;
        sendBtn.disabled = true;

        const typing = showTyping();

        try {
            const res = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text }),
            });
            const data = await res.json();
            removeTyping();
            addBotMessage(data.reply || \"Désolé, je n'ai pas pu traiter votre demande.\");
        } catch (e) {
            removeTyping();
            addBotMessage(\"Une erreur s'est produite. Veuillez réessayer.\");
        } finally {
            isWaiting = false;
            sendBtn.disabled = false;
            input.focus();
        }
    }

    // Events
    fab.addEventListener('click', toggleChat);
    closeBtn.addEventListener('click', toggleChat);

    sendBtn.addEventListener('click', () => sendMessage(input.value));

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(input.value);
        }
    });

    // Auto-resize textarea
    input.addEventListener('input', () => {
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 80) + 'px';
    });

    // Quick suggestion buttons
    suggs.querySelectorAll('.dchat-suggestion-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (!isOpen) toggleChat();
            sendMessage(btn.dataset.msg);
        });
    });

    // Show unread badge after 3s if chat not opened
    setTimeout(() => {
        if (!isOpen) fab.classList.add('has-unread');
    }, 3000);

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen) toggleChat();
    });
})();
</script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "chatbot/_widget.html.twig";
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
        return array (  319 => 269,  282 => 234,  275 => 228,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Dinari Chatbot Widget — injected into base.html.twig, standalone, no existing code touched #}
<style>
    /* ── Chatbot FAB ── */
    #dinari-chat-fab {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 9999;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 18px rgba(26,111,196,0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    #dinari-chat-fab:hover {
        transform: scale(1.08);
        box-shadow: 0 6px 24px rgba(26,111,196,0.55);
    }
    #dinari-chat-fab .chat-badge {
        position: absolute;
        top: -2px;
        right: -2px;
        width: 14px;
        height: 14px;
        background: #e74c3c;
        border-radius: 50%;
        border: 2px solid #fff;
        display: none;
    }
    #dinari-chat-fab.has-unread .chat-badge { display: block; }

    /* ── Chat Window ── */
    #dinari-chat-window {
        position: fixed;
        bottom: 96px;
        right: 28px;
        z-index: 9998;
        width: 360px;
        max-width: calc(100vw - 40px);
        height: 480px;
        max-height: calc(100vh - 120px);
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 48px rgba(0,0,0,0.18);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transform: scale(0.92) translateY(16px);
        opacity: 0;
        pointer-events: none;
        transition: transform 0.22s cubic-bezier(.34,1.56,.64,1), opacity 0.18s ease;
    }
    #dinari-chat-window.open {
        transform: scale(1) translateY(0);
        opacity: 1;
        pointer-events: all;
    }

    /* Header */
    .dchat-header {
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }
    .dchat-avatar {
        width: 36px;
        height: 36px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .dchat-header-info { flex: 1; }
    .dchat-header-info strong { display: block; font-size: 14px; font-weight: 700; }
    .dchat-header-info span { font-size: 11px; opacity: 0.8; }
    .dchat-close {
        background: none;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        opacity: 0.8;
        line-height: 1;
        padding: 0 2px;
        transition: opacity 0.15s;
    }
    .dchat-close:hover { opacity: 1; }

    /* Messages area */
    .dchat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 14px 14px 8px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        scroll-behavior: smooth;
    }
    .dchat-messages::-webkit-scrollbar { width: 4px; }
    .dchat-messages::-webkit-scrollbar-thumb { background: #dde3ea; border-radius: 4px; }

    /* Bubbles */
    .dchat-bubble {
        max-width: 85%;
        padding: 9px 13px;
        border-radius: 14px;
        font-size: 13px;
        line-height: 1.55;
        word-break: break-word;
        white-space: pre-wrap;
    }
    .dchat-bubble.bot {
        background: #f0f4f8;
        color: #2c3e50;
        align-self: flex-start;
        border-bottom-left-radius: 4px;
    }
    .dchat-bubble.user {
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        align-self: flex-end;
        border-bottom-right-radius: 4px;
    }
    .dchat-bubble.typing {
        background: #f0f4f8;
        align-self: flex-start;
        padding: 12px 16px;
    }
    .dchat-typing-dots { display: flex; gap: 4px; align-items: center; }
    .dchat-typing-dots span {
        width: 7px; height: 7px;
        background: #94a3b8;
        border-radius: 50%;
        animation: dchatDot 1.2s infinite;
    }
    .dchat-typing-dots span:nth-child(2) { animation-delay: 0.2s; }
    .dchat-typing-dots span:nth-child(3) { animation-delay: 0.4s; }
    @keyframes dchatDot {
        0%, 80%, 100% { transform: scale(0.7); opacity: 0.5; }
        40% { transform: scale(1); opacity: 1; }
    }

    /* Quick suggestions */
    .dchat-suggestions {
        padding: 6px 14px 4px;
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        flex-shrink: 0;
    }
    .dchat-suggestion-btn {
        background: #f0f4f8;
        border: 1px solid #dde3ea;
        border-radius: 20px;
        padding: 5px 11px;
        font-size: 11.5px;
        color: #2c3e50;
        cursor: pointer;
        transition: all 0.15s;
        font-family: inherit;
        white-space: nowrap;
    }
    .dchat-suggestion-btn:hover {
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        border-color: var(--dinari-blue, #1a6fc4);
    }

    /* Input area */
    .dchat-input-area {
        padding: 10px 12px 12px;
        border-top: 1px solid #eef1f5;
        display: flex;
        gap: 8px;
        align-items: flex-end;
        flex-shrink: 0;
    }
    #dchat-input {
        flex: 1;
        border: 1.5px solid #dde3ea;
        border-radius: 22px;
        padding: 9px 14px;
        font-size: 13px;
        font-family: inherit;
        resize: none;
        outline: none;
        max-height: 80px;
        line-height: 1.4;
        transition: border-color 0.15s;
        color: #2c3e50;
    }
    #dchat-input:focus { border-color: var(--dinari-blue, #1a6fc4); }
    #dchat-send {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--dinari-blue, #1a6fc4);
        color: #fff;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        transition: background 0.15s, transform 0.15s;
    }
    #dchat-send:hover { background: #1558a0; transform: scale(1.05); }
    #dchat-send:disabled { background: #b0bec5; cursor: not-allowed; transform: none; }
</style>

{# FAB Button #}
<button id=\"dinari-chat-fab\" aria-label=\"Ouvrir l'assistant Dinari\" title=\"Assistant Dinari\">
    <span class=\"chat-icon\">💬</span>
    <span class=\"chat-badge\"></span>
</button>

{# Chat Window #}
<div id=\"dinari-chat-window\" role=\"dialog\" aria-label=\"Assistant Dinari\" aria-modal=\"true\">
    <div class=\"dchat-header\">
        <div class=\"dchat-avatar\">🤖</div>
        <div class=\"dchat-header-info\">
            <strong>Assistant Dinari</strong>
            <span>Spécialiste fintech &amp; cours</span>
        </div>
        <button class=\"dchat-close\" id=\"dchat-close-btn\" aria-label=\"Fermer\">✕</button>
    </div>

    <div class=\"dchat-messages\" id=\"dchat-messages\" aria-live=\"polite\"></div>

    <div class=\"dchat-suggestions\" id=\"dchat-suggestions\">
        <button class=\"dchat-suggestion-btn\" data-msg=\"Quels cours sont disponibles ?\">📚 Cours</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Comment fonctionne un quiz ?\">🧠 Quiz</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Explique-moi le budget\">💰 Budget</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Qu'est-ce que l'épargne ?\">🏦 Épargne</button>
        <button class=\"dchat-suggestion-btn\" data-msg=\"Par où commencer ?\">🎯 Débuter</button>
    </div>

    <div class=\"dchat-input-area\">
        <textarea id=\"dchat-input\" placeholder=\"Posez votre question...\" rows=\"1\" maxlength=\"500\" aria-label=\"Message\"></textarea>
        <button id=\"dchat-send\" aria-label=\"Envoyer\">➤</button>
    </div>
</div>

<script>
(function () {
    const fab      = document.getElementById('dinari-chat-fab');
    const win      = document.getElementById('dinari-chat-window');
    const closeBtn = document.getElementById('dchat-close-btn');
    const messages = document.getElementById('dchat-messages');
    const input    = document.getElementById('dchat-input');
    const sendBtn  = document.getElementById('dchat-send');
    const suggs    = document.getElementById('dchat-suggestions');
    const API_URL  = '{{ path('app_chatbot_message') }}';

    let isOpen    = false;
    let isWaiting = false;
    let greeted   = false;

    function toggleChat() {
        isOpen = !isOpen;
        win.classList.toggle('open', isOpen);
        fab.querySelector('.chat-icon').textContent = isOpen ? '✕' : '💬';
        fab.classList.remove('has-unread');
        if (isOpen && !greeted) {
            greeted = true;
            addBotMessage(\"Bonjour ! 👋 Je suis l'assistant Dinari, spécialisé dans nos cours fintech et les concepts financiers. Comment puis-je vous aider ?\");
        }
        if (isOpen) {
            setTimeout(() => input.focus(), 200);
        }
    }

    function addBotMessage(html) {
        const bubble = document.createElement('div');
        bubble.className = 'dchat-bubble bot';
        bubble.innerHTML = html.replace(/\\n/g, '<br>');
        messages.appendChild(bubble);
        scrollBottom();
    }

    function addUserMessage(text) {
        const bubble = document.createElement('div');
        bubble.className = 'dchat-bubble user';
        bubble.textContent = text;
        messages.appendChild(bubble);
        scrollBottom();
    }

    function showTyping() {
        const el = document.createElement('div');
        el.className = 'dchat-bubble typing';
        el.id = 'dchat-typing';
        el.innerHTML = '<div class=\"dchat-typing-dots\"><span></span><span></span><span></span></div>';
        messages.appendChild(el);
        scrollBottom();
        return el;
    }

    function removeTyping() {
        const el = document.getElementById('dchat-typing');
        if (el) el.remove();
    }

    function scrollBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    async function sendMessage(text) {
        text = text.trim();
        if (!text || isWaiting) return;

        addUserMessage(text);
        input.value = '';
        input.style.height = 'auto';
        suggs.style.display = 'none';
        isWaiting = true;
        sendBtn.disabled = true;

        const typing = showTyping();

        try {
            const res = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text }),
            });
            const data = await res.json();
            removeTyping();
            addBotMessage(data.reply || \"Désolé, je n'ai pas pu traiter votre demande.\");
        } catch (e) {
            removeTyping();
            addBotMessage(\"Une erreur s'est produite. Veuillez réessayer.\");
        } finally {
            isWaiting = false;
            sendBtn.disabled = false;
            input.focus();
        }
    }

    // Events
    fab.addEventListener('click', toggleChat);
    closeBtn.addEventListener('click', toggleChat);

    sendBtn.addEventListener('click', () => sendMessage(input.value));

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(input.value);
        }
    });

    // Auto-resize textarea
    input.addEventListener('input', () => {
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 80) + 'px';
    });

    // Quick suggestion buttons
    suggs.querySelectorAll('.dchat-suggestion-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (!isOpen) toggleChat();
            sendMessage(btn.dataset.msg);
        });
    });

    // Show unread badge after 3s if chat not opened
    setTimeout(() => {
        if (!isOpen) fab.classList.add('has-unread');
    }, 3000);

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen) toggleChat();
    });
})();
</script>
", "chatbot/_widget.html.twig", "C:\\PI-DEV-WEB\\Dinari\\templates\\chatbot\\_widget.html.twig");
    }
}
