@extends('home')

@section('home-content')
    <div class="panel-body">
        <form action="{{ route('content.update') }}" method="post">
            <div class="file-upload-wrapper">
                <div class="card card-body view file-upload">
                    <div class="mask rgba-stylish-slight"></div>
                    <div class="file-upload-errors-container">
                        <ul></ul>
                    </div>
                    <input type="file" id="input-file-now" class="file_upload" required>
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light">Remove<i
                                class="far fa-trash-alt ml-1"></i></button>
                    <div class="file-upload-preview"><span class="file-upload-render"></span>
                        <div class="file-upload-infos">
                            <div class="file-upload-infos-inner"><p class="file-upload-filename"><span
                                            class="file-upload-filename-inner"></span></p>
                                <p class="file-upload-infos-message">Drag and drop or click to replace</p></div>
                        </div>
                    </div>
                </div>
            </div>
            {{--   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                   <label for="name" class="control-label">@lang('form.name')</label>
                   <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control" required maxlength="255">
                   @if ($errors->has('name'))
                       <span class="help-block">
                           <strong>{{ $errors->first('name') }}</strong>
                       </span>
                   @endif
               </div>
               <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                   <label for="surname" class="control-label">@lang('form.surname')</label>
                   <input type="text" name="surname" id="surname" value="{{ Auth::user()->surname ?? '' }}" class="form-control" maxlength="255">
                   @if ($errors->has('surname'))
                       <span class="help-block">
                           <strong>{{ $errors->first('surname') }}</strong>
                       </span>
                   @endif
               </div>
               <div class="form-group{{ $errors->has('patronymic') ? ' has-error' : '' }}">
                   <label for="patronymic" class="control-label">@lang('form.patronymic')</label>
                   <input type="text" name="patronymic" id="patronymic" value="{{ Auth::user()->patronymic ?? '' }}" class="form-control" maxlength="255">
                   @if ($errors->has('patronymic'))
                       <span class="help-block">
                           <strong>{{ $errors->first('patronymic') }}</strong>
                       </span>
                   @endif
               </div>
               <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                   <label for="phone_number" class="control-label">@lang('form.phone_number')</label>

                   <input type="text" name="phone_number" id="phone_number" value="{{ Auth::user()->phone_number ?? '' }}" class="form-control" pattern="^\d{9}$" required>


                   @if ($errors->has('phone_number'))
                       <span class="help-block">
                           <strong>{{ $errors->first('phone_number') }}</strong>
                       </span>
                   @endif
               </div>
               {{ csrf_field() }}
               <div class="center-container">
                   <button type="submit" class="my-btn btn-black">@lang('button.confirm')</button>
               </div>--}}

            {{ csrf_field() }}
            <div class="center-container">
                <button type="submit" class="my-btn btn-black">@lang('button.confirm')</button>
            </div>
        </form>
    </div>
@endsection