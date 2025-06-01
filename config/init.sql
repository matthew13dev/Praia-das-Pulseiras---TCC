-- Modelo de Dados para Loja Virtual (TCC)
-- Seguindo a filosofia YAGNI (You Aren't Gonna Need It)
-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS praia_das_pulseiras;

USE praia_das_pulseiras;

-- Tabela de Administradores
CREATE TABLE
    IF NOT EXISTS admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL,
        ativo BOOLEAN DEFAULT TRUE,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Tabela de Clientes
CREATE TABLE
    IF NOT EXISTS cliente (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL,
        telefone VARCHAR(20),
        endereco VARCHAR(255),
        cidade VARCHAR(100),
        estado VARCHAR(2),
        cep VARCHAR(10),
        ativo BOOLEAN DEFAULT TRUE,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Tabela de Produtos
CREATE TABLE
    IF NOT EXISTS produto (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT,
        preco DECIMAL(10, 2) NOT NULL,
        quantidade_estoque INT NOT NULL DEFAULT 0,
        imagem VARCHAR(255),
        ativo BOOLEAN DEFAULT TRUE,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Tabela de Pedidos
CREATE TABLE
    IF NOT EXISTS pedido (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cliente_id INT NOT NULL,
        data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status ENUM (
            'pendente',
            'aprovado',
            'enviado',
            'entregue',
            'cancelado'
        ) DEFAULT 'pendente',
        valor_total DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (cliente_id) REFERENCES cliente (id)
    );

-- Tabela de Itens do Pedido (relacionamento entre Pedido e Produto)
CREATE TABLE
    IF NOT EXISTS item_pedido (
        id INT AUTO_INCREMENT PRIMARY KEY,
        pedido_id INT NOT NULL,
        produto_id INT NOT NULL,
        quantidade INT NOT NULL,
        preco_unitario DECIMAL(10, 2) NOT NULL,
        subtotal DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (pedido_id) REFERENCES pedido (id),
        FOREIGN KEY (produto_id) REFERENCES produto (id)
    );

-- Inserir um administrador padrão para acesso inicial
INSERT INTO
    admin (nome, email, senha)
VALUES
    (
        'Administrador',
        'admin@exemplo.com',
        '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W'
    );

-- Senha: admin123
-- Inserir alguns produtos de exemplo
INSERT INTO
    produto (nome, descricao, preco, quantidade_estoque)
VALUES
    ('Produto 1', 'Descrição do produto 1', 19.99, 50),
    ('Produto 2', 'Descrição do produto 2', 29.99, 30),
    ('Produto 3', 'Descrição do produto 3', 39.99, 20);

-- Comentários sobre o modelo de dados:
-- 1. Senhas devem ser armazenadas com hash (exemplo usa bcrypt)
-- 2. Relacionamentos:
--    - Um cliente pode ter vários pedidos (1:N)
--    - Um pedido pode ter vários produtos (N:M através de item_pedido)
-- 3. Campos mínimos necessários para funcionalidade básica
-- 4. Enums para status do pedido simplificam a lógica de negócio