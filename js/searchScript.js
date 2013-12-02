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
        url : "application/controllers/ajax.php/getKW",
        data: { words : words },
        success:function(msg){
          alert("completed");
        }
    }); 
}