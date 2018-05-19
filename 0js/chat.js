var dl = document.getElementById('dl'),
    $inp = $('input')
;

$inp.keyup(n);
function n(e){
  if(e.keyCode==13){
      
      if(this.value){

          var proc = {
              beforeSend:wait,
              data:{pertanyaan:this.value },
              type:'POST',
              url:'op/respond.php'
          },
              kdn = parseInt(this.name) + 1;
              this.name = kdn;

          $('<dt>', { text:this.value } )
              .appendTo(dl);
          this.value = '';
          
          $.ajax(proc).done( function(dt){
              reply(dt, kdn)
          });

        }
    }
}

function reply(res, kd){
    var word = res.split("");

    $('<dd>', { id: kd }
     ).appendTo( dl );
    flo(word, kd);

    dl.scrollTop =
        dl.scrollHeight - dl.clientHeight;
    $inp.prop('disabled', 0);
}

function wait(){
    $inp.prop('disabled', 1);
}

function flo(idx, kd) {
  var loopTimer;
  if(idx.length) {
    
    $('#' + kd).html(
      $('#' + kd).html() + idx.shift()
    );

  } else {
      clearTimeout(loopTimer); 
      return false;
	}
  loopTimer = setTimeout( function(){
    flo(idx, kd)
  }, 36);
}
/*
$('input').focus( toit );

function toit(){
    $('header, #pnm, h4').addClass('lose');
}

$('input').blur( lost );

function lost(){
    $('header, #pnm, h4').removeClass('lose');
}*/