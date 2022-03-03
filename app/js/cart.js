
const cartBtn = document.querySelector('.cart-btn');
const closeCartBtn = document.querySelector('.close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartOverlay = document.querySelector('.cart-overlay');
const cartDOM = document.querySelector('.cart');
const cartItems = document.querySelector('.cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartContent = document.querySelector('.cart-content');
const productsDOM = document.querySelector('.menu__products');
const procCheck  = document.querySelector('.checkout');




//main cart
let cart = [];
let buttonsDOM = [];


//getting products
class Products{
    async getProducts(){
        try{
             let result = await fetch('app/products.json');
            let data = await result.json();
            let products = data.items;
            products = products.map(item =>{
                const{name, price} = item.fields;
                const {id} = item.sys; 
                const image = item.fields.image.fields.file.url;
                return{name, price, id, image}
            });

            return products;
        } catch(error){
            console.log(error);
        }

    }
}
//display products
class UI{
    displayProducts(products){
        let result = '';
        products.forEach(product =>{
            result += `
                <div class="menu__item">
                    <img src=${product.image} alt="">
                    <p>${product.name}</p>
                    <div class="menu__cta">
                        <p>Kshs ${product.price}</p>
                        <button class="button addCart" data-id=${product.id}>Buy</button>
                    </div>
                </div>
            `;
        });
        productsDOM.innerHTML = result;
    }

    getBagButtons(){
        //spread operator - array instead of nodelist
        const buttons = [...document.querySelectorAll('.addCart')];
        buttonsDOM = buttons;
        
        buttons.forEach(button =>{
            let id = button.dataset.id;
            let inCart = cart.find(item => item.id === id);
            
            if(inCart){
                button.innerText = "In Cart";
                button.disabled = true;
            }
    
                button.addEventListener('click', (event)=>{
                    event.target.innerText = 'In Cart';
                    event.target.disabled = true;
                    //get product from products
                    let cartItem = {...Storage.getProduct(id), amount:1};
                    cart = [...cart, cartItem];
                    Storage.saveCart(cart);

                    this.setCartValues(cart);
                    this.addCartItem(cartItem);
                    this.showCart();

                })

        })
    }

    setCartValues(cart){
        let tempTotal = 0;
        let itemsTotal = 0;
        cart.map(item => {
            tempTotal += item.price * item.amount;
            itemsTotal += item.amount;
        })

        cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
        cartItems.innerText = itemsTotal;

        document.getElementById('price').value = tempTotal;

    }

    addCartItem(item){
        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `
            <img src=${item.image} alt="">
            <div>
                <h4 class="nameProduct">${item.name}</h4>
                <h5>Ksh ${item.price}</h5>
                <span class="remove-item" data-id=${item.id}>remove</span>
            </div>
            <div class="amount">
                <img src="/images/icons8-up-24.png" alt="" data-id=${item.id} class="up">
                <p class="item-amount">${item.amount}</p>
                <img src="/images/icons8-down-24.png" alt="" data-id=${item.id} class="down">
            </div>
        `;
        cartContent.appendChild(div);
    }

    showCart(){
         cartOverlay.classList.add('transparentBcg');
         cartDOM.classList.add('showCart');
    }

    hideCart(){
         cartOverlay.classList.remove('transparentBcg');
         cartDOM.classList.remove('showCart');
    }

    setupApp(){
        cart = Storage.getCart();
        this.setCartValues(cart);
        this.populateCart(cart);
        cartBtn.addEventListener('click', this.showCart);
        closeCartBtn.addEventListener('click', this.hideCart);
    }

    populateCart(cart){
        cart.forEach(item => this.addCartItem(item));
    }

    cartLogic(){
        //clear cart button
        clearCartBtn.addEventListener('click', () =>{
            this.clearCart();
        });
        
        //cart functionality
        cartContent.addEventListener('click', event => {
            if(event.target.classList.contains('remove-item')){
                let removeItem = event.target;
                let id = removeItem.dataset.id;
                cartContent.removeChild(removeItem.parentElement.parentElement);
                this.removeItem(id);
            }
            else if (event.target.classList.contains('up')) {
                let addAmount = event.target;
                let id = addAmount.dataset.id;
                let tempItem = cart.find(item => item.id === id);
                tempItem.amount = tempItem.amount + 1;
                Storage.saveCart(cart);
                this.setCartValues(cart);
                addAmount.nextElementSibling.innerText = tempItem.amount;
            }
            else if (event.target.classList.contains('down')) {
                let lowerAmount = event.target;
                let id = lowerAmount.dataset.id;
                let tempItem = cart.find(item => item.id === id);
                tempItem.amount = tempItem.amount - 1;

                if (tempItem.amount > 0) {
                    Storage.saveCart(cart);
                    this.setCartValues(cart);
                    lowerAmount.previousElementSibling.innerText = tempItem.amount;
                }else{
                    cartContent.removeChild(lowerAmount.parentElement.parentElement);
                    this.removeItem(id);
                }
            }

        })
    }

    clearCart(){
       let cartItems = cart.map(item => item.id);
        cartItems.forEach(id => this.removeItem(id));

        console.log(cartContent.children);

        while(cartContent.children.length > 0){
            cartContent.removeChild(cartContent.children[0]);
        }
        this.hideCart();
    }

    removeItem(id){
        cart = cart.filter(item => item.id !== id);
        this.setCartValues(cart);
        Storage.saveCart(cart);
        let button = this.getSingleButton(id);
        button.disabled = false;
        button.innerText = `Buy`;
    }

    getSingleButton(id){
        return buttonsDOM.find(button => button.dataset.id === id);
       
    } 
}

procCheck.addEventListener("click", function(){
    if (cartContent.children.length > 0) {
            document.location.href = './checkout.html'; 
                    
    }else{
        alert("Cart is empty");
    }

});

//local storage
class Storage{
    static saveProducts(products){
        //stringify array
        localStorage.setItem("products", JSON.stringify(products));
    }

    static getProduct(id){
        let products = JSON.parse(localStorage.getItem('products'));
        return products.find(product => product.id === id);
    }

    static saveCart(cart){
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    static getCart(){
        return localStorage.getItem('cart')?JSON.parse(localStorage.getItem('cart')):[]
    }
}

//load products asynchronously
document.addEventListener("DOMContentLoaded", ()=>{
    const ui = new UI();
    const products = new Products();

    //setup app
    ui.setupApp();

    //get all products
    products.getProducts().then(products => {
        ui.displayProducts(products);
        Storage.saveProducts(products);
    }).then(() =>{
        ui.getBagButtons();
        ui.cartLogic();
    });
    
});

