-- create your database and run the following code

CREATE TABLE User (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE Task (
    task_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    task_description TEXT,
    due_date DATETIME,
    status ENUM('in progress', 'completed') NOT NULL
);

CREATE TABLE Category (
    category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);

CREATE TABLE Task_Category (
    task_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (task_id, category_id),
    FOREIGN KEY (task_id) REFERENCES Task(task_id),
    FOREIGN KEY (category_id) REFERENCES Category(category_id)
);

CREATE TABLE User_Task (
    user_id INT NOT NULL,
    task_id INT NOT NULL,
    PRIMARY KEY (user_id, task_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (task_id) REFERENCES Task(task_id)
);

CREATE TABLE Task_Reminder (
    task_id INT NOT NULL,
    reminder_date_time DATETIME NOT NULL,
    reminder_triggered BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (task_id, reminder_date_time),
    FOREIGN KEY (task_id) REFERENCES Task(task_id)
);
