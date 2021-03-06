<div class="row">
    <div class="col-md-12">
        <div class="dash-widget shadow">
            <div class="dash-widget-info pb-4">
                <h2>Jadwal Booking Appointment</h2>
            </div>
            <form action="{{ route('marketing.service.appointments.filter') }}" method="get">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Cabang</label>
                            <select class="select floating">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">From</label>
                            <div class="cal-icon">
                                <input id="startdate" name="startdate" class="form-control @error('startdate') is-invalid @enderror floating datetimepicker" type="text">
                                @error('startdate')
                                <strong class="invalid-feedback">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">To</label>
                            <div class="cal-icon">
                                <input id="enddate" name="enddate" class="form-control @error('enddate') is-invalid @enderror floating datetimepicker" type="text">
                                @error('enddate')
                                <strong class="invalid-feedback">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <button type="submit" class="btn btn-success btn-block"> Cari Jadwal </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if($message = Session::get('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">??</button>
            <strong>
                {{ $message }}
            </strong>
        </div>
    </div>
</div>
@endif
@if($message = Session::get('error'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">??</button>
            <strong>
                {{ $message }}
            </strong>
        </div>
    </div>
</div>
@endif
@php
$a = $a;
@endphp
<div class="row">
    @for($i = $from; $i <= $to;$i++) <div class="col-sm-12 col-md-6">
        <div class="blog grid-blog shadow">
            <div class="blog-image">
                <h3>{{ Carbon\Carbon::now()->addDays($a++)->format('d m Y') }}</h3>

            </div>
            <div class="blog-content">
                <div class="table-responsive">
                    <table class="table table-bordered border">
                        <tr>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Booking</th>
                        </tr>
                        @foreach($dokter as $row)
                        @foreach($row->jadwal as $data)
                        @if($data->tanggal == Carbon\Carbon::now()->addDays($a - 1)->format('Y-m-d'))
                        <tr>
                            <td>
                                <p>
                                    <a href="{{ route('marketing.doctor.show',$row->id) }}"><span class="custom-badge status-blue">{{ $data->user->name }}</span></a>
                                </p>
                                <p>
                                    <span class="custom-badge status-orange">{{ $data->user->cabang->nama }}</span>
                                </p>
                                <p>
                                    @if($data->shift->kode == 'L')
                                    <span class="custom-badge status-red">{{ $data->shift->kode }}</span>
                                    @else
                                    <span class="custom-badge status-green">{{ $data->shift->kode }}</span>
                                    @endif
                                </p>
                                <p>
                                    @if($data->shift->kode == 'L')
                                    <span class="custom-badge status-red">Libur</span>
                                    @else
                                <h6 class="text-secondary">{{$data->shift->waktu_mulai}} - {{ $data->shift->waktu_selesai }}</h6>
                                @endif
                                </p>
                            </td>
                            <td class="text-center">
                                <ul class="list-group">
                                    @foreach($booking as $book)
                                    @if($data->tanggal == $book->tanggal_status)
                                    @if($book->jam_status >= $data->shift->waktu_mulai && $book->jam_selesai <= $data->shift->waktu_selesai)
                                        @if($data->user->id == $book->dokter->id)
                                        <li class="list-group-item"><a href="{{ route('marketing.appointments.show', $book->id) }}" class="btn btn-sm btn-outline-primary">{{ $book->jam_status }} - {{ $book->jam_selesai }}</a></li>
                                        @endif
                                        @endif
                                        @endif
                                        @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($data->shift->kode == 'L')
                                <button disabled class="btn btn-outline-secondary take-btn">Holiday</button>
                                @else
                                @if($data->tanggal == Carbon\Carbon::now()->format('Y-m-d'))
                                @if(Carbon\Carbon::parse($data->shift->waktu_selesai)->format('H:i:s') < Carbon\Carbon::now()->format('H:i:s'))
                                    <button id="{{ $data->id }}" title="{{ $data->user->id }}" disabled class="btn btn-outline-secondary take-btn button-show" data-toggle="modal" data-target=".bd-example-modal-lg">BOOK</button>
                                    @else
                                    <button id="{{ $data->id }}" title="{{ $data->user->id }}" message="now" class="btn btn-outline-success take-btn button-show-now" data-toggle="modal" data-target=".bd-example-modal-lg">BOOK NOW</button>
                                    @endif
                                    @else
                                    <button id="{{ $data->id }}" title="{{ $data->user->id }}" class="btn btn-outline-primary take-btn button-show" data-toggle="modal" data-target=".bd-example-modal-lg">BOOK</button>
                                    @endif
                                    @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</div>
@endfor
</div>
@include('marketing.modal')
@section('footer')
<script>
    $(document).ready(function() {
        $('#startdate,#enddate').datetimepicker({
            useCurrent: true,
            minDate: moment()
        });
        $.ajax({
            url: '/marketing/cabang',
            success: function(data) {
                let name = $.each(data.resource, function() {
                    $('.select').append(`<option value="${this.id}">${this.nama}</option>`)
                });
            }
        })
    })
    $('.button-show-now').click(function() {
        status = $(this).attr('message')
        var button = $(this).attr('id')
        var dokter = $(this).attr('title')
        $('#pasien_id').html('')

        $.ajax({
            url: `/marketing/jadwal/now/${button}/${dokter}`,
            success: (data) => {
                console.log(data)
                $('#jadwal_id').val(button)
                $('#dokter_id').val(`${data.dokter.id}`)
                $('#waktu_mulai').val(data.booking)

            }
        })
    })
    $('.button-show').click(function() {
        status = $(this).attr('message')
        var button = $(this).attr('id')
        var dokter = $(this).attr('title')
        $('#pasien_id').html('')
        $.ajax({
            url: `/marketing/jadwal/${button}/${dokter}`,
            success: (data) => {
                console.log(data)
                $('#jadwal_id').val(button)


                $('#dokter_id').val(`${data.dokter.id}`)
                $('#waktu_mulai').val(data.booking)
            }
        })
    })
    $('.pasienList').select2({
        placeholder: 'Select Customer',
        ajax: {
            url: `/marketing/where/customer`,
            processResults: function(data) {
                console.log(data)
                return {
                    results: data
                };
            },
            cache: true
        }
    });
</script>
@endsection