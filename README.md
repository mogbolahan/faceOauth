# CSCI_7900
Face Authentication System for Online Proctored Examination 
This system will use webcam to detect the face of the subject, but unlike what is currently done in ProctorU, the user(the subject) WILL NOT be prompted to position his/her face squarely in a circle displayed on the screen. This approach is prone to falsification and deception because since it is a one-time authentication process, it is possible for the subject to merely position a previously taken picture (of the person being impersonated) in front of the camera, press the "snap" button and Hurray! 
Rather, the task is to develop a system that:
1. WILL NOT prompt the user to position his/her face in the circle/oval.
2. Will take random pictures (not just the face) of the subject in front of the screen, at random intervals.
3. Detect the 5 landmarks (2 eye centers, the nose tip, and 2 mouth corners) to detect the faces in those randomly taken pictures.
5. Use pattern recognition algorithm to authenticate the user.
6. Use deep learning approach to improve the recognition results.
