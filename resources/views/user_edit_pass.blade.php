<x-app-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.changePass') }}">
            @csrf

            <!-- Current Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Current Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- New Password -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />

                <x-input id="new_password" class="block mt-1 w-full"
                                type="password"
                                name="new_password" required />
            </div>

            <!-- Confirm New Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm New Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Change password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
