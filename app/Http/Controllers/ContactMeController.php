<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\ContactMe;
use Faker\Extension\Helper;
use Illuminate\Http\Request;

class ContactMeController extends Controller
{
    public function contactMe()
    {
        return view('Web.contact');
    }


    //admin function
    public function contacts()
    {
        $contacts = ContactMe::all();
        return view('admin.contacts', compact('contacts'));
    }


    // Delete a contact by ID
    public function deleteContact($id)
    {
        $contact = ContactMe::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact not found.');
        }

        if ($contact->delete()) {
            return redirect()->back()->with('success', 'Contact deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'An error occurred while deleting the contact.');
        }

    }
}
