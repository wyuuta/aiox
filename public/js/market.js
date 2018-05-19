function onBuyChanged(){
	var jumlahbeli = document.getElementById('jumlahbeli');
	var amount = jumlahbeli.value;
	var hargabeli = document.getElementById('hargabeli');
	var price = hargabeli.value;

	document.getElementById('biayabeli').value = parseFloat(amount)*0.03;
	document.getElementById('estimasibeli').value = parseFloat(amount) / parseFloat(price);
}

function onSellChanged(){
	var jumlahbeli = document.getElementById('jumlahjual');
	var amount = jumlahbeli.value;
	var hargabeli = document.getElementById('hargajual');
	var price = hargabeli.value;

	document.getElementById('biayajual').value = parseFloat(amount)*0.03;
	document.getElementById('estimasijual').value = parseFloat(amount) * parseFloat(price);
}

function noenter() {
  return !(window.event && window.event.keyCode == 13);
}	

