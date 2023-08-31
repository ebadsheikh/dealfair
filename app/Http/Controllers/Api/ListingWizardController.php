<?php

namespace App\Http\Controllers\Api;

use App\Actions\Listing\ListingStepFiveAction;
use App\Actions\Listing\ListingStepFourAction;
use App\Actions\Listing\ListingStepOneAction;
use App\Actions\Listing\ListingStepThreeAction;
use App\Actions\Listing\ListingStepTwoAction;
use App\Enums\HttpStatusCodesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\listing\FifthStepProductRequest;
use App\Http\Requests\Api\listing\FirstStepProductRequest;
use App\Http\Requests\Api\listing\FourthStepProductRequest;
use App\Http\Requests\Api\listing\SecondStepProductRequest;
use App\Http\Requests\Api\listing\ThirdStepProductRequest;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class ListingWizardController extends Controller
{
    public function storeFirstStepProduct(FirstStepProductRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::user()->id;

            $listing = (new ListingStepOneAction())->handle($data);

            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'profile created',
                'listing' => $listing
            ], HttpStatusCodesEnum::OK);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
    }

    public function storeSecondStepProduct(Listing $listing, SecondStepProductRequest $request)
    {
        $data = $request->validated();

        (new ListingStepTwoAction())->handle($listing, $data);

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => 'Step two completed successfully',
            'listing' => $listing
        ], HttpStatusCodesEnum::OK);
    }

    public function storeThirdStepProduct(Listing $listing, ThirdStepProductRequest $request)
    {
        try {
            $data = $request->validated();

            (new ListingStepThreeAction())->handle($listing, $data);

            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'Step three completed successfully',
                'listing' => $listing
            ], HttpStatusCodesEnum::OK);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }

    }

    public function storeFourthStepProduct(Listing $listing, FourthStepProductRequest $request)
    {
        try {
            $data = $request->validated();
            $listingTags = json_decode($data['listingTags']);
            $colors = json_decode($data['colors']);

            $data['listingTags'] = $listingTags;
            $data['colors'] = $colors;

            (new ListingStepFourAction())->handle($listing, $data);

            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'Step four completed successfully',
                'listing' => $listing
            ], HttpStatusCodesEnum::OK);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
    }

    public function storeFifthStepProduct(Listing $listing, FifthStepProductRequest $request)
    {
        try {
            $data = $request->validated();

            (new ListingStepFiveAction())->handle($listing, [
                'pickUpAddress' => $data['pickUpAddress'],
                'communities' => $data['communities'], // Make sure to adjust the field name if needed
                'shippingCostPayer' => $data['shippingCostPayer'],
                'visibleRange' => $data['visibleRange'],
                'weight' => $data['weight'],
                'width' => $data['width'],
                'length' => $data['length'],
                'height' => $data['height']
            ]);
            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'Step five completed successfully',
                'listing' => $listing
            ], HttpStatusCodesEnum::OK);
        } catch (\Exception $ex) {
            return response()->json([
            'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
            'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
    }
}
