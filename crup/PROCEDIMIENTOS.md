# GUARDAMOS LOS DATOS DEL USUARIO

```sql
DROP PROCEDURE IF EXISTS insert_data_formulario;
DELIMITER $$
CREATE PROCEDURE insert_data_formulario(IN cc_ VARCHAR(15), IN nom_ VARCHAR(30), IN ape_ VARCHAR(30), IN dir_ VARCHAR(50), IN eda_ int(11))
BEGIN
	DECLARE ifo_id_con vARCHAR(20);
    DECLARE ifo_nom_con_ vARCHAR(80);
    SET ifo_id_con := (SELECT cc FROM tb_usuario WHERE cc=cc_ LIMIT 0,1);
	IF ifo_id_con<>"" THEN
    	SET ifo_nom_con_ := (SELECT nom FROM tb_usuario WHERE nom=nom_ LIMIT 0,1);
    	SELECT concat('NOMBRE DEL USUARIO: ',ifo_nom_con_,' CEDULA DEL USUARIO: ',ifo_id_con) as Response,'EL USUARIO ESTA REGISTRADO' as Error;
    ELSE
    	INSERT INTO tb_usuario(cc, nom, ape, dir, eda) VALUES (cc_, nom_, ape_, dir_, eda_);
        SELECT concat('EL USUARIO FUE REGISTRADO') as Response,'' as Error;
    END IF;
END$$
```
# Eliminamos los datos del usuario

```sql
DROP PROCEDURE IF EXISTS delete_data_formulario;
DELIMITER $$
CREATE PROCEDURE delete_data_formulario(IN cc_ VARCHAR(15))
BEGIN
	DECLARE ifo_id_con vARCHAR(20);
    DECLARE ifo_nom_con_ vARCHAR(80);
    SET ifo_id_con := (SELECT cc FROM tb_usuario WHERE cc=cc_ LIMIT 0,1);
	IF ifo_id_con<>"" THEN
    	SET ifo_nom_con_ := (SELECT nom FROM tb_usuario WHERE cc=cc_ LIMIT 0,1);
    	DELETE FROM tb_usuario WHERE cc=cc_;
    	SELECT concat('NOMBRE DEL USUARIO: ',ifo_nom_con_,' CEDULA DEL USUARIO: ',ifo_id_con) as Response,'EL USUARIO FUE ELIMINADO' as Error;
    ELSE
    	
        SELECT concat('EL USUARIO NO EXISTE') as Response,'' as Error;
    END IF;
END$$
```

# Buscamos los datos del usuario

```sql
DROP PROCEDURE IF EXISTS select_data_formulario;
DELIMITER $$
CREATE PROCEDURE select_data_formulario(IN cc_ VARCHAR(15))
BEGIN
	DECLARE ifo_id_con vARCHAR(20);
    DECLARE ifo_nom_con_ vARCHAR(80);
    SET ifo_id_con := (SELECT cc FROM tb_usuario WHERE cc=cc_ LIMIT 0,1);
	IF ifo_id_con<>"" THEN
    	SELECT * FROM tb_usuario WHERE cc=cc_ LIMIT 0,1;
    ELSE
    	SELECT concat('EL USUARIO NO EXISTE') as Response,'' as Error;
    END IF;
END$$
```

