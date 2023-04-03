# Repositorio base
## Contexto
Originalmente era el repositorio string-calculator.
Dado que este es el repositorio a dia Lunes 6 Marzo de 2023 mas actualizado 
y con mas instalaciones necesarias este es el repositorio base a dia de hoy.

El repositorio base cuenta con las instalaciones necesarias para enfrentarse
a problemas futuros.

## ATENCION
- Este repositorio hay que actualizarlo conforme vayamos instalando más cosas
en algún otro. 

- Voy a dejar el código de StringCalculator.php y StringCalculatorTest.php como
ejemplo base.

- Los namespace se cambian en el archivo composer.json. Una vez cambiados hay
que ejecutar `composer dump-autoload` para regenerar las cosas del composer
con el nuevo namespace.

- Si el repositorio furula mal, bórralo y vuelve a clonarlo.

## Para instalar grumphp en un repositorio
- Copiar y pegar en la carpeta correspondiente el archivo grumphp.yml de
este repositorio.
- Entrar en el docker (docker exec -it ...)
- Ejecutar estos 3 comandos:
  - composer require --dev squizlabs/php_codesniffer
  - composer require --dev phpmd/phpmd
  - composer require --dev phpro/grumphp
