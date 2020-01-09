import os, re, glob
import cv2
import numpy as np
import shutil
from numpy import argmax
from keras.models import load_model
 
categories = ["red_bottom","black_bottom","jean_bottom","red_top","white_top","yellow_top"]
 
def Dataization(img_path):
    image_w = 28
    image_h = 28
    img = cv2.imread(img_path)
    img = cv2.resize(img, None, fx=image_w/img.shape[1], fy=image_h/img.shape[0])
    return (img/256)
 
src = []
name = []
test = []
image_dir = "/home/jui/BACKUP1/cnn_sample/ttt/"
for file in os.listdir(image_dir):
    if (file.find('.png') is not -1):      
        src.append(image_dir + file)
        name.append(file)
        test.append(Dataization(image_dir + file))
 
 
test = np.array(test)
model = load_model('gersang3.h5')
# predict = model.predict_classes(test)
predict = model.predict_classes(test)

print("출력")
print(test)
print(predict)

 
for i in range(len(test)):
    print(name[i] + " : , Predict : "+ str(categories[predict[i]]))

