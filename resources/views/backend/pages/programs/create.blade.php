
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
                <h4 class="page-title pull-left">Program Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.programs.index') }}">All Program</a></li>
                    <li><span>Program Create</span></li>
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
                    <h4 class="header-title">Create New Program</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.programs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="institution">Institution</label>
                            <select name="institution_id" id="institution_id" class="form-control @error('institution_id') is-invalid @enderror">
                                <option value="" selected></option>
                                @foreach ($institutions as $institution)
                                @if (old('institution_id') == $institution->id)
                                    <option value="{{ $institution->id }}" selected>{{ $institution->institution }}</option>
                                @else
                                    <option value="{{ $institution->id }}">{{ $institution->institution }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('institution_id')
                            <div class="invalid-feedback">
                                  {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="program_code">Program Code</label>
                            <input type="text" class="form-control" id="program_code" name="program_code" placeholder="Enter a Program Code">
                        </div>
                       
                        <div class="form-group">
                            <label for="program">Program</label>
                            <input type="text" class="form-control" id="program" name="program" placeholder="Enter a Institution">
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