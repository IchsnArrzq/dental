@extends('layouts.master', ['title' => 'Pasien'])

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-sm-4 col-3">
                <h1 class="page-title">Pasien</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table" id="table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nik</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('/') }}js/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/resepsionis/ajax/pasien',
                get: 'get'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'nik_ktp',
                    name: 'nik_ktp'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'umur',
                    name: 'umur'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'no_telp',
                    name: 'no_telp'
                },
                {
                    data: 'email',
                    name: 'email'
                }
            ]
        })
    })
</script>
@stop