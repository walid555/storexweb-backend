<div class="m-header">
    <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
    <a href="{{ route('admin:dashboard') }}" class="b-brand">
        <div>
            <img style="width: 100px;height: 40px; filter: brightness(10.5);     border-radius: 0 !important;" src="{{asset('images/storex.jfif')}}" class="rounded-circle">
        </div>
        <span class="b-title"></span>
    </a>
</div>
<a class="mobile-menu" id="mobile-header" href="#!">
    <i class="feather icon-more-horizontal"></i>
</a>
<div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
        <li>
            <div class="dropdown drp-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon feather icon-settings"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-notification">
                    <div class="pro-head">
                            <td style="max-width: 100px !important; max-height: 100px !important">
                                <img style="width: 50px;height: 50px;" src="{{asset('images/avatar-2.jpg')}}"
                                     class="rounded-circle"></td>
                    </div>

                    <ul class="pro-body">

                        <li>

                            <a class="dud-logout" title="Logout" href="{{ route('admin:logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="feather icon-log-out"></i>
                                تسجيل خروج
                            </a>

                            <form id="logout-form" action="{{ route('admin:logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </li>

                    </ul>
                </div>
            </div>
        </li>

    </ul>
</div>
