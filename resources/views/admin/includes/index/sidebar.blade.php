<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/img/icon/logo.svg') }}" alt="Inspiration Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}"
                                class="nav-link {{ request()->is('admin/') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Заявки
                                    {{-- <span class="badge badge-info right">{{ $applications->total() }}</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Банер</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('advantages.index') }}"
                                class="nav-link {{ request()->is('admin/advantages*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Переваги</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('visa-categories.index') }}"
                                class="nav-link {{ request()->is('admin/visa-categories*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Категорії віз</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}"
                                class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Послуги</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reviews.index') }}"
                                class="nav-link {{ request()->is('admin/reviews*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Відгуки</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('visas.index') }}"
                                class="nav-link {{ request()->is('admin/visas*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Візи</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('visa-types.index') }}"
                                class="nav-link {{ request()->is('admin/visa-types*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Типи віз (форма заявки)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('application-status.index') }}"
                                class="nav-link {{ request()->is('admin/application-status*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Статуси заявки</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/meta*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-solid fa-tag"></i>
                                <p>
                                    Meta теги
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('meta.show', 'home-page') }}"
                                        class="nav-link {{ request()->is('admin/meta/home-page*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Головна сторінка</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('meta.show', 'oferta') }}" class="nav-link">
                                        <i
                                            class="far fa-circle nav-icon {{ request()->is('admin/meta/oferta*') ? 'active' : '' }}"></i>
                                        <p>Сторінка оферти</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}"
                                class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Контакти</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
