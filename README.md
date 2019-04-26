# MyRepo
Is a Kodi repository generator which allows to keep selected addons from various locations in a one place.

Sample repo: http://cloudrepo.5v.pl/

Also it allows to:
- Create users
- Add favourite  or remove unwanted raddons.
- Score and comment addons
- Report addons that voilate copyright licenses (needs developing further)

It runs in php environment.

License: GNU GENERAL PUBLIC LICENSE. Version 2, June 1991

Installation:
1. Place the files on the server and go to theserver address
2. Fill out all fields required and install
3. if your server is corrcetly configured the repository system should be ready to upload your own addons and allow other people to so.

Using MyRepo
1. Once installed the app will redirect to registration form.
2. Create user and login.
3. Go to home page and download repository file.
4. Extract files and add your custome "icon.png" and "fanart.jpg".
  - Make sure the extension of each file is correct.
5. Compress the file folder with all files

    (example)
    
    myrepo/addon.xml
    
    myrepo/fanart.jpg
    
    myrepo/icon.png
    
6. Upload compressed package using uploading page.
  -Make sure the .zip package doesn't contain the version name
  
    myrepo-0.5.1.zip <--is incorrect
    
    myrepo.zip <--is correct.
    
7. All addons uploaded to MyRepo must have a name of the zip file  exactly the same as an id in the addon.xml file

    <addon id="myrepo"

   
Using repo in Kodi
1. Download zip file from the homepage into your kodi device
2. Go to addons and install from zip file
3. Allow Kodi to install addons from unknown sources\
4. Install zip file

   (example)
   
   myaddon-0.5.1.zip
5. Go to "install from repository" and select MyRepo (or the name of the repo you selected durring installation)
6. Addons uploaded to the repo will be available on kodi after the repo is updated by kodi or by user.
 
 
 **Desn't support files bigger than 7MB. 
 In order to upload addons bigger than 7MB
 
1. Create zip file containing only addon.xml, icon.png and fanard.jpg
2. upload such package and then upload full package(over 7MB) via ftp.

