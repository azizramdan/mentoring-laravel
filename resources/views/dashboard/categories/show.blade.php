@extends('dashboard.layout.app')

@section('title', 'Detail Kategori')

@section('header', 'Detail Kategori')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard/categories">Kategori</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">ID</div>
                    <div class="col">{{ $category->id }}</div>
                </div>
                <div class="row">
                    <div class="col-2">Name</div>
                    <div class="col">{{ $category->name }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection