<!-- Info Box -->
<div class="flex items-center justify-between bg-gradient-to-r from-blue-50 to-indigo-50 rounded">
                
<div id="newYearModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 py-8">
        <!-- Gradient Background overlay -->
        <div class="fixed inset-0 bg-gradient-to-br from-slate-900/90 via-blue-900/90 to-slate-900/90 backdrop-blur-xl"></div>

        <!-- Modal content - 1080px width with auto height -->
        <div class="relative bg-white rounded-2xl w-full max-w-[500px] h-auto overflow-hidden shadow-2xl transform transition-all duration-300 my-8">
            <!-- Decorative top accent -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-400 via-orange-500 to-red-500"></div>

            <!-- Close button -->
            <button onclick="closeModal()"
                    class="absolute top-2 right-4 z-20 w-10 h-10 bg-white/95 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-red-50 hover:scale-110 transition-all duration-200 shadow-lg hover:shadow-xl">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

@if($card)

            <!-- Image Section - Displayed completely -->
            <div class="relative w-full overflow-hidden">
                <img src="{{ asset('storage/' . $card->image) }}" 
                     alt="AME TREKS OFFER" 
                     class="w-500px h-auto object-contain max-h-[500px] hover:scale-105 transition-transform duration-500">
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                <!-- Badge -->
                <div class="absolute top-2 left-50 bg-[#005991] text-white px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                    ✨ Limited Offer
                </div>
            </div>
            
            <!-- Content Section -->
            <div class="p-5 space-y-4">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6 border border-blue-200 relative">
                    <div class="flex items-start gap-3 mb-2">
                        <div class="flex-shrink-0">
                             <i class="bi bi-info-circle-fill text-[#005991] text-xl md:text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-base md:text-lg text-[#005991] leading-relaxed">
                               {{ $card->text }}
                            </p>
                        </div>
                    </div>
             
                    <!-- Book Now Button - Positioned bottom right -->
                    <div class="flex justify-end">
                        <button onclick="bookTrek()"
                                class="bg-[#005991] text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105 active:scale-95 flex items-center justify-center gap-1 shadow-lg whitespace-nowrap text-lg">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>S
    </div>
</div>

<script>
    // Show modal after 1 second
    setTimeout(() => {
        showModal();
    }, 1000);

    function showModal() {
        const modal = document.getElementById('newYearModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
    }

    function closeModal() {
        const modal = document.getElementById('newYearModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }

    function bookTrek() {
        closeModal();
        window.location.href = '/treks';
    }

    // Close when clicking outside
    document.addEventListener('click', function(e) {
        const modal = document.getElementById('newYearModal');
        if (modal && !modal.classList.contains('hidden') && e.target.id === 'newYearModal') {
            closeModal();
        }
    });

    // Close with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>

<style>
    #newYearModal {
        animation: fadeInBackdrop 0.4s ease-out;
    }

    #newYearModal > div > .relative {
        animation: slideUp 0.5s ease-out;
    }

    @keyframes fadeInBackdrop {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Smooth transitions */
    #newYearModal button {
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* Image hover effect */
    #newYearModal img {
        transition: transform 0.5s ease-out;
    }

    /* Responsive adjustments */
    @media (max-width: 1120px) {
        #newYearModal > div > .relative {
            max-width: 95vw;
            margin: 1rem;
        }
    }
</style>