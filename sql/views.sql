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
    ORDER BY `PONTOS` DESC;
    
    
CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cfpickem`.`pontos_metcon` AS
    SELECT   
		u.idUsuario, u.nomeUsuario, m.idMetcon, m.nomeMetcon ,sum(r.pontos) as PONTOS
	FROM
		 ((((((palpites as p 
		join grupos as g ON p.grupos_idGrupo = g.idGrupo )
		join usuarios as u ON p.grupos_idUsuario = u.idUsuario) 
		join atletas as a ON p.resultados_idAtleta = a.idAtleta)
		join competicoes as c ON p.resultados_idCompeticao = c.idCompeticao)
		join metcon as m ON p.resultados_idMetcon = m.idMetcon)
		join resultados as r ON p.resultados_idCompeticao = r.metcon_idCompeticao AND p.resultados_idMetcon = r.metcon_idMetcon AND p.resultados_idAtleta = r.atletas_idAtleta) 
	GROUP BY u.nomeUsuario, r.metcon_idMetcon
;

CREATE OR REPLACE VIEW `palpites_completo` AS
select g.idGrupo, g.nomeGrupo, u.idUsuario, u.nomeUsuario, c.idCompeticao, c.competicaoFinalizada, c.nomeCompeticao, m.idMetcon, m.nomeMetcon, a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta
from (((((palpites as p 
join grupos as g ON p.grupos_idGrupo = g.idGrupo )
join usuarios as u ON p.grupos_idUsuario = u.idUsuario) 
join atletas as a ON p.resultados_idAtleta = a.idAtleta)
join competicoes as c ON p.resultados_idCompeticao = c.idCompeticao)
join metcon as m ON resultados_idMetcon = m.idMetcon)
WHERE c.competicaoFinalizada = 0;