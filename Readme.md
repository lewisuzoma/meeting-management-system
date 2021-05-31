# online-meeting-management-system
An online meeting management system built on PHP, JS and HTML with Admin Panel, with mail notification of meeting schedules.
Classes are loaded using autoloader. PHPMailer is used for the mail function.

# Setup:
 
1. Install composer https://getcomposer.org
2. Run ```$ composer install``` on the `/MMS` parent directory to install all composer dependecies and autoloader.
3. Create a new database in MySQL.
4. Run the SQL query in "meeting_db.sql".
5. Open the file "config/Connection.php" and change the Server name, Username, Password and Database name.
6. Visit the home page in browser. Use the "Admin Login" link to login to Admin Panel. Default user - 'hassan.abdulrahman3333@gmail.com' pass - '1234567890'.

Use the "Login" link to login as staff or student. 

Default student - 'boblewisu@gmail.com' pass - '1234567890'.
Default staff - 'annettedixon367@gmail.com' pass - '1234567890'

# How to Use

1. Use the Admin Panel to add meetings. Choose meeting type and attendees.
2. Attendee of the meeting will get a meeting mail notification.
3. Admin can upload MOM, and only the attendee of the meeting can download the MOM. 
4. Admin can add, edit, delete users.
5. Staff and Admin can assign task to users(student).
6. All users can view their task, and submit task once done. Submitte task cannot be reversed.

