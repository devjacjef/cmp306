DROP TABLE IF EXISTS `thinkpads`;

-- Create table for my model
CREATE TABLE `thinkpads` (
    ID int,
    Model varchar(255),
    Description varchar(255),
    ImageUrl varchar(255),
    Price DECIMAL(10,2)
);

-- Insert some dummy data
INSERT INTO thinkpads (ID, Model, Description, ImageUrl, Price)
VALUES (1, 'Thinkpad T440p', 'Military-Grade', 'image01.jpg', 45.00);


