DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
   ID INT AUTO_INCREMENT PRIMARY KEY,
   Title VARCHAR(255) NOT NULL,
   Body TEXT NOT NULL
);

INSERT INTO news (Title, Body)
VALUES
('New Riverside Park Opens in Glasgow', 
 'A new £5 million riverside park has officially opened along the River Clyde, offering locals a scenic space for walking, cycling, and events.'),

('Glasgow University Researchers Make Breakthrough in Cancer Treatment', 
 'Scientists at the University of Glasgow have announced a major breakthrough in cancer research, potentially paving the way for new treatment options.'),

('Storm Causes Major Disruption Across Glasgow', 
 'Heavy rainfall and winds reaching up to 80mph have caused widespread disruption across Glasgow, with transport services delayed and power outages reported.'),

('Glasgow to Host International Film Festival This September', 
 'The Glasgow International Film Festival is set to return this September, showcasing over 100 films from around the world and attracting top talent.'),

('City Council Approves Plans for New Tech Hub in East End', 
 'Glasgow City Council has approved a £30 million redevelopment project in the East End, aimed at creating a technology innovation hub and 500 new jobs.'),

('Public Transport Fares in Glasgow to Rise Next Month', 
 'Strathclyde Partnership for Transport has announced a 7% fare increase starting next month, citing rising operational costs and infrastructure upgrades.');
