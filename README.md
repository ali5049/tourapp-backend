

# API Documentation



## Authorization:

### Register:

```http
POST /api/register
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `first_name` | `string` | **Required**. User's first name |
| `last_name` | `string` | **Required**. User's last name |
| `email` | `string` | **Required**. User' email |
| `phone` | `string` | **Required**. User's phone|
| `password` | `string` | **Required**. password|
| `password_confirmation` | `string` | **Required**. password_confirmation|

#### Response

```javascript
{
  "token" : string,
}
```

### Login:

```http
POST /api/login
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `email` | `string` | **Required**. User' email |
| `password` | `string` | **Required**. Password|

#### Response

```javascript
{
    "token": string,
    "user": {
        "id": integer,
        "first_name": string,
        "last_name": string,
        "email": string,
        "phone": integer,
        "email_verified_at": date,
        "created_at": date,
        "updated_at": date"
    }
}
```

### User:

```http
GET /api/user
```

| Parameter | Type | Description |
| :--- | :--- | :--- |


#### Response

```javascript
{
    "user": {
        "id": integer,
        "first_name": string,
        "last_name": string,
        "email": string,
        "phone": integer,
        "email_verified_at": date,
        "created_at": date,
        "updated_at": date"
    }
}
```

## Posts

### Create Post:

```http
POST /api/posts
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `company` | `string` | **Required**. Company name |
| `title` | `string` | **Required**. Title of post|
| `body` | `Text` | **Required**. Description of post|
| `days` | `integer` | **Required**. Tour days|
| `price` | `integer` | **Required**. Tour cost|
| `departure` | `date` | **Required**. Departure date|
| `image` | `image file` | **Optional**. Image of post|
| `company_id` | `integer` | **Required**. Company Id for post|
#### Response

```javascript
{
            "id": 8,
            "company": "ABC",
            "title": "Just Title",
            "body": "Nothing described",
            "price": 2000,
            "days": 1,
            "departure": "2019-04-28",
            "image": "Birthday-messages-for-sister_1562325041.jpg",
            "user_id": 1,
            "created_at": "2019-07-05 11:10:41",
            "updated_at": "2019-07-05 11:10:41"
 }
```


### All Posts:

```http
GET /api/posts
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `none` | `none` | none |

#### Response

```javascript
{
    "current_page": 1,
    "data": [
        {
            "id": 8,
            "company": "ABC",
            "title": "Just Title",
            "body": "Nothing described",
            "price": 2000,
            "days": 1,
            "departure": "2019-04-28",
            "image": "Birthday-messages-for-sister_1562325041.jpg",
            "user_id": 1,
            "created_at": "2019-07-05 11:10:41",
            "updated_at": "2019-07-05 11:10:41",
            "user": {
                "id": 1,
                "first_name": "Ali",
                "last_name": "Haider",
                "email": "add@ddb.com",
                "phone": "03015049426",
                "email_verified_at": null,
                "created_at": "2019-07-05 11:09:21",
                "updated_at": "2019-07-05 11:09:21"
            }
        }
        ],
     "first_page_url": "http://127.0.0.1:8000/api/posts?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://127.0.0.1:8000/api/posts?page=1",
    "next_page_url": null,
    "path": "http://127.0.0.1:8000/api/posts",
    "per_page": 30,
    "prev_page_url": null,
    "to": 8,
    "total": 8
}
```

### One Post:

```http
GET /api/posts/{id}
```

| Parameter | Type | Description |
| :--- | :--- | :--- |


#### Response

```javascript
{
            "id": 8,
            "company": "ABC",
            "title": "Just Title",
            "body": "Nothing described",
            "price": 2000,
            "days": 1,
            "departure": "2019-04-28",
            "image": "Birthday-messages-for-sister_1562325041.jpg",
            "user_id": 1,
            "created_at": "2019-07-05 11:10:41",
            "updated_at": "2019-07-05 11:10:41",
            "user": {
                "id": 1,
                "first_name": "Ali",
                "last_name": "Haider",
                "email": "add@ddb.com",
                "phone": "03015049426",
                "email_verified_at": null,
                "created_at": "2019-07-05 11:09:21",
                "updated_at": "2019-07-05 11:09:21"
            }
        }
```
### Companies:

```http
GET,POST /api/companies
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `name` | `string` | **Required**. Company name |
| `phone` | `string` | **Required**. Company's phone |
| `email` | `string` | **Required**. Company's email |
| `address` | `string` | **Required**. Company's address |
| `logo` | `image` | **Optional**. Company's logo |



