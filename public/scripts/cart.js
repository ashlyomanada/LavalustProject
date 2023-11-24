const cart = [];

document.querySelectorAll(".menu-button").forEach((button) => {
  button.addEventListener("click", () => {
    const productName = button.dataset.milkteaName;

    let matchingItem = "";

    cart.forEach((item) => {
      if (productName === item.productName) {
        matchingItem = item;
      }
    });

    if (matchingItem) {
      matchingItem.quantity += 1;
    } else {
      cart.push({
        productName: productName,
        quantity: 1,
      });
    }

    let cartQuantity = 0;

    cart.forEach((item) => {
      cartQuantity += item.quantity;
    });

    document.querySelector(".cartTotal").innerHTML = cartQuantity;
  });
});

const cartBody = document.querySelector(".cart-body");

let cartElement = "";
cart.forEach((cartItem) => {
  cartElement += `
  <div class="cart-box">
            <div class="cart-image">
              <img
                class="cartImage"
                src="${cartItem.productImage}"
                alt=""
              />
            </div>
            <div class="cart-details">
              <p>${cartItem.productName}</p>
              <p>${cartItem.productPrice}</p>
              <div class="cartBtn-container">
                <button class="addOrder">ADD</button>
                <button class="removeCart">DELETE</button>
              </div>
            </div>
          </div>
  `;
});

console.log(cartElement);
cartBody.innerHTML = cartElement;
