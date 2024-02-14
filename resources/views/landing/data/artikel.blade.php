@foreach ($artikel as $data)
<div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
    <div class="blog-entry align-self-stretch">
        <a href="blog-single.html" class="block-20 rounded" style="background-image: url('{{ asset('artikel-foto/' . $data->image) }}');">
        </a>
        <div class="text p-4">
            <div class="meta mb-2">
                <div><a href="#">{{ $data->created_at }}</a></div>
                <div><a href="#">Admin</a></div>
                {{-- <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div> --}}
            </div>
            <h2 class="heading"><a href="/detail-artikel/{{ $data->id }}">{{ $data->judul }}</a></h2>
            <h3 class="heading"><a href="/detail-artikel/{{ $data->id }}">{{ $data->slug }}</a></h3>
        </div>
    </div>
</div>
@endforeach
