<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\UserAddress\UpdateUserAddressRequest;
use App\Http\Requests\Frontend\UserAddress\StoreUserAddressRequest;
use App\Actions\UserAddress\UpdateUserAddressAction;
use App\Actions\UserAddress\StoreUserAddressAction;
use App\Http\Controllers\Controller;
use App\Enums\UserAddressTypesEnum;
use App\Helpers\GlobalHelper;
use App\Models\UserAddress;
use App\Models\Country;
use Exception;

class UserAddressController extends Controller
{
    private StoreUserAddressAction $storeUserAddressAction;

    private UpdateUserAddressAction $updateUserAddressAction;


    public function __construct(StoreUserAddressAction $storeUserAddressAction, UpdateUserAddressAction $updateUserAddressAction)
    {
        $this->storeUserAddressAction = $storeUserAddressAction;
        $this->updateUserAddressAction = $updateUserAddressAction;
    }

    public function index()
    {
        return view('frontend.user-panel.user_addresses.index', ['countries' => Country::all()]);
    }

    public function store(StoreUserAddressRequest $request)
    {
        try {
            $user = GlobalHelper::getUser();
            $data = $request->validated();
            $data['address_type'] = UserAddressTypesEnum::SECONDARY->value;
            $this->storeUserAddressAction->handle($data, $user);
            return back()->withMessage('Address Added Successfully');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        try {
            $this->updateUserAddressAction->handle($request->validated(), $userAddress);
            return back()->withMessage('Address Updated Successfully');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function destroy(UserAddress $userAddress)
    {
        $userAddress->delete();
        return back();
    }
}
