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




$(':file').change(function(){
    var file = this.files[0];
    var name = file.name;
    var size = file.size;
    var type = file.type;
    //Your validation
});



function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded,max:e.total});
    }
}


$('#UploadBtn').click(function(){
    var formData = new FormData($('form')[0]);
    $.ajax({
        url: 'Connection_model.php',  //Server script to process data
        type: 'POST',
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){ // Check if upload property exists
                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
            }
            return myXhr;
        },
        //Ajax events
        beforeSend: beforeSendHandler,
        success: completeHandler,
        error: errorHandler,
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
});



function writeImgKW(data){
    var finalString = '';
    var baseImg = window.location.pathname+'images/';
    baseImg = baseImg.replace("index.php","");
    var result = $.parseJSON(data);
    $.each(result, function(k, v) {
        //display the key and value pair
        //alert(k + ' is ' + v);
        if (v !== 0)
            finalString = finalString+'<img class="randImg" alt="'+k+'" class="randImg" src="'+baseImg+k+'"> ';
    });
    $('#imgResult').empty().html(finalString);
}

function writeImgFB(data){
    var finalString = '';
    var baseImg = 'http://127.0.0.1/Projet_Moteur_Recherche/images/';
    var result = $.parseJSON(data);
    $.each(result, function(k, v) {
        //display the key and value pair
        //alert(k + ' is ' + v);
        finalString = finalString+'<img class="randImg" alt="'+k+'" class="randImg" src="'+baseImg+k+'"> ';
    });
    $('#imgResult').empty().html(finalString);
    selectedImg = "";
    $( ".randImg" ).click(function() {
        $(this).css({
                border: '2px solid blue'
           });
        var alt = $(this).attr("alt");
        alt = alt.replace("images/","");
        selectedImg = selectedImg+alt+" ";
    });
    
}

function kwProcess(){
    
    var sentence = $('#kwString').val();
    var words = sentence.split(" ");
    
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
    var words = selectedImg.split(" ");
    $.ajax({
        type: "GET",
        url : "ajax/setFB",
        data: { selectedImg : words },
        success:function(data){
          writeImgFB(data);
        }
    }); 
}

var selectedImg = "";

$( ".randImg" ).click(function() {
    $(this).css({
            border: '2px solid blue'
       });
    var alt = $(this).attr("alt");
    alt = alt.replace("images/","");
    selectedImg = selectedImg+alt+" ";
});

function jsfunction(){
    location.reload();
}
