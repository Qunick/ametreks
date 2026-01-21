@extends('layouts.app')

@section('title', 'Book Your Trek - AME Treks & Expeditions')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 md:py-12">
    <div class="container mx-auto px-4 md:px-6">
        <!-- Booking Header -->
        <div class="max-w-4xl mx-auto mb-8 md:mb-12 text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Book Your <span class="text-[#005991]">Adventure</span>
            </h1>
            <p class="text-gray-600 text-lg md:text-xl">
                Complete the form below to secure your spot on this unforgettable journey
            </p>
        </div>

        <!-- Booking Form Container -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl overflow-hidden">
                <div class="p-4 md:p-6 lg:p-8">
                    <form id="bookingForm" class="space-y-6 md:space-y-8">
                        <!-- CSRF Token -->
                        @csrf
                        
                        <!-- Trek Type -->
                        <div>
                            <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-3 md:mb-4">Trek Type</h4>
                            <div class="inline-flex rounded-xl border border-gray-300 p-0.5 md:p-1 bg-gray-50">
                                <button type="button" id="modal-group-btn" class="px-4 py-1.5 md:px-6 md:py-2 rounded-lg font-medium transition-all trek-type-btn active bg-[#005991] text-white text-xs md:text-sm">
                                    <i class="bi bi-people-fill mr-1 md:mr-2"></i>Join Group
                                </button>
                                <button type="button" id="modal-private-btn" class="px-4 py-1.5 md:px-6 md:py-2 rounded-lg font-medium transition-all trek-type-btn text-gray-700 text-xs md:text-sm">
                                    <i class="bi bi-person-fill mr-1 md:mr-2"></i>Private Trek
                                </button>
                            </div>
                        </div>
                        
                        <!-- Personal Information -->
                        <div>
                            <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                                <i class="bi bi-person-fill text-[#005991] mr-2 md:mr-3"></i>
                                Personal Information
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Full Name *</label>
                                    <input type="text" name="full_name" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Email Address *</label>
                                    <input type="email" name="email" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Phone Number *</label>
                                    <input type="tel" name="phone" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Nationality *</label>
                                    <select name="nationality" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                        <option value="">Select Country</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                        <option value="CA">Canada</option>
                                        <option value="DE">Germany</option>
                                        <option value="FR">France</option>
                                        <option value="NP">Nepal</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Passport Number *</label>
                                    <input type="text" name="passport_number" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Date of Birth *</label>
                                    <input type="date" name="date_of_birth" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">
                                        Passport Photo *
                                        <span class="text-gray-500 text-xs">(Recent color photo, 35mm x 45mm, white background)</span>
                                    </label>
                                    <div class="flex items-center gap-4">
                                        <div class="relative w-32 h-32 border-2 border-dashed border-gray-300 rounded-xl flex items-center justify-center">
                                            <input type="file" id="passport_photo" name="passport_photo" accept="image/*" required 
                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                            <div class="text-center p-4">
                                                <i class="bi bi-camera text-3xl text-gray-400 mb-2"></i>
                                                <p class="text-xs text-gray-500">Upload Photo</p>
                                            </div>
                                        </div>
                                        <div id="passport-preview" class="hidden">
                                            <img id="passport-preview-img" class="w-32 h-32 object-cover rounded-xl border border-gray-300">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Trek Details -->
                        <div>
                            <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                                <i class="bi bi-calendar-fill text-[#005991] mr-2 md:mr-3"></i>
                                Trek Details
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div id="group-date-selection">
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Preferred Departure Date *</label>
                                    <select name="preferred_date" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                        <option value="">Select Date</option>
                                        <option value="2025-03-15">March 15, 2025</option>
                                        <option value="2025-04-05">April 5, 2025</option>
                                        <option value="2025-04-20">April 20, 2025</option>
                                        <option value="2025-05-10">May 10, 2025</option>
                                    </select>
                                </div>
                                <div id="private-date-selection" class="hidden">
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Custom Start Date *</label>
                                    <input type="date" name="custom_date" class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Group Size *</label>
                                    <div class="flex items-center border border-gray-300 rounded-xl px-3 py-2 md:px-4 md:py-3 bg-gray-50">
                                        <button type="button" id="modal-minus-btn" class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center text-gray-600 hover:text-[#005991]">
                                            <i class="bi bi-dash text-base md:text-lg"></i>
                                        </button>
                                        <div class="flex-1 text-center">
                                            <input type="number" id="modal-group-size" name="group_size" value="1" min="1" max="12" class="text-center bg-transparent border-none w-full text-xl md:text-2xl font-bold text-gray-900" readonly>
                                            <span class="text-gray-600 text-xs md:text-sm">Person(s)</span>
                                        </div>
                                        <button type="button" id="modal-plus-btn" class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center text-gray-600 hover:text-[#005991]">
                                            <i class="bi bi-plus text-base md:text-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Accommodation Preference -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Accommodation Type *</label>
                                    <select name="accommodation_type" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                        <option value="shared">Shared Room (Twin Sharing)</option>
                                        <option value="private">Private Room (Single)</option>
                                    </select>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Special Requests</label>
                                    <textarea name="special_requests" rows="3" class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base" placeholder="Dietary requirements, medical conditions, etc."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Add-ons Section -->
                        <div>
                            <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                                <i class="bi bi-plus-circle-fill text-[#005991] mr-2 md:mr-3"></i>
                                Optional Add-ons
                            </h4>
                            <div class="space-y-3 md:space-y-4">
                                <!-- Porter Service -->
                                <label class="flex items-start md:items-center p-3 md:p-4 border border-gray-300 rounded-xl hover:border-[#005991] hover:bg-blue-50/50 cursor-pointer transition-all">
                                    <input type="checkbox" name="addons[]" value="porter" class="mt-1 md:mt-0 mr-3 md:mr-4 w-5 h-5 text-[#005991] rounded focus:ring-[#005991]/20">
                                    <div class="flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h5 class="font-bold text-gray-900 text-sm md:text-base">Porter Service</h5>
                                                <p class="text-gray-600 text-xs md:text-sm mt-1">Personal porter to carry your luggage (Max 15kg)</p>
                                            </div>
                                            <div class="mt-2 md:mt-0">
                                                <span class="font-bold text-[#005991] text-sm md:text-base">+$100 per person</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Travel Insurance -->
                                <label class="flex items-start md:items-center p-3 md:p-4 border border-gray-300 rounded-xl hover:border-[#005991] hover:bg-blue-50/50 cursor-pointer transition-all">
                                    <input type="checkbox" name="addons[]" value="insurance" class="mt-1 md:mt-0 mr-3 md:mr-4 w-5 h-5 text-[#005991] rounded focus:ring-[#005991]/20">
                                    <div class="flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h5 class="font-bold text-gray-900 text-sm md:text-base">Comprehensive Travel Insurance</h5>
                                                <p class="text-gray-600 text-xs md:text-sm mt-1">Medical, evacuation, and trip cancellation coverage</p>
                                            </div>
                                            <div class="mt-2 md:mt-0">
                                                <span class="font-bold text-[#005991] text-sm md:text-base">+$150 per person</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Gear Rental -->
                                <label class="flex items-start md:items-center p-3 md:p-4 border border-gray-300 rounded-xl hover:border-[#005991] hover:bg-blue-50/50 cursor-pointer transition-all">
                                    <input type="checkbox" name="addons[]" value="gear_rental" class="mt-1 md:mt-0 mr-3 md:mr-4 w-5 h-5 text-[#005991] rounded focus:ring-[#005991]/20">
                                    <div class="flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h5 class="font-bold text-gray-900 text-sm md:text-base">Premium Gear Rental Package</h5>
                                                <p class="text-gray-600 text-xs md:text-sm mt-1">Sleeping bag, down jacket, trekking poles, duffel bag</p>
                                            </div>
                                            <div class="mt-2 md:mt-0">
                                                <span class="font-bold text-[#005991] text-sm md:text-base">+$75 per person</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Satellite Phone -->
                                <label class="flex items-start md:items-center p-3 md:p-4 border border-gray-300 rounded-xl hover:border-[#005991] hover:bg-blue-50/50 cursor-pointer transition-all">
                                    <input type="checkbox" name="addons[]" value="satellite_phone" class="mt-1 md:mt-0 mr-3 md:mr-4 w-5 h-5 text-[#005991] rounded focus:ring-[#005991]/20">
                                    <div class="flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h5 class="font-bold text-gray-900 text-sm md:text-base">Satellite Phone Rental</h5>
                                                <p class="text-gray-600 text-xs md:text-sm mt-1">Emergency communication device with limited minutes</p>
                                            </div>
                                            <div class="mt-2 md:mt-0">
                                                <span class="font-bold text-[#005991] text-sm md:text-base">+$200 total</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Oxygen Cylinder -->
                                <label class="flex items-start md:items-center p-3 md:p-4 border border-gray-300 rounded-xl hover:border-[#005991] hover:bg-blue-50/50 cursor-pointer transition-all">
                                    <input type="checkbox" name="addons[]" value="oxygen_cylinder" class="mt-1 md:mt-0 mr-3 md:mr-4 w-5 h-5 text-[#005991] rounded focus:ring-[#005991]/20">
                                    <div class="flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h5 class="font-bold text-gray-900 text-sm md:text-base">Emergency Oxygen Cylinder</h5>
                                                <p class="text-gray-600 text-xs md:text-sm mt-1">Portable oxygen for high-altitude emergencies</p>
                                            </div>
                                            <div class="mt-2 md:mt-0">
                                                <span class="font-bold text-[#005991] text-sm md:text-base">+$250 total</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Photography Package -->
                                <label class="flex items-start md:items-center p-3 md:p-4 border border-gray-300 rounded-xl hover:border-[#005991] hover:bg-blue-50/50 cursor-pointer transition-all">
                                    <input type="checkbox" name="addons[]" value="photography" class="mt-1 md:mt-0 mr-3 md:mr-4 w-5 h-5 text-[#005991] rounded focus:ring-[#005991]/20">
                                    <div class="flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div>
                                                <h5 class="font-bold text-gray-900 text-sm md:text-base">Professional Photography Package</h5>
                                                <p class="text-gray-600 text-xs md:text-sm mt-1">Dedicated photographer + edited digital photos</p>
                                            </div>
                                            <div class="mt-2 md:mt-0">
                                                <span class="font-bold text-[#005991] text-sm md:text-base">+$500 total</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Hidden Fields for Trek Data -->
                        <input type="hidden" id="trek_name" name="trek_name" value="{{ request('trek') ?? 'Everest Base Camp Trek' }}">
                        <input type="hidden" id="is_offer" name="is_offer" value="{{ request('offer') ? 1 : 0 }}">
                        <input type="hidden" id="is_private" name="is_private" value="0">
                        <input type="hidden" id="base_price" name="base_price" value="1500">
                        <input type="hidden" id="total_amount" name="total_amount" value="1500">
                        
                        <!-- Payment Summary -->
                        <div class="bg-gray-50 rounded-xl md:rounded-2xl p-4 md:p-6">
                            <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                                <i class="bi bi-credit-card-fill text-[#005991] mr-2 md:mr-3"></i>
                                Payment Summary
                            </h4>
                            <div class="space-y-3 md:space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 text-sm md:text-base" id="trek-name-display">{{ request('trek') ?? 'Everest Base Camp Trek' }} (x<span id="summary-group-size">1</span>)</span>
                                    <span class="font-bold text-sm md:text-base" id="summary-price">$1,500</span>
                                </div>
                                
                                <!-- Add-ons Summary (Dynamic) -->
                                <div id="addons-summary" class="space-y-2">
                                    <!-- Add-ons will be dynamically added here -->
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 text-sm md:text-base">Booking Fee</span>
                                    <span class="font-bold text-sm md:text-base">$0</span>
                                </div>
                                <div class="border-t border-gray-300 pt-3 md:pt-4">
                                    <div class="flex justify-between items-center text-lg md:text-xl font-bold text-[#005991]">
                                        <span>Total Amount</span>
                                        <span id="total-price">$1,500</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <span class="text-gray-600 text-sm">30% Deposit Required</span>
                                        <span class="font-bold text-[#99C723]" id="deposit-amount">$450</span>
                                    </div>
                                    <p class="text-xs md:text-sm text-gray-600 mt-1 md:mt-2">* Balance due 30 days before departure</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Terms & Submit -->
                        <div class="space-y-4 md:space-y-6">
                            <div class="flex items-start">
                                <input type="checkbox" id="terms" name="terms" required class="mt-1 mr-2 md:mr-3">
                                <label for="terms" class="text-gray-700 text-xs md:text-sm">
                                    I agree to the <a href="#" class="text-[#005991] hover:underline">Terms & Conditions</a> and confirm that I have read and understood the trek requirements, including fitness level and equipment needed.
                                </label>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                                <button type="button" onclick="window.history.back()" class="flex-1 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 py-3 md:py-4 rounded-xl font-semibold transition-all text-sm md:text-base">
                                    Cancel
                                </button>
                                <button type="submit" class="flex-1 bg-[#005991] hover:bg-[#052734] text-white py-3 md:py-4 rounded-xl font-bold transition-all hover:shadow-xl text-sm md:text-base">
                                    Proceed to Payment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="fixed inset-0 z-[200] hidden items-center justify-center p-3 md:p-4 overflow-y-auto">
    <!-- Will be populated by JavaScript -->
</div>

<!-- Payment Success Modal -->
<div id="paymentSuccessModal" class="fixed inset-0 z-[300] hidden items-center justify-center p-3 md:p-4 overflow-y-auto">
    <!-- Will be populated by JavaScript -->
</div>

<!-- JavaScript for Booking Form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Pricing configuration
    const pricing = {
        basePrice: 1500,
        addons: {
            porter: 100,
            insurance: 150,
            gear_rental: 75,
            satellite_phone: 200,
            oxygen_cylinder: 250,
            photography: 500
        }
    };

    // Elements
    const groupSizeInput = document.getElementById('modal-group-size');
    const minusBtn = document.getElementById('modal-minus-btn');
    const plusBtn = document.getElementById('modal-plus-btn');
    const addonsCheckboxes = document.querySelectorAll('input[name="addons[]"]');
    const summaryGroupSize = document.getElementById('summary-group-size');
    const summaryPrice = document.getElementById('summary-price');
    const totalPrice = document.getElementById('total-price');
    const depositAmount = document.getElementById('deposit-amount');
    const addonsSummary = document.getElementById('addons-summary');
    const basePriceInput = document.getElementById('base_price');
    const totalAmountInput = document.getElementById('total_amount');

    // Group size controls
    minusBtn.addEventListener('click', () => {
        let current = parseInt(groupSizeInput.value);
        if (current > 1) {
            groupSizeInput.value = current - 1;
            updatePricing();
        }
    });

    plusBtn.addEventListener('click', () => {
        let current = parseInt(groupSizeInput.value);
        if (current < 12) {
            groupSizeInput.value = current + 1;
            updatePricing();
        }
    });

    // Add-ons change handler
    addonsCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updatePricing);
    });

    // Update pricing function
    function updatePricing() {
        const groupSize = parseInt(groupSizeInput.value);
        let totalAddons = 0;
        let addonsList = [];

        // Calculate add-ons
        addonsCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const addonValue = checkbox.value;
                const addonPrice = pricing.addons[addonValue];
                
                // Check if addon is per person or total
                const isPerPerson = ['porter', 'insurance', 'gear_rental'].includes(addonValue);
                const addonTotal = isPerPerson ? addonPrice * groupSize : addonPrice;
                
                totalAddons += addonTotal;
                
                // Add to addons list for display
                addonsList.push({
                    name: getAddonName(addonValue),
                    price: addonTotal,
                    isPerPerson: isPerPerson
                });
            }
        });

        // Calculate totals
        const baseTotal = pricing.basePrice * groupSize;
        const grandTotal = baseTotal + totalAddons;
        const deposit = grandTotal * 0.3;

        // Update display
        summaryGroupSize.textContent = groupSize;
        summaryPrice.textContent = `$${baseTotal.toLocaleString()}`;
        totalPrice.textContent = `$${grandTotal.toLocaleString()}`;
        depositAmount.textContent = `$${deposit.toLocaleString()}`;

        // Update hidden inputs
        basePriceInput.value = pricing.basePrice;
        totalAmountInput.value = grandTotal;

        // Update addons summary
        updateAddonsSummary(addonsList, groupSize);
    }

    function getAddonName(value) {
        const names = {
            porter: 'Porter Service',
            insurance: 'Travel Insurance',
            gear_rental: 'Gear Rental',
            satellite_phone: 'Satellite Phone',
            oxygen_cylinder: 'Oxygen Cylinder',
            photography: 'Photography Package'
        };
        return names[value] || value;
    }

    function updateAddonsSummary(addonsList, groupSize) {
        addonsSummary.innerHTML = '';
        
        if (addonsList.length === 0) {
            return;
        }

        addonsList.forEach(addon => {
            const div = document.createElement('div');
            div.className = 'flex justify-between items-center';
            
            const nameSpan = document.createElement('span');
            nameSpan.className = 'text-gray-600 text-sm md:text-base';
            nameSpan.textContent = addon.name;
            if (addon.isPerPerson) {
                nameSpan.textContent += ` (x${groupSize})`;
            }
            
            const priceSpan = document.createElement('span');
            priceSpan.className = 'font-bold text-sm md:text-base text-[#005991]';
            priceSpan.textContent = `+$${addon.price.toLocaleString()}`;
            
            div.appendChild(nameSpan);
            div.appendChild(priceSpan);
            addonsSummary.appendChild(div);
        });
    }

    // Form submission
    const bookingForm = document.getElementById('bookingForm');
    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        if (!validateForm()) {
            return;
        }

        // Show confirmation modal
        showConfirmationModal();
    });

    function validateForm() {
        // Basic validation
        const requiredFields = bookingForm.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                isValid = false;
            } else {
                field.classList.remove('border-red-500');
            }
        });

        return isValid;
    }

    function showConfirmationModal() {
        // Collect form data
        const formData = new FormData(bookingForm);
        const data = Object.fromEntries(formData.entries());

        // Create modal content
        const modalContent = `
            <div class="relative bg-white rounded-2xl max-w-md w-full p-6 md:p-8">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="bi bi-check-circle-fill text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Confirm Booking</h3>
                    <p class="text-gray-600">Please review your booking details before proceeding to payment.</p>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 md:p-6 mb-6">
                    <h4 class="font-bold text-gray-900 mb-3">Booking Summary</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Trek:</span>
                            <span class="font-medium">${data.trek_name}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Travelers:</span>
                            <span class="font-medium">${data.group_size} person(s)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Date:</span>
                            <span class="font-medium">${data.preferred_date || data.custom_date}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Amount:</span>
                            <span class="font-bold text-[#005991]">$${data.total_amount}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Deposit Required:</span>
                            <span class="font-bold text-[#99C723]">$${(data.total_amount * 0.3).toFixed(0)}</span>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button onclick="closeModal('confirmationModal')" class="flex-1 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 py-3 rounded-xl font-semibold transition-all">
                        Edit Details
                    </button>
                    <button onclick="processPayment()" class="flex-1 bg-[#005991] hover:bg-[#052734] text-white py-3 rounded-xl font-bold transition-all">
                        Confirm & Pay
                    </button>
                </div>
            </div>
        `;

        // Show modal
        const modal = document.getElementById('confirmationModal');
        modal.innerHTML = modalContent;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Initialize pricing
    updatePricing();
});

// Modal functions
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function processPayment() {
    // Simulate payment processing
    setTimeout(() => {
        closeModal('confirmationModal');
        showPaymentSuccess();
    }, 1000);
}

function showPaymentSuccess() {
    const modalContent = `
        <div class="relative bg-white rounded-2xl max-w-md w-full p-6 md:p-8">
            <div class="text-center">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="bi bi-check-circle-fill text-4xl text-green-600"></i>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Booking Confirmed!</h3>
                <p class="text-gray-600 mb-6">Your booking has been confirmed. We've sent a confirmation email with all the details.</p>
                
                <div class="bg-green-50 rounded-xl p-4 mb-6">
                    <p class="text-green-800 font-medium">Booking Reference: <span class="font-bold">TRK-${Date.now().toString().slice(-6)}</span></p>
                </div>

                <div class="space-y-3">
                    <button onclick="closeModal('paymentSuccessModal'); window.location.href = '/dashboard'" class="w-full bg-[#005991] hover:bg-[#052734] text-white py-3 rounded-xl font-bold transition-all">
                        Go to Dashboard
                    </button>
                    <button onclick="closeModal('paymentSuccessModal')" class="w-full border-2 border-gray-300 text-gray-700 hover:bg-gray-50 py-3 rounded-xl font-semibold transition-all">
                        Book Another Trek
                    </button>
                </div>
            </div>
        </div>
    `;

    const modal = document.getElementById('paymentSuccessModal');
    modal.innerHTML = modalContent;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

// Trek type toggle
document.getElementById('modal-group-btn').addEventListener('click', function() {
    document.getElementById('modal-group-btn').classList.add('active', 'bg-[#005991]', 'text-white');
    document.getElementById('modal-private-btn').classList.remove('active', 'bg-[#005991]', 'text-white');
    document.getElementById('modal-private-btn').classList.add('text-gray-700');
    document.getElementById('group-date-selection').classList.remove('hidden');
    document.getElementById('private-date-selection').classList.add('hidden');
    document.getElementById('is_private').value = '0';
});

document.getElementById('modal-private-btn').addEventListener('click', function() {
    document.getElementById('modal-private-btn').classList.add('active', 'bg-[#005991]', 'text-white');
    document.getElementById('modal-group-btn').classList.remove('active', 'bg-[#005991]', 'text-white');
    document.getElementById('modal-group-btn').classList.add('text-gray-700');
    document.getElementById('group-date-selection').classList.add('hidden');
    document.getElementById('private-date-selection').classList.remove('hidden');
    document.getElementById('is_private').value = '1';
    
    // Set minimum date for private trek
    const today = new Date().toISOString().split('T')[0];
    document.querySelector('input[name="custom_date"]').min = today;
});

// Passport photo preview
document.getElementById('passport_photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('passport-preview');
            const previewImg = document.getElementById('passport-preview-img');
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
});

</script>
@endsection