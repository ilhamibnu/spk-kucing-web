@extends('landing.layout.main')

@section('title','Penyakit Kulit - ')

@section('content')

<div class="container">
    <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <nav aria-label="Breadcrumb">
                    <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Penyakit Kulit</li>
                    </ul>
                </nav>
                <h1 class="text-center">Penyakit Kulit</h1>
            </div>
            <div class="text-center">
                <img class="img-fluid-2" src="{{ asset('logo/gatau8.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <div id="test" class="container">
        <div class="row my-5">
            @include('landing.data.penyakit-kulit')
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
    var ENDPOINT = "/penyakit-kulit-user?";

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
                $("#test").append('<div class="row my-5">' + data.html + '</div>');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {});
    }

</script>
@endsection
