CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cfpickem`.`classificacao_geral` AS
    SELECT 
        `u`.`nomeUsuario` AS `nomeUsuario`,
        SUM(`r`.`pontos`) AS `PONTOS`
    FROM
        (((((`cfpickem`.`palpites` `p`
        JOIN `cfpickem`.`grupos` `g` ON ((`p`.`grupos_idGrupo` = `g`.`idGrupo`)))
        JOIN `cfpickem`.`usuarios` `u` ON ((`p`.`grupos_idUsuario` = `u`.`idUsuario`)))
        JOIN `cfpickem`.`atletas` `a` ON ((`p`.`resultados_idAtleta` = `a`.`idAtleta`)))
        JOIN `cfpickem`.`competicoes` `c` ON ((`p`.`resultados_idCompeticao` = `c`.`idCompeticao`)))
        JOIN `cfpickem`.`resultados` `r` ON (((`p`.`resultados_idCompeticao` = `r`.`metcon_idCompeticao`)
            AND (`p`.`resultados_idMetcon` = `r`.`metcon_idMetcon`)
            AND (`p`.`resultados_idAtleta` = `r`.`atletas_idAtleta`))))
    GROUP BY `u`.`nomeUsuario`
    ORDER BY `PONTOS` DESC