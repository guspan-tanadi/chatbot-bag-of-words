function find(event){
    if(event.keyCode == 13){
        
        var ival = this.value,
            $modeval = $('#mode').val();
        
        if( ival && $modeval ){
            var proc={
                data:{

                    dasar:$modeval,
                    teks:ival
                },

                type:'POST',
                url:''
            };
        
        $.ajax(proc);
        }

    }
}

$('#insea').keyup(find);