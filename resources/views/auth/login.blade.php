<x-guest-layout>
    <x-jet-authentication-card>
        <!-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> -->

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full h-10	" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-6">
                <x-jet-label for="password" value="{{ __('パスワード') }}" />
                <x-jet-input id="password" class="block mt-1 w-full h-10	" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-6">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を維持する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れましたか?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('ログインする') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-end mt-6">
                <p>月額プランで始めるなら</p>
                <x-jet-button class="ml-4"><a href="{{ url('register') }}" >新規登録</a></x-jet-button>
            </div>
            <div class="flex items-center justify-end mt-6">
                <p>とりあえず無料で試すなら</p>
                <x-jet-button class="ml-4"><a href="{{ url('create') }}" >スケジュール作成</a></x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
