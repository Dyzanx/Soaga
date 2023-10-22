CREATE DATABASE proyecto_media;

USE proyecto_media;

CREATE TABLE IF NOT EXISTS institucion(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_dane varchar(255) NOT NULL UNIQUE,
    nombre varchar(255) NOT NULL UNIQUE,
    direccion varchar(255) NOT NULL,
    telefono varchar(20) NOT NULL,
    correo varchar(255) NOT NULL UNIQUE,
    contra varchar(255) NOT NULL,
    web varchar(100),
    created_at datetime,
    updated_at datetime
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS usuario(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol varchar(100) DEFAULT 'estudiante',
    tipo_doc varchar(100) NOT NULL,
    num_doc varchar(100) NOT NULL,
    nombre varchar(255) NOT NULL,
    f_naci date,
    eps varchar(100) NOT NULL,
    correo varchar(255),
    contra varchar(255),
    celular varchar(20),
    id_institucion int(255),
    created_at datetime,
    updated_at datetime,

    CONSTRAINT fk_usuario_institucion FOREIGN KEY (id_institucion) REFERENCES institucion(id)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS grupo(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(100) NOT NULL,
    id_docente int(100) NOT NULL,
    comentario TEXT,
    id_institucion int(100) NOT NULL,
    created_at datetime,
    updated_at datetime,

    CONSTRAINT fk_grupo_institucion FOREIGN KEY (id_institucion) REFERENCES institucion(id),
    CONSTRAINT fk_docente_grupo FOREIGN KEY (id_docente) REFERENCES usuario(id)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS salon(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_institucion int(100) NOT NULL,
    comentario TEXT,
    horario varchar(100) DEFAULT 'Ninguno',
    id_grupo int(100) DEFAULT NULL,
    id_profesor int(100) DEFAULT NULL,
    capacidad varchar(100),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT fk_salon_institucion FOREIGN KEY (id_institucion) REFERENCES institucion(id),
    CONSTRAINT fk_salon_profesor FOREIGN KEY (id_profesor) REFERENCES usuario(id)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS implementos(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100),
    comentario TEXT,
    id_institucion int(100),
    id_salon int(100),
    created_at datetime,
    updated_at datetime,

    CONSTRAINT fk_implementos_institucion FOREIGN KEY (id_institucion) REFERENCES institucion(id),
    CONSTRAINT fk_implementos_salon FOREIGN KEY (id_salon) REFERENCES salon(id)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS usuario_grupo(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_grupo int(100),
    id_usuario int(100),
    created_at datetime,
    updated_at datetime,

    CONSTRAINT fk_usuario__grupo_grupo FOREIGN KEY (id_grupo) REFERENCES grupo(id),
    CONSTRAINT fk_usuario__grupo_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id)
)Engine=InnoDB;