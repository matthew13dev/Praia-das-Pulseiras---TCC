
// Product data
let products = [];
        const apiProdutosURL = "./api/produtos.php";
        fetch(apiProdutosURL)
        .then(response => {
            if(!response.ok){
                 throw new Error(`Erro HTTP! status: ${response.status}`);
            }

            return response.json()
        }).then(data => {


            console.log("Dados recebidos: ", data)
            products = data;
            renderProducts(data);
        })

        .catch(error => {
    // Trata erros que possam ocorrer
    console.error('Erro ao buscar dados:', error);
  });

        // Cart management
        let cart = [];

        // Load products
        function renderProducts(produtos) {
            const productGrid = document.getElementById('productGrid');
            
            productGrid.innerHTML = produtos.map(product => `
    <div class="product-card">
      <img src="${product.imagem}" alt="${product.nome}" class="product-image">
      <div class="product-info">
        <h3 class="product-name">${product.nome}</h3>
        <p class="product-price">R$ ${product.preco}</p>
        <p class="product-description">${product.descricao}</p>
        <button class="add-to-cart" onclick="addToCart(${product.id})">
          Adicionar ao Carrinho
        </button>
      </div>
    </div>
  `).join('');
        }

// Filter products
document.addEventListener('DOMContentLoaded', function() {
loadProducts();

// Filter buttons
const filterButtons = document.querySelectorAll('.filter-btn');
filterButtons.forEach(btn => {
btn.addEventListener('click', function() {
filterButtons.forEach(b => b.classList.remove('active'));
this.classList.add('active');
loadProducts(this.dataset.filter);
});
});
});

// Add to cart
function addToCart(productId) {
const product = products.find(p => p.id === productId);
const existingItem = cart.find(item => item.id === productId);

if (existingItem) {
existingItem.quantity += 1;
} else {
cart.push({...product, quantity: 1});
}

updateCartCount();
showNotification('Produto adicionado ao carrinho!');
}

// Update cart count
function updateCartCount() {
const cartCount = document.getElementById('cartCount');
const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
cartCount.textContent = totalItems;
}

// Open cart
function openCart() {
const modal = document.getElementById('cartModal');
modal.style.display = 'block';
renderCartItems();
}

// Close cart
function closeCart() {
const modal = document.getElementById('cartModal');
modal.style.display = 'none';
}

// Render cart items
function renderCartItems() {
const cartItems = document.getElementById('cartItems');
const cartTotal = document.getElementById('cartTotal');

if (cart.length === 0) {
cartItems.innerHTML = '<div class="empty-cart">Seu carrinho está vazio</div>';
cartTotal.textContent = 'Total: R$ 0,00';
return;
}

cartItems.innerHTML = cart.map(item => `
<div class="cart-item">
<img src="${item.imagem}" alt="${item.nome}">
<div class="cart-item-info">
<div class="cart-item-name">${item.nome}</div>
<div class="cart-item-price">R$ ${item.preco}</div>
<div class="quantity-controls">
<button class="quantity-btn" onclick="changeQuantity(${item.id}, -1)">-</button>
<span>Qtd: ${item.quantity}</span>
<button class="quantity-btn" onclick="changeQuantity(${item.id}, 1)">+</button>
</div>
</div>
<button class="remove-item" onclick="removeFromCart(${item.id})">Remover</button>
</div>
`).join('');

const total = cart.reduce((sum, item) => sum + (item.preco * item.quantity), 0);
cartTotal.textContent = `Total: R$ ${total.toFixed(2).replace('.', ',')}`;
}

// Change quantity
function changeQuantity(productId, change) {
const item = cart.find(item => item.id === productId);
if (item) {
item.quantity += change;
if (item.quantity <= 0) {
removeFromCart(productId);
} else {
updateCartCount();
renderCartItems();
}
}
}

// Remove from cart
function removeFromCart(productId) {
cart = cart.filter(item => item.id !== productId);
updateCartCount();
renderCartItems();
showNotification('Produto removido do carrinho');
}

// Checkout
function checkout() {
if (cart.length === 0) {
showNotification('Adicione produtos ao carrinho primeiro!');
return;
}

// Cria um formulário dinamicamente
const form = document.createElement('form');
form.method = 'POST';
form.action = '/checkout/checkout.php';

// Adiciona os itens do carrinho como campos ocultos
cart.forEach(item => {
const itemInput = document.createElement('input');
itemInput.type = 'hidden';
itemInput.name = 'cart_items[]';
itemInput.value = JSON.stringify(item);
form.appendChild(itemInput);
});

// Adiciona o formulário ao body e submete
document.body.appendChild(form);
form.submit();

showNotification('Redirecionando para checkout...');
}

// Show notification
function showNotification(message) {
const notification = document.getElementById('notification');
notification.textContent = message;
notification.style.display = 'block';

setTimeout(() => {
notification.style.display = 'none';
}, 3000);
}

// Close modal when clicking outside
window.onclick = function(event) {
const modal = document.getElementById('cartModal');
if (event.target === modal) {
closeCart();
}
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
anchor.addEventListener('click', function (e) {
e.preventDefault();
const target = document.querySelector(this.getAttribute('href'));
if (target) {
target.scrollIntoView({
behavior: 'smooth',
block: 'start'
});
}
});
});

// ADMIN LOGIN E PAINEL
const adminLoginBtn = document.getElementById('adminLoginBtn');
const adminLoginModal = document.getElementById('adminLoginModal');
const adminPanel = document.getElementById('adminPanel');
const adminContent = document.getElementById('adminContent');
let isAdminLogged = false;

adminLoginBtn.onclick = function() {
adminLoginModal.style.display = 'block';
};
function closeAdminLogin() {
adminLoginModal.style.display = 'none';
}
function adminLogin(event) {
event.preventDefault();
// Simulação de login (substitua pelo backend depois)
const email = document.getElementById('adminEmail').value;
const senha = document.getElementById('adminPassword').value;
if(email === 'admin@admin.com' && senha === 'admin') {
isAdminLogged = true;
adminLoginModal.style.display = 'none';
adminPanel.style.display = 'block';
showAdminSection('produtos');
} else {
showNotification('E-mail ou senha incorretos!');
}
return false;
}
function adminLogout() {
isAdminLogged = false;
adminPanel.style.display = 'none';
}
function showAdminSection(section) {
if(section === 'produtos') {
adminContent.innerHTML = `
<h2 style='color:#667eea;'>Produtos</h2>
<button class='btn' style='margin-bottom:1rem;' onclick='adminAddProduct()'>Adicionar Produto</button>
<div id='adminProductForm' class='cartModel' style='display:none; margin-top:2rem; position;'></div>
<div id='adminProductList'></div>
`;
renderAdminProducts();
} else if(section === 'pedidos') {
adminContent.innerHTML = `
<h2 style='color:#667eea;'>Pedidos</h2>
<div id='adminOrderList'></div>
<div id='adminOrderDetails' style='display:none; margin-top:2rem;'></div>
`;
renderAdminOrders();
}
}
// CRUD de Produtos (mock)
function renderAdminProducts() {
const list = document.getElementById('adminProductList');
list.innerHTML = products.map(p => `
<div style='display:flex;align-items:center;gap:1rem;border-bottom:1px solid #eee;padding:1rem 0;'>
<img src='${p.imagem}' style='width:60px;height:60px;object-fit:cover;border-radius:8px;'>
<div style='flex:1;'>
<div style='font-weight:bold;'>${p.nome}</div>
<div style='color:#667eea;'>R$ ${p.preco}</div>
<div style='color:#666;font-size:0.9rem;'>${p.descricao}</div>
</div>
<button class='btn' style='background:#ffb703;color:#333;' onclick='adminEditProduct(${p.id})'>Editar</button>
<button class='btn' style='background:#ff4757;' onclick='adminDeleteProduct(${p.id})'>Excluir</button>
</div>
`).join('');
}
function adminAddProduct() {
const form = document.getElementById('adminProductForm');
form.style.display = 'block';
form.innerHTML = `
<h3>Novo Produto</h3>
<form onsubmit='return saveNewProduct(event)'>
<input required placeholder='Nome' id='newProdName' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required type='number' step='0.01' placeholder='Preço' id='newProdPrice' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required type='number' step='0.01' placeholder='quantidade' id='newProdQt' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required placeholder='Categoria' id='newProdCat' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required placeholder='URL da Imagem' id='newProdImg' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<textarea required placeholder='Descrição' id='newProdDesc' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'></textarea><br>
<button class='btn' type='submit'>Salvar</button>
<button class='btn' type='button' style='background:#ccc;color:#333;margin-left:1rem;' onclick='cancelAdminProductForm()'>Cancelar</button>
</form>
`;
}
function saveNewProduct(event) {
event.preventDefault();


//criando objeto com os dados do formulario
var novoProduto = {
  nome: document.getElementById('newProdName').value,
  preco: parseFloat(document.getElementById('newProdPrice').value),
  quantidade: parseInt(document.getElementById('newProdQt').value),
  categoria: document.getElementById('newProdCat').value,
  imagem: document.getElementById('newProdImg').value,
  descricao: document.getElementById('newProdDesc').value
}
console.log(JSON.stringify(novoProduto));
console.log("Dados a serem enviados:", novoProduto); // Debug
    
//enviando para o servidor php

fetch('api/produtos.php',{
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  "body": JSON.stringify(novoProduto)
})
.then(response => {
  console.log("Status da resposta: " , response.status); //Debug
  if(!response.ok){
     return response.text().then(text => { throw new Error(text) });
  }
  return response.json();
})
.then(data=>{
  
  console.log("Resposta ao servidor: ", data); //Debug

  if(data.success){
    console.log("Resposta ao servidor: ", data); //Debug
    renderAdminProducts();  //atualizando a lista de produtos
    cancelAdminProductForm();
    showNotification('Produto adicionado!');
  } else{
    showNotification('Erro ao adicionar produto: ' + data.message, 'error');
  }
});

return false;

}


function cancelAdminProductForm() {
const form = document.getElementById('adminProductForm');
form.style.display = 'none';
form.innerHTML = '';
}
function adminEditProduct(id) {
const prod = products.find(p => p.id === id);
const form = document.getElementById('adminProductForm');
form.style.display = 'block';
form.innerHTML = `
<h3>Editar Produto</h3>
<form onsubmit='return saveEditProduct(event,${id})'>
<input required value='${prod.nome}' id='editProdName' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required type='number' step='0.01' value='${prod.preco}' id='editProdPrice' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required type='number' step='0.01' value='${prod.quantidade_estoque}' id='editProdQt' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required value='${prod.categoria}' id='editProdCat' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<input required value='${prod.imagem}' id='editProdImg' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'><br>
<textarea required id='editProdDesc' style='width:100%;margin-bottom:0.5rem;padding:8px;border-radius:8px;border:1px solid #ccc;'>${prod.descricao}</textarea><br>
<button class='btn' type='submit'>Salvar</button>
<button class='btn' type='button' style='background:#ccc;color:#333;margin-left:1rem;' onclick='cancelAdminProductForm()'>Cancelar</button>
</form>
`;
}
function saveEditProduct(event, id) {
event.preventDefault();

const prod = products.find(p => p.id === id);

prod.nome = document.getElementById('editProdName').value;
prod.preco = parseFloat(document.getElementById('editProdPrice').value);
prod.quantidade = (document.getElementById('editProdQt').value);
prod.categoria = document.getElementById('editProdCat').value;
prod.imagem = document.getElementById('editProdImg').value;
prod.descricao = document.getElementById('editProdDesc').value;


var produtoAtualizado = {
  id: prod.id,
  nome: prod.nome,
  preco: prod.preco,
  quantidade: prod.quantidade,
  categoria: prod.categoria,
  imagem: prod.imagem,
  descricao: prod.descricao

}

fetch("api/produtos.php",{
  method: "UPDATE",
  headers:{
    "Content-Type": "application/json"
  },
  "body": JSON.stringify(produtoAtualizado)
})

.then(response => {
  console.log("Status da resposta: " , response.status); //Debug
  if(!response.ok){
     return response.text().then(text => { throw new Error(text) });
  }
  return response.json();
})

 .then(data=>{
  
  console.log("Resposta ao servidor: ", data); //Debug

 if(data.success){
    console.log("Resposta ao servidor: ", data); //Debug
      
    renderAdminProducts();
    cancelAdminProductForm();
    showNotification('Produto atualizado!');
 } 
 else {
  showNotification("Erro ao atualizar produto" + data.message, "error");
 }
});
return false;

}

function adminDeleteProduct(id) {
if(confirm('Tem certeza que deseja excluir este produto?')) {
fetch("api/produtos.php",{
  method: "DELETE",
  headers:{
    "Content-Type": "application/json"
  },
  "body": JSON.stringify({id: id})
})
.then(response => {
  console.log("Status da resposta: " , response.status); //Debug
  if(!response.ok){
     return response.text().then(text => { throw new Error(text) });
  }
  return response.json();
})

.then(data=>{
  
          console.log("Resposta ao servidor: ", data); //Debug

          if(data.success){
            renderAdminProducts();
            showNotification('Produto excluído!');  
          } 
          else {
            showNotification("Erro ao atualizar produto" + data.message, "error");
          }
})
.catch(error => {
            console.error("Erro:", error);
            showNotification(error.message, 'error');
        });
  }
}
// CRUD de Pedidos (mock)
let mockOrders = [
{
id: 1,
cliente: {nome: 'João Silva', contato: '(11) 98888-8888', endereco: 'Rua das Flores, 123'},
itens: [
{name: 'Pulseira Macramê Oceano', quantity: 2, price: 45.90},
{name: 'Pulseira de Miçangas Tropicais', quantity: 1, price: 32.50}
]
},
{
id: 2,
cliente: {nome: 'Maria Souza', contato: '(21) 97777-7777', endereco: 'Av. Atlântica, 456'},
itens: [
{name: 'Pulseira Couro Trançado', quantity: 1, price: 48.90}
]
}
];
function renderAdminOrders() {
const list = document.getElementById('adminOrderList');
list.innerHTML = mockOrders.map(o => `
<div style='border-bottom:1px solid #eee;padding:1rem 0;display:flex;align-items:center;justify-content:space-between;'>
<div><b>Pedido #${o.id}</b> - ${o.cliente.nome}</div>
<button class='btn' onclick='showOrderDetails(${o.id})'>Ver Detalhes</button>
</div>
`).join('');
}
function showOrderDetails(id) {
const order = mockOrders.find(o => o.id === id);
const details = document.getElementById('adminOrderDetails');
details.style.display = 'block';
details.innerHTML = `
<h3>Dados do Cliente</h3>
<p><b>Nome:</b> ${order.cliente.nome}</p>
<p><b>Contato:</b> ${order.cliente.contato}</p>
<p><b>Endereço:</b> ${order.cliente.endereco}</p>
<h3>Itens do Pedido</h3>
<ul>
${order.itens.map(i => `<li>${i.name} - Qtd: ${i.quantity} - R$ ${(i.price*i.quantity).toFixed(2).replace('.', ',')}</li>`).join('')}
</ul>
<button class='btn' style='margin-top:1rem;' onclick='closeOrderDetails()'>Fechar</button>
`;
}
function closeOrderDetails() {
const details = document.getElementById('adminOrderDetails');
details.style.display = 'none';
details.innerHTML = '';
}