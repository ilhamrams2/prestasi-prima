<!-- ================= HERO SECTION (VIDEO) ================= -->
<section id="heroVideoSection" 
         class="relative h-screen w-full overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/hero/hero-bg.png') }}');">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40 z-10"></div>

    <!-- Hero Video -->
    <video id="heroVideo" autoplay muted playsinline
           class="absolute inset-0 w-full h-full object-cover z-20 transition-opacity duration-1000">
        <source src="{{ asset('assets/videos/videos.mp4') }}" type="video/mp4">
        Browsermu tidak mendukung video.
    </video>

    <!-- Tombol Lewati -->
    <div id="skipBtnContainer" 
         class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-30">
        <button id="skipBtn"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg shadow-lg text-base font-semibold transition">
          Lewati Video →
        </button>
    </div>
</section>

<!-- ================= HERO CONTENT ================= -->
<section id="heroContentSection"
         class="relative w-full min-h-screen md:h-[90vh] flex items-center text-white pt-[32px] overflow-hidden hidden">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/hero/hero-bg.png') }}" alt="Hero Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col items-center md:items-start text-center md:text-left animate-slide-left">
        
        <!-- Logo + Nama (Mobile) -->
        <div class="flex items-center space-x-2 mb-6 md:hidden">
            <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo" 
                 class="w-8 h-8 object-contain">
            <span class="font-semibold text-white text-lg">SMK Prestasi Prima</span>
        </div>

        <!-- Hero Text -->
        <p class="italic text-sm md:text-base mb-3">
            "If better is possible, good is not enough"
        </p>
        <h1 class="text-3xl md:text-6xl font-extrabold leading-tight mb-4">
            PRESTASI PRIMA
        </h1>
        <p class="text-sm md:text-lg mb-6 max-w-xl">
            Kami berkomitmen menyelenggarakan pendidikan berkualitas tinggi yang membentuk generasi unggul, berkarakter, 
            dan siap menghadapi tantangan masa depan.
        </p>

        <!-- Button -->
        <a href="#tentang"
           class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
            Selengkapnya →
        </a>
    </div>

    <!-- Floating Social -->
    <div class="absolute top-28 right-0 md:top-32 flex flex-col items-end z-10">
        
        <!-- Tombol Toggle -->
        <button id="toggleSocial"
                class="bg-orange-500 text-white w-12 h-12 md:w-14 md:h-14 rounded-l-2xl shadow-lg flex items-center justify-center transition">
          <i class="fas fa-share-alt"></i>
        </button>

        <!-- Panel Sosial -->
        <div id="socialPanel"
             class="bg-white bg-opacity-95 rounded-l-2xl shadow-lg flex flex-col items-center py-3 space-y-3 w-0 overflow-hidden transition-all duration-500">
            <a href="{{ url('/') }}"
               class="bg-white rounded-2xl shadow-lg p-2 flex items-center justify-center w-10 h-10 md:w-12 md:h-12">
                <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo kecil" 
                     class="w-6 h-6 md:w-8 md:h-8 object-contain">
            </a>
            <a href="https://wa.me/6289599439033" target="_blank" 
               class="text-orange-500 hover:text-orange-600">
                <i class="fab fa-whatsapp text-lg md:text-xl"></i>
            </a>
            <a href="https://instagram.com" target="_blank" 
               class="text-orange-500 hover:text-orange-600">
                <i class="fab fa-instagram text-lg md:text-xl"></i>
            </a>
            <a href="https://youtube.com" target="_blank" 
               class="text-orange-500 hover:text-orange-600">
                <i class="fab fa-youtube text-lg md:text-xl"></i>
            </a>
            <a href="https://tiktok.com" target="_blank" 
               class="text-orange-500 hover:text-orange-600">
                <i class="fab fa-tiktok text-lg md:text-xl"></i>
            </a>
        </div>
    </div>
</section>

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
    class="fixed bottom-20 right-5 w-80 h-96 bg-white rounded-lg shadow-xl flex flex-col z-50 transition-all duration-300 ease-in-out transform scale-0 origin-bottom-right opacity-0 hidden">
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
    // Logic for hero section video and content
    const videoSection = document.getElementById("heroVideoSection");
    const video = document.getElementById("heroVideo");
    const skipBtn = document.getElementById("skipBtn");
    const skipBtnContainer = document.getElementById("skipBtnContainer");
    const contentSection = document.getElementById("heroContentSection");
    
    // Logic for floating social panel
    const toggleBtn = document.getElementById("toggleSocial");
    const socialPanel = document.getElementById("socialPanel");
    let isSocialPanelOpen = false;

    if (toggleBtn && socialPanel) {
        toggleBtn.addEventListener("click", () => {
            if (isSocialPanelOpen) {
                socialPanel.style.width = "0px";
                toggleBtn.innerHTML = '<i class="fas fa-share-alt"></i>';
            } else {
                socialPanel.style.width = "56px"; 
                toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
            }
            isSocialPanelOpen = !isSocialPanelOpen;
        });
    }

    function showContent() {
        videoSection.style.transition = "opacity 1s";
        videoSection.style.opacity = 0;

        setTimeout(() => {
            videoSection.style.display = "none";
            skipBtnContainer.style.display = "none";
            
            contentSection.classList.remove("hidden");
            contentSection.style.opacity = 0;
            contentSection.style.transition = "opacity 1s";

            void contentSection.offsetWidth; // reflow
            contentSection.style.opacity = 1;
        }, 1000);
    }
    
    if (video && skipBtn) {
        video.addEventListener("ended", showContent);
        skipBtn.addEventListener("click", showContent);

        video.muted = true;
        video.play().catch(() => console.warn("Autoplay blocked by browser"));
    }

    // Logic for Chatbot (this is the part I've fixed)
    const openChatButton = document.getElementById('openChatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChatButton = document.getElementById('closeChatButton');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');
    const clearChatButton = document.getElementById('clearChatButton');

    // Get the CSRF token from the meta tag
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : null;

    // Check if all necessary elements exist before adding listeners
    if (openChatButton && chatWindow && closeChatButton && chatForm && chatInput && chatMessages && clearChatButton) {

        // Function to add a message to the chat UI
        function addMessage(sender, text) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('flex', 'items-start', 'mb-2', sender === 'user' ? 'justify-end' : 'justify-start');
            messageDiv.innerHTML = `
                <p class="inline-block text-sm p-2 rounded-lg max-w-[80%] ${sender === 'user' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-black'}">
                    ${text}
                </p>
            `;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Function to manage chat window toggle
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

        // Event listeners
        openChatButton.addEventListener('click', toggleChat);
        closeChatButton.addEventListener('click', toggleChat);

        chatForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const userMessage = chatInput.value.trim();
            if (userMessage === '') return;

            addMessage('user', userMessage);
            chatInput.value = '';

            try {
                const typingDiv = document.createElement('div');
                typingDiv.id = 'typingIndicator';
                typingDiv.classList.add('flex', 'items-start');
                typingDiv.innerHTML = `
                    <p class="inline-block bg-gray-200 text-black text-sm p-2 rounded-lg max-w-[80%] animate-pulse">
                        Typing...
                    </p>
                `;
                chatMessages.appendChild(typingDiv);
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

                const typingIndicator = document.getElementById('typingIndicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                }

                if (response.ok) {
                    const aiReply = data.reply;
                    const regex = /\[NAVIGATE_TO:([^|]+)\|([^\]]+)\]/g;
                    let match;
                    let lastIndex = 0;

                    const containerDiv = document.createElement('div');
                    containerDiv.classList.add('flex', 'items-start', 'mb-2', 'justify-start', 'flex-col');

                    while ((match = regex.exec(aiReply)) !== null) {
                        const textBefore = aiReply.substring(lastIndex, match.index).trim();
                        if (textBefore) {
                            const p = document.createElement('p');
                            p.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-gray-200', 'text-black', 'mb-2');
                            p.innerText = textBefore;
                            containerDiv.appendChild(p);
                        }
                        
                        const buttonText = match[1];
                        const buttonUrl = match[2];
                        const buttonLink = document.createElement('a');
                        buttonLink.href = buttonUrl;
                        buttonLink.target = "_blank";
                        buttonLink.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-orange-500', 'text-white', 'hover:bg-orange-600', 'transition', 'font-semibold', 'text-center', 'mb-2');
                        buttonLink.innerText = buttonText;
                        containerDiv.appendChild(buttonLink);

                        lastIndex = regex.lastIndex;
                    }

                    const textAfter = aiReply.substring(lastIndex).trim();
                    if (textAfter) {
                        const p = document.createElement('p');
                        p.classList.add('inline-block', 'text-sm', 'p-2', 'rounded-lg', 'max-w-[80%]', 'bg-gray-200', 'text-black', 'mb-2');
                        p.innerText = textAfter;
                        containerDiv.appendChild(p);
                    }

                    if (lastIndex === 0) {
                        addMessage('model', aiReply);
                    } else {
                        chatMessages.appendChild(containerDiv);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    }

                } else {
                    addMessage('model', data.reply || "Maaf, terjadi kesalahan saat menghubungi server.");
                }

            } catch (error) {
                console.error("Error communicating with server:", error);
                const typingIndicator = document.getElementById('typingIndicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                }
                const errorMessage = "Maaf, terjadi kesalahan. Silakan coba lagi.";
                addMessage('model', errorMessage);
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
                addMessage('model', 'Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?');
            } catch (error) {
                console.error("Error clearing chat history:", error);
            }
        });
    }
});
</script>

<!-- ================= STYLE ================= -->
<style>
@keyframes slideLeft {
  0% { opacity: 0; transform: translateX(-60px); }
  100% { opacity: 1; transform: translateX(0); }
}
@keyframes slideRight {
  0% { opacity: 0; transform: translateX(60px); }
  100% { opacity: 1; transform: translateX(0); }
}
.animate-slide-left {
  animation: slideLeft 1s ease-out forwards;
}
.animate-slide-right {
  animation: slideRight 1s ease-out forwards;
}
</style>

<!-- ================= FONT AWESOME ================= -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- ================= AOS (Animate on Scroll) ================= -->
