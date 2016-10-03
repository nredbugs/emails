Emails Laravel 5
============

## General

### Requerimientos

Para la instalación base del paquete emails, asegurese de tener instalada la extensión PHP IMAP

Extensiónes obligatorias

    # apt-get install php5-imap

Este paquete extiende de la siguiente librería

    # "ddeboer/imap": "^0.5.2"

Es necesario declarar las siguientes variables de entorno
	
	# EMAILS_EMAIL y EMAILS_PASSWORD

en el archivo .env

## Documentacion

- [Instalacion](#instalacion)
- [Configuracion](#configuracion)
- [Solución de problemas](#solucion-de-problemas)
- [Instalacion manual](#instalacion-manual)


## Instalacion

Para instalar el paquete, solo tiene que agregar

	# "nredbugs/emails": "0.1.x-dev"

a su composer.json.A continuación, ejecute composer installo composer update.
o puede ejecutar el composer requirecomando desde su terminal:
	
	# composer require nredbugs/emails

## Configuracion

	$config = array( 
		'hostname' => '', /* Obligatorio ejemplo: imap.gmail.com */
		'port' => '' /* Predeterminado 993 */,
		'flags' => '' /* Predeterminado /imap/ssl/validate-cert */,
		'parameters' => array() ,
	);

	$email  =  array(
		'processing' => '', /* Obligatorio ejemplo: INBOX (Bandeja principal) */
		'move' => '', /* Ejemplo : [Gmail]/Importantes */
		'path' => '', /* Ruta para almacenar los archivos descargador ejemplo: '/archivos' */
		'extensions' => array() /* Extensiones de archivos a recuperar ejemplo: array('doc','xml','xlxs')*/
	);

## Solución de problemas
