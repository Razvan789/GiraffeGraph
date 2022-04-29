# Giraffe API  v0.1.0
The Current State of the GiraffeAPI only supports retrieving items from the database.

## First Steps

Before you can use the GiraffeAPI you must be an approved API user. You can request API access by emailing razvan@beldeanu.com. Once your access has been approved, you will be sent an API token to use with all of your requests.

> Never share your token with anyone, as incorrect use will cause the removal of your API privileges

## URL  to send request

The GiraffeAPI url is `https://beldeanu.com/src/GiraffeAPI.php` followed by specified GET variables. More information about GET variables can be found [here](https://www.semrush.com/blog/url-parameters/)

## 2 ways to use the API
### Search
By using search, API users will be able to search the GiraffeGraph Database based on Title, Name of poster, and gallery ID.

#### Search by Title
In order to search by title, the user must define the following GET variables:
>type = search
>
>searchType = Title
>
>searchTerm = * Word to search *
>
>authToken = * APIToken Here *

Example: 
	In order to search for any post with the word "trees" the url would look like:
	`https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&type=search&searchType=Title&searchTerm=trees`

#### Search by Name
In order to search by title, the user must define the following GET variables:
>type = search
>
>searchType = User
>
>searchTerm = * Name to Search *
>
>authToken = * APIToken Here *

Example: 
	In order to search for any posted by someone with the name "Anna" the url would look like:
	`https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&type=search&searchType=User&searchTerm=Anna`

#### Search by Gallery ID
In order to search by title, the user must define the following GET variables:
>type = search
>
>searchType = GID
>
>searchTerm = * ID to Search *
>
>authToken = * APIToken Here *

Example: 
	In order to search for any posted by someone with the name "Anna" the url would look like:
	`https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&type=search&searchType=User&searchTerm=Anna`
	
### Random
## How the token works

Each time a request is sent, your token must be sent as part of the request. This is done with the GET variable `authToken`.

## What gets Returned



