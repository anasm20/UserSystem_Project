# UserSystem_Project

A simple user management system with role-based access (User & Admin), built with PHP and MySQL.

## 🚀 Getting Started

### Requirements

- [XAMPP](https://www.apachefriends.org/index.html)

### Setup Instructions

1. **Install and Start XAMPP**  
   - Download and install XAMPP from the official website.  
   - Open the XAMPP Control Panel.  
   - Start **Apache** and **MySQL** by clicking the **Start** button.

2. **Create the Database Structure**  
   - Open your browser and go to: [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)  
   - Create a new database (e.g., `user_system`).  
   - Import the provided `.sql` file if available.

3. **Run the Project**  
   - Place the project folder inside the `htdocs` directory of your XAMPP installation.  
   - Open your browser and go to:  
     [http://localhost/UserSystem_Project/](http://localhost/UserSystem_Project/)

---

## 🧑‍💼 User Management

### Registration

On the main page, you can register a new account. During registration, select one of the following roles:

- **User**
- **Admin**

### Login

Once registered, you can log in using your credentials.

---

## 🖥️ Dashboard Overview

After logging in, you'll see a dashboard based on your role:

- **User Dashboard:**  
  - Displays basic user-specific information and features.

- **Admin Dashboard:**  
  - Includes admin functionalities like managing users and viewing all accounts.

---

## 🛠️ Technologies Used
-PHP
-MySQL
-HTML/CSS
-JavaScript
- XAMPP (local development server)

---

## 📁 Project Structure

```plaintext
UserSystem_Project/
├── admin_page.php          # Admin dashboard page
├── config.php              # Database configuration
├── delete_user.php         # Script to delete users (admin only)
├── edit_user.php           # Script to edit user information
├── index.php               # Entry point / redirect logic
├── login_register.php      # Combined login and registration page
├── logout.php              # Logout script
├── script.js               # JavaScript file (client-side logic)
├── style.css               # Stylesheet
└── user_page.php           # User dashboard page


