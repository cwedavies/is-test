

Users
=====

Fetch All Users
--------------

Fetch the list of all users in the system. The results are paginated and
subsequent pages may be accessed with `page_number<integer>`.

```
GET /api/users

- OR -

GET /api/users?page={page_number}
```

### Response 200 (application/json)

```json
{
    "data": [
        {
            "id": 1,
            "username": "I_Admin",
            "email": "admin@test.com",
            ...
            "created_at": "2017-05-20 12:42:53",
            "updated_at": "2017-05-20 12:42:53"
        },
        {
            "id": 2,
            "username": "I_Publish",
            "email": "publisher@test.com",
            ...
            "created_at": "2017-05-20 13:05:53",
            "updated_at": "2017-05-22 15:08:53"
        },
        ...
    ],
    "links": {
        "first": "http://127.0.0.1/api/users?page=1",
        "last": "http://127.0.0.1/api/users?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://127.0.0.1/api/users",
        "per_page": 15,
        "to": 13,
        "total": 13
    }
}
```


Fetch Single User
-----------------

Fetch a specific user in the system. The user's `id<integer>` must be provided.

```
GET /api/users/{id}
```

### Response 200 (application/json)

```json
{
    "data": {
        "id": 1,
        "username": "I_Admin",
        "email": "admin@test.com",
        "role": {
            "id": 1,
            "label": "Admin"
        },
        "addresses": [
            {
                "id": 1,
                "address": "123 fake street",
                "province": "Ontario",
                "city": "Ottawa",
                "country": "Canada",
                "postal_code": "123 w4t"
            },
            {
                "id": 6,
                "address": "kk",
                "province": "Ontario",
                "city": "Ottawa",
                "country": "Canada",
                "postal_code": "A1A A1A"
            }
        ],
        "created_at": "2017-05-20 12:42:53",
        "updated_at": "2017-05-20 12:42:53"
    }
}
```

### Response 404 (application/json)

```json
{
    "message": "No query results for model [App\\User]"
}
```


Save New User
-------------

Save a new user to the system.

New users may be save with address data. Otherwise the user addresses may be
added/removed with the Address API.

```
POST /api/users

{
  username:      <string>
  email:         <string>
  user_roles_id: <integer>
  addresses:     <Address[]>
}
```

### Response 201 (application/json)

```json
{
    "data": {
        "id": 21,
        "username": "tim",
        "email": "tim@test.com",
        "role": {
            "id": 2,
            "label": "Publisher"
        },
        "addresses": [
            {
                "id": 8,
                "address": "224 Bank St",
                "province": "Ontario",
                "city": "Ottawa",
                "country": "Canada",
                "postal_code": "A1A 1A1"
            }
        ],
        "created_at": "2018-05-18 14:50:14",
        "updated_at": "2018-05-18 14:50:14"
    }
}
```

### Response 422 (application/json)

Data validation errors will return a `422` response with the detailed error
messages.

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "username": [
            "The username field is required."
        ],
        "email": [
            "The email has already been taken."
        ]
    }
}
```

Update Existing User
--------------------

Update the details of an existing user.

The user instance must be specified with `id <integer>`. If some of the attributes are excluded in the request, only the ones included will be updated.

```
PUT /api/users/{id}

{
    username:      <optional string>
    email:         <optional string>
    user_roles_id: <optional integer>

}
```

### Response 200 (application/json)

```json
{
    "data": {
        "id": 1,
        "username": "george",
        "email": "george@test.com",
        "role": {
            "id": 1,
            "label": "Admin"
        },
        ...
        "created_at": "2017-05-20 12:42:53",
        "updated_at": "2017-05-20 12:42:53"
    }
}
```


### Response 404 (application/json)

```json
{
    "message": "No query results for model [App\\User]"
}
```

Delete User
-----------

Permanently delete a user from the system. The user instance must be specified
with `id <integer>`.

```
DELETE /api/users/{id}
```

### Response 204 (application/json)

No data is returned when a user is successfully deleted.

```json
// empty response
```

### Response 404 (application/json)

```json
{
    "message": "No query results for model [App\\User]"
}
```

User Roles
==========

Fetch All Roles
---------------

```
GET /api/userroles
```

### Response 200 (application/json)

```json
{
    "data": [
        {
            "id": 1,
            "label": "Admin"
        },
        {
            "id": 2,
            "label": "Publisher"
        },
        {
            "id": 3,
            "label": "Public User"
        }
    ],
    "links": {
        "first": "http://127.0.0.1/api/userroles?page=1",
        "last": "http://127.0.0.1/api/userroles?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://127.0.0.1/api/userroles",
        "per_page": 15,
        "to": 3,
        "total": 3
    }
}
```
