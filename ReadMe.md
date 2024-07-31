It is a test case for login system in PHP.\
It will call the procedure in SQL to check if the user login details match the database records.\
\
The form action in login.php will decide to call which stored procedure.
1. loginCallNoProcedureProcess.php: No stored procedure used.
2. loginCallCheckUserLoginProcess.php: It will call stored procedure CheckUserLogin without getting the username.
3. loginCallGetUserByUsernameAndPasswordProcess.php: It will call stored procedure GetUserByUsernameAndPassword and get the username showed on the home page, it is an ideal way in the project.