<? 
/**
 * 
 * Nada más comenzar se ejecuta ob_start(). Con esto se guardará toda la salida en un buffer. Ahora, cuando se escribe en la página,
 * en la siguiente línea con el echo, y en las otras, fuera del código PHP, lo único que ocurre es que se va llenando el mencionado buffer. 
 * 
 */

ob_start(); 
echo "<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">" 
?> 

<html> 
<head> 
    <title>Página procesada con buffer de salida</title> 
</head> 
<body> 
    Esta es mi página!!! 
</body> 
</html> 

<? 

setcookie("nombre", "pepe"); 

/**
 * 
 * Antes de terminar la página, en el siguiente bloque de código PHP, se envía una cookie al navegador del usuario. Esa cookie llega sin problemas y no genera ningún error, 
 * a pesar que se ha escrito código de la página, dado que el código no se había enviado al navegador, sino que se había almacenado en el buffer.
 * 
 */

ob_end_flush(); 

/**
 * 
 * Podemos probar a comentar las líneas que ejecutan las funciones ob_start() y ob_end_flush(). Entonces veríamos como la función setcookie() provocaría un error, 
 * porque esta función no se puede ejecutar si ya se ha escrito texto en la página y por tanto se han enviado ya las cabeceras del http al cliente. 
 * 
 */

?>