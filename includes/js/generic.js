function $( query ){
    return document.querySelectorAll( query );
}

document.addEventListener("DOMContentLoaded", function() {
    if($('#protocole_questions').length > 0){
        loadQuestions();
    }
});


/* JS for protocole */
function loadAnimal(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){

        if(xhr.readyState !== 4) {
            return
        }
        switch (xhr.status) {

            case 200:
                var protocole_animal = JSON.parse(xhr.responseText);
                var form = '';

                if(protocole_animal.id === null){
                    $('#protocole_questions')[0].innerHTML = '';
                    $('#fullfilled_protocole')[0].style.display='block';
                    $('#start_protocole')[0].style.display='none';
                    return;
                }
                form += '<input type="hidden" name="animal_hash" value="'+protocole_animal.hash+'"/>';
                form += '<div class="row">';
                form += '   <div class="col-7">';
                form += '   <div class="name"><b>'+protocole_animal.name+'</b></div>';
                form += '   <img src="'+BASEPATH+'/images/animals/'+protocole_animal.hash+'/image_full.jpg" width="100%">';
                form += '   </div>';
                form += '   <div class="col-5">';
                for(var i=0;i<protocole_questions.length;i++){
                    form += getField(protocole_questions[i]);
                    form += '<hr/>';
                }
                form += '<button id="continue_protocole" class="btn btn-primary">Animal suivant</button>'
                form += '   </div>';
                form += '</div>';


                $('#protocole_questions')[0].innerHTML = form;
                $('#start_protocole')[0].style.display='none';

                break;
            case 401:
                $('#protocole_questions')[0].innerHTML = '<div class="alert alert-warning">Veuillez vous connecter ou créer un compte avant d\'accéder au test.</div>';
                break;
            default:
                $('#protocole_questions')[0].innerHTML = '<div class="alert alert-warning">Erreur lors de la génération du test aléatoire.</div>';
                break;

        }
    }
    xhr.open("GET", "../animals/actions/ajax_getrandom.php", true);
    xhr.send("");
}

function saveDatas(){
    var formData = new FormData( $('#protocole_questions')[0] );

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../test/actions/ajax_savequestions.php", true);
    xhr.send( formData );

    xhr.onreadystatechange = function() {

        if (xhr.readyState !== 4) {
            return
        }
        if (xhr.status == 200) {
            $('#messages')[0].className += ' alert-success fadeout';
            $('#messages')[0].innerHTML = "Données enregistrées";
        }
    }

    loadAnimal();
    return true;
}

var protocole_questions={};
function loadQuestions(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){

        if(xhr.readyState !== 4) {
            return
        }
        switch (xhr.status) {
            case 200:
                protocole_questions = JSON.parse(xhr.responseText);
                break;
            case 302:
                break;
            default:
                break;
        }
    }
    xhr.open("GET", "../test/actions/ajax_getquestions.php", true);
    xhr.send("");
}

function getField(question){
    var res = '';

    res += '<div>';
    res += question.label + '<br/>';


    switch(question.field_type){
        case 'text':
            res += '<input type="text" name="q['+question.id+']"/><br/>';
            break;
        case 'boolean':
            res +='<div class="form-check form-check-inline">';
            res += '<input type="radio" name="q['+question.id+']" id="q_'+question.id+'_oui" value="1" class="form-check-input"/>' +
                '<label class="form-check-label" for="q_'+question.id+'_oui">Oui</label>';
            res += '</div>';
            res +='<div class="form-check form-check-inline">';
            res += '<input type="radio" name="q['+question.id+']" id="q_'+question.id+'_non" value="0" class="form-check-input"/>' +
                '<label class="form-check-label" for="q_'+question.id+'_non">Non</label>';
            res += '</div>';
            res +='<div class="form-check form-check-inline">';
            res += '<input type="radio" name="q['+question.id+']" id="q_'+question.id+'_idk" value="-1" class="form-check-input"/>' +
                '<label class="form-check-label" for="q_'+question.id+'_idk">Je ne sais pas</label>';
            res += '</div>';
            break;
        case 'number':
            res += '<input type="number" name="q['+question.id+']"/><br/>';
            break;
        default:
            res += '<input type="text" name="q['+question.id+']"/><br/>';
            break;
    }
    res +='</div>';
    return res;
}