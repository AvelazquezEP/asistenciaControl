<style>
    .header {
        display: flex;
        align-items: center;
        background-color: #333333;
    }

    .logo {
        color: white;
    }

    .logo:hover {
        font-weight: bold;
        color: bisque;
    }

    .navDividers {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .nav {
        display: flex;
        justify-content: space-between;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        /* background-color: #111; */
        background-color: rgb(245, 245, 245);
        color: #333333;
    }

    .active {
        background-color: #4CAF50;
    }

    /* .btn_logout:hover {
        background-color: rgb(219, 159, 131);
    } */
</style>

<header class="header">
    <a class="navbar-brand logo" href="{{ URL('/') }}">{{ $_ENV['APP_NAME'] }}</a>
    <div class="navDividers">
        {{-- NAV 1 --}}
        <div>
            <ul>
                @can('role-create')
                    <li><a href="{{ URL('/users') }}">Users</a></li>
                @endcan
                {{-- <li><a href="{{ route('Users.users') }}">Users2</a></li> --}}
                <li><a href="#">Scheduler</a></li>
            </ul>
        </div>
        {{-- NAV 2 --}}
        <div>
            <ul>
                <li class="btn_logout">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
