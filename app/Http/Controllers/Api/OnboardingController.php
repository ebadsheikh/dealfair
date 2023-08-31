<?php

namespace App\Http\Controllers\Api;

use App\Actions\Community\StoreCommunityAction;
use App\Actions\CommunityMember\RemoveMemberFromCommunityAction;
use App\Actions\CommunityMember\StoreCommunityMemberAction;
use App\Actions\UserAddress\StoreUserAddressAction;
use App\Actions\UserProfile\StoreUserProfileAction;
use App\DTO\MediaDTO;
use App\Enums\HttpStatusCodesEnum;
use App\Enums\MediaDirectoryNamesEnum;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Onboarding\StepFourRequest;
use App\Http\Requests\Api\Onboarding\StepThirdRequest;
use App\Http\Requests\Api\Onboarding\StepTwoRequest;
use App\Jobs\UploadMediaJob;
use App\Models\Community;
use App\Models\CommunityMember;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\JsonResponse;

class OnboardingController extends Controller
{
    /**
     * Method getFirstStepData
     *
     * @return JsonResponse
     */
    public function getFirstStepData(): JsonResponse
    {
        $welcomeVideo = GlobalHelper::getSettingValue('step_one_welcome_video');

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'welcomeVideo' => $welcomeVideo
        ], HttpStatusCodesEnum::OK);
    }

    /**
     * Method storeSecondStepData
     *
     * @param StepTwoRequest $request
     *
     * @return JsonResponse
     */
    public function storeSecondStepData(StepTwoRequest $request): JsonResponse
    {
        try {
            $user = GlobalHelper::getUser();
            $mediaDTO = new MediaDTO(
                $request->image->getRealPath(),
                $request->image->getClientOriginalName(),
            );

            (new StoreUserProfileAction())->handle([
                'username' => $request->username,
                'date_of_birth' => $request->date_of_birth,
                'telephone' => $request->phone_code . $request->telephone,
                'onboarding_step' => 2
            ], $user);


            GlobalHelper::forgetUserCache($user->id);

            UploadMediaJob::dispatch($mediaDTO, MediaDirectoryNamesEnum::PROFILE_IMAGES->value, $user);

            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'profile created',
            ], HttpStatusCodesEnum::OK);
        } catch (Exception $ex) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Method storeThirdStepData
     *
     * @param StepThirdRequest $request
     *
     * @return JsonResponse
     */
    public function storeThirdStepData(StepThirdRequest $request): JsonResponse
    {
        try {
            $user = GlobalHelper::getUser();
            (new StoreUserAddressAction())->handle($request->validated(), $user);
            $community = (new StoreCommunityAction())->handle($request->validated());
            (new StoreCommunityMemberAction())->handle(['user_id' => $user->id, 'community_id' => $community->id]);
            GlobalHelper::forgetUserCache($user->id);

            UserProfile::whereUserId($user->id)->update([
                'onboarding_step' => 3
            ]);

            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'community created',
            ], HttpStatusCodesEnum::OK);
        } catch (Exception $ex) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Method storeFourStepData
     *
     * @param StepFourRequest $request
     *
     * @return JsonResponse
     */
    public function storeFourStepData(StepFourRequest $request): JsonResponse
    {
        try {
            $user = GlobalHelper::getUser();
            if ($request->addressVerificationImage !== null && $request->governmentVerificationImage !== null) {
                $addressVerificationImageDTO = new MediaDTO(
                    $request->addressVerificationImage->getRealPath(),
                    $request->addressVerificationImage->getClientOriginalName(),
                );
                $governmentVerificationImageDTO = new MediaDTO(
                    $request->governmentVerificationImage->getRealPath(),
                    $request->governmentVerificationImage->getClientOriginalName(),
                );
                UploadMediaJob::dispatch($addressVerificationImageDTO, MediaDirectoryNamesEnum::VERIFICATION_IMAGES->value, $user->userProfile);
                UploadMediaJob::dispatch($governmentVerificationImageDTO, MediaDirectoryNamesEnum::VERIFICATION_IMAGES->value, $user->userProfile);

                UserProfile::whereUserId($user->id)->update([
                    'onboarding_step' => 4 ,
                ]);
            }
            GlobalHelper::forgetUserCache($user->id);

            return response()->json([
                'status' => HttpStatusCodesEnum::OK,
                'message' => 'identity approved',
            ], HttpStatusCodesEnum::OK);
        } catch (Exception $ex) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'error' => $ex->getMessage(),
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Method getFiveStepData
     *
     * @return JsonResponse
     */
    public function getFiveStepData(): JsonResponse
    {
        $user = GlobalHelper::getUser();
        UserProfile::whereUserId($user->id)->update([
            'onboarding_step' => 5,
        ]);

        //$communities = Community::withCount('members')->take(10)->get();

        $communities = Community::withCount('members')->with([
                'members' => function ($query) use ($user) {
                    $query->select('community_id')
                        ->where('user_id', $user->id);
                }
            ])->get()
                ->map(function ($community) {
                    $community['is_joined'] = $community->members->isNotEmpty();
                    unset($community->members);
                    return $community;
                });

        $home_community = CommunityMember::whereUserId($user->id)->with(['community'])->latest()->first();

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'communities' => $communities,
            'home_community' => $home_community
        ], HttpStatusCodesEnum::OK);
    }

    /**
     * Method getSixStepData
     *
     * @return JsonResponse
     */
    public function getSixStepData(): JsonResponse
    {
        $user = GlobalHelper::getUser();
        UserProfile::whereUserId($user->id)->update([
            'onboarding_step' => 6,
        ]);

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'sellerVideo' => GlobalHelper::getSettingValue('step_six_seller_video'),
            'buyerVideo' => GlobalHelper::getSettingValue('step_six_buyer_video')
        ], HttpStatusCodesEnum::OK);
    }

    public function followCommunity(Community $community): JsonResponse
    {
        $user = GlobalHelper::getUser();
        (new StoreCommunityMemberAction())->addMemberInCommunity($community->id, $user->id);

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => "Community Followed Successfully",
        ], HttpStatusCodesEnum::OK);
    }

    public function leaveCommunity(Community $community): JsonResponse
    {
        $user = GlobalHelper::getUser();
        (new RemoveMemberFromCommunityAction())->handle($community->id, $user->id);

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => "Community Removed Successfully",
        ], HttpStatusCodesEnum::OK);
    }
}
