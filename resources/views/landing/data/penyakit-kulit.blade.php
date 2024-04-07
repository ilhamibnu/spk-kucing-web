@foreach ($artikel as $data )
<div class="col-lg-4 py-3">
    <div class="card-blog">
        <div class="header">
            <div class="post-thumb">
                <img src="{{ asset('penyakit-kulit/' . $data->image) }}" alt="">
            </div>
        </div>
        <div class="body">
            <h5 class="post-title"><a href="/detail-penyakit-kulit/{{ $data->id }}">{{ $data->judul }}</a></h5>
            <div class="post-date">Posted on <a href="/detail-penyakit-kulit/{{ $data->id }}">{{ $data->created_at->format('d M Y, H:m:s') }}</a></div>
        </div>
    </div>
</div>
@endforeach
