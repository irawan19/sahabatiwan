<x-guest-layout>
<form method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="form-col-form-label" for="email">Email</label>
            <input id="email" class="form-control {{ General::validForm($errors->first('email')) }}" autofocus type="text" placeholder="Username atau email" name="email" value="{{Request::old('email')}}">
            {{General::pesanErrorForm($errors->first('email'))}}
        </div>
        <div class="form-group">
            <label class="form-col-form-label" for="password">Password</label>
            <input id="password" class="form-control {{ General::validForm($errors->first('password')) }}" type="password" placeholder="Password" name="password" autocomplete="current-password">
            {{General::pesanErrorForm($errors->first('password'))}}
        </div>
        <div class="row" style="margin-bottom:40px;">
            <div class="col-12">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>
            </div>
            <div class="col-12">
                <button type="submit" style="width:100%" class="btn btn-login" type="button">Login</button>
            </div>
        </div>
    </form>
</x-guest-layout>
