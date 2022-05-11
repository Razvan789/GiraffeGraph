# GiraffeState

## Disclaimer
Hello, this program is hosted on my own server as turning in parts of the code could have legal reprecutions if they were shared. This was worked this out with Dr. Mario, and if you need to see any of the code please e-mail rpb17245@uga.edu and I can screenshare any part of the code you'd like to see as well as answer any questions.

## On to the Important bits

In order to use the website please navigate to https://www.beldeanu.com/GiraffeGraph/src/login.php?page=1 or https://www.beldeanu.com/ as it will redirect you. Click the create a new account button and then you can start exploring the site. Once logged in make sure you click on one of the little giraffe faces and you will see the main use of the site.

### Entry point 
https://www.beldeanu.com/ (/src/login.php it will auto redirect you)

### How to start 
Create an account and login, once logged in click an animal face to start drawings and the rest should be self explanitory. The gallery page is used to see all drawings posted, and it has a working search bar.

### Browsers
Chrome for Windows 11/Windows 10/Andriod v.101.0.4951.44+<br>
Firefox for Windows 11 v100.0<br>
Safari for IPhone 13 IOS version 15.4.1

### Frameworks and libraries
Bootstrap v5.0, masonry for bootstrap

### Starter code 
There was no starter code used, all of the code you see was written by the group members.

### Lessons Learned
Over the course of this project one of the biggest lessons learned was how important planning is, as we didn't have the most concrete plan set for everything as early on we were unsure the full vision of the site. The lack of a plan caused us to have to make many changes to the documentation and database structure each time something had to be changed or we wanted to add a new feature.

Another Lesson we learned was how to effectively work locally without effecting the hosted site. In order to do this I changed the hosts file within system32 file folder and mapped the address beldeanu.com to local host, so when working locally I could still use the same beldeanu.com calls but they were interpreted as localhost. We figured this out after talking to a group member's dad who used this same trick to develop a few personal websites of his own.

### Problems encountered 
Big problems came with PHP and how to minimize security risks when sending information over post. The way this was fixed was by using jQuery and Ajax on the canvas page, and by binding values to the PDO object. The binding itself also rose a couple issues as sometimes it wouldn't populate with the proper fields but that was fixed by adding PDO::PARAM_ parameter to the bind value.