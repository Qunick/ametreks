<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminTrekFaqController extends Controller
{
    public function index(Trek $trek)
    {
        $faqs = $trek->faqs()->orderBy('order')->get();
        
        return view('admin.treks.faq', compact('trek', 'faqs'));
    }

    public function store(Request $request, Trek $trek)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $faq = $trek->faqs()->create([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ added successfully',
            'faq' => $faq
        ]);
    }
public function storeMultiple(Request $request, Trek $trek)
{
    $validator = Validator::make($request->all(), [
        'faqs' => 'required|array|min:1',
        'faqs.*.question' => 'required|string|max:500',
        'faqs.*.answer' => 'required|string',
        'faqs.*.order' => 'nullable|integer|min:0',
        'faqs.*.is_active' => 'boolean'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $createdFaqs = [];
    foreach ($request->faqs as $faqData) {
        $faq = $trek->faqs()->create([
            'question' => $faqData['question'],
            'answer' => $faqData['answer'],
            'order' => $faqData['order'] ?? 0,
            'is_active' => $faqData['is_active'] ?? true
        ]);
        
        $createdFaqs[] = $faq;
    }

    return response()->json([
        'success' => true,
        'message' => count($request->faqs) . ' FAQ(s) added successfully',
        'faqs' => $createdFaqs
    ]);
}
    public function update(Request $request, Trek $trek, Faq $faq)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully',
            'faq' => $faq
        ]);
    }

    public function destroy(Trek $trek, Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully'
        ]);
    }

    public function updateOrder(Request $request, Trek $trek)
    {
        $request->validate([
            'faqs' => 'required|array',
            'faqs.*.id' => 'required|exists:faqs,id',
            'faqs.*.order' => 'required|integer'
        ]);

        foreach ($request->faqs as $item) {
            $trek->faqs()->where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'FAQ order updated successfully'
        ]);
    }
}