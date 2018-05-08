CREATE PROCEDURE `new_procedure` ()
BEGIN
SET @sql = NULL;
SELECT
	GROUP_CONCAT(distinct
    CONCAT(
      'ifnull(SUM(case when nomeMetcon = ''',
      nomeMetcon,
      ''' then PONTOS end),0) AS `',
      nomeMetcon, '`'
    )
    ) INTO @sql
    FROM pontos_metcon;
    SET @sql = CONCAT('SELECT idUsuario, nomeUsuario, sobrenomeUsuario, ', @sql, ' FROM pontos_metcon GROUP BY idUsuario');
    PREPARE stmt FROM @sql;
EXECUTE stmt;
END
