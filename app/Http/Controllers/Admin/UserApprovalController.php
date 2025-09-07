<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserApprovedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserApprovalController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'pending')->get();
        return view('admin.user-approval.index', compact('users'));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);

        $defaultPassword = 'password123';

        $user->update([
            'status' => 'active',
            'password' => bcrypt($defaultPassword),
        ]);

        // kirim email
        Mail::to($user->email)->send(new UserApprovedMail($user, $defaultPassword));

        return back()->with('success', 'User berhasil disetujui dan email dikirim!');
    }
}
