<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserVerification\VerificationRejection;
use App\Jobs\UserVerificationRejectedReasonJob;
use App\Models\User;
use App\Models\UserVerificationRejectedReason;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserVerificationRejectedController extends Controller
{
    /**
    * Store a rejection reason for user verification.
    * @param VerificationRejection $request
    * @param User $user
    * @return RedirectResponse
     */
    public function store(VerificationRejection $request, User $user): RedirectResponse
    {
        try {
            $rejectedReason = UserVerificationRejectedReason::create([
                'user_id' => $user->id,
                'subject' => $request->subject,
                'rejected_by' => Auth::user()->id,
                'note' => $request->note
            ]);
            UserVerificationRejectedReasonJob::dispatch($user, $request->subject, $request->content);
            Session::flash('success', 'Rejection Reason Added.');
            return back();
        } catch (Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return back();
        }
    }
}
