@foreach ($riwayat as $data )
<div class="col-md-4 mt-5 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
    <div class="d-block services text-center">
        <div class="media-body p-4">
            <h3 class="heading">{{$data->nama}}</h3>
            <p>{{ $data->created_at->format('d M Y, H:m:s') }}</p>
            <p></p>
            <a href="/riwayat-user/detail/{{ $data->id }}" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
        </div>
    </div>
</div>
@endforeach
