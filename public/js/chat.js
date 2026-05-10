/**
 * chat.js — Logique frontend du chatbot DINARI
 * 
 * Fonctionnalités :
 *  - Envoi de message via fetch() (AJAX)
 *  - Affichage en temps réel avec animations
 *  - Indicateur de frappe du bot
 *  - Carte de réclamation enrichie
 *  - Auto-resize textarea
 *  - Scroll automatique
 *  - Compteur de caractères
 *  - Envoi via Entrée (Shift+Entrée = saut de ligne)
 */

(function () {
    'use strict';

    // ── Références DOM ────────────────────────────────────────────────────
    const form            = document.getElementById('chatForm');
    const input           = document.getElementById('userInput');
    const sendBtn         = document.getElementById('sendBtn');
    const messagesEl      = document.getElementById('chatMessages');
    const typingIndicator = document.getElementById('typingIndicator');
    const charCountEl     = document.getElementById('charCount');
    const welcomeMsg      = document.getElementById('welcomeMsg');

    // ── Config ────────────────────────────────────────────────────────────
    const SEND_URL     = window.CHAT_SEND_URL || '/chat/send';
    const MAX_CHARS    = 2000;
    const USER_INITIALS = window.USER_INITIALS || 'U';

    // ── Init ──────────────────────────────────────────────────────────────
    input.addEventListener('input', onInputChange);
    input.addEventListener('keydown', onKeyDown);
    form.addEventListener('submit', handleSend);

    // ── Gestion de la saisie ──────────────────────────────────────────────

    function onInputChange() {
        const len = input.value.length;

        // Compteur de caractères
        charCountEl.textContent = `${len} / ${MAX_CHARS}`;
        charCountEl.className   = 'char-count';
        if (len > 1800) charCountEl.classList.add('danger');
        else if (len > 1400) charCountEl.classList.add('warn');

        // Activer / désactiver le bouton
        sendBtn.disabled = len === 0;

        // Auto-resize textarea
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 150) + 'px';
    }

    function onKeyDown(e) {
        // Entrée seule = envoyer ; Shift+Entrée = nouvelle ligne
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            if (!sendBtn.disabled) handleSend();
        }
    }

    // ── Envoi du message ──────────────────────────────────────────────────

    async function handleSend() {
        const message = input.value.trim();
        if (!message) return;

        // Masquer le message de bienvenue à la première interaction
        if (welcomeMsg) welcomeMsg.style.display = 'none';

        // Afficher le message de l'utilisateur
        appendMessage('user', message);

        // Réinitialiser le champ
        input.value       = '';
        input.style.height = 'auto';
        charCountEl.textContent = '0 / ' + MAX_CHARS;
        charCountEl.className   = 'char-count';
        sendBtn.disabled  = true;

        // Afficher l'indicateur de frappe
        showTyping();

        try {
            const response = await fetch(SEND_URL, {
                method:  'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ message }),
            });

            const data = await response.json();

            hideTyping();

            if (data.success) {
                // Si data.data existe et est un tableau, c'est le format Admin avec plusieurs réclamations
                if (data.data && Array.isArray(data.data)) {
                    // On passe le tableau en 3ème paramètre pour construire plusieurs cartes
                    appendMessage('bot', data.botMessage, data.data);
                } else {
                    // Chatbot IA normal
                    appendMessage('bot', data.botMessage, data.reclamation);
                }
            } else {
                appendMessage('bot', data.botMessage || '⚠️ Une erreur est survenue.', null, true);
            }

        } catch (error) {
            hideTyping();
            console.error('[Chat] Erreur réseau :', error);
            appendMessage(
                'bot',
                '❌ Impossible de contacter le serveur. Vérifiez votre connexion et réessayez.',
                null,
                true
            );
        }

        // Remettre le focus sur l'input
        input.focus();
    }

    // ── Affichage des messages ────────────────────────────────────────────

    /**
     * Ajoute un message dans la zone de chat.
     *
     * @param {string}      sender           'user' | 'bot'
     * @param {string}      text             Contenu textuel
     * @param {object|array|null} reclamations Données de réclamation ou tableau de réclamations
     * @param {boolean}     isError          Style d'erreur
     */
    function appendMessage(sender, text, reclamations = null, isError = false) {
        const isUser = sender === 'user';

        const row = document.createElement('div');
        row.className = 'msg-row' + (isUser ? ' user-row' : '');

        // Avatar
        const avatar = document.createElement('div');
        avatar.className = 'msg-avatar ' + (isUser ? 'avatar-user' : 'avatar-bot');
        avatar.textContent = isUser ? USER_INITIALS : '🤖';

        // Zone contenu
        const content = document.createElement('div');
        content.className = 'msg-content';

        // Bulle principale
        const bubble = document.createElement('div');
        bubble.className = 'msg-bubble';

        if (isError) {
            bubble.style.border = '1px solid rgba(239,68,68,0.4)';
            bubble.style.background = 'rgba(239,68,68,0.08)';
        }

        // Convertir le texte markdown simple en HTML léger
        bubble.innerHTML = formatText(text);
        content.appendChild(bubble);

        // Carte(s) de réclamation (uniquement pour le bot)
        if (!isUser && reclamations) {
            if (Array.isArray(reclamations)) {
                // Mode Admin : Tableau de réclamations
                reclamations.forEach(rec => {
                    content.appendChild(buildReclamationCard(rec, false));
                });
            } else {
                // Mode User : Une seule réclamation (vient d'être créée)
                content.appendChild(buildReclamationCard(reclamations, true));
            }
        }

        // Horodatage
        const time = document.createElement('div');
        time.className = 'msg-time';
        time.textContent = formatTime(new Date());
        content.appendChild(time);

        // Assembler la ligne
        row.appendChild(avatar);
        row.appendChild(content);

        // Insérer avant l'indicateur de frappe
        messagesEl.insertBefore(row, typingIndicator);

        scrollToBottom();
    }

    /**
     * Construit la carte affichant les détails d'une réclamation.
     */
    function buildReclamationCard(rec, isNew = false) {
        const card = document.createElement('div');
        card.className = 'reclamation-card';
        
        // Rendre la carte cliquable si elle possède un ID
        if (rec.id) {
            card.style.cursor = 'pointer';
            card.style.transition = 'transform 0.2s, box-shadow 0.2s';
            card.onmouseover = () => { card.style.transform = 'translateY(-2px)'; card.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)'; };
            card.onmouseout = () => { card.style.transform = 'none'; card.style.boxShadow = 'none'; };
            card.onclick = () => {
                window.open('/reclamations/' + rec.id + '/show', '_blank');
            };
        }

        const typeClass     = 'badge-type badge-' + (rec.type || 'Technique');
        let prioriteSanitized = rec.priorite || 'Moyenne';
        if (prioriteSanitized !== 'Élevée' && prioriteSanitized !== 'Faible' && prioriteSanitized !== 'Moyenne') prioriteSanitized = 'Moyenne';
        const prioriteClass = 'badge-priorite badge-' + prioriteSanitized;
        
        const titleText = isNew ? '✅ Réclamation enregistrée' : '📄 Détail réclamation';

        let dateHtml = '';
        if (rec.date) {
            dateHtml = `
            <div class="rc-row">
                <span class="rc-label">Date</span>
                <span class="rc-val">${esc(rec.date)}</span>
            </div>`;
        }
        
        let statutHtml = '';
        if (rec.statut) {
            statutHtml = `
            <div class="rc-row">
                <span class="rc-label">Statut</span>
                <span class="rc-val">${esc(rec.statut)}</span>
            </div>`;
        }

        card.innerHTML = `
            <div class="rc-title">${titleText}</div>
            <div class="rc-row">
                <span class="rc-label">Type</span>
                <span class="rc-val"><span class="${typeClass}">${esc(rec.type)}</span></span>
            </div>
            <div class="rc-row">
                <span class="rc-label">Priorité</span>
                <span class="rc-val"><span class="${prioriteClass}">${esc(rec.priorite)}</span></span>
            </div>
            ${statutHtml}
            ${dateHtml}
            <div class="rc-row" style="margin-top: 6px;">
                <span class="rc-label">Résumé</span>
                <span class="rc-val">${esc(rec.description)}</span>
            </div>
        `;
        return card;
    }

    // ── Indicateur de frappe ──────────────────────────────────────────────

    function showTyping() {
        typingIndicator.style.display = 'flex';
        scrollToBottom();
    }

    function hideTyping() {
        typingIndicator.style.display = 'none';
    }

    // ── Utilitaires ───────────────────────────────────────────────────────

    /** Formate l'heure courante HH:MM */
    function formatTime(date) {
        return date.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
    }

    /** Convertit **bold** et \n en HTML */
    function formatText(text) {
        return text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\n/g, '<br>');
    }

    /** Échappe les caractères HTML dangereux */
    function esc(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    /** Scroll automatique vers le bas du chat */
    function scrollToBottom() {
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    // ── Hint chips (suggestions rapides) ────────────────────────────────

    window.useHint = function (btn) {
        // Prend le texte du chip sans l'émoji
        const text = btn.textContent.replace(/^[\u{1F300}-\u{1FFFF}] /u, '').trim();
        input.value = text;
        input.dispatchEvent(new Event('input'));
        input.focus();
    };

    // Init scroll
    scrollToBottom();

})();
