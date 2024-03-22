@extends('layout.main')
@section('customcss')
<style>

    .arab {
    font-size: 2em;
    font-family: fontArab;
    line-height: 3!important;
    color:green;
}

</style>
@endsection
@section('content')
<div class="p-3" style="background-color: #dfe6e9; min-height:100%">
    <h1 class="text-center">Daftar Surat</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto d-flex justify-content-center mb-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Surah">
            </div>
        </div>
        <div class="row" id="surahContainer">
            <div class="text-center" id="loadingIndicator" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <!-- Konten Surah akan diperbarui oleh Ajax -->
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script>
    // Fungsi untuk melakukan panggilan Ajax dan memperbarui konten
    function loadSurahData() {
        $('#loadingIndicator').show();
        $.ajax({
            url: '/getsurah',
            type: 'GET',
            success: function(data) {
                var surahContainer = $('#surahContainer');
                surahContainer.empty(); // Bersihkan konten sebelumnya

                // Tambahkan konten baru berdasarkan data yang diterima
                data.forEach(function(s) {
                    var surahHtml = `
                        <div class="col-md-4">
                            <a class="text-decoration-none text-black" href="/baca/surat/${s.nomor}">
                                <div class="d-flex justify-content-between border bg-light border-1 rounded mb-3 py-2 px-3 list">
                                    <p class="align-self-lg-start w-number">
                                        ${s.nomor}
                                    </p>
                                    <div class="align-self-center d-block">
                                        <p class="w-name">${s.nama_latin} (${s.jumlah_ayat}) </p>
                                        <p>${s.arti}</p>
                                    </div>
                                    <div class="align-self-center arab">${s.nama}</div>
                                </div>
                            </a>
                        </div>
                    `;
                    surahContainer.append(surahHtml);

                    $('#loadingIndicator').hide();
                });
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat memuat data surah:', status, error);

                $('#loadingIndicator').hide();

            }
        });
    }

    function searchSurah() {
        var searchText = $('#searchInput').val().toLowerCase();
        var surahList = $('#surahContainer').children();

        surahList.each(function() {
            var surahName = $(this).find('.w-name').text().toLowerCase();
            if (surahName.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Panggil fungsi untuk memuat data surah saat halaman dimuat
    $(document).ready(function() {
        loadSurahData();

        $('#searchInput').on('input', function() {
            searchSurah();
        });
    });
</script>
@endsection
