const product1 = [
  {
    productImage: "public/milktea_images/products1.png",
    productName: "Menu 1",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/products2.png",
    productName: "Menu 2",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/products3.png",
    productName: "Menu 3",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/products4.png",
    productName: "Menu 4",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/home2.png",
    productName: "Menu 5",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/home1.png",
    productName: "Menu 6",
    productPrice: 100,
  },
];

let product1Html = "";
product1.forEach((products) => {
  product1Html += `
<div class="menu-box-container">
<div class="menu-box-picture-container">
  <img
    class="menu-picture"
    src="${products.productImage}"
    alt=""
  />
</div>
<div class="menu-box-description-container">
  <div class="menu-box-description1">
    <h3>${products.productName}</h3>
    <p>Price:PHP ${products.productPrice}</p>
  </div>
  <div class="menu-box-description2">
  </div>
</div>
</div>
`;
});

document.querySelector(".menu-body-container").innerHTML = product1Html;

const product2 = [
  {
    productImage: "public/milktea_images/product1.png",
    productName: "Product 1",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/product2.png",
    productName: "Product 2",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/product3.png",
    productName: "Product 3",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/product4.png",
    productName: "Product 4",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/blog2.png",
    productName: "Product 5",
    productPrice: 100,
  },
  {
    productImage: "public/milktea_images/blog3.png",
    productName: "Product 6",
    productPrice: 100,
  },
];

let product2Html = "";

product2.forEach((products2) => {
  product2Html += `
  <div class="menu-box-container">
<div class="menu-box-picture-container">
  <img
    class="menu-picture"
    src="${products2.productImage}"
    alt=""
  />
</div>
<div class="menu-box-description-container">
  <div class="menu-box-description1">
    <h3>${products2.productName}</h3>
    <p>Price:PHP ${products2.productPrice}</p>
  </div>
  <div class="menu-box-description2">
  </div>
</div>
</div>
`;
});

document.querySelector(".product-body-container").innerHTML = product2Html;
