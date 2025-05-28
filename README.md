# VoteSphere

VoteSphere is a web-based voting system that provides a secure and efficient platform for conducting elections. This system allows administrators to manage elections, candidates, and voters while ensuring a transparent and reliable voting process.

## Features

- **Secure Authentication**
  - User registration and login system
  - Separate admin and voter interfaces

- **Admin Dashboard**
  - Manage voters and candidates
  - Add/remove candidates
  - Monitor voting progress
  - Declare election results

- **Voter Features**
  - Easy-to-use voting interface
  - Profile management
  - Real-time voting status

- **Security Measures**
  - Secure login system
  - One-time voting verification
  - Protected against unauthorized access

## Technology Stack

- **Frontend**
  - HTML
  - CSS
  - JavaScript

- **Backend**
  - PHP
  - MySQL Database

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/SydDwit/VoteSphere.git
   ```

2. Import the database:
   - Create a new MySQL database
   - Import the `demo.sql` file into your database
   - Update database credentials in `api/connect.php`

3. Configure your web server:
   - Set up a PHP-enabled web server (e.g., Apache, XAMPP)
   - Point the web server to the project directory
   - Ensure PHP version 7.0 or higher is installed

4. Access the application:
   - Open your web browser
   - Navigate to the project URL
   - Use the default admin credentials (check demo.sql for details)

## Project Structure

voteSphere/
├── admin/ # Admin dashboard and management
├── api/ # Backend API endpoints
├── css/ # Stylesheets
├── routes/ # Application routes
├── uploads/ # User uploaded files
└── index.html # Main entry point


## Usage

### Admin Panel
1. Login to admin dashboard
2. Manage candidates and voters
3. Monitor election progress
4. Declare results when voting ends

### Voter Interface
1. Register/Login to your account
2. View candidate information
3. Cast your vote
4. View voting status

## Security Considerations

- Keep your database credentials secure
- Regularly update admin passwords
- Monitor system logs for suspicious activities
- Backup your database regularly

## Contact

Name - [@SydDwit](https://github.com/SydDwit)

Project Link: [https://github.com/SydDwit/VoteSphere](https://github.com/SydDwit/VoteSphere)
