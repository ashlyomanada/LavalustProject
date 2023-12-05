<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
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
                <a href="<?= site_url('/reserve') ?>" class="orderBtn toggleActive">RESERVE</a>
            </li>
            <li><a href="<?= site_url('/showHistory'); ?>" class="homeBtn Btn ">RESERVE HISTORY</a></li>
            <li><a href="<?= site_url('/logout'); ?>" class="homeBtn Btn ">LOGOUT</a></li>
        </ul>

        <div class="nav-bar">
            <button class="burger-btn">
                <i class="fa-solid fa-bars fa-2xl"></i>
            </button>
        </div>
    </nav>

    <div class="reserve-container section" id="home">
        <?php if(isset($error_message)) {?>
        <h1><?= $error_message; ?></h1>
        <?php }?>
        <?php foreach($data as $datas): ?>
        <form class="form" action="<?= site_url('/reserveInsert'); ?>" method="post">
            <p class="form-title">Reserve Now</p>
            <div class="input-container">
                <input type="text" placeholder="Enter Full Name" name="username" value="<?=$datas['username'] ?>"
                    required>
                <span>
                </span>
                <input type="email" placeholder="Enter email" value="<?=$datas['email'] ?>" name="email" required>
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="number" placeholder="Contact" name="contact" required min="11">
                <span>
                </span>
                <select name="table" id="inputTable" placeholder="Table" required>
                    <option value="Table 1">Table 1</option>
                    <option value="Table 2">Table 2</option>
                    <option value="Table 3">Table 3</option>
                    <option value="Table 4">Table 4</option>
                    <option value="Table 5">Table 5</option>
                    <option value="Table 6">Table 6</option>
                </select>
                <span>
                </span>
            </div>
            <div class="input-container">
                <textarea name="address" id="address" cols="75" rows="2" placeholder="Address" required></textarea>
                <span>
                </span>
            </div>
            <div class="input-container">
                <select name="menu" id="inputTable" placeholder="Menu" required>
                    <option value="No Choice">No Choice</option>
                    <option value="Menu 1">Menu 1</option>
                </select>
                <span>
                </span>
                <select name="product" id="inputTable" placeholder="Product" required>
                    <option value="No Choice">No Choice</option>
                    <option value="Product 1">Product 1</option>
                </select>
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="datetime-local" name="date" id="" required>
                <span>
                </span>
                <input type="number" placeholder="No. People" name="people" min="1" required>
                <span>
                </span>
            </div>
            <button type="submit" class="submit">
                Reserve
            </button>

        </form>
        <?php endforeach; ?>
    </div>
</body>

</html>
<style>
.reserve-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
}

.form {
    background-color: #ecc1a1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    height: 75%;
    max-width: 700px;
    border-radius: 0.5rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

textarea {
    width: 100%;
}

.form-title {
    font-size: 1.25rem;
    line-height: 1.75rem;
    font-weight: 600;
    text-align: center;
    color: #000;
}

.input-container {
    position: relative;
}

#address {
    padding: .5rem;
    outline: none;
    border: 1px solid #e5e7eb;
    margin: 8px 0;
    background-color: #fff;
    padding: 1rem;
    padding-right: 3rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    width: 100%;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

#inputTable,
.input-container input,
.form button {
    outline: none;
    border: 1px solid #e5e7eb;
    margin: 8px 0;
}

#inputTable,
.input-container input {
    background-color: #fff;
    padding: 1rem;
    padding-right: 3rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    width: 300px;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.submit {
    display: block;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    background-color: #ffd7a8;
    color: black;
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 500;
    width: 100%;
    border-radius: 0.5rem;
    text-transform: uppercase;
    border: none;
}

.signup-link {
    color: #6B7280;
    font-size: 0.875rem;
    line-height: 1.25rem;
    text-align: center;
}

.signup-link a {
    text-decoration: underline;
}
</style>