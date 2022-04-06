var readline = require('readline');

var rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

rl.question('Enter your name : ', function (x) {
    rl.question('Enter year of birth: ', function (y) {
       if(isNaN(y)|| y>=2020){
           console.log("invalid year of birth")
       }
       else{
           console.log(`Hello ${x} your age now is ${2022-y} `)
       }
        
        

        rl.close();
    });
});
