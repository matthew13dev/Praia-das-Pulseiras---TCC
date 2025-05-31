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
                // showAdminSection('produtos');
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
                    <div id='adminProductList'></div>
                    <div id='adminProductForm' style='display:none; margin-top:2rem;'></div>
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
            list.innerHTML = produtos.map(produtosItem => `
                <div style='display:flex;align-items:center;gap:1rem;border-bottom:1px solid #eee;padding:1rem 0;'>
                    <img src='${produtosItem.imagem}' style='width:60px;height:60px;object-fit:cover;border-radius:8px;'>
                    <div style='flex:1;'>
                        <div style='font-weight:bold;'>${produtosItem.nome}</div>
                        <div style='color:#667eea;'>R$ ${produtosItem.preco}</div>
                        <div style='color:#666;font-size:0.9rem;'>${produtosItem.descricao}</div>
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
            // Adiciona produto ao array (mock)
            products.push({
                id: products.length ? products[products.length-1].id+1 : 1,
                name: document.getElementById('newProdName').value,
                price: parseFloat(document.getElementById('newProdPrice').value),
                category: document.getElementById('newProdCat').value,
                image: document.getElementById('newProdImg').value,
                description: document.getElementById('newProdDesc').value
            });
            renderAdminProducts();
            cancelAdminProductForm();
            showNotification('Produto adicionado!');
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
            prod.name = document.getElementById('editProdName').value;
            prod.price = parseFloat(document.getElementById('editProdPrice').value);
            prod.category = document.getElementById('editProdCat').value;
            prod.image = document.getElementById('editProdImg').value;
            prod.description = document.getElementById('editProdDesc').value;
            renderAdminProducts();
            cancelAdminProductForm();
            showNotification('Produto atualizado!');
            return false;
        }
        function adminDeleteProduct(id) {
            if(confirm('Tem certeza que deseja excluir este produto?')) {
                const idx = products.findIndex(p => p.id === id);
                if(idx > -1) products.splice(idx,1);
                renderAdminProducts();
                showNotification('Produto excluído!');
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