-- Step: 01
-- ************************************************************
-- Doel: Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- ************************************************************
-- Versie    Datum        Auteur             Omschrijving
-- *****     *****        ******             *************
-- 01        10-02-2026   Arjan de Ruijter    Smartphones
-- ************************************************************

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02
-- ************************************************************
-- Doel: Maak een nieuwe tabel aan met de naam Smartphones
-- ************************************************************
-- Versie    Datum        Auteur             Omschrijving
-- *****     *****        ******             *************
-- 01        10-02-2026   Arjan de Ruijter    Tabel Smartphones
-- ************************************************************
-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ************************************************************

CREATE TABLE Smartphones
(
    Id                SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT,
    Merk              VARCHAR(50)                 NOT NULL,
    Model             VARCHAR(50)                 NOT NULL,
    Prijs             DECIMAL(6,2)                NOT NULL,
    Geheugen          DECIMAL(4,0)                NOT NULL,
    Besturingssysteem VARCHAR(25)                 NOT NULL,
    Schermgrootte     DECIMAL(3,2)                NOT NULL,
    Releasedatum      DATE                        NOT NULL,
    MegaPixels        DECIMAL(3,0)                NOT NULL,
    IsActief          BIT                         NOT NULL    DEFAULT 1,
    Opmerking         VARCHAR(255)                NULL        DEFAULT NULL,
    DatumAangemaakt   DATETIME(6)                 NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd    DATETIME(6)                 NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 03
-- ************************************************************
-- Doel: Vul de tabel Smartphones met gegevens
-- ************************************************************
-- Versie    Datum        Auteur             Omschrijving
-- *****     *****        ******             *************
-- 01        10-02-2026   Arjan de Ruijter    Vulling Smartphones
-- ************************************************************

INSERT INTO Smartphones
(
    Merk,
    Model,
    Prijs,
    Geheugen,
    Besturingssysteem,
    Schermgrootte,
    Releasedatum,
    MegaPixels
)
VALUES
    ('Apple',   'iPhone 16 Pro',     1256.56,  64,  'iOS 18',      6.7, '2025-01-19',  50),
    ('Samsung', 'Galaxy S25 Ultra',  1539,     128, 'Android 15',  6.1, '2025-02-01', 200),
    ('Google',  'Pixel 9 Pro',        890,     1024,'Android 15',  6.3, '2024-12-20', 100),
    ('OnePlus',  'OnePlus 13',        899.99,  256, 'Android 15',  6.8, '2025-01-10',  64),
    ('Xiaomi',   'Xiaomi 14 Pro',     1099.00, 512, 'Android 15',  6.7, '2024-11-30',  50),
    ('Sony',     'Xperia 1 VI',       1299.95, 256, 'Android 14',  6.5, '2024-09-15',  48),
    ('Huawei',   'P70 Pro',           1199.00, 512, 'HarmonyOS',  6.6, '2024-10-05',  50),
    ('Nokia',    'XR30',               699.00, 128, 'Android 14',  6.4, '2024-08-20',  64);

-- Step: 04
-- ****************************************************************************************
-- Doel: Maak een nieuwe tabel aan met de naam Sneakers
-- ****************************************************************************************
-- Versie    Datum        Auteur             Omschrijving
-- *****     *****        ******             *************
-- 01        10-02-2026   Arjan de Ruijter    Tabel Sneakers
-- ****************************************************************************************

-- Onderstaande velden toevoegen aan de tabel Sneakers
-- Type (Hardloop, Basketball, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch), Gewicht, Releasedatum
-- ****************************************************************************************

CREATE TABLE Sneakers
(
    Id              SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT,
    Merk            VARCHAR(50)                 NOT NULL,
    Model           VARCHAR(50)                 NOT NULL,
    Type            VARCHAR(25)                 NOT NULL,
    IsActief        BIT                         NOT NULL    DEFAULT 1,
    Opmerking       VARCHAR(255)                NULL        DEFAULT NULL,
    DatumAangemaakt DATETIME(6)                 NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd  DATETIME(6)                 NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 05
-- ************************************************************
-- Doel: Vul de tabel Sneakers met gegevens
-- ************************************************************
-- Versie    Datum        Auteur             Omschrijving
-- *****     *****        ******             *************
-- 01        10-02-2026   Arjan de Ruijter    Vulling Sneakers
-- ************************************************************

INSERT INTO Sneakers
(
    Merk,
    Model,
    Type
)
VALUES
    ('Nike',       'Air Jordan 1',   'Hardloop'),
    ('Adidas',     'Yeezy Boost 350','Basketbal'),
    ('New Balance','Pixel 9 Pro',    'Casual'),
    ('Trico',      'New Age',        'Casual'),
    ('Overlord',   'Tristar 6',      'Hardloop'),
    ('Puma',       'RS-X3',          'Casual'),
    ('Asics',      'Gel-Kayano 31',  'Hardloop'),
    ('Reebok',    'Question Mid',    'Basketbal');

-- Step: 06
-- ************************************************************
-- Doel: Voeg extra kolommen toe aan de tabel Sneakers
-- ************************************************************
-- Versie    Datum        Auteur             Omschrijving
-- *****     *****        ******             *************
-- 01        10-02-2026   SB                 Vulling Sneakers
-- ************************************************************

ALTER TABLE Sneakers
ADD Prijs DECIMAL(6,2) NOT NULL AFTER Type,
ADD Materiaal VARCHAR(25) NOT NULL AFTER Prijs,
ADD Gewicht DECIMAL(5,2) NOT NULL AFTER Materiaal,
ADD Releasedatum DATE NOT NULL AFTER Gewicht;
