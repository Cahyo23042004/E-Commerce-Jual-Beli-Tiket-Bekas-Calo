
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calo | Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<div class="home-link">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('css/logo-calo.png') }}" alt="Logo" class="logo">
    </a>
</div>
<div class="wrapper">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Registration</h1>
        <div class="input-box">
            <div class="input-field">
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name" />
                <i class='bx bxs-user'></i>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="input-field">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                <i class='bx bxs-envelope'></i>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="input-field">
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required placeholder="Phone Number" />
                <i class='bx bxs-phone'></i>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <script>
            document.getElementById('phone').addEventListener('input', function(e) {
                let value = e.target.value;
                if (value.startsWith('0')) {
                    e.target.value = '62' + value.slice(1);
                }
            });
            </script>

            <div class="input-field">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                <i class='bx bxs-lock-alt'></i>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="input-field">
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                <i class='bx bxs-lock-alt'></i>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <label><input type="checkbox">I hereby declare that the information I have provided above is true and accurate</label>

        <button type="submit" class="btn">{{ __('Register') }}</button>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>
