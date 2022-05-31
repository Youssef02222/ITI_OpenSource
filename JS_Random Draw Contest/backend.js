// Dynamic Code 

const x = 10000

function audioLoading(){
    var aud = new Audio();
    aud.src = 'loading.mp3';
    aud.play();
}

var all_winners = document.querySelector('.container .all-winners');
var winners_order = ["الفائز الأول","الفائز الثانى","الفائز الثالث","الفائز الرابع","الفائز الخامس","الفائز السادس","الفائز السابع","الفائز الثامن","الفائز التاسع","الفائز العاشر"];
var es7ab = document.querySelector('.participants-random .button-choice button');

for ( var i = 0 ; i < winners_order.length; i++ ){
    var winners_table = document.querySelector('.container .all-winners table');
    var tr = document.createElement('tr');
    var td = document.createElement('td');
    var winner_td  = document.createElement('td');
    td.innerHTML = winners_order[i];
    tr.appendChild(td);
    tr.appendChild(winner_td);
    winners_table.appendChild(tr);


}   

// عدد الفائزين
var num_of_winners = parseInt(10)

var Participants = ['جهاد حسن سعد الزهراني','محمد احمد تهامي الزهراني','علاء سعد معاذ الهوساوي','صالح مصلح حامد الزهراني','عماد عبدالرحيم حميد اللقماني','عبدالمجيد بن علي ابراهيم الشمراني','عبدالله علي إبراهيم الشمراني','فهد سليمان محمد العائل','عبدالرحمن محمد عبدالله الغامدي','ليلى محمد صالح الشقحاء','طلال عبدالمؤمن عبدالقاهر المكي','خالد بن عبدالله محمد الاسمري','روز محمد يوسف الغامدي','غلا خالد يحيى مباركي','خالد يحيى يحيى مباركي','باسل بن فارس احمد الزهراني','فارس بن احمد شتران الزهراني','عبدالمحسن علي عبدالمحسن المطيري','سلاف بندر محمد السلمي','ترف بندر السلمي','إيلاف مصلح صالح الذبياني','رسيل مصلح صالح الذبياني','منيع الله بن ضيف الله بن عالي المطيري','أحمد بن سعدي الزهراني','شوق عبدالحميد جنبي','ريما بندر الحارثي','روان صالح مصلح الزهراني','حنان دخيل الله حميد الجهني','صفية زكي محمد الظاهري','شهد علي عبدالرحمن الشهري','وتين علي عبدالرحمن الشهري','هديل خالد محمد اللحياني','فهد حامد محمد الصاعدي','عبدالله مصلح صالح المالكي','أمين عبدالرحمن عبدالرزاق زغبي','شريفة مساعد مصلح المالكي','عبدالله سعد علي الشهراني','ورده هديان محمد الحارثي','خالد عبدالله سعد الخثعمي','نورة علي محمد الخثعمي','فيصل بن ثابت بن ضيف الله السلمي','محمد عقيل محمد الزهراني','وعد خالد الغامدي','سعيد محمد سعيد العمري','سلوى حسين سعيد الغامدي','حصه رحيم منور الحربي','مشاري عوض محمد العبيدي','زهران حسين سعد الزهراني','رزان عمر عبدالعزيز الكرعلي','ليليا ماجد حميد الحبيشي','نايف بن محمد سعيد الزهراني','بدر سلطان مبارك العنزي','وهيب محمد سالم الحجاجي','دانه خالد دخيل الله الجهني','ميلاف خلف مطر المطيري','خلف مطر عالي المطيري','شذى بنت عبدالله بن ناصر الظاهري','سعد نواف غويزي الردادي','ريم محمد عبدالله الزهراني','عزام عادل عالي الساعدي','عادل عالي علي الساعدي','عبدالله محمد عبدالله الزهراني','احمد عيد صالح الحربي','احمد عقيلي عبدالرحمن الشيخي','فائق محمد الاكلبي البيشي','جواهر خالد منيع الله المطيري','هنادي حمزه ماجد حكيم','ايناس خضر محمد الغامدي','أسماء بنت احمد رده المالكي','سيف علي عالي المالكي','أحمد علي عبدالمحسن المطيري','يوسف حبيب الله هندي السلمي','عبده مهدي سويد الدلح','شوق فهم سالم السلمي','فيصل ذياب بخت السلمي','رايد حمدان سليمان المرواني','ريان حمدان سليمان المرواني','فاطمه احمد حسين فلاته','أحمد طواشي علي العمري','نادر بندر الحارثي','حسن سعد حسن الزهراني','لولوه محمد صالح الشقحاء','سعد معاذ صالح الهوساوي','رازن محمد فراج الحازمي','محمد فراج عيد الحازمي','محمد عبدالله عائض الشمراني','جسار خالد دخيل الله الجهني','لمى محمد علي الظاهري','ليان محمد علي الظاهري','اسامة علي عثمان الشمراني','نوف خالد محمد المالكي','رامي خالد احمد الغامدي','معيض عبدالله معيض القرني','عزيزه حامد خبزان الغامدي','علي بن محمد بن عبدالرحمن الغامدي','احمد دخيل دخيل الله السلمي','فهد محمد سالم آل فرحه','محمد سالم محمد آل فرحه','يوسف راجح تركي الاكلبي','سلوى محمد منيس الاكلبي','عبدالعزيز دخيل حضاض السلمي','طارق طلال عبدالله النزاوي','خالد احمد سعد الغامدي','عبدالعزيز سليمان مشعان الحربي','تهاني سعد عبدالعزيز عاتق','فاطمه حسن علي الفيفي','وليد قاسم جابر الفيفي','عمر هزاع عبدالله السهيمي','هزاع عبدالله مخاسر السهيمي','فيصل بن عبدالعزيز عطية الخزاعي','عبدالعزيز بن عطية عبدالعزيز الخزاعي','طلال عبدالرحمن عبدالعزيز لشمراني','يارا عبدالعزيز سليمان الحربي','انور نايف حويمد الخضيري','نايف حويمد حميدان الخضيري','البراء احمد حامد الصاعدي','احمد حامد محمد الصاعدي','ريم ناصر صالح العصلاني','مشعل ناصر صالح العصلاني','سامي جابر سهلان الكثيري','أنس بن زكي بن محمد صالح الظاهري','اريج ابراهيم الغامدي','زينب سليمان مشعان الحربي','عبدالمحسن سليمان مشعان الحربي','طيف منصور سليمان المرواني','منصور سليمان حامد المرواني','زهره مريع سعيد ال ناصر','سعيد بن دغش سعيد القحطاني','بدر عابد عبدالله الجدعاني','رهف صالح سعيد السهيمي','عبدالمجيد منيور طائل المطيري','فراس علي محمد عداوي','قصي امين عبدالرحمن زغبي','إياد منصور أحمد السلمي','منصور أحمد محمد السلمي','إبتسام محمد عيسى غزاوي','شهد صالح الردادي','عاصم صالح سعيد السهيمي','ابراهيم محمد ابراهيم السلامي','جابر عبدالله جابر الزبيدي','عامر عبدالله سيف الشهراني','عبدالله منيع الله ضيف الله المطيري','شهد عبدالله محمد الزهراني','سعد عوض محمد العبيدي','ريان عويض هميجان المطيري','العنود عويض هميجان المطيري',' بتال محمد علي الزبيدي','نواف عماد حمادي الاحمدي','مرام ابراهيم ردة الله الصاعدي','نعيم احمد رازن الصاعدي','مريم احمد مهدي القادري'];

var participants_names = document.querySelector('.participants-random .participants-names');

var counter = document.querySelector('.participants-random .counter');
var random_winners;
var timer ;
var curr = 0;
function allParticipantsArr_random(){
    curr = Math.floor(Math.random() * Participants.length);
    for ( var i = curr; i < Participants.length; i++ ){
        participants_names.textContent = Participants[curr];  
    }
}

counter.style.display = 'none';

var timeCounter = num_of_winners * 50;
counter.innerHTML = timeCounter ;

function time_Counter(){
    timeCounter = timeCounter - 1;
    var realTime = num_of_winners * 50;
    var value_add = 50;
    counter.innerHTML = timeCounter ;

    if ( counter.innerHTML < 0 ){ counter.innerHTML = 0 }

    //For es7ab disabled ...

    for ( var i = 0; i < realTime; i+= value_add){ // Dynamic loop According To Counter ..
        if ( counter.innerHTML < (realTime - i) && counter.innerHTML >= (realTime - (i + value_add)) ){
            es7ab.disabled = true;
            //es7ab.style.cursor = 'not-allowed' ;
            
             
        }

        if ( counter.innerHTML == (realTime - (i + value_add)) ){
            clearInterval(random_winners);
            clearInterval(timer);
            Participants.splice(Participants.indexOf(participants_names.innerHTML) , 1);
            document.querySelector('.all-winners table tr:nth-child('+(i + value_add)/(value_add)+') td:nth-of-type(2)').textContent = participants_names.innerHTML ;
            document.querySelector('.all-winners table tr:nth-child('+(i + value_add)/(value_add)+') td:nth-of-type(2)').style.backgroundColor = 'radial-gradient(rgb(176, 167, 38), rgb(113, 108, 24))';
            // document.querySelector('.all-winners table tr:nth-child('+(i + value_add)/(value_add)+') td:nth-of-type(2)').style.color = '#efe00e';
            participants_names.style.boxShadow = '2px 3px 0px #e7ea27';
            participants_names.style.color = '#efe00e';
            participants_names.style.border = '1px solid #efe00e';
            var audio = new Audio();
            audio.src = "winner.mp3"; 
            audio.play();
            es7ab.disabled = false;
            setTimeout ( function(){
                es7ab.click();
            } , 9000000);

            
    
        }
       // counter.innerHTML = 0;
      //  break;

    }



}

//await sleep(1000);
//
var c1=0;


es7ab.onclick = function(){


    if (( counter.innerHTML == 0 )){
      //
        clearInterval(random_winners);
        clearInterval(timer);
        es7ab.disabled = false;
        this.setAttribute('title' , 'انتهى السحب');
        this.innerHTML = 'انتهى السحب';
        if (c1==10){
            es7ab.style.cursor = 'not-allowed' ;
            es7ab.disabled = true;
        }
        counter.innerHTML = timeCounter-50 ;
    }else{
        random_winners =  setInterval ( allParticipantsArr_random , 10 );
        timer          =  setInterval ( time_Counter , 10 );
        participants_names.style.boxShadow = '2px 3px 0px #14a1c1';
        participants_names.style.border = '1px solid #14a1c1';
        participants_names.style.color = '#14a1c1';
        var audio = new Audio();
        audio.src = "button-click.mp3";
        audio.play();
        c1++;
        if (c1==10){
            //counter.innerHTML == 0;
            es7ab.disabled = true;
        }


    }  

}



// Code of pdf
    var tabl = document.querySelector('.container .all-winners table');
    var shape_shown = document.querySelector('div.shape-shown');
    var come_back = document.querySelector('#come-back');

    document.querySelector('#come-back').onclick = function(){
        shape_shown.classList.remove('shapy');
        tabl.style.cssText = "";
        this.style.display = 'none';
        for ( var i = 1; i <= num_of_winners; i++ ){
            document.querySelector('.container .all-winners table tr:nth-child(' +i + ') td:nth-child(1)').style.cssText = "";
            document.querySelector('.container .all-winners table tr:nth-child(' +i + ') td:nth-child(2)').style.cssText = "";
        }

     }
               document.querySelector('#table-print').onclick = function(){
                for ( var i = 1; i <= num_of_winners; i++ ){
                    document.querySelector('.container .all-winners table tr:nth-child(' +i + ') td:nth-child(1)').style.cssText = "color:#000; border:1px solid #000;";
                    document.querySelector('.container .all-winners table tr:nth-child(' +i + ') td:nth-child(2)').style.cssText = "color:#000; border:1px solid #000;";
                }
             tabl.style.cssText = "z-index: 34;position: absolute;top: 0;right:calc(50% - 450px);width:900px; height:600px;";
                shape_shown.classList.add('shapy');
                come_back.style.display = 'block';
                window.print();

                
                }
                



// Code of pdf