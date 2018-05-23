<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php include 'assets/php/nav.php'; ?>

    <!-- multistep form -->
    <form id="msform">
      <!-- progressbar -->
      <ul id="progressbar">
        <li class="active">Account Setup</li>
        <li>Personal Details</li>
      </ul>
      <!-- fieldsets -->
      <fieldset>
        <h2 class="fs-title">Create your account</h2>
        <h3 class="fs-subtitle">This is step 1</h3>
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="cpass" placeholder="Confirm Password" />
        <input type="button" name="next" class="next action-button" value="Next" />
      </fieldset>
      <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="fname" placeholder="First Name" />
        <input type="text" name="lname" placeholder="Last Name" />
        <input type="text" name="phone" placeholder="Phone" />
        <textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
      </fieldset>
    </form>
    <?php include 'assets/php/footer.php'; ?>


    <script src="assets/js/jsinscription.js"></script>

    </script>
  </body>
</html>
