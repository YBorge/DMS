var tools = {};

tools.items = [	
//{'name':'Tick','value':'tick','type':'text','available':'true'},
{'name':'Text','value':'text','type':'text','available':'true'},
//{'name':'Cross','value':'cross','type':'text','available':'true'},
//{'name':'Circle','value':'circle','type':'ellipse','available':'true'}
];


tools.options = {
	'container':'#tool_box',
	'dropdown':'#tools_dropdown',
	'image_container':'.img_conatainer',
	'image_class':'.img_zoom',
	'ellipse_class':'.round',
	'ellipse_container':'.round_container',
	'edit_text_container':'.img_edit_input_box_container',
};

tools.cordinates = {left:'50px',top:'50px'};


tools.init = function(){

	tools.generate_tools_list();

}

tools.generate_tools_list = function(){

	//var options = '<option value="">Tools</option>';
	var options = '<div class="btn-group">';
	var dropdown = $(tools.options.dropdown);
	for (var item in tools.items) {
		available = tools.items[item].available;
		name = tools.items[item].name ;
		value = tools.items[item].value ;
		type = tools.items[item].type ;
		if(available=='true'){
			options += '<button  type="button" class="btn btn-primary tools_button" data-value="'+value+'">'+name+'</button>';	
		//	options += '<option value="'+value+'">'+name+'</option>';	
			
		}
	}
	
	options += '</div>';

	if(dropdown.length>0){
		dropdown.html(options);

		dropdown.find('.tools_button').on('click',function(){
		
			tools.select_tool($(this).data('value'));
		});

	}else{
		console.log("Tools dropdown container "+ tools.options.dropdown + " Does not exist");
	}



}

tools.select_tool = function(tool){
	
	//tools.selected_tool = $(tools.options.dropdown).find('.tools_button').data('value');
	tools.selected_tool = tool;

	switch(tools.selected_tool){
		case 'tick':
		$(tools.options.edit_text_container).append('<div class="layer_edit" draggable="true" ondrag="layer.drag()" data-layer-id=""><div class="img_edit_input_box edit"><span class="marker " aria-hidden="true"></span><span class="tick glyphicon glyphicon-ok" aria-hidden="true"></span></div>');
		$(".img_edit_input_box.edit").css({'left':tools.cordinates.left,'top':tools.cordinates.top}); 
		break;
		case 'text':
		//if($('.img_edit_input_box.added').length==0){
		$(tools.options.edit_text_container).append('<div class="layer_edit" draggable="true" ondrag="layer.drag()" data-layer-id=""><div class="img_edit_input_box edit"><span class="marker " aria-hidden="true"></span><input class="img_edit_input" type="text" autofocus="true"><div class="input-text"></div></div>');
		$(".img_edit_input_box.edit").css({'left':tools.cordinates.left,'top':tools.cordinates.top}); 
		$(".img_edit_input_box.edit").closest('.layer_edit').css({'left':tools.cordinates.left,'top':tools.cordinates.top}).addClass('active'); 
		layer.items.push({id:'',type:'text',text:'',x:tools.cordinates.left,y:tools.cordinates.top});
		$('.layer_edit').draggable();
		//}
		break;
		case 'cross':$(tools.options.edit_text_container).append('<div class="layer_edit" draggable="true" ondrag="layer.drag()" data-layer-id=""><div class="img_edit_input_box edit"><span class="marker " aria-hidden="true"></span><span class="cross glyphicon glyphicon-remove" aria-hidden="true"></span></div>');
		$(".img_edit_input_box.edit").css({'left':tools.cordinates.left,'top':tools.cordinates.top}); 
		break;
		case 'circle':alert('tick selected');
		var offset = $(tools.options.image_container).parent().offset();
	
		$(tools.options.image_container).append('<div class="round_container" style="display:inline-block"><div class="round"></div></div>');
		
		$(tools.options.ellipse_container).css({'position':'absolute','left':tools.cordinates.left,'top':tools.cordinates.top}).draggable().resizable(); 
		break;

	}

}
tools.reset_tool = function(tool){
	
	//tools.selected_tool = $(tools.options.dropdown).find('.tools_button').data('value');
	tools.selected_tool = null;

}

tools.create_textarea = function(e){
	
}


/*===========================*/


/*$(document).on('click',tools.options.image_container,function(e){
	
	var offset = $(this).find('img').offset();
	var img = $('.img_conatainer').find('img');
	var frame = $('.img_conatainer');
	var is_zoom_in = frame.hasClass('zoom-in');

	var marker_offset = $('.img_edit_input_box.edit').find('.marker').offset();
	 cordinates.x = (marker_offset.left - img.offset().left);
	 cordinates.y = (marker_offset.top - img.offset().top) ;

	if(is_zoom_in){
	 cordinates.x = cordinates.x * 0.5;
	 cordinates.y = cordinates.y * 0.5;
	}
	
	if(tools.selected_tool == 'text'){

		

	$(tools.options.edit_text_container).find('.img_edit_input_box.edit').focus().css({'left':cordinates.x ,'top':cordinates.y}).show();
	$(tools.options.edit_text_container).closest('.layer_edit').css({'left':cordinates.x ,'top':cordinates.y})
	}

});*/

