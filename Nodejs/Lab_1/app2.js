var readline = require('readline');

var rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

function Sum(number) {
    // Insert code to do whatever with sum here.
    console.log('The sum is', number);
}

rl.question('Enter a number: ', function (x) {
    rl.question('Enter another number: ', function (y) {
        if(isNaN(x) || isNaN(y)){
            console.log("you must enter numbers");
        }
        else{
            var sum = parseFloat(x) + parseFloat(y);

            Sum(sum)
        }
        
        
        

        rl.close();
    });
});