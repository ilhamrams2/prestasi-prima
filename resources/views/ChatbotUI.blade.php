<!-- ================= CHATBOT UI ================= -->
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
            <button id="clearChatButton" class="text-gray-400 hover:text-white">
                <i class="fas fa-redo-alt"></i>
            </button>
            <button id="closeChatButton" class="text-gray-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div id="chatMessages" class="flex-grow overflow-y-auto p-3 space-y-3 custom-scrollbar">
        <div class="flex items-start">
            <p class="inline-block bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]">Halo! Saya asisten virtual
                SMK Prestasi Prima. Ada yang bisa saya bantu?</p>
        </div>
    </div>

    <form id="chatForm" class="p-3 border-t border-gray-700">
        <div class="relative">
            <input type="text" id="chatInput" placeholder="Ketik pesan..."
                class="w-full pl-3 pr-10 py-2 rounded-full bg-gray-700 text-white text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 placeholder-gray-400">
            <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </form>
</div>


<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Logic for Chatbot
    const openChatButton = document.getElementById('openChatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChatButton = document.getElementById('closeChatButton');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');
    const clearChatButton = document.getElementById('clearChatButton');

    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : null;

    if (openChatButton && chatWindow && closeChatButton && chatForm && chatInput && chatMessages && clearChatButton) {

        // Function to create a new message element
        function createMessageElement(sender, text) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('flex', 'items-start', 'mb-2', sender === 'user' ? 'justify-end' : 'justify-start');
            messageDiv.innerHTML = `
                <p class="inline-block text-sm p-2 rounded-lg max-w-[80%] ${sender === 'user' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-black'}">
                    ${text}
                </p>
            `;
            return messageDiv;
        }
        
        // This function types word by word, handling spaces correctly
        async function typeWordByWord(element, text) {
            const words = text.split(/\s+/);
            element.innerHTML = '';
            for (let i = 0; i < words.length; i++) {
                const word = words[i];
                let j = 0;
                while (j < word.length) {
                    element.innerHTML += word.charAt(j);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                    await new Promise(r => setTimeout(r, 15)); // Typing speed
                    j++;
                }
                if (i < words.length - 1) {
                    element.innerHTML += ' ';
                }
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
                }, 10);
            } else {
                chatWindow.classList.add('scale-0', 'opacity-0');
                chatIcon.classList.remove('rotate-[360deg]');
                setTimeout(() => {
                    chatWindow.classList.add('hidden');
                }, 300);
            }
        }

        openChatButton.addEventListener('click', toggleChat);
        closeChatButton.addEventListener('click', toggleChat);

        chatForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const userMessage = chatInput.value.trim();
            if (userMessage === '') return;

            // Add user's message
            chatMessages.appendChild(createMessageElement('user', userMessage));
            chatInput.value = '';
            chatMessages.scrollTop = chatMessages.scrollHeight;

            try {
                // Add typing indicator
                const typingIndicatorDiv = document.createElement('div');
                typingIndicatorDiv.id = 'typingIndicator';
                typingIndicatorDiv.classList.add('flex', 'items-start', 'mb-2', 'justify-start');
                typingIndicatorDiv.innerHTML = `
                    <p class="inline-block bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]">
                        <span class="animate-pulse">Typing...</span>
                    </p>
                `;
                chatMessages.appendChild(typingIndicatorDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                const response = await fetch('/api/chatbot-send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        prompt: userMessage
                    })
                });

                const data = await response.json();

                // Remove typing indicator
                const typingIndicator = document.getElementById('typingIndicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                }

                if (response.ok) {
                    const aiReply = data.reply;
                    const regex = /\[NAVIGATE_TO:([^|]+)\|([^\]]+)\]/g;
                    let match;
                    let lastIndex = 0;

                    const aiResponseContainer = document.createElement('div');
                    aiResponseContainer.classList.add('flex', 'items-start', 'mb-2', 'justify-start', 'flex-col');
                    chatMessages.appendChild(aiResponseContainer);

                    while ((match = regex.exec(aiReply)) !== null) {
                        const textBefore = aiReply.substring(lastIndex, match.index).trim();
                        if (textBefore) {
                            const p = document.createElement('p');
                            p.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-gray-200', 'text-black', 'mb-2');
                            aiResponseContainer.appendChild(p);
                            await typeWordByWord(p, textBefore);
                        }
                        
                        const buttonText = match[1];
                        const buttonUrl = match[2];
                        const buttonLink = document.createElement('a');
                        buttonLink.href = buttonUrl;
                        buttonLink.target = "_blank";
                        buttonLink.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-orange-500', 'text-white', 'hover:bg-orange-600', 'transition', 'font-semibold', 'text-center', 'mb-2');
                        buttonLink.innerText = buttonText;
                        aiResponseContainer.appendChild(buttonLink);

                        lastIndex = regex.lastIndex;
                    }

                    const textAfter = aiReply.substring(lastIndex).trim();
                    if (textAfter) {
                        const p = document.createElement('p');
                        p.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-gray-200', 'text-black', 'mb-2');
                        aiResponseContainer.appendChild(p);
                        await typeWordByWord(p, textAfter);
                    }
                    
                    if (lastIndex === 0) {
                        const p = document.createElement('p');
                        p.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-gray-200', 'text-black', 'mb-2');
                        aiResponseContainer.appendChild(p);
                        await typeWordByWord(p, aiReply);
                    }
                    
                    chatMessages.scrollTop = chatMessages.scrollHeight;

                } else {
                    chatMessages.appendChild(createMessageElement('model', data.reply || "Maaf, terjadi kesalahan saat menghubungi server."));
                }

            } catch (error) {
                console.error("Error communicating with server:", error);
                const typingIndicator = document.getElementById('typingIndicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                }
                const errorMessage = "Maaf, terjadi kesalahan. Silakan coba lagi.";
                chatMessages.appendChild(createMessageElement('model', errorMessage));
            }
        });

        clearChatButton.addEventListener('click', async () => {
            chatMessages.innerHTML = '';

            try {
                await fetch('/api/chatbot-clear', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                chatMessages.appendChild(createMessageElement('model', 'Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?'));
            } catch (error) {
                console.error("Error clearing chat history:", error);
            }
        });
    }
});
</script>

<!-- ================= STYLE ================= -->
<style>
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: .5; }
}
.animate-pulse {
    animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>
