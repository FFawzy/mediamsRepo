You need PHP, and Composer to install the dependencies.
The dependencies are defined in the composer.json file.

If you have the dependencies installed, you can run the script with the following command: php ustream_api.php

You need a Ustream account with API credentials, and you have to specify:
- your username
- your password
- your client id
- your client secret
- a video id
in certain points of the script. Look for capitalized texts between angle brackets, like <VIDEO ID>, that's what needs to be changed to actual user info.

You also need to specify the name of the video file you want to upload. The video has to be in the same folder as the script.