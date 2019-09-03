function validarFormulario(f){
	if (f.txtId.value   == '') { 
		alert ('El Id no puede ser vacio'); 
		f.txtId.focus(); 
		return false; 
	}
	if (f.txtName.value   == '') { 
		alert ('El nombre no puede ser vacio'); 
		f.txtName.focus(); 
		return false; 
	}	
	return true;
}