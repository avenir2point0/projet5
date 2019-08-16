<?php
$this->title = "Mot de passe oublié";
?>
<div class="inner">
    <h2>Changement de mot de passe oublié</h2>
    <section>
        <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('new_password_form', ['token' => $_GET['token']]); ?>">
            <div class="fields">
                <div class="field half">
                        <input type="password" id="password" name="password" value="<?php
                        if(isset($post['password'])) {
                            echo $post['password'];
                        }
                        ?>" placeholder="Mot de passe" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                        <input type="password" id="password2" name="password2" value="<?php
                        if(isset($post['password2'])) {
                            echo $post['password2'];
                        }
                        ?>" placeholder="Confirmer mdp" required>
                </div>
            </div>
            <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
            <input type="text" id="token" name="token" value="<?php echo htmlspecialchars($_GET['token']);?>" hidden><br>
            <ul class="actions">
                <li><input type="submit" class="primary" value="Modifier" id="submit" name="submit"></li>
            </ul>
        </form>
    </section>
</div>
