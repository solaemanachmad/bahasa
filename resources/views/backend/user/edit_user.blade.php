@extends('admin.admin-master')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/js/plugins/select2/css/select2.min.css">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->

    <script src="/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/js/plugins/jquery-validation/additional-methods.js"></script>
@endsection

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Form Validation
                        </h1>
                        <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                            It’s never been easier to validate form values.
                        </h2>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="javascript:void(0)">Forms</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Validation
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form class="js-validation" action="{{ route('user.update', $editData->id) }}" method="POST">
                @csrf
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Validation Form</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- Regular -->
                        <h2 class="content-heading border-bottom mb-4 pb-2">Regular</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Username, email and password validation made easy for your login/register forms
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="usertype">Select Role<span
                                            class="text-danger">*</span></label>
                                    <select class="js-select2 form-select" id="val-select2" name="usertype" required=""
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="Admin" {{ $editData->usertype == 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="User" {{ $editData->usertype == 'User' ? 'selected' : '' }}>User
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="name">Username <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-username" name="name"
                                        required="" value="{{ $editData->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-email" name="email" required=""
                                        value="{{ $editData->email }}">
                                </div>
                                {{-- <div class="mb-4">
                                    <label class="form-label" for="password">Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="val-password" name="password"
                                        placeholder="Choose a safe one..">
                                </div> --}}
                                {{-- <div class="mb-4">
                                    <label class="form-label" for="val-confirm-password">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="val-confirm-password"
                                        name="val-confirm-password" placeholder="..and confirm it!">
                                </div> --}}
                            </div>
                        </div>
                        <!-- END Regular -->

                        <!-- Update -->
                        <div class="row items-push">
                            <div class="col-lg-7 offset-lg-4">
                                <button type="submit button" class="js-notify btn btn-alt-success push">
                                    Update</button>
                            </div>
                        </div>
                        <!-- END Update -->

                    </div>
                </div>
            </form>
            <!-- jQuery Validation -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
