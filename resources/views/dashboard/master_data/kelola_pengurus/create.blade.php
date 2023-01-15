@include('components.head')
@extends('template.template')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('kelolaPengurus.create') }}
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
@section('content-section')
    <div class="container-fluid">
        @include('components.alert')
        <div class="card">
            <div class="card-header bg-gradient-blue">
                Tambah Data Pengurus
            </div>
            <form action="{{ route('kelolaPengurus.store') }}" method="post">
                @csrf
                <div class="card-body">
                    {{-- form --}}
                    <div class="form-group">
                        <label for="gender">Kategori</label>
                        <select class="custom-select form-control-border" id="categories" name="categories">
                            <option value="">Pilih Kategori</option>
                            <option value="students">Santri</option>
                            <option value="teachers">Pengajar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dataList">Data List</label>
                        <select class="form-control select2" style="width: 100%;" name="dataList" id="dataList">
                            <option value="">Pilih Nama</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_number">Nomor ID</label>
                        <input type="number" name="id_number" id="id_number" class="form-control"
                            value="{{ old('id_number') }}" placeholder="Nomor Identitas" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fullName">Nama Lengkap</label>
                        <input type="text" name="fullName" id="fullName" class="form-control" autocomplete="off"
                            value="{{ old('fullName') }}" placeholder="Nama Lengkap" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" autocomplete="off"
                            value="{{ old('email') }}" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Program</label>
                        <select class="custom-select form-control-border" id="program" name="program">
                            <option value="">Pilih Program</option>
                            @forelse ($program as $item)
                                <option value="{{ $item->id }}">{{ $item->program_name }}</option>
                            @empty
                                <option value=""></option>
                            @endforelse
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="testing">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@extends('components.footer')
@push('new-script')
    <!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('#categories').change(function() {
                var value = $(this).val();

                $('#dataList').find('option').not(':first').remove();
                $('#dataList').change(function() {
                    var data = $(this).val();
                    let splitData = data.split(':');
                    let name = splitData[1];
                    let noId = splitData[0];
                    let email = splitData[2];
                    $('#id_number').val(noId);
                    $('#fullName').val(name);
                    $('#email').val(email);
                });
                if (value === 'students') {
                    var url = '{{ route('getUserByRoles') }}';
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            'name': 'Santri'
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = 0;
                            if (response['data'] != null) {
                                len = response['data'].length;
                            }
                            if (len > 0) {
                                // Read data and create <option >
                                for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var email = response['data'][i].email;


                                    option = "<option value='" + id + ':' +
                                        name + ':' + email + "'>" +
                                        name +
                                        "</option>";

                                    $("#dataList").append(option);
                                }
                            }
                        }
                    });
                } else if (value === 'teachers') {
                    var url = '{{ route('getUserByRoles') }}';
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            'name': 'Pengajar'
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = 0;
                            if (response['data'] != null) {
                                len = response['data'].length;
                            }
                            if (len > 0) {
                                // Read data and create <option >
                                for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var email = response['data'][i].email;


                                    option = "<option value='" + id + ':' +
                                        name + ':' + email + "'>" +
                                        name +
                                        "</option>";
                                    $("#dataList").append(option);
                                }
                            }
                        }
                    });
                }
            });

            $('.select2').select2();
        });
    </script>
@endpush
