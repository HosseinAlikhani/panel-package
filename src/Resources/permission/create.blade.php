@extends('Panel::layout.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/src/panel/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('/src/panel/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/src/panel/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form name="form" class="section role" method="POST" action="{{ route('post.permission') }}">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-10 col-lg-12 col-md-8 m-5">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="RoleName">{{ __('Panel-Lang::trans.PermissionName') }}</label>
                                                                            <input type="text" class="form-control mb-4" id="RoleName" name="name" placeholder="{{ __('Panel-Lang::trans.PermissionName') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="GuardName">{{ __('Panel-Lang::trans.GuardName') }}</label>
                                                                            <select class="form-control" id="GuardName" name="guard_name">
                                                                                <option value="" selected>{{ __('Panel-Lang::trans.Assumption') }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-5  mt-0">
                                            <button type="button" id="form-submit" class="btn btn-success"> {{ __('Panel-Lang::trans.Create') }} </button>
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
    <script src="{{ asset('/src/panel/assets/js/users/role.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
@endsection
