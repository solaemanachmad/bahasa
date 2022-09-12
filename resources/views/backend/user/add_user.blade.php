@extends('admin.admin-master')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="../js/plugins/select2/css/select2.min.css">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="../js/plugins/select2/js/select2.full.min.js"></script>
    <script src="../js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/plugins/jquery-validation/additional-methods.js"></script>
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
            <form class="js-validation" action="{{ route('user.store') }}" method="POST">
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
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="name">Username <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-username" name="name"
                                        required="" placeholder="Enter a username..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-email" name="email" required=""
                                        placeholder="Your valid email..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="password">Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="val-password" name="password"
                                        placeholder="Choose a safe one..">
                                </div>
                                {{-- <div class="mb-4">
                                    <label class="form-label" for="val-confirm-password">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="val-confirm-password"
                                        name="val-confirm-password" placeholder="..and confirm it!">
                                </div> --}}
                                <div class="mb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">Terms &amp;
                                        Conditions</a> <span class="text-danger">*</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="val-terms"
                                            name="val-terms">
                                        <label class="form-check-label" for="val-terms">I agree</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Regular -->

                        <!-- Submit -->
                        <div class="row items-push">
                            <div class="col-lg-7 offset-lg-4">
                                <button type="submit" class="btn js-notify btn-alt-primary push">Submit</button>
                            </div>
                        </div>
                        <!-- END Submit -->
                        <!-- Success -->
                        <h4 class="border-bottom pb-2">Success</h4>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    A notification with a success message
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <button type="button" class="js-notify btn btn-alt-success push" data-type="success"
                                    data-icon="fa fa-fw fa-check me-1"
                                    data-message="App was updated successfully to 1.2 version">
                                    <i class="fa fa-bell me-1 opacity-50"></i> Launch Notification
                                </button>
                                <p class="fw-semibold mb-0">
                                    You can also trigger it with JS:
                                </p>
                                <p>
                                    <code>One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message:
                                        'Your message!'});</code>
                                </p>
                            </div>
                        </div>
                        <!-- END Success -->
                    </div>
                </div>
            </form>
            <!-- jQuery Validation -->

            <!-- Terms Modal -->
            <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-transparent mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Terms &amp; Conditions</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet
                                    adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut
                                    metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis
                                    purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet
                                    adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut
                                    metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis
                                    purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            </div>
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">Done</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Terms Modal -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
