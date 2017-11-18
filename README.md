# faceOauth
# A Face Authentication System for Online Proctored Examination. 
This system will use webcam to detect the face of the subject, but unlike what is currently done in ProctorU, the user(the subject) WILL NOT be prompted to position his/her face squarely in a circle displayed on the screen. This approach is prone to falsification and deception because since it is a one-time authentication process, it is possible for the subject to merely position a previously taken picture (of the person being impersonated) in front of the camera, press the "snap" button and Hurray! 
Rather, the task is to develop a system that:
1. WILL NOT prompt the user to position his/her face in the circle/oval.
2. Will take random pictures (not just the face) of the subject in front of the screen, at random intervals.
3. Detect the 5 landmarks (2 eye centers, the nose tip, and 2 mouth corners) to detect the faces in those randomly taken pictures.
5. Use pattern recognition algorithm to authenticate the user.
6. Use deep learning approach to improve the recognition results.

# SCOPE AND LIMITATIONS
....

# TECHNOLOGIES 
javascript.
PHP.
MySQL.
boostrap
WebcamJS (https://pixlcore.com) - An opensource standalone JavaScript library for capturing still images from the computer's camera, and delivering them as JPEG or PNG Data URIs. 

# COMPATIBLE BROWSERS
As noted by Joseph Huckaby-the author of WebcamJS javascript, WebcamJS works with Firefox and Internet explorer. The newer versions of Google Chrome require HTTPS to use the webcam.  
1. Mac OS X	    Chrome 30+	    Works — Chrome 47+ requires HTTPS
2. Mac OS X	    Firefox 20+   	Works
3. Mac OS X	    Safari 6+	      Requires Adobe Flash Player
4. Windows	      Chrome 30+	    Works — Chrome 47+ requires HTTPS
5. Windows	      Firefox 20+	    Works
6. Windows	      IE 9	          Requires Adobe Flash Player
7. Windows	      IE 10	          Requires Adobe Flash Player
9. Windows	      IE 11	          Requires Adobe Flash Player
