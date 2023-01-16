<style>
    .button{
        left: 0px;
        position: inherit;
        text-transform: unset;
    }
    .container{
        margin-top: 0px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">book store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/admin">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?show=users">Khách Hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?show=carts">Đơn hàng</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            thống kê
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?show=statistics by revenue">theo doanh thu</a>
            <a class="dropdown-item" href="index.php?show=statistics by number">theo số lượng sách</a>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="/destroy.php">Logout</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 button" type="submit">Search</button>
        </form>
    </div>
</nav>