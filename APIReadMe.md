# Giraffe API  v0.1.0
The Current State of the GiraffeAPI only supports retrieving items from the database. This API is based off of the Unsplash public API

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
	In order to search for any post with the GID of 13 the url would look like:
	`https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&type=search&searchType=GID&searchTerm=13`
	
### Random
Using Random, the API will return a specified amount of images from the database, if not specified the default value is 3. The specific GET variables for a random API call are as follows: 

>type = random
>
>numOf = * Ammount of random images *

Example:
	In order to get 5 random images from the database the following url would be needed:
	`https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&type=random&numOf=5`
	
## What gets Returned
The API will return a JSON that contains the following for each image:

> {
>
>GID: Gallery ID
>
>Image: Base64 encoding of Image
>
>Title: Image Title
>
>UID: ID of user that posted the image
>
>DateTime: A DateTime object for when the image was posted
>
>FirstName: Poster's FirstName
>
>LastName: Poster's Last Name
>
> }

## Debugging Tool
By adding the GET variable `view=1` and going to the website you can see the images that are returned rather than hard to read JSON. Using the search example to find anything posted by someone with the first name Anna and the debug tool active the URL will be as follows:

	`https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&type=search&searchType=User&searchTerm=Anna&view=1`




