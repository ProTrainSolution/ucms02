
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
                <h4 class="page-title pull-left">Intake Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.institutions.index') }}">All Intake</a></li>
                    <li><span>Intake Create</span></li>
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
                    <h4 class="header-title">Create New Intake</h4>
                    @include('backend.layouts.partials.messages')

                    @php
                        $wcr=array(
                            "JANUARY" => "JANUARY",
                            "FEBRUARY" => "FEBRUARY",
                            "MARCH" => "MARCH",
                            "APRIL" => "APRIL",
                            "MEI" => "MEI",
                            "JUNE" => "JUNE",
                            "JULY" => "JULY",
                            "AUGUST" => "AUGUST",
                            "SEPTEMBER" => "SEPTEMBER",
                            "OCTOBER" => "OCTOBER",
                            "NOVEMBER" => "NOVEMBER",
                            "DECEMBER" => "DECEMBER"
                        );
                    @endphp     
                    
                    <form action="{{ route('admin.intakes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="name">Intake</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Intake">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="month">Month</label>
                                <select name="month" id="" class="form-control">
                                    @php
                                        foreach($wcr as $short_code => $descriptive) { 
                                            echo '<option value="' . $short_code . '">' . $descriptive . '</option>';        
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="year">Year</label>
                                <input type="integer" class="form-control" id="year" name="year" placeholder="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="sort">Sorting Intake</label>
                                <input type="text" class="form-control" id="sort" name="sort" placeholder="">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea id="myeditorinstance" class="tinymce-editor" name="description"></textarea>
                            </div>
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
     @include('backend.pages.intakes.partials.scripts')
@endsection