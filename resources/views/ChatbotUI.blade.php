<button id="openChatButton"
    class="fixed bottom-5 right-5 bg-orange-500 text-white p-4 rounded-full shadow-lg hover:bg-orange-600 transition-all z-50 transform">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-300" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
</button>

<div id="chatWindow"
    class="fixed bottom-20 right-5 w-80 h-96 bg-white rounded-lg shadow-xl flex flex-col z-50 transition-all duration-300 ease-in-out transform scale-0 origin-bottom-right opacity-0 hidden 
    md:w-80 md:h-96">

    <div class="flex items-center justify-between p-3 bg-orange-600 rounded-t-lg">
        <div class="flex items-center space-x-2">
            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
            <span class="text-white text-sm font-semibold">Live Chat</span>
        </div>
        <div class="flex items-center space-x-2">
            <button id="clearChatButton" class="text-white opacity-75 hover:opacity-100 transition-opacity"
                title="Bersihkan Riwayat Lokal">
                <i class="fas fa-redo-alt"></i>
            </button>
            <button id="closeChatButton" class="text-white opacity-75 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div id="chatMessages" class="flex-grow overflow-y-auto p-3 space-y-3 custom-scrollbar bg-white">
    </div>

    <form id="chatForm" class="p-3 border-t border-gray-200 bg-gray-50 rounded-b-lg">
        <div class="relative">
            <textarea id="chatInput" placeholder="Ketik pesan..." rows="1"
                class="w-full pl-3 pr-10 py-2 rounded-full bg-white text-black text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 placeholder-gray-400 resize-none overflow-hidden border border-gray-300"
                style="min-height: 40px;"></textarea>
            <button type="submit" id="sendBtn" disabled
                class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-orange-500 transition-colors disabled:opacity-50">
                <i class="fas fa-paper-plane text-xl"></i>
            </button>
        </div>
        <div id="chatbot-error" class="text-red-500 text-xs mt-1 ml-3 flex items-center" style="display:none;">
            <i class="fas fa-times-circle mr-1"></i> <span id="error-text"></span>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const sendRoute = "{{ route('chatbot.send') }}";
        const csrfToken = document.querySelector('meta[name="csrf-token"]') ?
            document.querySelector('meta[name="csrf-token"]').getAttribute('content') : '';

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

        function scrollToBottom() {
            setTimeout(() => {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 50);
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

            // SVG profil bot & user
            if (isUser) {
                profileDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" class="w-6 h-6 bg-orange-500 p-1 rounded-full">
                <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4s-4 1.79-4 4 1.79 4 4 4zM4 20c0-2.67 5.33-4 8-4s8 1.33 8 4v1H4v-1z"/>
            </svg>`;
            } else {
                profileDiv.innerHTML = `
            <svg xmlns="https://main.imaginepresma.com/assets/images/logo-icon.svg" fill="#fff" viewBox="0 0 24 24" class="w-6 h-6 bg-blue-500 p-1 rounded-full">
                <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 3a2 2 0 110 4 2 2 0 010-4zm0 12.5c-2.33 0-4.32-.93-5.47-2.34.03-1.54 3.12-2.39 5.47-2.39 2.36 0 5.44.85 5.47 2.39C16.32 16.57 14.33 17.5 12 17.5z"/>
            </svg>`;
            }

            const messageBubble = document.createElement('div');
            messageBubble.classList.add('max-w-[80%]', 'px-4', 'py-2', 'rounded-2xl', 'text-sm');

            // Kalau type = loading → tampilkan animasi 3 titik
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

            // Urutan: bot → profil dulu, user → profil di kanan
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
    const chatContainer = document.getElementById('chatMessages'); // Ganti sesuai ID kamu
    if (!chatContainer) {
        console.error("Elemen container chat tidak ditemukan!");
        return;
    }

    const typingDiv = document.createElement('div');
    typingDiv.classList.add('ai-typing', 'flex', 'items-start', 'mb-2');

    typingDiv.innerHTML = `
        <div class="flex items-center space-x-1 bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]">
            <span class="dot dot1 bg-gray-500 w-2 h-2 rounded-full animate-bounce"></span>
            <span class="dot dot2 bg-gray-500 w-2 h-2 rounded-full animate-bounce [animation-delay:0.15s]"></span>
            <span class="dot dot3 bg-gray-500 w-2 h-2 rounded-full animate-bounce [animation-delay:0.3s]"></span>
        </div>
    `;

    chatContainer.appendChild(typingDiv);
    chatContainer.scrollTop = chatContainer.scrollHeight;

    return typingDiv;
}


        function removeTypingAnimation() {
            const typing = document.querySelector('.ai-typing');
            if (typing) typing.remove();
        }


       function displayAiReply(reply) {
    // Bersihkan HTML tag <br> mentah dari AI agar gak nongol
    const cleanedReply = reply
        .replace(/<br\s*\/?>/gi, '\n') // ubah <br> jadi newline dulu
        .replace(/\n{2,}/g, '\n\n')   // rapikan newline ganda
        .trim();

    // Sekarang ubah newline jadi <br> untuk ditampilkan rapi
    const formattedReply = cleanedReply.replace(/\n/g, '<br>');

    const messageDiv = document.createElement('div');
    messageDiv.classList.add('flex', 'items-start', 'mb-2', 'last:mb-0', 'justify-start');

    const messageBubble = document.createElement('p');
    messageBubble.classList.add(
        'inline-block',
        'bg-gray-200',
        'text-black',
        'text-sm',
        'p-2',
        'rounded-lg',
        'max-w-[80%]',
        'whitespace-pre-wrap'
    );

    messageDiv.appendChild(messageBubble);
    messageBubble.classList.add('typing-cursor');
    messageBubble.classList.remove('typing-cursor');
    chatMessages.appendChild(messageDiv);
    scrollToBottom();

    let index = 0;
    const typingSpeed = 20; // kecepatan mengetik (ms per karakter)
    const textContent = formattedReply;
    let isTag = false; // agar tidak animasikan tag <br>

    function typeWriter() {
        if (index < textContent.length) {
            const char = textContent[index];
            messageBubble.innerHTML += char;

            // Jika mendeteksi tag HTML, lompat sampai tanda '>'
            if (char === '<') isTag = true;
            if (char === '>') isTag = false;

            index++;
            if (isTag) {
                while (index < textContent.length && textContent[index] !== '>') {
                    messageBubble.innerHTML += textContent[index];
                    index++;
                }
                messageBubble.innerHTML += '>';
                index++;
                isTag = false;
            }

            scrollToBottom();
            setTimeout(typeWriter, typingSpeed);
        } else {
            scrollToBottom();
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

        function showTypingAnimation() {
    // Ganti ID ini sesuai tempat bubble chat muncul
    const chatContainer = document.getElementById('chatMessages'); 
    if (!chatContainer) {
        console.error("Elemen chatMessages tidak ditemukan!");
        return null;
    }

    // Buat elemen animasi "AI sedang mengetik"
    const typingDiv = document.createElement('div');
    typingDiv.classList.add('ai-typing', 'flex', 'items-start', 'mb-2');

    typingDiv.innerHTML = `
        <img src="/images/bot.svg" alt="AI" class="w-8 h-8 mr-2 rounded-full bg-orange-500 p-1">
        <div class="flex items-center space-x-1 bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]">
            <span class="dot dot1 bg-gray-500 w-2 h-2 rounded-full animate-bounce"></span>
            <span class="dot dot2 bg-gray-500 w-2 h-2 rounded-full animate-bounce [animation-delay:0.15s]"></span>
            <span class="dot dot3 bg-gray-500 w-2 h-2 rounded-full animate-bounce [animation-delay:0.3s]"></span>
        </div>
    `;

    chatContainer.appendChild(typingDiv);
    chatContainer.scrollTop = chatContainer.scrollHeight;

    return typingDiv;
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
                const response = await fetch(sendRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
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
    const navigation = data?.navigation;

    // Tampilkan animasi "AI mengetik..."
    const typingBubble = showTypingAnimation();

    setTimeout(() => {
        // Hapus animasi setelah 1.5 detik
        removeTypingAnimation();

        if (replyText) {
            displayAiReply(replyText);
        }

        if (navigation && navigation.text && navigation.url) {
            createNavigationButton(navigation.text, navigation.url);
        }

    }, 1500);
}
 else {
                    if (response.status === 419) {
                        let msg =
                            'Sesi atau token CSRF tidak valid. Silakan muat ulang halaman dan coba lagi.';
                        errorText.textContent = msg;
                        errorDiv.style.display = 'flex';
                        createMessageElement('⚠️ ' + msg, false);
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
                                .reply) { // Handle case where error response has a 'reply'
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
    });

    // === Efek Pulse Otomatis ===
document.addEventListener("DOMContentLoaded", () => {
    const openChatButton = document.getElementById("openChatButton");
    const chatWindow = document.getElementById("chatWindow");

    // Awalnya tombol berdenyut
    openChatButton.classList.add("pulsing");

    // Setiap kali tombol diklik (toggle chat)
    openChatButton.addEventListener("click", () => {
        const isHidden = chatWindow.classList.contains("hidden");

        if (isHidden) {
            // Saat chat mau dibuka -> hentikan pulse
            openChatButton.classList.remove("pulsing");
        } else {
            // Saat chat ditutup -> hidupkan pulse lagi
            setTimeout(() => {
                openChatButton.classList.add("pulsing");
            }, 300);
        }
    });
});

</script>

<style>
    /* Custom Scrollbar Styling (Hanya untuk estetika di webkit) */
    #chatMessages.custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    #chatMessages.custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #f97316;
        /* orange-500 */
        border-radius: 3px;
    }

    #chatMessages.custom-scrollbar::-webkit-scrollbar-track {
        background: #e5e7eb;
        /* gray-200 */
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
        /* abu-abu halus */
    }

    /* Styling untuk textarea agar tidak ada glow default */
    #chatInput:focus {
        box-shadow: none;
        /* Tambahkan border focus yang jelas */
        border-color: #f97316;
    }

    @keyframes bounce {
  0%, 80%, 100% { transform: scale(0); opacity: 0.3; }
  40% { transform: scale(1); opacity: 1; }
}

.dot {
  display: inline-block;
  margin: 0 2px;
  animation: bounce 1.4s infinite ease-in-out both;
}

.dot1 { animation-delay: -0.32s; }
.dot2 { animation-delay: -0.16s; }
.dot3 { animation-delay: 0s; }

/* Animasi pulse untuk tombol */
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

/* Tambahkan class ini ke tombol chat kamu */
.pulsing {
  animation: pulseEffect 2s infinite;
}

</style>
