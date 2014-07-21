$(function(){
    alert(1);
    
    $.get('dashboard/xhrGetListings', function(o){
       // console.log(o);
        
        for(var i = 0; i < o.length; i++){
            $('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="'+o[i].id +'" href="#">X</a></div>');
        }
        
         $('.del').live('click',function(){
             delItem = $(this);
        
        var id = $(this).attr('rel');
        //alert(id);
        
        $.post('dashboard/xhrDeleteListing', {'id': id}, function(o){
            //console.log(o);
            //$('#listInserts').append('<div>' + o.text + '<a class="del" rel="'+o.id +'" href="#">X</a></div>')
            //alert(2);
            delItem.parent().remove();
        }, 'json');
        
        return false;
    });
       
    }, 'json');
    
    
    
    $('#randomInsert').submit(function(){
        var url = $(this).attr('action');
        var data = $(this).serialize();
        console.log(data);
        $.post(url, data, function(o){
            //console.log(o);
            $('#listInserts').append('<div>' + o.text + '<a class="del" rel="'+o.id +'" href="#">X</a></div>')
            //alert(2);
        }, 'json');
        return false;
    });
    
   
    
});
