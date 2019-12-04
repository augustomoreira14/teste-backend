# Questão 1
O SQL foi feito para MySQL, além disso se pressupõe a existência do banco de dados **database**.
### _cursos_
```
CREATE TABLE IF NOT EXISTS `database`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `descricao` LONGTEXT NULL,
  `imagem_capa` VARCHAR(255) NULL,
  `cor_base` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
```

# Questão 2

### _unidades_
```
CREATE TABLE IF NOT EXISTS `database`.`unidades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(255) NULL,
  `nome` VARCHAR(255) NULL,
  `cursos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `cursos_id`),
  INDEX `fk_unidades_cursos` (`cursos_id` ASC),
  CONSTRAINT `fk_unidades_cursos`
    FOREIGN KEY (`cursos_id`)
    REFERENCES `database`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
```
### _lições_
```
CREATE TABLE IF NOT EXISTS `database`.`licoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NULL,
  `conteudo` LONGTEXT NULL,
  `unidades_id` INT NOT NULL,
  PRIMARY KEY (`id`, `unidades_id`),
  INDEX `fk_licoes_unidades` (`unidades_id` ASC),
  CONSTRAINT `fk_licoes_unidades`
    FOREIGN KEY (`unidades_id`)
    REFERENCES `database`.`unidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB

```
# Questão 3

```
{
  "id": 1,
  "nome": "Microsoft Word - Básico",
  "descricao": "Microsoft Word",
  "imagem_capa": "link_imagem",
  "qtd_unidades": 5,
  "qtd_licoes": 19,
  "progresso": 0.0,
  "unidades": [
    {
      "id": 1,
      "numero": "1",
      "nome": "Conceitos básicos",
      "licoes": [
        {
          "id": 1,
          "titulo": "Definição e acesso",
          "conteudo": "..."
        },
        {
          "id": 2,
          "titulo": "Criar novo documento",
          "conteudo": "..."
        },
        .
        .
        .
      ]
    },
    .
    .
    .
  ]
}
```
OBS: Os **3 pontos na vertical** não fazem parte da sintaxe do JSON, apenas simboliza a existência de mais elementos em **unidades** e **licoes**.
