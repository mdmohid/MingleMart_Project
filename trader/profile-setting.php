<?php include '../includes/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Profile Settings</h1>

    <div class="box">
      <form action="update-profile.php" method="POST" enctype="multipart/form-data">
        <div class="field">
          <label class="label">Profile Photo</label>
          <div class="control">
            <div class="file has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="profile_photo">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Choose a file…
                  </span>
                </span>
              </label>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" type="text" name="name" value="Nishan Rokka" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" type="email" name="email" value="nishanrokka@gmail.com" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Gender</label>
          <div class="control">
            <div class="select">
              <select name="gender" required>
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Contact</label>
          <div class="control">
            <input class="input" type="text" name="contact" value="+977-9814635423" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Address</label>
          <div class="control">
            <input class="input" type="text" name="address" value="China, Kathmandu" required>
          </div>
        </div>

        <div class="field is-grouped is-grouped-right mt-5">
          <div class="control">
            <button class="button is-primary" type="submit">Update Profile</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>