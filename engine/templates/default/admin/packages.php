<form class="save-package-includes">
  <div class="col-md-4 text-center buy-%type% buy-box">
      <div class="col-md-12 buy-title">%type%</div>
      <div class="col-md-12 buy-price"><span class="glyphicon glyphicon-shopping-cart"></span> %price%$</div>
      <div class="col-md-12 buy-price"><span class="glyphicon glyphicon-time"></span> %time%</div>
      %includes%
      <input type="hidden" name="id" value="%id%">
      <div class="col-md-12 buy-button">
          <button type="submit" data-type="%type%" data-package="%id%" data-summ="%price%" class="btn btn-primary">Сохранить</button>
      </div>
  </div>
</form>
