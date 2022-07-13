@extends('layouts.app')
@push('styles')
    <link href="{{ asset('/template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Meet</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('meet-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Waktu</label>
                                    <input type="date" name="waktu" placeholder="Waktu" class="form-control">
                                    @error('waktu')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Kegiatan</label>
                                    <input type="text" name="kegiatan" placeholder="Kegiatan" class="form-control">
                                    @error('kegiatan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">SKPD</label>
                                    <select name="skpd_id" class="form-control">
                                        <option value="">Pilih SKPD</option>
                                        @forelse($skpds as $skpd)
                                        <option value="{{ $skpd->id }}">{{ $skpd->nama }}</option>
                                        @empty
                                        <option value="">Tidak ada data</option>
                                        @endforelse
                                    </select>
                                    @error('skpd')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Link</label>
                                    <input type="text" name="link" placeholder="Link" class="form-control">
                                    @error('link')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
                                    @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="customFile">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                </div>
                                <input type="submit" value="Tambah" class="btn btn-primary">
                            </form>
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

    <!-- Page level custom scripts -->
    <script src="{{ asset('/template/js/demo/datatables-demo.js') }}"></script>



</body>
@endsection