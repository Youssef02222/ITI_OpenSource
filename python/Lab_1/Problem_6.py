ini_string = input("enter the string ")
c = input("enter the character ")
print ("initial_string : ", ini_string, "\ncharacter_to_find : ", c)
res = None
x=[]
for i in range(0, len(ini_string)):
	if ini_string[i] == c:
		res = i + 1
		x.append(res)	
if res == None:
	print ("No such character available in string")
else:
	print ("Character is present at :")
print(x)