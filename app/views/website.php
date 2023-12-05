<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Continentea Shop</title>
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
            <li><a href="#home" class="homeBtn Btn toggleActive">HOME</a></li>
            <li><a href="#menu" class="menuBtn Btn">MENU</a></li>
            <li><a href="#about" class="aboutBtn Btn">ABOUT</a></li>
            <li><a href="#product" class="productsBtn Btn">PRODUCTS</a></li>
            <li>
                <a href="<?= site_url('/reserve') ?>" class="orderBtn">RESERVE</a>
            </li>
        </ul>

        <div class="nav-bar">
            <button class="burger-btn">
                <i class="fa-solid fa-bars fa-2xl"></i>
            </button>
        </div>
    </nav>

    <div class="home-container section" id="home">
        <div class="home-description-container">
            <div class="home-descriptions-content">
                <h1>CONTINENTEA</h1>
                <p>
                    Elevate your tea experience with Continentea — where every sip tells a story.
                </p>
                <button class="button">RESERVE NOW</button>
            </div>
        </div>

        <div class="home-hero-container">
            <div class="home-hero-picture-container">
                <img class="home-hero-picture" src="public/milktea_images/menu4.png" alt="" />
            </div>
        </div>

        <div class="cart-list">
            <div class="cart-header">
                <button class="cart-exit">
                    <i class="fa-regular fa-circle-xmark fa-2xl"></i>
                </button>
                <h3>Cart</h3>
            </div>
            <div class="cart-body"></div>
        </div>

        <div class="order-list">
            <div class="order-header">
                <button class="order-exit">
                    <i class="fa-regular fa-circle-xmark fa-2xl"></i>
                </button>
                <h3>Order</h3>
            </div>
            <div class="order-body"></div>
        </div>
    </div>

    <div class="menu-container section" id="menu">
        <div class="menu-header-container">
            <h1>MENU</h1>
        </div>
        <div class="menu-body-container">
            <?php foreach ($data['menu'] as $datas):?>
            <div class="menu-box-container">
                <div class="menu-box-picture-container">
                    <img class="menu-picture" src="public/<?= $datas['image'] ?>" alt="" />
                </div>
                <div class="menu-box-description-container">
                    <div class="menu-box-description1">
                        <h3><?= $datas['name'] ?></h3>
                        <p><i class="fa-solid fa-peso-sign"></i> <?= $datas['price'] ?></p>
                    </div>
                    <div class="menu-box-description2">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="about-container section" id="about">
        <div class="about-header-container">
            <h1>ABOUT</h1>
        </div>
        <div class="about-body-container">
            <div class="about-hero-container">
                <img class="about-hero-picture" src="public/milktea_images/menu1.png" alt="" />
            </div>
            <div class="about-description-container">
                <h2>Best Milktea in the Country</h2>
                <p>
                    Welcome to Continentea, where our love for tea knows no bounds. At Continentea, we are more than
                    just connoisseurs of fine tea – we are storytellers, curators, and enthusiasts on a journey to
                    redefine the tea experience. Our passion stems from a rich tapestry of cultures, flavors, and
                    traditions, woven into every tea leaf.
                </p>
                <button class="button">LEARN MORE</button>
            </div>
        </div>
    </div>

    <div class="products-container section" id="product">
        <div class="product-header-container">
            <h1>PRODUCTS</h1>
        </div>
        <div class="product-body-container">
            <?php foreach ($data['product'] as $datas):?>
            <div class="menu-box-container">
                <div class="menu-box-picture-container">
                    <img class="menu-picture" src="public/<?= $datas['image'] ?>" alt="" />
                </div>
                <div class="menu-box-description-container">
                    <div class="menu-box-description1">
                        <h3><?= $datas['name'] ?></h3>
                        <p><i class="fa-solid fa-peso-sign"> </i><?= $datas['price'] ?></p>
                    </div>
                    <div class="menu-box-description2">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <div class="footer-column">
            <div class="footer-box-container">
                <div class="footer-box">
                    <h3>LOCATION</h3>
                    <u>
                        <li>Tawiran, Calapan City</li>
                    </u>
                </div>
            </div>
            <div class="footer-box-container">
                <div class="footer-box">
                    <h3>CONTACT INFO</h3>
                    <u>
                        <li>0954445507</li>
                        <li>continentea@gmail.com</li>
                        <li>Continentea</li>
                    </u>
                </div>
            </div>
            <div class="footer-box-container">
                <div class="footer-box">
                    <h3>CREATED BY</h3>
                    <u>
                        <li>Ashly Omanada</li>
                        <li>Karyle Ibon</li>
                        <li>Jonel Imbang</li>
                    </u>
                </div>
            </div>
            <div class="footer-box-container">
                <div class="footer-box">
                    <h3>FOLLOW US</h3>
                    <u>
                        <li>Tiktok</li>
                        <li>Facebook</li>
                        <li>Youtube</li>
                        <li>Instagram</li>
                    </u>
                </div>
            </div>
        </div>
    </footer>
    <script src="public/scripts/controls.js"></script>
    <script src="public/scripts/cart.js"></script>
</body>

</html>