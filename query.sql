CREATE TABLE `presos` (
    `id` int,
    `reg_name` text NOT NULL,
    `res_tel` text NOT NULL,
    `IGname` text,
    `Bday` text NOT NULL,
    `mkt` int NOT NULL,
    `cellmate` int NOT NULL,
    `referidos` int DEFAULT '0'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

ALTER TABLE
    `presos`
ADD
    PRIMARY KEY (`id`);

ALTER TABLE
    `presos`
MODIFY
    `id` int(11) NOT NULL AUTO_INCREMENT;
