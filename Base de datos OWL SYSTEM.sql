create database owl;
use owl;
create table Registrar_usuarios
(
N_documento double primary key,
Contraseña double,
Nombre_de_usuario varchar (15),
Primer_nombre varchar (15),
Segundo_nombre varchar (15),
Codigo_ciudad int,
Edad smallint
);
create table contacto
(
Nombre varchar (20),
Telefono int primary key,
Correo varchar (30),
Mensaje varchar (50)
);
create table Telefono
(
N_documento double primary key,
Telefono double
);
create table Correo
(
N_documento double primary key,
Correo varchar (35),
Nombre varchar (20),
Rol varchar (15)
);
create table Direccion
(
Codigo_ciudad int primary key,
Calle varchar (10),
Carrera varchar (10),
Barrio varchar (20),
Ciudad varchar (15),
Localidad varchar (15),
Comuna varchar (15)
);

create table Administrador
(
Id_administrador double primary key
);
create table Donacion
(
Id_donacion double primary key,
Fecha_donacion date,
cantidad int,
Tipo_donacion varchar (10),
Nombre_persona_donante varchar (25),
Nombre_empresa_donante varchar (40)
);
create table Tipo_donacion
(
Dinero decimal primary key,
Material varchar(15)
);
create table Material
(
Id_material int primary key,
Tamaño varchar (10),
Peso int,
Color varchar (10), 
Cantidad smallint,
Tipo_material varchar (20)
);
create table Tipo_donador
(
Nit double primary key,
No_documento double,
Empresa varchar (35),
Persona varchar (20)
);
create table Contador
(
Id_contador double primary key
);
create table Consulta_materiales
(
Cantidad_materiales smallint,
Id_material double primary key,
Tipo_material varchar (20),
Archivo varchar (20)
);
create table Control_materiales
(
No_donacion smallint primary key,
Cantidad smallint,
Id_producto int,
Tipo_material varchar (20)
);
create table Secretaria
(
Id_secretaria double primary key
);
create table Inscripcion
(
Numero_documento double primary key,
Nombre varchar (30),
Apellidos varchar (15),
Nacionalidad varchar (15),
Tipo_documento varchar (20),
Fecha_nacimiento date
);
create table Horario
(
Nombre_instructor varchar (20) primary key,
Fecha date,
Hora_actividad time,
Tipo_actividad varchar (25)
);
create table Actividades
(
Id_actividad double primary key,
Documento_instructor double,
Fecha_actividad date,
Descripcion_actividad varchar (30),
Nombre_actividad varchar (30)
);
create table Instructor 
(
Documento_instructor double,
Nombre_instructor varchar (20),
Id_instructor int primary key,
Horario datetime,
Asistencia varchar (15)
);
create table Prestamo_material
(
Id_prestamo double primary key,
Documento_instructor double,
Cantidad_prestada smallint,
Fecha date,
Tipo_material varchar (20)
);
create table Roles
(
Id_roles double,
Tipo_rol varchar (15)
);
create table Incapacidad
(
Fecha_incapacidad date,
Tipo_excusa varchar (20),
No_radicado int primary key,
Entidad_gen_incap varchar (35),
No_contacto double
);
create table Empresa
(
Id_empresa double primary key,
Razon_social Varchar (50),
Estado varchar (15),
Respresentante varchar (20)
);
create table Persona_donante
(
Id_per_don double primary key,
Estado varchar (10)
);
create table Dinero
(
Fecha date,
Cantidad_dinero decimal primary key,
Ultimo_donador varchar (20),
Ultima_donacion varchar (20)
);
create table inventarios
(
Id_inventario int primary key,
Fecha_registro date,
Cantidad smallint,
Id_donacion int,
Archivado varchar(15)
);
create table novedades
(
FechaN date,
Id_empleado int primary key,
Tipo_novedad varchar (20),
Comentarios varchar (40)
);
create table transporte
(
Fecha_viajes date,
Id_conductor int,
Id_transporte int primary key,
Cantidad_ben smallint,
Destino varchar (30),
Nombre_cond varchar (20)
);