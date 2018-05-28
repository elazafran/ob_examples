<html> 
<head> 
   <title>Página procesada con buffer de salida</title> 
</head> 
<body> 
<?php

    /**
     * 
     * Con ob_start(); iniciamos el buffering de la salida. A partir de ahora todo lo que se escriba en la página se guardará en el burffer.
     * Por lo tanto, el siguiente echo "hola!!! esto se va al buffer!"; se guardará en el buffer. 
     * 
     */

    //inicio el buffer de salida 
    ob_start(); 

    echo "hola!!! esto se va al buffer!"; 

    /**
     * 
     * Con la línea ob_clean(); se borra el contenido del bufer, por lo que la salida almacenada se pierde. Es decir, el echo anterior no se mostrará en la página. 
     * 
     */
    //limpio el buffer de salida 
    ob_clean(); 

    echo "Otra vez escribo!!"; 

    /**
     * 
     * Luego con la línea ob_end_clean(); se borra el contenido del buffer y se deshabilita. Hemos perdido otra vez todo lo que se hubiera escrito en la página 
     * a partir del inicio de uso del buffer, así que el anterior echo no se mostrará. 
     * 
     */

    //limpio el buffer de salida y lo deshabilito 
    ob_end_clean(); 

    /**
     * 
     * En la siguiente línea hacemos un echo "Esto si que va a aparecer en la página<br>"; 
     * Como habíamos deshabilitado anteriormente el buffer con ob_end_clean(), ese texto se irá directo a la salida y llegará al navegador que ha solicitado la página. 
     * 
     */

    echo "Esto si que va a aparecer en la página<br>"; 
    

    /**
     * 
     * Esta función se va a utilizar para ejecutarla antes de enviar el buffer al cliente. Recibe un parámetro que es el buffer que se está procesando. 
     * Dentro de la función se pueden realizar acciones y se debe devolver un valor, que será lo que definitivamente se envíe al navegador del visitante. 
     * 
     */

    function convierte_caracteres_especiales($buffer){ 
        
        //return htmlentities ($buffer); 
        return (str_replace("que", "naranjas", $buffer));
    } 


    /**
     * 
    * Para decirle a PHP que se debe ejecutar esa función antes de enviar el bufer al cliente se debe iniciar el uso del bufer ob_start(parámetro),
    * con el parámetro que es el nombre de la función, tal como se había comentado antes. 
    * El siguiente echo "Tenía que probar más cosas. Mañana espero que se lea con interés."; se coloca en el buffer. Y finalmente con ob_end_flush(); se envía el buffer al cliente. 
    * Como al iniciar el bufer se había indicado un parámetro con el nombre de la función convierte_caracteres_especiales() se ejecutará esa función antes de enviar el contenido al cliente web. 
    * En esa función simplemente se procesa el buffer, convirtiendo los caracteres especiales que tenga en sus correspondientes códigos especiales de HTML, con htmlentities(). 
    * Por tanto, el texto que se enviará al cliente es el texto que haya en el buffer después de ejecutar htmlentities(). 
    *
    */

    //inicio el buffer de salida 
    ob_start("convierte_caracteres_especiales"); 

    echo "Tenía que probar más cosas. Mañana espero que se lea con interés."; 

    ob_end_flush(); 

?> 
</body> 
</html>