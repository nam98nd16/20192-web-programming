import cv2
import numpy as np
im = cv2.imread("AMOLEDtest.png")
print(np.where(im == 0))