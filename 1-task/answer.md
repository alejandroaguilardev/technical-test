## 1-Explica la diferencia entre include y require en PHP.

### require 
Si el archivo especificado no se encuentra, se emite un error fatal  y detiene la ejecución del script.

### include

Si el archivo especificado no se encuentra, se emite una advertencia pero el script continuará ejecutándose.

### Include_once y Require_once

Cumple la misma función con la diferencia que impiden la carga de un mismo archivo varias veces.

###  Diferencias
Podemos concluir que podría usarse más el require cuando ese archivo o fichero sea parte crucial para el funcionamiento de la app, en  caso contrario podemos usar include. 
un caso de uso para include  ser usado en bucles o condicionales para incluir múltiples archivos de forma dinámica.