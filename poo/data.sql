INSERT INTO
    Cities (id, name)
VALUES
    (1, 'London'),
    (2, 'Punta Cana'),
    (3, 'New York'),
    (4, 'Bogota'),
    (5, 'Yopal');

INSERT INTO
    Companies (id, name, info, city_id)
values
    (1,  'Voonyx',      'tincidunt eu',       5),
    (2,  'Realbuzz',    'non velit nec',      2),
    (3,  'Vimbo',       'in lacus curabitur', 5),
    (4,  'Avamba',      'suscipit ligula',    1),
    (5,  'Trupe',       'lacinia sapien',     3),
    (6,  'Devify',      'nisl nunc',          4),
    (7,  'Kanoodle',    'porta volutpat',     1),
    (8,  'Jabberstorm', 'vitae suspendisse',  2),
    (9,  'Browsebug',   'dictumst morbi',     4),
    (10, 'Trudeo',      'platea dictumst',    2);

INSERT INTO
    Users (id, fname, lname, phone, city_id, company_id)
VALUES
    (1,  'Nick',    'Sutehall',   '526-100-6462', 5, 7),
    (2,  'Koo',     'Dowber',     '621-740-6558', 3, 5),
    (3,  'Raine',   'Glassford',  '902-805-2971', 5, 8),
    (4,  'Lynne',   'Haselwood',  '770-934-2770', 4, 8),
    (5,  'Rozalie', 'Bear',       '377-573-3415', 2, 7),
    (6,  'Dorie',   'St. Pierre', '128-740-0491', 2, 4),
    (7,  'Crystie', 'Yakobowitz', '349-761-1737', 3, 5),
    (8,  'Hervey',  'Insall',     '841-170-7636', 5, 2),
    (9,  'Chamian', 'Nettlesh',   '210-326-9033', 3, 8),
    (10, 'Corby',   'Oxenham',    '325-206-3285', 2, 10),
    (11, 'Horace',  'Jeens',      '929-176-9956', 5, 4),
    (12, 'Alexa',   'Brumby',     '808-954-1103', 2, 5),
    (13, 'Lorrain', 'Gerling',    '910-937-0193', 5, 9),
    (14, 'Heddi',   'Byfield',    '896-783-6104', 1, 8),
    (15, 'Hart',    'Methley',    '709-980-1704', 2, 5),
    (16, 'Deva',    'Pearlman',   '147-752-6780', 1, 3),
    (17, 'Debra',   'Scouse',     '950-972-4103', 3, 8),
    (18, 'Cherey',  'Lownes',     '881-480-0297', 1, 2),
    (19, 'Sascha',  'Langhor',    '867-901-5633', 3, 10),
    (20, 'Vonny',   'Quested',    '525-333-1151', 2, 5);