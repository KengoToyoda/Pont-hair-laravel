@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--<div class="form-group row">-->
                        <!--    <label for="shop" class="col-md-4 col-form-label text-md-right">{{ __('Shop') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <input id="shop" type="shop" class="form-control @error('shop') is-invalid @enderror" name="shop" value="{{ old('shop') }}" required autocomplete="shop">-->

                        <!--        @error('shop')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <!--<div class="form-group row">-->
                        <!--    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Access') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <input id="location" type="location" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">-->

                        <!--        @error('location')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        
                        <!--<div class="form-group row">-->
                        <!--    <label for="style" class="col-md-4 col-form-label text-md-right">{{ __('Favorite Style') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <textarea id="style" class="form-control @error('style') is-invalid @enderror" name="style" value="{{ old('style') }}" required autocomplete="style"></textarea>-->

                        <!--        @error('style')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>                       -->
                        
                        <!--<div class="form-group row">-->
                        <!--    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="comment"></textarea>-->

                        <!--        @error('comment')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>    -->
                        
                        <!--<div class="form-group row">-->
                        <!--    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Favorite_Style') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>ヘアカラー-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>トリートメント-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>カット-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>ブリーチ-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>パーマ-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>縮毛矯正-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>ヘアセット-->
                        <!--       <input type="checkbox" name="category"  value="{{ old('category') }}"/>ヘッドスパ-->

                        <!--        @error('category')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>    -->

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
