# Programador-Full-Stack-DT
 Docfav es el nombre comercial bajo el cual Dashboard Technologies S.L.




## 📂 Estructura del Proyecto

---
```
│── src/                    
│   ├── Domain/             
│   │   ├── Shared/
│   │   │   ├── ValueObject/
│   │   │   │   ├── UserId.php       
│   │   │   │   ├── Name.php           
│   │   │   │   ├── Email.php          
│   │   │   │   ├── Password.php       
│   │   ├── User/
│   │   │   ├── User.php              
│   │   │   ├── UserRepositoryInterface.php
│   │   │   ├── Event/
│   │   │   │   ├── UserRegisteredEvent.php 
│   ├── Application/        
│   │   ├── User/
│   │   │   ├── RegisterUserUseCase.php   
│   │   │   ├── RegisterUserRequest.php  
│   │   │   ├── UserResponseDTO.php     
│   ├── Infrastructure/    
│   │   ├── Controller/
│   │   │   ├── RegisterUserController.php  
│   │   ├── Persistence/
│   │   │   ├── DoctrineUserRepository.php  
│── config/                
│── tests/                  
│── docker-compose.yml      
│── Makefile                
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