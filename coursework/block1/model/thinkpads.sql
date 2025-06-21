DROP TABLE IF EXISTS `thinkpads`;

-- Create table for my model
CREATE TABLE `thinkpads` (
    ID int,
    Model varchar(255),
    Description varchar(255),
    ImageUrl varchar(255)
);

-- Insert some dummy data
INSERT INTO thinkpads (ID, Model, Description, ImageUrl)
VALUES (1, 'Thinkpad T440p', 'Military-Grade', 'image01.jpg');


