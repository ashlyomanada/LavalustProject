<div class="cardBox" id="cardBox">

    <div class="card">
        <div>
            <div class="numbers"><?= implode($data['users']); ?></div>
            <div class="cardName">Users</div>
        </div>

        <div class="iconBx">
            <i class="fa-solid fa-users fa-sm"></i>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?= implode($data['reserves']); ?></div>
            <div class="cardName">Reserves</div>
        </div>

        <div class="iconBx">
            <i class="fa-solid fa-calendar-check fa-sm"></i>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?= implode($data['pending']); ?></div>
            <div class="cardName">Pending</div>
        </div>

        <div class="iconBx">
            <i class="fa-solid fa-calendar-xmark fa-sm"></i>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?= implode($data['allreserves']); ?></div>
            <div class="cardName">All Reserves</div>
        </div>

        <div class="iconBx">
            <i class="fa-regular fa-calendar-days fa-sm"></i>
        </div>
    </div>

</div>