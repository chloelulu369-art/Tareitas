CREATE DATABASE IF NOT EXISTS tareitas;
USE tareitas;
CREATE TABLE IF NOT EXISTS tareas(
    id                          INT primary key AUTO_INCREMENT,
    nombre                      VARCHAR(555) NOT NULL,
    prioridad                   ENUM('urgente', 'solucionar rapido', 'tranqui', 'plata') NOT NULL,
    descripcion                 VARCHAR(1000),
    imagen_url                  VARCHAR(555),
    made                        ENUM('Chloe','Shana','profesional') NOT NULL,
    asignado                    ENUM('Chloe','Shana','profesional') NOT NULL,
    completado                  ENUM('Chloe','Shana','profesional') DEFAULT NULL,
    estado                      TINYINT(1) NOT NULL DEFAULT 0,
    fecha_creacion              DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    fecha_final                 DATETIME DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS pasos(
    id_pasos                    INT primary key AUTO_INCREMENT NOT NULL,
    orden                       INT NOT NULL,
    texto                       VARCHAR(555) NOT NULL,
    id_tareas                   INT,
    FOREIGN KEY (id_tareas) references tareas(id)
);