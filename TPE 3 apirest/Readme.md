Descripción de los Endpoints de la API de Vehículos
A continuación, se describen los diferentes endpoints de la API de vehículos, cómo se usan, y ejemplos de solicitudes y respuestas para cada uno. Estos endpoints están diseñados para permitir la gestión de vehículos en un sistema.

1. GET api/vehiculos - Obtener todos los vehículos
Descripción:
Este endpoint permite obtener una lista de todos los vehículos disponibles en el sistema. Se pueden aplicar filtros como marca, modelo, año, precio, y tipo, así como establecer un orden y la paginación de los resultados.

Uso:
Realiza una solicitud GET al endpoint api/vehiculos. Puedes pasar parámetros de consulta (query params) para ordenar, filtrar y paginar los resultados.

Parámetros (opcionales):

orderBy: Campo por el cual ordenar los vehículos (ej. marca, precio, año).
orderDirection: Dirección de ordenación (asc o desc).
filter_marca: Filtra por marca (ej. Toyota).
filter_modelo: Filtra por modelo (ej. Corolla).
filter_año: Filtra por año (ej. 2019).
filter_precio: Filtra por precio (ej. 30000).
filter_tipo: Filtra por tipo (ej. SUV).
page: Número de página (para paginación).
limit: Número máximo de resultados por página.
Ejemplo de solicitud:

http
GET /api/vehiculos?orderBy=marca&orderDirection=asc&filter_tipo=SUV&page=1&limit=10

Respuesta (ejemplo):

json

[
    {
        "id": 1,
        "marca": "Volkswagen",
        "modelo": "Vento",
        "año": 2014,
        "precio": 15000,
        "tipo": "Auto"
    },
    {
        "id": 2,
        "marca": "Toyota",
        "modelo": "Hilux",
        "año": 2015,
        "precio": 22000,
        "tipo": "Camioneta"
    }
]

2. GET api/vehiculos/:id - Obtener un vehículo por su ID
Descripción:
Este endpoint permite obtener los detalles de un vehículo específico, dado su ID único.

Uso:
Realiza una solicitud GET al endpoint api/vehiculos/{id}, reemplazando {id} por el identificador del vehículo.

Ejemplo de solicitud:

http

GET /api/vehiculos/1
Respuesta (ejemplo):

json

 {
        "id": 1,
        "marca": "Volkswagen",
        "modelo": "Vento",
        "año": 2014,
        "precio": 15000,
        "tipo": "Auto"
    }


3. GET api/vehiculos/tipo/:tipo - Obtener vehículos por tipo
Descripción:
Este endpoint permite obtener una lista de vehículos que coincidan con un tipo específico (por ejemplo, Suv, Auto, etc.).

Uso:
Realiza una solicitud GET al endpoint api/vehiculos/tipo/{tipo}, donde {tipo} es el tipo de vehículo que deseas consultar.

Ejemplo de solicitud:

http

GET /api/vehiculos/tipo/Auto
Respuesta (ejemplo):

json

[
     {
        "id": 1,
        "marca": "Volkswagen",
        "modelo": "Vento",
        "año": 2014,
        "precio": 15000,
        "tipo": "Auto"
    },
    {
        "id": 3,
        "marca": "Audi",
        "modelo": "S3",
        "año": 2009,
        "precio": 20000,
        "tipo": "Auto"
    }
]


4. POST api/vehiculos - Agregar un nuevo vehículo
Descripción:
Este endpoint permite agregar un nuevo vehículo al sistema. Los datos del vehículo deben ser proporcionados en el cuerpo de la solicitud.

Uso:
Realiza una solicitud POST al endpoint api/vehiculos, enviando los datos del vehículo en el cuerpo de la solicitud (en formato JSON).

Parámetros en el cuerpo de la solicitud (ejemplo):

json

{
    "marca": "Toyota",
    "modelo": "Corolla",
    "año": 2022,
    "precio": 22000,
    "tipo": "Auto"
}
Ejemplo de solicitud:

http
POST /api/vehiculos
Content-Type: application/json

{
    "marca": "Toyota",
    "modelo": "Corolla",
    "año": 2022,
    "precio": 22000,
    "tipo": "Auto"
}
Respuesta (ejemplo):

json

{
    "id": 4,
    "marca": "Toyota",
    "modelo": "Corolla",
    "año": 2022,
    "precio": 22000,
    "tipo": "Auto"
}


5. PUT api/vehiculos/:id - Actualizar un vehículo
Descripción:
Este endpoint permite actualizar los detalles de un vehículo existente, dado su ID. Los datos a actualizar deben ser enviados en el cuerpo de la solicitud.

Uso:
Realiza una solicitud PUT al endpoint api/vehiculos/{id}, donde {id} es el identificador del vehículo que deseas actualizar. Los datos actualizados deben enviarse en el cuerpo de la solicitud.

Ejemplo de solicitud:

http

PUT /api/vehiculos/4
Content-Type: application/json

{
    "marca": "Toyota",
    "modelo": "Corolla",
    "año": 2023,
    "precio": 24000,
    "tipo": "Auto"
}
Respuesta (ejemplo):

json

{
    "id": 4,
    "marca": "Toyota",
    "modelo": "Corolla",
    "año": 2023,
    "precio": 24000,
    "tipo": "Auto"
}


6. DELETE api/vehiculos/:id - Eliminar un vehículo
Descripción:
Este endpoint permite eliminar un vehículo del sistema dado su ID.

Uso:
Realiza una solicitud DELETE al endpoint api/vehiculos/{id}, donde {id} es el identificador del vehículo que deseas eliminar.

Ejemplo de solicitud:

http

DELETE /api/vehiculos/1
Respuesta (ejemplo):

json

{
    "message": "Vehículo eliminado exitosamente"
}
Cómo consumir la API:
Obtener todos los vehículos:
Realiza una solicitud GET a /api/vehiculos. Podés agregar parámetros opcionales para filtrar, ordenar y paginar los resultados.

Obtener un vehículo por ID:
Realiza una solicitud GET a /api/vehiculos/{id}, donde {id} es el identificador del vehículo que deseás consultar.

Obtener vehículos por tipo:
Realiza una solicitud GET a /api/vehiculos/tipo/{tipo}, donde {tipo} es el tipo de vehículo (por ejemplo, Suv).

Agregar un vehículo:
Realiza una solicitud POST a /api/vehiculos con los datos del vehículo en el cuerpo de la solicitud (en formato JSON).

Actualizar un vehículo:
Realiza una solicitud PUT a /api/vehiculos/{id} con los datos actualizados del vehículo en el cuerpo de la solicitud.

Eliminar un vehículo:
Realiza una solicitud DELETE a /api/vehiculos/{id} para eliminar el vehículo con el identificador especificado.

Consideraciones adicionales:
Autenticación: Necesitás estar logueado antes de acceder a todos ellos. Asegurate de estar logueado.

Respuestas: Los endpoints devuelven datos en formato JSON, y en caso de error, se devuelve un mensaje junto con el código de estado HTTP correspondiente (ej. 404 para no encontrado, 400 para solicitud incorrecta, 200 para éxito).

Los integrantes de éste grupo, somos:
PRESA, Simón
GARCIA DUPLEIX, Horacio Urbano