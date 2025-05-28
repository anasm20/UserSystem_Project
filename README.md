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
  
     ![image](https://github.com/user-attachments/assets/4a2bfc3a-5401-4cb2-b94a-fe2c777b1a29)

     ![image](https://github.com/user-attachments/assets/2cd4778f-17a6-4493-8c03-3c39a5774288)


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

![image](https://github.com/user-attachments/assets/269579c8-c618-4208-b94f-64cf85bbc6a5)


- **User**
- **Admin**

### Login

Once registered, you can log in using your credentials.

![image](https://github.com/user-attachments/assets/6a999ad2-53d4-4abc-94a5-80c8dc79f27c)


---

## 🖥️ Dashboard Overview

After logging in, you'll see a dashboard based on your role:

- **User Dashboard:**  
  - Displays basic user-specific information and features.
    
    ![image](https://github.com/user-attachments/assets/1034d045-3235-4d99-96f3-1e8e635ea6c0)


- **Admin Dashboard:**  
  - Includes admin functionalities like managing users and viewing all accounts.
 
    ![image](https://github.com/user-attachments/assets/8c89a3ce-6f35-4883-8184-6ccf9f156f1e)


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


