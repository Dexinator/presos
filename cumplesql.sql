CREATE TABLE cumple (
    id int NOT NULL,
    reg_name text NOT NULL,
    FOREIGN KEY (id) REFERENCES presos(id)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

ALTER TABLE cumple ADD UNIQUE (id);

DELIMITER //

CREATE TRIGGER before_insert_cumple
BEFORE INSERT ON cumple
FOR EACH ROW
BEGIN
    SET NEW.reg_name = (SELECT reg_name FROM presos WHERE presos.id = NEW.id);
END;
//

DELIMITER ;