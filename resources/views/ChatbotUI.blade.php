@if (!isset($__csrfTokenSet))
    @php $__csrfTokenSet = true; @endphp
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endif

<button id="openChatButton"
    class="fixed bottom-5 right-5 bg-orange-500 text-white p-4 rounded-full shadow-lg hover:bg-orange-600 transition-all z-50 transform">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-300" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
</button>

<div id="chatWindow"
    class="fixed bottom-20 right-5 w-[420px] h-[550px] bg-white rounded-2xl shadow-2xl flex flex-col z-50 transition-all duration-300 ease-in-out transform scale-0 origin-bottom-right opacity-0 hidden">


    <div class="flex items-center justify-between px-4 py-3 bg-orange-500 rounded-t-2xl shadow-sm">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-white flex items-center justify-center shadow-md">
                <img src="/assets/images/logo-icon.svg" alt="AI" class="w-6 h-6 object-contain">
            </div>

            <div class="flex flex-col leading-tight">
                <span class="text-white font-semibold text-base">Assistant AI</span>

                <span class="text-white text-xs opacity-90 flex items-center gap-1">
                    Online
                    <span class="relative flex items-center justify-center h-3 w-3 translate-y-[1px]">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    Siap membantu
                </span>
            </div>
        </div>

        <button id="closeChatButton" class="text-white hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>



    <div id="chatMessages" class="flex-grow overflow-y-auto p-3 space-y-3 custom-scrollbar bg-white relative">
    </div>

    <button id="scrollToBottomBtn"
        class="hidden absolute bottom-2 right-2 bg-orange-500 text-white p-2 rounded-full shadow-lg hover:bg-orange-600 hover:scale-110 transition-all duration-300 z-10 scroll-btn-pulse opacity-0"
        style="margin-bottom: 60px;">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </button>

    <form id="chatForm" class="p-3 border-t border-gray-200 bg-gray-50 rounded-b-lg">
        <div class="relative flex items-center">
            <textarea id="chatInput" placeholder="Ketik pesan..." rows="1"
                class="w-full pl-3 pr-12 py-2 rounded-full bg-white text-black text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 placeholder-gray-400 resize-none overflow-hidden border border-gray-300"
                style="min-height: 40px;"></textarea>

            <button id="sendBtn" type="submit"
                class="absolute right-2 flex items-center justify-center w-8 h-8 rounded-full bg-orange-500 text-white hover:bg-white hover:text-orange-500 border border-orange-500 transition-all duration-300 shadow-md">
                <i class="fas fa-paper-plane text-sm"></i>
            </button>
        </div>
        <div id="chatbot-error" class="text-red-500 text-xs mt-1 ml-3 flex items-center" style="display:none;">
            <i class="fas fa-times-circle mr-1"></i>
            <span id="error-text"></span>
        </div>
    </form>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sendRoute = "{{ route('chatbot.send') }}";

            function getCsrfToken() {
                const metaTag = document.querySelector('meta[name="csrf-token"]');
                if (metaTag) {
                    return metaTag.getAttribute('content');
                }
                if (typeof Laravel !== 'undefined' && Laravel.csrfToken) {
                    return Laravel.csrfToken;
                }
                const cookies = document.cookie.split(';');
                for (let cookie of cookies) {
                    const [name, value] = cookie.trim().split('=');
                    if (name === 'XSRF-TOKEN') {
                        return decodeURIComponent(value);
                    }
                }

                console.error('CSRF Token tidak ditemukan!');
                return '';
            }

            const openChatButton = document.getElementById('openChatButton');
            const chatWindow = document.getElementById('chatWindow');
            const closeChatButton = document.getElementById('closeChatButton');
            const clearChatButton = document.getElementById('clearChatButton');
            const chatForm = document.getElementById('chatForm');
            const userInput = document.getElementById('chatInput');
            const chatMessages = document.getElementById('chatMessages');
            const sendBtn = document.getElementById('sendBtn');
            const errorDiv = document.getElementById('chatbot-error');
            const errorText = document.getElementById('error-text');

            let isSending = false;
            let userScrolledUp = false;
            let scrollDebounceTimer = null;
            const scrollToBottomBtn = document.getElementById('scrollToBottomBtn');

            chatMessages.addEventListener('scroll', () => {
                if (scrollDebounceTimer) {
                    clearTimeout(scrollDebounceTimer);
                }
                scrollDebounceTimer = setTimeout(() => {
                    const scrollTop = chatMessages.scrollTop;
                    const scrollHeight = chatMessages.scrollHeight;
                    const clientHeight = chatMessages.clientHeight;
                    const isAtBottom = (scrollHeight - scrollTop - clientHeight) < 100;
                    const wasScrolledUp = userScrolledUp;
                    userScrolledUp = !isAtBottom;
                    if (userScrolledUp && !wasScrolledUp) {
                        console.log('👆 User scrolled up - auto-scroll disabled');
                        scrollToBottomBtn.classList.remove('hidden');
                        setTimeout(() => {
                            scrollToBottomBtn.classList.remove('opacity-0');
                            scrollToBottomBtn.classList.add('opacity-100');
                        }, 10);
                    } else if (!userScrolledUp && wasScrolledUp) {
                        console.log('👇 User at bottom - auto-scroll enabled');
                        scrollToBottomBtn.classList.remove('opacity-100');
                        scrollToBottomBtn.classList.add('opacity-0');
                        setTimeout(() => {
                            scrollToBottomBtn.classList.add('hidden');
                        }, 300);
                    }
                }, 150);
            });

            scrollToBottomBtn.addEventListener('click', () => {
                userScrolledUp = false;
                scrollToBottom(true);
                scrollToBottomBtn.classList.remove('opacity-100');
                scrollToBottomBtn.classList.add('opacity-0');
                setTimeout(() => {
                    scrollToBottomBtn.classList.add('hidden');
                }, 300);
            });

            function scrollToBottom(force = false) {
                if (force || !userScrolledUp) {
                    setTimeout(() => {
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                        userScrolledUp = false;
                        if (!scrollToBottomBtn.classList.contains('hidden')) {
                            scrollToBottomBtn.classList.remove('opacity-100');
                            scrollToBottomBtn.classList.add('opacity-0');
                            setTimeout(() => {
                                scrollToBottomBtn.classList.add('hidden');
                            }, 300);
                        }
                    }, 50);
                }
            }

            function adjustTextareaHeight(textarea) {
                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';
                sendBtn.disabled = textarea.value.trim() === '';
            }

            function createMessageElement(text, isUser, type = 'normal') {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('flex', 'items-end', 'mb-2', 'space-x-2');

                const profileDiv = document.createElement('div');
                profileDiv.classList.add('w-8', 'h-8', 'flex-shrink-0', 'rounded-full', 'flex', 'items-center',
                    'justify-center');

                if (isUser) {
                    profileDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" class="w-6 h-6 bg-orange-500 p-1 rounded-full">
                <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4s-4 1.79-4 4 1.79 4 4 4zM4 20c0-2.67 5.33-4 8-4s8 1.33 8 4v1H4v-1z"/>
            </svg>`;
                } else {
                    profileDiv.innerHTML =
                        `
            <img src="/assets/images/logo-icon.svg" alt="AI Assistant" class="w-8 h-8 rounded-full bg-white p-1 object-contain">`;
                }

                const messageBubble = document.createElement('div');
                messageBubble.classList.add('max-w-[80%]', 'px-4', 'py-2', 'rounded-2xl', 'text-sm');

                if (type === 'loading') {
                    messageBubble.innerHTML = `
            <div class="flex space-x-1 items-center">
                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce [animation-delay:-0.3s]"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce [animation-delay:-0.15s]"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
            </div>
        `;
                    messageBubble.classList.add('bg-gray-100', 'text-gray-700');
                } else {
                    messageBubble.textContent = text;
                    if (isUser) {
                        messageDiv.classList.add('justify-end');
                        messageBubble.classList.add('bg-orange-500', 'text-white');
                    } else {
                        messageBubble.classList.add('bg-white', 'text-gray-800', 'shadow');
                    }
                }
                if (isUser) {
                    messageDiv.appendChild(messageBubble);
                    messageDiv.appendChild(profileDiv);
                } else {
                    messageDiv.appendChild(profileDiv);
                    messageDiv.appendChild(messageBubble);
                }

                chatMessages.appendChild(messageDiv);
                scrollToBottom();
                return messageBubble;
            }

            function showTypingAnimation() {
                const chatContainer = document.getElementById('chatMessages');
                if (!chatContainer) {
                    console.error("Elemen container chat tidak ditemukan!");
                    return;
                }

                const typingDiv = document.createElement('div');
                typingDiv.classList.add('ai-typing', 'flex', 'items-start', 'mb-2', 'space-x-2');

                typingDiv.innerHTML = `
        <img src="/assets/images/logo-icon.svg" alt="AI" class="w-8 h-8 rounded-full bg-orange-500 p-1 flex-shrink-0 object-contain">
        <div class="flex items-center space-x-1 bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]">
            <span class="dot dot1 bg-gray-500 w-2 h-2 rounded-full animate-bounce"></span>
            <span class="dot dot2 bg-gray-500 w-2 h-2 rounded-full animate-bounce [animation-delay:0.15s]"></span>
            <span class="dot dot3 bg-gray-500 w-2 h-2 rounded-full animate-bounce [animation-delay:0.3s]"></span>
        </div>
    `;

                chatContainer.appendChild(typingDiv);
                scrollToBottom();

                return typingDiv;
            }


            function removeTypingAnimation() {
                const typing = document.querySelector('.ai-typing');
                if (typing) typing.remove();
            }


            function displayAiReply(reply, navigationButtons = []) {
                reply = String(reply || '')
                    .replace(/&lt;/gi, '<')
                    .replace(/&gt;/gi, '>')
                    .replace(/&nbsp;/gi, ' ')
                    .replace(/&amp;/gi, '&')
                    .replace(/<\/?[^>]+(>|$)/g, '')
                    .replace(/\*\*\*\*/g, '')
                    .replace(/\*\*\*/g, '')
                    .replace(/\*\*/g, '')
                    .replace(/\*/g, '')
                    .replace(/##/g, '')
                    .replace(/#/g, '')
                    .replace(/~~(.+?)~~/g, '$1')
                    .replace(/`{3}[\s\S]*?`{3}/g, '')
                    .replace(/`(.+?)`/g, '$1')
                    .replace(/\r\n/g, '\n')
                    .replace(/\r/g, '\n')
                    .replace(/[ \t]+\n/g, '\n')
                    .replace(/\n{3,}/g, '\n\n')
                    .trim();

                const navPattern = /\[NAVIGATE_TO:\[([^\]]+)\]\|([^\]]+)\]/g;
                let match;

                while ((match = navPattern.exec(reply)) !== null) {
                    navigationButtons.push({
                        text: match[1].trim(),
                        url: match[2].trim()
                    });
                }

                reply = reply.replace(navPattern, '').trim();

                if (!Array.isArray(navigationButtons)) {
                    navigationButtons = [];
                }

                const messageDiv = document.createElement('div');
                messageDiv.classList.add('flex', 'items-start', 'mb-2', 'last:mb-0', 'justify-start', 'space-x-2');

                // Profile image untuk AI
                const profileImg = document.createElement('img');
                profileImg.src = '/assets/images/logo-icon.svg';
                profileImg.alt = 'AI';
                profileImg.classList.add('w-8', 'h-8', 'rounded-full', 'bg-white', 'p-1', 'flex-shrink-0',
                    'object-contain');

                const messageBubble = document.createElement('div');
                messageBubble.classList.add(
                    'inline-block',
                    'bg-gray-200',
                    'text-black',
                    'text-sm',
                    'p-3',
                    'rounded-lg',
                    'max-w-[80%]',
                    'relative',
                    'whitespace-pre-wrap'
                );

                messageDiv.appendChild(profileImg);
                messageDiv.appendChild(messageBubble);
                chatMessages.appendChild(messageDiv);
                scrollToBottom();

                let index = 0;
                const typingSpeed = 15;

                function typeWriter() {
                    if (index < reply.length) {
                        const char = reply[index];

                        if (char === '\n') {
                            messageBubble.innerHTML += '<br>';
                        } else {
                            const escapedChar = char
                                .replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;');
                            messageBubble.innerHTML += escapedChar;
                        }

                        index++;

                        if (index % 20 === 0) {
                            scrollToBottom();
                        }

                        setTimeout(typeWriter, typingSpeed);
                    } else {
                        scrollToBottom(true);

                        if (Array.isArray(navigationButtons) && navigationButtons.length > 0) {
                            console.log('Menampilkan', navigationButtons.length, 'tombol navigasi');

                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('mt-3', 'flex', 'flex-wrap', 'gap-2');

                            navigationButtons.forEach((btn, index) => {
                                if (!btn || !btn.text || !btn.url) {
                                    console.warn('Invalid button at index', index, ':', btn);
                                    return;
                                }

                                const button = document.createElement('button');
                                button.textContent = btn.text;
                                button.classList.add(
                                    'bg-orange-500',
                                    'text-white',
                                    'px-4',
                                    'py-2',
                                    'rounded-lg',
                                    'hover:bg-orange-600',
                                    'transition',
                                    'text-sm',
                                    'font-medium',
                                    'shadow-sm'
                                );
                                button.onclick = () => {
                                    const safeUrl = String(btn.url || '').trim();
                                    if (safeUrl.startsWith('/') || safeUrl.startsWith('http://') ||
                                        safeUrl.startsWith('https://') || safeUrl.startsWith('#')) {
                                        window.location.href = safeUrl;
                                    } else {
                                        console.warn('Blocked navigation to unsafe URL:', safeUrl);
                                    }
                                };
                                buttonContainer.appendChild(button);
                            });

                            if (buttonContainer.children.length > 0) {
                                messageBubble.appendChild(buttonContainer);
                                scrollToBottom(true);
                            }
                        } else {
                            console.log('Tidak ada tombol navigasi untuk ditampilkan');
                        }
                    }
                }

                typeWriter();
            }


            function createNavigationButton(text, url) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('flex', 'items-start', 'mb-2', 'last:mb-0', 'justify-start');

                const button = document.createElement('a');
                button.href = url;
                button.textContent = text;
                button.classList.add('inline-block', 'bg-orange-500', 'text-white', 'text-sm', 'py-2', 'px-4',
                    'rounded-lg', 'hover:bg-orange-600', 'transition-colors', 'max-w-[80%]');

                messageDiv.appendChild(button);
                chatMessages.appendChild(messageDiv);
                scrollToBottom();
            }

            function removeTypingAnimation() {
                const typingDiv = document.querySelector('.ai-typing');
                if (typingDiv && typingDiv.parentElement) typingDiv.remove();
            }

            async function sendMessage() {
                const message = userInput.value.trim();
                if (!message) return;

                if (isSending) {
                    console.warn("Pesan sedang dalam proses pengiriman. Abort.");
                    return;
                }

                createMessageElement(message, true);
                userInput.value = '';
                adjustTextareaHeight(userInput);

                isSending = true;
                sendBtn.disabled = true;
                userInput.disabled = true;
                sendBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin text-xl"></i>';
                const loadingBubble = createMessageElement('', false, 'loading');
                errorDiv.style.display = 'none';

                try {
                    const csrfToken = getCsrfToken();

                    if (!csrfToken) {
                        throw new Error('CSRF token tidak tersedia. Silakan refresh halaman.');
                    }

                    console.log('Mengirim pesan ke:', sendRoute);
                    console.log('CSRF Token:', csrfToken ? 'Tersedia' : 'Tidak tersedia');

                    const response = await fetch(sendRoute, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({
                            content: message
                        })
                    });

                    let data = null;
                    let textFallback = null;
                    try {
                        data = await response.clone().json();
                    } catch (err) {
                        try {
                            textFallback = await response.clone().text();
                        } catch (err2) {
                            textFallback = null;
                        }
                    }

                    if (loadingBubble && loadingBubble.parentElement) loadingBubble.parentElement.remove();
                    if (response.ok) {
                        const replyText = data?.reply;
                        const navigationButtons = data?.navigation;

                        console.log('Response data:', data);
                        console.log('Navigation buttons:', navigationButtons);
                        const typingBubble = showTypingAnimation();

                        setTimeout(() => {
                            removeTypingAnimation();

                            if (replyText) {
                                displayAiReply(replyText, navigationButtons);
                            }

                        }, 1500);
                    } else {
                        if (response.status === 419) {
                            let msg = 'Sesi Anda telah berakhir. Halaman akan dimuat ulang dalam 3 detik...';
                            errorText.textContent = msg;
                            errorDiv.style.display = 'flex';
                            createMessageElement('⚠️ ' + msg, false);

                            setTimeout(() => {
                                window.location.reload();
                            }, 3000);
                        } else {
                            const errorPayload = data || (textFallback ? {
                                message: textFallback
                            } : null);
                            let errorMessage = `Server mengembalikan status ${response.status}`;
                            if (errorPayload) {
                                if (typeof errorPayload === 'string') {
                                    errorMessage = errorPayload;
                                } else if (errorPayload.details) {
                                    errorMessage = typeof errorPayload.details === 'string' ? errorPayload
                                        .details : JSON.stringify(errorPayload.details);
                                } else if (errorPayload.message) {
                                    errorMessage = errorPayload.message;
                                } else if (errorPayload.error) {
                                    errorMessage = errorPayload.error;
                                } else if (errorPayload
                                    .reply) {
                                    errorMessage = errorPayload.reply;
                                }
                            }
                            errorText.textContent = errorMessage;
                            errorDiv.style.display = 'flex';
                            createMessageElement('⚠️ ' + errorMessage, false);
                        }
                    }

                } catch (error) {
                    console.error('Error communicating with server:', error);
                    if (loadingBubble && loadingBubble.parentElement) loadingBubble.parentElement.remove();
                    const errorMessage = 'Maaf, terjadi kesalahan jaringan. Server tidak merespons.';
                    errorText.textContent = errorMessage + (error && error.message ? ' — ' + error.message :
                        '');
                    errorDiv.style.display = 'flex';
                    createMessageElement('❌ ' + errorText.textContent, false);
                } finally {
                    isSending = false;
                    userInput.disabled = false;
                    sendBtn.innerHTML = '<i class="fas fa-paper-plane text-xl"></i>';
                    scrollToBottom();
                    adjustTextareaHeight(userInput);
                    userInput.focus();
                }
            }

            function toggleChat() {
                const isHidden = chatWindow.classList.contains('hidden');
                const chatIcon = openChatButton.querySelector('svg');

                if (isHidden) {
                    chatWindow.classList.remove('hidden');
                    setTimeout(() => {
                        chatWindow.classList.remove('scale-0', 'opacity-0');
                        chatIcon.classList.add('rotate-[360deg]');
                        scrollToBottom();
                        userInput.focus();
                    }, 10);
                } else {
                    chatWindow.classList.add('scale-0', 'opacity-0');
                    chatIcon.classList.remove('rotate-[360deg]');
                    setTimeout(() => {
                        chatWindow.classList.add('hidden');
                        errorDiv.style.display = 'none';
                    }, 300);
                }
            }

            openChatButton.addEventListener('click', toggleChat);
            closeChatButton.addEventListener('click', toggleChat);

            chatForm.addEventListener('submit', function(e) {
                e.preventDefault();
                sendMessage();
            });

            userInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            userInput.addEventListener('input', () => adjustTextareaHeight(userInput));

            clearChatButton.addEventListener('click', () => {
                if (!confirm("Apakah Anda yakin ingin menghapus seluruh riwayat obrolan di jendela ini?"))
                    return;
                chatMessages.innerHTML = '';
                errorDiv.style.display = 'none';
                createMessageElement(
                    'Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?', false);
            });

            createMessageElement('Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?', false);
            adjustTextareaHeight(userInput);
            scrollToBottom(true);
        });

        document.addEventListener("DOMContentLoaded", () => {
            const openChatButton = document.getElementById("openChatButton");
            const chatWindow = document.getElementById("chatWindow");
            openChatButton.classList.add("pulsing");
            openChatButton.addEventListener("click", () => {
                const isHidden = chatWindow.classList.contains("hidden");
                if (isHidden) {
                    openChatButton.classList.remove("pulsing");
                } else {
                    setTimeout(() => {
                        openChatButton.classList.add("pulsing");
                    }, 300);
                }
            });
        });
    </script>

    <style>
        #chatMessages.custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        #chatMessages.custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #f97316;
            border-radius: 3px;
        }

        #chatMessages.custom-scrollbar::-webkit-scrollbar-track {
            background: #e5e7eb;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .typing-cursor::after {
            content: '|';
            animation: blink 1s infinite;
            margin-left: 2px;
            color: #9ca3af;
        }

        #chatInput:focus {
            box-shadow: none;
            border-color: #f97316;
        }

        @keyframes bounce {

            0%,
            80%,
            100% {
                transform: scale(0);
                opacity: 0.3;
            }

            40% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .dot {
            display: inline-block;
            margin: 0 2px;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        .dot1 {
            animation-delay: -0.32s;
        }

        .dot2 {
            animation-delay: -0.16s;
        }

        .dot3 {
            animation-delay: 0s;
        }

        @keyframes pulseEffect {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 165, 0, 0.8);
            }

            70% {
                transform: scale(1.15);
                box-shadow: 0 0 25px 10px rgba(255, 165, 0, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 165, 0, 0);
            }
        }

        .pulsing {
            animation: pulseEffect 2s infinite;
        }

        @keyframes scrollBtnPulse {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .scroll-btn-pulse:not(.hidden):not(.opacity-0) {
            animation: scrollBtnPulse 2s ease-in-out infinite;
        }

        #sendBtn:hover i {
            transform: translateX(2px);
            transition: transform 0.2s ease;
        }

        @keyframes ping {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .animate-ping {
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
    </style>

