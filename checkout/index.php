<div class="notification" id="notification"></div>

    <!-- Admin Login Modal -->
// ... existing code ...

    <script>
        // Product data
// ... existing code ...

        // Checkout
        function checkout() {
            if (cart.length === 0) {
                showNotification('Adicione produtos ao carrinho primeiro!');
                return;
            }
            
            // Cria um formulário dinamicamente
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'checkout.php';

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
// ... existing code ...
    </script> 