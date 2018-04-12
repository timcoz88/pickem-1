CREATE SCHEMA IF NOT EXISTS `madem561_CFPickEm` DEFAULT CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS `madem561_CFPickEM`.`usuarios` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` VARCHAR(255) NOT NULL,
  `sobrenomeUsuario` VARCHAR(255) NOT NULL,
  `emailUsuario` VARCHAR(255) NOT NULL,
  `senhaUsuario` VARCHAR(33) NOT NULL,
  `dataCadastro` DATETIME,
  `usuarioAtivo` TINYINT(1) NOT NULL DEFAULT 1,
  `emailValidado` TINYINT(1) NOT NULL DEFAULT 0,
  `tipoUsuario` INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `emailUsuario_UNIQUE` (`emailUsuario` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `madem561_CFPickEM`.`grupos` (
  `idGrupo` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeGrupo` VARCHAR(255) NOT NULL,
  `descricaoGrupo` TEXT NOT NULL,
  PRIMARY KEY (`idGrupo`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `madem561_CFPickEM`.`grupos_has_usuarios` (
  `grupos_idGrupo` INT(11) NOT NULL,
  `usuarios_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`grupos_idGrupo`, `usuarios_idUsuario`),
  INDEX `idx_grupos_has_usuarios_idUsuario` (`usuarios_idUsuario` ASC),
  INDEX `idx_grupos_has_usuarios_idGrupo` (`grupos_idGrupo` ASC),
  CONSTRAINT `fk_grupos_has_usuarios_grupos1`
    FOREIGN KEY (`grupos_idGrupo`)
    REFERENCES `madem561_CFPickEm`.`grupos` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_idUsuario`)
    REFERENCES `madem561_CFPickEM`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`regioes` (
  `idRegiao` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeRegiao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idRegiao`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`atletas` (
  `idAtleta` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeAtleta` VARCHAR(255) NOT NULL,
  `sobrenomeAtleta` VARCHAR(255) NOT NULL,
  `profileAtleta` VARCHAR(255),
  `divisaoAtleta` TINYINT(1) NOT NULL,
  `regioes_idRegiao` INT(11) NOT NULL,
  PRIMARY KEY (`idAtleta`),
  INDEX `idx_atletas_regioes` (`regioes_idRegiao` ASC),
  CONSTRAINT `fk_atletas_regioes1`
    FOREIGN KEY (`regioes_idRegiao`)
    REFERENCES `madem561_CFPickEm`.`regioes` (`idRegiao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`competicoes` (
  `idCompeticao` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeCompeticao` VARCHAR(255) NOT NULL,
  `anoCompeticao` SMALLINT(4) NOT NULL,
  `descricaoCompeticao` TEXT NOT NULL,
  `competicaoFinalizada` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idCompeticao`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`metcon` (
  `idMetcon` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeMetcon` VARCHAR(255) NOT NULL,
  `descricaoMetcon` TEXT NOT NULL,
  `tipoMetcon` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMetcon`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`competicoes_has_metcon` (
  `competicoes_idCompeticao` INT(11) NOT NULL,
  `metcon_idMetcon` INT NOT NULL,
  `dataHora_metcon_competicao` DATETIME NOT NULL,
  PRIMARY KEY (`competicoes_idCompeticao`, `metcon_idMetcon`),
  INDEX `fk_competicoes_has_metcon_metcon1_idx` (`metcon_idMetcon` ASC),
  INDEX `fk_competicoes_has_metcon_competicoes1_idx` (`competicoes_idCompeticao` ASC),
  CONSTRAINT `fk_competicoes_has_metcon_competicoes1`
    FOREIGN KEY (`competicoes_idCompeticao`)
    REFERENCES `madem561_CFPickEm`.`competicoes` (`idCompeticao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_competicoes_has_metcon_metcon1`
    FOREIGN KEY (`metcon_idMetcon`)
    REFERENCES `madem561_CFPickEm`.`metcon` (`idMetcon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`competicoes_has_atletas` (
  `competicoes_idCompeticao` INT(11) NOT NULL,
  `atletas_idAtleta` INT(11) NOT NULL,
  PRIMARY KEY (`competicoes_idCompeticao`, `atletas_idAtleta`),
  INDEX `fk_competicoes_has_atletas_atletas1_idx` (`atletas_idAtleta` ASC),
  INDEX `fk_competicoes_has_atletas_competicoes1_idx` (`competicoes_idCompeticao` ASC),
  CONSTRAINT `fk_competicoes_has_atletas_competicoes1`
    FOREIGN KEY (`competicoes_idCompeticao`)
    REFERENCES `madem561_CFPickEm`.`competicoes` (`idCompeticao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_competicoes_has_atletas_atletas1`
    FOREIGN KEY (`atletas_idAtleta`)
    REFERENCES `madem561_CFPickEm`.`atletas` (`idAtleta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;






CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`resultados` (
  `metcon_idCompeticao` INT(11) NOT NULL,
  `metcon_idMetcon` INT(11) NOT NULL,
  `atletas_idCompeticao` INT(11) NOT NULL,
  `atletas_idAtleta` INT(11) NOT NULL,
  `classificacao` TINYINT(3) NULL,
  `pontos` TINYINT(3) NULL,
  PRIMARY KEY (`metcon_idCompeticao`, `metcon_idMetcon`, `atletas_idCompeticao`, `atletas_idAtleta`),
  INDEX `fk_competicoes_has_metcon_has_competicoes_has_atletas_compe_idx` (`atletas_idCompeticao` ASC, `atletas_idAtleta` ASC),
  INDEX `fk_competicoes_has_metcon_has_competicoes_has_atletas_compe_idx1` (`metcon_idCompeticao` ASC, `metcon_idMetcon` ASC),
  CONSTRAINT `fk_competicoes_has_metcon_has_competicoes_has_atletas_competi1`
    FOREIGN KEY (`metcon_idCompeticao` , `metcon_idMetcon`)
    REFERENCES `madem561_CFPickEm`.`competicoes_has_metcon` (`competicoes_idCompeticao` , `metcon_idMetcon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_competicoes_has_metcon_has_competicoes_has_atletas_competi2`
    FOREIGN KEY (`atletas_idCompeticao` , `atletas_idAtleta`)
    REFERENCES `madem561_CFPickEm`.`competicoes_has_atletas` (`competicoes_idCompeticao` , `atletas_idAtleta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `madem561_CFPickEm`.`palpites` (
  `grupos_idGrupo` INT(11) NOT NULL,
  `grupos_idUsuario` INT(11) NOT NULL,
  `resultados_idCompeticao` INT(11) NOT NULL,
  `resultados_idMetcon` INT(11) NOT NULL,
  `resultados_cdCompeticao` INT(11) NOT NULL,
  `resultados_idAtleta` INT(11) NOT NULL,
  PRIMARY KEY (`grupos_idGrupo`, `grupos_idUsuario`, `resultados_idCompeticao`, `resultados_idMetcon`, `resultados_cdCompeticao`, `resultados_idAtleta`),
  INDEX `fk_grupos_has_usuarios_has_competicoes_has_metcon_has_compe_idx` (`resultados_idCompeticao` ASC, `resultados_idMetcon` ASC, `resultados_cdCompeticao` ASC, `resultados_idAtleta` ASC),
  INDEX `fk_grupos_has_usuarios_has_competicoes_has_metcon_has_compe_idx1` (`grupos_idGrupo` ASC, `grupos_idUsuario` ASC),
  CONSTRAINT `fk_grupos_has_usuarios_has_competicoes_has_metcon_has_competi1`
    FOREIGN KEY (`grupos_idGrupo` , `grupos_idUsuario`)
    REFERENCES `madem561_CFPickEm`.`grupos_has_usuarios` (`grupos_idGrupo` , `usuarios_idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


