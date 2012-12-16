Con estos scripts podrás agregar links de urls de blogs o diversos sitios para crear un feed RSS.
Recomiendo usarlo con twiterfeed y así sincronizar el contenido con tus cuentas de redes sociales.

1.- Requerimientos:

    - PHP 3.4 o superior con la extensión mysqli.
    - MySQL5.

2.- BD SCRIPT:

Corre la siguiente consulta en MySQL y tendrás lista la tabla.

--------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT 'Anónimo',
  `aggregate` datetime NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--------------------------------------------------------------

3.- Uso:

3.1.- El script add-article requiere del uso de dos argumentos que son enviantos mediante el arreglo $_GET:

$_GET['url']		Url del contenido (obligatorio).
$_GET['author']		Que representa la url del contenido. Este dato no es obligatorio, puede ser omitido.

Ejemplo:

http://una.direccion.com/add-article.php?url=www.google.com&author=HackerMaster

3.2.- El script feed.php generará el archivo xml con los datos necesarios para el feed RSS.

4.- ¿Qué falta?

Bueno, esto tiene licencia GPL, así que lo puedes usar y modificar. Si eres un mejor programador y puedes
optimizar el código, te agradecería que me hicieras llegar tus comentarios para una buena retroalimentación.