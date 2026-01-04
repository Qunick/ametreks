<!-- resources/views/sections/trek-routes.blade.php -->
@extends('layouts.app')
@section('content')
<section class="py-16 lg:py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 lg:mb-16">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-emerald-500 rounded-full"></div>
                <span class="mx-4 text-sm font-semibold tracking-wider text-gray-600 uppercase">
                    Featured Treks
                </span>
                <div class="w-12 h-1 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full"></div>
            </div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Top 10 <span class="bg-gradient-to-r from-blue-600 to-emerald-600 bg-clip-text text-transparent">Featured Treks</span>
            </h2>
            
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                Discover our most popular Himalayan adventures, carefully curated based on traveler reviews and expert recommendations.
            </p>
        </div>

        <!-- Trek Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            <!-- Trek Card 1 -->
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <!-- Badge -->
                <div class="absolute top-4 left-4 z-10">
                    <span class="px-3 py-1 bg-gradient-to-r from-red-500 to-orange-500 text-white text-xs font-bold rounded-full shadow-lg">
                        #1 Trending
                    </span>
                </div>
                
                <!-- Image Container -->
                <div class="relative h-56 lg:h-64 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1526392587636-9a0e8a0e5c6a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                        alt="Everest Base Camp Trek"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    />
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    
                    <!-- Duration -->
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-clock mr-1"></i> 14 Days
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-5 lg:p-6">
                    <!-- Difficulty & Region -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                            <i class="fas fa-mountain mr-1"></i> Challenging
                        </span>
                        <span class="text-sm text-gray-500 font-medium">
                            <i class="fas fa-map-marker-alt mr-1"></i> Khumbu
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                        Everest Base Camp Trek
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Journey to the foot of the world's highest peak. Experience Sherpa culture and breathtaking Himalayan views.
                    </p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">5,364m</div>
                            <div class="text-xs text-gray-500">Max Altitude</div>
                        </div>
                        <div class="text-center border-x">
                            <div class="text-lg font-bold text-gray-900">130km</div>
                            <div class="text-xs text-gray-500">Distance</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">4.9</div>
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-star text-yellow-500"></i> Rating
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price & CTA -->
                    <div class="flex items-center justify-between pt-4 border-t">
                        <div>
                            <div class="text-2xl font-bold text-gray-900">$1,299</div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                            View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Trek Card 2 -->
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="absolute top-4 left-4 z-10">
                    <span class="px-3 py-1 bg-gradient-to-r from-emerald-500 to-green-500 text-white text-xs font-bold rounded-full shadow-lg">
                        #2 Popular
                    </span>
                </div>
                
                <div class="relative h-56 lg:h-64 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                        alt="Annapurna Circuit"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-clock mr-1"></i> 18 Days
                    </div>
                </div>
                
                <div class="p-5 lg:p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                            <i class="fas fa-hiking mr-1"></i> Moderate
                        </span>
                        <span class="text-sm text-gray-500 font-medium">
                            <i class="fas fa-map-marker-alt mr-1"></i> Annapurna
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">
                        Annapurna Circuit Trek
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Experience diverse landscapes from subtropical forests to high mountain passes. One of the world's best treks.
                    </p>
                    
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">5,416m</div>
                            <div class="text-xs text-gray-500">Thorong La Pass</div>
                        </div>
                        <div class="text-center border-x">
                            <div class="text-lg font-bold text-gray-900">230km</div>
                            <div class="text-xs text-gray-500">Circuit</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">4.8</div>
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-star text-yellow-500"></i> Rating
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t">
                        <div>
                            <div class="text-2xl font-bold text-gray-900">$1,199</div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-semibold rounded-lg transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                            View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Trek Card 3 -->
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="absolute top-4 left-4 z-10">
                    <span class="px-3 py-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-bold rounded-full shadow-lg">
                        #3 Cultural
                    </span>
                </div>
                
                <div class="relative h-56 lg:h-64 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                        alt="Langtang Valley Trek"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-clock mr-1"></i> 10 Days
                    </div>
                </div>
                
                <div class="p-5 lg:p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                            <i class="fas fa-leaf mr-1"></i> Easy-Moderate
                        </span>
                        <span class="text-sm text-gray-500 font-medium">
                            <i class="fas fa-map-marker-alt mr-1"></i> Langtang
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">
                        Langtang Valley Trek
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Explore Tamang culture, lush forests, and close-up Himalayan views. Perfect for a shorter Himalayan experience.
                    </p>
                    
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">4,984m</div>
                            <div class="text-xs text-gray-500">Tserko Ri</div>
                        </div>
                        <div class="text-center border-x">
                            <div class="text-lg font-bold text-gray-900">65km</div>
                            <div class="text-xs text-gray-500">Distance</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">4.7</div>
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-star text-yellow-500"></i> Rating
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t">
                        <div>
                            <div class="text-2xl font-bold text-gray-900">$899</div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-lg transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                            View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Trek Card 4 -->
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="absolute top-4 left-4 z-10">
                    <span class="px-3 py-1 bg-gradient-to-r from-orange-500 to-amber-500 text-white text-xs font-bold rounded-full shadow-lg">
                        #4 Adventure
                    </span>
                </div>
                
                <div class="relative h-56 lg:h-64 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                        alt="Manaslu Circuit Trek"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-clock mr-1"></i> 16 Days
                    </div>
                </div>
                
                <div class="p-5 lg:p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">
                            <i class="fas fa-exclamation-triangle mr-1"></i> Strenuous
                        </span>
                        <span class="text-sm text-gray-500 font-medium">
                            <i class="fas fa-map-marker-alt mr-1"></i> Manaslu
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">
                        Manaslu Circuit Trek
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Remote and less crowded. Cross Larkya La Pass and experience authentic Nepalese village life.
                    </p>
                    
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">5,106m</div>
                            <div class="text-xs text-gray-500">Larkya La</div>
                        </div>
                        <div class="text-center border-x">
                            <div class="text-lg font-bold text-gray-900">177km</div>
                            <div class="text-xs text-gray-500">Circuit</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">4.9</div>
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-star text-yellow-500"></i> Rating
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t">
                        <div>
                            <div class="text-2xl font-bold text-gray-900">$1,450</div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-700 hover:to-amber-700 text-white font-semibold rounded-lg transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Show More Cards Button -->
        <div class="mt-10 lg:mt-12 text-center">
            <a href="#" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-gray-900 to-black hover:from-black hover:to-gray-900 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                View All 10 Featured Treks
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
            </a>
        </div>

        <!-- Stats Bar -->
        <div class="mt-16 lg:mt-20 bg-gradient-to-r from-blue-50 to-emerald-50 rounded-2xl p-6 lg:p-8 shadow-lg">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">10,000+</div>
                    <div class="text-sm text-gray-600 font-medium">Happy Trekkers</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">98%</div>
                    <div class="text-sm text-gray-600 font-medium">Success Rate</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">4.8/5</div>
                    <div class="text-sm text-gray-600 font-medium">Average Rating</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">20+</div>
                    <div class="text-sm text-gray-600 font-medium">Years Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<style>
    /* Custom styles for line clamping */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Smooth animations */
    .group {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Custom shadow for cards */
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    
    .hover\:shadow-2xl:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    /* Gradient text animation */
    .bg-gradient-to-r {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }
    
    @keyframes gradient {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .grid-cols-1 {
            grid-template-columns: 1fr;
        }
        
        .p-6 {
            padding: 1rem;
        }
    }
    
    @media (min-width: 641px) and (max-width: 1024px) {
        .grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 1025px) and (max-width: 1280px) {
        .grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (min-width: 1281px) {
        .xl\:grid-cols-4 {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effect to all trek cards
        const trekCards = document.querySelectorAll('.group');
        
        trekCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // View Details button interaction
        const viewButtons = document.querySelectorAll('a[href="#"]');
        viewButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const card = this.closest('.group');
                const title = card.querySelector('h3').textContent;
                
                // Create a notification
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-4 rounded-xl shadow-2xl z-50 animate-fade-in backdrop-blur-sm border border-white/20';
                notification.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-xl mr-3"></i>
                        <div>
                            <div class="font-bold">Viewing Details</div>
                            <div class="text-sm opacity-90">Opening details for: ${title}</div>
                        </div>
                    </div>
                `;
                document.body.appendChild(notification);
                
                // Remove notification after 3 seconds
                setTimeout(() => {
                    notification.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
                
                // In a real application, you would redirect to the trek details page
                console.log('Viewing details for:', title);
            });
        });
        
        // Animation for stats
        const stats = document.querySelectorAll('.text-3xl, .text-4xl');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-count-up');
                }
            });
        }, { threshold: 0.5 });
        
        stats.forEach(stat => observer.observe(stat));
    });


 FB.api(
  '/me/accounts',
  'GET',
  {},
  function(response) {
      // Insert your code here
  }
);

{
  "data": [
    {
      "access_token": "EAAX5uUOmLasBQZAIlUewFt4xDqkkhUW3trChG6RUyHykuqKZCdPvSQZBrPeNp3CMJYTSjbhZBDloMo2c0Mw80aHJtZCrZBptDSOi2TS8Dhna3hIV8pwqwGCkWledIOZBncR1TkeSPeo67JePk43X7jfSA1WDkPzzf1ZCWzxQdLwFTl1p9lZBMLxMSe1VctNZC6JbkDJSkVrLEZArAn3acYu7M8D2vX6jnU4LQZCfxzDuNs8ZD",
      "category": "Travel Service",
      "category_list": [
        {
          "id": "169581916792003",
          "name": "Travel Service"
        }
      ],
      "name": "Everest trek with strangers",
      "id": "328637084298062",
      "tasks": [
        "MODERATE",
        "MESSAGING",
        "ANALYZE",
        "ADVERTISE",
        "CREATE_CONTENT",
        "MANAGE"
      ]
    }
  ],
  "paging": {
    "cursors": {
      "before": "QVFIU1pydnAtM1ljOTdWbVozRktfY2FyTG00M1p6RTN0bWIzT0ZAaTUZA0NHo4OUt4bnhURTZAJWm8xNWExa0FtWENYRk9fdWJWNmxoZAUZAWZATVHV3pfRlZAzblZA3",
      "after": "QVFIU1pydnAtM1ljOTdWbVozRktfY2FyTG00M1p6RTN0bWIzT0ZAaTUZA0NHo4OUt4bnhURTZAJWm8xNWExa0FtWENYRk9fdWJWNmxoZAUZAWZATVHV3pfRlZAzblZA3"
    }
  }
}
</script>