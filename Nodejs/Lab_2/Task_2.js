const readline = require('readline');
const fileSys = require('fs');



const file = readline.createInterface({
    input: fileSys.createReadStream('MainFile.txt'),
    output: process.stdout,
    
});

file.on('line', (line) => {
    console.log(line);
});



fileSys.rename('test.txt', 'info.txt', () => {
   
    console.log("file is renamed successfilly");

});


// remove file
try {
    fileSys.unlinkSync("./FileToRemove")
    console.log('file \nDone (Removed)\n');
} catch (err) {
    console.error(err)
}
   


//  Read as sync
var fileData = fileSys.readFileSync('./data.json', 'utf8');
console.log("this is the data i read as sync "+JSON.parse(fileData));


// Read as async
var readfile = fileSys.createReadStream('./data.json', { encoding: 'utf-8', highWaterMark: 32 * 1024 })
readfile.on('data', function(chunk) {
    console.log("this is the data i read as asyn "+JSON.parse(chunk))
})


// write on file
fileSys.writeFileSync('./info.txt', "Learn how to write on file with nodejs");


// create the directory (Bonus)
fileSys.access('./FirstDir', (error) => {
        fileSys.mkdir('./FirstDir', (error) => {
          

        });
    
});
