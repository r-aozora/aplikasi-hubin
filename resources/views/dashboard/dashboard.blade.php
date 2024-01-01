@extends('layouts.app')

@section('link')
    
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="section-body">
                <div class="container">
                    <div class="page-error">
                        <div class="page-inner">
                            <img src="{{ asset('images/under-construction.svg') }}" alt="Under Construction" style="width: 300px">
                            <div class="page-description">
                                Dashboard sedang dalam tahap pengembangan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    
@endsection