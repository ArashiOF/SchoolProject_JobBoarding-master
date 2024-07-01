
use encuesta_sw;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nivel`, `experiencia`, `tipoUsuario`) VALUES
(NULL, 'admin', 'admin@uabc.com', NULL, '$2y$10$AnjECCIk7ujaRP4i/fKqSeQVIwbvwht13.m8TxQ4Q1apLENe0W5tq', NULL, '2019-05-26 01:05:06', '2019-05-26 01:05:06', '0', '0', '0'),
(NULL, 'marisa', 'marisa@uabc.com', NULL, '$2y$10$vYWNDXcwtu6Rtg/b9dhuK.ZqTbqdDlAO21rpgp4vH9ApHOX6eIDMq', NULL, '2019-05-26 01:10:45', '2019-05-26 01:10:45', '0', '0', '1');

INSERT INTO `categorias` (`idcategoria`, `titulo`, `created_at`, `updated_at`) VALUES
(NULL, 'Historia', CURDATE(), CURDATE()),
(NULL, 'Mercadotecnia', CURDATE(), CURDATE()),
(NULL, 'Administración', CURDATE(), CURDATE()),
(NULL, 'Contabilidad', CURDATE(), CURDATE()),
(NULL, 'Artes', CURDATE(), CURDATE()),
(NULL, 'Ciencias de la Computación', CURDATE(), CURDATE());


INSERT INTO `misiones` (`idmision`, `descripcion`, `experiencia`, `created_at`, `updated_at`) VALUES
(NULL, 'Crea una encuesta nueva', '150', NULL, NULL),
(NULL, 'Responde una encuesta', '100', NULL, NULL);

INSERT INTO `encuesta_sw`.`empresas` (`id`, `nombre`, `descripcion`, `url`, `direccion`, `userid`) VALUES (1, 'Kyocera', 'Somos una comp', 'kyocera.com', 'calle 1', 1);

INSERT INTO `encuesta_sw`.`vacantes` (`id`, `empresaid`, `userid`, `titulo`, `descripcion`, `activo`, `salario`, `esTemporal`, `calle`) VALUES ('1', '1', '1', 'Trabajo 2', 'Este es un trabajo', true, '500', true, 'dasd');
