<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailTemplate\StoreEmailTemplateRequest;
use App\Actions\EmailTemplate\StoreEmailTemplateAction;
use App\Actions\EmailTemplate\UpdateEmailTemplateAction;
use App\Http\Requests\Admin\EmailTemplate\UpdateEmailTemplateRequest;
use App\Models\EmailTemplate;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmailTemplateController extends Controller
{
    /**
     * The action for storing an email template.
     *
     * @var StoreEmailTemplateAction
     */
    private StoreEmailTemplateAction $storeEmailTemplateAction;

    /**
     * The action for updating an email template.
     *
     * @var UpdateEmailTemplateAction
     */
    private UpdateEmailTemplateAction $updateEmailTemplateAction;

    /**
     * Create a new EmailTemplateController instance.
     *
     * @param StoreEmailTemplateAction $storeEmailTemplateAction
     * @param UpdateEmailTemplateAction $updateEmailTemplateAction
     */
    public function __construct(StoreEmailTemplateAction $storeEmailTemplateAction, UpdateEmailTemplateAction $updateEmailTemplateAction)
    {
        $this->storeEmailTemplateAction = $storeEmailTemplateAction;
        $this->updateEmailTemplateAction = $updateEmailTemplateAction;
    }

    /**
     * Display a listing of email templates.
     *
     * @return View
     */
    public function index(): View
    {
        $emailTemplates = EmailTemplate::all();
        return view('admin.email-templates.index')->with('emailTemplates', $emailTemplates);
    }

    /**
     * Show the form for creating a new email template.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.email-templates.create');
    }

    /**
     * Store a newly created email template in storage.
     *
     * @param StoreEmailTemplateRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEmailTemplateRequest $request): RedirectResponse
    {
        try {
            $this->storeEmailTemplateAction->handle($request->validated());
            return redirect()->route('admin.email-templates.index')->withSuccess('Successfully Stored Email Template');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Show the form for editing the specified email template.
     *
     * @param EmailTemplate $emailTemplate
     * @return View
     */
    public function edit(EmailTemplate $emailTemplate): View
    {
        return view('admin.email-templates.edit')->with('emailTemplate', $emailTemplate);
    }

    /**
     * Update the specified email template in storage.
     *
     * @param UpdateEmailTemplateRequest $request
     * @param EmailTemplate $emailTemplate
     * @return RedirectResponse
     */
    public function update(UpdateEmailTemplateRequest $request, EmailTemplate $emailTemplate): RedirectResponse
    {
        try {
            $this->updateEmailTemplateAction->handle($request->validated(), $emailTemplate);
            return redirect()->route('admin.email-templates.index')->withSuccess('Successfully Updated Email Template');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }
}
