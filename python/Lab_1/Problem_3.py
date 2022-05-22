s = "abcde"
if len(s)%2==0:
    #case 1
    s1 = s[:len(s)//2]
    s2 = s[len(s)//2:]
    print(s1,s2)
else:
    #case 2
    x=len(s)+1
    s3 = s[0:x//2]
    s4 = s[x//2:]
    print(s3,s4)
    print(s3[0]+s4[0]+" + "+s3[len(s3)-1]+s4[len(s4)-1])
print("---------------")



