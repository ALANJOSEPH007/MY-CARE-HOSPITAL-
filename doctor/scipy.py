from scipy import misc 
face=misc.face(gray=True)

from scipy import ndimage
shifted_face=ndimage.shift(face,(50,50))
shifted_face2 =ndimage.shift(face,(50,50),mode='nearest')
rotated_face=ndimage.rotate(face,30)
zoomed_face=ndimage.zoom(face,2)
zoomed_face.shape
print(shifted_face)
print(shifted_face2)
print(zoomed_face)
