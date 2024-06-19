CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL
);
CREATE TABLE Jogo (
  
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Descricao VARCHAR(255) NOT NULL,
    Genero VARCHAR(255) NOT NULL,
    Preco DECIMAL(10, 2) NOT NULL,
    arquivo_jogo VARCHAR(255) NOT NULL,
    Imagem_jogo VARCHAR(255) NOT NULL,
    logo_jogo VARCHAR(255) NOT NULL,
    status_jogo ENUM('em_breve', 'lancado_agora') NOT NULL,
    nome_do_dev VARCHAR(255) NOT NULL
);


