-- Creating users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    cookie_value VARCHAR(255) NOT NULL
);

-- Creating posts table
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    uuid VARCHAR(36) NOT NULL,
    images_json TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
    );

-- Add testing data to users table
INSERT INTO users (username, cookie_value) VALUES
('user1', 'cookie_value_1'),
('user2', 'cookie_value_2'),
('user3', 'cookie_value_3');

-- Add testing data to posts table
INSERT INTO posts (user_id, title, description, uuid, images_json) VALUES
(1, 'Post Title 1', 'Description for post 1', 'uuid_1', '["image1.jpg", "image2.jpg"]'),
(2, 'Post Title 2', 'Description for post 2', 'uuid_2', '["image3.jpg", "image4.jpg"]'),
(3, 'Post Title 3', 'Description for post 3', 'uuid_3', '["image5.jpg", "image6.jpg"]');

