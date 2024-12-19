<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactMe;
use App\Models\EmailTemplate;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class EmailController extends Controller
{
    //view all
    public function emailTemplate()
    {
        $templates = EmailTemplate::all();
        return view('admin.email.emails-template', compact('templates'));
    }

    public function addTemplate()
    {
        return view('admin.email.add-template');
    }

    public function editTemplate($id)
    {
        $template = EmailTemplate::find($id);
        if(!$template){
            return redirect()->back()->with('error', 'Template not found!');
        }
        return view('admin.email.edit-template', compact('template'));
    }

    //store
    public function storeTemplate(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        EmailTemplate::create([
            'title' => $validatedData['title'],
            'subject' => $validatedData['subject'],
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('admin.email-template')->with('success', 'Email template created successfully!');
    }

    public function updateTemplate(Request $request, $id)
    {

        $template = EmailTemplate::findOrFail($id);

        if(!$template){
            return redirect()->back()->with('error', 'Template not found!');
        }
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update template with validated data
        $template->update([
            'title' => $validatedData['title'],
            'subject' => $validatedData['subject'],
            'content' => $validatedData['content'],
        ]);

        // Redirect with success message
        return redirect()->route('admin.email-template')->with('success', 'Email template updated successfully!');
    }



    //status
    public function templateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:email_templates,id',
            'status' => 'required|in:active,inactive',
        ]);

        $template = EmailTemplate::find($request->id);
        if(!$template){
            return redirect()->back()->with('error', 'Template not found!');
        }
        if ($template) {
            $template->status = $request->status;
            $template->save();

            return ResponseHelper::success(null, 'Email template status updated successfully!');
        }

        return ResponseHelper::error('Email status update failed');
    }

    //delete
    public function deleteTemplate($id)
    {

        $template = EmailTemplate::findOrFail($id);
        if(!$template){
            return redirect()->back()->with('error', 'Template not found!');
        }
        $template->delete();

        return redirect()->route('admin.email-template')->with('success', 'Template deleted successfully.');
    }


    public function sendTestEmail()
    {
        try {
            $fromEmail = env('MAIL_FROM_ADDRESS');
            $fromName = env('MAIL_FROM_NAME');

            $to = 'akashfablead01@gmail.com';
            $subject = 'Test Email from AakashAp';
            $message = 'This is a simple test email. Your mail functionality is working fine';

            Mail::raw($message, function ($message) use ($to, $subject, $fromEmail, $fromName) {
                $message->to($to)
                    ->subject($subject)
                    ->from($fromEmail, $fromName);
            });

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (Exception $e) {
            Log::error('Error sending test email: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to send email. Please try again later. Error: ' . $e->getMessage());
        }
    }

    public function sendEmail(Request $request)
    {
        $type = $request->input('type');
        $userId = $request->input('user_id');
        $templateId = $request->input('template_id');

        $template = EmailTemplate::find($templateId);
        if(!$template){
            return redirect()->back()->with('error', 'Template not found!');
        }

        try {
            if ($type === 'user') {
                if ($userId) {

                    $user = User::find($userId);
                    if (!$user) {
                        return redirect()->back()->with('error', 'User not found.');
                    }
                    ResponseHelper::sendMail($user->email, $template, $user->name);
                } else {

                    $users = User::all();
                    foreach ($users as $user) {
                        ResponseHelper::sendMail($user->email, $template, $user->name);
                    }
                    return redirect()->back()->with('success', 'Emails sent to all user successfully.');
                }
            } elseif ($type === 'contact_me') {

                if ($userId) {
                    $contact = ContactMe::find($userId);
                    if (!$contact) {
                        return redirect()->back()->with('error', 'Contact-Me user not found.');
                    }
                    ResponseHelper::sendMail($contact->email, $template,  $contact->name);
                } else {
                    $contacts = ContactMe::all();
                    foreach ($contacts as $contact) {
                        ResponseHelper::sendMail($contact->email, $template, $contact->name);
                    }
                    return redirect()->back()->with('success', 'Emails sent to all contact-me user successfully.');
                }

            } else {
                return redirect()->back()->with('error', 'Invalid email type.');
            }

            return redirect()->back()->with('success', 'Emails sent successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
