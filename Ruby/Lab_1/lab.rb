def prob1(text,n)
    puts text*n
end 

def prob2(text)
    if text.start_with?("if") 
        puts "true"
    else 
        puts "false"
    end
end

def prob3(text)
    print text[-1] << text[1...-1]  << text [0]
end 

def prob4(text)
    last_ch= text.length() -1 
    # print text.split('')[last_ch]
    print  text.split('')[last_ch] + text + text.split('')[last_ch];
end     

def prob6(nums)
   print rotated = nums[1], nums[2], nums[0];
end

def bouns1(nums,target)
    for i in 0..nums.length() -1
        j=i+1
        for j in j..nums.length() -1 
            if nums[j]==target - nums[i] 
                puts i,j 
            end
        end
    end
end


def prob7(nums)
    sum = 0
    i = 0
    while i < nums.length
            if(nums[i] == 17)
             i= i + 1
         else
                sum = sum + nums[i]
         end
         i += 1
     end
        return sum
 end
