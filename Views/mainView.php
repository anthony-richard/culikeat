<!-- <form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form> -->
<img src="Images/photo.png" alt="banniere">
<div >
  <img src="Images/icone.png" alt="">
    <h2><?= $restaurateurData["name_restaurant"]?></h2>
  <ul>
    <li>ta fain ta soif, mange chinois</li>
  </ul>
    <hr>
</div>

<div class="card">
  <div class="card-header">
    Message
  </div>
  <div class="card-body">
  <input type="text" id="typeText" placeholder="Ecrivez un message..." class="form-control" />
  
    <a href="#" class="btn btn-primary d-flex justify-content-center mt-3">Envoyer</a>
  </div>
</div>
<?php foreach ($allMessages as $key => $MessageInfo) : ?>
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><?= $restaurateurData["name_restaurant"]?></div>
  <div class="card-body">
    <h5 class="card-title"><?= $MessageInfo["post"]?></h5>
  </div>
</div>
<?php endforeach ?>