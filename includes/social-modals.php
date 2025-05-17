<!-- Facebook Modal -->
<div id="modal-facebook" class="modal">
  <div class="modal-background" onclick="closeModal('modal-facebook')"></div>
  <div class="modal-content box has-text-centered">
    <h3 class="title is-4">Follow us on Facebook</h3>
    <p>Stay connected with MingleMart on Facebook for the latest updates and offers.</p>
    <a href="https://www.facebook.com/" class="button is-link mt-3" target="_blank">Visit Facebook</a>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('modal-facebook')"></button>
</div>

<!-- Instagram Modal -->
<div id="modal-instagram" class="modal">
  <div class="modal-background" onclick="closeModal('modal-instagram')"></div>
  <div class="modal-content box has-text-centered">
    <h3 class="title is-4">Follow us on Instagram</h3>
    <p>Get inspired by MingleMart's latest photos, stories, and product highlights.</p>
    <a href="https://www.instagram.com/" class="button is-danger mt-3" target="_blank">Visit Instagram</a>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('modal-instagram')"></button>
</div>

<!-- Twitter Modal -->
<div id="modal-twitter" class="modal">
  <div class="modal-background" onclick="closeModal('modal-twitter')"></div>
  <div class="modal-content box has-text-centered">
    <h3 class="title is-4">Follow us on Twitter</h3>
    <p>Get the latest tweets from MingleMart for flash sales and quick tips.</p>
    <a href="https://twitter.com/" class="button is-info mt-3" target="_blank">Visit Twitter</a>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('modal-twitter')"></button>
</div>

<!-- LinkedIn Modal -->
<div id="modal-linkedin" class="modal">
  <div class="modal-background" onclick="closeModal('modal-linkedin')"></div>
  <div class="modal-content box has-text-centered">
    <h3 class="title is-4">Connect with us on LinkedIn</h3>
    <p>Learn more about MingleMart’s journey, team, and job openings.</p>
    <a href="https://www.linkedin.com/" class="button is-primary mt-3" target="_blank">Visit LinkedIn</a>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('modal-linkedin')"></button>
</div>



<script>
  function openModal(id) {
    document.getElementById(id).classList.add('is-active');
  }

  function closeModal(id) {
    document.getElementById(id).classList.remove('is-active');
  }
</script>