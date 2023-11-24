<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="public/styles/style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Poppins:wght@200;400;600&family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>


<body>
    <nav>
        <div class="logo-container">
            <h1>CONTINENTEA</h1>
        </div>
        <ul class="nav-lists">
            <li><a href="<?= site_url('/website'); ?>" class="homeBtn Btn ">HOME</a></li>
            <li>
                <a href="<?= site_url('/reserve') ?>" class="orderBtn">RESERVE</a>
            </li>
            <li><a href="<?= site_url('/showHistory'); ?>" class="homeBtn Btn toggleActive">RESERVE HISTORY</a></li>
            <li><a href="<?= site_url('/logout'); ?>" class="homeBtn Btn ">LOGOUT</a></li>
        </ul>

        <div class="nav-bar">
            <button class="burger-btn">
                <i class="fa-solid fa-bars fa-2xl"></i>
            </button>
        </div>
    </nav>

    <div class="reserve-container section" id="history">
        <table border="1">
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Table</th>
                <th>Address</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <tbody>
                <?php foreach($data as $datas): ?>
                <tr>
                    <td><?=$datas['fullname'] ?></td>
                    <td><?=$datas['email'] ?></td>
                    <td><?=$datas['contact'] ?></td>
                    <td><?=$datas['continenteaTbl'] ?></td>
                    <td><?=$datas['address'] ?></td>
                    <td><?=$datas['date'] ?></td>
                    <td><?=$datas['status'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<style>
#history {
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>