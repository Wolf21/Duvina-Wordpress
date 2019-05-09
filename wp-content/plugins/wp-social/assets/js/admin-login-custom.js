
// show hide js global function
function xs_show_hide(getID){
	var idData = document.getElementById('xs_data_tr__'+getID);
	idData.classList.toggle('active_tr');
}


function xs_show_hide_role(getIdData){
	var idData = document.getElementById('xs_data_tr__role');
	
	if(getIdData == 1){
		idData.classList.add('active_tr');
	}else{
		idData.classList.remove('active_tr');
	}
}
//copy function
function copy_callback(fordata){
	var copyText = document.getElementById(fordata+'_callback');
	copyText.select();
	document.execCommand("copy");
}

