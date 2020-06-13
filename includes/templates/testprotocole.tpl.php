Bienvenue sur le protocole de test. <br/>

Nous allons vous présenter X photos d'animaux. <br/>

Vous devrez répondre aux question concernant l'animal présenter en vous connectant à lui.<br/>

Cliquez sur ce bouton lorsque vous êtes pret
<hr/>
<button id="start_protocole" onclick="loadAnimal()" class="btn btn-primary">Commencer la session </button>

<div id="messages" class="alert"></div>
<form id="protocole_questions" onsubmit="saveDatas();return false;">
</form>
<div id="fullfilled_protocole" class="row" style="display: none">
    <div class="col-1"></div>
    <div class="col-10">
        <span class="alert alert-success">Vous avez déja répondu à toutes les questions. Merci d'avoir participé à cette étude.</span>
    </div>
    <div class="col-1"></div>
</div>