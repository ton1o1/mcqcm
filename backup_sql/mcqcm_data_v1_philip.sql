INSERT INTO `user` (`id`, `date_created`, `email`, `first_name`, `last_name`, `password`, `roles`, `is_active`) VALUES (NULL, '2016-01-23 00:00:00', 'email1', 'first_name1', 'last_name1', 'password1', '["student", "teacher", "admin"]', '1');

INSERT INTO `user` (`id`, `date_created`, `email`, `first_name`, `last_name`, `password`, `roles`, `is_active`) VALUES (NULL, '2016-01-23 00:00:00', 'email1', 'first_name2', 'last_name2', 'password2', '["student", "teacher", "admin"]', '1');

INSERT INTO `quiz` (`id`, `user_id`, `date_created`, `title`) VALUES (NULL, '1', '2016-01-23 00:00:00', 'title1'), (NULL, '1', '2016-01-24 00:00:00', 'title2');

INSERT INTO `quiz` (`id`, `user_id`, `date_created`, `title`) VALUES (NULL, '1', '2016-01-23 00:00:00', 'title1'), (NULL, '2', '2016-01-24 00:00:00', 'title2');