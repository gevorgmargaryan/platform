<div class="p-3 v-center">
    <div class="dropdown col no-padder">
        <a href="#" class="d-flex p-0 v-center" data-toggle="dropdown">
            <span class="thumb-sm avatar mr-3">
                <img src="{{Auth::user()->presenter()->image()}}" class="b b-dark bg-light">
            </span>
            <div class="chat-user">
                <div class="chat-user-inner">
                    <div class="user-accr ua-color-8">{{Auth::user()->presenter()->initials()}}</div>
                    <div class="user-name">
                        <span class="text-ellipsis">{{Auth::user()->presenter()->title()}}</span>
                    </div>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow bg-white">

            {!! Dashboard::menu()->render('Profile','platform::partials.dropdownMenu') !!}

            @if(Dashboard::menu()->container->where('location','Profile')->isNotEmpty())
                <div class="dropdown-divider"></div>
            @endif

            @if(Auth::user()->hasAccess('platform.systems.index'))
                <a href="{{ route('platform.systems.index') }}" class="dropdown-item">
                    <i class="icon-settings mr-2" aria-hidden="true"></i>
                    <span>{{ __('Systems') }}</span>
                </a>
            @endif
        </div>
    </div>

    @include('platform::partials.notificationProfile')
</div>
