-- Crear la base de datos (si no existe)
CREATE DATABASE IF NOT EXISTS admin;

-- Usar la base de datos
USE admin;

-- Crear la tabla de roles
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla de usuarios (ejemplo de relación con la tabla roles)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);

-- Crear la tabla de permisos (ejemplo para gestionar permisos relacionados con roles)
CREATE TABLE permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permission_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla intermedia de roles y permisos (muchos a muchos)
CREATE TABLE role_permissions (
    role_id INT,
    permission_id INT,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);

-- Insertar algunos roles por defecto
INSERT INTO roles (role_name) VALUES
('Admin'),
('Editor'),
('Viewer');

-- Insertar algunos permisos por defecto
INSERT INTO permissions (permission_name, description) VALUES
('create_content', 'Permission to create content'),
('edit_content', 'Permission to edit content'),
('delete_content', 'Permission to delete content'),
('view_content', 'Permission to view content');

-- Asignar permisos a los roles
INSERT INTO role_permissions (role_id, permission_id) VALUES
(1, 1), -- Admin: create_content
(1, 2), -- Admin: edit_content
(1, 3), -- Admin: delete_content
(1, 4), -- Admin: view_content
(2, 2), -- Editor: edit_content
(2, 4), -- Editor: view_content
(3, 4); -- Viewer: view_content

-- Insertar algunos usuarios por defecto
INSERT INTO users (username, password, email, role_id) VALUES
('admin', MD5('admin_password'), 'admin@example.com', 1),
('editor', MD5('editor_password'), 'editor@example.com', 2),
('viewer', MD5('viewer_password'), 'viewer@example.com', 3);
