{{-- resources/views/sections/home/faq.blade.php --}}
<section class="py-12 lg:py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8 lg:mb-12">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3 lg:mb-4">
                Frequently Asked Questions
            </h2>
            <p class="text-gray-600 text-sm lg:text-base max-w-2xl mx-auto">
                Everything you need to know about your Himalayan adventure
            </p>
        </div>

        <!-- Search Box -->
        <div class="mb-6 lg:mb-8">
            <div class="relative">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="faqSearch"
                    placeholder="Search FAQs..."
                    class="w-full pl-12 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 placeholder-gray-400"
                />
                <button 
                    id="clearSearch" 
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 hidden"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- FAQ Items Container -->
        <div class="space-y-3" id="faq-container">
            <!-- FAQ items will be rendered here by JavaScript -->
        </div>

        <!-- No Results Message -->
        <div id="noResults" class="text-center py-8 hidden">
            <p class="text-gray-600 text-base">No questions found matching your search.</p>
        </div>

        <!-- Results Count -->
        <div id="resultsCount" class="text-center mt-6 pt-6 border-t border-gray-200 hidden">
            <p class="text-gray-600 text-sm">
                Found <span id="visibleCount" class="font-semibold">0</span> of 
                <span id="totalCount" class="font-semibold">0</span> answers
            </p>
        </div>
    </div>

    <script>
        // FAQ Data
        const faqs = [
            {
                id: 1,
                question: "How far in advance should I book my trek?",
                answer: "We recommend booking at least 3-6 months in advance for popular treks like Everest Base Camp and Annapurna Circuit, especially during peak seasons (March-May and September-November). For less crowded treks, 1-2 months in advance is usually sufficient."
            },
            {
                id: 2,
                question: "What is your cancellation policy?",
                answer: "Cancellations made 30+ days before departure: 90% refund. 15-29 days: 50% refund. 8-14 days: 25% refund. Less than 7 days: no refund. We offer flexible rescheduling options for unforeseen circumstances."
            },
            {
                id: 3,
                question: "Do I need travel insurance?",
                answer: "Yes, comprehensive travel insurance including emergency evacuation coverage is mandatory for all our treks. Make sure your policy covers high-altitude trekking up to 6,000 meters."
            },
            {
                id: 4,
                question: "What fitness level is required for these treks?",
                answer: "Most treks require good physical fitness. You should be able to walk 5-7 hours daily with a light daypack. We recommend regular cardio exercise (running, cycling, hiking) for 2-3 months before your trek. We offer treks for all fitness levels."
            },
            {
                id: 5,
                question: "What gear do I need to bring?",
                answer: "We provide a detailed packing list upon booking. Essentials include: sturdy hiking boots, thermal layers, down jacket, waterproof shell, sleeping bag (available for rent), headlamp, and personal medications. We provide all camping equipment and meals."
            },
            {
                id: 6,
                question: "How do I prepare for high altitude?",
                answer: "We follow conservative ascent profiles, include acclimatization days, and monitor oxygen levels. Stay hydrated, avoid alcohol, and listen to your body. Our guides are trained in altitude sickness recognition and treatment."
            },
            {
                id: 7,
                question: "What is a typical day like on the trek?",
                answer: "We start with early morning tea, hike 4-6 hours with lunch breaks, and reach camp by afternoon. Evenings include dinner and briefings. We maintain a 'hike high, sleep low' philosophy for better acclimatization."
            },
            {
                id: 8,
                question: "What about meals and accommodation?",
                answer: "We provide 3 nutritious meals daily. Accommodation ranges from comfortable teahouses to camping depending on the route. All meals are prepared following strict hygiene standards."
            },
            {
                id: 9,
                question: "What is included in the trekking cost?",
                answer: "Cost includes: permits, experienced guide and porters, all meals during trek, accommodation, transportation to/from trailhead, and equipment. Excludes: flights, visas, travel insurance, personal expenses, and tips."
            },
            {
                id: 10,
                question: "How much cash should I bring?",
                answer: "Budget $20-30 per day for personal expenses like snacks, drinks, Wi-Fi, charging, and hot showers. ATMs are scarce on the trail, so bring enough Nepali rupees from Kathmandu."
            }
        ];

        let expandedFaqId = null;
        let currentSearchTerm = '';

        // Toggle FAQ function
        function toggleFaq(id) {
            if (expandedFaqId === id) {
                expandedFaqId = null;
            } else {
                expandedFaqId = id;
            }
            renderFaqs();
        }

        // Render FAQs function
        function renderFaqs() {
            const container = document.getElementById('faq-container');
            const noResults = document.getElementById('noResults');
            const resultsCount = document.getElementById('resultsCount');
            const visibleCountSpan = document.getElementById('visibleCount');
            const totalCountSpan = document.getElementById('totalCount');
            
            // Filter FAQs based on search
            const filteredFaqs = faqs.filter(faq => {
                if (!currentSearchTerm) return true;
                const searchText = (faq.question + ' ' + faq.answer).toLowerCase();
                return searchText.includes(currentSearchTerm.toLowerCase());
            });
            
            // Clear container
            container.innerHTML = '';
            
            // Render filtered FAQs
            filteredFaqs.forEach(faq => {
                const isExpanded = expandedFaqId === faq.id;
                
                const faqElement = document.createElement('div');
                faqElement.className = 'border border-gray-200 rounded-lg hover:border-gray-300 transition-colors';
                faqElement.innerHTML = `
                    <!-- FAQ Header -->
                    <div 
                        class="p-4 lg:px-6 lg:py-4 cursor-pointer bg-white hover:bg-gray-50 rounded-lg flex justify-between items-start"
                        onclick="toggleFaq(${faq.id})"
                    >
                        <div class="flex-1 pr-4">
                            <h3 class="font-semibold text-gray-900 text-base lg:text-lg">
                                ${faq.question}
                            </h3>
                        </div>
                        <div class="flex-shrink-0">
                            ${isExpanded ? 
                                '<svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>' :
                                '<svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>'
                            }
                        </div>
                    </div>
                    
                    ${isExpanded ? `
                        <!-- FAQ Answer -->
                        <div class="border-t border-gray-200 bg-gray-50">
                            <div class="p-4 lg:px-6 lg:py-4">
                                <p class="text-gray-700 leading-relaxed">
                                    ${faq.answer}
                                </p>
                            </div>
                        </div>
                    ` : ''}
                `;
                
                container.appendChild(faqElement);
            });
            
            // Show/hide no results message
            if (filteredFaqs.length === 0 && currentSearchTerm) {
                noResults.classList.remove('hidden');
                container.classList.add('hidden');
                resultsCount.classList.add('hidden');
            } else {
                noResults.classList.add('hidden');
                container.classList.remove('hidden');
                
                // Show/hide results count
                if (currentSearchTerm) {
                    resultsCount.classList.remove('hidden');
                    visibleCountSpan.textContent = filteredFaqs.length;
                    totalCountSpan.textContent = faqs.length;
                } else {
                    resultsCount.classList.add('hidden');
                }
            }
        }

        // Search functionality
        function setupSearch() {
            const searchInput = document.getElementById('faqSearch');
            const clearButton = document.getElementById('clearSearch');
            
            if (!searchInput) return;
            
            searchInput.addEventListener('input', function() {
                currentSearchTerm = this.value.trim();
                
                // Show/hide clear button
                if (currentSearchTerm) {
                    clearButton.classList.remove('hidden');
                } else {
                    clearButton.classList.add('hidden');
                }
                
                // Close any expanded FAQ when searching
                expandedFaqId = null;
                
                // Re-render FAQs
                renderFaqs();
            });
            
            // Clear search
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                currentSearchTerm = '';
                clearButton.classList.add('hidden');
                expandedFaqId = null;
                renderFaqs();
                searchInput.focus();
            });
            
            // Auto-open first result on Enter
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && currentSearchTerm) {
                    e.preventDefault();
                    const filteredFaqs = faqs.filter(faq => {
                        const searchText = (faq.question + ' ' + faq.answer).toLowerCase();
                        return searchText.includes(currentSearchTerm.toLowerCase());
                    });
                    
                    if (filteredFaqs.length > 0) {
                        toggleFaq(filteredFaqs[0].id);
                        
                        // Scroll to the opened FAQ
                        setTimeout(() => {
                            const faqElement = document.querySelector(`[onclick="toggleFaq(${filteredFaqs[0].id})"]`);
                            if (faqElement) {
                                faqElement.scrollIntoView({ 
                                    behavior: 'smooth', 
                                    block: 'center' 
                                });
                            }
                        }, 100);
                    }
                }
            });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            renderFaqs();
            setupSearch();
        });
    </script>
</section>