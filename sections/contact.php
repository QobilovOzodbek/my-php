<section class="contact" id="contact" data-aos="fade-up">
    <h2>Get In Touch</h2>
    <p class="contact-desc">
        Have a project in mind or want to collaborate?
        Feel free to send me a message.
    </p>

    <div class="contact-wrapper">
        <!-- FORM -->
        <form class="contact-form" id="contactForm" action="sections/send.php" method="POST">

            <div class="input-group">
                <input type="text" name="name" required>
                <label>Your Name</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" required>
                <label>Email Address</label>
            </div>

            <div class="input-group">
                <textarea name="message" rows="5" required></textarea>
                <label>Your Message</label>
            </div>

            <button type="submit" class="btn submit-btn">
                Send Message
            </button>

            <p class="form-status" id="formStatus"></p>
        </form>

        <!-- CONTACT INFO -->
        <div class="contact-info">
            <h3>Contact Info</h3>

            <p>
                <i class="fas fa-envelope"></i>
                <a href="mailto:ozodbekqobilovinfo@example.com">
                    ozodbekqobilovinfo@example.com
                </a>
            </p>

            <p>
                <i class="fab fa-github"></i>
                <a href="https://github.com/QobilovOzodbek" target="_blank">
                    github.com/QobilovOzodbek
                </a>
            </p>

            <p>
                <i class="fab fa-telegram"></i>
                <a href="https://t.me/QobilovOzodbek" target="_blank">
                    @QobilovOzodbek
                </a>
            </p>
        </div>
    </div>
</section>

<!-- AJAX SCRIPT – sahifa reloadsiz ishlashi uchun -->
<script>
    document.getElementById("contactForm").addEventListener("submit", function (e) {
        e.preventDefault(); // formni default yuborishni to'xtatamiz

        const formData = new FormData(this);
        const status = document.getElementById("formStatus");

        fetch("sections/send.php", {
            method: "POST",
            body: formData
        })
            .then(res => res.text())
            .then(res => {
                if (res.trim() === "success") {
                    status.innerText = "Xabar yuborildi ✅";
                    this.reset();
                } else {
                    status.innerText = "Xatolik: " + res;
                }
            })
            .catch(() => {
                status.innerText = "Server xatosi ❌";
            });
    });
</script>