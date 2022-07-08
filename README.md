# 2-Prova-Web---PHP
CRUD feito para 2º prova de WEB

   ## Usuário
Colecionador / usuário
- nome
- email
- senha
- telefone
- rede social
  
  ## (2) Remédios -- Bruno
- nome de marca
- fórmula
- validade (mês / ano)
- lote



# Tabela usuario: 
  CREATE TABLE usuario (
  idusuario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NULL,
  email VARCHAR(45) NULL,
  senha VARCHAR(45) NULL,
  telefone VARCHAR(45) NULL,
  redesocial VARCHAR(45) NULL,
  PRIMARY KEY (idusuario));
  
 # Tabela remdios:
   CREATE TABLE remedios (
  idremedios INT NOT NULL AUTO_INCREMENT,
  nomemarca VARCHAR(45) NULL,
  formula VARCHAR(45) NULL,
  validade VARCHAR(45) NULL,
  lote VARCHAR(45) NULL,
  usuario_idusuario INT NOT NULL,
  PRIMARY KEY (idremedios, usuario_idusuario),
  INDEX fk_remedios_usuario_idx (usuario_idusuario ASC) VISIBLE,
  CONSTRAINT fk_remedios_usuario
    FOREIGN KEY (usuario_idusuario)
    REFERENCES usuario (idusuario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
