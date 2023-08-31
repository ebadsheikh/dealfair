<?php

namespace App\Http\Livewire\Frontend\Listing;

use App\Actions\Listing\ListingStepFiveAction;
use App\Actions\Listing\ListingStepFourAction;
use App\Actions\Listing\ListingStepThreeAction;
use App\Actions\Listing\ListingStepTwoAction;
use App\Actions\UserAddress\StoreUserAddressAction;
use App\Enums\ProductConditionsEnum;
use App\Enums\ProductListingTypesEnum;
use App\Enums\ProductShippingCostPayerEnum;
use App\Enums\UserAddressTypesEnum;
use App\Helpers\CalculationHelper;
use App\Helpers\GlobalHelper;
use App\Models\Category;
use App\Models\Color;
use App\Models\Community;
use App\Models\Country;
use App\Models\Store;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;
use App\Actions\Listing\ListingStepOneAction;
use Livewire\Redirector;
use Livewire\WithFileUploads;
use App\Models\Keyword;
use App\Models\Listing;
use Livewire\Component;

class ListingWizard extends Component
{
    use WithFileUploads;

    public Listing $listing;

    public $listingTitle;
    public $showListingTitleSuggestion = false;
    public $listingTitleSearchResult;

    public $listingDetails;

    public $productCondition;

    public $category;

    public $description;


    public $listingImages = [];

    public $listingVideo = null;

    public $listingType;

    public $startingBid;
    public $productPrice;
    public $discountedProductPrice;

    public $sellSellingFee;
    public $sellProcessingFee;
    public $sellYouEarn;

    public $discountedSellingFee;
    public $discountedProcessingFee;
    public $discountedYouEarn;

    public $auctionSellingFee;
    public $auctionProcessingFee;
    public $auctionYouEarn;

    public $brandList;

    public $brand;

    public $listingTags;

    public $colorList;

    public $colors;

    public $fetchShippingAddress;

    public $showPickUpAddressForm = false;

    public $countries;

    public $pickUpAddress;

    public $address;
    public $city;
    public $state;
    public $stateCode;
    public $zip;
    public $country;

    public $shippingCostPayer;
    public $visibleRange;

    public $communities;

    public $categories;

    public int $step;

    public User $user;

    public $quantity;

    public $weight;
    public $width;
    public $length;
    public $height;

    public string $storeSlug;
    public Store $store;


    public function mount(string $storeSlug = null): void
    {
        $this->user = GlobalHelper::getUser();
        if($storeSlug !== null) {
            $this->store = Store::whereUserId($this->user->id)->whereSlug($storeSlug)->first();
        }
        $this->step = 1;
        $this->quantity = 1;
        $this->visibleRange = 25;
        $this->sellSellingFee = 0.00;
        $this->sellProcessingFee = 0.00;
        $this->sellYouEarn = 0.00;
        $this->discountedSellingFee = 0.00;
        $this->discountedProcessingFee = 0.00;
        $this->discountedYouEarn = 0.00;
        $this->auctionSellingFee = 0.00;
        $this->auctionProcessingFee = 0.00;
        $this->auctionYouEarn = 0.00;
        $this->weight = 0;
        $this->width = 0;
        $this->length = 0;
        $this->height = 0;
        $this->categories = GlobalHelper::preFetchLeafCategories();
        $this->colorList = Color::all();
        $this->fetchShippingAddress = UserAddress::whereUserId($this->user->id)->get();
        $this->countries = Country::all();
    }

    public function searchListingTitle(): void
    {
        if (!empty($this->listingTitle)) {
            $this->listingTitleSearchResult = Keyword::where('keyword', 'like', '%' . $this->listingTitle . '%')
                ->limit(5)->pluck('keyword')
                ->toArray();
            $this->showListingTitleSuggestion = true;
        } else {
            $this->showListingTitleSuggestion = false;
        }
    }

    public function updateListingTitleValue(string $listingTitleValue): void
    {
        $this->listingTitle = $listingTitleValue;

        $autoFillData = [];

        $keyword = Keyword::where('keyword', $listingTitleValue)->with(['keywordTags', 'brand'])->first();
        if ($keyword) {
            $this->category = $keyword->category_id;
            $this->brand = $keyword->brand->name;
            $autoFillData['autoFillCategory'] = $this->category;
            $autoFillData['autoFillBrand'] = $this->brand;
            $autoFillData['autoFillListingTags'] = $keyword->keywordTags->pluck('tag');
            $fetchBrands = Category::with('brands')->whereId($keyword->category_id)->first();
            if ($fetchBrands) {
                $this->brandList = $fetchBrands->brands;
                $autoFillData['brandList'] = $this->brandList;
            }
            $this->weight = $keyword->weight;
            $this->width = $keyword->width;
            $this->length = $keyword->length;
            $this->height = $keyword->height;
            $this->emit('autoCompletedListingFields', $autoFillData);
        }
        $this->updated($listingTitleValue);


        $this->showListingTitleSuggestion = false;
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
     * Returns an array of validation rules for step one of the form.
     *
     * @return array
     */
    public function stepOneRules(): array
    {
        $rules['listingTitle'] = ['required', 'min:5', 'max:80'];
        $rules['category'] = ['required'];
        $rules['productCondition'] = ['required', new Enum(ProductConditionsEnum::class)];
        $rules['description'] = ['required'];
        return $rules;
    }

    /**
     * Returns an array of validation rules for step two of the form.
     *
     * @return array
     */
    public function stepTwoRules(): array
    {
        $rules['listingImages.*'] = ['required', 'mimes:jpeg,png,jpg,gif', 'max:2048'];
        $rules['listingImages'] = ['array', 'min:1', 'max:12'];
        $rules['listingVideo'] = ['nullable', 'mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-flv,video/x-ms-wmv', 'max:5120'];
        return $rules;
    }

    /**
     * Returns an array of validation rules for step three of the form.
     *
     * @return array
     */
    public function stepThreeRules(): array
    {
        $rules['listingType'] = [
            'required',
            new Enum(ProductListingTypesEnum::class)
        ];

        if (in_array($this->listingType, [ProductListingTypesEnum::AUCTION->value, ProductListingTypesEnum::BOTH->value])) {
            $startingBidValidation = 'required|numeric|gt:0';
            if ($this->listingType === ProductListingTypesEnum::BOTH->value) {
                $startingBidValidation = $startingBidValidation . '|lt:productPrice';
            }
            $rules['startingBid'] = $startingBidValidation;
        }

        if (in_array($this->listingType, [ProductListingTypesEnum::SELL->value, ProductListingTypesEnum::BOTH->value])) {
            $rules['productPrice'] = ['required', 'numeric', 'gt:0'];
        }

        if ($this->listingType === ProductListingTypesEnum::SELL->value) {
            $rules['discountedProductPrice'] = ['nullable', 'numeric', 'gt:0', 'lt:productPrice'];
        }
        return $rules;
    }

    /**
     * Returns an array of validation rules for step four of the form.
     *
     * @return array
     */
    public function stepFourRules(): array
    {
        $rules['brand'] = ['required'];
        $rules['listingTags'] = ['required'];
        $rules['colors'] = ['required'];
        $rules['quantity'] = ['required', 'integer', 'gt:0', 'lt:1000000'];
        return $rules;
    }

    /**
     * Returns an array of validation rules for step five of the form.
     *
     * @return array
     */
    public function stepFiveRules(): array
    {
        $rules['shippingCostPayer'] = ['required', new Enum(ProductShippingCostPayerEnum::class)];
        $rules['visibleRange'] = ['required', 'integer', 'gt:0'];
        $rules['pickUpAddress'] = ['required'];

        if (in_array($this->shippingCostPayer, [ProductShippingCostPayerEnum::ME->value, ProductShippingCostPayerEnum::BUYER->value])) {
            $rules['weight'] = 'required|numeric|gt:0';
            $rules['length'] = 'required|numeric|gt:0';
            $rules['width'] = 'required|numeric|gt:0';
            $rules['height'] = 'required|numeric|gt:0';
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
            case 1:
                $rules = $this->stepOneRules();
                break;
            case 2:
                $rules = $this->stepTwoRules();
                break;
            case 3:
                $rules = $this->stepThreeRules();
                break;
            case 4:
                $rules = $this->stepFourRules();
                break;
            case 5:
                $rules = $this->stepFiveRules();
                break;
        }

        return $rules;
    }

    /**
     * Proceed to the next step of the form.
     *
     * @return void
     */
    public function nextStep(): void
    {
        $rules = $this->rules();
        $this->showListingTitleSuggestion = false;
        if (!$this->rulesEmpty()) {
            $this->validate($rules);
            // Check if there are validation errors
            if ($this->getErrorBag()->any()) {
                return;
            }
        }

        switch ($this->step) {
            case 1:
                $this->interactionWithDBStepOne();
                break;
            case 2:
                $this->interactionWithDBStepTwo();
                break;
            case 3:
                $this->interactionWithDBStepThree();
                break;
            case 4:
                $this->interactionWithDBStepFour();
                break;
            case 5:
                $this->interactionWithDBStepFive();
                break;
        }

        $this->step++;
    }

    public function interactionWithDBStepOne(): void
    {
        $stepOneData['title'] = $this->listingTitle;
        $stepOneData['category_id'] = $this->category;
        $stepOneData['product_condition'] = $this->productCondition;
        $stepOneData['description'] = $this->description;

        if(!empty($this->store)) {
            $stepOneData['store_id'] = $this->store->id;
        } else {
            $stepOneData['user_id'] = $this->user->id;
        }

        $this->listing = (new ListingStepOneAction())->handle($stepOneData);
    }

    public function interactionWithDBStepTwo(): void
    {
        (new ListingStepTwoAction())->handle($this->listing, [
            'listingImages' => $this->listingImages,
            'listingVideo' => $this->listingVideo
        ]);
    }

    public function interactionWithDBStepThree(): void
    {
        (new ListingStepThreeAction())->handle($this->listing, [
            'listingType' => $this->listingType,
            'startingBid' => $this->startingBid,
            'productPrice' => $this->productPrice,
            'discountedProductPrice' => $this->discountedProductPrice]);
    }

    public function interactionWithDBStepFour(): void
    {
        (new ListingStepFourAction())->handle($this->listing, [
            'brand' => $this->brand,
            'listingTags' => json_decode($this->listingTags),
            'colors' => $this->colors]);
    }

    public function interactionWithDBStepFive(): Redirector
    {
        (new ListingStepFiveAction())->handle($this->listing, [
            'pickUpAddress' => $this->pickUpAddress,
            'communities' => $this->communities,
            'shippingCostPayer' => $this->shippingCostPayer,
            'visibleRange' => $this->visibleRange,
            'weight' => $this->weight,
            'width' => $this->width,
            'length' => $this->length,
            'height' => $this->height
        ]);

        return redirect()->route('seller.my.listing');
    }

    public function reOrderImages(array $newOrderImages): void
    {
        $uploadedFilesMap = [];
        foreach ($this->listingImages as $file) {
            $filename = $file->getFilename();
            $uploadedFilesMap[$filename] = $file;
        }

        $reorderedFiles = [];
        foreach ($newOrderImages as $filename) {
            if (isset($uploadedFilesMap[$filename])) {
                $reorderedFiles[] = $uploadedFilesMap[$filename];
            }
        }

        $this->listingImages = $reorderedFiles;
    }

    public function updatedProductPrice($value): void
    {
        $this->productPrice = $value;
        $this->calculateSellingEarnings();
    }

    public function updatedDiscountedProductPrice($value): void
    {
        $this->discountedProductPrice = $value;
        $this->calculateDiscountedEarnings();
    }

    public function updatedStartingBid($value): void
    {
        $this->startingBid = $value;
        $this->calculateAuctionEarnings();
    }

    public function updatedVisibleRange($value): void
    {
        $this->visibleRange = $value;
        $this->plotCommunities();
    }

    public function updatedPickUpAddress($value): void
    {
        $this->pickUpAddress = $value;
        $this->plotCommunities();
    }

    public function plotCommunities(): void
    {
        $selectedPickUpAddress = UserAddress::whereUserId($this->user->id)->whereId($this->pickUpAddress)->first();
        $nearByAddresses = UserAddress::select([
            'user_addresses.*',
            DB::raw('( 3959 * acos( cos( radians(?) ) * cos( radians( latitude ) ) *
                        cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) *
                        sin( radians( latitude ) ) ) ) AS distance')
        ])
            ->having('distance', '<=', $this->visibleRange)
            ->orderBy('distance')
            ->setBindings([$selectedPickUpAddress->latitude, $selectedPickUpAddress->longitude, $selectedPickUpAddress->latitude])
            ->pluck('zip');
        $this->communities = Community::whereIn('zip', $nearByAddresses)->get();
    }

    public function calculateSellingEarnings(): void
    {
        $this->sellSellingFee = CalculationHelper::calculateSellingFee($this->productPrice);
        $this->sellProcessingFee = CalculationHelper::calculateProcessingFee($this->productPrice);
        $this->sellYouEarn = CalculationHelper::calculateEarnings($this->productPrice, $this->sellSellingFee, $this->sellProcessingFee);
    }

    public function calculateDiscountedEarnings(): void
    {
        $this->discountedSellingFee = CalculationHelper::calculateSellingFee($this->discountedProductPrice);
        $this->discountedProcessingFee = CalculationHelper::calculateProcessingFee($this->discountedProductPrice);
        $this->discountedYouEarn = CalculationHelper::calculateEarnings($this->discountedProductPrice, $this->discountedSellingFee, $this->discountedProcessingFee);
    }

    public function calculateAuctionEarnings(): void
    {
        $this->auctionSellingFee = CalculationHelper::calculateSellingFee($this->startingBid);
        $this->auctionProcessingFee = CalculationHelper::calculateProcessingFee($this->startingBid);
        $this->auctionYouEarn = CalculationHelper::calculateEarnings($this->startingBid, $this->auctionSellingFee, $this->auctionProcessingFee);
    }

    public function newPickUpAddressForm($value): void
    {
        $this->showPickUpAddressForm = $value;
    }

    public function resetAddressInputs(): void
    {
        $this->address = '';
        $this->city = '';
        $this->state = '';
        $this->zip = '';
        $this->country = '';
    }

    public function storeNewPickUpAddress(): void
    {
        $this->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        $pickUpAddress = (new StoreUserAddressAction())->handle([
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'state_code' => $this->stateCode,
            'zip' => $this->zip,
            'country_id' => $this->country,
            'address_type' => UserAddressTypesEnum::SECONDARY->value,
        ], $this->user);

        $this->fetchShippingAddress = UserAddress::whereUserId($this->user->id)->get();
        $this->pickUpAddress = $pickUpAddress->id;
        $this->newPickUpAddressForm(false);
        $this->resetAddressInputs();
    }

    public function updatedCategory($value): void
    {
        $fetchBrands = Category::with('brands')->whereId($value)->first();
        if ($fetchBrands) {
            $this->brandList = $fetchBrands->brands;
            $this->emit('brandsUpdated', $this->brandList);
        }
    }

    public function render(): View
    {
        return view('livewire.frontend.listing.listing-wizard');
    }
}
