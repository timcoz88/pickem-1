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
    
    
CREATE OR replace 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cfpickem`.`pontos_metcon` AS
    SELECT   
		u.idUsuario, u.nomeUsuario, u.sobrenomeUsuario, m.idMetcon, m.nomeMetcon ,sum(r.pontos) as PONTOS
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

CREATE OR replace
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cfpickem`.`pontos_metcon_history` AS
select pontos_metcon.*,
	case when idmetcon = 1 then PONTOS end as A,
    case when idmetcon = 2 then PONTOS end as B,
    case when idmetcon = 3 then PONTOS end as C,
    case when idmetcon = 4 then PONTOS end as D,
    case when idmetcon = 5 then PONTOS end as E,
    case when idmetcon = 6 then PONTOS end as F
    FROM pontos_metcon;
    
    
  CREATE OR replace 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cfpickem`.`pontos_metcon_usuario` AS  
    select idUsuario, nomeUsuario, sobrenomeUsuario,
    sum(A) as A,
    sum(B) as B,
    sum(C) as C,
    sum(D) as D,
    sum(E) as E,
    sum(F) as F
    FROM pontos_metcon_history
    group by idUsuario;
    
      CREATE OR replace 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cfpickem`.`pontos_metcon_usuario` AS  
    select idUsuario,
    sum(A) as A,
    sum(B) as B,
    sum(C) as C,
    sum(D) as D,
    sum(E) as E,
    sum(F) as F
    FROM pontos_metcon_history
    group by idUsuario;

CREATE OR REPLACE VIEW `palpites_completo` AS
select g.idGrupo, g.nomeGrupo, u.idUsuario, u.nomeUsuario, c.idCompeticao, c.competicaoFinalizada, c.nomeCompeticao, m.idMetcon, m.nomeMetcon, a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta
from (((((palpites as p 
join grupos as g ON p.grupos_idGrupo = g.idGrupo )
join usuarios as u ON p.grupos_idUsuario = u.idUsuario) 
join atletas as a ON p.resultados_idAtleta = a.idAtleta)
join competicoes as c ON p.resultados_idCompeticao = c.idCompeticao)
join metcon as m ON resultados_idMetcon = m.idMetcon)
WHERE c.competicaoFinalizada = 0;