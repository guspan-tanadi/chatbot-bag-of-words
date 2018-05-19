function run() {
var $rare = $('#rare'),
$each = $('#each'),
$sub=$('#sub'),

$oldan = $('#oldan'),
$newan =$('#newan') ;

function parse2word(event) {
	if( event.keyCode == 13){
var ival = this.value,

remQ = ival.replace(/\?/g,''),
words = remQ.trim().split(" "),
wole = words.length;

	if( $each.text() )
	$each.empty();

	if ( $rare.text() )
	$rare.empty();

	if (wole > 1){
		for(len = 0; len < wole; len++){
			$each.append(
				$('<span>', {
				class:'cp eword', text : words[len]
				})
			);
		}
	}

	$sub.addClass('vishi');
	}
}

$('#question').keyup(parse2word);

function heyword() {

if( !$(this).hasClass('past') ) {
    $rare.append( ' ' + this.textContent );

    $(this).addClass('past');
}

if( $sub.hasClass('vishi') ) {
    $sub.removeClass('vishi');

var ival =$('#question').val();

	$.ajax(
		{
            data: { tanya :ival },
            type: 'POST',
            url: 'op/oldanswer.php'
		}
	).done(oldandata);
	}
}

function oldandata(res) {
    $oldan.empty();
    $oldan.append(res);
}

$each.on('click', '.eword', heyword);

function choose_answer() {
    $('.anc').removeClass('elect');
    $(this).addClass('elect');
    
    if ( this.id == 'oldto') {
        $oldan.removeClass('hide');

	if( $newan.val() )
		$newan.val('');
        
$newan.addClass('hide');
} else {
    
    $oldan.addClass('hide');

	if( $oldan.val())
		$oldan.val(0);

$newan.removeClass('hide');
	}
}

$sub.on('click', '#oldto, #newto', choose_answer);

function save() {

var keyword = $rare.html(),
    upkd = $(this).data('kd'),
    hpkd = $(this).data('hp'),

    kdv = (hpkd) ? hpkd : upkd,
    okd = (hpkd) ?'del':
(   (upkd) ? 'up' : 0),
    
    answer = ( $newan.val() )?
    {say:'new', value: $newan.val()} :
    {say:'old', value: $oldan.val()},

		proc = {
            data: {

                kode:kdv,
                deci_kd:okd,
                pertanyaan:$('#question').val(),
                
                kata_kunci:keyword,
                penentu:answer.say,
                jawaban:answer.value

            },
            
            type:'POST',
            url:'op/saveup.php'
		};

$.ajax(proc).done(ok);
}

function ok(res) {
    $('#fur').empty() ;
    $('#nty').html(res);
}

$('#send, #edit').click( save);

function change_ans(){
    var $answer_input = $('#answer_input').val(),
        kdup = $(this).data('kd'),

        proc = {
            data:{
                
                kode:kdup,
                jawaban: $answer_input
            },

            type:'POST',
            url:'op/upans.php'

        };
$.ajax(proc).done(ok);
}

$('#ansbtn').click( change_ans );

} $(run);