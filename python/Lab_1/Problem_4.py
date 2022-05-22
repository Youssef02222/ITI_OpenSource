import sys
from collections import Counter
f = open(sys.argv[len(sys.argv)-1],"r")
text = f.read()
f.close()
words = Counter(text.split()).most_common(20)
words = [x[0] for x in words ]
f = open("popular_words.txt", "w")
f.write("\n". join(words))
f.close()
