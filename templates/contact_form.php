<?php
$this->title = "Contactez moi";
?>
<div class="inner">
    <h2>Formulaire de contact</h2>
    <section>
        <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('contact') ?>">
            <div class="fields">
                <div class="field half">
                        <input type="text" id="username" name="username" value="<?php
                        if(isset($post['username'])) {
                            echo htmlspecialchars($post['username']);
                        }
                        ?>" placeholder="Votre nom" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                        <input type="email" id="email" name="email" value="<?php
                        if(isset($post['email'])) {
                            echo htmlspecialchars($post['email']);
                        }
                        ?>" placeholder="Email" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                    <input type="text" id="subject" name="subject" value="<?php
                    if(isset($post['subject'])) {
                        echo htmlspecialchars($post['subject']);
                    }
                    ?>"  placeholder="Sujet" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                    <textarea rows="4" cols="100" id="text" name="text" value="<?php
                    if(isset($post['text'])) {
                        echo htmlspecialchars($post['text']);
                    }
                    ?>"  placeholder="Message" required></textarea>
                </div>
            </div>
            <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
            <ul class="actions">
                <li><input type="submit" class="primary" value="Envoyer" id="submit" name="submit"></li>
            </ul>
        </form>
    </section>
</div>
