<section class="container py-3">
    <h1>Contactez-nous</h1>

    <form action="<?= BASE_URL; ?>/" method="post">
        <div class="mb-3">
            <label for="mail" class="form-label"><i class="bi bi-envelope me-2"></i>Email :</label>
            <input type="email" id="mail" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label"><i class="bi bi-chat-right-text me-2"></i>Message :</label>
            <textarea id="message" name="content" rows="3" class="form-control" placeholder="Dites-nous tout..." required></textarea>
        </div>

        <input type="submit" name="contact" class="btn btn-outline-primary mt-3" value="Envoyer">
    </form>
</section>