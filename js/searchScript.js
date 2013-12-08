/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function deconnexion(){
    $.ajax({
        type: "POST",
        url : "index.php/admin/deconnexion",
        success:function(data){
           writeImgKW(data);
        }
    });
}


function writeImgKW(data){
    var finalString = '';
    var baseImg = window.location.pathname+'images/';
    var result = $.parseJSON(data);
    $.each(result, function(k, v) {
        //display the key and value pair
        //alert(k + ' is ' + v);
        finalString = finalString+'<img class="randImg" alt="'+k+'" class="randImg" src="'+baseImg+k+'"> ';
    });
        $('#imgResult').empty().html(finalString);
}

function kwProcess(){
    
    var sentence = $('#kwString').val();
    var words = sentence.split(" ");
    
    if(sentence === '')
        $('#imgResult').empty().html('');
    
    $.ajax({
        type: "GET",
        url : "index.php/ajax/setKW",
        data: { words : words },
        success:function(data){
           writeImgKW(data);
        }
    }); 
}

function fbProcess(){
    $.ajax({
        type: "GET",
        url : "application/controllers/ajax.php/setFB",
        data: { selectedImg : selectedImg }
//        success:function(msg){
//          alert("completed");
//        }
    }); 
}

var selectedImg = "";

$( ".randImg" ).click(function() {
    var alt = $(this).attr("alt");
    alt = alt.replace("images/","");
    selectedImg = selectedImg+" "+alt;
});

function jsfunction(){
    location.reload();
}