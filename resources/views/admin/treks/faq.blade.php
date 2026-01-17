@extends('admin.layouts')

@section('title', 'Manage FAQs - ' . $trek->title)

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manage FAQs</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-gray-500">{{ $trek->title }}</p>
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                        {{ $faqs->count() }} FAQs
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.treks.index') }}" 
                   class="text-gray-600 hover:text-gray-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Tours
                </a>
                <button id="addMultipleFaqsBtn"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center shadow-lg">
                    <i class="fas fa-layer-group mr-2"></i> Add Multiple FAQs
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        @if($faqs->count() > 0)
        <div id="faqList" class="space-y-4">
            @foreach($faqs as $faq)
            <div class="faq-item border border-gray-200 rounded-2xl overflow-hidden" data-id="{{ $faq->id }}">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="handle cursor-move p-2 mr-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-grip-vertical fa-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">{{ $faq->question }}</h3>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-xs px-2 py-1 rounded-full {{ $faq->is_active ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                </span>
                                <span class="text-xs text-gray-500">
                                    Order: {{ $faq->order }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="openEditModal({{ json_encode($faq) }})"
                                class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2.5 rounded-xl transition-colors">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteFaq({{ $faq->id }})"
                                class="bg-red-50 hover:bg-red-100 text-red-600 p-2.5 rounded-xl transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="px-6 py-4 bg-white">
                    <div class="prose max-w-none">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 mb-4">
                <i class="fas fa-question-circle text-4xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">No FAQs added yet</h3>
            <p class="text-gray-500 mb-4">Add frequently asked questions for this tour</p>
            <button id="addFirstFaqsBtn"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center mx-auto shadow-lg">
                <i class="fas fa-layer-group mr-2"></i> Add FAQs
            </button>
        </div>
        @endif
    </div>
</div>

{{-- Multiple FAQs Modal --}}
<div id="faqsModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Add Multiple FAQs</h3>
                <div class="flex items-center space-x-2">
                    <button onclick="addNewFaqForm()" 
                            class="bg-green-600 text-white px-3 py-1.5 rounded-lg hover:bg-green-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add Another
                    </button>
                    <button type="button" onclick="closeFaqsModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div class="space-y-6" id="faqFormsContainer">
                <!-- FAQ Forms will be added here dynamically -->
            </div>
            
            <div class="flex justify-between items-center pt-6 border-t mt-6">
                <div class="text-sm text-gray-500">
                    <span id="faqCount">0</span> FAQ(s) ready to save
                </div>
                <div class="flex space-x-3">
                    <button type="button" 
                            onclick="closeFaqsModal()"
                            class="px-4 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="button" 
                            onclick="saveAllFaqs()"
                            id="saveAllFaqsBtn"
                            class="bg-blue-600 text-white px-4 py-2.5 rounded-xl hover:bg-blue-700 transition-colors">
                        Save All FAQs
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Single Edit Modal --}}
<div id="editFaqModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <form id="editFaqForm" method="POST" class="p-6">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" id="editFaqId">
            
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Edit FAQ</h3>
                <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Question *</label>
                    <input type="text" 
                           name="question" 
                           id="editQuestion"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Answer *</label>
                    <div id="editAnswerEditor" class="min-h-[200px] border border-gray-300 rounded-lg focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent">
                        <div class="border-b border-gray-200 bg-gray-50 p-2 rounded-t-lg flex flex-wrap gap-1">
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditCommand('bold')" title="Bold">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditCommand('italic')" title="Italic">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditCommand('underline')" title="Underline">
                                <i class="fas fa-underline"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300 mx-1"></div>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditCommand('insertUnorderedList')" title="Bullet List">
                                <i class="fas fa-list-ul"></i>
                            </button>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditCommand('insertOrderedList')" title="Numbered List">
                                <i class="fas fa-list-ol"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300 mx-1"></div>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditCommand('createLink', prompt('Enter URL:'))" title="Insert Link">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                        <div id="editAnswerContent" 
                             class="min-h-[150px] px-4 py-3 overflow-auto prose max-w-none"
                             contenteditable="true"></div>
                        <textarea id="editAnswer" 
                                  name="answer" 
                                  class="hidden" 
                                  required></textarea>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" 
                               name="order" 
                               id="editOrder"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               min="0">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center mt-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" 
                                       name="is_active" 
                                       id="editIsActive"
                                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-6 border-t mt-6">
                <button type="button" 
                        onclick="closeEditModal()"
                        class="px-4 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2.5 rounded-xl hover:bg-blue-700 transition-colors">
                    Update FAQ
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Sortable JS -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

<script>
// FAQ counter
let faqCounter = 1;

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Sortable
    const faqList = document.getElementById('faqList');
    if (faqList) {
        new Sortable(faqList, {
            animation: 150,
            handle: '.handle',
            ghostClass: 'bg-blue-50',
            onEnd: function(evt) {
                updateFaqOrder();
            }
        });
    }
    
    // Setup modal events
    setupModalEvents();
    
    // Add event listeners
    const addMultipleFaqsBtn = document.getElementById('addMultipleFaqsBtn');
    const addFirstFaqsBtn = document.getElementById('addFirstFaqsBtn');
    
    if (addMultipleFaqsBtn) {
        addMultipleFaqsBtn.addEventListener('click', openMultipleFaqsModal);
    }
    
    if (addFirstFaqsBtn) {
        addFirstFaqsBtn.addEventListener('click', openMultipleFaqsModal);
    }
    
    // Add first FAQ form on modal open
    const faqsModal = document.getElementById('faqsModal');
    if (faqsModal) {
        faqsModal.addEventListener('show', function() {
            setTimeout(() => {
                addNewFaqForm();
            }, 100);
        });
    }
});

function setupModalEvents() {
    const faqsModal = document.getElementById('faqsModal');
    const editModal = document.getElementById('editFaqModal');
    
    if (faqsModal) {
        faqsModal.addEventListener('click', function(e) {
            if (e.target === faqsModal) {
                closeFaqsModal();
            }
        });
    }
    
    if (editModal) {
        editModal.addEventListener('click', function(e) {
            if (e.target === editModal) {
                closeEditModal();
            }
        });
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeFaqsModal();
            closeEditModal();
        }
    });
}

function openMultipleFaqsModal() {
    const modal = document.getElementById('faqsModal');
    if (!modal) return;
    
    // Clear existing forms
    document.getElementById('faqFormsContainer').innerHTML = '';
    faqCounter = 1;
    
    // Add first form
    addNewFaqForm();
    
    // Show modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeFaqsModal() {
    const modal = document.getElementById('faqsModal');
    if (!modal) return;
    
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
    
    // Reset
    document.getElementById('faqFormsContainer').innerHTML = '';
    faqCounter = 1;
    updateFaqCount();
}

function addNewFaqForm() {
    const container = document.getElementById('faqFormsContainer');
    const faqNumber = faqCounter++;
    
    const formId = `faqForm_${faqNumber}`;
    const questionId = `question_${faqNumber}`;
    const answerEditorId = `answerEditor_${faqNumber}`;
    const answerContentId = `answerContent_${faqNumber}`;
    const answerInputId = `answerInput_${faqNumber}`;
    const orderId = `order_${faqNumber}`;
    
    const formHtml = `
        <div class="faq-form-item border border-gray-200 rounded-xl p-5 bg-gray-50">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-semibold text-gray-700">FAQ #${faqNumber}</h4>
                ${faqNumber > 1 ? `
                <button type="button" 
                        onclick="removeFaqForm(this)"
                        class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
                ` : ''}
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Question *</label>
                    <input type="text" 
                           id="${questionId}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent question-input"
                           placeholder="What should I pack for the trek?"
                           required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Answer *</label>
                    <div id="${answerEditorId}" class="answer-editor min-h-[150px] border border-gray-300 rounded-lg focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent">
                        <div class="border-b border-gray-200 bg-gray-50 p-2 rounded-t-lg flex flex-wrap gap-1">
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditorCommand('${answerContentId}', 'bold')" title="Bold">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditorCommand('${answerContentId}', 'italic')" title="Italic">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditorCommand('${answerContentId}', 'underline')" title="Underline">
                                <i class="fas fa-underline"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300 mx-1"></div>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditorCommand('${answerContentId}', 'insertUnorderedList')" title="Bullet List">
                                <i class="fas fa-list-ul"></i>
                            </button>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditorCommand('${answerContentId}', 'insertOrderedList')" title="Numbered List">
                                <i class="fas fa-list-ol"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300 mx-1"></div>
                            <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execEditorCommand('${answerContentId}', 'createLink', prompt('Enter URL:'))" title="Insert Link">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                        <div id="${answerContentId}" 
                             class="min-h-[100px] px-4 py-3 overflow-auto prose max-w-none answer-content"
                             contenteditable="true"
                             data-input-id="${answerInputId}"></div>
                        <textarea id="${answerInputId}" 
                                  class="hidden answer-input" 
                                  required></textarea>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" 
                               id="${orderId}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent order-input"
                               min="0"
                               value="${faqNumber}">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center mt-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" 
                                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 active-input"
                                       checked>
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', formHtml);
    
    // Initialize editor for this form
    initEditor(answerContentId, answerInputId);
    updateFaqCount();
}

function removeFaqForm(button) {
    const formItem = button.closest('.faq-form-item');
    if (formItem) {
        formItem.remove();
        updateFaqCount();
    }
}

function initEditor(contentId, inputId) {
    const content = document.getElementById(contentId);
    const input = document.getElementById(inputId);
    
    if (content && input) {
        content.addEventListener('input', function() {
            input.value = this.innerHTML;
        });
        
        // Initial sync
        input.value = content.innerHTML;
    }
}

function execEditorCommand(contentId, command, value = null) {
    const content = document.getElementById(contentId);
    if (!content) return;
    
    content.focus();
    
    if (command === 'createLink' && value) {
        document.execCommand(command, false, value);
    } else {
        document.execCommand(command, false, null);
    }
    
    // Update hidden input
    const inputId = content.getAttribute('data-input-id');
    const input = document.getElementById(inputId);
    if (input) {
        input.value = content.innerHTML;
    }
}

function updateFaqCount() {
    const forms = document.querySelectorAll('.faq-form-item');
    const count = forms.length;
    document.getElementById('faqCount').textContent = count;
    
    // Update button text
    const saveBtn = document.getElementById('saveAllFaqsBtn');
    if (saveBtn) {
        saveBtn.textContent = `Save ${count} FAQ${count !== 1 ? 's' : ''}`;
    }
}

async function saveAllFaqs() {
    const forms = document.querySelectorAll('.faq-form-item');
    if (forms.length === 0) {
        showToast('Please add at least one FAQ', 'error');
        return;
    }
    
    // Validate all forms
    let isValid = true;
    const faqsData = [];
    
    forms.forEach((form, index) => {
        const question = form.querySelector('.question-input').value.trim();
        const answer = form.querySelector('.answer-input').value.trim();
        const order = parseInt(form.querySelector('.order-input').value) || (index + 1);
        const isActive = form.querySelector('.active-input').checked;
        
        if (!question || !answer) {
            isValid = false;
            showToast(`FAQ #${index + 1} has missing fields`, 'error');
            return;
        }
        
        faqsData.push({
            question: question,
            answer: answer,
            order: order,
            is_active: isActive ? 1 : 0
        });
    });
    
    if (!isValid) return;
    
    // Show loading
    const saveBtn = document.getElementById('saveAllFaqsBtn');
    const originalText = saveBtn.innerHTML;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
    saveBtn.disabled = true;
    
    try {
        const response = await fetch('{{ route("admin.treks.faq.store-multiple", $trek) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ faqs: faqsData })
        });
        
        const result = await response.json();
        
        if (response.ok && result.success) {
            showToast(`${faqsData.length} FAQ(s) added successfully`, 'success');
            
            // Close modal and refresh page
            setTimeout(() => {
                closeFaqsModal();
                window.location.reload();
            }, 1500);
        } else {
            if (result.errors) {
                Object.keys(result.errors).forEach(key => {
                    showToast(result.errors[key][0], 'error');
                });
            } else {
                showToast('Error saving FAQs', 'error');
            }
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('An error occurred. Please try again.', 'error');
    } finally {
        // Restore button
        saveBtn.innerHTML = originalText;
        saveBtn.disabled = false;
    }
}

// Single Edit Functions
function openEditModal(faqData) {
    const modal = document.getElementById('editFaqModal');
    const form = document.getElementById('editFaqForm');
    
    form.action = `/admin/treks/{{ $trek->id }}/faq/${faqData.id}`;
    document.getElementById('editFaqId').value = faqData.id;
    
    // Populate form
    document.getElementById('editQuestion').value = faqData.question;
    document.getElementById('editOrder').value = faqData.order;
    document.getElementById('editIsActive').checked = faqData.is_active;
    
    // Populate editor
    const editor = document.getElementById('editAnswerContent');
    const answerInput = document.getElementById('editAnswer');
    if (editor) {
        editor.innerHTML = faqData.answer;
        answerInput.value = faqData.answer;
    }
    
    // Show modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeEditModal() {
    const modal = document.getElementById('editFaqModal');
    if (!modal) return;
    
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

function execEditCommand(command, value = null) {
    const editor = document.getElementById('editAnswerContent');
    if (!editor) return;
    
    editor.focus();
    
    if (command === 'createLink' && value) {
        document.execCommand(command, false, value);
    } else {
        document.execCommand(command, false, null);
    }
    
    // Update hidden input
    const answerInput = document.getElementById('editAnswer');
    answerInput.value = editor.innerHTML;
}

// Edit form submission
document.getElementById('editFaqForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    
    // Update answer from editor
    const answerInput = document.getElementById('editAnswer');
    const editor = document.getElementById('editAnswerContent');
    answerInput.value = editor.innerHTML;
    formData.set('answer', answerInput.value);
    
    // Set is_active value
    formData.set('is_active', document.getElementById('editIsActive').checked ? 1 : 0);
    
    try {
        const response = await fetch(form.action, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        });
        
        const result = await response.json();
        
        if (response.ok && result.success) {
            showToast('FAQ updated successfully', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('Error updating FAQ', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('An error occurred. Please try again.', 'error');
    }
});

// Delete function
async function deleteFaq(faqId) {
    if (!confirm('Are you sure you want to delete this FAQ?')) {
        return;
    }
    
    try {
        const response = await fetch(`/admin/treks/{{ $trek->id }}/faq/${faqId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });
        
        const result = await response.json();
        
        if (response.ok && result.success) {
            showToast('FAQ deleted successfully', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('Error deleting FAQ', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('An error occurred. Please try again.', 'error');
    }
}

async function updateFaqOrder() {
    const faqItems = document.querySelectorAll('.faq-item');
    const faqs = [];
    
    faqItems.forEach((item, index) => {
        const id = item.getAttribute('data-id');
        faqs.push({
            id: id,
            order: index + 1
        });
    });
    
    try {
        const response = await fetch('{{ route("admin.treks.faq.update-order", $trek) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ faqs: faqs })
        });
        
        const result = await response.json();
        
        if (response.ok && result.success) {
            showToast('Order updated successfully', 'success');
        } else {
            showToast('Error updating order', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function showToast(message, type = 'info') {
    const existingToast = document.querySelector('.toast-message');
    if (existingToast) {
        existingToast.remove();
    }
    
    const toast = document.createElement('div');
    toast.className = `toast-message fixed top-4 right-4 px-4 py-3 rounded-lg shadow-lg z-50 transform transition-transform duration-300 ${
        type === 'success' ? 'bg-green-100 text-green-800 border border-green-200' :
        type === 'error' ? 'bg-red-100 text-red-800 border border-red-200' :
        'bg-blue-100 text-blue-800 border border-blue-200'
    }`;
    
    toast.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} mr-2"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    requestAnimationFrame(() => {
        toast.classList.remove('transform');
        toast.classList.add('translate-y-0');
    });
    
    setTimeout(() => {
        toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}
</script>

<style>
.handle {
    cursor: move;
}

.handle:hover {
    color: #4f46e5;
}

.sortable-ghost {
    opacity: 0.4;
    background-color: #f3f4f6;
}

.sortable-drag {
    background-color: #ffffff;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.toast-message {
    transform: translateY(-20px);
    opacity: 0;
    animation: slideDown 0.3s ease-out forwards;
}

@keyframes slideDown {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.answer-content:focus,
#editAnswerContent:focus {
    outline: none;
}

.answer-content ul,
#editAnswerContent ul {
    list-style-type: disc;
    padding-left: 1.5rem;
    margin: 0.5rem 0;
}

.answer-content ol,
#editAnswerContent ol {
    list-style-type: decimal;
    padding-left: 1.5rem;
    margin: 0.5rem 0;
}

.answer-content a,
#editAnswerContent a {
    color: #2563eb;
    text-decoration: underline;
}

.answer-content a:hover,
#editAnswerContent a:hover {
    color: #1d4ed8;
}

.prose {
    color: #374151;
    line-height: 1.75;
}

.prose p {
    margin-top: 0.5em;
    margin-bottom: 0.5em;
}

.faq-form-item {
    transition: all 0.3s ease;
}

.faq-form-item:hover {
    border-color: #93c5fd;
    background-color: #f8fafc;
}
</style>
@endsection