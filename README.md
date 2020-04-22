"# visualkodo" 

URL: https://visualkodo.permafrhost.fr

Visualkodo is an online platforme that alow you to create java without coding.
Just by cliking you will create your code, you do not need to know java but need to know what you want to create because our application only create the code for you it does not think for you.


FRONTEND
Realize in react -comming soon-

BACKEND
We use an api tu save the projects of the users so that they can use it latter, the API is realized in PHP connected to a mariaDB database on our server.



API documentation :

API url : https://visualkodo.permafrhost.fr

Method post

sign up : /signup.php

	Request:
	-email
	-username
	-password
	-firstname
	-lastname
	-gender
	
	Return:
	"USER CREATED SUCEFFULY"
	"EMAIL ALREADY REGISTER"


sign in : /signin.php

	Request:
	-email
	-password

	Return:
	email, username, lastname, firstname From the user
	"NO EMAIL FOUND OR WRONG PASSWORD"


delete User : /deluser.php
	
	Request:
	-email
	-password

	Return:
	"ACCOUNT AND PROJECTS REMOVED"
	"USER DO NOT EXIST"
	"WRONG PASSWORD"


get all project from a user : /getproject.php

	Request:
	-email
	-password
	
	Return:
	table of array, each array is compose by "title" and "public"
	"THIS USER HAVE NO PROJECT"


delete a user and all his projects : deluser.php

	Request:
	-email
	-password

	Return:
	"ACCOUNT AND PROJECTS REMOVED"
	"NO EMAIL FOUND"
	"WRONG PASSWORD"


get the code from a specefique project : /projectcode.php

	Request:
	-email
	-password
	-title

	Return:
	"PROJECT DO NOT EXIST"
	"THIS PROJECT IS EMPTY"
	"THE JSON"

add the code to a specific project : /addcode.php

	Request:
	-email
	-password
	-title
	-codejson

	Return:
	"CODE UPDATED SUCESFULLY"
	"CODE SAVED SUCESFULLY"
	"QUERRY ERROR" (mostly when you use a title project that do not exist)
	

delete a project : /delproject.php

	Request:
	-email
	-password	
	-title

	Return:
	"CODE AND PROJECT REMOVED"
