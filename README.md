# Employee Management System (PHP + MySQL)

A web-based **Employee Management System** developed using **Core PHP** and **MySQL**. This project provides an admin dashboard to manage employee records efficiently with authentication, CRUD operations, and search/filter functionality.

---

## 🚀 Features

- Admin Login & Logout (Session-based Authentication)
- Add New Employees
- View Employee Records in Table Format
- Update Employee Details
- Delete Employee Records
- Search Employees by Name or Email
- Filter Employees by Department
- Clean and simple UI using HTML & CSS
- Optimized MySQL Queries for better performance

---

## 🛠 Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript  
- **Backend:** PHP (Core PHP)  
- **Database:** MySQL  
- **Tools:** XAMPP, phpMyAdmin, VS Code  
- **Version Control:** Git & GitHub  

---

## 📂 Project Folder Structure
```
employee-management-system/
│── config/
│ └── db.php
│
│── auth/
│ ├── login.php
│ ├── logout.php
│
│── employees/
│ ├── index.php
│ ├── add.php
│ ├── edit.php
│ ├── delete.php
│
│── includes/
│ ├── auth_check.php
│ ├── header.php
│ ├── footer.php
│
│── assets/
│ └── style.css
│
│── dashboard.php
│── index.php
```

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/yourusername/employee-management-system.git
```
2️⃣ Move Project to XAMPP Directory
Copy the project folder into:
```
C:\xampp\htdocs\
```
Example:
```
C:\xampp\htdocs\employee-management-system
```
3️⃣ Start XAMPP
Open XAMPP Control Panel and start:
- Apache
- MySQL

🗄 Database Setup (MySQL)
Open phpMyAdmin:
```
http://localhost/phpmyadmin/
```
Create a new database:
```
employee_db
```
Open the SQL tab and run the following query:

```
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    department VARCHAR(100) NOT NULL,
    salary INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password)
VALUES ('admin', 'admin123');
```
▶️ Run the Project
Open your browser and go to:

```
http://localhost/employee-management-system/
```

🔑 Admin Login Credentials
Username: admin
Password: admin123

📌 Future Improvements
- Password hashing using bcrypt
- Prepared statements for better security (SQL Injection prevention)
- Pagination for employee list
- Export employee data to CSV
- UI improvements using Bootstrap
- Role-based access system (Admin/User)

👨‍💻 Author
Prashant Kumar Sharma
GitHub: https://github.com/PseudoPrashant
LinkedIn: https://linkedin.com/in/pseudoprashant/
