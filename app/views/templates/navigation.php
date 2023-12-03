<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <i class="fa-solid fa-shop fa-2xl"></i>
                </span>
                <span class="title">Continentea</span>
            </a>
        </li>

        <li>
            <a href="<?= site_url('/getDashboard') ?>" id="btn-dashboard">
                <span class="icon">
                    <i class="fa-solid fa-chart-simple fa-xl"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li class="hovered">
            <a href="<?= site_url('/admin') ?>" id="btn-customers">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Customers</span>
            </a>
        </li>


        <li>
            <a href="<?= site_url('/getMenu') ?>" id="btn-menu">
                <span class="icon">
                    <i class="fa-solid fa-table-list fa-xl"></i>
                </span>
                <span class="title">Menu</span>
            </a>
        </li>

        <li>
            <a href="<?= site_url('/getProduct') ?>" id="btn-product">
                <span class="icon">
                    <i class="fa-solid fa-layer-group fa-xl"></i>
                </span>
                <span class="title">Product</span>
            </a>
        </li>

        <li>
            <a href="<?= site_url('/getUsers') ?>" id="btn-users">
                <span class="icon">
                    <i class="fa-solid fa-users-gear fa-xl"></i>
                </span>
                <span class="title">Users</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>