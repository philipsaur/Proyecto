create database OWL;
use OWL;
create table usuarios
(
N_documento double primary key,
Contraseña double,
Nombre_de_usuario varchar (15),
Primer_nombre varchar (15),
Segundo_nombre varchar (15),
Telefono double,
Correo varchar (25),
Direccion varchar (35)
);
create table Administrador
(
Id_administrador double primary key
);
create table Donacion
(
Id_donacion double primary key,
Fecha_donacion date,
cantidad smallint
);
create table Tipo_donacion
(
Dinero decimal primary key,
material varchar(15)
);
create table Tipo_donador
(
Nit double primary key,
No_documento double
);
create table Contador
(
Id_contador double
);
create table Consulta_materiales
(
Cantidad_materiales smallint,
Id_material double primary key,
Tipo_material varchar (20)
);
create table Control_materiales
(
No_donacion smallint primary key
);
create table Secretaria
(
Id_secretaria double primary key
);
create table Inscripcion
(
Numero_documento double primary key,
Nombre varchar (30),
Direccion varchar (60),
Apellidos varchar (15),
Nacionalidad varchar (15),
Tipo_documento varchar (20),
Fecha_nacimiento date,
Email varchar (20),
Contacto_telefonico double
);
create table Horario
(
Nombre_instructor varchar (20) primary key,
Fecha date
);
create table Actividades
(
Id_actividad double primary key,
Documento_instructor double,
Fecha_actividad date
);
create table Instructor 
(
Documento_instructor double primary key,
Nombre_instructor varchar (20)
);
create table Prestamo_material
(
Id_prestamo double primary key,
Documento_instructor double,
Cantidad_prestada smallint
);
create table Roles
(
Id_roles double
);
create table Incapacidad
(
Fecha_incapacidad date,
Tipo_excusa varchar (20)
);
create table Empresa
(
Id_empresa double primary key,
Razon_social Varchar (50)
);
create table Persona_donante
(
Id_per_don double primary key
);
create table Dinero
(
Fecha date,
Cantidad_dinero decimal primary key
);