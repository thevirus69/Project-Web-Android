from gtts import gTTS
import os
mytext = "Wishing you a happy, healthy New Year"
language = 'en'
myobj = gTTS(text=mytext, lang=language, slow=False)
myobj.save("come.mp3")
os.system(" come.mp3")