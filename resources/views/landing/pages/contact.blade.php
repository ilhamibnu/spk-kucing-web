@extends('landing.layout.main')

@section('content')
<div class="container">
    <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
            <div class="col-md-6 py-5 wow fadeInLeft">
                <h1 class="mb-4">Masih Ragu? Hubungi Dokternya Sekarang Juga</h1>
            </div>
            <div class="col-md-6 py-5 wow zoomIn">
                <div class="img-fluid text-center">
                    <img class="img-fluid" src="{{ asset('logo/gatau3.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-section">
    <div id="test" class="container">
        <div class="row">
            @include('landing.data.dokter')
        </div>
    </div>
    @if($jumlah_artikel > 3)
    <div class="ajax-load text-center mb-3">
        <button id="loadmore" class="btn btn-primary">More</button>
    </div>
    @else
    <div class="ajax-load text-center mb-3">
        <button id="loadmore" class="btn btn-primary" style="display: none;">More</button>
    </div>
    @endif
</div>
@endsection

@section('script')
<script>
    var page = 1;
    var ENDPOINT = "/contact?";

    $("#loadmore").click(function() {
        page++;
        loadMoreData(page);
    });

    function loadMoreData(page) {
        $.ajax({
                url: ENDPOINT + '&page=' + page
                , type: "get"
                , beforeSend: function() {
                    $('#loadmore').show();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('#loadmore').show();
                $("#test").append('<div class="row">' + data.html + '</div>');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {});
    }

</script>
@endsection
