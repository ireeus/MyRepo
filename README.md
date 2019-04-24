# kodi-repo-generator
This is a piece of software which creates your own kodi repository management system. 
It allows to:
- Create users
- Add or remove your addons
- Score and comment addons
- Report addons that voilate copy right licenses (needs developing further)
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
7. All addons uploaded to the repo needs to have the name of the zip file as an id in the addon.xml file
    <addon id="myrepo"
