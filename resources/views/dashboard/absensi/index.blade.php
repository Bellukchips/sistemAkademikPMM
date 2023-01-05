@include('components.head_table')
@extends('template.template')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Presensi</h1><br>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- {{ Breadcrumbs::render('beritaAcara') }} --}}
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
@section('content-section')
    <div class="container-fluid">
        {{-- alert --}}
        @include('components.alert')

        <div class="card p-3">
            {{-- form search --}}
            <form action="{{ route('presensi.index') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="">Tipe Absen</label>
                    <select name="type" id="type" class="custom-select form-control-border">
                        <option value="">Pilih Absen</option>
                        @forelse ($type as $item)
                            <option value="{{ $item->id }}+{{ $item->categories }}+{{ $item->name }}">
                                {{ $item->name }}</option>
                        @empty
                            <option value=""></option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group" id="other">
                    <label for="">Pilih Kategori</label>
                    <select name="otherSelect" id="otherSelect" class="custom-select form-control-border">
                        <option value="">Pilih</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih</label>
                    <select name="optionSelect" id="optionSelect" class="custom-select form-control-border">
                        <option value="">Pilih</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih Tanggal</label>
                    <input type="date" name="date_select" id="" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="showData">
                    <i class="fa fa-eye mr-2"></i> Lihat Absen </button>

            </form>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-indigo">
                @if ($tableHide == false)
                    Tabel Absen {{ $nameAttendance . '  ' . $dataCategory }}
                @else
                    Tabel Absen
                @endif
            </div>
            <div class="card-body">
                @if ($tableHide == false)
                    <table id="studentTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Program</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $item->student_name ?? '<span class="badge badge-danger">Error</span>' !!}</td>
                                    <td>{!! $item->class_name ?? '<span class="badge badge-danger">Error</span>' !!}</td>
                                    <td>{!! $item->program_name ?? '<span class="badge badge-danger">Error</span>' !!}</td>
                                    <td> <select name="status" id="status_{{ $index }}"
                                            class="custom-select form-control-border" data-student="{{ $item->student_id }}"
                                            data-type="{{ $dataType }}" data-category="{{ $dataCategory }}"
                                            data-program="{{ $item->id_program }}" data-other="{{ $otherCategory }}"
                                            data-date="{{ $dateSelect }}">
                                            <option value="" {{ $status === 'Belum Absen' ? 'selected' : '' }}>Pilih
                                                Status
                                            </option>
                                            <option value="Hadir" {{ $status === 'Hadir' ? 'selected' : '' }}>
                                                Hadir
                                            </option>
                                            <option value="Izin" {{ $status === 'Izin' ? 'selected' : '' }}>
                                                Izin
                                            </option>
                                            <option value="Alfa" {{ $status === 'Alfa' ? 'selected' : '' }}>
                                                Alfa
                                            </option>
                                            <option value="Sakit" {{ $status === 'Sakit' ? 'selected' : '' }}>
                                                Sakit
                                            </option>
                                        </select>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="8" align="center"> Data Tidak Tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>
@endsection
@extends('components.footer_table')
@push('new-script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script>
        $(function() {
            //add class d-none
            $('#other').addClass('d-none');
            getTypeAbsen();
            saveAttendance();

            function saveAttendance() {
                //save attendance
                //count row
                var rowCount = $('#studentTable tbody tr').length;
                for (var i = 0; i < rowCount; i++) {
                    $('#status_' + i).change(function() {
                        let id = $(this).data('id');
                        let studentId = $(this).data('student');
                        let typeId = $(this).data('type');
                        let category = $(this).data('category');
                        let programId = $(this).data('program');
                        let otherCategory = $(this).data('other');
                        var data = $(this).val();
                        let dateSelect = $(this).data('date');
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: '{{ route('saveAttendance') }}',
                            data: {
                                'status': data,
                                'student': studentId,
                                'type': typeId,
                                'program': programId,
                                'category': category,
                                'other_category': otherCategory,
                                'dateSelect': dateSelect
                            },
                            success: function(res) {
                                toastr.options.closeButton = true;
                                toastr.options.closeMethod = 'fadeOut';
                                toastr.options.closeDuration = 100;
                                toastr.success(res.message);

                            },
                        });

                    });
                }


            }


            function getTypeAbsen() {

                $('#type').change(function() {
                    var value = $(this).val();
                    let splitData = value.split('+');
                    let category = splitData[1];
                    let category1 = splitData[2];
                    $('#optionSelect').find('option').not(':first').remove();

                    if (category === 'Pengajar') {
                        //add class d-none
                        $('#other').addClass('d-none');
                        $.ajax({
                            url: '{{ route('allTeachers') }}',
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                if (response['data'] != null) {
                                    len = response['data'].length;
                                }
                                if (len > 0) {
                                    // Read data and create <option >
                                    for (var i = 0; i < len; i++) {

                                        var id = response['data'][i].id;
                                        var name = response['data'][i].name;
                                        // variable option
                                        var option = "";
                                        option = "<option value='" + id + "'>" + name +
                                            "</option>";

                                        $("#optionSelect").append(option);
                                    }
                                }
                            }
                        });
                    } else if (category === 'Kelas') {
                        //remove class d-none
                        $('#other').removeClass('d-none');
                        $('#otherSelect').find('option').not(':first').remove();

                        let times = ["Pagi", "Siang", "Sore", "Malam"];
                        let tag = "";
                        for (let index = 0; index < times.length; index++) {
                            tag = "<option value=" + "'" + times[index] + "'" + ">" + times[index] +
                                "</option>";
                            $("#otherSelect").append(tag);
                        }

                        $.ajax({
                            url: '{{ route('allClass') }}',
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                if (response['data'] != null) {
                                    len = response['data'].length;
                                }
                                if (len > 0) {
                                    // Read data and create <option >
                                    for (var i = 0; i < len; i++) {

                                        var id = response['data'][i].id;
                                        var name = response['data'][i].class_name;
                                        // variable option
                                        var option = "";
                                        option = "<option value='" + id + "'>" + name +
                                            "</option>";

                                        $("#optionSelect").append(option);
                                    }
                                }
                            }
                        });
                    } else if (category === 'Program') {
                        //add class d-none
                        $('#other').addClass('d-none');
                        if (category1 === 'SHALAT') {
                            //REMOVE class d-none
                            $('#other').removeClass('d-none');
                            $('#otherSelect').find('option').not(':first').remove();

                            let shalat = ["Shubuh", "Dzhuhur", "Ashar", "Maghrib", 'Isya'];
                            let tag = "";
                            for (let index = 0; index < shalat.length; index++) {
                                tag = "<option value=" + "'" + shalat[index] + "'" + ">" + shalat[index] +
                                    "</option>";
                                $("#otherSelect").append(tag);
                            }
                        }
                        $.ajax({
                            url: '{{ route('getAllProgram') }}',
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                if (response['data'] != null) {
                                    len = response['data'].length;
                                }
                                if (len > 0) {
                                    // Read data and create <option >
                                    for (var i = 0; i < len; i++) {

                                        var id = response['data'][i].id;
                                        var name = response['data'][i].program_name;
                                        // variable option
                                        var option = "";
                                        option = "<option value='" + id + "'>" + name +
                                            "</option>";

                                        $("#optionSelect").append(option);
                                    }
                                }
                            }
                        });
                    }
                });
            }
        });
    </script>
@endpush