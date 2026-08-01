# DevWebCamp - MVC PHP

![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![SCSS](https://img.shields.io/badge/SCSS-CF649A?style=for-the-badge&logo=sass&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![NPM](https://img.shields.io/badge/NPM-CB3837?style=for-the-badge&logo=npm)
![MVC](https://img.shields.io/badge/Architecture-MVC-success?style=for-the-badge)
![PayPal Sandbox](https://img.shields.io/badge/PayPal-Sandbox-00457C?style=for-the-badge&logo=paypal)

---

## 📖 Descripción

**DevWebCamp** es una aplicación web desarrollada con **PHP** siguiendo el patrón de arquitectura **MVC**, cuya finalidad es gestionar conferencias y workshops mediante un sistema de registro de usuarios, compra de boletos y administración de eventos.

Los usuarios pueden crear una cuenta, confirmar su correo electrónico, recuperar su contraseña y adquirir diferentes planes de acceso. Dependiendo del plan adquirido, podrán registrarse en eventos disponibles y seleccionar un regalo conmemorativo.

La plataforma cuenta además con un **Panel de Administración** que permite gestionar ponentes, eventos, usuarios y visualizar estadísticas relacionadas con las ventas y los regalos solicitados.

Este proyecto fue desarrollado como parte del curso **Desarrollo Web Completo con HTML5, CSS3, JS, AJAX, PHP y MySQL** impartido por **Juan Pablo De la Torre**, incorporando adaptaciones y mejoras propias.

---

# 🚀 Demo

> Próximamente disponible.

```
https://TU-DOMINIO.com
```

---

# ✨ Características

## Usuarios

- Registro de usuarios.
- Inicio de sesión.
- Confirmación de cuenta mediante correo electrónico.
- Recuperación de contraseña mediante correo.
- Autenticación segura.
- Protección de rutas.
- Sistema de sesiones.

---

## Eventos

- Visualización de conferencias y workshops.
- Agenda organizada por días (sábado y domingo).
- Horarios organizados por bloques.
- Registro a eventos según el plan adquirido.
- Selección de hasta **5 eventos** para usuarios con plan correspondiente.
- Selección de un regalo para planes de pago.
- Deshabilitación automática de horarios ya ocupados al crear o editar eventos.

---

## Compra de boletos

- Plan gratuito.
- Dos planes de pago.
- Integración con **PayPal JavaScript SDK (Sandbox)**.
- Confirmación de compra.
- Registro automático del boleto adquirido.

---

## Panel de Administración

El administrador dispone de un panel completo para gestionar el sistema.

Entre sus funcionalidades se encuentran:

- CRUD de ponentes.
- CRUD de eventos.
- Gestión de usuarios registrados.
- Visualización de estadísticas.
- Reporte de ventas.
- Gráfico de barras con los regalos seleccionados por los usuarios.
- Administración centralizada del contenido del evento.

---

# 🛠 Tecnologías utilizadas

## Backend

- PHP 8.4
- Arquitectura MVC
- MySQL
- Composer

### Librerías de Composer

- PHPMailer
- PHP Dotenv
- Intervention Image

---

## Frontend

- HTML5
- SCSS
- JavaScript (ES6)
- Gulp
- npm

---

## Servicios

- PayPal JavaScript SDK (Sandbox)
- SMTP para envío de correos
- Chart.js para estadísticas

---

# 📁 Arquitectura del proyecto

```
DevWebCamp-MVC-php-DWFS
│
├── classes/
├── controllers/
├── includes/
├── models/
├── public/
├── src/
├── vendor/
├── views/
│
├── .env
├── composer.json
├── package.json
├── gulpfile.js
└── Router.php
```

La aplicación sigue el patrón de arquitectura **Modelo - Vista - Controlador (MVC)**, separando la lógica del negocio, la presentación y el manejo de las peticiones, facilitando el mantenimiento y escalabilidad del proyecto.

---

# ⚙️ Requisitos

Antes de ejecutar el proyecto asegúrate de tener instalado:

- PHP 8.4
- Composer
- Node.js
- npm
- MySQL

---

# 📦 Instalación

## 1. Clonar el repositorio

```bash
git clone https://github.com/TU-USUARIO/DevWebCamp-MVC-php-DWFS.git

cd DevWebCamp-MVC-php-DWFS
```

---

## 2. Instalar dependencias de PHP

```bash
composer install
```

---

## 3. Instalar dependencias del Frontend

```bash
npm install
```

---

## 4. Configurar las variables de entorno

Crear un archivo `.env` tomando como referencia el archivo de ejemplo.

Variables necesarias:

```env
HOST=

DB_HOST=
DB_PORT=
DB_NAME=
DB_USER=
DB_PASS=

EMAIL_HOST=
EMAIL_PORT=
EMAIL_USER=
EMAIL_PASS=

PAYPAL_CLIENT_ID=
```

---

## 5. Importar la base de datos

Importar el archivo SQL correspondiente (próximamente incluido en el repositorio).

---

## 6. Compilar los recursos

Ejecutar:

```bash
npm run dev
```

Este comando compilará automáticamente:

- SCSS → CSS
- JavaScript
- Optimización de imágenes
- Monitoreo de cambios mediante Gulp

---

## 7. Ejecutar el servidor

Desde la carpeta **public/** ejecutar:

```bash
php -S localhost:3000
```

Luego abrir:

```
http://localhost:3000
```

---

# 📧 Sistema de correo

La aplicación utiliza **PHPMailer** para:

- Confirmación de cuentas.
- Recuperación de contraseña.
- Envío mediante servidor SMTP configurado en las variables de entorno.

---

# 💳 Integración con PayPal

El sistema implementa la **PayPal JavaScript SDK (Sandbox)** para simular la compra de boletos durante el desarrollo.

Los usuarios pueden adquirir:

- Plan gratuito
- Plan presencial
- Plan virtual

Una vez confirmado el pago se registra automáticamente la compra y se habilitan las funcionalidades correspondientes al plan adquirido.

---

# 📊 Estadísticas

El panel de administración incluye un módulo de estadísticas desarrollado con **Chart.js**, mostrando:

- Usuarios registrados.
- Ventas realizadas.
- Cantidad de boletos vendidos.
- Gráfico de barras con los regalos más solicitados por los asistentes.

---

# 🔒 Seguridad

El proyecto incorpora diversas medidas de seguridad:

- Autenticación mediante sesiones.
- Confirmación de correo electrónico.
- Recuperación segura de contraseña.
- Protección de rutas privadas.
- Variables sensibles mediante `.env`.
- Separación de responsabilidades mediante MVC.

---

# 🎓 Créditos

Proyecto desarrollado durante el curso:

**Desarrollo Web Completo con HTML5, CSS3, JS, AJAX, PHP y MySQL**

Instructor:

**Juan Pablo De la Torre**

El proyecto incorpora modificaciones y mejoras adicionales realizadas con fines de aprendizaje y práctica.

---
