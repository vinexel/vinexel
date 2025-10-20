<?php

namespace Dashkit\Libraries\Helper;

/**
 * Class InstallForms
 *
 * Provides predefined field mappings used during installation
 * of the Dashkit system or initial administrator setup.
 */
class InstallForms
{
    /**
     * Get installation form field mappings.
     *
     * This defines the input field names that are expected
     * when running an installation or setup process.
     *
     * Example:
     * ```php
     * $fields = InstallForms::installFormFields();
     * echo $fields['email']; // "email_address"
     * ```
     *
     * @return array<string, string> Associative array of form fields
     */
    public static function installFormFields(): array
    {
        return [
            'email' => 'email_address',
            'username' => 'admin_username',
            'password' => 'admin_password',
        ];
    }

    /**
     * Get a single field name by key.
     *
     * Example:
     * ```php
     * $emailField = InstallForms::getField('email');
     * ```
     *
     * @param string $key Field identifier (e.g. 'email', 'username')
     * @return string|null Returns the field name or null if not found
     */
    public static function getField(string $key): ?string
    {
        $fields = self::installFormFields();
        return $fields[$key] ?? null;
    }

    /**
     * Check if a specific field mapping exists.
     *
     * @param string $key
     * @return bool
     */
    public static function hasField(string $key): bool
    {
        return array_key_exists($key, self::installFormFields());
    }
}
