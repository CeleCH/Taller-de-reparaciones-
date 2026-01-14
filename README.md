
# 🛠️ Sistema Web de Gestión para Taller de Reparaciones

Sistema web desarrollado para gestionar y controlar de manera eficiente el proceso de atención de un taller de reparaciones, desde el ingreso de los equipos hasta su entrega final.

El sistema permite administrar clientes, órdenes de reparación, técnicos, estados del servicio, reportes y generación de comprobantes en PDF.

---

## 🚀 Funcionalidades del Sistema

### 🔐 Autenticación y Sesiones
- Inicio y cierre de sesión de usuarios
- Control de acceso mediante sesiones PHP
- Protección de rutas
- Visualización del rol del usuario

### 🧭 Dashboard
- Acceso exclusivo para usuarios logueados
- Visualización del nombre del usuario
- Estadísticas en tiempo real:
  - Total de órdenes registradas
  - Total de clientes
  - Ingresos (estructura preparada)
- Diseño con Bootstrap 5 y Bootstrap Icons
- Menú lateral de navegación

### 👤 Gestión de Clientes
- Registro de clientes
- Edición y eliminación
- Listado desde base de datos
- Asociación de clientes con órdenes
- CRUD completo

### 🧾 Gestión de Órdenes de Reparación
- Registro de órdenes con cliente asociado
- Estados de la orden:
  - Recibido
  - En reparación
  - Listo
- Cambio de estado mediante botones
- Visualización con badges de colores
- Relación correcta con clientes y técnicos

### 👨‍🔧 Gestión de Técnicos
- Registro de técnicos
- Asignación de técnicos a órdenes
- Soporte para órdenes sin técnico asignado
- Uso de LEFT JOIN para evitar errores

### 🔍 Detalle de Orden
- Visualización completa de la orden:
  - Cliente
  - Problema reportado
  - Estado
  - Técnico asignado
  - Fecha de ingreso

### 📄 Generación de PDF
- Generación de comprobantes de órdenes
- Implementado con FPDF
- PDF descargable desde el detalle de la orden

### 📊 Reportes
- Consultas SQL preparadas:
  - Órdenes por estado
  - Órdenes por técnico
  - Órdenes por fecha
- Base lista para gráficos con Chart.js

---

## 🧰 Tecnologías Utilizadas

### 💻 Backend
- PHP
- Manejo de sesiones ($_SESSION)
- Lógica del sistema
- FPDF

### 🗄️ Base de Datos
- MySQL
- Relaciones entre tablas
- Consultas SQL (JOIN, LEFT JOIN, COUNT)

### 🌐 Frontend
- HTML5
- CSS3
- Bootstrap 5
- Bootstrap Icons

### 📊 Visualización de Datos
- Chart.js

### 🧪 Entorno de Desarrollo
- XAMPP
- Apache
- MySQL
- Navegador Web

---

## ⚙️ Instalación y Ejecución Local

1. Clonar el repositorio
2. Copiar el proyecto en la carpeta `htdocs` de XAMPP
3. Crear la base de datos en MySQL
4. Importar el archivo SQL del proyecto
5. Configurar la conexión a la base de datos
6. Iniciar Apache y MySQL
7. Acceder desde el na
http://localhost/taller_reparaciones


---

## 📌 Estado del Proyecto

✔ Proyecto funcional  
✔ Uso académico  
✔ Base preparada para futuras mejoras  

---

## 👩‍💻 Autora

**Celeste Cuba**  
Proyecto desarrollado como trabajo académico universitario.
