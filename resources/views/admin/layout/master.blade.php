<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Preschool - Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.min.css') }}">

    <!-- Datatable-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dataTables.bootstrap4.min.css') }}">

    <!-- Morris-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">


    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
 <![endif]-->

    <link rel="stylesheet"
        href="{{ asset('draganddropmenu/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" />

</head>

<body>



    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('admin.layout.header')
        <!-- /Header -->

        <!-- sidebar -->
        @include('admin.layout.sidebar')
        <!-- /sidebar -->

        <!-- content -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- page-header-->
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="page-title mb-0">Dashboard</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ page-header-->

                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /content -->
    </div>
    <!-- /Main Wrapper -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slimscroll -->
    <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('backend/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/moment.min.js') }}"></script>

    <!-- Fullcalendar -->
    <script src="{{ asset('backend/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.fullcalendar.js') }}"></script>

    <!-- Chart -->
    <script src="{{ asset('backend/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart-data.js') }}"></script>

    <!-- custom Js -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script> --}}
    <script src="{{ asset('draganddropmenu/jquery-menu-editor.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('draganddropmenu/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
    <script src="{{ asset('backend/ckeditor/build/ckeditor.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src=""></script>
    <script src=""></script>
    {{-- <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
    </script> --}}
    @stack('scripts')
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('.editor'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: zcqz3ups1g1q-7004ol2st27j');
                console.error(error);
            });
    </script>
    <script>
        // ClassicEditor
        //     .create(document.querySelector('.editor100'), {
        //         licenseKey: '',
        //     })
        //     .then(editor => {
        //         window.editor = editor;
        //     })
        //     .catch(error => {
        //         console.error('Oops, something went wrong!');
        //         console.error(
        //             'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
        //         );
        //         console.warn('Build id: zcqz3ups1g1q-7004ol2st27j');
        //         console.error(error);
        //     });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'B<"clear">lfrtip',
                paging: true,
                pageLength: 5,
                lengthChange: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Tous"]
                ],
                order: [
                    [0, 'asc'],
                    [1, 'asc']
                ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

            });
        });
        $(document).ready(function() {
            $('#example1').DataTable({
                dom: 'B<"clear">lfrtip',
                paging: true,
                pageLength: 5,
                lengthChange: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Tous"]
                ],
                order: [
                    [0, 'asc'],
                    [1, 'asc']
                ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

            });
        });
    </script>

</body>

</html>
