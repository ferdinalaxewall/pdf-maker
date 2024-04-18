@extends('layouts.main')
@section('title', 'Form Convert')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
    <form class="row" style="row-gap: 15px" method="POST" id="pewaris-form" action="{{ route('convert.pdf') }}">
        @csrf
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center mb-3">Form Keterangan Pewaris</h5>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama_pewaris') is-invalid @enderror" id="nama_pewaris" name="nama_pewaris" placeholder="Nama Pewaris" required>
                        <label for="nama_pewaris">Nama Pewaris</label>

                        @error('nama_pewaris')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control @error('alamat_pewaris') is-invalid @enderror" rows="5" id="alamat_pewaris" name="alamat_pewaris" placeholder="" style="height: 100px;" required></textarea>
                        <label for="alamat_pewaris">Alamat Pewaris</label>

                        @error('alamat_pewaris')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <h5 class="text-center mb-0">List Pewaris</h5>
                        <button type="button" class="btn btn-primary btn-icon" id="tambah-anak">
                            <i class="bx bx-plus-circle"></i>
                        </button>
                    </div>
    
                    <div id="list-anak-wrapper">
                        <div class="list-anak">
                            <div class="list-anak-input">
                                <div class="">
                                    <label for="nama_anak" class="mb-1">
                                        <small>Nama Anak</small>
                                    </label>
                                    <input type="text" class="form-control" id="nama_anak" placeholder="Nama Anak" required>
                                </div>
                                <div class="">
                                    <label for="nik" class="mb-1">
                                        <small>NIK</small>
                                    </label>
                                    <input type="text" class="form-control" id="nik" placeholder="NIK" required>
                                </div>
                                <div class="">
                                    <label for="tempat_lahir" class="mb-1">
                                        <small>Tempat Lahir</small>
                                    </label>
                                    <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required>
                                </div>
                                <div class="">
                                    <label for="tgl_lahir" class="mb-1">
                                        <small>Tanggal Lahir</small>
                                    </label>
                                    <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" required>
                                </div>
                            </div>
                            <div class="list-anak-action" style="display: none;">
                                <label for="" class="mb-1">&nbsp;</label>
                                <button type="button" class="btn btn-danger btn-icon delete-list-anak">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    @error('list_pewaris.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="hidden" name="list_pewaris" value="[]">
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success w-100 d-flex align-items-center justify-content-center gap-2">
                <i class="bx bx-right-arrow-alt"></i>
                Generate PDF
            </button>
        </div>
    </form>
@endsection

@push('script')
<script>
    function generateNewList(wrapperElement)
    {
        const clonedList = $(wrapperElement).children('.list-anak').eq(0).clone();
        $(clonedList).find('input').val('');
        $(wrapperElement).append(clonedList);

        $(wrapperElement).children('.list-anak').each(function (index){
            if (index !== 0) $(this).find('.list-anak-action').show();
        })
    }

    $(document).ready(function () {
        $("#tambah-anak").off('click').on('click', function () {
            generateNewList($('#list-anak-wrapper'))
        });

        $(document).off('click', '.delete-list-anak').on('click', '.delete-list-anak', function () {
            $(this).parents('.list-anak').remove();
        })

        $("#pewaris-form").submit(function (event) {
            const listPewaris = [];
            $("#list-anak-wrapper").children('.list-anak').each(function (index) {
                const pewarisItem = {
                    nama_anak: $(this).find('input#nama_anak').val(),
                    nik: $(this).find('input#nik').val(),
                    tempat_lahir: $(this).find('input#tempat_lahir').val(),
                    tgl_lahir: $(this).find('input#tgl_lahir').val(),
                }

                listPewaris.push(pewarisItem)
            });

            $("input[name='list_pewaris']").val(JSON.stringify(listPewaris));
        });
    });
</script>
@endpush