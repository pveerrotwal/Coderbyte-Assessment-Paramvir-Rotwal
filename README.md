# Javascript-PHP Application
 
 *Project made by: Paramvir Rotwal

 *Following Tech Stack is used for this project:*
 
 1. Front-end (HTML, CSS, Vanilla JavaScript):
Created a signup page (signup.html) with username, password fields, and a signup button.
Created a login page (login.html) with username, password fields, and a login button.
Created a home page (home.html) with a table, Sign Out button, and columns for S.No, Random ID, Generated date & time.

2. Back-end:
PHP:
Used PHP for back-end.
Created a MySQL database to store user information.

3. API'S:
   1.Sign Up API (signup.php):
Handles POST requests from the signup page.
Checks for username duplication.
Stores signup details in the database.
   2.Login API (login.php):
Handles POST requests from the login page.
Validates login details against the database.
Creates a session upon successful login.
   3.Session Termination API (logout.php):
Handles POST requests to terminate the session.
Destroys the session.
   4.Random ID Generation API (generateID.php):
Handles POST requests to generate a random ID for the user.
Generates a 32-bit random ID with date and time.
Returns the generated ID details in the response.


