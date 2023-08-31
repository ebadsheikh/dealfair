<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ChangePasswordFromAdmin\ChangePasswordAction;
use App\Actions\Customer\StoreCustomerAction;
use App\Actions\Customer\UpdateCustomerAction;
use App\Enums\ProductStatusEnum;
use App\Enums\UserStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePassword\ChangePasswordRequest;
use App\Http\Requests\Admin\Customer\StoreCustomerRequest;
use App\Http\Requests\Admin\Customer\UpdateCustomerRequest;
use App\Jobs\NewCustomerFromAdminJob;
use App\Models\Country;
use App\Models\EmailTemplate;
use App\Models\Listing;
use App\Models\ReportedUser;
use App\Models\User;
use App\Services\CustomerDetailService;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomerController extends Controller
{
    /**
     * private variable to customerDetailService.
     */
    private CustomerDetailService $customerDetailService;

    /**
     * private variable to storeCustomerAction.
     */
    private StoreCustomerAction $storeCustomerAction;

    /**
     * private variable to updateCustomerAction.
     */
    private UpdateCustomerAction $updateCustomerAction;

    /**
     * private variable to customerService.
     */
    private CustomerService $customerService;

    /**
     * private variable to changePasswordAction.
     */
    private ChangePasswordAction $changePasswordAction;

    /**
     * This is a constructor method.
     *
     * @param StoreCustomerAction $storeCustomerAction
     * @param UpdateCustomerAction $updateCustomerAction
     * @param CustomerDetailService $customerDetailService
     * @param CustomerService $customerService
     * @param ChangePasswordAction $changePasswordAction
     */
    public function __construct(
        StoreCustomerAction   $storeCustomerAction,
        UpdateCustomerAction  $updateCustomerAction,
        CustomerDetailService $customerDetailService,
        CustomerService $customerService,
        ChangePasswordAction $changePasswordAction
    ) {
        $this->storeCustomerAction = $storeCustomerAction;
        $this->updateCustomerAction = $updateCustomerAction;
        $this->customerDetailService = $customerDetailService;
        $this->customerService = $customerService;
        $this->changePasswordAction = $changePasswordAction;
    }

    /**
     * Display a listing of the customers.
     * @return View
     */
    public function index(): View
    {
        $stats = $this->customerService->getDatewiseCustomersCount();
        return view('admin.customers.index', $stats);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.customers.create', ['countries' => Country::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCustomerRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        try {
            $customer = $this->storeCustomerAction->handle($request->validated());
            NewCustomerFromAdminJob::dispatch($customer);
            Session::flash('success', 'Customer Stored Successfully');
            return redirect()->route('admin.customers.index');
        } catch (Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $listings = Listing::whereUserId($user->id)->get();
        $userData = $this->customerDetailService->getUserData($user);
        $userCommunites = $user->communities->loadCount(['listings', 'members', 'listings as sold_listings_count' => function ($query) {
            $query->byStatus(ProductStatusEnum::SOLD->value);
        }]);
        $reportedUsers = ReportedUser::whereReportedTo($user->id)->with(['reportedTo', 'reportedBy'])->get();
        $emailTemplate = EmailTemplate::where('key', 'user_verification_rejection')->first();
        return view('admin.customers.detail', [
            'user' => $user->load(['userProfile'])->loadCount(['listings', 'communities']),
            'userCommunites' => $userCommunites,
            'countries' => Country::all(),
            'userData' => $userData,
            'listings' => $listings,
            'reportedUsers' => $reportedUsers,
            'emailTemplate' => $emailTemplate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCustomerRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, User $user): RedirectResponse
    {
        try {
            $this->updateCustomerAction->handle($request->validated(), $user);
            Session::flash('success', 'Customer Updated Successfully');
            return back();
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', 'User Deleted Successfully');
        return back();
    }

    /**
     * change status of resource from storage.
     */
    public function changeStatus(User $user, UserStatusEnum $status)
    {
        try {
            $user->userProfile->update([
                'status' => $status
            ]);
            Session::flash('success', 'Status changed Successfully');
            return back();
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * approved or reject verification status
     */
    public function changeVerificationStatus(User $user, $verificationBadge)
    {

        try {
            $user->userProfile->update([
                'is_verification_badge_allowed' => $verificationBadge
            ]);
            Session::flash('success', 'Identity Verified');
            return back();
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * download media
     */
    public function downloadVerification(Media $media)
    {
        return $media;
    }


    /**
     * Update the user's password.
     *
     * @param ChangePasswordRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updatePassword(ChangePasswordRequest $request, User $user): RedirectResponse
    {
        try {
            $this->changePasswordAction->handle($request->validated(), $user);
            Session::flash('success', 'Password Updated Successfully');
            return back();
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }
}
