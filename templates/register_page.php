<?php
$this->title = "S'enregistrer sur le site !";
?>
<div class="inner">
    <h2>S'enregistrer sur le site</h2>
    <section>
        <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('register') ?>">
            <div class="fields">
                <div class="field half">
                <input type="text" id="name" name="name" value="<?php
                if(isset($post['name'])) {
                    echo htmlspecialchars($post['name']);
                }
                ?>" placeholder="Nom" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                <input type="text" id="pseudo" name="pseudo" value="<?php
                if(isset($post['pseudo'])) {
                    echo htmlspecialchars($post['pseudo']);
                }
                ?>" placeholder="Pseudo" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                <input type="email" id="email" name="email" value="<?php
                if(isset($post['email'])) {
                    echo ($post['email']);
                }
                ?>" placeholder="Email" required>
                </div>
            </div>
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
                <input type="password" id="password2" name="password2" placeholder="Confirmer mdp" required>
                </div>
            </div><br>
            <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
            <ul class="actions">
                <li><input type="submit" class="primary" value="Envoyer" id="submit" name="submit"></li>
            </ul>
        </form>
    </section>
</div>
