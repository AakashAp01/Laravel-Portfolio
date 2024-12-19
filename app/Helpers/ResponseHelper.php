<?php

namespace App\Helpers;

use App\Models\Settings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ResponseHelper
{
    /**
     * Generate a success response.
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public static function success($data = null, $message = null, $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Generate an error response.
     *
     * @param string $message
     * @param int $status
     * @param array|null $errors
     * @return JsonResponse
     */
    public static function error(string $message, int $status = 400, array $errors = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }


    public static function updateEnv(array $data)
    {
        $envFilePath = base_path('.env');
        $envContent = File::get($envFilePath);

        foreach ($data as $key => $value) {
            $envContent = preg_replace(
                "/^{$key}=[^\n]*/m",
                "{$key}={$value}",
                $envContent
            );
        }

        File::put($envFilePath, $envContent);
    }

    public static function sendMail($to, $template, $username)
    {
        // Retrieve all necessary settings
        $settings = Settings::pluck('value', 'key');
        $adminName = $settings['from_name'] ?? 'Aakash Prajapati';
        $fromEmail = $settings['from_email'] ?? 'aakashap309@gmail.com';

        // Fallback values for optional fields
        $siteLogo = $settings['site_logo'] ?? '';
        $siteFavicon = $settings['site_favicon'] ?? '';
        $linkedin = $settings['linkedin'] ?? '';
        $facebook = $settings['facebook'] ?? '';
        $instagram = $settings['instagram'] ?? '';
        $whatsapp = $settings['whatsapp'] ?? '';

        // Replace placeholders in the template
        $htmlContent = str_replace(
            ['[username]', '[admin]', '[site_logo]', '[site_favicon]', '[linkedin]', '[facebook]', '[instagram]', '[whatsapp]'],
            [$username, $adminName, $siteLogo, $siteFavicon, $linkedin, $facebook, $instagram, $whatsapp],
            $template->content
        );

        // Configure email and send
        Mail::send([], [], function ($message) use ($to, $template, $htmlContent, $fromEmail, $adminName) {
            $message->to($to)
                ->from($fromEmail, $adminName)
                ->subject($template->subject)
                ->html($htmlContent);
        });
    }
}
