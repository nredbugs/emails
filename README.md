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
