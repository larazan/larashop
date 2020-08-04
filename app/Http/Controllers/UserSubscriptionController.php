<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Subscription;

class UserSubscriptionController extends Controller
{
    //
    public function postSubscribe(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:attributes,email'
        ]);

        // Storage::append('emails.txt', $request->input('email'));
        $params = $request->except('_token');
        $params['status'] = 'active';

        Subscription::create($params);

        return response()->json(['success' => true]);
    }
}
