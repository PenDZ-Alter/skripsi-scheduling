@extends('dashboard.admin.master')

@section('content')
    <div class="container mt-4">
        @foreach ($mahasiswa->chunk(3) as $group)
            <div class="horizontal-card-scroll mb-3">
                @foreach ($group as $mhs)
                    <div class="profile-page-card">
                        <img src="https://png.pngtree.com/png-clipart/20200224/original/pngtree-cartoon-color-simple-male-avatar-png-image_5230557.jpg"
                            class="card-img-top" alt="Foto Mahasiswa">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mhs->name }}</h5>
                            <p class="card-text">
                                <strong>Email : </strong>{{ $mhs->email }}<br>
                                <strong>No. Telp : </strong> {{ $mhs->no_telp }}<br>
                                <strong>Jenis Kelamin : </strong> {{ $mhs->jenis_kelamin == 'lk' ? 'Laki-laki' : 'Perempuan' }}<br>
                                <strong>Alamat : </strong> {{ $mhs->alamat }}<br>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
