<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator
            ->add(
                'general-settings.logo',
                asset('/images/logo.svg'));

        $this->migrator
            ->add(
                'general-settings.favicon',
                asset('/images/favicon.png'));

        $this->migrator
            ->add(
                'general-settings.dark_logo',
                asset('/images/dark-logo.svg'));

        $this->migrator
            ->add(
                'general-settings.guest_logo',
                asset('/images/guest-logo.svg'));

        $this->migrator
            ->add(
                'general-settings.guest_background',
                asset('/images/guest-background.svg'));

    }
}
