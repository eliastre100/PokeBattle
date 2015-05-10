[Back to Menu](../../README.md)

# List of URLs use by client to contact server

## Server login

|Path					|Action					|Description			|
|---------------------------------------|---------------------------------------|-------------------------------|
|/register/{name}/{password}/{email}	|Eliastre100PokeBattle:Login:register	|Register an user		|
|/login/{name}/{password}		|Eliastre100PokeBattle:Login:login	|Log an user and return a token	|

## Server search

|Path			|Action			|Description					|
|-----------------------|-----------------------|-----------------------------------------------|
|/{token}/browse	|			|List party					|
|/{token}/host		|			|Create a party					|
|/{token}/join/{id}	|			|Join party					|
|/{token}/leave/{id}	|			|Leave party					|
|/{token}/check/{id}	|			|Check state party and return a new token	|

### Linked pages

*   [Server installation](Install_Server.md)
