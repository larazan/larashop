<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;

use Session;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $this->data['system_name'] = $setting->value;
        $address = Setting::find(5);
        $this->data['address'] = $address->value;
        $email = Setting::find(6);
        $this->data['email'] = $email->value;
        $phone = Setting::find(7);
        $this->data['phone'] = $phone->value;
        return $this->loadTheme('contact.index', $this->data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->body = $request->body;

        // $contact->save();

        if ($contact->save()) {
            $email = Setting::find(6);
            $email_address = $email->value;
            // send email
            \Mail::send(
                'themes/ezone/contact/contact_email',
                array(
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'subject' => $request->get('subject'),
                    'phone' => $request->get('phone'),
                    'body' => $request->get('body'),
                ),
                function ($message) use ($request) {
                    $message->from($request->email);
                    $message->to($email_address);
                }
            );

            Session::flash('success', 'Thank you for contact us!');
        } else {
            Session::flash('error', 'There is something wrong!');
        }

        return redirect('contact');
    }
}
