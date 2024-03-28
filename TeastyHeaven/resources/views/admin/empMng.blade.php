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

                <div class="row">

                    <div class="col-lg-10">
                    </div>

                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#addEmployeeModal">
                            Add Employee
                        </button>
                    </div><br>
                    <br>


                </div>
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">


                        <table id="datatable" class="table table-striped table-dark" cellspacing="0" width="100%"
                            style="color: white">

                            <thead>
                                <tr>
                                    <th style="color: white">EMPLOYEE NAME</th>
                                    <th style="color: white">ROLE</th>
                                    <th style="color: white">GENDER</th>
                                    <th style="color: white">HRS</th>
                                    <th style="color: white">PHONE</th>
                                    <th style="color: white">OPTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($employees))
                                    @if (count($employees) > 0)
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->role }}</td>
                                                <td>{{ $employee->gender }}</td>
                                                <td>{{ $employee->hrs }}</td>
                                                <td>{{ $employee->phone }}</td>

                                                <td>

                                                    <p>

                                                        <button type="button"
                                                            class="btn btn-sm btn-warning  waves-effect waves-light"><i
                                                                class="fa fa-edit"></i>
                                                        </button>

                                                        <a type="button" href="{{ url('delemp', $employee->id) }}"
                                                            class="btn btn-sm btn-danger  waves-effect waves-light"
                                                            onclick="return(confirm('Are You Sure To Delete This ?'))">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                    </p>

                                                </td>


                                            </tr>
                                        @endforeach
                                    @endif
                                @endif

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>
        <!-- container-scroller -->
        @include('admin.js');

        <!-- Add Employee Modal Start-->
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true" style="background-color: rgba(255, 255, 255, 0.219)">
            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('saveEmp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Employee Name <span style="color:red">*</span> </label>
                                <input type="text" class="form-control" name="name" id="empname"
                                    placeholder="Employee Name" style="background-color: rgb(37, 37, 37)" />
                                <span class="text-danger" id="nameError"></span>
                            </div>

                            <div class="form-group">
                                <label>Role <span style="color:red">*</span> </label><br>
                                <select name="role" id="role" style="background-color: rgb(37, 37, 37)">
                                    <option value="cashier">Cashier</option>
                                    <option value="chef">Chef</option>
                                    <option value="waiter">Waiter</option>
                                    <option value="manager">Manager</option>
                                    <option value="delivery">Delivery</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gender <span style="color:red">*</span> </label><br>
                                <select name="gender" id="gender" style="background-color: rgb(37, 37, 37)">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Hrs <span style="color:red">*</span> </label>
                                <input type="number" class="form-control" name="hrs" id="hrs"
                                    placeholder="Hrs" style="background-color: rgb(37, 37, 37)" />
                                <span class="text-danger" id="hrsError"></span>
                            </div>

                            <div class="form-group">
                                <label>Phone <span style="color:red">*</span> </label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="Phone Nunber" style="background-color: rgb(37, 37, 37)" />
                                <span class="text-danger" id="phoneError"></span>
                            </div>

                            <br>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary float-right" onclick="saveEmp()">
                                    Save Employee
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
        <!-- Add Category Modal End-->
        <script type="text/javascript">
            //Save Category Start
            function saveEmp() {
                //alert(test)

                // Clear validation errors after clicking Save Category Button
                $('#nameError').html('');
                $('#hrsError').html('');
                $('#phoneError').html('');



                var name = $("#empname").val();
                var role = $("#role").val();
                var gender = $("#gender").val();
                var hrs = $("#hrs").val();
                var phone = $("#phone").val();

                //$.post:passDataToBackend('route:ToWhichController&Function',{passKarannaOnaDataTika},function(data):backEndEkenEnaData
                $.post('saveEmp', {

                    name: name,
                    role: role,
                    gender: gender,
                    hrs: hrs,
                    phone: phone

                }, function(data) {
                    /*  console.log(data) */ //View the data on console that passed(returned) from back-end

                    if (data.errors != null) { //If there is validation errors

                        if (data.errors.name) {
                            var p = document.getElementById('nameError');
                            p.innerHTML = data.errors.name[0];
                        }

                        if (data.errors.hrs) {
                            var p = document.getElementById('hrsError');
                            p.innerHTML = data.errors.hrs[0];
                        }

                        if (data.errors.phone) {
                            var p = document.getElementById('phoneError');
                            p.innerHTML = data.errors.phone[0];
                        }

                    }


                    if (data.success !=
                        null
                    ) {
                        $('input').val('');
                        location.reload();
                        //if there is a value in the key of success which is returned from controller //if there is no errors
                        notify({
                            type: "success", //alert | success | error | warning | info
                            title: 'EMPLOYEE SAVED',
                            autoHide: true, //true | false
                            delay: 2500, //number ms
                            position: {
                                x: "right",
                                y: "top"
                            },
                            icon: '<img src="{{ URL::asset('assets/images/correct.png') }}" />',
                            message: data.success,

                        });




                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                    }

                })

            }
            //Save Category End
        </script>

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
