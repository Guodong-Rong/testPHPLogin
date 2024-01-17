It is a test case for login system in PHP.\
It will call the procedure in SQL to check if the user login details match the database records.\
\
The form action in login.php will decide to call which stored procedure.\
loginProcess.php will call stored procedure CheckUserLogin without getting the username\
loginGetUsernameProcess.php will call stored procedure GetUserByUsernameAndPassword and get the username, it is an ideal way and default in the project