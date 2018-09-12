<link rel="stylesheet" href="estilo-frameworks-1.css" type="text/css" />
<script language="JavaScript" src="jquery-1.5.2.min.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  function getAjax(pagina, dados, destino){
    var icon = $('<img src="load.gif" />');
  	$.ajax({
  	type: "GET", url: pagina, data: dados, dataType: 'html',
      beforeSend: function(){ /*$(destino).html(icon);*/ $('#icon').html(icon) },
      complete: function() { $('#climais').remove(); },
      success: function(data, textStatus) { /*$(destino).append(data);*/  $(destino).html(data); }
  	});
  }

  $(document).ready(function(){
    var iconCarregando = $('<img src="load.gif" />');
    $('#frmMsg').submit(function(e) {
    	e.preventDefault();
    	var serializeDadosChate = $('#frmMsg').serialize();
    	$.ajax({
    			url: 'set_mensages.php',
    			dataType: 'html',
    			type: 'POST',
    			timeout: 5000,
    			data: serializeDadosChate,
    			beforeSend: function(){	},
    			complete: function() { $(iconCarregando).remove(); },
    			success: function(data, textStatus) {
    			 $('#aviso').html(data);
               $('input[name=msg]').val('');
    			},
    			error: function(xhr,er) {
    				$('#mensage').html('<p>Lamento! Internet lenta. Por favor tente novamente.</p>')
    			}
    		});
    });
  });

  setInterval("getAjax('get_mensages.php', '', '#mensage')", 3000);
</script>

<style type="text/css">
.chate{font-family: Arial;}
.chate #mensage{font-size: 12px;font-family: Arial;line-height: 1.3em; }
.chate .rodape{font-size: 10px;}
.chate .rodape label{display: block; }
</style>

<div class="conteiner">

  <div class="chate  b-d mauto mt20">
    <div class="corpo p5" style="height: 300px; overflow: auto;">
      <ul id="mensage"></ul>
    </div>
    <div class="rodape bt-d p10">
      <form action="" method="post" id="frmMsg">
        <p class="mb10">
          <label>Nome:</label>
          <input type="text" name="nome" size="20" maxlength="20" class="mr5" />
          <span id="aviso"></span>
        </p>
        <p>
          <label>Mensage:</label>
          <input type="text" name="msg" size="30" />
          <input type="submit" value="Ok" />
        </p>
        <div class="clear"></div>
      </form>
    </div>
  </div>

</div>