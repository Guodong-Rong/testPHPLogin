-- Create the database
CREATE DATABASE IF NOT EXISTS testPHPLoginDB;

-- Use the database
USE testPHPLoginDB;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert some sample data (optional)
INSERT INTO users (username, password) VALUES
('user1', 'password1'),
('user2', 'password2'),
('user3', 'password3');

-- Create a stored procedure to check if username and password match
DELIMITER //
CREATE PROCEDURE CheckUserLogin(IN p_username VARCHAR(255), IN p_password VARCHAR(255), OUT result INT)
BEGIN
    -- Initialize result to 0 (indicating no match)
    SET result = 0;

    -- Check if the provided username and password match a record in the users table
    IF EXISTS (SELECT 1 FROM users WHERE username = p_username AND password = p_password) THEN
        -- Set result to 1 (indicating a match)
        SET result = 1;
    END IF;
END //
DELIMITER ;

DELIMITER //

-- Create a stored procedure to get the username if username and password match
DELIMITER //

CREATE PROCEDURE GetUserByUsernameAndPassword(
    IN p_username VARCHAR(255), 
    IN p_password VARCHAR(255),
    OUT result_username VARCHAR(255)
)
BEGIN
    DECLARE user_id INT;

    -- Check if the provided username and password match a record in the users table
    SELECT id INTO user_id
    FROM users
    WHERE username = p_username AND password = p_password
    LIMIT 1;

    -- Set the output parameter based on whether a match is found
    IF user_id IS NOT NULL THEN
        SET result_username = p_username;
    ELSE
        SET result_username = NULL;
    END IF;
END //

DELIMITER ;
