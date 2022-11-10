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
    <!-- Sweetalert -->
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
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">

                <h3 class="block-title">
                    View <small>Certificate</small>
                </h3>

            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full fs-sm">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">NAME</th>
                            {{-- <th class="d-none d-sm-table-cell" style="width: 30%;">TERM</th> --}}
                            <th class="text-center">TERM</th>
                            <th class="text-center">SEMESTER</th>
                            <th class="text-center">SCORE</th>
                            {{-- <th style="width: 25%;">ACTION</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $all)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $all->nim }}</td>
                                <td class="fw-semibold">{{ $all->name }}</a>
                                </td>
                                <td class="text-center">{{ $all->term }}
                                    {{-- <td class="d-none d-sm-table-cell">{{ $all->term }} --}}
                                    {{-- client{{ $i }}<span class="text-muted">@example.com</span> --}}
                                </td>
                                <td class="text-center">{{ $all->semester }}</td>
                                <td class="text-center">
                                    <span
                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">{{ $all->score }}</span>
                                </td>

                                {{-- <td class="text-muted">
                                    <a href="{{ route('user.edit', $all->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('user.delete', $all->id) }}" id="delete"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td> --}}

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
