# Control de la salida en PHP

PHP dispone de funciones para controlar en la salida de datos hacia el cliente. Se puede almacenar la salida en un buffer, para enviarla al cliente cuando se desee.
Como sabemos, PHP realiza un procesamiento de la página y envía al ordenador del usuario el resultado de procesar el código PHP. Por regla general, a medida que va procesando la página, se envía el código HTML resultante al cliente, pero esta configuración se puede cambiar, incluso en tiempo de ejecución. 

Con PHP podemos almacenar la salida, a medida que se va generando, en un buffer. De modo que no se envíe ningún dato al cliente hasta que se indique expresamente. Existen una serie de funciones que se utilizan para conseguir este comportamiento, que son las funciones de control de salida. 

Pensando en qué truco podría ser útil, me acordé de los famosos ob_* que en un principio me parecían bastante complicados e inútiles.

## Funciones del Control de la salida 
    flush — Vaciar el búfer de salida del sistema
    ob_clean — Limpiar (eliminar) el búfer de salida
    ob_end_clean — Limpiar (eliminar) el búfer de salida y deshabilitar el almacenamiento en el mismo
    ob_end_flush — Volcar (enviar) el búfer de salida y deshabilitar el almacenamiento en el mismo
    ob_flush — Vaciar (enviar) el búfer de salida
    ob_get_clean — Obtiene el contenido del búfer actual y elimina el búfer de salida actual
    ob_get_contents — Devolver el contenido del búfer de salida
    ob_get_flush — Volcar el búfer de salida, devolverlo como una cadena de caracteres y deshabilitar el almacenamiento en el búfer de salida
    ob_get_length — Devolver la longitud del búfer de salida
    ob_get_level — Devolver el nivel de anidamiento del mecanismo de almacenamiento en el búfer de salida
    ob_get_status — Obtener el estado de los búferes de salida
    ob_gzhandler — Función de llamada de retorno de ob_start para comprimir el búfer de salida con gzip
    ob_implicit_flush — Habilitar/deshabilitar el volcado implícito
    ob_list_handlers — Enumerar todos los gestores de salida en uso
    ob_start — Activa el almacenamiento en búfer de la salida
    output_add_rewrite_var — Añadir valores al mecanismo de reescritura de URLs
    output_reset_rewrite_vars — Restablecer los valores del mecanismo de reescritura de URLs

Sin embargo, hoy constituyen un pilar fundamental en mi ambiente de desarrollo, puesto que me permiten ejecutar código, y poder redirigir a alguna página en específico incluso después de haberse ejecutado la página completa. Por supuesto, también me permite insertar contenido Javascript en los headers después de haber ejecutado la página.

¿Pero cómo se ocupa? Para esto es este post. Antes de poder imprimir código, debo explicar para qué sirve: ob_* controlan un buffer, el cual se puede controlar. La gracia es que la salida puede ser demorada por lo que podemos hacer cualquier acción, ya sea redirigir a otra página o -a mi gusto la más importante- poder controlar las cabeceras en cualquier momento, ideal para una carga por partes de la aplicación, sin caer en cargar partes que ni siquiera ocuparemos.

Existen específicamente 4 funciones que yo diría son las más importantes:

    ob_start(): que le da comienzo al buffer

    ob_flush(): que permite limpiar el buffer imprimiendo toda la salida

    ob_get_contents(): que permite obtener los contenidos del buffer sin imprimir en pantalla

    ob_end_clean(): que permite desechar todo el buffer, sin imprimir en pantalla