CREATE DATABASE sei;
USE sei;
CREATE TABLE t_usuarios (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(245) NOT NULL,
  `password` VARCHAR(245) NOT NULL,
  PRIMARY KEY (`id_usuario`));

  CREATE TABLE `sei`.`t_eventos` (
  `id_eventos` INT NOT NULL AUTO_INCREMENT,
  `hora_inicio` DATETIME NULL,
  `hora_fin` DATETIME NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`id_eventos`));

  CREATE TABLE `sei`.`t_invitados` (
  `id_invitados` INT NOT NULL AUTO_INCREMENT,
  `id_evento` INT NULL,
  `nombre_invitado` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`id_invitados`));

ALTER TABLE `sei`.`t_invitados` 
ADD INDEX `fkeventos_idx` (`id_evento` ASC) VISIBLE;
;
ALTER TABLE `sei`.`t_invitados` 
ADD CONSTRAINT `fkeventos`
  FOREIGN KEY (`id_evento`)
  REFERENCES `sei`.`t_eventos` (`id_eventos`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `sei`.`t_eventos` 
ADD COLUMN `id_usuario` INT NULL AFTER `id_eventos`,
ADD INDEX `fkusuarios_idx` (`id_usuario` ASC) VISIBLE;
;
ALTER TABLE `sei`.`t_eventos` 
ADD CONSTRAINT `fkusuarios`
  FOREIGN KEY (`id_usuario`)
  REFERENCES `sei`.`t_usuarios` (`id_usuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

  ALTER TABLE `sei`.`t_eventos` 
ADD COLUMN `evento` VARCHAR(245) NULL AFTER `id_usuario`;

INSERT INTO t_eventos (id_usuario, evento, hora_inicio, hora_fin, fecha) VALUES 
(1, 'Reunión de equipo', '2024-07-03 09:00:00', '2024-07-03 10:00:00', '2024-07-03'),
(2, 'Presentación del proyecto', '2024-07-03 11:00:00', '2024-07-03 12:30:00', '2024-07-03'),
(1, 'Almuerzo con cliente', '2024-07-03 13:00:00', '2024-07-03 14:00:00', '2024-07-03'),
(3, 'Llamada con proveedor', '2024-07-03 15:00:00', '2024-07-03 15:30:00', '2024-07-03'),
(2, 'Revisión de reportes', '2024-07-03 16:00:00', '2024-07-03 17:00:00', '2024-07-03'),
(3, 'Planificación semanal', '2024-07-04 09:30:00', '2024-07-04 10:30:00', '2024-07-04'),
(1, 'Entrenamiento de personal', '2024-07-04 11:00:00', '2024-07-04 13:00:00', '2024-07-04'),
(2, 'Sesión de brainstorming', '2024-07-04 14:00:00', '2024-07-04 15:00:00', '2024-07-04'),
(3, 'Actualización de software', '2024-07-04 15:30:00', '2024-07-04 16:30:00', '2024-07-04'),
(1, 'Reunión de seguimiento', '2024-07-04 17:00:00', '2024-07-04 18:00:00', '2024-07-04');

//script del repositorio

USE `sei`;
CREATE  OR REPLACE VIEW `v_invitados` AS
SELECT 
    invitado.id_invitados AS idInvitado,
    evento.evento AS nombreEvento,
    invitado.email AS email,
    invitado.id_evento AS idEvento
FROM
    t_invitados AS invitado
        INNER JOIN
    t_eventos AS evento ON invitado.id_evento = evento.id_eventos;;

    //se genero nombre de usuario en (agregamos un registro al scrip anterior)

   USE `sei`;
CREATE  OR REPLACE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `v_invitados` AS
    SELECT 
        `invitado`.`id_invitados` AS `idInvitado`,
        `evento`.`evento` AS `nombreEvento`,
        `invitado`.`email` AS `email`,
        `invitado`.`id_evento` AS `idEvento`,
        `invitado`.`nombre_invitado` AS `nombre`,
        evento.fecha as fechaEvento
    FROM
        (`t_invitados` `invitado`
        JOIN `t_eventos` `evento` ON ((`invitado`.`id_evento` = `evento`.`id_eventos`)));

