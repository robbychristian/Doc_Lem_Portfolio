@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="flex justify-center items-center h-screen">
            <form class="w-[80%]" action="/login" method="POST">
                @csrf
                <fieldset class="uk-fieldset">

                    <div class="text-3xl">Hello, Doc Lemuel!</div>
                    <div class="text-xl">Sign In to your Account to proceed</div>

                    <div class="uk-margin">
                        <input class="uk-input" id="email" name="email" type="email" placeholder="Email">
                        <div class="text-xs text-red-500 hidden" id="errorHelper">Wrong Credentials</div>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" id="password" name="password" type="password" placeholder="Password">
                    </div>

                </fieldset>
                <div class="flex justify-center w-full">
                    <button type="button" class="uk-button bg-red-500 w-full text-white" id="loginButton">Sign-In</button>
                </div>
            </form>
        </div>
        <div class="hidden lg:flex justify-center items-center h-screen bg-gradient-to-b from-red-600 to-amber-600">
            <div class="flex justify-center items-center flex-col space-y-6">
                <div class="text-5xl text-white font-bold hover:ease-in duration-300">Glad to see you!</div>
                <div class="text-2xl text-white">Make sure that you input your credentials properly!</div>
            </div>
        </div>
    </div>
@endsection
