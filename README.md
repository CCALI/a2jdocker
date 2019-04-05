# CALI A2JViewer + DAT + PHP Docker Development Environment project
This is an *experimental* demo of a guided interview that producest documents and does post processing using a Dockerized version of the A2J Viewer https://github.com/CCALI/a2jviewer/ + A2JDAT
https://github.com/CCALI/A2JDAT/ + php 7.2. This project dockerizes version 2.0.0 of the DAT.  It includes wkhtmltopdf, node 8.9.4, and the CALI DAT source.

NOTE: By downloading this application, you are agreeing to the terms included in the user license [LICENSE.md](https://github.com/CCALI/A2JDAT/blob/master/LICENSE.md).

## Requirements
Docker 18

### Built on
Built with docker 18.09 on Mac High Sierra.

## Running
1.) download this repo and navigate to that location in a terminal.

2.) Then run `docker-compose up --build`

3.) Open a web browser and navigate to `localhost:53080/a2j-viewer/viewer`

4.) select the `default` A2J Guided Interview (R)

## Configuration

### Guides
You can use the uploader demo tool at `/a2j-viewer/viewer/` to upload guides published from author or simply unzip the guide to `public_html/a2j-viewer/guides`

### Code
If run with the link generated with the upload tool the `demo-a2j-guided-interview` interview will use `public_html/a2j-viewer/viewer/answers.php` to process posted answers. Feel free to edit or change this code as you wish. Any php code in `public_html` and subdirectories is runnable.

To use different processing code, you can either change the setDataURL in viewer.html or launch with the `setDataURL` query parameter set to point to your code. An example of this looks like: `www.example.org/a2j-viewer/viewer/viewer.html?templateURL=../Guides/someguide&setDataURL=mysaveanswers.php`

A basic example for saving data is provided in `/a2j-viewer/viewer/SetData.php` and can be run by opening a browser going to `localhost:53080/a2j-viewer/viewer/viewer.html?templateURL=../guides/demo-a2j-guided-interview/Guide.xml&fileDataURL=../guides/demo-a2j-guided-interview/&setDataURL=./SetData.php`. Data will be stored in private_web as `data.xml`.

after running the above, can be loaded with the `getDataURL` query parameter:

`localhost:53080/a2j-viewer/viewer/viewer.html?templateURL=../guides/demo-a2j-guided-interview/Guide.xml&fileDataURL=../guides/demo-a2j-guided-interview/&setDataURL=./SetData.php&getDataURL=./GetData.php`

## More info

To find out more about A2J Viewer, A2J DAT, and A2J Author® please see our website, [www.a2jauthor.org](https://www.a2jauthor.org/)

For questions, contact Tobias Nteireho at tobias@cali.org
