<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="public/styles/style.css" />
    <link rel="stylesheet" href="public/styles/history.css" />
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
        <?php if (!empty($data)): ?>
        <div class="status-container">
            <?php foreach($data as $datas): ?>
            <div class="history-status-container">
                <div class="status-col">
                    <p><i class="fa-solid fa-user"></i> <?=$datas['fullname'] ?></p>
                    <p><i class="fa-solid fa-envelope"></i> <?=$datas['email'] ?></p>
                    <p> <i class="fa-solid fa-address-book"></i> <?=$datas['contact'] ?></p>
                    <p><i class="fa-solid fa-location-dot"></i> <?=$datas['address'] ?></p>
                </div>
                <div class="status-col">
                    <p><i class="fa-regular fa-calendar-days"></i> <?=$datas['date'] ?></p>
                    <div class="status-row">
                        <p><i class="fa-solid fa-table"></i> <?=$datas['continenteaTbl'] ?></p>
                        <p><i class="fa-solid fa-users"></i> People <?=$datas['noPeople'] ?></p>
                    </div>
                    <div class="status-row">
                        <p><i class="fa-solid fa-calendar-check"></i> <?=$datas['status'] ?></p>
                        <p><i class="fa-solid fa-mug-saucer"></i> <?=$datas['menu'] ?></p>
                        <p><i class="fa-solid fa-mug-saucer"></i> <?=$datas['product'] ?></p>
                    </div>
                    <?php if ($datas['status'] !== 'Reserved'): ?>
                    <a href="<?= site_url('/cancelStatus/'.$datas['id']) ?>" class="statusBtn">Cancel</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <h2>No Reserves Yet</h2>
        <?php endif; ?>



    </div>
</body>

</html>
<style>

</style>