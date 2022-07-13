@extends('layouts.app')
@push('styles')
    <link href="{{ asset('/template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-sidebar/>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <x-navbar/>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Meet</h1>
                        <a href="{{ route('meet-add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu</th>
                                            <th>Kegiatan</th>
                                            <th>SKPD</th>
                                            <th>Gambar</th>
                                            <th>Link</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($meets as $meet)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ date_format(date_create($meet->waktu), 'd M Y') }}</td>
                                            <td>{{ $meet->kegiatan }}</td>
                                            <td>{{ $meet->skdp->nama }}</td>
                                            <td><img src="{{ asset('img/'.$meet->gambar) }}" style="width:150px"></td>
                                            <td>{{ $meet->link }}</td>
                                            <td>{{ $meet->keterangan }}</td>
                                            <td>
                                                <a href="{{ route('meet-edit',['id'=>$meet->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('meet-destroy',['id'=>$meet->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda akan mengahapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <x-footer/>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    
    

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Blfrtip',
        lengthMenu: [ [ 10, 25, 50, -1 ], [ '10 rows', '25 rows', '50 rows', 'Show all' ] ],
        buttons: [
        {
            extend: 'csvHtml5',
            text: 'CSV',
            exportOptions: {
                stripHtml: false,
                columns: [0,1,2,3,5,6]
            }
        },
        {
            extend: 'excelHtml5',
            text: 'Excel',
            exportOptions: {
                stripHtml: false,
                columns: [0,1,2,3,5,6]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                stripHtml: false,
                columns: [0,1,2,3,5,6]
            }
        }
    ]
    } );
} );
    </script>



</body>
@endsection