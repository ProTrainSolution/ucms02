
@extends('backend.layouts.master')

@section('title')
Role Create - Admin Panel
@endsection

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Institution Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.institutions.index') }}">All Institution</a></li>
                    <li><span>Institution Create</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Institution</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.institutions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="institution_code">Code</label>
                            <input type="text" class="form-control" id="institution_code" name="institution_code" placeholder="Enter a Institution Code">
                        </div>
                       
                        <div class="form-group">
                            <label for="institution">Code</label>
                            <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter a Institution">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"> Save </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
     {{-- @include('backend.pages.institutions.partials.scripts') --}}
@endsection