<div id="deleteModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
    <div id="deleteBox" class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 text-center opacity-0 scale-95 transition-all">
        <div class="text-red-500 text-5xl mb-4"><i class="ri-error-warning-line"></i></div>
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Hapus Data Guru?</h2>
        <p class="text-gray-600 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>

        <div class="flex justify-center gap-4">
            <button onclick="closeDeleteModal()"
                class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition">Batal</button>
            <button onclick="confirmDelete()"
                class="px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">Hapus</button>
        </div>
    </div>
</div>
