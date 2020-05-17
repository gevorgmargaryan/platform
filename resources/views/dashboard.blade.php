@extends('platform::app')

@section('body-left')
    <nav class="collapse justify-content-lg-between w-100 mb-md-5" id="headerMenuCollapse">
        @includeWhen(Auth::check(), 'platform::partials.profile')

        <ul class="nav m-b">
            {!! Dashboard::menu()->render('Main') !!}
        </ul>
    </nav>
@endsection

@section('body-right')
    <div class="p-3 mt-md-4 @hasSection('navbar') @else d-none d-md-block @endif">
        <div class="v-md-center">
            <div class="d-none d-md-block col-xs-12 col-md no-padder">
                <h1 class="m-n font-thin h3 text-black">@yield('title')</h1>
                <small class="text-muted" title="@yield('description')">@yield('description')</small>
            </div>
            <div class="col-xs-12 col-md-auto ml-auto no-padder">
                <ul class="nav command-bar justify-content-sm-end justify-content-start v-center">
                    @yield('navbar')
                </ul>
            </div>
        </div>
    </div>

    @if (Breadcrumbs::exists())
        {{ Breadcrumbs::view('platform::partials.breadcrumbs') }}
    @endif

    <div class="d-flex">
        <div class="app-content-body" id="app-content-body">
            @include('platform::partials.alert')
            @yield('content')
        </div>
    </div>
@endsection
