<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function setting()
    {
        $settings = Settings::pluck('value', 'key')->toArray();
        return view('admin.setting', compact('settings'));
    }

    public function storeLogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('logo')) {
            
            $oldLogo = Settings::where('key', 'site_logo')->value('value');


            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('site_logos', $fileName, 'public');


            Settings::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $filePath]
            );

            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            return redirect()->back()->with('success', 'Logo uploaded successfully!');
        }

        return redirect()->back()->with('error', 'No logo uploaded.');
    }

    public function storeFavicon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'theme_color' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('favicon')) {

            $oldFavicon = Settings::where('key', 'site_favicon')->value('value');

            $file = $request->file('favicon');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('site_favicons', $fileName, 'public');

            Settings::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $filePath]
            );

            if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                Storage::disk('public')->delete($oldFavicon);
            }

            return redirect()->back()->with('success', 'Favicon uploaded successfully!');
        }

        if ($request->input('theme_color')) {
            Settings::updateOrCreate(
                ['key' => 'theme_color'],
                ['value' => $request->input('theme_color')]
            );
            return redirect()->back()->with('success', 'Theme color updated successfully!');
        }

        return redirect()->back()->with('error', 'No favicon uploaded.');
    }

    public function storeAboutProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('about_profile')) {

            $oldProfile = Settings::where('key', 'site_about_profile')->value('value');

            $file = $request->file('about_profile');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('site_about_profile', $fileName, 'public');

            Settings::updateOrCreate(
                ['key' => 'site_about_profile'],
                ['value' => $filePath]
            );

            if ($oldProfile && Storage::disk('public')->exists($oldProfile)) {
                Storage::disk('public')->delete($oldProfile);
            }

            return redirect()->back()->with('success', 'About profile uploaded successfully!');
        }

        return redirect()->back()->with('error', 'About profile not uploaded.');
    }


    public function fontStyle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'font_style' => 'required|string|max:255',
            'google_font_links' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Settings::updateOrCreate(
            ['key' => 'font_style'],
            ['value' => $request->input('font_style')]
        );
        Settings::updateOrCreate(
            ['key' => 'google_font_links'],
            ['value' => $request->input('google_font_links')]
        );

        return redirect()->back()->with('success', 'Font style updated successfully!');
    }

    public function storeSocialLinks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|regex:/^\+\d{10,15}$/',
            'twitter' => 'nullable|url',
            'github' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save the social links to the database (assuming you have a `settings` or similar table)
        Settings::updateOrCreate(['key' => 'linkedin'], ['value' => $request->input('linkedin')]);
        Settings::updateOrCreate(['key' => 'facebook'], ['value' => $request->input('facebook')]);
        Settings::updateOrCreate(['key' => 'instagram'], ['value' => $request->input('instagram')]);
        Settings::updateOrCreate(['key' => 'whatsapp'], ['value' => $request->input('whatsapp')]);
        Settings::updateOrCreate(['key' => 'twitter'], ['value' => $request->input('twitter')]);
        Settings::updateOrCreate(['key' => 'github'], ['value' => $request->input('github')]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Social links updated successfully!');
    }

    public function storeAboutContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aboutContent' => 'required|string|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Settings::updateOrCreate(
            ['key' => 'about_content'],
            ['value' => $request->input('aboutContent')]
        );

        return redirect()->back()->with('success', 'About section content saved successfully!');
    }
    public function resume(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resume' => 'required|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('resume')) {
            // Retrieve the old resume file path from the database
            $oldResume = Settings::where('key', 'resume')->value('value');

            // Handle the new file upload
            $file = $request->file('resume');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('resume', $fileName, 'public');

            // Save the new file path to the database
            Settings::updateOrCreate(
                ['key' => 'resume'],
                ['value' => $filePath]
            );

            // Remove the old file from storage
            if ($oldResume && Storage::disk('public')->exists($oldResume)) {
                Storage::disk('public')->delete($oldResume);
            }

            return redirect()->back()->with('success', 'Resume uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Resume not uploaded.');
    }



    public function storeApis(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tiny_editor_api' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Settings::updateOrCreate(
            ['key' => 'tiny_editor_api'],
            ['value' => $request->input('tiny_editor_api')]
        );

        return redirect()->back()->with('success', 'Api keys updated successfully!');
    }

    public function storeEmailCredentials(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'smtp_server' => 'required|string',
            'smtp_port' => 'required|numeric',
            'smtp_encryption' => 'required|in:tls,ssl,none',
            'smtp_username' => 'required|email',
            'smtp_password' => 'required|string',
            'from_email' => 'required|email',
            'from_name' => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $emailSettings = [
            'smtp_server' => $request->input('smtp_server'),
            'smtp_port' => $request->input('smtp_port'),
            'smtp_encryption' => $request->input('smtp_encryption'),
            'smtp_username' => $request->input('smtp_username'),
            'smtp_password' => $request->input('smtp_password'),
            'from_email' => $request->input('from_email'),
            'from_name' => $request->input('from_name'),
        ];

        foreach ($emailSettings as $key => $value) {
            $emailSettings[$key] = trim($value);
        }

        foreach ($emailSettings as $key => $value) {
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        // Update the .env file
        try {
            ResponseHelper::updateEnv([
                'MAIL_MAILER' => 'smtp',
                'MAIL_HOST' => $emailSettings['smtp_server'],
                'MAIL_PORT' => $emailSettings['smtp_port'],
                'MAIL_ENCRYPTION' => $emailSettings['smtp_encryption'],
                'MAIL_USERNAME' => $emailSettings['smtp_username'],
                'MAIL_PASSWORD' => '"' . $emailSettings['smtp_password'] . '"',
                'MAIL_FROM_ADDRESS' => $emailSettings['from_email'],
                'MAIL_FROM_NAME' => '"' . $emailSettings['from_name'] . '"',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update .env file. Error: ' . $e->getMessage());
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Email credentials saved successfully!');
    }
}
