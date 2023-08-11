<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- Notifications --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" role="alert" aria-labelledby="navbarDropdownMenuLink">
                @if ($notifications->count() > 0)
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    @foreach ($notifications as $notification)
                        <div class="alert alert-light" role="alert">
                            <div class="d-flex">
                                <p class="dropdown-item"><b> {{ $notification->data['full_name'] }} </b>
                                    ({{ $notification->data['email'] }})
                                    відправив заявку.
                                    [{{ date('d/m/y H:m:s', strtotime($notification->created_at)) }}]
                                </p>
                                <a href="#">
                                    <button type="button" rel="tooltip" title="Mark as read"
                                        class="btn  btn-sm mark-as-read" data-id="{{ $notification->id }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <a href="#" class="dropdown-item" id="mark-all">
                        Прочитати всі
                    </a>
                @else
                    <p class="dropdown-item">Сповіщень немає</p>
                @endif
            </div>
        </li>
        {{-- Full screen --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
