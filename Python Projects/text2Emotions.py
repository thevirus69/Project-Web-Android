'''
Discover the Emotions in text message: Happy,Angry,Surprise,Sad,Fear

> First install the package,
    !pip install text2emotion
    
> How to use:
    text = input("Enter the text/emojis : ")
    print(te.get_emotion(text))
    
'''


import text2emotion as te
from matplotlib import pyplot as plt


data = list()
text = "I was asked to sign a third party contract a week out from stay. If it wasn't an 8 person group that took a lot of wrangling I would have cancelled the booking straight away. Bathrooms - there are no stand alone bathrooms. Please consider this - you have to clear out the main bedroom to use that bathroom. Other option is you walk through a different bedroom to get to its en-suite. Signs all over the apartment - there are signs everywhere - some helpful - some telling you rules. Perhaps some people like this but It negatively affected our enjoyment of the accommodation. Stairs - lots of them - some had slightly bending wood which caused a minor injury."

res = te.get_emotion(text)
for i,j in res.items():
  data.append(j)

print(res)
print()
emotions = ['Happy', 'Angry', 'Surprise', 'Sad', 'Fear']

fig = plt.figure(figsize=(15,7))

plt.pie(data, labels=emotions)

plt.show()
