/*
    console.log(layer);
$(document).on('mousedown','.marker',function(){
   
    
    layer.draggable = true;
});

$(document).on('mouseup','.marker',function(){
    console.log(layer.draggable);
    layer.draggable = false;
});

$(document).on('mousemove','.marker',function(event){
console.log(event.ClientX);
     if(layer.draggable==true){         
        $(this).closest('.layer_edit').css({'top':200-6,'left':400-6,}); 
            }
});*/


/*$(document).on('mousedown','.marker',function(){

$(this).on('mousemove',function(){

        console.log("OK Moved!");
        
        console.log(event);
      
        $(this).closest('.layer_edit').css({'top':event.pageY-10,'left':event.pageX-10,}); 
    });
}).mouseup(function () {
    $(this).unbind('mousemove');
}).mouseout(function () {
    $(this).unbind('mousemove');
});
*/
