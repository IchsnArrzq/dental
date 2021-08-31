@extends('layouts.master', ['title' => 'Appointments'])

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Appointments List of {{ auth()->user()->name }}</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Appointment ID</th>
                        <th>Pasien</th>
                        <th>Umur</th>
                        <th>Dokter Nama</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>
                            <a href="{{route('dokter.appointments.show', $data->id)}}">
                                <span class="badge badge-success">{{ $data->no_booking }}</span>
                            </a>
                        </td>
                        <td>{{ $data->pasien->nama }}</td>
                        <td>{{ (int)Carbon\Carbon::now()->format('Y') - (int)Carbon\Carbon::parse(substr($data->pasien->ttl, -10))->format('Y') }}</td>
                        <td><a href="{{ route('dokter.show', $data->dokter->id) }}">{{ $data->dokter->name }}</a></td>
                        <td>{{ $data->tanggal_status }}</td>
                        <td>{{ $data->jam_status }} - {{ $data->jam_selesai }}</td>
                        <td>
                            <span class="custom-badge status-blue">
                                {{ $data->kedatangan->status }}
                            </span>
                        </td>
                        <td>
                            @foreach($data->tindakan as $row)
                            <ul class="list-unstyled">
                                <li>
                                    @if($row->status)
                                    <span class="custom-badge status-green">{{ $row->item->nama_barang }}</span>
                                    @else
                                    <span class="custom-badge status-red">{{ $row->item->nama_barang }}</span>
                                    @endif
                                </li>
                            </ul>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop