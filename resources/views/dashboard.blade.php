@extends('platform::app')

@section('body-left')
    <nav class="collapse justify-content-lg-between w-100 mb-md-5" id="headerMenuCollapse">
        @includeWhen(Auth::check(), 'platform::partials.profile')

        <ul class="nav m-b">
            {!! Dashboard::menu()->render('Main') !!}

            <li class="nav-item">
                @if(\Orchid\Access\UserSwitch::isSwitch())
                    <a href="#"
                       class="nav-link"
                       data-controller="layouts--form"
                       data-action="layouts--form#submitByForm"
                       data-layouts--form-id="return-original-user"
                    >
                        <i class="icon-logout mr-2" aria-hidden="true"></i>
                        <span>{{ __('Back to my account') }}</span>
                    </a>
                    <form id="return-original-user"
                          class="hidden"
                          data-controller="layouts--form"
                          data-action="layouts--form#submit"
                          action="{{ route('platform.switch.logout') }}"
                          method="POST">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('platform.logout') }}"
                       class="nav-link"
                       data-controller="layouts--form"
                       data-action="layouts--form#submitByForm"
                       data-layouts--form-id="logout-form"
                       dusk="logout-button">
                        <i class="icon-logout mr-2" aria-hidden="true"></i>
                        <span>{{ __('Sign out') }}</span>
                    </a>
                    <form id="logout-form"
                          class="hidden"
                          action="{{ route('platform.logout') }}"
                          method="POST"
                          data-controller="layouts--form"
                          data-action="layouts--form#submit"
                    >
                        @csrf
                    </form>
                @endif

            </li>
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
