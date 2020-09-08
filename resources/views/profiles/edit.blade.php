@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user -> id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit Profile</h2>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user -> profile -> title }}" required autocomplete="comment">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">{{ __('description') }}</label>

                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user -> profile -> description }}" required autocomplete="comment">

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="fun_fact" class="col-md-4 col-form-label">{{ __('Fun Fact') }}</label>

                        <input id="fun_fact" type="text" class="form-control @error('fun_fact') is-invalid @enderror" name="fun_fact" value="{{ old('fun_fact') ?? $user -> profile -> fun_fact }}" required autocomplete="comment">

                        @error('fun_fact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">{{ __('URL') }}</label>

                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user -> profile -> url }}" required autocomplete="comment">

                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
<!--                 <div class="form-group row">
                    <label for="fun_fact" class="col-md-4 col-form-label">{{ __('Fun Fact') }}</label>

                        <input id="fun_fact" type="text" class="form-control @error('fun_fact') is-invalid @enderror" name="fun_fact" value="{{ old('fun_fact') }}" required autocomplete="fun_fact">

                        @error('fun_fact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div> -->
            
                <div class=" form-group row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Profile image') }}</label>

                    <input type="file" class="form-control-file" name="image" id="image">

                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection