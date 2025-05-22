 // // Product data
        // const products = [{
        //         id: 1,
        //         name: "Pulseira Macramê Oceano",
        //         price: 45.90,
        //         category: "macrame",
        //         image: "/api/placeholder/280/250",
        //         description: "Pulseira artesanal em macramê com fios azuis inspirados no oceano"
        //     },
        //     {
        //         id: 2,
        //         name: "Pulseira de Miçangas Tropicais",
        //         price: 32.50,
        //         category: "beads",
        //         image: "/api/placeholder/280/250",
        //         description: "Colorida pulseira com miçangas em tons tropicais vibrantes"
        //     },
        //     {
        //         id: 3,
        //         name: "Pulseira de Couro Rústico",
        //         price: 58.00,
        //         category: "leather",
        //         image: "/api/placeholder/280/250",
        //         description: "Pulseira em couro legítimo com acabamento rústico e elegante"
        //     },
        //     {
        //         id: 4,
        //         name: "Pulseira Natural Coquinho",
        //         price: 28.90,
        //         category: "natural",
        //         image: "/api/placeholder/280/250",
        //         description: "Feita com sementes de coquinho e fios naturais"
        //     },
        //     {
        //         id: 5,
        //         name: "Pulseira Macramê Sunset",
        //         price: 42.00,
        //         category: "macrame",
        //         image: "/api/placeholder/280/250",
        //         description: "Inspirada no pôr do sol com tons alaranjados e dourados"
        //     },
        //     {
        //         id: 6,
        //         name: "Pulseira Miçangas Cristal",
        //         price: 65.50,
        //         category: "beads",
        //         image: "/api/placeholder/280/250",
        //         description: "Elegante pulseira com miçangas de cristal transparente"
        //     },
        //     {
        //         id: 7,
        //         name: "Pulseira Couro Trançado",
        //         price: 48.90,
        //         category: "leather",
        //         image: "/api/placeholder/280/250",
        //         description: "Couro trançado à mão com fechos em metal envelhecido"
        //     },
        //     {
        //         id: 8,
        //         name: "Pulseira Sementes Açaí",
        //         price: 35.00,
        //         category: "natural",
        //         image: "/api/placeholder/280/250",
        //         description: "Confeccionada com sementes de açaí e fibras naturais"
        //     }
        // ];

        // // Cart management
        // let cart = [];

        // // Load products
        // function loadProducts(filter = 'all') {
        //     const productGrid = document.getElementById('productGrid');
        //     const filteredProducts = filter === 'all' ? products : products.filter(p => p.category === filter);

        //     productGrid.innerHTML = filteredProducts.map(product => `
        //         <div class="product-card">
        //             <img src="${product.image}" alt="${product.name}" class="product-image">
        //             <div class="product-info">
        //                 <h3 class="product-name">${product.name}</h3>
        //                 <p class="product-price">R$ ${product.price.toFixed(2).replace('.', ',')}</p>
        //                 <p class="product-description">${product.description}</p>
        //                 <button class="add-to-cart" onclick="addToCart(${product.id})">
        //                     Adicionar ao Carrinho
        //                 </button>
        //             </div>
        //         </div>
        //     `).join('');
        // }

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
                cart.push({
                    ...product,
                    quantity: 1
                });
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
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-info">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-price">R$ ${item.price.toFixed(2).replace('.', ',')}</div>
                        <div class="quantity-controls">
                            <button class="quantity-btn" onclick="changeQuantity(${item.id}, -1)">-</button>
                            <span>Qtd: ${item.quantity}</span>
                            <button class="quantity-btn" onclick="changeQuantity(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <button class="remove-item" onclick="removeFromCart(${item.id})">Remover</button>
                </div>
            `).join('');

            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
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

            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const message = `Olá! Gostaria de finalizar minha compra:\n\n${cart.map(item => 
                `${item.name} - Qtd: ${item.quantity} - R$ ${(item.price * item.quantity).toFixed(2).replace('.', ',')}`
            ).join('\n')}\n\nTotal: R$ ${total.toFixed(2).replace('.', ',')}`;

            const whatsappUrl = `https://wa.me/5511999999999?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');

            showNotification('Redirecionando para WhatsApp...');
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
            anchor.addEventListener('click', function(e) {
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