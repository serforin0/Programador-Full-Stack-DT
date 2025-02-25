# Programador-Full-Stack-DT
 Docfav es el nombre comercial bajo el cual Dashboard Technologies S.L.




## 📂 Estructura del Proyecto

---
```
│── src/                     # Código fuente de la aplicación
│   ├── Domain/              # Capa de dominio (Reglas de negocio y entidades)
│   │   ├── Shared/
│   │   │   ├── ValueObject/
│   │   │   │   ├── UserId.php         # Identificador único del usuario
│   │   │   │   ├── Name.php           # Validación del nombre del usuario
│   │   │   │   ├── Email.php          # Validación del email
│   │   │   │   ├── Password.php       # Manejo seguro de contraseñas
│   │   ├── User/
│   │   │   ├── User.php               # Entidad de usuario
│   │   │   ├── UserRepositoryInterface.php  # Interfaz del repositorio de usuarios
│   │   │   ├── Event/
│   │   │   │   ├── UserRegisteredEvent.php  # Evento de usuario registrado
│   ├── Application/        # Capa de aplicación (Casos de uso y lógica de aplicación)
│   │   ├── User/
│   │   │   ├── RegisterUserUseCase.php   # Lógica de registro de usuario
│   │   │   ├── RegisterUserRequest.php   # DTO para solicitud de registro
│   │   │   ├── UserResponseDTO.php       # DTO para respuesta de usuario
│   ├── Infrastructure/     # Capa de infraestructura (Persistencia y Controladores)
│   │   ├── Controller/
│   │   │   ├── RegisterUserController.php  # Controlador HTTP para registro de usuario
│   │   ├── Persistence/
│   │   │   ├── DoctrineUserRepository.php  # Implementación del repositorio con Doctrine
│── config/                 # Configuraciones del sistema
│── tests/                  # Pruebas unitarias y de integración
│── docker-compose.yml      # Configuración de Docker
│── Makefile                # Comandos para inicialización rápida
│── README.md  
```
---

## 🚀 Instalación


1. Clona este repositorio:
   ```bash
   git clone https://github.com/serforin0/Programador-Full-Stack-DT
   cd src
   ```

2. Instala las dependencias con Composer:
   ```bash
   composer install
   ```