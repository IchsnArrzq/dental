@extends('layouts.master', ['title'=>'doctor'])

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Doctors</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="add-doctor.html" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
    </div>
</div>
<div class="row doctor-grid">
    @foreach($doctors as $data)
    <div class="col-md-4 col-sm-4 col-lg-3">
        <div class="profile-widget shadow">
            <div class="doctor-img">
                <a class="avatar" href="profile.html"><img alt="" src="{{ asset('/storage/'. $data->image) }}"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                </div>
            </div>
            <h4 class="doctor-name text-ellipsis"><a href="{{ route('marketing.doctor.show',$data->id) }}">{{ $data->name }}</a></h4>
            <div class="doc-prof">{{ $data->cabang->nama }}</div>
            <div class="user-country">
                <i class="fa fa-map-marker"></i> {{ $data->address }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop