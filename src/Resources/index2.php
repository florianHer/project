<form action="#" method="post">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="problem" name="problem">
        <label class="mdl-textfield__label" for="problem">Numéro du problème</label>
        <span class="mdl-textfield__error">Vous devez entrer un nombre</span>
    </div>
    <input type="hidden" name="page" value="problem_choice">
</form>