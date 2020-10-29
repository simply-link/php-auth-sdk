SimplyLink Auth Server
====================


# Users API

SimplyLink allow clients to get access to users information and create new users. 
 
Users information required Access Token authorized by the user (owner) to access the information.
For more information about [Access Token](../oAuth/access-token.md) and [Authorization Code](../oAuth/authorization-code.md).


## Get authorized user information

> url: /api/user/me

> GET

> Headers: Authorization=Bearer xxxxxxxx
 
 Access Token must be valid for "auth.user"
 
 #### Response: 
 
 ```
 {
     "firstName": "xxxx",
     "lastName": ""xxxx",
     "email": "xxxxxxxx",
     "phone": "xxxxxxxx",
     "language": "xxxxx",
     "profilePic": "xxx"
 }
 ```
 
 


