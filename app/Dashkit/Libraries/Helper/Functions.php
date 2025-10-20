<?php

namespace Dashkit\Libraries\Helper;

use Deeper\Libraries\Session;
use Vision\Modules\Assets;

/**
 * Class Functions
 *
 * Provides common helper methods used across Dashkit.
 * These include asset URL resolution and user session data retrieval.
 */

class Functions
{
    /**
     * Generate the full path for an asset.
     *
     * Example:
     * ```php
     * echo Functions::asset('css/app.css');
     * ```
     *
     * @param string $path Relative asset path (e.g., 'js/app.js')
     * @return string Full asset URL
     */
    public static function asset(string $path): string
    {
        return Assets::path($path);
    }

    /**
     * Get the currently authenticated user's email.
     *
     * @return string|null User email or null if not logged in
     */
    public static function getUserEmail(): ?string
    {
        return Session::get('user_session_email');
    }

    /**
     * Get the currently authenticated user's basic session data.
     *
     * @return array{
     *   email: string|null,
     *   name: string|null,
     *   role: string|null
     * } User data array
     */
    public static function getUserData(): array
    {
        return [
            'email' => Session::get('user_session_email'),
            'name' => Session::get('user_session_name'),
            'role' => Session::get('user_role'),
        ];
    }
}
