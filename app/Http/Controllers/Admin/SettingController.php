<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::getSettings();

        $validated = $request->validate([
            // General Settings
            'is_greetingCard_enabled' => 'boolean',
            'greeting_text' => 'nullable|string|max:500',
            'section_is_hide' => 'boolean',
            
            // Company Information
            'company_name' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            
            // Changing Text (JSON)
            'changing_text' => 'nullable|array',
            'changing_text.*' => 'string|max:200',
            
            // FAQ (JSON)
            'faq_questions_answer' => 'nullable|array',
            'faq_questions_answer.*.question' => 'required|string|max:500',
            'faq_questions_answer.*.answer' => 'required|string|max:2000',
            
            // Images (JSON)
            'associated_with_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            
            // Awards (JSON)
            'ame_awards' => 'nullable|array',
            'ame_awards.*' => 'string|max:255',
            
            // Footer
            'footer_text' => 'nullable|string|max:1000',
            
            // Social Media (JSON)
            'social_media_links' => 'nullable|array',
            'social_media_links.*' => 'nullable|url|max:255',
            
            'social_media_icons' => 'nullable|array',
            'social_media_icons.*' => 'nullable|string|max:50',
            
            // Additional fields
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'about_us' => 'nullable|string',
        ]);

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            // Delete old logo if exists
            if ($settings->company_logo) {
                Storage::disk('public')->delete($settings->company_logo);
            }
            
            $path = $request->file('company_logo')->store('settings', 'public');
            $validated['company_logo'] = $path;
        }

        // Handle associated with images upload
        if ($request->hasFile('associated_with_images')) {
            // Delete old images if they exist
            $oldImages = $settings->associated_with_images ?? [];
            foreach ($oldImages as $oldImage) {
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $imagePaths = [];
            foreach ($request->file('associated_with_images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('settings/partners', 'public');
                    $imagePaths[] = $path;
                }
            }
            $validated['associated_with_images'] = $imagePaths;
        }

        // Process JSON fields
        $jsonFields = ['changing_text', 'faq_questions_answer', 'ame_awards', 'social_media_links', 'social_media_icons'];
        foreach ($jsonFields as $field) {
            if (isset($validated[$field])) {
                $validated[$field] = json_encode(array_values($validated[$field]));
            }
        }

        // Ensure boolean fields are set
        $validated['greeting_is_enabled'] = $request->has('greeting_is_enabled');
        $validated['section_is_hide'] = $request->has('section_is_hide');

        $settings->update($validated);

        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully!');
    }

    public function resetToDefaults()
    {
        $settings = SiteSetting::getSettings();
        
        // Delete existing logo and images
        if ($settings->company_logo) {
            Storage::disk('public')->delete($settings->company_logo);
        }
        
        $oldImages = $settings->associated_with_images ?? [];
        foreach ($oldImages as $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }
        
        $settings->setDefaultValues();
        $settings->save();

        return redirect()->route('admin.settings')
            ->with('success', 'Settings reset to default values!');
    }
    public function toggle(Request $request)
{
    $request->validate([
        'field' => 'required|string',
        'value' => 'required|boolean',
    ]);

    $settings = SiteSetting::getSettings();

    // Allow only boolean toggle fields from SiteSetting model
    $allowedFields = [
        'is_greetingCard_enabled',
        'is_trek_enabled',
        'is_section_enabled',
        'is_departure_enabled',
        'is_booking_enabled',
        'is_reviews_enabled',
        'is_blog_enabled',
        'is_maintenance_mode',
    ];

    if (!in_array($request->field, $allowedFields)) {
        return response()->json(['message' => 'Invalid field'], 403);
    }

    $settings->{$request->field} = $request->value;
    $settings->save();

    return response()->json([
        'success' => true,
        'field' => $request->field,
        'value' => $request->value,
    ]);
}

}