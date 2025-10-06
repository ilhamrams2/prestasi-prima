<!-- ================= CHATBOT UI ================= -->
<!-- Pastikan Anda memuat Tailwind CSS dan Font Awesome di file induk Anda -->

<button id="openChatButton"
    class="fixed bottom-5 right-5 bg-orange-500 text-white p-4 rounded-full shadow-lg hover:bg-orange-600 transition-all z-50 transform">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-300" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
</button>

<!-- JENDELA CHAT -->
<div id="chatWindow"
    class="fixed bottom-20 right-5 w-80 h-96 bg-white rounded-lg shadow-xl flex flex-col z-50 transition-all duration-300 ease-in-out transform scale-0 origin-bottom-right opacity-0 hidden 
    md:w-80 md:h-96">
    <!-- HEADER -->
    <div class="flex items-center justify-between p-3 bg-orange-600 rounded-t-lg">
        <div class="flex items-center space-x-2">
            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
            <span class="text-white text-sm font-semibold">Live Chat</span>
        </div>
        <div class="flex items-center space-x-2">
            <!-- Tombol Clear History -->
            <button id="clearChatButton" class="text-white opacity-75 hover:opacity-100 transition-opacity">
                <i class="fas fa-redo-alt"></i>
            </button>
            <!-- Tombol Tutup -->
            <button id="closeChatButton" class="text-white opacity-75 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- PESAN CHAT -->
    <div id="chatMessages" class="flex-grow overflow-y-auto p-3 space-y-3 custom-scrollbar">
        <!-- Pesan sambutan awal akan dimuat oleh JavaScript -->
    </div>

    <!-- INPUT FORM -->
    <form id="chatForm" class="p-3 border-t border-gray-200 bg-gray-800 rounded-b-lg">
        <div class="relative">
            <textarea id="chatInput" placeholder="Ketik pesan..." rows="1"
                class="w-full pl-3 pr-10 py-2 rounded-full bg-gray-700 text-white text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 placeholder-gray-400 resize-none overflow-hidden"
                style="min-height: 40px;"></textarea>
            <!-- Tombol Kirim -->
            <button type="submit" id="sendBtn"
                class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-orange-500 transition-colors">
                <i class="fas fa-paper-plane text-xl"></i>
            </button>
        </div>
    </form>
</div>

<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    // === Konfigurasi & Elemen DOM ===
    const openChatButton = document.getElementById('openChatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChatButton = document.getElementById('closeChatButton');
    const clearChatButton = document.getElementById('clearChatButton');
    const chatForm = document.getElementById('chatForm');
    const userInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');
    const sendBtn = document.getElementById('sendBtn');
    
    // Ambil CSRF Token dari meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]') ? 
        document.querySelector('meta[name="csrf-token"]').getAttribute('content') : '';

    // Status kontrol untuk mencegah double submission
    let isSending = false;
    // Model yang paling stabil untuk API
    const modelName = 'gemini-2.5-flash'; 

    // === Utilitas ===

    function scrollToBottom() {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function adjustTextareaHeight(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
    }
    
    // Fungsi untuk membuat elemen pesan
    function createMessageElement(text, isUser, type = 'text') {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('flex', 'items-start', 'mb-2', isUser ? 'justify-end' : 'justify-start');
        
        let contentHTML = '';

        if (type === 'loading') {
            contentHTML = `<p class="inline-block bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]"><span class="animate-pulse">Typing...</span></p>`;
        } else {
            // Untuk pesan teks biasa
            contentHTML = `<p class="inline-block text-sm p-2 rounded-lg max-w-[80%] ${isUser ? 'bg-orange-500 text-white' : 'bg-gray-200 text-black'}">${text}</p>`;
        }

        messageDiv.innerHTML = contentHTML;
        chatMessages.appendChild(messageDiv);
        scrollToBottom();
        return messageDiv.querySelector('p') || messageDiv; // Kembalikan elemen p atau div utama
    }

    // Fungsi untuk memisahkan teks dan tombol navigasi
    function processAiReply(reply) {
        const regex = /\[NAVIGATE_TO:([^|]+)\|([^\]]+)\]/g;
        let match;
        let lastIndex = 0;
        
        const aiResponseContainer = document.createElement('div');
        aiResponseContainer.classList.add('flex', 'items-start', 'mb-2', 'justify-start', 'flex-col');
        chatMessages.appendChild(aiResponseContainer);

        let promises = [];

        // Fungsi untuk mengetik teks
        const typeAndAppend = async (text, container) => {
            const p = document.createElement('p');
            p.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-gray-200', 'text-black', 'mb-2');
            container.appendChild(p);
            
            // Logika ketik per kata
            const words = text.split(/\s+/);
            p.innerHTML = '';
            for (let i = 0; i < words.length; i++) {
                p.innerHTML += words[i];
                if (i < words.length - 1) {
                    p.innerHTML += ' ';
                }
                scrollToBottom();
                await new Promise(r => setTimeout(r, 15)); // Typing speed
            }
        };

        // 1. Proses teks dan tombol
        while ((match = regex.exec(reply)) !== null) {
            const textBefore = reply.substring(lastIndex, match.index).trim();
            if (textBefore) {
                promises.push(typeAndAppend(textBefore, aiResponseContainer));
            }
            
            // Tunggu hingga teks sebelumnya selesai diketik
            Promise.all(promises).then(() => {
                const buttonText = match[1];
                const buttonUrl = match[2];
                const buttonLink = document.createElement('a');
                buttonLink.href = buttonUrl;
                buttonLink.target = "_blank";
                buttonLink.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-orange-500', 'text-white', 'hover:bg-orange-600', 'transition', 'font-semibold', 'text-center', 'mb-2', 'cursor-pointer');
                buttonLink.innerText = buttonText;
                aiResponseContainer.appendChild(buttonLink);
                scrollToBottom();
            });

            lastIndex = regex.lastIndex;
        }

        // 2. Proses teks setelah tombol terakhir (atau seluruh teks jika tidak ada tombol)
        const textAfter = reply.substring(lastIndex).trim();
        if (textAfter) {
            promises.push(typeAndAppend(textAfter, aiResponseContainer));
        }
        
        // 3. Jika tidak ada tag dan tidak ada sisa teks, buat satu pesan
        if (lastIndex === 0 && textAfter === '') {
            promises.push(typeAndAppend(reply, aiResponseContainer));
        }
        
        // Return promise agar kita tahu kapan semua pengetikan selesai
        return Promise.all(promises);
    }
    
    // === Logika Pengiriman Pesan ===

    async function sendMessage() {
        const message = userInput.value.trim();
        if (!message) return;

        // *** PERBAIKAN PENTING UNTUK MENCEGAH DOUBLE SUBMISSION ***
        if (isSending) {
            console.warn("Pesan sedang dalam proses pengiriman. Abort.");
            return;
        } 

        // 1. Tampilkan pesan pengguna
        createMessageElement(message, true);
        userInput.value = '';
        adjustTextareaHeight(userInput);

        // 2. Set loading state dan nonaktifkan tombol/input
        isSending = true;
        sendBtn.disabled = true;
        userInput.disabled = true;
        sendBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin text-xl"></i>';
        const loadingBubble = createMessageElement('', false, 'loading'); // Menampilkan "Typing..."

        try {
            const response = await fetch('/api/chatbot/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    prompt: message,
                    model: modelName // Menggunakan model yang stabil
                })
            });

            const data = await response.json();

            // 3. Hapus loading indicator dan proses balasan
            loadingBubble.parentElement.remove(); // Hapus div loading
            
            if (response.ok) {
                await processAiReply(data.reply);
            } else {
                // Tampilkan error dari backend (termasuk pesan Overloaded)
                const errorMessage = data.reply || "Maaf, terjadi kesalahan saat menghubungi server.";
                createMessageElement(errorMessage, false);
            }

        } catch (error) {
            console.error("Error communicating with server:", error);
            // Tangani error jaringan atau tak terduga
            if (loadingBubble && loadingBubble.parentElement) {
                 loadingBubble.parentElement.remove();
            }
            const errorMessage = "Maaf, terjadi kesalahan jaringan atau server tidak merespons. Silakan coba lagi.";
            createMessageElement(errorMessage, false);
        } finally {
            // 4. Reset loading state dan aktifkan kembali
            isSending = false;
            sendBtn.disabled = false;
            userInput.disabled = false;
            sendBtn.innerHTML = '<i class="fas fa-paper-plane text-xl"></i>';
            scrollToBottom();
            // Reset tinggi textarea
            adjustTextareaHeight(userInput); 
        }
    }
    
    // === Event Listeners ===

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
            }, 300);
        }
    }

    // Listener Buka/Tutup Chat
    openChatButton.addEventListener('click', toggleChat);
    closeChatButton.addEventListener('click', toggleChat);

    // Listener Submit Form (Klik tombol kirim atau Enter)
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        sendMessage();
    });
    
    // Listener Enter di textarea
    userInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault(); // Mencegah baris baru
            sendMessage();
        }
    });

    // Listener auto-resize textarea
    userInput.addEventListener('input', () => adjustTextareaHeight(userInput));

    // Listener Clear History
    clearChatButton.addEventListener('click', async () => {
        if (!confirm("Apakah Anda yakin ingin menghapus seluruh riwayat obrolan?")) {
            return;
        }

        // Tampilkan pesan clearing
        chatMessages.innerHTML = `<div class="flex items-start justify-start mb-2"><p class="inline-block bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%]">Membersihkan riwayat...</p></div>`;
        scrollToBottom();

        try {
            await fetch('/api/chatbot/clear', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            // Hapus semua pesan dan tampilkan pesan sambutan baru
            chatMessages.innerHTML = '';
            createMessageElement('Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?', false);
        } catch (error) {
            console.error("Error clearing chat history:", error);
            chatMessages.innerHTML = ''; // Clear tetap
            createMessageElement('Maaf, terjadi kesalahan saat membersihkan riwayat chat. Silakan coba lagi.', false);
        }
    });
    
    // Tampilkan pesan sambutan pertama kali saat dimuat
    createMessageElement('Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?', false);
    
});
</script>

<!-- ================= STYLE ================= -->
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
    border-color: transparent;
}
</style>
