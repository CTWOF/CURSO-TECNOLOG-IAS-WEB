-- Crear la base de datos (si no existe)
CREATE DATABASE IF NOT EXISTS admin;

-- Usar la base de datos
USE admin;

-- Crear la tabla de roles
CREATE TABLE roles (
    rolId INT AUTO_INCREMENT PRIMARY KEY,    -- Clave primaria autoincremental
    rolName VARCHAR(100) NOT NULL,           -- Nombre del rol, requerido
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla de usuarios
CREATE TABLE users (
    userId INT AUTO_INCREMENT PRIMARY KEY,   -- Clave primaria autoincremental
    username VARCHAR(100) NOT NULL,          -- Nombre de usuario, requerido
    password VARCHAR(255) NOT NULL,          -- Contraseña, encriptada
    email VARCHAR(100) NOT NULL,             -- Correo electrónico, requerido
    roleId INT,                              -- Relación con la tabla de roles
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (roleId) REFERENCES roles(rolId) ON DELETE SET NULL  -- Clave foránea con la tabla de roles
);

-- Insertar roles de ejemplo
INSERT INTO roles (rolName) VALUES
('Admin'),
('Editor'),
('Viewer');

-- Insertar algunos usuarios de ejemplo
INSERT INTO users (username, password, email, roleId) VALUES
('admin', MD5('admin_password'), 'admin@example.com', 1),
('editor', MD5('editor_password'), 'editor@example.com', 2),
('viewer', MD5('viewer_password'), 'viewer@example.com', 3);

-- Crear la tabla de permisos (opcional, si manejas permisos)
CREATE TABLE permissions (
    permissionId INT AUTO_INCREMENT PRIMARY KEY,   -- Clave primaria autoincremental
    permissionName VARCHAR(100) NOT NULL,          -- Nombre del permiso
    description TEXT,                              -- Descripción del permiso
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla intermedia para la relación de muchos a muchos entre roles y permisos
CREATE TABLE role_permissions (
    roleId INT,                                    -- Clave foránea a la tabla roles
    permissionId INT,                              -- Clave foránea a la tabla permisos
    PRIMARY KEY (roleId, permissionId),
    FOREIGN KEY (roleId) REFERENCES roles(rolId) ON DELETE CASCADE,
    FOREIGN KEY (permissionId) REFERENCES permissions(permissionId) ON DELETE CASCADE
);

-- Insertar algunos permisos de ejemplo
INSERT INTO permissions (permissionName, description) VALUES
('create_content', 'Permission to create content'),
('edit_content', 'Permission to edit content'),
('delete_content', 'Permission to delete content'),
('view_content', 'Permission to view content');

-- Asignar permisos a los roles (opcional)
INSERT INTO role_permissions (roleId, permissionId) VALUES
(1, 1), -- Admin: create_content
(1, 2), -- Admin: edit_content
(1, 3), -- Admin: delete_content
(1, 4), -- Admin: view_content
(2, 2), -- Editor: edit_content
(2, 4), -- Editor: view_content
(3, 4); -- Viewer: view_content
