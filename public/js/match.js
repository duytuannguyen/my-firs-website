function bet(team_win){
	$(".formbit").remove();
	$("#col_" + team_win).append('<div class="formbit">'
								+'<input type="text" name="coins_bet" id="coins_bet" min="0" class="inputbit" placeholder="Nhap...">'
								+ '<input type="submit" name="" class="numbit" value="Ok" data-toggle="modal" data-target="#note"></div>');

	$(".formbit").show(1000);
	$("#choose_win").val(team_win);
}

function show_confirm(id){
	var confirmBox = confirm("Bạn có muốn thay đổi không!");
	if(confirmBox == true){
		window.location.href = 'changerole/' + id;
	}else{
		return ;
	}
}

function show_confirm_delete(id){
	var confirmBox = confirm("Bạn có chắc chắn không?")
	if(confirmBox == true)
			window.location.href = 'delete/' + id;
	else
		return;
}