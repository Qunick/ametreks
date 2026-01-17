let currentBooking = null;
function setTrekType(type) {
    const groupBtn = document.getElementById('modal-group-btn');
    const privateBtn = document.getElementById('modal-private-btn');
    const groupDate = document.getElementById('group-date-selection');
    const privateDate = document.getElementById('private-date-selection');
    const isPrivateField = document.getElementById('is_private');
    
    if (type === 'private') {
        groupBtn.classList.remove('active', 'bg-[#005991]', 'text-white');
        groupBtn.classList.add('text-gray-700');
        privateBtn.classList.add('active', 'bg-[#005991]', 'text-white');
        privateBtn.classList.remove('text-gray-700');
        
        groupDate.classList.add('hidden');
        privateDate.classList.remove('hidden');
        isPrivateField.value = '1';
        document.querySelector('input[name="custom_date"]').required = true;
        document.querySelector('select[name="preferred_date"]').required = false;
    } else {
        groupBtn.classList.add('active', 'bg-[#005991]', 'text-white');
        groupBtn.classList.remove('text-gray-700');
        privateBtn.classList.remove('active', 'bg-[#005991]', 'text-white');
        privateBtn.classList.add('text-gray-700');
        
        groupDate.classList.remove('hidden');
        privateDate.classList.add('hidden');
        isPrivateField.value = '0';
        document.querySelector('select[name="preferred_date"]').required = true;
        document.querySelector('input[name="custom_date"]').required = false;
    }
    
    updatePrice();
}

function updateGroupSize(change) {
    const groupSizeInput = document.getElementById('modal-group-size');
    let currentSize = parseInt(groupSizeInput.value);
    currentSize += change;
    
    if (currentSize >= 1 && currentSize <= 12) {
        groupSizeInput.value = currentSize;
        document.getElementById('summary-group-size').textContent = currentSize;
        updatePrice();
    }
}

function updatePrice() {
        const groupSizeInput = document.getElementById('modal-group-size');
    const isPrivateInput = document.getElementById('is_private');
      if (!groupSizeInput || !isPrivateInput) {
        console.log('Booking form elements not found on this page - skipping price update');
        return;
    }
  const groupSize = parseInt(groupSizeInput.value);
    const isPrivate = isPrivateInput.value === '1';
    const basePrice = 1500;
    const privateMultiplier = 1.3;
    
    let totalPrice = basePrice * groupSize;
    
    if (isPrivate) {
        totalPrice *= privateMultiplier;
    }
    
    document.getElementById('summary-price').textContent = '$' + totalPrice;
    document.getElementById('total-price').textContent = '$' + totalPrice;
    document.getElementById('total_amount').value = totalPrice;
}
document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('passport_photo');
    
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.getElementById('passport-preview');
                    const previewImg = document.getElementById('passport-preview-img');
                    
                    if (previewImg) {
                        previewImg.src = e.target.result;
                    }
                    if (previewDiv) {
                        previewDiv.classList.remove('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    }
    
    const groupBtn = document.getElementById('modal-group-btn');
    const privateBtn = document.getElementById('modal-private-btn');
    if (groupBtn) groupBtn.addEventListener('click', () => setTrekType('group'));
    if (privateBtn) privateBtn.addEventListener('click', () => setTrekType('private'));
    const minusBtn = document.getElementById('modal-minus-btn');
    const plusBtn = document.getElementById('modal-plus-btn');
    
    if (minusBtn) minusBtn.addEventListener('click', (e) => {
        e.preventDefault();
        updateGroupSize(-1);
    });
    if (plusBtn) plusBtn.addEventListener('click', (e) => {
        e.preventDefault();
        updateGroupSize(1);
    });
    updatePrice();
    const urlParams = new URLSearchParams(window.location.search);
    const trekName = urlParams.get('trek');
    const isOffer = urlParams.get('offer') === '1';
    
    const trekNameInput = document.getElementById('trek_name');
    const trekNameDisplay = document.getElementById('trek-name-display');
    const pageTitle = document.querySelector('#bookingForm h1 span');
    
    if (trekName) {
        if (trekNameInput) trekNameInput.value = trekName;
        if (trekNameDisplay) trekNameDisplay.textContent = trekName + ' (x';
        if (pageTitle) pageTitle.textContent = trekName;
    }
    
    if (isOffer) {
        const isOfferInput = document.getElementById('is_offer');
        if (isOfferInput) isOfferInput.value = '1';
    }
});

// Form submission
document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('bookingForm');
    if (!bookingForm) return;
    
    bookingForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Validate form
        if (!validateForm()) {
            return;
        }
        
        const formData = new FormData(this);
        
        // Ensure all required fields are included
        const isPrivate = document.getElementById('is_private').value === '1';
        formData.set('is_private', isPrivate ? '1' : '0');
        
        if (isPrivate) {
            const customDate = document.querySelector('input[name="custom_date"]').value;
            if (!customDate) {
                showError('Please select a custom start date for private trek.');
                return;
            }
            formData.set('preferred_date', customDate);
        }
        
        // Convert is_offer to 1 or 0
        const isOfferInput = document.getElementById('is_offer');
        const isOffer = isOfferInput ? isOfferInput.value === '1' : false;
        formData.set('is_offer', isOffer ? '1' : '0');

        console.log('FormData entries:');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            if (!csrfToken) {
                showError('Security token not found. Please refresh the page.');
                return;
            }
            
            const response = await fetch(document.querySelector('form').getAttribute('action') || '/bookings', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success && data.booking) {
                currentBooking = data.booking;
                showConfirmationModal(data.booking);
            } else {
                // Show validation errors
                if (data.errors) {
                    let errorMessage = 'Please fix the following errors:\n';
                    for (const [field, errors] of Object.entries(data.errors)) {
                        errorMessage += `• ${field}: ${Array.isArray(errors) ? errors.join(', ') : errors}\n`;
                    }
                    showError(errorMessage);
                } else {
                    showError(data.message || 'Error creating booking. Please try again.');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            showError('An error occurred. Please try again.');
        }
    });
});

// Form validation
function validateForm() {
    const bookingForm = document.getElementById('bookingForm');
    if (!bookingForm) return false;
    
    const requiredFields = bookingForm.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value || !field.value.trim()) {
            isValid = false;
            field.classList.add('border-red-500');
        } else {
            field.classList.remove('border-red-500');
        }
    });
    
    // Check terms agreement
    const termsCheckbox = document.getElementById('terms');
    if (termsCheckbox && !termsCheckbox.checked) {
        isValid = false;
        showError('Please agree to the terms and conditions.');
    }
    
    return isValid;
}

// Show error message
function showError(message) {
    alert(message);
}

// Show confirmation modal
function showConfirmationModal(booking) {
    const modal = document.getElementById('confirmationModal');
    if (!modal) return;
    
    const depositAmount = (parseFloat(booking.total_amount) * 0.3).toFixed(2);
    
    const modalHTML = `
        <div class="fixed inset-0 bg-[#005991]/90 backdrop-blur-sm" onclick="closeConfirmationModal()"></div>
        <div class="relative w-full max-w-2xl mx-auto my-8">
            <div class="bg-white rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl">
                <div class="p-6 md:p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="bi bi-check-lg text-3xl text-green-600"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900">Booking Confirmation</h3>
                        <p class="text-gray-600">Booking #${booking.booking_number || booking.id}</p>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-600 text-sm">Trek Name</p>
                                <p class="font-semibold">${booking.trek_name || 'N/A'}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Booking Type</p>
                                <p class="font-semibold">${booking.is_private ? 'Private Trek' : 'Group Trek'}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Departure Date</p>
                                <p class="font-semibold">${new Date(booking.preferred_date).toLocaleDateString()}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Group Size</p>
                                <p class="font-semibold">${booking.group_size || 1} person(s)</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Total Amount</p>
                                <p class="font-semibold">$${parseFloat(booking.total_amount).toFixed(2)}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Deposit Required (30%)</p>
                                <p class="font-semibold">$${depositAmount}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Payment Details</h4>
                        <div class="flex items-center justify-between p-4 bg-white rounded-lg border border-gray-200 mb-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-blue-600 font-bold">HBL</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Himalayan Bank Limited</p>
                                    <p class="text-sm text-gray-600">Secure Payment Gateway</p>
                                </div>
                            </div>
                            <i class="bi bi-lock-fill text-green-600 text-xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 text-center">
                            You will be redirected to Himalayan Bank's secure payment portal
                        </p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <input type="checkbox" id="payment-agreement" class="mt-1 mr-3">
                            <label for="payment-agreement" class="text-gray-700 text-sm">
                                I have read and agree to the payment terms. I understand that a 30% deposit is required to confirm my booking, and the balance is due 30 days before departure.
                            </label>
                        </div>
                        
                        <div class="flex gap-4">
                            <button onclick="closeConfirmationModal()" class="flex-1 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 py-3 rounded-xl font-semibold transition-all">
                                Cancel
                            </button>
                            <button onclick="proceedToPayment(${booking.id})" id="proceed-payment-btn" disabled class="flex-1 bg-gray-400 text-white py-3 rounded-xl font-bold transition-all cursor-not-allowed">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    modal.innerHTML = modalHTML;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Enable proceed button when agreement is checked
    document.getElementById('payment-agreement').addEventListener('change', function() {
        const proceedBtn = document.getElementById('proceed-payment-btn');
        if (this.checked) {
            proceedBtn.disabled = false;
            proceedBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
            proceedBtn.classList.add('bg-[#005991]', 'hover:bg-[#052734]', 'cursor-pointer');
        } else {
            proceedBtn.disabled = true;
            proceedBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
            proceedBtn.classList.remove('bg-[#005991]', 'hover:bg-[#052734]', 'cursor-pointer');
        }
    });
}

function closeConfirmationModal() {
    const modal = document.getElementById('confirmationModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

async function proceedToPayment(bookingId) {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!csrfToken) {
            showError('Security token not found.');
            return;
        }
        
        const response = await fetch('/bookings/confirm-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                booking_id: bookingId,
                agreement: true
            })
        });
        
        const data = await response.json();
        
        if (data.success && data.redirect_data) {
            closeConfirmationModal();
            redirectToPaymentGateway(data.redirect_data);
        } else {
            showError(data.message || 'Payment processing failed. Please try again.');
        }
    } catch (error) {
        console.error('Error:', error);
        showError('An error occurred during payment.');
    }
}

function redirectToPaymentGateway(data) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'https://pay.ametreks.com/hbldemo/payment_request.php';
    const fields = {
        'price': data.price,
        'userDefined1': data.userDefined1,
        'userDefined2': data.userDefined2,
        'productDesc': data.productDesc
    };
    
    for (const [key, value] of Object.entries(fields)) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
    
    document.body.appendChild(form);
    form.submit();
}


function showPaymentSuccessModal(data) {
}

function closePaymentSuccessModal() {
}

// 9103331831
// $secretKey = "GT5CR172SEUYY6BGDFHCPEJNIR8RBNDY"