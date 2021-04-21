function validar_item(){
  var Item = document.getElementById('Item').value; //obtengo el valor del campo nombre
  if (Item == "") { //si no tiene nada escrito muestro un mensaje y return false
    document.getElementById('mensaje_item').innerHTML = "Falta añadir un item";
    return false;
  }else{
    document.getElementById('mensaje_item').innerHTML = "";
    return true;
  }
}

function validar_stock(){
  var Stock = document.getElementById('Stock').value;
  if (Stock == "") {
    document.getElementById('mensaje_stock').innerHTML = "Falta añadir unidades en stock";
    return false;
  }else{
    document.getElementById('mensaje_stock').innerHTML = "";
    return true;
  }
}

function validar_form(){
  if(validar_item() && validar_stock()){ //si los dos son true hago return true
    return true;
  }else{ //si no, false...
    return false;
  }
}
