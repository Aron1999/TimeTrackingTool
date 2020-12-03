@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
        <div class="absolute w-screen h-screen top-0 left-0">
            <div class="flex h-full relative inline-block">
                {{-- <div class="m-auto">{{ __('Register') }}</div> --}}

                <div class="m-auto">
                    <form class="bg-white shadow-md rounded align-middle inline-block w-full px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="w-full mb-10">
                            <img class="w-8/12 tabel my-0 mx-auto" src="https://www.beterbekend.nl/wp-content/themes/beterbekend/img/beter-bekend-logo.svg" />
                        </div> 

                        <div class="form-group row">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="select-none outline-none relative appearance-none border border-gray-medium rounded w-full py-2 px-3 text-gray-700  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="select-none outline-none relative appearance-none border border-gray-medium rounded w-full py-2 px-3 text-gray-700  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="select-none outline-none relative appearance-none border border-gray-medium rounded w-full py-2 px-3 text-gray-700 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="select-none outline-none relative appearance-none border border-gray-medium rounded w-full py-2 px-3 text-gray-700" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center text-gray-400 text-xs">
                        &copy;2019 CRM Beter Bekend. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    {{-- </div> --}}
{{-- </div> --}}
@endsection
