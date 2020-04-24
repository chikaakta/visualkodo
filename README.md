"# visualkodo" 

URL: https://visualkodo.permafrhost.fr

Visualkodo is an online platforme that alow you to create java without coding.
Just by cliking you will create your code, you do not need to know java but need to know what you want to create because our application only create the code for you it does not think for you.


FRONTEND
Realize in react -comming soon-

BACKEND
We use an api tu save the projects of the users so that they can use it latter, the API is realized in PHP connected to a mariaDB database on our server.
password is encrypted to protect your acount, so only you have access to it.


API documentation :
Method post

create an acount : /signup.php

```JSON
Request:
{
	"email" : "varchar",
	"username" : "varchar",
	"password" : "varchar",
	"lastname" : "varchar",
	"firstname" : "varchar",
	"gender" : "varchar"
}
Return:
{
	"MESSAGE": "USER CREATED SUCEFFULY" OR  "EMAIL ALREADY REGISTER",
	"STATUS": 200
}
```

sign in : /signin.php
```json
Request:
{
	"email" : "varchar",
	"password" : "varchar"
}

Return:
{
    "MESSAGE": [
        {
            "email": "test",
            "lastname": "test",
            "firstname": "test",
            "username": "test"
        }
    ],
    "STATUS": 200
}
==============================================
{
	"Message": "NO EMAIL FOUND",
    "STATUS": 404
}
```


delete User : /deluser.php
```json	
Request:
{
	"email" : "varchar",
	"password" : "varchar"
}

Return:
{
    "MESSAGE": "ACCOUNT AND PROJECTS REMOVED",
    "STATUS": 200
}
==============================================
{
    "MESSAGE": "NO EMAIL FOUND",
    "STATUS": 404
}
```

get all project from a user : /getproject.php
```json
Request:
{
	"email" : "varchar",
	"password" : "varchar"
}
	
Return:
{
    "MESSAGE": [
        {
            "title": "name de test",
            "public": "0"
        },
        {
            "title": "project2t",
            "public": "0"
        }
    ],
    "STATUS": 200
}	
==============================================
{
    "MESSAGE": "THIS USER HAVE NO PROJECT",
    "STATUS": 400
}
```

delete a user and all his projects : deluser.php
```json
Request:
{
	"email" : "varchar",
	"password" : "varchar"
}

Return:
{
    "MESSAGE": "ACCOUNT AND PROJECTS REMOVED",
    "STATUS": 200
}
	
==============================================
{
    "MESSAGE": "NO EMAIL FOUND",
    "STATUS": 404
}
```


get the code from a specefique project : /projectcode.php
```json
Request:
{
	"email" : "varchar",
	"password" : "varchar",
	"title" : "varchar"
}

Return:
{
    "MESSAGE": "PROJECT DO NOT EXIST",
    "STATUS": 404
}
==============================================
{
    "MESSAGE": "THIS PROJECT IS EMPTY",
    "STATUS": 401
}
==============================================
{
    "MESSAGE": [
        {
            "jsoncode": "{$jsoncode}"
        }
    ],
    "STATUS": 200
}
```

add the code to a specific project : /addcode.php
```json
Request:
{
	"email" : "varchar",
	"password" : "varchar",
	"title" : "varchar", //project title
	"codejson" : "varchar"
}

Return:
{
    "MESSAGE": "CODE UPDATED SUCESFULLY",
    "STATUS": 200
}
==============================================
{
    "MESSAGE": "CODE SAVED SUCESFULLY",
    "STATUS": 200
}
```
	

delete a project : /delproject.php
```json
Request:
{
	"email" : "test",
	"password" : "test",
	"title" : "name1"
}

Return:
{
    "MESSAGE": "CODE AND PROJECT REMOVED",
    "STATUS": 200
}
```