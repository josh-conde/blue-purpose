# 🌟 Blue Purpose - Registration App 🌟

Welcome to **Blue Purpose**, a sleek and secure web application designed to handle user registration like a pro! 💻🔒 Our mission is to provide a seamless and intuitive experience for users while ensuring top-notch security practices.

---

## 🚀 Features

- **Real-Time Form Validation**: Users get instant feedback on their inputs, ensuring the form is filled out correctly before submission. No more guessing! 📝✅
- **Strong Password Requirements**: We’re serious about security. Passwords need at least 8 characters, with 1 uppercase, 1 number, and 1 special character. 💪🔑
- **SQL Injection Protection**: Using prepared statements in PHP, we’ve got the back-end security covered to keep your data safe and sound. 🛡️
- **Error Handling**: Friendly error messages guide the user if something goes wrong, like duplicate usernames or mismatched passwords. 😅
- **Mobile-Responsive**: Whether you’re on a desktop or mobile, the registration form adapts to your screen for a smooth experience. 📱💻

---

## 🛠️ Technologies Used

- **Front-End**: HTML, CSS, JavaScript
- **Back-End**: PHP
- **Database**: MySQL
- **Validation**: Real-time client-side validation with JavaScript, server-side validation with PHP
- **Security**: Password hashing and input sanitization

---

## 💡 How It Works

1. **User-Friendly Form**: Fill out the registration form, ensuring all fields are validated in real-time. First name, last name, date of birth, username, and password—it’s all there!
2. **Validation**: Inputs are checked for correctness (no blank fields, password strength, etc.). Invalid inputs trigger immediate error messages.
3. **Database Interaction**: Once the form passes validation, data is sanitized and securely stored in a MySQL database.
4. **Feedback**: The user receives clear feedback—either a success message or an error (such as a duplicate username).
5. **Security First**: The form uses prepared statements to protect against SQL injections, and passwords are stored securely using PHP’s `password_hash()`.

---

## 🎉 Installation and Setup

1. Clone the repo:
    ```bash
    git clone https://github.com/your-username/blue-purpose.git
    ```
2. Set up your environment:
    - Install **XAMPP** (or use another local server) and start **Apache** and **MySQL**.
    - Import the SQL dump (provided in the `/database` folder) to set up your database.
3. Update your `register.php`:
    ```php
    $servername = "your-server";
    $username = "your-username";
    $password = "your-password";
    $dbname = "your-database";
    ```
4. Navigate to `localhost/blue-purpose` in your browser, and start registering users!

---

## 🧑‍💻 About the Author

This project was created by [Joshua Conde](https://github.com/josh-conde), a freelance web developer with a passion for clean, secure, and user-friendly web applications. Let’s connect!

---

Thank you for checking out Blue Purpose! 🚀 Let's make the web safer, one registration form at a time. 💙
