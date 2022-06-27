# Tasks list

Este proyecto fue realizado utilizando laravel para el backend, y para el fontend se utilizo Blade junto con Jquery y JavaScript nativo.

## indicaciones 
Para su correcto funcionamiento se recomienda la instalacion de XAMPP o su correspondiente version para su sistema operativo.(No se alcanzó a implementar docker).
### pasos
3. renombrar `.env.example` por `.env`
4. ejecutar `composer install`
5. ejecutar `npm install`
6. añadir las credenciales de base de datos en  `.env`
7. ejecutar `php artisan migrate`
8. ejecutar `php artisan key:generate`
9. ejecutar `php artisan serve`
10. abrir `localhost:8080` o `localhost/{project-path}/public` en el navegador


# fase 2
Para este se realizó un algoritmo en javascript. Para validar su funcionamineto solo debe enviar lo requerido a la funcion `buscar()`:
```sh

const musicas=`{
	"musica1": ["brr", "fiu", "cric-cric", "brrah"],
	"musica2": ["pep", "birip", "trri-trri", "croac"],
	"musica3": ["bri-bri", "plop", "cric-cric", "brrah"]
}`


function buscar(text){

m=JSON.parse(musicas)
respuesta=[];
     var result = Object.keys(m).map((key) => m[key]);
     for(i=0;i<result.length;i++){
        var cancion=Object.values(result[i]);
       var x=cancion.indexOf(text);
       console.log(x)
       if(x>=0){
           respuesta=cancion.splice(x+1,cancion.length)
            return respuesta;
           }
     }
}
console.log(buscar("brr"));

```
Gracias por considerarme en su procedo de selección.
