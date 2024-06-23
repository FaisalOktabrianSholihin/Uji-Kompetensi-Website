@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold mt-4">Daftar Pegawai</h3>
                    </div>
                    <div class="col-12">
                        <div class="justify-content-end d-flex">
                            <button type="button" class="btn btn-primary mb-3 float-end" data-toggle="modal"
                                data-target="#pegawaiModal" id="addPegawaiBtn">
                                Tambah Pegawai
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered" id="pegawai-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->id }}</td>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->jabatan }}</td>
                        <td>{{ $pegawai->hp }}</td>
                        <td>
                            <button type="button" class="btn btn-warning edit-btn" data-toggle="modal"
                                data-target="#pegawaiModal" data-id="{{ $pegawai->id }}">Edit</button>
                            <button type="button" class="btn btn-danger delete-btn" data-toggle="modal"
                                data-target="#confirmDeleteModal" data-id="{{ $pegawai->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="pegawaiModal" tabindex="-1" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pegawaiModalLabel">Tambah Pegawai</h5>
                </div>
                <form id="pegawaiForm">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="hp">HP</label>
                            <input type="text" class="form-control" id="hp" name="hp" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="pegawaiId" name="pegawai_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            $('#pegawai-table').DataTable();

            $('#addPegawaiBtn').on('click', function() {
                $('#pegawaiForm').trigger("reset");
                $('#pegawaiModalLabel').text("Tambah Pegawai");
                $('#pegawaiId').val('');
            });

            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                $.get("{{ url('pegawais') }}" + '/' + id + '/edit', function(data) {
                    $('#pegawaiModalLabel').text("Edit Pegawai");
                    $('#pegawaiId').val(data.id);
                    $('#nama').val(data.nama);
                    $('#alamat').val(data.alamat);
                    $('#jabatan').val(data.jabatan);
                    $('#hp').val(data.hp);
                });
            });

            $('#pegawaiForm').on('submit', function(event) {
                event.preventDefault();
                var id = $('#pegawaiId').val();
                var url = "{{ url('pegawais') }}";
                var method = "POST";
                if (id !== "") {
                    url = url + '/' + id;
                    method = "PUT";
                }
                $.ajax({
                    url: url,
                    method: method,
                    data: $(this).serialize(),
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
            $('.delete-btn').on('click', function() {
                var id = $(this).data('id');
                $('#confirmDeleteModal').modal('show');
                $('#confirmDeleteBtn').on('click', function() {
                    $.ajax({
                        url: "{{ url('pegawais') }}" + '/' + id,
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });
            });
        });
    </script>
@endsection
