# Programador-Full-Stack-DT
 Docfav es el nombre comercial bajo el cual Dashboard Technologies S.L.




## 📂 Estructura del Proyecto

---
```
        │── src/                  # Código fuente de la prueba
        │   ├── Domain/           # Capa de dominio 
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
        │   ├── Application/       # Casos de uso y lógica de aplicación
        │   │   ├── User/
        │   │   │   ├── RegisterUserUseCase.php   # Lógica de registro de usuario
        │   │   │   ├── RegisterUserRequest.php   # DTO para solicitud de registro
        │   │   │   ├── UserResponseDTO.php  
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