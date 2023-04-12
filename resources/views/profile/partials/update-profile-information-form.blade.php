<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex">
            <div class="inline-flex w-1/2 mr-4 relative">
              <x-input-label for="FirstName" :value="__('FirstName')" class="absolute top-0 left-0 text-gray-500 font-medium" style="transform: translateY(-50%)" />
              <x-text-input id="FirstName" name="first_name" type="text" class="mt-4 block w-full" :value="old('FirstName', $user->first_name)" required autofocus />
              <x-input-error class="mt-2" :messages="$errors->get('FirstName')" />
            </div>
            <div class="inline-flex w-1/2 relative">
              <x-input-label for="LastName" :value="__('LastName')" class="absolute top-0 left-0 text-gray-500 font-medium" style="transform: translateY(-50%)" />
              <x-text-input id="LastName" name="last_name" type="text" class="mt-4 block w-full" :value="old('LastName', $user->last_name)" required autofocus />
              <x-input-error class="mt-2" :messages="$errors->get('LastName')" />
            </div>
        </div>

        {{-- <div class="flex">
            <div class="inline-flex w-1/2 mr-4">
                <x-input-label for="FirstName" :value="__('FirstName')" />
                <x-text-input id="FirstName" name="FirstName" type="text" class="mt-1 block w-full" :value="old('FirstName', $user->first_name)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('FirstName')" />
            </div>
            <div class="inline-flex w-1/2">
                <x-input-label for="LastName" :value="__('LastName')" />
                <x-text-input id="LastName" name="LastName" type="text" class="mt-1 block w-full" :value="old('LastName', $user->last_name)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('LastName')" />
            </div>
        </div> --}}
        
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
