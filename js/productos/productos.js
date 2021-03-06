class Productos{
    constructor(){}

    deleteProductos(id){
		if(confirm("Esta seguro de eliminar el usuario?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				console.log("response:: " + response);
				if(response.success){
					// alert("El usuario ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'El producto ha sido borrado de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+id);
					var parent = row.parentElement;
        			parent.removeChild(row);

					// location.reload(true);
				}else if(response.error){
					// alert("No se ha podido eliminar el registro");
					console.log(response.error);
					msgDanger.style.display  = 'inherit';
					msgDanger.innerHTML      = 'No se ha podido eliminar el producto';
					msgSuccess.style.display = 'none';
				}
			}
			};
			xhttp.open("GET", "./controller/Productos.php?delete=true&id="+id, true);
			xhttp.send();
		}
	}
}