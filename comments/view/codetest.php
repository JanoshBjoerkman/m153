<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row">
  <div class="col-xs-12">
    <h1>Codetest</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-warning">
      <strong>Warnung!</strong>
      <p>
        Diese Seite nutzt die PHP-Funktion <code>eval()</code>, um Benutzereingaben als PHP-Code auszuführen.
        Dies ist hochriskant und darf in einem normalen Umfeld nie zur Anwendung kommen.
      </p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <form action="index.php?" method="GET">
      <div class="form-group">
        <label for="phpcode">PHP code:</label>
        <input type="text" class="form-control" id="phpcode" placeholder="<?php $phpcode ?>" name="phpcode">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default" name="op" value="pct">Ausführen</button>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">Resultat</div>
      <div class="panel-body"><?php eval($data->phpcode) ?></div>
    </div>
  </div>  
</div>

<!-- include footer -->
<?php
  require_once(VIEW_PATH . "/footer.php");
?>

