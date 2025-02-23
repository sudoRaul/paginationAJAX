CREATE DATABASE IF NOT EXISTS `jugadores` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `jugadores`;

CREATE TABLE `jugadores` (
                             `id` INT(11) NOT NULL AUTO_INCREMENT,
                             `nombre` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `equipo` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jugadores` (`nombre`, `equipo`) VALUES
                                                 ('Lionel Messi', 'Inter Miami'),
                                                 ('Cristiano Ronaldo', 'Al-Nassr'),
                                                 ('Kylian Mbappé', 'Paris Saint-Germain'),
                                                 ('Erling Haaland', 'Manchester City'),
                                                 ('Kevin De Bruyne', 'Manchester City'),
                                                 ('Vinícius Jr.', 'Real Madrid'),
                                                 ('Robert Lewandowski', 'FC Barcelona'),
                                                 ('Neymar Jr.', 'Al-Hilal'),
                                                 ('Mohamed Salah', 'Liverpool'),
                                                 ('Luka Modric', 'Real Madrid'),
                                                 ('Harry Kane', 'Bayern Múnich'),
                                                 ('Bruno Fernandes', 'Manchester United'),
                                                 ('Pedri', 'FC Barcelona'),
                                                 ('Jude Bellingham', 'Real Madrid'),
                                                 ('Antoine Griezmann', 'Atlético de Madrid');
