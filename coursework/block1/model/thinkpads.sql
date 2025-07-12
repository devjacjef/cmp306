-- Drop existing table
DROP TABLE IF EXISTS `thinkpads`;

-- Create updated thinkpads table
CREATE TABLE `thinkpads` (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Model VARCHAR(255) NOT NULL,
    Description TEXT,
    ImageUrl VARCHAR(255),
    Price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    Stock INT NOT NULL DEFAULT 0
);

-- Insert 6 dummy ThinkPad records
INSERT INTO thinkpads (Model, Description, ImageUrl, Price, Stock)
VALUES 
    ('ThinkPad T440p', 'Military-grade durability with Intel Core i5.', 'image01.jpg', 45.00, 5),
    ('ThinkPad X1 Carbon', 'Ultralight premium laptop for professionals.', 'image02.jpg', 120.00, 3),
    ('ThinkPad E15', 'Mid-range performance with AMD Ryzen processor.', 'image03.jpg', 70.00, 7),
    ('ThinkPad L13 Yoga', '2-in-1 convertible laptop with touchscreen.', 'image04.jpg', 95.00, 4),
    ('ThinkPad P1 Gen 5', 'Workstation-class power with NVIDIA graphics.', 'image05.jpg', 180.00, 2),
    ('ThinkPad T14s', 'Slim, powerful laptop ideal for business use.', 'image06.jpg', 110.00, 6);
