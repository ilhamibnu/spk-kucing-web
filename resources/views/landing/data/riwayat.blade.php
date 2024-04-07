@foreach ($riwayat as $data )
<div class="col-lg-4">
    <div class="card-service wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="body">
            <h5 class="text-secondary">{{ $data->nama }}</h5>
            <p>{{ $data->created_at->format('d M Y, H:m:s') }}</p>
            <a href="/riwayat-user/detail/{{ $data->id }}" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>
@endforeach
