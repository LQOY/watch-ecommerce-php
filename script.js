function add_product(ele){
let product_name = ele.parentElement.parentElement.querySelector("h2").innerHTML;

let product_image = ele.parentElement.parentElement.querySelector("img").src;

let product_price = ele.parentElement.querySelector("span").innerHTML;
 
// document.getElementById("shopping_cart_items").innerHTML += `
// <div class="cart_item_container">
//           <img src="${product_image}" alt="">
//           <h3>${product_name}</h3>
//           <h3>${product_price}</h3>
//           <button class="btn btn-secondary">Remove</button>
//         </div>
// `;

let product = {
    name: product_name, 
    image: product_image, 
    price: product_price};

let products = JSON.parse(localStorage.getItem("shoppingcart"));   
if (products === null)
    products = [];

products.push(product);
localStorage.setItem("shoppingcart", JSON.stringify(products));

display_cart();
}

function display_cart() {
let products = JSON.parse(localStorage.getItem("shoppingcart"));   
if (products === null)
    products = [];

let content ="";
let total = 0
products.forEach((product, index)=> {
    content +=  `<div class="cart_item_container">
          <img src="${product.image}" alt="">
          <h3>${product.name}</h3>
          <h3>$${product.price}</h3>
          <button onclick ="remove_product(${index})" class="btn btn-secondary">Remove</button>
        </div>
        `;
        total = total + parseInt(product.price);
        
}); 
document.querySelector(".total_row span").innerHTML = total
document.getElementById("shopping_cart_items").innerHTML  = content
document.getElementById("count").innerHTML = products.length
}

function remove_product(index){
let products = JSON.parse(localStorage.getItem("shoppingcart"));   
if (products === null)
    products = [];

products.splice(index, 1);
localStorage.setItem("shoppingcart", JSON.stringify(products));

display_cart();
}

function update_image(ele){
 document.getElementById("main_image").src = ele.src

}