@foreach ($dokter as $data )
<div class="col-lg-4">
    <div class="card-service wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="header">
            <img src="{{ asset('/dokter/' . $data->image) }}" alt="">
        </div>
        <div class="body">
            <h5 class="text-secondary">{{ $data->name }}</h5>
            <p>{{ $data->telepon }}</p>
            <p>{{ $data->alamat }}</p>
        </div>
    </div>
</div>
@endforeach
