CREATE DATABASE bomberosBD;

USE bomberosBD;
SET lc_time_names = 'es_CL';

CREATE TABLE tbl_permiso (
id_permiso INT AUTO_INCREMENT,
nombre_permiso VARCHAR (5000),
PRIMARY KEY (id_permiso)
);

CREATE TABLE tbl_tipo_usuario(
id_tipo_usuario INT AUTO_INCREMENT,
nombre_tipo_usuario VARCHAR (2000),
PRIMARY KEY (id_tipo_usuario)
);


CREATE TABLE tbl_tipo_usuario_permisos (
id_tipo_usuario_permisos INT AUTO_INCREMENT,
fk_tipo_usuario_tipo_usuario_permisos INT,
fk_permiso_tipo_usuario_permisos INT,
otorgado_tipo_usuario_permisos BOOLEAN,
FOREIGN KEY (fk_tipo_usuario_tipo_usuario_permisos) REFERENCES tbl_tipo_usuario (id_tipo_usuario),
FOREIGN KEY (fk_permiso_tipo_usuario_permisos) REFERENCES tbl_permiso (id_permiso),
PRIMARY KEY (id_tipo_usuario_permisos)
);

CREATE TABLE tbl_usuario(
id_usuario_usuario INT AUTO_INCREMENT,
nombre_usuario_usuario VARCHAR(20000),
fk_tipo_usuario__usuario INT,
contrasenia_usuario_usuario VARCHAR (2000),
FOREIGN KEY (fk_tipo_usuario__usuario) REFERENCES tbl_tipo_usuario (id_tipo_usuario),
PRIMARY KEY (id_usuario_usuario)
);


CREATE TABLE tbl_estado_civil(
id_estado_civil INT AUTO_INCREMENT,
nombre_estado_civil VARCHAR (300),
PRIMARY KEY (id_estado_civil)
);

CREATE TABLE tbl_genero(
id_genero INT AUTO_INCREMENT,
nombre_genero VARCHAR (21844),
PRIMARY KEY (id_genero)
);


CREATE TABLE tbl_medida (
id_medida INT AUTO_INCREMENT,
talla_de_chaqueta_camisa_medida VARCHAR (5000),
talla_de_pantalon_medida VARCHAR (5000),
talla_de_buzo_medida VARCHAR (5000),
talla_de_calzado_medida VARCHAR (5000),
PRIMARY KEY(id_medida)
);



/*
SELECT tbl_medida.id_medida, tbl_medida.talla_de_chaqueta_camisa_medida, tbl_medida.talla_de_pantalon_medida,  tbl_medida.talla_de_buzo_medida,
tbl_medida.talla_de_calzado_medida FROM tbl_medida, tbl_informacionPersonal WHERE 
tbl_informacionPersonal.fk_medida_informacionPersonal=tbl_medida.id_medida AND tbl_informacionPersonal.id_informacionPersonal=1;
*/

CREATE TABLE tbl_informacionPersonal(
id_informacionPersonal INT AUTO_INCREMENT,
rut_informacionPersonal VARCHAR (12) UNIQUE,
nombre_informacionPersonal VARCHAR (5000),
apellido_paterno_informacionPersonal VARCHAR (5000),
apellido_materno_informacionPersonal VARCHAR (5000),
fecha_de_nacimiento_informacionPersonal DATE,
fk_estado_civil_informacionPersonal INT,
fk_medida_informacionPersonal INT,
altura_en_metros_informacionPersonal VARCHAR (5000),
peso_en_kg_informacionPersonal VARCHAR (5000),
e_mail_informacionPersonal VARCHAR (5000),
fk_genero_informacionPersonal INT,
telefono_fijo_informacionPersonal VARCHAR (5000),
telefono_movil_informacionPersonal VARCHAR (5000),
direccion_personal_informacionPersonal VARCHAR (5000),
pertenecio_a_brigada_juvenil_informacionPersonal VARCHAR (5000),
esInstructor_informacionPersonal VARCHAR (5000),
FOREIGN KEY (fk_estado_civil_informacionPersonal) REFERENCES tbl_estado_civil (id_estado_civil),
FOREIGN KEY (fk_medida_informacionPersonal) REFERENCES tbl_medida (id_medida),
FOREIGN KEY (fk_genero_informacionPersonal) REFERENCES tbl_genero (id_genero),
PRIMARY KEY (id_informacionPersonal)
);

CREATE TABLE tbl_entidadACargo (
id_entidadACargo INT AUTO_INCREMENT,
nombre_entidadACargo VARCHAR (5000),
PRIMARY KEY(id_entidadACargo)
);



CREATE TABLE tbl_region (
  id_region INT AUTO_INCREMENT,
  nombre_region VARCHAR(64) ,
  ordinal_region VARCHAR(4),
  PRIMARY KEY (id_region)
);


CREATE TABLE tbl_provincia (
  id_provincia INT AUTO_INCREMENT,
  nombre_provincia VARCHAR(64),
  fk_region_provincia INT,
  FOREIGN KEY (fk_region_provincia) REFERENCES tbl_region (id_region),
  PRIMARY KEY (id_provincia)
); 


CREATE TABLE tbl_comuna (
  id_comuna INT AUTO_INCREMENT,
  nombre_comuna VARCHAR(64),
  fk_provincia_comuna INT,
  FOREIGN KEY (fk_provincia_comuna) REFERENCES tbl_provincia (id_provincia),
  PRIMARY KEY (id_comuna)
);


CREATE TABLE tbl_estadoBombero (
id_estado INT AUTO_INCREMENT,
nombre_estado VARCHAR (20000),
PRIMARY KEY (id_estado)
);



CREATE TABLE tbl_cargo (
id_cargo INT AUTO_INCREMENT,
nombre_cargo VARCHAR (5000),
PRIMARY KEY (id_cargo)
);

-- fk_id_entidadACargo_informacionBomberil INT,
-- FOREIGN KEY (fk_id_entidadACargo_informacionBomberil) REFERENCEs tbl_entidadACargo (id_entidadACargo),
CREATE TABLE tbl_informacionBomberil (
id_informacionBomberil INT AUTO_INCREMENT,
fk_region_informacionBomberil INT,
cuerpo_informacionBomberil VARCHAR (20000),
fk_id_entidadACargo_informacionBomberil INT,
fk_cargo_informacionBomberil INT,
fecha_de_ingreso_informacionBomberil DATE,
N_Reg_General_informacionBomberil INT,
fk_estado_informacionBomberil INT,
N_Reg_Cia_informacionBomberil INT,
fk_informacion_personal__informacionBomberil INT,
FOREIGN KEY (fk_id_entidadACargo_informacionBomberil) REFERENCEs tbl_entidadACargo (id_entidadACargo),
FOREIGN KEY (fk_informacion_personal__informacionBomberil) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
FOREIGN KEY (fk_region_informacionBomberil) REFERENCES tbl_region (id_region),
FOREIGN KEY (fk_cargo_informacionBomberil) REFERENCEs tbl_cargo (id_cargo),
FOREIGN KEY (fk_estado_informacionBomberil) REFERENCEs tbl_estadoBombero (id_estado),
PRIMARY KEY (id_informacionBomberil)
);


CREATE TABLE tbl_informacionLaboral (
id_informacionLaboral INT AUTO_INCREMENT,
nombre_de_empresa_informacionLaboral VARCHAR (5000),
direccion_de_empresa_informacionLaboral VARCHAR (5000),
telefono_de_empresa_informacionLaboral VARCHAR (5000),
cargo_en_la_empresa_informacionLaboral VARCHAR (5000),
fecha_de_ingreso_a_la_empresa_informacionLaboral DATE,
area_o_departamento_en_la_empresa_informacionLaboral VARCHAR (5000),
afp_informacionLaboral VARCHAR (5000),
profesion_informacionLaboral VARCHAR (5000),
fk_informacion_personal_informacionLaboral INT,
FOREIGN KEY (fk_informacion_personal_informacionLaboral) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
PRIMARY KEY (id_informacionLaboral)
);


CREATE TABLE tbl_grupo_sanguineo (
id_grupo_sanguineo INT AUTO_INCREMENT,
nombre_grupo_sanguineo VARCHAR (30), 
PRIMARY KEY (id_grupo_sanguineo)
);

CREATE TABLE tbl_parentesco (
id_parentesco INT AUTO_INCREMENT,
nombre_parentesco VARCHAR (5000),
PRIMARY KEY(id_parentesco)
);




CREATE TABLE tbl_informacionMedica1 (
id_informacionMedica1 INT AUTO_INCREMENT,
prestacionMedica_informacionMedica1 VARCHAR (5000),
alergias_informacionMedica1 VARCHAR (5000),
enfermedades_croncias_informacionMedica1 VARCHAR (5000),
fk_informacion_personal_informacionMedica1 INT,
FOREIGN KEY (fk_informacion_personal_informacionMedica1) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
PRIMARY KEY (id_informacionMedica1)
);


CREATE TABLE tbl_informacionMedica2 (
id_informacionMedica2 INT AUTO_INCREMENT,
medicamentos_habituales_informacionMedica2 VARCHAR (5000),
nombre_de_contacto_informacionMedica2 VARCHAR (5000),
telefono_de_contacto_informacionMedica2 VARCHAR (5000),
fk_parentesco_del_contacto_informacionMedica2 INT,
nivel_de_actividad_fisica_informacionMedica2 VARCHAR (5000),
es_donante_informacionMedica2 BOOLEAN,
es_fumador_informacionMedica2 BOOLEAN,
fk_grupo_sanguineo_informacionMedica2 INT,
fk_informacion_personal_informacionMedica2 INT,
FOREIGN KEY (fk_informacion_personal_informacionMedica2) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
FOREIGN KEY (fk_parentesco_del_contacto_informacionMedica2) REFERENCES tbl_parentesco (id_parentesco),
FOREIGN KEY (fk_grupo_sanguineo_informacionMedica2) REFERENCES tbl_grupo_sanguineo (id_grupo_sanguineo),
PRIMARY KEY (id_informacionMedica2)
);



CREATE TABLE tbl_informacionFamiliar (
id_informacionFamiliar INT AUTO_INCREMENT,
nombres_informacionFamiliar VARCHAR (5000),
fecha_de_nacimiento_informacionFamiliar DATE,
fk_parentesco_informacionFamiliar INT,
fk_informacionPersonal_informacionFamiliar INT,
FOREIGN KEY (fk_informacionPersonal_informacionFamiliar) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
FOREIGN KEY (fk_parentesco_informacionFamiliar) REFERENCES tbl_parentesco (id_parentesco),
PRIMARY KEY(id_informacionFamiliar)
);


CREATE TABLE tbl_estado_curso(
id_estado_curso INT AUTO_INCREMENT,
nombre_estado_curso VARCHAR (5000),
PRIMARY KEY(id_estado_curso)
);


CREATE TABLE tbl_informacionAcademica(
id_informacionAcademica INT AUTO_INCREMENT,
fecha_informacionAcademica DATE,
actividad_informacionAcademica VARCHAR (300),
fk_estado_curso_informacionAcademica INT,
fk_informacionPersonal_informacionAcademica INT,
FOREIGN KEY (fk_informacionPersonal_informacionAcademica) REFERENCES tbl_informacionPersonal (id_informacionPersonal), 
FOREIGN KEY (fk_estado_curso_informacionAcademica) REFERENCES tbl_estado_curso (id_estado_curso), 
PRIMARY KEY (id_informacionAcademica)
);


CREATE TABLE tbl_entrenamientoEstandar(
id_entrenamientoEstandar INT AUTO_INCREMENT,
fecha_entrenamientoEstandar DATE,
actividad_entrenamientoEstandar VARCHAR (300),
fk_estado_curso_entrenamientoEstandar INT,
fk_informacionPersonal_entrenamientoEstandar INT,
FOREIGN KEY (fk_informacionPersonal_entrenamientoEstandar) REFERENCES tbl_informacionPersonal (id_informacionPersonal), 
FOREIGN KEY (fk_estado_curso_entrenamientoEstandar) REFERENCES tbl_estado_curso (id_estado_curso), 
PRIMARY KEY (id_entrenamientoEstandar)
);



CREATE TABLE tbl_informacionHistorica(
id_informacionHistorica INT AUTO_INCREMENT,
fk_region_informacionHistorica INT,
cuerpo_informacionHistorica VARCHAR (5000),
compania_informacionHistorica VARCHAR (5000),
fechaDeCambio_informacionHistorica DATE,
premio_informacionHistorica VARCHAR (20000),
motivo_informacionHistorica TEXT (2000),
detalle_informacionHistorica VARCHAR (20000),
cargo_informacionHistorica VARCHAR (5000),
fk_informacionPersonal_informacionHistorica INT,
FOREIGN KEY (fk_informacionPersonal_informacionHistorica) REFERENCES tbl_informacionPersonal (id_informacionPersonal), 
FOREIGN KEY (fk_region_informacionHistorica) REFERENCES tbl_region (id_region), 
PRIMARY KEY (id_informacionHistorica)
);


CREATE TABLE tbl_tipo_vehiculo (
id_tipo_vehiculo INT AUTO_INCREMENT,
nombre_tipo_vehiculo VARCHAR (5000),
PRIMARY KEY(id_tipo_vehiculo)
);


CREATE TABLE tbl_estado_unidad (
id_estado_unidad INT AUTO_INCREMENT,
nombre_estado_unidad VARCHAR (5000),
PRIMARY KEY(id_estado_unidad)
);

CREATE TABLE tbl_unidad (
id_unidad INT AUTO_INCREMENT,
nombre_unidad VARCHAR (300),
anioDeFabricacion_unidad VARCHAR (300),
marca_unidad VARCHAR (300),
nMotor_unidad VARCHAR (300),
nChasis_unidad VARCHAR (300),
nVIN_unidad VARCHAR (300),
color_unidad VARCHAR (300),
ppu_unidad VARCHAR (300) UNIQUE,
fechaInscripcion_unidad DATE,
fechaAdquisicion_unidad DATE,
capacidadOcupantes_unidad INT,
fk_estado_unidad_unidad INT,
fk_tipo_vehiculo_unidad INT,
fk_entidadACargo INT,
FOREIGN KEY (fk_estado_unidad_unidad) REFERENCES tbl_estado_unidad (id_estado_unidad),
FOREIGN KEY (fk_tipo_vehiculo_unidad) REFERENCES tbl_tipo_vehiculo (id_tipo_vehiculo),
FOREIGN KEY (fk_entidadACargo) REFERENCES tbl_entidadACargo (id_entidadACargo),
PRIMARY KEY (id_unidad)
);

CREATE TABLE tbl_tipoDeMantencion (
id_tipo_de_mantencion INT AUTO_INCREMENT,
nombre_tipoDeMantencion VARCHAR (5000),
PRIMARY KEY(id_tipo_de_mantencion)
);


CREATE TABLE tbl_mantencion (
id_mantencion INT AUTO_INCREMENT,
fk_tipo_mantencion INT,
fecha_mantencion DATE,
responsable_mantencion VARCHAR (5000),
direccion_mantencion VARCHAR (5000),
comentarios_mantencion VARCHAR (5000),
fk_unidad INT,
FOREIGN KEY (fk_unidad) REFERENCES tbl_unidad (id_unidad),
FOREIGN KEY (fk_tipo_mantencion) REFERENCES tbl_tipoDeMantencion (id_tipo_de_mantencion),
PRIMARY KEY (id_mantencion)
);

 

CREATE TABLE tbl_tipo_combustible (
id_tipo_combustible INT AUTO_INCREMENT,
nombre_tipo_combustible VARCHAR (5000),
PRIMARY KEY (id_tipo_combustible)
);


CREATE TABLE tbl_cargio_combustible (
id_cargio_combustible INT AUTO_INCREMENT,
responsable_cargio_combustible VARCHAR (5000),
fecha_cargio DATE,
direccion_cargio VARCHAR (5000),
fk_tipo_combustible_cargio_combustible INT,
cantidad_litros_cargio_combustible FLOAT,
precio_litro_cargio_combustible INT,
observacion_cargio_combustible VARCHAR (5000),
fk_unidad INT,
FOREIGN KEY (fk_tipo_combustible_cargio_combustible) REFERENCES tbl_tipo_combustible (id_tipo_combustible),
FOREIGN KEY (fk_unidad) REFERENCES tbl_unidad (id_unidad),
PRIMARY KEY (id_cargio_combustible)
);

CREATE TABLE tbl_tipo_servicio(
id_tipo_servicio INT AUTO_INCREMENT,
codigo_tipo_servicio VARCHAR (5000),
nombre_tipo_servicio VARCHAR (5000),
PRIMARY KEY (id_tipo_servicio)
);

CREATE TABLE tbl_bitacora (
id_bitacora INT AUTO_INCREMENT,
fecha_bitacora DATE,
fk_tipo_de_servicio_bitacora INT,
direccion_bitacora VARCHAR (5000),
oficial_a_cargo_bitacora VARCHAR (5000),
maquinista_bitacora VARCHAR (5000),
cantidad_de_voluntarios_bitacora VARCHAR (5000),
hora_de_salida_bitacora TIME,
hora_de_llegada_bitacora TIME,
kilometros_bitacora INT,
hora_de_motor_bitacora TIME,
fk_combustible_bitacora INT,
hora_bomba_bitacora TIME,
observaciones_bitacora INT,
PRIMARY KEY (id_bitacora)
);


CREATE TABLE tbl_ubicacion_fisica (
id_ubicacion_fisica INT AUTO_INCREMENT,
nombre_ubicacion_fisica VARCHAR (5000),
PRIMARY KEY (id_ubicacion_fisica)
);

CREATE TABLE tbl_tipo_de_medida (
id_tipo_de_medida INT AUTO_INCREMENT,
nombre_tipo_de_medida VARCHAR (5000),
PRIMARY KEY (id_tipo_de_medida)
);

CREATE TABLE tbl_unidad_de_medida (
id_unidad_de_medida INT AUTO_INCREMENT,
fk_tipo_de_medida_unidad_de_medida INT,
nombre_unidad_de_medida VARCHAR (5000),
FOREIGN KEY (fk_tipo_de_medida_unidad_de_medida) REFERENCES tbl_tipo_de_medida (id_tipo_de_medida),
PRIMARY KEY (id_unidad_de_medida)
);

CREATE TABLE tbl_tipo_de_bodega (
id_tipo_de_bodega INT AUTO_INCREMENT,
nombre_tipo_de_bodega VARCHAR (5000),
PRIMARY KEY (id_tipo_de_bodega)
);

CREATE TABLE tbl_material_menor (
id_material_menor INT AUTO_INCREMENT,
nombre_material_menor VARCHAR (300),
fk_entidad_a_cargo_material_menor INT,
color_material_menor VARCHAR (300),
cantidad_material_menor INT,
medida_material_menor INT,
fk_unidad_de_medida_material_menor INT,
fk_ubicacion_fisica_material_menor INT,
fabricante_material_menor VARCHAR (300),
fecha_de_caducidad_material_menor DATE,
proveedor_material_menor VARCHAR (300),
fk_tipo_de_bodega_material_menor INT,
FOREIGN KEY (fk_entidad_a_cargo_material_menor) REFERENCES tbl_entidadACargo (id_entidadACargo),
FOREIGN KEY (fk_unidad_de_medida_material_menor) REFERENCES tbl_unidad_de_medida (id_unidad_de_medida),
FOREIGN KEY (fk_ubicacion_fisica_material_menor) REFERENCES tbl_ubicacion_fisica (id_ubicacion_fisica),
FOREIGN KEY (fk_tipo_de_bodega_material_menor) REFERENCES tbl_tipo_de_bodega (id_tipo_de_bodega),
PRIMARY KEY (id_material_menor)
);


-- Procedimientos

DELIMITER //
CREATE PROCEDURE CRUDPermiso (id INT, nombre VARCHAR (5000), tipoDeOperacion INT)
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_permiso VALUES (NULL , nombre);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_permiso WHERE id_permiso=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_permiso SET nombre_permiso=nombre WHERE id_permiso=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_permiso  WHERE id_permiso=id;
END IF;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDTipo_usuario (id INT, nombre VARCHAR (5000), tipoDeOperacion INT )
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_tipo_usuario VALUES (NULL , nombre);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_tipo_usuario WHERE id_tipo_usuario=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_tipo_usuario SET nombre_tipo_usuario=nombre WHERE id_tipo_usuario=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_tipo_usuario  WHERE id_tipo_usuario=id;
END IF;

END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDTipo_usuario_permisos (id INT, tipo_usuario_fk INT, permiso_usuario_fk INT, autorizado BOOLEAN, tipoDeOperacion INT )
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_tipo_usuario_permisos VALUES (NULL , tipo_usuario_fk, permiso_usuario_fk, autorizado);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_tipo_usuario_permisos WHERE id_tipo_usuario_permisos=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_tipo_usuario_permisos SET fk_tipo_usuario_tipo_usuario_permisos=tipo_usuario_fk, fk_permiso_tipo_usuario_permisos= permiso_usuario_fk,
otorgado_tipo_usuario_permisos=autorizado WHERE id_tipo_usuario_permisos=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_tipo_usuario_permisos  WHERE id_tipo_usuario_permisos=id;
END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDUsuario (id INT, nombre_usuario VARCHAR (20000), fk_tipo_usuario INT, contrasenia VARCHAR (2000), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_usuario VALUES (NULL, nombre_usuario, fk_tipo_usuario, contrasenia);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_usuario WHERE id_usuario_usuario=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_usuario SET nombre_usuario_usuario=nombre_usuario, fk_tipo_usuario__usuario=fk_tipo_usuario, contrasenia_usuario_usuario=contrasenia WHERE id_usuario_usuario=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_usuario WHERE id_usuario_usuario=id;
END IF;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDEstadoCivil (id INT, nombre VARCHAR (300), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_estado_civil VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_estado_civil WHERE id_estado_civil=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_estado_civil SET nombre_estado_civil=nombre WHERE id_estado_civil=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_estado_civil WHERE id_estado_civil=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDGenero (id INT, nombre VARCHAR (300), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_genero VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_genero WHERE id_genero=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_genero SET nombre_genero=nombre WHERE id_genero=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_genero WHERE id_genero=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDRegion (id INT, nombre VARCHAR (300), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_region VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_region WHERE id_region=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_region SET nombre_region=nombre WHERE id_region=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_region WHERE id_region=id;
END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDProvincia (id INT, nombre VARCHAR (64), fkRegion INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_provincia VALUES (NULL, nombre, fkRegion);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_provincia WHERE id_provincia=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_provincia SET nombre_provincia=nombre, fk_region_provincia=fkRegion WHERE id_provincia=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_provincia WHERE id_provincia=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDComuna (id INT, nombre VARCHAR (64), fkProvincia INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_comuna VALUES (NULL, nombre, fkProvincia);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_comuna WHERE id_comuna=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_comuna SET nombre_comuna=nombre, fk_provincia_comuna=fkProvincia WHERE id_comuna=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_comuna WHERE id_comuna=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDCargo (id INT, nombre VARCHAR (5000), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_cargo VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_cargo WHERE id_cargo=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_cargo SET nombre_cargo=nombre WHERE id_cargo=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_cargo WHERE id_cargo=id;
END IF;
END//
DELIMITER ;



DELIMITER //
CREATE PROCEDURE CRUDMedida (id INT, talla_chaqueta VARCHAR (5000), talla_pantalon VARCHAR (5000), talla_buzo VARCHAR (5000), talla_calzado VARCHAR (5000), tipoDeOperacion INT)
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_medida VALUES (NULL , talla_chaqueta, talla_pantalon, talla_buzo, talla_calzado);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_medida WHERE id_medida=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_medida SET talla_chaqueta_medida=talla_chaqueta, talla_pantalon_medida= talla_pantalon,
talla_buzo_medida=talla_buzo, talla_calzado_medida=talla_calzado WHERE id_medida=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_medida  WHERE id_medida=id;
END IF;
END //
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDInformacionPersonal (id INT, rut VARCHAR(12), nombre VARCHAR (5000), apellidoPaterno VARCHAR(5000), apellidoMaterno VARCHAR(5000), fechaDeNacimiento DATE,
fkEstadoCivil INT, fkMedida INT, altura VARCHAR (5000), peso VARCHAR (5000), email VARCHAR (5000), fkGenero INT, telefonoFijo VARCHAR (5000), telefonoMovil VARCHAR (5000),
direccionPersonal VARCHAR (5000), pertenecioABrigadaJuvenil VARCHAR (5000), esInstructor VARCHAR (5000), tipoOperacion INT ) 
BEGIN

DECLARE fkMedidas INT;
SELECT MAX(id_medida) INTO fkMedidas FROM tbl_medida;

IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionPersonal VALUES (NULL, rut, nombre, apellidoPaterno, apellidoMaterno, fechaDeNacimiento, fkEstadoCivil, fkMedidas,
altura, peso, email, fkGenero, telefonoFijo, telefonoMovil, direccionPersonal, pertenecioABrigadaJuvenil, esInstructor);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionPersonal WHERE id_informacionPersonal=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionPersonal SET rut_informacionPersonal=rut, nombre_informacionPersonal=nombre, apellido_paterno_informacionPersonal=apellidoPaterno,
apellido_materno_informacionPersonal=apellidoMaterno, fecha_de_nacimiento_informacionPersonal=fechaDeNacimiento, fk_estado_civil_informacionPersonal=fkEstadoCivil,
fk_medida_informacionPersonal=fkMedidas, altura_en_metros_informacionPersonal=altura, peso_en_kg_informacionPersonal=peso, e_mail_informacionPersonal=email,
fk_genero_informacionPersonal=fkGenero, telefono_fijo_informacionPersonal=telefonoFijo, telefono_movil_informacionPersonal=telefonoMovil, direccion_personal_informacionPersonal=direccionPersonal,
pertenecio_a_brigada_juvenil_informacionPersonal=pertenecioABrigadaJuvenil, esInstructor_informacionPersonal=esInstructor WHERE id_informacionPersonal=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionPersonal WHERE id_informacionPersonal=id;
END IF;
END//

DELIMITER ;




DELIMITER //
CREATE PROCEDURE CRUDFichaInformacionBomberil (id INT, fkRegion INT, cuerpo VARCHAR (2000), fkCompania INT, fkCargo INT, 
fechaIngreso DATE, NRG INT, fkEstado INT, NRC INT, fkInformacionPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionBomberil VALUES (NULL, fkRegion, cuerpo, fkCompania, fkCargo, fechaIngreso, NRG, fkEstado, NRC, fkInformacionPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionBomberil WHERE fk_informacion_personal__informacionBomberil=fkInformacionPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionBomberil SET fk_region_informacionBomberil=fkRegion,cuerpo_informacionBomberil=cuerpo, fk_id_entidadACargo_informacionBomberil=fkCompania,
fk_cargo_informacionBomberil=fkCargo, fecha_de_ingreso_informacionBomberil=fechaIngreso, N_Reg_General_informacionBomberil=NRG, fk_estado_informacionBomberil=fkEstado,
 N_Reg_Cia_informacionBomberil=NRC, fk_informacion_personal__informacionBomberil=fkInformacionPersonal  WHERE id_informacionBomberil=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionBomberil WHERE id_informacionBomberil=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionBomberil WHERE fk_informacion_personal__informacionBomberil=fkInformacionPersonal;
END IF;
END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDInformacionLaboral (id INT, nombreEmpresa VARCHAR (5000), direccionEmpresa VARCHAR (5000), telefonoEmpresa VARCHAR (5000), cargoEmpresa VARCHAR (5000),
fechaDeIngresoALaEmpresa DATE, dptoEnEmpresa VARCHAR (5000), afp VARCHAR (5000), profesion VARCHAR (5000), fkInfoPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionLaboral VALUES (NULL, nombreEmpresa, direccionEmpresa, telefonoEmpresa, cargoEmpresa, fechaDeIngresoALaEmpresa,
dptoEnEmpresa, afp, profesion,fkInfoPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionLaboral WHERE fk_informacion_personal_informacionLaboral=fkInfoPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionLaboral SET nombre_de_empresa_informacionLaboral=nombreEmpresa, direccion_de_empresa_informacionLaboral=direccionEmpresa, telefono_de_empresa_informacionLaboral=telefonoEmpresa,
cargo_en_la_empresa_informacionLaboral=cargoEmpresa, fecha_de_ingreso_a_la_empresa_informacionLaboral=fechaDeIngresoALaEmpresa, area_o_departamento_en_la_empresa_informacionLaboral= dptoEnEmpresa,
afp_informacionLaboral=afp, profesion_informacionLaboral=profesion, fk_informacion_personal_informacionLaboral=fkInfoPersonal   WHERE id_informacionLaboral=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionLaboral WHERE id_informacionLaboral=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionLaboral WHERE fk_informacion_personal_informacionLaboral=fkInfoPersonal;
END IF;
END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDInformacionMedica1 (id INT, prestacionMedica VARCHAR (5000), alergias VARCHAR (5000), enfermedadesCronicas VARCHAR (5000), fkInfoPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionMedica1 VALUES (NULL, prestacionMedica, alergias, enfermedadesCronicas, fkInfoPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT *  FROM tbl_informacionMedica1 WHERE fk_informacion_personal_informacionMedica1=fkInfoPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionMedica1 SET prestacionMedica_informacionMedica1=prestacionMedica, alergias_informacionMedica1=alergias, enfermedades_croncias_informacionMedica1=enfermedadesCronicas,
fk_informacion_personal_informacionMedica1=fkInfoPersonal WHERE tbl_informacionMedica1.id_informacionMedica1=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionMedica1 WHERE tbl_informacionMedica1=id;
ELSEIF tipoOperacion=5 THEN
SELECT *  FROM tbl_informacionMedica1 WHERE fk_informacion_personal_informacionMedica1=fkInfoPersonal;
END IF;
END//
DELIMITER ;



DELIMITER //
CREATE PROCEDURE CRUDInformacionMedica2 (id INT, medicamentos_habituales VARCHAR (5000), nombre_de_contacto VARCHAR (5000), telefono_de_contacto VARCHAR (5000), fkParentesco INT,
nivel_de_actividad_fisica VARCHAR (5000), es_donante BOOLEAN, es_fumador BOOLEAN, fk_grupoSanguineo INT, fk_inforPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionMedica2 VALUES (NULL, medicamentos_habituales, nombre_de_contacto, telefono_de_contacto, fkParentesco, nivel_de_actividad_fisica, es_donante,
 es_fumador, fk_grupoSanguineo, fk_inforPersonal );
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionMedica2 WHERE id_informacionMedica2=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionMedica2 SET medicamentos_habituales_informacionMedica2=medicamentos_habituales, nombre_de_contacto_informacionMedica2=nombre_de_contacto, telefono_de_contacto_informacionMedica2=telefono_de_contacto,
fk_parentesco_del_contacto_informacionMedica2=fkParentesco, nivel_de_actividad_fisica_informacionMedica2=nivel_de_actividad_fisica, es_donante_informacionMedica2=es_donante,
es_fumador_informacionMedica2=es_fumador, fk_grupo_sanguineo_informacionMedica2=fk_grupoSanguineo, fk_informacion_personal_informacionMedica2=fk_inforPersonal WHERE tbl_informacionMedica2.id_informacionMedica2=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionMedica2 WHERE id_informacionMedica2=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionMedica2 WHERE fk_informacion_personal_informacionMedica2=fk_inforPersonal;
 END IF;
END//
DELIMITER ;

DELIMITER // 
CREATE PROCEDURE CRUDInformacionFamiliar (id INT, nombresInfoFlia VARCHAR (5000), fechaDeNacimientoInfoFlia DATE, fk_parentesco INT , fk_inforPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionFamiliar VALUES (NULL, nombresInfoFlia , fechaDeNacimientoInfoFlia, fk_parentesco, fk_inforPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionFamiliar WHERE fk_informacionPersonal_informacionFamiliar=fk_inforPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionFamiliar SET nombres_informacionFamiliar=nombresInfoFlia, fecha_de_nacimiento_informacionFamiliar=fechaDeNacimientoInfoFlia,
fk_parentesco_informacionFamiliar=fk_parentesco, fk_informacionPersonal_informacionFamiliar=fk_inforPersonal WHERE id_informacionFamiliar=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionFamiliar WHERE id_informacionFamiliar=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionFamiliar WHERE fk_informacionPersonal_informacionFamiliar=fk_inforPersonal;
END IF;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDInformacionAcademica (id INT, fechaInfoAcademica DATE, actividadInfoAcademica VARCHAR (300) , fk_estadoCurso INT, fk_infoPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionAcademica VALUES (NULL, fechaInfoAcademica, actividadInfoAcademica , fk_estadoCurso, fk_infoPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionAcademica WHERE fk_informacionPersonal_informacionAcademica=fk_infoPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionAcademica SET fecha_informacionAcademica=fechaInfoAcademica, actividad_informacionAcademica=actividadInfoAcademica, fk_estado_curso_informacionAcademica=fk_estadoCurso,
fk_informacionPersonal_informacionAcademica=fk_infoPersonal WHERE id_informacionAcademica=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionAcademica WHERE id_informacionAcademica=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionAcademica WHERE fk_informacionPersonal_informacionAcademica=fk_infoPersonal;
END IF;
END//
DELIMITER ;



DELIMITER //
CREATE PROCEDURE CRUDInformacionEntrenamientoEstandar (id INT, fechaInfoEntrenamientoEstandar DATE, actividadEntrenamientoEstandar VARCHAR (300) , fk_estadoCurso INT, fk_inforPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_entrenamientoEstandar VALUES (NULL, fechaInfoEntrenamientoEstandar, actividadEntrenamientoEstandar, fk_estadoCurso, fk_inforPersonal );
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_entrenamientoEstandar WHERE fk_informacionPersonal_entrenamientoEstandar=fk_inforPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_entrenamientoEstandar SET fecha_entrenamientoEstandar=fechaInfoEntrenamientoEstandar, actividad_entrenamientoEstandar=actividadEntrenamientoEstandar,
fk_estado_curso_entrenamientoEstandar=fk_estadoCurso, fk_informacionPersonal_entrenamientoEstandar=fk_inforPersonal WHERE id_entrenamientoEstandar=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_entrenamientoEstandar WHERE id_entrenamientoEstandar=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_entrenamientoEstandar WHERE fk_informacionPersonal_entrenamientoEstandar=fk_inforPersonal;
END IF;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDInformacionHistorica (id INT, fkRegion INT, cuerpo VARCHAR (5000) , compania VARCHAR (5000), fechaDeCambio DATE, premio VARCHAR (20000),
motivo TEXT (20000), detalle VARCHAR (20000), cargo VARCHAR (5000), fkInformacionPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionHistorica VALUES (NULL, fkRegion, cuerpo, compania, fechaDeCambio, premio, motivo,  detalle, cargo, fkInformacionPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM  tbl_informacionHistorica WHERE fk_informacionPersonal_informacionHistorica=fkInformacionPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionHistorica SET fk_region_informacionHistorica=fkRegion, cuerpo_informacionHistorica=cuerpo, compania_informacionHistorica=compania, fechaDeCambio_informacionHistorica=fechaDeCambio,
 premio_informacionHistorica=premio, motivo_informacionHistorica=motivo, detalle_informacionHistorica=detalle, cargo_informacionHistorica=cargo, fk_informacionPersonal_informacionHistorica=fkInformacionPersonal  WHERE id_informacionHistorica=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM  tbl_informacionHistorica WHERE id_informacionHistorica=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM  tbl_informacionHistorica WHERE fk_informacionPersonal_informacionHistorica=fkInformacionPersonal;
END IF;
END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDUnidad (id INT, nombre VARCHAR (300), anioDeFabricacion VARCHAR (300), marca VARCHAR (300), nMotor VARCHAR (300), nChasis VARCHAR  (300),
nVIN VARCHAR (300), color VARCHAR (300), ppu VARCHAR (300), fechaInscripcion DATE, fechaAdquisicion DATE,
capacidadOcupantes INT, fk_estado INT, fk_tipo_vehiculo INT, fk_entidadProp INT, tipoDeOperacion INT)

BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_unidad VALUES (NULL ,nombre, anioDeFabricacion, marca , nMotor, nChasis ,
nVIN  , color , ppu , fechaInscripcion , fechaAdquisicion ,capacidadOcupantes , fk_estado, fk_tipo_vehiculo , fk_entidadProp );
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_unidad WHERE id_unidad=id_unidad;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_unidad SET nombre_unidad=nombre, anioDeFabricacion_unidad=anioDeFabricacion, marca_unidad=marca, nMotor_unidad=nMotor, nChasis_unidad=nChasis,
nVIN_unidad=nVIN, color_unidad=color, ppu_unidad=ppu, fechaInscripcion_unidad=fechaInscripcion , fechaAdquisicion_unidad=fechaAdquisicion,
capacidadOcupantes_unidad=capacidadOcupantes , fk_estado_unidad_unidad=fk_estado , fk_tipo_vehiculo_unidad=fk_tipo_vehiculo, fk_entidadACargo=fk_entidadProp WHERE id_unidad=id;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_unidad  WHERE id_unidad=id;
END IF;

END //
DELIMITER ;


-- INSERTS simples

INSERT INTO tbl_permiso (nombre_permiso) VALUES 
('Ficha Bomberos - Buscar Bomberos'),
('Ficha Bomberos - Crear Bombero'),
('Ficha Bomberos - Modificar'),
('Ficha Bomberos - Eliminar'),
('Ficha Bomberos - Ver Ficha Bomberos'),
('Ficha Bomberos - Generar reporte'),

('Ficha Unidades - Buscar Unidades'),
('Ficha Unidades - Crear Unidades'),
('Ficha Unidades - Modificar'),
('Ficha Unidades - Eliminar'),
('Ficha Unidades - Ver Ficha Unidades'),
('Ficha Unidades - Generar reporte'),

('Inventario - Buscar Material'),
('Inventario - Crear Material'),
('Inventario - Modificar'),
('Inventario - Eliminar'),
('Inventario - Ver Ficha Materiales'),
('Inventario - Generar reporte'),

('Central de Alarma - Central de Despacho'),
('Central de Alarma - Disponibilidad de Unidades'),
('Central de Alarma - Disponibilidad de Oficiales'),
('Central de Alarma - Disponibilidad de Bomberos'),
('Central de Alarma - Generar reporte'),

('Usuarios - Crear Usuario'),
('Usuarios - Perfiles'),
('Usuarios - Restablecer Password'),
('Usuarios - Modificar Usuarios');


INSERT INTO tbl_tipo_usuario VALUES (NULL,'Administrador');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Secretaria');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Superintendente');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Comandante');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Director');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Capitan');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Secretario');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Ayudante');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Central de Alarma');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Ayudante General');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Ayudante Maquinista');
INSERT INTO tbl_tipo_usuario VALUES (NULL,'Secretario General');

INSERT INTO tbl_tipo_usuario_permisos (fk_tipo_usuario_tipo_usuario_permisos,fk_permiso_tipo_usuario_permisos,otorgado_tipo_usuario_permisos) VALUES 
(1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(1,11,1),(1,12,1),(1,13,1),(1,14,1),(1,15,1),(1,16,1),(1,17,1),(1,18,1),(1,19,1),(1,20,1),(1,21,1),(1,22,1),(1,23,1),(1,24,1),(1,25,1),(1,26,1),(1,27,1),

(2,1,1),(2,2,1),(2,3,1),(2,4,1),(2,5,1),(2,6,1),(2,7,1),(2,8,1),(2,9,1),(2,10,1),(2,11,1),(2,12,1),(2,13,1),(2,14,1),(2,15,1),(2,16,1),(2,17,1),(2,18,1),(2,19,0),(2,20,0),(2,21,0),(2,22,0),(2,23,0),(2,24,0),(2,25,0),(2,26,0),(2,27,0),

(3,1,1),(3,2,1),(3,3,1),(3,4,1),(3,5,1),(3,6,1),(3,7,1),(3,8,1),(3,9,1),(3,10,1),(3,11,1),(3,12,1),(3,13,1),(3,14,1),(3,15,1),(3,16,1),(3,17,1),(3,18,1),(3,19,0),(3,20,0),(3,21,0),(3,22,0),(3,23,1),(3,24,0),(3,25,0),(3,26,0),(3,27,0),

(4,1,1),(4,2,0),(4,3,0),(4,4,0),(4,5,1),(4,6,1),(4,7,1),(4,8,1),(4,9,1),(4,10,1),(4,11,1),(4,12,1),(4,13,1),(4,14,1),(4,15,1),(4,16,1),(4,17,1),(4,18,1),(4,19,0),(4,20,1),(4,21,1),(4,22,1),(4,23,1),(4,24,0),(4,25,0),(4,26,0),(4,27,0),

(5,1,1),(5,2,1),(5,3,1),(5,4,1),(5,5,1),(5,6,1),(5,7,1),(5,8,0),(5,9,0),(5,10,0),(5,11,1),(5,12,1),(5,13,0),(5,14,0),(5,15,0),(5,16,0),(5,17,0),(5,18,0),(5,19,0),(5,20,1),(5,21,1),(5,22,1),(5,23,1),(5,24,0),(5,25,0),(5,26,0),(5,27,0),

(6,1,1),(6,2,1),(6,3,1),(6,4,1),(6,5,1),(6,6,1),(6,7,1),(6,8,0),(6,9,0),(6,10,0),(6,11,1),(6,12,1),(6,13,1),(6,14,1),(6,15,1),(6,16,1),(6,17,1),(6,18,1),(6,19,0),(6,20,1),(6,21,1),(6,22,1),(6,23,1),(6,24,0),(6,25,0),(6,26,0),(6,27,0),

(7,1,1),(7,2,1),(7,3,1),(7,4,1),(7,5,1),(7,6,1),(7,7,0),(7,8,0),(7,9,0),(7,10,0),(7,11,0),(7,12,0),(7,13,0),(7,14,0),(7,15,0),(7,16,0),(7,17,0),(7,18,0),(7,19,0),(7,20,0),(7,21,0),(7,22,0),(7,23,1),(7,24,0),(7,25,0),(7,26,0),(7,27,0),

(8,1,1),(8,2,1),(8,3,1),(8,4,1),(8,5,1),(8,6,1),(8,7,1),(8,8,1),(8,9,1),(8,10,1),(8,11,1),(8,12,1),(8,13,1),(8,14,1),(8,15,1),(8,16,1),(8,17,1),(8,18,1),(8,19,0),(8,20,0),(8,21,0),(8,22,0),(8,23,1),(8,24,0),(8,25,0),(8,26,0),(8,27,0),

(9,1,0),(9,2,0),(9,3,0),(9,4,0),(9,5,0),(9,6,0),(9,7,0),(9,8,0),(9,9,0),(9,10,0),(9,11,0),(9,12,0),(9,13,0),(9,14,0),(9,15,0),(9,16,0),(9,17,0),(9,18,0),(9,19,1),(9,20,1),(9,21,1),(9,22,1),(9,23,0),(9,24,0),(9,25,0),(9,26,0),(9,27,0),

(10,1,1),(10,2,1),(10,3,1),(10,4,1),(10,5,1),(10,6,1),(10,7,1),(10,8,1),(10,9,1),(10,10,1),(10,11,1),(10,12,1),(10,13,1),(10,14,1),(10,15,1),(10,16,1),(10,17,1),(10,18,1),(10,19,0),(10,20,0),(10,21,0),(10,22,0),(10,23,1),(10,24,0),(10,25,0),(10,26,0),(10,27,0),

(11,1,0),(11,2,0),(11,3,0),(11,4,0),(11,5,0),(11,6,1),(11,7,1),(11,8,1),(11,9,1),(11,10,1),(11,11,1),(11,12,1),(11,13,0),(11,14,0),(11,15,0),(11,16,0),(11,17,0),(11,18,0),(11,19,0),(11,20,0),(11,21,0),(11,22,0),(11,23,0),(11,24,0),(11,25,0),(11,26,0),(11,27,0),

(12,1,1),(12,2,1),(12,3,1),(12,4,1),(12,5,1),(12,6,1),(12,7,1),(12,8,1),(12,9,1),(12,10,1),(12,11,1),(12,12,1),(12,13,1),(12,14,1),(12,15,1),(12,16,1),(12,17,1),(12,18,1),(12,19,0),(12,20,0),(12,21,0),(12,22,0),(12,23,1),(12,24,0),(12,25,0),(12,26,0),(12,27,0)
;

INSERT INTO tbl_estado_civil VALUES (NULL, 'Hijo/a');
INSERT INTO tbl_estado_civil VALUES (NULL, 'Padre/Madre');
INSERT INTO tbl_estado_civil VALUES (NULL, 'Soltero/a');
INSERT INTO tbl_estado_civil VALUES (NULL, 'Viudo/a');
INSERT INTO tbl_estado_civil VALUES (NULL, 'Divorciado/a');
INSERT INTO tbl_estado_civil VALUES (NULL, 'Separado/a');
INSERT INTO tbl_estado_civil VALUES (NULL, 'Conviviente');


INSERT INTO tbl_genero VALUES (NULL, 'Masculino');
INSERT INTO tbl_genero VALUES (NULL, 'Femenino');


INSERT INTO tbl_region (id_region,nombre_region,ordinal_region)
VALUES
	(1,'Arica y Parinacota','XV'),
	(2,'Tarapacá','I'),
	(3,'Antofagasta','II'),
	(4,'Atacama','III'),
	(5,'Coquimbo','IV'),
	(6,'Valparaiso','V'),
	(7,'Metropolitana de Santiago','RM'),
	(8,'Libertador General Bernardo O\'Higgins','VI'),
	(9,'Maule','VII'),
	(10,'Biobío','VIII'),
	(11,'La Araucanía','IX'),
	(12,'Los Ríos','XIV'),
	(13,'Los Lagos','X'),
	(14,'Aisén del General Carlos Ibáñez del Campo','XI'),
	(15,'Magallanes y de la Antártica Chilena','XII');
    
    
    INSERT INTO tbl_provincia (id_provincia,nombre_provincia,fk_region_provincia)
VALUES
	(1,'Arica',1),
	(2,'Parinacota',1),
	(3,'Iquique',2),
	(4,'El Tamarugal',2),
	(5,'Antofagasta',3),
	(6,'El Loa',3),
	(7,'Tocopilla',3),
	(8,'Chañaral',4),
	(9,'Copiapó',4),
	(10,'Huasco',4),
	(11,'Choapa',5),
	(12,'Elqui',5),
	(13,'Limarí',5),
	(14,'Isla de Pascua',6),
	(15,'Los Andes',6),
	(16,'Petorca',6),
	(17,'Quillota',6),
	(18,'San Antonio',6),
	(19,'San Felipe de Aconcagua',6),
	(20,'Valparaiso',6),
	(21,'Chacabuco',7),
	(22,'Cordillera',7),
	(23,'Maipo',7),
	(24,'Melipilla',7),
	(25,'Santiago',7),
	(26,'Talagante',7),
	(27,'Cachapoal',7),
	(28,'Cardenal Caro',8),
	(29,'Colchagua',8),
	(30,'Cauquenes',9),
	(31,'Curicó',9),
	(32,'Linares',9),
	(33,'Talca',9),
	(34,'Arauco',10),
	(35,'Bio Bío',10),
	(36,'Concepción',10),
	(37,'Ñuble',10),
	(38,'Cautín',11),
	(39,'Malleco',11),
	(40,'Valdivia',12),
	(41,'Ranco',12),
	(42,'Chiloé',13),
	(43,'Llanquihue',13),
	(44,'Osorno',13),
	(45,'Palena',13),
	(46,'Aisén',14),
	(47,'Capitán Prat',14),
	(48,'Coihaique',14),
	(49,'General Carrera',14),
	(50,'Antártica Chilena',15),
	(51,'Magallanes',15),
	(52,'Tierra del Fuego',15),
	(53,'Última Esperanza',15);
    
    INSERT INTO tbl_comuna (id_comuna,nombre_comuna,fk_provincia_comuna)
VALUES
	(1,'Arica',1),
	(2,'Camarones',1),
	(3,'General Lagos',2),
	(4,'Putre',2),
	(5,'Alto Hospicio',3),
	(6,'Iquique',3),
	(7,'Camiña',4),
	(8,'Colchane',4),
	(9,'Huara',4),
	(10,'Pica',4),
	(11,'Pozo Almonte',4),
	(12,'Antofagasta',5),
	(13,'Mejillones',5),
	(14,'Sierra Gorda',5),
	(15,'Taltal',5),
	(16,'Calama',6),
	(17,'Ollague',6),
	(18,'San Pedro de Atacama',6),
	(19,'María Elena',7),
	(20,'Tocopilla',7),
	(21,'Chañaral',8),
	(22,'Diego de Almagro',8),
	(23,'Caldera',9),
	(24,'Copiapó',9),
	(25,'Tierra Amarilla',9),
	(26,'Alto del Carmen',10),
	(27,'Freirina',10),
	(28,'Huasco',10),
	(29,'Vallenar',10),
	(30,'Canela',11),
	(31,'Illapel',11),
	(32,'Los Vilos',11),
	(33,'Salamanca',11),
	(34,'Andacollo',12),
	(35,'Coquimbo',12),
	(36,'La Higuera',12),
	(37,'La Serena',12),
	(38,'Paihuaco',12),
	(39,'Vicuña',12),
	(40,'Combarbalá',13),
	(41,'Monte Patria',13),
	(42,'Ovalle',13),
	(43,'Punitaqui',13),
	(44,'Río Hurtado',13),
	(45,'Isla de Pascua',14),
	(46,'Calle Larga',15),
	(47,'Los Andes',15),
	(48,'Rinconada',15),
	(49,'San Esteban',15),
	(50,'La Ligua',16),
	(51,'Papudo',16),
	(52,'Petorca',16),
	(53,'Zapallar',16),
	(54,'Hijuelas',17),
	(55,'La Calera',17),
	(56,'La Cruz',17),
	(57,'Limache',17),
	(58,'Nogales',17),
	(59,'Olmué',17),
	(60,'Quillota',17),
	(61,'Algarrobo',18),
	(62,'Cartagena',18),
	(63,'El Quisco',18),
	(64,'El Tabo',18),
	(65,'San Antonio',18),
	(66,'Santo Domingo',18),
	(67,'Catemu',19),
	(68,'Llaillay',19),
	(69,'Panquehue',19),
	(70,'Putaendo',19),
	(71,'San Felipe',19),
	(72,'Santa María',19),
	(73,'Casablanca',20),
	(74,'Concón',20),
	(75,'Juan Fernández',20),
	(76,'Puchuncaví',20),
	(77,'Quilpué',20),
	(78,'Quintero',20),
	(79,'Valparaíso',20),
	(80,'Villa Alemana',20),
	(81,'Viña del Mar',20),
	(82,'Colina',21),
	(83,'Lampa',21),
	(84,'Tiltil',21),
	(85,'Pirque',22),
	(86,'Puente Alto',22),
	(87,'San José de Maipo',22),
	(88,'Buin',23),
	(89,'Calera de Tango',23),
	(90,'Paine',23),
	(91,'San Bernardo',23),
	(92,'Alhué',24),
	(93,'Curacaví',24),
	(94,'María Pinto',24),
	(95,'Melipilla',24),
	(96,'San Pedro',24),
	(97,'Cerrillos',25),
	(98,'Cerro Navia',25),
	(99,'Conchalí',25),
	(100,'El Bosque',25),
	(101,'Estación Central',25),
	(102,'Huechuraba',25),
	(103,'Independencia',25),
	(104,'La Cisterna',25),
	(105,'La Granja',25),
	(106,'La Florida',25),
	(107,'La Pintana',25),
	(108,'La Reina',25),
	(109,'Las Condes',25),
	(110,'Lo Barnechea',25),
	(111,'Lo Espejo',25),
	(112,'Lo Prado',25),
	(113,'Macul',25),
	(114,'Maipú',25),
	(115,'Ñuñoa',25),
	(116,'Pedro Aguirre Cerda',25),
	(117,'Peñalolén',25),
	(118,'Providencia',25),
	(119,'Pudahuel',25),
	(120,'Quilicura',25),
	(121,'Quinta Normal',25),
	(122,'Recoleta',25),
	(123,'Renca',25),
	(124,'San Miguel',25),
	(125,'San Joaquín',25),
	(126,'San Ramón',25),
	(127,'Santiago',25),
	(128,'Vitacura',25),
	(129,'El Monte',26),
	(130,'Isla de Maipo',26),
	(131,'Padre Hurtado',26),
	(132,'Peñaflor',26),
	(133,'Talagante',26),
	(134,'Codegua',27),
	(135,'Coínco',27),
	(136,'Coltauco',27),
	(137,'Doñihue',27),
	(138,'Graneros',27),
	(139,'Las Cabras',27),
	(140,'Machalí',27),
	(141,'Malloa',27),
	(142,'Mostazal',27),
	(143,'Olivar',27),
	(144,'Peumo',27),
	(145,'Pichidegua',27),
	(146,'Quinta de Tilcoco',27),
	(147,'Rancagua',27),
	(148,'Rengo',27),
	(149,'Requínoa',27),
	(150,'San Vicente de Tagua Tagua',27),
	(151,'La Estrella',28),
	(152,'Litueche',28),
	(153,'Marchihue',28),
	(154,'Navidad',28),
	(155,'Peredones',28),
	(156,'Pichilemu',28),
	(157,'Chépica',29),
	(158,'Chimbarongo',29),
	(159,'Lolol',29),
	(160,'Nancagua',29),
	(161,'Palmilla',29),
	(162,'Peralillo',29),
	(163,'Placilla',29),
	(164,'Pumanque',29),
	(165,'San Fernando',29),
	(166,'Santa Cruz',29),
	(167,'Cauquenes',30),
	(168,'Chanco',30),
	(169,'Pelluhue',30),
	(170,'Curicó',31),
	(171,'Hualañé',31),
	(172,'Licantén',31),
	(173,'Molina',31),
	(174,'Rauco',31),
	(175,'Romeral',31),
	(176,'Sagrada Familia',31),
	(177,'Teno',31),
	(178,'Vichuquén',31),
	(179,'Colbún',32),
	(180,'Linares',32),
	(181,'Longaví',32),
	(182,'Parral',32),
	(183,'Retiro',32),
	(184,'San Javier',32),
	(185,'Villa Alegre',32),
	(186,'Yerbas Buenas',32),
	(187,'Constitución',33),
	(188,'Curepto',33),
	(189,'Empedrado',33),
	(190,'Maule',33),
	(191,'Pelarco',33),
	(192,'Pencahue',33),
	(193,'Río Claro',33),
	(194,'San Clemente',33),
	(195,'San Rafael',33),
	(196,'Talca',33),
	(197,'Arauco',34),
	(198,'Cañete',34),
	(199,'Contulmo',34),
	(200,'Curanilahue',34),
	(201,'Lebu',34),
	(202,'Los Álamos',34),
	(203,'Tirúa',34),
	(204,'Alto Biobío',35),
	(205,'Antuco',35),
	(206,'Cabrero',35),
	(207,'Laja',35),
	(208,'Los Ángeles',35),
	(209,'Mulchén',35),
	(210,'Nacimiento',35),
	(211,'Negrete',35),
	(212,'Quilaco',35),
	(213,'Quilleco',35),
	(214,'San Rosendo',35),
	(215,'Santa Bárbara',35),
	(216,'Tucapel',35),
	(217,'Yumbel',35),
	(218,'Chiguayante',36),
	(219,'Concepción',36),
	(220,'Coronel',36),
	(221,'Florida',36),
	(222,'Hualpén',36),
	(223,'Hualqui',36),
	(224,'Lota',36),
	(225,'Penco',36),
	(226,'San Pedro de La Paz',36),
	(227,'Santa Juana',36),
	(228,'Talcahuano',36),
	(229,'Tomé',36),
	(230,'Bulnes',37),
	(231,'Chillán',37),
	(232,'Chillán Viejo',37),
	(233,'Cobquecura',37),
	(234,'Coelemu',37),
	(235,'Coihueco',37),
	(236,'El Carmen',37),
	(237,'Ninhue',37),
	(238,'Ñiquen',37),
	(239,'Pemuco',37),
	(240,'Pinto',37),
	(241,'Portezuelo',37),
	(242,'Quillón',37),
	(243,'Quirihue',37),
	(244,'Ránquil',37),
	(245,'San Carlos',37),
	(246,'San Fabián',37),
	(247,'San Ignacio',37),
	(248,'San Nicolás',37),
	(249,'Treguaco',37),
	(250,'Yungay',37),
	(251,'Carahue',38),
	(252,'Cholchol',38),
	(253,'Cunco',38),
	(254,'Curarrehue',38),
	(255,'Freire',38),
	(256,'Galvarino',38),
	(257,'Gorbea',38),
	(258,'Lautaro',38),
	(259,'Loncoche',38),
	(260,'Melipeuco',38),
	(261,'Nueva Imperial',38),
	(262,'Padre Las Casas',38),
	(263,'Perquenco',38),
	(264,'Pitrufquén',38),
	(265,'Pucón',38),
	(266,'Saavedra',38),
	(267,'Temuco',38),
	(268,'Teodoro Schmidt',38),
	(269,'Toltén',38),
	(270,'Vilcún',38),
	(271,'Villarrica',38),
	(272,'Angol',39),
	(273,'Collipulli',39),
	(274,'Curacautín',39),
	(275,'Ercilla',39),
	(276,'Lonquimay',39),
	(277,'Los Sauces',39),
	(278,'Lumaco',39),
	(279,'Purén',39),
	(280,'Renaico',39),
	(281,'Traiguén',39),
	(282,'Victoria',39),
	(283,'Corral',40),
	(284,'Lanco',40),
	(285,'Los Lagos',40),
	(286,'Máfil',40),
	(287,'Mariquina',40),
	(288,'Paillaco',40),
	(289,'Panguipulli',40),
	(290,'Valdivia',40),
	(291,'Futrono',41),
	(292,'La Unión',41),
	(293,'Lago Ranco',41),
	(294,'Río Bueno',41),
	(295,'Ancud',42),
	(296,'Castro',42),
	(297,'Chonchi',42),
	(298,'Curaco de Vélez',42),
	(299,'Dalcahue',42),
	(300,'Puqueldón',42),
	(301,'Queilén',42),
	(302,'Quemchi',42),
	(303,'Quellón',42),
	(304,'Quinchao',42),
	(305,'Calbuco',43),
	(306,'Cochamó',43),
	(307,'Fresia',43),
	(308,'Frutillar',43),
	(309,'Llanquihue',43),
	(310,'Los Muermos',43),
	(311,'Maullín',43),
	(312,'Puerto Montt',43),
	(313,'Puerto Varas',43),
	(314,'Osorno',44),
	(315,'Puero Octay',44),
	(316,'Purranque',44),
	(317,'Puyehue',44),
	(318,'Río Negro',44),
	(319,'San Juan de la Costa',44),
	(320,'San Pablo',44),
	(321,'Chaitén',45),
	(322,'Futaleufú',45),
	(323,'Hualaihué',45),
	(324,'Palena',45),
	(325,'Aisén',46),
	(326,'Cisnes',46),
	(327,'Guaitecas',46),
	(328,'Cochrane',47),
	(329,'O\'higgins',47),
	(330,'Tortel',47),
	(331,'Coihaique',48),
	(332,'Lago Verde',48),
	(333,'Chile Chico',49),
	(334,'Río Ibáñez',49),
	(335,'Antártica',50),
	(336,'Cabo de Hornos',50),
	(337,'Laguna Blanca',51),
	(338,'Punta Arenas',51),
	(339,'Río Verde',51),
	(340,'San Gregorio',51),
	(341,'Porvenir',52),
	(342,'Primavera',52),
	(343,'Timaukel',52),
	(344,'Natales',53),
	(345,'Torres del Paine',53);

   
INSERT INTO tbl_estadoBombero VALUES (NULL, 'Activo');
INSERT INTO tbl_estadoBombero VALUES (NULL, 'Suspendido');
INSERT INTO tbl_estadoBombero VALUES (NULL, 'Separado');
INSERT INTO tbl_estadoBombero VALUES (NULL, 'Fallecido');
INSERT INTO tbl_estadoBombero VALUES (NULL, 'Mártir');

INSERT INTO tbl_cargo (nombre_cargo) VALUES
('Superintendente'),
('Vice Superintendente'),
('Comandante Primero'),
('Comandante Segundo'),
('Tesorero General'),
('Secretario General');

INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'A Negativo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'B Negativo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'AB Negativo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'0 Negativo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'A Positivo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'B Positivo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'AB Positivo');
INSERT INTO tbl_grupo_sanguineo VALUES (NULL,'0 Positivo');

INSERT INTO tbl_parentesco VALUES (NULL, 'Padre');
INSERT INTO tbl_parentesco VALUES (NULL, 'Madre');
INSERT INTO tbl_parentesco VALUES (NULL, 'Hijo');
INSERT INTO tbl_parentesco VALUES (NULL, 'Hija');
INSERT INTO tbl_parentesco VALUES (NULL, 'Abuelo');
INSERT INTO tbl_parentesco VALUES (NULL, 'Abuela');
INSERT INTO tbl_parentesco VALUES (NULL, 'Hermano');
INSERT INTO tbl_parentesco VALUES (NULL, 'Hermana');
INSERT INTO tbl_parentesco VALUES (NULL, 'Primo');
INSERT INTO tbl_parentesco VALUES (NULL, 'Prima');
INSERT INTO tbl_parentesco VALUES (NULL, 'Tío');
INSERT INTO tbl_parentesco VALUES (NULL, 'Tía');
INSERT INTO tbl_parentesco VALUES (NULL, 'Otro');

INSERT INTO tbl_estado_curso VALUES (NULL, 'Aprobado');
INSERT INTO tbl_estado_curso VALUES (NULL, 'Rechazado');
INSERT INTO tbl_estado_curso VALUES (NULL, 'En curso');
INSERT INTO tbl_estado_curso VALUES (NULL, 'Congelado');

INSERT INTO tbl_entidadACargo (nombre_entidadACargo) VALUES ('Cuerpo de Bomberos de Machali'), ('1° Compañía'),('2° Compañía'),('3° Compañía');

INSERT INTO tbl_tipo_vehiculo (nombre_tipo_vehiculo) VALUES  ('Carro bomba'), ('Transporte'), ('Vehiculo menor');

INSERT INTO tbl_estado_unidad (nombre_estado_unidad) VALUES  ('Activa'), ('Inactiva'), ('Dada de baja'), ('Vendida');

INSERT INTO tbl_usuario VALUES (NULL, 'Johnny', 1,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Secretaria', 2,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Superintendente', 3,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Comandante', 4,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Director', 5,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Capitan', 6,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Secretario', 7,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Ayudante', 8,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Central de Alarma', 9,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Ayudante General', 10,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Ayudante Maquinista', 11,'123');
INSERT INTO tbl_usuario VALUES (NULL, 'Secretario General', 12,'123');

INSERT INTO tbl_tipoDeMantencion (nombre_tipoDeMantencion) VALUES ('Preventiva'),('Correctiva'),('Pauta'),('Otra');

INSERT INTO tbl_tipo_combustible (nombre_tipo_combustible) VALUES ('Diesel'),('93 bencina'),('97 bencina'),('95 bencina');

INSERT INTO tbl_tipo_servicio (codigo_tipo_servicio,nombre_tipo_servicio) VALUES ('10-0','LLamado estructural'),('10-1','LLamado de vehículo'),
('10-2','Llamado de pastizales y/o basura'),('10-3','Llamado de rescate de personas atrapadas'),('10-4','Llamado de Rescate vehicular'),
('10-5','Llamado de Materiales Peligrosos'),('10-6','Llamado de emanación de gases'),('10-7','Llamado eléctrico'),('10-8','Llamado no clasificado'),
('10-9','Llamado a otros servicios'),('10-10','Llamado a escombros'),('10-11','Llamado a servicio áreo'),('10-12','Llamado a apoyar a otros Cuerpos'),
('10-13','Llamado a artefacto explosivo, sobre sospechoso, acto terrorista'),('10-14','Llamado a accidente de aviación'), ('10-15','Simulacro');

INSERT INTO tbl_tipo_de_medida (nombre_tipo_de_medida) VALUES ('Distancia'),('Masa'),('Capacidad'),('Tiempo'),('Espacio de datos');
INSERT INTO tbl_ubicacion_fisica  (nombre_ubicacion_fisica) VALUES ('Unidad B-1'),('Unidad 2-2'),('Bodega'),('Cuartel');
INSERT INTO tbl_tipo_de_bodega  (nombre_tipo_de_bodega) VALUES ('Bodega tipo 1'),('Bodega tipo 2'),('Bodega tipo 3'),('Bodega tipo 4');
INSERT INTO tbl_unidad_de_medida  (nombre_unidad_de_medida,fk_tipo_de_medida_unidad_de_medida) VALUES ('Milimetros', 1), ('Centimetros', 1), ('Decimetros', 1), ('Metros', 1), ('Decámetros', 1), ('Hectómetros', 1), ('Kilometros', 1),
('Miligramos',2 ), ('Centigramos', 2),('Decigramos', 2), ('Gramos', 2), ('Decagramos',2),('Hectogramos',2),('Kilogramos',2),('Toneladas',2),
('Mililitros',3),('Centilitros',3),('Decilitros',3),('Litros',3),('Decalitros',3),('Hectolitros',3),('Kilolitros',3),
('Milisegundos',4),('Segundos',4),('Minutos',4),('Horas',4),('Días',4),('Semanas',4),('Meses',4),('Años',4),
('Byte',5),('Kilobyte',5),('Megabyte',5),('Gigabyte',5),('Terabyte',5),('Petabyte',5),('Meses',5),('Años',5),('Petabyte',5),('Exabyte',5),('Zetabyte',5),('Yottabyte',5),('Brontobyte',5),('Geopbyte',5);




-- SELECTs

-- SELECT * FROM tbl_medida;
-- SELECT * FROM tbl_informacionPersonal;
-- SELECT * FROM tbl_informacionBomberil;
-- SELECT * FROM tbl_informacionLaboral;
-- SELECT * FROM tbl_informacionMedica1;
-- SELECT * FROM tbl_informacionMedica2;
-- SELECT * FROM tbl_informacionFamiliar;
-- SELECT * FROM tbl_informacionAcademica;
-- SELECT * FROM tbl_entrenamientoEstandar;
-- SELECT * FROM tbl_informacionHistorica;
-- SELECT * FROM tbl_unidad;
-- SELECT * FROM tbl_permiso;
-- SELECT * FROM tbl_usuario;
-- SELECT * FROM tbl_tipoDeMantencion;
-- SELECT * FROM tbl_mantencion;
-- SELECT * FROM tbl_cargio_combustible;
-- SELECT * FROM tbl_entidadACargo;

/*
Select para el inventario

SELECT tbl_material_menor.nombre_material_menor, tbl_entidadACargo.nombre_entidadACargo, tbl_material_menor.color_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.medida_material_menor,
tbl_unidad_de_medida.nombre_unidad_de_medida, tbl_ubicacion_fisica.nombre_ubicacion_fisica, tbl_material_menor.fabricante_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor,
tbl_material_menor.proveedor_material_menor, tbl_tipo_de_bodega.nombre_tipo_de_bodega FROM tbl_material_menor, tbl_tipo_de_bodega, tbl_unidad_de_medida, tbl_ubicacion_fisica, tbl_entidadACargo
WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo AND  tbl_material_menor.fk_unidad_de_medida_material_menor=tbl_unidad_de_medida.id_unidad_de_medida AND
tbl_material_menor.fk_ubicacion_fisica_material_menor=tbl_ubicacion_fisica.id_ubicacion_fisica AND tbl_material_menor.fk_tipo_de_bodega_material_menor=tbl_tipo_de_bodega.id_tipo_de_bodega;

*/




/*Consulta que requiere id de permiso e id de tipo de usuario

SELECT tbl_tipo_usuario_permisos.otorgado_tipo_usuario_permisos FROM tbl_tipo_usuario_permisos, tbl_permiso, tbl_tipo_usuario
WHERE 
tbl_tipo_usuario_permisos.fk_tipo_usuario_tipo_usuario_permisos=tbl_tipo_usuario.id_tipo_usuario AND
tbl_tipo_usuario_permisos.fk_permiso_tipo_usuario_permisos=tbl_permiso.id_permiso AND
tbl_permiso.id_permiso=1 AND tbl_tipo_usuario.id_tipo_usuario=1;
*/

/*
Consulta que requiere id de usuario e id de permiso

SELECT tbl_tipo_usuario_permisos.otorgado_tipo_usuario_permisos FROM tbl_tipo_usuario_permisos, tbl_permiso, tbl_tipo_usuario, tbl_usuario
WHERE 
tbl_tipo_usuario_permisos.fk_tipo_usuario_tipo_usuario_permisos=tbl_tipo_usuario.id_tipo_usuario AND
tbl_tipo_usuario_permisos.fk_permiso_tipo_usuario_permisos=tbl_permiso.id_permiso AND 
tbl_tipo_usuario.id_tipo_usuario=tbl_usuario.fk_tipo_usuario__usuario AND tbl_permiso.id_permiso=27 AND tbl_usuario.id_usuario_usuario=2;

*/

/*
-- Usar la siguiente consulta primero para ver si no es nulo. Si es nulo, usar la primera consulta  despues de esta, cambiar el valor de entidad a cargo por 'Sin asignar', 
sino, usar la segunda, despues de esta
SELECT id_informacionPersonal FROM tbl_informacionPersonal WHERE nombre_informacionPersonal LIKE '%Juanito%';

Consulta para buscar bomberos por nombre

SELECT tbl_informacionPersonal.rut_informacionPersonal, tbl_informacionPersonal.nombre_informacionPersonal,
tbl_informacionPersonal.apellido_paterno_informacionPersonal, tbl_entidadACargo.nombre_entidadACargo,
tbl_informacionPersonal.id_informacionPersonal FROM tbl_informacionPersonal, tbl_informacionBomberil, tbl_entidadACargo
WHERE tbl_informacionBomberil.fk_id_entidadACargo_informacionBomberil=tbl_entidadACargo.id_entidadACargo AND 
tbl_informacionPersonal.id_informacionPersonal=tbl_informacionBomberil.fk_informacion_personal__informacionBomberil AND
tbl_informacionPersonal.nombre_informacionPersonal LIKE '%Marcelo%';


SELECT tbl_informacionPersonal.rut_informacionPersonal, tbl_informacionPersonal.nombre_informacionPersonal,
tbl_informacionPersonal.apellido_paterno_informacionPersonal, tbl_entidadACargo.nombre_entidadACargo,
tbl_informacionPersonal.id_informacionPersonal FROM tbl_informacionPersonal, tbl_informacionBomberil, tbl_entidadACargo
WHERE 
tbl_informacionPersonal.nombre_informacionPersonal LIKE '%Juanito%' GROUP BY tbl_informacionPersonal.rut_informacionPersonal;


*/

-- Lamadas a procedimientos para probar

CALL CRUDUsuario (1,'Marcelo',1,'123',1); 

CALL CRUDUnidad (6,'Nombre de Prueba 1','2000','200','300','333','555','3333','YOLO','2000-12-03','2012-06-11',15,2,1,1,1);
CALL CRUDUnidad (6,'Nombre de Prueba 2','2000','200','300','333','555','3333','BIEN','2000-12-03','2012-06-11',15,2,1,1,1);
CALL CRUDUnidad (6,'Nombre de Prueba 3','2000','200','300','333','555','3333','jaja','2000-12-03','2012-06-11',15,2,1,1,1);

CALL CRUDMedida (1,'XX','SS','42','41',1);
CALL CRUDInformacionPersonal (1,'20333088-2','Juanito', 'Pérez', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no',1);

CALL CRUDMedida (1,'XX','SS','42','41',1);
CALL CRUDInformacionPersonal (1,'20898088-2','Marcelo', 'Aranda', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no',1);
CALL CRUDFichaInformacionBomberil(1,1,'Machali',1,1,'2001-12-16',1,1,1,1,1);
CALL CRUDInformacionLaboral (1,'Acquiried','algun lado','598677','empleado','2018-08-12','ciencias','masvida','ingeniero', 1, 1);
CALL CRUDInformacionMedica1 (1, 'alguna','ninguna', 'no hay', 1,1);
CALL CRUDInformacionMedica2 (1,'Ninguno', 'Familiar', '96666',3, 'Sin especificar',0,0,6,1,1);
CALL CRUDInformacionFamiliar (1,'Alguno', '1991-12-05',1,1,1);
CALL CRUDInformacionAcademica (1,'2019-05-06','Curso',1,1,1);
CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,1,1);
CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,1,1);
CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,1,1);
CALL CRUDInformacionHistorica (1,1,'Algun cuerpo','Alguna compania','2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',1,1);
CALL CRUDInformacionHistorica (1,1,'Algun cuerpo','Alguna compania','2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',1,1);
CALL CRUDInformacionHistorica (1,1,'Algun cuerpo','Alguna compania','2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',1,1);



CALL CRUDMedida (1,'XX','SS','42','41',1);
CALL CRUDInformacionPersonal (1,'20898088-3','Marcelo', 'Aranda', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no',1);
CALL CRUDFichaInformacionBomberil(1,1,'Machali',2,1,'2001-12-16',1,1,1,2,1);
CALL CRUDInformacionLaboral (1,'Acquiried','algun lado','598677','empleado','2018-08-12','ciencias','masvida','ingeniero', 2, 1);
CALL CRUDInformacionMedica1 (1, 'alguna','ninguna', 'no hay', 2,1);
CALL CRUDInformacionMedica2 (1,'Ninguno', 'Familiar', '96666',3, 'Sin especificar',0,0,6,2,1);
CALL CRUDInformacionFamiliar (1,'Alguno', '1991-12-05',1,2,1);
CALL CRUDInformacionFamiliar (1,'Alguno', '1971-12-05',2,2,1);
CALL CRUDInformacionFamiliar (1,'Alguno', '1311-12-05',3,2,1);
CALL CRUDInformacionAcademica (1,'2019-05-06','Curso',1,2,1);
CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,2,1);
CALL CRUDInformacionHistorica (1,1,'Algun cuerpo','Alguna compania','2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',2,1);

CALL CRUDMedida (1,'XX','SS','42','41',1);
CALL CRUDInformacionPersonal (1,'20898088-4','Marcelo', 'Aranda', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no',1);
CALL CRUDFichaInformacionBomberil(1,1,'Machali',3,1,'2001-12-16',1,1,1,3,1);
CALL CRUDInformacionLaboral (1,'Acquiried','algun lado','598677','empleado','2018-08-12','ciencias','masvida','ingeniero', 3, 1);
CALL CRUDInformacionMedica1 (1, 'alguna','ninguna', 'no hay', 3,1);
CALL CRUDInformacionMedica2 (1,'Ninguno', 'Familiar', '96666',3, 'Sin especificar',0,0,6,3,1);
CALL CRUDInformacionFamiliar (1,'Alguno', '1991-12-05',1,3,1);
CALL CRUDInformacionAcademica (1,'2019-05-06','Curso',1,3,1);
CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,3,1);
CALL CRUDInformacionHistorica (1,1,'Algun cuerpo','Alguna compania','2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',3,1);

CALL CRUDMedida (1,'XX','SS','42','41',1);
CALL CRUDInformacionPersonal (1,'12398608-4','Marcelo', 'Aranda', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no',1);
CALL CRUDFichaInformacionBomberil(1,1,'Machali',4,1,'2001-12-16',1,1,1,4,1);
CALL CRUDInformacionLaboral (1,'Acquiried','algun lado','598677','empleado','2018-08-12','ciencias','masvida','ingeniero', 4, 1);
CALL CRUDInformacionMedica1 (1, 'alguna','ninguna', 'no hay', 4,1);
CALL CRUDInformacionMedica2 (1,'Ninguno', 'Familiar', '96666',3, 'Sin especificar',0,0,6,4,1);
CALL CRUDInformacionFamiliar (1,'Alguno', '1991-12-05',1,4,1);
CALL CRUDInformacionAcademica (1,'2019-05-06','Curso',1,4,1);
CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,4,1);
CALL CRUDInformacionHistorica (1,1,'Algun cuerpo','Alguna compania','2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',4,1);


INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 1);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 2);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 3);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 1);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 2);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 3);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 1);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 2);
INSERT INTO tbl_mantencion VALUES (NULL, 1, '2018-11-11', 'Alguien', 'Algun lugar', 'Nada', 3);

INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',1);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',2);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',3);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',1);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',2);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',3);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',1);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',2);
INSERT INTO tbl_cargio_combustible VALUES (NULL, 'Alguien', '2018-11-11', 'Algun lugar', 1, 16.5, 500,'Ninguna',3);



INSERT INTO tbl_material_menor VALUES (NULL, 'Manguera', 1, 'Roja',3,20,1,1,'Algún fabricante','2020-12-12', 'Mangueras Chile Ltda.',3);
INSERT INTO tbl_material_menor VALUES (NULL, 'Manguera', 1, 'Azul',3,30,1,1,'Algún fabricante','2020-12-12', 'Mangueras Chile Ltda.',3);
INSERT INTO tbl_material_menor VALUES (NULL, 'Manguera', 1, 'Verde',3,30,1,1,'Algún fabricante','2020-12-12', 'Mangueras Chile Ltda.',3);
INSERT INTO tbl_material_menor VALUES (NULL, 'Manguera', 1, 'Plomo',3,30,1,1,'Algún fabricante','2020-12-12', 'Mangueras Chile Ltda.',3);
INSERT INTO tbl_material_menor VALUES (NULL, 'Manguera', 1, 'Morada',3,30,1,1,'Algún fabricante','2020-12-12', 'Mangueras Chile Ltda.',3);




/*
DROP DATABASE bomberosBD;
*/