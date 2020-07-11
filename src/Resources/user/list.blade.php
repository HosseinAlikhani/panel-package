@extends('Panel::layout.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/src/panel/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/src/panel/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/src/panel/plugins/table/datatable/dt-global_style.css') }}">
@endsection
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>{{ __('Panel-Lang::trans.FirstName') }}</th>
                                <th>{{ __('Panel-Lang::trans.LastName') }}</th>
                                <th>{{ __('Panel-Lang::trans.Email') }}</th>
                                <th>{{ __('Panel-Lang::trans.Role') }}</th>
                                <th>{{ __('Panel-Lang::trans.State') }}</th>
                                <th>{{ __('Panel-Lang::trans.Operation') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="usr-img-frame mr-2 rounded-circle">
                                            <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('/src/panel/assets/img/boy.png') }}">
                                        </div>
                                        <p class="align-self-center mb-0 admin-name"> {{ $user->fname }} </p>
                                    </div>
                                </td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->email }}</td>
                                <td> user </td>
                                <td>
                                    <div class="t-dot bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('Panel-Lang::trans.Online') }}"></div>
                                </td>
                                <td>
                                    <a href="{{ route('get.user', $user->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('Panel-Lang::trans.Update') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                    <a href="{{ route('delete.user', $user->id) }}" class="bs-tooltip delete-user" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('Panel-Lang::trans.Delete') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="{{ asset('/src/panel/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('/src/panel/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/src/panel/assets/js/users/list-user.js') }}"></script>
    <script>
        $('#multi-column-ordering').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [3, 10, 20, 50],
            "pageLength": 3,
            columnDefs: [ {
                targets: [ 0 ],
                orderData: [ 0, 1 ]
            }, {
                targets: [ 1 ],
                orderData: [ 1, 0 ]
            }, {
                targets: [ 4 ],
                orderData: [ 4, 0 ]
            } ]
        });
    </script>
@endsection