<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class EmailTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the mapping of template keys to subject lines
        $subjectLines = [
            'new_customer_from_admin' => 'Welcome to Dealfair®',
            'email_verification_code' => 'Dealfair Email Verification Code',
            'reset_password' => 'Dealfair Reset Password Link',
            'user_verification_rejection' => 'User Verification Rejection',
        ];

        // Get all blade files in the email-templates directory
        $files = File::glob(resource_path('views/email-templates/*.blade.php'));

        foreach ($files as $file) {
            // Extract the file name without the extension and use it as the template key
            $key = pathinfo($file, PATHINFO_FILENAME);

            $fileName = str_replace('.blade', '', $key);

            // Define the email template data
            $templateData = [
                'name' => ucwords(str_replace('_', ' ', $fileName)),
                'key' => $fileName,
                'subject' => $subjectLines[$fileName] ?? '',
                'content' => View::make("email-templates.$fileName")->render(),
            ];

            // Create the email template record in the database, or update an existing record with the same key
            EmailTemplate::firstOrCreate(['key' => $fileName], $templateData);

        }
    }
}
