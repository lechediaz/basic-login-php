CREATE DATABASE adsi;
CREATE TABLE usuarios
(
  identificacion text,
  nombre text,
  usuario text ,
  clave text
);
INSERT INTO usuarios
  (identificacion,nombre,usuario, clave)
VALUES
  ('1098123987', 'Carlos Gomez' , 'adsi1', 'clave1'),
  ('1095675992', 'Claudia Rodriguez' , 'adsi2', 'clave2');