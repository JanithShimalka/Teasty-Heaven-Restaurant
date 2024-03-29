<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Required meta tags -->
    @include('admin.css');
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    {{-- jstable --}}
    <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Plugins css -->
    <link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/custom_checkbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/jquery.notify.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/mdb.css') }}" rel="stylesheet" type="text/css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- jstable --}}

    <style>
        .form-control:focus {
            color: white;
        }

        .dataTables_wrapper select:focus {
            color: white;
        }

        .dataTables_wrapper select {
            color: white;
        }

        .modal {
            color: white;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->


        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}

                    </div>
                @endif


                <div>
                    <form action="{{ url('uploadMenu') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="menuname" class="form-label">Menu Name </label>
                            <input type="text" style="color:black" name="itmname" placeholder="Enter Item Name"
                                required>

                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Desciption</label>
                            <textarea style="color:black" name="desc" placeholder="Enter Short Desciption" required>
                        </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select style="color:black" name= "type" required>
                                <option value="">-- Select Type --</option>
                                <option value="breakfast">Breakfast</option>
                                <option value="lanch">Lanch</option>
                                <option value="dinner">Dinner</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Item Price </label>
                            <input type="number" style="color:black" name="price" placeholder="Enter Price" required>

                        </div>
                        <div class="mb-3">
                            <label for="cost" class="form-label">Item Cost </label>
                            <input type="number" style="color:black" name="cost" placeholder="Enter Cost" required>

                        </div>
                        <div class="mb-3">
                            <label for="itemimage" class="form-label">Item Image </label>
                            <input type="file" style="color:white" name="file" required >
                            
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>

            </div>
        </div>
        <!-- container-scroller -->
        @include('admin.js');



</body>




<!-- Plugins js -->
<script src="{{ URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"
    type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"
    type="text/javascript"></script>

<!-- Plugins Init js -->
<script src="{{ URL::asset('assets/pages/form-advanced.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/sweet-alert.init.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>

<!-- Parsley js -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-notify.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.notify.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

    $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
    });
</script>

</html>
