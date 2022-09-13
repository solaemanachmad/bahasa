@extends('admin.admin-master')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>



    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/tables_datatables.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        DataTables Example
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Plugin Integration
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Examples</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            DataTables
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Plugin Example</h3>
            </div>
            <div class="block-content fs-sm text-muted">
                <p>
                    This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
                </p>
            </div>
        </div>
        <!-- END Info -->

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">

                <h3 class="block-title">
                    User View <small>Full</small>
                </h3>
                <div>
                    <a href="{{ route('user.add') }}" class="btn btn-sm btn-outline-success mt-3 mb-3">
                        <i class="fa fa-fw fa-plus me-1"></i> Add User
                    </a>
                </div>


            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full fs-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">SL</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th style="width: 25%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $user)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $user->usertype }}</td>
                                <td class="fw-semibold">
                                    <a href="javascript:void(0)">{{ $user->name }}</a>
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $user->email }}
                                    {{-- client{{ $i }}<span class="text-muted">@example.com</span> --}}
                                </td>
                                <td class="text-muted">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('user.delete', $user->id) }}" id="delete"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
