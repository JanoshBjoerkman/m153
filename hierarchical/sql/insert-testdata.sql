set autocommit = 0;
start transaction;


insert into role (code) values ('ADM');
insert into role (code) values ('STD');


insert into user
    (firstname, lastname, mail, avatar, role_id)
  values
    ('Grady', 'Booch', 'gbo@oonet.com', 'male01.svg', (select id from role where code = 'ADM'));
insert into proprietary_auth
    (id, pwd)
  values
    ((select LAST_INSERT_ID()), '$2y$10$jvlmmsbvKjaSw4lwTdqHbuz0obp5jRy1fw4TTzhEJYRkVjihvInsq');

insert into user
    (firstname, lastname, mail, avatar, role_id)
  values
    ('Niklaus', 'Wirth', 'nw@inf.ethz.ch', 'male04.svg', (select id from role where code = 'STD'));
insert into proprietary_auth
    (id, pwd)
  values
    ((select LAST_INSERT_ID()), '$2y$10$.6Vb41bjGdHiPIprL7wOEu5rlQ4sWjN4pUoKRRI5se227Ci/FHdHS');

insert into user
    (firstname, lastname, mail, avatar, role_id)
  values
    ('Dennis', 'Ritchie', 'dr@bell.org', 'male03.svg', (select id from role where code = 'STD'));
insert into proprietary_auth
    (id, pwd)
  values
    ((select LAST_INSERT_ID()), '$2y$10$HBc1cvMhwHeKpU.VOovxH.VcmHdbo2YuDlkobRmSfcO485yJQOob2');

insert into user
    (firstname, lastname, mail, avatar, role_id)
  values
    ('Edgar', 'Codd', 'ec@oxf.edu', 'male02.svg', (select id from role where code = 'STD'));
insert into proprietary_auth
    (id, pwd)
  values
    ((select LAST_INSERT_ID()), '$2y$10$LogWpYxuSzX99QU5YD/cu.qFxmRkHZQFaWFU2ZhuZYmSOZOEVG18W');

insert into user
    (firstname, lastname, mail, avatar, role_id)
  values
    ('Marie', 'Harrison', 'mh@bbc.co.uk', 'female01.svg', (select id from role where code = 'STD'));
insert into proprietary_auth
    (id, pwd)
  values
    ((select LAST_INSERT_ID()), '$2y$10$AgY8yhbRTkyyz8eKJ9277e1xd8VXNIl4UGKru2uBbdBLYnOIHr2f.');

-- insert posts for gbo@oonet.com
insert into post
    (timestamp, content, user_id)
  values
    ('2017-08-04 23:05:36', 
    'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
    (select id from user where mail = 'gbo@oonet.com'));
insert into post
    (timestamp, content, user_id)
  values
    ('2017-12-27 05:38:02', 
    'Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.',
    (select id from user where mail = 'gbo@oonet.com'));
insert into post
    (timestamp, content, user_id)
  values
    ('2018-02-01 11:00:50', 
    'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.',
    (select id from user where mail = 'gbo@oonet.com'));

insert into post
    (timestamp, content, user_id)
  values
    ('2018-01-30 03:51:53', 
    'Eu lobortis elementum nibh tellus. Arcu dictum varius duis at consectetur. Tempus urna et pharetra pharetra massa massa ultricies mi quis. Enim eu turpis egestas pretium aenean pharetra magna ac placerat. Fames ac turpis egestas maecenas pharetra. Turpis massa sed elementum tempus egestas. Consectetur libero id faucibus nisl tincidunt eget. Lorem mollis aliquam ut porttitor leo. Volutpat ac tincidunt vitae semper quis lectus nulla at volutpat.',
    (select id from user where mail = 'dr@bell.org'));       
insert into post
    (timestamp, content, user_id)
  values
    ('2018-02-09 02:49:36', 
    'Gravida neque convallis a cras semper auctor neque vitae. Quis eleifend quam adipiscing vitae. Erat velit scelerisque in dictum non consectetur a erat. Magnis dis parturient montes nascetur ridiculus mus mauris vitae ultricies. Donec ultrices tincidunt arcu non sodales neque sodales.',
    (select id from user where mail = 'dr@bell.org'));       

insert into post
    (timestamp, content, user_id)
  values
    ('2018-02-21 12:00:20', 
    'Blandit volutpat maecenas volutpat blandit aliquam etiam erat velit. Dignissim enim sit amet venenatis urna cursus. Tellus molestie nunc non blandit massa enim nec dui nunc. Rhoncus est pellentesque elit ullamcorper dignissim.',
    (select id from user where mail = 'mh@bbc.co.uk'));       
insert into post
    (timestamp, content, user_id)
  values
    ('2018-01-17 11:14:26', 
    'Eu mi bibendum neque egestas congue. A cras semper auctor neque vitae tempus quam pellentesque.',
    (select id from user where mail = 'mh@bbc.co.uk'));       
insert into post
    (timestamp, content, user_id)
  values
    ('2017-12-11 06:15:30', 
    'Pharetra massa massa ultricies mi quis. Id aliquet lectus proin nibh nisl condimentum id venenatis a. Aliquet bibendum enim facilisis gravida neque convallis a cras. Scelerisque mauris pellentesque pulvinar pellentesque. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Tellus mauris a diam maecenas sed enim. Tempor id eu nisl nunc.',
    (select id from user where mail = 'mh@bbc.co.uk'));       



    commit;