<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Community\UpdateCommunityAction;
use App\Actions\CommunityMember\UpdateCommunityMemberAction;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Community\UpdateCommunityRequest;
use App\Http\Requests\Admin\CommunityMember\UpdateCommunityMemberRequest;
use App\Models\Community;
use App\Models\CommunityMember;
use App\Models\User;
use App\Services\CommunityService;
use Exception;
use Illuminate\Support\Facades\Session;

class CommunityController extends Controller
{
    private CommunityService $communityService;

    private UpdateCommunityMemberAction $updateCommunityMemberAction;

    private UpdateCommunityAction $updateCommunityAction;

    public function __construct(CommunityService $communityService, UpdateCommunityMemberAction $updateCommunityMemberAction, UpdateCommunityAction $updateCommunityAction)
    {
        $this->communityService = $communityService;
        $this->updateCommunityMemberAction = $updateCommunityMemberAction;
        $this->updateCommunityAction = $updateCommunityAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stats = $this->communityService->getDatewiseCommunityCount();
        return view('admin.communities.all', $stats);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        $community_member = CommunityMember::whereCommunityId($community->id)->whereIsAdmin(1)->with(['community'])->first();
        return view('admin.communities.edit', ['community_member' => $community_member,'customers' => User::role(RolesEnum::CUSTOMER->value)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunityMemberRequest $request, Community $community)
    {
        $this->updateCommunityMemberAction->handle($request->validated(), $community);
        return redirect()->route('admin.communities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return back()->withMessage('Record deleted!');
    }

    /**
     * Update community image.
     */
    public function updateCommunityImage(UpdateCommunityRequest $request, Community $community)
    {
        try {
            $this->updateCommunityAction->updateImage($request->validated(), $community);
            Session::flash('success', 'Image Updated Successfully');
            return back();
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong');
            return back();
        }

    }
}
