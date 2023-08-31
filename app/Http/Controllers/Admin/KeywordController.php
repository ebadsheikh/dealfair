<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Enums\KeywordStatusEnum;
use Illuminate\View\View;
use App\Models\Keyword;
use Exception;

class KeywordController extends Controller
{
    public function index(): View
    {
        return view('admin.keywords.index');
    }

    public function create(): View
    {
        return view('admin.keywords.create');
    }

    public function edit(Keyword $keyword): View
    {
        return view('admin.keywords.edit')->with('keyword', $keyword);
    }

    public function destroy(Keyword $keyword): RedirectResponse
    {
        try {
            $keyword->delete();
            Session::flash('success', 'Keyword deleted successfully');
            return redirect()->route('admin.keywords.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function updateStatus(Keyword $keyword, KeywordStatusEnum $status): RedirectResponse
    {
        try {
            $keyword->update(['status' => $status]);
            Session::flash('success', 'Keyword status updated');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
        }
        return back();
    }
}
