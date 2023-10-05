<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex py-3">
        <i class="fa-solid fa-dice-d6 my-2 pe-2"></i>
        School
    </div>
    <ul class="sidebar-nav simplebar-scrollable-y" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                         aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <i class="fa-solid fa-gauge-high nav-icon"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle" href="#">
                                    <i class="fa-solid fa-sitemap nav-icon"></i> Masters
                                </a>
                                <ul class="nav-group-items">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('permission-groups.index') }}">
                                            <span class="nav-icon"></span> Permission Group
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('states.index') }}">
                                            <span class="nav-icon"></span> State
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('cities.index') }}">
                                            <span class="nav-icon"></span> City
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('countries.index') }}">
                                            <span class="nav-icon"></span> Country
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('languages.index') }}">
                                            <span class="nav-icon"></span> Language
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('financial-years.index') }}">
                                            <span class="nav-icon"></span> Financial Year
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 256px; height: 841px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                 style="height: 479px; transform: translate3d(0px, 155px, 0px); display: block;"></div>
        </div>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
