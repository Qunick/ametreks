<!-- Tour Modal -->
<div id="tourModal" class="hidden modal-overlay fixed inset-0 flex items-center justify-center z-50 p-4">
    <div class="modal-content bg-white rounded-xl p-6 w-full max-w-2xl">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Add New Tour</h3>
            <button onclick="closeModal('tourModal')" class="text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium mb-2">Tour Name</label>
                <input type="text" placeholder="Enter tour name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Duration (days)</label>
                    <input type="number" placeholder="7" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Price ($)</label>
                    <input type="number" placeholder="1000" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Description</label>
                <textarea placeholder="Tour description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Difficulty</label>
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Easy</option>
                        <option>Moderate</option>
                        <option>Challenging</option>
                        <option>Difficult</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Location</label>
                    <input type="text" placeholder="Country/Region" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div class="flex space-x-4 pt-4">
                <button onclick="closeModal('tourModal')" class="flex-1 px-4 py-3 border border-gray-300 rounded-xl font-medium hover:bg-gray-50 transition">Cancel</button>
                <button class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-medium hover:from-blue-700 hover:to-indigo-700 transition shadow">Create Tour</button>
            </div>
        </div>
    </div>
</div>