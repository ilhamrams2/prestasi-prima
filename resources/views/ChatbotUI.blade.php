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
            <button id="clearChatButton" class="text-white opacity-75 hover:opacity-100 transition-opacity" title="Bersihkan Riwayat Lokal">
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
    
    function createMessageElement(text, isUser, type = 'text') {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('flex', 'items-start', 'mb-2', 'last:mb-0', isUser ? 'justify-end' : 'justify-start');
        
        let contentHTML = '';
        if (type === 'loading') {
            contentHTML = `<p class="inline-block bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]"><span class="animate-pulse">Typing...</span></p>`;
        } else {
            const bgColor = isUser ? 'bg-orange-500 text-white' : 'bg-gray-200 text-black';
            const borderRadius = 'rounded-lg';
            contentHTML = `<p class="inline-block text-sm p-2 ${bgColor} ${borderRadius} max-w-[80%] whitespace-pre-wrap">${text}</p>`;
        }
        
        messageDiv.innerHTML = contentHTML;
        chatMessages.appendChild(messageDiv);
        scrollToBottom();
        return messageDiv.querySelector('p') || messageDiv;
    }

    function displayAiReply(reply) {
        const formattedReply = reply.replace(/\n/g, '<br>');
        createMessageElement(formattedReply, false);
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
            const targetUrl = new URL(sendRoute, location.href);
            const sameOrigin = targetUrl.origin === location.origin;
            const credentialsMode = sameOrigin ? 'same-origin' : 'include';

            // ✅ INI BAGIAN YANG DULU HILANG
            const response = await fetch(sendRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                credentials: credentialsMode,
                body: JSON.stringify({ message })
            });

            // ✅ Baca hasilnya
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
                if (data && data.data && data.data.reply) {
                    displayAiReply(data.data.reply);
                } else if (data && data.reply) {
                    displayAiReply(data.reply);
                } else if (textFallback) {
                    displayAiReply(textFallback);
                } else {
                    const errorMessage = (data && (data.error || data.message)) || 'Server merespons tapi format tidak dikenal.';
                    errorText.textContent = errorMessage;
                    errorDiv.style.display = 'flex';
                    createMessageElement('⚠️ ' + errorMessage, false);
                }
            } else {
                if (response.status === 419) {
                    let msg = 'Sesi atau token CSRF tidak valid. Silakan muat ulang halaman dan coba lagi.';
                    if (!sameOrigin) {
                        msg += ' (Permintaan lintas-origin terdeteksi. Pastikan server mengizinkan credentials dan header X-CSRF-TOKEN di konfigurasi CORS.)';
                    }
                    errorText.textContent = msg;
                    errorDiv.style.display = 'flex';
                    createMessageElement('⚠️ ' + msg, false);
                } else {
                    const errorPayload = data || (textFallback ? { message: textFallback } : null);
                    let errorMessage = `Server mengembalikan status ${response.status}`;
                    if (errorPayload) {
                        if (typeof errorPayload === 'string') {
                            errorMessage = errorPayload;
                        } else if (errorPayload.details) {
                            errorMessage = typeof errorPayload.details === 'string' ? errorPayload.details : JSON.stringify(errorPayload.details);
                        } else if (errorPayload.message) {
                            errorMessage = errorPayload.message;
                        } else if (errorPayload.error) {
                            errorMessage = errorPayload.error;
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
            errorText.textContent = errorMessage + (error && error.message ? ' — ' + error.message : '');
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
        if (!confirm("Apakah Anda yakin ingin menghapus seluruh riwayat obrolan di jendela ini?")) return;
        chatMessages.innerHTML = '';
        errorDiv.style.display = 'none';
        createMessageElement('Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?', false);
    });
    
    createMessageElement('Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?', false);
    adjustTextareaHeight(userInput);
});
</script>


---

## 🎨 Penyesuaian Style

Berikut adalah *custom style* untuk scrollbar dan animasi *pulse* (sesuai kode lama Anda):

```html
<style>
/* Custom Scrollbar Styling (Hanya untuk estetika di webkit) */
#chatMessages.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}
#chatMessages.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: #f97316; /* orange-500 */
    border-radius: 3px;
}
#chatMessages.custom-scrollbar::-webkit-scrollbar-track {
    background: #e5e7eb; /* gray-200 */
}

/* Animasi Pulse untuk Typing Indicator */
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: .5; }
}
.animate-pulse {
    animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* Styling untuk textarea agar tidak ada glow default */
#chatInput:focus {
    box-shadow: none;
    /* Tambahkan border focus yang jelas */
    border-color: #f97316;
}
</style>