
var layer = {};
layer.items = [];
layer.add = function(layer_details){
	//console.log(layer_details);
    layer.add_to_list(layer_details);
    layer.add_to_img(layer_details);
}

layer.add_to_list = function(layer_details){
var layer_child = '';
var list_layer_obj = $('.ll[data-layer-list-id="'+layer_details.id+'"]');
var is_editable = layer.is_editable(layer_details);

var edit_tpl = '';
var delete_tpl = '';
if(is_editable=='true'){
edit_tpl = '<span  onclick="layer.select(\''+layer_details.id+'\')" class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
delete_tpl = '<span onclick="layer.delete(\''+layer_details.id+'\')" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
}


if(layer_details.type=='text'){
	layer_child = '<div class="ll" data-layer-list-id="'+layer_details.id+'" ><span class="col-md-7 ll_title"></span><span class="col-md-1 ll_font_size"></span><span class="col-md-1 ll_font_color">'+edit_tpl+'</span><span class="col-md-1 ll_info">'+delete_tpl+'</span></div>';
	$(tools.options.edit_text_container).find('.img_edit_input_box.edit').removeClass('edit').addClass('layer');
}
if(layer_details.type=='tick'){
	layer_child = '<li class="list-group-item list-group-item-info">tick</li>';
}

if(layer_details.type=='cross'){
	layer_child = '<li class="list-group-item list-group-item-info">cross</li>';
}

if(layer_details.type=='circle'){
	layer_child = '<li class="list-group-item list-group-item-info">circle</li>';
}
list_item = $('.ll[data-layer-list-id="'+layer_details.id+'"]');

if(!list_item.length){
layer.container_obj.append(layer_child);
}
list_item = $('.ll[data-layer-list-id="'+layer_details.id+'"]');

list_item.find(".ll_title").html(layer_details.text).ellipsis({row:1});
}

layer.options = {
	'container':'#layer_list'
}

layer.is_editable = function(layer_details){
	var change_by = $("#change_by").val();
	var change_log_id = $("#change_log_id").val();
	if(layer_details.change_by==change_by  && layer_details.change_log_id==change_log_id){
		return 'true';
	}
	return 'false';
}


layer.add_to_img = function(layer_details){
var img_layer_obj = $('.layer_edit[data-layer-id="'+layer_details.id+'"]');

if(layer_details.type=='text'){


	if(!img_layer_obj.length){
	$(tools.options.edit_text_container).append('<div tabindex="1" class="layer_edit" draggable="true" data-is_editable ="'+layer.is_editable(layer_details)+'"  data-layer-id="'+layer_details.id+'" onclick="layer.select(\''+layer_details.id+'\')"><div class="img_edit_input_box layer"><span class=" marker" aria-hidden="true"></span><input class="img_edit_input" type="text" autofocus="true" ><div class="input-text"></div></div>');
	//$(tools.options.edit_text_container).append('<div class="layer_edit" draggable="true" data-layer-id="'+layer_details.id+'" ><div class="img_edit_input_box layer"><span class=" marker" aria-hidden="true"></span><input class="img_edit_input" type="text" autofocus="true" ><div class="input-text"></div></div>');
	}
	$('.layer_edit[data-layer-id="'+layer_details.id+'"]').find(".img_edit_input_box.layer").css({"top":layer_details.y,"left":layer_details.x});
	$('.layer_edit[data-layer-id="'+layer_details.id+'"]').css({"top":layer_details.y,"left":layer_details.x}).removeClass('active');

	$('.layer_edit[data-layer-id="'+layer_details.id+'"]').find(".img_edit_input_box.layer").find('.img_edit_input').val(layer_details.text);
	$('.layer_edit[data-layer-id="'+layer_details.id+'"]').find('.input-text').text(layer_details.text);
}

$('.layer_edit[data-layer-id="'+layer_details.id+'"][data-is_editable="true"]').draggable();
}

layer.options = {
	'container':'#layer_list'
}
	
layer.init= function(){
	layer.container_obj = $(layer.options.container);
	var layer_fetch_param = {img_src:$('#img_src').val()};
	layer.get(layer_fetch_param);	
}

layer.save = function(layer_details){
	if(layer_details.text!=''){
		url = config.API_URL+"?func=create_layer";
		$.ajax({
			method:'POST',
			url: url,
			data:layer_details, // serializes the form's elements.
			success: function(data)
			{
				//console.log(data);
				layer_param = layer.set_layer_item('',data);		
				layer.add(data);
				$(".layer_edit[data-layer-id='']").remove();
				$("#save").prop('disabled',false);
			}
		});
	}
}

layer.get = function(layer_details){
	url = config.API_URL+"?func=get_layer";
	$.ajax({
		method:'POST',
		url: url,
		data:layer_details, // serializes the form's elements.
		async:false,
		success: function(data)
		{
			layer.items = data;
			if(layer.items.length){
			layer.list();
			}
		}
	});
}

layer.update = function(layer_details){
	if(layer_details.text!=''){
	url = config.API_URL+"?func=update_layer";
	$.ajax({
	method:'POST',
	url: url,
	data:layer_details, // serializes the form's elements.
	success: function(data)
	{	
		layer_id = data.id;
		layer_param = layer.set_layer_item(layer_id,data);
        layer.add(data);             
	}
	});
}
}

layer.list = function(){
	$.each(layer.items,function(index,item){
		layer.add(item);
	});
}

layer.select = function(layer_id){

	tools.selected_tool = 'text';

	if(!$(".layer_edit[data-layer-id='"+layer_id+"'][data-is_editable='true']").hasClass('active')){
		$(".layer_edit.active").removeClass('active');
	$(".layer_edit").find('.edit').removeClass('edit').addClass('layer');

	$(".layer_edit[data-layer-id='"+layer_id+"'][data-is_editable='true']").addClass('active').find('.layer').removeClass('layer').addClass('edit');
	}
}

layer.unselect = function(layer_id){

	if($(".layer_edit[data-layer-id='"+layer_id+"']").hasClass('active')){
	$(".layer_edit[data-layer-id='"+layer_id+"']").removeClass('active').find('.edit').removeClass('.edit').addClass('layer');
	}
}

layer.drag =function(event){
}

layer.get_param = function (layer_id){
	var llayer = $(".layer_edit[data-layer-id='"+layer_id+"']");
	var ltext = llayer.find('.img_edit_input').val();
	var lx = llayer.offset().left ;
	var ly = llayer.offset().top ;
}
layer.save_or_update = function(layer_param){
	if(layer_param.id =='' || layer_param.id ==undefined){
		layer.save(layer_param);
	}
	else{
		layer.update(layer_param);
	}
}

layer.set_layer_item =function(id,param){
var item_found =null;
	 $.each(layer.items,function(index,item){

		if(item.id==id){
			$.each(param,function(key,val){
			layer.items[index][key]=val;
			});
			item_found = item;
		}

	});
	 return item_found;
}

layer.get_layer_item =function(id,param){
var item_found =null;
	$.each(layer.items,function(index,item){
		if(item.id==id){
		
			item_found = item;
		}
	});
	return item_found;
}

layer.delete =function(layer_id){
	url = config.API_URL+"?func=delete_layer";
	$.ajax({
	method:'POST',
	url: url,
	data:{id:layer_id}, // serializes the form's elements.
	success: function(data)
	{

		$('.layer_edit[data-layer-id="'+data.id+'"]').remove();
		$('.ll[data-layer-list-id="'+data.id+'"]').remove();
		$("#save").attr("disabled","disabled");
	}
	});
}



/*============*/

$(document).on('dragstop','.layer_edit',function(e){

	
	if($('.img_edit_input_box.edit').length==0){
		return;
	}


    var layer_index =$( ".layer_edit" ).index( $(this));
	var offset = $(this).find('img').offset();
	var img = $('.img_conatainer').find('img');
	var frame = $('.img_conatainer');
	var is_zoom_in = frame.hasClass('zoom-in');

	var marker_offset = $(this).find('.marker').offset();
	var layer_id = $(this).data('layer-id');

	
	 cordinates.x = (marker_offset.left - img.offset().left);
	 cordinates.y = (marker_offset.top - img.offset().top) ;

	if(is_zoom_in){
	// cordinates.x = cordinates.x * 0.5;
	// cordinates.y = cordinates.y * 0.5;
	}
	
	if(tools.selected_tool == 'text'){

	layer.items[layer_index].x = cordinates.x;
	layer.items[layer_index].y = cordinates.y;

	layer.set_layer_item(layer_id,cordinates);
	
	$(tools.options.edit_text_container).find('.img_edit_input_box.edit').focus().css({'left':layer.items[layer_index].x ,'top':layer.items[layer_index].y}).show();
	$(tools.options.edit_text_container).closest('.layer_edit').css({'left':layer.items[layer_index].x ,'top':layer.items[layer_index].y})
	layer.save_or_update(layer.items[layer_index]);
	}
});

