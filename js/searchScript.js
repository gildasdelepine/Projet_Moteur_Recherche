/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function kwProcess(){
    
    var sentence = $('#kwString').val();
    var words = sentence.split(" ");
    
    $.ajax({
        type: "GET",
        url : "index.php/ajax/setKW",
        data: { words : words },
        success:function(data){
         // alert(data);
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