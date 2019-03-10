# Instagram Access Token
A server-side generator for instagram access token. It can be used locally too.

## History
Instagram public endpoints do not work anymore. Check [this](https://stackoverflow.com/questions/17373886/how-can-i-get-a-users-media-from-instagram-without-authenticating-as-a-user) stackoverflow question. [Instagram api]((https://www.instagram.com/developer) ) should be used instead.
In order to work with instagram api authentication is needed. After authentication an access token is generated and for every [api endpoint](https://www.instagram.com/developer/endpoints/), this token must be sent too.
For example if you want to get your latest instagram posts use this endpoint: 
`https://api.instagram.com/v1/users/self/media/recent/?access_token=`

## Requirements
To get access token, three values must be set correctly:
- client id
- client secret
- valid redirect uri

First a new client should be registered at [here](https://www.instagram.com/developer/clients).
When registering a new client, `Valid redirect URIs` must be set. This must be the path to `action.php` file which is set in `config.php`.
For example if hosting locally:
`$baseUrl =  'http://localhost/path/to/folder/`
Or if remotely:
`$baseUrl =  'http://example.com/path/to/folder/';`
After setting all required fields click register and a new client is created.
Get client id and secret by clicking on new created client `manage` button.


## Generate Token
Now that `Valid redirect URI` is set correctly and you have your `client id` and `client secret` visit home page, either locally and remotely and enter needed information in form fields.
If everything has gone well your instagram access token is generated.
You can then use it to display your latest instagram posts or any other endpoints that you like.

## Notes
- Remember  not to use token on client side. Instagram access token must be secured and used on server