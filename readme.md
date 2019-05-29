## Installation instructions

    git clone https://github.com/cbanupama/fidelitus.git
    cd fidelitus
    composer install

## Migration

create a database and then update .env file

    php artisan migrate

## Seeding data

    php artisan db:seed
## Serve application

    php artisan serve

## API

### categories api

All categories

 - [method ] GET
 - [url] http://localhost:8000/api/categories
 - [response-type] application/json 

response

    {
        "id": 2,
        "name": "Eldora Collins I",
        "created_at": "2019-05-29 06:06:29",
        "updated_at": "2019-05-29 06:06:29",
        "posts": [
          {
            "id": 7,
            "category_id": 2,
            "title": "molestiae pariatur molestiae quia",
            "body": "iusto est laudantium eveniet voluptates inventore qui odio suscipit dolor",
            "image": "https://lorempixel.com/640/480/?59764",
            "youtube_link": null,
            "created_at": "2019-05-29 06:06:29",
            "updated_at": "2019-05-29 06:06:29"
          }
        ]
    }

One category

 - [method ] GET
 - [url] http://localhost:8000/api/categories/1
 - [response-type] application/json

response

    {
      "id": 1,
      "name": "Dr. Forrest Vandervort",
      "created_at": "2019-05-29 06:06:29",
      "updated_at": "2019-05-29 06:06:29",
      "posts": [
        {
          "id": 1,
          "category_id": 1,
          "title": "placeat deserunt qui nisi",
          "body": "dolores dolorem et qui perferendis libero exercitationem voluptate non iusto",
          "image": "https://lorempixel.com/640/480/?75509",
          "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        },
        {
          "id": 4,
          "category_id": 1,
          "title": "dolor non quia ad",
          "body": "repudiandae ut ea nemo ea numquam natus reiciendis quia exercitationem",
          "image": "https://lorempixel.com/640/480/?43775",
          "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        },
        {
          "id": 8,
          "category_id": 1,
          "title": "error ipsum sit quod",
          "body": "ut ullam fugit inventore reprehenderit sunt quia porro praesentium assumenda",
          "image": "https://lorempixel.com/640/480/?19246",
          "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        }
      ]
    }

Update category

 - [method ] PUT
 - [url] http://localhost:8000/api/categories/1
 - [response-type] application/json

response

    {
          "id": 1,
          "name": "Dr. Forrest Vandervort updated",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
    }

Delete category

 - [method ] DELETE
 - [url] http://localhost:8000/api/categories/1
 - [response-type] application/json

response

    {
          "id": 1,
          "name": "Dr. Forrest Vandervort",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
    }

### posts api

All Posts

 - [method ] GET
 - [url] http://localhost:8000/api/posts
 - [response-type] application/json

response

    [
      {
        "id": 1,
        "category_id": 1,
        "title": "placeat deserunt qui nisi",
        "body": "dolores dolorem et qui perferendis libero exercitationem voluptate non iusto",
        "image": "https://lorempixel.com/640/480/?75509",
        "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
        "created_at": "2019-05-29 06:06:29",
        "updated_at": "2019-05-29 06:06:29",
        "content_type": "both image and youtube",
        "category": {
          "id": 1,
          "name": "Dr. Forrest Vandervort",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        }
      },
      {
        "id": 2,
        "category_id": 6,
        "title": "reiciendis cum adipisci itaque",
        "body": "maiores accusantium ratione tempora harum consequatur voluptas temporibus incidunt et",
        "image": "https://lorempixel.com/640/480/?82508",
        "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
        "created_at": "2019-05-29 06:06:29",
        "updated_at": "2019-05-29 06:06:29",
        "content_type": "both image and youtube",
        "category": {
          "id": 6,
          "name": "Dr. Joanne Borer",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        }
      }
    ]
    
filtering
 - [method ] GET
 - [url] http://localhost:8000/api/posts?category_id=1
 - [response-type] application/json

response

    [
      {
        "id": 1,
        "category_id": 1,
        "title": "placeat deserunt qui nisi",
        "body": "dolores dolorem et qui perferendis libero exercitationem voluptate non iusto",
        "image": "https://lorempixel.com/640/480/?75509",
        "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
        "created_at": "2019-05-29 06:06:29",
        "updated_at": "2019-05-29 06:06:29",
        "content_type": "both image and youtube",
        "category": {
          "id": 1,
          "name": "Dr. Forrest Vandervort",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        }
      },
      {
        "id": 4,
        "category_id": 1,
        "title": "dolor non quia ad",
        "body": "repudiandae ut ea nemo ea numquam natus reiciendis quia exercitationem",
        "image": "https://lorempixel.com/640/480/?43775",
        "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
        "created_at": "2019-05-29 06:06:29",
        "updated_at": "2019-05-29 06:06:29",
        "content_type": "both image and youtube",
        "category": {
          "id": 1,
          "name": "Dr. Forrest Vandervort",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29"
        }
      }
     ]
     
One Post

 - [method ] GET
 - [url] http://localhost:8000/api/posts/1
 - [response-type] application/json

response

    {
      "id": 1,
      "category_id": 1,
      "title": "placeat deserunt qui nisi",
      "body": "dolores dolorem et qui perferendis libero exercitationem voluptate non iusto",
      "image": "https://lorempixel.com/640/480/?75509",
      "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
      "created_at": "2019-05-29 06:06:29",
      "updated_at": "2019-05-29 06:06:29",
      "category": {
        "id": 1,
        "name": "Dr. Forrest Vandervort",
        "created_at": "2019-05-29 06:06:29",
        "updated_at": "2019-05-29 06:06:29"
      }
    }

Update Post

 - [method ] PUT
 - [url] http://localhost:8000/api/posts/1
 - [response-type] application/json

response

     {
          "id": 1,
          "category_id": 1,
          "title": "placeat deserunt qui nisi",
          "body": "dolores dolorem et qui perferendis libero exercitationem voluptate non iusto",
          "image": "https://lorempixel.com/640/480/?75509",
          "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
          "created_at": "2019-05-29 06:06:29",
          "updated_at": "2019-05-29 06:06:29",
       }

Delete Post

 - [method ] DELETE
 - [url] http://localhost:8000/api/posts/1
 - [response-type] application/json

response

     {
              "id": 1,
              "category_id": 1,
              "title": "placeat deserunt qui nisi",
              "body": "dolores dolorem et qui perferendis libero exercitationem voluptate non iusto",
              "image": "https://lorempixel.com/640/480/?75509",
              "youtube_link": "https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A",
              "created_at": "2019-05-29 06:06:29",
              "updated_at": "2019-05-29 06:06:29",
      }

