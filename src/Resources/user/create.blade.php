@extends('Panel::layout.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/src/panel/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('/src/panel/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

    {{--    select2--}}
    <link href="{{ asset('/src/panel/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" >

@endsection
@section('content')

    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form name="general-info" class="section general-info"
                                  method="POST" action="{{ route('post.user') }}"
                            >
                                @csrf
                                <div class="info">
                                    <h6 class="">{{ __('Panel-Lang::trans.GeneralInformation') }}</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('/src/panel/assets/img/boy.png') }}" data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> {{ __('Panel-Lang::trans.UploadPicture') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="fullName">{{ __('Panel-Lang::trans.FirstName') }}</label>
                                                                            <input type="text" class="form-control mb-4" id="fname" name="fname" placeholder="{{ __('Panel-Lang::trans.FirstName') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="fullName">{{ __('Panel-Lang::trans.LastName') }}</label>
                                                                            <input type="text" class="form-control mb-4" id="lname" name="lname" placeholder="{{ __('Panel-Lang::trans.LastName') }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="dob-input">{{ __('Panel-Lang::trans.DateOfBirth') }}</label>
                                                                <div class="d-sm-flex d-block">
                                                                    <div class="form-group mr-1">
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="birthday_at">
                                                                            <option>{{ __('Panel-Lang::trans.Day') }}</option>
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mr-1">
                                                                        <select class="form-control" id="month">
                                                                            <option>{{ __('Panel-Lang::trans.Month') }}</option>
                                                                            <option selected>Jan</option>
                                                                            <option>Feb</option>
                                                                            <option>Mar</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mr-1">
                                                                        <select class="form-control" id="year">
                                                                            <option>{{ __('Panel-Lang::trans.Year') }}</option>
                                                                            <option>2018</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">{{ __('Panel-Lang::trans.Profession') }}</label>
                                                            <input type="text" class="form-control mb-4" id="profession" name="profession" placeholder="{{ __('Panel-Lang::trans.Profession') }}" value="Web Developer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">{{ __('Panel-Lang::trans.Country') }}</label>
                                                        <select class="form-control" id="country" name="country">
                                                            <option>All Countries</option>
                                                            <option selected>United States</option>
                                                            <option>India</option>
                                                            <option>Japan</option>
                                                            <option>China</option>
                                                            <option>Brazil</option>
                                                            <option>Norway</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">{{ __('Panel-Lang::trans.Address') }}</label>
                                                        <input type="text" class="form-control mb-4" id="address" name="address" placeholder="{{ __('Panel-Lang::trans.Address') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="location">{{ __('Panel-Lang::trans.Location') }}</label>
                                                        <input type="text" class="form-control mb-4" id="location" name="location" placeholder="{{ __('Panel-Lang::trans.Location') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{ __('Panel-Lang::trans.Phone') }}</label>
                                                        <input type="text" class="form-control mb-4" id="phone" name="phone" placeholder="{{ __('Panel-Lang::trans.Phone') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">{{ __('Panel-Lang::trans.Email') }}</label>
                                                        <input type="text" class="form-control mb-4" id="email" name="email" placeholder="{{ __('Panel-Lang::trans.Email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="website1">{{ __('Panel-Lang::trans.Website') }}</label>
                                                        <input type="text" class="form-control mb-4" id="website1" name="website" placeholder="{{ __('Panel-Lang::trans.Website') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password">{{ __('Auth-Lang::trans.Password') }}</label>
                                                        <input type="password" class="form-control mb-4" id="password" name="password" placeholder="{{ __('Auth-Lang::trans.Password') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="website1">{{ __('Auth-Lang::trans.PasswordConfirmation') }}</label>
                                                        <input type="password" class="form-control mb-4" id="password-confirmation" name="password_confirmation" placeholder="{{ __('Auth-Lang::trans.PasswordConfirmation') }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="RoleName">{{ __('Panel-Lang::trans.RoleName') }}</label>
                                                        <select id="role" name="role" class="form-control tagging" multiple="multiple">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-5">
                                            <button type="button" id="update-profile" class="btn btn-success"> {{ __('Panel-Lang::trans.Update') }} </button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('/src/panel/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('/src/panel/assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('/src/panel/assets/js/users/update-user.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/sweetalerts/custom-sweetalert.js') }}"></script>

    {{--    select2--}}
    <script src="{{ asset('/src/panel/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/select2/select2.min.js') }}"></script>
    <script>
        $(".tagging").select2({
            tags: true
        });
        $.get( get_all_role , function(data, status){
            $.map( data, function( n ) {
                var option = new Option(n.name, n.id);
                $('#role').append( '<option value="'+n.name+'">'+n.name+'</option>' );
            });
        });
    </script>
@endsection
