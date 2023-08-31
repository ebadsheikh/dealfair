<?php

namespace App\Http\Livewire\Frontend\OnBoarding;

use App\Actions\Community\StoreCommunityAction;
use App\Actions\CommunityMember\RemoveMemberFromCommunityAction;
use App\Actions\CommunityMember\StoreCommunityMemberAction;
use App\Actions\UserAddress\StoreUserAddressAction;
use App\Actions\UserProfile\StoreUserProfileAction;
use App\DTO\MediaDTO;
use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\UserAddressTypesEnum;
use App\Helpers\GlobalHelper;
use App\Jobs\UploadMediaJob;
use App\Models\Community;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormWizard extends Component
{
    use WithFileUploads;

    public int $step;
    public string $username;
    public string $telephone;
    public string $date_of_birth;

    public string $address;
    public string $city;
    public string $state;
    public string $stateCode;
    public string $zip;
    public ?int $country = null;

    public ?string $phoneCode = null;


    public string $searchCommunity;

    public mixed $image;

    public ?Collection $countries = null;

    public ?int $homeCommunityId = null;

    public mixed $governmentVerificationImage = null;

    public mixed $addressVerificationImage = null;

    public ?Community $homeCommunity = null;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->image = null;
    }

    public function mount(int $step): void
    {
        $this->image = null;
        $this->step = $step;
        $this->searchCommunity = '';
        $this->countries = Country::get();
    }

    /**
     * Checks if the rules array is empty.
     * @return bool True if the rules array is empty, false otherwise.
     */
    public function rulesEmpty(): bool
    {
        return empty($this->rules());
    }

    /**
     * Returns an array of validation rules for step two of the form.
     *
     * @return array
     */
    public function stepTwoRules(): array
    {
        return [
            'username' => 'required|unique:user_profiles',
            'telephone' => 'required|unique:user_profiles|digits:10',
            'date_of_birth' => [
                'required',
                'date',
                'before:' . Carbon::now()->subYears(18)->format('Y-m-d')
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Returns an array of validation rules for step three of the form.
     *
     * @return array
     */
    public function stepThreeRules(): array
    {
        return [
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ];
    }

    /**
     * Returns an array of validation rules for step four of the form.
     *
     * @return array
     */
    public function stepFourRules(): array
    {
        $imageRules = 'image|mimes:jpeg,png,jpg,gif|max:2048';

        $rules = [
            'governmentVerificationImage' => 'nullable',
            'addressVerificationImage' => 'nullable',
        ];

        if ($this->addressVerificationImage) {
            $rules['governmentVerificationImage'] = 'required|' . $imageRules;
        }

        if ($this->governmentVerificationImage) {
            $rules['addressVerificationImage'] = 'required|' . $imageRules;
        }

        return $rules;
    }

    /**
     * Returns an array of validation rules based on the current step of the form.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];

        switch ($this->step) {
            case 2:
                $rules = $this->stepTwoRules();
                break;
            case 3:
                $rules = $this->stepThreeRules();
                break;
            case 4:
                $rules = $this->stepFourRules();
                break;
        }

        return $rules;
    }

    /**
     * Returns an array of custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'date_of_birth.before' => 'You must be 18 years old or older to proceed.',
        ];
    }

    /**
     * Validates the form whenever a property is updated.
     *
     * @param mixed $propertyName
     * @throws ValidationException
     */
    public function updated(mixed $propertyName): void
    {
        if (!$this->rulesEmpty()) {
            $this->validateOnly($propertyName);
        }
    }

    /**
     * Returns an array containing the address information entered in step three of the form.
     *
     * @return array
     */
    public function preparedAddress(): array
    {
        $user = GlobalHelper::getUser();
        return [
            'full_name' => $user->first_name.' '.$user->last_name.' ',
            'telephone' => $user->userProfile->telephone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'state_code' => $this->stateCode,
            'zip' => $this->zip,
            'country_id' => $this->country,
            'address_type' => UserAddressTypesEnum::PRIMARY->value,
        ];
    }

    /**
     * Proceed to the next step of the form.
     *
     * @return void
     */
    public function nextStep(): void
    {
        $rules = $this->rules();

        if (!$this->rulesEmpty()) {
            $this->validate($rules);
            // Check if there are validation errors
            if ($this->getErrorBag()->any()) {
                return;
            }
        }

        switch ($this->step) {
            case 1:
                $this->phoneCode = Country::first()->phone_code;
                break;
            case 2:
                $this->interactionWithDBStepTwo();
                $this->updateOnBoardingStepInDB();
                break;
            case 3:
                $this->interactionWithDBStepThree();
                $this->updateOnBoardingStepInDB();
                break;
            case 4:
                $this->interactionWithDBStepFour();
                $this->updateOnBoardingStepInDB();
                break;
            case 5:
                $this->updateOnBoardingStepInDB();
                break;
        }

        $this->step++;
    }

    /**
     * Perform step two of the interaction with the database.
     *
     * @return void
     */
    public function interactionWithDBStepTwo(): void
    {
        $user = GlobalHelper::getUser();
        $mediaDTO = new MediaDTO(
            $this->image->getRealPath(),
            $this->image->getClientOriginalName(),
        );

        (new StoreUserProfileAction())->handle([
            'username' => $this->username,
            'date_of_birth' => $this->date_of_birth,
            'telephone' => $this->phoneCode . $this->telephone,
        ], $user);

        GlobalHelper::forgetUserCache($user->id);

        UploadMediaJob::dispatch($mediaDTO, MediaDirectoryNamesEnum::PROFILE_IMAGES->value, $user);
    }

    /**
     * Perform step three of the interaction with the database.
     *
     * @return void
     */
    public function interactionWithDBStepThree(): void
    {
        $user = GlobalHelper::getUser();
        (new StoreUserAddressAction())->handle($this->preparedAddress(), $user);
        $community = (new StoreCommunityAction())->handle($this->preparedAddress());
        (new StoreCommunityMemberAction())->handle(['user_id' => $user->id, 'community_id' => $community->id]);
        $this->homeCommunityId = $community->id;
        GlobalHelper::forgetUserCache($user->id);
    }

    /**
     * Perform step four of the interaction with the database.
     *
     * @return void
     */
    public function interactionWithDBStepFour(): void
    {
        $user = GlobalHelper::getUser();
        if ($this->addressVerificationImage !== null && $this->governmentVerificationImage !== null) {
            $addressVerificationImageDTO = new MediaDTO(
                $this->addressVerificationImage->getRealPath(),
                $this->addressVerificationImage->getClientOriginalName(),
            );
            $governmentVerificationImageDTO = new MediaDTO(
                $this->governmentVerificationImage->getRealPath(),
                $this->governmentVerificationImage->getClientOriginalName(),
            );
            UploadMediaJob::dispatch($addressVerificationImageDTO, MediaDirectoryNamesEnum::VERIFICATION_IMAGES->value, $user->userProfile);
            UploadMediaJob::dispatch($governmentVerificationImageDTO, MediaDirectoryNamesEnum::VERIFICATION_IMAGES->value, $user->userProfile);
        }
        GlobalHelper::forgetUserCache($user->id);
    }

    /**
     * Update the onboarding step for the authenticated user in the database.
     * @return void
     */
    public function updateOnBoardingStepInDB(): void
    {
        $user = GlobalHelper::getUser();
        $user->userProfile->update([
            'onboarding_step' => $this->step
        ]);
        GlobalHelper::forgetUserCache($user->id);
    }


    /**
     * Follow the community with the given ID.
     *
     * @param int $communityId
     * @return void
     */
    public function followCommunity(int $communityId): void
    {
        $user = GlobalHelper::getUser();
        (new StoreCommunityMemberAction())->addMemberInCommunity($communityId, $user->id);
    }

    /**
     * Leave the community with the given ID.
     *
     * @param int $communityId
     * @return void
     */
    public function leaveCommunity(int $communityId): void
    {
        $user = GlobalHelper::getUser();
        (new RemoveMemberFromCommunityAction())->handle($communityId, $user->id);
    }

    /**
     * Redirect to the home page upon completing the form.
     *
     * @return Redirector
     */
    public function completed(): Redirector
    {
        $this->updateOnBoardingStepInDB();
        return redirect()->route('home');
    }

    /**
     * Retrieve the user's home community, if available.
     *
     * @return ?Community
     */
    public function getHomeCommunity(): ?Community
    {
        if ($this->step === 5 && $this->homeCommunityId !== null) {
            $this->homeCommunity = Community::whereId($this->homeCommunityId)->withCount('members')->first();
        }
        return $this->homeCommunity;
    }

    /**
     * Retrieve a collection of communities filtered by search criteria.
     *
     * @return ?Collection
     */
    public function getCommunities(): ?Collection
    {
        $user = GlobalHelper::getUser();
        if ($this->step === 5) {
            $communities = Community::withCount('members')->when($this->searchCommunity != '', function ($query) {
                $query->where('zip', 'like', '%' . $this->searchCommunity . '%');
            })->with([
                'members' => function ($query) use ($user) {
                    $query->select('community_id')
                        ->where('user_id', $user->id);
                }
            ])->limit(10)
                ->get()
                ->map(function ($community) {
                    $community['is_joined'] = $community->members->isNotEmpty();
                    unset($community->members);
                    return $community;
                });
        } else {
            $communities = null;
        }

        return $communities;
    }

    /**
     * Render the Livewire component view.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.frontend.on-boarding.form-wizard')
            ->with('communities', $this->getCommunities())
            ->with('homeCommunity', $this->getHomeCommunity());
    }
}
