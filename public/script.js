

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