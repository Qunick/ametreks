const API_BASE_URL = window.location.origin;
// DOM Ready Functions
document.addEventListener('DOMContentLoaded', function() {
    // Animate progress bars on page load
    const progressBars = document.querySelectorAll('.progress-fill');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 300);
    });

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.classList.add('hidden');
        }
    });
});

// Tab Switching Function
function switchTab(tabName, event) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Show selected tab
    document.getElementById(tabName).classList.remove('hidden');
    
    // Update page title
    const titles = {
        dashboard: 'Dashboard',
        tours: 'Tours & Treks',
        bookings: 'Bookings',
        reviews: 'Reviews',
        blogs: 'Blog Posts',
        users: 'Users',
        settings: 'Settings'
    };
    
    const pageTitle = document.getElementById('pageTitle');
    if (pageTitle) {
        pageTitle.textContent = titles[tabName] || 'Dashboard';
    }
    
    // Update active nav item
    if (event && event.target) {
        document.querySelectorAll('.nav-item').forEach(item => {
            item.classList.remove('sidebar-active');
        });
        
        const navItem = event.target.closest('.nav-item');
        if (navItem) {
            navItem.classList.add('sidebar-active');
        }
    }
}

// Toggle Functions
function toggleStatus(e) {
    if (e && e.currentTarget) {
        e.currentTarget.classList.toggle('active');
    }
}

function toggleReview(e) {
    if (e && e.currentTarget) {
        e.currentTarget.classList.toggle('active');
    }
}

function togglePublish(e) {
    if (e && e.currentTarget) {
        e.currentTarget.classList.toggle('active');
    }
}

function toggleUser(e) {
    if (e && e.currentTarget) {
        e.currentTarget.classList.toggle('active');
    }
}

// Booking Status Update
function updateBookingStatus(e) {
    if (!e || !e.target) return;
    
    const select = e.target;
    const selectedValue = select.value;
    
    // Update the background color based on status
    if (selectedValue === 'Confirmed') {
        select.className = 'px-3 py-1.5 border rounded-lg text-sm font-medium bg-green-50 text-green-700';
    } else if (selectedValue === 'Pending') {
        select.className = 'px-3 py-1.5 border rounded-lg text-sm font-medium bg-yellow-50 text-yellow-700';
    } else if (selectedValue === 'Completed') {
        select.className = 'px-3 py-1.5 border rounded-lg text-sm font-medium bg-blue-50 text-blue-700';
    } else if (selectedValue === 'Cancelled') {
        select.className = 'px-3 py-1.5 border rounded-lg text-sm font-medium bg-red-50 text-red-700';
    }
    
    console.log('Status updated to:', selectedValue);
}

// Modal Functions
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
}

// Toggle Feature (Greeting Card)
function toggleFeature(el) {
    if (!el || !el.dataset) return;
    
    const field = el.dataset.field;
    const value = el.classList.contains('active') ? 0 : 1;
    const msg = document.getElementById('greetingStatusMessage');

    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    fetch(`http://127.0.0.1:8000/admin/settings/toggle`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken || ""
        },
        body: JSON.stringify({ field, value })
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success) return;

        // Toggle UI
        el.classList.toggle('active');

        // Message handling
        if (msg) {
            msg.classList.remove('hidden');

            if (value === 1) {
                msg.textContent = "Greeting card enabled successfully";
                msg.classList.remove('text-red-600');
                msg.classList.add('text-green-600');

                // Open modal only when enabled
                if (field === "is_greetingCard_enabled") {
                    openModal('greetingCardModal');
                }
            } else {
                msg.textContent = "Greeting card disabled successfully";
                msg.classList.remove('text-green-600');
                msg.classList.add('text-red-600');
            }

            // Auto hide message
            setTimeout(() => {
                msg.classList.add('hidden');
            }, 2000);
        }
    })
    .catch(() => {
        if (msg) {
            msg.textContent = "Something went wrong!";
            msg.classList.remove('hidden');
            msg.classList.add('text-red-600');
        }
    });
}

// Make functions globally available
window.switchTab = switchTab;
window.toggleStatus = toggleStatus;
window.toggleReview = toggleReview;
window.togglePublish = togglePublish;
window.toggleUser = toggleUser;
window.updateBookingStatus = updateBookingStatus;
window.openModal = openModal;
window.closeModal = closeModal;
window.toggleFeature = toggleFeature;